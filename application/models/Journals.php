<?php
class journals extends CI_model {
	
	function search_issn_scimago($issn)
		{
			$issn = troca($issn,'-','');	
			$site = 'http://www.scimagojr.com/journalsearch.php?q='.$issn.'&tip=iss';
			$txt = load_page($site);
			
			$text = $line['content'];
			echo '<pre>';
			print_r($txt);
			echo '</pre>';
			$s1 = '<strong>ISSN</strong>:';
			$s2 = '<strong>Coverage</strong>:';
		}
	function country() {
		$sql = "select * from pais where 1=1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$country = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$pais = $line['nome_en'];
			$id = $line['iso3'];
			$country[$pais] = $id;
		}
		return ($country);
	}

	function inserir_journal($issn, $name, $tipo, $country) {
		$issn = trim($issn);
		$issn = troca($issn, '-', '');
		$issn = substr($issn, 0, 4) . '-' . substr($issn, 4, 4);
		$sql = "select * from journals where jnl_issn = '$issn' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			$sql = "insert into journals 
							(jnl_issn, jnl_name, jnl_type, jnl_country)
							values
							('$issn','$name','$tipo','$country') ";
			$this -> db -> query($sql);
			return (1);
		} else {
			if (strlen($country) > 0) {
				$line = $rlt[0];
				$sql = "update journals
								set jnl_country = '$country' 
							where id_jnl = " . $line['id_jnl'];
				$this -> db -> query($sql);
				return (0);
			}
		}

	}

	function process_scimagos($offset) {
		$country_ar = $this -> country();
		$sql = "select * from scimago limit 500 offset $offset ";
		$rlt = db_query($sql);
		$sx = '<table width="100%">';
		$sx .= '<tr>
					<th class="borderb1">pos</th>
					<th class="borderb1">ISSN</th>
					<th class="borderb1">Journal</th>
					<th class="borderb1">Country</th>
					<th class="borderb1">Type</th>
					<th class="borderb1">Status</th>
					</tr>';
		$id = 0;
		while ($line = db_read($rlt)) {
			$id++;
			$issn = $line['issn'];
			$name = troca($line['titulo'], "'", "´");
			$tipo = $line['tipo'];
			$co = trim($line['pais']);

			if (isset($country_ar[$co])) {
				$country = $country_ar[$co];
			} else {
				if (strlen($co) > 0)
					{
					echo '['.$co.']';
					echo '<HR>';
					exit;
					}
				$country = '';
			}

			$rs = $this -> inserir_journal($issn, $name, $tipo, $country);
			$sx .= '<tr>';
			$sx .= '<td align="center">' . $id . '</td>';
			$sx .= '<td align="center">' . $issn . '</td>';
			$sx .= '<td>' . $name . '</td>';
			$sx .= '<td>' . $country . '</td>';
			$sx .= '<td align="center">' . $tipo . '</td>';

			if ($rs == 1) {
				$sx .= '<td align="center"><font color="blue">Criado</A></td>';
			} else {
				$sx .= '<td align="center"><font color="orange">Ignorado</A></td>';
			}
		}
		$sx .= '</table>';
		if ($id > 0) {
			$sx .= '<meta http-equiv="refresh" content="5;' . base_url('index.php/journal/process_scimago/' . ($offset + $id)) . '">';
		}
		return ($sx);
	}

	function process($offset) {
		$sql = "select * from webqualis limit 100 offset $offset ";
		$rlt = db_query($sql);
		$sx = '<table width="100%">';
		$sx .= '<tr>
					<th class="borderb1">pos</th>
					<th class="borderb1">ISSN</th>
					<th class="borderb1">Journal</th>
					<th class="borderb1">Type</th>
					<th class="borderb1">Status</th>
					</tr>';
		$id = 0;
		while ($line = db_read($rlt)) {
			$id++;
			$issn = $line['issn'];
			$name = troca($line['titulo'], "'", "´");
			$tipo = 'j';
			$country = 0;

			$rs = $this -> inserir_journal($issn, $name, $tipo, $country);
			$sx .= '<tr>';
			$sx .= '<td align="center">' . $id . '</td>';
			$sx .= '<td align="center">' . $issn . '</td>';
			$sx .= '<td>' . $name . '</td>';
			$sx .= '<td align="center">' . $tipo . '</td>';

			if ($rs == 1) {
				$sx .= '<td align="center"><font color="blue">Criado</A></td>';
			} else {
				$sx .= '<td align="center"><font color="orange">Ignorado</A></td>';
			}
		}
		$sx .= '</table>';
		if ($id > 0) {
			$sx .= '<meta http-equiv="refresh" content="5;' . base_url('index.php/journal/process_qualis/' . ($offset + $id)) . '">';
		}
		return ($sx);
	}

}
?>
