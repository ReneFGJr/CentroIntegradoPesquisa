<?php
class ic extends CI_Controller {

	function avaliadores_set() {
		/* Load Models */
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> regra_avaliadores();
		redirect(base_url('index.php/ic'));
	}

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
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

		array_push($menus, array('Pessoas', 'index.php/ic/usuarios'));
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));
		array_push($menus, array('Acompanhamento', 'index.php/ic/acompanhamento'));
		array_push($menus, array('Pagamentos', 'index.php/ic/pagamentos'));
		array_push($menus, array('Relatórios', 'index.php/ic/report'));
		array_push($menus, array('Comunicação', 'index.php/ic/comunicacao/'));
		array_push($menus, array('Indicadores', 'index.php/ic/indicadores'));
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

	function pagamento_cracha($cracha='',$chk='')
		{
			$this->load->model('ics');
			$data['content'] = $this->ics->pagamentos_ic($cracha);
			$this->load->view('content',$data);
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
		$this -> load -> view('header/content_open');

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

		array_push($menu, array('Entregas', 'Formulário de acompanhamento', 'ITE', '/ic/acompanhamento'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
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
		array_push($menu, array('Relatórios', 'Guia do Estudante', 'ITE', '/ic/report_guia'));

		array_push($menu, array('Orientadores', 'Dados dos orientadores', 'ITE', '/ic/report_orientadores'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */	/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

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

	function comunicacao($id = 0, $gr = 0, $tp = 0) {
		/* Load Models */
		$this -> load -> model('comunicacoes');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

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
		$form -> row = base_url('index.php/ic/comunicacao/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('messagem_cadastradas');

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
		$this->load->view('form/form_file_upload',$data);
		
		/* Arquivo enviado */
		if (isset($_FILES['arquivo']['tmp_name']))
			{
			    $nome = lowercasesql($_FILES['arquivo']['name']);
    			$temp = $_FILES['arquivo']['tmp_name'];
				$size = $_FILES['arquivo']['size'];
				
				$data['content'] = $this->pagamentos->processa_seq($temp);
				$this->load->view('content',$data);
			}

		/*Fecha */ 		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha($date = '', $action = '') {
		$ano1 = date("Y");
		if (date("m") < 10)
			{
				$ano1--;
			}
		$ano2 = $ano1+2;
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

		/*Fecha */ 		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function pagamento_planilha_compromisso($date = '', $action = '') {
		$ano1 = date("Y");
		if (date("m") < 10)
			{
				$ano1--;
			}
		$ano2 = $ano1+2;
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

		/*Fecha */ 		/*Gera rodapé*/
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
			exit;
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

		/*Fecha */ 		/*Gera rodapé*/
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

	function avaliadores($id = 0) {
		/* Load Models */
		$this -> load -> model('avaliadores');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$menu = array();
		array_push($menu, array('novo_avaliador', 'ic/avaliador_ativar'));
		$data['menu'] = $menu;
		$this -> load -> view('header/menu_mini', $data);

		$data['content'] = $this -> avaliadores -> avaliadores_area();
		$data['title'] = msg('Avaliadores') . ' ' . msg('e') . ' ' . msg('Areas');
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

	function entrega($tipo = '') {
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

				$tela01 = $this -> ics_acompanhamento -> form_acompanhamento_prof($ano);
				break;
			case 'IC_FORM_RP' :
				$fld = 'ic_rp_data';
				$tit = 'Relatório Parcial';
				$ano = date("Y");
				echo "OLA";
				$tela01 = $this -> ics_acompanhamento -> form_acompanhamento_prof($ano);
				break;				
			default :
				$fld = '';
				$tit = '';
				break;
		}

		$sx = '';
		if (strlen($fld) > 0) {
			$sql = "select 1 as ordem, count(*) as total, 'Entregue' as descricao from ic
							where ic_ano = '$ano' and s_id = 1 and $fld >= '2010-01-01'
						union
						select 2 as ordem, count(*) as total, 'Não entregue' as descricao from ic
							where ic_ano = '$ano' and s_id = 1 and $fld <= '2010-01-01'
						order by ordem";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$sx .= '<table width="400" class="lt1 border1">';
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
		}
		$data['content'] = $sx . $tela01;
		$this -> load -> view('content', $data);

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
		array_push($menu, array('Acompanhamento', 'Abrir ou fechar sistemas', 'ITE', '/ic/acompanhamento_sw'));
		array_push($menu, array('Acompanhamento', 'Calendário de Entregas', 'ITE', '/ic/acompanhamento_data'));
		array_push($menu, array('Formulário de acompanhamento', 'Entrega de formlários', 'ITE', '/ic/entrega/FORM_PROF'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
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

	function acompanhamento_data($id=0) {
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

function acompanhamento_data_ed($id=0) {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> cab();
	
		
		/* IC */
		$form = new form;
		$form -> id = $id;
		$form -> tabela = 'ic_atividade';
		$cp = $this->ics->cp_atividades();
		
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
		$this -> load -> model('geds');

		$data = $this -> ics -> le($id);

		$this -> cab();

		$this -> load -> view('ic/plano', $data);

		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($data['ic_plano_aluno_codigo'], 'ic');
		$data['ged_arquivos'] = $this -> geds -> form_upload($data['ic_plano_aluno_codigo'], 'ic');
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
