<?php
class inport extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('xml');
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
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Módulo de Importação RO8';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function ro8($id = '') {
		/* Load Models */
		$this -> load -> model('ro8s');

		$this -> cab();
		$data = array();
		$data['content'] = '';
		$this -> load -> view('header/content_open');
		
		switch ($id)
			{
			case 'ic':
				$data['content'] = $this->ro8s->inport_ic_noticia();
				break;
			case 'instituicao':
				$data['content'] = $this->ro8s->inport_insituicao();
				break;
			}
		$this -> load -> view('content', $data);
		// http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=ic_noticia&limit=100

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function index() {
		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('RO8-PostGress', 'Mensagens do Sistema', 'ITE', '/inport/ro8/ic'));
		array_push($menu, array('RO8-PostGress', 'Instituições', 'ITE', '/inport/ro8/instituicao'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Importação';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
