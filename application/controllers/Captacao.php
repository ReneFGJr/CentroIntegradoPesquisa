<?php
class Captacao extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users_helper');
		$this -> load -> helper('url');
		$this -> load -> library('session');

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
		$this -> load -> model('stricto_sensus');

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

		/* COORDENADOR DE PROGRAMA */
		$id_us = $_SESSION['id_us'];
		if ($this -> stricto_sensus -> is_coordenador($id_us)) {
			array_push($menus, array('Validações', 'index.php/ss/coordenador'));
		}
		array_push($menus, array('Meus Artigos', 'index.php/artigo/grants'));
		array_push($menus, array('Minhas Captações', 'index.php/captacao/grants'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Captacação de Recursos';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		$data['title_menu'] = 'Captacação de Recursos & Bonificação de Artigos';
		array_push($menu, array('Captação de Recursos', 'Meus projetos cadastrados', 'ITE', '/captacao/grants'));
		array_push($menu, array('Captação de Recursos', 'Cadastrar novo projeto', 'ITE', '/captacao/grants_new'));

		array_push($menu, array('Isenções', 'Minhas Isenções', 'ITE', '/captacao/isencoes'));
		array_push($menu, array('Isenções', 'Indicar Isenções', 'ITE', '/captacao/isencao_indicar'));

		array_push($menu, array('Artigos Científicos (A1, A2, Q1 e ExR)', 'Meus artigos cadastrados', 'ITE', '/captacao/articles'));
		array_push($menu, array('Artigos Científicos (A1, A2, Q1 e ExR)', 'Cadastrar novo artigos', 'ITE', '/captacao/article_new'));

		$data['menu'] = $menu;

		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function corrigir($id = 0, $chk = '') {
		$this -> load -> model('captacoes');
		$cracha = $_SESSION['cracha'];
		if ($this -> captacoes -> is_autor($id, $cracha) == 1) {
			$data = $this -> captacoes -> le($id);
			$proto = $data['ca_protocolo'];
			$this -> captacoes -> alterar_status($proto, '1');
			redirect(base_url('index.php/captacao/editar/' . $id . '/' . checkpost_link($id)));
		} else {
			redirect(base_url('index.php/main'));
		}
		return ('');
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'captacao_ged_documento';
		$this -> geds -> page = base_url('index.php/captacao/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'captacao_ged_documento';
		$this -> geds -> file_path = '';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'captacao_ged_documento';
		$this -> geds -> file_path = '_document/captacao/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'captacao_ged_documento';
		$this -> geds -> file_path = '_document/captacao/';
		$this -> geds -> file_delete($id);
	}

	function nova() {
		$this -> load -> model('captacoes');
		$cracha = $_SESSION['cracha'];

		$id = $this -> captacoes -> nova_captacao($cracha);
		$link = base_url('index.php/captacao/editar/' . $id . '/' . checkpost_link($id));
		redirect($link);
	}

	function editar($id = 0, $chk = '', $pag = 1) {
		$this -> load -> model('captacoes');
		$this -> cab();

		$data = array();
		$data[1] = msg('captacao_dados');
		$data[2] = msg('captacao_recursos');
		$data[3] = msg('captacao_arquivos');
		$data[4] = msg('captacao_confirmacao');
		$data['bp_atual'] = ($pag);
		$data['bp_link'] = base_url('index.php/captacao/editar/' . $id . '/' . checkpost_link($id));
		$data['bp'] = $data;
		$this -> load -> view('gadget/progessbar_horizontal.php', $data);

		$form = new form;
		$form -> id = $id;

		switch ($pag) {
			case '1' :
				$cp = $this -> captacoes -> cp_01($id);
				break;
			case '2' :
				$cp = $this -> captacoes -> cp_02($id);
				break;
			case '3' :
				$data = $this->captacoes->le($id);
				$proto = $data['ca_protocolo'];
				$cp = $this -> captacoes -> cp_03($id,$proto);
				break;
			case '4' :
				$cp = $this -> captacoes -> validacao_cp($id);
				break;
			case '5' :
			/* Finaliza processo */
			/* 10 - Enviado para o coordenador */
				$this -> captacoes -> alterar_status($id, 10);
				$link = base_url('index.php/captacao/view/' . $id . '/' . checkpost_link($id));
				redirect($link);
				return ('');
			default :
				$cp = array('$H', 'id_ca', '', true, true);
				break;
		}

		$tela = $form -> editar($cp, 'captacao');

		/* Salvo */
		if ($form -> saved > 0) {
			$link = base_url('index.php/captacao/editar/' . $id . '/' . checkpost_link($id) . '/' . ($pag + 1));
			redirect($link);
		}
		$data['content'] = $tela;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', null);
	}

	public function grants() {
		$this -> load -> model('captacoes');

		$cracha = $_SESSION['cracha'];

		$this -> cab('Projetos de Pesquisa cadastrados');
		$data = array();

		/* Recupera cracha */
		$cracha = $_SESSION['cracha'];
		$editar = 1;

		/* Resumo das Captacoes */
		$texto = '<a href="' . base_url('index.php/ss/captacoes/') . '" class="lt2 link">' . msg('captacao_ver_cadastro') . '</a>';
		/* Texto para visualizar todas as captacoes */
		$capt = $this -> captacoes -> resumo_projetos($cracha, $editar);
		$data = array_merge($data, $capt);
		$data['captacao_texto'] = $texto;

		$data['content'] = $data['captacoes'];

		/* Botao de novo ou editar */
		$nova_captacao = $this -> captacoes -> captacao_em_cadastro($cracha);
		if ($nova_captacao == 0) {
			$bt = '<a href="' . base_url('index.php/captacao/nova/') . '" class="botao3d back_green_shadown back_green">Cadastrar nova captacão >>></a>';
		} else {
			$bt = '<a href="' . base_url('index.php/captacao/editar/' . $nova_captacao . '/' . checkpost_link($nova_captacao)) . '" class="botao3d back_green_shadown back_green">Editar captacão em cadastro>>></a>';
		}

		$data['content'] .= '<br><br>' . $bt;
		$data['title'] = msg('CAPT');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', null);
	}

	function edit_ca($id = 0, $chk = '') {
		$this->load->view('header/header');
		$this -> load -> model('captacoes');
		$cp = $this->captacoes->cp_valores();
		$form = new form;
		$form->id = $id;
		$tela = $form -> editar($cp, 'captacao');

		/* Salvo */
		if ($form -> saved > 0) {
			$this->captacoes->atualiza_valor_total($id);
			$this->load->view('header/windows_close',null);
		} else {
			$data['content'] = $tela;
			$this->load->view('content',$data);
		}	
	}
	
	function edit_cb($id = 0, $chk = '') {
		$this->load->view('header/header');

		$this -> load -> model('captacoes');
		$cp = $this->captacoes->cp_dados();

		$form = new form;
		$form->id = $id;
		
		$tela = $form -> editar($cp, 'captacao');
		

		/* Salvo */
		if ($form -> saved > 0) {
			$this->captacoes->atualiza_valor_total($id);
			$this->load->view('header/windows_close',null);
		} else {
			$data['content'] = $tela;
			$this->load->view('content',$data);
		}	
	}	

	function view($id = 0, $chk = '') {
		
		$this -> load -> model('geds');
		$this -> load -> model('isencoes');
		$this -> load -> model('usuarios');
		$this -> load -> model('captacoes');
		$this -> load -> model('bonificacoes');
		$this -> load -> model('stricto_sensus');

		$chk2 = checkpost_link($id);
		if ($chk2 != $chk) {
			redirect(base_url('index.php/main'));
		}
		/* Load Models */

		$this -> cab();
		$data = $this -> captacoes -> le($id);
		$proto = $data['ca_protocolo'];

		/******************** acao */
		$acao = get("xacao");
		$tp = get("dd1");

		if ((strlen($acao) > 0) and (strlen($tp) > 0)) {
			$ok = 0;
			$acao = get("xacao");
			switch ($acao) {
				case 'LIBERACAO_COORDENADOR' :
					$ok = $this -> captacoes -> acao_captacao($proto, $tp);
					break;
				case 'VALIDACAO_DOCUMENTAL' :
					$ok = $this -> captacoes -> acao_captacao($proto, $tp);
					break;
				case 'LIBERACAO_DIRETORIA' :
					$ok = $this -> captacoes -> acao_captacao($proto, $tp);
					break;
				case 'LIBERACAO_PROCESSO' :
					$ok = $this -> captacoes -> acao_captacao($proto, $tp);
					break;
				case 'LIBERACAO_PROCESSO' :
					$ok = $this -> captacoes -> acao_captacao($proto, $tp);
					break;
			}
			if ($ok == 1) {
				redirect(base_url('index.php/captacao/view/' . $id . '/' . $chk));
			}
		}

		/* Dados do professor */
		$cracha = $data['ca_professor'];
		$prof = $this -> usuarios -> le_cracha($cracha);
		$tela['content'] = $this -> usuarios -> perfil($prof['id_us']);
		$this -> load -> view('content', $tela);

		$this -> load -> view('captacao/detalhe', $data);

		/* Arquivos */
		$this -> geds -> tabela = 'captacao_ged_documento';
		$data['title'] = '';
		$tela = '<fieldset class="captacao_folha black border1" width="100%"><legend>' . msg("ic_arquivos") . '</legend>';
		$tela .= $this -> geds -> list_files_table($proto, 'captacao');
		
		if (perfil('#ADM#CPS#SPI') == 1)
			{
				$tela .= $this -> geds -> form_upload($proto, 'captacao');
			}
		$tela .= '</fieldset>';
		$data['content'] = $tela;

		$this -> load -> view('content', $data);

		/* Bonificações */

		$tela = $this -> bonificacoes -> mostra_bonificacoes($proto);
		if (strlen($tela) > 0) {
			$cont = '<fieldset class="captacao_folha black border1"><legend>' . msg('captacao_bonificacoes') . '</legend>';
			$cont .= $tela;
			$cont .= '</fieldset>';
			$data['content'] = $cont;
			$this -> load -> view('content', $data);
		}

		/* Histórico */
		$data['content'] = '<fieldset class="captacao_folha black border1"><legend>' . msg('captacao_historico') . '</legend>' . $this -> captacoes -> mostra_historico($proto) . '</fieldset>';
		$this -> load -> view('content', $data);

		/* ACOES */
		$id_us = $_SESSION['id_us'];

		/* Validação do coordenador */
		if ($data['ca_status'] == 10) {
			if ($this -> stricto_sensus -> is_coordenador($id_us, $data['ca_programa'])) {
				$this -> load -> view('captacao/form_coordenador', $data);
			}
		}
		if (perfil($data['cs_perfil'] . '#ADM') == 1) {
			/* Validacao da secretaria */
			if ($data['ca_status'] == 80) {
				$this -> load -> view('captacao/form_secretaria_validacao', $data);
			}
			if ($data['ca_status'] == 0) {
				$this -> load -> view('captacao/form_secretaria_validacao', $data);
			}			
			/* Gerar bonificaçoes e isenções pela secretaria */
			if ($data['ca_status'] == 81) {
				$data['isencao'] = 0;
				if (($this -> isencoes -> tem_isencao($proto) == 0) and ($data['ca_isencao'] == 1)) {
					$data['isencao'] = 1;
					$this -> load -> view('captacao/form_isencao_gerar', $data);
				} else {
					$this -> load -> view('captacao/form_secretaria_liberacao', $data);
				}
			}

			/* Validação da diretoria de pesquisa */
			if ($data['ca_status'] == 11) {
				$this -> load -> view('captacao/form_diretoria', $data);
			}
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', null);
	}

	function grants_olds($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('captacoes');

		$id = $_SESSION['id_us'];
		$us = $this -> usuarios -> le($id);
		$cracha = $us['us_cracha'];

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data = array();
		$data['title'] = 'Captacação de Recursos';
		$data['content'] = $this -> captacoes -> lista($cracha);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>