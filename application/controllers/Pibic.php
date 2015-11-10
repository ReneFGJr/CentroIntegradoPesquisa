<?php
class pibic extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library("nuSoap_lib");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		
		date_default_timezone_set('America/Sao_Paulo');
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
		$data['ged'] = $this -> geds -> list_files_table($data['ic_plano_aluno_codigo'], 'ic');
		//$data['ged_arquivos'] = $this -> geds -> form_upload($data['ic_plano_aluno_codigo'], 'ic');
		$data['ged_arquivos'] = '';
		$this -> load -> view('ged/list_files', $data);

		$this -> load -> view('ic/plano_historico', $data);
		$this -> load -> view('ic/plano_avaliacao', $data);

		/* */
		$protocolo = $data['ic_plano_aluno_codigo'];
		$rs = $this -> ics -> le_resumo($protocolo);
		
		if (count($rs) > 0)
			{
				$data['line'] = $rs;
				$data['resumo'] = '1';
			}

		$this -> load -> view('ic/plano_resumo', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pibic_protocolo_ver($id='',$chk='')
		{
		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];
		
		$chk2 = checkpost_link($id);
		
		if ($chk != $chk2)
			{
				redirect(base_url('index.php/main'));
			}
		
		/* Le dados */
		$this -> cab();
		$data = array();
		$data['resumo'] = $this->protocolos_ic->acoes_abertas();
		
		/* Dados */
		$dados = $this->protocolos_ic->le($id);
		$proto_ic = $dados['pr_protocolo_original'];

		$data['search'] = $this->load->view('ic/protocolo',$dados,true);
		$this->load->view('ic/home',$data);
		$this -> load -> view('header/content_close');			
		}
		
	function protocolo($tp='',$id='')
		{
		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];
		$this -> cab();
		$data = array();
		$data['resumo'] = $this->protocolos_ic->acoes_abertas();
		$data['search'] = $this->protocolos_ic->protocolos_abertos_pesquisador($cracha);
		$this->load->view('ic/home',$data);
		$this -> load -> view('header/content_close');			
		}
	
	function proto_abrir($tp='',$id='')
		{
		$this -> load -> model('protocolos_ic');
		
		$this -> cab();
		$data = array();
		$data['resumo'] = $this->protocolos_ic->acoes_abertas();
		$data['search'] = '';
		$this->load->view('ic/home',$data);
		$this -> load -> view('header/content_close');			
		}

	public function index($id = 0) {
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');
		
		$this -> cab();
		$data = array();
		$data['resumo'] = $this->protocolos_ic->acoes_abertas();
		$data['search'] = $this->ics->orientacoes();
		$this->load->view('ic/home',$data);
		$this -> load -> view('header/content_close');
	}

	public function cab() {
		
		/* Security */
		$this -> load -> model('login/josso_login_pucpr');	
		$this -> josso_login_pucpr -> security();	

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;
		
		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/pibic'));
		array_push($menus, array('Protocolos', 'index.php/pibic/protocolo'));
		/*
		array_push($menus, array('Trabalhos', 'index.php/semic/trabalhos'));
		array_push($menus, array('Localizaзгo Pфster', 'index.php/semic/poster'));
		array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));
		array_push($menus, array('Suplentes', 'index.php/semic/suplentes'));
		array_push($menus, array('Credenciamento', 'index.php/credenciamento'));
		 */

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciaзгo Cientнfica';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');		
	}
}
?>