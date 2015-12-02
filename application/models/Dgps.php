<?php
class dgps extends CI_model {
	var $tabela = 'gp_grupo_pesquisa';
	var $graph = '';
	var $group_id = 0;
	var $link = '';
	function row($obj) {
		$obj -> fd = array('id_gp', 'gp_nome', 'gp_ano_formacao', 'gps_situacao');
		$obj -> lb = array('ID', 'Nome do Grupo', 'ano formação', 'situação');
		$obj -> mk = array('', 'L', 'C', 'C');
		return ($obj);
	}

	function grupos_campus_detalhes($escola = '') {
		$escola = troca($escola, '%20', ' ');
		if ($escola == 'null') {
			$wh = " (us_campus_vinculo = '' or us_campus_vinculo is null)";
		} else {
			$wh = " us_campus_vinculo = '$escola' ";
		}

		$sql = "select distinct us_campus_vinculo, gp_id 
						from gpus_cnpq 
						left join us_usuario on gpus_cnpq_nome = us_nome 
						left join gp_usuario on gp_usuario.us_id = id_gpus_cnpq 
						where usgp_lider = 2 and us_ativo = 1  and usuario_tipo_ust_id = 2
						and $wh
			";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$wh = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen($wh) > 0) { $wh .= ' or ';
			}
			$wh .= ' (id_gp = ' . $line['gp_id'] . ')';
		}
		/* invalida consulta se vazio */
		if (strlen($wh) == 0) { $wh = '1=2';
		}
		$sql = "select us.id_us as ida, id_gp, gp_ano_formacao, gp_nome, gpus_cnpq_nome
					from gp_grupo_pesquisa
					inner join gp_usuario on gp_id = id_gp
					inner join gpus_cnpq as cp on cp.id_gpus_cnpq = gp_usuario.us_id
					left join us_usuario as us on us.us_nome_lattes = cp.gpus_cnpq_nome 
						where ($wh)
						and usgp_lider = 2 and gpus_test = 0
						/* us.usuario_tipo_ust_id */
						order by gp_nome, gpus_cnpq_nome";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$wh = '';
		$sx = '<table width="100%" class="border1 lt1" border=0>';
		$sx .= '<tr>
					<th>pos</th>
					<th>ano<br>formação</td>
					<th>nome do grupo de pesquisa</th>
					<th>nome(s) do(s) lider(es)</th>
				</tr>';
		$to = 0;
		$xigp = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Links */
			$linkg = '<a href="' . base_url('index.php/dgp/view/' . $line['id_gp']) . '" class="link lt2" target="_new">';
			/* Id do usuario */
			$idu = $line['ida'];

			/* Grupo diferente */
			if ($xigp != $line['id_gp']) {
				if ($to > 0) {
					$sx .= '</td></tr>';
				}
				$to++;
				$xigp = $line['id_gp'];
				$sx .= '<tr>';
				$sx .= '<td width="10" align="center" class="border1">' . $to . '</td>';

				$sx .= '<td width="20" align="center" class="border1">';
				$sx .= $line['gp_ano_formacao'];
				$sx .= '</td>';

				$sx .= '<td class="border1" width="45%">';
				$sx .= $linkg . $line['gp_nome'] . '</a>';
				$sx .= '</td>';

				$sx .= '<td class="border1" width="45%">';
				$sx .= link_perfil($line['gpus_cnpq_nome'], $idu) . '</a>';
			} else {
				$sx .= '; ';
				$sx .= link_perfil($line['gpus_cnpq_nome'], $idu) . '</a>';
			}
		}
		if ($to > 0) {
			$sx .= '</td></tr>';
		}
		$sx .= '<tr><td colspan=10>Total de ' . $to . ' grupos</td><tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function grupos_campus() {
		$sql = "select count(*) as total, us_campus_vinculo from ( 
						select distinct us_campus_vinculo, gp_id 
						from gpus_cnpq left join us_usuario on gpus_cnpq_nome = us_nome 
						left join gp_usuario on gp_usuario.us_id = id_gpus_cnpq 
						where usgp_lider = 2 and us_ativo = 1 and gpus_test = 0 
						and usuario_tipo_ust_id = 2
						) as tabela 
						group by us_campus_vinculo
						order by total desc";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$this -> graph = '';
		$dtg = '';
		$sx = '<table width="400" class="lt3 border1">';
		$sx .= '<tr class="lt2"><td><b>Grupos e vinculos de seus lideres aos campus</b></td></tr>';
		$sx .= '<tr class="lt0"><th>Campus</th><th>Total</th></tr>';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$to = $to + $total;
			$nome = trim($line['us_campus_vinculo']);
			$nome_link = UpperCaseSql($nome);
			if (strlen($nome) == 0) {
				$nome = 'não indentificado';
				$nome_link = 'null';
			}

			$link = base_url('index.php/dgp/reports/gc/' . $nome_link);
			$link = '<a href="' . $link . '" class="link lt3">';

			$sx .= '<tr>';
			$sx .= '<td class="border1">';
			$sx .= $link . $nome . '</a>';
			$sx .= '';
			$sx .= '<td align="center" class="border1">';
			$sx .= $link . $line['total'] . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';
			
			/* Dados para o grafico */
			if (strlen($dtg) > 0) { $dtg .= ', '; }
			$dtg .= "['$nome', $total]";
		}
		$sx .= '<tr><td align="right"><b>Total</b></td><td align="center"><b>' . $to . '</b></td></tr>';
		$sx .= '<tr><td class="lt0" colspan=2>O número total de grupos pode diferenciar do total de grupos. Alguns grupos podem ter dois lideres de campus diferetnes';
		$sx .= '</table>';
		
		$this -> graph = $dtg;
		
		return ($sx);
	}

