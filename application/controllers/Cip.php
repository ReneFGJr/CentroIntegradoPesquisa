<?php
class CIP extends CI_Controller {
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

		/* Menu */
		$menus = array();
		array_push($menus, array('CIP', '/cip/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Centro Integrado de Pesquisa';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function artigo($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('cip/bonificacao_artigos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$this -> bonificacao_artigos -> create_view();
		$form -> tabela = $this -> bonificacao_artigos -> tabela_view;
		$form -> see = true;
		$form = $this -> bonificacao_artigos -> row($form);

		$form -> row_edit = base_url('index.php/cip/artigo_edit');
		$form -> row_view = base_url('index.php/cip/artigo_view');
		$form -> row = base_url('index.php/cip/artigo/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_artigo');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function artigo_view($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('cip/bonificacao_artigos');
		
		$this -> bonificacao_artigos -> create_view();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		
		$data = $this->bonificacao_artigos->le($id);
		
		$user_cracha = $data['ar_professor'];
		$user_id = $this->usuarios->readByCracha($user_cracha);

		$data['bp'] = $this -> bonificacao_artigos -> bar_menu();
		$data['bp_atual'] = $data['ar_situacao'];
		
		/* dados do autor */
		$data['data'] = $user_id;

		$this -> load -> view('cip/artigos', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
