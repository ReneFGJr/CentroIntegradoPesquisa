<?php
class semic_salas extends CI_Model {
	var $tabela = 'semic_salas';
	var $tabela_bloco = 'semic_bloco';
	var $tabela_status = 'semic_bloco_situacao';
	var $tabela_tipo_apresentacao = 'semic_tipo_apresentacao';
	
	function referencia($line)
		{
			$sc = '';
			if (trim($line['st_eng'])=='S')
				{
					$sc .= 'i';
				}
			
			$sc .= $line['st_section'];
			$sc .= $line['st_nr'];
			if (trim($line['st_edital'])=='PIBITI')
				{
					$sc .= 'T';
				}
			return($sc);
		}

	function row($obj) {
		$obj -> fd = array('id_sl', 'sl_nome', 'sl_bloco');
		$obj -> lb = array('ID', 'Nome', 'Bloco');
		$obj -> mk = array('', 'L', 'C', 'L');
		return ($obj);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sl', '', False, True));
		array_push($cp, array('$S100', 'sl_nome', msg('nome'), True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'sl_ativo', msg('ativo'), True, True));
		array_push($cp, array('$T80:5', 'sl_descricao', msg('descricao'), False, True));
		array_push($cp, array('$S40', 'sl_bloco', msg('bloco'), False, True));
		array_push($cp, array('$S7', 'sl_cor', msg('cor'), False, True));
		array_push($cp, array('$[1-30]', 'sl_ordem', msg('ordem'), False, True));
		return ($cp);
	}

	function cp_bloco() {
		$h = '';
		$hi = 8;
		$him = 0;
		$hora = '';
		for ($r = 0; $r < 55; $r++) {
			if (strlen($hora) > 0) {
				$h .= '&';
			}
			$hora = strzero($hi, 2) . 'h' . strzero($him, 2);
			$him = $him + 15;
			if ($him >= 60) { $him = 0;
				$hi++;
			}
			$h .= $hora . ':' . $hora;
		}

		$cp = array();
		$sql_sala = 'id_sl:sl_nome:select * from semic_salas order by sl_nome';
		$sql_tipo = 'id_st:st_nome:select * from semic_tipo_apresentacao order by st_nome';
		$sql_situ = 'id_sbs:sbs_nome:select * from semic_bloco_situacao order by sbs_nome';
		array_push($cp, array('$H8', 'id_sb', '', False, True));
		array_push($cp, array('$S100', 'sb_nome', msg('titulo'), True, True));
		array_push($cp, array('$Q ' . $sql_sala, 'sb_sala', msg('sala'), True, True));
		array_push($cp, array('$D8', 'sb_data', msg('data'), False, True));
		array_push($cp, array('$O ' . $h, 'sb_hora', msg('hora_inicio'), True, True));
		array_push($cp, array('$O ' . $h, 'sb_hora_fim', msg('hora_fim'), True, True));
		array_push($cp, array('$Q ' . $sql_tipo, 'sb_tipo', msg('tipo'), True, True));
		array_push($cp, array('$Q ' . $sql_situ, 'sb_situacao', msg('situacao'), False, True));
		array_push($cp, array('$[2015-' . date("Y") . ']D', 'sb_ano', msg('ano'), False, True));
		return ($cp);
	}

	function mostra_bloco($id = 0, $area = '', $nr = '',$acao) {

		if (strlen($nr) > 0) {
			if ($acao == 'ADD')
				{
				$sql = "update semic_nota_trabalhos set st_bloco = $id where id_st = $nr ";
				$this -> db -> query($sql);
				} 
			if ($acao == 'DEL')
				{
				$sql = "update semic_nota_trabalhos set st_bloco = 0 where id_st = $nr ";
				$this -> db -> query($sql);
				} 
		}
		$ano = (date("Y") - 1);
		$sql = "select * from semic_bloco 
						where id_sb = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$sl = '';
		$sl .= $line['sb_data'];
		$sl .= ' ';
		$sl .= $line['sb_hora'];
		$sl .= ' ';
		$sl .= $line['sb_nome'];

		$sql = "select count(*) as total, st_section from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = 0 or st_bloco is null)
					group by st_section
					";
		$rlt = db_query($sql);

		$sa = '<table class="tabela00">';
		$tot = 0;
		while ($line = db_read($rlt)) {
			$tot++;
			$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '">';
			$sa .= '<tr>';
			$sa .= '<td>';
			$sa .= $href . $line['st_section'] . '</A>';
			$sa .= '</td>';
			$sa .= '<td>';
			$sa .= $href . $line['total'] . '</A>';
			$sa .= '</td>';
			$sa .= '</tr>';
		}
		$sa .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
		$sa .= '</table>';

		/******************* SEM BLOCO *******************/
		$sb = '<table class="tabela00">';
		if (strlen($area) > 0) {
			$sql = "select * from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = 0 or st_bloco is null)
					and st_section = '$area'
					order by lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			while ($line = db_read($rlt)) {
				$tot++;
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/ADD">';
				$sb .= '<tr>';
				$sb .= '<td>';
				$sb .= $href . $this->referencia($line). '</A>';
				$sb .= '</td>';
				$sb .= '</tr>';

			}
		}
		$sb .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
		$sb .= '</table>';

		/******************* NO BLOCO *******************/
		$total = 0;
		$sc = '';
		if (strlen($id) > 0) {
			$sc = '<table class="tabela00">';
			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = $id)
					order by lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			while ($line = db_read($rlt)) {
				$total++;
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL">';
				$sc .= '<tr>';
				$sc .= '<td>';
				$sc .= $href . $this->referencia($line). '</A>';
				$sc .= '</td>';
				
				$sc .= '<td>';
				$sc .= $href . $line['us_nome']. '</A>';
				$sc .= '</td>';

				$sc .= '</tr>';
			}
			$sc .= '<tr><td colspan=2>Total ' . $total . '</td></tr>';
			$sc .= '</table>';
		}

