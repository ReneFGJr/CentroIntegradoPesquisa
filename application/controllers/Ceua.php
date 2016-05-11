<?php
class ceua extends CI_Controller {
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
		array_push($menus, array('home', 'index.php/ceua/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Comitê de Ética no Uso de Animais';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function index($id = 0) {
		/* Load Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		/* Formulario */
		$data['search'] = $this -> load -> view('form/form_busca.php', $data, True);

		/* */
		$ano = date("Y");
		if (date("m") < 7) { $ano = $ano - 1;
		}
		$tit = 'Entrega do Relatório Parcial';
		$fld = 'ic_rp_data';

		$data['resumo'] = '';

		$data['resumo'] .= $this -> ics -> resumo();

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
		$this -> load -> view('ic/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function pauta()
		{
			$this->load->model('ceps');
			
			$this->cab();		
			
			$form = new form;
			$cp = array();
			array_push($cp,array('$H8','','',False,True));
			array_push($cp,array('$D8','','Data da Reunião',True,True));
			$tela = $form->editar($cp,'');
			$data['content'] = $tela;
			$this->load->view('content',$data);
			
			if ($form->saved > 0)
				{
					$data = brtos(get("dd1"));
					redirect(base_url('index.php/cep/pauta_montar/'.$data));
				}
		}
		
	function pauta_montar($dt=0)
		{
			$this->load->model('ceps');
			$acao = get("acao");
			$dd1 = get("dd1");
			$dd10 = get("dd10");
			if ((strlen($dd1) > 0) and ($dd10 == 'DEL'))
				{
					$this->ceps->indicar_para_reuniao($dd1,'0000-00-00');
				}			
			if ((strlen($acao) > 0) and (strlen($dd1) > 0))
				{
					$this->ceps->indicar_para_reuniao($dd1,$dt);
				}
			$this->cab();
			$data = array();
			$tela = '';
			
			$data['para_indicar'] = $this->ceps->protocolos_para_indicacao();
			$data['pauta'] = $this->ceps->mostra_pauta($dt);
			/* Mostra protocolos disponíveis para indicação */
			$tela .= $this->load->view('cep/pauta',$data,true);
			
			$data['title'] = 'Pauta do dia '.stodbr($dt);
			$data['content'] = $tela;
			$this->load->view('content',$data);
		}
	
	function inport() {

		/* Load Models */
		$this -> load -> model('ceps');

		$this -> cab();
		$data = array();
		
		$st = '<form method="post">';
		$st .= '<textarea name="dd1" cols=80 rows=20>'.get("dd1")."</textarea>";
		$st .= '<br><input type="submit" name="acao" value="importar">';
		$st .= '</form>';
		$data['content'] = $st;		
		$this->load->view('content',$data);
		$dd1 = get("dd1");
		if (strlen($dd1) > 0)
			{
				$sx = $this->ceps->inport($dd1);
				$data['content'] = $sx;
				$data['title'] = 'Result';				
				$this->load->view('content',$data);
			}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

	/************************************************************************************
	 * **********************************************************************************
	 * ************************************************************** COMUNICACAO ******/
	function comunicacao() {
		$this -> cab();
		$data = array();

		$menu = array();
		array_push($menu, array('Mensagens', 'Mensagens padrão do sistema', 'ITE', '/cip/comunicacao_1'));
		array_push($menu, array('Mensagens', 'Mensagens de comunicação', 'ITE', '/cip/comunicacao_2'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Mensagens';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

}
?>
