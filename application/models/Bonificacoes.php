<?php
class bonificacoes extends CI_Model {
	function bonificacao_indicadores($prog) {
		$sql = "SELECT distinct us_usuario_id_us, us_nome, bn_codigo, bn_original_tipo, bn_valor, bn_beneficiario, 
							bn_liberacao, bnn_descricao, bn_original_protocolo
						FROM `ss_professor_programa_linha`
						inner join us_usuario on id_us = us_usuario_id_us
						inner join bonificacao on us_cracha = bn_professor
						left join bonificacao_modalidade on bn_original_tipo = bnn_tipo 
						where programa_pos_id_pp = $prog
						order by bn_original_tipo, us_nome, bn_codigo
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela01 lt2">';
		$sx .= '<tr><th>protocolo</th><th>Professor</th><th>Registro</th><th>Tipo</th><th>Valor</th><th>Beneficiário</th><th>Tipo - Descrição</th><th>Data</th>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>' . $line['bn_original_protocolo'] . '</td>';
			$sx .= '<td>';
			$sx .= $line['us_nome'];
			$sx .= '</td>';
			$sx .= '<td>' . $line['bn_codigo'];
			$sx .= '</td>';
			$sx .= '<td>' . $line['bn_original_tipo'];
			$sx .= '</td>';
			$sx .= '<td align="right">' . number_format($line['bn_valor'], 2, ',', '.');
			$sx .= '</td>';
			$sx .= '<td>' . $line['bn_beneficiario'];
			$sx .= '</td>';
			$sx .= '<td>' . $line['bnn_descricao'];
			$sx .= '</td>';
			$sx .= '<td align="center">' . stodbr($line['bn_liberacao']);
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function mostra_bonificacoes($proto) {
		$this -> load -> model('geds');
		$sql = "select * from bonificacao
						LEFT JOIN bonificacao_situacao ON bn_status = bns_codigo 
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha and us_cracha <> ''
						where bn_original_protocolo = '$proto' ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$this -> geds -> tabela = 'bonificacao_ged_documento';
			$proto_file = strzero($line['id_bn'], 7);

			$line['files'] = $this -> geds -> list_files_table($proto_file, 'isencao');

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
				case 'IFA' :
					$sx .= $this -> load -> view('bonificacao/bnf_IPQ', $line, true);
					break;
				case 'BNI' :
					$this -> geds -> tabela = 'cip_artigo_ged_documento';
					$line['bns_arquivos'] = $this -> geds -> list_files($line['bn_codigo'], 'bonificacao');
					$sx .= $this -> load -> view('bonificacao/bnf_BNI', $line, true);
					break;
				case 'PRJ' :
					$this -> geds -> tabela = 'bonificacao_ged_documento';
					$line['bns_arquivos'] = $this -> geds -> list_files($line['bn_codigo'], 'bonificacao');
					$sx .= $this -> load -> view('bonificacao/bnf_PRJ', $line, true);
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

}
?>