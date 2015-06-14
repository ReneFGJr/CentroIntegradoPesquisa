<?php
class csf extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
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
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Ciência sem Fronteiras';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_csf.png');
		$this -> load -> view('header/logo', $data);
	}

	function index() {
		$this -> cab();
		$data = array();

		$this -> load -> view('form/form_busca.php');

		$this -> load -> view('csf/menu.php');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function novo() {
		/* Models */
		$this -> load -> model('estudantes');
		$this -> load -> model('sga_pucpr');
		$this -> load -> model('csfs');

		$this -> cab();
		$data = array();
		$data['title'] = msg('csf_title_novo');
		$data['tela'] = '';
		$this -> load -> view('form/form', $data);

		/* Busca aluno */
		$dd1 = $this -> input -> post('dd1');
		$aluno = '';
		if (strlen($dd1) > 0) {
			$aluno = $this -> estudantes -> findStudentByCracha($dd1);
		}

		if (strlen($aluno) > 0) {
			/* Parte II do formulario */
			$alunoDados = $this->estudantes->readByCracha($aluno);
			$this -> load -> view('usuario/view',$alunoDados);
			
			/* Montar formulario */
			$cp = $this->csfs->cp_novo($aluno);
			$form = new form;
			$data['tela'] = $form->editar($cp,'');
			$data['title'] = '';
			
			echo '==>'.$form->saved;
			
			$this->load->view('form/form',$data);
		} else {
			/* Mostra formulario de consulta do aluno */
			$this -> load -> view('estudante/estudante_busca_cracha');
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '') {
		$this -> cab();
		$data = array();

		$this -> load -> model('csfs');

		$this -> load -> view('usuario/view', $data);

		$data['content'] = $this -> csfs -> mostra_bolsa($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
