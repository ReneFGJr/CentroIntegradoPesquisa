<?php
class dgps extends CI_model {
	var $tabela = 'gp_grupo_pesquisa';

	var $group_id = 0;
	function row($obj) {
		$obj -> fd = array('id_gp', 'gp_nome', 'gp_ano_formacao', 'gps_situacao');
		$obj -> lb = array('ID', 'Nome do Grupo', 'ano formação', 'situação');
		$obj -> mk = array('', 'L', 'C', 'C');
		return ($obj);
	}

	function grava_dados_importados($dt, $id, $link) {

		/* Dados */
		$nome = $dt['grupo']['nome_grupo'];
		$sql = "update " . $this -> tabela . " ";

		/* Grava registro */
		$this -> salva_dados_do_grupo($link, $nome);

		$this -> group_id = $this -> recupera_id_grupo($link);

		/* Grava instituicao */
		$this -> salva_dados_do_instituicao($link, $dt);

		/* Dados de endereço */
		$this -> salva_dados_endereco($link, $dt);

		/* Dads dos lideres */
		$this -> salva_lideres($link, $dt);

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
			echo '<BR>' . $nome . '=' . $id;
			$this -> insere_membro_grupo($id, $grupo, 0, 2, 0);
		}
	}

	function insere_membro_grupo($id, $grupo, $linha, $leader = 0, $total_pesquisador = 0, $total_pesquisador = 0) {
		$data = date("Y-m-d");
		$sql = "select * from gp_usuario where us_id = $id and gp_id = $grupo and usgp_lider = 2 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {

			$sql = "insert into gp_usuario 
					(
					us_id, gp_id, lp_id,
					usgp_dt_inclusao, usgp_dt_saida, usgp_lider,
					gprh_gp_id, gprh_lp_id
					) values (
					'$id','$grupo','$linha',
					'$data','0000-00-00','$leader',
					'$total_pesquisador','$total_pesquisador'
					)
					";
			$rlt = $this -> db -> query($sql);
		} else {
			$sql = "update gp_usuario set usgp_dt_saida = '0000-00-00' where us_id = $id and gp_id = $grupo and usgp_lider = 2 ";
			$rlt = $this -> db -> query($sql);
		}
		return(1);
	}

	function busca_membro($nome) {
		$sql = "select * from gpus_cnpq 
						where gpus_cnpq_nome = '$nome'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 1) {
			$line = $rlt[0];
			return ($line['id_gprh']);
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

	function salva_dados_endereco($link, $dt) {

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
						gps_id = '$situacao'
					where gp_egp_espelho = '" . $link . "' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function salva_dados_do_instituicao($link, $dt) {
		$ano_formacao = $dt['instituicao']['ano_formacao'];
		$data_situacao = brtod($dt['instituicao']['data_situacao']);
		$ultimo_envio = brtod($dt['instituicao']['ultimo_envio']);
		$instituicao = $dt['instituicao']['instituicao'];
		$unidade = $dt['instituicao']['unidade'];

		$sql = "update gp_grupo_pesquisa set 
						gp_ano_formacao = '$ano_formacao',
						gp_dt_situacao = '$data_situacao',
						gp_dt_ultimo_envio = '$ultimo_envio',
						gp_instituicao_grupo = '$instituicao',
						gp_unidade = '$unidade'
					where gp_egp_espelho = '" . $link . "' ";
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
		$nome = UpperCase($nome,4);
		
		if (count($rlt) == 0) {
			$sql = "insert into gp_grupo_pesquisa 
							(gp_egp_espelho, gp_nome)
							values
							('$link','$nome')
					";
			$rlt = $this -> db -> query($sql);
		} else {
			$sql = "update gp_grupo_pesquisa set
						gp_nome = '$nome'
						where gp_egp_espelho = '$link'
					";
			$rlt = $this -> db -> query($sql);
		}

		return (1);

	}

	function le($id = 0) {
		$this -> load -> model('usuarios');

		$sql = "select * from ".$this->tabela." 
						left join gp_situacao on id_gps = gps_id 
						where id_gp = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0)
			{
			$data = $rlt[0];
		
			$nome = $this -> lista_lideres($data['id_gp']);
			$data['lideres'] = $nome;
			} else {
				$data = array();
			}
		return ($data);
	}
	
	function le_cache($id = 0) {

		$sql = "select * from ".$this->tabela."
						where id_dg = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = array();
		if (count($rlt) > 0)
			{
			$data = $rlt[0];
			}
		return ($data);
	}
		
	function lista_lideres($grupo)
		{
			$sql = "select * from gpus_cnpq 
						inner join gp_recursos_humanos						
						on id_gprh = us_id and usgp_dt_saida = '0000-00-00'
					where gp_id = $grupo";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			$sx = '';
			for ($r=0;$r < count($rlt);$r++)
				{
					if (strlen($sx) > 0) { $sx .= '<br>'; }
					$line = $rlt[$r];
					$sx .= nbr_autor($line['gprh_recurso_humano'],8);
				}
			return($sx);
		}

	function cp() {
		$cp = array();
		$msg_erro='';
		$link = $this->input->post('dd2');
		
		if (substr($link,0,4)!='http')
			{
				$msg_erro='<td>Link inválido, falta o http:// - '.$link;
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
