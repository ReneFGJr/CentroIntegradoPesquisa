<?php
class persona extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');

		/* Security */
		$this -> security();

		//$this -> lang -> load("app", "english");
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

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('Perfil Pessoal');
		$data['menu'] = 0;
		//$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open.php');
		
	}

	function index($id = 0) {

		$id = $_SESSION['us_id'];
		$this -> view($id);
	}

	function view($id = 0) {
		/* Models */
		$this -> load -> model('usuarios');

		
		/* Carrega classes adicionais */
		$this -> cab();
		$data = array();

		if ($id == 0) {
			redirect(base_url('index.php/main'));
			exit ;
		}
		
		$tela = $this->usuarios->view_prefil($id);
		$data['content'] = $tela;
		$this->load->view('content',$data);		

		$this -> load -> view('header/content_close.php');
		$this -> load -> view('header/foot');
	}

}
?>