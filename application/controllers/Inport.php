<?php
class inport extends CI_Controller {
	
	var $tipo = array('TESE_', 'DISSE_','ARTIG_', 'CAPIT_', 'ORGAN_', 'EVENC_', 'IC_', 'LIVRO_', 'LVORG_', 'POSDOC_', 'COTESE_', 'PATEN_');
	
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
		set_time_limit(60 * 10);
		/* Security */
		$this -> security();
	}

	function exist_files_to_import() {
		$ft = 0;
		$tipos = $this->tipo;
		for ($y = 0; $y < count($tipos); $y++) {
			for ($r = 0; $r < 1000; $r++) {
				$fl = $tipos[$y] . strzero($r, 4);
				if (file_exists('_document/' . $fl)) { $ft++;
				}
			}
		}
		return ($ft);
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
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
		
		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/inport/'));		

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Módulo de Importação RO8';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
	}

	function lattes($id = '', $off = '') {
		/* Load Models */
		$this -> load -> model('phplattess');

		$this -> cab();
		$data = array();
		$data['content'] = '';
		$this -> load -> view('header/content_open');

		$data = array();
		$data['content'] = $id;

		switch ($id) {
			case 'arquivo' :
				$txt = array('Artigos Completos Publicados em Periódicos', 'Trabalhos Completos Publicados em Eventos', 'Livros Publicados', 'Capítulos de Livros Publicados', 'Organização de Obra Publicada', 'Patentes', 'Orientações Concluídas - Iniciação Científica', 'Orientações Concluídas - Dissertação de Mestrado', 'Orientações Concluídas - Tese de Doutorado', 'Orientações Concluídas - Supervisão de Pós-Doutorado', 'Co-Orientações Concluídas - Dissertação de Mestrado', 'Co-Orientações Concluídas - Tese de Doutorado');
				$sx = '<h1>Tipos de documentos compatíveis</h1>
				<ul>';
				for ($r = 0; $r < count($txt); $r++) {
					$sx .= '<li>' . $txt[$r] . '</li>' . cr();
				}
				$sx .= '</ul>';
				$data['content'] = $sx;
				$this -> load -> view('content', $data);

				$data['content'] = $this -> phplattess -> inport_lattes_acpp($off);
				break;
			case 'processar' :
				/* Artigos do professor */
				$data['content'] .= $this -> phplattess -> inport_lattes_professar($off);
				/* Capítulo de Livro */
				$data['content'] .= $this -> phplattess -> inport_lattes_bibliografia('LIVRO');
				/* Capítulo de Livro */
				$data['content'] .= $this -> phplattess -> inport_lattes_bibliografia('CAPIT');				
				/* Livro Organizado */
				$data['content'] .= $this -> phplattess -> inport_lattes_bibliografia('ORGAN');						
				/* Evento */
				$data['content'] .= $this -> phplattess -> inport_lattes_evento('EVENC');						
				/* Patente */
				$data['content'] .= $this -> phplattess -> inport_lattes_patente('PATEN');
				/* Orientacoes - Dissertacao */
				$data['content'] .= $this -> phplattess -> inport_lattes_orientacoes('DISSE');										
				/* Orientacoes - Dissertacao */
				$data['content'] .= $this -> phplattess -> inport_lattes_orientacoes('TESE');										
				break;
		}
		$this -> load -> view('content', $data);
		// http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=ic_noticia&limit=100

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}


	function issn_ajuste($id = '', $off = '') {
		/* Load Models */
		$this -> load -> model('issns');
		$this -> load -> model('phplattess');

		$this -> cab();
		$data = array();
		$data['content'] = '';
		$this -> load -> view('header/content_open');

		$data = array();
		$data['content'] = $this->issns->issn_ajuste();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function issn($id = '', $off = '') {
		/* Load Models */
		$this -> load -> model('issns');
		$this -> load -> model('phplattess');

		$this -> cab();
		$data = array();
		$data['content'] = '';
		$this -> load -> view('header/content_open');

		$data = array();
		$data['content'] = $id;

		switch ($id) {
			case 'arquivo' :
				$txt = array('Arquivo ISSN to ISSN-L');
				$sx = '<h1>Tipos de documentos compatíveis</h1>
				<ul>';
				for ($r = 0; $r < count($txt); $r++) {
					$sx .= '<li>' . $txt[$r] . '</li>' . cr();
				}
				$sx .= '</ul>';
				$data['content'] = $sx;
				$this -> load -> view('content', $data);

				$data['content'] = $this -> issns -> inport_file($off);
				break;
			case 'processar' :
				/* Artigos do professor */
				//$data['content'] .= $this -> phplattess -> inport_lattes_professar($off);
				/* Capítulo de Livro */
				break;
		}
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ro8($id = '', $off = '', $ano = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ro8s');

		$this -> cab();
		$data = array();
		$data['content'] = '';
		$this -> load -> view('header/content_open');

		switch ($id) {
			case 'semic_ic' :
				$data['content'] = $this -> ro8s -> inport_ic_semic($off);
				break;
			case 'ic' :
				$data['content'] = $this -> ro8s -> inport_ic_noticia($off);
				break;
			case 'instituicao' :
				$data['content'] = $this -> ro8s -> inport_insituicao($off);
				break;
			case 'csf' :
				$data['content'] = $this -> ro8s -> inport_csf($off);
				break;
			case 'pibic' :
				$data['content'] = $this -> ro8s -> inport_pibic($off);
				break;
			case 'estudante' :
				$data['content'] = $this -> ro8s -> inport_estudante($off);
				break;
			case 'professor' :
				$data['content'] = $this -> ro8s -> inport_professor($off);
				break;
			case 'cip-artigos' :
				$data['content'] = $this -> ro8s -> inport_cip_artigos($off);
				break;
			case 'ic_parecer' :
				$data['content'] = $this -> ro8s -> inport_ic_parecer($off, $ano);
				break;
			case 'semic-trabalho' :
				$data['content'] = $this -> ro8s -> inport_semic_trabalho($off, $ano);
				break;
			case 'semic-trabalho-autor' :
				$data['content'] = $this -> ro8s -> inport_semic_trabalho_autor($off, $ano);
				break;
			case 'semic-notas' :
				$data['content'] = $this -> ro8s -> inport_semic_notas($off);
				break;
		}
		$this -> load -> view('content', $data);
		// http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=ic_noticia&limit=100

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function index() {
		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('RO8-PostGress', 'SEMIC IC', 'ITE', '/inport/ro8/semic_ic'));
		array_push($menu, array('RO8-PostGress', 'PIBIC Avaliações', 'ITE', '/inport/ro8/pibic_avaliacoes'));
		array_push($menu, array('RO8-PostGress', 'PIBIC Bolsas', 'ITE', '/inport/ro8/pibic'));
		array_push($menu, array('RO8-PostGress', 'Mensagens do Sistema', 'ITE', '/inport/ro8/ic'));
		array_push($menu, array('RO8-PostGress', 'Instituições', 'ITE', '/inport/ro8/instituicao'));
		array_push($menu, array('RO8-PostGress', 'Estudantes', 'ITE', '/inport/ro8/estudante'));
		array_push($menu, array('RO8-PostGress', 'Professor', 'ITE', '/inport/ro8/professor'));
		array_push($menu, array('RO8-PostGress', 'CsF', 'ITE', '/inport/ro8/csf'));
		array_push($menu, array('RO8-PostGress', 'CIP - Artigos', 'ITE', '/inport/ro8/cip-artigos'));
		array_push($menu, array('RO8-PostGress', 'SEMIC - Notas', 'ITE', '/inport/ro8/semic-notas'));
		array_push($menu, array('RO8-PostGress', 'SEMIC - Resumos', 'ITE', '/inport/ro8/semic-trabalho'));

		array_push($menu, array('CNPq', 'Importar arquivo CNPq', 'ITE', '/inport/lattes/arquivo'));
		

		$fl = $this -> exist_files_to_import();
		array_push($menu, array('CNPq', 'Processar Lattes - ' . ($fl) . ' arquivos', 'ITE', '/inport/lattes/processar'));

		array_push($menu, array('ISSN', 'ISSN-L', 'ITE', '/inport/issn/arquivo'));
		array_push($menu, array('ISSN', 'ISSN (Ajuste)', 'ITE', '/inport/issn_ajuste'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Importação';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>
