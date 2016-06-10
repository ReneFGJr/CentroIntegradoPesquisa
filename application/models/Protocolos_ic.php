<?php
class protocolos_ic extends CI_Model {

	var $tabela = 'ic_protocolos';

	function fechamento_protocolo($obj) {
		$sta = get("dd4");
		$sol = get("dd3");
		$id = $obj['id_pr'];
		$date = date("Y-m-d");
		$hora = date("H:i");
		$log = $_SESSION['cracha'];

		$sql = "update ic_protocolos set
						pr_status = '$sta',
						pr_solucao = '$sol',
						pr_solucao_data = '$date',
						pr_solucao_hora = '$hora',
						pr_solucao_log = '$log'
					where id_pr = $id ";
		$this -> db -> query($sql);
		return (0);
	}

	/* CANCELAMENTO
	 *
	 *
	 */
	function protocolo_CAN($obj) {
		/*  Acoes ******************************************************************************
		 ***************************************************************************************
		 */
		$proto = $obj['pr_protocolo_original'];
		$ac = '999';
		$hist = 'Cancelamento do plano do aluno';
		$aluno1 = '';
		$aluno2 = '';
		$motivo = '999';
		$obs = 'Cancelamento da orientação: <b>' . mst($obj['pr_descricao']) . '</b>';
		$obs .= '<br>Justificativa:' . $obj['pr_justificativa'];

		/*********************************/
		/* Lancar historico              */
		$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

		/*****************************************/
		/* Cancelar iniciacao na tabela ic       */
		/* Cancelar iniciacao na tabela ic_aluno */
		$this -> ics -> cancelar_protocolo($proto);

		/*****************************************/
		/* Fechar protocolo                      */
		$this -> fechamento_protocolo($obj);

		/****************************************/
		/* Enviar e-mail de cancelamento        */
		$id = $obj['id_pr'];
		$us_id = $obj['id_us'];
		$data = $this -> protocolos_ic -> le($id);
		$data2 = $this -> ics -> le_protocolo($proto);
		$data = array_merge($data, $data2);

		$txt = $this -> load -> view('ic/plano-email', $data, true);
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
		enviaremail_usuario($us_id, 'Cancelamento de orientação', $txt, 2);

		return (1);
	}

	/* SUBSTITUICAO
	 *
	 *
	 */
	function protocolo_SBS($obj) {
		$id = $obj['id_pr'];
		$id = 1;
		$us_id = $obj['id_us'];
		$us_id = 1;

		/* Situação */
		$resolucao = get("dd4");

		/* Cancelado*/
		if ($resolucao == 'C') {
			/*****************************************/
			/* Fechar protocolo                      */
			$this -> fechamento_protocolo($obj);

			/*  Acoes ******************************************************************************
			 ***************************************************************************************
			 */
			$proto = $obj['pr_protocolo_original'];
			$ac = '997';
			$hist = 'Substituição de Estudante CANCELADA';
			$aluno1 = '';
			$aluno2 = '';
			$motivo = '997';
			$obs = 'Substituição do aluno: <b>' . mst($obj['pr_descricao']) . '</b>';
			$obs .= '<br>Justificativa:' . $obj['pr_justificativa'];

			/*********************************/
			/* Lancar historico              */
			$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

			/* recupera dados atuais aluno */
			$data = $this -> protocolos_ic -> le($id);
			$data2 = $this -> ics -> le_protocolo($proto);
			$data_antigo = array_merge($data, $data2);
			$txt = '<h1>Substituição de aluno</h1>';
			$txt .= '<h2>De:</h2>';
			$txt .= $this -> load -> view('ic/plano-email', $data_antigo, true);
			$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);

			enviaremail_usuario($us_id, 'Substituicao de orientação CANCELADA/INDEFIRIDA', $txt, 2);
			return (1);
		}

