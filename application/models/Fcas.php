<?php
class Fcas extends CI_model {
	
	function indicar_bolsas($edital = '', $area = ''){
		$ano = date("Y");
		if (strlen($area) > 0)
			{
				$wh = " and ed_area = '$area' ";
			} else {
				$wh = "";
			}
		//consulta
		$sql = "select distinct id_ed, ed_nota_normalizada, ed_edital, ust_titulacao_sigla,us_nome,
						id_us, us_campus_vinculo, bpn_bolsa_descricao, ed_protocolo, ed_estudante,
						ed_protocolo_mae, mb_descricao, us_professor_tipo,
						(ed_nota_normalizada + ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota,
						(ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota_bn, ed_area
				FROM ic_edital
						left join us_usuario on id_us = ed_professor
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join (select distinct bpn_id, us_id as id_prod from us_bolsa_produtividade where usb_ativo = 1) as produtividade on id_prod = id_us 
						left join us_bolsa_prod_nome on id_bpn = bpn_id
						left join ic_modalidade_bolsa on ed_modalidade = id_mb
						where ed_edital = '$edital'
						$wh
						and ed_ano = '$ano'
						order by nota desc
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		//Colunas da tabela
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>>>>></b></tr>';
		$sx .= '<tr><th align="center" class="lt01">#</th>
							  <th align="center">Indicado</th>
								<th align="center">Professor</th>
								<th align="center">Centro</th>
								<th align="center">SS</th>
								<th align="center">Produ</th>
								<th align="center">Estudante</th>
								<th align="center">ICV</th>
								<th align="center">Estrat.</th>
								<th align="center">Nota</th>
								<th align="center">DR.</th>
								<th align="center">Aval.</th>
								<th align="center">Protocolo mãe</th>
								<th align="center">Protocolo</th>
								<th align="center">ação</th>
						</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			$edit = '';
			$proto = round(substr($line['ed_protocolo_mae'],1,6));
			$link_projeto = '<a href="'.base_url('index.php/ic/projeto_view/'.$proto.'/'.checkpost_link($proto)).'" class="link nopr">';
			//$nota = $line['ed_nota_normalizada'];
			$nota = $line['nota'];
			$cor = '';
			
			if ((perfil("#ADM") == 1)) {
				$link = base_url('index.php/ic/indicar_bolsa_ed/'.$line['id_ed'].'/'.checkpost_link($line['id_ed']));
				$edit = '<span class="link lt1" onclick="newwin(\'' . $link . '\')">editar</span>';
			}
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= msg("area_".$line['ed_area']);
			$sx .= '</td>';
						
			//bolsa anterior
			$sx .= '<td align="center">';
			$sx .= $line['mb_descricao'];
			$sx .= '</td>';
			//bolsas do edital

			//bolsa atual

			//professor
			$sx .= '<td align="left">';
			$sx .= $line['ust_titulacao_sigla'].' '.link_user($line['us_nome'], $line['id_us']);
			$sx .= '</td>';
			//Centro
			$sx .= '<td align="left">';
			$sx .= $line['us_campus_vinculo'];
			$sx .= '</td>';
			//Stricto
			$sx .= '<td align="center">';
			$ss = $line['us_professor_tipo'];
			if ($ss == '2')
				{
					$sx .= 'SIM';
				} else {
					$sx .= '-';
				}
			$sx .= '</td>';
			//Produtividade
			$sx .= '<td align="center">';
			$sx .= $line['bpn_bolsa_descricao'];
			$sx .= '</td>';
			//Estudante
			$sx .= '<td align="center">';
			$sx .= $line['ed_estudante'];
			$sx .= '</td>';
			//ICV
			$sx .= '<td align="center">';
			$sx .= '-';
			$sx .= '</td>';
			//Nota normalizada
			$sx .= '<td width="50" align="center" style="color: '.$cor.';">'.number_format($line['ed_nota_normalizada'],2,',','.').'</td>';		

			//Nota bonificação
			$sx .= '<td width="50" align="center" style="color: '.$cor.';">'.number_format($line['nota_bn'],2,',','.').'</td>';		
			//$sx .= $line['ed_nota_normalizada'];
			if ($nota < 70) { $cor = 'red'; }
				$sx .= '<td width="50" align="center" style="color: '.$cor.';">'.number_format($nota,2,',','.').'</td>';


			//Protocolo mae
			$sx .= '<td align="center">';
			$sx .= $link_projeto.$line['ed_protocolo_mae'].'</a>';
			$sx .= '</td>';
			//Protocolo
			$sx .= '<td align="center">';
			$sx .= $link_projeto.$line['ed_protocolo'].'</a>';
			$sx .= '</td>';
			//acao
			if (strlen($edit) > 0) {
				$sx .= '<td class="nopr" align="right">' . $edit . '</td>';
			}
		}
		$sx .= '<tr><td colspan=16 align="right">Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);	
		
	}

	//calcula mgn (média das notas geral)
	function calc_media_notas($tipo = '') {
		$sql = "select (AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8)) as media
						from pibic_parecer_2016 
						where pp_tipo = '$tipo' 
						AND pp_status = 'B'
						and pp_p01 <> ''
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$media = round(1000 * $rlt[0]['media']) / 1000;

		return ($media);
	}

	//calcula fca dos avaliadores
	function calc_media_notas_avaliador($tipo = '') {
		//atualiza
		$sql_up = "update us_usuario set us_fc = '0' where us_fc <> 0";
		$this -> db -> query($sql_up);

		//recupera media geral do metodo calc_media_notas_avaliador()
		$mgn = $this -> calc_media_notas($tipo);

		$sql = "select pp_avaliador_id, us_nome, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8))/1000 as media, count(*) as qtd, 
									CASE
										WHEN ies_instituicao_ies_id = '1' THEN 'Interno'
										WHEN ies_instituicao_ies_id != '1' THEN 'Externo'        
									END  as instituicao,
									us_fc
						from pibic_parecer_2016 
						inner join us_usuario on id_us = pp_avaliador_id
						where pp_tipo = '$tipo'  
						AND pp_status = 'B'
						and pp_p01 <> ''
						and pp_p11 >= 10 
						and pp_p01 >= 10 
						group by pp_avaliador_id
						order by us_nome, media
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo de fca</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">id avaliador</th>
							<th align="center">Nome avaliador</th>
							<th align="center">Instituição</th>
							<th align="rigth">Média avaliador</th>
							<th align="rigth">Média geral</th>.
							<th align="center">fca</th>
							<th align="center">Avaliações</th>
						</tr>';

		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$av_id = $line['pp_avaliador_id'];
			$av_nome = $line['us_nome'];
			$mgp = $line['media'];
			$instituicao = $line['instituicao'];
			$fc_us = $line['us_fc'];

			//calcula fca
			$fca = 0;
			$fca = round(1000 * ($mgn - $mgp)) / 1000;

			//diferencia fca < 0
			$sf = '';
			$sff = '';
			if ($fca < '0') {
				$sf = '<font color="red"><i>';
				$sff = '</i></font>';
			} else {
				$sf = '<font color="blue"><b>';
				$sff = '</b></font>';
			}

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $av_id;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $av_nome;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $instituicao;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgp, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgn, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $sf . number_format($fca, 3, '.', ',') . $sff;
			$sx .= '</td>';

			/**
			 $sx .= '<td align="center">';
			 $sx .= $fc_us;
			 $sx .= '</td>';
			 */
			$sx .= '<td align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';

			//atualiza fca na tabela us_usuario [us_fca]
			$sql_up2 = "update us_usuario set us_fc = $fca where id_us = $av_id";
			$this -> db -> query($sql_up2);

		}
		$sx .= '</table>';
		return ($sx);
	}

