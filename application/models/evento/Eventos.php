<?php
class eventos extends CI_model {
	var $tabela = 'evento_nome';
	var $tabela_mailing = 'evento_mailing';
	var $tabela_usuario = 'us_usuario';
	var $tano_evento = '2014';

	function resumo_presenca() {
		if (!isset($_SESSION['evento'])) {
			echo 'Evento n�o selecionado';
			exit ;
		}
		$id = $_SESSION['evento'];

		$sql = "select ei_evento_confirmar, count(*) as total 
				from evento_inscricao 
					where ei_evento_id = $id 
					and ei_status > 0
				group by ei_evento_confirmar ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$ps = 0;
		$au = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if ($line['ei_evento_confirmar'] == '1') {
				$ps = $ps + $line['total'];
			}
			if ($line['ei_evento_confirmar'] == '0') {
				$au = $au + $line['total'];
			}
		}
		$sx = '<table width="500" align="center">';
		$sx .= '<tr><th width="33%">Inscritos</th>
					<th width="33%">Presentes</th>
					<th width="33%">Total</th>
					</tr>';
		$sx .= '<tr align="center" class="lt5">
					<td width="33%" class="border1">' . $au . '</td>
					<td width="33 %" class="border1">' . $ps . '</td>
					<td width="33%" class="border1">' . ($au + $ps) . '</td>
					</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	
	function emitir($evento, $tipo, $ano, $us) {
		$cracha = $us['us_cracha'];
		$id = $us['id_us'];
		$err = '';

		/*#############################################################################################*/
		/*#######################     INICIACAO CIENTIFICA DE 2013      ###############################*/
		/*#############################################################################################*/
		/*****************************
		 * Declaracao de Estudante
		*****************************/
		if (($evento == 'SEMIC') and ($ano == '2013')) {
			/* Estudante */
			if ($tipo == 'ESTUDANTE') {
				$sql = "select * from ic_aluno
								left join ic on id_ic = ic_id	 
								where aluno_id = '$id'
								and (icas_id = 1 or icas_id = 4)					 
							 ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				if (count($rlt) > 0) {
					$line = $rlt[0];
					$proto = $line['ic_plano_aluno_codigo'];

					/* recupera dados do professor */
					$prof = $this -> usuarios -> le_cracha($line['ic_cracha_prof']);
					$id2 = $prof['id_us'];
					/* ID da declaracao de ouvinte - 25 */
					$this -> insere_declaracao($id, $id2, 25, $proto);
				}
			}

		/*****************************
		* Declaracao de AVALIADOR
		*****************************/
			if ($tipo == 'AVALIADOR') {
				/* Declaracao de Avaliador */
				$cracha = strzero($cracha, 8);
				$sql = "select count(*) as total, pp_avaliador 
									from pibic_parecer_2013
									where pp_avaliador = '$cracha' 
									group by pp_avaliador 
									and pp_tipo = 'SEMIC' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					$line = $rlt[0];
					$total = $line['total'];
					if ($total > 0) {
						/* ID da declaracao de avaliador - 2 */
						$this -> insere_declaracao($id, 0, 26);

					}
				}
			}

		/*****************************
		* Declaracao de ORIENTADOR
		*****************************/
			if ($tipo == 'ORIENTADOR') {
				/* Declaracao de Estudante SEMIC */
				$cracha = strzero($cracha, 8);
				$sql = "select * from ic 
									inner join ic_aluno on id_ic = ic_id
									where ic_cracha_prof = '$cracha' 
										and ic_ano = 2012 
										and s_id = 4 
										and icas_id = 4";

				$qrlt = $this -> db -> query($sql);
				$qrlt = $qrlt -> result_array();

				for ($rq = 0; $rq < count($qrlt); $rq++) {

					$line = $qrlt[$rq];
					$protocolo = $line['ic_plano_aluno_codigo'];
					$id2 = $line['aluno_id'];

					/* ID da declaracao de avaliador - 7 */
					if ($id2 > 0) {
						$this -> insere_declaracao($id, $id2, 27, $protocolo);
					}
				}
			}
		}


