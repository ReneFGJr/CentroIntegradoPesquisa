<?php
class paceiro extends CI_Controller {
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
			
		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}
	
	
	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;


		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Parceiros PUCPR';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	
	function index($id = 0) {

		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		//$tela['title'] = $this -> lang -> line('title_ic');
		//$tela['tela'] = '';

		$this -> load -> view('parceiro/parceiro', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	
}