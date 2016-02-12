<?php
class Captacao extends CI_Controller {
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

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('CIP', '/cip/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Captacaчуo de Recursos';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		$data['title_menu'] = 'Captacaчуo de Recursos & Bonificaчуo de Artigos';
		array_push($menu, array('Captaчуo de Recursos', 'Meus projetos cadastrados', 'ITE', '/captacao/grants'));
		array_push($menu, array('Captaчуo de Recursos', 'Cadastrar novo projeto', 'ITE', '/captacao/grants_new'));

		array_push($menu, array('Isenчѕes', 'Minhas Isenчѕes', 'ITE', '/captacao/isencoes'));
		array_push($menu, array('Isenчѕes', 'Indicar Isenчѕes', 'ITE', '/captacao/isencao_indicar'));

		array_push($menu, array('Artigos Cientэficos (A1, A2, Q1 e ExR)', 'Meus artigos cadastrados', 'ITE', '/captacao/articles'));
		array_push($menu, array('Artigos Cientэficos (A1, A2, Q1 e ExR)', 'Cadastrar novo artigos', 'ITE', '/captacao/article_new'));

		$data['menu'] = $menu;

		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '') {
		$this -> load -> model('usuarios');
		$this -> load -> model('captacoes');

		$chk2 = checkpost_link($id);
		if ($chk2 != $chk) {
			redirect(base_url('index.php/main'));
		}
		/* Load Models */

		$this -> cab();
		$data = $this -> captacoes -> le($id);
		
		$this -> load -> view('captacao/detalhe', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', null);
	}

	function grants($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('captacoes');

		$id = $_SESSION['id_us'];
		$us = $this -> usuarios -> le($id);
		$cracha = $us['us_cracha'];

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data = array();
		$data['title'] = 'Captacaчуo de Recursos';
		$data['content'] = $this -> captacoes -> lista($cracha);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>