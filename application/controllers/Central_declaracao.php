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

		/* Menu */
		$menus = array();
		array_push($menus, array('CIP', '/cip/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}
	
	function perfil()
		{
			$this->cab();
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
				$data = array('cc_user'=>$line['id_us']);
				$this->session->set_userdata($data);
				redirect(base_url('index.php/central_declaracao/perfil/'));
			} else {
				$msg = 'Código ou CPF Inválido';
			}
		} 

		/* Mostra tela de login */
		if (strlen($dd1) == 0)
			{
				$this -> load -> view('central_certificado/central_certificado');
			}
	}

	/* Avaliador SEMIC */
	function declaracao($id = '', $check = '') {
		$sql = "select * from central_declaracao
					inner join central_declaracao_evento on id_cde = dc_tipo
					inner join (select us_nome as nome_1, id_us as id_us_1 from us_usuario) as user_1 on id_us_1 = dc_us_usuario_id 
					where id_dc = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$view = $rlt[0]['cde_view'];
		$data = $rlt[0];

		/*
		 * DATA
		 */
		/* Dados */
		$data['nome'] = $data['nome_1'];
		$data['nome'] = UpperCase($data['nome']);
		$data['prof'] = 'Prof.';
		$data['titulacao'] = 'Dr.';
		$content = 'Declaramos para os devidos fins que '.$data['prof'].' '.$data['titulacao'].' <b>'.$data['nome'].'</b> atuou como avaliador de trabalhos científicos no XXIII Seminário de Iniciação Científica da PUCPR, durante os dias 6, 7 e 8 de outubro de 2015.';
		$content = utf8_encode($content);		
		$data['content'] = '<font style="line-height: 150%">' . $content;
		$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 8 de outubro de 2015.</td></tr></table>';

		$this -> load -> view($view, $data);
	}

}
?>