	function calc_media_notas_protocolo($tipo = '', $ano = '') {
		if ($ano == '') {
			$ano = date('Y');
		}

		if ($tipo == 'SUBMP') {
			$sql = "delete from ic_edital 
							where (ed_edital = 'PIBIC' or ed_edital = 'PIBITI' or ed_edital = 'PIBICEM')
							and (ed_ano = '' or ed_ano = '$ano') ";
			$rlt = $this -> db -> query($sql);
		}

		$sql = "select pp_protocolo_mae, pp_protocolo, count(*) as avaliacoes,
						                round(1000* avg(pp_p01))/1000 as pp1,
						                round(1000* avg(pp_p02))/1000 as pp2,
						                round(1000* avg(pp_p03))/1000 as pp3,
						                round(1000* avg(pp_p04))/1000 as pp4,
						                round(1000* avg(pp_p05))/1000 as pp5,              
						                round(1000* avg(pp_p11))/1000 as pp11,
						                round(1000* avg(pp_p12))/1000 as pp12,
						                round(1000* avg(pp_p13))/1000 as pp13,
						                round(1000* avg(pp_p14))/1000 as pp14,
						                round(1000* avg(pp_p15))/1000 as pp15              
						        from pibic_parecer_" . $ano . "
						        where pp_tipo = '$tipo' 
						        and pp_status = 'B'
						        and pp_p01 <> ''
						        group by pp_protocolo, pp_protocolo_mae
						        order by pp_protocolo, pp_protocolo_mae
						       						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo das notas individuais por protocolo</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">Protocolo</th>
							<th align="center">Protocolo mãe</th>
							<th align="rigth">Média p1</th>
							<th align="rigth">Média p2</th>
							<th align="rigth">Média p3</th>
							<th align="rigth">Média p4</th>														
							<th align="rigth">Média p5</th>
							<th align="rigth">Média p11</th>
							<th align="rigth">Média p12</th>
							<th align="rigth">Média p13</th>
							<th align="rigth">Média p14</th>														
							<th align="rigth">Média p15</th>	
							<th align="rigth">total avaliações</th>					
						</tr>';

		$tot = 0;
		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$tot++;
			//variaveis
			$proto = $line['pp_protocolo'];
			$proto_mae = $line['pp_protocolo_mae'];
			$total_av = $line['avaliacoes'];

			$nt_p01 = $line['pp1'];
			$nt_p02 = $line['pp2'];
			$nt_p03 = $line['pp3'];
			$nt_p04 = $line['pp4'];
			$nt_p05 = $line['pp5'];
			$nt_p11 = $line['pp11'];
			$nt_p12 = $line['pp12'];
			$nt_p13 = $line['pp13'];
			$nt_p14 = $line['pp14'];
			$nt_p15 = $line['pp15'];
			$line['ano'] = $ano;

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $proto;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $proto_mae;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p01, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p02, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p03, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p04, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p05, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p11, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p12, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p13, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p14, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p15, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $total_av;
			$sx .= '</td>';

			//passa o array() $line para o metodo insert
			$this -> inserir_notas_protocolo($line);

		}
		$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';

