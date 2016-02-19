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
				$cod = ($rlt[0]['id']+1);
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
	
	function mostra_historico($id)
		{
			$proto = strzero($id,7);
			
			$sql = "select * from cip_artigo_historico 
						LEFT JOIN us_usuario ON bnh_log = id_us
						WHERE bnh_protocolo = '$proto'
						ORDER BY bnh_data desc, bnh_hora desc ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<table width="100%" class="tabela00 lt1">';
			$sx .= '<tr><th>data e hora</th>
						<th></th>
					</tr>';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<tr>';
					$sx .= '<td align="center">';
					$sx .= stodbr($line['bnh_data']);
					$sx .= '&nbsp';
					$sx .= substr($line['bnh_hora'],0,5);
					$sx .= '</td>';
					
					$sx .= '<td>'.$line['bnh_historico'].'</td>';
					
					$sx .= '<td>'.$line['us_nome'].'</td>';
					
					$sx .= '<td align="center">';
					$sx .= '</tr>';
				}
			$sx .= '</table>';
			return($sx);
		}
	function alterar_status($id,$ope)
		{
			$historico = '??';
			$sql = "select * from cip_artigo_status where cas_status = ".$ope;
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					$historico = trim($line['cas_situacao_acao']);
				}
			
			$data = date("Ymd");
			$hora= date("H:i:s");
			$proto = strzero($id,7);
			$us_id = $_SESSION['id_us'];
			
			$sql = "select * from cip_artigo_historico 
						WHERE bnh_ope = '$ope' and bnh_log = $us_id 
						AND bnh_data = '$data' AND bnh_protocolo = '$proto' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) == 0)
				{
					/* Insere histórico */
					$sql = "insert into cip_artigo_historico
							(bnh_protocolo, bnh_data, bnh_hora,
							bnh_historico, bnh_ope, bnh_log,
							bnh_descricao
							) values (
							'$proto', '$data', '$hora',
							'$historico', '$ope', $us_id,
							'')";
					$rlt = $this->db->query($sql);
					
					/* Atualiza status */
					$sql = "update cip_artigo set
								ar_status = $ope,
								ar_lastupdate = $data
							where id_ar = ".round($id);
					$rlt = $this->db->query($sql);								
				}
		}
		
	
	function le($id) {
		$sql = "select * from cip_artigo 
					LEFT JOIN cip_artigo_status on ar_status = cas_status
				WHERE id_ar = " . round($id);
		$rlt = $this -> db -> query($sql);					
		$rlt = $rlt -> result_array();
		
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return (array());
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
			
			if ($xano != $ano)
				{
					$sx .= '<tr><td class="lt4" colspan=10>'.$ano.'</td></tr>';
					$xano = $ano;
				}
			
			$link = base_url('index.php/artigo/detalhe/'.$id.'/'.checkpost_link($id));
			$link = '<a href="'.$link.'" class="link lt1">';
			
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
			$sx .= '<td align="center" class="border1">' . $link. $line['ar_protocolo'] . '</a>'.'</td>';
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
					echo $sta . '...';
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
		$cp = array();
		array_push($cp, array('$HV', 'id_ar', $id, False, True));
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
		if (strlen($data['ar_titulo']) > 10)
			{
				$vd[0] = $ok;
			}

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';
		
		$sx .= '<tr><td class="border1">Título do artigo - ('.strlen($data['ar_titulo']).' caracteres)</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/* REGRA - ISSN */
		if ((strlen($data['ar_issn']) == 9) and (substr($data['ar_issn'],4,1) == '-')) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('artigo_issn') . '('.$data['ar_issn'].')'.'</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/* REGRA - ano do edital */
		if ($data['ar_ano'] > 2000) {
			$vd[2] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('artigo_ano') . ' ('.$data['ar_ano'].') </td>
						<td class="border1" align="center">' . $vd[2] . '</tr>';
										
		
		/* REGRA - arquivos postados */
		$sql = "select 1 as total from cip_artigo_ged_documento 
					WHERE doc_dd0 = '".strzero($id,7)."' and doc_status <> 'X' ";
		$rrr = $this->db->query($sql);
		$rrr = $rrr->result_array();
		
		if (count($rrr) > 0) {
			$vd[3] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_arquivos') .' - '.count($rrr).' '.msg('file_posted').''.'</td>
						<td class="border1" align="center">' . $vd[3] . '</tr>';		
		
		/* valicacao */
		$ok = 1;
		$cps = 3; /* Campos para validacao */
		
		for ($r=0;$r <= $cps;$r++)
			{
				if ($vd[$r]==$erro) { $ok = 0; }
			}
		if ($ok == 1)
			{
				$sx .= '<tr><td><B><font color="green">'.msg('validataion_ok').'</font></b></td></tr>';
			} else {
				$sx .= '<tr><td><B><font color="red">'.msg('validataion_error').'</font></b></td></tr>';
			}
		$sx .= '</table>';
		return (array($ok,$sx));
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

	function resumo_processos($id = '') {
		$it = 6;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		/* */
		$sql = "SELECT *
					FROM cip_artigo 
						left join cip_artigo_status on ar_situacao = id_cas 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tp = round($line['cas_grupo']);
			$ar[$tp] = $ar[$tp] + 1;
		}

		$sx = '<table class="lt2 border1" width="100%">';
		$sx .= '<tr class="lt1">';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_em_cadastro') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_devolvido_correcoes') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_validacao_coordenador') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_validacao_diretoria') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_comunicacao') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_finalizado') . '</th>';
		$sx .= '</tr>';
		$sx .= '<tr align="center" class="lt5">';
		for ($r = 0; $r < $it; $r++) {
			$link = '<a href="' . base_url('index.php/cip/artigos/' . $r) . '" class="link lt6">';
			$sx .= '<td class="border1">' . $link . $ar[$r] . '</a></td>';
		}
		$sx .= '</tr>';
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
						left join cip_artigo_status on ar_situacao = id_cas 
						left join us_usuario on us_cracha = ar_professor
					where cas_grupo = $sit
					order by ar_update desc
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt1">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td align="center" width="10" class="borderb1">';
			$sx .= ($r + 1) . '.';
			$sx .= '</td>';
			$sx .= '<td class="borderb1">';
			$sx .= $line['ar_issn'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">' . $line['us_nome'] . '</td>';

			$sx .= '<td width="50%" class="borderb1">' . $line['ar_titulo'] . '</td>';

			$sx .= '<td class="borderb1">' . $line['cas_descricao'] . '</td>';

			$sx .= '</tr>';

		}
		$sx .= '</table>';
		print_r($line);
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
