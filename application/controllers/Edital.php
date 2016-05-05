<?php
class edital extends CI_Controller {
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

		/* SeguranCa */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
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
		array_push($menus, array('Editais', 'index.php/edital/abertos'));
		array_push($menus, array('Bolsas / Recursos Humanos', 'index.php/edital/abertos#sct1'));
		array_push($menus, array('Auxílio Pesquisa', 'index.php/edital/abertos#sct2'));
		array_push($menus, array('Cooperação Internacional', 'index.php/edital/abertos#sct3'));
		array_push($menus, array('Prêmios', 'index.php/edital/abertos#sct4'));
		array_push($menus, array('Eventos', 'index.php/edital/abertos#sct5'));

		#OBS
		if (perfil('#OBS#ADM') == 1) {
			array_push($menus, array('Administrar', 'index.php/edital/row'));
			array_push($menus, array('Agências', 'index.php/edital/agencia_row'));
		}

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('fomento_editais');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_observatorio.jpg');
		$this -> load -> view('header/logo', $data);
	}

	function index() {
		$this -> cab();
		$data = array();

		$this -> load -> view('form/form_busca.php');

		$this -> load -> view('fomento/ultimas_atualizacoes.php');

		$this -> load -> view('fomento/menu.php');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function row($id = 0) {
		$this -> cab();
		$data = array();
		$this -> load -> model('fomento_editais');

		$form = new form;
		$form -> tabela = $this -> fomento_editais -> tabela;
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form = $this -> fomento_editais -> row($form);

		$form -> row_edit = base_url('index.php/edital/edit/');
		$form -> row_view = base_url('index.php/edital/view/');
		$form -> row = base_url('index.php/edital/row/');

		$tela['content'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = msg('title_fomento_editais');

		$this -> load -> view('content', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function agencia_row($id = 0) {
		$this -> cab();
		$data = array();
		$this -> load -> model('fomento_editais');

		$form = new form;
		$form -> tabela = $this -> fomento_editais -> tabela_agencia;
		$form -> see = false;
		$form -> edit = true;
		$form -> novo = true;
		$form = $this -> fomento_editais -> row_ag($form);

		$form -> row_edit = base_url('index.php/edital/agencia_ed/');
		$form -> row_view = base_url('index.php/edital/agencia_row/');
		$form -> row = base_url('index.php/edital/agencia_row/');

		$tela['content'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = msg('title_fomento_editais');

		$this -> load -> view('content', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function agencia_ed($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('fomento_editais');
		$cp = $this -> fomento_editais -> cp_ag();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> fomento_editais -> tabela_agencia);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/edital/agencia_row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function quem_leu($id = 0) {
		/* Load Models */
		$this -> load -> model('fomento_editais');

		$this -> cab();
		
		$data['content'] = $this->fomento_editais->quem_leu($id);
		$this->load->view('content',$data);


		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '', $acao = '') {
		global $sem_copia;
		$sem_copia = 1;

		$this -> cab();
		$this -> load -> model('usuarios');
		$this -> load -> model('fomento_editais');
		$data = array();

		$edital = $this -> fomento_editais -> le($id);

		if (strlen($acao) > 0) {
			switch($acao) {
				case 'test' :
					$id_us = $_SESSION['id_us'];
					$assunto = $edital['ed_titulo'];
					if (strlen($edital['ed_titulo_email']) > 0) {
						$assunto = $edital['ed_titulo_email'];
					}
					$own = $edital['ed_local'];
					$texto = $this -> fomento_editais -> show_edital($id);
					$data['content'] = $texto;
					$this -> load -> view('content', $data);

					enviaremail_usuario($id_us, $assunto, $texto, $own);
					break;
				case 'send' :
					$uss = $this -> fomento_editais -> recupera_selecao($id);
					$tela = '';
					$link = base_url('index.php/edital/view/' . $id . '/' . $chk . '/');
					$tela .= '<a href="' . $link . '/send_confirm"><span class="botao3d back_red_shadown back_red">Confirmar envio</span></a>';
					$tela .= $this -> fomento_editais -> mostra_usuarios_destino($uss);
					$data['content'] = $tela;
					$this -> load -> view('content', $data);
					break;
				case 'send_confirm' :
					$assunto = $edital['ed_titulo'];
					if (strlen($edital['ed_titulo_email']) > 0) {
						$assunto = $edital['ed_titulo_email'];
					}
					$own = $edital['ed_local'];
					$texto = $this -> fomento_editais -> show_edital($id);
					$uss = $this -> fomento_editais -> recupera_selecao($id);
					
					$this -> fomento_editais -> grava_cobertura($id, count($uss));

					$data['content'] = $texto;
					$this -> load -> view('content', $data);

					for ($r = 0; $r < count($uss); $r++) {
						$idu = $uss[$r];
						$texto_enviado = $texto . '<br><br><img src="' . base_url('index.php/ajax/edital_lido/' . $id . '/' . checkpost_link($id) . '/' . $idu) . '">';
						$data['content'] = 'Enviando... para id:' . $idu . '<br>';
						$this -> load -> view('content', $data);

						enviaremail_usuario($idu, '[PD&I] ' . $assunto, $texto_enviado, $own);
					}
					
					break;
			}

		} else {

			/* Recupera usuario atual */
			$user = $this -> usuarios -> le($_SESSION['id_us']);
			$email = $user['usm_email'];
			if (strpos($email, ';')) { $email = substr($email, 0, strpos($email, ';'));
			}

			$tela = '<table width="100%" border=0>';
			$tela .= '<tr valign="top">';
			$tela .= '<td>';
			$tela .= $this -> fomento_editais -> public_selector($id);

			$tela .= '<td>';
			$tela .= $this -> fomento_editais -> show_edital($id);

			/* BOTOES */

			$link = base_url('index.php/edital/view/' . $id . '/' . $chk . '/');
			$tela .= '<br><br><table align="center">';
			$tela .= '<tr>';
			$tela .= '<td>';
			$tela .= '<a href="' . $link . '/test"><span class="botao3d back_green_shadown back_green">enviar teste para ' . $email . '</span></a>';
			$tela .= '</td>';
			$tela .= '<td>';
			$tela .= '<a href="' . $link . '/send"><span class="botao3d back_red_shadown back_red">Dispar para todos</span></a>';
			$tela .= '</td>';
			$tela .= '</tr>';
			$tela .= '</table>';

			$tela .= '</table>';

			$data['content'] = $tela;
			$data['id'] = $id;

			$this -> load -> view('fomento/resumo', $edital);
			$this -> load -> view('content', $data);
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver($id = 0, $chk = '') {
		$this -> cab();
		$this -> load -> model('fomento_editais');

		$tela = '<table width="100%" border=0>';
		$tela .= '<tr valign="top">';

		$tela .= '<td>';
		$tela .= $this -> fomento_editais -> show_edital($id);

		$tela .= '</table>';

		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function abertos($tipo = 0) {
		$this -> cab();
		$this -> load -> model('fomento_editais');

		$tela = $this -> fomento_editais -> mostra_abertos($tipo);
		$data['content'] = $tela;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('fomentos');
		$cp = $this -> fomentos -> cp();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> fomentos -> tabela);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/edital/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>