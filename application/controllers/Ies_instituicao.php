<?php
class Ies_instituicao extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
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
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Bolsas / Recursos Humanos', '#'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Institui��es Parceiras';
		$data['menu'] = 0;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		//$data['logo'] = base_url('img/logo/logo_observatorio.jpg');
		//$this -> load -> view('header/logo', $data);
	}

	function index($id = 0) {
		/* Load Models */
		$this -> load -> model('ies_instituicoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> ies_instituicoes -> tabela;
		//$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> ies_instituicoes -> row($form);

		$form -> row_edit = base_url('index.php/ies_instituicao/edit');
		$form -> row_view = base_url('index.php/ies_instituicao/view');
		$form -> row = base_url('index.php/ies_instituicao');

		$tela['tela'] = row($form, $id);
		$tela['title'] = msg('lb_lista_instituicao');

		$this -> load -> view('form/form', $tela);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ies_instituicoes');
		$cp = $this -> ies_instituicoes -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ies_instituicoes -> tabela);
		$data['title'] = msg('lb_editar_instituicao');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ies_instituicao'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	
	
	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ies_instituicoes');

		$this -> cab();
		$this -> load -> view('header/content_open');

		$data = $this -> ies_instituicoes -> le($id);
		$this -> load -> view('ies_instituicao/view', $data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	
		

}
?>