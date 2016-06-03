<?php
class ics_master extends CI_model {
	var $tabela = "ic_submissao_projetos";
	var $tipo = 'ICMST';

	function documentos() {
		$opc = 'success';
		$obr = 'danger';

		$tipos = array('PROJ' => $obr, 'CARTA' => $opc, 'HISTO' => $obr, 'CARTB' => $obr, 'CARTC'=>$obr, 'PLANO' => $obr, 'TOEFO' => $opc, 'PROU' => $opc, 'OUTRO' => $opc, 'PLANM'=> $opc, 'CEP'=>$opc, 'CEU'=>$opc);
		return ($tipos);
	}

	function mostra_protetos($st, $ano = '') {
		$ano = date("Y");
		switch ($st) {
			case '1' :
				$wh = " (pj_status = 'A' or pj_status = 'B')";
				break;
			case '0' :
				$wh = " pj_status = '@' ";
				break;
			case '2' :
				$wh = " pj_status = 'F' ";
				break;
			default :
				$wh = " (1 = 1) ";
				break;
		}
		$sql = "select *
						FROM " . $this -> tabela . " 
						INNER JOIN us_usuario on pj_professor = us_cracha
						WHERE pj_edital = '" . $this -> tipo . "' and pj_ano = '$ano' 
						AND $wh ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$t = array(0, 0, 0);

		$sx = '<table width="100%" class="captacao_folha border1 lt1 black">';
		$sx .= '<tr><th width="5%">protocolo</th>
						<th width="55%">Título do projeto</th>
						<th width="5%">ano</th>
						<th width="30%">autor</th>
						<th width="5%">postado</th>
						</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = '<a href="' . base_url('index.php/ic_master/view/' . $line['id_pj'] . '/' . checkpost_link($line['id_pj'])) . '" class="lt1 link">';
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center" class="border1">' . $link . $line['pj_codigo'] . '</A>' . '</td>';
			$sx .= '<td align="left" class="border1">' . $line['pj_titulo'] . '</td>';
			$sx .= '<td align="center" class="border1">' . $line['pj_ano'] . '</td>';
			$sx .= '<td align="left" class="border1">' . link_perfil($line['us_nome'], $line['id_us'], $line) . '</td>';
			$sx .= '<td align="left" class="border1">' . stodbr($line['pj_dt_update']) . '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function resumo($ano = '') {
		$ano = date("Y");
		$sql = "select count(*) as total, pj_status from " . $this -> tabela . " 
						WHERE pj_edital = '" . $this -> tipo . "' and pj_ano = '$ano' 
						GROUP BY pj_status";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$t = array(0, 0, 0);
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['pj_status'];
			switch ($sta) {
				case '@' :
					$t[0] = $t[0] + $line['total'];
					break;
				case 'A' :
					$t[1] = $t[1] + $line['total'];
					break;
			}
		}
		$link0 = '<a href="' . base_url('index.php/ic_master/resumo/0') . '" class="link lt6">';
		$link1 = '<a href="' . base_url('index.php/ic_master/resumo/1') . '" class="link lt6">';
		$link2 = '<a href="' . base_url('index.php/ic_master/resumo/2') . '" class="link lt6">';

		$sx = '<table width="100%" class="captacao_folha border1 lt0 black">';
		$sx .= '<tr>';
		$sx .= '<td width="33%">' . msg('em_cadastro') . '</br><font class="lt6">' . $link0 . $t[0] . '</a>' . '</font></td>';
		$sx .= '<td width="33%">' . msg('analisando') . '</br><font class="lt6">' . $link1 . $t[1] . '</a>' . '</font></td>';
		$sx .= '<td width="33%">' . msg('em_pesquisa') . '</br><font class="lt6">' . $link2 . $t[2] . '</a>' . '</font></td>';
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function cp_subm_01() {
		$cp = array();
		array_push($cp, array('$H8', 'id_pj', '', False, True));
		array_push($cp, array('$T80:5', 'pj_titulo', msg('titulo_pesquisa'), True, True));

		$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
		array_push($cp, array('$Q ac_cnpq:ac_nome_area:' . $sql, 'pj_area', msg('area_conhecimento'), True, True));

		array_push($cp, array('$S12', 'pj_aluno', msg('cracha_do_aluno'), True, True));

		array_push($cp, array('$U8', 'pj_update', '', False, True));

		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		//pj_area_estrapj_area
		return ($cp);
	}

