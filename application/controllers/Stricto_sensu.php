<?php
class stricto_sensu extends CI_Controller {
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

		/* Monta telas */
		$this -> load -> view('header/header', $data);

		$data['title_page'] = 'Stricto Sensu';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function index() {
		$this -> load -> model('stricto_sensus');
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		$this -> load -> view('ss/index', $data);

		$data['content'] = $this -> stricto_sensus -> lista_programas();
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver($id=0,$chk='') {
		$this -> load -> model('stricto_sensus');
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		$this -> load -> view('ss/index', $data);

		$data = $this->stricto_sensus->le($id);
		
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function editar($id = 0, $check = '') {
		if (perfil('#CPP#SPI#ADM') == 1) {
			$tabela = 'ss_programa_pos';

			$this -> load -> model('stricto_sensus');
			$this -> cab();
			$data = array();
			$this -> load -> view('header/content_open');
			$this -> load -> view('ss/index', $data);

			$form = new form;
			$form -> id = $id;
			$form -> tabela = $tabela;

			$cp = $this -> stricto_sensus -> cp();

			$tela = $form -> editar($cp, $tabela);
			if ($form -> saved > 0) {
				$url = base_url('index.php/stricto_sensu');
				redirect($url);
			}

			$data['content'] = $tela;
			$this -> load -> view('content', $data);

			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		} else {
			redirect(base_url('index.php/main'));
		}
	}

}
