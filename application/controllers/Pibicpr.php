<?php
class pibicpr extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		//$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');

		/* Security */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();

		//$this -> lang -> load("app", "english");
	}

	function cab() {

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 0;
		$this -> load -> view('header/cab', $data);

	}
	
	function avaliadoresIN()
		{
		$this -> cab();
		$this -> load -> view('header/content_open');		
		$this -> load -> view('avaliador/perfil');
		$this -> load -> view('avaliador/perfil_resumo');
		$this -> load -> view('avaliador/perfil_areas');
		$this -> load -> view('header/content_close');
		
		$this -> load -> view('header/foot');			
		}

	function index() {
		$this -> cab();
		/* Menu */
		$menu = array();
		array_push($menu, array('Avaliadores IC', 'Avaliadores Internos', 'ITE', '/pibicpr/avaliadoresIN'));
		array_push($menu, array('Avaliadores IC', 'Avaliadores Externos', 'ITE', '/pibicpr/avaliadoresOUT'));
		
		array_push($menu, array('Áres do conhecimento', 'Áreas CNPq/CAPES', 'ITE', '/pibicpr/areasdoconhecimento'));

		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Principal';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/foot');
	}

}
?>

?>
