<?php
class Fomento extends CI_Controller {
	
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
	
	public function index(){
	
	$this ->load->model('fomentos');
		
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
		$data['title_page'] = 'Edital Fomento';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}
	
	public function editEditalFomento()
		{
		//cabecalho	
		$this -> cab();
		//abre
		$this -> load -> view('header/content_open');
		
		//chama a View		
		$this -> load -> view('fomento/fomento.php');
		
		//fecha
		$this -> load -> view('header/content_close');
		//rodape
		$this -> load -> view('header/foot');			
		}
		

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('fomentos');
	
		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$data = $this->fomentos->le($id);
	
		$this -> load -> view('fomento/fomento', $data);
	
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}


	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('fomentos');
		$cp = $this->fomentos->cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');
		
		$form = new form;
		$form->id = $id;
		
		$tela = $form->editar($cp,$this->fomentos->tabela);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form',$data);
		
		/* Salva */
		if ($form->saved > 0)
			{
				redirect(base_url('index.php/fomento'));
			}
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	

}

?>