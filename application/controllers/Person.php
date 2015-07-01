<?php
class person extends CI_Controller {

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
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();

		//$this -> lang -> load("app", "english");
	}

	function ajax_acao($id=0,$chk='',$acao='')
		{
			$this->load->model('usuarios');
			switch ($acao)
				{
				case 'email':
						$tela = $this->usuarios->lista_email($id);
						break;
				}
			$data = array();
			$data['content'] = $tela;
			$this->load->view('content',$data);
		}

	public function index($id = 0) {
		//$this -> cab();
	}
	public function view($id = 0) {
		/* Models */
		$this->load->model('usuarios');
		
		$this -> cab();
		$data = $this->usuarios->readById($id);
		$this->load->view('usuario/view',$data);
	}
	public function cab() {

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Perfil do Usuário';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

}
?>