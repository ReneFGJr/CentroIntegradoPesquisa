<?php
class ic_mobi extends CI_Controller {

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
		array_push($menus, array('Relatуrios', 'index.php/ic/report'));
		array_push($menus, array('Comunicaзгo', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		array_push($menus, array('Contratos', 'index.php/ic_contrato/contratos/'));
		array_push($menus, array('Administrativo', 'index.php/ic/admin/'));

		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciaзгo Cientнfica - Mobilidade';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic_mobilidade.png');
		$this -> load -> view('header/logo', $data);
	}

	function index($id = 0) {
		/* Load Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics_mobi');

		$this -> cab();
		$data = array();

		$data['resumo'] = $this -> ics_mobi -> resumo();
		$data['search'] = '';

		/* Mostra tela principal */
		$this -> load -> view('header/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics_mobi');
		$this -> load -> model('geds');

		$this -> cab();
		$data = array();

		$data = $this -> ics_mobi -> le($id);
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($data['pj_codigo'], 'ic');
		if (perfil('#CPP#SPI#ADM') == 1) {
			$data['ged_arquivos'] = $this -> geds -> form_upload($data['pj_codigo'], 'ic');
		}
		$this -> load -> view('ic/projeto', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function resumo($st = '') {
		/* Load Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics_mobi');

		$this -> cab();
		$data = array();

		$data['resumo'] = $this -> ics_mobi -> resumo();
		$data['search'] = $this -> ics_mobi -> mostra_protetos($st);
		;

		/* Mostra tela principal */
		$this -> load -> view('header/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>