		/*#############################################################################################*/
		/*#######################     CICPG DE 2014      ###############################*/
		/*#############################################################################################*/
		/*****************************
		 * Declaracao de Estudante
		*****************************/
		if (($evento == 'SEMIC') and ($ano == '2014')) {
			/* Estudante */
			if ($tipo == 'ESTUDANTE') {
				$sql = "select * from ic_aluno
								left join ic on id_ic = ic_id	 
								where aluno_id = '$id'
								and (icas_id = 1 or icas_id = 4)					 
							 ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				if (count($rlt) > 0) {
					$line = $rlt[0];
					$proto = $line['ic_plano_aluno_codigo'];

					/* recupera dados do professor */
					$prof = $this -> usuarios -> le_cracha($line['ic_cracha_prof']);
					$id2 = $prof['id_us'];
					/* ID da declaracao de ouvinte  */
					$this -> insere_declaracao($id, $id2, 28, $proto);
				}
			}

		/*****************************
		* Declaracao de AVALIADOR
		*****************************/
			if ($tipo == 'AVALIADOR') {
				/* Declaracao de Avaliador */
				$cracha = strzero($cracha, 8);
				$sql = "select count(*) as total, pp_avaliador 
									from pibic_parecer_2013
									where pp_avaliador = '$cracha' 
									group by pp_avaliador 
									and pp_tipo = 'SEMIC' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					$line = $rlt[0];
					$total = $line['total'];
					if ($total > 0) {
						/* ID da declaracao de avaliador */
						$this -> insere_declaracao($id, 0, 29);

					}
				}
			}

