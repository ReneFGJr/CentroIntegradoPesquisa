<?php
class edital extends CI_Controller {
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

		/* SeguranCa */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('fomento_editais');
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_observatorio.jpg');
		$this -> load -> view('header/logo', $data);
	}

	function index() {
		$this -> cab();
		$data = array();

		$this -> load -> view('form/form_busca.php');

		$this -> load -> view('fomento/ultimas_atualizacoes.php');

		$this -> load -> view('fomento/menu.php');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function row($id = 0) {
		$this -> cab();
		$data = array();
		$this -> load -> model('fomento_editais');

		$form = new form;
		$form -> tabela = $this -> fomento_editais -> tabela;
		$form -> see = true;
		$form = $this -> fomento_editais -> row($form);

		$form -> row_edit = base_url('index.php/edital/edit/');
		$form -> row_view = base_url('index.php/edital/view/');
		$form -> row      = base_url('index.php/edital/row/');

		$tela['tela'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = msg('title_fomento_editais');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '') {
		$this -> cab();
		$this -> load -> model('fomento_editais');

		$tela = '<table width="100%" border=0>';
		$tela .= '<tr valign="top">';
		$tela .= '<td>';
		$tela .= $this -> fomento_editais -> public_selector($id);

		$tela .= '<td>';
		$tela .= $this -> fomento_editais -> show_edital($id);

		$tela .= '</table>';

		$data['content'] = $tela;
		$data['id'] = $id;

		$this -> load -> view('fomento/resumo', $data);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('fomentos');
		$cp = $this -> fomentos -> cp();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> fomentos -> tabela);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/edital/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>