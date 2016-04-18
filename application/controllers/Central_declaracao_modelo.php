<?php
class Central_declaracao_modelo extends CI_Controller {
		
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
		$this -> load -> helper('tcpdf');

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
		if (perfil('#TST') == 1) {
			array_push($menus, array('Home', 'index.php/#/'));
			//home
			array_push($menus, array('Criar Modelo', 'index.php/central_declaracao_modelo/criar_modelo/'));
		}
		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Central de Certificados e Declarações';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		//logo
		$data['logo'] = base_url('img/certificados_gif.png');
		$this -> load -> view('header/logo', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('unidades');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function criar_modelo($id = 0) {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');

		$this -> cab();
		$data = array();

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> central_declaracao_modelos -> tabela;
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form -> order = ' id_cdm ';
		$form = $this -> central_declaracao_modelos -> row($form);

		$form -> row_edit = base_url('index.php/central_declaracao_modelo/edit');
		$form -> row_view = base_url('index.php/central_declaracao_modelo/modelo_declaracao_view');

		$data['content'] = row($form, $id);
		$data['title'] = msg('Modelos_cadastrados');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');
		$cp = $this -> central_declaracao_modelos -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> central_declaracao_modelos -> tabela);
		$data['title'] = msg('Editar Modelo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/#'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}



	function emitir($id = 0, $check = ''){
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');
		
		$data = $this -> central_declaracao_modelos -> le($id);
		$this -> central_declaracao_modelos ->	modelo_declaracao_view($id, $data);
		
		
	}


}
?>