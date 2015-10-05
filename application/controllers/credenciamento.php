<?php
class credenciamento extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library("Googlemaps");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('barcode39');
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function barcode($id = '') {
		$bc = new Barcode39($id);
		// set text size
		$bc -> barcode_text_size = 5;
		// set barcode bar thickness (thick bars)
		$bc -> barcode_bar_thick = 4;
		// set barcode bar thickness (thin bars)
		$bc -> barcode_bar_thin = 2;
		// save barcode GIF file
		$bc -> draw();
	}

	function cab($bypass = 0) {
		global $evento;

		$evento = $this -> session -> userdata('evento_id');
		if ((strlen($evento) == 0) and ($bypass == 0)) {
			redirect(base_url('index.php/credenciamento/eventos'));
		}
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_credenciamento.css');
		array_push($css, 'style_cab_evento.css');
		//array_push($js, 'unslider.min.js');
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);

		/* Menu */
		$menus = array();
		array_push($menus, array('Eventos', 'index.php/credenciamento/'));
		array_push($menus, array('Credenciamento', 'index.php/credenciamento/usuario'));
		array_push($menus, array('Entrega de Kits', 'index.php/credenciamento/kits'));
		array_push($menus, array('Imprime Credencial', 'index.php/credenciamento/credencial'));
		array_push($menus, array('Cockpit', 'index.php/credenciamento/cockpit'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab_nav', $data);
	}

	function cockpit()
		{
		$this -> cab();
		
		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('KITS', 'Distribuição dos Kits', 'ITE', '/credenciamento/cockpit_kits'));
		array_push($menu, array('Presença', 'Participação nas apresentações', 'ITE', '/credenciamento/cockpit_presenca'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Cockpit - Credenciamento';
		$this -> load -> view('header/main_menu', $data);			
		}
	function cockpit_presenca()
		{
		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open', $data);
		
		$data['tela'] = '<h1>Presença</h1>';
		$data['tela'] .= $this->credenciamentos->presentes_por_sala();
		$this -> load -> view("credenciamento/content", $data);
			
		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);				
		}
	function cockpit_kits() {
		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open', $data);
		
		$data['tela'] = '<h1>Distribuição dos Kits</h1>';
		$data['tela'] .= $this->credenciamentos->kits_entregues();
		$this -> load -> view("credenciamento/content", $data);
		
		$data['tela'] = '<h3>Distribuição dos Kits / 10 mins</h3>';
		$data['tela'] .= $this->credenciamentos->kits_entregues_grafico(4);
		$this -> load -> view("credenciamento/content", $data);

		$data['tela'] = '<h3>Distribuição dos Kits por hora</h3>';
		$data['tela'] .= $this->credenciamentos->kits_entregues_grafico(2);
		$this -> load -> view("credenciamento/content", $data);
		
		$this -> load -> view('header/content_close', $data);
		$this -> load -> view('header/foot', $data);		
	}

	function kits() {
		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab();

		$data = array();
		$data['tela'] = $this -> credenciamentos -> kits_form();

		/* Dados da Sala */
		$sala = $this -> credenciamentos -> sala(1);
		$this -> load -> view("credenciamento/kits", $sala);
		$this -> load -> view("credenciamento/sala_logo_evento.php", $sala);

		$data = array_merge($data, $sala);

		$this -> load -> view("credenciamento/content", $data);
	}

	function credencial() {
		$this -> load -> model('usuarios');
		$this -> cab();

		$data = array();
		$data['search'] = $this -> load -> view('form/form_busca.php', $data, True);
		$data['resumo'] = 'Busca por Credencial';

		/* Search */
		$search_term = $this -> input -> post("dd89");
		$search_acao = $this -> input -> post("acao");
		$page = 'index.php/credenciamento/voucher/';

		if ((strlen($search_acao) > 0) and (strlen($search_term) > 0)) {
			$search_term = troca($search_term, "'", '´');
			$data['search'] .= $this -> usuarios -> search($search_term, $page, '1');
		}

		/* Mostra tela principal */
		$this -> load -> view('ic/home', $data);

	}

	function usuario() {
		$ok = 0;
		$this -> load -> model('usuarios');
		$this -> cab();

		$nome = $this -> input -> post('dd1');
		$cracha = UpperCaseSql($this -> input -> post('dd2'));
		$cracha_fake = $this -> input -> post('dd12');

		$cpf = $this -> input -> post('dd3');
		$cpf_fake = $this -> input -> post('dd13');

		$email = $this -> input -> post('dd10');
		$msg = '';

		/********************************* LOGICA */
		/* Cracha vazio */
		if ((strlen($cracha) == 0) and ($cracha_fake == '1')) {
			$cracha = $this -> usuarios -> geraCracha();
		}

		/* CPF vazio */
		if ((strlen($cpf) == 0) and ($cpf_fake == '1')) {
			$cpf = gerarCPF();
		}

		/* Valida CPF */
		if (validaCPF($cpf)) {
			$dt = $this -> usuarios -> readByCPF($cpf);
			if (isset($dt['us_cracha'])) {
				$cracha = $dt['us_cracha'];
				$nome = $dt['us_nome'];
			}
		} else {
			$cpf = '';
			$msg = '<font color="red">CPF Inválido</font>';
		}
		/* Valida CPF */

		/* Cracha sem CPF */
		if ((strlen($cracha) > 0) and (strlen($cpf) > 0) and (strlen($nome) > 0)) {
			$cracha = $this -> usuarios -> limpa_cracha($cracha);
			if (strlen($cracha) == 8) {
				$cracha_rt = $this -> usuarios -> readByCracha($cracha);
				if (count($cracha_rt) == 0) {
					/* Cadastrar */
					$DadosUsuario = array();
					$DadosUsuario['nome'] = $nome;
					$DadosUsuario['cpf'] = $cpf;
					$DadosUsuario['sexo'] = '';
					$DadosUsuario['dataNascimento'] = '0000-00-00';
					$DadosUsuario['pessoa'] = $cracha;
					$DadosUsuario['tipo'] = '5';
					$DadosUsuario['dataNascimento'] = '0000-00-00';
					$this -> usuarios -> insere_usuario($DadosUsuario);
					$msg = '<font color="green" class="lt6">' . msg('sucesso') . '</font>';
					$ok = 1;
					$msg = msg('cadastro ok');
				} else {
					$msg = msg('cracha ' . $cracha . ' já cadastrado');
					$ok = 1;
				}
			} else {
				$msg = msg('<font color="red">cracha inválido</font>');
			}
		}

		$data = array();
		/* OK */
		$link = '';
		if ($ok == 1) {
			$ln = $this -> usuarios -> readByCracha($cracha);
			$id = $ln['id_us'];
			$nome = '';
			$cpf = '';
			$msg = '';
			$cracha = '';
			$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/credenciamento/voucher/' . $id . '/' . checkpost_link($id)) . '\',800,500);">';
			$link .= 'IMPRIMIR';
			$link .= '</a>';
		}
		$data['pr'] = $link;
		$data['nome'] = $nome;
		$data['cracha'] = $cracha;
		$data['cpf'] = $cpf;
		$data['email'] = $email;
		$data['msg'] = $msg;

		$this -> load -> view('usuario/credenciamento', $data);

	}

	function voucher($id, $check) {
		$this -> load -> model('usuarios');
		$data = $this -> usuarios -> le($id);
		$this -> load -> view('credenciamento/voucher', $data);
	}

	function index() {
		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab();
		$data = array();
		$data['tela'] = $this -> credenciamentos -> eventos_ativos_lista();
		$this -> load -> view("credenciamento/content", $data);

	}

	function eventos() {
		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab(1);
		$data = array();
		$data['tela'] = $this -> credenciamentos -> eventos_ativos_lista();
		$this -> load -> view("credenciamento/content", $data);
	}

	function evento_sel($id = 0, $chk = '') {
		$this -> load -> model('credenciamento/credenciamentos');
		$this -> credenciamentos -> set_evento($id);
		redirect(base_url('index.php/credenciamento/salas_sel'));
	}
	
	function salas_sel($sala='',$horario='')
		{
		$evento = 1;
		$date = date("Y-m-d");

		/* Model */
		$this -> load -> model('credenciamento/credenciamentos');
		$this -> load -> model('semic/semic_salas');
		
		if ((strlen($sala) > 0) and (strlen($horario) > 0))
			{
				$se = array();
				$se['sala'] = $sala;
				$se['bloco'] = $horario;
				$this->session->set_userdata($se);
				redirect(base_url('index.php/credenciamento/registro'));
				exit;
			}

		$this -> cab(1);
		
		/* Seleção das sala */
		$data = array();
		
		$this -> load -> view('header/content_open', $data);
		
		$data['tela'] = '<h1>Distribuição dos Kits</h1>';
		$data['tela'] = $this->semic_salas->salas_por_dia($evento,$date,$sala,$horario);
		$this -> load -> view("credenciamento/content", $data);
							
		}

	function registro() {
		/* Model */
		$s1 = $this->session->userdata('sala');
		$b1 = $this->session->userdata('bloco');
		
		$this -> load -> model('credenciamento/credenciamentos');

		$this -> cab();

		$this -> load -> view('credenciamento/relogio');
		$data = array();
		$data['tela'] = $this -> credenciamentos -> registro_form();

		/* Dados da Sala */
		$sala = $this -> credenciamentos -> sala($b1);
		$this -> load -> view("credenciamento/sala", $sala);
		$this -> load -> view("credenciamento/sala_presentes", $sala);
		$this -> load -> view("credenciamento/sala_logo_evento.php", $sala);

		$data = array_merge($data, $sala);

		$this -> load -> view("credenciamento/content", $data);
	}

}
?>
