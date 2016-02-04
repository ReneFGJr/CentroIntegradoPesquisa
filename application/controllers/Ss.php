<?php
class ss extends CI_Controller {

	// Proprietário do e-mail
	var $id_own_pibic = 2;

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}
	
	public function cab() {

		/* Security */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();

		/* FALHA NO LOGIN */
		$cracha = $_SESSION['cracha'];
		if (strlen($cracha) == 0) {
			$us = $_SESSION['id_us'];
			$erro = 999;
			/* sessão finalizada pelo servidor */
			//$this->josso_login_pucpr->historico_insere_erro('',$erro,$us);
			$link = base_url('index.php/login');
			redirect($link);
		}

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/pibic'));
		array_push($menus, array('Protocolos', 'index.php/pibic/protocolo'));


		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Stricto Sensu';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}	

	public function index($id = 0) {

		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();

		$this -> load -> view('header/content_close');
	}
	
	public function artigo($id = 0,$chk='',$pag=1) {
		$this->load->model('artigos');
		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();
		$bp = array();
		array_push($bp,'DADOS');
		array_push($bp,'ESTRATOS');
		array_push($bp,'ARQUIVOS');
		$data['bp'] = $bp;
		$data['bp_atual'] = ($pag-1);
		$data['bp_link'] = base_url('index.php/ss/artigo/'.$id.'/'.checkpost_link($id).'/');
		$this->load->view('gadget/progessbar_horizontal.php',$data);
		
		/* Form */
		$form = new form;
		$form -> tabela = 'cip_artigo';
		$form -> id = $id;
		switch (pag)
			{
			case '1':
				$cp = $this -> artigos -> cp_01();
				break;
			case '2':
				$cp = $this -> artigos -> cp_02();
				break;
			case '3':
				$cp = $this -> artigos -> cp_03();
				break;
			default:
				$cp = array();
				break;
			}
		
		$data['content'] = $form -> editar($cp, $form -> tabela);

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/indicadores/produtividade'));
		}

		$data['title'] = 'Cadastro de Artigos';
		$this -> load -> view('content', $data);		

		$this -> load -> view('header/content_close');
	}	

}
?>