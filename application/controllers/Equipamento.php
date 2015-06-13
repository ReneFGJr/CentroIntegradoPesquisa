<?php
class equipamento extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
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
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Pró-Equipamentos';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('equipamentos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> equipamentos -> tabela;
		$form -> see = true;
		$form = $this -> equipamentos -> row($form);

		$form -> row_edit = base_url('index.php/equipamento/edit');
		$form -> row_view = base_url('index.php/equipamento/view');
		$form -> row = base_url('index.php/equipamento/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_equipamento');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('equipamentos');

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$data = $this->equipamentos->le($id);

		$this -> load -> view('equipamento/view', $data);
		//$this -> load -> view('dgp/view_mygroups', $data);
		//$this -> load -> view('dgp/view_indicadores', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
