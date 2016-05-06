<?php
class fomento_editais extends CI_model {
	var $tabela = 'fomento_editais';
	var $tabela_agencia = 'fomento_agencia';

	function row($obj) {
		$obj -> fd = array('id_ed', 'ed_titulo', 'ed_chamada', 'ed_status');
		$obj -> lb = array('ID', 'nome da chamada', 'edital', 'estatus');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}

	function row_ag($obj) {
		$obj -> fd = array('id_agf', 'agf_nome', 'agf_sigla', 'agf_ordem');
		$obj -> lb = array('ID', 'nome da agencia', 'sigla', 'ordem');
		$obj -> mk = array('', 'L', 'L', 'C', 'C');
		return ($obj);
	}

	function le($id) {
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];
		return ($line);
	}

	function cp_ag() {
		$cp = array();
		/*campos edit fomento*/
		array_push($cp, array('$H8', 'id_agf', '', False, True));

		//array_push($cp,array('${', '', 'Informativos', False, True));
		array_push($cp, array('$S100', 'agf_nome', 'Nome da agência', false, True));
		array_push($cp, array('$S20', 'agf_sigla', 'Sigla', false, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'agf_ativo', 'Ativo', false, True));
		array_push($cp, array('$S100', 'agf_imagem', 'Logo (http://)', false, True));
		array_push($cp, array('$O 1:Alta&2:Média&3:Baixa', 'agf_ordem', 'Frequência', false, True));

		//button
		array_push($cp, array('$B', '', msg('bt_salvar_continuar'), false, True));

		return ($cp);
	}

	function mostra_usuarios_destino($uss) {
		$wh = "";
		for ($r = 0; $r < count($uss); $r++) {
			if (strlen($wh) > 0) { $wh .= " OR ";
			}
			$wh .= " (id_us = " . $uss[$r] . ") ";
		}
		if (count($uss) == 0) {
			$wh = '(1=2)';
		}
		$sql = "select distinct ss, id_us, us_nome, us_curso_vinculo, ustp_nome, ies_sigla, ust_titulacao_sigla, us_ativo 
				from us_usuario
            left join us_hora as h on h.usuario_id_us = us_usuario.id_us
            left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
            left join ies_instituicao on id_ies = ies_instituicao_ies_id
            left join us_tipo on usuario_tipo_ust_id = id_ustp
            left join escola on us_escola_vinculo = id_es
            left join us_bolsa_produtividade on id_us = us_bolsa_produtividade.us_id 
            left join us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn
            left join (select distinct 1 as ss, us_usuario_id_us as us_id_ss from ss_professor_programa_linha where sspp_ativo = 1) as ss on id_us = us_id_ss  
			WHERE ($wh) and us_ativo = 1 
			ORDER BY us_nome";
			
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$sx .= '<h1>Lista de destinatários</h1>';
		$sx .= '<table class="tabela00" width="100%" class="lt1">' . cr();
		$sx .= '<tr>
						<th>#</th>
						<th width="45%">Nome completo</th>
						<th width="25%">Curso</th>
						<th width="5%">Titulação</th>
						<th width="15%">Instituição</th>
						<th width="10%">Perfil</th>			
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$ss = '-';
			if ($line['ss'] == '1') { $ss = 'SIM';
			}
			$sx .= '<tr>';
			$sx .= '<td align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us'], $line);
			$sx .= '<td>' . $line['us_curso_vinculo'] . '</td>';
			$sx .= '<td>' . $line['ust_titulacao_sigla'] . '</td>';
			$sx .= '<td>' . $line['ies_sigla'] . '</td>';
			$sx .= '<td>' . $line['ustp_nome'] . '</td>';
			$sx .= '<td align="center">' . $ss . '</td>';
		}
		$sx .= '</table>';

		return ($sx);

	}

	function recupera_selecao($id_ed) {
		$sql = "select * from fomento_edital_categoria
					 			inner join fomento_categoria on fe_id = id_ct
								where fc_id = " . round($id_ed) . " and fec_ativo = 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sql_us = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sql = $line['ct_sql'];
			if (strlen($sql) > 0) {
				$rll = $this -> db -> query($sql);
				$rll = $rll -> result_array();
				for ($z = 0; $z < count($rll); $z++) {
					$ln = $rll[$z];
					$idu = $ln['id_us'];
					if (strlen($sql_us) > 0) { $sql_us .= ' OR ';
					}
					$sql_us .= "(id_us = $idu) ";
				}
			}
		}

		$us = array();
		if (strlen($sql_us) > 0) {

			$sql = "select distinct id_us from us_usuario where " . $sql_us;
			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();

			for ($r = 0; $r < count($rrr); $r++) {
				$line = $rrr[$r];
				array_push($us, $line['id_us']);
			}
		}
		return ($us);
	}

	function editais_abertos_resumo() {
		$deadline = date("Y-m-d");
		$wh = " ((ed_data_1 >= '" . $deadline . "') or (ed_fluxo_continuo = '1') ";
		$wh .= " or (ed_dt_deadline_elet >= '" . $deadline . "'))";
		$sql = "select * from fomento_editais
					LEFT JOIN fomento_agencia on id_agf = ed_agencia
					LEFT JOIN fomento_tipo on id_ftp = ed_edital_tipo
					WHERE $wh AND (ed_status = '1' OR ed_status = 'A')
					ORDER BY ed_edital_tipo, ed_dt_deadline_elet 
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		return($rlt);
	}

	function mostra_abertos($tipo = 0, $abertos = 1) {
		$deadline = date("Y-m-d");
		//$deadline = '2010-01-01';
		if ($abertos == 1) {
			$wh = " ((ed_data_1 >= '" . $deadline . "') or (ed_fluxo_continuo = '1') ";
			$wh .= " or (ed_dt_deadline_elet >= '" . $deadline . "'))";
		} else {
			$wh = " (ed_data_1 <= '" . $deadline . "') ";
		}

		$sql = "select * from fomento_editais
					LEFT JOIN fomento_agencia on id_agf = ed_agencia
					LEFT JOIN fomento_tipo on id_ftp = ed_edital_tipo
					WHERE $wh AND (ed_status = '1' OR ed_status = 'A')
					ORDER BY ed_edital_tipo, ed_dt_deadline_elet 
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) == 0) {
			return ('<h1>Nenhum edital disponível</h1>');
		}
		$sx = '';
		$sx .= '<h1>Editais Abertos</h1>';
		$sx .= '';
		$xsec = 'START';
		$nsc = 1;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sec = $line['ed_edital_tipo'];

			/* Nova Sessão */
			if ($sec != $xsec) {
				if ($r > 0) {
					$sx .= '</div>';
				}
				$sx .= '<a name="sct' . ($nsc) . '"></a>';
				$nsc++;
				$sx .= '<div style="float: clear;">
						</div>
						<h1>' . $line['ftp_nome'] . '</h1>
						<div id="editais" style="display: table;">';
				$xsec = $sec;
			}
			$link = '<a href="' . base_url('index.php/edital/ver/' . $line['id_ed']) . '" class="edital_link">';

			$sx .= $link;
			$sx .= '<div class="edital">';

			$sx .= '<table width="100%" border=0 style="height: 200px;">';
			$sx .= '<tr valign="top">';

			/* Título */
			$titulo = $line['ed_titulo'];
			$titulo = troca($titulo, '<br>', '');
			$titulo = troca($titulo, '<BR>', '');
			$titulo = troca($titulo, '</BR>', '');
			$sx .= '<td>';
			/* Logo */
			$sx .= '<img src="' . $line['agf_imagem'] . '" width="140" align="right">';

			/* Numero do Edital */
			$sx .= '<span class="edital_chamada">Edital / Chamada: <b>' . $line['ed_chamada'] . '</b></span>';
			$sx .= '</br></br>';

			/* Nome do Edital */
			$sx .= '<span class="edital_titulo">' . $link . $titulo . '</a>' . '</span>';

			if ($line['ed_fluxo_continuo'] == 1) {
				$sx .= '<tr><td class="edital_deadline">' . msg('continuous_flow') . '</td></tr>';
			} else {
				$sx .= '<tr><td class="edital_deadline">' . stodbr($line['ed_dt_deadline_elet']) . '</td></tr>';
			}

			$sx .= '</table>';

			//$sx .= '<div class="">' . $link . $line['agf_nome'] . '</a>' . '</div>';

			$sx .= '</div>';
			$sx .= '</a>';

		}
		$sx .= '</div>';
		return ($sx);
	}

	function public_selector($id = 0) {
		$sx = '';

		/*
		 *
		 * Mostra área já seleciondas
		 */
		$acao = get("acao");
		if (strlen($acao) > 0) {
			$sets = $_POST;
			$sqli = "";
			foreach ($sets as $key => $value) {
				$key = sonumero($key);
				if ($key > 0) {
					if (strlen($sqli) > 0) { $sqli .= ' ,';
					}
					$sqli .= "('$key','$id',1)";
				}
			}
			$sql = "delete from fomento_edital_categoria 
						WHERE fc_id = " . round($id);
			$this -> db -> query($sql);

			$sqli = "insert into fomento_edital_categoria (fe_id, fc_id, fec_ativo) values " . $sqli;
			$this -> db -> query($sqli);
		}

		$sql = "
				SELECT s.id_ct as id_ct, m.ct_descricao as master, s.ct_sql as qw_sql,
					s.ct_descricao as slave, fec_ativo
					FROM fomento_categoria as m
					LEFT JOIN fomento_categoria as s on s.ct_auto_ref = m.id_ct
					LEFT JOIN fomento_edital_categoria on s.id_ct = fe_id and fc_id = $id
				WHERE m.ct_main = 1 and s.ct_ativo = 1
				ORDER BY m.id_ct, s.ct_descricao";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '<form method="post">';
		$sx .= '<table width="100%" border=0>';
		$sx .= '<tr><th colspan=2 style="border-bottom: 1px solid #000000;">Selecionar perfis</th></tr>';
		$xcat = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idr = $line['id_ct'];
			$cat = $line['master'];
			if ($cat != $xcat) {
				$sx .= '	<tr>
						<td><b>' . $line['master'] . '</b></td>
						</tr>';
				$xcat = $cat;
			}
			$checked = '';
			if ($line['fec_ativo'] == '1') {
				$checked = 'checked';
			}
			$sx .= '<tr><td class="lt1">';
			$sx .= '<input type="checkbox" name="da' . $idr . '" value="1" ' . $checked . ' > ';
			if ($line['qw_sql'] == '') { $sx .= '<font color="#cccccc">';
			}
			$sx .= $line['slave'];
			if ($line['qw_sql'] == '') { $sx .= '(*)';
			}
			$sx .= '</td></tr>';
		}
		$sx .= '<tr><td class="lt0">Clique no nome para ampliar</td></tr>';
		$sx .= '<tr><td class="lt0"><input type="submit" value="' . msg('bt_update') . '" name="acao"></td></tr>';
		$sx .= '</table>';
		$sx .= '</form>';
		$sx .= '(*) não implementado';

		return ($sx);
	}

	function incrementa_download($id, $id_us) {
		$id = round($id);

		if ($id_us > 0) {
			$ip = ip();
			$sql = "update fomento_editais set ed_more_info = (ed_more_info + 1) where id_ed = " . $id;
			$rlt = $this -> db -> query($sql);

			$sql = "insert into fomento_editais_leitura 
							(fr_edital, fr_us_id, fr_ip, ft_tipo)
							values
							($id,$id_us,'$ip',1)";
			$this -> db -> query($sql);
		}
	}

	function incrementa_leitura($id, $id_us) {
		$id = round($id);

		if ($id_us > 0) {
			$ip = ip();
			$sql = "update fomento_editais set ed_readed = ed_readed + 1 where id_ed = " . $id;
			$rlt = $this -> db -> query($sql);

			$sql = "insert into fomento_editais_leitura 
							(fr_edital, fr_us_id, fr_ip, ft_tipo)
							values
							($id,$id_us,'$ip',2)";
			$this -> db -> query($sql);
		}
	}

	function grava_cobertura($id, $total) {
		$id = round($id);

		if ($total > 0) {
			$sql = "update fomento_editais set ed_cobertura = $total where id_ed = " . $id;
			$rlt = $this -> db -> query($sql);
		}
	}

	function quem_leu($id) {
		$sql = "select * from fomento_editais_leitura
						left join us_usuario on fr_us_id = id_us 
						where fr_edital = $id
					ORDER BY fr_data desc ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$tipo = array('1' => 'Mais informações', '2' => 'Leitura');
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>Usuário</th><th>data</th><th>IP</th><th>Tipo</th></tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>' . $line['us_nome'] . '</td>';
			$sx .= '<td>' . $line['fr_data'] . '</td>';
			$sx .= '<td>' . $line['fr_ip'] . '</td>';
			$sx .= '<td>' . $tipo[$line['ft_tipo']] . '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function show_edital($id) {
		$sql = "select * from " . $this -> tabela . " 
					LEFT JOIN fomento_agencia on id_agf = ed_agencia
					LEFT JOIN fomento_tipo on id_ftp = ed_edital_tipo
				WHERE id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];

		$imagem = trim($line['agf_imagem']);

		$url_externa = $line['ed_url_externa'];

		if (strlen($url_externa) > 0) {
			$url_externa = base_url('index.php/ajax/edital/' . $id . '/' . checkpost_link($id) . '/id_us');
			$url_externo = '<br><br>Mais informações em: <a href="' . $url_externa . '" target="_new">link externo</a>';
		} else {
			$url_externo = '';
		}

		/* Deadline */
		$data = stodbr($line['ed_dt_deadline_elet']);
		$anox = round(substr($line['ed_dt_deadline_elet'], 0, 4));
		if ($anox < 2000) {
			$deadline = '';
		} else {
			$deadline = '
				<tr>
				<td align="right">
					<font style="font-size: 18px;">
						<I>Deadline</I> para submissão eletrônica <B>
						<font color="red">' . $data . '</font>
				</td>
				</tr>';

		}

		/* Fluxo continuo */
		if ($line['ed_fluxo_continuo'] == 1) {
			$deadline = '
				<tr>				
				<td align="right">
					<font style="font-size: 18px;">
						<font color="blue">FLUXO CONTÍNUO</font>
					</font>
				</td>
				</tr>';
		}
		$ass = '';
		if ($line['ed_document_require'] > 0) {
			$ass = '				
				<td align="right">
					<img src="' . base_url('img/icon/icone_exclamation.png') . '" height="32" align="right">
					<font style="font-size: 12px;">
						<font color="red">Esta submissão requer anuência institucional. A solicitação deverá ser encaminhada<br>para o Observatório (PD&I) até <b>5 dias</b> antes do <i>deadline</i>.</font>
					</font>
				</td>';
		}
		$sx = '<table width="640" border=0 align="center" style="border: 1px solid #000000; font-size: 14px; font-family: tahoma, verdana, arial;">
					<tr valign="top">
						<td><img src="http://www2.pucpr.br/reol/img/email_pdi_header.png" ><BR></td></tr>
					<tr valign="top">
						<td valign="top" ALIGN="left" style="font-size:21px;">
						<img src="' . $imagem . '" height="100" align="left"  style="padding: 0px 20px 0px 5px;">
						<font style="font-size:25px">
						' . $line['ed_titulo'] . '
						</font><BR><BR></td></tr>
				';

		for ($r = 1; $r <= 12; $r++) {
			$fld = $r;

			if (strlen($line['ed_texto_' . $fld]) > 0) {
				$sx .= '<tr>';
				$sx .= '<td><B>' . msg('fm_texto_' . $r) . '</B></td>';
				$sx .= '</tr>' . cr();

				$sx .= '<tr>';
				$sx .= '<td>';
				$sx .= $line['ed_texto_' . $fld];
				$sx .= '</td>';
				$sx .= '</tr>';

				$sx .= '<tr><td><br></td></tr>';
			}
		}
		$sx .= $deadline;
		$sx .= $ass;
		$sx .= '
				<tr>
					<tr><td>' . $url_externo . '</td></tr>
				</table>';
		return ($sx);
	}

}
