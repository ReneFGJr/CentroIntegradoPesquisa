<?php
class cnpq_ws extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> helper('tcpdf');
		
		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
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
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/cnpq_ws/'));

		/* Carrega Menu*/
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas Padrao da IC*/
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'CNPq - WebService';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		/* Adiciona logo da IC*/
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_cnpq_2016.png');
		$this -> load -> view('header/logo', $data);
		
	}

	function index()
		{
			$this->cab();
			$menu = array();
			$sx = '<a href="'.base_url('index.php/cnpq_ws/get_xml').'">Get XML</a>';
			$sx .= '<br>';
			$sx .= '<a href="'.base_url('index.php/cnpq_ws/get_update').'">Get update</a>';
			$data['content'] = $sx;
			$this->load->view('content',$data);
		}
	function get_xml($id = '5900345665779424') {
		/* Load Models */
		$this -> load -> model('webservice/ws_cnpq');
		
		$this -> cab();
		$data = array();
		
		$data['content'] = 'Atualizado em: '.$this->ws_cnpq->getCurriculoCompactado($id);
		$this->load->view('content',$data);	
			
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

	function get_update($id = '9568021117744368') {
		/* Load Models */
		$this -> load -> model('webservice/ws_cnpq');
		
		$this -> cab();
		$data = array();
		
		$data['content'] = 'Atualizado em: '.$this->ws_cnpq->getDataAtualizacaoCV($id);
		$this->load->view('content',$data);				
		
			
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>