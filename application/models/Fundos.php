<?php
class fundos extends CI_model
	{
		function acoes()
			{
				$sx = '';
				
				return($sx);
			}
	function resumo_solicitacoes($ano = '') {
				$to1 = 43;
				$to2 = 21;
				$to3 = 145;
				$sx = '<table width="100%" class="lt1 border1 radius10">
						<tr><td colspan=3 align="left" class="lt6 borderb1"><b>' . msg('resumo_solicitacao') . '</b><br><font class="lt0">recusos utilziados</td></tr>';
				$sx .= '<tr>';
				$sx .= '<td>analise</td>
						<td>deferidas</th>
						<td>indeferidas</th>
						</tr>';
				$sx .= '<tr class="lt5">
							<td align="center">'.$to1.'</td>
							<td align="center">'.$to2.'</td>
							<td align="center">'.$to3.'</td>
						</tr>';
				$sx .= '</table>';
				$sx .= '<br>';	
				return($sx);		
	}			
	function resumo($ano = '') {
		$sx = '';
		
		$to1 = 345122;
		$to1n = 45;
		$to2 = 133222;
		$to2n = 51;
		$to3 = 12450;
		$to3n = 8;
		$to4 = 133222;
		$to4n = 154;
		
		$tot = ($to1+$to2+$to3+$to4);						
		
		$sx = '<table width="100%" class="lt1 border1 radius10">
					<tr><td colspan=2 align="left" class="lt6 borderb1"><b>' . msg('resumo_rubrica') . '</b><br><font class="lt0">recusos utilziados</td></tr>';
					
		$sx .= '<tr><td class="lt0" align="right">total geral</td>';
		$sx .= '<td class="lt5"><b>'.number_format($tot,2,',','.').'</b></td></td>';					

		/* */
		$sx .= '<tr><td class="lt0" align="right">passagens ('.$to1n.')</td>';
		$sx .= '<td class="lt3">'.number_format($to1,2,',','.').' </td></td>';					

		$sx .= '<tr><td class="lt0" align="right">hospedagem ('.$to2n.')</td>';
		$sx .= '<td class="lt3">'.number_format($to2,2,',','.').' </td></td>';	

		$sx .= '<tr><td class="lt0" align="right">inscrição ('.$to3n.')</td>';
		$sx .= '<td class="lt3">'.number_format($to3,2,',','.').' </td></td>';						

		$sx .= '<tr><td class="lt0" align="right">diárias ('.$to4n.')</td>';
		$sx .= '<td class="lt3">'.number_format($to4,2,',','.').' </td></td>';						

		$sx .= '</table>';
		
		/* Resumo programas */
		$sx .= '<br>';
		$sx .= '<table width="100%" class="lt1 border1 radius10">
					<tr><td colspan=2 align="left" class="lt6 borderb1"><b>' . msg('resumo_programa') . '</b><br><font class="lt0">recusos utilziados</td></tr>';
									
		$sql = "select * from ss_programa_pos where pp_ativo = 1 order by pp_nome ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		$sa = '';
		$tot = 0;
		for ($r=0;$r < count($rlt);$r++)
			{
				$line = $rlt[$r];
				$tov = rand(0,99534);
				$tot = $tot + $tov;	
				$sa .= '<tr><td class="lt0" align="right">'.$line['pp_nome'].'</td>';
				$sa .= '<td class="lt3">'.number_format($tov,2,',','.').'</td></td>';				
			}

		$sx .= '<tr><td class="lt0" align="right">total geral</td>';
		$sx .= '<td class="lt5"><b>'.number_format($tot,2,',','.').'</b></td></td>';
		
		$sx .= $sa;					

		$sx .= '</table>';			

		
		return ($sx);
	}
	}
?>
