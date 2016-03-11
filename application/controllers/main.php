<?php

class main extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
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
		array_push($js, 'unslider.js');

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
		$cracha = $_SESSION['cracha'];
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

		/* Stricto Sensu */
		$ss = $_SESSION['ss'];

		/* Menu */
		$menu = array();
		/* Libera Menus */
		if (isset($_SESSION['us_id'])) {
			$idu = $_SESSION['us_id'];
		} else {
			$idu = '';
		}

		/* Submiss�es IC */
		$this -> load -> model("ics");
		$subm = $this -> ics -> submissoes_abertas(2);

		/* Submiss�o PIBIC MASTER */
		if ($subm['sw_01'] == '1') {
			if ((strlen($ss) > 0) or (perfil("#CPI#SPI#ADM") > 0)) {
				$mod = $subm['sw_tipo'];
				array_push($menu, array(msg('submit_' . $mod), msg('submit_' . $mod . '_text'), 'BTS', '/ic/submit_' . $mod));
			}
		}
		/* AVALIACOES IC */
		if ((strlen($idu) > 0) and ($this -> ics -> existe_avaliacoes($idu) == 1)) {
			array_push($menu, array('Avalia��o IC', '<img src="' . base_url('img/icon/icon_avaliacoes.png') . '" align="right" width="48">Indica��es para sua avalia��o', 'BTS', '/avaliador'));
		}

		if (strlen($ss) > 0) {

			array_push($menu, array('Perfil', 'Perfil individual de pesquisador, com capta��o, artigos e orienta��es', 'BTN', '/persona'));
		}

		/* Libera Menus */
		if (perfil('#DGP#CPS#COO#CPP#SPI#ADM#SEP') == 1) { array_push($menu, array('Docentes & Discentes', 'Cadastrao de docentes, discentes, avaliadores e usuarios do sistema', 'BTA', '/usuario/row'));
		}

		/* Libera Menus */
		if (perfil('#CPP#SPI#ADM') == 1) { array_push($menu, array('Incia��o Cient�fica', 'Administra��o do Programa de Inicia��o Cient�fica e Tecnol�gia da PUCPR', 'BTA', '/ic'));
		}
		if (perfil('#CPS#COO#ADM') == 1) { array_push($menu, array('CIP', 'Administra��o do Centro Integrado de Pesquisa, Administra��o', 'BTA', '/cip'));
		}
		if (perfil('#ADM#SEP') == 1) {
			array_push($menu, array('Stricto Sensu', 'Secretaria e Coordena��o do <i>stricto sensu</i>', 'BTA', '/stricto_sensu'));
		}

		if (perfil('#ADM') == 1) {
			array_push($menu, array('CNPq', 'Administra��o', 'BTN', '/cnpq'));
		}

		if (perfil('#CPP#SPI#ADM#EVE') == 1) {
			array_push($menu, array('Eventos', 'Sistema de Gest�o de Eventos', 'BTA', '/evento'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Fomento', 'Observat�rio de Pesquisa', 'BTA', '/edital'));
		}
		if (perfil('#DGP#ADM') == 1) { array_push($menu, array('Grupo de Pesquisa', 'Pesquisas da PUCPR', 'BTA', '/dgp'));
		}
		if (perfil('#FND#ADM') == 1) { array_push($menu, array('Fundo de Pesquisa', 'Fundo de Pesquisa', 'BTA', '/fundo'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Pr�-Equipamentos', 'Laborat�rios e equipamentos', 'BTA', '/equipamento'));
		}
		if (perfil('#CPP#SPI#ADM#CSF') == 1) { array_push($menu, array('Programa CsF - Gest�o', 'Ci�ncia sem Fronteiras', 'BTA', '/csf_site'));
		}
		if (perfil('#CPP#SPI#ADM#CSF') == 1) { array_push($menu, array('Programa CsF - Site', 'Ci�ncia sem Fronteiras', 'BTA', '/csf'));
		}

		if (perfil('#SEC#SEM#ADM') == 1) { array_push($menu, array('SEMIC', 'Semin�rio de Inicia��o Cient�fica - PUCPR', 'BTA', '/semic'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('Fomento', 'Observat�rio de Pesquisa', 'BTN', '/edital'));
		}
		if (perfil('#CPS#COO#ADM#OBS') == 1) { array_push($menu, array('CIP', 'Centro Integrado de Pesquisa, Administra��o', 'BTN', '/cip'));
		}
		if (perfil('#DGP#ADM') == 1) {
			array_push($menu, array('Banco de Projetos', 'Pesquisa realizadas na PUCPR', 'BTN', '/banco_projetos'));
		}
		/* Inicia��o Cient�fica */
		if ($this -> ics -> is_ic($cracha)) {
			array_push($menu, array('Inicia��o Cient�fica', 'Programa de Inicia��o Cient�fica e Tecnol�gia da PUCPR', 'BTN', '/pibic'));
		}

		if ((perfil('#TST') == 1) or ($ss == 1)) {
			array_push($menu, array('Stricto Sensu', 'Coordenadores e Professores do <i>stricto sensu</i>', 'BTN', '/ss'));
		}

		if (perfil('#TST#SPI') == 1) {
			array_push($menu, array('Indicadores de Pesquisa', 'Indicadores Pesquisa', 'BTB', '/indicadores'));
		}
		
		if (perfil('#CEP#TST') == 1) { array_push($menu, array('CEP', 'Comit� de �tica em Pesquisa com Seres Humanos', 'BTA', '/csf'));
		}
		
		
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