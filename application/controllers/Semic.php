<?php
class semic extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('links_users');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
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
		array_push($menus, array('Programacao', 'index.php/semic'));
		array_push($menus, array('Trabalhos', 'index.php/semic/trabalhos'));
		array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'SEMIC - ' . date("Y");
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function avaliadores() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_trabalhos -> avaliadores_seminario();
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bloco_avaliador($ida = 0, $id2 = 0, $id3 = '', $id4 = '', $id5 = '') {
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> security();
		$data = array();
		$this -> load -> view('header/header', $data);

		/* ACAO */
		$aval_id = $id4;
		$nr = $id2;
		/* Avalidor (1,2,3) */
		$bloco = $ida;
		switch ($id5) {
			case 'SET' :
				$this -> semic_trabalhos -> avaliador_set($bloco, $aval_id, $nr);
				break;
		}

		/* Mostra dados do bloco */
		$data['content'] = '<h3>' . $this -> semic_salas -> mostra_dados_sala($ida) . '</h3>';
		$this -> load -> view('content', $data);

		/* Recupera professores do bloco */
		$aval = $this -> semic_trabalhos -> orientadores_bloco($ida);

		$area = $this -> semic_trabalhos -> areas_bloco($ida);

		$aval_areas = $this -> semic_trabalhos -> avaliadores_area($area, $aval);

		$data = array();
		$data['content'] = $this -> semic_trabalhos -> avaliadores_indicar($aval_areas, $ida, $id2);
		$this -> load -> view('content', $data);

	}

	function bloco_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');
		$cp = $this -> semic_salas -> cp_bloco();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> semic_salas -> tabela_bloco);
		$data['title'] = msg('semic_salas');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/semic'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function salas_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');
		$cp = $this -> semic_salas -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> semic_salas -> tabela);
		$data['title'] = msg('semic_salas');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/semic/salas'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function salas($id = 0) {
		$this -> load -> model('semic/semic_salas');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> semic_salas -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> semic_salas -> row($form);
		$this -> load -> view('header/content_open');

		$form -> row_edit = base_url('index.php/semic/salas_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/semic/salas/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('semic_salas');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> botao_novo_bloco();
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_salas -> mostra_blocos();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	function bloco_poster_view($ida = 0, $check = '', $p1 = '', $p2 = '', $acao = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> mostra_poster_bloco($ida, $p1, $p2, $acao);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function bloco_view($ida = 0, $check = '', $p1 = '', $p2 = '', $acao = '') {

		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> mostra_bloco($ida, $p1, $p2, $acao);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function trabalhos($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		$data['content'] = '<h1>Trabalhos SEMIC';

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
