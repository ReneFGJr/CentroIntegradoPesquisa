<?php
class evento extends CI_controller {
	function __construct() {
		global $dd, $acao;
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

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Módulo de Eventos';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function index() {
		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Eventos', 'Lista dos Eventos', 'ITE', '/evento/row'));
		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Eventos';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function row() {
		/* Load Models */
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> eventos -> row();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function editar($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> eventos -> tabela);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/evento/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function email($id=0) {
		global $email_own;
		$email=1;
		$email_own = 2;
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();
		
		$this->eventos->enviar_email($id);
		
		/*		
		$this->email->attach('img/img_noPhoto.jpg');
		$cid = $this->email->attachment_cid('img/img_noPhoto.jpg');
		$msg = '<center><img src="cid:'. $cid .'" alt="'.$cid.'" />';

		if ($email == 1) {
			//enviaremail_usuario($id,'Agenda',$data['agenda'],$email_own);
			enviaremail_usuario($id, 'XXXXX', $msg , $email_own);
		}
		 */

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	function email_test($id=0) {
		global $email_own;
		$email=1;
		$email_own = 2;
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();
		
		$this -> load -> view('header/content_open');
		
		$this->eventos->enviar_email_test($id);
		$data['content'] = 'Enviado teste';
		$this -> load -> view('content',$data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	function editar_mailing($id = 0, $chk = '', $evento=0) {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp_mailing();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> eventos -> tabela_mailing);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/evento/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver($id = 0, $chk = '', $idm = 0) {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$data = $this -> eventos -> le($id);
		$data['ev_mailing'] = '';
		/* Mailing */
		if ($idm > 0)
			{
				$data2 = $this->eventos->show_mailing($idm);
				$data['email'] = '';
				$data['ev_mailing'] = $this->load->view('evento/mailing',$data2,True);
				
			} else {
				$data['email'] = '';
			}
		
		$this -> load -> view('evento/view', $data);
		
		//$data['content'] = 'https://cip.pucpr.br/img/evento/SwB/';
		$data['content'] = '<a href="'.base_url('index.php/evento/editar_mailing/'.$idm).'" class="link lt1">editar</a>';
		$data['content'] .= ' | ';
		$data['content'] .= '<a href="'.base_url('index.php/evento/email_test/'.$idm).'" class="link lt1">enviar teste de e-mail</a>';
		$data['content'] .= ' | ';
		$data['content'] .= '<a href="'.base_url('index.php/evento/email/'.$idm).'" class="link lt1">disparar e-mail</a>';
		$this -> load -> view('content', $data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