		/* Finalizado*/
		if ($resolucao == 'F') {

			/*  Acoes ******************************************************************************
			 ***************************************************************************************
			 */
			$proto = $obj['pr_protocolo_original'];
			$ac = '998';
			$hist = 'Substituição de Aluno';
			$aluno1 = '';
			$aluno2 = '';
			$motivo = '998';
			$obs = 'Substituição do aluno: <b>' . mst($obj['pr_descricao']) . '</b>';
			$obs .= '<br>Justificativa:' . $obj['pr_justificativa'];

			/*********************************/
			/* Lancar historico              */
			$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

			/* recupera dados atuais aluno */
			$data = $this -> protocolos_ic -> le($id);
			$data2 = $this -> ics -> le_protocolo($proto);
			$data_antigo = array_merge($data, $data2);
			$txt = '<h1>Substituição de aluno</h1>';
			$txt .= '<h2>De:</h2>';
			$txt .= $this -> load -> view('ic/plano-email', $data_antigo, true);

			/*****************************************/
			/* Cancelar iniciacao na tabela ic       */
			/* Cancelar iniciacao na tabela ic_aluno */
			$cracha_antigo = $data_antigo['ic_cracha_aluno'];
			$cracha_novo = $obj['pr_beneficiador'];
			$protocolo = $obj['pr_protocolo_original'];
			$data = $obj['pr_data'];
			$this -> ics -> substituicao_aluno($cracha_antigo, $protocolo, $cracha_novo, $data);
			/*****************************************/
			/* Fechar protocolo                      */
			$this -> fechamento_protocolo($obj);

			/****************************************/
			/* Enviar e-mail de cancelamento        */

			/* recupera novo aluno */
			$data = $this -> protocolos_ic -> le($id);
			$data2 = $this -> ics -> le_protocolo($proto);
			$data = array_merge($data, $data2);
			$txt2 = $this -> load -> view('ic/plano-email', $data, true);

			$txt .= '<h2>Para:</h2>';
			$txt .= $txt2;

			$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
			//enviaremail_usuario($us_id, 'Substituicao de orientação', $txt, 2);
			return (1);
		}
	}

	function cp_CAN() {
		$cp = array();
		$cp[0] = array('$HV', '', get('dd0'), False, False);
		$cp[1] = array('$HV', '', get('dd0'), False, False);
		$cp[2] = array('$A', '', 'Solução da solicitação', False, True);
		$cp[3] = array('$T80:5', '', 'Resolução', True, True);

		$op = 'F:Finalizar protocolo de serviço';
		$op .= '&C:Cancelar protocolo de serviço';
		$cp[4] = array('$O ' . $op, '', 'Ação', True, True);
		$cp[5] = array('$B8', '', 'Gravar', False, True);
		return ($cp);
	}

	function cp_SBS() {
		$cp = array();
		$cp[0] = array('$HV', '', get('dd0'), False, False);
		$cp[1] = array('$HV', '', get('dd0'), False, False);
		$cp[2] = array('$A', '', 'Solução da solicitação', False, True);
		$cp[3] = array('$T80:5', '', 'Resolução', True, True);

		$op = 'F:Finalizar protocolo de serviço';
		$op .= '&C:Cancelar protocolo de serviço';
		$cp[4] = array('$O ' . $op, '', 'Ação', True, True);
		$cp[5] = array('$B8', '', 'Gravar', False, True);
		return ($cp);
	}

	function verifica_se_existe_aberto($tipo, $proto) {
		$sql = "select * from ic_protocolos where
					pr_tipo = '$tipo' and
					pr_protocolo_original = '$proto' and
					pr_status = 'A'	";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function row($obj) {
		$obj -> fd = array('id_pr', 'pr_protocolo_original', 'us_nome', 'pts_descricao', 'pr_data', 'pr_hora', 'pr_ano', 'ict_descricao', 'pr_tipo');
		$obj -> lb = array('ID', 'Protocolo', 'Nome', 'Situação', 'Data', 'Hora', 'Login', 'Serviço', 'Tipo');
		$obj -> mk = array('', 'C', 'L', 'C', 'C');
		return ($obj);
	}

	function resumo() {
		$v = array('-', '-', '-');
		$sql = "select count(*) as total, pr_status from ic_protocolos group by pr_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = trim($line['pr_status']);
			if ($sta == 'A') { $v[0] = $line['total'];
			}
			if ($sta == 'F') { $v[1] = $line['total'];
			}
			if ($sta == 'C') { $v[2] = $line['total'];
			}
		}

		$sx = '<div class="border1 radius10">';
		$sx .= '<table width="100%">';
		$sx .= '<tr><td class="lt3" colspan=3><b>Serviços protocolados</b></td></tr>';
		$sx .= '<tr class="lt0" align="center">';
		$sx .= '<td width="33%">Aberto(s)</td>';
		$sx .= '<td width="33%">Fechados(s)</td>';
		$sx .= '<td width="33%">Cancelados(s)</td>';
		$sx .= '</tr>';

		$link0 = '';
		$link1 = '';
		$link2 = '';
		if ($v[0] > 0) {
			$link0 = '<a href="' . base_url('index.php/ic/protocolo/A/' . checkpost_link('A')) . '" class="link lt6" stlye="color: red;">';
		}
		if ($v[1] > 0) {
			$link1 = '<a href="' . base_url('index.php/ic/protocolo/F/' . checkpost_link('F')) . '" class="link lt6">';
		}
		if ($v[2] > 0) {
			$link2 = '<a href="' . base_url('index.php/ic/protocolo/C/' . checkpost_link('C')) . '" class="link lt6">';
		}

		$sx .= '<tr class="lt6" align="center">';
		$sx .= '<td width="33%">' . $link0 . '<b>' . $v[0] . '</b></a></td>';
		$sx .= '<td width="33%">' . $link1 . '<b>' . $v[1] . '</b></a></td>';
		$sx .= '<td width="33%">' . $link2 . '<b>' . $v[2] . '</b></a></td>';
		$sx .= '</tr>';

		$sx .= '</table>';
		$sx .= '</div><br>';
		return ($sx);
	}

	function orientacoes_protocolo($tp, $bt) {
		$cracha = $_SESSION['cracha'];

		if (strlen($bt) > 0) {
			$wh = ' and (s_id = 1) ';
		}
		/* Pré-relatorio parcial */
		switch ($tp) {
			case 'form_pre' :
				$wh = ' and ((s_id = 1) and (ic_pre_data = \'0000-00-00\'))';
				break;
			case 'form_ic_rp' :
				$wh = ' and ((s_id = 1) and (ic_rp_data = \'0000-00-00\'))';
				break;
			case 'form_ic_rpc' :
				$wh = ' and ((s_id = 1) and (ic_rpc_data = \'0000-00-00\' and ic_nota_rp = 2))';
				break;
			case 'form_ic_rf' :
				$wh = ' and ((s_id = 1) and (ic_rf_data = \'0000-00-00\'))';
				break;
			case 'form_ic_rfc' :
				$wh = ' and ((s_id = 1) and (ic_rfc_data = \'0000-00-00\' and ic_nota_rf = 2))';
				break;				
		}

		/* Relatorio parcial */

		$sql = "select * from ic 
						where ic_cracha_prof = '$cracha' or ic_cracha_aluno = '$cracha' ";
		$sql = "select * from ic
            			left join ic_aluno as pa on ic_id = id_ic
						left join (select us_cracha as id_al, id_us as aluno_id, us_nome as al_nome, us_cracha as al_cracha from us_usuario) AS us_est on ic.ic_cracha_aluno = us_est.id_al
						left join (select us_cracha as id_pf, id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						where (ic_cracha_prof = '$cracha' or ic_cracha_aluno = '$cracha')
						$wh and id_s = 1
						order by ic_ano desc, ic_plano_aluno_codigo, pf_nome, al_nome
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%">';
		for ($r = 0; $r < count($rlt); $r++) {
			$btm = $bt;
			$tpm = $tp;
			$line = $rlt[$r];
			$edital = trim($line['mb_tipo']);
			$CI = &get_instance();
			$line['img'] = $CI -> ics -> logo_modalidade($edital);
			$line['page'] = 'pibic';
			$st = $line['id_s'];
			if (($st == '2') or ($st == '4')) {
				$btm = '';
				$tpm = '';
			}

			$line['botao'] = $btm;
			$line['acao'] = $tpm;

			$sx .= $this -> load -> view("ic/plano-lista", $line, true);
			$sx .= '</td></tr>';
		}

		$sx .= '</table>';
		return ($sx);
	}

	function le($id = 0) {
		$sql = "select * from ic_protocolos
						left join us_usuario on us_cracha = pr_solicitante 
						where id_pr = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	/** ABRIR PROTOCOLO **/
	function protocolo_inserir($cracha, $proto, $motivo, $just, $tipo, $estu = '', $local = 'IC') {
		if (strlen($estu) > 0) {
			$estu = $this -> usuarios -> limpa_cracha($estu);
		}

		$sql = "select * from ic_protocolos 
					where pr_tipo = '$tipo' and
					pr_solicitante = '$cracha' and
					pr_protocolo_original = '$proto' and
					pr_status = 'A' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ( array(0, msg('Already_exists_protocol')));
		}
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$ano = date("Y");

		$sql = "insert into ic_protocolos 
					(
					pr_protocolo, pr_protocolo_original, pr_local,
					pr_ano, pr_tipo, pr_solicitante,
					pr_beneficiador, pr_descricao, pr_justificativa,
					
					pr_status, pr_data, pr_hora,
					pr_solucao, pr_solucao_data, pr_solucao_hora,
					pr_solucao_log
					) values (
					'','$proto','$local',
					'$ano','$tipo','$cracha',
					'$estu','$motivo','$just',
					
					'A','$data','$hora',
					'','0000-00-00','',
					''
					)			
			";
		$this -> db -> query($sql);

		return ( array(1, ''));
	}

	function abrir($tp, $proto = '') {
		$form = new form;

		switch ($tp) {
			case 'CAN' :
				$cp = $this -> cp_cancelar();
				$motivo = $this -> input -> post("dd2");
				$justificativa = $this -> input -> post("dd3");
				$aluno = '';
				break;
			case 'SBS' :
				$dd2 = $this -> usuarios -> limpa_cracha(get("dd2"));
				$aluno = $dd2;
				$motivo = $this -> input -> post("dd5");
				$justificativa = '';
				/* Recupera dados do aluno */
				if (strlen($dd2) == 8) {
					$user = $this -> usuarios -> consulta_cracha($dd2);
					$user = $this -> usuarios -> readByCracha($dd2);
					$justificativa = '<b>Substituição de estudante<b><br>';
					$justificativa .= $this -> load -> view('usuario/view_simple', $user, True);
					$justificativa = troca($justificativa, chr(13), ' ');
					$justificativa = troca($justificativa, chr(10), '');
				}
				$justificativa .= '<hr><tt>' . get("dd6") . '</tt>';
				$aluno = get("dd2");
				$cp = $this -> cp_substituir();
				break;
			default :
				echo 'OPS ' . $tp;
				exit ;
		}

		$tela = $form -> editar($cp, '');
		if ($form -> saved > 0) {
			$solicitante = $_SESSION['cracha'];

			$rs = $this -> protocolo_inserir($solicitante, $proto, $motivo, $justificativa, $tp, $aluno);
			if ($rs[0] == '0') {
				$tela .= '<br><font color="red">' . $rs[1] . '</font>';
			} else {
				$tela = '<center><br><h2><font color="green">' . msg('protocol_successful') . '</font></h2></center>';
				/* Enviar e-mail */
			}

		}
		return ($tela);
	}

	/* Cancelar protocolo */
	function cp_cancelar() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$M', '', '<h2>' . msg('protocolo_ic_CAN') . '</h2>', False, False));
		array_push($cp, array('$Q pm_descricao:pm_descricao:select * from ic_protocolo_motivos where pm_ativo=1 and pm_tipo = \'CAN\' order by pm_ordem, pm_descricao', '', msg('pr_descricao'), '', True, True));
		array_push($cp, array('$T80:4', '', msg('justify'), True, True));
		array_push($cp, array('$C8', '', msg('pr_confirm_cancel'), True, True));
		array_push($cp, array('$B8', '', msg('bt_confirm'), False, False));
		return ($cp);
	}

	/* Cancelar protocolo */
	function cp_substituir() {

		$cp = array();
		$dd2 = $this -> input -> post("dd2");
		$dados_aluno = '';
		$msg = '';
		/* Valida */
		if (strlen($dd2) > 0) {
			$dd2 = $this -> usuarios -> limpa_cracha($dd2);
			$_POST['dd2'] = $dd2;

			if (strlen($dd2) == 8) {
				$user = $this -> usuarios -> readByCracha($dd2);
				$dados_aluno = $this -> load -> view('usuario/view', $user, True);
			} else {
				$dd2 = '';
				$_POST['dd2'] = '';
				$dados_aluno = '<center><font class="lt3"><font color="red">Código inválido</font></font>';
			}
		}

		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$M', '', '<h2>' . msg('protocolo_ic_SBS') . '</h2>', False, False));
		array_push($cp, array('$S14', '', msg('codigo_aluno_novo'), True, True));
		array_push($cp, array('$M', '', $dados_aluno, False, True));
		/* */
		if (strlen($dd2) == 8) {
			array_push($cp, array('$C8', '', msg('pr_confirm_sbs'), True, True));
			array_push($cp, array('$Q pm_descricao:pm_descricao:select * from ic_protocolo_motivos where pm_ativo=1 and pm_tipo = \'SBS\' order by pm_ordem, pm_descricao', '', msg('pr_descricao_sbs'), '', True, True));
			array_push($cp, array('$T80:4', '', msg('justify'), True, True));

		} else {
			array_push($cp, array('$H8', '', msg('pr_confirm_sbs'), False, True));
		}
		return ($cp);

	}

	function acoes_abertas() {
		$sx = '';
		$id_us = $_SESSION['id_us'];
		$data = $this -> usuarios -> le($id_us);
		if ($data['usuario_tipo_ust_id'] == 2) {
			$sx = '<h3>' . msg('request') . ':</h3>';
			$sx .= '<ul>';
			/* */
			$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/SBS/') . '" class="link lt2">';
			$sx .= '<li>' . $linka . 'Substituição do aluno' . '</a>' . '</li>';

			/* cancelamento de orientação */
			$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/CAN/') . '" class="link lt2">';
			$sx .= '<li>' . $linka . 'Cancelamento de Orientação' . '</a>' . '</li>';

			/* */
			//$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/ALT/') . '" class="link lt2">';
			//$sx .= '<li>' . $linka . 'Alteração de título do Plano do Aluno' . '</a>' . '</li>';

			/* */
			//$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/REC/') . '" class="link lt2">';
			//$sx .= '<li>' . $linka . 'Recurso' . '</a>' . '</li>';
			/* */
			$linka = '<a href="' . base_url('index.php/pibic/carta_horas_eventuais') . '" class="link lt2">';
			$sx .= '<li>' . $linka . 'Impressão do Convite Horas Eventuais IC' . '</a>' . '</li>';

			$sx .= '</ul>';
		}
		return ($sx);
	}

	function resumo_protocolos($cracha = '') {
		$sql = "select count(*) as total, pr_status from ic_protocolos 
					left join us_usuario on us_cracha = pr_solicitante
						where pr_solicitante = '$cracha'
					group by pr_status
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$rst = array('0' => 0, '1' => 0, '2' => 0);
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['pr_status'];
			$t = $line['total'];
			switch ($sta) {
				case 'A' :
					$rst[0] = $rst[0] + $t;
					break;
				case 'B' :
					$rst[0] = $rst[0] + $t;
					break;
				case 'C' :
					$rst[1] = $rst[1] + $t;
					break;
				case 'F' :
					$rst[2] = $rst[2] + $t;
					break;
			}
		}
		$sx = '<table class="lt0 border1" width="100%">';
		$sx .= '<tr><th class="lt3" align="center">' . msg('request') . '</th></tr>';
		$sx .= '<tr>';
		$sx .= '<th width="33%">' . msg('proto_th_open') . '</th>';
		$sx .= '<th width="33%">' . msg('proto_th_close') . '</th>';
		$sx .= '<th width="33%">' . msg('proto_th_cancel') . '</th>';
		$sx .= '</tr>';
		$sx .= '<tr class="lt6">';
		$sx .= '<th width="33%">' . $rst[0] . '</th>';
		$sx .= '<th width="33%">' . $rst[1] . '</th>';
		$sx .= '<th width="33%">' . $rst[2] . '</th>';
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function protocolos_abertos_pesquisador($cracha = '') {
		$sql = "select * from ic_protocolos 
					left join us_usuario on us_cracha = pr_solicitante
						where pr_solicitante = '$cracha'
						order by pr_status, pr_data
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$total = 0;
		$sx = '<table width="100%" class="lt2">';
		$sx .= '<tr><th>protocolo</th>
						<th>abertura</th>
						<th>tipo</th>
						<th>solicitante</th>
						<th>status</th>
					</tr>						
					';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = '<a href="' . base_url('index.php/pibic/pibic_protocolo_ver/' . $line['id_pr']) . '/' . checkpost_link($line['id_pr']) . '" class="link lt2">';
			$total++;
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= $link;
			$sx .= strzero($line['id_pr'], 5) . '/' . substr($line['pr_ano'], 2, 2);
			$sx .= '</a>';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= stodbr($line['pr_data']);
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= msg('protocolo_ic_' . $line['pr_tipo']);
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_nome'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= msg('status_protocolo_' . $line['pr_status']);
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function protocolos_abertos() {
		return (0);
		$sql = "select count(*) as total from ic_protocolos where pr_status ='A' group by pr_status = 'A' ";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			$total = $line['total'];
		} else {
			$total = 0;
		}
		return ($total);
	}

	function substituicao_de_indicacao_submissao($prof) {
		/* professor */
		$ano = date("Y");
		if (date("m") < 4) {
			$ano--;
		}
		/* reliza consulta */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic_submissao_plano
					left join us_usuario on doc_aluno = us_cracha
						where doc_autor_principal = '$cracha' 
						and doc_ano = '" . $ano . "'
						and (doc_status <> '!' and doc_status <> '@' and doc_status <> 'X')
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table class="table lt2" width="100%">';
		$sx .= '<tr><th>Protocolo</th><th>Título do Plano do Estudante</th><th>Estudante Indicado</th></tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$chk1 = '';
			$chk2 = '';

			$icv = $line['doc_icv'];
			$esc = $line['doc_escola_publica'];
			if ($icv == 1) { $chk1 = 'checked';
			}
			if ($esc == 1) { $chk2 = 'checked';
			}
			$proto = trim($line['doc_protocolo']);
			
			$sx .= '<tr valign="top" style="background-color: #efefef;">';
			$sx .= '<td width="5%" align="center">';
			$sx .= $line['doc_protocolo'];
			$sx .= '<img src="'.base_url('img/logo/logo_ic_'.lowercase($line['doc_edital']).'.png').'" height="50">'.cr();
			$sx .= '</td>';
			$sx .= '<td width="40%">';
			$sx .= $line['doc_1_titulo'];
			
			$sx .= '<br>';
			$sx .= '<span class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true" onclick="mostra_div(\''.$proto.'\');"></span>';
			$sx .= '</td>';
			$sx .= '<td width="45%">';
			$sx .= '<b>' . $line['us_nome'] . '</b><br>';
			
			if ($line['doc_aluno'] != '00000000') {
				$sx .= '<input type="checkbox" name="dd' . $proto . 'A" id="dd' . $proto . 'A" ' . $chk1 . ' value="1" onclick="muda_situacao_trabalho(\'' . $proto . 'A\');"> ' . msg('estudante_trabalha') . '<br>';
				$sx .= '<input type="checkbox" name="dd' . $proto . 'B" id="dd' . $proto . 'B" ' . $chk2 . ' value="1" onclick="muda_situacao_publico(\'' . $proto . 'B\');"> ' . msg('estudante_esc_publica') . '<br>';
			}
			$sx .= '<a href="'.base_url('index.php/ic/substituir_estudante/'.$line['doc_protocolo'].'/'.checkpost_link($line['doc_protocolo'])).'" class="btn btn-primary">' . msg('estudante_substituir') . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';

			$sx .= '<tr valign="top">';
			$sx .= '<td colspan=3>';
			$sx .= '<div id="dd' . $proto . 'i" style="display: none;">';
			$data['ic_plano_aluno_codigo'] = $proto;
			$sx .= $this -> load -> view('ic/plano_historico', $data, true);
			$sx .= '</div>';
			$sx .= '</td></tr>';
		}
		$sx .= '</table>';

		$sx .= '<script language="JavaScript" type="text/javascript" src="' . base_url('js/ic/ajax_estudante.js') . '"></script>';
		return ($sx);
	}

}
?>
