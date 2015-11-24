<?php
class ws_sga extends CI_model {
	var $producao = 'https://sarch.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';
	var $homologacao = 'https://haiti.cwb.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';
	var $desenvolvimento = 'https://sarch.pucpr.br:8100/services/ServicoConsultaPibic?wsdl';
	
	function inser_sga($daDos)
		{
			$pessoa = $daDos['pessoa'];
			$nomeCurso = $daDos['nomeCurso'];
			$nivelCurso = $daDos['nivelCurso'];
			$centroAcademico = $daDos['centroAcademico'];
			$situacao = $daDos['situacao'];
			
			$sql = "select * from us_importar_sga where nomeCurso = '$nomeCurso' and pessoa = '$pessoa' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					$sql = "update us_importar_sga
								set situacao = '$situacao'
							where nomeCurso = '$nomeCurso' and pessoa = '$pessoa' ";
					$xrlt = $this->db->query($sql);							 
				} else {
					$sql = "insert into us_importar_sga
							(
								pessoa, nomeCurso, centroAcademico,
								nivelCurso, situacao
							) values (
								'$pessoa', '$nomeCurso', '$centroAcademico',
								'$nivelCurso','$situacao'
							)
					";
					$xrlt = $this->db->query($sql);
				}
			return(1);
		}

	function findStudentByCracha($cracha,$force=1) {
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
			if (!isset($response['DadoAluno']))
			{
				return(array());
				exit;
			}		
		$DadoAluno = $response['DadoAluno'];	
		if (count($DadoAluno) == 0) {
			/* Retorna vazio */
			return ('');
		}		

		/* Modelo 1 - Somente um curso */
		if (isset($DadoAluno['pessoa'])) {
			$DadoAluno['tipo'] = '3';
			/* Aluno */
			
			$this->inser_sga($DadoAluno);
			$this -> load -> model('usuarios');
			$this -> usuarios -> insere_usuario($DadoAluno);
			return ($DadoAluno);
		} else {
			/* Cursos ativos */
			$pref1 = array();

			/* Cursos finalizados */
			$pref2 = array();

			/* Cursos Outras opcoes */
			$pref3 = array();
			for ($r = 0; $r < count($DadoAluno); $r++) {
				$this->inser_sga($DadoAluno[$r]);
				
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
					case 'TRAN' :
						array_push($pref2, $DadoAluno[$r]);
						break;						
					case 'CONC' :
						array_push($pref2, $DadoAluno[$r]);
						break;
					case 'CANC' :
						array_push($pref3, $DadoAluno[$r]);
						break;	
					case 'DESI' :
						array_push($pref3, $DadoAluno[$r]);
						break;												
					case 'DESL' :
						array_push($pref3, $DadoAluno[$r]);
						break;
					case 'REPR' :
						array_push($pref3, $DadoAluno[$r]);
						break;	
					case 'RETR' :
						array_push($pref3, $DadoAluno[$r]);
						break;												
					case 'NAO' :
						array_push($pref3, $DadoAluno[$r]);
						break;												
					default :
						echo '<BR>-->' . $situacao;
						break;
				}

			}
			if (count($pref1) > 0) {
				$DadoAluno = $pref1[0];
				$DadoAluno['tipo'] = '3';
				/* Aluno */
				$this -> load -> model('usuarios');
				$this -> usuarios -> insere_usuario($DadoAluno);
				return ($pref1[0]);
			}
			if (count($pref3) > 0) {
				$DadoAluno = $pref3[0];
				$DadoAluno['tipo'] = '3';
				/* Aluno */
				$this -> load -> model('usuarios');
				$this -> usuarios -> insere_usuario($DadoAluno);
				return ($pref3[0]);
			}
			if (isset($pref1[0]))
				{
					return ($pref1[0]);
				} else {
					return(array());
				}
					
		}

	}

}
?>
