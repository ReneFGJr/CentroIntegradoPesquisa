<?php
class protocolos_ic extends CI_Model {
	
	var $tabela = 'ic_protocolos';
	
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
		$obj -> fd = array('id_pr', 'pr_protocolo_original', 'us_nome', 'pts_descricao', 'pr_data', 'pr_hora', 'pr_ano','ict_descricao','pr_tipo');
		$obj -> lb = array('ID', 'Protocolo','Nome', 'Situa��o', 'Data','Hora', 'Login','Servi�o','Tipo');
		$obj -> mk = array('', 'C', 'L','C','C');
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
		$sx .= '<tr><td class="lt3" colspan=3><b>Servi�os protocolados</b></td></tr>';
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
		$sql = "select * from ic 
						where ic_cracha_prof = '$cracha' or ic_cracha_aluno = '$cracha' ";
		$sql = "select * from ic
            			left join ic_aluno as pa on ic_id = id_ic
						left join (select us_cracha as id_al, id_us as aluno_id, us_nome as al_nome, us_cracha as al_cracha from us_usuario) AS us_est on ic.ic_cracha_aluno = us_est.id_al
						left join (select us_cracha as id_pf, id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						where ic_cracha_prof = '$cracha' or ic_cracha_aluno = '$cracha'
						$wh
						order by ic_ano desc, ic_plano_aluno_codigo, pf_nome, al_nome
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$edital = trim($line['mb_tipo']);
			$CI = &get_instance();
			$line['img'] = $CI -> ics -> logo_modalidade($edital);
			$line['page'] = 'pibic';
			$st = $line['id_s'];
			if (($st == '2') or ($st == '4')) {
				$bt = '';
				$tp = '';
			}

			$line['botao'] = $bt;
			$line['acao'] = $tp;

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
				$dd2 = $this -> input -> post("dd2");
				$motivo = $this -> input -> post("dd5");
				$justificativa = '';
				/* Recupera dados do aluno */
				if (strlen($dd2) == 8) {
					$user = $this -> usuarios -> readByCracha($dd2);
					$justificativa = '<b>Substitui��o de estudante<b><br>';
					$justificativa .= $this -> load -> view('usuario/view_simple', $user, True);
					$justificativa = troca($justificativa, chr(13), ' ');
					$justificativa = troca($justificativa, chr(10), '');
				}
				$justificativa .= '<hr><tt>' . $this -> input -> post("dd6") . '</tt>';
				$aluno = $this -> input -> post("dd2");
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
				$dados_aluno = '<center><font class="lt3"><font color="red">C�digo inv�lido</font></font>';
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
		$sx = '<h3>' . msg('request') . ':</h3>';
		$sx .= '<ul>';
		/* */
		$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/SBS/') . '" class="link lt2">';
		$sx .= '<li>' . $linka . 'Substitui��o do aluno' . '</a>' . '</li>';

		/* cancelamento de orienta��o */
		$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/CAN/') . '" class="link lt2">';
		$sx .= '<li>' . $linka . 'Cancelamento de Orienta��o' . '</a>' . '</li>';

		/* */
		//$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/ALT/') . '" class="link lt2">';
		//$sx .= '<li>' . $linka . 'Altera��o de t�tulo do Plano do Aluno' . '</a>' . '</li>';

		/* */
		//$linka = '<a href="' . base_url('index.php/pibic/proto_abrir/REC/') . '" class="link lt2">';
		//$sx .= '<li>' . $linka . 'Recurso' . '</a>' . '</li>';
		/* */
		//$linka = '<a href="'.base_url('index.php/protocolos_ic/abrir/004/').'" class="link lt2">';
		//$sx .= '<li>'.$linka.'Impress�o do Convite Horas Eventuais IC'.'</a>'.'</li>';

		$sx .= '</ul>';
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

}
?>
