<?php
class ics extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	
	function resumo_orientacoes()
		{
			$sx = '';
			$sx .= '<table width="100%" class="border1 lt1">';
			$sx .= '<tr><th>'.msg('guidelines_ic').'</th></tr>';
			$sx .= '</table>';
			return($sx);
		}
	
	function orientacoes()
		{
			$cracha = $_SESSION['cracha'];
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
						
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="100%">';
			$sx .= '<tr><td colspan=10>Orientações abertas</td></tr>';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$edital = trim($line['mb_tipo']);
					$line['img'] = $this -> logo_modalidade($edital); 
					$line['page'] = 'pibic';
					$sx .= $this->load->view("ic/plano-lista",$line,true);
				}
			$sx .= '</table>';
			return($sx);
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
		
		if (strlen(sonumero($terms))==0)
			{
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
		if ($type == '1')
			{
			$wh .= " (ic_cracha_prof = '" . $term[0] . "') ";
			$wh .= " or (ic_cracha_aluno = '" . $term[0] . "') ";
			$wh .= " or (ic_plano_aluno_codigo like '" . $term[0] . "%') ";
			}
		
		$sql = $this -> table_view($wh, 0, 50);
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

	function resumo_autores_mostra($id)
		{
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
			while ($line = db_read($rlt))
				{
					$link = '<a href="#" onclick="remove('.$line['id_sma'].');" class="link">remover</a>';
					if ($line['sma_ativo'] > 1) { $link = ''; }
					$sx .= '<tr>';
					$sx .= '<td class="tabela01">'.$line['sma_nome'].'</td>';
					$sx .= '<td class="tabela01" align="center">'.$funcao[$line['sma_funcao']].'</td>';
					$sx .= '<td class="tabela01" align="center">'.$line['sma_instituicao'].'</td>';
					$sx .= '<td class="tabela01" align="center">'.$link.'</td>';
					$tot++;
				}
			if ($tot == 0)
				{
					$sx .= '<tr><td colspan=4 align="center" class="border1 pad5">
									<font class="error"><b>Sem autores incluídos</B>
							</td></tr>';
				}
			$sx .= '</table><br>';
			return($sx);
		}

	function salvar_resumo($page,$data)
		{
			$protocolo = trim($data['ic_plano_aluno_codigo']);
			$dd1 = $data['dd1'];
			$dd2 = $data['dd2'];
			$dd3 = $data['dd3'];
			$dd4 = $data['dd4'];
			$dd5 = $data['dd5'];
			$dd6 = $data['dd6'];
			
			if (strlen($protocolo) == 0)
				{
					return('');
				}
			if ($page=='1')
				{
					/* Titulo e Titulo em Inglês */
					$sql = "update semic_trabalho set
								sm_titulo = '$dd1', 
								sm_titulo_en = '$dd2'
								where sm_codigo = '$protocolo' ";
					$rlt = $this->db->query($sql);
					return(1);
				}
			/* Page 2 */
			if ($page=='2')
				{
					echo "PAGE2";
					return(1);
				}
				
			/* Page 3 */
			if ($page=='3')
				{
					$dd1 = troca($dd1,"'","´");
					$dd2 = troca($dd2,"'","´");
					$dd3 = troca($dd3,"'","´");
					$dd4 = troca($dd4,"'","´");
					$dd5 = troca($dd5,"'","´");
					$dd6 = troca($dd6,"'","´");
					
					/* Titulo e Titulo em Inglês */
					$sql = "update semic_trabalho set
								sm_rem_01 = '$dd1',
								sm_rem_02 = '$dd2',
								sm_rem_03 = '$dd3',
								sm_rem_04 = '$dd4',
								sm_rem_05 = '$dd5',								 
								sm_rem_06 = '$dd6'
								where sm_codigo = '$protocolo' ";
					$rlt = $this->db->query($sql);
					return(1);
				}
				
			/* Page 4 */
			if ($page=='4')
				{
					$dd1 = troca($dd1,"'","´");
					$dd2 = troca($dd2,"'","´");
					$dd3 = troca($dd3,"'","´");
					$dd4 = troca($dd4,"'","´");
					$dd5 = troca($dd5,"'","´");
					$dd6 = troca($dd6,"'","´");

					/* Titulo e Titulo em Inglês */
					$sql = "update semic_trabalho set
								sm_rem_11 = '$dd1',
								sm_rem_12 = '$dd2',
								sm_rem_13 = '$dd3',
								sm_rem_14 = '$dd4',
								sm_rem_15 = '$dd5',								 
								sm_rem_16 = '$dd6'
								where sm_codigo = '$protocolo' ";
					$rlt = $this->db->query($sql);
					return(1);
				}
				
			/* page 5 */
			if ($page=='5')
			{
					/* Titulo e Titulo em Inglês */
					$sql = "update semic_trabalho set
								sm_trava = '1',
								sm_status = 'A'
								where sm_codigo = '$protocolo' ";
					$rlt = $this->db->query($sql);
					return(1);
				exit;
			}								
		}

	function le_resumo($protocolo='')
		{
			/* Ver RESUMO */
			$sql = "select * from semic_trabalho where sm_codigo = '$protocolo' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			if (count($rlt) == 0)
				{
					return(array());
				} else{
					$line = $rlt[0];
					return($line);
				}	
		}
		
	function resumo_remove_autor($id)
		{
			$sql = "update semic_trabalho_autor set sma_ativo = 0 where id_sma = ".round($id);
			$this->db->query($sql);
			return('');
		}
	function resumo_inserir_autor($protocolo,$nome,$tipo,$instituicao,$lock=1)
		{
			$sql = "select * from semic_trabalho_autor 
						where sma_protocolo = '$protocolo' 
							and sma_nome = '$nome' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) == 0)
				{
				$sql = "insert into semic_trabalho_autor
					(
					sma_protocolo, sma_nome, sma_funcao, 
					sma_instituicao, sma_ativo, sma_titulacao
					) values (
					'$protocolo','$nome','$tipo',
					'$instituicao','$lock','') ";
				$rlt = $this->db->query($sql);
				} else {
					return('Nome já foi inserido!');
				}
		}
		
	function resumo_postado_inserir_autores($rs)
		{
			$line = $rs;
					$professor = $line['ic_cracha_prof'];
					$estudante = $line['ic_cracha_aluno'];
					$protocolo = $rs['ic_plano_aluno_codigo'];
					
					/* Bloquear edicao */
					$lock = 2;
										
					/* Estudante */
					$estu = $this->usuarios->le_cracha($estudante);
					$instituicao = trim($estu['ies_sigla']);
					$nome = trim($estu['us_nome']);	
					$this->resumo_inserir_autor($protocolo,$nome,'0',$instituicao,$lock);
					
					/* Professor */
					$prof = $this->usuarios->le_cracha($professor);
					$instituicao = trim($prof['ies_sigla']);
					$nome = trim($prof['us_nome']);	
									
					$this->resumo_inserir_autor($protocolo,$nome,'9',$instituicao,$lock);
			return('');
		}

	function resumo_postado($id)
		{
			$this->load->model("ics");
			
			$rs = $this->ics->le($id);
			
			$protocolo = $rs['ic_plano_aluno_codigo'];
			
			/* Ver RESUMO */
			$sql = "select * from semic_trabalho where sm_codigo = '$protocolo' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			if (count($rlt) == 0)
				{
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
					 $this->db->query($sql);
					 /* Cadastro automático do estudante e orientador */
					 $this->resumo_postado_inserir_autores($rs);
				}
			return(0);
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
						where ic_ano = '$ano' and (s_id_char = 'A' or s_id_char = 'F') 
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
		$sql = $this -> table_view('ic.id_ic = ' . $id, $offset = 0, $limit = 9999999);
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['logo'] = $this -> logo_modalidade($edital);
			
	
			$ida = $line['mb_id'];
			if ($ida == 0)
				{			
				$link_a = '<A href="'.base_url('index.php/ic/ativar_plano/'.$id.'/'.checkpost_link($id)).'">'.msg('ativar_plano').'</a>';
				$line['ic_ativar'] = $link_a;
				} else {
				$line['ic_ativar'] = '';	
				}
			return ($line);
		}
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

	function table_view($wh = '', $offset = 0, $limit = 9999999) {
		if (strlen($wh) > 0) {
			$wh = 'where (' . $wh . ') ';
		}

		$tabela = "		select * from ic
            			left join ic_aluno as pa on ic_id = id_ic
						left join (select us_cracha as id_al, id_us as aluno_id, us_nome as al_nome, us_cracha as al_cracha,us_curso_vinculo as al_curso from us_usuario) AS us_est on ic.ic_cracha_aluno = us_est.id_al
						left join (select us_cracha as id_pf, id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha, us_curso_vinculo as pf_curso from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						$wh
						order by ic_ano desc, ic_plano_aluno_codigo, pf_nome, al_nome
						limit $limit offset $offset
						";
		return ($tabela);
	}
	function ativar_bolsa($id,$ida,$cracha,$d1,$d2,$d3,$d4,$tipo,$situacao)
		{
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
			$this->db->query($sql);
			return(1);
		}
	
	function cp_ativar()
		{
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$D8', '', msg('vigencia_bolsa_inicio'), True, True));
		array_push($cp, array('$D8', '', msg('vigencia_bolsa_fim'), True, True));
		array_push($cp, array('$D8', '', msg('Entrada_estudante'), True, True));
		array_push($cp, array('$D8', '', msg('Previsao_encerramento'), True, True));
		array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo = 1','',msg('modalidade'), True,True));
		array_push($cp, array('$Q id_icas:icas_situacao:select * from ic_aluno_situacao where icas_ativo = 1', '', msg('protocolo_professor'), False, True));

		return($cp);			
		}
	
	function cp_resumo_1()
		{
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:6', '', 'Introdução', True, True));
		array_push($cp, array('$T80:6', '', 'Objetivo(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Metodologia', True, True));
		array_push($cp, array('$T80:6', '', 'Resultado(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Conclusão(ões)', True, True));
		array_push($cp, array('$T80:2', '', 'Palavras-chave', True, True));
		array_push($cp, array('$B8', '', 'Avançar próxima página >>>', False, True));
		

		return($cp);			
		}
		
	function cp_resumo_2()
		{
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:6', '', 'Introduction', True, True));
		array_push($cp, array('$T80:6', '', 'Objectives', True, True));
		array_push($cp, array('$T80:6', '', 'Methods', True, True));
		array_push($cp, array('$T80:6', '', 'Results', True, True));
		array_push($cp, array('$T80:6', '', 'Conclusion', True, True));
		array_push($cp, array('$T80:2', '', 'Keywords', True, True));
		array_push($cp, array('$B8', '', 'Avançar próxima página >>>', False, True));

		return($cp);			
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
		array_push($cp, array('$H8', 'ic_plano_aluno_nome','', False, True));
		
		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'ic_dt_ativacao', msg('Ativação'), True, True));

		return ($cp);
	}

	function cp_switch() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_rel_final'), False, True));
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

}
?>
