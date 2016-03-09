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
		$ph = $_SERVER['PATH_INFO'];
		if (strpos($ph, 'poster_localizacao')) {

		} else { 
			$this -> security();
		}
	}

	function ausencia_no_evento($xls='') {
		$this -> load -> model('semic/semic_avaliacoes');
		$ano_semic = (date("Y")-1);
		if ($xls == '')
			{
				$this -> cab();
				$data = array();
				$this -> load -> view('header/content_open');
				$data['submenu'] = '<a href="'.base_url('index.php/semic/ausencia_no_evento/xls').'" class="lt0 link">exportar para excel</a>';
			} else {
				xls('lista-Geral-ausentes-apresentacoes-semic_'. $ano_semic .'.xls');
			}
		
		$data['content'] = $this -> semic_avaliacoes -> presenca_geral();
		$data['title'] = 'Panorama geral de presenças no evento';
		
		$this -> load -> view('content', $data);

		if ($xls == '')
			{
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
			}

	}
	
	function ausencia_alunos($xls='') {
		$this -> load -> model('semic/semic_avaliacoes');
		
		if ($xls == '')
			{
				$this -> cab();
				$data = array();
				$this -> load -> view('header/content_open');
				$data['submenu'] = '<a href="'.base_url('index.php/semic/ausencia_alunos/xls').'" class="lt0 link">exportar para excel</a>';
			} else {
				xls('lista-alunos-ausentes-apresentacoes-semic_'. $ano_semic .'.xls');
			}
		
		$data['content'] = $this -> semic_avaliacoes -> alunos_ausentes();
		$data['title'] = 'Estudantes ausentes';
		
		$this -> load -> view('content', $data);

		if ($xls == '')
			{
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
			}

	}
	
	function ausencia_professores($xls='') {
		$this -> load -> model('semic/semic_avaliacoes');
		
		if ($xls == '')
			{
				$this -> cab();
				$data = array();
				$this -> load -> view('header/content_open');
				$data['submenu'] = '<a href="'.base_url('index.php/semic/professores_ausentes/xls').'" class="lt0 link">exportar para excel</a>';
			} else {
				xls('lista-professores-ausentes-apresentacoes-semic_'. $ano_semic .'.xls');
			} 
		
		$data['content'] = $this -> semic_avaliacoes -> professores_ausentes();
		$data['title'] = 'Professores ausentes';
		
		$this -> load -> view('content', $data);

		if ($xls == '')
			{
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
			}

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

	function premiacao_row($id = 0, $ref = '') {
		/* Carrega classes adicionais */
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$this -> load -> view('header/content_open');
		$tela = $this -> semic_avaliacoes -> premiacao_row();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
	}

	function premiacao_gerar($id = 0, $ref = '') {
		/* Carrega classes adicionais */
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$this -> load -> view('header/content_open');
		$tela = $this -> semic_avaliacoes -> premiacao_gerar();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
	}

	function premiacao_ed($id = 0, $ref = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_avaliacoes');
		$cp = $this -> semic_avaliacoes -> cp_premiacao();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, 'semic_premiacao_trabalho');
		$data['title'] = msg('premiação');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/semic/premiacao_row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function premiacao($id = '') {
		/* Load Models */
		$this -> load -> model('semic/semic_avaliacoes');

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($css, 'style_semic_2015.css');
		array_push($css, 'semic/2015/style_semic_2015.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		$sql = "select * from ";

		/* Monta telas */
		$data['pos'] = $id;
		$this -> load -> view('header/header', $data);

		if (strlen($id) == 0) {
			$this -> load -> view('semic/premiacao/capa');
		} else {
			$data = $this -> semic_avaliacoes -> premiacoes_lista($id);
			$data['id'] = $id;
			$this -> load -> view('semic/premiacao/premios', $data);
		}

	}

	function poster_localizacao($id = 0, $ref = '') {
		/* Carrega classes adicionais */
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

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

		if ($id > 0) {
			$ala = $this -> semic_trabalhos -> recupera_ala($id);
			$dia = $this -> semic_trabalhos -> recupera_dia($id);
		} else {
			$ala = '';
			$dia = '';
		}

		$data['trabalhos'] = $this -> semic_trabalhos -> lista_trabalhos_poster();
		$data['ala'] = $ala;
		$data['dia'] = $dia;
		$data['ref'] = $ref;

		$this -> load -> view('semic/semic_localizacao_poster', $data);
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
		array_push($menus, array('Localização Pôster', 'index.php/semic/poster'));
		array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));
		array_push($menus, array('Suplentes', 'index.php/semic/suplentes'));
		array_push($menus, array('Credenciamento', 'index.php/credenciamento'));
		array_push($menus, array('Acompanhamento', 'index.php/semic/acompanhamento'));

		if (perfil('#TST') == 1) {
			array_push($menus, array('Anais do evento', 'index.php/semic/anais'));
			array_push($menus, array('Exportar', 'index.php/semic/anais_exportar'));
			array_push($menus, array('Exportar', 'index.php/semic/anais_exportar_trabalhos'));
		}

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'SEMIC - ' . date("Y");
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function resultado_semic($area = 0, $modalidade = '', $edital) {
		/* Load Models */
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_avaliacoes -> resultado_semic($area, $modalidade, $edital);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
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

	function calculo_fc($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_avaliacoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_avaliacoes -> avaliador_cn();
		$this -> load -> view('content', $data);

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
		$this -> semic_anais -> gerar_sumario_trabalhos($ano);
		$data['content'] = $this -> semic_anais -> gerar_sumario_areas($ano);

		$data['content'] = '<h1>Exportar dados IC para SEMIC</h1>';
		$this -> load -> view('content', $data);

		/* Phase I - Gerar paginas de cada trabalho */

		//$data['content'] = $this -> semic_anais -> gerar_paginas_trabalho();
		//$this->load->view('content',$data);

		/* Phase II - Gerar Sumario por Areas */
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	/* Exportar dados */
	function anais_exportar_trabalhos() {
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
		$this -> semic_anais -> gerar_paginas_trabalho($ano);

		$data['content'] = '<br>FIM';
		$this -> load -> view('content', $data);

		/* Phase II - Gerar Sumario por Areas */
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function poster($id = 0, $ala = '', $nr = '') {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$this -> load -> view('header/content_open');
		$data = array();

		$this -> semic_trabalhos -> indicacao_local_poster($id, $ala, $nr);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/******************** NAO VINCULANDA ******************************/
	function agenda_convite($id = 0, $email = 0) {
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
		$data['agenda'] = $this -> semic_trabalhos -> mostra_agenda($id, date("Y"), 1);

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
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
	}

	function suplentes() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_trabalhos -> avaliadores_resumo_indicacao(2);
		$data['title'] = '';
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_trabalhos -> avaliadores_seminario(2);
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> semic_trabalhos -> avaliadores_resumo_indicacao(1);
		$data['title'] = '';
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_trabalhos -> avaliadores_seminario(1);
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento() {
		/* Load Models */
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		array_push($menu, array('SEMIC', 'Resultado - Premiação', 'ITE', '/semic/premiacao'));
		array_push($menu, array('SEMIC', 'Resultado - Premiação Editar', 'ITE', '/semic/premiacao_row'));
		array_push($menu, array('SEMIC', 'Gerar lista de Premiados no site', 'ITE', '/semic/premiacao_gerar'));

		array_push($menu, array('SEMIC', 'Resumos', 'ITE', '/semic/acompanhamento_resumos'));

		array_push($menu, array('Notas', 'Gerar Fator de Correção Avaliador', 'ITE', '/semic/calculo_fc'));

		array_push($menu, array('Resultado PIBIC', 'Pôster - Área (1 e 3)', 'ITE', '/semic/resultado_semic/1/PIBIC/POSTER'));
		array_push($menu, array('Resultado PIBIC', 'Pôster - Área (2 e 4)', 'ITE', '/semic/resultado_semic/2/PIBIC/POSTER'));
		array_push($menu, array('Resultado PIBIC', 'Pôster - Área (5)', 'ITE', '/semic/resultado_semic/5/PIBIC/POSTER'));
		array_push($menu, array('Resultado PIBIC', 'Pôster - Área (6)', 'ITE', '/semic/resultado_semic/6/PIBIC/POSTER'));
		array_push($menu, array('Resultado PIBIC', 'Pôster - Área (7 e 8)', 'ITE', '/semic/resultado_semic/7/PIBIC/POSTER'));

		array_push($menu, array('Resultado PIBIC', 'Oral - Área (1 e 3)', 'ITE', '/semic/resultado_semic/1/PIBIC/ORAL'));
		array_push($menu, array('Resultado PIBIC', 'Oral - Área (2 e 4)', 'ITE', '/semic/resultado_semic/2/PIBIC/ORAL'));
		array_push($menu, array('Resultado PIBIC', 'Oral - Área (5)', 'ITE', '/semic/resultado_semic/5/PIBIC/ORAL'));
		array_push($menu, array('Resultado PIBIC', 'Oral - Área (6)', 'ITE', '/semic/resultado_semic/6/PIBIC/ORAL'));
		array_push($menu, array('Resultado PIBIC', 'Oral - Área (7 e 8)', 'ITE', '/semic/resultado_semic/7/PIBIC/ORAL'));

		array_push($menu, array('Resultado Internacional', 'Oral', 'ITE', '/semic/resultado_semic/10/PIBIC/ORAL'));

		array_push($menu, array('Resultado PIBITI', 'Pôster', 'ITE', '/semic/resultado_semic/1/PIBITI/POSTER'));
		array_push($menu, array('Resultado PIBITI', 'Oral', 'ITE', '/semic/resultado_semic/2/PIBITI/ORAL'));

		array_push($menu, array('Resultado PIBIC_EM', 'Pôster', 'ITE', '/semic/resultado_semic/1/PIBIC_EM/POSTER'));
		array_push($menu, array('Resultado PIBIC_EM', 'Oral', 'ITE', '/semic/resultado_semic/2/PIBIC_EM/ORAL'));

		array_push($menu, array('Resultado JI', 'Resultado', 'ITE', '/semic/resultado_semic/12/JI/JI'));
		array_push($menu, array('Resultado PE', 'Resultado', 'ITE', '/semic/resultado_semic/11/PE/PE'));
		array_push($menu, array('Resultado PEjr', 'Resultado', 'ITE', '/semic/resultado_semic/13/PEjr/PEjr'));

		array_push($menu, array('Relatórios do evento', 'Alunos ausentes', 'ITE', '/semic/ausencia_alunos'));
		array_push($menu, array('Relatórios do evento', 'Professores ausentes', 'ITE', '/semic/ausencia_professores'));
		array_push($menu, array('Relatórios do evento', 'Panoroma Geral de presenças', 'ITE', '/semic/ausencia_no_evento'));

		$data = array();
		$data['menu'] = $menu;
		$data['title_menu'] = 'Acompanhamento - SEMIC (Pré)';
		$this -> load -> view('header/main_menu', $data);

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

		foreach ($area as $key => $value) {
			$sx = $key . ' ';
		}
		$data['content'] = $sx .= '<hr>' . $data['content'];
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

	function trabalhos_correcao($id = 0) {
		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$sql = "select * from semic_trabalho 
							where sm_titulo like '%[e]%' 
							or sm_titulo_en like '%[e]%'
							or sm_rem_01 like '%[e]%'
							or sm_rem_02 like '%[e]%'
							or sm_rem_03 like '%[e]%'
							or sm_rem_04 like '%[e]%'
							or sm_rem_05 like '%[e]%'
							or sm_rem_06 like '%[e]%'
							or sm_rem_11 like '%[e]%'
							or sm_rem_12 like '%[e]%'
							or sm_rem_13 like '%[e]%'
							or sm_rem_14 like '%[e]%'
							or sm_rem_15 like '%[e]%'
							or sm_rem_16 like '%[e]%'
							limit 10
							";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($rq = 0; $rq < count($rlt); $rq++) {
			$line = $rlt[$rq];

			$tit = $line['sm_titulo'];
			echo '<BR>' . $tit;
			$tit = troca($tit, '[e]', '&');
			$tit = troca($tit, '&rt;', '>');
			$tit = troca($tit, '&lt;', '<');

			$tite = $line['sm_titulo_en'];
			$tite = troca($tite, '[e]', '&');
			$tite = troca($tite, '&rt;', '>');
			$tite = troca($tite, '&lt;', '<');

			$rm = array();
			for ($r = 1; $r <= 6; $r++) {
				$rm[$r] = $line['sm_rem_0' . $r];
				$rm[$r] = troca($rm[$r], '[e]', '&');
				$rm[$r] = troca($rm[$r], '&rt;', '>');
				$rm[$r] = troca($rm[$r], '&lt;', '<');
			}
			for ($r = 11; $r <= 16; $r++) {
				$rm[$r] = $line['sm_rem_' . $r];
				$rm[$r] = troca($rm[$r], '[e]', '&');
				$rm[$r] = troca($rm[$r], '&rt;', '>');
				$rm[$r] = troca($rm[$r], '&lt;', '<');
			}

			$sql = "update semic_trabalho set
						sm_titulo = '$tit',
						sm_titulo_en = '$tite',
						sm_rem_01 = '" . $rm[1] . "',
						sm_rem_02 = '" . $rm[2] . "', 
						sm_rem_03 = '" . $rm[3] . "', 
						sm_rem_04 = '" . $rm[4] . "', 
						sm_rem_05 = '" . $rm[5] . "', 
						sm_rem_06 = '" . $rm[6] . "', 
						sm_rem_11 = '" . $rm[11] . "', 
						sm_rem_12 = '" . $rm[12] . "',
						sm_rem_13 = '" . $rm[13] . "',
						sm_rem_14 = '" . $rm[14] . "',
						sm_rem_15 = '" . $rm[15] . "',
						sm_rem_16 = '" . $rm[16] . "'   
						where id_sm = " . $line['id_sm'];
			$rlta = $this -> db -> query($sql);
		}

		$form -> see = true;
		$form -> edit = true;
		$form = $this -> semic_trabalhos -> row($form);

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

	function etiquetas() {
		/* Load Models */
		$ano = (date("Y") - 1);
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open.php');

		$data['content'] = $this -> semic_trabalhos -> mostra_etiquetas_por_alas($ano);
		$data['title'] = 'Etiquetas SEMIC - Pôster - ' . $ano;

		$this -> load -> view('content.php', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function etiquetas_avaliadores() {
		/* Load Models */
		$ano = (date("Y") - 1);
		$this -> load -> model('semic/semic_avaliacoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open.php');

		$data['content'] = $this -> semic_avaliacoes -> mostra_etiquetas_avaliadores($ano);
		$data['title'] = 'Etiquetas Avaliadores SEMIC - ' . $ano;

		$this -> load -> view('content.php', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function etiquetas_pr($id = 0, $ala = '') {
		$ano = (date("Y") - 1);
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('semic/semic_salas');
		$this -> load -> view('header/header.php');

		$data['content'] = $this -> semic_trabalhos -> imprime_etiquetas_por_alas($ano, $id, $ala);
		$data['title'] = '';

		$this -> load -> view('content.php', $data);
	}

	function etiquetas_av($id = 0, $check = '') {
		$ano = (date("Y") - 1);
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> view('header/header.php');
		$data = array();
		$data['content'] = $this -> semic_avaliacoes -> imprime_etiquetas_avaliador($id);
		$data['title'] = '';

		$this -> load -> view('content.php', $data);
	}

	function etiquetas_av_all($id = 0, $check = '') {
		$ano = (date("Y") - 1);
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> view('header/header.php');

		$data['content'] = $this -> semic_avaliacoes -> mostra_etiquetas_avaliadores_todas($id);
		$data['title'] = '';

		$this -> load -> view('content.php', $data);
	}

	function trabalhos($id = 0) {

		/* Load Models */
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open.php');

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Trabalhos SEMIC';
		$data['menu'] = 0;

		/* Menu */
		$menu = array();
		/* Libera Menus */
		array_push($menu, array('Apresentação Pôster', 'Impressão de Etiquetas', 'ITE', '/semic/etiquetas/'));

		array_push($menu, array('Avaliadores', 'Impressão de Etiquetas', 'ITE', '/semic/etiquetas_avaliadores/'));

		$data['menu'] = $menu;

		$data['title_menu'] = 'Menu Principal';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
