<?php
class semic_avaliacoes extends CI_Model {
	function set_avaliador($id, $nome) {
		$chk = md5($id . $nome . 'SeMiC' . date("Ymd"));
		$se = array('id' => $id, 'nome' => $nome, 'chk' => $chk);
		$this -> session -> set_userdata($se);
		return (1);
	}

	function avaliador_id($id) {
		$id = round($id) * 3;
		$dv = $id * 337;
		$dv = substr($dv, 0, 1);
		$id = $id . '-' . $dv;
		return ($id);
	}

	function imprime_etiquetas_avaliador($id) {
		$sql = "select * from us_usuario
					where id_us = " . round($id);

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data = $line;
			$data['line'] = $line;
			$data['ref'] = $this -> avaliador_id($id);

			$sx .= $this -> load -> view('semic/etiqueta_avaliador', $data, true);
		}
		return ($sx);
	}

	function mostra_etiquetas_avaliadores_todas() {
		$ano2 = (date("Y") - 1);
		$ano = (date("Y"));
		$cp = "avaliador, id_us, us_nome ";
		$sql = "select $cp, count(*) as total from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0
								union
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
																				
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						group by $cp
						order by us_nome				
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data = $line;
			$id = $line['id_us'];
			$data['line'] = $line;
			$data['ref'] = $this -> avaliador_id($id);

			$sx .= $this -> load -> view('semic/etiqueta_avaliador', $data, true);
		}
		return ($sx);
	}

	function mostra_etiquetas_avaliadores() {
		$ano2 = (date("Y") - 1);
		$ano = (date("Y"));
		$cp = "avaliador, id_us, us_nome ";
		$sql = "select $cp, count(*) as total from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0
								union
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
																				
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						group by $cp
						order by us_nome				
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '<a href="#" onclick="newxy3(\'' . base_url('index.php/semic/etiquetas_av_all/') . '\',800,500);"  class="link">::todas etiquetas::</A><br><br>';
		$sx .= '<table>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/semic/etiquetas_av/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '\',800,500);"  class="link">';
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link;
			$sx .= $line['us_nome'];
			$sx .= '</a>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function recupera_avaliacao($id, $av, $tipo) {
		$ano = date("Y");
		$sqlq = "select * from pibic_parecer_$ano where pp_avaliador_id = '$av' and pp_protocolo = '$id' and pp_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sqlq);
		$rlt = $rlt -> result_array();
		$data = date("Y-m-d");

		if (count($rlt) == 0) {
			$sql = "insert into pibic_parecer_$ano
					(
					pp_tipo, pp_protocolo, pp_protocolo_mae, 
					pp_avaliador, pp_avaliador_id, pp_status,
					pp_pontos, pp_pontos_pp, pp_data  
					)
					values
					(
					'$tipo','$id','',
					'',$av,'@',
					0,0,'$data'
					)					
					";
			$rlt = $this -> db -> query($sql);

			/* Recupera ID */
			$rlt = $this -> db -> query($sqlq);
			$rlt = $rlt -> result_array();

		}
		$line = $rlt[0];
		$id = $line['id_pp'];
		return ($id);
	}
	
	function lista_trabalhos_avaliador_poster($av,$bl)
		{
		$sql = "select * from semic_nota_trabalhos 
						left join semic_bloco on id_sb = st_bloco
						left join semic_trabalho on st_codigo = sm_codigo
						left join pibic_parecer_" . date("Y") . " on pp_protocolo = st_codigo and pp_avaliador_id = $av
						where st_poster = 'S' and st_bloco_poster = $bl
						and st_status <> 'C'
						and (st_avaliador_1 = $av or st_avaliador_2 = $av)
					order by sb_data, sb_hora, st_section, lpad(st_nr,3,'0')	
					";
		$rlt = db_query($sql);
		$sx = '<table width="980" align="center" cellspacing="10">';
		$sx .= '<tr><td class="lt3" align="left">' . msg('Modaliade') . ': ' . msg('Pôster') . '</td></tr>';
		while ($line = db_read($rlt)) {
			$situacao = '0';
			$pre = '';
			$sta = trim($line['pp_status']);
			switch ($sta) {
				case '@' :
					$sit2 = '1';
					break;
				case 'A' :
					$sit2 = '2';
					$pre = 'RE';
					break;
				case 'B' :
					$sit2 = '3';
					$pre = 'RE';
					break;
				default :
					$sit2 = '0';
					break;
			}

			if ($line['sb_avaliador_1'] == $av) { $situacao = $line['sb_avaliador_situacao_1'];
			}
			if ($line['sb_avaliador_2'] == $av) { $situacao = $line['sb_avaliador_situacao_2'];
			}
			if ($line['sb_avaliador_3'] == $av) { $situacao = $line['sb_avaliador_situacao_3'];
			}
			$ref = $this -> semic_salas -> referencia($line);

			$sit = 'semic_status_' . $sit2;
			//echo $sit;
			$sx .= '<tr>';
			$sx .= '<td class="lt6 semic_lista_oral ' . $sit . '">';
			$ids = $line['id_st'];
			/* Botao avaliar */
			$sx .= '<a href="' . base_url('index.php/semic_avaliacao/poster') . '/' . $ids . '/' . checkpost_link($ids) . '">';
			$sx .= '<div class="div_semic_avaliar">' . $pre . 'AVALIAR</div>';
			$sx .= '</a>';

			/* Nota do trabalho */
			$nota = $line['pp_p08'];
			if (strlen($nota) > 0) {
				if ($nota == 110)
					{
						$img = '<img src="'.base_url('img/icon/icone_estrela.png').'" height="30" align="right">';
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . $img . '10,0</div>';
					} else {
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . number_format($nota/10,1,',','.'). '</div>';		
					}
				
			}

			/* Referencia do trabalho */
			$sx .= '<div style="float: left; min-width: 120px;">' . $ref . '</div>';

			/* Dados do Trabalho */
			$sx .= '<div style="float: left" class="lt1">';
			$sx .= $line['st_edital'];
			//$sx .= '<br>' . $line['st_titulo'];
			$sx .= '<br><font class="lt2"><b>' . $line['sm_titulo'].'</b>';
			$sx .= '</div>';
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
		}

	function lista_trabalhos_avaliador_oral($av, $bl) {

		$sql = "select * from semic_nota_trabalhos 
						left join semic_bloco on id_sb = st_bloco
						left join semic_trabalho on st_codigo = sm_codigo
						left join pibic_parecer_" . date("Y") . " on pp_protocolo = st_codigo and pp_avaliador_id = $av
						where st_oral = 'S' and st_bloco = $bl
						and st_status <> 'C'
						and (sb_avaliador_1 = $av or sb_avaliador_2 = $av or sb_avaliador_3 = $av)
					order by sb_data, sb_hora, st_section, lpad(st_nr,3,'0')	
					";
		$rlt = db_query($sql);
		$sx = '<table width="980" align="center" cellspacing="10">';
		$sx .= '<tr><td class="lt3" align="left">' . msg('Modaliade') . ': ' . msg('Oral') . '</td></tr>';
		while ($line = db_read($rlt)) {
			$situacao = '0';
			$pre = '';
			$sta = trim($line['pp_status']);
			switch ($sta) {
				case '@' :
					$sit2 = '1';
					break;
				case 'A' :
					$sit2 = '2';
					$pre = 'RE';
					break;
				case 'B' :
					$sit2 = '3';
					$pre = 'RE';
					break;
				default :
					$sit2 = '0';
					break;
			}

			if ($line['sb_avaliador_1'] == $av) { $situacao = $line['sb_avaliador_situacao_1'];
			}
			if ($line['sb_avaliador_2'] == $av) { $situacao = $line['sb_avaliador_situacao_2'];
			}
			if ($line['sb_avaliador_3'] == $av) { $situacao = $line['sb_avaliador_situacao_3'];
			}
			$ref = $this -> semic_salas -> referencia($line);

			$sit = 'semic_status_' . $sit2;
			//echo $sit;
			$sx .= '<tr>';
			$sx .= '<td class="lt6 semic_lista_oral ' . $sit . '">';
			$ids = $line['id_st'];
			/* Botao avaliar */
			$sx .= '<a href="' . base_url('index.php/semic_avaliacao/oral') . '/' . $ids . '/' . checkpost_link($ids) . '">';
			$sx .= '<div class="div_semic_avaliar">' . $pre . 'AVALIAR</div>';
			$sx .= '</a>';

			/* Nota do trabalho */
			$nota = $line['pp_p08'];
			if (strlen($nota) > 0) {
				if ($nota == 110)
					{
						$img = '<img src="'.base_url('img/icon/icone_estrela.png').'" height="30" align="right">';
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . $img . '10,0</div>';
					} else {
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . number_format($nota/10,1,',','.'). '</div>';		
					}
				
			}

			/* Referencia do trabalho */
			$sx .= '<div style="float: left; min-width: 120px;">' . $ref . '</div>';

			/* Dados do Trabalho */
			$sx .= '<div style="float: left" class="lt1">';
			$sx .= $line['st_edital'];
			//$sx .= '<br>' . $line['st_titulo'];
			$sx .= '<br><font class="lt2"><b>' . $line['sm_titulo'].'</b>';
			$sx .= '</div>';
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function avaliadores_row($ano) {
		$ano = date("Y");
		$ano2 = ($ano - 1);
		$cp = 'avaliador';
		$sql = "select * from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as tabela
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join ies_instituicao on ies_instituicao_ies_id = id_ies
						group by $cp
						order by us_nome	
				";
		$rlt = db_query($sql);
		$sx = '<table width="1024" class="tabela01" align="center" border=0>';
		$tot = 0;
		while ($line = db_read($rlt)) {
			$link = '<a href="' . base_url('index.php/semic_avaliacao/avaliador/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="link lt2">';
			$tot++;
			$sx .= '<tr>';
			$sx .= '<td height="25" class="borderb1">';
			$sx .= $link . $line['ust_titulacao_sigla'];
			$sx .= ' ';
			$sx .= $line['us_nome'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $link . $line['ies_sigla'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $link . $line['us_campus_vinculo'] . '</a>';
			$sx .= '</td>';
		}
		$sx .= '<tr><td colspan=4>Total ' . $tot . ' Avaliadores</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function security() {
		$id = $this -> session -> userdata("id");
		$nome = $this -> session -> userdata("nome");
		$chk = $this -> session -> userdata("chk");

		$chk2 = md5($id . $nome . 'SeMiC' . date("Ymd"));
		if ($chk == $chk2) {
			$this -> set_avaliador($id, $nome);
		} else {
			redirect(base_url('index.php/semic_avaliacao'));
		}
	}

}
?>
