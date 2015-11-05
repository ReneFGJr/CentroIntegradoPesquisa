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
		
		date_default_timezone_set('America/Sao_Paulo');
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
		$this -> load -> view('evento/swb2/img_cab', $data);
		
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
		$err = '';
		$tela = $form->editar($cp,'');
		if ($form->saved > 0)
			{
				
				$cracha=$this->input->post('dd1');
				$cracha = $data=$this->usuarios->limpa_cracha($cracha);
				
				$dados = $data=$this->usuarios->le_cracha($cracha);
				if (count($dados) == 0)
					{
						$err = 'Código inválido';
					} else {
						$idi = $this->swb2s->insere_inscricao($dados['id_us'],4);
						$url = base_url('index.php/swb2/questionario/'.$idi.'/'.checkpost_link($idi));
						redirect($url);
						
					} 
			}
			
			$data['content'] = $tela;
			$data['content'] .= '</br></br><center><font color="red">'.$err.'</font>';
			$this->load->view('content', $data);
	}
	
	function questionario($id=0,$check='') {
		$tabela = 'evento_inscricao';
		
		$this -> load -> model('eventos/swb2s');
		$this -> load -> model('usuarios');
		$this -> cab();
		$data = array();
		
		$form = new form;
		$form->id = $id;
		$form->tabela = $tabela;
		
		$dados = $this->swb2s->le($id);
		$user = $dados['ei_us_usuario_id'];

		
		$data = $this->usuarios->le($user);
		$this->load->view('usuario/view',$data);
		
		$cp = $this->swb2s->cp_questionario();
		$err = '';
		$tela = $form->editar($cp,$tabela);
		if ($form->saved > 0)
			{
				redirect(base_url('index.php/swb2/finalizacao'));
			}
			
			$data['content'] = $tela;
			$data['content'] .= '</br></br><center><font color="red">'.$err.'</font>';
			$this->load->view('content', $data);
	}
	
	function finalizacao()
		{
			$this->cab();
			//$this -> load -> view('evento/swb2/img_cab', $data);
			$this->load->view('evento/swb2/agredecimento');
		}
		
	
	
}


