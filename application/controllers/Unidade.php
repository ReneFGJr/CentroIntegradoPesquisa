<?php
class Unidade extends CI_Controller {
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

		/* Menu */
		$menus = array();
		array_push($menus,array('Bolsas / Recursos Humanos','#'));
		array_push($menus,array('Aux�lio Pesquisa','#'));
		array_push($menus,array('Coopera��o Internacional','#'));
		array_push($menus,array('Pr�mios','#'));
		array_push($menus,array('Eventos','#'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Unidades';
		$data['menu'] = 0;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}
	
	
	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('unidades');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> unidades -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> unidades -> row($form);

		$form -> row_edit = base_url('index.php/unidade/edit');
		$form -> row_view = base_url('index.php/unidade/view');
		$form -> row = base_url('index.php/unidade');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('Label_index_unidade');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	


	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('unidades');
		$cp = $this->unidades->cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$form = new form;
		$form->id = $id;
		
		$tela = $form->editar($cp,$this->unidades->tabela);
		$data['title'] = msg('Label_editar_unidade');
		$data['tela'] = $tela;
		$this -> load -> view('form/form',$data);
		
		/* Salva */
		if ($form->saved > 0)
			{
				redirect(base_url('index.php/unidade'));
			}
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('unidades');

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$data = $this->unidades->le($id);

		$this -> load -> view('unidade/view', $data);
		//$this -> load -> view('dgp/view_mygroups', $data);
		//$this -> load -> view('dgp/view_indicadores', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


}
?>