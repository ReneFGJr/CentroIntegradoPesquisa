<?php
class variaveis extends CI_model {
	var $tabela = "variaveis";
	var $tabela_dados = "variaveis_dados";
	function row($obj) {
		$obj -> fd = array('id_v', 'v_nome', 'v_variavel');
		$obj -> lb = array('ID', 'Nome', 'Variavel');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}

	function recupera_dados($var, $filtro) {
		$sql = "select * from " . $this -> tabela . " 
						inner join " . $this -> tabela_dados . " on id_v = d_variavel	
						where v_variavel = '$var' 
						and d_fld1 = '$filtro'			
			";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$rs = array();
		$rs['l1'] = '';
		$rs['l2'] = '';
		$rs['l3'] = '';
		$cb = array('', '', '', '', '', '');
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$rs['title'] = trim($line['v_nome_grafico']);
			if (strlen($rs['title'])==0)
				{
					$rs['title'] = trim($line['v_nome']);
				}
			$rs['base'] = trim($line['d_fld1']);
			$cb[4] = trim($line['v_col_04']);
			$cb[5] = trim($line['v_col_05']);
			$cb[6] = trim($line['v_col_06']);
			
			if (strlen($cb[4]) > 0) {
				$fld = $cb[4];
				$vlr = $line['d_fld4'];
				$rs['v1'] = $vlr;
				$rs['l1'] = $fld;
			}
			if (strlen($cb[5]) > 0) {
				$fld = $cb[5];
				$vlr = $line['d_fld5'];
				$rs['v2'] = $vlr;
				$rs['l2'] = $fld;
			}
			if (strlen($cb[6]) > 0) {
				$fld = $cb[6];
				$vlr = $line['d_fld6'];
				$rs['v3'] = $vlr;
				$rs['l3'] = $fld;
			}
		}
		return($rs);
	}

	function cp_dados($tp = 0) {
		if ($tp == 0) {
			return ( array());
		}

		$sql = "select * from " . $this -> tabela . " where id_v = " . $tp;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$line = $rlt[0];

		$cp = array();
		array_push($cp, array('$H8', 'id_d', '', False, True));
		array_push($cp, array('$HV', 'd_variavel', $tp, True, True));
		array_push($cp, array('$S20', 'd_fld1', $line['v_col_01'] . ':', True, True));
		if (strlen($line['v_col_02']) > 0) {
			array_push($cp, array('$S20', 'd_fld2', $line['v_col_02'] . ':', False, True));
		}
		if (strlen($line['v_col_03']) > 0) {
			array_push($cp, array('$S20', 'd_fld3', $line['v_col_03'] . ':', False, True));
		}
		if (strlen($line['v_col_04']) > 0) {
			array_push($cp, array('$S20', 'd_fld4', $line['v_col_04'] . ':', False, True));
		}
		if (strlen($line['v_col_05']) > 0) {
			array_push($cp, array('$S20', 'd_fld5', $line['v_col_05'] . ':', False, True));
		}
		if (strlen($line['v_col_06']) > 0) {
			array_push($cp, array('$S20', 'd_fld6', $line['v_col_06'] . ':', False, True));
		}
		array_push($cp, array('$U', 'd_update', '', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO&9:Cancelado', 'd_lock', msg('travado'), True, True));

		array_push($cp, array('$B', '', msg('gravar dados'), false, True));

		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " where id_v = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$line = $rlt[0];

		$line['dados_indicador'] = $this -> le_dados($id, $line);
		$line['graficos_indicador'] = '';
		return ($line);
	}

	function le_dados($id, $line) {
		$edit = 1;
		$sql = "select * from " . $this -> tabela_dados . " 
					where d_variavel = " . round($line['id_v']) . "
					and d_lock <> '9'
					order by d_fld1, d_fld2, d_fld3, d_fld4
			";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$totalizar = round($line['v_total']);
		$sx = '';
		$show = array(0, 0, 0, 0, 0, 0, 0);
		if (strlen($line['v_col_01']) > 0) { $show[1] = True;
		}
		if (strlen($line['v_col_02']) > 0) { $show[2] = True;
		}
		if (strlen($line['v_col_03']) > 0) { $show[3] = True;
		}
		if (strlen($line['v_col_04']) > 0) { $show[4] = True;
		}
		if (strlen($line['v_col_05']) > 0) { $show[5] = True;
		}
		if (strlen($line['v_col_06']) > 0) { $show[6] = True;
		}

		$sx .= '<table width="100%" class="tabela01 lt1">';
		$sx .= '<tr>';
		if ($show[1]) { $sx .= '<th>' . $line['v_col_01'] . '</th>';
		}
		if ($show[2]) { $sx .= '<th>' . $line['v_col_02'] . '</th>';
		}
		if ($show[3]) { $sx .= '<th>' . $line['v_col_03'] . '</th>';
		}
		if ($show[4]) { $sx .= '<th>' . $line['v_col_04'] . '</th>';
		}
		if ($show[5]) { $sx .= '<th>' . $line['v_col_05'] . '</th>';
		}
		if ($show[6]) { $sx .= '<th>' . $line['v_col_06'] . '</th>';
		}
		if ($totalizar == 1) {
			$sx .= '<th>Total</th>';

		}
		$sx .= '<th>-</th>';
		$sx .= '</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			if ($show[1]) {
				$sx .= '<td align="center">';
				$sx .= $line['d_fld1'];
				$sx .= '</td>';
			}

			if ($show[2]) {
				$sx .= '<td align="left">';
				$sx .= $line['d_fld2'];
				$sx .= '</td>';
			}

			if ($show[3]) {
				$sx .= '<td align="left">';
				$sx .= $line['d_fld3'];
				$sx .= '</td>';
			}

			if ($show[4]) {
				$sx .= '<td align="center">';
				$sx .= $line['d_fld4'];
				$sx .= '</td>';
			}

			if ($show[5]) {
				$sx .= '<td align="center">';
				$sx .= $line['d_fld5'];
				$sx .= '</td>';
			}
			if ($show[6]) {
				$sx .= '<td align="center">';
				$sx .= $line['d_fld6'];
				$sx .= '</td>';
			}

			if ($totalizar == 1) {
				$sx .= '<td align="center"><B>' . ((round(100 * $line['d_fld4']) + round(100 * $line['d_fld5']) + round($line['d_fld6'] * 100)) / 100) . '<B></td>';
			}

			$lock = $line['d_lock'];
			if (($lock == '1') or ($edit == 0)) {
				$link = '';
			} else {
				$link = '<img src="' . base_url('img/icon/icone_editar.png') . '" border=0 height="16">';
				$link = '<a href="' . base_url('index.php/indicadores/variavel_edit/' . $line['id_d'] . '/' . $line['d_variavel'] . '/' . checkpost_link($line['id_d'])) . '">' . $link . '</A>';
			}
			$sx .= '<td align="center">';
			$sx .= $link;
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);

	}

}
?>
