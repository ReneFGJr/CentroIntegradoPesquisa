<?php
class admin extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
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

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Perfis', 'index.php/admin/logins/'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Administra��o';

		if (perfil('#ADM')) {
			$data['menu'] = 1;
			$data['menus'] = $menus;
		} else {
			$data['menu'] = 0;
			$data['menus'] = $menus;
		}
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');

		if (perfil('#ADM', 1) == false) {
			redirect(base_url('index.php'));
			return (0);
		}
	}

	function index() {
		$this -> cab();
		$data = array();

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Parceiros', 'Parceiros da PUCPR', 'ITE', '/parceiro'));
		array_push($menu, array('Idiomas', 'Idiomas do Sistema', 'ITE', '/idioma'));
		
		array_push($menu, array('Usu�rios', 'Integra��o SGA/CIP Estudantes', 'ITE', '/usuario/integracao_sga'));
		array_push($menu, array('Usu�rios', 'Perfil de usu�rio do Sistema', 'ITE', '/perfil'));
		array_push($menu, array('Unidades', 'Unidades da PUCPR', 'ITE', '/unidade'));
		array_push($menu, array('Institui��es', 'Institui��es de ensino', 'ITE', '/instituicao'));

		array_push($menu, array('Inicia��o Cient�fica', 'Manuten��o de Bolsas', 'ITE', '/admin/ic'));
		array_push($menu, array('Inicia��o Cient�fica', 'ID/usuarios bas bolsas', 'ITE', '/admin/ic_id'));

		array_push($menu, array('SEMIC', 'Salas de Apresenta��o', 'ITE', '/semic/salas'));
		array_push($menu, array('SEMIC', 'Trabalhos', 'ITE', '/semic/trabalhos_row'));
		array_push($menu, array('SEMIC', 'Corre��o UTF8', 'ITE', '/semic/trabalhos_correcao'));
		array_push($menu, array('Usu�rios', 'Limpa Curso (Turnos)', 'ITE', '/admin/limpa_curso'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administra��o';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */ 		/*Gera rodap�*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ic($id = 0, $pg = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> ics -> table_row();
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form = $this -> ics -> row($form);

		$form -> row_edit = base_url('index.php/admin/ic_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/admin/ic/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('ic');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ic_id($id = 0, $pg = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		$this->ics->indicacoes_sem_id_usuario();

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}
	/* Discente */
	function limpa_curso() {
		/* Load Models */
		$this -> load -> model('discentes');
		$this -> cab();
		$data = array();
		
		$tela = '<h3>Buscando cursos</h3>';
		$data['content'] = $tela;
		$this->load->view('content',$data);
		
		$tela = $this->discentes->limpar_habilitacao_curso();
		$data['content'] = $tela;
		$this->load->view('content',$data);
		
		$tela = $this->discentes->limpar_turno_curso_estudante();
		$data['content'] = $tela;		
		$this->load->view('content',$data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ic_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ics -> tabela);
		$data['title'] = msg('ic');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/admin/ic'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function centro_resultado($id = 0) {
		$this -> load -> model('centro_resultados');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> centro_resultados -> tabela;
		$form -> see = true;
		$form = $this -> centro_resultados -> row($form);

		$form -> row_edit = base_url('index.php/admin/centro_resultado_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/admin/centro_resultado/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_centro_resultado');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function logins_view($id = 0, $check = '', $act = '', $id_act = 0) {
		/* Load Models */
		$this -> load -> model('logins');

		/* Se acao EXCLUIR */
		if ($act == 'del') {
			$data = $this -> logins -> perfil_desassociar($id_act);
		}

		$this -> cab();
		$data = array();

		if (!checkpost_link($id) == $check) {
			redirect("index.php/main");
		}

		$data = $this -> logins -> le($id);
		$this -> load -> view('login/login_show', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function logins($id = 0) {
		$this -> load -> model('logins');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> logins -> tabela;
		$form -> see = true;
		$form = $this -> logins -> row($form);

		$form -> row_edit = base_url('index.php/admin/logins_edit/');
		$form -> row_view = base_url('index.php/admin/logins_view/');
		$form -> row = base_url('index.php/admin/logins/');

		$tela['tela'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = $this -> lang -> line('title_admin');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
