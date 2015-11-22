<?php
class ic extends CI_Controller {

	function avaliadores_set() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> regra_avaliadores();
		redirect(base_url('index.php/ic'));
	}

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
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/ic/'));

		array_push($menus, array('Pessoas', 'index.php/ic/usuarios'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));

		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));

		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		array_push($menus, array('Relatórios', 'index.php/ic/report'));
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic.png');
		$this -> load -> view('header/logo', $data);
	}

	function comunicacao_edit($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$cp = $this -> comunicacoes -> cp();

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> comunicacoes -> tabela);
		$data['title'] = msg('eq_equipamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic'));
		}

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function comunicacao_view($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$this -> load -> model('email_local');

		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data = $this -> comunicacoes -> le($id);

		$form = new form;
		$cp = array();
		array_push($cp, array('$h', '', '', False, False));
		array_push($cp, array('$T40:50', '', 'emails', True, False));
		array_push($cp, array('$B8', '', 'Enviar >>>', False, False));
		$tela = $form -> editar($cp, '');
		$data['title'] = msg('visualizar_mensagem');
		$data['tela'] = $tela;

		if ($form -> saved > 0) {
			$em = $this -> input -> post('dd1');
			$em = troca($em, chr(13), ';');
			$em = troca($em, chr(10), '');
			$em = troca($em, chr(8), '');
			$em = troca($em, chr(15), '');
			$ems = splitx(';', $em . ';');

			for ($r = 0; $r < count($ems); $r++) {
				$this -> email_local -> e_mail = $data['m_email'];
				$this -> email_local -> e_nome = $data['m_descricao'];
				$head = trim($data['m_header']);
				$para = $ems[$r];

				$this -> email -> from('dilmeire.vosgerau@pucpr.br', $this -> email_local -> e_nome);
				$this -> email -> reply_to($this -> email_local -> e_mail, $this -> email_local -> e_nome);
				$this -> email -> to($para);

				$texto_o = $data['mc_texto'];
				$texto = '<table width="700"><tr><td>';
				if (strlen($head) > 0) {
					$texto .= '<img src="' . $head . '" width="700">';
				}
				$texto .= '<tr><td>';
				$texto .= $texto_o;
				$texto .= '</table>';

				$this -> email -> subject($data['mc_titulo']);
				$this -> email -> message($texto);

				$this -> email -> send();
				//$this -> email_local -> enviaremail($emailx, $data['mc_titulo'], $data['mc_texto']);
				echo '<BR>--->' . $para;
			}
		}

		$data['content'] = '<table width="100%">
							<tr valign="top">
								<td>' . $data['mc_texto'] . '</td>
								<td>' . $tela . '</td>
							</tr>
							</table>';

		$data['title'] = msg('visualizar_mensagem');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function report($id = 0, $gr = '') {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Relatórios', 'Guia do Estudante', 'ITE', '/ic/report_guia'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	/* Reports */
	function report_guia($id = 0, $gr = '') {
		global $form;
		/* Load Models */
		$this->load->model('ics');

		$this -> cab();
		$data = array();

		$form = new form;
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$A', '', msg('Guia do Estudante'), False, true));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('Ano inicial'), True, TRUE));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('Ano final'), True, True));
		$sql = "select * from ic_modalidade_bolsa order by mb_tipo";
		array_push($cp, array('$Q id_mb:mb_descricao:'.$sql, '', msg('ic_modalidade'), False, False));
		$tela = $form -> editar($cp, '');

		if ($form -> saved) {
			$ano_ini = get("dd2");
			$ano_fim = get("dd3");
			$modalidade = get("dd4");
			$data['content'] = $this->ics->report_guia_estudante($ano_ini,$ano_fim,$modalidade);
			$this->load->view('content',$data);
		} else {
			$data['content'] = $tela;
			$this->load->view('content',$data);
		}


		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function comunicacao($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> comunicacoes -> tabela_view();
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form = $this -> comunicacoes -> row($form);

		$form -> row_edit = base_url('index.php/ic/comunicacao_edit');
		$form -> row_view = base_url('index.php/ic/comunicacao_view');
		$form -> row = base_url('index.php/ic/comunicacao/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('messagem_cadastradas');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {
		/* Load Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		/* Formulario */
		$data['search'] = $this -> load -> view('form/form_busca.php', $data, True);
		$data['resumo'] = $this -> ics -> resumo();

		/* Search */
		$search_term = $this -> input -> post("dd89");
		$search_acao = $this -> input -> post("acao");
		if ((strlen($search_acao) > 0) and (strlen($search_term) > 0)) {
			$search_term = troca($search_term, "'", '´');
			$data['search'] .= $this -> ics -> search($search_term);
		}

		/* Mostra tela principal */
		$this -> load -> view('ic/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamentos($date = '', $action = '') {
		/* Load Models */
		$this -> load -> model('pagamentos');

		if (strlen($date) == 0) { $date = date("Ym01");
		}

		$this -> cab();
		$data = array();

		/* Mostra tela principal */
		$data['title'] = 'Razão de Pagamentos';
		$sx = '<table width="100%" ><tr valign="top">';
		$sx .= '<td width="500" rowspan=2 style="border-right: 1px solid #00000;">' . $this -> pagamentos -> resumo_pagamentos() . '</td>';
		$sx .= '<td width="20" rowspan=2 class="borderr1">&nbsp;</td>';
		$sx .= '<td width="80%" style="border-right: 1px solid #00000;">' . $this -> pagamentos -> pagamentos_lotes($date) . '</td>';
		$sx .= '<tr>';
		$sx .= '<td width="80%" style="border-right: 1px solid #00000;">' . $this -> pagamentos -> detalhe_pagamentos($date) . '</td>';

		$sx .= '</tr>';
		$sx .= '</table>';

		$data['content'] = $sx;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function usuarios($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		$data['content'] = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '">' . msg('consulta') . ' ' . msg('cracha') . '</a>';
		$this -> load -> view('content', $data);

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/ic/usuarios_edit');
		$form -> row_view = base_url('index.php/usuario/view');
		$form -> row = base_url('index.php/ic/usuarios/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_docentes');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliador_ativar($id = 0, $ac = '') {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		$form -> edit = true;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/ic/avaliador_ativar');
		$form -> row_view = base_url('index.php/avaliador/view');
		$form -> row = base_url('index.php/ic/avaliador_ativar');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_estudante');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores($id = 0) {
		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		array_push($menu, array('novo_avaliador', 'ic/avaliador_ativar'));
		$data['menu'] = $menu;
		$this -> load -> view('header/menu_mini', $data);

		$data['content'] = $this -> avaliadores -> avaliadores_area();
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores_row($id = 0) {

		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> avaliadores -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> avaliadores -> row($form);

		$form -> row_edit = base_url('index.php/ic/avaliadores');
		$form -> row_view = base_url('index.php/avaliadores/view');
		$form -> row = base_url('index.php/ic/avaliadores/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_avaliadores');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function discentes($id = 0) {

		/* Load Models */
		$this -> load -> model('estudantes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> estudantes -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> estudantes -> row($form);

		$form -> row_edit = base_url('index.php/ic/discente_edit');
		$form -> row_view = base_url('index.php/discente/view');
		$form -> row = base_url('index.php/ic/discentes/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_discentes');

		$data['content'] = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '" class="lt0 link">consultar SGA</a>' . $data['content'];

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function indicadores($id = 0) {

		/* Load Models */
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		//carrega grafico da situacao dos estudantes intercambistas
		$line = $this -> ics -> mostra_projetos_por_escolas();
		$data['dado'] = $line;
		$data['gr_frame'] = 'ic_escola';
		$data['gr_title'] = 'Projetos por Escolas';
		$data['gr_title_sub'] = 'Implementadas 2014-2015';
		$data['gr_x'] = 'Projetos';
		$data['gr_y'] = 'Escola';
		$data['show'] = false;
		$this -> load -> view('gadget/highchar_column.php', $data);

		$data = array();
		$line = $this -> ics -> mostra_projetos_por_escolas_professor();
		$data['dado'] = $line;
		$data['gr_frame'] = 'ic_professor_curso';
		$data['gr_title'] = 'Projetos da Escola Politécnica';
		$data['gr_title_sub'] = 'Implementadas 2014-2015';
		$data['gr_x'] = 'Projetos';
		$data['gr_y'] = 'Cursos';
		$data['show'] = false;
		$this -> load -> view('gadget/highchar_column.php', $data);

		$tela = '<table width="100%" border=1>';
		$tela .= '<tr>';
		$tela .= '<td width="50%">';
		$tela .= '<div id="ic_professor_curso"></div>';

		$tela .= '<td width="50%">';
		$tela .= '<div id="ic_escola"></div>';
		$tela .= '</table>';
		$data['content'] = $tela;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento() {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_switch();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = 1;
		/* IC */

		$tela = $form -> editar($cp, $this -> ics -> tabela_acompanhamento);

		$data['title'] = msg('ic_acomanhamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('geds');

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($data['ic_plano_aluno_codigo'], 'ic');
		$data['ged_arquivos'] = $this -> geds -> form_upload($data['ic_plano_aluno_codigo'], 'ic');
		$this -> load -> view('ged/list_files', $data);

		$this -> load -> view('ic/plano_historico', $data);
		$this -> load -> view('ic/plano_avaliacao', $data);

		/* */
		$protocolo = $data['ic_plano_aluno_codigo'];
		$rs = $this -> ics -> le_resumo($protocolo);

		if (count($rs) > 0) {
			$data['line'] = $rs;
			$data['resumo'] = '1';
		}

		$this -> load -> view('ic/plano_resumo', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ativar_plano($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		/* Form */
		$form = new form;
		$cp = $this -> ics -> cp_ativar();

		$data['form'] = $form -> editar($cp, '');
		if ($form -> saved > 0) {
			$ic = $this -> ics -> le($id);
			$estudante = $ic['ic_cracha_aluno'];

			/* Recupera ID do aluno */
			$estud = $this -> usuarios -> le_cracha($estudante);
			$ide = $estud['id_us'];

			$vg_d1 = $this -> input -> post("dd2");
			$vg_d2 = $this -> input -> post("dd3");
			$dt1 = $this -> input -> post("dd4");
			$dt2 = $this -> input -> post("dd5");
			$tipo = $this -> input -> post("dd6");
			$situacao = $this -> input -> post("dd7");

			$this -> ics -> ativar_bolsa($id, $ide, $estudante, $vg_d1, $vg_d2, $dt1, $dt2, $tipo, $situacao);

			redirect(base_url('index.php/ic/view/' . $id . '/' . checkpost_link($id)));
			exit ;
		}

		$this -> load -> view('ic/plano_ativar_form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function resumo_autores($id = '', $check = '') {
		/* Load Models */
		$this -> load -> model('ics');

		/* Form */
		$save = $this -> input -> post("acao");
		$nome = utf8_decode($this -> input -> post("dd10"));
		$tipo = $this -> input -> post("dd11");
		$instituicao = utf8_decode($this -> input -> post("dd12"));
		$msg = '';

		if ($save == 'ADD') {
			$msg = $this -> ics -> resumo_inserir_autor($id, $nome, $tipo, $instituicao);
		}
		if ($save == 'DEL') {
			$msg = $this -> ics -> resumo_remove_autor($nome);
			$msg = 'REMOVIDO'; ;
		}

		$data = array();
		$data['content'] = $this -> ics -> resumo_autores_mostra($id);
		$this -> load -> view('content', $data);
		$data['id'] = $id;
		$data['check'] = $check;
		$data['msg'] = $msg;

		$this -> load -> view('ic/postar_resumo_autores', $data);
	}

	function postar_resumo($id = '', $check = '', $page = '') {
		global $dd;
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		/* Valida de existe resumo postado */
		$rs = $this -> ics -> resumo_postado($id);

		/* Trata variavies */
		if (strlen($page) > 0) {

		} else {
			$page = $this -> input -> post("page");
		}
		$page = round($page);

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		$bp = array();

		$bp['1'] = 'Informa o titulo do trabalho';
		$bp['2'] = 'autores do trabalho';
		$bp['3'] = 'resumo em português';
		$bp['4'] = 'resumo em inglês';
		$bp['5'] = 'confirmar';

		/* Dados */
		$data['acao'] = $this -> input -> post("acao");
		$data['dd1'] = $this -> input -> post("dd1");
		$data['dd2'] = $this -> input -> post("dd2");
		$data['dd3'] = $this -> input -> post("dd3");
		$data['dd4'] = $this -> input -> post("dd4");
		$data['dd5'] = $this -> input -> post("dd5");
		$data['dd6'] = $this -> input -> post("dd6");

		/* Finalizado */
		if ($page > count($bp)) {
			$url = base_url('index.php/ic/view/' . $id . '/' . $check);
			redirect($url);
			exit ;
		}
		if ($page < 1) { $page = 1;
		}

		$data['bp_atual'] = $page;
		$data['bp'] = $bp;
		$data['bp_link'] = base_url('index.php/ic/postar_resumo/' . $id . '/' . $check . '/');

		$data['bar'] = $this -> load -> view('gadget/progressbar_vertical_bar.php', $data, true);

		/* Recupera informacoes */
		if (strlen($data['acao']) == 0) {
			$protocolo = $data['ic_plano_aluno_codigo'];
			$rs = $this -> ics -> le_resumo($protocolo);

			/* Página 1 */
			if ($page == '1') {
				$data['dd1'] = $rs['sm_titulo'];
				$data['dd2'] = $rs['sm_titulo_en'];
			}
		} else {
			$rs = array();
			$redirect = $this -> ics -> salvar_resumo($page, $data);

			if ($redirect == 1) {
				$url = base_url('index.php/ic/postar_resumo/' . $id . '/' . $check . '/' . ($page + 1));
				redirect($url);
				exit ;
			}
		}

		switch ($page) {
			case '1' :
				$this -> load -> view('ic/postar_resumo_1', $data);
				break;
			case '2' :
				$this -> load -> view('ic/postar_resumo_2', $data);
				break;
			case '3' :
				$form = new form;
				$cp = $form -> cp = $this -> ics -> cp_resumo_1();
				$data['tela'] = $form -> editar($cp, '');
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_3', $data);
				break;
			case '4' :
				$form = new form;
				$cp = $form -> cp = $this -> ics -> cp_resumo_2();
				$data['tela'] = $form -> editar($cp, '');
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_4', $data);
				break;
			case '5' :
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_5', $data);
				break;
			default :
				echo 'ops' . $page;
				break;
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> page = base_url('index.php/ic/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '_document/ic/';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '_document/ic/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '_document/ic/';
		$this -> geds -> file_delete($id);
	}

}
