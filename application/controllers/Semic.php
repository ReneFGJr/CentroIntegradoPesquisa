<?php
class semic extends CI_Controller {
	function __construct() {
		global $dd, $acao, $email_own;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('links_users');
		$this -> load -> library('session');
		$this -> load -> helper('email');

		$email_own = 2;

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function cab_avaliador() {
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

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'SEMIC - ' . date("Y");
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($css, 'style_semic_2015.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Programacao', 'index.php/semic'));
		array_push($menus, array('Trabalhos', 'index.php/semic/trabalhos'));
		array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));
		array_push($menus, array('Anais do evento', 'index.php/semic/anais'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'SEMIC - ' . date("Y");
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function aceite() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab_avaliador();
		$data = array();
		$this -> load -> view('header/content_open');

		$data = array();
		$data['content'] = '';

		/* Aceite de Indicações SEMIC */
		$id = $_SESSION['id_us'];
		$data['content'] .= $this -> semic_trabalhos -> mostra_agenda_aceite($id, date("Y"));

		$this -> load -> view('avaliador/home', $data);
	}

	function anais($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		array_push($menu, array('Publicação dos Anais do Evento', 'Exportar trabalhos para o Site do evento', 'ITL', '/semic/anais_exportar/'));
		/*View principal*/
		$data['menu'] = $menu;

		$data['title_menu'] = 'Trabalhos SEMIC';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/* Exportar dados */
	function anais_exportar() {
		$ano = '2014';

		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_anais');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = '<h1>Exportar núvem de Tags</h1>';
		$this -> load -> view('content', $data);

		/* Sumario */
		$data['content'] = $this -> semic_anais -> gerar_sumario_areas($ano);

		$data['content'] = '<h1>Exportar dados IC para SEMIC</h1>';
		$this -> load -> view('content', $data);

		/* Phase I - Gerar paginas de cada trabalho */
		
		$data['content'] = $this -> semic_anais -> gerar_paginas_trabalho();
		//$this->load->view('content',$data);

		/* Phase II - Gerar Sumario por Areas */
		echo '<img src="http://s.mmgo.io/t/KLW" alt="motionmailapp.com" />';
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function agenda($id = 0, $email = 0) {
		global $email_own;
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();

		$this -> load -> view('header/content_open');

		/* Perfil do usuário */
		$data = $this -> usuarios -> le($id);
		$data['perfil'] = $this -> load -> view('perfil/avaliador_mini', $data, True);

		/* Perfil do usuário */
		$data['agenda'] = $this -> semic_trabalhos -> mostra_agenda($id, date("Y"));

		if ($email == 1) {
			//enviaremail_usuario($id,'Agenda',$data['agenda'],$email_own);
			enviaremail_usuario($id, 'SEMIC - Agenda do avaliador', $data['agenda'], $email_own);
		}

		$this -> load -> view('semic/semic_agenda', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function avaliadores() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_trabalhos -> avaliadores_seminario();
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bloco_poster_avaliador($ida = 0, $id2 = 0, $id3 = '', $id4 = '', $id5 = '') {
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> security();
		$data = array();
		$this -> load -> view('header/header', $data);

		/* ACAO */
		$aval_id = $id4;
		$nr = $id2;
		/* Avalidor (1,2,3) */
		$bloco = $ida;
		switch ($id5) {
			case 'SET' :
				$this -> semic_trabalhos -> avaliador_poster_set($bloco, $aval_id, $nr);
				$this -> load -> view('header/close_windows');
				echo "FIM";
				return ('');
				break;
		}
		/* Mostra dados do bloco */
		$data['content'] = '<h3>' . $this -> semic_salas -> mostra_dados_sala($ida) . '</h3>';
		$this -> load -> view('content', $data);

		/* Recupera professores e avaliadores do bloco */
		$aval = $this -> semic_trabalhos -> orientador_avaliadores_trabalho($ida);

		$area = $this -> semic_trabalhos -> area_trabalho($ida);

		$aval_areas = $this -> semic_trabalhos -> avaliadores_area($area, $aval);

		$data = array();
		$data['content'] = $this -> semic_trabalhos -> avaliadores_indicar($aval_areas, $ida, $id2, 'bloco_poster_avaliador');
		$this -> load -> view('content', $data);
	}

	function bloco_avaliador($ida = 0, $id2 = 0, $id3 = '', $id4 = '', $id5 = '') {
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> security();
		$data = array();
		$this -> load -> view('header/header', $data);

		/* ACAO */
		$aval_id = $id4;
		$nr = $id2;
		/* Avalidor (1,2,3) */
		$bloco = $ida;
		switch ($id5) {
			case 'SET' :
				$this -> semic_trabalhos -> avaliador_set($bloco, $aval_id, $nr);
				$this -> load -> view('header/close_windows');
				break;
		}

		/* Mostra dados do bloco */
		$data['content'] = '<h3>' . $this -> semic_salas -> mostra_dados_sala($ida) . '</h3>';
		$this -> load -> view('content', $data);

		/* Recupera professores do bloco */
		$aval = $this -> semic_trabalhos -> orientadores_bloco($ida);

		$area = $this -> semic_trabalhos -> areas_bloco($ida);

		$aval_areas = $this -> semic_trabalhos -> avaliadores_area($area, $aval);

		$data = array();
		$data['content'] = $this -> semic_trabalhos -> avaliadores_indicar($aval_areas, $ida, $id2);
		$this -> load -> view('content', $data);

	}

	function bloco_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');
		$cp = $this -> semic_salas -> cp_bloco();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> semic_salas -> tabela_bloco);
		$data['title'] = msg('semic_salas');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/semic'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function salas_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');
		$cp = $this -> semic_salas -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> semic_salas -> tabela);
		$data['title'] = msg('semic_salas');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/semic/salas'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function salas($id = 0) {
		$this -> load -> model('semic/semic_salas');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> semic_salas -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> semic_salas -> row($form);
		$this -> load -> view('header/content_open');

		$form -> row_edit = base_url('index.php/semic/salas_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/semic/salas/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('semic_salas');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> botao_novo_bloco();
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_salas -> mostra_blocos();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function trabalhos_edit($id = 0) {
		global $dd;
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();

		/* Form */
		$form = new form;
		$form -> tabela = 'semic_nota_trabalhos';
		$form -> id = $id;
		$cp = $this -> semic_trabalhos -> cp();
		$data['tela'] = $form -> editar($cp, 'semic_nota_trabalhos');

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario/row'));
		}

		$data['title'] = 'Formulário';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function trabalhos_row($id = 0) {
		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> tabela = 'semic_nota_trabalhos';
		$form -> see = true;
		$form -> edit = true;
		$form = $this -> semic_trabalhos -> row($form);

		$form -> row_edit = base_url('index.php/semic/trabalhos_edit');
		$form -> row_view = base_url('index.php/semic/trabalhos_view');
		$form -> row = base_url('index.php/semic/trabalhos_row');

		$tela['tela'] = row($form, $id);

		$tela['title'] = msg('title_semic_trabalho');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bloco_poster_view($ida = 0, $check = '', $p1 = '', $p2 = '', $acao = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> mostra_poster_bloco($ida, $p1, $p2, $acao);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function bloco_view($ida = 0, $check = '', $p1 = '', $p2 = '', $acao = '') {

		/* Load Models */
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_salas -> mostra_bloco($ida, $p1, $p2, $acao);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function trabalhos($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		$data['content'] = '<h1>Trabalhos SEMIC';

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
