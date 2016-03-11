<?php
class stricto_sensu extends CI_Controller {
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
		array_push($menus, array('Home', 'index.php/stricto_sensu'));
		array_push($menus, array('Docentes', 'index.php/stricto_sensu/docentes'));
		array_push($menus, array('Produção Científica', 'index.php/stricto_sensu/relatorio'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);

		$data['title_page'] = 'Stricto Sensu';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');

		$this -> load -> view('ss/index', $data);
	}

	function index() {
		$this -> load -> model('stricto_sensus');
		$this -> cab();
		$data = array();

		/****************** COORDENADOR & SCRETARIA ***/
		$id_us = $_SESSION['id_us'];
		$prog = $this -> stricto_sensus -> is_administrativo($id_us);
		if (count($prog) > 0) {
			$id = $prog['id_pp'];
			$data = $this -> stricto_sensus -> le($id);
			$this -> load -> view('ss/show', $data);

			$data['content'] = $this -> stricto_sensus -> resumo_programa($id);
			$this -> load -> view('content', $data);

			/************* MENU */
			$menu = array();
			array_push($menu, array('Bonificação e Isenção', 'Relatórios e indicadores de Captações, Isenções, Bonificações por programa', 'BTA', '/stricto_sensu/bonificacao_isencao/'.$id));
			//array_push($menu, array('Docentes do Programa', 'Relação dos docentes do programa', 'BTA', 'stricto_sensu/doscentes/'.$id));
			//array_push($menu, array('Produção Científica', 'Indicadores da Produção Científica dos Programas', 'BTA', 'stricto_sensu/doscentes/'.$id));
			//array_push($menu, array('Fluxo Discente', 'Indicadores da Produção Científica dos Programas', 'BTA', 'stricto_sensu/doscentes/'.$id));
			//array_push($menu, array('Iniciação Científica', 'Indicadores da Produção Científica dos Programas', 'BTA', 'stricto_sensu/doscentes/'.$id));
			$data['menu'] = $menu;

			$data['title_menu'] = '';
			$this -> load -> view('header/main_menu', $data);
			$data['content'] = '<script>  $("#main_menu").toggleClass("2colunas"); </script>';
			$data['content'] .= '<style>  #main_menu { max-width: 100%; </style>';
			$this -> load -> view('content', $data);
		} else {
			$data['content'] = $this -> stricto_sensus -> lista_programas();
			$this -> load -> view('content', $data);
		}
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bonificacao_isencao($pg=0,$xls='')
		{
			$this->load->model("bonificacoes");
			$data = array();
			if (strlen($xls) > 0)
				{
					xls('segurado-' . date("Y-m") . '.xls');
				} else {
					$this->cab();
					$data['title'] = 'Bonificações por Professor';
					$data['submenu'] = '<a href="'.base_url('index.php/stricto_sensu/bonificacao_isencao/'.$pg.'/xls').'" class="link lt0">exportar para excel</a>';		
				}
			
			
			$tela = $this->bonificacoes->bonificacao_indicadores($pg);
			$data['content'] = $tela;
			$this->load->view('content',$data);
			
		}

	function programas() {
		$this -> cab();
		$data['content'] = $this -> stricto_sensus -> lista_programas();
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function relatorio() {
		$this -> load -> model('stricto_sensus');
		$this -> load -> model('programas_pos');
		$this -> load -> model('producoes');
		$q = '';
		$this -> cab();
		$data = array();

		$sql = "select * from ss_programa_pos where pp_ativo = 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $rlt[$r]['id_pp'];
			$tela = $this -> producoes -> producao_programa($id);
			$qua = $tela[1];
			$est = $tela[0];

			$q .= '<tr>';
			$q .= '<td>' . $line['pp_nome'] . '</td>';
			$q .= '<td class="border1" align="center">' . $qua['Q1'] . '</td>';
			$q .= '<td class="border1" align="center">' . $qua['Q2'] . '</td>';
			$q .= '<td class="border1" align="center">' . $qua['Q3'] . '</td>';
			$q .= '<td class="border1" align="center">' . $qua['Q4'] . '</td>';

			$q .= '<td class="border1" align="center">&nbsp;&nbsp;</td>';

			$q .= '<td class="border1" align="center">' . $est['A1'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['A2'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['B1'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['B2'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['B3'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['B4'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['B5'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est['C'] . '</td>';
			$q .= '<td class="border1" align="center">' . $est[''] . '<td>';
			$q .= '</tr>';
		}

		$th = '<tr><th>Programa</th>
						<th>Q1</th>
						<th>Q2</th>
						<th>Q3</th>
						<th>Q4</th>
						<th>&nbsp;</th>
						<th>A1</th>
						<th>A2</th>
						<th>B1</th>
						<th>B2</th>
						<th>B3</th>
						<th>B4</th>
						<th>B5</th>
						<th>C</th>
						<th>nv</th>
						</tr>
						';

		$data['content'] = '<TABLE width="100%">' . $th . $q . '</table>';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function docentes() {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Docentes SS', 'Ordem alfabética', 'ITE', '/stricto_sensu/docente/doce'));
		array_push($menu, array('Docentes SS', 'Ordem dos programas', 'ITE', '/stricto_sensu/docente/prog'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function docente($tipo = '', $fmt = '') {
		$fmt = trim($fmt);
		$this -> load -> model('stricto_sensus');
		$data = array();

		if (strlen($fmt) == 0) {
			$this -> cab();
			$data['title'] = 'Docentes <i>stricto sensu</i>';
			$data['submenu'] = '<A href="' . base_url('index.php/stricto_sensu/docente/' . $tipo . '/xls') . '" class="link lt0">' . msg('export_to_excel') . '</a>';
		} else {
			xls('docentes-ss-' . date("Y-m-d") . '.xls');
		}

		if ($tipo == 'doce') {
			$data['content'] = $this -> stricto_sensus -> lista_docentes();
		} else {
			$data['content'] = $this -> stricto_sensus -> lista_docentes_por_programa();
		}

		$this -> load -> view('content', $data);

		if (strlen($fmt) == 0) {
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}
	}

	function ver($id = 0, $chk = '') {
		$this -> load -> model('stricto_sensus');
		$this -> cab();
		$data = array();

		$data = $this -> stricto_sensus -> le($id);
		$this -> load -> view('ss/show', $data);

		$data['content'] = $this -> stricto_sensus -> resumo_programa($id);
		$this -> load -> view('content', $data);

		$data['content'] = $this -> stricto_sensus -> professores_do_programa($id);
		$this -> load -> view('content', $data);

		$data['content'] = $this -> stricto_sensus -> linhas_do_programa($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function editar($id = 0, $check = '') {
		if (perfil('#CPP#SPI#ADM') == 1) {
			$tabela = 'ss_programa_pos';

			$this -> load -> model('stricto_sensus');
			$this -> cab();
			$data = array();

			$form = new form;
			$form -> id = $id;
			$form -> tabela = $tabela;

			$cp = $this -> stricto_sensus -> cp();

			$tela = $form -> editar($cp, $tabela);
			if ($form -> saved > 0) {
				$url = base_url('index.php/stricto_sensu');
				redirect($url);
			}

			$data['content'] = $tela;
			$this -> load -> view('content', $data);

			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		} else {
			redirect(base_url('index.php/main'));
		}
	}

}
