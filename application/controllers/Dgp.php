<?php
class dgp extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
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
		array_push($menus, array('Relatório', 'index.php/dgp/report'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_discente');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function reports($id = 0, $gr = '') {
		$this -> load -> model('dgps');
		
		$this -> cab();
		$data = array();
		
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);
		
		switch ($id)
			{
			case 'ge':
				$tela = $this->dgps->grupos_escolas();
				
				if (strlen($gr) > 0)
					{
						$tela = $this->dgps->grupos_escolas_detalhes($gr);		
					}
				break;
			default:
				$tela = '';
				break;
		}
		
		$data['content'] = $tela;
		$this->load->view('content',$data);		

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}
	
	function report($id = 0, $gr = '') {
		$this -> cab();
		$data = array();
		
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);		

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Indicadores', 'Grupos por escolas (lider)', 'ITE', '/dgp/reports/ge'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Relatórios';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function index() {
		$this -> load -> model('dgps');
		$this -> cab();
		$data = array();
		$data['acoes'] = $this -> dgps -> acoes();
		$data = $this -> dgps -> resumo($data);
		$this -> load -> view('dgp/index', $data);
		$this -> load -> view('dgp/view_mygroups', $data);
		$this -> load -> view('dgp/view_indicadores', $data);
		$this -> load -> view('header/foot', $data);
	}

	function admin($id = 0) {
		/* Models */
		$this -> load -> model('dgps');
		$this -> cab();
		$data = array();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$form = new form;
		$tabela = '(select * from ' . $this -> dgps -> tabela . '
					left join gp_situacao on id_gps = gps_id
					) as tabela ';
		$form -> tabela = $tabela;
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;

		$form = $this -> dgps -> row($form);

		$form -> row_edit = base_url('index.php/dgp/edit');
		$form -> row_view = base_url('index.php/dgp/view');
		$form -> row = base_url('index.php/dgp/admin/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_dgp');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);
	}

	function inport($id = 0) {
		$this -> load -> model('dgps');
		$this -> load -> model('phplattess');

		$this -> cab();
		$data = array();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$data = $this -> dgps -> le($id);
		$this -> load -> view('dgp/grupo', $data);

		$link = trim($data['gp_egp_espelho']);
		$text = $this -> phplattess -> dgp_import($link);

		$this -> dgps -> grava_dados_importados($text, $id, $link);
		redirect(base_url('index.php/dgp/admin'));
	}

	function inport_all() {
		$this -> load -> model('dgps');
		$this -> load -> model('phplattess');

		$id = $this -> dgps -> next_harvesting();

		$this -> cab();
		$data = array();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		if ($id > 0) {

			$data = $this -> dgps -> le($id);
			$this -> load -> view('dgp/grupo', $data);

			$link = trim($data['gp_egp_espelho']);
			$text = $this -> phplattess -> dgp_import($link);
			$this -> dgps -> grava_dados_importados($text, $id, $link);
			$data['tempo'] = 5;
			$this -> load -> view('header/refresh', $data);
		} else {
			/* fim da importacao */
		}
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'gp_files';
		$this -> geds -> page = base_url('index.php/dgp/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'gp_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'gp_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'gp_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_delete($id);
	}

	function view($id = 0) {
		$this -> load -> model('dgps');
		$this -> load -> model('geds');
		$this -> cab();
		$data = array();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$data = $this -> dgps -> le($id);

		$this -> geds -> tabela = 'gp_files';
		$data['ged_arquivos'] = $this -> geds -> list_files($id, 'dgp');
		$data['ged_arquivos'] .= $this -> geds -> form_upload($id, 'dgp');
		$this -> load -> view('dgp/grupo', $data);
		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);

	}

	function edit($id = 0) {
		/* Models */
		$this -> load -> model('dgps');
		$this -> cab();
		$data = array();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$cp = $this -> dgps -> cp();
		$data = array();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> dgps -> tabela);
		$data['title'] = msg('dgps_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/dgp/admin/'));
		}

		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);
	}

	function comunicar_alteracao() {
		$this -> load -> model('dgps');
		$this -> cab();
		$data = array();
		$data['acoes'] = $this -> dgps -> acoes();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$this -> load -> view('dgp/grupo_alteracao', $data);

		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);
	}

	function novo_grupo() {
		$this -> load -> model('dgps');
		$this -> cab();
		$data = array();
		$data['acoes'] = $this -> dgps -> acoes();
		$data['logo'] = base_url('img/logo/logo_dgp.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);

		$this -> load -> view('dgp/grupo_novo', $data);

		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);
	}

	function lista_grupos() {
		/* Load Models */
		$this -> load -> model('dgps');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> dgps -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> dgps -> row($form);

		$form -> row_edit = base_url('index.php/dgp/edit');
		$form -> row_view = base_url('index.php/dgp/view');
		$form -> row = base_url('index.php/dgp');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('Label_gp_descricao');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

}
