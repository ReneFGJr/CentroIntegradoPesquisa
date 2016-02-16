<?php
class ic_contrato extends CI_Controller {

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
		$this -> load -> helper('tcpdf');
		
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
		array_push($menus, array('Contratos', 'index.php/ic_contrato/contratos/'));

		/* Carrega Menu*/
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas Padrao da IC*/
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		/* Adiciona logo da IC*/
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic.png');
		$this -> load -> view('header/logo', $data);
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('ic_contratos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/*Fecha */	/*Gera rodape*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ic_contratos');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$this -> cab();
		//$this -> load -> view('header/content_open');
		
		$id_ic = $id;
		
		$ic = $this -> ics -> le($id_ic);
		$data = $this -> ic_contratos -> le($id);
		$ic_us = $this -> usuarios -> le($ic['aluno_id']);
		$ic = array_merge($ic,$ic_us);
		
		//print_r($ic);
		//exit;
		
		$txt = $data['icc_text_contrato'];
		
		/* sequencia de trocas [aluno]*/
		$txt = troca($txt,'$nome_aluno', $ic['al_nome']);
		$txt = troca($txt,'$curso_aluno', $ic['al_curso']);
		$txt = troca($txt,'$cpf_aluno', $ic['al_cpf']);
		$txt = troca($txt,'$email_aluno', $ic['usm_email']);
		$txt = troca($txt,'$cracha_aluno', $ic['al_cracha']);
		/* sequencia de trocas [orientador]*/
		$txt = troca($txt,'$nome_orientador', $ic['pf_nome']);
		$txt = troca($txt,'$cpf_orientador', $ic['pf_cpf']);
		$txt = troca($txt,'$cracha_orientador', $ic['pf_cracha']);
		//$txt = troca($txt,'$email_orientador', $ic['usm_email']);
		$txt = troca($txt,'$titulo_projeto', $ic['ic_projeto_professor_titulo']);	
		$txt = troca($txt,'$valor_bolsa', $ic['mb_valor']);
		$txt = troca($txt,'$mb_bolsa_tipo', $ic['mb_tipo']);
		$txt = troca($txt,'$mb_bolsa_desc', $ic['mb_descricao']);
		$txt = troca($txt,'$data_ativa_bolsa', $ic['ic_dt_ativacao']);
		
		
		$data['icc_text_contrato'] = $txt;
		
		$this -> load -> view('ic_contrato/view', $data);

		/*Fecha */	/*Gera rodape*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ic_contratos');
		$cp = $this -> ic_contratos -> cp();

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ic_contratos -> tabela);
		$data['title'] = msg('lb_mensagens_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic_contrato/contratos'));
		}

		/*Fecha */	/*Gera rodape*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function contratos() {
		$this -> cab();
		$data = array();

		/* Menu de bot?es na tela Admin*/
		$menu = array();
		array_push($menu, array('PIBIC/PIBIC', 'Ver Contratos', 'ITE', '/ic_contrato/ver_contratos'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Gestão de contratos';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodap?*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ver_contratos($id = 0) {

		/* Load Models */
		$this -> load -> model('ic_contratos');

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> ic_contratos -> tabela;
		$form -> see = true;
		$form -> novo = true;
		$form -> edit = true;
		$form = $this -> ic_contratos -> row($form);

		$form -> row_edit = base_url('index.php/ic_contrato/edit');
		$form -> row_view = base_url('index.php/ic_contrato/view');
		$form -> row = base_url('index.php/ic');

		$tela['tela'] = row($form, $id);
		$tela['title'] = $this -> lang -> line('Label_ic_contrato');
		$this -> load -> view('form/form', $tela);

		/*Fecha */	/*Gera rodape*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function imprimir($id = 0 ){
		/* Load Models */
		$this -> load -> model('ic_contratos');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		
		$id_ic = $id;
		
		$ic = $this -> ics -> le($id_ic);
		$data = $this -> ic_contratos -> le($id);
		$ic_us = $this -> usuarios -> le($ic['aluno_id']);
		$ic = array_merge($ic,$ic_us);
		
		//print_r($ic);
		//exit;
		
		$txt = $data['icc_text_contrato'];
		
		/* sequencia de trocas [aluno]*/
		$txt = troca($txt,'$nome_aluno', $ic['al_nome']);
		$txt = troca($txt,'$curso_aluno', $ic['al_curso']);
		$txt = troca($txt,'$cpf_aluno', mask_cpf($ic['al_cpf']));
		$txt = troca($txt,'$email_aluno', $ic['usm_email']);
		$txt = troca($txt,'$cracha_aluno', $ic['al_cracha']);
		/* sequencia de trocas [orientador]*/
		$txt = troca($txt,'$nome_orientador', $ic['pf_nome']);
		$txt = troca($txt,'$cpf_orientador', mask_cpf($ic['pf_cpf']));
		$txt = troca($txt,'$cracha_orientador', $ic['pf_cracha']);
		//$txt = troca($txt,'$email_orientador', $ic['usm_email']);
		$txt = troca($txt,'$titulo_projeto', $ic['ic_projeto_professor_titulo']);
		
		$txt = troca($txt,'$valor_bolsa_ext', trim(extenso($ic['mb_valor'])));	
		$txt = troca($txt,'$valor_bolsa', $ic['mb_valor']);
		
		
		$txt = troca($txt,'$mb_bolsa_tipo', $ic['mb_tipo']);
		$txt = troca($txt,'$mb_bolsa_desc', $ic['mb_descricao']);
		
		$date_x = sonumero($ic['ic_dt_ativacao']);
		 
		$date = round(substr($date_x, 6, 2));
		$date .= ' de '.meses(substr($date_x, 4, 2)); 
		$date .= ' de '.substr($date_x, 0, 4);
		
		$txt = troca($txt,'$data_ativa_bolsa', $date);
		
		
		$data['contrato'] = $txt;
		//echo $data['contrato'];
		//exit;
		
		
		
		$this -> load -> view('ic_contrato/contrato', $data);

		
		
	}




}
?>
