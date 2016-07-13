<?php
class avaliador extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> lang -> load("app", "portuguese");
		$this -> lang -> load("ic", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> helper('links_users_helper');
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

	function enviar_convites_externos($chk = '') {
		$this -> cab();

		if ($chk == 'SIM') {
			$this -> load -> model('avaliadores');
			$data['content'] = $this -> avaliadores -> enviar_convite_avaliador(1);
			$this -> load -> view('content', $data);

			$data['voltar'] = base_url('index.php/avaliador/');
			$this -> load -> view('sucesso', $data);
		} else {
			$data = 'Confirma operação';
			$data .= '<br>';
			$data .= '<a href="' . base_url('index.php/avaliador/enviar_convites_externos/SIM') . '" class="link">SIM</a>';
			$data .= ' | ';
			$data .= '<a href="' . base_url('index.php/avaliador/') . '" class="link">NÃO</a>';
			$dados['content'] = $data;
			$dados['title'] = 'Enviar convites para os avaliadores externos';
			$this -> load -> view('content', $dados);
		}
	}

	function convidar_avaliadores_extermos($chk = '') {
		$this -> cab();

		if ($chk == 'SIM') {
			$this -> load -> model('avaliadores');
			$this -> avaliadores -> marcar_para_enviar_convite_externos();
			$data['voltar'] = base_url('index.php/avaliador/');
			$this -> load -> view('sucesso', $data);
		} else {
			$data = 'Confirma operação';
			$data .= '<br>';
			$data .= '<a href="' . base_url('index.php/avaliador/convidar_avaliadores_extermos/SIM') . '" class="link">SIM</a>';
			$data .= ' | ';
			$data .= '<a href="' . base_url('index.php/avaliador/') . '" class="link">NÃO</a>';
			$dados['content'] = $data;
			$dados['title'] = 'Marcar todos os avaliadores externos como "enviar convite"';
			$this -> load -> view('content', $dados);
		}
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
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('ic_pareceres');

		$this -> cab_avaliador();
		$data = array();
		$id_us = $_SESSION['id_us'];

		$tela = $this -> ic_pareceres -> lista_para_avaliacao($id_us);
		$data['content'] = $tela;
		$data['title'] = 'Trabalhos para avaliação';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot_modelo_2', $data);
	}

	function ficha_salva($id = 0, $chk = '') {
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');
		$this -> load -> model('ic_pareceres');

		$this -> cab_avaliador();

		$data = array();

		$dados = $this -> ic_pareceres -> le($id);
		$proto = $dados['pp_protocolo'];
		$tipo = $dados['pp_tipo'];
		$sta = $dados['pp_status'];
		/* Avaliação não disponível */
		$data['volta'] = base_url('index.php/avaliador');

		$this -> load -> view('sucesso', $data);

	}

	function ficha($id = 0, $chk = '') {
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');
		$this -> load -> model('ic_pareceres');
		$this -> load -> model('fcas');

		$this -> cab_avaliador();

		$data = array();

		//$dados = $this -> ic_pareceres -> le($id);
		$dados = $this -> ic_pareceres -> le_projetos_e_planos($id);
		
		$proto = $dados['pp_protocolo'];
		$tipo = $dados['pp_tipo'];
		$sta = $dados['pp_status'];
		$plano = $dados['doc_protocolo'];
		$id_pl = $dados['id_pj'];
		/* Avaliação não disponível */
		if ($sta != 'A') {
			$txt = '<center><h1 color="red">Avaliação não disponível</h1></center>';
			$data['content'] = $txt;
			$this -> load -> view('content', $data);
			return ('');
		}
		

		$dados2 = $this -> ics -> le_protocolo($proto);
		$dados = array_merge($dados, $dados2);

		$acao = get("acao");
		if (strlen($acao) == 0) {
			$data['dd1'] = $dados['pp_p01'];
			$data['dd2'] = $dados['pp_p02'];
			$data['dd3'] = $dados['pp_p03'];
			$data['dd4'] = $dados['pp_p04'];
			$data['dd5'] = $dados['pp_p05'];
			$data['dd6'] = $dados['pp_p06'];
			$data['dd7'] = $dados['pp_p07'];
			$data['dd8'] = $dados['pp_p08'];
			$data['dd9'] = $dados['pp_p09'];
			$data['dd10'] = $dados['pp_p10'];
			$data['dd11'] = $dados['pp_p11'];
			$data['dd12'] = $dados['pp_p12'];

			$data['dd21'] = $dados['pp_abe_01'];
			$data['dd22'] = $dados['pp_abe_02'];
			$data['dd23'] = $dados['pp_abe_03'];
			$data['dd24'] = $dados['pp_abe_04'];
			$data['dd25'] = $dados['pp_abe_05'];
			$data['dd26'] = $dados['pp_abe_06'];
			$data['dd27'] = $dados['pp_abe_07'];
			$data['dd28'] = $dados['pp_abe_08'];
			$data['dd29'] = $dados['pp_abe_09'];
		} else {
			$data['dd1'] = get("dd1");
			$data['dd2'] = get("dd2");
			$data['dd3'] = get("dd3");
			$data['dd4'] = get("dd4");
			$data['dd5'] = get("dd5");
			$data['dd6'] = get("dd6");
			$data['dd7'] = get("dd7");
			$data['dd8'] = get("dd8");
			$data['dd9'] = get("dd9");
			$data['dd10'] = get("dd10");
			$data['dd11'] = get("dd11");
			$data['dd12'] = get("dd12");

			$data['dd21'] = get('dd21');
			$data['dd22'] = get('dd22');
			$data['dd23'] = get('dd23');
			$data['dd24'] = get('dd24');
			$data['dd25'] = get('dd25');
			$data['dd26'] = get('dd26');
			$data['dd27'] = get('dd27');
			$data['dd28'] = get('dd28');
			$data['dd29'] = get('dd29');
			$data['dd30'] = get('dd30');
			$data['dd31'] = get('dd31');

			$sql = "update " . $this -> ic_pareceres -> tabela . " set 
							pp_p01 = " . round(get("dd1")) . ",
							pp_p02 = " . round(get("dd2")) . ",
							pp_p03 = " . round(get("dd3")) . ",
							pp_p04 = " . round(get("dd4")) . ",
							pp_p05 = " . round(get("dd5")) . ",
							pp_p06 = " . round(get("dd6")) . ",
							pp_p07 = " . round(get("dd7")) . ",
							pp_p08 = " . round(get("dd8")) . ",
							pp_p09 = " . round(get("dd9")) . ",
							pp_p10 = " . round(get("dd10")) . ",
							pp_abe_01 = '" . get('dd21') . "',
							pp_abe_02 = '" . get('dd22') . "',
							pp_abe_03 = '" . get('dd23') . "',
							pp_abe_04 = '" . get('dd24') . "',
							pp_abe_05 = '" . get('dd25') . "',
							pp_abe_06 = '" . get('dd26') . "',
							pp_abe_07 = '" . get('dd27') . "',
							pp_abe_08 = '" . get('dd28') . "',
							pp_abe_09 = '" . get('dd29') . "',
							pp_abe_10 = '" . get('dd30') . "',
							pp_abe_11 = '" . get('dd31') . "'
						where id_pp = " . $id;
			$rlt = $this -> db -> query($sql);
		}

		/* SALVAR */
		$ok = 0;
		for ($r = 1; $r <= 10; $r++) {
			if (strlen($data['dd' . $r]) > 0) { $ok++;
			}
		}

		if (strlen($data['dd21']) > 0) { $ok++;
		}
		if (strlen($data['dd22']) > 0) { $ok++;
		}
		if (strlen($data['dd23']) > 0) { $ok++;
		}
		if (strlen($data['dd24']) > 0) { $ok++;
		}
		if (strlen($data['dd25']) > 0) { $ok++;
		}
		if (strlen($data['dd28']) > 0) { $ok++;
		}
		
		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		if (isset($dados['ic_projeto_professor_codigo'])) {
			$proto_mae = $dados['ic_projeto_professor_codigo'];
		} else {
			$proto_mae = $dados['pp_protocolo_mae'];
		}
		$data['ged'] = '';
		if (strlen($proto_mae) > 0) {
			$data['ged'] .= $this -> geds -> list_files_table($proto_mae, 'ic');
		}
		$data['ged'] .= $this -> geds -> list_files_table($proto, 'ic');
		$data['plano'] = $this -> load -> view('ic/plano', $dados, true);
		
		
		/* VALIDACOES */
		switch ($tipo) {
			case 'SUBMI' :
				/* validado pela checa_dados_pareceres */
				break;
			case 'RPAR' :
				if ($ok == 15) {
					$dados = $this -> ic_pareceres -> le($id);
					$dados = array_merge($dados, $dados2);
					$nota = get('dd9');
					$proto = $dados['pp_protocolo'];
					$this -> ic_pareceres -> finaliza_nota_ic($proto, $nota);

					$aluno = $this -> usuarios -> le_cracha($dados['ic_cracha_aluno']);

					/* gera PDF */
					$file_local = $this -> ic_pareceres -> gera_parecer('RPAR', $dados);
					$anexos = array($file_local);

					/* Envia e-mail */
					$txt = $this -> mensagens -> busca('RPAR_RESULT_' . get("dd9"), $dados);

					$ass = $txt['nw_titulo'];
					$texto = $txt['nw_texto'];
					$prof_id = $dados['prof_id'];

					/* troca */
					$texto = troca($texto, '$aluno', $aluno['us_nome']);
					enviaremail_usuario($prof_id, $ass, $texto, 2, $anexos);

					/* Finaliza avaliacao */
					$this -> ic_pareceres -> finaliza_avaliacao($id);

					$data['volta'] = base_url('index.php/avaliador');
					$this -> load -> view('sucesso', $data);
					return ('');
				} else {
					if (strlen($acao) > 0) {
						echo '<script> alert("Existe campos não preenchidos!"); </script>';
					}
				}
				break;
			case 'RPRC' :
				if ($ok == 4) {
					$dados = $this -> ic_pareceres -> le($id);
					$dados = array_merge($dados, $dados2);
					$nota = get('dd9');
					$proto = $dados['pp_protocolo'];
					$this -> ic_pareceres -> finaliza_nota_ic($proto, $nota, 'RPRC');

					$aluno = $this -> usuarios -> le_cracha($dados['ic_cracha_aluno']);

					/* gera PDF */
					$file_local = $this -> ic_pareceres -> gera_parecer('RPRC', $dados);
					$anexos = array($file_local);

					/* Envia e-mail */
					$txt = $this -> mensagens -> busca('RPAR_RESULT_' . get("dd9"), $dados);

					$ass = $txt['nw_titulo'];
					$texto = $txt['nw_texto'];
					$prof_id = $dados['prof_id'];

					/* troca */
					$texto = troca($texto, '$aluno', $aluno['us_nome']);
					enviaremail_usuario($prof_id, $ass, $texto, 2, $anexos);

					/* Finaliza avaliacao */
					$this -> ic_pareceres -> finaliza_avaliacao($id);

					$data['volta'] = base_url('index.php/avaliador');
					$this -> load -> view('sucesso', $data);
					return ('');
				} else {
					if (strlen($acao) > 0) {
						echo '<script> alert("Existe campos não preenchidos!"); </script>';
					}
				}
				break;
			case 'FEIRA' :
				/* AVALIACA FEIRA DE CIENCIAS JOVEM */
				break;

			default :
				echo 'OPS - Ficha não localizada - ' . $tipo;
				exit ;
		}


		switch ($tipo) {
			case 'FEIRA' :
				/* AVALIACA FEIRA DE CIENCIAS JOVEM */
				$dados = $this -> ics -> le_projeto_protocolo($proto);
				$this -> geds -> tabela = 'ic_ged_documento';
				$this -> geds -> file_lock_all($dados['pj_codigo']);

				$dados['ged_arquivos'] = $this -> geds -> list_files($dados['pj_codigo'], 'ic');
				$dados['ged'] = '<br>Arquivos:';

				$dados['equipe'] = $this -> ics -> lista_equipe_projeto($dados['pj_codigo'], false);

				$this -> load -> view('ic/projeto', $dados);
				$prof = $dados['pj_professor'];

				$ref = 'AVAL_INSTRUCOES_FEIRA';
				$texto = $this -> mensagens -> busca($ref, array());
				if (isset($texto['nw_titulo'])) {
					$dados['texto_introducao'] = mst($texto['nw_texto']);
				} else {
					$dados['texto_introducao'] = 'Texto não localizado ' . $ref;
				}

				$this -> load -> view('ic/avaliacao_feira', $dados);

				/* Valida submissao */
				//$ok = $this -> ic_pareceres -> checa_dados_pareceres($proto, $avaliador);
				$dt = array(
						'pp_p01' => get("dd1"),
						'pp_p02' => get("dd2"),
						'pp_p03' => get("dd3"),
						'pp_p04' => get("dd4"),
						'pp_p05' => get("dd5"),
						'pp_p11' => get("dd6"),
						'pp_p12' => get("dd7"),
						'pp_p13' => get("dd8"),
						'pp_p14' => get("dd9"),
						'pp_p15' => get("dd10"),
						'pp_p16' => get("dd11"),
						'pp_abe_01' => get("dd20")
				);
				$ok = 0;
				$avaliador = $_SESSION['id_us'];
				$this->ic_pareceres->salva_parecer_generico($id,$dt);
				
				/* Valida */
				$ok = 1;
				if (strlen(get("dd1")) == 0) { $ok = 0; }
				if (strlen(get("dd2")) == 0) { $ok = 0; }
				if (strlen(get("dd3")) == 0) { $ok = 0; }
				if (strlen(get("dd4")) == 0) { $ok = 0; }
				if (strlen(get("dd5")) == 0) { $ok = 0; }
				if (strlen(get("dd6")) == 0) { $ok = 0; }
				if (strlen(get("dd7")) == 0) { $ok = 0; }
				if (strlen(get("dd20")) == 0) { $ok = 0; }
				
				
				if ($ok == 1) {
					$this -> ic_pareceres -> fecha_avaliacao($proto, $avaliador);
					redirect(base_url('index.php/avaliador/ficha_salva/' . $id . '/' . $check));
					return ('');
				}

				$txt = '<input type="submit" name="acao" value="Finalizar avaliação >>>" class="btn btn-primary">';
				$txt .= '</form>';
				$data['content'] = $txt;
				$this -> load -> view('content', $data);
				break;
			case 'RPAR' :
				$this -> load -> view('ic/avaliacao_rpar', $data);
				break;
			case 'RPRC' :
				
				$this -> load -> view('ic/avaliacao_rprc', $data);
				break;
			case 'SUBMI' :
				/*************************************************************************** SUBMI
				 *********************************************************************************
				 *********************************************************************************/
				
				$proj = $this -> ics -> le_projeto_protocolo($proto);
				$prof = $proj['pj_professor'];

				/* Area estratégica */
				$area_estrategica = $proj['pj_area_estra'];
				$data['area_estrategica'] = $area_estrategica;
				$sql = "select * from area_conhecimento where ac_cnpq = '$area_estrategica' ";
				$ttt = $this -> db -> query($sql);
				$ttt = $ttt -> result_array();
				if (count($ttt) > 0) {
					$data['area_estrategica_nome'] = $ttt[0]['ac_nome_area'];
					$data['ac_texto'] = $ttt[0]['ac_texto'];
				} else {
					$data['area_estrategica_nome'] = '-não aplicado-';
				}
				$area_estrategica_nome = $data['area_estrategica_nome'];

				/* Dados do orientador */
				$prof = $this -> usuarios -> le_cracha($prof);
				$prefil = $this -> load -> view('perfil/docente_ic', $prof, true);

				/* Projeto */
				$data['projeto'] = '';
				$data['projeto'] .= $prefil;
				$data['projeto'] .= '<h1>Projeto de pesquisa do professor</h1>';
				$data['projeto'] .= $this -> load -> view('ic/projeto', $proj, true);
				$this -> geds -> tabela = 'ic_ged_documento';
				$data['projeto'] .= '<br><b>Arquivos do projeto do professor</b><br>' . $this -> geds -> list_files($proto, 'ic');
				
					
				$sx = '';
				$data['projeto'] .= '<br><ul><hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"></ul><br>';
				$data['projeto'] .= '<h1>Avaliações</h1>';
				$sx .= $this -> fcas -> avaliacao_notas_projetos($proto);
				//$sx .= $this -> fcas -> avaliacao_notas_planos($proto, $plano);
				

				$sx .= $this -> fcas -> avaliacao_notas_planos_id($proto, $id_pl);
				
				$data['content'] = $sx;
				$data['projeto'] .= $this -> load -> view('content', $data, true);
				
				$data['projeto'] .= '<ul><br>
    												 <hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;">
						                 </ul>';
				$data['projeto'] .= '<h1><center> >>>> Formulário de avaliações <<<< </center></h1>';
				$data['projeto'] .= '<h3>Avaliação do Projeto do professor</h3>';

				$texto = $this -> mensagens -> busca('AVAL_INSTRUCOES', array());
				$data['texto_introducao'] = mst($texto['nw_texto']);

				$this -> load -> view('ic/avaliacao_submi', $data);
				
				
				$sql = "select * from ic_submissao_plano 
								where doc_protocolo_mae = '$proto'  
								AND (doc_status <> '@' and doc_status <> 'X') ";
				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();
				for ($r = 0; $r < count($rrr); $r++) {
					$plano = $rrr[$r];

					$plano['area_estrategica'] = $area_estrategica;
					$plano['area_estrategica_nome'] = $area_estrategica_nome;
					$plano['nrplano'] = ($r + 1);
					$plano['tipo'] = 'ic';
					$plano['ddx'] = (40 + 10 * $r);
					$plano['arquivos'] = 'Arquivos do plano';
					$plano['bloquear'] = 'SIM';
					$plano['arquivos_submit'] = $this -> geds -> list_files($plano['doc_protocolo'], 'ic');
					
					$plano['projeto'] = $this -> load -> view('ic/plano_submit', $plano, True);

					switch ($plano['doc_edital']) {
						case 'PIBIC' :
							$this -> load -> view('ic/avaliacao_submi_plano', $plano);
							break;
						case 'PIBITI' :
							$this -> load -> view('ic/avaliacao_submi_plano', $plano);
							break;
						case 'PIBICEM' :
							$this -> load -> view('ic/avaliacao_submi_plano_jr', $plano);
							break;
						default :
							echo $plano['doc_edital'];
							break;
					}

					$avaliador = $_SESSION['id_us'];
					$this -> ic_pareceres -> salva_pareceres($plano['doc_protocolo'], $proto, $plano['ddx'], $avaliador, 'SUBMP');
				}
				$avaliador = $_SESSION['id_us'];

				/* Valida submissao */
				$ok = $this -> ic_pareceres -> checa_dados_pareceres($proto, $avaliador);

				if ($ok == 1) {
					$this -> ic_pareceres -> fecha_avaliacao($proto, $avaliador);
					redirect(base_url('index.php/avaliador/ficha_salva/' . $id . '/' . $check));
					return ('');
				}
				
				$txt = '<br>';
				$txt .= '<input type="submit" name="acao" value="Finalizar avaliação >>>" class="btn btn-primary">';
				$txt .= '</form>';
				$data['content'] = $txt;
				$this -> load -> view('content', $data);

				break;
		}
	}

	function zera_convite_avaliador() {
		$this -> load -> model('avaliadores');
		$this -> cab();

		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$O 1:SIM', '', 'Confirma zerar?', False, True));
		array_push($cp, array('$M', '', '<hr>', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', 'Selecionar todos Orientador <b>Doutores</b> com IC?', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', 'Selecionar todos Orientador <b>Mestres</b> com IC?', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', 'Selecionar todos valiadores externos (enviar convite)?', False, True));
		array_push($cp, array('$B8', '', 'Processar >>>', False, True));
		$form = new form;
		$tela = $form -> editar($cp, '');

		if ($form -> saved > 0) {
			/* Fase I */
			$tela = '';
			if (get("dd1") == '1') {
				$tela .= '<h2>Zerando indicação de avaliador ....</h2>';
				$this -> avaliadores -> zera_avaliadores();
			}
			
			if (get("dd3") == '1') {
				$tela .= '<h2>Selecionando prof. Doutores com IC....</h2>';
				$tela .= $this -> avaliadores -> ativa_dr_com_ic_avaliadores() . ' selecionados';
			}
			if (get("dd4") == '1') {
				$tela .= '<h2>Selecionando prof. Doutores com IC....</h2>';
				$tela .= $this -> avaliadores -> ativa_msc_com_ic_avaliadores() . ' selecionados';
			}			
			if (get("dd5") == '1') {
				$tela .= '<h2>Selecionando prof. Doutores Externos....</h2>';
				$tela .= $this -> avaliadores -> ativa_av_externos() . ' selecionados';
			}						

			$data['title'] = 'Base de avaliadores';
			$data['content'] = $tela;
			$this -> load -> view('content', $data);

		} else {
			$data['title'] = 'Base de avaliadores';
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
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

		$data['content'] = $this -> ic_pareceres -> lista_de_avaliacoes($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>