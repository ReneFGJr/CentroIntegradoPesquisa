<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swb extends CI_Controller {
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
		$this->load->view('header/header',null);	
		$this->load->view('header/404');
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
		$this -> load -> view('evento/swb/img_cab', $data);
		
		$data['title_page'] = 'SWB';
	}
	
	
	function inscricoes($id=0,$check='') {
		$tabela = 'evento_inscricao';
		
		$this -> load -> model('eventos/swbs');
		$this -> load -> model('usuarios');
		$this -> cab();
		$data = array();
		
		$evento = $this->swbs->evento_ativo();
		
		$form = new form;
		$form->id = $id;
		$form->tabela = $tabela;
		
		$cp = $this->swbs->cp();
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
						$idi = $this->swbs->insere_inscricao($dados['id_us'],$evento);
						$url = base_url('index.php/swb/questionario/'.$idi.'/'.checkpost_link($idi));
						redirect($url);
						
					} 
			}
			
			$data['content'] = $tela;
			$data['content'] .= '</br></br><center><font color="red">'.$err.'</font>';
			$this->load->view('content', $data);
	}
	
	function questionario($id=0,$check='') {
		$tabela = 'evento_inscricao';
		
		$this -> load -> model('eventos/swbs');
		$this -> load -> model('usuarios');
		$this -> cab();
		$data = array();
		
		$form = new form;
		$form->id = $id;
		$form->tabela = $tabela;
		
		$dados = $this->swbs->le($id);
		$user = $dados['ei_us_usuario_id'];

		
		$data = $this->usuarios->le($user);
		$this->load->view('usuario/view',$data);
		
		$cp = $this->swbs->cp_questionario();
		$err = '';
		$tela = $form->editar($cp,$tabela);
		if ($form->saved > 0)
			{
				redirect(base_url('index.php/swb/finalizacao'));
			}
			
			$data['content'] = $tela;
			$data['content'] .= '</br></br><center><font color="red">'.$err.'</font>';
			$this->load->view('content', $data);
	}
	
	function finalizacao()
		{
			$this->cab();
			//$this -> load -> view('evento/swb/img_cab', $data);
			$this->load->view('evento/swb/agredecimento2');
		}
		
	
	
}


