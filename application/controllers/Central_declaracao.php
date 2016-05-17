<?php
class central_declaracao extends CI_Controller {
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
		$this -> load -> helper('tcpdf');
		$this -> load -> library("nuSoap_lib");

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */

	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($css, 'style_central_declaracao');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Central de Declarações e Certificados';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
	}

	function perfil() {
		/* load model */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');
		
		$id = $this -> session -> userdata('cc_user');
		$id = round('0' . $id); 
		if ($id == 0) {
			redirect(base_url('index.php/central_declaracao'));
		}
		$data = $this -> usuarios -> le($id);
		$xdata = date("Y-m-d");
		$xhora = date("H:i:s");
		$id_us = $data['id_us'];
		$us_cracha = $data['us_cracha'];
		/*********************************************************************************************/
		/*********************************************************************************************/
		$this -> load -> view("perfil/user", $data);

		/***************************************************************************************************
		 ******************************* Gera declarações **************************************************
		 ***************************************************************************************************/
		$this->eventos->emitir($data);
		
		/* Mostra certificados */
		$tela = $this->eventos->mostra($id_us);

		$data = array();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function index($id = 0) {
		$this -> load -> model('usuarios');

		/* Load Models */
		$this -> cab();

		/* Dados do Usuario */
		$dd1 = $this -> input -> post("dd1");
		if (strlen($dd1) > 0) {
			if (validaCPF($dd1)) {
				/* Consulta por CPF */
				$line = $this -> usuarios -> readByCPF($dd1);
			} else {
				/* Consulta por Cracha */
				$dd1 = $this -> usuarios -> limpa_cracha($dd1);
				$line = $this -> usuarios -> readByCracha($dd1);
			}
			if (count($line) > 0) {
				$data = array('cc_user' => $line['id_us']);
				$this -> session -> set_userdata($data);
				redirect(base_url('index.php/central_declaracao/perfil/'));
			} else {
				$msg = 'Código ou CPF Inválido';
				/* Consulta dados da base */
				echo 'Consultando ' . $dd1;
				$this -> load -> model('webservice/ws_sga');
				$this -> ws_sga -> findStudentByCracha($dd1);

				redirect(base_url('index.php/central_declaracao/')) . '?dd1=' . $dd1;
				echo $msg;
			}
		}

		/* Mostra tela de login */
		if (strlen($dd1) == 0) {
			$this -> load -> view('central_certificado/central_certificado');
		}
	}

	function criar_modelo($id = 0) {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');

		$this -> cab();
		$data = array();

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> central_declaracao_modelos -> tabela;
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form -> order = ' id_cdm ';
		$form = $this -> central_declaracao_modelos -> row($form);

		$form -> row_edit = base_url('index.php/central_declaracao_modelo/edit');
		$form -> row_view = base_url('index.php/central_declaracao_modelo/modelo_declaracao_view');

		$data['content'] = row($form, $id);
		$data['title'] = msg('Modelos_cadastrados');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');
		$cp = $this -> central_declaracao_modelos -> cp();
		$data = array();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> central_declaracao_modelos -> tabela);
		$data['title'] = msg('Editar Modelo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/#'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function emitir($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');
		
		if ($check = checkpost_link($id))
			{
				$data = $this -> central_declaracao_modelos -> le($id);
				$this -> central_declaracao_modelos -> modelo_declaracao_view($id, $data);
			} else {
				$this->view('header/505',null);
			}

	}
	
	function validador($id = 0, $chk = '') {
		/* Carrega Modelos */
		$this -> load -> model('evento/eventos');
		$chk2 = substr(checkpost_link($id . 'certificado'), 4, 6);

		$this -> cab();

		if ($chk != $chk2) {
			$this -> load -> view('central_certificado/declaracao_link_invalido', null);
		} else {
			$data = $this -> eventos -> valida_certificado($id);
			if (count($data) > 0) {
				$this -> load -> view('central_certificado/declaracao_valida', $data);
			} else {
				$this -> load -> view('central_certificado/declaracao_invalida', $data);
			}
		}
	}	

}
?>