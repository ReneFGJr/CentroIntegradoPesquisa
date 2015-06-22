<?php
class indicadores extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');

	}

	function cab()
		{
			$css = array('style_indicador.css');
			$data['css'] = $css;
			$this -> load -> view("header/header",$data);
			$this -> load -> view("indicadores/cab_indicator");
		}
	function index() {
		$this -> cab();
		
		$data['submissoes_ano'] = '912'; 
		$this -> load -> view("indicadores/ic_submissao",$data);
		$this -> load -> view('indicadores/highcharts_bar');
		
		/* Grafico 1 */
		$this -> load -> view('indicadores/ic_submissao_perfil');

		/* Grafico 2A */
		$this -> load -> view('indicadores/ic_submissao_perfil_01');
		$this -> load -> view('indicadores/ic_submissao_perfil_02');
		$this -> load -> view('indicadores/ic_submissao_perfil_03');
		
		/* Grafico 2A */
		$this -> load -> view('indicadores/ic_submissao_perfil_04');
		$this -> load -> view('indicadores/ic_submissao_perfil_05');
		$this -> load -> view('indicadores/ic_submissao_perfil_06');		
	}

}
