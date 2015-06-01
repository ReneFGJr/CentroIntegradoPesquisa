<?php
class josso_login_pucpr extends CI_Model {
	var $producao = 'https://sarch.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	var $homologacao = 'http://haiti.cwb.pucpr.br:8280/services/AutenticacaoSOA?wsdl';
	var $desenvolvimento = '';

	var $cpf = '';
	var $email = '';
	var $josso = '';
	var $nome = '';
	var $cracha = '';
	var $nomeEmpresa = '';
	var $nomeFilial = '';
	var $loged = 0;

	/* SESSAO
	 *
	 */
	function security() {
		if ($this -> loged > 0) {
			$dados = array('cracha'=>$this->cracha,'cpf' => $this -> cpf, 'josso' => $this -> josso, 'nome' => $this -> nome);
			$this -> session -> set_userdata($dados);
		} else {
			$dados = $this -> session -> userdata();
		}
	}

	/* Consulta no servidor SOAP
	 *
	 */
	function nusoap_consulta($login, $pass) {
		/* Initialize parameter */
		$param = array('login' => $login, 'senha' => $pass);

		/* create the client for my rpc/encoded web service */
		$wsdl = $this -> producao;

		$client = new soapclient($wsdl, true);
		$response = $client -> call('autenticarUsuario', $param);

		if (count($response['return']) > 0) {
			/* Analisa conteudo */
			$line = $response['return'];

			/* Recupera dados */
			$this -> cpf = $line['cpf'];
			$this -> email = $line['emailLogin'];
			$this -> josso = $line['jossoSession'];
			$this -> nome = $line['nome'];
			$this -> cracha = '';
			$this -> nomeEmpresa = $line['nomeEmpresa'];
			$this -> nomeFilial = $line['nomeFilial'];
			$this -> loged = 1;
			$this -> security();
			$this -> historico_insere($this->cpf);
			return (1);
		} else {
			return (-1);
		}
		return (-2);
	}

	/* Registra historico de acesso
	 *
	 */
	function historico_insere($login) {
		$ip = ip();
		$sql = "insert usuario_login ";
	}

	/* Entrada do login
	 *
	 *
	 */
	function consulta_login($login, $pass) {
		/* Verifica se foi locado recentemente */
		if ($this -> valida_senha_anterior($login, $pass)) {
			return (1);
		} else {
			$ok = $this -> nusoap_consulta($login, $pass);
			return ($ok);
		}
	}

	/* Valida ultimo login
	 *
	 */
	function valida_senha_anterior($login, $pass) {
		$login = troca($login, "'", "");
		$login = UpperCaseSql($login);
		$sql = "select * from usuario where us_login = '$login' ";
		$qr = $this -> db -> query($sql);
		$qr = $qr -> result_array();

		if (count($qr) > 0) {

		} else {
			return (0);
		}
		echo $sql;
	}

}
?>