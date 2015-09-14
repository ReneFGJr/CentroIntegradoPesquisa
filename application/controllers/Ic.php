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
		array_push($menus, array('Comunica��o', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		array_push($menus, array('Docentes', 'index.php/ic/docentes'));
		array_push($menus, array('Discentes', 'index.php/ic/discentes'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));
		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Inicia��o Cient�fica';
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
			$search_term = troca($search_term, "'", '�');
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
		
		if (strlen($date) == 0)
			{ $date = date("Ym01"); }

		$this -> cab();
		$data = array();

		/* Mostra tela principal */
		$data['title'] = 'Raz�o de Pagamentos';
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

	function docentes($id = 0) {

		/* Load Models */
		$this -> load -> model('docentes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> docentes -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> docentes -> row($form);

		$form -> row_edit = base_url('index.php/ic/docente_edit');
		$form -> row_view = base_url('index.php/docente/view');
		$form -> row = base_url('index.php/ic/docentes/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_docentes');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores($id = 0) {
		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

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
		$data['gr_title'] = 'Projetos da Escola Polit�cnica';
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
		$data['ged'] = $this -> geds -> list_files_table($data['codigo_pa'], 'ic');
		$data['ged_arquivos'] = $this -> geds -> form_upload($data['codigo_pa'], 'ic');
		$this -> load -> view('ged/list_files', $data);

		$this -> load -> view('ic/plano_historico', $data);
		$this -> load -> view('ic/plano_avaliacao', $data);

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
