<?php
class bonificacoes extends CI_Model {
	function bonificacao_indicadores($prog)
		{
			$sql = "SELECT distinct us_usuario_id_us, us_nome, bn_codigo, bn_original_tipo, bn_valor, bn_beneficiario
						FROM `ss_professor_programa_linha`
						inner join us_usuario on id_us = us_usuario_id_us
						inner join bonificacao on us_cracha = bn_professor
						where programa_pos_id_pp = 1
						order by us_nome
					";
			$rlt = $this->db->query($sql);	
		}
	
	function mostra_bonificacoes($proto) {
		$this->load->model('geds');
		$sql = "select * from bonificacao
						LEFT JOIN bonificacao_situacao ON bn_status = bns_codigo 
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha and us_cracha <> ''
						where bn_original_protocolo = '$proto' ";
						
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$this->geds->tabela = 'bonificacao_ged_documento';
			$proto_file = strzero($line['id_bn'],7);
			
			$line['files'] = $this->geds->list_files_table($proto_file,'isencao');

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