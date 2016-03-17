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

	function docente($tipo = '', $fmt = '') {
		$this -> load -> model('produtividades');
		$this -> load -> model('ics');
		$editar = 1;

		if (strlen($fmt) > 0) {
			/* Exporta no formato excel */
			$editar = 0;
			xls('docente-' . $tipo . '-' . date("Y-m") . '.xls');
		} else {
			$this -> cab();
			$data['title'] = 'Relat�rio de Seguro';
			$data['submenu'] = '<A href="' . base_url('index.php/ic/seguro/' . $tipo . '/xls') . '" class="link lt0">' . msg('export_to_excel') . '</a>';
		}

		switch($tipo) {
			case 'produtividade' :
				$tela = $this -> produtividades -> resumo_produtividade();
				$data['content'] = $tela;
				$data['title'] = 'Bolsistas Produtividade';
				if (strlen($fmt) == 0) {
					$data['submenu'] = '<a href="' . base_url('index.php/indicadores/docente/produtividade/xls') . '" class="lt0 link">' . msg('export_to_excel') . '</a>';
				}
				$this -> load -> view('content', $data);

				$tela = $this -> produtividades -> lista_produtivade($editar);
				$data['content'] = $tela;
				$data['submenu'] = '';
				$data['title'] = '';
				$this -> load -> view('content', $data);
				break;
			case 'pesquisa' :
				$ano = date("Y");
				if (date("m") < 7) { $ano = $ano - 1;
				}

				$tela = $this -> ics -> docentes_em_pesquisa($ano);
				$data['title'] = 'Docentes atuantes em pesquisa - ' . $ano;
				if (strlen($fmt) == 0) {
					$data['submenu'] = '<a href="' . base_url('index.php/indicadores/docente/pesquisa/xls') . '" class="lt0 link">' . msg('export_to_excel') . '</a>';
				}
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
				break;
			case 'ss' :
				$this -> load -> model('stricto_sensus');
				$data = array();

				$data['title'] = 'Docentes <i>stricto sensu</i>';
				$data['submenu'] = '<A href="' . base_url('index.php/stricto_sensu/docente/' . $tipo . '/xls') . '" class="link lt0">' . msg('export_to_excel') . '</a>';
				$data['content'] = $this -> stricto_sensus -> lista_docentes();
				break;
		}

		$this -> load -> view('content', $data);
	}

	function estudante($tipo = '', $fmt = '') {
		$this -> load -> model('produtividades');
		$this -> load -> model('ics');
		$editar = 1;

		if (strlen($fmt) > 0) {
			/* Exporta no formato excel */
			$editar = 0;
			xls('docente-' . $tipo . '-' . date("Y-m") . '.xls');
		} else {
			$this -> cab();
			$data['title'] = 'Relat�rio de Seguro';
			$data['submenu'] = '<A href="' . base_url('index.php/ic/seguro/' . $tipo . '/xls') . '" class="link lt0">' . msg('export_to_excel') . '</a>';
		}

		switch($tipo) {
			case 'pesquisa' :
				$ano = date("Y");
				if (date("m") < 7) { $ano = $ano - 1;
				}

				$tela = $this -> ics -> estudante_em_pesquisa($ano);
				$data['title'] = 'Estudantes atuantes em pesquisa - ' . $ano;
				if (strlen($fmt) == 0) {
					$data['submenu'] = '<a href="' . base_url('index.php/indicadores/estudante/pesquisa/xls') . '" class="lt0 link">' . msg('export_to_excel') . '</a>';
				}
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
				break;
		}
		if ($fmt == '') {
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}
	}

	function index($id = 0) {
		/* Load Models */

		$this -> cab();
		$data = array();

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Docentes', 'Bolsista Produtividade, Professores stricto sensu, Orientadores PIBIC, ...', 'BOX', '/indicadores/docentes/'));
		array_push($menu, array('Discentes', 'Estudantes de Inicia��o Cient�fica, ', 'BOX', '/indicadores/estudantes/'));
		array_push($menu, array('Produ��o Cient�fica', 'Produ��o e produ��o qualificada em Arqtigos, Livros, Cap�tulos de livros e eventos, ', 'BOX', '/indicadores/producoes/'));

		for ($r = 2012; $r <= date("Y"); $r++) {
			array_push($menu, array('Inicia��o Cient�fica', 'Submiss�o - ' . $r, 'ITE', '/indicadores/ic/' . $r));
		}

		array_push($menu, array('Grupos de Pesquisa', 'Grupos', 'ITE', '/indicadores/gp/'));

		array_push($menu, array('Produ��o Cient�fica e T�cnica', 'Produ��o Bibliogr�fica', 'ITE', '/indicadores/bibliografica/'));

		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Indicadores';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function docentes($id = 0) {
		/* Load Models */

		$this -> cab();
		$data = array();

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Pesquisa', 'Docentes atuantes em Pesquisa', 'ITE', '/indicadores/docente/pesquisa/'));
		array_push($menu, array('Pesquisa', 'Bolsista Produtividade', 'ITE', '/indicadores/docente/produtividade/'));
		array_push($menu, array('Pesquisa', 'Professores stricto sensu', 'ITE', '/indicadores/docente/ss/'));

		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Docentes';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function producoes($id = 0) {
		/* Load Models */

		$this -> cab();
		$data = array();

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Indicador Produ��o', 'Estrato Qualis do stricto sensu', 'ITE', '/indicadores/artigos_01/'));
		array_push($menu, array('Indicador Produ��o', 'Estrato Scimago/Quartil do stricto sensu', 'ITE', '/indicadores/artigos_02/'));

		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Produ��o Cient�fica Qualificada';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/* ARTIGO QUALIFICADOS */
	function artigos_01($pp = 0, $xls = '') {
		$this -> load -> model('phpLattess');

		if (strlen($xls) > 0) {
			xls('indicador-artigos-001.xls');
		} else {
			$this -> cab();
			$data['title'] = msg('lb_indicador_qualis');
		}
		$sx = $this -> phpLattess -> artigos_qualificados_por_ano($pp);
		$dados = array();
		
		$dados['dados'] = $this -> phpLattess -> dados;

		$data['content'] = $sx;

		$data['submenu'] = '<a href="' . base_url('index.php/indicadores/artigos_02/' . $pp . '/xls') . '" class="link lt0">exportar para excel</a>';
		$this -> load -> view('content', $data);

		if (strlen($xls) == 0) {
			$this -> load -> view('highcharts/area', $dados);
			$this -> load -> view('highcharts/column_stacked', $dados);
			
		}
	}

	/* QUARTIL */
	function artigos_02($pp = 0, $xls = '') {
		$this -> load -> model('phpLattess');

		if (strlen($xls) > 0) {
			xls('indicador-artigos-001.xls');
		} else {
			$this -> cab();
			$data['title'] = msg('lb_indicador_quartil');
		}
		$sx = $this -> phpLattess -> artigos_quartis_por_ano($pp);
		$data['content'] = $sx;

		$data['submenu'] = '<a href="' . base_url('index.php/indicadores/artigos_02/' . $pp . '/xls') . '" class="link lt0">exportar para excel</a>';
		$this -> load -> view('content', $data);
	}

	function estudantes($id = 0) {
		/* Load Models */

		$this -> cab();
		$data = array();

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Pesquisa', 'Atua��o Discente em Pesquisa', 'ITE', '/indicadores/estudante/pesquisa/'));

		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Docentes';
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
