<?php
class ic extends CI_Controller {

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
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function comunicacao_edit($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$cp = $this -> comunicacoes -> cp();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

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
			$em = $this->input->post('dd1');
			$em = troca($em,chr(13),';');
			$em = troca($em,chr(10),'');
			$em = troca($em,chr(8),'');
			$em = troca($em,chr(15),'');
			$ems = splitx(';',$em.';');
			
			for ($r=0;$r < count($ems);$r++)
				{
				$email = $ems[$r];
				$this -> email_local -> enviaremail($email, $data['mc_titulo'], $data['mc_texto']);
				echo '<BR>--->' . $email;
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
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		$this -> load -> view('ic/menu', $tela);

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
		
		$this -> load -> view('content',$data);

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
		$this -> load -> model('equipamentos');

		$this -> cab();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
	}

}
