<?php
class usuario extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

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

		/* SeguranCa */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Usuarios', 'index.php/usuarios/row/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_usuarios');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');

	}
	
	function email_mod($id,$chk)
		{
		/* Model */
		$this->load->model('usuarios');
		
		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();
		
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$email = $this->input->post("dd1");
		$acao = $this->input->post("acao");
		
		/* Se não existe acao, recupera e-mail */
		if (strlen($acao) == 0)
			{
			$email = $this->usuarios->recupera_email($id);
			}
		
		$this -> load -> view('header/header', $data);
		$data['email'] = $email;
		$data['bt_acao'] = msg('email_modificar');
		$data['bt_excluir'] = msg('email_excluir');
		$this->load->view('usuario/add_email.php',$data);
		
		if ($acao == $data['bt_excluir'])
			{
				$data['content'] = $this->usuarios->email_excluir($id);
				$this->load->view('content',$data);
				return(0);
			}
		
		if ((strlen($email) > 0) and ($acao == $data['bt_acao']))
			{
				$data['content'] = $this->usuarios->email_modify($id,$email);
			} else {
				$data['content'] = '';
			}
		$this->load->view('content',$data);	
		}

	function email_add($id, $chk) {
		/* Model */
		$this->load->model('usuarios');
		
		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();
		
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$email = $this->input->post("dd1");
		$acao = $this->input->post("acao");
		$this -> load -> view('header/header', $data);
		$data['email'] = $email;
		$data['bt_acao'] = msg('email_adicionar');
		$data['bt_excluir'] = '';
		$this->load->view('usuario/add_email.php',$data);
		
		if (strlen($email) > 0)
			{
				$data['content'] = $this->usuarios->email_add($id,$email);
			} else {
				$data['content'] = '';
			}
			
		$this->load->view('content',$data);		
	}

	function index() {
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function row($id = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela;
		$form -> see = true;
		$form -> edit = true;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/usuario/edit');
		$form -> row_view = base_url('index.php/usuario/view');
		$form -> row = base_url('index.php/estudante/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_estudante');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0) {
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);

		$tipo = $data['usuario_tipo_ust_id'];

		switch ($tipo) {
			case '2' :
				$data['logo'] = base_url('img/logo/logo_docentes.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/docente', $data);
				break;
			default :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Dados de apresentacao */
		$data['content'] = '';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0) {
		global $dd;
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);

		$tipo = $data['usuario_tipo_ust_id'];

		switch ($tipo) {
			case '2' :
				$this -> load -> view('perfil/docente', $data);
				break;
			default :
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Form */
		$form = new form;
		$form -> tabela = 'us_usuario';
		$form -> id = $id;
		$cp = $this -> usuarios -> cp_perfil();
		$data['tela'] = $form -> editar($cp, 'us_usuario');

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario/row'));
		}

		$data['title'] = 'Formulário';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>