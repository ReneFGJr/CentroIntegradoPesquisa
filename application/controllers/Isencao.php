<?php
class isencao extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> lang -> load("ic", "portuguese");

		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
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
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/ic/'));

		array_push($menus, array('Professores & Alunos', 'index.php/ic/usuarios'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));
		array_push($menus, array('Acompanhamento', 'index.php/ic/acompanhamento'));
		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		array_push($menus, array('Relatórios', 'index.php/ic/report'));
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		array_push($menus, array('Contratos', 'index.php/ic_contrato/contratos/'));
		array_push($menus, array('Administrativo', 'index.php/ic/admin/'));

		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic.png');
		$this -> load -> view('header/logo', $data);
	}

	function lanca($id = 0, $chk = '') {
		/* Load Models */
		$tabela = "bonificacao";
		$this -> load -> model('isencoes');
		$data = array();
		$this -> load -> view('header/header', $data);
		$cp = $this -> isencoes -> cp_isencoes();

		$form = new form;
		$form -> id = $id;
		$tela = $form -> editar($cp, $tabela);

		if ($form -> saved > 0) {
			$this->load->view('header/close_windows', null);
		} else {
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
		}
	}

	function lista_liberar($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('isencoes');

		$this -> cab();
		$data = array();

		$tela = $this->isencoes->lista_por_grupo_status('A');
		$data['content'] = $tela;
		$data['title'] = msg('Lista de isenções');
		$this -> load -> view('content', $data);

	}

	function security() {

		/* Seguranca */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'bonificacao_ged_documento';
		$this -> geds -> page = base_url('index.php/isencao/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'bonificacao_ged_documento';
		$this -> geds -> file_path = '';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'bonificacao_ged_documento';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'bonificacao_ged_documento';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_delete($id);
	}

}
?>