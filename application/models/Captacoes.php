<?php
class captacoes extends CI_Model {

	/************** acaoes */
	function acao_captacao($proto, $tp) {
		$data = date("Y-m-d");
		switch ($tp) {
			case '0' :
				// Com isenção e com bonificação pelo COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 1,
								ca_bonificacao = 1,
								ca_status = 80,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <b>com isenção</b> e com <b>bonificação</b><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '80', $desc);
				return (1);
				break;
			case '2' :
				// Com isenção e sem bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 1,
								ca_bonificacao = 0,
								ca_status = 80,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <b>com isenção</b> e <font color=red><b>sem bonificação</b></font><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '80', $desc);
				return (1);
				break;
			case '1' :
				// Sem isenção e com bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 1,
								ca_status = 80,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <font color=red><b>sem isenção</b></font> e <b>com bonificação</b><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '80', $desc);
				return (1);
				break;
			case '3' :
				// Com isenção e com bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 0,
								ca_status = 80,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <font color=red><b>sem isenção</b> e <b>sem bonificação</b></font><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '80', $desc);
				return (1);
				break;

			case '4' :
				// Devolver ao professor para correção  COORDENADOR OU SECRETARIA//
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 0,
								ca_status = 8,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Motivo: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> captacoes -> insere_historico($proto, '8', $desc);
				return (1);
				break;
			case '5' :
				// Cancelar o protocolo  COORDENADOR OU SECRETARIA //
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 0,
								ca_status = 12,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}
				$this -> captacoes -> insere_historico($proto, '12', $desc);
				return (1);
				break;
			case '6' :
				// validar a documentação pela SECRETARIA //
				$sql = "update captacao set 
								ca_status = 11,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> captacoes -> insere_historico($proto, '11', $desc);
				return (1);
				break;
			case '7' :
				// Cancelar o protocolo  COORDENADOR OU SECRETARIA //
				$sql = "update captacao set 
								ca_status = 14,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> captacoes -> insere_historico($proto, '14', $desc);
				return (1);
				break;

			/**************** secretaria */
			/*********************************************** DIRETORIA DE PESQUISA **************/
			case '10' :
				// Com isenção e com bonificação pelo COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 1,
								ca_bonificacao = 1,
								ca_status = 81,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <b>com isenção</b> e com <b>bonificação</b><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '81', $desc);
				return (1);
				break;
			case '12' :
				// Com isenção e sem bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 1,
								ca_bonificacao = 0,
								ca_status = 81,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <b>com isenção</b> e <font color=red><b>sem bonificação</b></font><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '81', $desc);
				return (1);
				break;
			case '11' :
				// Sem isenção e com bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 1,
								ca_status = 81,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <font color=red><b>sem isenção</b></font> e <b>com bonificação</b><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '81', $desc);
				return (1);
				break;
			case '13' :
				// Com isenção e com bonificação pelo  COORDENADOR //
				$sql = "update captacao set 
								ca_isencao = 0,
								ca_bonificacao = 0,
								ca_status = 81,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <font color=red><b>sem isenção</b> e <b>sem bonificação</b></font><br>' . get("dd2");
				$this -> captacoes -> insere_historico($proto, '81', $desc);
				return (1);
				break;
			case '19' :
				// validar a documentação pela SECRETARIA //
				$sql = "update captacao set 
								ca_status = 11,
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> captacoes -> insere_historico($proto, '11', $desc);
				return (1);
				break;
			case '20' :
				// GERAR ISENÇÂO PELA SECRETARIA //
				$isencao = $this -> isencoes -> tem_isencao($proto);
				if ($isencao == 0) {
					$dt = $this -> captacoes -> le_protocolo($proto);
					$this -> isencoes -> gerar_isencao($proto, $dt);

					$sql = "update captacao set 
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
					$this -> db -> query($sql);
					if (strlen(get("dd2")) > 0) {
						$desc = 'Justificativa: ' . get("dd2");
					} else {
						$desc = '';
					}

					$this -> captacoes -> insere_historico($proto, '20', $desc);
				}
				return (1);
				break;
		}

	}

	function cp_valores() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ca', '', False, False));
		array_push($cp, array('${', '', 'Valores para proponente', false, true));
		array_push($cp, array('$N8', 'ca_proponente_vlr', msg('ca_proponente_vlr'), true, true));
		//array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$N8', 'ca_vlr_capital', msg('ca_vlr_capital'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_custeio', msg('ca_vlr_custeio'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_bolsa', msg('ca_vlr_bolsa'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_outros', msg('ca_vlr_outros'), true, true));
		/* ca_vlr_total */
		array_push($cp, array('$L', '', msg('ca_vlr_total'), false, false));
		array_push($cp, array('$}', '', 'Valores para proponente', false, true));
		return($cp);
	}
	
	function cp_dados($id=0) {
		$ops = 'cp_cod:cp_descricao:select * from captacao_participacao where cp_ativo = 1';
		$opa = 'id_agf:agf_nome:select * from fomento_agencia where agf_ativo = 1 order by agf_nome';
		$sql_pos = "SELECT id_pp, pp_nome  FROM `ss_professor_programa_linha`
    					inner join ss_programa_pos ON programa_pos_id_pp = id_pp
    				";
					
		/* Vigencia */
		$vg = '';
		for ($r = 2010; $r <= (date("Y") + 1); $r++) {
			for ($m = 1; $m <= 12; $m++) {
				$dt = $r . strzero($m, 2) . ':' . strzero($m, 2) . '/' . $r;
				if (strlen($vg) > 0) { $vg .= '&';
				}
				$vg .= $dt;
			}

		}
		/* Duracao */
		$dr = '';
		for ($r = 1; $r <= 72; $r++) {
			$dt = $r;
			/* regras */
			if ($dt == 1) { $dt = '1 ' . msg('mes');
			}
			if ($dt > 1) { $dt = $r . ' ' . msg('meses');
			}

			if (round($r / 12) == ($r / 12)) {
				$dt = round($r / 12);
				if ($dt == 1) {
					$dt = '1 ' . msg('ano');
				} else {
					$dt = round($r / 12) . ' ' . msg('anos');
				}
			}
			if ($dt == 0) { $dt = msg('nao_aplicado');
			}
			if (strlen($dr) > 0) { $dr .= '&';
			}
			$dr .= $r . ':' . $dt;
		}					
		
		$cp = array();
		array_push($cp, array('$HV', 'id_ca', $id, true, true));
		array_push($cp, array('${', '', msg('Participacao'), false, true));

		array_push($cp, array('${', '', msg('captacao_edital'), false, true));
		array_push($cp, array('$Q ' . $ops, 'ca_participacao', 'Sua participação neste projeto de pesquisa, perante a instituição é de:', True, true));
		//array_push($cp, array('$Q ' . $opa, 'ca_agencia_id', msg('fomente_agencia'), false, true));
		array_push($cp, array('$S20', 'ca_edital_nr', msg('fomento_edital'), true, true));
		array_push($cp, array('$[2010-' . date("Y") . ']', 'ca_edital_ano', msg('fomento_ed_ano'), True, true));
		array_push($cp, array('$S20', 'ca_processo', msg('fomento_processo'), false, true));

		array_push($cp, array('$}', '', msg('captacao_edital'), false, true));

		array_push($cp, array('${', '', msg('captacao_perfil'), false, true));
		array_push($cp, array('$C', 'ca_academico', 'Projeto Acadêmico (Projeto de pesquisa, eventos, entre outros)', false, true));
		array_push($cp, array('$C', 'ca_insticional', 'Projeto de Coordenação Institucional (Recursos para infraestrutura, entre outros)', false, true));
		array_push($cp, array('$C', 'ca_desmembramento', 'Desmembramento de Projeto de Coordenação Institucional (Recursos para infraestrutura, entre outros)', false, true));
		array_push($cp, array('$}', '', msg('captacao_perfil'), false, true));

		array_push($cp, array('${', '', msg('captacao_dados'), false, true));
		array_push($cp, array('$T80:3', 'ca_descricao', msg('captacao_titulo'), true, true));
		array_push($cp, array('$}', '', msg('captacao_dados'), false, true));

		array_push($cp, array('${', '', msg('captacao_vigencia'), false, true));
		array_push($cp, array('$O ' . $vg, 'ca_vigencia_final_ano', msg('captacao_vigencia_inicio'), true, true));
		array_push($cp, array('$O ' . $dr, 'ca_duracao', msg('captacao_duracao'), true, true));
		array_push($cp, array('$O ' . $dr, 'ca_vigencia_prorrogacao', msg('captacao_prorrogacao'), false, true));
		array_push($cp, array('$}', '', msg('captacao_vigencia'), false, true));

		array_push($cp, array('$}', '', msg('Participacao'), false, true));
		return($cp);
	}	

	function mostra_historico($id) {
		$proto = strzero($id, 7);

		$sql = "select * from captacao_historico 
						LEFT JOIN us_usuario ON bnh_log = id_us
						WHERE bnh_protocolo = '$proto'
						ORDER BY bnh_data desc, bnh_hora desc ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr><th width="10%">data e hora</th>
						<th width="60%">Descrição</th>
						<th width="30%">Responsável</th>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$desc = trim($line['bnh_descricao']);
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= stodbr($line['bnh_data']);
			$sx .= '&nbsp';
			$sx .= substr($line['bnh_hora'], 0, 5);
			$sx .= '</td>';

			$sx .= '<td>' . $line['bnh_historico'] . '</td>';

			$sx .= '<td>' . $line['us_nome'] . '</td>';
			$sx .= '</tr>';
			if (strlen($desc) > 0) {
				$sx .= '<tr><td>&nbsp;</td>';
				$sx .= '<td colspan=2>' . mst($desc) . '</td></tr>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function is_autor($id, $cracha) {
		$sql = "select * from captacao 
						WHERE ca_professor = '$cracha' 
						AND id_ca = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function alterar_status($id, $ope) {
		$this -> captacoes -> insere_historico($id, $ope);
		$data = date("Y-m-d");
		/* Atualiza status */
		$sql = "update captacao set
								ca_status = $ope,
								ca_lastupdate = $data
							where id_ca = " . round($id);
		$rlt = $this -> db -> query($sql);
	}

	function insere_historico($id, $ope, $desc = '') {
		$historico = '??';
		$sql = "select * from captacao_situacao where ca_status_old = " . $ope;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$historico = trim($line['cs_situacao_acao']);
		}
		$data = date("Ymd");
		$hora = date("H:i:s");
		$hora2 = date("H:i:s");
		$proto = strzero($id, 7);
		$us_id = $_SESSION['id_us'];

		$sql = "select * from captacao_historico 
						WHERE bnh_ope = '$ope' and bnh_log = $us_id 
						AND bnh_data = '$data' AND bnh_protocolo = '$proto' 
						AND bnh_hora like '$hora2%'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			/* Insere histórico */
			$sql = "insert into captacao_historico
							(bnh_protocolo, bnh_data, bnh_hora,
							bnh_historico, bnh_ope, bnh_log,
							bnh_descricao
							) values (
							'$proto', '$data', '$hora',
							'$historico', '$ope', $us_id,
							'$desc')";
			$rlt = $this -> db -> query($sql);
		}
	}

	function atualiza_valor_total($id) {
		$sql = "update captacao set 
						ca_vlr_total = (ca_vlr_capital + ca_vlr_custeio + ca_vlr_bolsa + ca_vlr_outros)
					WHERE id_ca = " . round($id);
		$this -> db -> query($sql);
		return (1);
	}

	function cp_01($id = '') {
		$cracha = $_SESSION['cracha'];
		$sql_pos = "SELECT id_pp, pp_nome  FROM `ss_professor_programa_linha`
    					INNER JOIN us_usuario on us_usuario_id_us = id_us
    					inner join ss_programa_pos ON programa_pos_id_pp = id_pp
    				where us_cracha = '$cracha' ";
		/* Vigencia */
		$vg = '';
		for ($r = 2010; $r <= (date("Y") + 1); $r++) {
			for ($m = 1; $m <= 12; $m++) {
				$dt = $r . strzero($m, 2) . ':' . strzero($m, 2) . '/' . $r;
				if (strlen($vg) > 0) { $vg .= '&';
				}
				$vg .= $dt;
			}

		}
		/* Duracao */
		$dr = '';
		for ($r = 1; $r <= 72; $r++) {
			$dt = $r;
			/* regras */
			if ($dt == 1) { $dt = '1 ' . msg('mes');
			}
			if ($dt > 1) { $dt = $r . ' ' . msg('meses');
			}

			if (round($r / 12) == ($r / 12)) {
				$dt = round($r / 12);
				if ($dt == 1) {
					$dt = '1 ' . msg('ano');
				} else {
					$dt = round($r / 12) . ' ' . msg('anos');
				}
			}
			if ($dt == 0) { $dt = msg('nao_aplicado');
			}
			if (strlen($dr) > 0) { $dr .= '&';
			}
			$dr .= $r . ':' . $dt;
		}

		$ops = 'cp_cod:cp_descricao:select * from captacao_participacao where cp_ativo = 1';
		$opa = 'id_agf:agf_nome:select * from fomento_agencia where agf_ativo = 1 order by agf_nome';
		$cp = array();
		array_push($cp, array('$HV', 'id_ca', $id, true, true));
		array_push($cp, array('${', '', msg('Participacao'), false, true));

		array_push($cp, array('${', '', msg('captacao_edital'), false, true));
		array_push($cp, array('$Q ' . $ops, 'ca_participacao', 'Sua participação neste projeto de pesquisa, perante a instituição é de:', True, true));
		array_push($cp, array('$Q ' . $opa, 'ca_agencia_id', msg('fomente_agencia'), false, true));
		array_push($cp, array('$S20', 'ca_edital_nr', msg('fomento_edital'), true, true));
		array_push($cp, array('$[2010-' . date("Y") . ']', 'ca_edital_ano', msg('fomento_ed_ano'), True, true));
		array_push($cp, array('$S20', 'ca_processo', msg('fomento_processo'), false, true));

		array_push($cp, array('$}', '', msg('captacao_edital'), false, true));

		array_push($cp, array('${', '', msg('captacao_perfil'), false, true));
		array_push($cp, array('$C', 'ca_academico', 'Projeto de Pesquisa', false, true));
		array_push($cp, array('$C', 'ca_empresa', 'Projeto de Pesquisa com empresa', false, true));
		array_push($cp, array('$C', 'ca_evento', 'Participação em evento científico', false, true));
		array_push($cp, array('$C', 'ca_evento_org', 'Organização de evento científico', false, true));
		array_push($cp, array('$C', 'ca_insticional', 'Projeto de Coordenação Institucional (recursos para equipamentos e ou infraestrutura)', false, true));
		array_push($cp, array('$C', 'ca_desmembramento', 'Desmembramento de Projeto de Coordenação Institucional (subprojeto)', false, true));
		array_push($cp, array('$}', '', msg('captacao_perfil'), false, true));
		
		
		array_push($cp, array('${', '', msg('captacao_outras'), false, true));
		$txt = 'Selecione as modalidades de bolsas vinculadas a outros beneficiários do projeto de pesquisa.';
		array_push($cp, array('$M', '', $txt, false, true));
		array_push($cp, array('$C', '', 'Bolsas para estudantes de graduação', false, true));
		array_push($cp, array('$C', '', 'Bolsas para estudantes de Pós-Graduação (Mestrado/Doutorado)', false, true));
		array_push($cp, array('$C', '', 'Bolsas para estudantes de Pós-Graduação (Pós-Doutorado)', false, true));
		array_push($cp, array('$C', '', 'Bolsas para professor visitante', false, true));
		array_push($cp, array('$}', '', msg('captacao_outras'), false, true));

		array_push($cp, array('${', '', msg('captacao_dados'), false, true));
		//array_push($cp, array('$A', '', msg('captacao_descricao'), false, true));
		array_push($cp, array('$T80:3', 'ca_descricao', msg('captacao_titulo'), true, true));
		array_push($cp, array('$Q id_pp:pp_nome:' . $sql_pos, 'ca_programa', msg('captacao_programa'), true, true));
		array_push($cp, array('$}', '', msg('captacao_dados'), false, true));

		array_push($cp, array('${', '', msg('captacao_vigencia'), false, true));
		array_push($cp, array('$O ' . $vg, 'ca_vigencia_final_ano', msg('captacao_vigencia_inicio'), true, true));
		array_push($cp, array('$O ' . $dr, 'ca_duracao', msg('captacao_duracao'), true, true));
		array_push($cp, array('$O ' . $dr, 'ca_vigencia_prorrogacao', msg('captacao_prorrogacao'), false, true));
		array_push($cp, array('$}', '', msg('captacao_vigencia'), false, true));

		array_push($cp, array('$}', '', msg('Participacao'), false, true));

		array_push($cp, array('$B8', '', msg('save_next'), false, true));
		return ($cp);

	}

	function cp_02($id = '') {
		$cp = array();
		array_push($cp, array('$HV', 'id_ca', $id, true, true));
		array_push($cp, array('${', '', msg('Recusos captados'), false, true));

		array_push($cp, array('$HV', 'ca_proponente', '0', true, true));

		array_push($cp, array('${', '', 'Valores para proponente', false, true));
		array_push($cp, array('$N8', 'ca_proponente_vlr', msg('ca_proponente_vlr'), true, true));
		//array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$N8', 'ca_vlr_capital', msg('ca_vlr_capital'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_custeio', msg('ca_vlr_custeio'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_bolsa', msg('ca_vlr_bolsa'), true, true));
		array_push($cp, array('$N8', 'ca_vlr_outros', msg('ca_vlr_outros'), true, true));
		/* ca_vlr_total */
		array_push($cp, array('$L', '', msg('ca_vlr_total'), false, false));

		$text = 'O valor aplicado refere-se a quantidade de recursos que serão aplicados na PUCPR, podendo ser qualquer uma das modalidades, capital, custeio ou bolsas, informando qual o valor total.';
		//array_push($cp, array('${', '', 'Valores para proponente', false, true));
		//array_push($cp, array('$Q ', 'ca_proponente', msg('ca_proponente'), true, true));
		//array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$}', '', msg('Recusos captados'), false, true));

		array_push($cp, array('$T80:6', 'ca_contexto', msg('ca_contexto'), false, false));

		array_push($cp, array('$B8', '', msg('save_next'), false, true));
		return ($cp);
	}

	function cp_03($id = '', $proto) {
		$cp = array();
		array_push($cp, array('$HV', 'id_ca', $id, true, true));
		array_push($cp, array('${', '', msg('Recusos captados'), false, true));

		$txt = 'Tipos de documentos comprobatórios:
			<ul>
				<li><b>Descritivo de projeto</b> Arquivo do Projeto de pesquisa ou plano de trabalho.</li>
				<li><b>Termo do convênio / concessão do auxílio</b> Documento de formalização junto a agência financiadora</li>
				<li><b>Orçamento aprovado</b> Descritivo dos valores e rubricas aprovados. Este arquivo pode ser um print screen da tela com o detalhamento dos valores.</li>
				<li><b>Contrato firmado entre empresa e PUCPR</b> Obrigatório para projetos com empresas.
			</ul>
		Todos os arquivos anexados devem estar em formato PDF.
		<br>
		<br>
		Os documentos comprabatórios devem:
			<ul>
				<li>Apresentar o nome do pesquisador como coordenador e ou colaborador.</li>
				<li>Ter a PUCPR como proponente do projeto aprovado.</li>
				<li>Descrever período de vigência do projeto (cronograma).</li>
			</ul>	
		';
		array_push($cp, array('$M', '', $txt, false, true));

		//array_push($cp, array('$M', '', msg('capt_file_texto'), false, true));
		$this->load->model('geds');
		$this->geds->tabela = 'bonificacao_ged_documento';
		$txt = $this->geds->list_files($id, 'captacao');

		array_push($cp, array('$FILE:captacao_ged_documento:captacao', '', $proto, false, true));
		array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$}', '', msg('Recusos captados'), false, true));

		array_push($cp, array('$B8', '', msg('save_next'), false, true));
		return ($cp);
	}

	function valida_entrada($id = '') {
		$data = $this -> captacoes -> le($id);
		$proto = $data['ca_protocolo'];
		
		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$vd = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);
		/* Regra */
		$vd[0] = $ok;

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';
		$sx .= '<tr><td class="border1">Valores na proponente</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/* REGRA - vigencia */
		if ($data['ca_vigencia_final_ano'] > 200501) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_vigencia') . '</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/* REGRA - ano do edital */
		if ($data['ca_edital_ano'] > 2000) {
			$vd[2] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('fomento_ed_ano') . ' (' . $data['ca_edital_ano'] . ') </td>
						<td class="border1" align="center">' . $vd[2] . '</tr>';

		/* REGRA - ano do edital */
		if ($data['ca_agencia_id'] > 0) {
			$vd[3] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('fomente_agencia') . '</td>
						<td class="border1" align="center">' . $vd[3] . '</tr>';

		/* REGRA - valor na proponente */
		if ($data['ca_proponente_vlr'] > 0) {
			$vd[4] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('ca_proponente_vlr') . '</td>
						<td class="border1" align="center">' . $vd[4] . '</tr>';

		/* REGRA - arquivos postados */
		$sql = "select 1 as total from captacao_ged_documento 
					WHERE doc_dd0 = '" . $proto . "' and doc_status <> 'X' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		if (count($rrr) > 0) {
			$vd[5] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_arquivos') . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[5] . '</tr>';

		/* REGRA - vigência */
		if ($data['ca_duracao'] > 0) {
			$vd[6] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('ca_duracao') . '</td>
						<td class="border1" align="center">' . $vd[6] . '</tr>';

		/* REGRA - programa */
		if ($data['ca_programa'] > 0) {
			$vd[7] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('ca_programa') . '</td>
						<td class="border1" align="center">' . $vd[7] . '</tr>';

		/* valicacao */
		$ok = 1;
		$cps = 7;
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
		return ( array($ok, $sx));
	}

	function validacao_cp($id = '') {
		$this -> atualiza_valor_total($id);
		$data = $this -> le($id);
		$cp = array();
		array_push($cp, array('$HV', 'id_ca', $id, true, true));
		$sx = '<table width="100%">';
		$sx .= '<tr><td>' . $this -> load -> view('captacao/detalhe', $data, true);
		$sx .= '</table>';

		array_push($cp, array('$A', '', $sx, false, true));
		array_push($cp, array('$V', '', '$CI->captacoes->valida_entrada(' . $id . ');', true, true));

		array_push($cp, array('$B8', '', msg('send'), false, true));
		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN us_usuario ON ca_professor = us_cracha
					LEFT JOIN fomento_agencia on (((agf_sigla = ca_agencia) and (ca_agencia_id = 0)) or (id_agf = ca_agencia_id))
					LEFT JOIN captacao_participacao on cp_cod = ca_participacao
					LEFT JOIN ss_programa_pos ON ((ca_programa = id_pp_char) or (ca_programa = id_pp)) 
					where id_ca = $id 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
		} else {
			$line = array();
		}
		return ($line);
	}

	function le_protocolo($proto = '') {
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN us_usuario ON ca_professor = us_cracha
					LEFT JOIN fomento_agencia on (((agf_sigla = ca_agencia) and (ca_agencia_id = 0)) or (id_agf = ca_agencia_id))
					LEFT JOIN captacao_participacao on cp_cod = ca_participacao
					LEFT JOIN ss_programa_pos ON ((ca_programa = id_pp_char) or (ca_programa = id_pp)) 
					where ca_protocolo = '$proto' 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
		} else {
			$line = array();
		}
		return ($line);
	}

	function captacao_em_cadastro($cracha) {
		$sql = "select * from captacao 
					WHERE ca_professor = '$cracha'	
					AND ca_status = 1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line['id_ca']);
		} else {
			return (0);
		}
	}

	function nova_captacao($cracha) {
		$id = $this -> captacao_em_cadastro($cracha);
		$data = date("Ymd");
		$inip = date("Ym");
		$dura = '0';
		$vigencia = '0';

		$data_D2 = date("Y-m-d");
		if ($id == 0) {
			$sql = "select max(id_ca) as id from captacao";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0) {
				$cod = ($rlt[0]['id'] + 1);
			} else {
				$cod = 1;
			}
			$proto = strzero($cod, 7);
			$sql = "insert into captacao
							(
								ca_professor, ca_status, ca_lastupdate,
								ca_update, ca_ativo, ca_descricao,
								ca_protocolo, ca_academico,
								ca_vigencia_fim_ano, ca_duracao, ca_vigencia_prorrogacao
							) values (
								'$cracha','1','$data_D2',
								$data,1,'em cadastro', 
								'NOVO',1,
								$inip, $dura, $vigencia
							)";
			$this -> db -> query($sql);
			$sql = "update captacao set ca_protocolo = lpad(id_ca,7,0) where ca_protocolo = 'NOVO'";
			$this -> db -> query($sql);
			$id = $this -> captacao_em_cadastro($cracha);
		}
		return ($id);
	}

	function resumo_projetos($cracha = '', $editar = 0) {
		$cap = array('-', '-', '-', '-');

		$th_editar = '';
		if ($editar == 1) {
			$th_editar = '<th>ação</th>';
		}
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN captacao_participacao ON cp_cod = ca_participacao
					LEFT JOIN us_usuario on us_cracha = ca_professor
					where ca_professor = '$cracha' 
					and ca_status > 0
					ORDER BY ca_edital_ano desc
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sh = '<tr>
				<th width="5%">protocolo</th>
				<th width="5%">fomento</th>
				<th width="5%">Edital</th>
				<th>Descrição do Edital</th>
				<th width="5%">Atualizado</th>
				<th width="5%">Início da Vigência</th>
				<th width="5%">Duração</th>
				<th width="5%">Prorrogação</th>
				<th>Participação</th>
				<th width="10%">Vlr. Projeto</th>
				<th width="10%">Vlr. Proponente</th>
				<th>Inst.*</th>
				<th>Situação</th>	
				' . $th_editar . '			
			  </tr>';
		$xano = '';
		$tot1 = 0;
		$tot2 = 0;
		$tot3 = 0;
		$tot4 = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['editar'] = $editar;
			$ano = $line['ca_edital_ano'];

			if ($xano != $ano) {
				$sx .= '<tr valign="top">';
				$sx .= '<td class="lt4" colspan=12 >' . $ano . '</td>';
				$sx .= $sh;
				$xano = $ano;
			}

			if ($line['ca_insticional'] == '1') {
				$tot3++;
				$tot4 = $tot4 + $line['ca_proponente_vlr'];
			} else {
				$tot1++;
				$tot2 = $tot2 + $line['ca_proponente_vlr'];
			}

			$sx .= $this -> load -> view('captacao/captacao_row', $line, true);
			/********************* resumo */
			switch ($line['cs_resumo']) {
				case '6' :
					$cap[2] = $cap[2] + 1;
					break;
				case '5' :
					$cap[2] = $cap[2] + 1;
					break;
				case '1' :
					$cap[3] = $cap[3] + 1;
					break;
				case '0' :
					$cap[0] = $cap[0] + 1;
					break;
				default :
					$cap[1] = $cap[1] + 1;
					break;
			}
		}
		$sx .= '</table>';
		$sx .= '<font class="lt0">* projetos institucionais envolvendo mais de um programa, escola ou coordenação.';
		$sr = array();
		$sr['captacoes'] = $sx;
		$sr['captacao_academica_tot'] = $tot1;
		$sr['captacao_academica_vlr'] = $tot2;
		$sr['captacao_institucional_tot'] = $tot3;
		$sr['captacao_institucional_vlr'] = $tot4;

		$sr['captacao_em_cadastrado'] = $cap[0];
		$sr['captacao_para_correcao'] = $cap[3];
		$sr['captacao_em_analise'] = $cap[1];
		$sr['captacao_finalizado'] = $cap[2];

		return ($sr);
	}

	function lista_resumo_processos($id = 0) {
		$id = round($id);

		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN captacao_participacao ON cp_cod = ca_participacao
					LEFT JOIN us_usuario on us_cracha = ca_professor
					WHERE ca_status = $id
					ORDER BY ca_lastupdate desc, ca_protocolo
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr>
				<th width="5%">protocolo</th>
				<th width="5%">fomento</th>
				<th width="5%">Edital</th>
				<th>Descrição do Edital</th>
				<th width="5%">Atualizado</th>
				<th width="5%">Início da Vigência</th>
				<th width="5%">Duração</th>
				<th width="5%">Prorrogação</th>
				<th>Participação</th>
				<th width="10%">Vlr. Projeto</th>
				<th width="10%">Vlr. Proponente</th>
				<th>Inst.*</th>
				<th>Situação</th>				
			  </tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= $this -> load -> view('captacao/captacao_row', $line, true);
		}
		$sx .= '</table>';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}

	function resumo_acoes_perfil($id = '') {
			switch ($id)
				{
					case 'COP':
						$sql = "select * 
								FROM captacao
								INNER JOIN captacao_situacao ON ca_status_old = ca_status
								LEFT JOIN us_usuario on us_cracha = ca_professor
								WHERE ca_status = '10' ";					
					break;
					default:
						$sql = "select * 
								FROM captacao
								INNER JOIN captacao_situacao ON ca_status_old = ca_status
								LEFT JOIN us_usuario on us_cracha = ca_professor
								WHERE cs_perfil = '#$id' ";										
					break;
				}
		
		
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr>
					<th>Protocolo</th>
					<th>Fomento</th>
					<th>Edital</th>
					<th>Descrição do edital</th>
					<th>Atualização</th>
					<th>Início da vigência</th>
					<th>Duração<th>
					<th>Participação</th>
					<th>Valor Total</th>
					<th>Vlr. Proponente</th>
					<th>Inst.</th>
					<th>Situação</th>
					<th>Professor</th>
				</tr>';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;
			$line = $rlt[$r];
			$sx .= $this -> load -> view('captacao/captacao_row', $line, true);
		}
		$sx .= '<tr><td colspan="10">Total ' . $tot . '</td></tr>';
		$sx .= '</table>';
		return ($sx);

	}

	function resumo_acoes() {
		$it = 3;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		$sql = "select count(*) as total, cs_perfil 
				FROM captacao
				INNER JOIN captacao_situacao ON ca_status_old = ca_status
				group by cs_perfil ";
		$rlt = $this -> db -> query($sql);

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$fl = array(0, 0, 0, 0, 0, 0);
		$ca = array('COP', 'CPS', 'DIP');

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$perf = $line['cs_perfil'];
			switch ($perf) {
				case '#COP' :
					$id = 0;
					break;
				case '#CPS' :
					$id = 1;
					break;
				case '#DIP' :
					$id = 2;
					break;
				default :
					$id = 5;
					break;
			}

			$fl[$id] = $fl[$id] + $line['total'];
		}

		/* Format o número */
		for ($r = 0; $r < count($ca); $r++) {
			if ($fl[$r] > 0) {
				$link = '<a href="' . base_url('index.php/cip/captacao_status/' . $ca[$r]) . '" class="link lt6">';
				$fl[$r] = $link . '<br><font class="lt6">' . $fl[$r] . '</font></a>';
			} else {
				$link = '<a href="#" class="link lt6">';
				$fl[$r] = $link . '<br><font class="lt6">-</font></a>';
			}
		}
		$sx = '<table class="lt2" width="100%">';
		$sx .= '<tr class="lt1" valign="bottom">';
		$sx .= '<th colspan=4 class="lt2">' . msg('captacoes') . '</th></tr>';
		$sx .= '<tr class="lt1" valign="bottom">';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_coordenador') . $fl[0] . '</td>';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_secretaria') . $fl[1] . '</td>';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_diretoria') . $fl[2] . '</td>';
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_processos() {
		$it = 7;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		$sql = "select count(*) as total, ca_status, cs_situacao 
				FROM captacao
				INNER JOIN captacao_situacao ON ca_status_old = ca_status
				group by ca_status, cs_situacao ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();



		$sx = '<table class="lt2 border1" width="100%">';
		$sa = '<tr align="center" class="lt1">';
		$sb = '<tr align="center" class="lt5">';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sa .= '<td class="border1">' . $line['cs_situacao'] . '</td>';
			$link = '<a href="' . base_url('index.php/cip/captacao/' . $line['ca_status']) . '" class="link lt6">';
			$sb .= '<td class="border1">' . $link . $line['total'] . '</a></td>';
			
		}		
		$sx .= $sa;
		$sx .= $sb;
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function lista($cracha = '') {
		$sql = "select * from captacao
					left join captacao_situacao on ca_status = ca_status_old 
					where ca_professor = '$cracha' ";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela1 lt2" cellpadding=3>';
		while ($line = db_read($rlt)) {
			$nome = $line['ca_descricao'];
			$edital_nr = $line['ca_edital_nr'];
			$ca_protocolo = $line['ca_protocolo'];
			$ano = $line['ca_edital_ano'];
			$vigencia = strzero($line['ca_vigencia_ini_mes'], 2) . '/' . strzero($line['ca_vigencia_ini_ano'], 4);
			$duracao = $line['ca_duracao'];
			$situacao = $line['cs_situacao'];
			$cor = trim($line['cs_cor']);
			$xcor = '';
			if (strlen($cor) > 0) {
				$cor = '<font color="' . $cor . '">';
				$xcor = '</font>';
			}

			$sx .= '<tr>';
			$sx .= '<td class="border1" align="center">' . $cor . $ca_protocolo . $xcor . '</td>';

			$sx .= '<td class="border1">' . $cor . $nome . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $edital_nr . '/' . strzero($ano, 4) . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $vigencia . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $duracao . ' mesês' . $xcor . '</td>';

			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_capital'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_custeio'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_bolsa'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_outros'], 2, ',', '.') . $xcor . '</td>';

			$sx .= '<td class="border1" align="center">' . $cor . $situacao . $xcor . '</td>';

			$sx .= '</tr>';
			$ln = $line;
		}
		print_r($ln);
		$sx .= '</table>';
		return ($sx);
	}

}
?>
