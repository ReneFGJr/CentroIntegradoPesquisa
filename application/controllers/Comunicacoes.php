<?php
class comunicacoes extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');

		/* Security */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();

		//$this -> lang -> load("app", "english");
	}

	function index() {
		enviaremail('elizandro.slima@gmail.com', 'teste', 'teste de <I>e-mail</i>',2);
		echo 'Enviado Teste!';
	}

}
