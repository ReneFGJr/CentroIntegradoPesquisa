<?php
class perfil extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

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

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Perfil de usuário do sistema CIP';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}
	
	
	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('perfis');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> perfis -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> perfis -> row($form);

		$form -> row_edit = base_url('index.php/perfil/edit');
		$form -> row_view = base_url('index.php/perfil/view');
		$form -> row = base_url('index.php/perfil');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('Label_index_perfil');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	


	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('perfis');
		$cp = $this->perfis->cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$form = new form;
		$form->id = $id;
		
		$tela = $form->editar($cp,$this->perfis->tabela);
		$data['title'] = msg('Label_editar_perfil');
		$data['tela'] = $tela;
		$this -> load -> view('form/form',$data);
		
		/* Salva */
		if ($form->saved > 0)
			{
				redirect(base_url('index.php/perfil'));
			}
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('perfis');

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$data = $this->perfis->le($id);

		$this -> load -> view('perfil/view', $data);
		//$this -> load -> view('dgp/view_mygroups', $data);
		//$this -> load -> view('dgp/view_indicadores', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


}
?>