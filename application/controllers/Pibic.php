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

		if (count($rs) > 0) {
			$data['line'] = $rs;
			$data['resumo'] = '1';
		}

		$this -> load -> view('ic/plano_resumo', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pibic_protocolo_ver($id = '', $chk = '') {
		$cracha = $_SESSION['cracha'];

		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];

		$chk2 = checkpost_link($id);

		if ($chk != $chk2) {
			redirect(base_url('index.php/main'));
		}

		/* Le dados */
		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);

		/* Dados */
		$dados = $this -> protocolos_ic -> le($id);
		$proto_ic = $dados['pr_protocolo_original'];

		$data['search'] = $this -> load -> view('ic/protocolo', $dados, true);
		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function protocolo($tp = '', $id = '') {
		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];
		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> acoes_abertas();
		$data['resumo'] .= $this -> protocolos_ic -> resumo_protocolos($cracha);

		$data['search'] = $this -> protocolos_ic -> protocolos_abertos_pesquisador($cracha);

		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function proto_abrir($tp = '', $id = '', $chk = '') {
		$cracha = $_SESSION['cracha'];

		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		/* Recupera dados */
		$chk = $this -> input -> get("dd3");
		$dd2 = $this -> input -> get("dd2");
		$dd4 = $this -> input -> get("dd4");
		$chk2 = checkpost_link($dd2 . $dd4);

		if (($chk == $chk2) and (strlen($dd2) > 0)) {
			$url = base_url('index.php/pibic/proto_abrir_tipo/' . $dd4 . '/' . $dd2 . '/' . checkpost_link($dd4 . $dd2));
			redirect($url);
			exit ;
		}

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);
		$tela = '<h1>' . msg('protocolo_ic_' . $tp) . '</h1>';
		$tela .= '<p>' . msg('protocolo_ic_' . $tp . '_info') . '</p>';
		$bt = msg('protocolo_botao_' . $tp);

		$data['search'] = $tela . $this -> protocolos_ic -> orientacoes_protocolo($tp, $bt);
		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function substituir_aluno($id, $chk = '') {
		/* Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> load -> model('protocolos_ic');

		$cracha = $_SESSION['cracha'];

		$data = $this -> ics -> le_protocolo($id);
		$plano = $this -> load -> view('ic/plano', $data, true);

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);
		$data['search'] = $plano;
		$data['search'] .= $this -> protocolos_ic -> abrir('SBS', $id);

		$this -> load -> view('ic/home', $data);
	}

	function proto_abrir_tipo($tp = '', $id = '', $chk = '') {
		/* Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');		

		$cracha = $_SESSION['cracha'];

		/* Substituição de aluno, caminho alternativo */
		if ($tp == 'SBS') {
			$url = base_url('index.php/pibic/substituir_aluno/' . $id . '/' . checkpost_link($id));
			redirect($url);
		}

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);
		
		/* Valida */
		if ($this -> protocolos_ic -> verifica_se_existe_aberto($tp, $id) == '1') {
			
			$texto = msg('Already_exists_protocol');
			$data['search'] = '<center><h3><font color="red">' . $texto . '</font></h3></center>';
			$this -> load -> view('ic/home', $data);
		} else {
			$chk2 = checkpost_link($tp . $id);

			if ($chk != $chk2) {
				redirect(base_url('index.php/pibic'));
			}

			$data2 = array();
			$data2 = $this -> ics -> le_protocolo($id);
			$data = array_merge($data,$data2);
			$plano = $this -> load -> view('ic/plano', $data, true);

			$data['search'] = $plano. $this -> protocolos_ic -> abrir($tp, $id);
			$this -> load -> view('ic/home', $data);
		}
		$this -> load -> view('header/content_close');
	}

	public function index($id = 0) {
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> acoes_abertas();
		$data['resumo'] .= $this -> protocolos_ic -> resumo_protocolos($cracha);
		$data['resumo'] .= '<br>' . $this -> ics -> resumo_orientacoes($cracha);
		
		$data['search'] = $this -> ics -> entregas_abertas();
		$data['search'] .= $this -> ics -> orientacoes();
		$this -> load -> view('ic/home', $data);
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
		 array_push($menus, array('Localização Pôster', 'index.php/semic/poster'));
		 array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));
		 array_push($menus, array('Suplentes', 'index.php/semic/suplentes'));
		 array_push($menus, array('Credenciamento', 'index.php/credenciamento'));
		 */

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

}
?>