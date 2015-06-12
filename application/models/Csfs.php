<?php
class csfs extends CI_model
	{
	function mostra_bolsa($usuario)
		{
			$sx = '<table class="tabela00 lt2">';
			$sx .= '<tr>
						<th width="20">
						<th width="200">programa</th>
						<th>chamada</th>
						<th width="200">situação</th>
						<th width="300">universidade</th>
						<th width="60">saída</th>
						<th width="60">retorno</th>
					</tr>
					';
			
			$sx .= '<tr>';

			$sx .= '<td>';
			$sx .= '<img src="'.base_url('img/logo/logo_csf.png').'" height="20">';
			$sx .= '</td>';
			
			$sx .= '<td>';
			$sx .= 'Ciencia sem Fronteiras';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= 'Chamada CsF 181/2014 - Alemanha/DAAD';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= 'Homologado';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= 'Leibniz Universitat Hannover';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= '07/2015';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= '08/2016';
			$sx .= '</td>';
			
			$sx .= '</table>';
			return($sx);
		}
	}
?>
