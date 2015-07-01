<?php
class admin extends CI_Controller {
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
		$data['title_page'] = 'Administração';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}
	
	
	function index() {
		$this -> cab();
		$data = array();
		
		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu,array('Parceiros','Parceiros da PucPR','ITE','/parceiro'));
		array_push($menu,array('Idiomas','Idiomas do Sistema','ITE','/idioma'));
		array_push($menu,array('Perfis','Perfil de usuário do Sistema','ITE','/perfil'));
		
		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu',$data);
		
		/*Fecha */ 		/*Gera rodapé*/
		$this -> load -> view('header/content_close'); 	
		$this -> load -> view('header/foot', $data);
	}
	
	
	function centro_resultado($id = 0)
		{
		$this->load->model('centro_resultados');
		$this -> cab();
		$data = array();
		
		$form = new form;
		$form->tabela = $this->centro_resultados->tabela;
		$form->see = true;
		$form = $this->centro_resultados->row($form);
		
		$form -> row_edit = base_url('index.php/admin/centro_resultado_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/admin/centro_resultado/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this->lang->line('title_centro_resultado');

		$this -> load -> view('form/form', $tela);	

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
		}	
	
	function logins_view($id = 0,$check = '')
		{
		
		$this -> cab();
		$data = array();	
		
		if (!checkpost_link($id) == $check)
			{
				redirect("index.php/main");
			}
		
		$this->load->model('logins');
		$data = $this->logins->le($id);
		$this -> load -> view('login/login_show', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
		}	
	
	function logins($id = 0)
		{
		$this->load->model('logins');
		$this -> cab();
		$data = array();
		
		$form = new form;
		$form->tabela = $this->logins->tabela;
		$form->see = true;
		$form = $this->logins->row($form);
		
		$form -> row_edit = base_url('index.php/admin/logins_edit/');
		$form -> row_view = base_url('index.php/admin/logins_view/');
		$form -> row = base_url('index.php/admin/logins/');

		$tela['tela'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = $this->lang->line('title_admin');

		$this -> load -> view('form/form', $tela);	

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
		}

}