	function cp_subm_02($id = 0) {
		$cp = array();
		$idp = '2' . strzero($id, 6);
		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));

		$txt = '<h3>Documentos necessários</h3>';
		array_push($cp, array('$M', '', ($txt), False, True));

		array_push($cp, array('$M', '', $this -> arquivos($idp), false, true));

		//pj_area_estrapj_area
		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		return ($cp);
	}

	function arquivos($id) {
		$opc = 'success';
		$obr = 'danger';
		$files = array();

		$tipos = $this -> documentos();

		$ln = array();
		$sql = "select * from ic_ged_documento_tipo";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$ln[$line['doct_codigo']] = $line['doct_nome'];
		}

		/* */
		$sql = "select * from ic_ged_documento 
							where doc_dd0 = '$id' and doc_status <> 'X'
							order by doc_data desc, doc_hora desc 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tipo = $line['doc_tipo'];

			if (isset($files[$tipo])) {
				$files[$line['doc_tipo']] .= '<BR>' . $this -> geds -> show_simple_file($line);
			} else {
				$files[$line['doc_tipo']] = $this -> geds -> show_simple_file($line, 0);
				if (isset($tipos[$tipo])) {
					$tipos[$tipo] = $opc;
				}
			}

		}

		$sx = '<table width="100%" class="table lt1">';
		$sx .= '<tr>
							<th width="45%">Tipo de arquivo</th>
							<th width="50%">Arquivo(s)</th>
							<th width="5%">Ação</th></tr>';
		foreach ($tipos as $tipo => $value) {
			$acao = '<buttom onclick="newwin(\''.base_url('index.php/ic/ged/' . $id . '/' . $tipo) . '\')" class="btn btn-primary">Upload</buttom>';
			$file_list = '';
			if (isset($files[$tipo])) {
				$file_list = $files[$tipo];
			}
			$sx .= '<tr class="' . $value . '">';
			$sx .= '<td>' . $ln[$tipo] . '</td>';
			$sx .= '<td>' . $file_list . '</td>';
			$sx .= '<td>' . $acao . '</td>';
		}
		$sx .= '</table>';
		$sx .= $this -> geds -> script('ic');
		return ($sx);
	}

	function le($id) {
		$sql = "select *, 
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					prof.us_nome as pf_nome, prof.id_us as id_pf
				FROM " . $this -> tabela . "
					LEFT JOIN us_usuario as prof  on prof.us_cracha = pj_professor
					LEFT JOIN us_usuario as aluno on aluno.us_cracha = pj_aluno
					LEFT JOIN area_conhecimento ON pj_area = ac_cnpq
					LEFT JOIN ic_submissao_situacao on pj_status = ssi_status  
				where id_pj = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$rlt = $rlt[0];
		} else {
			$rlt = array();
		}
		return ($rlt);
	}

	function valida_entrada($id = '') {
		$opc = 'success';
		$idp = '2' . strzero($id, 6);
		$data = $this -> le($id);
		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$vd = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);

		/************************************************************************************************* Regra */
		if (strlen($data['pj_titulo']) > 10) {
			$vd[0] = $ok;
		}

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';

		$sx .= '<tr><td class="border1">Título do projeto - (' . strlen($data['pj_titulo']) . ' caracteres)</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/************************************************************************************************* Regra */
		if (strlen($data['pj_aluno']) == 8) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('pj_aluno') . '(' . $data['pj_aluno'] . ')' . '</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/************************************************************************************************* Regra */
		$sx .= '<tr><td class="border1" colspan=2><b>' . msg('Arquivos_do_projeto') . '</b></td>
						</tr>';

		$sql = "select * from ic_ged_documento_tipo ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();
		$desc = array();
		for ($r = 0; $r < count($rrr); $r++) {
			$desc[$rrr[$r]['doct_codigo']] = $rrr[$r]['doct_nome'];
		}

		$sql = "select * from ic_ged_documento 
					WHERE doc_dd0 = '" . $idp . "' and doc_status <> 'X' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();
		$files = $this -> documentos();
		$filesx = array();
		for ($r = 0; $r < count($rrr); $r++) {
			$line = $rrr[$r];
			$tipo = $line['doc_tipo'];
			if (isset($files[$tipo])) {
				$filesx[$tipo] = $ok;
				$files[$tipo] = $opc;
			}

		}
		$erros = 0;
		foreach ($files as $key => $value) {
			$sx .= '<tr class="' . $files[$key] . '">';
			$sx .= '<td>';
			$sx .= $desc[$key];
			$sx .= '</td>';
			$sx .= '<td align="center">';
			if (isset($filesx[$key])) {
				$sx .= $filesx[$key];
			} else {
				if ($value != 'success') {
					$sx .= $erro;
					$erros++;
				} else {
					$sx .= $ok;
				}
			}

			$sx .= '</td>';
		}
		if ($erros == 0) { $vd[2] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_arquivos') . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[2] . '</tr>';

		/* valicacao */
		$ok = 1;
		$cps = 2;
		/* Campos para validacao */
		for ($r = 0; $r <= $cps; $r++) {
			if ($vd[$r] == $erro) { $ok = 0;
			}
		}
		if ($ok == 1) {
			$sx .= '<tr><td><B><font color="green">' . msg('validataion_ok') . '</font></b></td></tr>';
		} else {
			$sx .= '<tr><td><B><font color="red">' . msg('validataion_error') . '</font></b></td></tr>';
		}
		$sx .= '</table>';

		$cp = array();
		$idp = '2' . strzero($id, 6);
		if ($ok == 1) {
			array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));
			array_push($cp, array('$M', '', $sx, False, True));
			array_push($cp, array('$C', '', 'Concordo em enviar o projeto para análise!', True, True));
		} else {
			array_push($cp, array('$HV', 'pj_codigo', '', True, True));
			array_push($cp, array('$M', '', $sx, False, True));
			array_push($cp, array('$B', '', 'Existe pendências na submissão!', False, True));
		}

		return ($cp);
	}

	function altera_status($id, $sta = '') {
		$sql = "update " . $this -> tabela . " set pj_status = '$sta' where id_pj = '$id' ";
		$this -> db -> query($sql);
	}

	function projeto_novo($cracha) {
		$ano = date("Y");
		$data = date("Y-m-d");

		$id = $this -> exist_submit($cracha, $ano);
		if ($id == 0) {
			$sql = "insert into " . $this -> tabela . " 
							(
							pj_edital, pj_titulo, pj_codigo,
							pj_ano,	pj_grupo_pesquisa, pj_dt_update,
							pj_update, pj_status, pj_professor
							) values (
							'" . $this -> tipo . "','','',
							'$ano','','$data',
							'$data','@','$cracha') ";
			$rlt = $this -> db -> query($sql);
			$id = $this -> exist_submit($cracha, $ano);
		}

		$this -> updatex();
		$url = base_url('index.php/ic/submit_edit/' . $this -> tipo . '/' . $id . '/' . checkpost_link($id));
		redirect($url);
		return ($id);
	}

	function updatex() {
		$sql = "update " . $this -> tabela . " set pj_codigo = concat('2',lpad(id_pj,6,0)) where pj_codigo = '' ";
		$rlt = $this -> db -> query($sql);
	}

	function exist_submit($cracha, $ano) {
		$sql = "select id_pj from " . $this -> tabela . " where pj_status = '@' 
							and pj_edital = '" . $this -> tipo . "' 
							and pj_ano = '$ano' 
							and pj_professor = '$cracha' 
							LIMIT 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($rlt[0]['id_pj']);
		} else {
			return (0);
		}
	}

	function resumo_submit($cracha = '', $ano = '') {
		$res = array('0', '-', '-', '-', '-', '-');
		$link = array('', '', '', '', '', '');

		$sql = "select count(*) as total, pj_status 
							FROM " . $this -> tabela . "
							WHERE pj_edital = '" . $this -> tipo . "' and pj_ano = '$ano' and pj_professor = '$cracha'
							GROUP BY pj_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['pj_status'];
			switch($sta) {
				case '@' :
					$res[0] = round($res[0]) + $line['total'];
					$lk = base_url('index.php/ic/submit/' . $this -> tipo . '/0');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[0] = $lk;
					break;
				case 'A' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit/' . $this -> tipo . '/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
			}

		}
		$sql = "ic_submissao_plano";

		$sx = '<table width="100%" class="tabela01 lt2" cellspacing=10>';
		$sx .= '<tr>';
		$sx .= '<td colspan="10" class="lt6">' . msg('resumo_das_submissoes') . ' - ' . msg($this -> tipo) . '</td>';
		$sx .= '</tr>';

		$sz = round(100 / 6) . '%';

		$cap = array();
		$sx .= '<tr>';
		$cap[0] = msg('ic_projetos') . ' ' . msg('em_cadastro');
		$cap[1] = msg('ic_planos') . ' ' . msg('em_cadastro');
		$cap[2] = msg('ic_projetos') . ' ' . msg('em_submetidos');
		$cap[3] = msg('ic_planos') . ' ' . msg('em_submetidos');
		$cap[4] = msg('ic_projetos') . ' ' . msg('cancelados');
		$cap[5] = msg('ic_planos') . ' ' . msg('cancelados');
		$sx .= '</tr>';

		$sx .= '<tr class="lt6">';
		for ($r = 0; $r < 6; $r++) {
			$bg = '';
			/* Submetidos */
			if (($r >= 2) and ($r <= 3)) {
				$bg = 'bg_lgreen';
			}

			/* Cancelados */
			if (($r >= 4) and ($r <= 5)) {
				$bg = 'bg_lred';
			}
			$sx .= '<td class="captacao_folha border1 black ' . $bg . '" align="center" width="' . $sz . '">';
			$sx .= '<font class="lt1">' . $cap[$r] . '</font><br/>';
			$sx .= $link[$r] . $res[$r] . '</a></td>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function mostra_projetos_situacao($cracha, $sta, $ano = '', $edital = '') {
		if ($ano == '') { $ano = date("Y");
		}

		$wh = "pj_status = '$sta' ";
		if ($sta == '0') { $wh = "pj_status = '@' ";
		}
		if ($sta == 'A') { $wh = "(pj_status = 'A' or pj_status = 'B' or pj_status = 'C' or pj_status = 'D' or pj_status = 'E' or pj_status = 'F') ";
		}
		$sql = "select * from ic_submissao_projetos where pj_professor = '$cracha' 
					and pj_ano = '$ano' and $wh ";
		if (strlen($edital) > 0) {
			$sql .= " and pj_edital = '$edital' ";
		}

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table class="tabela01" width="100%">';
		$sx .= '<tr>
					<th width="5%">protocolo</th>
					<th>Título do projeto</th>
					<th width="10%">Tipo</th>
					<th width="5%">Ano</th>
					<th width="5%">Situação</th>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$link = base_url('index.php/ic/projeto_view/' . $line['id_pj'] . '/' . checkpost_link($line['id_pj']));
			$link = '<a href="' . $link . '" class="link lt1">';
			$sx .= '<tr>';
			$sx .= '<td align="center" class="border1">';
			$sx .= $link . $line['pj_codigo'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="border1">';
			$sx .= $link.$line['pj_titulo'].'</a>';
			$sx .= '</td>';

			$sx .= '<td align="center" class="border1">';
			$sx .= $link.$line['pj_edital'].'</a>';
			$sx .= '</td>';

			$sx .= '<td align="center" class="border1">';
			$sx .= $line['pj_ano'];
			$sx .= '</td>';

			$sx .= '<td align="center" class="border1">';
			$sx .= msg('situacao_' . trim($line['pj_status']));
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}
	function submit_enviar_email($proto) {
		$this -> load -> model('Mensagens');
		$prj_data = $this -> ics -> le_projeto($proto);
		$proto = '2' . strzero($proto, 6);

		$sx = $this -> load -> view('header/header_email', null, true);
		$sx = '';
		$sx .= '<h1>Submissão de PIBIC Master</h1>';
		$sx .= $this -> load -> view('ic/projeto', $prj_data, true);

		/* Planos */
		$sql = "select * from ic_submissao_plano
					inner join us_usuario on doc_aluno = us_cracha 
					where doc_protocolo_mae = '$proto' and doc_status = '@' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();
		for ($r = 0; $r < count($rrr); $r++) {
			$data = $rrr[$r];
			$data['tipo'] = '';
			$data['id'] = '';
			$data['nrplano'] = ($r + 1);
			$data['arquivos'] = '';
			$data['arquivos_submit'] = '';
			$data['bloquear'] = 'SIM';
			$sx .= '<hr>';
			$sx .= $this -> load -> view('ic/plano_submit_email.php', $data, true);
		}

		$data['dados'] = $sx;
		$txt = $this -> Mensagens -> busca('IC_SUBMITED', $data);

		$own = $txt['nw_own'];
		/* Enviador */

		$user = $this -> usuarios -> le_cracha($prj_data['pj_professor']);
		$idu = $user['id_us'];

		$text = $txt['nw_texto'];
		$titulo = $txt['nw_titulo'];

		enviaremail_usuario($idu, $titulo . ' - ' . $proto, $text, $own);
	}
}
?>
