<?php
class semic_trabalhos extends CI_Model {
	var $tabela = 'semic_ic_trabalho';

	function le_bloco($id = 0, $avaliador = 0) {
		$sql = "select * from semic_bloco where id_sb = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (isset($rlt[0])) {
			$line = $rlt[0];
		} else {
			return ( array());
		}
		
		$tipo = $line['sb_tipo'];
		/* Oral */
		if ($tipo == '1') {
			$sql = "select * from semic_bloco 
			left join semic_nota_trabalhos on st_bloco = id_sb
			left join pibic_parecer_" . date("Y") . " on pp_protocolo = st_codigo
					where id_sb = " . round($id);
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (isset($rlt[0])) {
				$line = $rlt[0];
			} else {
				$line = array();
			}
			return ($line);
		}
	}

	function le($id = 0) {
		$sql = "select * from semic_nota_trabalhos
						left join semic_bloco on id_sb = st_bloco_poster 
						left join us_usuario on st_aluno = us_cracha
							where id_st = $id
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (isset($rlt[0])) {
			$line = $rlt[0];
		} else {
			$line = array();
		}
		return ($line);
	}

	function recupera_ala($id) {
		$sql = "select * from semic_nota_trabalhos where id_st = " . round($id);
		$rlt = db_query($sql);
		$sx = '';
		$bl = '';
		if ($line = db_read($rlt)) {
			$bl = $line['st_bloco_poster_ala'];
		}
		return ($bl);
	}

	function recupera_dia($id) {
		$sql = "select * from semic_nota_trabalhos 
					left join semic_bloco on id_sb = st_bloco_poster 
					where id_st = " . round($id);
		$rlt = db_query($sql);
		$sx = '';
		$bl = '';
		if ($line = db_read($rlt)) {
			$bl = stodbr($line['sb_data']).' '.$line['sb_hora'];
		}
		return ($bl);
	}

	function lista_trabalhos_poster() {
		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos where st_poster = 'S' and st_ano = '$ano' and st_status <> 'C' order by st_section, lpad(st_nr,4,0) ";
		$rlt = db_query($sql);
		$sx = '<option value="' . base_url('index.php/semic/poster_localizacao') . '">Código do Trabalho</option>';
		while ($line = db_read($rlt)) {
			$ref = $this -> semic_salas -> referencia($line);
			$sx .= '<option value="' . base_url('index.php/semic/poster_localizacao') . '/' . $line['id_st'] . '/' . $ref . '">' . $ref . '</option>' . cr();
		}
		return ($sx);
	}

	function imprime_etiquetas_por_alas($ano, $bloco, $ala) {
		$sql = "select * from semic_nota_trabalhos
					left join semic_bloco on id_sb = st_bloco_poster 
					left join us_usuario on st_aluno = us_cracha
						where st_ano = '$ano' and st_bloco_poster_ala = '$ala'
						and st_bloco_poster = $bloco
				
				order by sb_data, sb_hora, st_bloco_poster, st_bloco_poster_ala, st_bloco_poster_nr
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data = $line;
			$data['line'] = $line;
			$data['ref'] = $this -> semic_salas -> referencia($line);

			$sx .= $this -> load -> view('semic/etiqueta_poster', $data, true);
		}
		return ($sx);
	}

	function mostra_etiquetas_por_alas($ano) {
		$sql = "select st_bloco_poster, st_bloco_poster_ala, sb_data, sb_hora, sb_nome from (
					select st_bloco_poster, st_bloco_poster_ala from semic_nota_trabalhos 
						where st_ano = '$ano' and st_bloco_poster_ala <> ''
				) as tabela
				left join semic_bloco on id_sb = st_bloco_poster
				group by st_bloco_poster, st_bloco_poster_ala, sb_data, sb_hora, sb_nome
				order by sb_data, sb_hora, st_bloco_poster, st_bloco_poster_ala
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '<table>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$bloco = $line['st_bloco_poster'];
			if ($bloco != $xbloco) {
				$xbloco = $bloco;
				$sx .= '<tr><td class="lt4">' . $line['sb_nome'] . ' - ' . stodbr($line['sb_data']) . ' - ' . $line['sb_hora'] . '</td>';
			}
			$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/semic/etiquetas_pr/' . $line['st_bloco_poster'] . '/' . $line['st_bloco_poster_ala']) . '\',800,500);"  class="link">';
			$sx .= '<td>';
			$sx .= '<div class="border1" style="width: 20px; padding: 10px; text-align: center; ">';
			$sx .= $link;
			$sx .= $line['st_bloco_poster_ala'];
			$sx .= '</a>';
			$sx .= '</div>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function indicacao_local_poster_inserir($id, $ala) {
		$sql = "select * from semic_nota_trabalhos where id_st = $id ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$bloco = $line['st_bloco_poster'];
			if ($bloco > 0) {
				$sql = "select count(*) as total from 
				semic_nota_trabalhos 
				where st_bloco_poster_ala = '$ala' and st_bloco_poster = $bloco 
				group by st_bloco_poster_ala";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) == 0) {
					$total = 0;
				} else {
					$line = $rlt[0];
					$total = round($line['total']);
				}
				$total = $total + 1;
				$sql = "update semic_nota_trabalhos set 
						st_bloco_poster_ala = '$ala',
						st_bloco_poster_nr = '$total'
					where id_st = $id and st_bloco_poster_ala = '' ";
				$rlt = $this -> db -> query($sql);
			}
		}

	}

	function indicacao_local_poster_remover($id, $ala) {
		$sql = "update semic_nota_trabalhos set 
						st_bloco_poster_ala = '',
						st_bloco_poster_nr = '0'
					where id_st = $id ";
		$rlt = $this -> db -> query($sql);
	}

	function indicacao_local_poster($id, $ala, $nr) {
		if ($nr == 'ADD') {
			$this -> indicacao_local_poster_inserir($id, $ala);
		}
		if ($nr == 'DEL') {
			$this -> indicacao_local_poster_remover($id, $ala);
		}
		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos 
						left join semic_bloco on id_sb = st_bloco_poster
						where st_ano = '$ano' and st_bloco_poster_ala = ''
						and st_poster = 'S' and st_bloco_poster > 0
						and st_status <> 'C'
					order by sb_data, sb_hora, st_section, lpad(st_nr,3,'0')	
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		$xsec = "";
		$xbl = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Bloco */
			$bl = $line['id_sb'];
			if ($xbl != $bl) {
				$sx .= '<h3>Bloco: ';
				$sx .= stodbr($line['sb_data']);
				$sx .= ' ';
				$sx .= $line['sb_hora'];
				$sx .= '</h3>';
				$xbl = $bl;
			}

			$sec = $line['st_section'];
			if ($sec != $xsec) {
				$sx .= '<hr>';
				$xsec = $sec;
			}
			$tot++;
			if (strlen($ala) > 0) {
				$link = '<a href="' . base_url('index.php/semic/poster/' . $line['id_st'] . '/' . ($ala)) . '/ADD/">';
				$link_off = '</a>';
			} else {
				$link = '';
				$link_off = '';
			}
			$sx .= $link . $this -> semic_salas -> referencia($line) . $link_off;
			$sx .= ' | ';
		}
		/* SALAS */
		$sb = '';
		for ($r = 0; $r < 26; $r++) {
			$sb .= '<a href="' . base_url('index.php/semic/poster/0/' . (chr(65 + $r))) . '/0/">';
			$sb .= chr(65 + $r);
			$sb .= '</A>';
			$sb .= ' | ';
		}
		/* ALOCAÇÔES */
		$sc = '';
		if (strlen($ala) > 0) {
			$sc .= '<h3>Ala ' . $ala . '</h3>';

			$sql = "select * from semic_nota_trabalhos 
							left join semic_bloco on id_sb = st_bloco_poster
									where st_bloco_poster_ala = '$ala' and st_ano = '$ano'
									order by sb_data, sb_hora, st_bloco_poster_nr
							 ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$tot = 0;
			for ($r = 0; $r < count($rlt); $r++) {
				$tot++;
				$line = $rlt[$r];

				/* Bloco */
				$bl = $line['id_sb'];
				if ($xbl != $bl) {
					$sc .= '<h3>Bloco: ';
					$sc .= stodbr($line['sb_data']);
					$sc .= ' ';
					$sc .= $line['sb_hora'];
					$sc .= '</h3>';
					$xbl = $bl;
				}

				$link = '<a href="' . base_url('index.php/semic/poster/' . $line['id_st'] . '/' . ($ala)) . '/DEL/">';
				$link_off = '</a>';

				$sc .= $line['st_bloco_poster_nr'] . '.';
				$sc .= $link . $this -> semic_salas -> referencia($line) . $link_off;
				$sc .= '<br>';
			}
			$sc .= '<br><b>Total ' . $tot . '</b>';
		}

		$sa = '<table><tr><td>total</td></tr><tr><td>' . $tot . '</td></tr></table>';
		$sx = '<table class="lt1" cellpadding="10">
						<tr valign="top">
							<td width="60%"><h2>Trabalhos</h2>' . $sx . '</td>
							<td width="20%"><h2>Salas</h2>' . $sb . '</td>
							<td width="20%"><h2>Locação</h2>' . $sc . '</td> 
						</tr>';
		$sx .= '</table>';
		echo $sa . $sx;
		return ($sa . $sx);
	}

	function avaliadores_resumo_indicacao($tipo = 1) {
		$ano = date("Y");
		$ano2 = (date("Y") - 1);
		$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome ";

		/* AVALIADORES */
		if ($tipo == 1) {
			$sql = "select $cp, count(*) as total from ( 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT id_st as id, st_bloco_poster as id_bl, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		}
		/* SUPLENTES */
		if ($tipo == 2) {
			$sql = "select $cp, count(*) as total from ( 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT id_st as id, st_bloco_poster as id_bl, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		}
		$rs = array();
		$rlt = db_query($sql);

		$xava = '';
		$tava = 0;
		$toto = 0;
		while ($line = db_read($rlt)) {
			$ava = $line['avaliador'];
			/* Avaliador */
			if ($xava != $ava) {
				$tava++;
				$xava = $ava;
			}
			$sit = $line['situacao'];
			if (isset($rs[$sit])) {
				$rs[$sit] = $rs[$sit] + 1;
			} else {
				$rs[$sit] = 1;
			}
			$toto++;
		}
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sa = '<tr>';
		$sb = '<tr class="lt6">';
		foreach ($rs as $key => $value) {
			$tx = $this -> situacao_avaliador($key);
			$perc = number_format($value / $toto * 100, 1) . '%';
			$sa .= '<td>' . $tx['status'] . '</td>';
			$sb .= '<td align="center">' . $value . ' <font class="lt2">(' . $perc . ')</font></td>';
		}
		$sa .= '<td>Total de avaliadores</td>';
		$sb .= '<td align="center">' . $tava . '</td>';

		$sa .= '<td>Total de indicações</td>';
		$sb .= '<td align="center">' . $toto . '</td>';

		if ($tava > 0) {
			$sa .= '<td>Média Avaliadores / Bloco</td>';
			$sb .= '<td align="center">' . number_format($toto / $tava, 1) . '</td>';
		}

		$sx .= $sa . '</tr>';
		$sx .= $sb . '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_st', '', False, True));
		array_push($cp, array('$O A:ATIVO&C:CANCELADO&F:FINALIZADO&S:SUSPENSO', 'st_status', 'Status', True, True));
		array_push($cp, array('$O N:NÃO&S:SIM', 'st_oral', 'Apesentação Oral', False, True));
		array_push($cp, array('$O N:NÃO&S:SIM', 'st_poster', 'Apesentação Poster', False, True));
		return ($cp);
	}

	function row($obj) {
		$obj -> fd = array('id_st', 'st_codigo', 'st_status', 'st_area', 'st_area_geral', 'st_cnpq', 'st_eng', 'st_professor', 'st_aluno', 'st_section', 'st_nr', 'st_oral', 'st_poster', 'st_ano');
		$obj -> lb = array('ID', msg('protocol'), msg('status'), msg('area'), msg('area_geral'), msg('cnpq'), msg('english'), msg('orientador'), msg('estudante'), msg('section'), msg('nr'), msg('oral'), msg('poster'), msg('ano'));
		$obj -> mk = array('', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C');
		return ($obj);
	}

	function area_trabalho($id) {
		$sql = "select * from semic_nota_trabalhos where id_st = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);

		$area = $line['st_area_geral'];
		$aval = array();
		$aval[$area] = '1';

		return ($aval);
	}

	function orientador_avaliadores_trabalho($id) {
		$sql = "select * from semic_nota_trabalhos where id_st = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);

		/* orientadores e alunos */
		$ava1 = $line['st_professor'];
		$ava2 = $line['st_aluno'];
		$aval = array();

		if ($ava1 > 0) { $aval[$ava1] = '1';
		}
		if ($ava2 > 0) { $aval[$ava2] = '1';
		}

		/* Avalaidores */
		$ava1 = $line['st_avaliador_1'];
		$ava2 = $line['st_avaliador_2'];

		if ($ava1 > 0) { $aval[$ava1] = '1';
		}
		if ($ava2 > 0) { $aval[$ava2] = '1';
		}

		return ($aval);
	}

	function avaliadores_trabalho($id) {
		$sql = "select * from semic_nota_trabalhos where id_st = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);

		$ava1 = $line['st_avaliador_1'];
		$ava2 = $line['st_avaliador_2'];
		$aval = array();
		if ($ava1 > 0) { array_push($aval, $ava1);
		}
		if ($ava2 > 0) { array_push($aval, $ava2);
		}
		return ($aval);
	}

	function mostra_agenda_pessoal($id = 0, $ano = 0, $completa = 0) {
		$ano = 2015;
		$ano2 = ($ano - 1);

		$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, 
					sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome,
					sl_bloco, suplente, id_bl";
		$sql = "select $cp, sum(tot) as total from ( 
							SELECT 0 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT 0 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT 1 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT 0 as suplente, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT 1 as suplente, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						where id_us = $id
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		$rlt = db_query($sql);
		$rs = array();
		while ($line = db_read($rlt)) {
			array_push($rs, $line);
		}

		/* Total de convites */
		$tot = count($rs);

		if ($tot > 0) {
			$size = round(100 / $tot) . '%';
			$sx = '<table width="1024" style="border: 0px solid #000000;" align="center" border=0>';
			$sx .= '<tr><td colspan=2 class="lt6">' . msg("Agenda de avaliação") . '</td></tr>';

			$sx .= '<tr valign="top">';
			$sx .= '<td rowspan=40 width="50">';
			$sx .= '<img src="' . base_url('img/icon/icone_agenda_hora.png') . '" height="80">';
			$sx .= '</td>';
			$sx .= '<td colspan=1 width="95%" class="lt1">Clique na data e hora para visualizar os trabalhos</td></tr>';

			for ($r = 0; $r < count($rs); $r++) {
				$id_sl = $rs[0]['id_bl'];
				$link = '<A href="' . base_url('index.php/semic_avaliacao/bloco') . '/' . $id_sl . '/' . checkpost_link($id_sl) . '" class="link">';
				$link_off = '</a>';

				/* imagem */
				$suplente = $rs[$r]['suplente'];
				$sx .= '<tr valign="top">';

				$sx .= '<td width="' . $size . '">';
				$sx .= '<table width="100%" border=0 >';

				$sx .= '<tr>';
				$sx .= '<td width="150" align="right" style="font-size: 10px;">Data e hora:</td>';
				$sx .= '<td width="90%" style="font-size: 22px;"><b>' . $link . stodbr($rs[$r]['sb_data']) . ' ' . $rs[$r]['sb_hora'] . '-' . $rs[$r]['sb_hora_fim'] . $link_off . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px; ">Modalidade:</td>';
				$sx .= '<td style="font-size: 14px;"><b>' . $rs[$r]['sb_nome'] . '</b></td>';
				$sx .= '</tr>';

				if ($suplente == '1') {
					$sx .= '<tr>';
					$sx .= '<td align="right" style="font-size: 10px;">Situação:</td>';
					$sx .= '<td style="font-size: 12px;"><font color="red"><b>**SUPLENTE**</b></font></td>';
					$sx .= '</tr>';
				}

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Bloco:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_bloco'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Local:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_nome'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;"></td>';
				$sx .= '<td style="font-size: 12px;">Total de <b>' . $rs[$r]['total'] . '</b> trabalho(s) para ser(em) avaliado(s).</td>';
				$sx .= '</tr>';

				if ($completa == 1) {
					$id_bl = $rs[$r]['id_bl'];
					$id_us = $rs[$r]['id_us'];

					$sx .= '<tr>';
					$sx .= '<td align="right" style="font-size: 10px;">';
					$sx .= 'trabalhos';
					$sx .= '</td>';
					$sx .= '<td>';
					$sx .= $this -> trabalhos_bloco_avaliador($id_bl, $id_us);
					$sx .= '</td>';
					$sx .= '</tr>';
				}

				$sx .= '</table>';
			}
			$sx .= '</table>';
		} else {
			$sx = '';
		}
		/* Cabecalho */

		$texto = $sx;

		return ($texto);
	}

	function mostra_agenda($id = 0, $ano = 0, $completa = 0) {
		$ano2 = ($ano - 1);
		$sql = "select * from ( 
							SELECT id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 = $id 
								union 
							SELECT id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 = $id 
								union 
							SELECT id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 = $id
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						order by us_nome, sb_data, sb_hora				
				";
		$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, 
					sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome,
					sl_bloco, suplente, id_bl";
		$sql = "select $cp, sum(tot) as total from ( 
							SELECT 0 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT 0 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT 1 as suplente, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT 0 as suplente, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT 1 as suplente, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						where id_us = $id
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		$rlt = db_query($sql);
		$rs = array();
		while ($line = db_read($rlt)) {
			array_push($rs, $line);
		}

		/* Total de convites */
		$tot = count($rs);

		if ($tot > 0) {
			$size = round(100 / $tot) . '%';
			$sx = '<table width="640" style="border: 1px solid #000000;" >';

			for ($r = 0; $r < count($rs); $r++) {
				/* imagem */
				$suplente = $rs[$r]['suplente'];
				$sx .= '<tr>';

				$sx .= '<td width="' . $size . '">';
				$sx .= '<table width="100%" border=0 >';

				$sx .= '<tr>';
				$sx .= '<td width="25%" align="right" style="font-size: 10px;">Data e hora:</td>';
				$sx .= '<td width="75%" style="font-size: 22px;"><b>' . stodbr($rs[$r]['sb_data']) . ' ' . $rs[$r]['sb_hora'] . '-' . $rs[$r]['sb_hora_fim'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px; ">Modalidade:</td>';
				$sx .= '<td style="font-size: 14px;"><b>' . $rs[$r]['sb_nome'] . '</b></td>';
				$sx .= '</tr>';

				if ($suplente == '1') {
					$sx .= '<tr>';
					$sx .= '<td align="right" style="font-size: 10px;">Situação:</td>';
					$sx .= '<td style="font-size: 12px;"><font color="red"><b>**SUPLENTE**</b></font></td>';
					$sx .= '</tr>';
				}

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Bloco:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_bloco'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Local:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_nome'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;"></td>';
				$sx .= '<td style="font-size: 12px;">Total de <b>' . $rs[$r]['total'] . '</b> trabalho(s) para ser(em) avaliado(s).</td>';
				$sx .= '</tr>';

				$sit = $rs[$r]['situacao'];
				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Situacao:</td>';
				$rav = $this -> link_situacao_avaliador($sit);
				$sx .= '<td>';
				$sx .= $rav;
				$sx .= '</td>';
				$sx .= '</tr>';

				if ($completa == 1) {
					$id_bl = $rs[$r]['id_bl'];
					$id_us = $rs[$r]['id_us'];

					$sx .= '<tr>';
					$sx .= '<td align="right" style="font-size: 10px;">';
					$sx .= 'trabalhos';
					$sx .= '</td>';
					$sx .= '<td>';
					$sx .= $this -> trabalhos_bloco_avaliador($id_bl, $id_us);
					$sx .= '</td>';
					$sx .= '</tr>';
				}

				$sx .= '</table>';
			}
			$sx .= '</table>';
		} else {
			$sx = '';
		}

		/* Cabecalho */
		$cab = '<table width="640" border=0 >';
		$img = base_url_site('img/semic/semic_' . $ano . '.png');
		$cab .= '<tr><td colspan="' . $tot . '"><img src="' . $img . '" width="100%"></td></tr>';
		$cab .= '<tr><td>&nbsp;</td></tr>';
		$cab .= '<tr><td>';

		/* email link */
		$check = checkpost_link($id . 'avaliador_semic');
		$link = '<a href="' . base_url_site('index.php/login/r/' . $id . '/' . $check) . '" target="_new_av">[CLICK AQUI PARA ACEITAR OU DECLINAR]</A>';

		/* EMAIL */
		if ($completa == 1) {
			$texto = ic('semic_av_agenda_comp', 1, 'HTML');
		} else {
			$texto = ic('semic_av_agenda', 1, 'HTML');
		}

		$this -> load -> model('email_local');
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		/* Substituicao */
		$texto = troca($texto, '$AGENDA', $sx);
		$texto = troca($texto, '$CAB', $cab);
		$texto = troca($texto, '$LINK', $link);
		$texto .= '</table>';

		return ($texto);
	}

	function trabalhos_bloco_avaliador($bloco, $id = 0) {
		$sql = "select * from semic_nota_trabalhos 
						where st_bloco_poster = $bloco 
						and (st_avaliador_1 = $id or st_avaliador_2 = $id )";
		$xrlt = $this -> db -> query($sql);
		$xrlt = $xrlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($xrlt); $r++) {
			$line = $xrlt[$r];
			$sx .= '<A href="http://cip.pucpr.br/semic/index.php/semic/view/' . $line['st_codigo'] . '" target="_new' . $line['st_codigo'] . '">';
			$sx .= $this -> semic_salas -> referencia($line);
			$sx .= '</A>';
			$sx .= '<br>';
		}

		/* ORAL */
		$sql = "select * from semic_bloco 
						inner join semic_nota_trabalhos on id_sb = st_bloco
						where id_sb = $bloco 
						and (sb_avaliador_1 = $id or sb_avaliador_2 = $id or sb_avaliador_3 = $id)
						order by st_section, lpad(st_nr,4,0)
						";
		$xrlt = $this -> db -> query($sql);
		$xrlt = $xrlt -> result_array();

		for ($r = 0; $r < count($xrlt); $r++) {
			$line = $xrlt[$r];
			$sx .= '<A href="http://cip.pucpr.br/semic/index.php/semic/view/' . $line['st_codigo'] . '" target="_new' . $line['st_codigo'] . '">';
			$sx .= $this -> semic_salas -> referencia($line);
			$sx .= '</A>';
			$sx .= '<br>';
		}
		return ($sx);
	}

	function avaliador_historico($acao, $historico, $avaliador) {
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$user = $_SESSION['id_us'];
		$sql = "insert into us_avaliador_historico
				(
					h_acao, h_historico, h_user,
					h_data, h_hora, h_login
				) values (
					'$acao','$historico','$avaliador',
					'$data','$hora','$user'
				)";
		$this -> db -> query($sql);

	}

	function avaliador_convite_oral($id, $avaliador, $sit, $obs = '') {
		if ($id > 0) {
			$sql = "select * from semic_bloco where id_sb = " . $id;
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0) {
				$line = $rlt[0];
				$stx = $this -> situacao_avaliador($sit);
				$historico = 'SEMIC-' . msg('convite') . ': ' . trim($stx['status']) . ' Oral:' . $id;
				if (strlen($obs) > 0) {
					$historico .= '<br><i>' . $obs . '</i>';
				}
				$av = 0;
				$fld = array('', 'sb_avaliador_situacao_1', 'sb_avaliador_situacao_2', 'sb_avaliador_situacao_3');
				if ($line = db_read($rlt)) {
					if ($line['sb_avaliador_1'] == $avaliador) { $av = 1;
					}
					if ($line['sb_avaliador_2'] == $avaliador) { $av = 2;
					}
					if ($line['sb_avaliador_3'] == $avaliador) { $av = 3;
					}
				}

				$sql = "update semic_bloco set
					 	" . $fld[$av] . " = '$sit' 
					where id_sb = " . $id;
				$this -> db -> query($sql);
			}
			$this -> avaliador_historico('SCA', $historico, $avaliador);
		}
	}

	function avaliador_convite_poster($id, $avaliador, $sit, $obs = '') {
		if ($id > 0) {
			$sql = "select * from semic_nota_trabalhos 
						where st_bloco_poster = " . $id . " 
						and (st_avaliador_1 = $avaliador or st_avaliador_2 = $avaliador)
						";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$stx = $this -> situacao_avaliador($sit);
			$historico = 'SEMIC-' . msg('convite') . ': ' . trim($stx['status']) . ' Poster:' . $id;
			if (strlen($obs) > 0) {
				$historico .= '<br><i>' . $obs . '</i>';
			}
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[0];
				$av = 0;
				$fld = array('', 'st_avaliador_situacao_1', 'st_avaliador_situacao_2');
				if ($line = db_read($rlt)) {
					if ($line['st_avaliador_1'] == $avaliador) { $av = 1;
					}
					if ($line['st_avaliador_2'] == $avaliador) { $av = 2;
					}
				}
				$ids = $line['id_st'];
				$sql = "update semic_nota_trabalhos set
					 	" . $fld[$av] . " = '$sit' 
					where id_st = " . $ids;
				$this -> db -> query($sql);
			}
			$this -> avaliador_historico('SCN', $historico, $avaliador);
		}
	}

	function mostra_agenda_aceite($id = 0, $ano = 0) {
		/* Acao */
		$acao = $this -> input -> post('acao');
		$bt_aceitar = msg('aceitar_avaliacao');
		$bt_recusar = msg('recusar_avaliacao');
		$bt_recusar_confirma = msg('recusar_avaliacao_confirma');
		if (strlen($acao) > 0) {
			$dd10 = $this -> input -> post('dd10');
			$dd11 = $this -> input -> post('dd11');
			$dd12 = $this -> input -> post('dd12');
			if ($acao == $bt_aceitar) {
				if ($dd11 == 'B') {
					$this -> avaliador_convite_oral($dd12, $id, 10);
				} else {
					$this -> avaliador_convite_poster($dd12, $id, 10);
				}
				/* Enviar e-mail */
				$this -> avaliadores -> avaliador_ativar($id);
			}
			/* Recusar convite */
			if ($acao == $bt_recusar_confirma) {
				if ($dd11 == 'B') {
					$this -> avaliador_convite_oral($dd12, $id, 9, $dd10);
				} else {
					$this -> avaliador_convite_poster($dd12, $id, 9, $dd10);
				}
				/* Enviar e-mail */
			}
			redirect(base_url('index.php/semic/aceite/'));
			exit ;
		}

		$ano2 = ($ano - 1);
		$sql = "select * from ( 
							SELECT id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 = $id 
								union 
							SELECT id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 = $id 
								union 
							SELECT id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 = $id
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						order by us_nome, sb_data, sb_hora				
				";
		$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, 
					sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome,
					sl_bloco, bl, tipo ";
		$sql = "select $cp, sum(tot) as total from ( 
							SELECT id_sb as bl, 'B' as tipo, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT id_sb as bl, 'B' as tipo, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT id_sb as bl, 'B' as tipo, sb_trabalhos as tot,id_sb as id, id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_bloco_poster as bl, 'P' as tipo, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT st_bloco_poster as bl, 'P' as tipo, 1 as tot, id_st as id, st_bloco_poster as id_bl, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						where id_us = $id
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";

		$rlt = db_query($sql);
		$rs = array();
		while ($line = db_read($rlt)) {
			array_push($rs, $line);
		}

		/* Total de convites */
		$tot = count($rs);
		if ($tot > 0) {
			$size = round(100 / $tot) . '%';
			$sx = '<table width="640" style="border: 1px solid #000000;" >';

			for ($r = 0; $r < count($rs); $r++) {
				/* imagem */
				$sx .= '<tr>';

				$sx .= '<td width="' . $size . '">';
				$sx .= '<table width="100%" border=0 >';

				$sx .= '<tr>';
				$sx .= '<td width="25%" align="right" style="font-size: 10px;">Data e hora:</td>';
				$sx .= '<td width="75%" style="font-size: 22px;"><b>' . stodbr($rs[$r]['sb_data']) . ' ' . $rs[$r]['sb_hora'] . '-' . $rs[$r]['sb_hora_fim'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Modalidade:</td>';
				$sx .= '<td style="font-size: 14px;"><b>' . $rs[$r]['sb_nome'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Bloco:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_bloco'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Local:</td>';
				$sx .= '<td style="font-size: 12px;"><b>' . $rs[$r]['sl_nome'] . '</b></td>';
				$sx .= '</tr>';

				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;"></td>';
				$sx .= '<td style="font-size: 12px;">Total de <b>' . $rs[$r]['total'] . '</b> trabalho(s) para ser(em) avaliado(s).</td>';
				$sx .= '</tr>';

				$sit = $rs[$r]['situacao'];
				$sx .= '<tr>';
				$sx .= '<td align="right" style="font-size: 10px;">Situacao:</td>';
				$rav = $this -> link_situacao_avaliador($sit);

				$sx .= '<td>';
				$sx .= $rav;
				$sx .= '<sup class="lt0">(' . $sit . ')</sup>';
				$sx .= '</td>';

				if ($sit == '1') {
					$sx .= '<tr><td align="right" style="font-size: 10px;">';
					$sx .= msg('Convite') . ':';
					$sx .= '</td>';
					$sx .= '<td>';
					$sx .= '<form action="' . base_url('index.php/semic/aceite/' . date("YmdHis")) . '" method="post">';
					$sx .= '<input type="hidden" name="dd11" value="' . $rs[$r]['tipo'] . '">';
					$sx .= '<input type="hidden" name="dd12" value="' . $rs[$r]['bl'] . '">';
					$sx .= '<input type="submit" name="acao" class="botao3d back_green back_green_shadown" value="' . $bt_aceitar . '">';
					$sx .= '&nbsp;';
					$sx .= '<input type="button" class="botao3d back_red back_red_shadown" value="' . $bt_recusar . '" onclick="$(\'#div_' . $r . '\').toggle();">';
					$sx .= '</td></tr>';

					$sx .= '<tr id="div_' . $r . '" style="display: none;" valign="top">
							<td align="right" style="font-size: 10px;">Justificativa da recusa:</td>
							<td><textarea cols=40 rows=5 name="dd10"></textarea>
							
							<br>
							<input type="submit" name="acao" value="' . $bt_recusar_confirma . '">
							</td>
						</tr>
						';
					$sx .= '<tr><td></form></td></tr>';
				}
				$sx .= '</table>';
			}
			$sx .= '</table>';
		} else {
			$sx = '';
		}

		//$this -> email_local -> enviaremail('cleybe.vieira@pucpr.br', 'Proposta de Agenda SEMIC', $sx);
		//$this -> email_local -> enviaremail('renefgj@gmail.com', 'Proposta de Agenda SEMIC', $sx);
		return ($sx);
	}

	function avaliadores_seminario($tipo = 1) {
		$ano = date("Y");
		$ano2 = (date("Y") - 1);

		/* Avaliadores */
		if ($tipo == '1') {
			$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome ";
			$sql = "select $cp, count(*) as total from ( 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT id_st as id, st_bloco_poster as id_bl, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		}

		/* Suplente */
		if ($tipo == '2') {
			$cp = "avaliador, ust_titulacao_sigla, id_us, us_nome, situacao, sb_data, sb_hora, sb_hora_fim, sl_nome, sb_nome ";
			$sql = "select $cp, count(*) as total from ( 
							SELECT id_sb as id, id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT id_st as id, st_bloco_poster as id_bl, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						group by $cp
						order by us_nome, sb_data, sb_hora				
				";
		}

		$rlt = db_query($sql);
		$sx = '<table class="tabela00 lt1" width="100%">';
		$xava = '';
		while ($line = db_read($rlt)) {
			$ava = $line['avaliador'];
			/* Avaliador */
			if ($xava != $ava) {
				$xava = $ava;
				$href = '<a href="' . base_url('index.php/semic/agenda/' . $line['id_us']) . '" target="_new" class="link">';

				$sx .= '<tr class="tabela01 lt3 border1" >';
				$sx .= '<td colspan=6>';
				$sx .= '<b>' . $href . $line['ust_titulacao_sigla'];
				$sx .= ' ';
				$sx .= $line['us_nome'] . '</a>';
				$sx .= '</b>';
				$ln = $line;
				$sx .= '</td>';
			}

			/* Situacao */
			$sx .= '<tr>';
			$rav = $this -> situacao_avaliador($line['situacao']);
			$op = 'style="background-color: ' . $rav['cor'] . '; "';
			$sx .= '<td ' . $op . ' align="center" width="120">';
			$sx .= $rav['status'];
			$sx .= '</td>';

			$sx .= '<td align="center" width="80">';
			$sx .= stodbr($line['sb_data']);
			$sx .= '</td>';

			$sx .= '<td align="center" width="80">';
			$sx .= $line['total'];
			$sx .= '</td>';

			$sx .= '<td align="center" width="80">';
			$sx .= ($line['sb_hora']);
			$sx .= ' - ';
			$sx .= ($line['sb_hora_fim']);
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $line['sl_nome'];
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $line['sb_nome'];
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function link_situacao_avaliador($op) {
		$dt = $this -> situacao_avaliador($op);
		$sx = '<font color="' . $dt['cor'] . '">' . $dt['status'] . '</font>';
		return ($sx);
	}

	function situacao_avaliador($op) {
		$sx = array();
		switch ($op) {
			case '1' :
				$sx['status'] = 'Aguardando aceite';
				$sx['cor'] = '#8080ff';
				$sx['opacity'] = '0.4';
				break;
			case '2' :
				$sx['status'] = 'Convite enviado';
				$sx['cor'] = '#80FFFF';
				$sx['opacity'] = '0.4';
				break;
			case '9' :
				$sx['status'] = 'Convite não aceito';
				$sx['cor'] = '#FF8080';
				$sx['opacity'] = '1';
				break;
			case '10' :
				$sx['status'] = 'Convite aceito';
				$sx['cor'] = '#008000';
				$sx['opacity'] = '1';
				break;
			default :
				$sx['status'] = 'Não informado';
				$sx['cor'] = '';
				$sx['opacity'] = '1';
		}
		return ($sx);
	}

	function avaliador_set($bloco, $aval_id, $nr) {
		$sit = '1';
		if ($aval_id == 0) { $sit = '0';
		}
		switch ($nr) {
			case '3' :
				$fld = 'sb_avaliador_3';
				$fld_sit = 'sb_avaliador_situacao_3';
				break;
			case '2' :
				$fld = 'sb_avaliador_2';
				$fld_sit = 'sb_avaliador_situacao_2';
				break;
			default :
				$fld = 'sb_avaliador_1';
				$fld_sit = 'sb_avaliador_situacao_1';
				break;
		}
		$sql = "update semic_bloco 
						set $fld = '$aval_id',
						$fld_sit = '$sit'
						where id_sb = " . round($bloco);
		$this -> db -> query($sql);
		return ('');
	}

	function avaliador_poster_set($bloco, $aval_id, $nr) {
		$sit = '1';
		if ($aval_id == 0) { $sit = '0';
		}
		switch ($nr) {
			case '2' :
				$fld = 'st_avaliador_2';
				$fld_sit = 'st_avaliador_situacao_2';
				break;
			default :
				$fld = 'st_avaliador_1';
				$fld_sit = 'st_avaliador_situacao_1';
				break;
		}
		$sql = "update semic_nota_trabalhos 
						set $fld = '$aval_id',
						$fld_sit = '$sit'
						where id_st = " . round($bloco);
		$this -> db -> query($sql);
		return ('');
	}

	function avaliadores_indicar($aval, $bloco, $nr_avaliador, $frame = 'bloco_avaliador') {
		$sx = '<table width="100%" class="tabela00">';

		$link = base_url('/index.php/semic/' . $frame . '/' . $bloco . '/' . $nr_avaliador . '/' . checkpost_link($bloco) . '/0/SET');
		$href = '<a href="' . $link . '" class="link">[remover]</a>';
		$sx .= '<tr>';
		$sx .= '<td align="center" width="30">' . $href . '</td>';
		$sx .= '<td>** remover indicação **</td>';
		$sx .= '<td>-</td>';
		$sx .= '<td align="center" width="30">-</td>';
		$sx .= '</tr>';

		$sx .= '<tr><th>acao</th>
					<th>avaliadores</th>
					<th>perfil</th>
					<th>Oral</th>
					<th>Pôster</th>
				</tr>';
		for ($r = 0; $r < count($aval); $r++) {
			$line = $aval[$r];

			$link = base_url('/index.php/semic/' . $frame . '/' . $bloco . '/' . $nr_avaliador . '/' . checkpost_link($bloco) . '/' . $line['id_us'] . '/SET');
			$href = '<a href="' . $link . '" class="link">[indicar]</a>';

			$sx .= '<tr>';
			$sx .= '<td align="center" width="30">' . $href . '</td>';
			$sx .= '<td>' . $line['ust_titulacao_sigla'] . ' ' . $line['us_nome'] . '</td>';
			$sx .= '<td>' . usuario_tipo($line['usuario_tipo_ust_id']) . '</td>';
			$sx .= '<td align="center" width="30">' . $line['oral'] . '</td>';
			$sx .= '<td align="center" width="30">' . $line['poster'] . '</td>';
			$sx .= '</tr>';
		}
		return ($sx);
	}

	function avaliadores_area($areas, $orientadores) {
		$wh = '';
		$wh_prof = '';
		$ano = date("Y");
		$ano2 = ($ano - 1);
		/* AREAS */
		foreach ($areas as $key => $value) {
			if (strlen($wh) > 0) { $wh .= ' or ';
			}
			$wh .= " (pa_area = '" . trim($key) . "') ";
		}
		/* Orientadores */
		foreach ($orientadores as $key => $value) {
			if (strlen($wh_prof) > 0) { $wh_prof .= ' or ';
			}
			$wh_prof .= " (pa_cracha = '" . trim($key) . "') ";
		}

		$sql = "select * from (
							select pa_parecerista from us_avaliador_area 
							where pa_ativo = 1
							and ($wh) and not ($wh_prof)
							group by pa_parecerista
						) as avaliadores 
						inner join us_usuario on pa_parecerista = id_us
						inner join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join (
							select avaliador, count(*) as oral from (
									SELECT sb_avaliador_1 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0
									union 
									SELECT sb_avaliador_2 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0
									union 
									SELECT sb_avaliador_3 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
									) as total group by avaliador
								) as indicacoes on avaliador = id_us
						left join (
							select avaliador_poster, count(*) as poster from (
									SELECT id_st, st_avaliador_1 as avaliador_poster FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0
									union 
									SELECT id_st, st_avaliador_2 as avaliador_poster FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0
									) as total group by avaliador_poster
								) as indicacoes_2 on avaliador_poster = id_us								
						where us_avaliador > 0
						order by us_nome
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			array_push($aval, $line);
		}
		return ($aval);
	}

	function orientadores_bloco($ida) {
		$sql = "select st_professor from semic_nota_trabalhos 
							where st_bloco = " . $ida . "
							group by st_professor ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$key = $line['st_professor'];
			$aval[$key] = '1';
		}
		return ($aval);
	}

	function areas_bloco($ida) {
		$sql = "select st_area_geral from semic_nota_trabalhos 
							where st_bloco = " . $ida . "
							group by st_area_geral ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$key = $line['st_area_geral'];
			$aval[$key] = '1';
		}
		return ($aval);
	}

	function lista_trabalhos($prof) {
		$sql = "select * from semic_nota_trabalhos
							left join us_usuario on us_cracha = st_aluno 
							where st_professor = '$prof' ";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela01 lt1">';
		while ($line = db_read($rlt)) {
			$sx .= $this -> show_small($line);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function tipo_apresentacao($line) {
		$sx = '<font color="red">não indicado</font>';
		if ($line['st_poster'] == 'S') { $sx = 'pôster';
		}
		if ($line['st_oral'] == 'S') { $sx = 'oral';
		}
		if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) { $sx = 'oral/pôster';
		}
		return ($sx);
	}

	function show_small($line, $tipo = 1) {
		$idt = trim($line['st_section']);
		$idt .= trim($line['st_nr']);

		/* Links */
		$link = '<A href="' . base_url('index.php/ic/view/' . $line['st_codigo'] . '/' . checkpost_link($line['st_codigo'])) . '" class="link lt1">';
		$link_dis = '<A href="' . base_url('index.php/estudante/view/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="link lt1">';

		$sx = '';
		if (trim($line['st_edital']) == 'PIBITI') { $idt .= 'T';
		}
		if (trim($line['st_eng']) == 'S') { $idt = 'i' . $idt;
		}

		/* Apresentado */
		switch ($line['st_apresentado']) {
			case (1) :
				$sa = 'Apresentado';
				break;
			case (0) :
				$sa = '<font color="red">Não apresentou</font>';
				break;
			default :
				$sa = 'não informado';
				break;
		}
		switch ($tipo) {
			case 1 :
				$sx .= '<tr>';
				$sx .= '<td align="center">' . $line['st_edital'] . '</td>';
				$sx .= '<td align="center">' . $link . $line['st_codigo'] . '</a>' . '</td>';
				$sx .= '<td>' . $idt . '</td>';
				$sx .= '<td align="center">' . $this -> tipo_apresentacao($line) . '</td>';
				$sx .= '<td>' . $link_dis . $line['us_nome'] . '</A>' . '</td>';
				$sx .= '<td align="center">' . $line['st_ano'] . '</td>';
				$sx .= '<td>' . $sa . '</td>';
				$sx .= cr();
		}
		return ($sx);
	}

}
