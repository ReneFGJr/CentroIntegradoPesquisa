<?php
class ws_sga extends CI_model {
	var $producao = 'https://sarch.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';
	var $homologacao = 'https://sarch.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';
	var $desenvolvimento = 'https://sarch.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';

	function findStudentByCracha($cracha) {
		$cracha = sonumero($cracha);

		if (strlen($cracha) == 12) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 11) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 9) { $cracha = substr($cracha, 0, 9);
		}
		if (strlen($cracha) > 8) {
			return ('');
		}
		if (strlen($cracha) < 8) {
			return ('');
		}
		$param = array('pessoa' => $cracha);

		/* create the client for my rpc/encoded web service */
		require ("_server_type.php");
		switch ($server_type) {
			case '1' :
				$wsdl = $this -> producao;
				break;
			case '2' :
				$wsdl = $this -> homologacao;
				break;
			case '3' :
				$wsdl = $this -> desenvolvimento;
				break;
		}

		$client = new soapclient($wsdl, true);
		$response = $client -> call('opPesquisarPorCodigo', $param);

		$DadoAluno = $response['DadoAluno'];

		if (count($DadoAluno) == 0) {
			/* Retorna vazio */
			return ('');
		}
		/* Modelo 1 - Somente um curso */
		if (count($DadoAluno) == 1) {

		}
		if (count($DadoAluno) > 1) {
			/* Cursos ativos */
			$pref1 = array();

			/* Cursos finalizados */
			$pref2 = array();

			/* Cursos Outras opcoes */
			$pref3 = array();

			for ($r = 0; $r < count($DadoAluno); $r++) {
				$situacao = substr(UpperCaseSql($DadoAluno[$r]['situacao']), 0, 4);
				switch ($situacao) {
					case 'NORM' :
						array_push($pref1, $DadoAluno[$r]);
						break;
					case 'MUDA' :
						array_push($pref2, $DadoAluno[$r]);
						break;
					case 'REOP' :
						array_push($pref2, $DadoAluno[$r]);
						break;
					case 'CONC' :
						array_push($pref2, $DadoAluno[$r]);
						break;
					default :
						echo '<BR>-->' . $situacao;
						break;
				}

			}
			if (count($pref1) > 0)
				{
					return($pref1[0]);
				}
			if (count($pref3) > 0)
				{
					return($pref3[0]);
				}
			return ($pref1[0]);
		}

	}

}
?>
