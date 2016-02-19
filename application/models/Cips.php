<?php
class cips extends CI_Model {
	function resumo() {
		$cp = array('-', '-', '-', '-');

		$sql = "select count(*) as total, bn_status
							FROM bonificacao
							WHERE bn_status = 'A'
							AND bn_original_tipo = 'IPR'
							group by bn_status							 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			$cp[0] = $rlt[0]['total'];
		}
			$sx = '<table width="100%" class="captacao_folha border1 black">';
			$sx .= '<tr>
						<td class="lt0" align="center">
						isenções<br>
						<font class="lt6"><b>' . $cp[0] . '</b></font></td></tr>';
			$sx .= '</table>';
		return ($sx);
	}

}
?>
