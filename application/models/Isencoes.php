<?php
class isencoes extends CI_model {

	function lista_status($st = '') {
		if (strlen($st) > 0)
			{
				$sz = '35%';
				$wh = " bn_status = '$st' and ";
				$th = '';
			} else {
				$wh = '';
				$sz = '20%';
				$th = '<th width="20%">Situação</th>';
			}
		$sql = "select * from bonificacao
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha
						LEFT JOIN bonificacao_situacao on bn_status = bns_codigo
						WHERE $wh bn_original_tipo = 'IPR'
						ORDER BY bn_professor_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		if (count($rlt) > 0) {
			$sx = '<table width="100%" class="tabela00 lt1">';
			if (strlen($st) > 0)
				{
					$sx .= '<tr><td colspan="10" class="lt5">Situação: ' . $rlt[0]['bns_descricao'] . '</td></tr>';
				}

			$sx .= '<tr>
						<th width="2%">#</th>
						<th width="5%">Protocolo</th>
						<th width="'.$sz.'">Professor</th>
						<th width="3%">Tipo</th>
						<th width="5%">Dt. Liberação</th>
						<th width="'.$sz.'">Beneficiário</th>
						'.$th.'
					</tr>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				$sx .= '<tr>';
				$sx .= '<td align="center">'.($r+1).'.</td>';
				$sx .= '<td>' . $line['bn_original_protocolo'] . '</td>';
				$sx .= '<td>' . $line['bn_professor_nome'] . '</td>';

				$sx .= '<td align="center">' . $line['bn_original_tipo'] . '</td>';
				//$sx .= '<td>'.$line['bn_nome'].'</td>';

				$sx .= '<td align="center">' . stodbr($line['bn_data']) . '</td>';

				$sx .= '<td>' . link_perfil($line['us_nome'],$line['id_us']) . '</td>';
			if (strlen($st) == 0)
				{
				$sx .= '<td>' . $line['bns_descricao'] . '</td>';	
				}				
			}
			$sx .= '</table>';
		} else {
			$sx .= msg('nada a listar');
		}
		
		return ($sx);
	}

}
?>
