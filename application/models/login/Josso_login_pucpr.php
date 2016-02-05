<?php
class josso_login_pucpr extends CI_Model {
	var $producao = 'https://sarch.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	var $homologacao = 'https://haiti.cwb.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	var $desenvolvimento = 'https://rhea.cwb.pucpr.br:8100/services/AutenticacaoSOA?wsdl';

	var $id = 0;
	var $id_us = 0;
	var $cpf = '';
	var $email = '';
	var $josso = '';
	var $nome = '';
	var $cracha = '';
	var $nomeEmpresa = '';
	var $nomeFilial = '';
	var $loged = 0;
	var $ghost = 0;
	var $perfil = '';
	var $us_id = '';

	/* SESSAO
	 *
	 */



	/* Consulta no servidor SOAP
	 *
	 */
	function nusoap_consulta($login, $pass, $debug = 0) {
		$this -> load -> model('logins');
		/* Initialize parameter */
		$param = array('login' => $login, 'senha' => $pass);

		/* create the client for my rpc/encoded web service */
		require ("_server_type.php");
		switch ($server_type) {
			case '3' :
				$wsdl = $this -> producao;
				break;
			case '2' :
				$wsdl = $this -> homologacao;
				break;
			default :
				$wsdl = $this -> desenvolvimento;
				break;
		}

		$client = new soapclient($wsdl, true);
		$response = $client -> call('autenticarUsuario', $param);
		if ($debug == 1) {
			echo '<h1>' . $wsdl . '</h1>';
			echo '<PRE>';
			print_r($response);
			echo '</PRE>';

			echo '<PRE>';
			print_r($client);
			echo '</PRE>';

			exit ;
		}

		/****************** RESPONSTA DO SOAP */
		if (count($response['return']) > 0) {
			/* Analisa conteudo */
			$line = $response['return'];
			$login_b = uppercase($login);

			/* Recupera dados */
			$this -> cpf = $line['cpf'];
			if (strlen(trim($line['cpf'])) == 0) {
				echo 'CPF NÃO IDENTIFICADO - ERRO DE LOGIN #4334';
				return (0);
			}

			$this -> email = $line['emailLogin'];
			$this -> josso = $line['jossoSession'];
			$this -> nome = $line['nome'];
			$this -> cracha = '';
			$this -> nomeEmpresa = $line['nomeEmpresa'];
			$this -> nomeFilial = $line['nomeFilial'];
			$this -> loged = 1;
			$this -> ativa_usuario($login, $pass, $line);
			$this -> historico_insere($this -> cpf, 'LOGIN');
			$this -> security();
			return (1);
		} else {
			$this -> historico_insere_erro($login, '1');
			return (-1);
		}
		return (-2);
	}

	function historico_insere_erro($login, $erro, $us = 0) {
		if ((strlen($login) == 0) and ($us == 0)) {
			return ('');
		}
		$ip = ip();
		$CI = &get_instance();
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$login = uppercase($login);

		$sql = "insert into logins_erros
					(
						ler_ip, ler_erro, 
						ler_user_id, ler_data, ler_hora
					) values (
						'$ip','$erro',
						'$login', '$data', '$hora'
					)
			";
		$rlt = $CI -> db -> query($sql);
		return (0);
	}


	/* Registra historico de acesso
	 *
	 */
	function historico_insere($login, $proto) {
		$ip = ip();
		$cpf = $this -> cpf;
		$data = date("Ymd");
		$hora = date("H:i:s");
		$sql = "insert into logins_log 
				(ul_data, ul_hora, ul_ip, ul_proto, ul_cpf)
				values
				($data,'$hora','$ip','$proto','$cpf')		
		";
		$this -> db -> query($sql);
		return (1);
	}



}
?>