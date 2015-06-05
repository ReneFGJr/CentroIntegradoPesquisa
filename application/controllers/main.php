<?php
class main extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		//$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');
		
		/* Security */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();

		//$this -> lang -> load("app", "english");
	}

	function index() {
		
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Menu Principal';
		$data['menu'] = 0;
		$this -> load -> view('header/cab', $data);

		/* Menu */
		$menu = array();
		array_push($menu,array('CIP','Centro Integrado de Pesquisa, Administração','BTN','/cip'));
		array_push($menu,array('Grupo de Pesquisa','Pesquisas da PUCPR','BTN','/dgp'));
		array_push($menu,array('Banco de Projetos','Pesquisa realizadas na PUCPR','BTN','/banco_projetos'));
		$data['menu'] = $menu;
		$this -> load -> view('header/main_menu',$data);
		
		$this -> load -> view('header/foot');
	}

}
