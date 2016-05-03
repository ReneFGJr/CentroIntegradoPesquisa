<?php
class avaliadores extends CI_Model {

	function marcar_para_enviar_convite_externos() {
		$sql = "select * from us_usuario
							left join us_avaliador_area on pa_parecerista = id_us
							left join us_avaliador_situacao on us_avaliador = id_as
							left join us_titulacao on ust_id = usuario_titulacao_ust_id
							left join ies_instituicao on ies_instituicao_ies_id = id_ies
						where (us_avaliador <> 0) and (us_avaliador <> 8) and (us_ativo = 1) 
								and (ies_instituicao_ies_id <> 1)
						order by us_nome					
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id_us = $line['id_us'];
			$sql = "update us_usuario set us_avaliador = 8 where id_us = " . $id_us . ';' . cr();
			$rrr = $this -> db -> query($sql);
		}
		return ('');
	}

	function enviar_convite_avaliador($tipo) {
		$limit = 20;
		$this -> load -> model('Mensagens');
		$sql = "select * from us_usuario
							left join us_avaliador_area on pa_parecerista = id_us
							left join us_avaliador_situacao on us_avaliador = id_as
							left join us_titulacao on ust_id = usuario_titulacao_ust_id
							left join area_conhecimento on ac_cnpq = pa_area
							left join (select count(*) as emails, usuario_id_us from us_email where usm_ativo = 1 group by usuario_id_us ) as email on id_us = usuario_id_us
							left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
						where us_avaliador = 8 and us_ativo = 1 and pa_ativo = 1
						order by us_nome, ac_cnpq				
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$text = $this -> Mensagens -> busca('AVAL_IC_CONVITE_EXT', null);
		$xid = 0;
		$xarea = '';
		$nome = '';
		$to = 0;
		$sx = '';
		for ($r = 0; $r < (count($rlt) + 1); $r++) {
			if (isset($rlt[$r])) {
				$line = $rlt[$r];
				$id = $line['id_us'];
			} else {
				$id = 0;
			}
			if ($id != $xid) {
				if (strlen($nome) > 0) {
					$link = '<BR><a href="' . base_url('index.php/ajax/aceite/' . $xid . '/1/' . checkpost_link($xid)) . '" 
												style="border: 1px solid #008000; background-color: #a0ffa0; padding: 5px 20px; text-decoration: none;" 
											>ACEITAR</A>';
					$link .= ' | ';
					$link .= '<a href="' . base_url('index.php/ajax/aceite/' . $xid . '/-1/' . checkpost_link($xid)) . '"" 
												style="border: 1px solid #FF0000; background-color: #ffa0a0; padding: 5px 20px; text-decoration: none;" 
											>RECUSAR</A>';

					$ttt = $text['nw_texto'];
					$ttt = troca($ttt, '$NOME', '<b>' . $nome . '</b>');
					$ttt = troca($ttt, '$AREAS', $xarea);
					$ttt = troca($ttt, '$CONFIRMAR', $link);

					$own = $text['nw_own'];
					$titulo = '[PUCPR]' . ' - ' . $text['nw_titulo'];

					enviaremail_usuario($xid, $titulo, $ttt, $own);

					$sql = "update us_usuario set us_avaliador = 9 where id_us = " . round($xid);
					$xxx = $this -> db -> query($sql);

					$sx .= '<br>' . $nome . ' <font color="green">Enviado convite</font>';
					$to++;

					if ($to >= $limit) { $r = count($rlt);
					}
				}
				if ($id > 0) {
					$nome = $line['us_nome'];
				}
				$xid = $id;
				$xarea = '<h5>Áreas atribuídas para avaliação</h5>';
			}
			if ($id > 0) {
				$xarea .= '<tt>' . $line['ac_cnpq'] . ' - ' . $line['ac_nome_area'] . '</tt><br>';
			}
		}
		if ($to == $limit) {
			$sx .= cr() . ' <meta http-equiv="refresh" content="5">';
		}
		return ($sx);
	}

	function avaliador_area_impar($id = 0) {
		$sql = "delete from us_avaliador_area 
						where pa_ativo = 0 and pa_parecerista = " . round($id);
		$rlt = $this -> db -> query($sql);
		return ('');
	}

	function zera_avaliadores() {
		$sql = "update us_usuario set us_avaliador = 0
					where us_avaliador <> 0  
					and ies_instituicao_ies_id = 1";
		$rlt = $this -> db -> query($sql);
		print_r($rlt);
	}

	function ativa_dr_com_ic_avaliadores() {
		$ano = date("Y");
		if (date("m") < 8) { $ano--;
		}
		$sql = "select distinct id_us from ic
						left join ic_aluno as pa on ic_id = id_ic 
						left join us_usuario on ic_cracha_prof = us_cracha
					WHERE (usuario_titulacao_ust_id = 6 or usuario_titulacao_ust_id = 7)
					 	and ic_ano = '$ano' and s_id = 1 and us_ativo = 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$wh = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen($wh) > 0) { $wh .= ' OR ';
			}
			$wh .= '(id_us = ' . $line['id_us'] . ')';
			$tot++;
		}
		if (strlen($wh) > 0) {
			$sql = "update us_usuario set us_avaliador = 1 where " . $wh;
			$this -> db -> query($sql);
		}
		return ($tot);
	}

	function avaliador_add_area($id = 0, $area = '') {
		$area = trim($area);
		$data = date("Ymd");
		$sql = "select * from area_conhecimento where ac_cnpq = '$area' ";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			$descricao = trim($line['ac_nome_area']);
		} else {
			return ('');
		}

		/* idientifica se já não esta gravada */
		$sql = "select * from us_avaliador_area where pa_area = '$area' and pa_parecerista = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$st = $line['pa_ativo'];
			if ($st != '1') {
				if ($id > 0) {
					$sql = "update us_avaliador_area set pa_ativo = '1' where id_pa = " . $line['id_pa'];
					echo $sql;
					$this -> db -> query($sql);
					$this -> avaliador_historico('UPD', msg('avaliador') . ' - ' . msg('active_area') . ': ' . $area . ' - ' . $descricao, $id);
				}
			}
		} else {
			$sql = "insert into us_avaliador_area
						(
						pa_parecerista, pa_area, pa_update,
						pa_ativo, pa_cracha
						) values (
						'$id','$area','$data',
						'1',''
						);";
			$this -> db -> query($sql);
			$this -> avaliador_historico('ADD', msg('avaliador') . ' - ' . msg('add_area') . ': ' . $area . ' - ' . $descricao, $id);
		}

		return ('');
	}

	function avaliador_ativar($id = 0) {
		$sql = "select * from us_usuario where id_us = " . round($id);
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			$st = $line['us_avaliador'];
			if ($st != '1') {
				if ($id > 0) {
					$sql = "update us_usuario set us_avaliador = '1' where id_us = " . round($id);
					$this -> db -> query($sql);

					$this -> avaliador_historico('ACT', msg('avaliador') . ': ' . msg('active'), $id);
				}

			}
		}
		return ('');
	}

	function avaliador_desativar($id = 0) {
		$sql = "select * from us_usuario where id_us = " . round($id);
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			$st = $line['us_avaliador'];
			if ($st != '0') {
				if ($id > 0) {
					$sql = "update us_usuario set us_avaliador = '0' where id_us = " . round($id);
					$this -> db -> query($sql);
				}
				$this -> avaliador_historico('DES', msg('avaliador') . ': ' . msg('desactive'), $id);
			}
		}
		return ('');
	}

	function avaliador_historico($acao, $historico, $avaliador) {
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$user = $_SESSION['id_us'];
		$sql = "insert into us_avaliador_historico
				(
					h_acao, h_historico, h_user,
					h_data, h_hora, h_login
				) values (
					'$acao','$historico','$avaliador',
					'$data','$hora','$user'
				)";
		$this -> db -> query($sql);

	}

	/*************** áreas do avaliador ****************************************/
	function avaliador_area($id) {

		$sql = "select * from us_usuario
						left join us_avaliador_area on pa_parecerista = id_us
						left join us_avaliador_situacao on us_avaliador = id_as
						left join area_conhecimento on ac_cnpq = pa_area
						left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
					where id_us = $id
					order by us_nome, ac_cnpq					
			";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$xcracha = '';
		$to1 = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$area = $line['ac_cnpq'];
			if (strlen($area) > 0) {
				$ida = $line['id_pa'];
				$linkx = ' onclick="change_area(' . $ida . ');" ';
				$link = base_url('index.php/avaliador/view/' . $line['id_us'] . '/' . checkpost_link($line['id_us']));
				$link = '<a href="' . $link . '" target="_new" class="link lt1">';
				$acao = '<b>ativo</b>';
				$class_acao = ' class="bt_acao" ';
				if ($line['pa_ativo'] == '0') {
					$class_acao = ' class="bt_desativado" ';
					$acao = '<b>inativo</b>';
				}
				$sx .= '<tr>';
				$sx .= '<td class="border1" width="70">' . $line['ac_cnpq'] . '</td>';
				$sx .= '<td width="70" id="td' . $ida . '" align="center" ' . $linkx . ' ><div ' . $class_acao . '>' . $acao . '</div></td>';
				$sx .= '<td class="border1" >' . $line['ac_nome_area'] . '</td>';
				$sx .= '<td class="border1" align="center" width="80">' . stodbr($line['pa_update']) . '</td>';
				$sx .= '</tr>';
				$to1++;
			}
		}
		$sx .= '<tr><td colspan="10">Total de ' . $to1 . ' áreas</td></tr>';

		if ($to1 > 0) {
			$sx .= '
			<script>
				function change_area($id)
					{
						var $url = "' . base_url('index.php/avaliador/ajax_change/' . $id) . '/"+$id;
						var $div = "#td"+$id;
						$.ajax($url)
  						 .done(function(data) {
  						 		$($div).html(data);
  							})
  						.fail(function() {
    							alert( "error" );
  						})
  					}
			</script>
			';
		}
		return ($sx);
	}

	function avaliadores_area($sem_area = 0, $tipo = '') {

		$wh = '';
		if ($tipo == 'e') { $wh .= ' and ies_instituicao_ies_id <> 1 ';
		}
		if ($tipo == 'i') { $wh .= ' and ies_instituicao_ies_id = 1 ';
		}

		$sql = "select * from us_usuario
						left join us_avaliador_area on pa_parecerista = id_us
						left join us_avaliador_situacao on us_avaliador = id_as
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join area_conhecimento on ac_cnpq = pa_area
						left join (select count(*) as emails, usuario_id_us from us_email where usm_ativo = 1 group by usuario_id_us ) as email on id_us = usuario_id_us
						left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
						left join ies_instituicao on ies_instituicao_ies_id = id_ies
					where us_avaliador <> 0 and us_ativo = 1 $wh
					order by us_nome, ac_cnpq					
			";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="lt1">';
		$sx .= '<tr><th>';
		$xcracha = '';
		$to1 = 0;
		while ($line = db_read($rlt)) {
			$e = $line['emails'];
			$link = base_url('index.php/avaliador/view/' . $line['id_us'] . '/' . checkpost_link($line['id_us']));
			$link = '<a href="' . $link . '" target="_new" class="link lt1">';
			$cracha = trim($line['id_us']);
			if ($xcracha != $cracha) {
				$to1++;
				$msg_email = '<font class="error">' . msg('email_sem') . '</a>';
				if ($e > 0) {
					$msg_email = '<font color="green">' . msg('email_ok') . '</font>';
					$bg = '';
				} else {
					$bg = ' bgcolor="#FFE0E0" ';
				}

				$sx .= '<tr ' . $bg . '>';
				$sx .= '<td style="padding: 3px;"  class="border1" align="center" width="70">' . $link . $line['us_cracha'] . '</a>' . '</td>';
				$sx .= '<td style="padding: 3px;"  class="border1">' . $line['ust_titulacao_sigla'] . ' ' . $link . $line['us_nome'] . '</a>' . '</td>';
				$sx .= '<td style="padding: 3px;"  class="border1">' . $line['us_campus_vinculo'] . ' ' . $line['ies_sigla'] . '</td>';
				$sx .= '<td>' . $line['ies_instituicao_ies_id'] . '</td>';

				$msg_email = '<font class="error">' . msg('email_sem') . '</a>';
				if ($e > 0) {
					$msg_email = '<font color="green">' . msg('email_ok') . '</font>';
				}
				$sx .= '<td style="padding: 3px;"  class="border1" align="center">' . $msg_email . '</td>';
				$sx .= '<td style="padding: 3px;"  class="border1" align="center" width="150" bgcolor="' . $line['as_cor'] . '">' . $line['as_situacao'] . '</td>';
				$sx .= '</tr>';
				$xcracha = $cracha;
			}
			/* */
			if ($sem_area != 1) {
				$nome_area = $line['ac_cnpq'] . ' - ' . $line['ac_nome_area'];
				if (strlen(trim($line['ac_cnpq'])) == 0) {
					$nome_area = '<font color="red">' . msg('area_nao_definida') . '</font>';
				}
				$sx .= '<tr>';
				$sx .= '<td>';
				$sx .= '<td>' . $nome_area . '</td>';
			}
		}
		$sx .= '<tr><td colspan="10">Total de ' . $to1 . ' avaliadores</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	/****************************** REGRA DE SELECAO DE AVALIADOR */
	function regra_avaliadores() {
		$sql = "update us_usuario set us_avaliador = 0 where 1=1 ";
		$rlt = $this -> db -> query($sql);

		/* Professores Stricto Sensu */
		$sql = "update us_usuario set us_avaliador = 0
						where 
							(
							usuario_titulacao_ust_id = 6 or usuario_titulacao_ust_id = 7
							)
							and us_ativo = 1 
							and us_professor_tipo = 2
							";
		$rlt = $this -> db -> query($sql);

		/* Professores orientadores IC com doutorado */
		$sql = "select * from semic_nota_trabalhos
					inner join us_usuario on st_professor = us_cracha
					where (st_ano = '" . (date("Y")) . "' or st_ano = '" . (date("Y") - 1) . "' )
					and (usuario_titulacao_ust_id = 6 or usuario_titulacao_ust_id = 7)
					";
		$rlt = db_query($sql);
		$wh = '';
		$to = 0;
		while ($line = db_read($rlt)) {
			$to++;
			if (strlen($wh) > 0) { $wh .= ' or ';
			}
			$wh .= ' id_us = ' . $line['id_us'];
		}
		if ($to > 0) {
			$sql = "update us_usuario set us_avaliador = 8 where " . $wh;
			$rlt = $this -> db -> query($sql);
		}
	}

	function le($id) {
		$tabela = $this -> tabela_view();

		$sql = "select *
				from
	                us_usuario
	                left join us_hora as h on h.usuario_id_us = us_usuario.id_us
	                left join us_email as e on e.usuario_id_us = us_usuario.id_us
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
				where id_us = " . $id;

		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {

			if ($line['ush_stricto_sensu'] > 0) { $line['us_ss'] = 'SIM';
			} else { $line['us_ss'] = 'NÃO';
			}
			$line['us_lattes'] = '';

			/* Regime */
			$rg = trim($line['us_regime']);
			if ($rg == 'Tempo Inte') { $rg = 'Tempo Integral';
			}
			if ($rg == 'Tempo Parc') { $rg = 'Tempo Parcial';
			}
			if ($rg == 'Professore') { $rg = 'Horista';
			}
			$line['us_regime'] = $rg;

			/*********** Produtividade */
			$prod = '';
			if (strlen($prod) == 0) { $prod = 'não';
			}
			$line['bmod_modalidade'] = $prod;

			/*********** GENERO */
			if ($line['us_genero'] = 'M') { $line['us_genero'] = msg('Masculino');
			}
			if ($line['us_genero'] = 'F') { $line['us_genero'] = msg('Feminino');
			}

			/************ us_emplid */
			if (strlen(trim($line['us_emplid'])) == 0) { $line['us_emplid'] = 'na';
			}

			/************ us_emplid */
			if (strlen(trim($line['us_cpf'])) > 0) { $line['us_cpf'] = mask_cpf($line['us_cpf']);
			}

			return ($line);
		} else {
			return ( array());
		}
	}

	function tabela_view() {
		$tabela = "(select * from us_usuario
					left join us_avaliador_situacao on us_avaliador = id_as
					left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
					where us_usuario.us_avaliador > 0
					) as docente ";
		return ($tabela);
	}

	function row($obj) {

		$obj -> fd = array('id_us', 'us_nome', 'ust_titulacao_sigla', 'us_campus_vinculo', 'us_cracha', 'id_us', 'as_situacao');
		$obj -> lb = array('ID', msg('nome'), msg('titulacao'), msg('campus'), msg('cracha'), msg('id'), msg('ativo'));
		$obj -> mk = array('', 'L', 'L', 'L', 'C');
		return ($obj);
	}

}
?>
