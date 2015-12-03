<?php
class issn extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> library("nuSoap_lib");

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

		/* Menu */
		$menus = array();
		array_push($menus, array('Perfis', 'index.php/admin/logins/'));
		array_push($menus, array('ISSN', 'index.php/issn'));
		
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'ISSN';

		if (perfil('#ADM')) {
			$data['menu'] = 1;
			$data['menus'] = $menus;
		} else {
			$data['menu'] = 0;
			$data['menus'] = $menus;
		}
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');

		if (perfil('#ADM', 1) == false) {
			redirect(base_url('index.php'));
			return (0);
		}
	}


	function index() {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Qualis', 'Base Scmiago', 'ITE', '/issn/scmiago'));
		array_push($menu, array('Qualis', 'Base Qualis', 'ITE', '/issn/qualis'));
		array_push($menu, array('ISSN-L', 'Lista','ITE', '/issn/issn-l'));


		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu ISSN';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */ 		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function scmiago($id = 0) {
		$this -> cab();
		$data = array();
		$this -> load -> model('issns');

		$form = new form;
		$form -> tabela = 'scimago';
		$form -> see = False;
		$form -> edit = False;
		$form -> novo = False;
		$form = $this -> issns -> row_scimago($form);

		$form -> row      = base_url('index.php/issn/scmiago');

		$tela['tela'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = msg('title_issn');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

}
