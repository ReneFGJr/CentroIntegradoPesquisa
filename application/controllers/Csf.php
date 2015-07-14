<?php
class csf extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library("nuSoap_lib");

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
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Ciência sem Fronteiras';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_csf.png');
		$this -> load -> view('header/logo', $data);
	}

	function index() {
		/* Models */
		$this -> load -> model('csfs');

		$this -> cab();
		$data = array();

		$this -> load -> view('form/form_busca.php');

		$data['content'] = $this -> csfs -> csf_resumo();

		$this -> load -> view('content', $data);
		$this -> load -> view('csf/menu');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function status($sta, $check) {
		/* Models */
		$this -> load -> model('csfs');

		$this -> cab();
		$data = array();

		$data['content'] = $this -> csfs -> lista_status($sta);

		$this -> load -> view('content', $data);
		$this -> load -> view('csf/menu');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function novo() {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('sga_pucpr');
		$this -> load -> model('csfs');

		$this -> cab();
		$data = array();
		$data['title'] = msg('csf_title_novo');
		$data['tela'] = '';
		$this -> load -> view('form/form', $data);

		/* Busca aluno */
		$dd1 = $this -> input -> post('dd1');
		$aluno = '';
		if (strlen($dd1) > 0) {
			$aluno = $this -> usuarios -> findStudentByCracha($dd1);
		}

		if (strlen($aluno) > 0) {
			/* Parte II do formulario */
			$alunoDados = $this -> usuarios -> readByCracha($aluno);
			$this -> load -> view('usuario/view', $alunoDados);

			/* Montar formulario */
			$cp = $this -> csfs -> cp_novo($aluno);
			$form = new form;
			$data['tela'] = $form -> editar($cp, '');
			$data['title'] = '';

			if ($form -> saved > 0) {
				/* insere registro */
				$edital = $this -> input -> post('dd2');
				$saida = $this -> input -> post('dd3');
				$pais = $this -> input -> post('dd4');
				$this -> csfs -> insere_candidato($aluno, $edital, $saida, $pais);
				redirect(base_url('index.php/csf'));
			}

			$this -> load -> view('form/form', $data);
		} else {
			/* Mostra formulario de consulta do aluno */
			$this -> load -> view('estudante/estudante_busca_cracha');
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ajax_acao($id = 0, $ack = '', $chk = '') {
		$this -> load -> model("csfs");

		$form = new form;
		$form -> id = $id;
		$form -> tabela = $this -> csfs -> tabela;
		switch ($chk) {
			case 'homologar' :
				$cp = $this -> csfs -> cp_homologar();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$dh2 = $this -> input -> post('dd2');
					$comment = 'Pais:[' . $dh1 . '],Previsao:[' . $dh2 . ']';
					$this -> csfs -> inserir_historico($id, 2, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'homologar_no' :
				$cp = $this -> csfs -> cp_homologar_no();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$comment = 'Justificativa:[' . $dh1 . ']';
					$this -> csfs -> inserir_historico($id, 9, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'homologar_capes' :
				$cp = $this -> csfs -> cp_homologar_capes();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$dh2 = $this -> input -> post('dd2');
					$comment = 'Pais:[' . $dh1 . '],Previsao:[' . $dh2 . ']';
					$this -> csfs -> inserir_historico($id, 3, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'homologar_capes_no' :
				$cp = $this -> csfs -> cp_homologar_capes_no();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$comment = 'Justificativa:[' . $dh1 . ']';
					$this -> csfs -> inserir_historico($id, 10, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'troca_universidade' :
				$cp = $this -> csfs -> cp_troca_universidade();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$dh2 = $this -> input -> post('dd2');
					$dh5 = $this -> input -> post('dd5');
					$comment = 'Pais:[' . $dh1 . '],Previsao:[' . $dh2 . '],Parceira:[' . $dh5 . ']';
					$this -> csfs -> inserir_historico($id, 13, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'trocar_parceiro' :
				$cp = $this -> csfs -> cp_trocar_parceira();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$dh2 = $this -> input -> post('dd2');
					$dh5 = $this -> input -> post('dd5');
					$comment = 'Pais:[' . $dh1 . '],Previsao:[' . $dh2 . '],Parceira:[' . $dh5 . ']';
					$this -> csfs -> inserir_historico($id, 13, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'homologar_parceiro' :
				$cp = $this -> csfs -> cp_homologar_parceira();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$dh2 = $this -> input -> post('dd2');
					$dh5 = $this -> input -> post('dd5');
					$comment = 'Pais:[' . $dh1 . '],Previsao:[' . $dh2 . '],Parceira:[' . $dh5 . ']';
					$this -> csfs -> inserir_historico($id, 4, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'cancelar' :
				$cp = $this -> csfs -> cp_cancelar();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$comment = 'Justificativa:[' . $dh1 . ']';
					$this -> csfs -> inserir_historico($id, 10, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;
			case 'desistente' :
				$cp = $this -> csfs -> cp_cancelar();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$comment = 'Justificativa:[' . $dh1 . ']';
					$this -> csfs -> inserir_historico($id, 8, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;

			case 'homologar_viagem' :
				$cp = $this -> csfs -> cp_viagem();
				$url = base_url('index.php/csf/ajax_acao/' . $id . '/' . $ack . '/' . $chk);
				$tela = $form -> editar($cp, $this -> csfs -> tabela);
				$rst = $form -> ajax_submit($cp, $url, $ack);

				if ($rst == '1') {/* saved */
					$dh1 = $this -> input -> post('dd1');
					$comment = 'Justificativa:[' . $dh1 . ']';
					$this -> csfs -> inserir_historico($id, 5, $comment);
					$tela = '<font color="green">' . msg('save successful') . '</font>';
					reload();
				} else {
					$tela .= '' . $rst;
				}
				echo $tela;
				break;

			default :
				echo '-->' . $chk;
		}

	}

	function ajax($id = 0, $ack = '', $chk = '') {
		$this -> load -> model('csfs');
		$data = $this -> csfs -> le($id);

		$sta = $data['csf_status'];
		$data['ack'] = $ack;
		$data['id'] = $id;
		$content = '';

		switch ($sta) {
			case 1 :
				/* Em homologacao */
				$bts = array('cancelar' => 1, 'homologar' => 1, 'homologar_no' => 1);
				$data = array_merge($bts, $data);
				$this -> load -> view('csf/ajax_botao_acao.php', $data);
				break;
			case 2 :
				/* Em homologacao cnpq/capes */
				$bts = array('cancelar' => 1, 'homologar_capes' => 1, 'homologar_capes_no' => 1);
				$data = array_merge($bts, $data);
				$this -> load -> view('csf/ajax_botao_acao.php', $data);
				break;
			case 3 :
				/* Em homologacao parceiro */
				$bts = array('cancelar' => 1, 'homologar_parceiro' => 1);
				$data = array_merge($bts, $data);
				$this -> load -> view('csf/ajax_botao_acao.php', $data);
				break;
			case 4 :
				/* Em viagem */
				$bts = array('cancelar' => 1, 'viagem' => 1, 'desistente' => 1);
				$data = array_merge($bts, $data);
				$this -> load -> view('csf/ajax_botao_acao.php', $data);
				break;
			case 5 :
				/* Em viagem */
				$bts = array('fim_viagem' => 1, 'retorno' => 1, 'troca_pais' => 1, 'troca_universidade' => 1, 'trocar_parceiro' => 1);
				$data = array_merge($bts, $data);
				$this -> load -> view('csf/ajax_botao_acao.php', $data);
				break;
			default :
				$content = 'Not found:' . $sta;
				$data['content'] = $content;
				$this -> load -> view('content', $data);
				break;
		}

	}

	function indicadores() {
		$this -> cab();
		$data = array();

		$this -> load -> view('csf/indicador_genero');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('sga_pucpr');
		$this -> load -> model('csfs');

		$this -> cab();

		$line = $this -> csfs -> le($id);
		$data = $line;

		$aluno = trim($line['us_cracha']);
		$aluno_id = $line['id_us'];

		/* Parte II do formulario */
		$alunoDados = $this -> usuarios -> readByCracha($aluno);
		$this -> load -> view('usuario/view', $alunoDados);

		$data['content'] = '<BR><BR>' . $this -> csfs -> mostra_todas_csf($aluno_id);
		$this -> load -> view('content', $data);

		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . msg('scf_historico') . '</legend>' . $this -> csfs -> mostra_historico($id) . '</fieldset>';
		$this -> load -> view('content', $data);

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'csf_ged';
		$this -> geds -> protodolo = $id;
		$data['content'] = $this -> geds -> list_files($id, False);
		$this -> load -> view('content', $data);

		$data['content'] = $this -> geds -> form_upload($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');

		$this -> load -> view('header/foot', $data);
	}

	function ver_situacao($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('sga_pucpr');
		$this -> load -> model('csfs');

		$this -> cab();

		$line = $this -> csfs -> le($id);
		$data = $line;

		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . 'testando' . '</fieldset>';
		$data = array();
		$this -> load -> view('form/form_busca.php');
		$data['content'] = $this -> csfs -> csf_resumo();

		$this -> load -> view('csf/menu');
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver_edital($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('csfs');

		$this -> cab();

		$line = $this -> csfs -> ler_view_csf($id, 'id_ed');
		$data = $line;

		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . 'testando' . '</fieldset>';
		$this -> load -> view('csf/ver_edital', $data);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver_pais($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('sga_pucpr');
		$this -> load -> model('csfs');

		$this -> cab();

		$line = $this -> csfs -> ler_view_csf($id, 'id');
		$data = $line;

		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . 'testando' . '</fieldset>';
		$this -> load -> view('csf/ver_pais', $data);
		
		
		
		
		//$data['content'] = '<BR><BR>' . $this -> csfs -> mostra_lista_edital_pais($id);
		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . msg('Estudantes') . '</legend>' . $this -> csfs -> mostra_lista_edital_pais($id) . '</fieldset>';
		$this -> load -> view('content', $data);
	
	
	
	
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver_parceiro($id = 0, $chk = '') {
		//* Load Models */
		$this -> load -> model('parceiros');
		$this -> cab();

		$data['content'] = '<BR><BR><fieldset><legend class="lt2 bold">' . 'testando' . '</fieldset>';
		$data = $this -> parceiros -> le($id);
		$this -> load -> view('parceiro/view', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view($id = 0, $chk = '') {
		$this -> cab();
		$data = array();

		/* Model */
		$this -> load -> model('csfs');

		$this -> load -> view('usuario/view', $data);

		$data['content'] = $this -> csfs -> mostra_bolsa($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'csf_ged';
		$this -> geds -> page = base_url('index.php/csf/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'csf_ged';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'csf_ged';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'csf_ged';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_delete($id);
	}

}
