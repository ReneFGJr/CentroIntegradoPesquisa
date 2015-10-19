<?php
class Journal extends CI_Controller {

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
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/ic/'));
		
		array_push($menus, array('Pessoas', 'index.php/ic/usuarios'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));
		
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		
		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		array_push($menus, array('Relatórios', 'index.php/ic/report'));
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Journals';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic.png');
		$this -> load -> view('header/logo', $data);
	}

	function index($id = 0) {
		/* Load Models */
		$this -> load -> model('journals');
		$data = array();

		$this -> cab();
		
		$data['content'] = '<A href="'.base_url('index.php/journal/process_qualis').'">Processar Qualis</A>';
		$data['content'] .= '<br><A href="'.base_url('index.php/journal/process_scimago').'">Processar Scimago</A>';
		
		$this -> load -> view('content',$data);		
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function harvesting_issn_scimago($issn ='') {
		/* Load Models */
		$this -> load -> model('journals');

		$this -> cab();
		$data = array();

		if (strlen($issn) > 0)
			{
				$this->journals->search_issn_scimago($issn);
			}
				
		$this -> load -> view('content',$data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function process_qualis($id = 0) {
		/* Load Models */
		$this -> load -> model('journals');

		$this -> cab();
		$data = array();

		$data['content'] = $this->journals->process($id);
		$data['offset'] = $id;
		
		$this -> load -> view('content',$data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	function process_scimago($id = 0) {
		/* Load Models */
		$this -> load -> model('journals');

		$this -> cab();
		$data = array();

		$data['content'] = $this->journals->process_scimagos($id);
		$data['offset'] = $id;
		
		$this -> load -> view('content',$data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
}
