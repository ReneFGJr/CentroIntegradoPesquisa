<?php
class csf extends CI_Controller {
	var $idioma = 'pt';
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> helper('cookie');
		$this -> load -> library('session');
		$this -> load -> helper('url');

		if (isset($_SESSION['idioma'])) {
			$id = $_SESSION['idioma'];
		} else {
			$id = 'pt';
		}

		if (strlen($id) == 0) {
			$id = 'pt';
		}
		$this -> lang -> load("app", "csf_" . $id);
		//$this -> load -> library('form_validation');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function cab() {

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'bootstrap.css');
		//array_push($css, 'style_cab.css');
		array_push($css, 'style_csf.css');
		array_push($css, 'caroussel.css');

		array_push($js, 'jquery.js');
		array_push($js, 'ui/jquery-ui.js');
		array_push($js, 'bootstrap-3.3.5/js/bootstrap.js');
		//array_push($js, 'bootstrap-3.3.5/js/bootstrap-dropdown.js');
		array_push($js, 'bootstrap-3.3.5/js/bootsrap-submenu.js');
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		$this -> load -> view("csf/header", $data);
		$this -> load -> view('pucpr/headerpuc');
		$this -> load -> view('csf/nav');

	}

	function index() {
		$this -> cab();

		$this -> load -> view('csf/site_crousel_part_01');
		$this -> load -> view('csf/site_crousel_part_02');
		$this -> load -> view('csf/site_crousel_part_03');

		$this -> load -> view('csf/footer');
	}

	function en() {
		$some_cookie_array = array('idioma' => 'en');
		//$this -> session -> set_userdata($some_cookie_array);
		$_SESSION['idioma'] = 'en';
		$this -> idioma = 'en';
		redirect(base_url('index.php/csf'));
	}

	function pt() {
		$some_cookie_array = array('idioma' => 'pt');
		//$this -> session -> set_userdata($some_cookie_array);
		$_SESSION['idioma'] = 'pt';
		$this -> idioma = 'pt';
		redirect(base_url('index.php/csf'));
	}

	function what() {
		$this -> cab();
		$this -> load -> view('csf/site_what');
		$this -> load -> view('csf/footer');
	}

	function editais() {
		$this -> cab();
		$this -> load -> view('csf/site_editais');

		/**
		 carrega grafico da situacao dos estudantes intercambistas
		 $data = array();
		 $line = $this -> csfs -> mostra_dados_std_status();
		 $data['dado'] = $line;
		 $this -> load -> view('csf/view_std_status', $data);
		 */

		$this -> load -> view('csf/footer');
	}

	function eventos() {
		$this -> cab();
		$this -> load -> view('csf/site_eventos');

		//		$this -> load -> view('csf/footer');
	}

	function indicadores() {
		$this -> cab();
		/* Models */
		$this -> load -> model('csfs');
		$this -> load -> view('csf/site_indicadores');
		$this -> load -> view('csf/footer');
	}

	function depoimentos() {
		$this -> cab();
		
		if ($this -> idioma == 'en') {
		$this -> load -> view('csf/site_depoimentos_en');
		}else{
		$this -> load -> view('csf/site_depoimentos');
		}	
		$this -> load -> view('csf/footer');
}

	function faq() {
		$this -> cab();
		$this -> load -> view('csf/site_faq');
		$this -> load -> view('csf/footer');
	}

	function contato() {
		$this -> cab();
		$this -> load -> view('csf/site_contato');
		$this -> load -> view('csf/footer');
	}

	/*******************NOVOS INDICADORES******************************/
	//GRAFICO 1 => grafico de parceiros
	function view_std_partners() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico de parceiros
		$data_partners = array();
		$line = $this -> csfs -> mostra_std_partners();
		$data_partners['dado_partners'] = $line;
		$this -> load -> view('csf/view_std_partners', $data_partners);

		//carrega planilha de parceiros
		$data_partners_plan = array();
		$line = $this -> csfs -> plan_std_partners();
		$data_partners_plan['dados_plan'] = $line;
		$this -> load -> view('csf/view_plan_partners', $data_partners_plan);

		$this -> load -> view('csf/footer');
	}

	//GRAFICO 2 => grafico de estudantes por paises
	function view_std_country() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico estudantes por paises
		$data_country = array();
		$line = $this -> csfs -> mostra_dados_std_country();
		$data_country['dado_country'] = $line;
		$this -> load -> view('csf/view_std_country', $data_country);

		//carrega planilha estudantes por paises
		$data_country_plan = array();
		$line = $this -> csfs -> plan_dados_std_country();
		$data_country_plan['dado_country_plan'] = $line;
		$this -> load -> view('csf/view_plan_country', $data_country_plan);

		$this -> load -> view('csf/footer');
	}

	//GRAFICO 3 => grafico dos cursos que mais enviam alunos
	function view_std_course() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico dos cursos que mais enviam alunos
		$data_course = array();
		$line = $this -> csfs -> mostra_std_course();
		$data_course['dado_course'] = $line;
		$this -> load -> view('csf/view_std_course', $data_course);

		//carrega planilha dos cursos que mais enviam alunos
		$data_course_plan = array();
		$line = $this -> csfs -> plan_std_course();
		$data_course_plan['dado_course_plan'] = $line;
		$this -> load -> view('csf/view_plan_course', $data_course_plan);
		$this -> load -> view('csf/footer');
	}

	//GRAFICO 4 => grafico de estudantes por universidade
	function view_std_university() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico de estudantes por universidade
		$data_university = array();
		$line = $this -> csfs -> mostra_dados_std_university();
		$data_university['dado_university'] = $line;
		$this -> load -> view('csf/view_std_university', $data_university);

		//carrega planilha de estudantes por universidade
		$data_university_plan = array();
		$line = $this -> csfs -> plan_dados_std_university();
		$data_university_plan['dado_university_plan'] = $line;
		$this -> load -> view('csf/view_plan_university', $data_university_plan);

		$this -> load -> view('csf/footer');
	}

	//GRAFICO 5 => grafico da situacao dos estudantes intercambistas
	function view_std_status() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico da situacao dos estudantes intercambistas
		$data = array();
		$line = $this -> csfs -> mostra_dados_std_status();
		$data_status['dado_st'] = $line;
		$this -> load -> view('csf/view_std_status', $data_status);

		$this -> load -> view('csf/footer');
	}

	//GRAFICO 6 => grafico dos estudantes por genero
	function view_std_genero() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico estudantes por genero
		$data_gen = array();
		$line = $this -> csfs -> mostra_dados_std_genero();
		$data_genero['dado_gen'] = $line;
		$this -> load -> view('csf/view_std_gen', $data_genero);

		$this -> load -> view('csf/footer');
	}

	//Mapa 01 => estudantes no mundo
	function view_std_map_word() {
		$this -> load -> model('csfs');
		$this -> cab();

		//carrega grafico estudantes por genero
		$data_mapa = array();
		$line = $this -> csfs -> mostra_std_map();
		$data_map['dado_mapaword'] = $line;
		//$this -> load -> view('csf/view_std_map_word');
		$this -> load -> view('csf/view_std_map_word', $data_map);
		$this -> load -> view('csf/footer');
	}

	function total() {

		$data_mapa = array();
		$line = $this -> csfs -> total_std();
		$data_total['total_std'] = $line;

		$this -> load -> view('csf/site_crousel_part_01', $data_total);

	}

}