		$sx .= '</table>';
		return ($sx);

	}

	function inserir_notas_protocolo($line) {
		//variaveis
		$ano = $line['ano'];
		$proto = $line['pp_protocolo'];
		$proto_mae = $line['pp_protocolo_mae'];
		$total_av = $line['avaliacoes'];

		$nt_p01 = $line['pp1'];
		$nt_p02 = $line['pp2'];
		$nt_p03 = $line['pp3'];
		$nt_p04 = $line['pp4'];
		$nt_p05 = $line['pp5'];
		$nt_p11 = $line['pp11'];
		$nt_p12 = $line['pp12'];
		$nt_p13 = $line['pp13'];
		$nt_p14 = $line['pp14'];
		$nt_p15 = $line['pp15'];

		//grava notas na tabela ic_edital
		$sql_inst2 = "insert into ic_edital 
										(
										 ed_protocolo, ed_ano,
										 ed_protocolo_mae,
										 ed_c1, ed_c2, 
										 ed_c3, ed_c4,
										 ed_c5, ed_c6,
										 ed_c7, ed_c8,
										 ed_c9, ed_c10 
										) values (
										'$proto', '$ano', 
										'$proto_mae',
										'$nt_p01', '$nt_p02', '$nt_p03',
										'$nt_p04', '$nt_p05', '$nt_p11',
										'$nt_p12', '$nt_p13', '$nt_p14',
										'$nt_p15')
									";
		$this -> db -> query($sql_inst2);

		return ('');

	}

	function atualizar_produtividade() {
		$sql = "select distinct us_id, us_nome, id_us from us_bolsa_produtividade
					INNER JOIN us_usuario on id_us = us_id 
					where usb_ativo = 1
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Bolsistas Produtividade</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
					<th>Pesquisador</th>
					<th>atribuição</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_produtividade = 4
						   where ed_professor = " . $line['us_id'] . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;">+4 pontos</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function atualizar_nota_aprovado_externamente() {
		$ano = date("Y");
		$sql = "SELECT * FROM `ic_submissao_projetos` 
					where pj_ano = '$ano' and pj_status <> 'X' and pj_status <> '@' and pj_status <> '!' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Projetos Junior</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
					<th>Pesquisador</th>
					<th>atribuição</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$pt = 0;
			$externo = $line['pj_ext_sn'];
			if ($externo > 0) { $pt = 2; }
			
			$area = substr($line['pj_area'],0,1);
			$xarea = '?';
			switch($area)
				{
					case '1':
						$xarea = 'E'; /* Exatas */
						break;
					case '2':
						$xarea = 'V'; /* Exatas */
						break;
					case '3':
						$xarea = 'E'; /* Exatas */
						break;
					case '4':
						$xarea = 'V'; /* Exatas */
						break;
					case '5':
						$xarea = 'A'; /* Exatas */
						break;
					case '6':
						$xarea = 'S'; /* Exatas */
						break;
					case '7':
						$xarea = 'H'; /* Exatas */
						break;
					case '8':
						$xarea = 'H'; /* Exatas */
						break;						
					case '9':
						$xarea = 'E'; /* Exatas */
						break;
					default:
						$xarea = 'N';
						break;						
			}

			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_externo = $pt, ed_area = '$xarea'
						   where ed_protocolo_mae = '" . $line['pj_codigo']."'" . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . $line['pj_codigo'] . '</td>';
			$sx .= '<td>' . $line['pj_titulo'] . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;"><nobr>+2 pontos</nobr></td>';
			$sx .= '<td>' . $xarea . '</td>';
			$sx .= '<td>' . $area . '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function atualizar_projeto_jr() {
		$sql = "SELECT distinct us_nome, id_us FROM ic_submissao_plano
					INNER JOIN us_usuario on doc_autor_principal = us_cracha
				WHERE doc_edital = 'PIBICEM' 
					and doc_ano = '" . date("Y") . "'
					and doc_status <> 'X'
					and doc_status <> '@'
					and doc_status <> '!'
				ORDER BY us_nome
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Projetos Junior</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
					<th>Pesquisador</th>
					<th>atribuição</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_jr = 3
						   where ed_professor = " . $line['id_us'] . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;">+3 pontos</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function normaliza_nota() {
		$ano = date("Y");
		$sql = "SELECT max(ed_nota) as max FROM ic_edital
				WHERE ed_ano = '" . date("Y") . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		$max = $rlt[0]['max'];
		
		$fc_max = 100 / $max;
		
		$sql = "select * from ic_edital
					INNER JOIN us_usuario on id_us = ed_professor
					where ed_ano = '$ano' 
					order by us_nome";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();

		$sx = '<h1>Normalização das notas</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th width="20">#</th>
					<th width="80">Protocolo</th>
					<th>Pesquisador</th>
					<th width="80">Nota</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$notaB = $line['ed_nota'];
			$nota = round($notaB * $fc_max * 100)/100;
			
			//atualiza tabela ic_edital
			$sql_update = "UPDATE ic_edital 
								SET ed_nota_normalizada = $nota
						   WHERE id_ed = " . $line['id_ed'] . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . $line['ed_protocolo'] . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			$cor = 'blue';
			if ($nota < 70) { $cor = 'red'; }
			$sx .= '<td width="20" align="center" style="color: '.$cor.';">'.number_format($nota,2,',','.').'</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function atualizar_notas_protocolo($tipo = '', $ano = '') {
		if ($ano == '') {
			$ano = date('Y');
		}
		$sql = "select doc_edital, pp_protocolo, round(1000 * avg(media_notas + resultado.us_fc))/1000 as nota, count(*) as avaliacoes,
				prof.us_cracha as pf_cracha, prof.id_us as id_pf, prof.us_nome as pf_nome, prof.us_professor_tipo as pf_ss, usuario_titulacao_ust_id as pf_tit 
						from (select  pp_protocolo, pp_protocolo_mae, media_notas, us_fc, pp_avaliador_id 
						      from (select pp_protocolo_mae, pp_protocolo, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p05+pp_p11+pp_p12+pp_p13+pp_p14+pp_p15)/10))/1000 as media_notas, us_fc, pp_avaliador_id
								        from pibic_parecer_" . $ano . "
								        inner join us_usuario on id_us = pp_avaliador_id
								        where pp_tipo = '$tipo'  
								        AND pp_status = 'B'
								        and pp_p01 <> ''
								        group by pp_protocolo, pp_avaliador_id
						           ) as media
						       ) as resultado
				INNER JOIN ic_submissao_plano ON doc_protocolo = pp_protocolo
				INNER JOIN us_usuario as prof ON prof.us_cracha = doc_autor_principal
						group by pp_protocolo, doc_edital, id_pf, prof.us_professor_tipo      
						order by pp_protocolo, doc_edital, id_pf
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Notas individuais atualizadas por protocolo</b></tr>';
		$sx .= '<tr>
							<th width="2%">#</th>
							<th width="8%" align="right">Protocolo</th>
							<th width="5%" align="right">Nota atualizada</th>
							<th width="5%">avaliações</th>
							<th width="8%">edital</th>
							<th width="62%">professor</th>
							<th width="5%">tit.</th>
							<th width="5%">mest./doutor.</th>
						</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;

			$proto = $line['pp_protocolo'];
			$nota = $line['nota'];
			$avali = $line['avaliacoes'];
			$edital = $line['doc_edital'];
			$us_prof = $line['pf_nome'] . ' (' . $line['pf_cracha'] . ')';
			$id_pf = $line['id_pf'];
			$titulacao = $line['pf_tit'];
			$ss = $line['pf_ss'];
			$pt_titu = 0;
			$pt_ss = 0;
			if ($titulacao == 6) { $pt_titu = 2;
			}
			if ($ss == 2) { $pt_ss = 2;
			}

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $proto;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= number_format($nota, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($avali, 0, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $edital;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $us_prof;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $pt_titu;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $pt_ss;
			$sx .= '</td>';

			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_nota = '$nota', 
									ed_avaliacoes = $avali,
									ed_edital = '$edital',
									ed_professor = '$id_pf',
									ed_bn_titulacao = $pt_titu,
									ed_bn_ss = $ss
						   where ed_protocolo = '$proto'; " . cr();
			$this -> db -> query($sql_update);
		}

		$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}
	function le($id)
		{
			$sql = "select * from ic_edital
					WHERE id_ed = ".round($id);
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					return($line);
				} else {
					result(array());
				}
		}
		
	function mostra_modalidades($data)
		{
			$edital = $data['ed_edital'];
			$idx = $data['ed_modalidade'];
			$id = $data['id_ed'];
			
			
			/* Salvar */
			$rs = get("dd20");
			if ($rs > 0)
				{
					$sql = "update ic_edital set ed_modalidade = $rs where id_ed = ".$id;
					$this->db->query($sql);
					$this->load->view('header/windows_close_only',null);
					return('');
				}
			
			switch ($edital)
				{
				case 'PIBIC':
					$sql = "select * from ic_modalidade_bolsa WHERE (mb_tipo = '$edital' and mb_ativo = 1) order by mb_descricao ";
					break;
				default:
					$sql = "select * from ic_modalidade_bolsa WHERE (mb_tipo = '$edital' and mb_ativo = 1) order by mb_descricao ";
					break;					
				}
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<form method="post" action="'.base_url('index.php/ic/indicar_bolsa_ed/'.$data['id_ed'].'/'.checkpost_link($data['id_ed'])).'">';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$chk = '';
					if ($idx == $line['id_mb']) { $chk = 'checked'; }
					$sx .= '<input type="radio" name="dd20" value="'.$line['id_mb'].'" '.$chk.'>'.$line['mb_descricao'].'<br>';
				}
			$sx .= '<input type="submit" class="btn btn-primary" value="indicar">';
			return($sx);
		}
	function mostra_indicacoes_professor($id_us,$edital,$ano)
		{
			$sql = "SELECT * from ic_edital
					 	INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
						WHERE ed_ano = '$ano' and ed_professor = $id_us and ed_edital = '$edital' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<div class="btn btn-info" style="width: 100%; margin-bottom: 5px;">';
					$sx .= $line['mb_descricao'];
					$sx .= '</div>';
				}
			return($sx);
		}
}
?>