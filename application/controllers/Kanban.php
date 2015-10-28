<?php
class Kanban extends CI_Controller
	{
	function __construct() {
		global $dd, $acao;
		parent::__construct();

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
		array_push($css, 'kanban.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus,array('Drash Board','#'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Kanban Drash Board';
		$data['menu'] = 0;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}
		function index()
			{
				$this->load->model('kanbans');
				$this->cab();
				$data = array();
				$data['content'] = $this->kanbans->row();
				$this->load->view('content',$data);
			}
		function project($id=0,$chk='')
			{
				$this->load->model('kanbans');
				$this->cab();
				
				$sx = $this->kanbans->task(1);
				$data = array();
				$data['content'] = $sx;
				$this->load->view('content',$data);
				
			}
	}
?>