		/******************* EM OUTROS BLOCS *******************/
		$totax = 0;
		$sd = '';
		if (strlen($id) > 0) {
			$sd = '<table class="tabela00">';
			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					left join semic_bloco on id_sb = st_bloco
					left join semic_salas on id_sl = sb_sala
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco <> $id and st_bloco <> 0) and (st_section = '".$area."')
					order by sb_sala, sb_data, sb_hora, lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			$xsl = '';
			while ($line = db_read($rlt)) {
				$sl = $line['sl_nome'];
				$totax++;
				
				if ($sl != $xsl)
					{
						$xsl = $sl;
						$sd .= '<tr>
								<td colspan=5 class="lt3">
								'.$sl.'
								</td>
								</tr>';
					}
				
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL">';
				$sd .= '<tr>';
				$sd .= '<td>';
				$sd .= $href . $this->referencia($line). '</A>';
				$sd .= '</td>';
				
				$hrefa = '<a href="' . base_url('index.php/semic/bloco_view/' . $line['id_sb'] . '/' . 
								checkpost_link($line['id_sb'])).'">';
												
				
				$sd .= '<td>'.$hrefa.$line['sb_data'].'</a></td>';
				$sd .= '<td>'.$hrefa.$line['sb_hora'].'</a></td>';
				
				$sd .= '<td>';
				$sd .= $href . $line['us_nome']. '</A>';
				$sd .= '</td>';

				$sd .= '</tr>';
			}
			$sd .= '<tr><td colspan=2>Total ' . $totax . '</td></tr>';
			$sd .= '</table>';
		}

		$sr = '<table width="100%" border=1 align="center">';
		$sr .= '<tr valign="top">';
		$sr .= '<td width="25%"><h2>Áreas abertas</h2>' . $sa . '</td>';
		$sr .= '<td width="25%"><h2>Não indicados</h2>' . $sb . '</td>';
		$sr .= '<td width="50%"><h2>Indicados</h2>' . $sc . $sd .'</td>';
		$sr .= '</table>';
		
		$sql = "update " . $this -> tabela_bloco . " set sb_trabalhos = '$total' where id_sb = $id ";
		$this -> db -> query($sql);
		return ($sl.$sr);
	}

	function mostra_blocos($ano = '') {
		if (strlen($ano) == 0) { $ano = date("Y");
		}
		$sql = "select distinct sb_data from " . $this -> tabela_bloco . " where EXTRACT(YEAR FROM sb_data) = " . $ano;
		$rlty = $this -> db -> query($sql);
		$rlty = $rlty -> result_array();
		$sx = '';
		for ($l = 0; $l < count($rlty); $l++) {
			$data = $rlty[$l]['sb_data'];
			$sx .= '<h1>' . $data . '</h1>';
			$sx .= $this -> mostra_blocos_data($data);
		}
		return ($sx);
	}

	function mostra_blocos_data($data = '') {
		$salas = 10;
		$horai = '08h00';
		$horaf = '20h00';

		$sql = "select * from " . $this -> tabela_bloco . "
					left join " . $this -> tabela . " on id_sl = sb_sala 
					left join " . $this -> tabela_status . " on id_sbs = sb_situacao
					left join " . $this -> tabela_tipo_apresentacao . " on id_st = sb_tipo
					where sb_data = '$data'
					order by sb_data, sl_ordem, sb_hora
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00"><tr valign="top">';
		$xsala = '';

		/* Horas do Sistema */
		$hr = array();
		$hrr = array();
		$hi = 8;
		$him = 0;
		for ($r = 0; $r < 55; $r++) {
			$hora = strzero($hi, 2) . 'h' . strzero($him, 2);
			$him = $him + 15;
			if ($him >= 60) { $him = 0;
				$hi++;
			}
			$hr[$hora] = $r;
			$hrr[$r] = $hora;
		}

		/* Matrix de Salas / Hora */
		$matrix = array();
		$matrix_hr = array();
		$matrix_cor = array();
		$matrix_bgcor = array();

		/* Gera tabela */
		$blocos = array();
		$sh = '<tr><th></th>';
		$err = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Dados */
			$hi = $line['sb_hora'];
			$hf = $line['sb_hora_fim'];
			$id_hi = $hr[$hi];
			$id_hf = $hr[$hf];
			$idb = $line['id_sb'];
			$id_sl = (round($line['sl_ordem']) - 1);

			//echo '<BR>' . $hi . '-[' . $id_hi . '] == ' . $hf . '-' . $id_hf . '-[' . $id_sl . ']';

			$matrix_cor[$id_hi][$id_sl] = $line['sbs_cor'];
			$matrix_bgcor[$id_hi][$id_sl] = $line['st_cor'];
			for ($y = $id_hi; $y < $id_hf; $y++) {
				//$matrix[$y][$id_sl] = '';
				if (isset($matrix_hr[$y][$id_sl])) {
					$err .= '<BR>Conflito de horário :' . $line['sl_nome'] . ' - ' . $hi;
					$err .= ' | <A HREF="' . base_url('index.php/semic/bloco_edit/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="nopr">';
					$err .= msg('editar');
					$err .= '</A>';

				}
				$matrix_hr[$y][$id_sl] = 0;
			}
			$matrix[$id_hi][$id_sl] = $idb;
			$matrix_hr[$id_hi][$id_sl] = ($id_hf - $id_hi);

			$sala = $line['id_sl'];
			if ($xsala != $sala) {
				$sh .= '<th>' . $line['sl_nome'] . '</th>';
				$xsala = $sala;
			}
			$sa = '';
			//$sa = $line['sb_hora'] . '-' . $line['sb_hora_fim'];
			//$sa .= '<BR>';
			$sa .= '<A HREF="' . base_url('index.php/semic/bloco_view/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="link">';
			$sa .= '<font class="lt3">';
			$sa .= '<b>' . $line['sb_nome'] . '</b>';
			$sa .= '</font>';
			$sa .= '</a>';

			$sa .= '<BR><font class="lt0">';
			$sa .= '<A HREF="' . base_url('index.php/semic/bloco_edit/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="nopr">';
			$sa .= msg('editar');
			$sa .= '</A>';
			$sa .= '</font>';
			
			$tot = $line['sb_trabalhos'];
			if ($tot > 0)
				{
					$sa .= '<br><center><font class="lt5">'.$tot.'</font></center>';
				}
			$blocos[$idb] = $sa;
		}
		$sx .= '</table>';

		$sx .= '<table width="100%" cellpadding=5 cellspacing=1 class="lt0" border=0>';
		$sx .= '<tr><td></td>' . $sh;
		$sx .= '</tr>';

		for ($y = 0; $y < count($hrr); $y++) {

			$sx .= '<tr valign="top">';
			$sx .= '<td>';
			$sx .= $hrr[$y];
			$sx .= '</td>';

			$size = round(96 / ($salas));
			for ($r = 0; $r < $salas; $r++) {
				if (isset($matrix[$y][$r])) {
					$bcor = $matrix_cor[$y][$r];
					$bgcor = $matrix_bgcor[$y][$r];
					$rowc = $matrix_hr[$y][$r];
					if ($rowc > 0) {
						$sx .= '<td rowspan="' . $rowc . '" width="' . $size . '%" class="border1" style="background-color: ' . $bgcor . '; border-left: 10px solid ' . $bcor . '">';
					}
					//$sx .= $y . 'x' . $r;
					$idx = $matrix[$y][$r];
					$sx .= $blocos[$idx];
					$sx .= '</td>';
				} else {
					if (isset($matrix_hr[$y][$r])) {
						//$sx .= '<td>x</td>';
					} else {
						$sx .= '<td width="' . $size . '%" class="border0">&nbsp;';
						//$sx .= $y . 'x' . $r;
						$sx .= '</td>';
					}
				}
			}
		}
		$sx .= '</table>';

		$sx = '<font color="red">' . $err . '</font>' . $sx;
		return ($sx);
	}

	function botao_novo_bloco() {
		/* Submit Buttom */
		$sx = form_open('semic/bloco_edit/0/0');
		$data = array('name' => 'acao', 'class' => 'estilo-botao nopr', 'id' => 'semic_bloco', 'value' => msg('novo bloco'));
		$sx .= form_submit($data);
		$sx .= form_close();
		return ($sx);
	}

}
?>
