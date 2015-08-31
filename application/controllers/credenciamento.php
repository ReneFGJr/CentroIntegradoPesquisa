<?php
class credenciamento extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library("Googlemaps");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}
	
	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_credenciamento.css');
		//array_push($js, 'unslider.min.js');
		//array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;


		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}	
	
	function index()
		{
			/* Model */
			$this->load->model('credenciamento/credenciamentos');
			
			$this->cab();
			$data = array();
			$data['tela'] = $this->credenciamentos->eventos_ativos_lista();
			
			$this->load->view("credenciamento/content",$data);		
		}
	function registro()
		{
			/* Model */
			$this->load->model('credenciamento/credenciamentos');
			
			$this->cab();
			
			$this->load->view('credenciamento/relogio');
			$data = array();
			$data['tela'] = $this->credenciamentos->registro_form();
			
			/* Dados da Sala */
			$sala = $this->credenciamentos->sala();
			$this->load->view("credenciamento/sala",$sala);
			$this->load->view("credenciamento/sala_presentes",$sala);
			$this->load->view("credenciamento/sala_logo_evento.php",$sala);
			
			$data = array_merge($data,$sala);
			
			$this->load->view("credenciamento/content",$data);					
		}

}
?>
