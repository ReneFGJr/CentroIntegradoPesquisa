<?php
class bonificacoes extends CI_Model {
	function mostra_bonificacoes($proto) {
		$sql = "select * from bonificacao
						LEFT JOIN bonificacao_situacao ON bn_status = bns_codigo 
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha and us_cracha <> ''
						where bn_original_protocolo = '$proto' ";
						
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$tipo = $line['bn_original_tipo'];
			switch ($tipo) {
				case 'IPR' :
					$sx .= $this -> load -> view('bonificacao/bnf_IPR', $line, true);
					break;
				case 'ICP' :
					$sx .= $this -> load -> view('bonificacao/bnf_ICP', $line, true);
					break;	
				case 'IPQ' :
					$sx .= $this -> load -> view('bonificacao/bnf_IPQ', $line, true);
					break;										
				case 'PRJ' :
					$sx .= $this -> mostra_PRJ($line);
					break;
					
				default :
					print_r($line);
					echo '<hr>';
					echo 'OPS:' . $tipo;
					break;
			}

		}
		return ($sx);
	}

	function mostra_PRJ($line) {
		$sx = '';
		$sx .= $this -> load -> view('bonificacao/bnf_PRJ', $line, true);
		return ($sx);
	}

}
?>
