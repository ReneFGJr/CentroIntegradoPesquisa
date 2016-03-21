<?php
class pibic extends CI_Controller {

	// Proprietário do e-mail
	var $id_own_pibic = 2;

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('geds');

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($data['ic_plano_aluno_codigo'], 'ic');
		//$data['ged_arquivos'] = $this -> geds -> form_upload($data['ic_plano_aluno_codigo'], 'ic');
		$data['ged_arquivos'] = '';
		$this -> load -> view('ged/list_files', $data);

		$this -> load -> view('ic/plano_historico', $data);
		$this -> load -> view('ic/plano_avaliacao', $data);

		/* */
		$protocolo = $data['ic_plano_aluno_codigo'];
		$rs = $this -> ics -> le_resumo($protocolo);

		if (count($rs) > 0) {
			$data['line'] = $rs;
			$data['resumo'] = '1';
		}

		$this -> load -> view('ic/plano_resumo', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pibic_protocolo_ver($id = '', $chk = '') {
		$cracha = $_SESSION['cracha'];

		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];

		$chk2 = checkpost_link($id);

		if ($chk != $chk2) {
			redirect(base_url('index.php/main'));
		}

		/* Le dados */
		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);

		/* Dados */
		$dados = $this -> protocolos_ic -> le($id);
		$proto_ic = $dados['pr_protocolo_original'];

