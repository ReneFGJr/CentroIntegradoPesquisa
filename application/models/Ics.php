<?php
class ics extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";
	var $tabela_3 = "pibic_acompanhamento";
	var $tabela_projetos = "ic_submissao_projetos";
	var $tabela_planos = "ic_submissao_plano";
	var $resumo = array();

	/* Lista Professores sem escola cadastrada*/
	function professores_sem_escola() {
		//consulta
		$sql = "SELECT us_cracha, us_nome, id_us
						FROM ic_submissao_plano
						INNER JOIN ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						INNER JOIN us_usuario on us_cracha = pj_professor 
						LEFT JOIN escola on us_escola_vinculo = id_es
						WHERE pj_ano = '2016'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						AND (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						AND es_escola = 'Sem Escola Cadastrada'
						GROUP BY us_nome
						ORDER BY us_nome		
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="50%" class="tabela00">';
		$sx .= '<tr><th align="left" class="lt01">#</th>
							  <th align="left">Nome Professor</th>
								<th align="left">Crachá Professor</th>
						</tr>';

		$tot = 0;
		$id = 0;

		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			//contadores
			$tot++;
			$id++;

			$line = $rlt[$r];

			$sx .= '<tr>';
			$sx .= '<td align="left">';
			$sx .= $id;
			$sx .= '</td>';
			$sx .= '<td align="left">';
			$sx .= link_perfil($line['us_nome'], $line['id_us']);
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= link_perfil($line['us_cracha'], $line['id_us']);
			$sx .= '</td>';
		}
		//resultado contador
		$sx .= '<tr><td colspan=3>Total ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	//resumo do cockpit por escolas
	function ic_submit_resumo_escolas($ano, $tipo = 'IC') {
		$sql = "select us_escola_vinculo, es_escola, count(*) as total
						from ic_submissao_plano
						inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						inner join us_usuario on us_cracha = pj_professor 
						left join escola on us_escola_vinculo = id_es
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						group by us_escola_vinculo
						order by total desc
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por escolas ' . ' - ' . $ano . '</b></td></tr>';
		$sx .= '<tr class="lt3"><th align="Center">Escola</th>
								<th align="Center">qtd</th>
						</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';

			$escSemCad = 'Sem Escola Cadastrada';

			if ($line['es_escola'] == $escSemCad) {
				//$sx .= '<td>' . $line['es_escola'] . '</td>';
				$link = base_url('index.php/ic/professor_sem_escola/');
				$link_a = '<a href="' . $link . '" target="_new" class="link">';

				$sx .= '<td align="left">';
				$sx .= $link_a . $line['es_escola'] . '</a>';
				$sx .= '</td>';

			} else {
				$sx .= '<td align="left">' . $line['es_escola'] . '</td>';
			}
			$sx .= '<td align="right">' . $line['total'];
		}

		$sx .= '</table>';
		return ($sx);
	}

	//resumo cockpit por tipo de orientador
	function ic_submit_resumo_professor_tipo($ano) {
		$sql = "select ss, count(*) as total
							from ic_submissao_plano
							inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
							inner join us_usuario on us_cracha = pj_professor
							left join escola on us_escola_vinculo = id_es
							left join (select distinct 1 as ss, us_usuario_id_us from ss_professor_programa_linha where sspp_ativo = 1) as ss_prof on us_usuario_id_us = id_us
							where pj_ano = '$ano'
							AND (pj_status  <> 'X' AND pj_status  <> '@')
							AND (doc_status <> 'X' AND doc_status <> '@')
							and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
							group by ss
							order by total desc
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por tipo de professor</b></td></tr>';
		$sx .= '<tr class="lt3"><th align="center">Tipo</th>
								<th align="center">qtd</th>
						</tr>';
		$tot = 0;
		$ss = 1;
		$troca = 'Stricto Sensu';
		$troca2 = 'Graduação';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;

			$sx .= '<tr>';

			if ($line['ss'] == $ss) {

				$sx .= '<td align="left">';
				$sx .= $troca;
				$sx .= '</td>';
			} else {
				$sx .= '<td align="left">';
				$sx .= $troca2;
				$sx .= '</td>';
			}

			$sx .= '<td align="right">';
			$sx .= $line['total'];
			$sx .= '</td>';

			$tot = $tot + $line['total'];

		}
		//$sx .= '<tr><td colspan=3 align="right">Total de planos --> '. $tot .'</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	//resumo cockpit por tipo de orientador
	function ic_submit_resumo_professor_titulacao($ano) {
		$sql = "select ust_id, ust_titulacao, count(*) as total
						from ic_submissao_plano
						inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						inner join us_usuario on us_cracha = pj_professor
						left join escola on us_escola_vinculo = id_es
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						group by ust_titulacao, ust_id
						order by total desc
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por titulação do professor </b></td></tr>';
		$sx .= '<tr class="lt3"><th align="center">Tipo</th>
								<th align="center">qtd</th>
						</tr>';
		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;

			$link = '<a href="'.base_url('index.php/ic/cockpit_titulacao/'.$ano.'/'.$line['ust_id']).'" target="_new" class="lt1 link">';
			
			$sx .= '<tr>';
			$sx .= '<td align="left">';
			$sx .= $link.$line['ust_titulacao'].'</a>';
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['total'];
			$sx .= '</td>';

			$tot = $tot + $line['total'];

		}
		//$sx .= '<tr><td colspan=3 align="right">Total de planos --> '. $tot .'</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	//resumo cockpit por tipo de orientador
	function ic_submit_resumo_campus($ano) {
		$sql = "select us_campus_vinculo, count(*) as total
						from ic_submissao_plano
						inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						inner join us_usuario on us_cracha = pj_professor
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						group by us_campus_vinculo
						order by total desc
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por <i>campi</i></b></td></tr>';
		$sx .= '<tr class="lt3"><th align="center">Campus</th>
								<th align="center">qtd</th>
						</tr>';
		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			
			

			$sx .= '<tr>';
			$sx .= '<td align="left">';
			$nome = $line['us_campus_vinculo'];
			if (strlen($nome) == 0)
				{
					$nome = '-não identificado-';
				}
				
			$link = '<a href="'.base_url('index.php/ic/cockpit_campus/'.$ano.'/'.$nome).'" target="_new" class="lt1 link">';
			$sx .= $link;
			$sx .= $nome;
			$sx .= '</a>';
			
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['total'];
			$sx .= '</td>';

			$tot = $tot + $line['total'];

		}
		//$sx .= '<tr><td colspan=3 align="right">Total de planos --> '. $tot .'</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	function ic_submit_resumo_campus_detalhe($ano,$campus) {
		if (substr($campus,0,1) == '-')
		{
			$wh = " AND (us_campus_vinculo = '' or us_campus_vinculo is null ) ";
		} else {
			$wh = " AND us_campus_vinculo = '$campus' ";	
		}
		
		$sql = "select *
						from ic_submissao_plano
						inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						inner join us_usuario on us_cracha = pj_professor
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						$wh
						order by us_nome
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="100%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por <i>campi</i></b></td></tr>';
		$sx .= '<tr class="lt0"><th align="center">#</th>
								<th align="center" width="20%">Professor</th>
								<th width="65%">Projeto</th>
								<th>Protocolo</th>
								<th>Projeto</th>
								<th width="10%">Campus</th>
						</tr>';
		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center" width="20">'.$tot.'</td>';
			$sx .= '<td>'.link_user($line['us_nome'],$line['id_us']).'</td>';
			$sx .= '<td>'.$line['doc_1_titulo'].'</td>';
			$sx .= '<td>'.$line['doc_protocolo'].'</td>';
			$sx .= '<td>'.$line['doc_protocolo_mae'].'</td>';
			$sx .= '<td width="10%">'.$line['us_campus_vinculo'].'</td>';
			$sx .= '</tr>';
		}
		//$sx .= '<tr><td colspan=3 align="right">Total de planos --> '. $tot .'</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	function ic_submit_resumo_titulacao_detalhe($ano,$titulacao) {
		if (substr($titulacao,0,1) == '-')
		{
			$wh = " AND (ust_id = '' or ust_id is null ) ";
		} else {
			$wh = " AND ust_id = '$titulacao' ";	
		}
		$sql = "select *
						from ic_submissao_plano
						inner join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						inner join us_usuario on us_cracha = pj_professor
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM')
						$wh
						order by us_nome
					 ";
					 
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//Colunas da tabela
		$sx = '<table width="100%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Resumo de submissões por <i>campi</i></b></td></tr>';
		$sx .= '<tr class="lt0"><th align="center">#</th>
								<th align="center" width="20%">Professor</th>
								<th width="65%">Projeto</th>
								<th>Protocolo</th>
								<th>Projeto</th>
								<th width="10%">Campus</th>
						</tr>';
		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center" width="20">'.$tot.'</td>';
			$sx .= '<td>'.link_user($line['us_nome'],$line['id_us']).'</td>';
			$sx .= '<td>'.$line['doc_1_titulo'].'</td>';
			$sx .= '<td>'.$line['doc_protocolo'].'</td>';
			$sx .= '<td>'.$line['doc_protocolo_mae'].'</td>';
			$sx .= '<td width="10%">'.$line['us_campus_vinculo'].'</td>';
			$sx .= '</tr>';
		}
		//$sx .= '<tr><td colspan=3 align="right">Total de planos --> '. $tot .'</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}	
	
	function table_view($wh = '', $offset = 0, $limit = 9999999, $orderby = '') {
		if (strlen($wh) > 0) {
			$wh = 'where (' . $wh . ') ';
		}
		if (strlen($orderby) > 0) {
			$orderby .= ', ';
		}
		$tabela = "	SELECT * 
								FROM ic
								LEFT JOIN ic_aluno AS pa ON ic_id = id_ic
								LEFT JOIN (SELECT us_campus_vinculo AS al_campus_vinculo, us_dt_nascimento as al_nasc, 
												   us_cpf AS al_cpf, us_cracha AS id_al, id_us AS aluno_id, 
												   us_nome AS al_nome, us_campus_vinculo AS al_campus, 
												   us_genero AS al_genero, us_link_lattes AS al_lattes,us_ativo AS al_ativo, 
								           usuario_tipo_ust_id AS al_tipo, us_cracha AS al_cracha, us_curso_vinculo AS al_curso, 
								           bl_ativo, us_cpf
								           FROM us_usuario
								           LEFT JOIN ic_blacklist ON id_us = bl_user_id
								           ) AS us_est ON pa.ic_aluno_cracha = us_est.id_al                            
								LEFT JOIN (SELECT us_campus_vinculo AS pf_campus_vinculo, us_dt_nascimento AS pf_nasc, us_cpf AS pf_cpf, 
												  us_cracha AS id_pf, id_us AS prof_id, us_nome AS pf_nome,
												  us_campus_vinculo AS pf_campus, us_genero AS pf_genero, us_link_lattes AS pf_lattes,
												  us_ativo AS pf_ativo, usuario_tipo_ust_id AS pf_tipo, us_cracha AS pf_cracha, 
												  us_curso_vinculo AS pf_curso, us_escola_vinculo
										      FROM us_usuario) AS us_prof ON ic.ic_cracha_prof = us_prof.id_pf 
								LEFT JOIN escola ON id_es = us_escola_vinculo		                           
								LEFT JOIN ic_modalidade_bolsa AS mode ON pa.mb_id = mode.id_mb
								LEFT JOIN ic_situacao ON id_s = icas_id
								LEFT JOIN area_conhecimento ON ic_semic_area = ac_cnpq
								$wh
								ORDER BY $orderby ic_ano desc, s_id, ic_plano_aluno_codigo, pf_nome, al_nome
								LIMIT  $limit 
								OFFSET $offset
							";
		return ($tabela);
	}

	//copia da table , só que para funções expecifica(exemplo: Guia do estudante)
	function table_view_2($wh = '', $offset = 0, $limit = 9999999, $orderby = '') {
		if (strlen($wh) > 0) {
			$wh = 'where (' . $wh . ') ';
		}
		if (strlen($orderby) > 0) {
			$orderby .= ', ';
		}
		$tabela = "	
								SELECT * 
									FROM ic
									LEFT JOIN ic_aluno AS pa ON ic_id = id_ic
									LEFT JOIN (SELECT us_campus_vinculo AS al_campus_vinculo, us_dt_nascimento as al_nasc, 
													   us_cpf AS al_cpf, us_cracha AS id_al, id_us AS aluno_id, 
													   us_nome AS al_nome, us_campus_vinculo AS al_campus, 
													   us_genero AS al_genero, us_link_lattes AS al_lattes,us_ativo AS al_ativo, 
											   usuario_tipo_ust_id AS al_tipo, us_cracha AS al_cracha, us_curso_vinculo AS al_curso, 
											   bl_ativo, us_cpf, email, usm_email
											   FROM us_usuario
											   LEFT JOIN ic_blacklist ON id_us = bl_user_id
											   LEFT JOIN(select 1 as email, usuario_id_us, usm_email from  us_email where usm_ativo = 1 and usm_email_preferencial = 1 group by usuario_id_us, email) as email on id_us = usuario_id_us
											   ) AS us_est ON pa.ic_aluno_cracha = us_est.id_al                            
									LEFT JOIN (SELECT us_campus_vinculo AS pf_campus_vinculo, us_dt_nascimento AS pf_nasc, us_cpf AS pf_cpf, 
													  us_cracha AS id_pf, id_us AS prof_id, us_nome AS pf_nome,
													  us_campus_vinculo AS pf_campus, us_genero AS pf_genero, us_link_lattes AS pf_lattes,
													  us_ativo AS pf_ativo, usuario_tipo_ust_id AS pf_tipo, us_cracha AS pf_cracha, 
													  us_curso_vinculo AS pf_curso, us_escola_vinculo
												  FROM us_usuario) AS us_prof ON ic.ic_cracha_prof = us_prof.id_pf 
									LEFT JOIN escola ON id_es = us_escola_vinculo		                           
									LEFT JOIN ic_modalidade_bolsa AS mode ON pa.mb_id = mode.id_mb
									LEFT JOIN ic_situacao ON id_s = icas_id
									LEFT JOIN area_conhecimento ON ic_semic_area = ac_cnpq
									$wh
									ORDER BY $orderby ic_ano desc, s_id, ic_plano_aluno_codigo, pf_nome, al_nome
									LIMIT  $limit 
									OFFSET $offset							
							";
		return ($tabela);
	}

	function lista_projetos($edital, $ano, $status) {
		if ($status == '0') {
			$status = '@';
		}

		$whe = " pj_edital = '$edital' and pj_ano = '$ano' ";
		if (strlen($status) > 0) {
			$whe .= " and pj_status = '$status' ";
		}
		$sql = "select *
						from ic_submissao_projetos
						inner join us_usuario on pj_professor = us_cracha
						left join area_conhecimento on pj_area = ac_cnpq
						where $whe ";
		$sql .= ' order by pj_area, pj_titulo ';
				
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="table tabela01">';
		$xtitle = '';
		$xarea = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$area = $line['pj_area'];
			if ($area != $xarea)
				{
					$sx .= '<tr><td colspan=5 class="lt5"><b>'.$area.' - '.$line['ac_nome_area'].'</b></td></tr>';
					$xarea = $area;
				}
			
			/* */
			$title = $line['pj_titulo'];
			if ($title == $xtitle) {
				$line['igual'] = '1';
			} else {
				$line['igual'] = '0';
			}

			if (($status == 'B') and ($line['igual'] == '1')) {
				$line['agrupar'] = '1';
			} else {
				$line['agrupar'] = '0';
			}
			$line['nr'] = ($r + 1);
			$sx .= $this -> load -> view('ic/projeto_row', $line, true);
			$xtitle = $title;
		}
		$sx .= '</table>';
		return ($sx);

	}

	/** COCKPIT - Projetos */
	function cockpit_resumo_projeto($ano, $edital = 'IC') {
		$whe = " and (pj_edital = 'IC' or pj_edital = 'PIBIC' or  pj_edital = 'PIBITI' or  pj_edital = 'IS' or  pj_edital = 'ICI' or  pj_edital = 'PIBICEM') ";
		if ($edital != 'IC') {
			$whe = " and (pj_edital = '$edital' )";
		}

		$sql = "select count(*) as total, pj_ano, pj_status, pj_edital
						from ic_submissao_projetos
						where pj_ano = '$ano'
						$whe
						group by pj_edital, pj_ano, pj_status
					 ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';
		$tot = 0;

		$sx .= '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Situação dos Projetos submetidos para ' . $edital . '/' . $ano . '</b></td></tr>';
		$sx .= '<tr class="lt3">
								<th align="left">edital</th>
								<th align="center">status</th>
								<th align="right">qtd</th>
						</tr>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$status = $line['pj_status'];
			if ($status == '@') { $status = '0';
			}
			$link = base_url('index.php/ic/projetos/' . $edital . '/' . $ano . '/' . $status);
			$link = '<a href="' . $link . '" target="_new" class="link">';

			$sx .= '<tr>';

			$sx .= '<td align="left">';
			$sx .= $link . $line['pj_edital'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $link . msg('status_pj_' . $line['pj_status']) . '</a>';
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $link . $line['total'] . '</a>';
			$sx .= '</td>';

			$tot = $tot + $line['total'];

		}
		$sx .= '<tr><td colspan=3 align="right">Total de projetos --> ' . $tot . '</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	/** COCKPIT - Resumo */
	function cockpit_resumo_plano($ano, $edital) {
		$whe = " and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM') ";
		if ($edital != 'IC') {
			$whe = " and (doc_edital = '$edital' )";
		}

		$sql = "select count(*) as total, pj_ano, doc_edital, 
										CASE
												WHEN pj_status = '@' THEN 'em submissao'
												WHEN pj_status = 'A' THEN 'submetido'
												WHEN pj_status = 'B' THEN 'em análise'
												WHEN pj_status = 'C' THEN 'analise finalizada'
												WHEN pj_status = 'D' THEN 'analise finalizada'
												WHEN pj_status = 'F' THEN 'analise finalizada'
												WHEN pj_status = 'X' THEN 'cancelado'
										ELSE pj_status          
										END  as status
						from ic_submissao_plano
						left join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						$whe
						group by doc_edital, pj_ano
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';
		$tot = 0;

		$sx .= '<table width="40%" class="tabela00" border=0>';
		$sx .= '<tr><td class="lt4" colspan=3><b>Planos submetidos por edital para ' . $edital . '/' . $ano . '</b></td></tr>';
		$sx .= '<tr class="lt3">
								<th align="left">edital</th>
								<th align="center">status</th>
								<th align="right">qtd</th>
						</tr>';

		$jr = 'PIBICEM';
		$troca = 'PIBIC jr';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$sx .= '<tr>';

			if ($line['doc_edital'] == $jr) {
				$sx .= '<td align="left">';
				$sx .= $troca;
				$sx .= '</td>';
			} else {
				$sx .= '<td align="left">';
				$sx .= $line['doc_edital'];
				$sx .= '</td>';
			}

			$sx .= '<td align="center">';
			$sx .= $line['status'];
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['total'];
			$sx .= '</td>';

			$tot = $tot + $line['total'];

		}
		$sx .= '<tr><td colspan=3 align="right">Total de planos --> ' . $tot . '</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function cockpit_resumo_graf($ano, $edital) {
		$whe = " and (doc_edital = 'PIBIC' or  doc_edital = 'PIBITI' or  doc_edital = 'IS' or  doc_edital = 'ICI' or  doc_edital = 'PIBICEM') ";

		if ($edital != 'IC') {
			$whe = " and (doc_edital = '$edital' )";
		}

		$sql = "select doc_edital, count(*) as total, pj_status          
						from ic_submissao_plano
						left join ic_submissao_projetos on doc_protocolo_mae = pj_codigo
						where pj_ano = '$ano'
						AND (pj_status  <> 'X' AND pj_status  <> '@')
						AND (doc_status <> 'X' AND doc_status <> '@')
						$whe
						group by doc_edital, pj_ano
					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) == 0) {
			return ( array());
		}
		$line = $rlt[0];
		if (count($line) == 0) {
			return ($line);
		}
		//return values
		$dados = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$dados[$line['doc_edital']] = $line['total'];
		}
		return ($dados);
	}

	function ja_implementado($proto) {
		$sql = "select * from ic where ic_plano_aluno_codigo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function estudante_com_ic_implementado($id = 0) {
		$sql = "select * from ic_aluno where aluno_id = $id and icas_id = 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function existe_projeto_enviado($proto) {
		$sql = "select * from ic_submissao_plano where doc_protocolo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function orientaoes_ativas($ano = '') {
		$sx = '';
		$mod = '';
		$ano = '2015';
		$ano1 = $ano;
		$ano2 = ($ano + 1);
		$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
		$wh .= ' and (icas_id = 1)';
		if (strlen($mod) > 0) {
			$wh .= ' and id_mb = ' . $mod;
		}

		$sql = "select * from ic
            			left join ic_aluno as pa on ic_id = id_ic
						left join (select us_campus_vinculo, us_cracha as id_pf, id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						where $wh
						";

		$sql = "select pf_cracha, pf_nome, count(*) as total, us_campus_vinculo
					FROM ($sql) as resultado
					GROUP BY pf_nome, pf_cracha, us_campus_vinculo ";

		//$sql .= " order by al_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$tot = 0;
		$totp = 0;
		$sx .= '<table width="100%">';
		$sx .= '<tr><th width="5%">Cod.Crachá</th>
					<th width="55%">Nome</th>
					<th width="30%">Campus</th>
					<th width="5%">Orientações</th>
					<th width="5%">Horas</th>
				</tr>';
		$class = ' style="border-bottom: 1px #000000 solid" ';
		$class = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot = $tot + $line['total'];
			$totp++;
			$sx .= '<tr>';
			$sx .= '<td ' . $class . ' align="center" >' . $line['pf_cracha'] . '</td>';
			$sx .= '<td ' . $class . '>' . $line['pf_nome'] . '</td>';
			$sx .= '<td>' . $line['us_campus_vinculo'] . '</td>';
			$sx .= '<td ' . $class . ' align="center" >' . $line['total'] . '</td>';
			$totx = ($line['total'] + 0.02) / 2;
			$sx .= '<td ' . $class . ' align="center" >' . number_format($totx, 0) . '</td>';
		}
		$sx .= '<tr><td colspan="3">Total de ' . $totp . ' orientadores, com ' . $tot . ' orientações.</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

/* orientações por escola */
function orientaoes_ativas_escola($ano = '') {
	$sx = '';
	$mod = '';
	$ano = '2015';
	$ano1 = $ano;
	$ano2 = ($ano + 1);
	
	$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
	$wh .= ' and (icas_id = 1)';
	$ob = 'pf_cracha, pf_nome, us_campus_vinculo, es_escola, mb_tipo';
	
	if (strlen($mod) > 0) {
		$wh .= ' and id_mb = ' . $mod;
	}

	$sql = "SELECT pf_cracha, pf_nome, us_campus_vinculo, es_escola, mb_tipo, count(*) as total
					FROM (select * from ic
					      left join ic_aluno as pa on ic_id = id_ic
					      left join (select us_campus_vinculo, us_escola_vinculo, us_cracha as id_pf, 
					                        id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha 
					                 from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
					                 left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
					                 left join ic_situacao on id_s = icas_id
					                 where $wh
					                 and (icas_id = 1)) as resultado
					INNER JOIN escola ON us_escola_vinculo = id_es
					GROUP BY $ob";
	
	$rlt = $this -> db -> query($sql);
	$rlt = $rlt -> result_array();
	
	$tot = 0;
	$totp = 0;
	
	$class_2 = ' style="border-bottom: 1px #000000 solid" ';
	$class_2 = '';
	
	$sx .= '<table width="100%" class="tabela00">';
	$sx .= '<tr ' . $class_2 . '><th width="5%">Cod.Crachá</th>
							<th width="43%">Nome Prof.</th>
							<th width="12%">Campus</th>
							<th width="25%">Escola</th>
							<th width="10%">Modalidade</th>
							<th width="3%">Orientações</th>
					</tr>';
	
	$class = ' style="border-bottom: 1px #000000 solid" ';
	$class = '';
	
	for ($r = 0; $r < count($rlt); $r++) {
				
			$line = $rlt[$r];
			$tot = $tot + $line['total'];
			$totp++;
			
			$sx .= '<tr>';
			$sx .= '<td ' . $class . ' align="center" >' . $line['pf_cracha'] . '</td>';
			$sx .= '<td ' . $class . '>' . $line['pf_nome'] . '</td>';
			$sx .= '<td>' . $line['us_campus_vinculo'] . '</td>';
			$sx .= '<td>' . $line['es_escola'] . '</td>';
			$sx .= '<td>' . $line['mb_tipo'] . '</td>';
			$sx .= '<td ' . $class . ' align="center" >' . $line['total'] . '</td>';

		}
		
	$sx .= '<tr><td colspan="3">Total de ' . $totp . ' orientadores, com ' . $tot . ' orientações.</td></tr>';
	$sx .= '</table>';
	
	return ($sx);
}

	function docentes_em_pesquisa($ano) {

		$wh = '((icas_id = 1) and (pf_tipo < 4))';
		$sql = $this -> table_view($wh, 0, 9999999, 'pf_nome');

		$table = ' left join us_bolsa_produtividade on prof_id = us_bolsa_produtividade.us_id ';
		$table .= 'left join us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn ';
		$table .= 'left join (select ca_professor from captacao where (round(ca_vigencia_final_ano/100) + round(ca_duracao/12)) >= 2015 ) as captacao on ca_professor = pf_cracha ';

		$sql = troca($sql, 'where', $table . ' WHERE ');

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><th>#</th>
					<th>Cracha</th>
					<th>Nome</th>
					<th>Recebeu Bolsa</th>
					<th>Lattes</th>
				</tr>';
		$id = 0;
		$xcracha = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = $line['pf_cracha'];

			if ($cracha != $xcracha) {
				$id++;
				$xcracha = $cracha;
				$sx .= '<tr>';
				$sx .= '<td align="center">' . $id . '</td>';
				$sx .= '<td align="center">';
				$sx .= $line['pf_cracha'];
				$sx .= '</td>';

				$sx .= '<td>';
				$sx .= $line['pf_nome'];
				$sx .= '</td>';

				$mod = trim($line['bpn_bolsa_descricao']) . trim($line['ca_professor']);
				if (strlen($mod) > 0) {
					$mod = 'SIM';
				} else {
					$mod = '-';
				}

				$sx .= '<td align="center">';
				$sx .= $mod;
				$sx .= '</td>';

				$sx .= '<td>';
				$sx .= $line['pf_lattes'];
				$sx .= '<td>';
				$sx .= '</tr>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function estudante_em_pesquisa($ano) {

		$wh = '(icas_id = 1)';
		$sql = $this -> table_view($wh, 0, 9999999, 'al_nome');

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><th>#</th>
					<th>Cracha</th>
					<th>Nome</th>
					<th>Recebeu Bolsa</th>
					<th>Lattes</th>
				</tr>';
		$id = 0;
		$xcracha = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = $line['al_cracha'];

			if ($cracha != $xcracha) {
				$id++;

				$xcracha = $cracha;
				$sx .= '<tr>';
				$sx .= '<td align="center">' . $id . '</td>';
				$sx .= '<td align="center">';
				$sx .= $line['al_cracha'];
				$sx .= '</td>';

				$sx .= '<td>';
				$sx .= $line['al_nome'];
				$sx .= '</td>';

				$mod = trim($line['mb_valor']);
				if (($mod) > 0) {
					$mod = 'SIM';
				} else {
					$mod = '-';
				}

				$sx .= '<td align="center">';
				$sx .= $mod;
				$sx .= '</td>';

				$sx .= '<td>';
				$sx .= $line['pf_lattes'];
				$sx .= '<td>';
				$sx .= '</tr>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function ic_seguro($tipo = 1) {
		$vlr = 0;
		$custo = '0.0662';
		$sub = '76659820000313';
		$areaIC = 'PIBIC';
		$cr = '103.646';
		$ano = date("Y");

		if (date("m") < 7) {
			$ano = $ano - 1;
		}

		$data1 = date("Y-m-d");
		$wh = "((icas_id = 1) and (ic_ano = '$ano'))";

		if ($tipo == 1) {
			$vlr = 10000;
			$custo = '0.28';
			$wh .= " AND (al_campus = 'Curitiba' or al_campus = 'São José dos Pinhais' or al_campus='')";
		} else {
			$vlr = 12000;
			$custo = '2.39';
			$wh .= "  AND NOT (al_campus = 'Curitiba' or al_campus = 'São José dos Pinhais' or al_campus='')";
		}

		$sql = $this -> table_view($wh, 0, 9999999, 'al_nome');
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$seq = 0;

		$sx = '<table width="100%" class="lt1 tabela00">';
		$sx .= '<tr " height="70"><img src="' . base_url('img/logo_seguradora.png') . '" height="60"></tr>';
		$sx .= '<tr class="lt2"><th>#</th>
						<th class="lt2">Nome</th>
						<th class="lt2">CPF</th>					
						<th class="lt2">Dt.Nascimento</th>					
						<th class="lt2">Custo</th>				
						<th class="lt2">Salário/Capital</th>
						<th class="lt2">Sub</th>			
						<th class="lt2">Área demandante</th>
						<th class="lt2">CR</th>
						<th class="lt2">Cidade</th>
					</tr>';

		for ($r = 0; $r < count($rlt); $r++) {

			$line = $rlt[$r];
			$seq++;

			$sx .= '<tr>';
			$sx .= '<td align="center">' . $seq . '.</td>';
			$sx .= '<td align="left">' . $line['al_nome'] . '</td>';
			$sx .= '<td align="center">' . $line['al_cpf'] . '</td>';
			$sx .= '<td align="center">' . stodbr($line['al_nasc']) . '</td>';
			$sx .= '<td align="right">' . number_format($custo, 4, ',', '.') . '</td>';
			$sx .= '<td align="right">' . number_format($vlr, 2, ',', '.') . '</td>';
			$sx .= '<td align="center">' . $sub . '</td>';
			$sx .= '<td align="center">' . $areaIC . '</td>';
			$sx .= '<td align="center">' . $cr . '</td>';
			$sx .= '<td align="right">' . $line['al_campus_vinculo'] . '</td>';

			//$sx .= '<td align="center">' . $line['al_genero'] . '</td>';
			//$sx .= '<td align="center">' . 'T' . '</td>';
			//$sx .= '<td>' . $line['mb_descricao'] . '</td>';
			//$sx .= '<td align="center">' . $line['al_cracha'] . '</td>';

		}

		$sx .= '</table>';
		return ($sx);
	}

	function existe_avaliacoes($id_us) {
		$sql = "select count(*) as total from pibic_parecer_" . date("Y") . " where pp_avaliador_id = $id_us and (pp_status = 'A')";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			if ($line['total'] > 0) {
				return (1);
			} else {
				return (0);
			}

		} else {
			return (0);
		}
	}

	function is_ic($us_cracha = '') {
		$sql = "SELECT count(*) as total, mb_tipo, id_s FROM ic_aluno 
				INNER JOIN ic on id_ic = ic_id
				INNER JOIN ic_modalidade_bolsa ON id_mb = mb_id
				INNER JOIN ic_situacao on icas_id = id_s 
				LEFT JOIN us_usuario on us_cracha = ic_aluno_cracha
						where ic_cracha_prof = '$us_cracha' or ic_aluno_cracha = '$us_cracha' 
						AND (s_ativo = 1) 
				GROUP BY mb_tipo, id_s ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$bolsa = array();
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$tipo = $line['mb_tipo'];
				$status = $line['id_s'];
				if ($status > 1) {
					$status = 2;
				}
				$bolsa[$tipo][$status] = $line['total'];
			}
			$this -> resumo = $bolsa;
			return (1);
		} else {
			return (0);
		}
	}

	function inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs = '') {
		$data = date("Ymd");
		$hora = date("H:i");
		$log = $_SESSION['cracha'];

		$sql = "select * from ic_historico
					where bh_protocolo = '$proto'
					and bh_data = $data
					and bh_acao = $ac
					and bh_aluno_1 = '$aluno1'
					and bh_aluno_2 = '$aluno2'
				";
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {

		} else {
			$sql = "insert into ic_historico 
						(bh_protocolo, bh_data, bh_hora,
						bh_log, bh_acao, bh_historico,
						bh_aluno_1, bh_aluno_2, bh_motivo,
						bh_obs
						) values (
						'$proto',$data,'$hora',
						'$log','$ac','$hist',
						'$aluno2','$aluno1','$motivo',
						'$obs')
				";
			$rlt = $this -> db -> query($sql);
		}
		return ('');
	}

	function alterar_titulo_plano($proto, $titulo) {
		$sql = "update ic set ic_projeto_professor_titulo = '$titulo'
						where 	ic_plano_aluno_codigo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function alterar_orientador_plano($proto, $prof) {
		$sql = "update ic set ic_cracha_prof = '$prof'
						where 	ic_plano_aluno_codigo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function pagamentos_ic($cracha) {
		$sql = "select * from us_usuario where us_cracha = '$cracha' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$cpf = strzero(sonumero($rlt[0]['us_cpf']), 11);
			$sql = "SELECT * 
							FROM ic_pagamentos 
							WHERE pg_cpf = '$cpf' 
							ORDER BY pg_vencimento
							";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$sx = '<table width="100%" class="tabela00 border1 lt1">';
			$sx .= '<tr>
								<th>pos</th>
								<th>dt.pagamento</th>
								<th>documento</th>
								<th>beneficiário</th>
								<th>cpf</th>
								<th>valor</th>
								<th>banco</th>
								<th>agencia</th>
								<th>conta</th>
								<th>cc</th>
							</tr>';
			$tot = 0;
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$sx .= '<tr>';
				$sx .= '<td align="center">' . ($r + 1) . '</td>';
				$sx .= '<td align="center">' . stodbr($line['pg_vencimento']) . '</td>';
				$sx .= '<td align="center">' . $line['pg_nrdoc'] . '</td>';
				$sx .= '<td align="left">' . $line['pg_nome'] . '</td>';
				$sx .= '<td align="center">' . mask_cpf($line['pg_cpf']) . '</td>';
				$sx .= '<td align="right">' . number_format($line['pg_valor'], 2, ',', '.') . '</td>';
				$sx .= '<td align="center">' . $line['pg_banco'] . '</td>';
				$sx .= '<td align="center">' . $line['pg_agencia'] . '</td>';
				$sx .= '<td align="center">' . $line['pg_conta'] . '</td>';
				$sx .= '<td align="center">' . $line['pg_cc'] . '</td>';
				$tot = $tot + $line['pg_valor'];
			}
			$sx .= '<tr><td align="right" colspan=10"><b>Valor total ' . number_format($tot, 2, ',', '.') . '</b></td></tr>';
			$sx .= '</table>';
			return ($sx);
		}
		return ('');
	}

	function resumo_implemendados($ano) {
		$sql = "select * from 
					(
					select count(*) as total, mb_id from ic_aluno 
						inner join ic on ic_id = id_ic
					where ic_ano = '$ano' 
						and (icas_id = 1 or icas_id = 4)
					group by mb_id) as tabela
					inner join ic_modalidade_bolsa on mb_id = id_mb 
					order by mb_tipo, mb_descricao";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$xfom = '';
		$xedi = '';
		$sx = '<h2>Resumo de implementações ' . ($ano) . '-' . ($ano + 1) . '</h2>';
		$sx .= '<table width="600" class="tabela01 border1 lt1">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$link = '<a href="' . base_url('index.php/ic/report_resumo/' . $ano . '/' . $line['mb_id']) . '" class="link">';
			$fom = $line['mb_fomento'];
			$sx .= '<tr>';

			$sx .= '<td>';
			$sx .= $line['mb_tipo'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['mb_fomento'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $link;
			$sx .= $line['mb_descricao'];
			$sx .= '</a>';
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['total'];
			$sx .= '</td>';
		}
		$sx .= '</table>';

		$sx = '<div class="nopr">' . $sx . '</div>';

		return ($sx);

	}

	function encerrar_planos_ano_anterior() {
		$sx = '';
		if (date("m") > 7) {
			$ano = (date("Y") - 1);
			$sql = "select * from ic 
							where s_id = 1
							and ic_ano <= $ano
					limit 300 ";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$ida = $line['id_ic'];
				$proto = $line['ic_plano_aluno_codigo'];

				if (substr($proto, 0, 1) == 'S') {
					/* CANCELAR */
					$sql = "delete from ic_aluno where ic_id = $ida ";
					$rrr = $this -> db -> query($sql);
					$sql = "delete from ic where id_ic = $ida ";
					$rrr = $this -> db -> query($sql);
					$sx .= '<br>' . $proto . ' excluido';
				} else {
					$sql = "update ic_aluno set
									icas_id = 4,
									icas_id_char = 'F'
									where ic_id = $ida; " . cr();
					$rrr = $this -> db -> query($sql);

					$sql = "update ic set
										s_id_char = 'F',
										s_id = 4
									where id_ic = $ida ";
					$rrr = $this -> db -> query($sql);
					$sx .= '<br>' . $proto . ' finalizado';
				}
			}
		}
		return ($sx);
	}