		/*****************************
		* Declaracao de ORIENTADOR
		*****************************/
			if ($tipo == 'ORIENTADOR') {
				/* Declaracao de Estudante SEMIC */
				$cracha = strzero($cracha, 8);
				$sql = "select * from ic 
									inner join ic_aluno on id_ic = ic_id
									where ic_cracha_prof = '$cracha' 
										and ic_ano = 2013 
										and s_id = 4 
										and icas_id = 4";

				$qrlt = $this -> db -> query($sql);
				$qrlt = $qrlt -> result_array();

				for ($rq = 0; $rq < count($qrlt); $rq++) {

					$line = $qrlt[$rq];
					$protocolo = $line['ic_plano_aluno_codigo'];
					$id2 = $line['aluno_id'];

					/* ID da declaracao de avaliador - 7 */
					if ($id2 > 0) {
						$this -> insere_declaracao($id, $id2, 30, $protocolo);
					}
				}
			}
		}





		/*#############################################################################################*/
		/*#######################     SWB 2015                          ###############################*/
		/*#############################################################################################*/
		/* Evento SWB */
		if ($evento == 'SWB') {

			if ($ano == '$tano_evento') {
				/* OUVINTE */

				if ($tipo == 'SWB2') {
					/* Declaracao de Ouvite */
					$sql = "select * from evento_inscricao 
									where ei_us_usuario_id = '$id'
									and ei_evento_confirmar = 1 
									 ";

					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();
					if (count($rlt) > 0) {
						/* ID da declaracao de ouvinte - 9 */
						$this -> insere_declaracao($id, 0, 22);
					}
				}
			}
		}

		/*#############################################################################################*/
		/*#######################    Evento SEMIC - SENAI 2015          ###############################*/
		/*#############################################################################################*/
		if ($evento == 'SENAI') {
			if ($ano == '$tano_evento') {
				/* OUVINTE */
				if ($tipo == 'APRESENTACAO') {
					/* Declaracao de Ouvite */
					$sql = "select * from semic_nota_trabalhos
							left join us_usuario on st_professor = us_cracha
							left join (select pp_protocolo from pibic_parecer_2015 group by pp_protocolo) as avaliacao on pp_protocolo = st_codigo 
							where st_aluno = '$cracha' and st_edital = 'SENAI'
							and (st_poster = 'S' or st_oral = 'S') ";

					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();
					if (count($rlt) > 0) {
						/* ID da declaracao de ouvinte - 9 */
						$this -> insere_declaracao($id, 0, 24);
					}
				}
			}
		}
		/*#############################################################################################*/
		/*#######################    Evento SEMIC 2015                  ###############################*/
		/*#############################################################################################*/
		if ($evento == 'SEMIC') {
			if ($ano == '$tano_evento') {
				/* OUVINTE */
				if ($tipo == 'OUVINTE') {
					/* Declaracao de Ouvite */
					$cracha = strzero($cracha, 11);
					$sql = "select count(*) as total, r_id from evento_registro where r_id = '$cracha' group by r_id ";
					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();
					if (count($rlt) > 0) {
						$line = $rlt[0];
						$total = $line['total'];
						if ($total > 5) {
							/* ID da declaracao de ouvinte - 9 */
							$this -> insere_declaracao($id, 0, 9);
						}
					}
				}

				/* AVALIADOR */
				if ($tipo == 'AVALIADOR') {
					/* Declaracao de Avaliador */
					$sql = "select count(*) as total, pp_avaliador_id 
							from pibic_parecer_2015
						where pp_avaliador_id = '$id' group by pp_avaliador_id 
						and pp_tipo = 'SEMIC' ";
					$rlt = $this -> db -> query($sql);

					print_r($rlt);
					exit ;

					$rlt = $rlt -> result_array();
					if (count($rlt) > 0) {
						$line = $rlt[0];
						$total = $line['total'];
						if ($total > 0) {
							/* ID da declaracao de avaliador - 2 */
							$this -> insere_declaracao($id, 0, 2);
						}
					}
				}

				/* ORIENTADOR */
				if ($tipo == 'ORIENTADOR') {

					/* Declaracao de Estudante SEMIC */
					$cracha = strzero($cracha, 8);
					$sql = "select * from semic_nota_trabalhos
							left join us_usuario on st_aluno = us_cracha
							left join (select pp_protocolo from pibic_parecer_2015 group by pp_protocolo) as avaliacao on pp_protocolo = st_codigo 
							where st_professor = '$cracha'
							and (st_poster = 'S' or st_oral = 'S') ";
					$qrlt = $this -> db -> query($sql);
					$qrlt = $qrlt -> result_array();

					for ($rq = 0; $rq < count($qrlt); $rq++) {
						$line = $qrlt[$rq];

						$protocolo = $line['st_codigo'];

						$sql = "SELECT * FROM semic_nota_trabalhos 
							left join ( select pp_protocolo as pp_cp, pp_p19, max(pp_p01) as nota from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'POSTE' group by pp_protocolo) as tabela on st_codigo = pp_cp 
							left join ( select pp_protocolo as pp_co, pp_p19 as pp_p19a, max(pp_p01) as nota_a from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'ORAL' group by pp_protocolo) as tabela2 on st_codigo = pp_co 
						WHERE (st_codigo = '$protocolo')";
						$rrr = $this -> db -> query($sql);
						$rrr = $rrr -> result_array();

						/* Regra de valida��o */
						$ok = 1;
						$err = '';
						$ll = $rrr[0];
						if (($ll['st_poster'] == 'S') and (round($ll['nota']) < 40)) { $ok = 0;
							$err .= '<br>Erro #404/' . $protocolo . '<br>';
						}
						if (($ll['st_oral'] == 'S') and (round($ll['nota_a']) < 40)) { $ok = 0;
							$err .= '<br>Erro #405/' . $protocolo . '<br>';
						}

						if ($ok == 1) {
							$id2 = $line['id_us'];
							/* ID da declaracao de avaliador - 7 */
							if ($id2 > 0) {
								$this -> insere_declaracao($id, $id2, 7, $protocolo);
							}
						}
					}
				}

				/* ESTUDANTE */
				if ($tipo == 'ESTUDANTE') {
					/* Declaracao de Estudante SEMIC */
					$cracha = strzero($cracha, 8);
					$sql = "select * from semic_nota_trabalhos
							left join us_usuario on st_professor = us_cracha
							left join (select pp_protocolo from pibic_parecer_2015 group by pp_protocolo) as avaliacao on pp_protocolo = st_codigo 
							where st_aluno = '$cracha'
							and (st_poster = 'S' or st_oral = 'S') ";
					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();
					for ($r = 0; $r < count($rlt); $r++) {
						$line = $rlt[$r];

						$protocolo = $line['st_codigo'];

						$sql = "SELECT * FROM semic_nota_trabalhos 
							left join ( select pp_protocolo as pp_cp, pp_p19, max(pp_p01) as nota from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'POSTE' group by pp_protocolo) as tabela on st_codigo = pp_cp 
							left join ( select pp_protocolo as pp_co, pp_p19 as pp_p19a, max(pp_p01) as nota_a from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'ORAL' group by pp_protocolo) as tabela2 on st_codigo = pp_co 
						WHERE (st_codigo = '$protocolo')";
						$rrr = $this -> db -> query($sql);
						$rrr = $rrr -> result_array();

						/* Regra de valida��o */
						$ok = 1;
						$err = '';
						$ll = $rrr[0];
						if (($ll['st_poster'] == 'S') and (round($ll['nota']) < 40)) { $ok = 0;
							$err .= '<br>Erro #404/' . $protocolo . '<br>';
						}
						if (($ll['st_oral'] == 'S') and (round($ll['nota_a']) < 40)) { $ok = 0;
							$err .= '<br>Erro #405/' . $protocolo . '<br>';
						}

						$id2 = $line['id_us'];
						if ($ok == 1) {
							/* ID da declaracao de avaliador - 7 */
							$this -> insere_declaracao($id, $id2, 12, $protocolo);
							return ('');
						} else {
							$err = 'Erro na gera��o da declara��o de participa��o, entre em contato com pibicpr@pucpr.br e informe o c�digo ' . $err;
							return ($err);
						}
					}
				}
				/* APRESENTACAO DE TRABALHO */
				if ($tipo == 'APRESENTACAO') {

					/* Declaracao de Estudante SEMIC que apresentou trabalho*/
					$cracha = strzero($cracha, 8);
					$sql = "select * from semic_nota_trabalhos
							left join us_usuario on st_professor = us_cracha
							left join (select pp_protocolo from pibic_parecer_2015 group by pp_protocolo) as avaliacao on pp_protocolo = st_codigo 
							where st_aluno = '$cracha'
							and (st_poster = 'S' or st_oral = 'S') ";

					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();
					for ($r = 0; $r < count($rlt); $r++) {
						$line = $rlt[$r];

						$protocolo = $line['st_codigo'];

						$sql = "SELECT * FROM semic_nota_trabalhos 
							left join ( select pp_protocolo as pp_cp, pp_p19, max(pp_p01) as nota from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'POSTE' group by pp_protocolo) as tabela on st_codigo = pp_cp 
							left join ( select pp_protocolo as pp_co, pp_p19 as pp_p19a, max(pp_p01) as nota_a from pibic_parecer_2015 
											where pp_tipo = 'SEMIC' and pp_p19 = 'ORAL' group by pp_protocolo) as tabela2 on st_codigo = pp_co 
						WHERE (st_codigo = '$protocolo')";
						$rrr = $this -> db -> query($sql);
						$rrr = $rrr -> result_array();

						/* Regra de valida��o */
						$ok = 1;
						$err = '';
						$ll = $rrr[0];
						if (($ll['st_poster'] == 'S') and (round($ll['nota']) < 40)) { $ok = 0;
							$err .= '<br>Erro #504/' . $protocolo . '<br>';
						}
						if (($ll['st_oral'] == 'S') and (round($ll['nota_a']) < 40)) { $ok = 0;
							$err .= '<br>Erro #505/' . $protocolo . '<br>';
						}

						$id2 = $line['id_us'];
						echo $err;
						if ($ok == 1) {
							/* ID da declaracao de avaliador - 7 */
							$tipop = 21;
							if (($ll['st_poster'] == 'S') and ($ll['st_oral'] != 'S')) { $tipop = 21;
							}
							if (($ll['st_poster'] != 'S') and ($ll['st_oral'] == 'S')) { $tipop = 18;
							}
							if (($ll['st_poster'] == 'S') and ($ll['st_oral'] == 'S')) { $tipop = 15;
							}

							$this -> insere_declaracao($id, 0, $tipop, $protocolo);
							return ('');
						} else {
							$err = 'Erro na gera��o da declara��o de participa��o, entre em contato com pibicpr@pucpr.br e informe o c�digo ' . $err;
							return ('');
						}
					}
				}
			}
		}
	}

	function valida_certificado($id) {
		$sql = "select * from central_declaracao
					inner join central_declaracao_evento on id_cde = dc_tipo
					inner join (select us_nome as nome_1, id_us as id_us_1, us_genero as us_g1 from us_usuario) as user_1 on id_us_1 = dc_us_usuario_id 
					left join (select us_nome as nome_2, id_us as id_us_2, us_genero as us_g2 from us_usuario) as user_2 on id_us_2 = dc_us_usuario_id_2
					left join ic on ic_plano_aluno_codigo = dc_texto_1 
					inner join ic_aluno as pa on ic_id = id_ic
					left join ic_modalidade_bolsa as mode on mb_id = id_mb
					where id_dc = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$rt = array();
		} else {
			$rt = $rlt[0];
		}
		return ($rt);
	}

	function mostra_declaracoes($us1) {
		$sql = "select * from central_declaracao
						inner join central_declaracao_evento on dc_tipo = id_cde 
						left join us_usuario on id_us = dc_us_usuario_id_2
						where dc_us_usuario_id = $us1 order by dc_data desc ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="800" class="lt2" cellpadding=10 cellspacing=0 border=1 align="center">';
		$sx .= '<tr><td class="lt4" colspan=2 >Declara��es dispon�veis</td></tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$url = base_url('index.php/central_declaracao/declaracao/' . $line['id_dc'] . '/' . checkpost_link($line['id_dc']));
			$link = '<A href="#" onclick="newxy(\'' . $url . '\',1024,640);" class="link lt2">';
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link;
			$sx .= $line['cde_nome'];
			$sx .= '</a>';

			$sx .= '</td>';
			$sx .= '<td width="50%">';

			/* Nome do aluno ou orientador */
			$nome = trim($line['us_nome']);
			$idd = $line['id_us'];
			if ($idd > 0) {
				$sx .= $nome;
			}
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function insere_declaracao($us1, $us2, $tipo, $protocolo = '') {
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		if (strlen($us2) == 0) { $us2 = 0;}
		
		$sql = "select * from central_declaracao 
						where dc_us_usuario_id = $us1
						and dc_us_usuario_id_2 = $us2
						and dc_tipo = $tipo	
						and dc_texto_1 = '$protocolo'
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (0);
		}

		$sql = "insert into central_declaracao
					(dc_us_usuario_id, dc_us_usuario_id_2, dc_tipo,
					dc_data, dc_hora, dc_texto_1
					) values (
					'$us1', '$us2', '$tipo',
					'$data', '$hora','$protocolo')";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function enviar_email($id = 0, $msg = '') {
		global $email_own;
		/* Perfil do usu�rio */
		$this -> load -> model('email_local');
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		$t = $this -> show_mailing($id);
		$texto = $t['ml_html'];
		$ass = $t['ml_subject'];
		$sql = $t['ml_query'];
		$email_own = 2;
		$idu = 1;

		$sql = troca($sql, '�', "'");
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idu = $line['id_us'];
			enviaremail_usuario($idu, $ass, $texto, 2);
		}
	}

	function enviar_email_test($id = 0) {
		global $email_own;
		/* Perfil do usu�rio */
		$this -> load -> model('email_local');
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);
		$t = $this -> show_mailing($id);
		$texto = $t['ml_html'];
		$ass = $t['ml_subject'];
		$sql = $t['ml_query'];
		$email_own = 2;
		$idu = $_SESSION['id_us'];
		/* Recupera Dados */
		$sql = "select * from logins where id_us = " . round($idu);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$cpf = $line['us_cpf'];

		/* Recupera Dados */
		$sql = "select * from us_usuario where us_cpf = '$cpf'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$idu = 0;
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$idu = $line['id_us'];
		}

		enviaremail_usuario($idu, $ass, $texto, 2);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ev', '', False, True));
		array_push($cp, array('$S100', 'ev_nome', msg('ev_nome'), True, True));
		array_push($cp, array('$D8', 'ev_de', msg('ev_de'), True, True));
		array_push($cp, array('$D8', 'ev_ate', msg('ev_ate'), True, True));
		array_push($cp, array('$S100', 'ev_logo', msg('ev_logo'), False, True));
		array_push($cp, array('$O 1:SIM&0:N�O', 'ev_ativo', msg('ev_ativo'), True, True));
		array_push($cp, array('$T80:4', 'ev_query', msg('ev_lista'), False, True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function cp_mailing() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ml', '', False, True));
		array_push($cp, array('$Q id_ev:ev_nome:select * from ' . $this -> tabela . ' order by ev_de', 'ml_ev', msg('ml_ev'), True, True));
		array_push($cp, array('$S100', 'ml_subject', msg('ml_subject'), True, True));
		array_push($cp, array('$T80:10', 'ml_html', msg('ml_html'), True, True));

		array_push($cp, array('$D8', 'ml_data', msg('ml_data'), True, True));
		array_push($cp, array('$T80:3', 'ml_query', msg('ml_query'), False, True));
		array_push($cp, array('$O 1:ENVIADO&0:PARA ENVIAR', 'ml_status', msg('ml_status'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function cp_editar_status() {

		$cp = array();
		array_push($cp, array('$H8', 'id_ei', '', False, True));
		array_push($cp, array('${', '', 'Dados da inscri��o no evento', false, false));
		array_push($cp, array('$S20', 'ei_us_usuario_id', msg('N� da inscri��o'), false, false));
		array_push($cp, array('$O 1:SIM&0:N�O', 'ei_status', msg('Inscrito'), false, True));
		array_push($cp, array('$S30', 'ei_data_inscricao', msg('Data da Inscri��o'), false, false));
		array_push($cp, array('$O 0:N�O&1:SIM', 'ei_evento_confirmar', msg('Presente_no_evento'), True, True));

		array_push($cp, array('$}', '', '', false, false));
		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " where id_ev = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$line['mailing'] = $this -> le_mailing($line['id_ev']);
			return ($line);
		} else {
			return ( array());
		}
	}

	function le_inscricao($id = 0) {
		$sql = "select * from evento_inscricao as evento 
		inner join us_usuario as user on user.id_us = evento.ei_us_usuario_id
		where evento.id_ei = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}

	function le_mailing($ev = 0) {
		$ev = round($ev);
		$sql = "select * from " . $this -> tabela_mailing . " where ml_ev = $ev ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt0">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_ml'];
			$idm = $line['ml_ev'];
			$link = '<a href="' . base_url('index.php/evento/ver/' . $idm . '/' . checkpost_link($idm . $id) . '/' . $id) . '" class="link lt1">';
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link . $line['ml_subject'] . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function show_mailing($id) {
		$sql = "select * from " . $this -> tabela_mailing . " where id_ml = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$line = $rlt[0];
		return ($line);
	}

	function row() {
		$sql = "select * from " . $this -> tabela . " where ev_ativo = 1 order by ev_de desc ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table class="lt2" width="100%">';
		$sx .= '<tr><td colspan=10 class="lt4">Eventos Abertos</td></tr>';
		$xtp = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_ev'];

			$d1 = $line['ev_de'];
			if (($d1 < date("Y-m-d")) and ($xtp != 1)) {
				$xtp = 1;
				$sx .= '<tr><td colspan=10 class="lt4">Eventos Encerrados</td></tr>';
			}
			$link = '<a href="' . base_url('index.php/evento/ver/' . $id . '/' . checkpost_link($id)) . '" class="link lt2">';
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link;
			$sx .= '<b>' . $line['ev_nome'] . '</b>';
			$sx .= '</a>';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= stodbr($line['ev_de']);
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= stodbr($line['ev_ate']);
			$sx .= '</td>';

			$sx .= '<td>';
			$link = '<A href="' . $line['ev_logo'] . '">';
			$link .= trim($line['ev_logo']);
			$link .= '</a>';

			$sx .= $link;

			$sx .= '</td>';

			$link = '<a href="' . base_url('index.php/evento/editar/' . $id . '/' . checkpost_link($id)) . '" class="link lt1">editar</a>';
			$sx .= '<td align="right">';
			$sx .= $link;
			$sx .= '</td>';

			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

}
