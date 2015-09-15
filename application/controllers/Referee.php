<?php
class referee extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('links_users');
		$this -> load -> library('session');
		$this -> load -> helper('email');

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
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
		array_push($menus, array('Programacao', 'index.php/semic'));
		array_push($menus, array('Trabalhos', 'index.php/semic/trabalhos'));
		array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'SEMIC - ' . date("Y");
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function ag() {
		/* Load Models */
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');


		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index() {
		/* Load Models */
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> botao_novo_bloco();
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_salas -> mostra_blocos();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
