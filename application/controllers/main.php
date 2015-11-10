<?php
class main extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		//$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');

		/* Security */
		$this -> security();

		//$this -> lang -> load("app", "english");
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
		$data['title_page'] = 'Parceiros PUCPR';
		$data['menu'] = 0;
		//$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);		
	}

	function index() {

		/* Carrega classes adicionais */
		$this -> cab();
		$data = array();

		//* Menu */
		$menus = array();

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Menu Principal';
		$data['menu'] = 0;
		$data['menus'] = $menus;
		$this -> load -> view('header/content_open.php');

		$this -> load -> view('header/cab', $data);

		/* Chamadas editais */
		$this -> load -> view('fomento/chamadas_resumo', $data);

		/* Menu */
		$menu = array();
		/* Libera Menus */
		$idu = $_SESSION['us_id'];
		
		if (strlen($idu) > 0)
			{
			array_push($menu, array('Perfil', 'Perfil individual de pesquisador, com captação, artigos e orientações', 'BTN', '/persona'));
			}
		
		/* Libera Menus */
		if (perfil('#CPP#SPI#ADM') == 1) { array_push($menu, array('Inciação Científica', 'Administração do Programa de Iniciação Científica e Tecnológia da PUCPR', 'BTA', '/ic'));
		}
		if (perfil('#CPS#COO#ADM') == 1) { array_push($menu, array('CIP', 'Administração do Centro Integrado de Pesquisa, Administração', 'BTA', '/cip'));
		}
		if (perfil('#ADM') == 1) {
			array_push($menu, array('Stricto Sensu', 'Secretaria e Coordenação do <i>stricto sensu</i>', 'BTA', '/stricto_sensu'));
		}		
		if (perfil('#CPP#SPI#ADM') == 1) {
			array_push($menu, array('Eventos', 'Sistema de Gestão de Eventos', 'BTA', '/evento'));
		}		
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Fomento', 'Observatório de Pesquisa', 'BTA', '/edital'));
		}
		if (perfil('#DGP#ADM') == 1) { array_push($menu, array('Grupo de Pesquisa', 'Pesquisas da PUCPR', 'BTN', '/dgp'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Pró-Equipamentos', 'Laboratórios e equipamentos', 'BTA', '/equipamento'));
		}
		if (perfil('#CPP#SPI#ADM#CSF') == 1) { array_push($menu, array('Programa CsF - Gestão', 'Ciência sem Fronteiras', 'BTA', '/csf_site'));
		}
		if (perfil('#CPP#SPI#ADM#CSF') == 1) { array_push($menu, array('Programa CsF - Site', 'Ciência sem Fronteiras', 'BTA', '/csf'));
		}
		
		if (perfil('#SEC#SEM#ADM') == 1) { array_push($menu, array('SEMIC', 'Seminário de Iniciação Científica - PUCPR', 'BTA', '/semic'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Fomento', 'Observatório de Pesquisa', 'BTN', '/edital'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('CIP', 'Centro Integrado de Pesquisa, Administração', 'BTN', '/cip'));
		}
		if (perfil('#DGP#ADM') == 1) {
			array_push($menu, array('Banco de Projetos', 'Pesquisa realizadas na PUCPR', 'BTN', '/banco_projetos'));
		}
		if (perfil('#DOC#EST#ADM') == 1) {
			array_push($menu, array('Inciação Científica', 'Programa de Iniciação Científica e Tecnológia da PUCPR', 'BTN', '/pibic'));
		}
		array_push($menu, array('Indicadores de Pesquisa', 'Indicadores Pesquisa', 'BTB', '/indicadores'));

		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Principal';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close.php');
		$this -> load -> view('header/foot');
	}

	function expediente() {

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
		$data['title_page'] = $this -> lang -> line('about_expediente');

		$data['menu'] = 0;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('expediente/index', $data);

		$this -> load -> view('header/foot');
	}

}
?>