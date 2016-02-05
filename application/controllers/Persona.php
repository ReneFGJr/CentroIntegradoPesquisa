<?php
class persona extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
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

		//$this -> lang -> load("app", "english");
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
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');

		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('Perfil Pessoal');
		$data['menu'] = 0;
		//$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function index($id = 0) {

		$id = $_SESSION['us_id'];
		$this -> view($id);
	}

	function view($id = 0) {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('programas_pos');
		$this -> load -> model('producoes');
		$this -> load -> model('ics');

		/* Carrega classes adicionais */
		$this -> cab();
		$data = array();

		if ($id == 0) {
			redirect(base_url('index.php/main'));
			exit ;
		}


		//* Dados */
		$data = $this -> usuarios -> le($id);
		
		/* Monta telas */
		$this -> load -> view('header/content_open.php');
		$this -> load -> view('header/cab', $data);
		$tipo = $data['usuario_tipo_ust_id'];
		$abas = array();
		
		switch ($tipo) {
			/* Docente */
			case '2' :
				$data['logo'] = base_url('img/logo/logo_docentes.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/docente', $data);
				$cpf = strzero(sonumero($data['us_cpf']), 11);
				$data['content'] = $this -> usuarios -> mostra_carga_horaria($cpf);
				$this -> load -> view('content', $data);
				$area_avaliacao = $data['us_area_conhecimento'];

				/* Area de avaliacao */
				$area = 41;

				/* SS */
				$pos = $this -> programas_pos -> professor_ss_area($id);
				$areas = array();
				$sa = '<table width="100%">';
				$sa .= '<tr>';
				for ($r = 0; $r < count($pos); $r++) {
					$area = $pos[$r]['pp_area'];
					/* Producao */
					$sa .= '<td align="center">'.$this -> producoes -> producao_perfil_grafico($cpf, $area).'</td>';
					$this -> load -> view('content', $data);
					array_push($areas,$area);
				}
				$sa .= '</tr>';
				$sa .= '</table>';

				$abas[1]['title'] = 'Produção Científica';
				$abas[1]['content'] = $sa . $this -> producoes -> producao_perfil($cpf, $area_avaliacao);				

				break;
			/* Colaborador */
			case '4' :
				$data['logo'] = base_url('img/logo/logo_colaborador.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/colaborador', $data);
				break;
			/* Discente */
			case '3' :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				$cpf = strzero(sonumero($data['us_cpf']), 11);
				$abas[3]['title'] = 'Iniciação Científica';
				$abas[3]['content'] = $this -> usuarios -> mostra_formacao($cpf);

				/* Iniciacao cientifica */
				$data['content'] = $this -> usuarios -> mostra_ic($cpf);
				$this -> load -> view('content', $data);

				break;
			default :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		
		$abas[0]['title'] = 'Resumo';
		$abas[0]['content'] = $this -> load -> view('perfil/perfil_captacao', $data, True);;  
		
		$abas[2]['title'] = 'Orientações';
		$abas[2]['content'] = $this -> load -> view('perfil/perfil_orientacoes', $data, true);
		
		$data['abas'] = $abas;
		$this->load->view('content_foldes',$data);

		$this -> load -> view('header/content_close.php');
		$this -> load -> view('header/foot');
	}

}
?>