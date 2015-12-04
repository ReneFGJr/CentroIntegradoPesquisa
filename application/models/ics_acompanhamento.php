<?php
class ics_acompanhamento extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";

	function entregas_abertas() {
		$sis = $this -> sistemas_abertos_para_submissao('PIBIC');
		$sx = 'xxx';
		/* Questionário de pré-relatorio parcial */
		if (trim($sis['sw_04']) == '1') {
			$sx .= $this -> submissao_questionarios();
		}
		return ($sx);
	}

	/* Submissoes */
	function submissao_questionarios() {
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_prof = '$cracha' 
						and ic_ano = '" . date("Y") . "'
						and s_id = 1
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$protoPA = trim($line['pa_protocolo']);
			if (strlen($protoPA) == 0)
				{
					echo $proto.'-'.$protoPA;
					echo ', parabéns ';
				}

		}
	}

	function sistemas_abertos_para_submissao($tipo = '') {
		$sql = "select * from " . $this -> tabela_acompanhamento . " where sw_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
		}
	}
}
?>
