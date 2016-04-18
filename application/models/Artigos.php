<?php
class artigos extends CI_Model {

	function novo_artigos($cracha) {
		$id = $this -> artigos_em_cadastro($cracha);
		$data = date("Ymd");
		$inip = date("Ym");
		$dura = '0';
		$vigencia = '0';

		$data_D2 = date("Y-m-d");
		if ($id == 0) {
			$sql = "select max(id_ar) as id from cip_artigo";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0) {
				$cod = ($rlt[0]['id'] + 1);
			} else {
				$cod = 1;
			}
			$proto = strzero($cod, 7);
			$id = $cod;
			$sql = "insert into cip_artigo
							(
								ar_professor, ar_status, ar_lastupdate,
								ar_update, ar_titulo,
								ar_protocolo
							) values (
								'$cracha','1','$data_D2',
								$data,'em cadastro', 
								'NOVO'							
							)";
			$this -> db -> query($sql);

			$sql = "update cip_artigo set ar_protocolo = lpad(id_ar,7,0) where ar_protocolo = 'NOVO'";
			$this -> db -> query($sql);

			$id = $this -> artigos_em_cadastro($cracha);
		}
		return ($id);
	}

	function mostra_historico($id) {
		$proto = strzero($id, 7);
		$prot2 = 'AR' . strzero($id, 5);
		$sql = "select * from cip_artigo_historico 
						left join cip_artigo_status on cas_status = bnh_ope
						LEFT JOIN us_usuario ON bnh_log = id_us
						WHERE bnh_protocolo = '$proto'
				union 
				
				select * from captacao_historico 
						left join cip_artigo_status on cas_status = bnh_ope
						LEFT JOIN us_usuario ON bnh_log = id_us
						WHERE bnh_protocolo = '$prot2'
						
				ORDER BY bnh_data desc, bnh_hora desc ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr><th>data e hora</th>
						<th></th>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= stodbr($line['bnh_data']);
			$sx .= '&nbsp';
			$sx .= substr($line['bnh_hora'], 0, 5);
			$sx .= '</td>';

			$sx .= '<td>';
			if (strlen(trim($line['cas_situacao_acao'])) > 0) { $sx .= $line['cas_situacao_acao'];
			}

			if ((strlen($line['bnh_historico']) > 0) and ($line['cas_situacao_acao'] != $line['bnh_historico'])) {
				if ((strlen($line['cas_situacao_acao']) > 0) and (strlen($line['bnh_historico']) > 0)) { $sx .= '<br>';
				}
				$sx .= $line['bnh_historico'];
			}
			$sx .= '</td>';

			$sx .= '<td>' . $line['us_nome'] . '</td>';

			$sx .= '<td align="center">';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function alterar_status($id, $ope = '') {
		$historico = '??';
		if (strlen($ope) == 0) {
			echo 'OPS2';
			exit ;
		}
		$sql = "select * from cip_artigo_status where cas_status = " . $ope;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$historico = trim($line['cas_situacao_acao']);
		}

		$proto = strzero($id, 7);
		$desc = '';
		$this -> insere_historico($proto, $ope, $desc);
		$data = date("Y-m-d");

		/* Atualiza status */
		$sql = "update cip_artigo set
						ar_status = $ope,
						ar_lastupdate = '$data'
					where id_ar = " . round($id);
		$rlt = $this -> db -> query($sql);
	}

	function insere_historico($proto = '', $ope = '', $desc = '') {
		$us_id = $_SESSION['id_us'];
		$data = date("Ymd");
		$hora = date("H:i:s");

		$sql = "select * from cip_artigo_historico 
						WHERE bnh_ope = '$ope' and bnh_log = $us_id 
						AND bnh_data = '$data' AND bnh_protocolo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			/* Insere histórico */
			$sql = "insert into cip_artigo_historico
							(bnh_protocolo, bnh_data, bnh_hora,
							bnh_historico, bnh_ope, bnh_log,
							bnh_descricao
							) values (
							'$proto', '$data', '$hora',
							'$desc', '$ope', $us_id,
							'')";
			$rlt = $this -> db -> query($sql);
		}
	}

	function resumo_acoes() {
		$it = 3;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		$sql = "select count(*) as total, cas_perfil 
				FROM cip_artigo
				INNER JOIN cip_artigo_status ON cas_status = ar_status
				group by cas_perfil ";
		$rlt = $this -> db -> query($sql);

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$fl = array(0, 0, 0, 0, 0, 0);
		$ca = array('COP', 'CPS', 'DIP');

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$perf = $line['cas_perfil'];
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
				$link = '<a href="' . base_url('index.php/cip/artigos_status/' . $ca[$r]) . '" class="link lt6">';
				$fl[$r] = $link . '<br><font class="lt6">' . $fl[$r] . '</font></a>';
			} else {
				$link = '<a href="#" class="link lt6">';
				$fl[$r] = $link . '<br><font class="lt6">-</font></a>';
			}
		}
		$sx = '<table class="lt2" width="100%">';
		$sx .= '<tr class="lt1" valign="bottom">';
		$sx .= '<th colspan=4 class="lt2">' . msg('artigos') . '</th></tr>';
		$sx .= '<tr class="lt1" valign="bottom">';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_coordenador') . $fl[0] . '</td>';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_secretaria') . $fl[1] . '</td>';
		$sx .= '<td width="' . $sz . '%" class="captacao_folha border1 black lt0">' . msg('cap_acao_diretoria') . $fl[2] . '</td>';
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_acoes_perfil($id = '') {
		switch ($id) {
			case 'COP' :
				$sql = "select * 
								FROM cip_artigo
								INNER JOIN cip_artigo_status ON cas_status = ar_status
								LEFT JOIN us_usuario on us_cracha = ar_professor
								WHERE ar_status = '10' ";
				break;
			default :
				$sql = "select * 
								FROM cip_artigo
								INNER JOIN cip_artigo_status ON cas_status = ar_status
								LEFT JOIN us_usuario on us_cracha = ar_professor
								WHERE cas_perfil = '#$id' ";
				break;
		}

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr>
					<th width="5%">Protocolo</th>
					<th width="30%">Título</th>
					<th width="30%">Publicação</th>
					<th width="3%">Qualis</th>
					<th width="3%">Scimago</th>
					<th width="5%">Atualização</th>
					<th>Situação</th>
					<th>Solicitante</th>
				</tr>';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;
			$line = $rlt[$r];
			$sx .= $this -> load -> view('artigo/artigo_row', $line, true);
		}
		$sx .= '<tr><td colspan="10">Total ' . $tot . '</td></tr>';
		$sx .= '</table>';
		return ($sx);

	}

	function acao_artigo($proto, $tp) {
		$data = date("Y-m-d");
		
		switch ($tp) {
			case '0' :
				// Com isenção e com bonificação pelo COORDENADOR //
				$sql = "update cip_artigo set 
								ar_bonificacao = 1,
								ar_status = 80,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado com <b>bonificação</b><br>' . get("dd2");
				$this -> artigos -> insere_historico($proto, '80', $desc);
				
				echo '==>'.$sql;
				exit;
				return (1);
				break;
			case '1' :
				// Com isenção e sem bonificação pelo  COORDENADOR //
				$sql = "update cip_artigo set 
								ar_bonificacao = 2,
								ar_status = 80,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado <font color=red><b>sem bonificação</b></font><br>' . get("dd2");
				$this -> artigos -> insere_historico($proto, '80', $desc);
				return (1);
				break;

			case '4' :
				// Devolver ao professor para correção  COORDENADOR OU SECRETARIA//
				$sql = "update cip_artigo set 
								ar_bonificacao = 0,
								ar_status = 1,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Motivo: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> artigos -> insere_historico($proto, '1', $desc);
				return (1);
				break;
			case '5' :
				// Cancelar o protocolo  COORDENADOR OU SECRETARIA //
				$sql = "update cip_artigo set 
								ar_bonificacao = 0,
								ar_status = 9,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}
				$this -> artigos -> insere_historico($proto, '9', $desc);
				return (1);
				break;
			case '6' :
				// validar a documentação pela SECRETARIA //
				$sql = "update cip_artigo set 
								ar_status = 91,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> artigos -> insere_historico($proto, '91', $desc);
				return (1);
				break;
			case '7' :
				$sql = "update cip_artigo set 
								ar_status = 90,
								ar_lastupdate = '$data'
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				if (strlen(get("dd2")) > 0) {
					$desc = 'Justificativa: ' . get("dd2");
				} else {
					$desc = '';
				}

				$this -> artigos -> insere_historico($proto, '90', $desc);
				return (1);
				break;

			/**************** secretaria */
			/*********************************************** DIRETORIA DE PESQUISA **************/
			case '10' :
				// Com isenção e com bonificação pelo COORDENADOR //
				$sql = "update cip_artigo set 
								ar_bonificacao = 1,
								ar_status = 81,
								ar_lastupdate = $data
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Indicado com <b>bonificação</b><br>' . get("dd2");
				$this -> artigos -> insere_historico($proto, '81', $desc);
				return (1);
				break;
			case '25' :
				// Com isenção e com bonificação pelo  COORDENADOR //
				$sql = "update cip_artigo set 
								ar_status = 80,
								ar_bonificacao = 1,
								ar_lastupdate = $data
							where ar_protocolo = '" . $proto . "'";
				$this -> db -> query($sql);
				$desc = 'Encaminhado para análise da Diretoria de Pesquisa';
				$this -> artigos -> insere_historico($proto, '81', $desc);
				return (1);
				break;

			case '20' :
				// GERAR ISENÇÂO PELA SECRETARIA //
				$isencao = $this -> isencoes -> tem_isencao($proto);
				if ($isencao == 0) {
					$dt = $this -> artigos -> le_protocolo($proto);
					$this -> isencoes -> gerar_isencao($proto, $dt);

					$sql = "update cip_artigo set 
								ca_lastupdate = $data
							where ca_protocolo = '" . $proto . "'";
					$this -> db -> query($sql);
					if (strlen(get("dd2")) > 0) {
						$desc = 'Justificativa: ' . get("dd2");
					} else {
						$desc = '';
					}

					$this -> artigos -> insere_historico($proto, '20', $desc);
				}
				return (1);
				break;
		}

	}

	function le($id) {
		$sql = "select * from cip_artigo
					INNER JOIN us_usuario on ar_professor = us_cracha 
					LEFT JOIN cip_artigo_status on ar_status = cas_status
				WHERE id_ar = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}

	}

	function artigos_em_cadastro($cracha) {
		$sql = "select * from cip_artigo
					WHERE ar_professor = '$cracha'	
					AND ar_status = 1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line['id_ar']);
		} else {
			return (0);
		}
	}

	function resumo_cadastro($cracha = '', $editar = 0) {
		$cracha = $_SESSION['cracha'];
		$sql = "select * from cip_artigo 
						LEFT JOIN cip_artigo_status ON cas_status = ar_status
						WHERE ar_professor = '$cracha' 
					ORDER BY ar_ano desc, ar_protocolo desc ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr>
						<th width="5%">Prot.</th>
						<th width="35%">título do artigo</th>
						<th width="5%">ISSN</th>
						<th width="21%">Journal</th>
						<th colspan=2 width="6%">Scimago</th>
						<th width="3%">Qualis</th>
						<th width="20%">Situação</th>
						<th width="10%">DOI</th>
					</tr>';

		$xano = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$ano = $line['ar_ano'];
			$id = $line['id_ar'];

			if ($xano != $ano) {
				$sx .= '<tr><td class="lt4" colspan=10>' . $ano . '</td></tr>';
				$xano = $ano;
			}

			$link = base_url('index.php/artigo/detalhe/' . $id . '/' . checkpost_link($id));
			$link = '<a href="' . $link . '" class="link lt1">';

			$leg = trim($line['ar_journal']);
			if (strlen(trim($line['ar_vol'])) > 0) {$leg .= ', v. ' . $line['ar_vol'];
			}
			if (strlen(trim($line['ar_num'])) > 0) {$leg .= ', n. ' . $line['ar_num'];
			}
			if (strlen(trim($line['ar_pags'])) > 0) {$leg .= ', p. ' . $line['ar_pags'];
			}
			if (strlen(trim($line['ar_ano'])) > 0) {$leg .= ', ' . $line['ar_ano'];
			}
			$status = $line['cas_descricao'];
			if (strlen($status) == 0) { $status = $line['ar_status'];
			}
			$doi = '';
			if (strlen($line['ar_doi']) > 0) {
				$doi = $line['ar_doi'];
			}
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center" class="border1">' . $link . $line['ar_protocolo'] . '</a>' . '</td>';
			$sx .= '<td class="border1">' . $line['ar_titulo'] . '</td>';
			$sx .= '<td align="center" class="border1">' . $line['ar_issn'] . '</td>';
			$sx .= '<td class="border1">' . $leg . '</td>';

			$sx .= '<td align="center" class="border1">' . $line['ar_q'] . '</td>';
			$sx .= '<td align="center" class="border1">' . $line['ar_er'] . '</td>';
			$sx .= '<td align="center" class="border1">' . $line['ar_a'] . '</td>';
			$sx .= '<td class="border1">' . $status . '</td>';
			$sx .= '<td class="border1">' . $doi . '</td>';
			$acao = '';
			if ($editar == 1) {
				if ($line['ar_status'] == 1) {
					$acao = base_url('index.php/artigo/editar/' . $line['id_ar'] . '/' . checkpost_link($line['id_ar']));
					$acao = '<a href="' . $acao . '" class="link lt1">editar</a>';
				}
				$sx .= '<td class="border1" align="center">' . $acao . '</td>';
			} else {
				$sx .= '<td class="border1">&nbsp;</td>';
			}
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_artigos($cracha = '', $texto = '') {
		$art = array('-', '-', '-', '-');
		$sql = "select ar_status, count(*) as total from cip_artigo 
					WHERE ar_professor = '$cracha'
					GROUP BY ar_status";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['ar_status'];
			$tot = $line['total'];
			switch($sta) {
				case '0' :
					$art[0] = $art[0] + $tot;
					break;
				case '1' :
					$art[0] = $art[0] + $tot;
					break;
				case '10' :
					$art[1] = $art[1] + $tot;
					break;
				case '11' :
					$art[1] = $art[1] + $tot;
					break;
				case '25' :
					$art[2] = $art[2] + $tot;
					break;
				case '9' :
					$art[2] = $art[2] + $tot;
					break;
				case '90' :
					$art[2] = $art[2] + $tot;
					break;
				default :
					echo $sta . '......';
					break;
			}
		}

		$data = array();
		$data['artigos_em_cadastrados'] = $art[0];
		$data['artigos_em_analise'] = $art[1];
		$data['artigos_finalizado'] = $art[2];
		$data['artigos_para_correcao'] = $art[3];
		$data['artigo_texto'] = $texto;

		//$sx = $this->load->view("perfil/perfil_artigos",$data,true);

		return ($data);
	}

	function cp_01($id = 0) {

		$cracha = $_SESSION['cracha'];
		$sql_pos = "SELECT id_pp, pp_nome  FROM `ss_professor_programa_linha`
    					INNER JOIN us_usuario on us_usuario_id_us = id_us
    					inner join ss_programa_pos ON programa_pos_id_pp = id_pp
    				where us_cracha = '$cracha' ";

		$cp = array();
		array_push($cp, array('$HV', 'id_ar', $id, False, True));

		array_push($cp, array('${', '', 'Programa de Pós-Graduação', False, True));
		array_push($cp, array('$Q id_pp:pp_nome:' . $sql_pos, 'ar_programa_pos', msg('captacao_programa'), true, true));
		array_push($cp, array('$}', '', 'Sobre a Publicação', False, True));

		array_push($cp, array('${', '', 'Sobre a Publicação', False, True));
		array_push($cp, array('$S9', 'ar_issn', 'ISSN (0000-0000)', True, True));
		array_push($cp, array('$S100', 'ar_doi', 'DOI', False, True));
		array_push($cp, array('$T80:3', 'ar_journal', 'Título da Revista', True, True));
		array_push($cp, array('$}', '', 'Sobre a Publicação', False, True));

		array_push($cp, array('${', '', 'Dados do Artigo', False, True));
		array_push($cp, array('$T80:5', 'ar_titulo', 'Título do Artigo Original', True, True));
		array_push($cp, array('$[2010-' . (date("Y") + 1) . ']', 'ar_ano', 'Ano do Fascículo', True, True));
		array_push($cp, array('$S5', 'ar_vol', 'Vol.', False, True));
		array_push($cp, array('$S5', 'ar_num', 'Num.', False, True));
		array_push($cp, array('$S10', 'ar_pags', 'Paginação Ex: (192-208)', False, True));
		array_push($cp, array('$}', '', 'Dados do Artigo', False, True));

		array_push($cp, array('${', '', 'Sobre o estado da publicação', False, True));
		array_push($cp, array('$Q id_cap:cap_descricao:select * from cip_artigo_publica order by cap_descricao', 'ar_publicado', 'O artigo está', True, True));
		array_push($cp, array('$}', '', 'Dados do Artigo', False, True));

		array_push($cp, array('$B', '', msg('save_next'), False, True));
		return ($cp);
	}

	function cp_02($id = 0) {
		$cp = array();
		array_push($cp, array('$HV', 'id_ar', $id, False, True));

		/* WEB QUALIS */
		array_push($cp, array('${', '', 'Estrato WebQualis', False, True));
		array_push($cp, array('$O A1:A1&A2:A2&-:Outros Qualis', 'ar_a', 'Qualis da publicação', True, True));
		array_push($cp, array('$M', '', 'Necessário anexar um PDF com o PrintScreen da tela do Qualis, no próximo passo (3)', False, True));
		array_push($cp, array('$}', '', '', False, True));

		/* SCImago */
		array_push($cp, array('${', '', 'Classificação SCImago', False, True));
		array_push($cp, array('$O Q1:Q1&Q2:Q2&Q3:Q4&Q4:Q4&-:Não indexado', 'ar_q', 'Classificação SCImago', True, True));
		array_push($cp, array('$M', '', 'Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)', False, True));
		array_push($cp, array('$}', '', '', False, True));

		/* SCImago */
		//array_push($cp,array('${','','Excellence Rate Report - SCImago',False,True));
		//array_push($cp,array('$O ER:Excellence Rate (ExR)&--:Não é ExR no SCImago','ar_er','Excellence Rate Report',True,True));
		//array_push($cp,array('$M','','O Excellence Rate corresponde a 10% de um conjunto de periódicos mais citados em suas respecticas áreas científicas. É uma medida de alta qualidade de produção de instituições de pesquisa.',False,True));
		//array_push($cp,array('$M','','Necessário anexar um PDF do SCIMago com a área do Excellence Rate, no próximo passo (3)',False,True));
		//array_push($cp,array('$}','','',False,True));

		/* Colaboração */
		$sqlc = "select * from cip_situacoes where si_grupo = 'COL' and si_ativo = 1 order by si_ordem ";
		array_push($cp, array('${', '', 'Colaboração com outras instituições', False, True));
		array_push($cp, array('$Q si_cod:si_descricao:' . $sqlc, 'ar_colaboracao', 'Tipo', True, True));
		//array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)',False,True));
		array_push($cp, array('$}', '', '', False, True));

		/* Patrocinio */
		$sqlc = "select * from cip_situacoes where si_grupo = 'FIN' and si_ativo = 1 order by si_ordem ";
		array_push($cp, array('${', '', 'O artigo publicado tem recursos de agência de fomente ou financiada/patrocinada', False, True));
		array_push($cp, array('$Q si_cod:si_descricao:' . $sqlc, 'ar_sponsor', 'Tipo', True, True));
		//array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)',False,True));
		array_push($cp, array('$}', '', '', False, True));

		/* ar_estudante */
		$sqlc = "select * from cip_situacoes where si_grupo = 'EST' and si_ativo = 1 order by si_ordem ";
		array_push($cp, array('${', '', 'Participação de alunos como autores da artigo', False, True));
		array_push($cp, array('$Q si_cod:si_descricao:' . $sqlc, 'ar_estudante', 'Participação', True, True));
		//array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)',False,True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('$B', '', msg('save_next'), False, True));

		return ($cp);
	}

	function cp_03($id = 0) {
		$cp = array();
		array_push($cp, array('$HV', 'id_ar', $id, False, True));
		array_push($cp, array('${', '', msg('Artigos'), false, true));

		array_push($cp, array('$M', '', msg('art_file_texto'), false, true));

		array_push($cp, array('$FILE:cip_artigo_ged_documento:artigo', '', $id, false, true));
		array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$}', '', '', false, true));

		array_push($cp, array('$B8', '', msg('save_next'), false, true));
		return ($cp);
	}

	function valida_entrada($id = '') {
		$data = $this -> artigos -> le($id);
		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$vd = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);
		/* Regra */
		if (strlen($data['ar_titulo']) > 10) {
			$vd[0] = $ok;
		}

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';

		$sx .= '<tr><td class="border1">Título do artigo - (' . strlen($data['ar_titulo']) . ' caracteres)</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/* REGRA - ISSN */
		if ((strlen($data['ar_issn']) == 9) and (substr($data['ar_issn'], 4, 1) == '-')) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('artigo_issn') . '(' . $data['ar_issn'] . ')' . '</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/* REGRA - ano do edital */
		if ($data['ar_ano'] > 2000) {
			$vd[2] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('artigo_ano') . ' (' . $data['ar_ano'] . ') </td>
						<td class="border1" align="center">' . $vd[2] . '</tr>';

		/***********************************************************
		 ********************************* REGRA - arquivos postados - COPIA DO ARTIGO
		 ***********************************************************/
		$sql = "select 1 as total from cip_artigo_ged_documento 
					WHERE doc_dd0 = '" . strzero($id, 7) . "' and  doc_tipo = 'ART' and doc_status <> 'X' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		if (count($rrr) > 0) {
			$vd[3] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('artigo_arquivos') . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[3] . '</tr>';

		/***********************************************************
		 ********************************* REGRA - arquivos postados - COPIA DO QUALIS
		 ***********************************************************/
		if (substr($data['ar_a'], 0, 1) == 'A') {
			$sql = "select 1 as total from cip_artigo_ged_documento 
						WHERE doc_dd0 = '" . strzero($id, 7) . "'  and doc_tipo = 'CAP' and doc_status <> 'X' ";
			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();

			if (count($rrr) > 0) {
				$vd[4] = $ok;
			}
		} else {
			$vd[4] = $ok;
		}
		$sx .= '<tr><td class="border1">Copia da Tela do Qualis - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[4] . '</tr>';
						
		/***********************************************************
		 ********************************* REGRA - arquivos postados - COPIA DO SCIMAGO
		 ***********************************************************/
		if (substr($data['ar_q'], 0, 1) == 'Q') {
			$sql = "select 1 as total from cip_artigo_ged_documento 
						WHERE doc_dd0 = '" . strzero($id, 7) . "'  and doc_tipo = 'SC1' and doc_status <> 'X' ";
			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();

			if (count($rrr) > 0) {
				$vd[5] = $ok;
			}
		} else {
			$vd[5] = $ok;
		}
		$sx .= '<tr><td class="border1">Copia da Tela do Scimago - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[5] . '</tr>';						

		/*********************************************************************************
		 ********************************* REGRA - Vinculo ao programa de Pós-Graduação
		 ********************************************************************************/

		if ($data['ar_programa_pos'] > 0) {
			$vd[6] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_programa') . ' </td>
						<td class="border1" align="center">' . $vd[6] . '</tr>';

		/* valicacao */
		$ok = 1;
		$cps = 6;
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

	function validacao_cp($id = 0) {
		$data = $this -> le($id);
		$cp = array();
		array_push($cp, array('$HV', 'id_ar', $id, true, true));
		$sx = '<table width="100%">';
		$sx .= '<tr><td>' . $this -> load -> view('artigo/detalhe', $data, true);
		$sx .= '</table>';

		array_push($cp, array('$A', '', $sx, false, true));
		array_push($cp, array('$V', '', '$CI->artigos->valida_entrada(' . $id . ');', true, true));

		array_push($cp, array('$B8', '', msg('send'), false, true));
		return ($cp);
	}

	function arquivos_parecidos($id)
		{
			$dt = $this->le($id);
			
			$issn = $dt['ar_issn'];
			$ano = $dt['ar_ano'];
			$vol = $dt['ar_vol'];
			$tit = $dt['ar_titulo'];
			
			$sql = "select * from cip_artigo 
						left join cip_artigo_status on ar_status = cas_status
					where 
					(ar_issn = '$issn') 
					AND ar_ano = '$ano' 
					and id_ar <> $id ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<table class="tabela01 lt1" width="100%">';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= $this->load->view('artigo/artigo_row.php',$line,true);
				}
				
			if (count($rlt) == 0)
				{
					$sx .= '<tr><td ><font color="green">Nenhum artigo1 parecido foi localizado!</font></td></tr>';
				} else {
					$sx .= '<img src="'.base_url('img/icon/icone_exclamation.png').'" height="60" align="left">';
					$sx .= '<h3><font color="red">Existem arquivos publicados na mesma revista neste ano, deste ou de outros autores, valide com cuidado!</font></h3>';
				}
			$sx .= '</table>';
			return($sx);			
		}

	function resumo_processos($id = '') {
		$it = 6;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		/* */
		$sql = "SELECT count(*) as total, cas_descricao, cas_status, cas_ordem, ar_status
					FROM cip_artigo 
						left join cip_artigo_status on ar_status = cas_status 
					GROUP BY cas_descricao, ar_status
					ORDER BY cas_ordem
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sa = '';
		$sb = '';
		$sz = round(100 / count($rlt));
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = base_url('index.php/cip/artigos/'.$line['ar_status']);
			$link = '<a href="'.$link.'" class="link lt6">';
			$sa .= '<td align="center" class="lt1" width="'.$sz.'%">'.$line['cas_descricao'].'('.$line['cas_status'].')</td>';
			$sb .= '<td align="center" class="lt6 border1">'.$link.$line['total'].'</a>'.'</td>';
		}

		$sx = '<table class="lt2 border1" width="100%">';
		$sx .= '<tr>'.$sa.'</tr>';
		$sx .= '<tr>'.$sb.'</tr>';
		$sx .= '</table>';

		if (strlen($id) > 0) {
			$sx .= $this -> lista_artigos_por_situacao($id);
		}

		return ($sx);
	}

	function lista_artigos_por_situacao($sit = 0) {
		/* */
		$sql = "SELECT *
					FROM cip_artigo 
						left join cip_artigo_status on ar_status = cas_status 
						left join us_usuario on us_cracha = ar_professor
					where ar_status = $sit
					order by ar_update desc
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt1">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_ar'];
			$link = '<a href="' . base_url('index.php/artigo/detalhe/' . $id . '/' . checkpost_link($id)) . '" class="link lt1">';

			$sx .= '<tr>';
			$sx .= '<td align="center" width="10" class="borderb1">';
			$sx .= ($r + 1) . '.';
			$sx .= '</td>';

			$sx .= '<td align="center" class="borderb1">' . $link . $line['ar_protocolo'] . '</a></td>';
			$sx .= '<td class="borderb1">';
			$sx .= $line['ar_issn'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">' . $line['us_nome'] . '</td>';

			$sx .= '<td width="50%" class="borderb1">' . $line['ar_titulo'] . '</td>';

			$sx .= '<td class="borderb1">' . $line['cas_descricao'] . '</td>';

			$sx .= '</tr>';

		}
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
