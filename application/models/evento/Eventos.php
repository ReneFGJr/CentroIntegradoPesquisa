<?php
class eventos extends CI_model {
	var $tabela = 'evento_nome';
	var $tabela_mailing = 'evento_mailing';

	function emitir($evento, $tipo, $ano, $us) {
		$cracha = $us['us_cracha'];
		$id = $us['id_us'];

		if ($ano == '2015') {

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
				$cracha = strzero($cracha, 11);
				$sql = "select count(*) as total, pp_avaliador_id 
							from pibic_parecer_2015
						where pp_avaliador_id = '$id' group by pp_avaliador_id 
						and pp_tipo = 'SEMIC' ";
				$rlt = $this -> db -> query($sql);

				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					$line = $rlt[0];
					$total = $line['total'];
					if ($total > 5) {
						/* ID da declaracao de avaliador - 2 */
						$this -> insere_declaracao($id, 0, 2);
					}
				}
			}

			/* ESTUDANTE */
			if ($tipo == 'ESTUDANTE') {
				/* Declaracao de Estudante SEMIC */
				$cracha = strzero($cracha, 11);
				$sql = "select count(*) as total, pp_avaliador_id 
							from pibic_parecer_2015
						where pp_avaliador_id = '$id' group by pp_avaliador_id 
						and pp_tipo = 'SEMIC' ";
				$rlt = $this -> db -> query($sql);

				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					$line = $rlt[0];
					$total = $line['total'];
					if ($total > 5) {
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
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				for ($r = 0; $r < count($rlt); $r++) {
					$line = $rlt[$r];
					$protocolo = $line['st_codigo'];
					$id2 = $line['id_us'];
					/* ID da declaracao de avaliador - 7 */
					$this -> insere_declaracao($id, $id2, 7, $protocolo);
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
					$id2 = $line['id_us'];
					/* ID da declaracao de avaliador - 7 */
					$this -> insere_declaracao($id, $id2, 12, $protocolo);
				}
			}

	}

	function valida_certificado($id)
		{
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
		if (count($rlt) == 0)
			{
				$rt = array();
			} else {
				$rt = $rlt[0];
			}			
		return($rt);
		}

	function mostra_declaracoes($us1) {
		$sql = "select * from central_declaracao
						inner join central_declaracao_evento on dc_tipo = id_cde 
						left join us_usuario on id_us = dc_us_usuario_id_2
						where dc_us_usuario_id = $us1 order by dc_data desc ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="800" class="lt2" cellpadding=10 cellspacing=0 border=1 align="center">';
		$sx .= '<tr><td class="lt4" colspan=2 >Declarações disponíveis</td></tr>';
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
		if (strlen($us2) == 0) { $us2 = 0; }
		$sql = "select * from central_declaracao 
						where dc_us_usuario_id = $us1
						and dc_us_usuario_id_2 = $us2
						and dc_tipo = $tipo	
						and dc_texto_1 = '$protocolo'";
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
		/* Perfil do usuário */
		$this -> load -> model('email_local');
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 25, 'smtp_user' => '', 'smtp_pass' => '', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		$t = $this -> show_mailing(3);
		$texto = $t['ml_html'];
		$ass = $t['ml_subject'];
		$email_own = 2;
		$idu = 1;

		$sql = "SELECT id_us, csf_aluno, us_nome FROM `csf`
					inner join us_usuario on csf_aluno = id_us 
				where csf_retorno > '2015-04-01' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idu = $line['id_us'];
			enviaremail_usuario($idu, $ass, $texto, 2);
		}
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ev', '', False, True));
		array_push($cp, array('$S100', 'ev_nome', msg('ev_nome'), True, True));
		array_push($cp, array('$D8', 'ev_de', msg('ev_de'), True, True));
		array_push($cp, array('$D8', 'ev_ate', msg('ev_ate'), True, True));
		array_push($cp, array('$S100', 'ev_logo', msg('ev_logo'), False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'ev_ativo', msg('ev_ativo'), True, True));

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