		$data['search'] = $this -> load -> view('ic/protocolo', $dados, true);
		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function protocolo($tp = '', $id = '') {
		$this -> load -> model('protocolos_ic');
		$cracha = $_SESSION['cracha'];
		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> acoes_abertas();
		$data['resumo'] .= $this -> protocolos_ic -> resumo_protocolos($cracha);

		$data['search'] = $this -> protocolos_ic -> protocolos_abertos_pesquisador($cracha);

		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function proto_abrir($tp = '', $id = '', $chk = '') {
		$cracha = $_SESSION['cracha'];

		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		/* Recupera dados */
		$chk = $this -> input -> get("dd3");
		$dd2 = $this -> input -> get("dd2");
		$dd4 = $this -> input -> get("dd4");
		$chk2 = checkpost_link($dd2 . $dd4);

		if (($chk == $chk2) and (strlen($dd2) > 0)) {
			$url = base_url('index.php/pibic/proto_abrir_tipo/' . $dd4 . '/' . $dd2 . '/' . checkpost_link($dd4 . $dd2));
			redirect($url);
			exit ;
		}

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);
		$tela = '<h1>' . msg('protocolo_ic_' . $tp) . '</h1>';
		$tela .= '<p>' . msg('protocolo_ic_' . $tp . '_info') . '</p>';
		$bt = msg('protocolo_botao_' . $tp);

		$data['search'] = $tela . $this -> protocolos_ic -> orientacoes_protocolo($tp, $bt);
		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function substituir_aluno($id, $chk = '') {
		/* Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> load -> model('protocolos_ic');

		$cracha = $_SESSION['cracha'];

		$data = $this -> ics -> le_protocolo($id);
		$plano = $this -> load -> view('ic/plano', $data, true);

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);
		$data['search'] = $plano;
		$data['search'] .= $this -> protocolos_ic -> abrir('SBS', $id);

		$this -> load -> view('ic/home', $data);
	}

	function proto_abrir_tipo($tp = '', $id = '', $chk = '') {
		/* Models */
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$cracha = $_SESSION['cracha'];

		/* Substituição de aluno, caminho alternativo */
		if ($tp == 'SBS') {
			$url = base_url('index.php/pibic/substituir_aluno/' . $id . '/' . checkpost_link($id));
			redirect($url);
		}

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> resumo_protocolos($cracha);

		/* Valida */
		if ($this -> protocolos_ic -> verifica_se_existe_aberto($tp, $id) == '1') {

			$texto = msg('Already_exists_protocol');
			$data['search'] = '<center><h3><font color="red">' . $texto . '</font></h3></center>';
			$this -> load -> view('ic/home', $data);
		} else {
			$chk2 = checkpost_link($tp . $id);

			if ($chk != $chk2) {
				redirect(base_url('index.php/pibic'));
			}

			$data2 = array();
			$data2 = $this -> ics -> le_protocolo($id);
			$data = array_merge($data, $data2);
			$plano = $this -> load -> view('ic/plano', $data, true);

			$data['search'] = $plano . $this -> protocolos_ic -> abrir($tp, $id);
			$this -> load -> view('ic/home', $data);
		}
		$this -> load -> view('header/content_close');
	}

	public function index($id = 0) {
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');

		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();
		$data['resumo'] = $this -> protocolos_ic -> acoes_abertas();
		$data['resumo'] .= $this -> protocolos_ic -> resumo_protocolos($cracha);
		$data['resumo'] .= '<br>' . $this -> ics -> resumo_orientacoes($cracha);

		$data['search'] = $this -> ics_acompanhamento -> entregas_abertas();
		$data['search'] .= $this -> ics -> orientacoes();

		$this -> load -> view('ic/home', $data);
		$this -> load -> view('header/content_close');
	}

	function form($form = '', $proto = '', $chk = '') {
		$this -> load -> model('ics');
		$this -> load -> model('ic_pareceres');
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics_acompanhamento');
		$this -> load -> model('mensagens');

		$this -> cab();

		$chk2 = checkpost_link($form . $proto);
		if ($chk2 != $chk) {
			echo 'ERRO DE CHECKPOST';
			exit ;
		}

		/* FORM */
		SWITCH($form) {
			case 'form_pre' :

				/* valida entrada no ic_acompanhamento */
				$rlt = $this -> ics_acompanhamento -> form_acompanhamento_exist($proto, 'PRO');
				$id = $rlt['id_pa'];

				$data = $this -> ics -> le_protocolo($proto);
				$this -> load -> view('ic/plano', $data);

				/* Formulário já finalizado */
				if ($rlt['pa_status'] != '@') {
					$rest = 'Este formulário já foi enviado';
					$data['content'] = $rest;
					$this -> load -> view('errors/erro_msg', $data);

					$this -> load -> view('header/content_close');
					$this -> load -> view('header/foot', $data);
					return ('');
				}

				$rest = $this -> ics -> cp_form_professor($id);

				/* salvo com sucesso */
				if ($rest == 'SAVED') {
					$date = date("Y-m-d");
					$sql = "update ic set 
							ic_pre_data = '$date'
						where ic_plano_aluno_codigo = '$proto'
						";
					$rlt = $this -> db -> query($sql);
					$data['volta'] = base_url('index.php/pibic/entrega/IC_FORM_PROF');
					$rest = $this -> load -> view('ic/tarefa_finalizada', $data, True);
				}

				$data['content'] = $rest;
				$this -> load -> view('content', $data);
				Break;

			case 'form_ic_rp' :
				$this -> load -> model('area_conhecimentos');
				$this -> load -> model('ics');
				$this -> load -> model('ics_acompanhamento');
				$this -> load -> model('idiomas');
				$this -> load -> model('geds');

				/* valida entrada no ic_acompanhamento */
				$entregue = $this -> ics_acompanhamento -> form_entregue($proto, 'ic_rp_data');

				$data = $this -> ics -> le_protocolo($proto);
				$professor = $data['prof_id'];
				$aluno = $data['aluno_id'];

				$this -> load -> view('ic/plano', $data);

				/* envio de dados */
				$acao = get("acao");
				$act = get("dd2");
				$vlr = get("dd3");
				if (strlen($acao) > 0) {
					switch ($act) {
						case 'AREA' :
							$this -> ics -> set_area_semic($proto, $vlr);
							redirect(base_url("index.php/pibic/form/$form/$proto/$chk"));
							break;
						case 'IDIOMA' :
							$this -> ics -> set_idioma_semic($proto, $vlr);
							redirect(base_url("index.php/pibic/form/$form/$proto/$chk"));
							break;
						case 'FINISH' :
							$date = date("Y-m-d");
							$sql = "update ic set 
										ic_rp_data = '$date',
										ic_nota_rp = '0'
										where ic_plano_aluno_codigo = '$proto' ";
							//echo $sql;
							$rlt = $this -> db -> query($sql);

							/* TRAVA ARQUIVOS */
							$sql = "update ic_ged_documento set doc_status = 'A' where doc_dd0 =  '$proto' and doc_status = '@' ";
							$rlt = $this -> db -> query($sql);

							$mss = 'IC_RPAR_POSTED';
							$ms = array();
							$usid = $data['prof_id'];
							$ms['nome'] = $data['pf_nome'];
							$ms['ic_plano'] = $this -> load -> view('ic/plano-email.php', $data, true);

							$mss = $this -> mensagens -> busca($mss, $ms);

							$id_own_pibic = $this -> id_own_pibic;
							enviaremail_usuario($professor, $mss['nw_titulo'] . ' - [' . $proto . '] - ' . trim($data['pf_nome']), $mss['nw_texto'], $id_own_pibic);

							//enviaremail_usuario($aluno,$mss['nw_titulo'].' - ['.$proto.'] - '.trim($data['pf_nome']),$mss['nw_texto'],$id_own_pibic);

							$data['volta'] = base_url('index.php/pibic/entrega/IC_FORM_RP');
							$rest = $this -> load -> view('ic/tarefa_finalizada', $data, True);
							$data['content'] = $rest;
							$this -> load -> view('content', $data);
							return ('');
							break;
					}

				}

				/* Formulário já finalizado */
				if ($entregue == 1) {
					$rest = 'Este formulário já foi enviado';
					$data['content'] = $rest;
					$this -> load -> view('errors/erro_msg', $data);

					$this -> load -> view('header/content_close');
					$this -> load -> view('header/foot', $data);
					return ('');
				}

				/*  Validação da submissão */
				$rest = '';
				$check_1 = $this -> ics -> validar_area($data['ic_semic_area']);
				$check_2 = $this -> ics -> validar_idioma($data['ic_semic_idioma']);
				$check_3 = $this -> ics -> validar_arquivo($proto, 'RELAP');
				if (($check_1 == 1) and ($check_2 == 1) and ($check_3 == 1)) {
					$this -> load -> view('ic/form_finish', $data);
				}

				/* Mostra formulario de area */
				$data['mostra_area'] = $this -> area_conhecimentos -> form_areas('dd3', $data['ic_semic_area']);
				$data['mostra_idioma'] = $this -> idiomas -> form_idioma('dd3', $data['ic_semic_idioma']);

				$this -> geds -> tabela = 'ic_ged_documento';
				$data['mostra_arquivo'] = $this -> geds -> list_files_table($proto, 'ic', 'RELAP');
				$data['mostra_arquivo'] .= $this -> geds -> form_upload($proto, 'pibic/ged/RELAP/' . $proto);
				$data['tot_rp_posted'] = $this -> geds -> total_files;

				$data['chk1'] = $check_1;
				$data['chk2'] = $check_2;
				$data['chk3'] = $check_3;

				$rest = $this -> load -> view("ic/form_rp", $data, True);

				$data['content'] = $rest;
				$this -> load -> view('content', $data);
				Break;
			/************************************************************************************* RELATORIO PARCIAL - CORREÇOES */
			case 'form_ic_rpc' :
				$this -> load -> model('area_conhecimentos');
				$this -> load -> model('ics');
				$this -> load -> model('ics_acompanhamento');
				$this -> load -> model('idiomas');
				$this -> load -> model('geds');

				/* valida entrada no ic_acompanhamento */
				$entregue = $this -> ics_acompanhamento -> form_entregue($proto, 'ic_rpc_data');

				$data = $this -> ics -> le_protocolo($proto);
				$professor = $data['prof_id'];
				$aluno = $data['aluno_id'];

				$this -> load -> view('ic/plano', $data);

				/* envio de dados */
				$acao = get("acao");
				$act = get("dd2");
				$vlr = get("dd3");
				if (strlen($acao) > 0) {
					switch ($act) {
						case 'FINISH' :
							$date = date("Y-m-d");
							$sql = "update ic set 
										ic_rpc_data = '$date',
										ic_nota_rpc = '0'
										where ic_plano_aluno_codigo = '$proto' ";
							$rlt = $this -> db -> query($sql);

							/* TRAVA ARQUIVOS */
							$sql = "update ic_ged_documento set doc_status = 'A' where doc_dd0 =  '$proto' and doc_status = '@' ";
							$rlt = $this -> db -> query($sql);

							$mss = 'IC_RPARC_POSTED';
							$ms = array();
							$usid = $data['prof_id'];
							$ms['nome'] = $data['pf_nome'];
							$ms['ic_plano'] = $this -> load -> view('ic/plano-email.php', $data, true);

							$mss = $this -> mensagens -> busca($mss, $ms);
							if (isset($mss['nw_titulo'])) {
								$id_own_pibic = $this -> id_own_pibic;
								enviaremail_usuario($professor, $mss['nw_titulo'] . ' - [' . $proto . '] - ' . trim($data['pf_nome']), $mss['nw_texto'], $id_own_pibic);
							}

							/*************** Reindicar para avaliador *****************************************/
							$avaliador = $this -> ic_pareceres -> que_foi_avaliador($proto, 'RPAR');

							if ($avaliador > 0) {
								$mss = 'IC_RPARC_INDICACAO';
								$mss = $this -> mensagens -> busca($mss, $ms);
								if (isset($mss['nw_titulo'])) {
									$id_own_pibic = $this -> id_own_pibic;
									$texto = $mss['nw_texto'];
									$texto = troca($texto,'$PROTOCOLO',$proto);
									$texto = troca($text,'$plano_titulo',$data['ic_projeto_professor_titulo']);
									$texto = troca($text,'$LINK','http://cip.pucpr.br/');
									enviaremail_usuario($avaliador, $mss['nw_titulo'] . ' - [' . $proto . '] - ' . trim($data['pf_nome']), $texto, $id_own_pibic);
								}
								/* Indicar avaliacao */
								$this->ic_pareceres->indicar_avaliador($avaliador, 'RPRC', $proto);

							}

							//enviaremail_usuario($aluno,$mss['nw_titulo'].' - ['.$proto.'] - '.trim($data['pf_nome']),$mss['nw_texto'],$id_own_pibic);

							$data['volta'] = base_url('index.php/pibic/entrega/IC_FORM_RPC');
							$rest = $this -> load -> view('ic/tarefa_finalizada', $data, True);
							$data['content'] = $rest;
							$this -> load -> view('content', $data);
							return ('');
							break;
					}
				}

				/* Formulário já finalizado */
				if ($entregue == 1) {
					$rest = 'Este formulário já foi enviado';
					$data['content'] = $rest;
					$this -> load -> view('errors/erro_msg', $data);

					$this -> load -> view('header/content_close');
					$this -> load -> view('header/foot', $data);
					return ('');
				}

				/*  Validação da submissão */
				$rest = '';
				$check_1 = 1;
				$check_2 = 1;
				$check_3 = $this -> ics -> validar_arquivo($proto, 'RELPC');
				if (($check_1 == 1) and ($check_2 == 1) and ($check_3 == 1)) {
					$this -> load -> view('ic/form_finish', $data);
				}

				/* Mostra formulario de area */
				$data['mostra_area'] = '';
				$data['mostra_idioma'] = '';

				$this -> geds -> tabela = 'ic_ged_documento';
				$data['mostra_arquivo'] = $this -> geds -> list_files_table($proto, 'ic', 'RELPC');
				$data['mostra_arquivo'] .= $this -> geds -> form_upload($proto, 'pibic/ged/RELPC/' . $proto);
				$data['tot_rp_posted'] = $this -> geds -> total_files;

				$data['chk1'] = $check_1;
				$data['chk2'] = $check_2;
				$data['chk3'] = $check_3;

				$rest = $this -> load -> view("ic/form_rpc", $data, True);

				$data['content'] = $rest;
				$this -> load -> view('content', $data);
				Break;
		}
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ged($doc_type = '', $proto = '', $tipo = '', $check = '') {
		$data = array();
		$this -> load -> view('header/header', $data);
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> page = base_url('index.php/pibic/ged/' . $doc_type . '/' . $proto . '/null/' . checkpost_link($proto));
		$this -> geds -> protocol = $proto;
		$this -> geds -> user = $_SESSION['id_us'];

		$data['content'] = $this -> geds -> form($proto, $doc_type, $tipo);
		$this -> load -> view('content', $data);
	}

	function entrega($tipo = '') {
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');

		$cracha = $_SESSION['cracha'];
		$proto = get("dd2");

		$this -> cab();
		$data = array();
		switch($tipo) {
			case 'IC_FORM_PROF' :
				$data['content'] = '<h2>Formulário de acompanhamento</h2>';
				$this -> load -> view('content', $data);

				if (strlen($proto) > 0) {
					redirect(base_url('index.php/pibic/form/' . get("dd4") . '/' . $proto . '/' . checkpost_link(get("dd4") . $proto)));
					exit ;
				}
				$tp = 'form_pre';
				$bt = msg('protocolo_botao_' . $tp);
				$data['content'] = $this -> protocolos_ic -> orientacoes_protocolo($tp, $bt);
				if (strlen($data['content']) < 40) {
					$msg['content'] = 'Não existe formulário para envio';
					$msg['volta'] = base_url('index.php/pibic');
					$data['content'] = $this -> load -> view('errors/erro_msg', $msg, true);
				}
				$this -> load -> view('content', $data);
				break;
			case 'IC_FORM_RP' :
				$data['content'] = '<h2>Entrega do Relatório Parcial</h2>';
				$this -> load -> view('content', $data);

				if (strlen($proto) > 0) {
					redirect(base_url('index.php/pibic/form/' . get("dd4") . '/' . $proto . '/' . checkpost_link(get("dd4") . $proto)));
					exit ;
				}
				$tp = 'form_ic_rp';
				$bt = msg('protocolo_botao_' . $tp);
				$data['content'] = $this -> protocolos_ic -> orientacoes_protocolo($tp, $bt);
				if (strlen($data['content']) < 40) {
					$msg['content'] = 'Não existe formulário para envio';
					$msg['volta'] = base_url('index.php/pibic');
					$data['content'] = $this -> load -> view('errors/erro_msg', $msg, true);
				}
				$this -> load -> view('content', $data);
				break;
			case 'IC_FORM_RPC' :
				$data['content'] = '<h2>Entrega da Correção do Relatório Parcial</h2>';
				$this -> load -> view('content', $data);

				if (strlen($proto) > 0) {
					redirect(base_url('index.php/pibic/form/' . get("dd4") . '/' . $proto . '/' . checkpost_link(get("dd4") . $proto)));
					exit ;
				}
				$tp = 'form_ic_rpc';
				$bt = msg('protocolo_botao_' . $tp);
				$data['content'] = $this -> protocolos_ic -> orientacoes_protocolo($tp, $bt);
				if (strlen($data['content']) < 40) {
					$msg['content'] = 'Não existe formulário para envio';
					$msg['volta'] = base_url('index.php/pibic');
					$data['content'] = $this -> load -> view('errors/erro_msg', $msg, true);
				}
				$this -> load -> view('content', $data);
				break;
		}
		$this -> load -> view('header/content_close');
	}

	public function cab() {

		/* Security */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();

		/* FALHA NO LOGIN */
		$cracha = $_SESSION['cracha'];
		if (strlen($cracha) == 0) {
			$us = $_SESSION['id_us'];
			$erro = 999;
			/* sessão finalizada pelo servidor */
			//$this->josso_login_pucpr->historico_insere_erro('',$erro,$us);
			$link = base_url('index.php/login');
			redirect($link);
		}

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/pibic'));
		array_push($menus, array('Protocolos', 'index.php/pibic/protocolo'));

		//array_push($menus, array('Formulários', 'index.php/pibic/formularios/'));

		/*
		 array_push($menus, array('Trabalhos', 'index.php/semic/trabalhos'));
		 array_push($menus, array('Localização Pôster', 'index.php/semic/poster'));
		 array_push($menus, array('Avaliadores', 'index.php/semic/avaliadores'));
		 array_push($menus, array('Suplentes', 'index.php/semic/suplentes'));
		 array_push($menus, array('Credenciamento', 'index.php/credenciamento'));
		 */

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');
	}

	function formularios($id = 0, $gr = '') {
		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Pré-relatório parcial', 'Acompanhamento estudante', 'ITE', '/pibic/view_acomp_alunos'));
		array_push($menu, array('Pré-relatório parcial', 'Acompanhamento orientador', 'ITE', '/pibic/view_acomp_prof'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Formulário';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function view_acomp_alunos($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$data = $this -> ics -> le($id);

		$this -> cab();

		$data['content'] = $this -> ics -> cp_form_estudante();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>