/** Gera guia do estudante em excel */
	function report_guia_estudante_xls($ano1 = 0, $ano2 = 0, $mod = '', $esc = '') {
		$sx = '';
		$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
		if (strlen($mod) > 0) {
			$wh .= ' and id_mb = ' . $mod;
			
		}elseif(strlen($esc) > 0){
			$wh .= ' and us_escola_vinculo = ' . $esc;
		}
		
		$sql = $this -> table_view_2($wh, 0, 9999999, 'al_nome');
		//$sql .= " order by al_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sh = '';
		$sx .= '<table width="100%" class="tabela00">';
		$sx .= '<tr class="lt2">
							<th align="left">#</th>
							<th align="left">protocolo</th>
							<th align="left">ano</th>
							<th align="left">nome_aluno</th>
							<th align="left">cracha_aluno</th>
							<th align="left">curso_aluno</th>
							<th align="left">CPF_aluno</th>
							<th align="left">gen_aluno</th>
							<th align="left">nome_prof</th>
							<th align="left">cracha_prof</th>
							<th align="left">curso_prof</th>
							<th align="left">escola</th>
							<th align="left">bolsa</th>
							<th align="left">modalidade</th>
							<th align="left">fomento</th>
							<th align="left">titulo</th>
							<th align="left">Imp</th>
							<th align="right">status</th>
						</tr>';

		$tot = 0;
		$tot2 = 0;
		$xmb = '';

		for ($r = 0; $r < count($rlt); $r++) {

			$line = $rlt[$r];

			$st = $line['icas_id'];
			$sf = '';
			$sff = '';

			if ($st == '2') {
				$sf = '<font color="red"><s>';
				$sff = '</s></font>';
				$tot2++;
			} else {
				$tot++;
			}

			$link_ic = link_ic($line['id_ic'], 'ic');

			$sx .= '<tr>';

			//indice
			$sx .= '<td width="20" class="lt1">' . ($r + 1) . '.</td>';

			$sx .= '<td align="center">';
			$sx .= $link_ic . $line['ic_plano_aluno_codigo'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['ic_ano'];
			$sx .= '</td>';

			$sx .= '<td>';
			$link = $sf . link_perfil($line['al_nome'], $line['aluno_id']);
			$sx .= $link . $sff;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['ic_cracha_aluno'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['al_curso'];
			$sx .= '</td>';

			$sx .= '<td><nobr>';
			$sx .= mask_cpf($line['us_cpf']);
			$sx .= '</nobr></td>';

			$sx .= '<td align="center">';
			$sx .= $line['al_genero'];
			$sx .= '</td>';

			//$sx .= '<td>';
			//$sx .= $line['usm_email'];
			//$sx .= '</td>';

			$sx .= '<td>';
			$link = $sf . link_perfil($line['pf_nome'], $line['prof_id']);
			$sx .= $link . $sff . '</a>';
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $line['ic_cracha_prof'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['pf_curso'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['es_escola'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['mb_tipo'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['mb_descricao'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['mb_fomento'];
			$sx .= '</td>';

			$sx .= '<td class="lt0">';
			$sx .= $sf . $line['ic_projeto_professor_titulo'] . $sff;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $sf . $line['bl_ativo'] . $sff;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $sf . $line['s_situacao'] . $sff;
			$sx .= '</td>';

			$sx .= '</tr>';

		}
		$sx .= '<tr><td colspan=10>Total ' . $tot . ' registros</td></tr>';
		$sx .= '<tr><td colspan=10>Total ' . $tot2 . ' registros cancelados</td></tr>';
		$sx .= '</table>';
		$sxc = $sx;
		/****/
		$sx = '<table width="100%" class="lt1">';
		$sx .= '<tr  >';
		$sx .= '<td colspan=10 style="background-color: #ccc;" class="lt3 borderb1">';
		$sx .= $line['mb_descricao'];
		$sx .= ' - ';
		$sx .= $line['mb_fomento'];
		$sx .= ' - ';
		$sx .= $line['mb_tipo'];
		$sx .= ' - ';
		$sx .= $ano1 . '-' . ($ano2);
		$sx .= ' - ';
		$sx .= 'Total: ' . $tot;
		$sx .= '</td>';
		$sx .= '</tr>';
		$sx .= $sh;
		$sx .= $sxc;

		return ($sx);
	}

	function report_guia_estudante($ano1 = 0, $ano2 = 0, $mod = '') {
		$sx = '';
		$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
		if (strlen($mod) > 0) {
			$wh .= ' and id_mb = ' . $mod;
		}
		$sql = $this -> table_view($wh, 0, 9999999, 'al_nome');

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sh = '';
		$sx .= '<H1> Iniciação Científica _ ' . (date("Y") - 1) . '</H1>';
		$sx .= '<table width="100%" class="tabela00">';
		$sx .= '<tr class="lt2">
							<th align="left">#</th>
							<th align="left">protocolo</th>
							<th align="left">ano</th>
							<th align="left">nome_aluno</th>
							<th align="left">cpf_aluno</th>
							<th align="left">curso_aluno</th>
							<th align="left">nome_prof</th>
							<th align="left">curso_prof</th>
							<th align="right">status</th>
						</tr>';
		$tot = 0;
		$tot2 = 0;
		$xmb = '';
		for ($r = 0; $r < count($rlt); $r++) {

			$line = $rlt[$r];

			$st = $line['icas_id'];
			$sf = '';
			$sff = '';
			if ($st == '2') {
				$sf = '<font color="red"><s>';
				$sff = '</s></font>';
				$tot2++;
			} else {
				$tot++;
			}

			/**/
			$link_ic = link_ic($line['id_ic'], 'ic');

			$mb = $line['mb_descricao'];

			$sx .= '<tr>';

			//indice
			$sx .= '<td width="20" class="lt2">' . ($r + 1) . '.</td>';

			$sx .= '<td align="center">';
			$sx .= $link_ic . $line['ic_plano_aluno_codigo'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $sf . $line['ic_ano'] . $sff;
			$sx .= '</td>';

			$sx .= '<td>';
			$link = $sf . link_perfil($line['al_nome'], $line['aluno_id']);
			$sx .= $link . $sff;

			$sx .= '<td align="left">';
			$sx .= $sf . mask_cpf($line['al_cpf']) . $sff;
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $sf . $line['al_curso'] . $sff;
			$sx .= '</td>';

			$sx .= '<td>';
			$link = $sf . link_perfil($line['pf_nome'], $line['prof_id']);
			$sx .= $link . $sff . '</a>';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $sf . $line['pf_curso'] . $sff;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $sf . $line['s_situacao'] . $sff;
			$sx .= '</td>';

			$sx .= '</tr>';

		}
		$sx .= '<tr><td colspan=10>Total ' . $tot . ' registros</td></tr>';
		$sx .= '<tr><td colspan=10>Total ' . $tot2 . ' registros cancelados</td></tr>';
		$sx .= '</table>';
		$sxc = $sx;
		/****/
		$sx = '<table width="100%" class="lt1">';
		$sx .= '<tr  >';
		$sx .= '<td colspan=10 style="background-color: #ccc;" class="lt3 borderb1">';
		$sx .= $line['mb_descricao'];
		$sx .= ' - ';
		$sx .= $line['mb_fomento'];
		$sx .= ' - ';
		$sx .= $line['mb_tipo'];
		$sx .= ' - ';
		$sx .= $ano1 . '-' . ($ano2);
		$sx .= ' - ';
		$sx .= 'Total: ' . $tot;
		$sx .= '</td>';
		$sx .= '</tr>';
		$sx .= $sh;
		$sx .= $sxc;

		return ($sx);
	}

	function indicacoes_sem_id_usuario() {
		$sql = "SELECT * FROM ic_aluno 
						left join us_usuario on us_cracha = ic_aluno_cracha
						where aluno_id = 0
						and not us_nome is null
						";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$data = date("Y-m-d");
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			print_r($line);
		}

	}

	function finaliza_protocolo($protocolo) {
		$sql = "SELECT * FROM ic_aluno
					inner join ic on id_ic = ic_id
						WHERE ic_plano_aluno_codigo = '$protocolo'
						and (icas_id = 1 or icas_id = 3 or icas_id = 2)
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$data = date("Y-m-d");
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$idc = $line['id_ica'];
			$sql = "update ic_aluno set
								icas_id_char = 'F',
								icas_id = 4,
								aic_dt_saida = '$data',
								aic_dt_fim_bolsa = '$data'								
							where id_ica = " . $idc . ';' . cr();

			$this -> db -> query($sql);
		}
		return (1);
	}

	function cancelar_protocolo($protocolo) {
		$sql = "SELECT * FROM ic_aluno
					inner join ic on id_ic = ic_id
						WHERE ic_plano_aluno_codigo = '$protocolo'
						and (icas_id = 1 or icas_id = 3 or icas_id = 2)
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$data = date("Y-m-d");
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$idc = $line['id_ica'];
			$sql = "update ic_aluno set
								icas_id_char = 'C',
								icas_id = 2,
								aic_dt_saida = '$data',
								aic_dt_fim_bolsa = '$data'								
							where id_ica = " . $idc . ';' . cr();

			$sqlf = "update ic set 
								s_id_char = 'C',
								s_id = 2
								where ic_plano_aluno_codigo = '$protocolo' ";
			$this -> db -> query($sql);
			$this -> db -> query($sqlf);
		}
		return (1);
	}

	function recupera_nr_ic($protocolo) {
		$sql = "select * from ic where ic_plano_aluno_codigo = '$protocolo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$rlt = $rlt[0];
		} else {
			$rlt = array();
		}
		return ($rlt);
	}

	function reativar_protocolo($protocolo, $ica) {
		$data = date("Y-m-d");
		$sql = "update ic_aluno set
							icas_id_char = 'A',
							icas_id = 1,
							aic_dt_saida = '0000-00-00',
							aic_dt_fim_bolsa = '$data'								
					where id_ica = " . $ica . ';' . cr();
		$sqlf = "update ic set 
							s_id_char = 'A',
							s_id = 1
					where ic_plano_aluno_codigo = '$protocolo' ";
		$this -> db -> query($sql);
		$this -> db -> query($sqlf);
		return (1);
	}

	function substituicao_aluno($cracha, $protocolo, $cracha_novo, $data) {
		/* Baixa aluno (`ic_aluno`)  WHERE `ic_aluno_cracha` = '89317614'
		 *
		 */

		$us = $this -> usuarios -> le_cracha(trim($cracha_novo));
		if (count($us) == 0) {
			echo 'ERRO DE CONSULTA: ' . $cracha_novo;
			exit ;
		}
		$ida = $us['id_us'];

		$sql = "SELECT * FROM ic_aluno
					inner join ic on id_ic = ic_id
						WHERE ic_aluno_cracha = '$cracha'
						and ic_plano_aluno_codigo = '$protocolo'
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$ic_id = $line['ic_id'];
			$mb_id = $line['mb_id'];
			$mb_id_char = $line['mb_id_char'];
			$icas_id_char = $line['icas_id_char'];
			$icas_id = $line['icas_id'];

			$idc = $line['id_ica'];

			/* Finaliza aluno atual */
			$sql = "update ic_aluno set
								icas_id_char = 'C',
								icas_id = 2,
								aic_dt_saida = '$data',
								aic_dt_fim_bolsa = '$data'								
							where id_ica = " . $idc . ';' . cr();

			/* Inserre novo aluno */
			$sqli = "insert into ic_aluno 
						(
							aluno_id, ic_aluno_cracha, ic_id,
							mb_id, mb_id_char, icas_id, 
							icas_id_char,
							aic_dt_entrada, aic_dt_saida, aic_dt_inicio_bolsa,
							aic_dt_fim_bolsa 
						) values (
							$ida, '$cracha_novo','$ic_id',
							'$mb_id','$mb_id_char','$icas_id', '$icas_id_char',
							'$data','0000-00-00','$data',
							'0000-00-00'
						) 
					";

			/* Atualiza Dados do aluno */
			$sqlf = "update ic set 
								ic_cracha_aluno = '$cracha_novo',
								ic_dt_ativacao = '$data'
								where ic_plano_aluno_codigo = '$protocolo' ";
			$this -> db -> query($sql);
			$this -> db -> query($sqli);
			$this -> db -> query($sqlf);
		}
	}

	function resumo_orientacoes() {
		$sx = '';
		$sx .= '<table width="100%" class="border1 lt1">';
		$sx .= '<tr><th>' . msg('guidelines_ic') . '</th></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function orientacoes($cracha = '') {
		if (strlen($cracha) == 0) {
			$cracha = $_SESSION['cracha'];
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
						order by ic_ano desc, ic_plano_aluno_codigo, pf_nome, al_nome
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%">';
		$sx .= '<tr><td colspan=10>Orientações abertas</td></tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$edital = trim($line['mb_tipo']);
			$line['img'] = $this -> logo_modalidade($edital);
			$line['page'] = 'pibic';
			$sx .= $this -> load -> view("ic/plano-lista", $line, true);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function search($terms = '', $type = 1) {
		$cps = array('us_nome');

		$terms = troca($terms, ' ', ';');
		$term = splitx(';', $terms);

		$wh = '';
		$wh1 = '';
		$wh2 = '';
		$wh3 = '';
		$wh4 = '';

		if (strlen(sonumero($terms)) == 0) {
			$type = '2';
		}
		if ($type == 2) {
			for ($r = 0; $r < count($term); $r++) {
				if ($r > 0) {
					$wh1 .= ' and ';
					$wh2 .= ' and ';
					$wh3 .= ' and ';
					//$wh4 .= ' and ';
				}
				$wh1 .= " (pf_nome like '%" . $term[$r] . "%') ";
				$wh2 .= " (al_nome like '%" . $term[$r] . "%') ";
				$wh3 .= " (ic_projeto_professor_codigo like '%" . $term[$r] . "%') ";
				//$wh4 .= " (ic_projeto_professor_titulo like '%" . $term[$r] . "%') ";
			}

			$wh = '(' . $wh1 . ' or ' . $wh2 . ' or ' . $wh3 . ') 	';
		}
		if ($type == '1') {
			$wh .= " (ic_cracha_prof = '" . $term[0] . "') ";
			$wh .= " or (ic_cracha_aluno = '" . $term[0] . "') ";
			$wh .= " or (ic_plano_aluno_codigo like '" . $term[0] . "%') ";
		}

		$sql = $this -> table_view($wh, 0, 50, ' ic_ano desc, id_ica desc ');
		$rlt = db_query($sql);

		$sx = '<table width="100%" class="tabela01" border=0>';
		while ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['img'] = $this -> logo_modalidade($edital); ;
			$line['page'] = 'ic';
			$sx .= $this -> load -> view('ic/plano-lista', $line, True);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function search_term($terms = '', $type = 1) {
		$cps = array('us_nome');

		$terms = troca($terms, ' ', ';');
		$term = splitx(';', $terms);

		$wh = '';
		$wh1 = '';
		$wh3 = '';
		$wh4 = '';

		if (strlen(sonumero($terms)) == 0) {
			$type = '2';
		}
		if ($type == 2) {
			for ($r = 0; $r < count($term); $r++) {
				if ($r > 0) {
					$wh1 .= ' and ';
					$wh3 .= ' and ';
					//$wh4 .= ' and ';
				}
				$wh1 .= " (us_nome like '%" . $term[$r] . "%') ";
				$wh3 .= " (ic_projeto_professor_titulo like '%" . $term[$r] . "%') ";
				//$wh4 .= " (ic_projeto_professor_titulo like '%" . $term[$r] . "%') ";
			}
			/********** Busca por nome */
			$sql = "select us_cracha as cracha from us_usuario where " . $wh1;
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$wh = '';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				if (strlen($wh) > 0) { $wh .= ' or ';
				}
				$wh .= " (ic_cracha_prof = '" . $line['cracha'] . "') or ";
				$wh .= " (ic_cracha_aluno = '" . $line['cracha'] . "') ";
			}

			/********** Busca por projeto */
			$sql = "select ic_plano_aluno_codigo as proto 
								from ic where " . $wh3;
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				if (strlen($wh) > 0) { $wh .= ' or ';
				}
				$wh .= " (ic_plano_aluno_codigo = '" . $line['proto'] . "') ";
			}
		}

		$sql = $this -> table_view($wh, 0, 50, ' ic_ano desc, id_ica desc ');
		$rlt = db_query($sql);

		$sx = '<table width="100%" class="tabela01" border=0>';
		while ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['img'] = $this -> logo_modalidade($edital); ;
			$line['page'] = 'ic';
			$sx .= $this -> load -> view('ic/plano-lista', $line, True);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function row($obj) {
		$obj -> fd = array('id_ic', 'ic_plano_aluno_codigo', 'ic_projeto_professor_codigo', 'ic_cracha_prof', 'ic_cracha_aluno', 'ic_ano', 'ic_projeto_professor_titulo', 's_id');
		$obj -> lb = array('ID', msg('protocol'), msg('protocol'), msg('prof'), msg('estudante'), msg('ano'), msg('title'), msg('status'));
		$obj -> mk = array('', 'L', 'L', 'L', 'C');
		return ($obj);
	}

	function row_atividade($obj) {

		$obj -> fd = array('id_at', 'at_atividade', 'at_data_ini', 'at_data_fim', 'at_ano');
		$obj -> lb = array('ID', msg('atividade'), msg('dt_inicio'), msg('dt_fim'), msg('ano'));
		$obj -> mk = array('', '#', 'L', 'L', 'C');
		return ($obj);
	}

	function set_area_semic($proto, $area) {
		$sql = "update ic set ic_semic_area = '$area' where ic_plano_aluno_codigo = '$proto' ";
		$this -> db -> query($sql);
		return (1);
	}

	function set_idioma_semic($proto, $idioma) {
		$sql = "update ic set ic_semic_idioma = '$idioma' where ic_plano_aluno_codigo = '$proto' ";
		$this -> db -> query($sql);
		return (1);
	}

	function resumo_autores_mostra($id) {
		$funcao = array();
		$funcao['0'] = 'Discente';
		$funcao['1'] = '???';
		$funcao['2'] = 'Co-orientador';
		$funcao['3'] = 'Colaborador';
		$funcao['4'] = 'Pibic Junior';
		$funcao['5'] = 'Supervisor Pibic Junior';
		$funcao['6'] = 'Escola (para Pibic Júnior)';
		$funcao['7'] = 'Mestrando de Pós-Graduação';
		$funcao['8'] = 'Doutorando de Pós-Graduação';
		$funcao['9'] = 'Orientador';

		$sql = "select * from semic_trabalho_autor 
					where sma_protocolo = '$id'
						and sma_ativo > 0 
					order by sma_funcao
			";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="lt2" border=0>';
		$sx .= '<tr align="center">
						<th width="40%">Autor</th>
						<th width="20%">participacao</th>
						<th width="20%">Instituição (SIGLA)</th>
						<th width="10%">ação</th>
					</tr>';
		$tot = 0;
		while ($line = db_read($rlt)) {
			$link = '<a href="#" onclick="remove(' . $line['id_sma'] . ');" class="link">remover</a>';
			if ($line['sma_ativo'] > 1) { $link = '';
			}
			$sx .= '<tr>';
			$sx .= '<td class="tabela01">' . $line['sma_nome'] . '</td>';
			$sx .= '<td class="tabela01" align="center">' . $funcao[$line['sma_funcao']] . '</td>';
			$sx .= '<td class="tabela01" align="center">' . $line['sma_instituicao'] . '</td>';
			$sx .= '<td class="tabela01" align="center">' . $link . '</td>';
			$tot++;
		}
		if ($tot == 0) {
			$sx .= '<tr><td colspan=4 align="center" class="border1 pad5">
									<font class="error"><b>Sem autores incluídos</B>
							</td></tr>';
		}
		$sx .= '</table><br>';
		return ($sx);
	}

	function salvar_resumo($page, $data) {
		$protocolo = trim($data['ic_plano_aluno_codigo']);
		$dd1 = $data['dd1'];
		$dd2 = $data['dd2'];
		$dd3 = $data['dd3'];
		$dd4 = $data['dd4'];
		$dd5 = $data['dd5'];
		$dd6 = $data['dd6'];

		if (strlen($protocolo) == 0) {
			return ('');
		}
		if ($page == '1') {
			/* Titulo e Titulo em Inglês */
			$sql = "update semic_trabalho set
								sm_titulo = '$dd1', 
								sm_titulo_en = '$dd2'
								where sm_codigo = '$protocolo' ";
			$rlt = $this -> db -> query($sql);
			return (1);
		}
		/* Page 2 */
		if ($page == '2') {
			echo "PAGE2";
			return (1);
		}

		/* Page 3 */
		if ($page == '3') {
			$dd1 = troca($dd1, "'", "´");
			$dd2 = troca($dd2, "'", "´");
			$dd3 = troca($dd3, "'", "´");
			$dd4 = troca($dd4, "'", "´");
			$dd5 = troca($dd5, "'", "´");
			$dd6 = troca($dd6, "'", "´");

			/* Titulo e Titulo em Inglês */
			$sql = "update semic_trabalho set
								sm_rem_01 = '$dd1',
								sm_rem_02 = '$dd2',
								sm_rem_03 = '$dd3',
								sm_rem_04 = '$dd4',
								sm_rem_05 = '$dd5',								 
								sm_rem_06 = '$dd6'
								where sm_codigo = '$protocolo' ";
			$rlt = $this -> db -> query($sql);
			return (1);
		}

		/* Page 4 */
		if ($page == '4') {
			$dd1 = troca($dd1, "'", "´");
			$dd2 = troca($dd2, "'", "´");
			$dd3 = troca($dd3, "'", "´");
			$dd4 = troca($dd4, "'", "´");
			$dd5 = troca($dd5, "'", "´");
			$dd6 = troca($dd6, "'", "´");

			/* Titulo e Titulo em Inglês */
			$sql = "update semic_trabalho set
								sm_rem_11 = '$dd1',
								sm_rem_12 = '$dd2',
								sm_rem_13 = '$dd3',
								sm_rem_14 = '$dd4',
								sm_rem_15 = '$dd5',								 
								sm_rem_16 = '$dd6'
								where sm_codigo = '$protocolo' ";
			$rlt = $this -> db -> query($sql);
			return (1);
		}

		/* page 5 */
		if ($page == '5') {
			/* Titulo e Titulo em Inglês */
			$sql = "update semic_trabalho set
								sm_trava = '1',
								sm_status = 'A'
								where sm_codigo = '$protocolo' ";
			$rlt = $this -> db -> query($sql);
			return (1);
			exit ;
		}
	}

	function le_resumo($protocolo = '') {
		/* Ver RESUMO */
		$sql = "select * from semic_trabalho where sm_codigo = '$protocolo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			return ( array());
		} else {
			$line = $rlt[0];
			return ($line);
		}
	}

	function resumo_remove_autor($id) {
		$sql = "update semic_trabalho_autor set sma_ativo = 0 where id_sma = " . round($id);
		$this -> db -> query($sql);
		return ('');
	}

	function resumo_inserir_autor($protocolo, $nome, $tipo, $instituicao, $lock = 1) {
		$sql = "select * from semic_trabalho_autor 
						where sma_protocolo = '$protocolo' 
							and sma_nome = '$nome' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$sql = "insert into semic_trabalho_autor
					(
					sma_protocolo, sma_nome, sma_funcao, 
					sma_instituicao, sma_ativo, sma_titulacao
					) values (
					'$protocolo','$nome','$tipo',
					'$instituicao','$lock','') ";
			$rlt = $this -> db -> query($sql);
		} else {
			return ('Nome já foi inserido!');
		}
	}

	function resumo_postado_inserir_autores($rs) {
		$line = $rs;
		$professor = $line['ic_cracha_prof'];
		$estudante = $line['ic_cracha_aluno'];
		$protocolo = $rs['ic_plano_aluno_codigo'];

		/* Bloquear edicao */
		$lock = 2;

		/* Estudante */
		$estu = $this -> usuarios -> le_cracha($estudante);
		$instituicao = trim($estu['ies_sigla']);
		$nome = trim($estu['us_nome']);
		$this -> resumo_inserir_autor($protocolo, $nome, '0', $instituicao, $lock);

		/* Professor */
		$prof = $this -> usuarios -> le_cracha($professor);
		$instituicao = trim($prof['ies_sigla']);
		$nome = trim($prof['us_nome']);

		$this -> resumo_inserir_autor($protocolo, $nome, '9', $instituicao, $lock);
		return ('');
	}

	function resumo_postado($id) {
		$this -> load -> model("ics");

		$rs = $this -> ics -> le($id);

		$protocolo = $rs['ic_plano_aluno_codigo'];

		/* Ver RESUMO */
		$sql = "select * from semic_trabalho where sm_codigo = '$protocolo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			$line = $rs;
			$titulo = trim($rs['ic_projeto_professor_titulo']);
			$data = date("Ymd");
			$professor = $line['ic_cracha_prof'];
			$aluno = $line['ic_cracha_aluno'];
			$edital = $line['mb_tipo'];
			$ano = $line['ic_ano'];
			/* Insere reumo */
			$sql = "insert into semic_trabalho
							(
							sm_codigo, sm_titulo, sm_titulo_en,
							sm_programa, sm_status, sm_curso,
							sm_docente, sm_discente, sm_colaboradores,
							sm_autores, sm_edital, sm_ano,
							sm_lastupdate, sm_resumo_01, sm_resumo_02,
							sm_rem_01, sm_rem_02, sm_rem_03, sm_rem_04, sm_rem_05, sm_rem_06,
							sm_rem_11, sm_rem_12, sm_rem_13, sm_rem_14, sm_rem_15, sm_rem_16,
							sm_trava							
							) values (
							'$protocolo','$titulo','',
							'','@','',
							'$professor','$aluno','',
							'','$edital','$ano',
							'$data','','',
							'','','','','','',
							'','','','','','',
							'1'
							)
					 ";
			$this -> db -> query($sql);
			/* Cadastro automático do estudante e orientador */
			$this -> resumo_postado_inserir_autores($rs);
		}
		return (0);
	}

	function resumo($ano = '') {
		if (strlen($ano) == 0) {
			$ano = date("Y");
			if (date("m") < 7) { $ano = (date("Y") - 1);
			}
		}

		$sql = "select count(*) as total, mb_tipo, mb_fomento from ic
            			inner join ic_aluno as pa on ic_id = id_ic
						left join ic_situacao on id_s = s_id
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						where ic_ano = '$ano' and (icas_id = 1) 
            	group by mb_fomento, mb_tipo";

		$rlt = db_query($sql);
		$t = array();
		$ed = array();
		while ($line = db_read($rlt)) {
			$edital = $line['mb_tipo'];
			$fomento = $line['mb_fomento'];
			$total = $line['total'];

			if (isset($ed[$edital])) {
				$ed[$edital] = $ed[$edital] + $total;
			} else {
				$ed[$edital] = $total;
			}
			if (isset($t[$edital][$fomento])) {
				$t[$edital][$fomento] = $t[$edital][$fomento] + $total;
			} else {
				$t[$edital][$fomento] = $total;
			}

			$t[$edital][$fomento] = $total;
		}

		$sx = '<table width="100%" class="lt1 border1 radius10">
					<tr><td colspan=2 align="left" class="lt6 borderb1"><b>' . msg('resumo') . '</b><br><font class="lt0">orintações ativas</td></tr>
					<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibic.png') . '" height="40"></td><td class="lt6">' . $ed['PIBIC'] . '</td></tr>';
		$v = $t['PIBIC'];
		foreach ($v as $key => $value) {
			$sx .= '<tr><td align="right">' . $key . '</td><td class="lt3">' . $value . '</td></tr>' . cr();
		}

		$sx .= '<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibiti.png') . '" height="40"></td><td class="lt6">' . $ed['PIBITI'] . '</td></tr>';
		$v = $t['PIBITI'];
		foreach ($v as $key => $value) {
			$sx .= '<tr><td align="right">' . $key . '</td><td class="lt3">' . $value . '</td></tr>' . cr();
		}

		$sx .= '<tr><td align="right" class="borderb1">Total de estudantes de graduação</td><td class="lt5 borderb1">' . ($ed['PIBIC'] + $ed['PIBITI']) . '</td></tr>';

		$sx .= '<tr><td>&nbsp;</td></tr>';

		$sx .= '<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibicem.png') . '" height="40"></td><td class="lt6">' . $ed['PIBICEM'] . '</td></tr>';

		$v = $t['PIBICEM'];
		foreach ($v as $key => $value) {
			$sx .= '<tr><td align="right">' . $key . '</td><td class="lt3">' . $value . '</td></tr>' . cr();
		}

		$sx .= '</table>';
		return ($sx);
	}

	function le($id = 0) {
		$sql = $this -> table_view('ic.id_ic = ' . $id, $offset = 0, $limit = 9999999, 'ic_ano, id_ica desc');
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['logo'] = $this -> logo_modalidade($edital);

			$ida = $line['mb_id'];
			if ($ida == 0) {
				$link_a = '<A href="' . base_url('index.php/ic/ativar_plano/' . $id . '/' . checkpost_link($id)) . '">' . msg('ativar_plano') . '</a>';
				$line['ic_ativar'] = $link_a;
			} else {
				$line['ic_ativar'] = '';
			}
			return ($line);
		}
	}

	function le_protocolo($id = 0) {
		$sql = $this -> table_view("ic.ic_plano_aluno_codigo = '" . $id . "'", $offset = 0, $limit = 9999999);
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$id = $line['id_ic'];
			$line = $this -> le($id);
			return ($line);
		} else {
			return ( array());
		}
	}

	function le_plano_submit($id = '') {
		$sql = "select * from ic_submissao_plano where doc_protocolo = '$id' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}

	function le_protocolo_cancelado($id = 0) {
		$sql = $this -> table_view("ic.ic_plano_aluno_codigo = '" . $id . "' and s_id = 2", $offset = 0, $limit = 9999999);
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['logo'] = $this -> logo_modalidade($edital);

			$ida = $line['mb_id'];
			if ($ida == 0) {
				$link_a = '<A href="' . base_url('index.php/ic/ativar_plano/' . $id . '/' . checkpost_link($id)) . '">' . msg('ativar_plano') . '</a>';
				$line['ic_ativar'] = $link_a;
			} else {
				$line['ic_ativar'] = '';
			}
			return ($line);
		}
	}

	function le_form_prof($plano = 0) {
		$sql = "select * from ic_acompanhamento" . " 
					where pa_protocolo = '" . $plano . "'";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);
	}

	function lista_ic_professor($id) {
		$wh = "prof_id = " . round($id);
		$sql = $this -> table_view($wh);
		$rlt = db_query($sql);

		$sx = '<table width="100%" class="tabela00">';
		while ($line = db_read($rlt)) {
			$sx .= $this -> show_med($line);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function logo_modalidade($edital) {
		switch ($edital) {
			case 'ICI' :
				$img = base_url('img/logo/logo_ic_internacional.png');
				break;
			case 'PIBIC' :
				$img = base_url('img/logo/logo_ic_pibic.png');
				break;
			case 'PIBITI' :
				$img = base_url('img/logo/logo_ic_pibiti.png');
				break;
			case 'PIBICEM' :
				$img = base_url('img/logo/logo_ic_pibic_em.png');
				break;
			case 'SENAI' :
				$img = base_url('img/logo/logo_ic_senai.png');
				break;
			case 'PIBEP' :
				$img = base_url('img/logo/logo_ic_pibep.png');
				break;				
			default :
				$img = base_url('img/logo/logo_ic_semimagem.png');
				break;
		}
		return ($img);
	}

	function show_med($line) {
		$edital = trim($line['mb_tipo']);
		$img = $this -> logo_modalidade($edital);
		/* Link do protocolo */
		$link = '<a href="' . base_url('index.php/ic/view/' . $line['id_ic'] . '/' . checkpost_link($line['id_ic'])) . '" class="link lt2">';

		/* Imagem bolsa */
		$img_bolsa = 'logo_bolsa_' . $line['id_mb'] . '.jpg';
		$img_bolsa = '<img src="' . base_url('img/icon/' . $img_bolsa) . '" height="15" style="border: 1px solid #ccc;">';

		$sx = '';
		$sx .= '<tr valign="top">';
		$sx .= '<td width="100" rowspan=5 style="border-top:1px solid #333;">';
		$sx .= '<img src="' . $img . '" height="50">';
		$sx .= '</td>';
		$sx .= '<td class="lt2" colspan=2  style="border-top:1px solid #333;">';
		$sx .= $link;
		$sx .= $line['ic_projeto_professor_titulo'];
		$sx .= '</a>';
		$sx .= '</td>';

		$sx .= '<td width="100" rowspan=5  style="border-top:1px solid #333;" align="center">';
		$sx .= $link . $line['ic_plano_aluno_codigo'] . '</A>';
		$sx .= '<BR><BR>';
		$sx .= '<font color="' . trim($line['s_cor']) . '"><B>';
		$sx .= $line['s_situacao'];
		$sx .= '</b></font>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Orientador') . ':</td>';
		$sx .= '<td class="lt1"><B>' . $line['pf_nome'] . '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Estudante') . ':</td>';
		$sx .= '<td class="lt1"><B>' . $line['al_nome'] . '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Vigencia') . ': ';
		$sx .= '</td>';
		$sx .= '<td class="lt1">';
		$sx .= '<B>';
		$sx .= stodbr($line['aic_dt_entrada']);
		$sx .= ' até ';
		$sx .= stodbr($line['aic_dt_saida']);
		$sx .= '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">';
		$sx .= msg('Modalidade') . ': ';
		$sx .= '</td>';
		$sx .= '<td class="lt1" valign="top">';
		$sx .= $img_bolsa;
		$sx .= '&nbsp;';
		$sx .= $line['mb_descricao'];
		$sx .= '</td>';

		$sx .= '</tr>';
		return ($sx);
	}

	function table_row() {
		$tabela = "ic";
		return ($tabela);
	}

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
		$us_id = $obj['prof_id'];

		/*********************************/
		/* Lancar historico              */
		$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

		/*****************************************/
		/* Cancelar iniciacao na tabela ic       */
		/* Cancelar iniciacao na tabela ic_aluno */
		$this -> ics -> cancelar_protocolo($proto);

		/****************************************/
		/* Enviar e-mail de cancelamento        */
		$data = $this -> ics -> le_protocolo($proto);

		$txt = $this -> load -> view('ic/plano-email', $data, true);
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
		enviaremail_usuario($us_id, 'Cancelamento de orientação', $txt, 2);

		return (1);
	}

	function protocolo_alterar_bolsa($obj) {
		/*  Acoes ******************************************************************************
		 ***************************************************************************************
		 */
		$sql = "select * from ic_modalidade_bolsa where id_mb = " . $obj['pr_ica'];
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];

		$proto = $obj['pr_protocolo_original'];
		$ac = '999';
		$hist = 'Troca da modalidade de bolsa';
		$aluno1 = '';
		$aluno2 = '';
		$motivo = '980';
		$obs = 'Troca da modalidade da bolsa: <b>' . mst($obj['mb_descricao']) . '</b>';
		$obs .= '<br>Para: <b>' . mst($line['mb_descricao']) . '</b>';
		$obs .= '<br>Justificativa:' . $obj['pr_justificativa'];
		$us_id = $obj['prof_id'];

		/*********************************/
		/* Lancar historico              */
		$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

		/*****************************************/
		/* Cancelar iniciacao na tabela ic       */
		/* Cancelar iniciacao na tabela ic_aluno */
		$this -> ics -> finaliza_protocolo($proto);
		//$this -> ics -> alterar_modalidade_protocolo($proto,$obj['pr_ica']);
		$id = $obj['ic_id'];
		$ida = $obj['aluno_id'];
		$cracha = $obj['ic_aluno_cracha'];
		$d1 = date("Y-m-d");
		$d2 = '0000-00-00';
		$d3 = date("Y-m-d");
		$d4 = '0000-00-00';
		$tipo = $obj['pr_ica'];
		$situacao = 1;
		$this -> ics -> ativar_bolsa($id, $ida, $cracha, $d1, $d2, $d3, $d4, $tipo, $situacao);

		/****************************************/
		/* Enviar e-mail de cancelamento        */
		$data = $this -> ics -> le_protocolo($proto);

		$txt = $this -> load -> view('ic/plano-email', $data, true);
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo', $data, true);
		enviaremail_usuario($us_id, 'Troca de Modalidade de Bolsa', $txt, 2);

		return (1);
	}

	function protocolo_RET($obj) {
		/*  Acoes ******************************************************************************
		 ***************************************************************************************
		 */
		$proto = $obj['pr_protocolo_original'];
		$ac = '990';
		$hist = 'Reativação do plano do aluno';
		$aluno1 = '';
		$aluno2 = '';
		$motivo = '000';
		$obs = 'Reativação de orientação: <b>' . mst($obj['pr_descricao']) . '</b>';
		$obs .= '<br>Justificativa:' . $obj['pr_justificativa'];
		$us_id = $obj['prof_id'];

		/*********************************/
		/* Lancar historico              */
		$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);

		/*****************************************/
		/* Cancelar iniciacao na tabela ic       */
		/* Cancelar iniciacao na tabela ic_aluno */
		$this -> ics -> reativar_protocolo($proto, $obj['pr_ica']);

		/****************************************/
		/* Enviar e-mail de cancelamento        */
		$data = $this -> ics -> le_protocolo($proto);

		$txt = $this -> load -> view('ic/plano-email', $data, true);
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
		enviaremail_usuario($us_id, 'Cancelamento de orientação', $txt, 2);

		return (1);
	}

	function projeto_unificar($proto1, $proto2) {
		$sql = "select * from " . $this -> tabela_planos . " where doc_protocolo_mae = '$proto2' and doc_status <> 'X' and doc_status <> '@' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sql = "update " . $this -> tabela_planos . " set doc_protocolo_mae = '$proto1' where id_doc = " . $line['id_doc'];
			$xrlt = $this -> db -> query($sql);
			echo '.';
		}
		$sql = "update " . $this -> tabela_projetos . " set pj_status = 'X' where pj_codigo = '$proto2' ";
		$xrlt = $this -> db -> query($sql);

		$ac = '993';
		$motivo = '993';
		$hist = 'Unificado o protocolo ' . $proto2 . ' junto com protocolo ' . $proto1;
		$aluno1 = 0;
		$aluno2 = 0;
		$motivo = '';
		$obs = '';
		$this -> inserir_historico($proto2, $ac, $hist, $aluno1, $aluno2, $motivo, $obs = '');
		$this -> inserir_historico($proto1, $ac, $hist, $aluno1, $aluno2, $motivo, $obs = '');
		return ('');
	}

	function busca_projetos_mesmo_titulo($proto) {
		$sql = "select * from " . $this -> tabela_projetos . " where pj_codigo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$title = $line['pj_titulo'];
			$ano = $line['pj_ano'];
			$edital = $line['pj_edital'];

			$sql = "select pj_codigo, planos from " . $this -> tabela_projetos . "
							left join (select count(*) as planos, doc_protocolo_mae 
									from " . $this -> tabela_planos . " 
									where (doc_status <> '@' and doc_status <> 'X') 
									group by doc_protocolo_mae ) as planos on doc_protocolo_mae = pj_codigo 
							where pj_codigo <> '$proto' and
								pj_titulo = '$title' AND
								pj_ano = '$ano' AND
								pj_status <> 'X' AND pj_status <> '@' AND
								pj_edital = '$edital'";
			$xrlt = $this -> db -> query($sql);
			$xrlt = $xrlt -> result_array();

			$sx = '<form method="post">';
			$sx .= '<div>' . $title . '</div><br>';
			for ($r = 0; $r < count($xrlt); $r++) {
				$line = $xrlt[$r];
				$readonly = '';
				if ($line['planos'] < 2) {
					$sx .= '<input type="radio" name="dd2" value="' . $line['pj_codigo'] . '" ' . $readonly . '>Unificar com o protolo ' . $line['pj_codigo'] . ' (' . $line['planos'] . ' Planos)<br>';
				}

			}
			$sx .= '<br><input type="submit" name="acao" value="' . msg('btn_unificar') . '"><br>';
			$sx .= '</form>';
			return ($sx);
		}
	}

	function le_projeto_protocolo($proto) {
		$sql = "select *, 
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					prof.us_nome as pf_nome, prof.id_us as id_pf, ac_texto
				FROM " . $this -> tabela_projetos . "
					LEFT JOIN us_usuario as prof  on prof.us_cracha = pj_professor
					LEFT JOIN us_usuario as aluno on aluno.us_cracha = pj_aluno
					LEFT JOIN area_conhecimento ON pj_area = ac_cnpq
					LEFT JOIN ic_submissao_situacao on pj_status = ssi_status  
				where pj_codigo = '" . $proto . "'";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$rlt = $rlt[0];
		} else {
			$rlt = array();
		}
		return ($rlt);
	}

	function le_projeto($id) {
		$sql = "select *, 
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					prof.us_nome as pf_nome, prof.id_us as id_pf
				FROM " . $this -> tabela_projetos . "
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

	function cp_subm_01() {
		$cp = array();
		array_push($cp, array('$H8', 'id_pj', '', False, True));

		$txt = '<b>Instruções para o Orientador</b><br>
				- Professor orientador com título de doutor pode submeter no máximo quatro planos de trabalho de estudantes de graduação, vinculados a um ou mais projetos de pesquisa.<br>
				- Professor orientador com título de mestre pode submeter no máximo dois planos de trabalho de estudantes de graduação, vinculados a um ou dois projetos de pesquisa.<br>
				- Cada doutor pode orientar no máximo quatro estudantes de graduação sendo até dois deles com bolsa, já o mestre pode orientar no máximo dois estudantes de graduação e receber até duas bolsas.<br>
				- Cada doutorando poderá submeter um projeto de pesquisa com um plano de trabalho e estudante de graduação (PIBIC ou PIBITI) e um plano de trabalho de estudante de ensino médio.<br>
				- Cada pós-doutorando pode orientar no máximo dois estudantes de graduação e receber até duas bolsas e dois estudantes de ensino-médio.<br>
				<br><br>
				';
		array_push($cp, array('$M', '', ($txt), False, True));

		array_push($cp, array('$T80:5', 'pj_titulo', msg('titulo_pesquisa'), True, True));

		$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where not (ac_cnpq like '9%') and ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
		array_push($cp, array('$Q ac_cnpq:ac_nome_area:' . $sql, 'pj_area', msg('area_conhecimento'), True, True));

		$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where (ac_cnpq like '9%') and ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
		array_push($cp, array('$Q ac_cnpq:ac_nome_area:' . $sql, 'pj_area_estra', msg('area_estrategica'), True, True));

		array_push($cp, array('${', '', 'Projeto aprovado externamente', False, True));
		array_push($cp, array('$O 0:Não&1:SIM', 'pj_ext_sn', msg('projeto aprovado externamente'), True, True));
		array_push($cp, array('$T80:3', 'pj_ext_local', 'Descreva a agência de fomento, o montante dos recursos e o vinculo com o projeto de pesquisa (caso aprovado externamente)', False, True));

		array_push($cp, array('$}', '', 'Projeto aprovado externamente', False, True));

		array_push($cp, array('${', '', 'Comitês de Ética em Pesquisa', False, True));
		$op = '1:Não aplicável (não envolve seres humanos)';
		$op .= '&2:Em submissão (deve-se apresentar a parecer até Novembro de ' . date("Y") . ')';
		$op .= '&3:Já aprovado (anexar o parecer do Comitê de Éticas nos Documentos)';
		array_push($cp, array('$R ' . $op, 'pj_cep_status', 'Comitê de Ética em Pesquisa com Humanos (CEP)', False, True));

		$op = '1:Não aplicável (não envolve animais)';
		$op .= '&2:Em submissão (deve-se apresentar a parecer até Novembro de ' . date("Y") . ')';
		$op .= '&3:Já aprovado (anexar o parecer do Comitê de Éticas nos Documentos)';
		array_push($cp, array('$R ' . $op, 'pj_ceua_status', 'Comitê de Ética no Uso de Animais (CEUA)', False, True));
		array_push($cp, array('$}', '', 'Comitês de Ética em Pesquisa', False, True));

		array_push($cp, array('$U8', 'pj_update', '', False, True));

		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		//pj_area_estrapj_area
		return ($cp);
	}

	function cp_subm_02($id = 0) {
		$cp = array();
		$idp = '2' . strzero($id, 6);

		$data = $this -> le_projeto($id);

		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));

		$txt = '<b>Documentos obrigatórios para submissão do Projeto de Pesquisa:</b><br><br>
						- O projeto de pesquisa (todos os casos)</br>
						- Carta de ciência do orientador. (para Doutorandos)</br>
						- Documento de aprovação da Agências de Fomento (para projetos aprovados externamente)</br>
						- <font color="red">Os Planos dos Alunos devem ser submetidos na Aba 3</font><br>
						';

		array_push($cp, array('$M', '', ($txt), False, True));

		array_push($cp, array('${', '', msg('list_arquivos'), False, True));
		$this -> geds -> tabela = 'ic_ged_documento';
		$txt = $this -> geds -> list_files_table($idp, 'ic');
		$txt .= '<input type="button" onclick="newwin(\'' . base_url('index.php/ic/ged/' . $idp) . '/PROJ\',600,400);" value="enviar arquivo do projeto de pesquisa >>>">';

		/* Botao de projeto externo */
		if ($data['pj_ext_sn'] == '1') {
			$txt .= '<br><br>';
			$txt .= '<input type="button" onclick="newwin(\'' . base_url('index.php/ic/ged/' . $idp) . '/APAGE\',600,400);" value="enviar arquivo de aprocação externa >>>">';
		}

		/* Botao de comite de ética CEP */
		if ($data['pj_cep_status'] == '3') {
			$txt .= '<br><br>';
			$txt .= '<input type="button" onclick="newwin(\'' . base_url('index.php/ic/ged/' . $idp) . '/CEP\',600,400);" value="enviar arquivo do parecer do CEP >>>">';
		}

		/* Botao de comite de ética CEUA */
		if ($data['pj_ceua_status'] == '3') {

			$txt .= '<br><br>';
			$txt .= '<input type="button" onclick="newwin(\'' . base_url('index.php/ic/ged/' . $idp) . '/CEU\',600,400);" value="enviar arquivo do parecer do CEUA >>>">';
		}

		array_push($cp, array('$M', '', $txt, false, true));
		array_push($cp, array('$}', '', msg('files'), False, True));

		//pj_area_estrapj_area
		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		return ($cp);
	}

	function cp_subm_03($id = 0, $tipo = '') {
		$this -> load -> model('geds');
		$this -> load -> model('usuarios');
		$this -> load -> model('Stricto_sensus');

		$cracha = $_SESSION['cracha'];
		$user = $this -> usuarios -> le_cracha($cracha);

		/********* Estudante de Doutorado ***************/
		if ($tipo != 2) {
			$user['usuario_tipo_ust_id'] = $this -> Stricto_sensus -> is_phd_student($cracha);
		}

		$cp = array();
		$txt = '';
		$idp = '2' . strzero($id, 6);
		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));

		$txt = '<b>Planos de Trabalho do Estudante</b><br><br>';
		array_push($cp, array('$M', '', ($txt), False, True));

		$data = array();
		$nrplano = 0;
		$data = array_merge($data, $user);
		/********* BOTAO ***************************************************************/
		$data['doc_protocolo_mae'] = $idp;
		$data['resumo_planos'] = $this -> ics -> submissao_planos_cadastrados($idp, $cracha);

		$txt = $this -> load -> view('ic/plano_submit_insert', $data, true);
		array_push($cp, array('$M', '', ($txt), False, True));

		/**************************** PLANOS ************/
		$sql = "select * from ic_submissao_plano
					left join us_usuario on doc_aluno = us_cracha
					 WHERE doc_protocolo_mae = '$idp'
					 AND doc_status <> 'X' 
					 order by doc_edital, doc_protocolo 
					  ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$data = $rlt[$r];
			$nrplano++;
			$data['nrplano'] = $nrplano;
			$data['id'] = $id;
			$data['tipo'] = $tipo;

			$this -> geds -> tabela = 'ic_ged_documento';
			$pag = 'ic';
			$data['arquivos'] = $this -> geds -> list_files_table($data['doc_protocolo'], $pag);
			if (strlen($data['arquivos']) == 0) {
				$data['arquivos'] = '<img src="' . base_url('img/icon/icone_exclamation.png') . '" height="50" align="left"><font class="lt2" color="red">Não foram postados arquivos para este plano</font>';
			}

			$data['arquivos_submit'] = '
					<input type="button" id="ged_upload_' . $data['doc_protocolo'] . '" value="enviar plano aluno >>>">
					<script>
					$("#ged_upload_' . $data['doc_protocolo'] . '").click(function() {
						var $tela = newwin("' . base_url('index.php/ic/ged/' . $data['doc_protocolo']) . '/PLANO",600,400);
					});
					</script>';

			/* se PIBITI */
			if ($data['doc_edital'] == 'PIBITI') {
				$data['arquivos_submit'] .= '
					<input type="button" id="ged_upload_' . $data['doc_protocolo'] . 'b" value="enviar questionário PIBITI >>>">
					<script>
					$("#ged_upload_' . $data['doc_protocolo'] . 'b").click(function() {
						var $tela = newwin("' . base_url('index.php/ic/ged/' . $data['doc_protocolo']) . '/QUEST",600,400);
					});
					</script>';
			}

			$txt = $this -> load -> view('ic/plano_submit', $data, true);
			array_push($cp, array('$M', '', ($txt), False, True));
		}

		/************************************************************* INCLUIR NOVO PLANO **/
		$data['dd20'] = get("dd20");
		$data['dd30'] = get("dd30");
		$data['dd31'] = $this -> usuarios -> limpa_cracha(get("dd31"));
		$data['dd32'] = get("dd32");
		$data['dd33'] = get("dd33");
		$data['dd34'] = get("dd34");
		$data['dd35'] = get("dd35");
		$ttt = '';

		if (($data['dd20'] == '1') and (strlen($data['dd30']) > 2) and (strlen($data['dd31']) > 0) and (strlen($data['dd33']) > 0)) {
			$protocolo_mae = $idp;
			$titulo = get("dd30");
			$aluno = $this -> usuarios -> limpa_cracha(get("dd31"));
			$escola_publica = get("dd32");
			$modalidade = get("dd33");

			$ok = $this -> ics -> insere_plano_submissao($protocolo_mae, $titulo, $aluno, $escola_publica, $modalidade);
			if ($ok == 1) {
				redirect(base_url('index.php/ic/submit_edit/IC/' . $id . '/' . checkpost_link($id) . '/3'));
			} else {
				if ($ok == -2) {
					$ttt = '<script> alert("Aluno já está inserido em outro plano de trabalho"); </script>';
				}
				if ($ok == -1) {
					$ttt = '<script> alert("Já existe um Plano de Trabalho com este nome"); </script>';
				}
			}
		}

		$btn = msg('bt_salvar_continuar');
		$valided = '';
		if (get("acao") == $btn) {
			$valided = '1';
		}
		array_push($cp, array('$HV', '', $valided, False, True));

		//pj_area_estrapj_area
		array_push($cp, array('$M', '', '<br>' . $ttt . '<br>', False, True));
		array_push($cp, array('$B8', '', $btn, False, True));
		return ($cp);
	}

	function altera_status_projeto_submissao($proto, $sta, $sta_to) {
		$sql = "update " . $this -> tabela_projetos . " set pj_status = '$sta_to' where pj_codigo = '$proto'; ";
		$this -> db -> query($sql);

		//echo '<br>'.$sql;
		$sql = "update " . $this -> tabela_planos . " set doc_status = '$sta_to' where doc_protocolo_mae = '$proto' and doc_status = '$sta' ";
		$this -> db -> query($sql);
		//echo '<br>'.$sql;
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
			$sx .= $line['pj_titulo'];
			$sx .= '</td>';

			$sx .= '<td align="center" class="border1">';
			$sx .= $line['pj_edital'];
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

	function submit_resumo($ano, $edital) {
		$edital = uppercasesql($edital);
		$sql = "select count(*) as total, pj_status from " . $this -> tabela_projetos . " 
					WHERE pj_edital = '$edital' and pj_ano = '$ano' 
					group BY pj_status
					ORDER BY pj_status";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sa = '';
		$sb = '';
		$sx = '';
		if (count($rlt) > 0) {
			$sz = round(100 / count($rlt));
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$sta = $line['pj_status'];
				if ($sta == '@') { $sta = '0';
				}
				$link = '<a href="' . base_url('index.php/ic/submit_mostrar_status/' . $sta) . '" class="link lt6">';
				$sa .= '<td align="center" width="' . $sz . '%">' . msg('situacao_' . $line['pj_status']) . '</td>';
				$sb .= '<td align="center" width="' . $sz . '%" class="border1">' . $link . $line['total'] . '</a>' . '</td>';
			}
			$sx = '<table width="100%" class="border1">';
			$sx .= '<tr class="lt0">' . $sa . '</tr>';
			$sx .= '<tr class="lt6">' . $sb . '</tr>';
			$sx .= '</table>';
		}
		return ($sx);
	}

	function submit_lista_projetos($ano, $edital, $status) {
		$sql = "select * from " . $this -> tabela_projetos . " 
					INNER JOIN us_usuario on pj_professor = us_cracha
					where pj_status = '$status' and pj_ano = '$ano' and pj_edital = '$edital'
					order by pj_codigo
			";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela01 lt1">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['nr'] = ($r + 1);
			$sx .= $this -> load -> view('ic/projeto_row', $line, true);
		}
		$sx .= '</table>';
		return ($sx);

	}

	function projeto_xacao($pj) {
		$this -> load -> model('Mensagens');
		$this -> load -> model('Usuarios');

		$ac = get("dd1");
		$proto = $pj['pj_codigo'];

		switch ($ac) {
			case '6' :
				/***** VALIDAÇÂO DOCUMENTAL */
				$sta = $pj['pj_status'];
				$sta_to = 'B';
				$ac = '234';
				$motivo = '234';
				$hist = 'Validação dos documentos';
				$aluno1 = 0;
				$aluno2 = 0;
				$motivo = '';
				$obs = '';
				$this -> altera_status_projeto_submissao($proto, $sta, $sta_to);
				$this -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs = '');
				return (1);
				break;

			case '4' :
				/***** CANECLAR SUBMISSAO */
				if (strlen(get("dd2")) == 0) {
					echo alert('campo de comentários é obrigatório');
					return (0);
				}

				/* Recupera mensagem */
				//$txt = $this->Mensagens->busca('PJ_DEVOLVE_PROF',$pj);
				$pj['motivo'] = get('dd2');
				$prof = $this -> usuarios -> le_cracha($pj['pj_professor']);
				$us_id = $prof['id_us'];

				$txt = $this -> Mensagens -> busca('PJ_DEVOLVE_PROF', $pj);

				enviaremail_usuario($us_id, $txt['nw_assunto'], $txt['nw_texto'], $txt['nw_own']);

				$sta = $pj['pj_status'];
				$sta_to = '@';
				$ac = '232';
				$motivo = '232';
				$hist = 'Devolução do projeto e planos para o professor';
				$aluno1 = 0;
				$aluno2 = 0;
				$motivo = '232';
				$obs = get("dd2");
				$this -> altera_status_projeto_submissao($proto, $sta, $sta_to);
				$this -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);
				return (1);
				break;
			case '5' :
				/***** CANECLAR SUBMISSAO */
				if (strlen(get("dd2")) == 0) {
					echo alert('campo de comentários é obrigatório');
					return (0);
				}

				/* Recupera mensagem */
				//$txt = $this->Mensagens->busca('PJ_DEVOLVE_PROF',$pj);
				$pj['motivo'] = get('dd2');
				$prof = $this -> usuarios -> le_cracha($pj['pj_professor']);
				$us_id = $prof['id_us'];

				$txt = $this -> Mensagens -> busca('PJ_CANCELA_PROF', $pj);

				enviaremail_usuario($us_id, $txt['nw_assunto'], $txt['nw_texto'], $txt['nw_own']);

				$sta = $pj['pj_status'];
				$sta_to = 'X';
				$ac = '234';
				$motivo = '234';
				$hist = 'Cancelamento de projeto e planos';
				$aluno1 = 0;
				$aluno2 = 0;
				$motivo = '238';
				$obs = get("dd2");
				$this -> altera_status_projeto_submissao($proto, $sta, $sta_to);
				$this -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);
				return (1);
				break;

			default :
				echo '--->' . $ac;
				break;
		}
	}

	function submit_enviar_email($proto) {
		$this -> load -> model('Mensagens');
		$prj_data = $this -> ics -> le_projeto($proto);
		$proto = '2' . strzero($proto, 6);

		$sx = $this -> load -> view('header/header_email', null, true);
		$sx = '';
		$sx .= '<h1>Submissão de PIBIC/PIBITI</h1>';
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

	function submit_altera_status($proto, $para, $de = '@') {
		if (strlen($proto) != 7) {
			$proto = '2' . strzero($proto, 6);
		}

		$sql = "update ic_submissao_projetos set pj_status = 'A' where pj_codigo = '$proto' ";
		$rrr = $this -> db -> query($sql);

		$sql = "select * from ic_submissao_plano where doc_protocolo_mae = '$proto' and doc_status = '@' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		for ($r = 0; $r < count($rrr); $r++) {
			$line = $rrr[$r];
			$proto_plano = $line['doc_protocolo'];
			$sql = "update ic_ged_documento set doc_status = '$para' where doc_dd0 = '$proto_plano' and doc_status ='$de' ";
			$XXX = $this -> db -> query($sql);
			$sql = "update ic_submissao_plano set doc_status = '$para' where doc_protocolo = '$proto_plano' and doc_status ='$de' ";
			$XXX = $this -> db -> query($sql);
		}
		return (1);
	}

	function incluir_membro_na_equipe($proto, $nome, $cpf, $cracha, $escola, $lock = 0) {
		$sql = "select * from ic_submissao_projetos_equipe where ispe_protocolo = '$proto' and ispe_nome = '$nome' and ispe_ativo = 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			if (strlen($cracha) == 0) {
				$type = "1";
			} else {
				$type = "0";
			}

			/* Inserir */
			$cpf = strzero(sonumero($cpf), 11);
			$sql = "insert into ic_submissao_projetos_equipe
							(
								ispe_tipo_user, ispe_nome, ispe_cracha,
								ispe_protocolo, ispe_curso, ispe_cpf,
								ispe_lock
							)
							values
							(
								'$type','$nome','$cracha',
								'$proto','$escola','$cpf',
								'$lock'
							)";
			$xxx = $this -> db -> query($sql);
		}
	}

	function equipe_membro_excluir($id) {
		$sql = "update ic_submissao_projetos_equipe set ispe_ativo = 0 where id_ispe = " . round($id);
		$this -> db -> query($sql);
	}

	function botao_novo_equipe_projeto($proto) {
		$sx = '<input type="button" value="Incluir membro na equipe >>>" id="novo_estudante">';
		$sx .= '<br>';
		$sx .= '<div id="novo_membro" style="display: none;">';
		$sx .= 'Informe o número do cracha do estudante (Ex: 101882233441): ';
		$sx .= '<input type="string" value="" name="cracha" id="cracha" size="12">';
		$sx .= '<input type="button" value="Incluir >>>" id="novo_acao">';
		$sx .= '</div>';
		$sx .= '
			<script>
				$("#novo_estudante").click(function() {
					$("#novo_membro").toggle();
				});
				$("#novo_acao").click(function() {
					var $cracha = $("#cracha").val();
					$("#cracha").val("");
						var $url = "' . base_url('index.php/ajax/submit_ajax_equipe/' . $proto) . '/" + $cracha;
						$.ajax({
							url : $url,
							type : "post",
							success : function(data) {
								$("#list_team").html(data);
							}
						});					
				});				
			</script>
			';
		return ($sx);
	}

	function botao_novo_equipe_projeto_por_nome($proto) {
		$sx = '<input type="button" value="Incluir membro na equipe >>>" id="novo_estudante">';
		$sx .= '<br>';
		$sx .= '<div id="novo_membro" style="display: none;">';

		$sx .= '<table>';
		$sx .= '<tr><td align="right">Nome completo do estudante: ';
		$sx .= '</td><td><input type="string" value="" name="nome" id="nome" size="90">';

		$sx .= '<tr><td align="right"><br>';

		$sx .= '<tr><td align="right">CPF: ';
		$sx .= '</td><td><input type="string" value="" name="cpf" id="cpf" size="15">';

		$sx .= '<tr><td align="right"><br>';

		$sx .= '<tr><td align="right">E-mail do estudante: ';
		$sx .= '</td><td><input type="string" value="" name="email" id="email" size="50">';

		$sx .= '<tr><td align="right"><br>';

		$sx .= '<tr><td align="right"><input type="button" value="Incluir >>>" id="novo_acao">';
		$sx .= '</table>';
		$sx .= '</div>';
		$sx .= '
			<script>
				$("#novo_estudante").click(function() {
					$("#novo_membro").toggle();
				});
				$("#novo_acao").click(function() {
					var $nome = $("#nome").val();
					var $cpf = $("#cpf").val();
					var $email = $("#email").val();
					$("#cracha").val("");
						var $url = "' . base_url('index.php/ajax/submit_ajax_equipe_nome/' . $proto) . '";
						$.ajax({
							url : $url,
							type : "post",
							data: { name: $nome, cpf: $cpf, email: $email }, 
							success : function(data) {
								$("#list_team").html(data);
							}
						});					
				});				
			</script>
			';
		return ($sx);
	}

	function lider_de_equipe($proto, $user) {
		$cracha = $user['us_cracha'];

		$sql = "select * from ic_submissao_projetos_equipe 
						where ispe_protocolo = '$proto'
							and ispe_ativo = 1 and ispe_cracha = '$cracha'
						order by id_ispe ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			$lock = 1;
			$nome = $user['us_nome'];
			$cpf = $user['us_cpf'];
			$cracha = $user['us_cracha'];
			$escola = $user['us_curso_vinculo'];
			$this -> incluir_membro_na_equipe($proto, $nome, $cpf, $cracha, $escola, $lock);
		}
	}

	function lista_equipe_projeto($proto, $editar = 1) {
		$sx = '';
		$sx .= '<div id="list_team">' . cr();
		$sx .= $this -> lista_equipe_projeto_lista($proto, $editar);
		$sx .= '</div>' . cr();
		$sx .= '
				<script>
				function excluir_aluno($id)
					{
						var $url = "' . base_url('index.php/ajax/submit_ajax_equipe_excluir/' . $proto) . '/" + $id;
						$.ajax({
							url : $url,
							type : "post",
							success : function(data) {
								$("#list_team").html(data);
							}
						});						
					}
				</script>
			';
		return ($sx);
	}

	function lista_equipe_projeto_lista($proto, $editar = 1) {
		$sx = '';
		$sql = "select * from ic_submissao_projetos_equipe 
						where ispe_protocolo = '$proto'
							and ispe_ativo = 1 
						order by id_ispe ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx .= '<table class="table tabela01" width="100%">';
		$sx .= '<tr>';
		$sx .= '<th width="2%">#</th>
					<th width="40%">nome</th>
					<th width="8%">cracha</th>
					<th width="12%">CPF</th>
					<th width="33%">Curso / Escola / E-mail</th>
					<th width="5%">ação</th>
					</tr>
			';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = 'Líder';
			if (($line['ispe_lock'] != '1') and ($editar == 1)) {
				$link = '<span class="link" style="cursor: handle; color: red;" onclick="excluir_aluno(\'' . $line['id_ispe'] . '\');">excluir</span>';
			}
			$sx .= '<tr>';
			$sx .= '<td>' . ($r + 1) . '</td>';
			$sx .= '<td>' . $line['ispe_nome'] . '</td>';
			$sx .= '<td>' . $line['ispe_cracha'] . '</td>';
			$sx .= '<td>' . '<nobr>' . mask_cpf($line['ispe_cpf']) . '</nobr></td>';
			$sx .= '<td>' . $line['ispe_curso'] . '</td>';
			if ($editar == 1) {
				$sx .= '<td align="center">' . $link . '</td>';
			}
			$sx .= '</tr>';
		}
		if (count($rlt) == 0) {
			$sx .= '<tr><td colspan="6"><font color="red">Nenhum membro registrado na equipe</td></tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	/*********************** validacao ****************************************************/
	function valida_entrada($id = '') {
		$idp = '2' . strzero($id, 6);

		$data = $this -> le_projeto($id);

		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$vd = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';

		/* Regra - titulo do professor */
		if (strlen($data['pj_titulo']) > 10) {
			$vd[0] = $ok;
		}
		$sx .= '<tr><td class="border1">Título do projeto - (' . strlen($data['pj_titulo']) . ' caracteres)</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/* Regra - area do conhecimento */
		if ((strlen($data['pj_area']) > 0) and (substr($data['pj_area'], 0, 1) <> '0')) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">Área do conhecimento - (' . ($data['pj_area']) . ')</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/* Regra - area do conhecimento */
		if ((strlen($data['pj_area_estra']) > 0) and (substr($data['pj_area_estra'], 0, 1) <> '0')) {
			$vd[2] = $ok;
		}
		$sx .= '<tr><td class="border1">Área do estratégica - (' . ($data['pj_area_estra']) . ')</td>
						<td class="border1" align="center">' . $vd[2] . '</tr>';

		/* REGRA - arquivos postados */
		$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '2" . strzero($id, 6) . "' and doc_status <> 'X'
					and doc_tipo = 'PROJ' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		if (count($rrr) > 0) {
			$vd[3] = $ok;
		}
		$sx .= '<tr><td class="border1">Arquivos do projeto do professor - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[3] . '</tr>';

		/* projeto aprovado externamente */
		if ($data['pj_ext_sn'] == '1') {
			/* REGRA - arquivos postados */
			$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '2" . strzero($id, 6) . "' and doc_status <> 'X'
					and doc_tipo = 'APAGE' ";
			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();

			if (count($rrr) > 0) {
				$vd[4] = $ok;
			}
			$sx .= '<tr><td class="border1">Arquivos de Aprovação por Orgão de Fomento - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[4] . '</tr>';
		} else {
			/* REGRA - arquivos postados */
			$vd[4] = $ok;
			$sx .= '<tr><td class="border1">Arquivos de Aprovação por Orgão de Fomento - (não aplicado)</td>
						<td class="border1" align="center">' . $ok . '</tr>';
		}

		/* Validação dos Planos */
		/**************************** PLANOS ************/
		$sql = "select * from ic_submissao_plano
					left join us_usuario on doc_aluno = us_cracha
					 WHERE doc_protocolo_mae = '$idp'
					 AND doc_status <> 'X' 
					 order by doc_edital, doc_protocolo 
					  ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$vd[5] = $ok;
		$vd[6] = $ok;

		/******** Total de planos submetidos ***********/
		$total_planos = count($rlt);
		if ($total_planos > 0) {
			$vd[9] = $ok;
		} else {
			$vd[9] = $erro;
		}

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$vds = $ok;
			$sx .= '<tr><td class="border1">Plano do Aluno - ' . $line['doc_protocolo'] . ' - Título</td>
						<td class="border1" align="center">' . $vds . '</tr>';
			$proto = $line['doc_protocolo'];

			/* REGRA - arquivos postados */
			$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . $proto . "' and doc_status <> 'X'
					and doc_tipo = 'PLANO' and doc_ativo = 1 ";

			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();
			$rs = $erro;
			if (count($rrr) > 0) {
				$rs = $ok;
			} else {
				$vd[6] = $erro;
			}
			$sx .= '<tr><td class="border1">Plano do Aluno - ' . $proto . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $rs . '</tr>';

			/* Questionário PIBITI */
			if ($line['doc_edital'] == 'PIBITI') {
				/* REGRA - arquivos postados */
				$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . $proto . "' and doc_status <> 'X'
					and doc_tipo = 'QUEST' and doc_ativo = 1 ";

				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();
				$rs = $erro;
				if (count($rrr) > 0) {
					$rs = $ok;
				} else {
					$vd[6] = $erro;
				}

				$sx .= '<tr><td class="border1">Questionário PIBITI - ' . $proto . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $rs . '</tr>';
			}
		}

		/********************************** ComitÊ de ética CEUA **********************************/
		$cep = $data['pj_ceua_status'];
		$sf = '';
		if (strlen($cep) == 0) {
			$sx .= '<tr><td class="border1">Situação do Comitê de Ética CEUA - <font color="red">Não informado</font></td>
						<td class="border1" align="center">' . $erro . '</tr>';
		} else {
			/* parecer parovado */
			if ($cep == 3) {
				/* REGRA - arquivos postados */
				$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . $idp . "' and doc_status <> 'X'
					and doc_tipo = 'CEU' and doc_ativo = 1 ";

				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();
				$rs = $erro;
				if (count($rrr) > 0) {
					$vd[7] = $ok;
				} else {
					$sf = '<tr><td class="border1">Parecer do Comitê de Ética - CEUA - <font color="red">Não postado</td>
						<td class="border1" align="center">' . $erro . '</tr>';
					$vd[7] = $erro;
				}
			} else {
				$vd[7] = $ok;

			}
			$sx .= '<tr><td class="border1">Situação do Comitê de Ética (CEUA) </td>
						<td class="border1" align="center">' . $vd[7] . '</tr>';
			$sx .= $sf;
		}
		/********************************** ComitÊ de ética **********************************/
		$cep = $data['pj_cep_status'];
		$sf = '';
		if (strlen($cep) == 0) {
			$sx .= '<tr><td class="border1">Situação do Comitê de Ética CEP<font color="red">Não informado</font></td>
						<td class="border1" align="center">' . $erro . '</tr>';
		} else {
			/* parecer parovado */
			if ($cep == 3) {
				/* REGRA - arquivos postados */
				$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . $idp . "' and doc_status <> 'X'
					and doc_tipo = 'CEP' and doc_ativo = 1 ";

				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();
				$rs = $erro;
				if (count($rrr) > 0) {
					$vd[8] = $ok;
				} else {
					$sf = '<tr><td class="border1">Parecer do Comitê de Ética - CEP - <font color="red">Não postado</td>
						<td class="border1" align="center">' . $erro . '</tr>';
					$vd[8] = $erro;
				}
			} else {
				$vd[8] = $ok;

			}
			$sx .= '<tr><td class="border1">Situação do Comitê de Ética (CEP) </td>
						<td class="border1" align="center">' . $vd[8] . '</tr>';
			$sx .= $sf;
		}
		/********************************** Total de Planos **********************************/

		$sx .= '<tr><td class="border1">Total de Planos submetidos - ' . $total_planos . '</td>
		<td class="border1" align="center">' . $vd[9] . '</tr>';

		$ok = 1;
		$cps = 9;
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
		$idp = '1' . strzero($id, 6);
		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));
		array_push($cp, array('$M', '', $sx, False, True));
		if ($ok == 1) {
			array_push($cp, array('$C', '', 'Concordo em enviar o projeto para análise!', True, True));
		} else {
			array_push($cp, array('$H', '', '', True, True));
		}

		return ($cp);
	}

	function submissao_planos_cadastrados($idp = '', $author = '') {
		$ano = date("Y");
		/**************************** PLANOS ************/
		$sql = "select count(*) as total, doc_edital, doc_protocolo_mae from ic_submissao_plano
					left join ic_submissao_projetos on pj_codigo = doc_protocolo_mae
					 WHERE pj_professor = '$author' and doc_ano = '$ano'
					 AND doc_status <> 'X' 
				GROUP BY doc_edital, doc_protocolo_mae  ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		return ($rlt);
	}

	function cancela_plano($id) {
		$sql = "update ic_submissao_plano set doc_status = 'X' where id_doc = " . round($id);
		$this -> db -> query($sql);
		return (1);
	}

	function insere_plano_submissao($protocolo_mae, $titulo, $aluno, $escola_publica, $modalidade) {
		$escola_publica = round($escola_publica);

		/* CONSULTA ALUNO */
		$this -> usuarios -> consulta_cracha($aluno);

		$ano = date("Y");
		$sql = "select * from ic_submissao_plano 
							WHERE
								doc_1_titulo = '$titulo'
								AND doc_ano = '$ano'
								AND doc_status <> 'X' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$ok = -1;
			return ($ok);
		} else {
			$ok = 1;
		}

		/************ Busca Aluno em Outro Plano *********/
		$sql = "select * from ic_submissao_plano 
							WHERE
								doc_aluno = '$aluno' 
								AND doc_ano = '$ano' 
								AND doc_status <> 'X' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if ((count($rlt) > 0) and ($aluno != '00000000')) {
			$ok = -2;
			return ($ok);
		} else {
			$ok = 1;
		}
		$dt = date("Ymd");
		$dtn = date("Y-m-d");
		$hora = date("H:i");

		$autor = $_SESSION['cracha'];

		$sql = "insert into ic_submissao_plano 
						(doc_1_titulo, doc_1_idioma, doc_aluno, 
						doc_protocolo, doc_protocolo_mae, doc_data,
						doc_dt_data, doc_hora, doc_status,
						doc_ano, doc_aluno_original,
						doc_dt_atualizado, doc_autor_principal, doc_tipo,
						doc_journal_id, doc_edital, doc_update,
						doc_icv
						)
						values
						('$titulo','pt_BR','$aluno',
						'','$protocolo_mae','$dt',
						'$dtn','$hora','@',
						'$ano','$aluno',
						'$dt', '$autor', 'PLANO',
						20, '$modalidade', '$dt',
						$escola_publica
						)";
		$this -> db -> query($sql);

		$sql = "update ic_submissao_plano set doc_protocolo = lpad(id_doc,7,0) where doc_protocolo = '' ";
		$rlt = $this -> db -> query($sql);
		return (1);

	}

	function ativar_bolsa($id, $ida, $cracha, $d1, $d2, $d3, $d4, $tipo, $situacao) {
		$d1 = brtos($d1);
		$d2 = brtos($d2);
		$d3 = brtos($d3);
		$d4 = brtos($d4);

		$sql = "insert into ic_aluno 
					(
					aluno_id, ic_aluno_cracha, ic_id,
					mb_id, icas_id, 
					aic_dt_entrada, aic_dt_saida, aic_dt_inicio_bolsa, aic_dt_fim_bolsa
					) values (
					'$ida','$cracha','$id',
					'$tipo','$situacao',
					'$d1','$d2','$d3','$d4'
					)
			";
		$this -> db -> query($sql);
		return (1);
	}

	function cp_protocolo() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$S8', '', 'Informe o ' . msg('protocolo'), True, True));
		return ($cp);
	}

	function cp_alterar_titulo() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', 'ic_projeto_professor_titulo', 'Título Original', True, False));
		array_push($cp, array('$T80:5', '', 'Título Novo', True, True));
		array_push($cp, array('$T80:5', '', 'Justificativa', True, True));
		array_push($cp, array('$B', '', 'Confirmar alteração >>>', False, True));
		return ($cp);
	}

	function cp_alterar_orientador() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$Q us_cracha:us_nome:select * from us_usuario where usuario_tipo_ust_id =2 and us_ativo = 1 order by us_nome', '', 'Nome do novo orientador', True, False));
		array_push($cp, array('$T80:5', '', 'Justificativa', True, True));
		array_push($cp, array('$B', '', 'Confirmar alteração >>>', False, True));
		return ($cp);
	}

	function cp_cancelar() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para o cancelamento', True, True));
		array_push($cp, array('$B', '', 'Confirmar cancelamento >>>', False, True));
		return ($cp);
	}

	function cp_troca_bolsa($id = 0) {
		$cp = array();
		$sql = "select * from ic_modalidade_bolsa where mb_ativo = 1 and mb_vigente = 1 order by mb_descricao ";
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para troca', True, True));
		array_push($cp, array('$Q id_mb:mb_descricao:' . $sql, '', 'Nova modalidade', True, True));
		array_push($cp, array('$B', '', 'Confirmar alteração >>>', False, True));
		return ($cp);
	}

	function cp_reativar($id = 0) {
		$cp = array();
		$sql = "select * from (
					select * from ic_aluno  
					inner join us_usuario on aluno_id = id_us 
					where ic_id = $id) as tabela ";
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para reativar', True, True));
		array_push($cp, array('$QR id_ica:us_nome:' . $sql, '', 'Estudante para reativar', True, True));
		array_push($cp, array('$B', '', 'Confirmar reativação >>>', False, True));
		return ($cp);
	}

	function cp_ativar() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$D8', '', msg('vigencia_bolsa_inicio'), True, True));
		array_push($cp, array('$D8', '', msg('vigencia_bolsa_fim'), True, True));
		array_push($cp, array('$D8', '', msg('Entrada_estudante'), True, True));
		array_push($cp, array('$D8', '', msg('Previsao_encerramento'), True, True));
		array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo = 1', '', msg('modalidade'), True, True));
		array_push($cp, array('$Q id_icas:icas_situacao:select * from ic_aluno_situacao where icas_ativo = 1', '', msg('protocolo_professor'), False, True));

		return ($cp);
	}

	function cp_resumo_1() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:6', '', 'Introdução', True, True));
		array_push($cp, array('$T80:6', '', 'Objetivo(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Metodologia', True, True));
		array_push($cp, array('$T80:6', '', 'Resultado(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Conclusão(ões)', True, True));
		array_push($cp, array('$T80:2', '', 'Palavras-chave', True, True));
		array_push($cp, array('$B8', '', 'Avançar próxima página >>>', False, True));

		return ($cp);
	}

	function cp_resumo_2() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:6', '', 'Introduction', True, True));
		array_push($cp, array('$T80:6', '', 'Objectives', True, True));
		array_push($cp, array('$T80:6', '', 'Methods', True, True));
		array_push($cp, array('$T80:6', '', 'Results', True, True));
		array_push($cp, array('$T80:6', '', 'Conclusion', True, True));
		array_push($cp, array('$T80:2', '', 'Keywords', True, True));
		array_push($cp, array('$B8', '', 'Avançar próxima página >>>', False, True));

		return ($cp);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$S8', 'ic_projeto_professor_codigo', msg('protocolo_professor'), False, True));
		array_push($cp, array('$S8', 'ic_plano_aluno_codigo', msg('protocolo'), True, True));
		array_push($cp, array('$S8', 'ic_cracha_prof', msg('cracha_prof'), True, True));
		array_push($cp, array('$S8', 'ic_cracha_aluno', msg('cracha_aluno'), True, True));
		array_push($cp, array('$S4', 'ic_ano', msg('ano'), True, True));
		array_push($cp, array('$D8', 'ic_dt_ativacao', msg('Ativação'), True, True));
		array_push($cp, array('$T80:6', 'ic_projeto_professor_titulo', msg('ic_plano_titulo'), True, True));
		array_push($cp, array('$H8', 'ic_plano_aluno_nome', '', False, True));

		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'ic_dt_ativacao', msg('Ativação'), True, True));

		return ($cp);
	}

	function cp_atividades() {
		$cp = array();
		$opA = 'IC_FORM_PROF:Formulário de acompanhamento do professor';
		$opA .= '&IC_FORM_RP:Entrega do Relatório Parcial';
		array_push($cp, array('$H8', 'id_at', '', False, True));
		array_push($cp, array('$O ' . $opA, 'at_atividade', msg('Atividade'), False, True));
		array_push($cp, array('$D8', 'at_data_ini', msg('data_inicial'), True, True));
		array_push($cp, array('$D8', 'at_data_fim', msg('data_final'), True, True));
		array_push($cp, array('$[2014-' . date("Y") . ']', 'at_ano', msg('ic_edital_ano'), True, True));

		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'ic_dt_ativacao', msg('Ativação'), True, True));

		return ($cp);
	}

	function submissoes_abertas($id = '1') {
		$sql = "select * from switch where id_sw = $id order by id_sw ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			$rlt = $rlt[0];
		}
		return ($rlt);
	}

	function cp_switch_ic_master() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_mst_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_mst_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_mst_form_acompanhamento'), False, True));
		array_push($cp, array('$SW', 'sw_04', msg('sw_ic_mst_rel_final'), False, True));
		array_push($cp, array('$SW', 'sw_05', msg('sw_ic_mst_resumo'), False, True));
		array_push($cp, array('$SW', 'sw_06', msg('sw_ic_validacao'), False, True));
		//array_push($cp, array('$SW', 'sw_03', msg('sw_ic_rel_final'), False, True));
		array_push($cp, array('$B', '', msg('update'), False, True));
		return ($cp);
	}

	function cp_switch() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_07', msg('sw_ic_rel_pacial_correcao'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_form_acompanhamento'), False, True));
		array_push($cp, array('$SW', 'sw_04', msg('sw_ic_rel_final'), False, True));
		array_push($cp, array('$SW', 'sw_08', msg('sw_ic_rel_final_correcao'), False, True));
		array_push($cp, array('$SW', 'sw_05', msg('sw_ic_resumo'), False, True));
		array_push($cp, array('$SW', 'sw_06', msg('sw_ic_validacao'), False, True));
		array_push($cp, array('$B', '', msg('update'), False, True));
		return ($cp);
	}

	/** Proetos por escolas */
	function mostra_projetos_por_escolas() {
		$dados = array();
		$dados['Escola de Arquitetura e Design'] = 51;
		$dados['Escola de Ciências Agrárias e Medicina Veterinária'] = 162;
		$dados['Escola de Comunicação e Artes'] = 34;
		$dados['Escola de Direito'] = 143;
		$dados['Escola de Educação e Humanidades'] = 262;
		$dados['Escola de Medicina'] = 144;
		$dados['Escola de Negócios'] = 82;
		$dados['Escola de Saúde e Biociências'] = 295;
		$dados['Escola Politécnica'] = 257;
		return ($dados);
	}

	function mostra_projetos_por_escolas_professor() {
		$dados = array();
		$dados['Ciência da computação'] = 18;
		$dados['Engenharia ambiental'] = 33;
		$dados['Engenharia civil'] = 36;
		$dados['Engenharia de alimentos'] = 8;
		$dados['Engenharia de computação'] = 14;
		$dados['Engenharia de controle e automação'] = 38;
		$dados['Engenharia de produção'] = 25;
		$dados['Engenharia mecânica'] = 29;
		$dados['Engenharia elétrica'] = 16;
		$dados['Engenharia química'] = 9;
		$dados['Sistemas de informação'] = 16;
		return ($dados);
		$sql = "select centro_nome, pp_curso, count(*) as total,  pb_ano, pp_escola from pibic_bolsa_contempladas 
					left join pibic_bolsa_tipo on pb_tipo  = pbt_codigo
					left join pibic_professor on pb_professor = pp_cracha
					left join centro on pp_escola = centro_codigo
					left join curso on pp_curso = curso_codigo
					where (pbt_edital = 'PIBIC' or pbt_edital = 'PIBITI' or pbt_edital = 'IS') and pb_ano = '2014'
					and pp_escola = '00009'
					group by pp_curso, centro_nome, pp_escola, pb_ano
					order by centro_nome, pp_curso
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$line = $rlt[0];

		//return values
		$tot = 0;
		$dados = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$dados[$line['pp_curso']] = $line['total'];
		}

		return ($dados);
	}

	/*model do bolsa modalidae*/
	function row_ic_modal_bolsas($obj) {
		$obj -> fd = array('id_mb', 'mb_descricao', 'mb_tipo', 'mb_ativo', 'mb_moeda', 'mb_valor', 'mb_fomento');
		$obj -> lb = array('ID', msg('lb_mb_descricao'), msg('lb_mb_tipo'), msg('lb_mb_ativo'), msg('lb_mb_moeda'), msg('lb_mb_valor'), msg('lb_mb_fomento'));
		$obj -> mk = array('', 'L', 'L', 'C', 'C', 'R', 'L', 'C');
		return ($obj);
	}

	function table_row_modal_bolsa() {
		$tabela = "ic_modalidade_bolsa";
		return ($tabela);
	}

	function cp_modal_bolsa() {
		$cp = array();
		array_push($cp, array('$H8', 'id_mb', '', False, True));
		array_push($cp, array('${', '', 'Gestão de Bolsas', False, True));
		array_push($cp, array('$S25', 'mb_descricao', msg('lb_mb_descricao'), False, True));
		array_push($cp, array('$S8', 'mb_tipo', msg('lb_mb_tipo'), True, True));
		array_push($cp, array('$O 1:sim&0:não', 'mb_ativo', msg('lb_mb_ativo'), True, True));
		array_push($cp, array('$O 1:sim&0:não', 'mb_vigente', msg('lb_mb_vigente'), True, True));
		array_push($cp, array('$O R$:R$&US:US', 'mb_moeda', msg('lb_mb_moeda'), False, True));
		array_push($cp, array('$S10', 'mb_valor', msg('lb_mb_valor'), True, True));
		array_push($cp, array('$S8', 'mb_fomento', msg('lb_mb_fomento'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		return ($cp);
	}

	/* Formulario de acompanhamento de pré-avaliacao para estudantes   */
	function cp_form_estudante() {

		$form = new form;
		$cp = array();

		$op_pa2 = '';
		$op_pa2 .= ' 1:estudante de ensino médio';
		$op_pa2 .= '&2:aluno(s) de mestrado';
		$op_pa2 .= '&3:aluno(s) de doutorado';
		$op_pa2 .= '&4:aluno(s) de graduação';
		$op_pa2 .= '&5:outros professores';

		$op_pa3 = '';
		$op_pa3 .= ' 1:1 vez por semana';
		$op_pa3 .= '&2:2 vezes por semana';
		$op_pa3 .= '&3:diariamente';
		$op_pa3 .= '&4:sempre que necessito';
		$op_pa3 .= '&5:1 vez por mês';
		$op_pa3 .= '&6:2 vezes por mês';
		$op_pa3 .= '&7:nunca';

		$op_pa4 = '';
		$op_pa4 .= ' 1:por e-mail';
		$op_pa4 .= '&2:presencial ';
		$op_pa4 .= '&3:ambos';

		$op_pa5 = '';
		$op_pa5 .= ' 1:levantamento bibliográfico';
		$op_pa5 .= '&2:leituras e fichamento';
		$op_pa5 .= '&3:questionário a ser aplicado posteriormente';
		$op_pa5 .= '&4:atividades de laboratório';
		$op_pa5 .= '&5:coleta de dados';
		$op_pa5 .= '&6:envio do projeto para CEP ou CEUA';
		$op_pa5 .= '&7:outras atividades. Especificar: ';

		$op_pa6 = '';
		$op_pa6 .= ' 1:em dia';
		$op_pa6 .= '&2:atrasado';
		$op_pa6 .= '&3:adiantado';

		$op_pa7 = '';
		$op_pa7 .= ' 1:SIM';
		$op_pa7 .= '&2:NÃO';
		$op_pa7 .= '&3:vou fazer agora!';

		$op_pa8 = '';
		$op_pa8 .= ' 1:SIM';
		$op_pa8 .= '&2:NÃO';
		$op_pa8 .= '&3:vou fazer agora!';

		$op_pa9 = '';
		$op_pa9 .= ' 1:péssima';
		$op_pa9 .= '&2:fraca';
		$op_pa9 .= '&3:regular';
		$op_pa9 .= '&4:boa';
		$op_pa9 .= '&5:ótima';

		array_push($cp, array('$H8', 'id_pa', '', False, True));
		array_push($cp, array('${', '', 'Estudante responder o questionário', False, True));
		array_push($cp, array('$O 1:SIM&2:NÃO', 'pa_p01', msg('lb_form_aluno_pa1'), True, True));
		array_push($cp, array('$CM' . $op_pa2, 'pa_p20', msg('lb_form_aluno_pa2'), True, True));
		array_push($cp, array('$RM' . $op_pa3, 'pa_p21', msg('lb_form_aluno_pa3'), True, True));
		array_push($cp, array('$RM' . $op_pa4, 'pa_p22', msg('lb_form_aluno_pa4'), True, True));
		array_push($cp, array('$CM' . $op_pa5, 'pa_p23', msg('lb_form_aluno_pa5'), True, True));
		array_push($cp, array('$T80:5', 'pa_p28', msg('lb_form_aluno_pa10'), False, True));
		array_push($cp, array('$O' . $op_pa6, 'pa_p24', msg('lb_form_aluno_pa6'), True, True));
		array_push($cp, array('$O' . $op_pa7, 'pa_p25', msg('lb_form_aluno_pa7'), True, True));
		array_push($cp, array('$O' . $op_pa8, 'pa_p26', msg('lb_form_aluno_pa8'), True, True));
		array_push($cp, array('$RM' . $op_pa9, 'pa_p27', msg('lb_form_aluno_pa9'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('$B', '', msg('bt_confirm'), False, True));

		$tela = $form -> editar($cp, 'pibic_acompanhamento');

		return $tela;

	}

	/* Formulario de acompanhamento de pré-avaliacao para professores   */
	function cp_form_professor($id = '') {

		$form = new form;
		$form -> id = $id;
		$cp = array();

		$op_pa2 = '';
		$op_pa2 .= ' 1:1 vez por semana';
		$op_pa2 .= '&2:2 a 3 vezes por semana';
		$op_pa2 .= '&3:diariamente';
		$op_pa2 .= '&4:sempre que necessário';
		$op_pa2 .= '&5:1 vez por mês';
		$op_pa2 .= '&6:2 vezes por mês';
		$op_pa2 .= '&7:nunca';

		$op_pa3 = '';
		$op_pa3 .= ' 1:por e-mail';
		$op_pa3 .= '&2:presencial';
		$op_pa3 .= '&3:ambos';

		$op_pa4 = '';
		$op_pa4 .= ' 1:em dia';
		$op_pa4 .= '&2:atrasado ';
		$op_pa4 .= '&3:adiantado';

		array_push($cp, array('$H8', 'id_pa', '', False, True));
		array_push($cp, array('$A', '', 'Formulário de acompanhamento IC/IT', False, True));
		array_push($cp, array('$M', '', msg('lb_form_prof_inf'), False, True));
		array_push($cp, array('$R 1:SIM&2:NÃO', 'pa_p01', msg('lb_form_prof_pa1'), True, True));
		array_push($cp, array('$CM ' . $op_pa2, 'pa_p20', msg('lb_form_prof_pa2'), True, True));
		array_push($cp, array('$R ' . $op_pa3, 'pa_p02', msg('lb_form_prof_pa3'), True, True));
		array_push($cp, array('$R ' . $op_pa4, 'pa_p03', msg('lb_form_prof_pa4'), True, True));
		array_push($cp, array('$R 1:SIM&2:NÃO', 'pa_p04', msg('lb_form_prof_pa5'), True, True));
		array_push($cp, array('$T80:5 ', 'pa_p22', msg('lb_form_prof_pa6'), False, True));

		/* Salvando dados adicionaios ocultos */
		array_push($cp, array('$HV', 'pa_status', 'B', False, True));
		array_push($cp, array('$HV', 'pa_data', date("Y-m-d"), False, True));
		array_push($cp, array('$HV', 'pa_hora', date("H:i"), False, True));
		array_push($cp, array('$HV', 'pa_usuario_id', $_SESSION['id_us'], False, True));

		array_push($cp, array('$B', '', msg('bt_confirm'), False, True));

		$tela = $form -> editar($cp, 'ic_acompanhamento');
		if ($form -> saved > 0) {
			$tela = 'SAVED';
		}

		return $tela;

	}

	function orientadores_ic($ano1 = 0, $ano2 = 0) {
		if ($ano2 == 0) { $ano2 = $ano1;
		}
		$sql = "select distinct us_nome, us_cracha, us_cpf, id_us, 
							us_campus_vinculo, us_escola_vinculo, 
							us_curso_vinculo, es_escola, us_ativo
					from ic
					left join us_usuario on ic_cracha_prof = us_cracha 
					left join escola on id_es = us_escola_vinculo
				    where ic_ano >= '$ano1' and ic_ano <= '$ano2'
				    		and (s_id = 1 or s_id = 4 or s_id = 3) 
				    order by us_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<h2>Orientadores ' . $ano1 . '</h2>';
		$sx .= '<table width="100%" class="lt1">';
		$sx .= '<tr>
						<th>Nome</th>
						<th>Cracha</th>
						<th>CPF</th>
						<th>Campus</th>
						<th>Escola</th>
						<th>Curso</th>
				</tr>';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			$sx .= '<tr>';
			$sx .= '<td class="borderb1">';
			$sx .= link_perfil($line['us_nome'], $line['id_us'], $line);
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center">';
			$sx .= $line['us_cracha'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center">';
			$sx .= mask_cpf($line['us_cpf']);
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['us_campus_vinculo'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['es_escola'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['us_curso_vinculo'];
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '<tr><td colspan=10>Total ' . $tot . ' orientadores</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function validar_area($area) {
		$ok = 0;
		$sql = "select * from area_conhecimento where ac_cnpq = '$area' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$ok = $line['ac_semic'];
		}
		return ($ok);
	}

	function validar_idioma($idioma) {
		$ok = 0;
		$sql = "select * from idioma where i_codificacao = '$idioma' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$ok = $line['i_ativo'];
		}
		return ($ok);
	}

	function validar_arquivo($proto, $tipo) {

		$ok = 0;
		$sql = "select count(*) as total from ic_ged_documento where doc_dd0 = '$proto' and doc_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			if ($line['total'] > 0) {
				$ok = 1;
			}
		}
		return ($ok);
	}

	function mostra_planos($proto, $sta) {
		$this -> load -> model('geds');

		$sql = "select * from " . $this -> tabela_planos . "
						LEFT JOIN us_usuario on us_cracha = doc_aluno 
						where doc_protocolo_mae = '$proto' and doc_status = '$sta' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['nrplano'] = ($r + 1);
			$line['arquivos'] = '';
			$line['arquivos_submit'] = '';
			$protocolo = $line['doc_protocolo'];

			$line['arquivos'] = $this -> geds -> list_files($protocolo, 'ic');
			$sx .= $this -> load -> view('ic/email_plano_submit', $line, true);

		}
		return ($sx);
	}

	function resumo_submit($cracha = '', $ano = '') {
		$res = array('0', '-', '-', '-', '-', '-');
		$link = array('', '', '', '', '', '');

		/* projetos */

		$sql = "select count(*) as total, pj_status 
							FROM " . $this -> tabela_projetos . "
							WHERE pj_edital = 'IC' and pj_ano = '$ano' and pj_professor = '$cracha'
							GROUP BY pj_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['pj_status'];
			switch($sta) {
				case '@' :
					$res[0] = round($res[0]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/0');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[0] = $lk;
					break;
				case 'A' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'B' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'C' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'D' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'E' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'F' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
					break;
				case 'X' :
					$res[4] = round($res[4]) + $line['total'];
					$lk = base_url('index.php/ic/submit_PIBIC/X');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[4] = $lk;
					break;
			}

		}

		/* Planos */
		$sql = "select count(*) as total, doc_status 
							FROM " . $this -> tabela_planos . "
							WHERE doc_ano = '$ano' and doc_autor_principal = '$cracha'
							GROUP BY doc_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['doc_status'];
			switch($sta) {
				case '@' :
					$res[1] = round($res[1]) + $line['total'];
					$link[1] = '';
					break;
				case 'A' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'B' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'C' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'D' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'E' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'F' :
					$res[3] = round($res[3]) + $line['total'];
					$link[3] = '';
					break;
				case 'X' :
					$res[5] = round($res[5]) + $line['total'];
					$link[5] = '';
					break;
			}

		}

		$sql = "ic_submissao_plano";

		$sx = '<table width="100%" class="tabela01 lt2" cellspacing=10>';
		$sx .= '<tr>';
		$sx .= '<td colspan="10" class="lt6">' . msg('resumo_das_submissoes') . ' - ' . msg('ICT') . '</td>';
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
		$sx .= '<tr><td colspan=10><font class="lt1">Clique no número dos projetos para visualizar</font></td><tr>';
		$sx .= '</table>';

		return ($sx);
	}

	function updatex() {
		$sql = "update " . $this -> tabela_projetos . " set pj_codigo = concat('2',lpad(id_pj,6,0)) where pj_codigo = '' ";
		$rlt = $this -> db -> query($sql);
	}

	function projeto_novo($cracha, $modalidade = 'IC', $redirect = 1) {
		$ano = date("Y");
		$data = date("Y-m-d");

		$id = $this -> exist_submit($cracha, $ano, $modalidade);
		if ($id == 0) {
			$sql = "insert into " . $this -> tabela_projetos . " 
							(
							pj_edital, pj_titulo, pj_codigo,
							pj_ano,	pj_grupo_pesquisa, pj_dt_update,
							pj_update, pj_status, pj_professor
							) values (
							'$modalidade','','',
							'$ano','','$data',
							'$data','@','$cracha') ";
			$rlt = $this -> db -> query($sql);
			$id = $this -> exist_submit($cracha, $ano, $modalidade);
		}

		$this -> updatex();

		if ($redirect == 1) {
			$url = base_url('index.php/ic/submit_edit/' . $modalidade . '/' . $id . '/' . checkpost_link($id));
			redirect($url);
		}
		return ($id);
	}

	function exist_submit($cracha, $ano, $modalidade = 'IC') {
		$sql = "select id_pj from " . $this -> tabela_projetos . " where pj_status = '@' 
							and pj_edital = '$modalidade' 
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

}
?>
