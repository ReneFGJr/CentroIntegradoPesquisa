<?php
class ss extends CI_Controller {

	// Propriet�rio do e-mail
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
	
	public function cab($title = '') {

		/* Security */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();

		/* FALHA NO LOGIN */
		$cracha = $_SESSION['cracha'];
		if (strlen($cracha) == 0) {
			$us = $_SESSION['id_us'];
			$erro = 999;
			/* sess�o finalizada pelo servidor */
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
		$data['cabtitle'] = $title;

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
		$this -> load -> view('ss/index', $data);
	}	



	public function index($id = 0) {
		$this->load->model('artigos');
		$this->load->model('captacoes');
		
		$cracha = $_SESSION['cracha'];

		$this -> cab('Programas de P�s-Gradua��o <i>stricto sensu</i>');
		$data = array();
		
		/* Recupera cracha */
		$cracha = $_SESSION['cracha'];
		
		/* Resumo das Captacoes */
		$texto = '<a href="'.base_url('index.php/captacao/grants/').'" class="lt2 link">'.msg('captacao_ver_cadastro').'</a>'; /* Texto para visualizar todas as captacoes */
		$capt = $this -> captacoes -> resumo_projetos($cracha);
		$data = array_merge($data, $capt);
		$data['captacao_texto'] = $texto;
			
		/* Carrega Views */
		$capt_resumo = $this -> load -> view('perfil/perfil_captacoes', $data, True);
		$capt_lista = $capt['captacoes'];	
		
		/* Resumo de Artigos */
		$texto = '<a href="'.base_url('index.php/ss/artigos/').'" class="lt2 link">'.msg('artigo_ver_cadastro').'</a>'; /* Texto para visualizar todos os artigos */	
		$arti = $this->artigos->resumo_artigos($cracha);
		$data = array_merge($data, $arti);
		$data['artigo_texto'] = $texto;
		
		/* Carrega Views */
		$resumo_artigos = $this -> load -> view('perfil/perfil_artigos', $data, True);
		
		$data['content'] = $capt_resumo;
		$data['content'] .= $resumo_artigos;
		$this->load->view('content',$data);

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
		array_push($bp,'FINALIZA��O');
		$data['bp'] = $bp;
		$data['bp_atual'] = ($pag-1);
		$data['bp_link'] = base_url('index.php/ss/artigo/'.$id.'/'.checkpost_link($id).'/');
		$this->load->view('gadget/progessbar_horizontal.php',$data);
		
		/* Form */
		$form = new form;
		$form -> tabela = 'cip_artigo';
		$form -> id = $id;
		switch ($pag)
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
			case '4':
				$cp = $this -> artigos -> cp_04();
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
		$this -> load -> view('header/foot', $data);
	}	

}
?>