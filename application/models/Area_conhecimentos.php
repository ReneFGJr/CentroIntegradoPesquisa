<?php
Class Area_conhecimentos extends CI_Model {
	function form_areas($v = '', $id = '') {
		$sql = "SELECT * from area_conhecimento
						WHERE  not ((ac_cnpq like '9%') or (ac_cnpq like '0%'))
						and ac_ativo = 1
						order by ac_cnpq ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<select size=15 name="' . $v . '" class="lt2" style="width: 100%">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cnpq = trim($line['ac_cnpq']);
			$chk = '';
			$sx .= cr();
			$ok = 1;

			/* Estilos */
			if ($line['ac_semic'] == '0') { $ok = 0;
			}
			if (strlen(trim($line['ac_cnpq'])) == 0) { $ok = 0;
			}

			$chk = ' class="lt2" style="margin: 3px 0px 3px 20px; " ';

			if (substr($cnpq, 5, 2) == '00') {
				$chk = ' class="lt3 borderb1" style="margin-top: 10px; margin-left: 10px;" ';
			}

			if (substr($cnpq, 2, 2) == '00') {
				$chk = ' class="lt4 border1" disabled style="margin: 10px 0px 5px 0px; background-color: #CCC; color:000; "';
				$ok = 1;
			}

			if ($ok == 1) {
				$sx .= '<option value="' . $cnpq . '" ' . $chk . '>' . $cnpq . ' ' . $line['ac_nome_area'] . '</option>';
			}
		}
		$sx .= '</select>';
		return ($sx);
	}

}
?>
