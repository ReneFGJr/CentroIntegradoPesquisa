<?php
class Curso extends CI_Controller {
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
		array_push($menus, array('Home', 'index.php/main/'));
		array_push($menus, array('Inнcio', 'index.php/admin/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Manutenзгo do Cadastro de Cursos';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('cursos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> cursos -> tabela;
		$form -> see = false;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> cursos -> row($form);

		$form -> row_edit = base_url('index.php/curso/edit');
		//$form -> row_view = base_url('index.php/curso/view');
		$form -> row = base_url('index.php/curso');

		$tela['tela'] = row($form, $id);
		$tela['title'] = $this -> lang -> line('Label_index_curso');
		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('cursos');
		$cp = $this -> cursos -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> cursos -> tabela);
		$data['title'] = msg('Label_editar_curso');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/curso'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


}
?>