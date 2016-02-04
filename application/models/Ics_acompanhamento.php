<?php
/*
 */
class ics_acompanhamento extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";
	
	function relatorio_parcial_entregue($ano = 0)
		{
			$wh = " (ic_ano = '$ano') ";
			$wh .= " and (ic_rp_data > '2000-01-01')";
			$sql = $this -> ics-> table_view($wh, 0, 9999999, 'al_nome');
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="100%" class="tabela00">';
			$sx .= '<tr>
						<th>protocolo</th>
						<th>situa��o</th>
						<th>ano</th>
						<th>T�tulo do plano</th>
						<th>Orientador</th>
						<th>Estudante</th>
						<th>Modalidade</th>
					</tr>';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$line['page'] = 'ic';
					$sx .= $this->load->view('ic/plano-row.php',$line,true);
				}
			$sx .= '</table>';
			return($sx);
		}

	function form_acompanhamento_prof($ano = 0) {
		$ano = date("Y");
		$sql = "select * from ic_acompanhamento 
					where pa_status = 'B' 
						and pa_data >= '$ano-01-01' and pa_data <= '$ano-12-31' 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$pa01 = array(0, 0, 0);
		$pa02 = array(0, 0, 0, 0);
		$pa03 = array(0, 0, 0, 0);
		$pa04 = array(0, 0, 0);
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$p1 = $line['pa_p01'];
			$p2 = $line['pa_p02'];
			$p3 = $line['pa_p03'];
			$p4 = $line['pa_p04'];

			if ($p1 == '0') { $pa01[0] = $pa01[0] + 1;
			}
			if ($p1 == '1') { $pa01[1] = $pa01[1] + 1;
			}
			if ($p1 == '2') { $pa01[2] = $pa01[2] + 1;
			}

			if ($p2 == '0') { $pa02[0] = $pa02[0] + 1;
			}
			if ($p2 == '1') { $pa02[1] = $pa02[1] + 1;
			}
			if ($p2 == '2') { $pa02[2] = $pa02[2] + 1;
			}
			if ($p2 == '3') { $pa02[3] = $pa02[3] + 1;
			}

			if ($p3 == '0') { $pa03[0] = $pa03[0] + 1;
			}
			if ($p3 == '1') { $pa03[1] = $pa03[1] + 1;
			}
			if ($p3 == '2') { $pa03[2] = $pa03[2] + 1;
			}
			if ($p3 == '3') { $pa03[3] = $pa03[3] + 1;
			}

			if ($p4 == '0') { $pa04[0] = $pa04[0] + 1;
			}
			if ($p4 == '1') { $pa04[1] = $pa04[1] + 1;
			}
			if ($p4 == '2') { $pa04[2] = $pa04[2] + 1;
			}
		}
		$sx = '';

		$sx = '<table width="100%" class="lt2" border=0 cellpadding="10">';
		$sx .= '<tr><th class="lt3"><b>Resultado pr�vio do question�rio</b></th></tr>';
		/* Pergunta 1 */
		$sx .= '<tr><td width="30%"><b>' . msg('lb_form_prof_pa1') . '</b> ';
		$sx .= 'SIM (' . $pa01[1] . ') x N�O (' . $pa01[2] . '), N�o opinado (' . $pa01[0] . ')';

		/* Pergunta 3 */
		$sx .= '<tr><td width="30%"><b>' . msg('lb_form_prof_pa3') . '</b> ';
		$sx .= 'por e-mail (' . $pa02[1] . ') x presencial (' . $pa02[2] . '), ambos (' . $pa02[3] . '), N�o opinado (' . $pa02[0] . ')';

		/* Pergunta 4 */
		$link03a = '<a href="' . base_url('index.php/ic/entrega/FORM_PROF/?dd1=pa_p03&dd2=2') . '">';
		$sx .= '<tr><td width="30%"><b>' . msg('lb_form_prof_pa4') . '</b> ';
		$sx .= ' em dia (' . $pa03[1] . ') x atrasado (' . $link03a. $pa03[2] . '</a>), adiantado (' . $pa03[3] . '), N�o opinado (' . $pa02[0] . ')';

		/* Pergunta 5 */
		$link04a = '<a href="' . base_url('index.php/ic/entrega/FORM_PROF/?dd1=pa_p04&dd2=1') . '">';
		$sx .= '<tr><td width="30%"><b>' . msg('lb_form_prof_pa5') . '</b> ';
		$sx .= 'SIM (' . $link04a . $pa04[1] . '</a>) x N�O (' . $pa04[2] . '), N�o opinado (' . $pa04[0] . ')';

		$sx .= '</table>';

		$dd1 = get("dd1");
		$dd2 = get("dd2");

		if (strlen($dd1) > 0) {
			$sql = "select * from ic_acompanhamento
								inner join ic on pa_protocolo = ic_plano_aluno_codigo
								inner join ic_aluno on id_ic = ic_id and icas_id = 1
								inner join us_usuario on us_cracha = ic_cracha_prof
							where pa_status = 'B' 
								and pa_data >= '$ano-01-01' and pa_data <= '$ano-12-31'
								and $dd1 = '$dd2'
								order by us_nome ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$sx .= '<table width="100%" border=0 class="lt2" cellpadding=5>';
			$sx .= '<tr><th>pos</th><th>protocolo</th><th>orientador</th><th>t�tulo da pesquisa</th></tr>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$link_ic = link_ic($line['id_ic']);
				$sx .= '<tr valign="top">';
				$sx .= '<td width="15" class="borderb1">'.($r+1).'</td>';
				$sx .= '<td class="borderb1">';
				$sx .= $link_ic . $line['pa_protocolo'] . '</a>';
				$sx .= '</td>';

				$sx .= '<td class="borderb1">';
				$sx .= link_perfil($line['us_nome'], $line['id_us'],$line);
				$sx .= '</td>';
				
				$sx .= '<td width="60%" class="borderb1">';
				$sx .= $line['ic_projeto_professor_titulo'];
				$sx .= '</td>';		
				
			}
			$sx .= '</table>';
		}
		return ($sx);
	}
	
	function form_entregue($proto='',$tipo='')
		{
			$sql = "select * from ic where ic_plano_aluno_codigo = '$proto' limit 1";
			$rlt = $this->db->query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					if ($line[$tipo] != '0000-00-00')
					{
						return(1);
					} else {
						return(0);
					}
				} else {
					return(0);
				}
			print_r($rlt);
		}

	function form_acompanhamento_exist($proto = '', $tipo = '') {
		$sql = "select * from ic_acompanhamento 
					where
						pa_protocolo = '$proto' and
						pa_tipo = '$tipo'
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$sqlx = "insert into ic_acompanhamento
								(
								pa_protocolo, 	pa_usuario_id, 	pa_tipo,
								pa_status
								) values (
								'$proto',0,'$tipo',
								'@') ";
			$xrlt = $this -> db -> query($sqlx);
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
		}
		return ($rlt[0]);
	}

	function entregas_abertas() {
		$sis = $this -> sistemas_abertos_para_submissao('PIBIC');
		$sx = '';

		/* A��es abertas */
		$action = array();
		/* Question�rio de pr�-relatorio parcial */
		if (trim($sis['sw_03']) == '1') {
			$f1 = $this -> submissao_questionarios_professor();
			$action = array_merge($f1, $action);
			$f2 = $this -> submissao_questionarios_aluno();
			$action = array_merge($f2, $action);
		}
		/* Entrega do Relat�rio Parcial */
		if (trim($sis['sw_02']) == '1') {
			$f1 = $this -> submissao_relatorio_parcial();
			$action = array_merge($f1, $action);
		}
		/* Mostra atividades */
		if (count($action) > 0) {
			$size = round(250 + 60);
			$sa = '';
			$sb = '';
			$sc = '';
			$st = '';
			foreach ($action as $key => $value) {
				$form_bt = '<form action="' . base_url('index.php/pibic/entrega/' . $key) . '" method="get">';
				$form_bt .= '<input type="submit" value="' . msg('bt_entregar') . '" class="botao3d back_green_shadown back_green" style="width: ' . $size . 'px; text-align: center;">';
				$form_bt .= '</form>';
				$sa .= '<td class="lt4" align="left"><b>' . msg($key) . '</b></td>';
				$sb .= '<td class="lt5" align="left">' . $value . ' atividades.</td>';
				$sc .= '<td class="lt3" align="center">' . $form_bt . '</td>';
				$st .= '<td class="lt2" align="left">' . $this -> periodo_atividade($key) . "</td>'";
			}
			$sx = '<table width="100%" bgcolor="#ececec" style="padding: 10px;" class="border1">';
			$label = '<td rowspan=5 width="50" >';
			//$label .= '<img src="'.base_url('img/icon/icone_atividade.png').'" height="60">';
			$label .= '<img src="' . base_url('img/icon/icone_post_form.png') . '" height="90">';
			$label .= '</td>';

			$sx .= $label;
			$sx .= '<td class="lt5" width="' . $size . '" colspan=10><font class="red"><b>' . msg("ic_atividade_aberta") . '</b></font></td>';
			$sx .= '<td width="50%"></td>';
			$sx .= '<tr><td align="right" class="lt1">Atividade:</td>' . $sa . '</tr>';
			$sx .= '<tr><td align="right" class="lt1">Per�odo:</td>' . $st . '</tr>';
			$sx .= '<tr><td align="right" class="lt1">Para entregar:</td>' . $sb . '</tr>';
			$sx .= '<tr><td></td>' . $sc . '</tr>';
			$sx .= '</table>';
			$sx .= '<br><br><br>';
		} else {
			$sx = '';
		}
		return ($sx);
	}

	function periodo_atividade($n,$ano=0) {
		if ($ano==0) {
			$ano = date("Y");
			if (date("m") < 7) { $ano--; } 
		}
		$sql = "select * from ic_atividade where at_atividade = '$n' and at_ano = '$ano' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = 'n�o informado';
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$sx = stodbr($line['at_data_ini']);
			$sx .= ' at� ';
			$sx .= stodbr($line['at_data_fim']);
		}
		return ($sx);
	}

	/* Submissoes */
	

	function submissao_relatorio_parcial() {
		/* professor */
		$ano = date("Y");
		if (date("m") < 7)
			{
				$ano--;
			}
		/* reliza consulta */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_prof = '$cracha' 
						and ic_ano = '" . $ano . "'
						and s_id = 1
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$data_pre = $line['ic_rp_data'];
			if ($data_pre == '0000-00-00') {
				$tot++;
			}
		}
		if ($tot > 0) {
			$it = array('IC_FORM_RP' => $tot);
		} else {
			$it = array();
		}
		return ($it);

	}
	
	function submissao_questionarios_professor() {
		/* professor */
		$ano = date("Y");
		if (date("m") < 7)
			{
				$ano--;
			}		
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_prof = '$cracha' 
						and ic_ano = '" . $ano . "'
						and s_id = 1
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$data_pre = $line['ic_pre_data'];
			if ($data_pre == '0000-00-00') {
				$tot++;
			}
		}
		if ($tot > 0) {
			$it = array('IC_FORM_PROF' => $tot);
		} else {
			$it = array();
		}
		return ($it);

	}

	/* Submissoes */
	function submissao_questionarios_aluno() {
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_aluno = '$cracha' 
						and ic_ano = '" . date("Y") . "'
						and s_id = 1						
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$tot++;
		}
		if ($tot > 0) {
			$it = array('IC_FORM_ESTU' => $tot);
		} else {
			$it = array();
		}
		return ($it);

	}

	function sistemas_abertos_para_submissao($tipo = '') {
		$sql = "select * from " . $this -> tabela_acompanhamento . " where sw_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
		}
	}

}
?>
