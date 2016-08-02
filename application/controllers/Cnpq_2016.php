<?php
class cnpq_2016 extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
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
		array_push($css, 'custom_theme_16.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/cnpq_2016/'));

		/* Carrega Menu*/
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas Padrao da IC*/
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'CNPq';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		/* Adiciona logo da IC*/
		$this -> load -> view('header/content_open');
		//$data['logo'] = base_url('img/logo/logo_cnpq_2016.png');
		//$data['logo'] = base_url('');
		//$this -> load -> view('header/logo', $data);
		
	}

	function index($view = '') {
		/* Load Models */
		//$this -> load -> model('idiomas');
		
		$this -> cab();
		$data = array();
		
		//$this -> load -> view('cnpq/view_welcome');
		//$this -> load -> view('cnpq/view_box');
		$this -> load -> view('cnpq2016/index_cnpq');
		$this -> load -> view('header/content_close');
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function view($view = '') {
		/* Load Models */
		//$this -> load -> model('idiomas');
		
		$this -> cab();
		$data = array();
		
		switch($view){
			case 'sobreoxxivsemic':
				$this -> load -> view('cnpq2016/sobreoxxivsemic');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;
			
			case 'semicpremiacoes':
				$this -> load -> view('cnpq2016/semicpremiacoes');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;
			
			case 'cnpq_experiencia_institucional_ic_2016':
				$this -> load -> view('cnpq2016/cnpq_experiencia_institucional_ic_2016');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;

			case 'cnpq_experiencia_institucional_ic_2016_jr':
				$this -> load -> view('cnpq2016/cnpq_experiencia_institucional_ic_2016_jr');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;
			
			case 'cnpq_relato_processo_de_selecao_2016':
				$this -> load -> view('cnpq2016/cnpq_relato_processo_de_selecao_2016');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;
			
			case 'cnpq_membros_do_comite_gestor_2015':
				$this -> load -> view('cnpq/cnpq_membros_do_comite_gestor_2015');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;

			case 'cnpq_semic_2015':
				$this -> load -> view('cnpq2016/cnpq_semic_2015');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;

			case 'novos_programas':
				$this -> load -> view('cnpq2016/novos_programas');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;

			case 'editaisenormas':
				$this -> load -> view('cnpq2016/editaisenormas');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;				

			case 'An�lise do Edital 2016/2017':
				$this -> load -> view('cnpq2016/cc');
				
				$this -> load -> view('header/content_close');
				$this -> load -> view('header/foot', $data);
			break;

			default:
			$this -> load -> view('cnpq2016/view_welcome');
				break;
		}
		
		;
	}	

}
?>