/* Escolas */
	function grupos_escolas() {
		$sql = "select count(*) as total, es_escola from ( 
						select distinct es_escola, gp_id 
						from gpus_cnpq 
						left join us_usuario on gpus_cnpq_nome = us_nome 
						left join gp_usuario on gp_usuario.us_id = id_gpus_cnpq 
						left join escola on us_escola_vinculo = id_es
						where usgp_lider = 2  and gpus_test = 0 
						/* and usuario_tipo_ust_id = 2 */
						) as tabela 
						group by es_escola
						order by total desc";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$this -> graph = '';
		$dtg = '';
		$sx = '<table width="400" class="lt3 border1">';
		$sx .= '<tr class="lt2"><td><b>Grupos e vinculos de seus lideres as Escolas</b></td></tr>';
		$sx .= '<tr class="lt0"><th>Escola</th><th>Total</th></tr>';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$to = $to + $total;
			$nome = trim($line['es_escola']);
			$nome_link = UpperCaseSql($nome);
			if (strlen($nome) == 0) {
				$nome = 'não indentificado';
				$nome_link = 'null';
			}
			$nome_gr = substr($nome,0,16);
			if (strlen($nome_gr != $nome))
				{
					$nome_gr .= '...';
				}
			$link = base_url('index.php/dgp/reports/ge/' . $nome_link);
			$link = '<a href="' . $link . '" class="link lt3">';

			$sx .= '<tr>';
			$sx .= '<td class="border1">';
			$sx .= $link . $nome . '</a>';
			$sx .= '';
			$sx .= '<td align="center" class="border1">';
			$sx .= $link . $line['total'] . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';
			
			/* Dados para o grafico */
			if (strlen($dtg) > 0) { $dtg .= ', '; }
			$dtg .= "{
                		name: '$nome_gr',
                		y: $total,
                		drilldown: '$nome'
           			 } ";
		}
		$sx .= '<tr><td align="right"><b>Total</b></td><td align="center"><b>' . $to . '</b></td></tr>';
		$sx .= '<tr><td class="lt0" colspan=2>O número total de grupos pode diferenciar do total de grupos. Alguns grupos podem ter dois lideres de campus diferetnes';
		$sx .= '</table>';
		
		$this -> graph = $dtg;
		
		return ($sx);
	}

	function next_harvesting() {
		$sql = "select * from gp_grupo_pesquisa order by gp_dt_coleta limit 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		if ($line['gp_dt_coleta'] == date("Y-m-d")) {
			return (0);
		} else {
			return ($line['id_gp']);
		}
	}

	function resumo($data) {
		$sql = "select count(*) as total from " . $this -> tabela . " where 1=1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$data['total_grupos'] = $rlt[0]['total'];

		$sql = "select count(*) as total from gp_linha where lp_ativo=1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$data['total_linhas'] = $rlt[0]['total'];

		$sql = "SELECT count(*) as total, gprh_gp_id, gprh_recurso_humano
						FROM gp_usuario 
						inner join gp_recursos_humanos on gprh_gp_id = id_gprh
						inner join gpus_cnpq on id_gpus_cnpq = gp_usuario.us_id
						WHERE gpus_test = 0
						group by gprh_gp_id
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data['total_' . $line['gprh_gp_id']] = $line['total'];
		}
		return ($data);
	}

	function grava_dados_importados($dt, $id, $link) {

		/* Dados */
		$nome = $dt['grupo']['nome_grupo'];
		
		/* Grava registro */
		$this -> salva_dados_do_grupo($link, $nome);

		$this -> group_id = $this -> recupera_id_grupo($link);
		
		/* Dados das area */
		$this -> salva_areas($link, $dt);				

		/* Grava instituicao */
		$this -> salva_dados_do_instituicao($link, $dt);

		/* Dados de endereço */
		$this -> salva_dados_endereco($id, $dt);

		/* Dads dos lideres */
		$this -> salva_lideres($link, $dt);

		/* Dads dos lideres */
		$this -> salva_linhas($link, $dt);

		/* Dads dos lideres */
		$this -> salva_membros($link, $dt);
		
	

		/* Atualiza area de atualização */
	}
	
	function salva_areas($link, $dt) {
		$area = $dt['instituicao']['area_predominante'];
		$areas = array();

		for ($r=0;$r < count($area);$r++)
			{
				$na = $area[$r];
				$sql = "select * from area_conhecimento where ac_nome_area = '$na' ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				
				if (count($rlt) > 0)
					{
						$line = $rlt[0];
						array_push($areas,$line['ac_cnpq']);
					} else {
						echo $link.'<br>';
						echo 'OPS, área não localizada: '.$na;
						exit;
					}
			}	
		if (count($areas) != 2)
			{
						echo $link.'<br>';
						echo 'OPS, área não localizada: '.$na;
						exit;
			}
		$area1 = $areas[0];
		$area2 = $areas[1];
		$grupo = $this -> group_id;
		
		$sql = "delete from gp_area_predominante where id_gp = $grupo ";
		$rlt = $this->db->query($sql);
		
		$sql = "insert into gp_area_predominante 
					(
					gpap_area_predominante, gpap_area_especifica, 
					id_gp, gpap_cod_principal)
					values
					('$area1','$area2',
					'$grupo','')";
		$rlt = $this->db->query($sql);
		return(1);
	}	

	function salva_membros($link, $dt) {
		$eq = $dt['equipe'];

		/* Pesquisadores */
		$nomes = $eq['pesquisadores'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '1');
		}
		/* estudantes */
		$nomes = $eq['estudantes'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '2');
		}
		/* tecnicos */
		$nomes = $eq['tecnicos'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '6');
		}
		/* estrangeiros */
		$nomes = $eq['estrangeiros'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '8');
		}
		/* egresso_pesquisadores */
		$nomes = $eq['egresso_pesquisadores'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '11');
		}
		/* egresso_estudantes */
		$nomes = $eq['egresso_estudantes'];
		for ($r = 0; $r < count($nomes); $r++) {
			$nm = $nomes[$r];
			$this -> processa_lista_nome($nm, '9');
		}
	}

	function processa_lista_nome($nm, $tipo) {
		$grupo = $this -> group_id;
		$nome = $nm[0];
		if (isset($nm[1])) {
			$titulo = $nm[1];
		} else {
			$titulo = '';
		}
		if (isset($nm[2])) {
			$inclusao = $nm[2];
		} else {
			$inclusao = '0000-00-00';
		}

		/* Processa */
		$id = $this -> busca_membro($nome);
		$this -> insere_membro_grupo($id, $grupo, 0, 0, $tipo);
	}

	function salva_linhas($link, $dt) {
		$grupo = $this -> group_id;
		$this -> link = $link;
		$ln = $dt['linhas']['linhas'];

		$this -> desativa_linha_pesquisa($grupo);

		for ($r = 0; $r < count($ln); $r++) {
			$l = $ln[$r];
			$this -> insere_linha_pesquisa($grupo, $l, ($r + 1));
		}
	}

	function insere_linha_pesquisa($grupo, $l, $nr) {
		$nome = $l[0];
		$estudantes = $l[1];
		$pesquisadores = $l[2];
		$data = date("Y-m-d");
		$espelho = '';
		$espelhonr = sonumero($this -> link) . '???????';

		$sql = "select * from gp_linha where lp_nome = '$nome' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			$sql = "insert into gp_linha
							(lp_nome, grupo_id, lp_ativo,
							lp_estudantes, lp_pesquisadores, lp_nr,
							lp_espelho, lp_espelho_numero, lp_update)
							values
							('$nome','$grupo','1',
							'$estudantes','$pesquisadores','$nr',
							'$espelho','$espelhonr','$data')
					";
		} else {
			$line = $rlt[0];
			$id = $line['id_lp'];
			$sql = "update gp_linha set
						lp_ativo = 1,
						lp_estudantes = $estudantes,
						lp_pesquisadores = $pesquisadores,
						lp_espelho = '$espelho',
						lp_espelho_numero = '$espelhonr',
						lp_update = '$data'
						where id_lp = $id
					";
		}
		$rlt = $this -> db -> query($sql);

	}

	function desativa_linha_pesquisa($grupo) {
		$data = date("Y-m-d");
		$sql = "update gp_linha set lp_update = '$data', lp_ativo=0 where grupo_id = $grupo ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function salva_lideres($link, $dt) {
		$grupo = $this -> group_id;
		$lideres = $dt['instituicao']['lideres'];
		$sql = "update gp_usuario
					set usgp_dt_saida = '" . date("Y-m-d") . "'
					where gp_id = $grupo and  usgp_lider = 2
				";
		$rlt = $this -> db -> query($sql);

		for ($r = 0; $r < count($lideres); $r++) {
			$nome = $lideres[$r];
			$id = $this -> busca_membro($nome);
			$this -> insere_membro_grupo($id, $grupo, 0, 2, 0);
		}
	}

	function insere_membro_grupo($id, $grupo, $linha, $leader = 0, $funcao = 0, $linhaid = 0) {
		$data = date("Y-m-d");
		$sql = "select * from gp_usuario where gpus_cnpq_id = $id and gp_id = $grupo ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if ($leader == 2) {
			$lider = ', usgp_lider = 2 ';
		} else {
			$lider = '';
		}

		if (count($rlt) == 0) {

			$sql = "insert into gp_usuario 
					(
					us_id, gp_id, lp_id,
					usgp_dt_inclusao, usgp_dt_saida, usgp_lider,
					gprh_gp_id, gprh_lp_id, gpus_cnpq_id
					) values (
					'$id','$grupo','$linha',
					'$data','0000-00-00','$leader',
					'$funcao','$linhaid', $id
					)
					";
			$rlt = $this -> db -> query($sql);
		} else {
			$sql = "update gp_usuario set 
						usgp_dt_saida = '0000-00-00',
						gprh_gp_id = $funcao
						$lider
						where gpus_cnpq_id = $id and gp_id = $grupo ";
			$rlt = $this -> db -> query($sql);
		}
		return (1);
	}

	function busca_membro($nome) {
		$sql = "select * from gpus_cnpq 
						where gpus_cnpq_nome = '$nome'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 1) {
			$line = $rlt[0];
			return ($line['id_gpus_cnpq']);
		} else {
			$data = date("Y-m-d");
			$sql = "insert into gpus_cnpq
					(gpus_cnpq_nome, gpus_titulacao_max, gpus_dt_inclusao,
					gpus_egresso_dt_per_ini, gpus_egresso_dt_per_fim, us_id)
					values
					('$nome',1,'$data',
					'0000-00-00','0000-00-00',0)
					";
			$rlt = $this -> db -> query($sql);

			$sql = "select * from gpus_cnpq 
						where gpus_cnpq_nome = '$nome'";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];
			return ($line['id_gpus_cnpq']);
		}

	}

	function busca_situacao($situacao) {
		$situacao = trim($situacao);
		$sql = "select * from gp_situacao 
					where gps_situacao = '$situacao' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 1) {
			$line = $rlt[0];
			return ($line['id_gps']);
		} else {
			echo "OPS, " . $situacao . " não existe";
			exit ;
		}
	}

	function salva_dados_endereco($id, $dt) {

		$logradouro = $dt['endereco']['logradouro'];
		$numero = $dt['endereco']['numero'];
		$complemento = $dt['endereco']['complemento'];
		$bairro = $dt['endereco']['bairro'];
		$estado = $dt['endereco']['estado'];
		$localidade = $dt['endereco']['localidade'];
		$cep = $dt['endereco']['cep'];
		$caixa_postal = $dt['endereco']['caixa_postal'];
		$latitude = $dt['endereco']['latitude'];
		$longitude = $dt['endereco']['longitude'];
		$telefone = $dt['endereco']['telefone'];
		$fax = $dt['endereco']['fax'];
		$contato_email = $dt['endereco']['contato_email'];
		$website = $dt['endereco']['website'];
		$repercussao = $dt['repercusao']['repercussao'];

		$situacao = $dt['instituicao']['situacao_grupo'];
		$espelho = $dt['espelho']['espelho'];
		$atualizacao = $dt['atualizacao'];
		$situacao = $this -> busca_situacao($situacao);

		$sql = "update gp_grupo_pesquisa set
						gp_egp_espelho = '$espelho', 
						gp_logradouro = '$logradouro',
						gp_numero = '$numero',
						gp_complemento = '$complemento',
						gp_bairro = '$bairro',
						gp_uf = '$estado',
						gp_cidade = '$localidade',
						gp_cep = '$cep',
						gp_cx_postal = '$caixa_postal',
						gp_latitude = '$latitude',
						gp_longitude = '$longitude',
						gp_telefone = '$telefone',
						gp_fax = '$fax',
						gp_contato = '$contato_email',
						gp_website = '$website',
						gp_repercussao = '$repercussao',
						gps_id = '$situacao',
						gp_dt_ultimo_envio = '$atualizacao'
					where id_gp = '" . $id . "' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function salva_dados_do_instituicao($link, $dt) {
		$ano_formacao = $dt['instituicao']['ano_formacao'];
		$data_situacao = brtod($dt['instituicao']['data_situacao']);
		$ultimo_envio = brtod($dt['instituicao']['ultimo_envio']);
		$instituicao = $dt['instituicao']['instituicao'];
		$unidade = $dt['instituicao']['unidade'];
		$area = $dt['instituicao']['area_predominante'];
		$area = implode(", ", $area);
		$situacao = $dt['instituicao']['situacao_grupo'];

		$logradouro = $dt['endereco']['logradouro'];
		$numero = $dt['endereco']['numero'];
		$complemento = $dt['endereco']['complemento'];
		$bairro = $dt['endereco']['bairro'];
		$estado = $dt['endereco']['estado'];
		$localidade = $dt['endereco']['localidade'];
		$cep = $dt['endereco']['cep'];
		$caixa_postal = $dt['endereco']['caixa_postal'];
		$latitude = $dt['endereco']['latitude'];
		$longitude = $dt['endereco']['longitude'];
		$telefone = $dt['endereco']['telefone'];
		$fax = $dt['endereco']['fax'];
		$contato_email = $dt['endereco']['contato_email'];
		$website = $dt['endereco']['website'];
		$repercussoes = $dt['repercusao']['repercussao'];

		$sql = "update gp_grupo_pesquisa set 
						gp_ano_formacao = '$ano_formacao',
						gp_dt_situacao = '$data_situacao',
						gp_dt_ultimo_envio = '$ultimo_envio',
						gp_instituicao_grupo = '$instituicao',
						gp_unidade = '$unidade'
					where gp_egp_espelho = '" . $link . "' ";
		$rlt = $this -> db -> query($sql);

		$sql = "update importa_gp_grupo set 
						ano_formacao = '$ano_formacao',
						dt_situacao = '$data_situacao',
						dt_ultimo_envio = '$ultimo_envio',
						area_predominante = '$area',
						instituicao_grupo = '$instituicao',
						unidade = '$unidade',
						situacao_grupo = '$situacao',
						endereco = '$logradouro',
						numero = '$numero',
						complemento = '$complemento',
						bairro = '$bairro',
						uf = '$estado',
						localidade_cidade = '$localidade',
						cx_postal = '$caixa_postal',
						latitude = '$latitude',
						longitude = '$longitude',
						telefone = '$telefone',
						fax = '$fax',
						contato_grupo = '$contato_email',
						website = '$website',
						repercussoes ='$repercussoes'
					where espelho_completo = '" . $link . "' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function recupera_id_grupo($link) {
		$sql = "select * from gp_grupo_pesquisa where gp_egp_espelho = '" . $link . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			return (0);
		} else {
			$line = $rlt[0];
			$id = $line['id_gp'];
			return ($id);
		}

	}

	function salva_dados_do_grupo($link, $nome) {
		if ((strlen($link) == 0) or (strlen($nome) == 0)) {
			return (0);
		}
		$sql = "select * from gp_grupo_pesquisa where gp_egp_espelho = '" . $link . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		//$nome = lowercase($nome);
		$nome = UpperCase($nome, 4);
		$linknr = sonumero($link);
		$data = date("Y-m-d");
		if (count($rlt) == 0) {
			$sql = "insert into gp_grupo_pesquisa 
							(gp_egp_espelho, gp_nome, gp_dt_coleta)
							values
							('$link','$nome','$data')
					";
			$rlt = $this -> db -> query($sql);
		} else {
			$sql = "update gp_grupo_pesquisa set
						gp_nome = '$nome',
						gp_dt_coleta = '$data'
						where gp_egp_espelho = '$link'
					";
			$rlt = $this -> db -> query($sql);
		}

		/* SALVA NO IMPORTA */
		$sql = "select * from importa_gp_grupo where espelho_completo = '" . $link . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$sql = "insert into importa_gp_grupo 
							(espelho_completo, espelho_numero)
							values
							('$link','$linknr')
					";
			$rlt = $this -> db -> query($sql);
		} else {
			$sql = "update importa_gp_grupo set
						espelho_numero = '$linknr'
						where espelho_completo = '$link'
					";
			$rlt = $this -> db -> query($sql);
		}

		return (1);

	}

	function le($id = 0) {
		$this -> load -> model('usuarios');

		$sql = "select * from " . $this -> tabela . " 
						left join gp_situacao on id_gps = gps_id 
						where id_gp = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			$data = $rlt[0];

			$nome = $this -> lista_lideres($data['id_gp']);
			$data['lideres'] = $nome;
			$data['linhas_pesquisa'] = $this -> lista_linhas($data['id_gp']);
			$data['grupo_membros'] = $this -> lista_membros($data['id_gp']);
		} else {
			$data = array();
		}

		return ($data);
	}

	function le_cache($id = 0) {

		$sql = "select * from " . $this -> tabela . "
						where id_dg = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = array();
		if (count($rlt) > 0) {
			$data = $rlt[0];
		}
		return ($data);
	}

	function acoes() {
		$sx = '<table class="lt2">';
		$sx .= '<tr><td><h3>Ações para os grupos</h3></td></tr>';
		$sx .= '<tr>';
		$sx .= '<td>';
		$sx .= '<ul>';

		$sx .= '<li><A HREF="' . base_url('index.php/dgp/lista_grupos') . '" class="link">Ver Grupos</A></li>';

		$sx .= '<li><A HREF="' . base_url('index.php/dgp/novo_grupo') . '" class="link">Abertura de novo Grupo</A></li>';
		$sx .= '<li><A HREF="' . base_url('index.php/dgp/alterar_lider') . '" class="link">Alteração de(os) lider(es) do Grupo</A></li>';
		$sx .= '<li><A HREF="' . base_url('index.php/dgp/comunicar_alteracao') . '" class="link">Comunicar alterações no Grupo</A></li>';
		$sx .= '<li><A HREF="' . base_url('index.php/dgp/solicitar_cancelamento') . '" class="link">Solicitar cancelamento do Grupo</A></li>';
		$sx .= '</td>';

		$sx .= '</table>';
		return ($sx);
	}

	function lista_linhas($grupo) {
		$sql = "select * from gp_linha 
						where grupo_id = $grupo
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '<table width="100%" class="tabela01 lt1">';
		$sx .= '<tr><th>' . msg('nome_linha') . '</th>
						<th>' . msg('dgp_pesquisadores') . '</th>
						<th>' . msg('dgp_estudantes') . '</th>
						<th>' . msg('dgp_espelho') . '</th>
					</tr>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr class="lt2">';
			$sx .= '<td>';
			$sx .= nbr_autor($line['lp_nome'], 8);
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= trim($line['lp_pesquisadores']);
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= trim($line['lp_estudantes']);
			$sx .= '</td>';
			$sx .= '<td align="center">';
			//$sx .= trim($line['lp_espelho']);
			$sx .= '<A href="#" class="lt1 link">';
			$sx .= 'espelho';
			$sx .= '</A>';

			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function lista_membros($grupo) {
		$sql = "select * from gp_usuario 
						left join gp_recursos_humanos on id_gprh = gprh_gp_id
						left join gpus_cnpq on id_gpus_cnpq = gp_usuario.us_id
						where gp_id = $grupo
						order by id_gprh, gpus_cnpq_nome
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '<table width="100%" class="tabela01 lt1" border=0>';
		$sx .= '<tr><th>' . msg('gpus_cnpq_nome') . '</th>
						<th>' . msg('gpus_titulacao_max') . '</th>
						<th>' . msg('gpus_dt_inclusao') . '</th>
					</tr>';
		$xtp = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$tp = $line['gprh_recurso_humano'];
			if ($tp != $xtp) {
				$sx .= '<tr>';
				$sx .= '<td colspan=3 class="lt4" style="border-top: 1px solid #333333; border-bottom: 1px solid #333333;">';
				$sx .= nbr_autor($line['gprh_recurso_humano'], 8);
				$sx .= '</td>';
				$xtp = $tp;
			}
			$sx .= '<tr class="lt2">';
			$class = '';
			$sxf = '';
			if ($line['usgp_lider'] == '2') { $class = "bold";
				$sxf = '(lider)';
			}
			$sx .= '<td class="' . $class . '">';

			$sx .= nbr_autor($line['gpus_cnpq_nome'], 8);
			$sx .= ' ' . $sxf;
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= trim($line['gpus_titulacao_max']);
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= trim($line['gpus_dt_inclusao']);
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function lista_lideres($grupo) {
		$sql = "select * from gpus_cnpq 
						inner join gp_usuario on gpus_cnpq_id = id_gpus_cnpq and usgp_dt_saida = '0000-00-00'
					where gp_id = $grupo
					and usgp_lider = '2' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			if (strlen($sx) > 0) { $sx .= '<br>';
			}
			$line = $rlt[$r];
			$sx .= nbr_autor($line['gpus_cnpq_nome'], 8);
		}
		return ($sx);
	}

	function cp() {
		$cp = array();
		$msg_erro = '';
		$link = $this -> input -> post('dd2');

		if (substr($link, 0, 4) != 'http') {
			$msg_erro = '<td>Link inválido, falta o http:// - ' . $link;
			$ok = '';
		} else {
			$ok = 1;
		}
		array_push($cp, array('$H8', 'id_gp', '', False, True));
		array_push($cp, array('$S200', 'gp_nome', msg('dgp_nome'), True, True));
		array_push($cp, array('$LINK', 'gp_egp_espelho', msg('dgp_espelho'), True, True));
		array_push($cp, array('$HV', 'gp_dt_ultimo_envio', '0000-00-00', False, True));

		array_push($cp, array('$B', '', msg('gravar'), false, True));

		return ($cp);
	}

}
?>
