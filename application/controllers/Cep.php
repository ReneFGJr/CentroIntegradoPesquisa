<?php
class cep extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users_helper');
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
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('home', 'index.php/cip/'));
		array_push($menus, array(msg('pauta'), 'index.php/cep/pauta'));

		array_push($menus, array(msg('comunicacao'), 'index.php/cip/comunicacao'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Comit� de �tica em Pesquisa - Humanos';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('ceps');

		$this -> cab();
		$data = array();

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function inport() {

		/* Load Models */
		$this -> load -> model('ceps');

		$this -> cab();
		$data = array();
		
		$st = '<form method="post">';
		$st .= '<textarea name="dd1" cols=80 rows=20>'.get("dd1")."</textarea>";
		$st .= '<br><input type="submit" name="acao" value="importar">';
		$st .= '</form>';
		$data['content'] = $st;		
		$this->load->view('content',$data);
		$dd1 = get("dd1");
		if (strlen($dd1) > 0)
			{
				$sx = $this->ceps->inport($dd1);
				$data['content'] = $sx;
				$data['title'] = 'Result';				
				$this->load->view('content',$data);
			}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

	/************************************************************************************
	 * **********************************************************************************
	 * ************************************************************** COMUNICACAO ******/
	function comunicacao() {
		$this -> cab();
		$data = array();

		$menu = array();
		array_push($menu, array('Mensagens', 'Mensagens padr�o do sistema', 'ITE', '/cip/comunicacao_1'));
		array_push($menu, array('Mensagens', 'Mensagens de comunica��o', 'ITE', '/cip/comunicacao_2'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Mensagens';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

}
?>
