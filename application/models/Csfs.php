<?php
class csfs extends CI_model {
	function mostra_bolsa($usuario) {
		$sx = '<table class="tabela00 lt2">';
		$sx .= '<tr>
						<th width="20">
						<th width="200">programa</th>
						<th>chamada</th>
						<th width="200">situa��o</th>
						<th width="300">universidade</th>
						<th width="60">sa�da</th>
						<th width="60">retorno</th>
					</tr>
					';

		$sx .= '<tr>';

		$sx .= '<td>';
		$sx .= '<img src="' . base_url('img/logo/logo_csf.png') . '" height="20">';
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
		return ($sx);
	}

	function cp_novo($aluno = '') {
		$cp = array();
		array_push($cp,array('$H8','','',True,False));
		array_push($cp,array('$S8','',msg('cracha'),False,False));
		
		$sql = "iso3:nome:select * from fomento_editais where ed_local = 'IC' order by ed_titulo";
		array_push($cp,array('$Q '.$sql,'','Edital',True,True));
		
		array_push($cp,array('$MES','','Previs�o de sa�da',True,True));
		
		$sql = "iso3:nome:select * from pais order by nome";
		array_push($cp,array('$Q '.$sql,'','Pa�s',False,True));
			
		return($cp);
	}

}
?>
