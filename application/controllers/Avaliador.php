<?php
class avaliador extends CI_Controller {
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

	function areas_limpar($id = 0) {
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> avaliador_area_impar($id);

		redirect(base_url('index.php/avaliador/view/' . $id . '/' . checkpost_link($id)));
	}

	function ajax_add($id = 0, $area = '') {
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> avaliador_add_area($id, $area);

		echo ' <meta http-equiv="refresh" content="0">';
	}

	function ajax_change($id = 0, $idr = 0, $acao = '') {
		$data = date('Ymd');
		/************* AJAX ATIVAR / DESATIVAR */
		$sql = "select * from us_avaliador_area where id_pa = " . $idr;
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$ativo = $line['pa_ativo'];
		} else {
			echo 'ERRO';
			return ('');
		}

		switch ($ativo) {
			case '1' :
				$acao = msg('inativo');
				$class = 'bt_desativado';
				$sql = "update us_avaliador_area set  pa_ativo = 0, pa_update = '$data' where id_pa = " . round($idr);
				$this -> db -> query($sql);
				break;
			default :
				$acao = msg('ativo');
				$class = 'bt_acao';
				$sql = "update us_avaliador_area set  pa_ativo = 1, pa_update = '$data' where id_pa = " . round($idr);
				$this -> db -> query($sql);
				break;
		}

		echo '<div class="' . $class . '"><b>' . $acao . '</b></div>';
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
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_avaliadores');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_avaliador.jpg');
		$this -> load -> view('header/logo', $data);
	}

	function cab_avaliador() {
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
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_avaliadores');
		$data['menu'] = 0;
		//$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
	}

	function index() {
		$this -> cab_avaliador();
		$data = array();

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot_modelo_2', $data);
	}

	function ficha($id) {
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('ic_pareceres');

		$proto = '0010050';
		$dados = $this -> ics -> le_protocolo($proto);

		/* arquivos */
		$data = array();
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($proto, 'ic');
		
		$data['plano'] = $this -> load -> view('ic/plano', $dados, true);

		$tipo = 'RPAR';
		$this -> cab_avaliador();

		switch ($tipo) {
			case 'RPAR' :
				$this -> load -> view('ic/avaliacao_rpar', $data);
				break;
		}
	}

	function avaliador_status_alterar($id = 0, $st = '') {
		$this -> load -> model('usuarios');
		$this -> load -> model('avaliadores');
		switch($st) {
			case 'ACTIVE' :
				$this -> avaliadores -> avaliador_ativar($id);
				break;
			case 'DESACTIVE' :
				$this -> avaliadores -> avaliador_desativar($id);
				break;
		}
		$data = $this -> usuarios -> le($id);
		$data['us_avaliador'] = '';
		$this -> load -> view('avaliador/perfil_ativo', $data);
		echo ' <meta http-equiv="refresh" content="0">';
	}

	function view($id = 0) {
		$this -> load -> model('usuarios');
		$this -> load -> model('ics');
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('ic_pareceres');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);
		$this -> usuarios -> mostra_prefil($data);

		$data['areas'] = $this -> avaliadores -> avaliador_area($id);
		$data['areas_inclusao'] = $this -> load -> view('avaliador/form_area_associar', $data, True);
		$data['resumo_avaliacao'] = $this -> ic_pareceres -> avaliacoes_avaliador($id);

		$this -> load -> view('avaliador/perfil_resumo', $data);
		$this -> load -> view('avaliador/perfil_ativo', $data);
		$this -> load -> view('avaliador/perfil_ativo_js', $data);

		if ($data['us_avaliador'] > 0) {
			$this -> load -> view('avaliador/perfil_areas', $data);
		}

		$data['content'] = $this->ic_pareceres->lista_de_avaliacoes($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>