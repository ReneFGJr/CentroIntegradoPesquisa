<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swb2 extends CI_Controller {
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
	}
	public function index()
	{
		$this->load->view('index');
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
		$data['title_page'] = 'SWB2';

	}
	
	
	function inscricoes($id=0,$check='') {
		$tabela = 'evento_inscricao';
		
		$this -> load -> model('eventos/swb2s');
		$this -> load -> model('usuarios');
		$this -> cab();
		$data = array();
		
		$form = new form;
		$form->id = $id;
		$form->tabela = $tabela;
		
		$cp = $this->swb2s->cp();
		
		$tela = $form->editar($cp,'');
		if ($form->saved > 0)
			{
				
				$cracha=$this->input->post('dd1');
				echo "$cracha";
				echo "</br>";
				$cracha = $data=$this->usuarios->limpa_cracha($cracha);
				echo "$cracha";
				
				$dados = $data=$this->usuarios->le_cracha($cracha);
				print_r($dados);
				
				
				exit();
				//$url = base_url('index.php/stricto_sensu');
				//redirect($url);
			}
			
			$data['content'] = $tela;
			$this->load->view('content', $data);


	}
	
}


