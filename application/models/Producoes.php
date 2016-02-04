<?php
class producoes extends CI_model {
	var $qualis_ano = '2014';

	function producao_perfil_grafico($cpf, $area = 0) {
		$qualis = $this -> qualis_ano;
		$cpf = strzero(sonumero($cpf),11);

		$sql = "select * from area_avaliacao where id_area = $area";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$line = $rlt[0];
		$area_nome = $line['area_avaliacao_nome'];

		$sql = "select * from us_usuario where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			/* CPF do usuário nao localizado */
			return('CPF não relaciona com o professor '.$cpf);
		}
		$line = $rlt[0];
		$nome = $line['us_nome'];
		$nome_lattes = $line['us_nome_lattes'];

		$sql = "select * from cnpq_acpp
							left join 
								(select distinct wq_issn_l, area_id, ano, estrato from webqualis ) as qualis 
								on wq_issn_l = acpp_issn_link and area_id = $area and ano = '$qualis'
							left join area_avaliacao on id_area = area_id
							where acpp_autor = '$nome_lattes' 
							order by acpp_ano desc
							";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$qualis = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
		$q = array('A1' => 0, 'A2' => 1, 'B1' => 2, 'B2' => 3, 'B3' => 4, 'B4' => 5, 'B5' => 6, 'C' => 7, '' => 8);
		$scimago = array(0, 0, 0, 0);
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$qu = trim($line['estrato']);
			$qu = $q[$qu];
			$qualis[$qu] = $qualis[$qu] + 1;
		}
		$sx = '<table width="200" class="lt0 border1" >';
		$sx .= '<tr><th colspan=10>' . $area_nome . '</th></tr>';
		$sx .= '<tr valign="bottom" align="center">';
		$sx .= '<td height="80" rowspan=2></td>';
		for ($r = 0; $r < count($qualis); $r++) {
			$qt = $qualis[$r];
			if ($qt > 20) {
				$size = 20 * 3;
			} else {
				$size = $qt * 3;
			}

			$sx .= '<td style="min-height: 100px;">';
			$sx .= $qualis[$r] . '<br>';
			$sx .= '<img src="' . base_url('img/ss/gr_' . strzero($r, 2) . '.png') . '" width="20" height="' . $size . '">';
			$sx .= '</td>';
		}
		$sx .= '<tr align="center">
					<td height="5">A1</td><td>A2</td><td>B1</td><td>B2</td><td>B3</td><td>B4</td><td>B5</td>
					<td>C</td><td>n.c.</td>
				</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function producao_perfil($cpf, $area = 0) {
		$qualis = $this -> qualis_ano;
		$sql = "select * from us_usuario where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$nome = $line['us_nome'];
				$nome_lattes = $line['us_nome_lattes'];

				$sql = "select * from cnpq_acpp
							left join (select distinct wq_issn_l, area_id, ano, estrato from webqualis ) as qualis
							on wq_issn_l = acpp_issn_link and area_id = $area and ano = '$qualis'
							left join area_avaliacao on id_area = area_id
							left join (SELECT min(sjr_quartile) as quartil, issn_l as sc_issn_l FROM scimago WHERE 1 group by issn_l) as scimago on sc_issn_l = acpp_issn_link 
							where acpp_autor = '$nome_lattes' 
							order by acpp_ano desc
							";
				$rlt2 = $this -> db -> query($sql);
				$rlt2 = $rlt2 -> result_array();
				$sx = '<table width="100%" class="lt1">';
				$sh = '<tr class="lt0">
							<th></th>
							<th>publicação</th>
							<th><span title="Qualis Periódicos - CAPES">Qualis</span></th>
							<th><span title="Scimago Journal & Country Rank">SJR</span></th>
							<th><span title="Journal Citation Report">JCR</span></th>
					   </tr>';
				$xano = '';
				for ($r2 = 0; $r2 < count($rlt2); $r2++) {
					$line2 = $rlt2[$r2];

					/* Header */
					$ano = $line2['acpp_ano'];
					if ($xano != $ano) {
						$sx .= '<tr>';
						$sx .= '<td align="left" class="lt2" colspan=10>';
						$sx .= '<br><b>' . $line2['acpp_ano'] . '</b>';
						$sx .= '</td>';
						$xano = $ano;

						$sx .= $sh;
					}

					$sx .= '<tr><td width="15">&nbsp;</td>';
					$sx .= '<td align="left" class="border1">';

					/* Autores */
					$sx .= $line2['acpp_autores'] . '. ';

					/* Titulo do Trabalho */
					$sx .= $line2['acpp_titulo'] . '. ';

					/* Periódico */
					$sx .= '<b>' . $line2['acpp_periodico'] . '</b>';

					if (strlen($line2['acpp_volume'])) {
						$sx .= ', v. ' . $line2['acpp_volume'];
					}
					if (strlen($line2['acpp_fasciculo'])) {
						$sx .= ', n. ' . $line2['acpp_fasciculo'];
					}

					if (strlen($line2['acpp_pg_ini'])) {
						$sx .= ', p.' . trim($line2['acpp_pg_ini']);
						if (strlen($line2['acpp_pg_fim'])) {
							$sx .= '-' . trim($line2['acpp_pg_fim']);
						}
					}

					if (strlen($line2['acpp_ano'])) {
						$sx .= ', ' . $line2['acpp_ano'] . ' ';
					}

					if (strlen($line2['acpp_ano'])) {
						$sx .= '. ISSN ' . substr($line2['acpp_issn'], 0, 4) . '-' . substr($line2['acpp_issn'], 4, 4);
						$sx .= ' '.$line2['acpp_issn_link'];
					}

					$sx .= '<td class="border1" width="30" align="center">';
					$sx .= $line2['estrato'];
					$sx .= '</td>';

					$sx .= '<td class="border1" width="30" align="center">';
					$sx .= '<img src="'.base_url('img/ss/icone_'.$line2['quartil'].'.gif').'"';
					$sx .= '</td>';

					$sx .= '<td class="border1" width="30" align="center">';
					$jcr = troca($line2['acpp_jcr'], ',', '.');
					if (strlen($jcr) > 0) {
						$jcr = round($jcr * 1000)/1000;
						$jcr = number_format($jcr, 3, ',', '.');
					}
					$sx .= $jcr;
					$sx .= '</td>';

				}
				$sx .= '</table>';
				return ($sx);
			}

		}
	}

}
?>
