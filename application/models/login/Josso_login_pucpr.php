<?php
class josso_login_pucpr extends CI_Model {
	var $producao = 'https://sarch.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	//var $producao = 'http://midori.cwb.pucpr.br:8280/services/AutenticacaoSOA?wsdl';
	
	var $homologacao = 'http://haiti.cwb.pucpr.br:8280/services/AutenticacaoSOA?wsdl';
	
	var $desenvolvimento = 'https://rhea.cwb.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	
	//var $desenvolvimento = 'https://sarch.pucpr.br:8100/services/AutenticacaoSOA?wsdl';

	var $id = 0;
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
			$dados = array('id_us'=>$this->id,'cracha'=>$this->cracha,'cpf' => $this -> cpf, 'josso' => $this -> josso, 'nome' => $this -> nome);
			$this -> session -> set_userdata($dados);
		} else {
			
			$dados = $this -> session -> userdata();
			$josso = $this -> session -> userdata('nome');
			
			if (strlen($josso)==0)
				{
					$link = base_url('index.php/login');
					redirect($link);
				} else {
					$this -> session -> set_userdata($dados);
					return(1);
				}
			return(0);
		}
	}
	
	/* Logout
	 * 
	 */
	function logout()
		{
			$dados = array('cracha'=>'','cpf' => '', 'josso' => '', 'nome' => '');
			$this -> session -> set_userdata($dados);
			return(1);
		}

	/* Consulta no servidor SOAP
	 *
	 */
	function nusoap_consulta($login, $pass, $debug=0) {
		/* Initialize parameter */
		$param = array('login' => $login, 'senha' => $pass);

		/* create the client for my rpc/encoded web service */
		require("_server_type.php");
		switch ($server_type)
			{
			case '3':
				$wsdl = $this -> producao;
				break;
			case '2':
				$wsdl = $this -> homologacao;
				break;
			default:
				$wsdl = $this -> desenvolvimento;
				break;
			}

		$client = new soapclient($wsdl, true);
		$response = $client -> call('autenticarUsuario', $param);
		if ($debug==1)
			{
				echo '<h1>'.$wsdl.'</h1>';
				echo '<PRE>';
				print_r($response);
				echo '</PRE>';
				
				echo '<PRE>';
				print_r($client);
				echo '</PRE>';
				
				exit;
			}
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
			$this -> ativa_usuario($login,$pass);
			$this -> historico_insere($this->cpf,'LOGIN');
			return (1);
		} else {
			return (-1);
		}
		return (-2);
	}

	function ativa_usuario($login,$pass)
		{
		$sql = "select * from logins where us_login = '$login' ";
		$qr = $this -> db -> query($sql);
		$qr = $qr -> result_array();
		
		if (count($qr)==0)
			{
				$nome = $this->nome;
				$data = date("Ymd");
				$cpf = $this->cpf;
				$pass_crypt = md5($pass.date("Ym"));
				$login = UpperCase($login);
				
				$sql = "insert into logins 
						(
						us_nome, us_login, us_senha,
						us_lastupdate, us_cpf, us_dt_admissao,
						us_cracha, us_id
						) 
						value
						('$nome','$login','$pass_crypt',
						$data,'$cpf','$data',
						'','')				
				";
				$this->db->query($sql);				
			} else {
				
			}
		}

	/* Registra historico de acesso
	 *
	 */
	function historico_insere($login,$proto) {
		$ip = ip();
		$cpf = $this->cpf;
		$data = date("Ymd");
		$hora = date("H:i:s");
		$sql = "insert into logins_log 
				(ul_data, ul_hora, ul_ip, ul_proto, ul_cpf)
				values
				($data,'$hora','$ip','$proto','$cpf')		
		";
		$this->db->query($sql);
		return(1);
	}

	/* Entrada do login
	 *
	 *
	 */
	function consulta_login($login, $pass, $debug=0) {
		/* Verifica se foi locado recentemente */
		if ($this -> valida_senha_anterior($login, $pass)) {
			return (1);
		} else {
			$ok = $this -> nusoap_consulta($login, $pass, $debug);
			return ($ok);
		}
	}

	/* Valida ultimo login
	 *
	 */
	function valida_senha_anterior($login, $pass) {
		$login = troca($login, "'", "");
		$login = UpperCaseSql($login);
		$sql = "select * from logins where us_login = '$login' ";
		$qr = $this -> db -> query($sql);
		$qr = $qr -> result_array();

		if (count($qr) > 0) {

		} else {
			return (0);
		}
	}

}
?>