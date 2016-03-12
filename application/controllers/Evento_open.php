<?php
class evento_open extends CI_controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('links_users');
		$this -> load -> library('session');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> helper('email');

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
	}
	
	function index()
		{
			$ev = get("dd1");
			$ev = 2;
			$nome = get("Nome");
			$text = get("mensagem");
			$email = get("email");
			
			enviaremail('edena.grein@pucpr.br','Feira de Ciências - Dúvida','De:'.$nome.'<br>'.'e-mail:'.$email.'<HR>'.$text,$ev);
			enviaremail('renefgj@gmail.com','Feira de Ciências - Dúvida','De:'.$nome.'<br>'.'e-mail:'.$email.'<HR>'.$text,$ev);
			
			echo '<h1>Sua dúvida foi enviada</h1>';
			echo '<p>Em breve entraremos em contato!</p>';
			echo '<p>feiradeciencias@pucpr.br</p>';
			echo '<script>alert("e-mail enviado com sucesso!");</script>';
			
			
		}
}
?>
