<?php
class fundo extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
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
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');
		/* HighCharts */
		array_push($js, 'high/highcharts.js');
		array_push($js, 'high/modules/funnel.js');
		array_push($js, 'high/modules/exporting.js');
		
		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/fundo/'));
		array_push($menus, array('Relatório', 'index.php/fundo/report'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_fundo');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		
		$this -> load -> view('header/content_open', $data);
		$data['logo'] = base_url('img/logo/logo_fundo.png');
		$this -> load -> view('header/logo', $data);
	}

	function reports($id = 0, $gr = '') {
		$this -> load -> model('fundo');
		
		$this -> cab();
		$data = array();
		
		$data['logo'] = base_url('img/logo/logo_fundo.png');
		
		$this -> load -> view('header/logo', $data);
		
		switch ($id)
			{
			/* Grupos por campus */
			case 'gc':
				$tela = '<table border=0 class="border1"><tr><td>';
				$tela .= $this->fundos->grupos_campus();
				$tela .= '</td><td>';
				$data['data'] = $this->fundos->graph;
				$data['title'] = 'Distribuição dos Grupos de Pesquisa por campus';
				$tela .= $this->load->view('fundo/dfundo_indicador_01',$data,true);
				$tela .= '</td></tr></table>';	
				
				/* Detalhes do relatorio */
				if (strlen($gr) > 0)
					{
						$tela .= '<br>';
						$tela .= $this->fundos->grupos_campus_detalhes($gr);							
					}
				break;
			/* Grupos por Escolas */
			case 'ge':
				$tela = '<table border=0 class="border1"><tr><td>';
				$tela .= $this->fundos->grupos_escolas();
				$tela .= '</td><td>';
				$data['data'] = $this->fundos->graph;
				$data['title'] = 'Distribuição dos Grupos de Pesquisa por Escola';
				$tela .= $this->load->view('fundo/dfundo_indicador_02',$data,true);
				$tela .= '</td></tr></table>';	
				
				/* Detalhes do relatorio */
				if (strlen($gr) > 0)
					{
						$tela .= '<br>';
						$tela .= $this->fundos->grupos_escolas_detalhes($gr);							
					}
				break;				
			default:
				$tela = '';
				break;
		}
		
		$data['content'] = $tela;
		$this->load->view('content',$data);		

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}
	
	function report($id = 0, $gr = '') {
		$this -> cab();
		$data = array();
		
		$data['logo'] = base_url('img/logo/logo_fundo.png');
		$this -> load -> view('header/content_open', $data);
		$this -> load -> view('header/logo', $data);		

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Indicadores', 'Grupos por campus (lider)', 'ITE', '/fundo/reports/gc'));
		array_push($menu, array('Indicadores', 'Grupos por escolas (lider)', 'ITE', '/fundo/reports/ge'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Relatórios';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function index() {
		$this -> load -> model('fundos');
		$this -> cab();
		$data = array();

		/* Formulario */
		$data['search'] = $this -> load -> view('form/form_busca.php', $data, True);
		$data['resumo'] = $this -> fundos -> resumo_solicitacoes();
		$data['resumo'] .= $this -> fundos -> resumo();

		/* Search */
		/* Mostra tela principal */
		$this -> load -> view('fundo/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);	
	}


	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'fundo_files';
		$this -> geds -> page = base_url('index.php/fundo/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'fundo_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'fundo_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'fundo_files';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_delete($id);
	}







}
