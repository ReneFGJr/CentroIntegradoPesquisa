<?php
class ic extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
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
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function comunicacao($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['title'] = msg('title_ic_comunicacao');
		$data['content'] = '';
		switch ($id) {
			case '0' :
				$data['content'] = $this -> comunicacoes -> form_comunicacao_0();
				break;
			case '1' :
				$data['content'] = $this -> comunicacoes -> form_comunicacao_1($gr, $tp);
				break;
		}
		$this -> load -> view('content', $data);
		
		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> comunicacoes -> tabela_view();
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = false;
		$form = $this -> comunicacoes -> row($form);

		$form -> row_edit = base_url('index.php/ic/comunicacao_edit');
		$form -> row_view = base_url('index.php/ic/comunicacao_view');
		$form -> row = base_url('index.php/ic/comunicacao/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('messagem_cadastradas');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {

		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		$this -> load -> view('ic/menu', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento() {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_switch();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = 1;
		/* IC */

		$tela = $form -> editar($cp, $this -> ics -> tabela_acompanhamento);

		$data['title'] = msg('ic_acomanhamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('equipamentos');

		$this -> cab();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
	}

}
