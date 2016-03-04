<?php
class CIP extends CI_Controller {
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
		array_push($menus, array('home', 'index.php/cip/'));
		array_push($menus, array(msg('captacao_recursos'), 'index.php/cip/captacao'));
		array_push($menus, array(msg('artigos'), 'index.php/cip/artigos'));

		if (perfil('#CPS#ADM#TST') == 1) {
			array_push($menus, array(msg('isencoes'), 'index.php/cip/isencoes'));
			array_push($menus, array(msg('administrativo'), 'index.php/cip/administrativo'));
		}

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Centro Integrado de Pesquisa';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('cips');
		$this -> load -> model('isencoes');
		$this -> load -> model('captacoes');

		$this -> cab();
		$data = array();

		/* Isencoes */
		//$tela = $this->isencoes->lista_status();
		//$data['content'] = $tela;
		//$this->load->view('content',$data);

		/* Formulario */
		//$data['search'] = $this -> load -> view('form/form_busca.php', $data, True);
		$data['resumo'] = $this -> cips -> resumo();

		/* Resumo de validação Captação */
		$data['resumo'] .= $this -> captacoes -> resumo_acoes();

		$data['search'] = '';

		/* Search */
		$search_term = $this -> input -> post("dd89");
		$search_acao = $this -> input -> post("acao");
		if ((strlen($search_acao) > 0) and (strlen($search_term) > 0)) {
			$search_term = troca($search_term, "'", '´');
			if ((strlen(sonumero($search_term)) > 0) and (strlen(sonumero($search_term)) <= 8)) {
				$mt = 1;
				$data['search'] .= $this -> ics -> search($search_term);
			} else {
				$mt = 2;
				$data['search'] .= $this -> ics -> search_term($search_term);
			}
			$data['search'] .= '<br>Metodo: ' . $mt;
		}

		/* Mostra tela principal */
		$this -> load -> view('cip/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function administrativo() {
		$this -> cab();
		$data = array();
		$menu = array();
		array_push($menu, array('Isenção', 'Substituir Isenção CIP por CAPES', 'ITE', '/cip/insencao_substituir'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function isencoes() {
		$par = get("dd0");
		$this -> load -> model('isencoes');
		$this -> cab();
		$data = array();
		
		$tela = $this->isencoes->resumo();
		$data['title'] = msg('Isencoes');
		$data['content'] = $tela;
		$this->load->view('content',$data);
		
		if (strlen($par) > 0)
			{
				$tela = $this->isencoes->lista_por_grupo_status($par);
				$data['title'] = msg('Isencoes_'.$par);
				$data['content'] = $tela;
				$this->load->view('content',$data);					
			}
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function insencao_substituir() {
		$this -> load -> model('isencoes');
		$this -> load -> model('usuarios');
		$this -> load -> model('captacoes');
		$this -> cab();

		$cp = $this -> isencoes -> cp_isencao_cip_capes();
		$form = new form;
		$tela = $form -> editar($cp, '');

		if ($form -> saved > 0) {
			$reabrir = get("dd2");
			$proto = get("dd1");

			/* validacoes */
			$dd1 = strzero(get("dd1"), 5);
			$ok = $this -> isencoes -> is_insencao_cip($dd1);
			if ($ok == 1) {
				/* Le Isencao */
				$data = $this -> isencoes -> le($dd1);
				$proto_proj = $data['bn_original_protocolo'];
				$line = $this -> captacoes -> le_protocolo($proto_proj);
				$id = $line['ca_protocolo'];

				/* Historico */
				$ope = '19';
				// ISENÇÂO CAPES
				$desc = 'Substituição de bolsa CIP para bolsa CAPES';
				$this -> captacoes -> insere_historico($id, $ope, $desc = '');

				$cracha = $data['bn_professor'];
				$us = $this -> usuarios -> le_cracha($cracha);
				$proto_orig = $data['bn_original_protocolo'];

				/* Habilita nova isencao */
				$mod = 'IPR';
				$this -> isencoes -> habilita_isencao($mod, $us, $proto_orig);
				/* Tranfere isencao */
				$this -> isencoes -> transfere_para_outra_modalidade('ICP', $proto);
				$tela = '<h1><font color="green">' . msg('successful') . '</font></h1>';
			} else {
				$tela .= '<font color="red">Isenção não localizada</font>';
			}

		}

		$data['content'] = $tela;
		$data['title'] = msg('conversao_bolsa_cip_para_capes');
		$this -> load -> view('content', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function captacao_status($id = '') {
		$this -> load -> model('captacoes');
		$this -> cab();
		
		$capta_resumo = $this -> captacoes -> resumo_acoes_perfil($id);
		$data['content'] = $capta_resumo;
		$data['title'] = msg('captacoes');
		$this -> load -> view('content', $data);		
	}

	function captacao($id = '') {
		$this -> load -> model('captacoes');
		$this -> cab();

		$capta_resumo = $this -> captacoes -> resumo_processos();
		$data['content'] = $capta_resumo;
		$data['title'] = msg('captacoes');
		$this -> load -> view('content', $data);

		if (strlen($id) > 0) {
			$tela = $this -> captacoes -> lista_resumo_processos($id);
			$data['content'] = $tela;
			$data['title'] = msg('captacoes');
			$this -> load -> view('content', $data);
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function artigos($id = '') {

		$this -> load -> model('artigos');
		$this -> cab();

		$capta_resumo = $this -> artigos -> resumo_processos($id);
		$data['content'] = $capta_resumo;
		$data['title'] = msg('artigos_bonificacoes');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function artigo($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('cip/bonificacao_artigos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$this -> bonificacao_artigos -> create_view();
		$form -> tabela = $this -> bonificacao_artigos -> tabela_view;
		$form -> see = true;
		$form = $this -> bonificacao_artigos -> row($form);

		$form -> row_edit = base_url('index.php/cip/artigo_edit');
		$form -> row_view = base_url('index.php/cip/artigo_view');
		$form -> row = base_url('index.php/cip/artigo/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_artigo');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function artigo_view($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('cip/bonificacao_artigos');

		$this -> bonificacao_artigos -> create_view();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data = $this -> bonificacao_artigos -> le($id);

		$user_cracha = $data['ar_professor'];
		$user_id = $this -> usuarios -> readByCracha($user_cracha);

		$data['bp'] = $this -> bonificacao_artigos -> bar_menu();
		$data['bp_atual'] = $data['ar_situacao'];

		/* dados do autor */
		$data['data'] = $user_id;

		$bp = array();
		$bp['titulo'] = '1';
		$data['bp'] = $bp;

		$this -> load -> view('cip/artigos', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
