<?php
class Fca extends CI_Controller {
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

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus,array('Bolsas / Recursos Humanos','#'));
		array_push($menus,array('Auxílio Pesquisa','#'));
		array_push($menus,array('Cooperação Internacional','#'));
		array_push($menus,array('Prêmios','#'));
		array_push($menus,array('Eventos','#'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Fator de Correção de Avaliação';
		$data['menu'] = 0;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}
	
	
	function index($id = 0, $tipo = 'SUBMP') {
		/* Load Models */
		$this -> load -> model('fcas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$media_notas = 0;
		$media_avaliadores = 0; 
		$fca = 0;

		$media_notas = $this -> fcas -> calc_media_notas($tipo);
		$media_avaliadores = $this -> fcas -> calc_media_notas_avaliador($tipo);
		
		//$data['content'] = ($media_notas);
		//$data['content'] = ($media_avaliadores);
		
		
		if (count($media_avaliadores) > 0) {
			$media_avaliador = $media_avaliadores;
						
			$data['content'] = ($media_avaliador);
		}
		
		
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

}
?>