<?php
class ic extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> lang -> load("ic", "portuguese");
		$this -> load -> library("nuSoap_lib");

		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> helper('tcpdf');
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
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/ic/'));

		array_push($menus, array('Professores & Alunos', 'index.php/ic/usuarios'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));
		array_push($menus, array('Acompanhamento', 'index.php/ic/acompanhamento'));
		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		array_push($menus, array('Relatórios', 'index.php/ic/report'));
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
		array_push($menus, array('Contratos', 'index.php/ic_contrato/contratos/'));
		array_push($menus, array('Administrativo', 'index.php/ic/admin/'));

		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Iniciação Científica';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_ic.png');
		$this -> load -> view('header/logo', $data);
	}

	function implementacao_manual() {
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> cab();
		$tela = '';
		$title = '';

		$form = new form;
		if ((strlen(get("dd1")) != 7) or (strlen(get("dd2")) == 0)) {
			$cp = array();
			array_push($cp, array('$H8', '', '', False, True));
			array_push($cp, array('$S8', '', 'Informe o número do protocolo', True, True));
			$sql = "select * from ic_modalidade_bolsa where mb_vigente = 1 order by mb_descricao ";
			array_push($cp, array('$Q id_mb:mb_descricao:' . $sql, '', 'Modalidade de Bolsa', True, True));
			$tela = $form -> editar($cp, '');
		} else {
			/* */
			$tela = '';
			$proto = get("dd1");
			$chk1 = $this -> ics -> ja_implementado($proto);
			$chk2 = $this -> ics -> existe_projeto_enviado($proto);
			$chk3 = 0;
			$chk4 = 0;

			$data = date("Y-m-d");

			$cp = array();
			array_push($cp, array('$H8', '', '', False, True));
			array_push($cp, array('$S8', '', 'Informe o número do protocolo', True, True));
			$sql = "select * from ic_modalidade_bolsa where mb_vigente = 1 order by mb_descricao ";
			array_push($cp, array('$Q id_mb:mb_descricao:' . $sql, '', 'Modalidade de Bolsa', True, True));
			array_push($cp, array('$S8', '', 'Informe o código do aluno', True, True));
			array_push($cp, array('$T80:3', '', '`Informe título do plano', True, True));
			array_push($cp, array('$Q us_cracha:us_nome:select * from us_usuario where usuario_tipo_ust_id=2 and us_ativo = 1 order by us_nome ', '', 'Nome do orientador', True, True));
			array_push($cp, array('$D8', '', 'Início da vigência', True, True));
			array_push($cp, array('$[' . (date("Y") - 2) . '-' . date("Y") . ']', '', 'Ano do edital', True, True));
			$tela = $form -> editar($cp, '');

			if (($chk1 == 0) and ($chk2 == 0)) {
				$estudante = get("dd3");

				if ($form -> saved > 0) {
					$data_ativacao = brtod(get("dd6"));
					$prof = get("dd5");
					$hora = date("H:i:s");
					$proto = get("dd1");
					$ano = get("dd7");
					$titulo = get("dd4");
					$mdo = get("dd2");
					$ida = $this -> usuarios -> le_cracha($estudante);
					if ($ida == 0) {
						$aluno = $this -> usuarios -> consulta_cracha($estudante);
						$ida = $this -> usuarios -> le_cracha($estudante);
					}

					if (count($ida) > 0) {
						$aluno = $ida['id_us'];
						$aluno_cracha = $ida['us_cracha'];

						$chk3 = $this -> ics -> estudante_com_ic_implementado($aluno);

						if ($chk3 == 0) {
							$sql = "insert into ic
								(
									ic_cracha_prof, ic_cracha_aluno, s_id,
									s_id_char, ic_dt_ativacao, 
									ic_data, ic_hora, ic_ano,
									
									ic_projeto_professor_codigo, ic_projeto_professor_titulo, ic_plano_aluno_codigo,
									ic_plano_aluno_nome										
								) values (
									'$prof','$estudante','1',
									'A','$data_ativacao',
									'$data','$hora','$ano',
									
									'$proto','$titulo','$proto'
									,'$titulo'
								)";
							$this -> db -> query($sql);
							$idr = $this -> ics -> recupera_nr_ic($proto);
							if (count($idr) > 0) {
								$idp = $idr['id_ic'];
								$sql = "insert into ic_aluno
										(aluno_id, ic_aluno_cracha, ic_id,
										mb_id, 	icas_id, aic_dt_entrada, 
										aic_dt_inicio_bolsa
										) values (
										$aluno,'$aluno_cracha', $idp,
										$mdo, 1, '$data_ativacao',
										'$data_ativacao'
										)";
								$rlt = $this -> db -> query($sql);
								$this -> load -> view('sucesso');
								return ('');
							}
						}
					} else { $chk4 = 1;
					}
				}
			}

			$tela .= '<table>';
			$tela .= '<tr><td align="right">Já implementado:</td><td><b>' . sn($chk1) . '</b></td></tr>';
			$tela .= '<tr><td align="right">Foi enviado cadastrado plano do aluno:</td><td><b>' . sn($chk2) . '</b></td></tr>';
			$tela .= '<tr><td align="right">Estudante já está na IC:</td><td><b>' . sn($chk3) . '</b></td></tr>';
			$tela .= '<tr><td align="right">Problema no cadastro do aluno:</td><td><b>' . sn($chk4) . '</b></td></tr>';

			$tela .= '</table>';
		}
		$data = array();
		$data['content'] = $tela;
		$data['title'] = 'Implementação manual';
		$this -> load -> view('content', $data);

	}

	function avaliadores_set() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> regra_avaliadores();
		redirect(base_url('index.php/ic'));
	}

	function pagamento_cracha($cracha = '', $chk = '') {
		$this -> load -> model('ics');
		$data['content'] = $this -> ics -> pagamentos_ic($cracha);
		$this -> load -> view('content', $data);
	}

	function comunicacao_edit($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$cp = $this -> comunicacoes -> cp();

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> comunicacoes -> tabela);
		$data['title'] = msg('eq_equipamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/comunicacao'));
		}

		//$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function comunicacao_view($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');

		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		$this -> cab();
		$data = array();

		$data = $this -> comunicacoes -> le($id);

		if (strlen(get("dd1")) == 0) {
			$id_gr = $data['mc_tipo'];
			$_POST['dd1'] = $this -> comunicacoes -> le_email_grupo($id_gr);
		}

		$head = base_url($data['m_header']);
		$foot = base_url($data['m_foot']);

		$msg_body = $data['mc_texto'];
		if ($data['mc_formato'] == 'TEXT') { $msg_body = mst($msg_body);
		}

		$form = new form;
		$cp = array();
		array_push($cp, array('$h', '', '', False, False));
		array_push($cp, array('$T40:50', '', 'emails', True, False));
		array_push($cp, array('$B8', '', 'Enviar >>>', False, False));
		$tela = $form -> editar($cp, '');
		$data['title'] = msg('visualizar_mensagem');
		$data['tela'] = $tela;

		if ($form -> saved > 0) {
			$em = get('dd1');
			$em = troca($em, chr(13), ';');
			$em = troca($em, chr(10), '');
			$em = troca($em, chr(8), '');
			$em = troca($em, chr(15), '');
			$ems = splitx(';', $em . ';');

			for ($r = 0; $r < count($ems); $r++) {
				$para = array($ems[$r]);
				$de = $data['mc_own'];
				$assunto = $data['mc_titulo'];

				/* texto */
				$texto_o = $data['mc_texto'];
				if (trim($data['mc_formato']) == 'TEXT') { $texto_o = mst($texto_o);
				}
				$texto = '<table width="700">';
				if (strlen($head) > 0) {
					$texto .= '<tr><td><img src="' . $head . '" width="700"></td></tr>';
					$texto .= '<tr><td><br></td></tr>';
				}
				$texto .= '<tr><td>';
				$texto .= $texto_o . '<br><br></td></tr>';

				if (strlen($foot) > 0) {
					$texto .= '<tr><td><img src="' . $foot . '" width="700"></td></tr>';
				}
				$texto .= '</table>';

				/* enviar e-mail */
				enviaremail($para, $assunto, $texto, $de);
			}
			enviaremail(array('cleybe.vieira@pucpr.br'), $assunto, $texto, $de);
			enviaremail(array('rene.gabriel@pucpr.br'), $assunto, $texto, $de);
		}

		$data['content'] = '<table width="100%">
							
							<tr valign="top">
								<td>
								<table width="700" align="center" class="border1">
								<tr><td><img src="' . $head . '" width="700"></td></tr>
								<tr><td><br>' . $msg_body . '</td></tr>
								<tr><td><br><br><br></td></tr>
								<tr><td><img src="' . $foot . '" width="700"></td></tr>									
								</table>
								</td>
								<td>' . $tela . '</td>
							</tr>
							
							</table>';

		$data['title'] = msg('visualizar_mensagem');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/*************************************************************************************************
	 *************************************************************************** SUBMISSAO MASTER ****
	 *************************************************************************************************/
	function submit_new() {
		$this -> load -> model('ics_master');
		$cracha = $_SESSION['cracha'];
		$this -> ics_master -> projeto_novo($cracha);
	}

	function submit_finished() {
		$this -> load -> model('ics');
		$this -> load -> model('ics_master');
		$this -> load -> model('geds');

		$this -> cab();
		$data = array();

		$data['content'] = '<center><h1><font color="green"><b>Submissão concluída com Sucesso!</b></font></h1></center>';
		$this -> load -> view('content', $data);
	}

	function submit_view() {
		$this -> load -> model('ics');
		$this -> load -> model('ics_master');
		$this -> load -> model('geds');

		$this -> cab();
		$data = array();

		$data['content'] = '<center><h1><font color="green"><b>Submissão concluída com Sucesso!</b></font></h1></center>';
		$this -> load -> view('content', $data);
	}

	function submit_edit($tipo = '', $id = '', $chk = '', $pag = '') {
		$this -> load -> model('ics');
		$this -> load -> model('ics_master');
		$this -> load -> model('geds');

		$this -> cab();
		$data = array();

		$prj_data = $this -> ics_master -> le($id);
		$sta = $prj_data['pj_status'];
		if ($sta != '@') {
			redirect(base_url('index.php/ic/submit_view/' . $id . '/' . checkpost_link($id)));
			exit ;
		}

		$bp = array();
		if (strlen($pag) == 0) { $pag = 1;
		}
		$data['bp_atual'] = $pag;

		switch ($tipo) {
			case 'ICMST' :
				$bp[1] = 'Identificação do projeto';
				$bp[2] = 'Submissão de Arquivos';
				$bp[3] = 'Confirmação';
				$data['bp'] = $bp;
				$data['bp_link'] = base_url('index.php/ic/submit_edit/' . $tipo . '/' . $id . '/' . $chk . '/');
				$this -> load -> view('gadget/progessbar_horizontal.php', $data);

				$form = new form;
				$form -> id = $id;

				switch ($pag) {
					case '1' :
						$cp = $this -> ics_master -> cp_subm_01();

						$tela = $form -> editar($cp, 'ic_submissao_projetos');

						$data['content'] = $tela;
						$this -> load -> view('content', $data);
						break;
					case '2' :
						$cp = $this -> ics_master -> cp_subm_02($id);
						$tela = $form -> editar($cp, 'ic_submissao_projetos');

						$data['content'] = $tela;
						$this -> load -> view('content', $data);
						break;
					case '3' :
						$cp = $this -> ics_master -> valida_entrada($id);

						$tela = $form -> editar($cp, 'ic_submissao_projetos');

						$data['content'] = $tela;
						$this -> load -> view('content', $data);
						break;
					case '4' :
						$this -> ics_master -> altera_status($id, 'A');
						redirect(base_url('index.php/ic/submit_finished/' . $id));
						break;
				}

				if ($form -> saved > 0) {
					redirect(base_url('index.php/ic/submit_edit/ICMST/' . $id . '/' . $chk . '/' . ($pag + 1)));
				}
		}

	}

	function submit_ICMST() {
		$this -> load -> model('ics_master');
		$this -> cab();

		$id_us = $_SESSION['id_us'];
		$cracha = $_SESSION['cracha'];
		$ano = date("Y");
		$tela = $this -> ics_master -> resumo_submit($cracha, $ano);

		/* Habilita botão de submissão */
		$prj = $this -> ics_master -> exist_submit($cracha, $ano);
		/* se 0, não existe projeto cadastrado */
		if ($prj > 0) {
			$chk = checkpost_link($prj);
			$tipo = 'ICMST';
			$botao = base_url('index.php/ic/submit_edit/' . $tipo . '/' . $prj . '/' . $chk . '/');
			$botao = '<a href="' . $botao . '" class="botao3d back_green_shadown back_green">';
			$botao .= msg('ic_submit_edit_project');
			$botao .= '</a>';
		} else {
			$botao = '<a href="' . base_url('index.php/ic/submit_new/ICMST') . '" class="botao3d back_green_shadown back_green">';
			$botao .= msg('ic_submit_new_project');
			$botao .= '</a>';
		}
		$tela .= '<br>' . $botao;

		$data['content'] = $tela;
		$this -> load -> view('content', $data);

	}

	function admin_rpar_lista_professores_com_erro_no_pdf() {
		$this -> cab();
		$this -> load -> model("geds");
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> load -> model('usuarios');
		$this -> load -> model('ics');

		$data['title'] = msg('Emails que deram erro no pdf do RP nos dias 11 á 14 de Março de 2016');
		//$data['submenu'] = '<a href="'.base_url('index.php/ic/admin_rpar_lista_professores_com_erro_no_pdf').'" class="lt0 link">exportar para excel</a>';

		$d1 = '20160311';
		$d2 = date("Ymd");

		//$sql = "select * from ic_ged_documento where doc_data >= $d1 and doc_data <= $d2 ";
		$sql = "select distinct doc_dd0, ic_cracha_prof, us_nome, usm_email, 
                ic_plano_aluno_codigo, us_cracha,
                id_us, usuario_id_us, id_usm, usm_tipo, usm_ativo
						from ic_ged_documento
						left join ic on ic_plano_aluno_codigo = doc_dd0
						left join us_usuario on ic_cracha_prof = us_cracha
						inner join us_email on id_us = usuario_id_us
						where doc_data >= $d1 
						and doc_data <= $d2 
						and usm_ativo = 1
						group by doc_dd0, ic_cracha_prof, us_nome, usm_email, 
						         ic_plano_aluno_codigo, us_cracha,
						         id_us, usuario_id_us, id_usm, usm_tipo, usm_ativo
		
		";
		$sql .= " and doc_tipo = 'PRP' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt3">';
		$http = 'https://cip.pucpr.br/';

		$sx .= '<tr><th align="left">#</th>
								<th align="left">Protocolo</th>
								<th align="left">Cracha</th>
								<th align="left">Professor</th>
								<th align="left">email</th>
								<th align="left">email_tipo</th>

						</tr>';
		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			$sx .= '<tr class="lt4">';

			//indice
			$sx .= '<td class="lt2">' . ($r + 1) . '.</td>';

			$sx .= '<td class="lt2">';
			$sx .= $line['doc_dd0'];
			$sx .= '</td>';

			$sx .= '<td class="lt2">';
			$sx .= $line['ic_cracha_prof'];
			$sx .= '</td>';

			//nome_prof
			$sx .= '<td class="lt1">';
			$sx .= link_perfil($line['us_nome'], $line['id_us']);
			$sx .= '</td>';

			$sx .= '<td class="lt2">';
			$sx .= $line['usm_email'];
			$sx .= '</td>';

			$sx .= '<td class="lt2">';
			$sx .= $line['usm_tipo'];
			$sx .= '</td>';

			$sx .= '</tr>';
		}
		//print_r($line);
		$sx .= '</table>';

		$sx .= '<TR><TD colspan=6> ' . $tot . ' emails';
		$sx .= '</BR>';
		$sx .= '<TR><TD class="lt1"><font color="red"> obs.: Existem professores com mais de um emal cadasdtrado em seu perfil</font>';

		$data['content'] = $sx;

		$this -> load -> view("content", $data);

	}

	function admin_rpar() {
		$this -> cab();
		$this -> load -> model("geds");
		$this -> geds -> tabela = 'ic_ged_documento';

		$d1 = '20160311';
		$d2 = date("Ymd");

		$sql = "select * from ic_ged_documento where doc_data >= $d1 and doc_data <= $d2 ";
		$sql .= " and doc_tipo = 'PRP' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt3">';
		$sx .= '<tr><th>#</th>
					<th>protocolo</th>
					<th>tipo</th>
					<th>data e hora</th>
					<th>acao</th>
				</tr>';
		$http = 'https://cip.pucpr.br/';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr class="lt4">';
			$sx .= '<td>'.($r+1).'</td>';
			$sx .= '<td>';
			$sx .= $line['doc_dd0'];
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= '<a href="' . $http . $line['doc_arquivo'] . '" target="new">' . $line['doc_filename'] . '</a>';
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= $line['doc_tipo'];
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= stodbr($line['doc_data']);
			$sx .= ' ';
			$sx .= substr($line['doc_hora'], 0, 5);
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= '<a href="' . base_url('index.php/ic/gera_novo_parecer/' . $line['id_doc']) . '" target="new">gerar novo</a>';
			$sx .= '</td>';

			$sx .= '</tr>';
		}
		//print_r($line);
		$sx .= '</table>';
		$data['content'] = $sx;
		$this -> load -> view("content", $data);
	}

	function gera_novo_parecer($id) {
		$this -> load -> model("ics");
		$this -> load -> model("ic_pareceres");

		$sql = "select * from ic_ged_documento where id_doc = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$proto = $line['doc_dd0'];

			$sql = "select * from pibic_parecer_" . date("Y") . " 
					where pp_protocolo = '$proto' 
						and pp_tipo = 'RPAR' 
						and pp_status = 'B' ";
			$rrlt = $this -> db -> query($sql);
			$rrlt = $rrlt -> result_array();
			$dados = $rrlt[0];
			$dados2 = $this -> ics -> le_protocolo($proto);

			$dados3 = $this -> ic_pareceres -> le($id);
			$dados = array_merge($dados, $dados2, $dados3, $line);
			$nota = $dados['pp_p09'];
			$proto = $dados['pp_protocolo'];
			$this -> ic_pareceres -> finaliza_nota_ic($proto, $nota);

			$aluno = $this -> usuarios -> le_cracha($dados['ic_cracha_aluno']);

			/* gera PDF */
			$file_local = $this -> ic_pareceres -> gera_parecer('RPAR', $dados);

			for ($r = 0; $r < 9999; $r++) {
				$file1 = $dados['doc_arquivo'];
				$file2 = $dados['doc_arquivo'] . '-' . $r;
				echo '<br>' . $file2 . ' - ';
				if (!(file_exists($file2))) {
					$r = 9999;
					echo 'ok';
				}

			}
			if (file_exists($file1)) {
				echo '->' . $file1 . ' - renomeado';
				rename($file1, $file2);
			} else {
				echo ' - arquivo não localizado!';
			}
			rename($file_local, $file1);

		}

	}

	/*************************************************************************************************
	 *************************************************************************** ADMINISTRATIVO ******
	 *************************************************************************************************/
	function admin($id = 0, $gr = '') {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Gestão', 'Alterar título de plano de aluno', 'ITE', '/ic/admin_alterar_titulo'));
		array_push($menu, array('Gestão', 'Cancelar plano de estudante', 'ITE', '/ic/admin_cancelar'));
		array_push($menu, array('Gestão', 'Reativar plano cancelado', 'ITE', '/ic/admin_reativar'));
		array_push($menu, array('Gestão', 'Substituição de orientador', 'ITE', '/ic/admin_substituir_orientador'));
		array_push($menu, array('Gestão', 'Substituição de bolsa', 'ITE', '/ic/admin_substituir_bolsa'));

		array_push($menu, array('Entregas', 'Formulário de acompanhamento', 'ITE', '/ic/acompanhamento'));

		array_push($menu, array('Implementação', 'Implementação Manual', 'ITE', '/ic/implementacao_manual'));

		array_push($menu, array('Discentes (seguro) ', 'Relatório de discentes ativos IC Capital (Seguro)', 'ITE', '/ic/seguro/1'));
		array_push($menu, array('Discentes (seguro) ', 'Relatório de discentes ativos IC Interior (Seguro)', 'ITE', '/ic/seguro/2'));

		array_push($menu, array('Relatório Parcial ', 'Problemas no PDF do relatório parcial', 'ITE', '/ic/admin_rpar'));
		array_push($menu, array('Relatório Parcial ', 'Professores com problemas no PDF do RP', 'ITE', '/ic/admin_rpar_lista_professores_com_erro_no_pdf'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/***************************************************************************************** SEGURO */
	function seguro($id = 1, $fmt = '') {
		$data = array();
		$this -> load -> model('ics');
		if (strlen($fmt) > 0) {
			/* Exporta no formato excel */
			xls('segurado-' . date("Y-m") . '.xls');
		} else {
			$this -> cab();
			$data['title'] = 'Relatório de Seguro';
			$data['submenu'] = '<A href="' . base_url('index.php/ic/seguro/' . $id . '/xls') . '" class="link lt0">' . msg('export_to_excel') . '</a>';
		}
		$tit = 'Seguro';

		$sx = $this -> ics -> ic_seguro($id, '2016-02-01');
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

		if (strlen($fmt) == 0) {
			/*Fecha */	/*Gera rodapé*/
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}
	}

	/***************************************************************************************** ALTERAR TITULO */
	function admin_cancelar($id = 0, $chk = '') {
		$this -> load -> model('ics');
		$this -> load -> model('protocolos_ic');
		$this -> cab();
		$data = array();
		$tit = 'Cancelar plano de estudante';

		if ($id > 0) {
			/****************************************************************
			 ************************************ ID do protocolo informado *
			 ****************************************************************/
			$cp = $this -> ics -> cp_cancelar();
			$data = $this -> ics -> le($id);
			$proto = $data['ic_plano_aluno_codigo'];
			$this -> load -> view('ic/plano.php', $data);
			$status = $data['icas_id'];

			$form = new form;
			$form -> id = $id;
			$tela = $form -> editar($cp, 'ic');
			$data['title'] = $tit;
			$data['content'] = $tela;

			if ($form -> saved > 0) {
				/* Fase I - Cancela */
				/*************************/
				$data['volta'] = base_url('index.php/ic/admin_cancelar');
				$this -> load -> view('sucesso', $data);

				/* Fase II - Tela de Fim */
				/*************************/
				$data['pr_justificativa'] = get("dd2");
				$data['pr_protocolo_original'] = $proto;
				$data['pr_descricao'] = $data['al_nome'];
				$this -> ics -> protocolo_CAN($data);

				$data['content'] = '';
			} else {
				$this -> load -> view('content', $data);
			}
		} else {
			/****************************************************************
			 ************************************ nao informado o protocolo *
			 ****************************************************************/
			$proto = get("dd1");
			if (strlen($proto) == 0) {
				$cp = $this -> ics -> cp_protocolo();
				$form = new form;
				$tela = $form -> editar($cp, '');
				$data['title'] = $tit;
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			} else {
				$ic = $this -> ics -> le_protocolo($proto);
				if (count($ic) == 0) {
					$data['title'] = $tit;
					$data['content'] = 'Procolo não localizado';
					$data['volta'] = base_url('index.php/ic/admin_cancelar');
					$this -> load -> view('errors/erro_msg', $data);
				} else {
					$status = $ic['s_id'];
					$id = $ic['id_ic'];
					/* Protocolo Finalizado, Cancelado ou Suspenso */
					if ($status != '1') {
						$data['title'] = $tit;
						$data['content'] = 'Procolo Cancelado, Finalizado ou Suspenso';
						$data['volta'] = base_url('index.php/ic/admin_cancelar');
						$this -> load -> view('errors/erro_msg', $data);
					} else {
						/********************/
						redirect(base_url('index.php/ic/admin_cancelar/' . $id . '/' . checkpost_link($id)));
					}
					print_r($ic);
				}
			}
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/***************************************************************************************** ALTERAR TITULO */
	function admin_reativar($id = 0, $chk = '') {
		$tit = 'Reativar plano de aluno';
		$this -> load -> model('ics');
		$link = base_url('index.php/ic/admin_reativar');
		$this -> cab();
		$data = array();

		if ($id > 0) {
			/****************************************************************
			 ************************************ ID do protocolo informado *
			 ****************************************************************/
			$cp = $this -> ics -> cp_reativar($id);
			$data = $this -> ics -> le($id);
			$proto = $data['ic_plano_aluno_codigo'];
			$this -> load -> view('ic/plano.php', $data);
			$status = $data['icas_id'];

			$form = new form;
			$form -> id = $id;
			$tela = $form -> editar($cp, 'ic');
			$data['title'] = $tit;
			$data['content'] = $tela;

			if ($form -> saved > 0) {
				/* Fase I - Reativa */
				/*************************/
				$data['volta'] = $link;
				$this -> load -> view('sucesso', $data);

				/* Fase II - Tela de Fim */
				/*************************/
				$data['pr_justificativa'] = get("dd2");
				$data['pr_protocolo_original'] = $proto;
				$data['pr_descricao'] = $data['al_nome'];
				$data['pr_ica'] = get("dd3");
				$this -> ics -> protocolo_RET($data);

				$data['content'] = '';
			} else {
				$this -> load -> view('content', $data);
			}

		} else {
			/****************************************************************
			 ************************************ nao informado o protocolo *
			 ****************************************************************/
			$proto = get("dd1");
			if (strlen($proto) == 0) {
				$cp = $this -> ics -> cp_protocolo();
				$form = new form;
				$tela = $form -> editar($cp, '');
				$data['title'] = $tit;
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			} else {
				$ic = $this -> ics -> le_protocolo_cancelado($proto);
				if (count($ic) == 0) {
					$data['title'] = $tit;
					$data['content'] = 'Procolo não localizado';
					$data['volta'] = $link;
					$this -> load -> view('errors/erro_msg', $data);
				} else {
					$status = $ic['s_id'];
					$id = $ic['id_ic'];
					/* Protocolo Finalizado, Cancelado ou Suspenso */
					if ($status != '2') {
						$data['title'] = $tit;
						$data['content'] = 'Procolo ativo!';
						$data['volta'] = $link;
						$this -> load -> view('errors/erro_msg', $data);
					} else {
						/********************/
						redirect(base_url('index.php/ic/admin_reativar/' . $id . '/' . checkpost_link($id)));
					}
				}
			}
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/***************************************************************************************** ALTERAR TITULO */
	function admin_substituir_bolsa($id = 0, $chk = '') {
		$tit = 'Alterar tipo de Bolsa';
		$this -> load -> model('ics');
		$link = base_url('index.php/ic/admin_substituir_bolsa');
		$this -> cab();
		$data = array();

		if ($id > 0) {
			/****************************************************************
			 ************************************ ID do protocolo informado *
			 ****************************************************************/
			$cp = $this -> ics -> cp_troca_bolsa($id);
			$data = $this -> ics -> le($id);
			$proto = $data['ic_plano_aluno_codigo'];
			$this -> load -> view('ic/plano.php', $data);
			$status = $data['icas_id'];

			$form = new form;
			$form -> id = $id;
			$tela = $form -> editar($cp, 'ic');
			$data['title'] = $tit;
			$data['content'] = $tela;

			if ($form -> saved > 0) {
				/* Fase I - Reativa */
				/*************************/
				$data['volta'] = $link;
				$this -> load -> view('sucesso', $data);

				/* Fase II - Tela de Fim */
				/*************************/
				$data['pr_justificativa'] = get("dd2");
				$data['pr_protocolo_original'] = $proto;
				$data['pr_descricao'] = $data['al_nome'];
				$data['pr_ica'] = get("dd3");
				$this -> ics -> protocolo_alterar_bolsa($data);

				$data['content'] = '';
			} else {
				$this -> load -> view('content', $data);
			}

		} else {
			/****************************************************************
			 ************************************ nao informado o protocolo *
			 ****************************************************************/
			$proto = get("dd1");
			if (strlen($proto) == 0) {
				$cp = $this -> ics -> cp_protocolo();
				$form = new form;
				$tela = $form -> editar($cp, '');
				$data['title'] = $tit;
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			} else {
				$ic = $this -> ics -> le_protocolo($proto);
				if (count($ic) == 0) {
					$data['title'] = $tit;
					$data['content'] = 'Procolo não localizado (' . $proto . ')';
					$data['volta'] = $link;
					$this -> load -> view('errors/erro_msg', $data);
				} else {
					$status = $ic['s_id'];
					$id = $ic['id_ic'];
					/* Protocolo Finalizado, Cancelado ou Suspenso */
					if ($status != '1') {
						$data['title'] = $tit;
						$data['content'] = 'Procolo inativo!';
						$data['volta'] = $link;
						$this -> load -> view('errors/erro_msg', $data);
					} else {
						/********************/
						redirect(base_url('index.php/ic/admin_substituir_bolsa/' . $id . '/' . checkpost_link($id)));
					}
				}
			}
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/***************************************************************************************** ALTERAR TITULO */
	function admin_alterar_titulo($id = 0, $chk = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		if ($id > 0) {
			/****************************************************************
			 ************************************ ID do protocolo informado *
			 ****************************************************************/
			$cp = $this -> ics -> cp_alterar_titulo();
			$data = $this -> ics -> le($id);
			$proto = $data['ic_plano_aluno_codigo'];
			$this -> load -> view('ic/plano.php', $data);
			$status = $data['icas_id'];

			if ($status != '1') {
				$data['title'] = 'Alteração do título do plano do aluno';
				$data['content'] = 'Procolo Cancelado, Finalizado ou Suspenso';
				$data['volta'] = base_url('index.php/ic/admin_alterar_titulo');
				$this -> load -> view('errors/erro_msg', $data);
			} else {
				$form = new form;
				$form -> id = $id;
				$tela = $form -> editar($cp, 'ic');
				$data['title'] = 'Alteração do título do plano do aluno';
				$data['content'] = $tela;

				if ($form -> saved > 0) {
					/* Fase I - Inserir histórico */
					/******************************/
					$aluno1 = '';
					$aluno2 = '';
					$hist = 'Alteração do título de "<b>' . get("dd2") . '</b>" para "<b>' . get("dd3") . '</b>" com a justificativa: <b>' . get("dd4") . '</b>';
					$motivo = '000';
					$obs = '';
					$ac = '175';

					$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

					/* Fase II - Altera Título */
					/******************************/
					$this -> ics -> alterar_titulo_plano($proto, get("dd3"));

					/* Fase III - Comunicar Orientador */
					/***********************************/

					/* Fase IV - Tela de Fim */
					/*************************/
					$data['volta'] = base_url('index.php/ic/admin_alterar_titulo');
					$this -> load -> view('sucesso', $data);
				} else {
					$this -> load -> view('content', $data);
				}

			}
		} else {
			/****************************************************************
			 ************************************ nao informado o protocolo *
			 ****************************************************************/
			$proto = get("dd1");
			if (strlen($proto) == 0) {
				$cp = $this -> ics -> cp_protocolo();
				$form = new form;
				$tela = $form -> editar($cp, '');
				$data['title'] = 'Alteração do título do plano do aluno';
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			} else {
				$ic = $this -> ics -> le_protocolo($proto);
				if (count($ic) == 0) {
					$data['title'] = 'Alteração do título do plano do aluno';
					$data['content'] = 'Procolo não localizado';
					$data['volta'] = base_url('index.php/ic/admin_alterar_titulo');
					$this -> load -> view('errors/erro_msg', $data);
				} else {
					$status = $ic['s_id'];
					$id = $ic['id_ic'];
					/* Protocolo Finalizado, Cancelado ou Suspenso */
					if ($status != '1') {
						$data['title'] = 'Alteração do título do plano do aluno';
						$data['content'] = 'Procolo Cancelado, Finalizado ou Suspenso';
						$data['volta'] = base_url('index.php/ic/admin_alterar_titulo');
						$this -> load -> view('errors/erro_msg', $data);
					} else {
						/********************/
						redirect(base_url('index.php/ic/admin_alterar_titulo/' . $id . '/' . checkpost_link($id)));
					}
					print_r($ic);
				}
			}
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/***************************************************************************************** ALTERAR TITULO */
	function admin_substituir_orientador($id = 0, $chk = '') {
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> cab();
		$data = array();
		$link = base_url('index.php/ic/admin_substituir_orientador');
		$tit = 'Alteração do professor orientador';

		if ($id > 0) {
			/****************************************************************
			 ************************************ ID do protocolo informado *
			 ****************************************************************/
			$cp = $this -> ics -> cp_alterar_orientador();
			$data = $this -> ics -> le($id);
			$proto = $data['ic_plano_aluno_codigo'];
			$this -> load -> view('ic/plano.php', $data);
			$status = $data['icas_id'];

			if ($status != '1') {
				$data['title'] = $tit;
				$data['content'] = 'Procolo Cancelado, Finalizado ou Suspenso';
				$data['volta'] = $link;
				$this -> load -> view('errors/erro_msg', $data);
			} else {
				$form = new form;
				$form -> id = $id;
				$tela = $form -> editar($cp, 'ic');
				$data['title'] = 'Alteração do título do plano do aluno';
				$data['content'] = $tela;

				if ($form -> saved > 0) {
					/* Fase I - Inserir histórico */
					/******************************/
					$prof1 = $data['pf_cracha'];
					$nome1 = $data['pf_nome'];

					$prof2 = get("dd2");
					$ln = $this -> usuarios -> le_cracha($prof2);
					$nome2 = $ln['us_nome'];

					$hist = 'Alteração do professor orientador de "<b>' . $nome1 . '</b>" para "<b>' . $nome2 . '</b>';
					$obs = mst('Justificativa: ' . get("dd3"));
					$motivo = '000';
					$ac = '177';

					$this -> ics -> inserir_historico($proto, $ac, $hist, $prof1, $prof2, $motivo, $obs);

					/* Fase II - Altera Título */
					/******************************/
					$this -> ics -> alterar_orientador_plano($proto, $prof2);

					/* Fase III - Comunicar Orientador */
					/***********************************/

					/* Fase IV - Tela de Fim */
					/*************************/
					$data['volta'] = base_url('index.php/ic/admin_substituir_orientador');
					$this -> load -> view('sucesso', $data);
				} else {
					$this -> load -> view('content', $data);
				}

			}
		} else {
			/****************************************************************
			 ************************************ nao informado o protocolo *
			 ****************************************************************/
			$proto = get("dd1");
			if (strlen($proto) == 0) {
				$cp = $this -> ics -> cp_protocolo();
				$form = new form;
				$tela = $form -> editar($cp, '');
				$data['title'] = $tit;
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			} else {
				$ic = $this -> ics -> le_protocolo($proto);
				if (count($ic) == 0) {
					$data['title'] = $tit;
					$data['content'] = 'Procolo não localizado';
					$data['volta'] = $link;
					$this -> load -> view('errors/erro_msg', $data);
				} else {
					$status = $ic['s_id'];
					$id = $ic['id_ic'];
					/* Protocolo Finalizado, Cancelado ou Suspenso */
					if ($status != '1') {
						$data['title'] = $tit;
						$data['content'] = 'Procolo Cancelado, Finalizado ou Suspenso';
						$data['volta'] = $link;
						$this -> load -> view('errors/erro_msg', $data);
					} else {
						/********************/
						redirect(base_url('index.php/ic/admin_substituir_orientador/' . $id . '/' . checkpost_link($id)));
					}
					print_r($ic);
				}
			}
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/*************************************************************************************************
	 ********************************************************************************** REPORTS ******
	 *************************************************************************************************/

	function report($id = 0, $gr = '') {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Relatórios', 'Resumo de implementações', 'ITE', '/ic/report_resumo'));
		array_push($menu, array('Relatórios', 'Guia do Estudante (Resumo)', 'ITE', '/ic/report_guia'));
		array_push($menu, array('Relatórios', 'Guia do Estudante (Excel)', 'ITE', '/ic/report_guia_excel'));

		array_push($menu, array('Relatórios', 'Número de orientações por professor (Excel)', 'ITE', '/ic/report_drh'));

		array_push($menu, array('Orientadores', 'Dados dos orientadores', 'ITE', '/ic/report_orientadores'));

		array_push($menu, array('Professor', 'Professores sem e-mail', 'ITE', '/ic/usuario_sem_email'));

		array_push($menu, array('Estudante', 'Estudantes sem e-mail', 'ITE', '/ic/aluno_sem_email'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function usuario_sem_email($xls = '') {

		$this -> load -> model('usuarios');

		if ($xls == '') {
			$this -> cab();
			$data = array();
			//$this -> load -> view('header/content_open');
			$data['submenu'] = '<a href="' . base_url('index.php/usuario/usuario_sem_email/xls') . '" class="lt0 link">exportar para excel</a>';
		} else {
			xls('lista-usu-sem-email-cadastrado.xls');
		}

		$data['content'] = $this -> usuarios -> sem_email();
		$data['title'] = 'Professores sem email';

		$this -> load -> view('content', $data);

		if ($xls == '') {
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}

	}

	function aluno_sem_email($xls = '') {

		$this -> load -> model('usuarios');

		if ($xls == '') {
			$this -> cab();
			$data = array();
			//$this -> load -> view('header/content_open');
			$data['submenu'] = '<a href="' . base_url('index.php/ic/aluno_sem_email/xls') . '" class="lt0 link">exportar para excel</a>';
		} else {
			xls('lista-aluno-sem-email-cadastrado.xls');
		}

		$data['content'] = $this -> usuarios -> aluno_sem_email();
		$data['title'] = 'Estudantes sem email';

		$this -> load -> view('content', $data);

		if ($xls == '') {
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}

	}

	function report_drh() {
		$ano = '';
		$this -> load -> model('ics');
		$tela = $this -> ics -> orientaoes_ativas($ano);
		xls('orientacoes-ic-' . date("Y-m") . '.xls');
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
	}

	/* Reports */

	function report_orientadores($ano = 0) {
		$this -> load -> model('ics');

		/* Ano de análise */
		if ($ano == 0) {
			if (date("m") < 8) {
				$ano = (date("Y") - 1);
			} else {
				$ano = date("Y");
			}
		}

		$this -> cab();
		$data = array();

		$data['content'] = $orientadores = $this -> ics -> orientadores_ic($ano);
		$this -> load -> view('content', $data);

		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function report_resumo($ano = 0, $tipo = 0) {
		/* Load Models */
		$this -> load -> model('ics');
		if ($ano == 0) {
			if (date("m") < 8) {
				$ano = (date("Y") - 1);
			} else {
				$ano = date("Y");
			}
		}
		$result = '';
		if ($tipo > 0) {
			$ano_ini = $ano;
			$ano_fim = $ano;
			$modalidade = $tipo;
			$result = $this -> ics -> report_guia_estudante($ano_ini, $ano_fim, $modalidade);

		}

		$this -> cab();
		$data = array();

		$tela = $this -> ics -> resumo_implemendados($ano, $tipo);
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$data['content'] = '<br><hr><br>' . $result;
		$this -> load -> view('content', $data);

		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function report_guia($id = 0, $gr = '') {
		global $form;
		/* Load Models */
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		$form = new form;
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$A', '', msg('Guia do Estudante'), False, true));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('Ano inicial'), True, TRUE));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('Ano final'), True, True));
		$sql = "select * from ic_modalidade_bolsa order by mb_tipo";
		array_push($cp, array('$Q id_mb:mb_descricao:' . $sql, '', msg('ic_modalidade'), False, False));
		$tela = $form -> editar($cp, '');

		if ($form -> saved) {
			$ano_ini = get("dd2");
			$ano_fim = get("dd3");
			$modalidade = get("dd4");
			$data['content'] = $this -> ics -> report_guia_estudante($ano_ini, $ano_fim, $modalidade);
			$this -> load -> view('content', $data);
		} else {
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
		}

		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function report_guia_excel($xls = '') {
			$ano_ini = get("dd2");
			$ano_fim = get("dd3");
			$modalidade = get("dd4");
			
		/* Load Models */
		$this -> load -> model('ics');
	
		if ($xls == '') {
			$this -> cab();
			$data = array();
			
			$data['submenu'] = '<a href="'. base_url('index.php/ic/report_guia_excel/xls?dd2='. $ano_ini .'&dd3='. $ano_fim .'&dd4='. $modalidade .'&acao=xls') .'" class="lt0 link">exportar para excel</a>';
		} else {
			xls('Guia_do_estudante '. $ano_ini .' até '. $ano_fim .'.xls');
		}

		$form = new form;
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$A', '', msg('Guia do Estudante'), False, true));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('lb_ano_inicio'), True, TRUE));
		array_push($cp, array('$[2009-' . date("Y") . ']D', '', msg('lb_ano_final'), True, True));
		$sql = "select * from ic_modalidade_bolsa order by mb_tipo";
		array_push($cp, array('$Q id_mb:mb_descricao:' . $sql, '', msg('lb_ic_modalidade'), False, False));
		$tela = $form -> editar($cp, '');

		if ($form -> saved) {
			
			$data['title']   = 'Orientações de Iniciação Científica de '. $ano_ini .' até '. $ano_fim .' ';
			$data['content'] = $this -> ics -> report_guia_estudante_xls($ano_ini, $ano_fim, $modalidade);
			$this -> load -> view('content', $data);

		} else {
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
		}

		/*Gera rodapé*/
		if ($xls == '') {
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);
		}
	}

	function comunicacao() {
		$this -> cab();
		$data = array();

		$menu = array();
		array_push($menu, array('Mensagens', 'Mensagens padrão do sistema', 'ITE', '/ic/comunicacao_1'));
		array_push($menu, array('Mensagens', 'Mensagens de comunicação', 'ITE', '/ic/comunicacao_2'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Mensagens';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function mensagens_edit($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('mensagens');
		$cp = $this -> mensagens -> cp();

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> mensagens -> tabela);
		$data['title'] = msg('mensagens_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/comunicacao_1'));
		}

		//$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function comunicacao_1($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$this -> load -> model('mensagens');

		$this -> cab();
		$data = array();

		/* Lista de Mensagens do Sistema */
		$form = new form;
		$form -> tabela = $this -> mensagens -> tabela;
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form -> order = ' nw_ref ';
		$form = $this -> mensagens -> row($form);

		$form -> row_edit = base_url('index.php/ic/mensagens_edit');
		$form -> row_view = '';
		$form -> row = base_url('index.php/ic/comunicacao_1/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('messagem_cadastradas');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function comunicacao_2($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');
		$this -> load -> model('mensagens');

		$this -> cab();
		$data = array();

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> comunicacoes -> tabela_view();
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form -> order = ' id_mc desc ';
		$form = $this -> comunicacoes -> row($form);

		$form -> row_edit = base_url('index.php/ic/comunicacao_edit');
		$form -> row_view = base_url('index.php/ic/comunicacao_view');
		$form -> row = base_url('index.php/ic/comunicacao_2/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('comunicacoes_cadastradas');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
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

		$data['resumo'] = $this -> protocolos_ic -> resumo();
		
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
		} else {
			$data['search'] .= '<center>' . $this -> resumo_entrega($fld, $ano, $tit) . '</center>';

			$data['search'] .= $this -> load -> view('ic/_short_url', null, true);
		}

		/* Mostra tela principal */
		$this -> load -> view('ic/home', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha_inport($date = '', $action = '') {
		/* Load Models */
		$this -> load -> model('pagamentos');
		$this -> load -> model('bancos');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$data['title'] = 'Inportação de arquivos de pagamento';
		$this -> load -> view('form/form_file_upload', $data);

		/* Arquivo enviado */
		if (isset($_FILES['arquivo']['tmp_name'])) {
			$nome = lowercasesql($_FILES['arquivo']['name']);
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];

			$data['content'] = $this -> pagamentos -> processa_seq($temp);
			$this -> load -> view('content', $data);
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha($date = '', $action = '') {
		$ano1 = date("Y");
		if (date("m") < 10) {
			$ano1--;
		}
		$ano2 = $ano1 + 2;
		/* Load Models */
		$this -> load -> model('pagamentos');
		$this -> load -> model('bancos');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$[' . $ano1 . '-' . $ano2 . ']', '', 'Edital', True, True));
		array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_vigente = 1 and mb_valor > 0', '', 'Modalidade', True, True));
		array_push($cp, array('$D8', '', msg('data vencimento'), True, True));
		array_push($cp, array('$B8', '', msg('avancar') . ' >>', False, True));

		$form = new form;
		$tela = $form -> editar($cp, '');
		$data['content'] = '<div class="nopr">' . $tela . '</div>';
		$this -> load -> view('content', $data);

		if ($form -> saved > 0) {
			$bolsa = get('dd2');
			$ano = get('dd1');
			$venc = brtos(get('dd3'));

			$tela = $this -> pagamentos -> gerar_pagamento_bolsa($bolsa, $ano, $venc);
			$data['content'] = $tela;
			$this -> load -> view('content', $data);

			$this -> load -> view('ic/assinatura_ic');
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha_compromisso($date = '', $action = '') {
		$ano1 = date("Y");
		if (date("m") < 10) {
			$ano1--;
		}
		$ano2 = $ano1 + 2;
		/* Load Models */
		$this -> load -> model('pagamentos');
		$this -> load -> model('bancos');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$S15', '', msg('informe_nr_compromisso'), True, True));

		$form = new form;
		$tela = $form -> editar($cp, '');
		$data['content'] = '<div class="nopr">' . $tela . '</div>';
		$this -> load -> view('content', $data);

		if ($form -> saved > 0) {
			$id = get('dd1');

			$tela = $this -> pagamentos -> pagamento_compromisso_mostra($id);
			$data['content'] = $tela;
			$this -> load -> view('content', $data);

			$this -> load -> view('ic/assinatura_ic');
		}

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha_hsbc($modalidade = '', $edital = '', $venc = '') {
		/* Load Models */
		$this -> load -> model('pagamentos');
		$this -> load -> model('bancos');
		$this -> load -> model('ics');

		$data = array();

		/* seta variavel de erro como nada*/
		$err = '';
		$tela = '';

		/* Data invalda */
		if (strlen($venc) < 10) {
			$err = 'Data de pagamento inválida';
		}

		if (strlen($err) > 0) {
			$tela = '<center><h1><font color="red">' . $err . '</font></h1></center>';
			echo $tela;
			exit ;
		} else {
			$fl = $this -> pagamentos -> gerar_pagamento_bolsa_arquivo($modalidade, $edital, $venc);
			$tela = $fl;
		}
		$file = $this -> pagamentos -> filename;

		//header("Content-Type: plain/pdf");
		header('Content-Type: text/plain');
		header("Content-type: application-download");
		header("Content-disposition: attachment; filename=$file");
		header("Content-Transfer-Encoding: binary");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $tela;

	}

	function pagamentos($date = '', $action = '') {
		/* Load Models */
		$this -> load -> model('pagamentos');

		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Pagamentos', 'Gerar planilha de pagamento', 'ITE', '/ic/pagamento_planilha'));
		array_push($menu, array('Pagamentos', 'Importar arquivo de pagamento (.seq)', 'ITE', '/ic/pagamento_planilha_inport'));
		array_push($menu, array('Pagamentos', 'Identifica No. do compromisso', 'ITE', '/ic/pagamento_planilha_compromisso'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Sistema de Pagamentos';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamentos_realizados($date = '', $action = '') {
		/* Load Models */
		$this -> load -> model('pagamentos');

		if (strlen($date) == 0) { $date = date("Ym01");
		}

		$this -> cab();
		$data = array();

		/* Mostra tela principal */
		$data['title'] = 'Razão de Pagamentos';
		$sx = '<table width="100%" ><tr valign="top">';
		$sx .= '<td width="500" rowspan=2 style="border-right: 1px solid #00000;">' . $this -> pagamentos -> resumo_pagamentos() . '</td>';
		$sx .= '<td width="20" rowspan=2 class="borderr1">&nbsp;</td>';
		$sx .= '<td width="80%" style="border-right: 1px solid #00000;">' . $this -> pagamentos -> pagamentos_lotes($date) . '</td>';
		$sx .= '<tr>';
		$sx .= '<td width="80%" style="border-right: 1px solid #00000;">' . $this -> pagamentos -> detalhe_pagamentos($date) . '</td>';

		$sx .= '</tr>';
		$sx .= '</table>';

		$data['content'] = $sx;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function usuarios_edit($id = 0) {
		global $dd;
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		/* Form */
		$form = new form;
		$form -> tabela = 'us_usuario';
		$form -> id = $id;
		$cp = $this -> usuarios -> cp_usuario();
		$data['tela'] = $form -> editar($cp, '');

		/* salved */
		if ($form -> saved > 0) {
			$tabela = 'us_usuario';
			$cracha = get("dd2");
			$cracha = $this -> usuarios -> limpa_cracha($cracha);
			$us = $this -> usuarios -> le_cracha($cracha);

			if (count($us) > 0) {
				$data['content'] = '<h2><font color="red">Usuário já cadastrado</font></h2>';
				$this -> load -> view('content', $data);
			} else {
				$_POST['dd2'] = $cracha;
				$form -> editar($cp, $tabela);
				redirect(base_url('index.php/ic/usuarios'));
			}

			//
		}

		$data['title'] = 'Cadastro de novo usuário';
		$data['tela'] .= '
		<script>
			$("#dd3").mask(\'999.999.999-99\');
		</script>
		';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function usuarios($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$data['content'] = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '">' . msg('consulta') . ' ' . msg('cracha') . '</a>';
		$data['content'] .= ' | ';
		$data['content'] .= '<A href="' . base_url('index.php/ic/usuarios_edit/0/0') . '">' . msg('novo') . ' ' . msg('cracha') . '</a>';
		$this -> load -> view('content', $data);

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		//$form -> edit = true;
		$form -> novo = false;
		$form = $this -> usuarios -> row($form);

		//$form -> row_edit = base_url('index.php/usuario/edit');
		$form -> row_view = base_url('index.php/usuario/view');
		$form -> row = base_url('index.php/ic/usuarios/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_docentes');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliador_ativar($id = 0, $ac = '') {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		$form -> edit = true;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/ic/avaliador_ativar');
		$form -> row_view = base_url('index.php/avaliador/view');
		$form -> row = base_url('index.php/ic/avaliador_ativar');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_estudante');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores($sem_area = 0) {
		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();

		$menu = array();
		array_push($menu, array('novo_avaliador', 'ic/avaliador_ativar'));
		array_push($menu, array('zera_avaliador', 'avaliador/zera_convite_avaliador'));
		$data['menu'] = $menu;
		$this -> load -> view('header/menu_mini', $data);

		$data['content'] = $this -> avaliadores -> avaliadores_area($sem_area);
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
		$data['submenu'] = '<a href="' . base_url('index.php/ic/avaliadores/1') . '" class="lt0 link">sem áreas</a>';

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function protocolo_view($id = '', $chk = '') {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('protocolos_ic');
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();

		$data = $this -> protocolos_ic -> le($id);
		$proto = $data['pr_protocolo_original'];
		$tip = $data['pr_tipo'];

		/* Recupera Projeto */
		$data2 = $this -> ics -> le_protocolo($proto);

		$this -> load -> view('ic/plano', $data2);

		$data['content'] = '<h2>Dados do protocolo de serviço</h2>';
		$this -> load -> view('content', $data);

		$sta = $data['pr_status'];
		$this -> load -> view('ic/protocolo', $data);

		/**/
		if ($sta == 'A') {
			$form = new form;
			switch ($tip) {
				case 'CAN' :
					$cp = $this -> protocolos_ic -> cp_CAN();
					break;
				case 'SBS' :
					$cp = $this -> protocolos_ic -> cp_SBS();
					break;
				default :
					$data['content'] = '<h1><center><font color="red">Ações para este serviço não estão liberadas - ' . $tip . '</font></center></h1>';
					$this -> load -> view('content', $data);
					return ('');
					break;
			}

			/* Fomulário de Edição */
			$tela = $form -> editar($cp, '');
			$obj = array_merge($data, $data2);
			if ($form -> saved > 0) {
				switch ($tip) {
					/****************** cancelamento de protocolo *****/
					case 'CAN' :
						$cp = $this -> protocolos_ic -> protocolo_CAN($obj);
						break;
					/****************** cancelamento de protocolo *****/
					case 'SBS' :
						$cp = $this -> protocolos_ic -> protocolo_SBS($obj);
						break;
				}

				$data['content'] = 'FIM';
				$this -> load -> view('content', $data);
			} else {
				/* Mostra */
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			}
		} else {
			$data['content'] = '<center><h1><font color="red">Protocolo já encerrado!</font></h1></center>';
			$this -> load -> view('content', $data);
		}

		/* Detalhes do protocolo */
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function protocolo($status = '', $chk = '', $pag = '') {
		/* Load Models */
		$this -> load -> model('protocolos_ic');

		$this -> cab();
		$data = array();

		$data['title'] = msg('Protocolos') . ' ' . msg('protocolo_' . $status);

		$tabela = "(
						select * from ic_protocolos
						left join us_usuario on pr_solicitante = us_cracha
						left join ic_protocolos_tipo on ict_tipo = pr_tipo
						left join ic_protocolos_situacao on pts_status = pr_status
						where pr_status = '$status'
						order by id_pr desc, pr_hora desc
					) as ic_protocolo ";
		$form = new form;
		$form -> tabela = $tabela;
		$form -> see = true;
		$form -> novo = false;

		$form -> edit = TRUE;

		$form -> offset = 20;
		$form -> order = 'id_pr desc';
		$form -> row_edit = base_url('index.php/ic/edit');
		$form -> row_view = base_url('index.php/ic/protocolo_view/');

		$form -> row = base_url('index.php/ic/protocolo/' . $status . '/' . $chk);
		$form = $this -> protocolos_ic -> row($form);

		$tela = row($form, $pag);
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function avaliadores_row($id = 0) {

		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> avaliadores -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> avaliadores -> row($form);

		$form -> row_edit = base_url('index.php/ic/avaliadores');
		$form -> row_view = base_url('index.php/avaliadores/view');
		$form -> row = base_url('index.php/ic/avaliadores/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_avaliadores');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function discentes($id = 0) {

		/* Load Models */
		$this -> load -> model('estudantes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> estudantes -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> estudantes -> row($form);

		$form -> row_edit = base_url('index.php/ic/discente_edit');
		$form -> row_view = base_url('index.php/discente/view');
		$form -> row = base_url('index.php/ic/discentes/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_discentes');

		$data['content'] = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '" class="lt0 link">consultar SGA</a>' . $data['content'];

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function indicadores($id = 0) {

		/* Load Models */
		$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		//carrega grafico da situacao dos estudantes intercambistas
		$line = $this -> ics -> mostra_projetos_por_escolas();
		$data['dado'] = $line;
		$data['gr_frame'] = 'ic_escola';
		$data['gr_title'] = 'Projetos por Escolas';
		$data['gr_title_sub'] = 'Implementadas 2014-2015';
		$data['gr_x'] = 'Projetos';
		$data['gr_y'] = 'Escola';
		$data['show'] = false;
		$this -> load -> view('gadget/highchar_column.php', $data);

		$data = array();
		$line = $this -> ics -> mostra_projetos_por_escolas_professor();
		$data['dado'] = $line;
		$data['gr_frame'] = 'ic_professor_curso';
		$data['gr_title'] = 'Projetos da Escola Politécnica';
		$data['gr_title_sub'] = 'Implementadas 2014-2015';
		$data['gr_x'] = 'Projetos';
		$data['gr_y'] = 'Cursos';
		$data['show'] = false;
		$this -> load -> view('gadget/highchar_column.php', $data);

		$tela = '<table width="100%" border=1>';
		$tela .= '<tr>';
		$tela .= '<td width="50%">';
		$tela .= '<div id="ic_professor_curso"></div>';

		$tela .= '<td width="50%">';
		$tela .= '<div id="ic_escola"></div>';
		$tela .= '</table>';
		$data['content'] = $tela;

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function rp_cancelados($tipo = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');
		$cp = $this -> ics -> cp_switch();
		$data = array();
		$tela01 = '';
		$this -> cab();
		switch ($tipo) {
			case 'IC_FORM_RP' :
				$fld = 'ic_rp_data';
				$tit = 'Relatório Parcial';
				$ano = date("Y");
				if (date("m") < 8) {
					$ano = $ano - 1;
				}
				$tela01 = $this -> ics_acompanhamento -> relatorio_parcial_cancelados($ano);
				break;
			default :
				$fld = '';
				$tit = '';
				break;
		}

		$sx = '';
		if (strlen($fld) > 0) {
			/* Resumo de Entrega */
			$sx .= $this -> resumo_entrega($fld, $ano, $tit);
		}
		$data['content'] = $sx . $tela01;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function rp_nao_entregue($tipo = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');
		$cp = $this -> ics -> cp_switch();
		$data = array();
		$tela01 = '';
		$this -> cab();
		switch ($tipo) {
			case 'IC_FORM_RP' :
				$fld = 'ic_rp_data';
				$tit = 'Relatório Parcial';
				$ano = date("Y");
				if (date("m") < 8) {
					$ano = $ano - 1;
				}
				$tela01 = $this -> ics_acompanhamento -> relatorio_parcial_nao_entregue($ano);
				break;
			default :
				$fld = '';
				$tit = '';
				break;
		}

		$sx = '';
		if (strlen($fld) > 0) {
			/* Resumo de Entrega */
			$sx .= $this -> resumo_entrega($fld, $ano, $tit);
		}
		$data['content'] = $sx . $tela01;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	function entrega($tipo = '') {
		$sx = $this->rp_entregue($tipo);
		return($sx);
		}

	function rp_entregue($tipo = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');
		$cp = $this -> ics -> cp_switch();
		$data = array();
		$tela01 = '';
		$this -> cab();
		switch ($tipo) {
			case 'FORM_PROF' :
				$fld = 'ic_pre_data';
				$tit = 'Formulário do Professor';
				$ano = date("Y");
				if (date("m") < 8) { $ano = $ano - 1;
				}

				$tela01 = $this -> ics_acompanhamento -> form_acompanhamento_prof($ano);
				break;
			case 'IC_FORM_RP' :
				$fld = 'ic_rp_data';
				$tit = 'Relatório Parcial';
				$ano = date("Y");
				if (date("m") < 8) { $ano = $ano - 1;
				}

				$tela01 = $this -> ics_acompanhamento -> relatorio_parcial_entregue($ano);
				break;
			default :
				$fld = '';
				$tit = '';
				break;
		}

		$sx = '';
		if (strlen($fld) > 0) {
			/* Resumo de Entrega */
			$sx .= $this -> resumo_entrega($fld, $ano, $tit);
		}
		$data['content'] = $sx . $tela01;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function resumo_entrega_2($fld, $ano, $tit, $tp = 0) {
		$sql = "select 1 as ordem, count(*) as total, 'Entregue' as descricao, mb_tipo from ic
							INNER JOIN ic_aluno on ic_id = id_ic
							INNER JOIN ic_modalidade_bolsa ON id_mb = mb_id
							where ic_ano = '$ano' and s_id = 1 and $fld >= '2010-01-01'
							and icas_id = 1 group by mb_tipo
						union
						select 2 as ordem, count(*) as total, 'Não entregue' as descricao, mb_tipo from ic
							INNER JOIN ic_aluno on ic_id = id_ic
							INNER JOIN ic_modalidade_bolsa ON id_mb = mb_id
							where ic_ano = '$ano' and s_id = 1 and $fld <= '2010-01-01'
							and icas_id = 1 group by mb_tipo
						order by ordem";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="400" class="lt1 border1">';
		$sx .= '<tr><td colspan=2 class="lt2"><b>' . $tit . '</b></td></tr>';
		$sx .= '<tr><th>situação</th><th>total</th><th>percentual</th></tr>';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot = $tot + $line['total'];
		}

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			print_r($line);
			echo '<hr>';
			$sx .= '<tr><td align="right">' . $line['descricao'] . ' ' . $line['mb_tipo'] . '</td>';
			$sx .= '<td align="center" class="lt4">' . $line['total'] . '</td>';
			$sx .= '<td align="center">' . number_format(100 * ($line['total'] / $tot), 1, ',', '.') . '%</td>';
			$sx .= '</tr>';
		}
		$sx .= '<tr><td align="right">Total</td>
							<td align="center" class="lt5"><b>' . $tot . '</b></td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_entrega($fld, $ano, $tit) {
		$sql = "select 1 as ordem, count(*) as total, 'Entregue' as descricao from ic
							INNER JOIN ic_aluno on ic_id = id_ic
							INNER JOIN ic_modalidade_bolsa ON id_mb = mb_id
							where ic_ano = '$ano' and s_id = 1 and $fld >= '2010-01-01'
							and icas_id = 1
						union
						select 2 as ordem, count(*) as total, 'Não entregue' as descricao from ic
							INNER JOIN ic_aluno on ic_id = id_ic
							INNER JOIN ic_modalidade_bolsa ON id_mb = mb_id
							where ic_ano = '$ano' and s_id = 1 and $fld <= '2010-01-01'
							and icas_id = 1
						order by ordem";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="400" class="lt1 border1">';
		$sx .= '<tr><td colspan=2 class="lt2"><b>' . $tit . '</b></td></tr>';
		$sx .= '<tr><th>situação</th><th>total</th><th>percentual</th></tr>';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot = $tot + $line['total'];
		}

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr><td align="right">' . $line['descricao'] . '</td>';
			$sx .= '<td align="center" class="lt4">' . $line['total'] . '</td>';
			$sx .= '<td align="center">' . number_format(100 * ($line['total'] / $tot), 1, ',', '.') . '%</td>';
			$sx .= '</tr>';
		}
		$sx .= '<tr><td align="right">Total</td>
							<td align="center" class="lt5"><b>' . $tot . '</b></td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function indicar_avaliador($tipo = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ics_acompanhamento');
		$cp = $this -> ics -> cp_switch();
		$data = array();
		$tela01 = '';
		$this -> cab();
		switch ($tipo) {
			case 'FORM_PROF' :
				$fld = 'ic_pre_data';
				$tit = 'Formulário do Professor';
				$ano = date("Y");
				if (date("m") < 8) { $ano = $ano - 1;
				}

				$tela01 = $this -> ics_acompanhamento -> form_acompanhamento_prof($ano);
				break;
			case 'IC_FORM_RP' :
				$fld = 'ic_rp_data';
				$tit = 'Relatório Parcial';
				$ano = date("Y");
				if (date("m") < 8) { $ano = $ano - 1;
				}
				$sem_idicacao = 1;
				$tela01 = $this -> ics_acompanhamento -> relatorio_parcial_entregue($ano, $sem_idicacao);
				break;
			default :
				$fld = '';
				$tit = '';
				break;
		}

		$data['content'] = $tela01;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function indicacao_declinar($id, $chk = '') {
		/* Load Models */
		$this -> load -> model('ic_pareceres');

		$cp = $this -> ic_pareceres -> cp_declinar();

		$data = array();
		$this -> load -> view('header/header', $data);

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ic_pareceres -> tabela);

		$data['title'] = msg('lb_parecer_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			$this -> load -> view('header/windows_close', $data);
		}

	}
	
	function avaliacoes_situacao($tipo='', $status='')
		{
			$this->load->model('Ic_pareceres');
			$this->cab();
			
			$data = array();
			$data['title'] = msg('lb_ic_avaliaçãoes_pendentes');
			
			$this->ic_pareceres = 'pibic_parecer_'.date("Y");
			
			$tela = $this->Ic_pareceres->resumo_parecer();
			
			if(strlen($tipo) > 0){
				
				$tela .= $this->Ic_pareceres->resumo_parecer_mostrar($tipo, $status);
			
			}else{
				
			}
			
			$data['content'] = $tela;
			$this->load->view('content',$data);
			
			$this -> load -> view('header/content_close');
			$this -> load -> view('header/foot', $data);			
		}

	function acompanhamento() {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_switch();
		$data = array();

		$this -> cab();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Acompanhamento', 'Abrir / fechar sistemas (IC)', 'ITE', '/ic/acompanhamento_sw'));
		array_push($menu, array('Acompanhamento', 'Abrir / fechar sistemas (PIBIC MASTER)', 'ITE', '/ic/acompanhamento_ic_master_sw'));
		array_push($menu, array('Acompanhamento', 'Calendário de Entregas', 'ITE', '/ic/acompanhamento_data'));
		array_push($menu, array('Formulário de acompanhamento', 'Entrega de formlários', 'ITE', '/ic/entrega/FORM_PROF'));

		array_push($menu, array('Relatório Parcial', 'RP Entregues', 'ITE', '/ic/rp_entregue/IC_FORM_RP'));
		array_push($menu, array('Relatório Parcial', 'RP Não Entregues', 'ITE', '/ic/rp_nao_entregue/IC_FORM_RP'));
		array_push($menu, array('Relatório Parcial', 'RP cancelados', 'ITE', '/ic/rp_cancelados/IC_FORM_RP'));

		array_push($menu, array('Relatório Parcial', 'Indicar avaliador', 'ITE', '/ic/indicar_avaliador/IC_FORM_RP'));
		array_push($menu, array('Relatório Parcial', 'Devolver para submissão', 'ITE', '/ic/devolver_para_submissao/IC_FORM_RP'));
		array_push($menu, array('Relatório Parcial', 'Situação das avaliações', 'ITE', '/ic/avaliacoes_situacao'));
		
		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function devolver_para_submissao($tipo = '') {
		$this -> load -> model('ics');

		$this -> cab();
		switch ($tipo) {
			case 'IC_FORM_RP' :
				$title = 'Devolução para resubmissão do Relatório Parcial';
				$cp1 = 'ic_rp_data';
				$cp2 = 'ic_nota_rp';
				break;
			default :
				$data['content'] = $tipo . ' não implementado';
				$this -> load -> view('content', $data);
				return ('');
		}

		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$S8', '', 'Informe do protocolo', True, True));
		$form = new form;
		$tela = $form -> editar($cp, '');
		if ($form -> saved > 0) {
			/* abre resubmissao
			 */
			$proto = get("dd1");
			$aluno1 = 0;
			$aluno2 = 0;
			$motivo = '000';
			$ac = '179';
			$data = $this -> ics -> le_protocolo($proto);

			if (count($data) > 0) {
				/* atualiza base */
				$sql = "update ic set $cp1 = '0000-00-00', $cp2 = '-1' where ic_plano_aluno_codigo = '$proto' ";
				$rlt = $this -> db -> query($sql);

				/* insere historico */
				$this -> ics -> inserir_historico($proto, $ac, $title, $aluno1, $aluno2, $motivo, $obs = '');
				$this -> load -> view('ic/plano', $data);
				$this -> load -> view('sucesso', $data);
			} else {
				$data['title'] = $title;
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			}
		} else {
			$data['title'] = $title;
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
		}
	}

	function acompanhamento_sw() {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_switch();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = 1;
		/* IC */

		$tela = $form -> editar($cp, $this -> ics -> tabela_acompanhamento);

		$data['title'] = msg('ic_acomanhamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/acompanhamento'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento_ic_master_sw() {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_switch_ic_master();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = 2;
		/* IC */

		$tela = $form -> editar($cp, $this -> ics -> tabela_acompanhamento);

		$data['title'] = msg('ic_acomanhamento_title');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/acompanhamento'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento_data($id = 0) {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> cab();

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = 'ic_atividade';
		$form -> see = false;
		$form -> edit = true;
		$form -> novo = true;
		$form -> order = ' at_ano desc, at_data_ini desc ';
		$form = $this -> ics -> row_atividade($form);

		$form -> row_edit = base_url('index.php/ic/acompanhamento_data_ed');
		$form -> row_view = '';
		$form -> row = base_url('index.php/ic/acompanhamento_data/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('ic_entregas_do_sistema');

		$this -> load -> view('content', $data);
		$data = array();

		$form = new form;

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function acompanhamento_data_ed($id = 0) {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> cab();

		/* IC */
		$form = new form;
		$form -> id = $id;
		$form -> tabela = 'ic_atividade';
		$cp = $this -> ics -> cp_atividades();

		$tela = $form -> editar($cp, $form -> tabela);

		$data['title'] = msg('ic_acomanhamento_data');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/ic/acompanhamento'));
		}
	}

	function view($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('ic_pareceres');
		$this -> load -> model('geds');

		$data = $this -> ics -> le($id);

		$this -> cab();

		$this -> load -> view('ic/plano', $data);

		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($data['ic_plano_aluno_codigo'], 'ic');
		$data['ged_arquivos'] = $this -> geds -> form_upload($data['ic_plano_aluno_codigo'], 'ic');
		$this -> load -> view('ged/list_files', $data);

		/****/
		/* Submissões IC */
		$this -> load -> model("ics");
		$subm = $this -> ics -> submissoes_abertas();

		/***** RELATARIO PARCIAL ***/

		if (($subm['sw_06'] == '1') and ($data['ic_rp_data'] < '2010-01-01')) {
			$data['content'] = 'FORM';
			$cp = array();
			array_push($cp, array('$HV', 'id_ic', $id, False, True));
			array_push($cp, array('$A', '', 'Finalização do Relatório Parcial', False, True));
			array_push($cp, array('$D8', 'ic_rp_data', 'Data entrega', True, True));
			$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
			array_push($cp, array('$Q ac_cnpq:ac_nome_area:' . $sql, 'ic_semic_area', msg('area_conhecimento'), True, True));
			array_push($cp, array('$HV', 'ic_nota_rp', '0', True, True));
			$form = new form;
			$form -> id = $id;
			$tela = $form -> editar($cp, 'ic');
			$tela = '<div class="bg_lgreen">' . $tela . '</div>';
			$data['content'] = $tela;

			if ($form -> saved > 0) {
				redirect(base_url('index.php/ic/view/' . $id . '/' . checkpost_link($id)));
				exit ;
			}

			$this -> load -> view('content', $data);
		}

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

		/* Indicação relatório parcial */
		if (($data['ic_rp_data'] > 0) and ($data['ic_nota_rp'] < 1)) {
			if ($this -> ic_pareceres -> existe_documento($protocolo, 'RELAP') == 1) {

				if ($this -> ic_pareceres -> existe_indicacao($protocolo, 'RPAR') == 0) {
					$area = $data['ic_semic_area'];
					$tela = $this -> ic_pareceres -> mostra_indicacoes_interna($protocolo, 'RPAR', $area, $data);
					$data['sa'] = $tela;
					$this -> load -> view('ic/avaliador_indicar_tipo_1', $data);
					if (get("dd1") > 0) {
						redirect(base_url('index.php/ic/view/' . $id . '/' . $check));
					}
				}
			} else {
				$tela = '<h1><font color="red">Problemas ao abrir o arquivo do relatório Parcial enviado</font></h1>';
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			}
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ativar_plano($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		/* Form */
		$form = new form;
		$cp = $this -> ics -> cp_ativar();

		$data['form'] = $form -> editar($cp, '');
		if ($form -> saved > 0) {
			$ic = $this -> ics -> le($id);
			$estudante = $ic['ic_cracha_aluno'];

			/* Recupera ID do aluno */
			$estud = $this -> usuarios -> le_cracha($estudante);
			$ide = $estud['id_us'];

			$vg_d1 = $this -> input -> post("dd2");
			$vg_d2 = $this -> input -> post("dd3");
			$dt1 = $this -> input -> post("dd4");
			$dt2 = $this -> input -> post("dd5");
			$tipo = $this -> input -> post("dd6");
			$situacao = $this -> input -> post("dd7");

			$this -> ics -> ativar_bolsa($id, $ide, $estudante, $vg_d1, $vg_d2, $dt1, $dt2, $tipo, $situacao);

			redirect(base_url('index.php/ic/view/' . $id . '/' . checkpost_link($id)));
			exit ;
		}

		$this -> load -> view('ic/plano_ativar_form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function resumo_autores($id = '', $check = '') {
		/* Load Models */
		$this -> load -> model('ics');

		/* Form */
		$save = $this -> input -> post("acao");
		$nome = utf8_decode($this -> input -> post("dd10"));
		$tipo = $this -> input -> post("dd11");
		$instituicao = utf8_decode($this -> input -> post("dd12"));
		$msg = '';

		if ($save == 'ADD') {
			$msg = $this -> ics -> resumo_inserir_autor($id, $nome, $tipo, $instituicao);
		}
		if ($save == 'DEL') {
			$msg = $this -> ics -> resumo_remove_autor($nome);
			$msg = 'REMOVIDO';
			;
		}

		$data = array();
		$data['content'] = $this -> ics -> resumo_autores_mostra($id);
		$this -> load -> view('content', $data);
		$data['id'] = $id;
		$data['check'] = $check;
		$data['msg'] = $msg;

		$this -> load -> view('ic/postar_resumo_autores', $data);
	}

	function postar_resumo($id = '', $check = '', $page = '') {
		global $dd;
		/* Load Models */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		/* Valida de existe resumo postado */
		$rs = $this -> ics -> resumo_postado($id);

		/* Trata variavies */
		if (strlen($page) > 0) {

		} else {
			$page = $this -> input -> post("page");
		}
		$page = round($page);

		$data = $this -> ics -> le($id);

		$this -> cab();
		$this -> load -> view('ic/plano', $data);

		$bp = array();

		$bp['1'] = 'Informa o titulo do trabalho';
		$bp['2'] = 'autores do trabalho';
		$bp['3'] = 'resumo em português';
		$bp['4'] = 'resumo em inglês';
		$bp['5'] = 'confirmar';

		/* Dados */
		$data['acao'] = $this -> input -> post("acao");
		$data['dd1'] = $this -> input -> post("dd1");
		$data['dd2'] = $this -> input -> post("dd2");
		$data['dd3'] = $this -> input -> post("dd3");
		$data['dd4'] = $this -> input -> post("dd4");
		$data['dd5'] = $this -> input -> post("dd5");
		$data['dd6'] = $this -> input -> post("dd6");

		/* Finalizado */
		if ($page > count($bp)) {
			$url = base_url('index.php/ic/view/' . $id . '/' . $check);
			redirect($url);
			exit ;
		}
		if ($page < 1) { $page = 1;
		}

		$data['bp_atual'] = $page;
		$data['bp'] = $bp;
		$data['bp_link'] = base_url('index.php/ic/postar_resumo/' . $id . '/' . $check . '/');

		$data['bar'] = $this -> load -> view('gadget/progressbar_vertical_bar.php', $data, true);

		/* Recupera informacoes */
		if (strlen($data['acao']) == 0) {
			$protocolo = $data['ic_plano_aluno_codigo'];
			$rs = $this -> ics -> le_resumo($protocolo);

			/* Página 1 */
			if ($page == '1') {
				$data['dd1'] = $rs['sm_titulo'];
				$data['dd2'] = $rs['sm_titulo_en'];
			}
		} else {
			$rs = array();
			$redirect = $this -> ics -> salvar_resumo($page, $data);

			if ($redirect == 1) {
				$url = base_url('index.php/ic/postar_resumo/' . $id . '/' . $check . '/' . ($page + 1));
				redirect($url);
				exit ;
			}
		}

		switch ($page) {
			case '1' :
				$this -> load -> view('ic/postar_resumo_1', $data);
				break;
			case '2' :
				$this -> load -> view('ic/postar_resumo_2', $data);
				break;
			case '3' :
				$form = new form;
				$cp = $form -> cp = $this -> ics -> cp_resumo_1();
				$data['tela'] = $form -> editar($cp, '');
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_3', $data);
				break;
			case '4' :
				$form = new form;
				$cp = $form -> cp = $this -> ics -> cp_resumo_2();
				$data['tela'] = $form -> editar($cp, '');
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_4', $data);
				break;
			case '5' :
				$data['line'] = $rs;
				$this -> load -> view('ic/postar_resumo_5', $data);
				break;
			default :
				echo 'ops' . $page;
				break;
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0, $check = '') {
		/* Load Models */
	}

	/**** GEDS */
	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> page = base_url('index.php/ic/ged/' . $id);

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '';
		$this -> geds -> download($id);
	}

	function ged_lock($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '_document/ic/';
		$this -> geds -> file_lock($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ic_ged_documento';
		$this -> geds -> file_path = '_document/ic/';
		$this -> geds -> file_delete($id);
	}

	function form($plano = 0, $check = '') {

		/* Load Models */
		$this -> load -> model('ics');
		$data = $this -> ics -> le_form_prof($plano);
		$this -> load -> view('header/header', $data);

		$this -> load -> view('ic/mostra_acompanhamento_prof', $data);

	}

}
