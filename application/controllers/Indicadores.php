<?php
class indicadores extends CI_Controller {
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

	public function cab() {

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_indicador.css');
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Banco de Vari�veis', '/index.php/indicadores/admin'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Indicadores de Pesquisa';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		
		$this -> load -> view('header/content_open');
	}

	function produtividade() {
		$this -> load -> model('produtividades');
		
		$this -> cab();
		$tela = $this->produtividades->resumo_produtividade();
		$data['content'] = $tela;
		$data['title'] = 'Bolsistas Produtividade';
		$this->load->view('content',$data);
		
		$tela = $this->produtividades->lista_produtivade();
		$data['content'] = $tela;
		$this->load->view('content',$data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {
		/* Load Models */

		$this -> cab();
		$data = array();
		

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Sobre o Corpo Docente', 'Bolsista Produtividade', 'ITE', '/indicadores/produtividade/'));

		for ($r = 2012; $r <= date("Y"); $r++) {
			array_push($menu, array('Inicia��o Cient�fica', 'Submiss�o - ' . $r, 'ITE', '/indicadores/ic/' . $r));
		}

		array_push($menu, array('Grupos de Pesquisa', 'Grupos', 'ITE', '/indicadores/gp/'));

		array_push($menu, array('Produ��o Cient�fica e T�cnica', 'Produ��o Bibliogr�fica', 'ITE', '/indicadores/bibliografica/'));

		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Administra��o';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bibliografica() {
		/* Load Models */
		$this -> load -> model('phplattess');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['title'] = 'Indicadores de Produ��o - PUCPR';

		/* Produ��o em artigos */
		$art = $this -> phplattess -> producao_artigos();
		$bil = $this -> phplattess -> producao_bibliografica();
		$ori = $this -> phplattess -> producao_orientacao();
		$pat = $this -> phplattess -> producao_patente();

		$sx = '<table width="600" class="border1">';
		$sx .= '<tr><th>ano</th>
					<th width="23%">Artigos</th>
					<th width="23%">Livros/Cap./Livros Org.</th>
					<th width="23%">Orienta��es Tese/Disserta��es</th>
					<th width="23%">Patente</th>
				</tr>
				';
		for ($r = 2005; $r <= date("Y"); $r++) {
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= $r;
			$sx .= '</td>';

			/* Artigos */
			$sa = '<td></td>';
			for ($a = 0; $a < count($art); $a++) {
				if ($art[$a]['acpp_ano'] == $r) {
					$sa = '<td align="center" class="border1">' . $art[$a]['total'] . '</td>';
				}
			}
			$sx .= $sa;

			/* Artigos */
			$sa = '<td></td>';
			for ($a = 0; $a < count($bil); $a++) {
				if ($bil[$a]['cc_ano'] == $r) {
					$sa = '<td align="center" class="border1">' . $bil[$a]['total'] . '</td>';
				}
			}
			$sx .= $sa;

			/* Orientacoes */
			$sa = '<td></td>';
			for ($a = 0; $a < count($ori); $a++) {
				if ($ori[$a]['or_ano'] == $r) {
					$sa = '<td align="center" class="border1">' . $ori[$a]['total'] . '</td>';
				}
			}
			$sx .= $sa;

			/* Patente */
			$sa = '<td></td>';
			for ($a = 0; $a < count($pat); $a++) {
				if ($pat[$a]['pt_ano'] == $r) {
					$sa = '<td align="center" class="border1">' . $pat[$a]['total'] . '</td>';
				}
			}
			$sx .= $sa;
		}
		$sx .= '</table>';

		$data['content'] = $sx;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function admin($id = 0) {
		/* Load Models */
		$this -> load -> model('variaveis');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = $this -> variaveis -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> variaveis -> row($form);

		$form -> row_edit = base_url('index.php/indicadores/edit');
		$form -> row_view = base_url('index.php/indicadores/variavel_view');
		$form -> row = base_url('index.php/indicadores/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_variaveis');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('variaveis');
		$cp = $this -> variaveis -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> variaveis -> tabela);
		$data['title'] = msg('variaveis_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/indicadores'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function variavel_view($id, $chk) {
		/* Load Models */
		$this -> load -> model('variaveis');
		$this -> cab();

		$data = $this -> variaveis -> le($id);
		$data['novo_registro'] = '<A HREF="' . base_url('index.php/indicadores/variavel_edit/0/' . $id . '/' . checkpost_link('0')) . '">Novo Registro</A>';

		$this -> load -> view('indicadores/view', $data);

	}

	function variavel_edit($id = 0, $tp = 0, $chk = '') {
		if ($tp == 0) {
			return ('');
		}
		/* Load Models */
		$this -> load -> model('variaveis');
		$this -> cab();

		$cp = $this -> variaveis -> cp_dados($tp);

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> variaveis -> tabela_dados);
		$data['title'] = msg('eq_variaveis_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/indicadores/variavel_view/' . $tp . '/' . checkpost_link($tp)));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ic($ano = 0) {
		if ($ano == 0) { $ano = date("Y");
		}
		/* Load Models */
		$this -> load -> model('variaveis');

		$this -> cab();
		$this -> load -> view("indicadores/cab_indicator");
		$data['submissoes_ano'] = $ano;
		$this -> load -> view("indicadores/ic_submissao", $data);
		$this -> load -> view('indicadores/highcharts_bar');

		/* Grafico 1 */
		$this -> load -> view('indicadores/ic_submissao_perfil', $data);

		/* Grafico 2A - Planos Titula��o - IC */
		$data = $this -> variaveis -> recupera_dados('IC-SUBM-PLAN-ORIENT-TITULACAO', $ano);
		$data['frame'] = 'perfil_01';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);

		/* Grafico 2B - Planos Titula��o - IT */
		$data = $this -> variaveis -> recupera_dados('IT-SUBM-PLAN-ORIENT-TITULACAO', $ano);
		$data['frame'] = 'perfil_02';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);

		/* Grafico 2C - Planos Stricto Sensu - IC */
		$data = $this -> variaveis -> recupera_dados('IC-SUBM-PLAN-ORIENT-SS', $ano);
		$data['frame'] = 'perfil_03';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);

		/* Grafico 2D */
		$data = $this -> variaveis -> recupera_dados('IT-SUBM-PLAN-ORIENT-SS', $ano);
		$data['frame'] = 'perfil_04';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);

		/* Grafico 2E - Planos Produtividade - IC */
		$data = $this -> variaveis -> recupera_dados('IC-SUBM-PLAN-ORIENT-PROD', $ano);
		$data['frame'] = 'perfil_05';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);

		/* Grafico 2F */
		$data = $this -> variaveis -> recupera_dados('IT-SUBM-PLAN-ORIENT-PROD', $ano);
		$data['frame'] = 'perfil_06';
		$this -> load -> view('indicadores/ic_submissao_perfil_01', $data);
	}

}
