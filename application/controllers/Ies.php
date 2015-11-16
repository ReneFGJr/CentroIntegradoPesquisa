<?php
class ies extends CI_controller {
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
	}

	/* Eventos Redirecionados */
	function spsr() {
		$this -> load -> view('evento/spsr/home');
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function cab() {
		/* Security */
		$this -> security();

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
		array_push($menus, array('Eventos', 'index.php/evento'));
		if (isset($_SESSION['evento'])) {
			array_push($menus, array('Inscrições', 'index.php/evento/inscricoes'));
			array_push($menus, array('Lista de presença', 'index.php/evento/lista_presenca'));
		}

		/* Monta telas */
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$data['title_page'] = 'IES';
		$this -> load -> view('header/header', $data);
		$this -> load -> view('header/cab', $data);
	}

	function index() {
		/* Load Models */
		//$this -> load -> model('ies_comunitarias');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Instituicoes', 'Comunitárias', 'ITE', '/ies/comunitaria'));
		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Eventos';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function comunitaria() {
		/* Load Models */
		$this -> load -> model('ies_comunitarias');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$tela = $this -> ies_comunitarias -> row3();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function vinculo($nome='',$dominio='') {
		/* Load Models */
		$this -> load -> model('ies_comunitarias');

		$data = array();
		$this -> load -> view('header/header');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$cp = array();
		array_push($cp,array('$H8','','',False,False));
		$sql = "id_ies:ies_nome:select concat(ies_sigla,'/',ies_nome) as ies_nome, id_ies from ies_instituicao order by ies_nome";
		array_push($cp,array('$Q '.$sql,'','',True,True));
		
		$form = new form;
		$tela = $form->editar($cp,'');
		
		/* Saved */
		if ($form->saved > 0)
			{
				$email = $nome.'@'.$dominio;
				$inst = $this->input->post('dd1');
				$this->ies_comunitarias->vincula($email,$inst);
				echo 'SAVED!';
				exit;
			}
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

	}	

}
?>