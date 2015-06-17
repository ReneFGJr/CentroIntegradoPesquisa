<?php
class banco_projetos extends CI_Controller {
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
		$this -> security();
	}

	function security() {

		/* Segurança */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Banco de Projetos';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function index() {
		$this->cab();
		$data = array();
		$this -> load -> view('banco_projetos/index', $data);
		$this -> load -> view('header/foot', $data);
	}

	function view($id) {
		$this->cab();
		$data = array();
		$this -> load -> view('banco_projetos/view', $data);
		$this -> load -> view('banco_projetos/view_publications', $data);
		$this -> load -> view('header/foot', $data);
	}	

}