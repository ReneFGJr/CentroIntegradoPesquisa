<?php
class Stricto_sensus extends CI_model {
	var $resumo = array();
	
	function fluxo_discente($ppg='',$mod='')
		{
			$wh = '';
			if (strlen($ppg) > 0)
				{
					$wh = " and od_programa_id = $ppg ";
				}
			if (strlen($mod) > 0)
				{
					$wh = " and od_modalidade = '$mod' ";
				}
			$sql = "delete from ss_docente_orientacao where od_status = 'Z' ";
			$rlt = $this->db->query($sql);
			
			$sql = "
			SELECT sss_descricao, count(*) as total, sss_grupo FROM ss_docente_orientacao_situacao
				left join ss_docente_orientacao on od_status = sss_cod
				where od_status <> '#' $wh
				group by sss_descricao
				order by sss_grupo, sss_descricao
			";
			$rlt = $this->db->query($sql);
			$rlt = $rlt-> result_array();
			
			$sz = round(100/count($rlt)).'%';
			$sa = ''; $sb = '';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$desc = $line['sss_descricao'];
					$sa .= '<td align="center" width="'.$sz.'">'.$desc.'</td>';
					$sb .= '<td align="center" class="border1">'.$line['total'].'</td>';
				}
			$sx = '<table width="100%" class="tabela01 border1">';
			$sx .= '<tr class="lt0">'.$sa.'</tr>';
			$sx .= '<tr class="lt6">'.$sb.'</tr>';
			$sx .= '</table>';
			return($sx);
		}
	
	function is_phd_student($cracha='')
		{
			$sql = "select * from ss_docente_orientacao where od_aluno = '$cracha' order by od_ano_ingresso desc limit 1";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					$mod = $line['od_modalidade'];
					if ($mod == 'D') {
						return(7);
					}
					if ($mod == 'P') {
						return(8);
					}
					if ($mod == 'M') {
						return(6);
					}
				} else {
					return(0);
				}
		}

	function is_administrativo($id_us = 0) {
		$sql = "select * from ss_programa_pos where  
						id_us_coordenador = $id_us OR
						id_us_secretaria1 = $id_us OR
						id_us_secretaria2 = $id_us ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}

	function fluxo_discente_mostra($pg) {
		/* Recupera ID do usuário do perfil */
		$id_us = $_SESSION['id_us'];

		$sql = "select * from ss_linha_pesquisa_programa
						INNER JOIN programa_pos_linhas ON posln_descricao = sslpp_nome_linha 
						WHERE sslpp_old = ''";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$od = $line['id_sslpp'];
			$pp = $line['posln_codigo'];
			$sql = "update ss_linha_pesquisa_programa set sslpp_old = '$pp' where id_sslpp = $od ";
			$xxx = $this -> db -> query($sql);
		}

		$sql = "select * from ss_docente_orientacao 
						INNER JOIN ss_linha_pesquisa_programa on od_linha = sslpp_old
						INNER JOIN programa_pos_linhas on posln_descricao = sslpp_nome_linha
						where od_linha_id = 0 
						limit 250";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$od = $line['id_od'];
			$pp = $line['id_sslpp'];
			$sql = "update ss_docente_orientacao set od_linha_id = $pp where id_od = $od ";
			$xxx = $this -> db -> query($sql);
			echo $sql . '<BR>';
		}

		$sql = "select * from ss_docente_orientacao 
						INNER JOIN ss_programa_pos on id_pp_char = od_programa
						where od_programa_id = 0 
						limit 200";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$od = $line['id_od'];
			$pp = $line['id_pp'];
			$sql = "update ss_docente_orientacao set od_programa_id = $pp where id_od = $od ";
			$xxx = $this -> db -> query($sql);
		}

		/****************** Consulta ***************************************/
		$data_prog = $this -> le($pg);
		/* Secretárias */
		$sec1 = $data_prog['id_us_secretaria1'];
		$sec2 = $data_prog['id_us_secretaria2'];
		$this -> load -> view('ss/show', $data_prog);
		$nova = '';
		if (($sec1 == $id_us) OR ($sec2 == $id_us)) {
			$link = base_url('index.php/stricto_sensu/orientacao_new/' . $pg . '/' . checkpost_link($pg));
			$nova = '<span class="botao3d back_green_shadown back_green nopr" onclick="newwin(\'' . $link . '\')">' . msg('nova_orientacao') . '</span>';
			$data['content'] = $nova;
			$this -> load -> view('content', $data);
		}

		/****************** Consulta ***************************************/
		$sql = "select  id_od,
						aluno.us_nome as al_nome, aluno.id_us as al_id, aluno.us_cracha as al_cracha, od_aluno,
						prof.us_nome as pf_nome, prof.id_us as pf_id,
						od_ano_ingresso, od_ano_diplomacao, od_status,
						od_modalidade, od_linha, sss_descricao,
						sslpp_nome_linha, id_us_secretaria1, id_us_secretaria2
						
					 FROM ss_docente_orientacao 
					LEFT JOIN us_usuario as aluno on aluno.us_cracha = od_aluno and od_aluno <> ''
					LEFT JOIN us_usuario as prof on prof.us_cracha = od_professor
					LEFT JOIN ss_docente_orientacao_situacao on sss_cod = od_status
					LEFT JOIN ss_programa_pos on od_programa_id = id_pp
					LEFT JOIN ss_linha_pesquisa_programa on od_linha_id = id_sslpp
					WHERE od_programa_id = $pg
					order by pf_nome, od_ano_ingresso desc, al_nome 
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr><th>#</th>
						<th>Estudante</th>
						<th>situação</th>
						<th>Ano Ingresso</th>
						<th>Ano Titulação</th>
						<th>Modalidade</th>
						<th>Linha de Pesquisa</th>
						</tr>';

		$xprof = '';
		$nr = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$edit = '';

			if (($sec1 == $id_us) OR ($sec2 == $id_us) OR (perfil("#ADM") == 1)) {
				$link = base_url('index.php/stricto_sensu/orientacao_id/' . $line['id_od'] . '/' . checkpost_link($line['id_od']));
				$edit = '<span class="link lt1" onclick="newwin(\'' . $link . '\')">editar</span>';
			}
			$prof = $line['pf_id'];
			if ($prof != $xprof) {
				$sx .= '<tr><td class="lt3" colspan=10><b>' . $line['pf_nome'] . '</b></td></tr>' . cr();
				$xprof = $prof;
				$nr = 0;
			}
			$nr++;
			$sx .= '<tr>';
			$sx .= '<td align="center">' . $nr . '</td>';
			$sx .= '<TD>' . link_user($line['al_nome'], $line['al_id']) .' ('.$line['od_aluno'].')</td>';
			
			$sx .= '<TD>' . $line['sss_descricao'] . '</td>';
			$sx .= '<TD align="center">' . $line['od_ano_ingresso'] . '</td>';
			$sx .= '<TD align="center">' . substr($line['od_ano_diplomacao'], 0, 4) . '</td>';
			$sx .= '<TD align="center">' . $line['od_modalidade'] . '</td>';
			$sx .= '<TD>' . $line['sslpp_nome_linha'] . '</td>';
			if (strlen($edit) > 0) {
				$sx .= '<td class="nopr">' . $edit . '</td>';
			}

		}
		$sx .= '</table>';
		return ($sx);

	}

	function orientacoes($cracha = '') {
		$sql = "select * from ss_docente_orientacao 
					left join us_usuario on us_cracha = od_aluno
					left join ss_docente_orientacao_situacao on sss_cod = od_status
						WHERE od_professor = '$cracha' 
						ORDER BY od_ano_ingresso desc, od_modalidade, us_nome
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$dr = array(0, 0, 0, 0, 0, 0);
		$ms = array(0, 0, 0, 0, 0, 0);
		$mp = array(0, 0, 0, 0, 0, 0);

		$sx = '<table width="100%" class="tabela00 lt1">';
		$sx .= '<tr>
						<th width="2%">#</th>
						<th width="35%">Estudante</th>
						<th width="5%">Crachá</th>
						<th width="5%">Ingresso</th>
						<th width="5%">Diplomação</th>
						<th width="10%">Modalidade</th>
						<th width="35%">Título da pesquisa mestrado/doutado</th>
					</tr>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td align="center" class="border1">' . ($r + 1) . '</td>';
			$sx .= '<td class="border1">' . $line['us_nome'] . '</td>';
			$sx .= '<td class="border1">' . $line['od_aluno'] . '</td>';
			$sx .= '<td align="center" class="border1">' . $line['od_ano_ingresso'] . '</td>';
			$sx .= '<td align="center" class="border1">' . substr($line['od_ano_diplomacao'], 0, 4) . '</td>';
			$sx .= '<td align="center" class="border1">' . msg('modalidade_' . $line['od_modalidade']) . '</td>';
			$sx .= '<td class="border1">';
			$sx .= $line['od_titulo_projeto'];
			$sx .= '</td>';
			$sx .= '<td align="center" class="border1">' . $line['sss_descricao'] . '</td>';
			$sx .= '</tr>';

			/* Tipo */
			$sss = round($line['sss_grupo']);
			if ($line['od_modalidade'] == 'D') {
				$dr[$sss] = $dr[$sss] + 1;
			}
			if ($line['od_modalidade'] == 'M') {
				$ms[$sss] = $ms[$sss] + 1;
			}
			if ($line['od_modalidade'] == 'P') {
				$mp[$sss] = $mp[$sss] + 1;
			}
		}
		$sx .= '</table>';

		$rs = array($dr, $ms, $mp);
		$this -> resumo = $rs;
		return ($sx);

	}

	function is_coordenador($id_us, $programa = '') {
		$wh = '';
		if (strlen($programa) > 0) {
			$wh .= " AND (id_pp = '$programa' or id_pp_char = '$programa') ";
		}
		$sql = "select 1 from ss_programa_pos
						WHERE id_us_coordenador = $id_us " . $wh;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}

	}

	function lista_atividades_coordenador($us_id = 0) {
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN us_usuario ON ca_professor = us_cracha
					LEFT JOIN fomento_agencia on (((agf_sigla = ca_agencia) and (ca_agencia_id = 0)) or (id_agf = ca_agencia_id))
					LEFT JOIN captacao_participacao on cp_cod = ca_participacao
					LEFT JOIN ss_programa_pos ON ((ca_programa = id_pp_char) or (ca_programa = id_pp)) 
				WHERE ca_status = 10 and id_us_coordenador = $us_id	";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		$sx = '<table width="100%" class="tabela01 lt1">';
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
					<th></th>
					<th>Situação</th>
				</tr>';
		if (count($rlt) > 0) {
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$sx .= $this -> load -> view('captacao/captacao_row', $line, true);
			}
		}
		$sx .= '</table>';
		
		
		/* ARTIGOS */
		
		$sql = "select * from cip_artigo 
				inner join (
				SELECT distinct us_cracha as cracha FROM ss_programa_pos
					inner join `ss_professor_programa_linha` on id_pp = programa_pos_id_pp
				    inner join us_usuario on id_us = us_usuario_id_us
					WHERE `sspp_ativo` = 1 and id_us_coordenador = $us_id
				) as tabela on cracha = ar_professor
				inner join us_usuario on us_usuario.us_cracha = ar_professor
				inner join cip_artigo_status on ar_status = cas_status
				where ar_status = 10 ";
				
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		
		$sx .= '<h1>Artigos</h1>';
		$sx .= '<table width="100%" class="tabela01 lt1">';
		$sx .= '<tr>
					<th>Protocolo</th>
					<th width="40%">Título do artigo</th>
					<th width="20%">Publicação</th>
					<th width="2%">Qualis</th>
					<th width="2%">Scimago</th>
					<th width="5%">Atualização</th>
					<th width="10%">Situação</th>
					<th width="20%">Professor</th>
				</tr>';
		if (count($rlt) > 0) {
			for ($r = 0; $r < count($rlt); $r++) {
				$ll = $rlt[$r];
				//print_r($ll);
				$sx .= $this -> load -> view('artigo/artigo_row', $ll, true);
			}
		}
		$sx .= '</table>';						
		return ($sx);

	}

	function atividades_coordenador($us_id = 0) {
		/******************************************************************************** CAPTACAO */
		$av = array('-', '-');
		/* Projetos */
		$sql = "select count(*) as total from captacao 
					INNER JOIN ss_programa_pos on ((ca_programa = id_pp) or (ca_programa = id_pp_char))
						WHERE ca_status = 10 and id_us_coordenador = $us_id	";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		if (count($rlt) > 0) {
			for ($r = 0; $r < count($rlt); $r++) {
				$to++;
				$line = $rlt[$r];
				$av[0] = $line['total'];
			}
		}
		/* Artigos */
		$sql = "select count(*) as total from cip_artigo 
				inner join (
				SELECT distinct us_cracha FROM ss_programa_pos
					inner join `ss_professor_programa_linha` on id_pp = programa_pos_id_pp
				    inner join us_usuario on id_us = us_usuario_id_us
					WHERE `sspp_ativo` = 1 and id_us_coordenador = $us_id
				) as tabela on us_cracha = ar_professor
				where ar_status = 10 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		if (count($rlt) > 0) {
			for ($r = 0; $r < count($rlt); $r++) {
				$to++;
				$line = $rlt[$r];
				$av[1] = $line['total'];
			}
		}
		
		$sx = '';
		if ($to > 0) {
			$link = base_url('index.php/ss/coordenador/');
			$sx = '<table width="200" class="captacao_folha border1 black">';
			$sx .= '<tr><td colspan=5 class="lt5" align="center">' . msg('validacao_coordenador') . '</td></tr>';
			$sx .= '<tr>';
			$sx .= '<td width="100" class="captacao_folha bg_lred black lt6"><font class="lt0">' . msg('captacoes') . '</font><br><b>' . $av[0] . '</b></td>';
			$sx .= '<td width="100" class="captacao_folha bg_lred black lt6"><font class="lt0">' . msg('artigos') . '</font><br><b>' . $av[1] . '</b></td>';
			$sx .= '<tr><td colspan=5 class="lt5" align="left"><a href="' . $link . '" class="link lt2">' . msg('validacao_coordenador_link') . '</a></td></tr>';
			$sx .= '</table>';
		}
		return ($sx);
	}

	function resumo_programa($prog = 0) {
		/* Cacula linhas */
		$linhas = $this -> calcula_linhas($prog);
		$profs = $this -> calcula_professores($prog);

		$cols = 5;
		$size = round(100 / $cols) . '%';
		$sx = '<h2>Resumo do Programa</h2>';
		$sx .= '<table width="100%" class="lt2 border1">';
		$sx .= '<tr class="lt1" align="center">';
		$sx .= '<th width="' . $size . '" align="center">Total de Professores</th>';
		$sx .= '<th width="' . $size . '" align="center">Total de Linhas de Pesquisa</th>';
		$sx .= '<th width="' . $size . '" align="center">Total de Discentes</th>';
		$sx .= '<th width="' . $size . '" align="center">Total de Artigos Publicados</th>';
		$sx .= '<th width="' . $size . '" align="center">Captações ' . (date("Y") - 1) . '/' . (date("Y")) . '</th>';

		$sx .= '<tr class="lt6" align="center">';
		$sx .= '<th width="' . $size . '" align="center">' . $profs . '</th>';
		$sx .= '<th width="' . $size . '" align="center">' . $linhas . '</th>';
		$sx .= '<th width="' . $size . '" align="center">-</th>';
		$sx .= '<th width="' . $size . '" align="center">-</th>';
		$sx .= '<th width="' . $size . '" align="center">-</th>';

		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function ativa_docentes_ss() {
		/* zera ativacoes */
		$sql = "update us_usuario set us_professor_tipo = 0 where us_professor_tipo = 2 ";
		$rlt = $this -> db -> query($sql);

		$sql = "select us_usuario_id_us from ss_professor_programa_linha where sspp_ativo = 1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$wh = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen($wh) > 0) { $wh .= ' or ';
			}
			$wh .= '(id_us = ' . $line['us_usuario_id_us'] . ') ';
		}
		if (strlen($wh) > 0) {
			$sql = "update us_usuario set us_professor_tipo = 2 where " . $wh;
			$rlt = $this -> db -> query($sql);
		}
	}

	function lista_docentes() {
		$this -> ativa_docentes_ss();
		$sql = "select distinct us_nome, us_campus_vinculo,
						us_link_lattes, es_escola, id_us, pp_nome,
						us_genero
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
						LEFT JOIN escola on us_escola_vinculo = id_es
						LEFT JOIN ss_programa_pos on id_pp = programa_pos_id_pp
						where  sspp_ativo = 1 and sspp_tipo = 'Permanente'
						order by us_nome, es_escola, pp_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt1">';
		$sx .= '<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Campus</th>
						<th>Lattes</th>
						<th>Escola</th>
						<th>Programa Mestrado / Doutorado</th>
						<th>Genero</th>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td align="center" class="lt1" width="10">';
			$sx .= ($r + 1) . '.';
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= link_perfil($line['us_nome'], $line['id_us'], $line);
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_campus_vinculo'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_link_lattes'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['es_escola'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['pp_nome'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= msg('genero_' . $line['us_genero']);
			$sx .= '</td>';

		}
		$sx .= '</table>';
		return ($sx);
	}

	function lista_docentes_por_programa() {
		$this -> ativa_docentes_ss();
		$sql = "select distinct us_nome, us_campus_vinculo,
						us_link_lattes, es_escola, id_us, pp_nome,
						us_genero
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
						LEFT JOIN escola on us_escola_vinculo = id_es
						LEFT JOIN ss_programa_pos on id_pp = programa_pos_id_pp
						where  sspp_ativo = 1 and sspp_tipo = 'Permanente'
						order by pp_nome, us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt1">';
		$th = '<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Campus</th>
						<th>Lattes</th>
						<th>Programa Mestrado / Doutorado</th>
						<th>Escola de vínculo do professor</th>						
						<th>Genero</th>
					</tr>';
		$xprog = '';
		$pos = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$prog = $line['pp_nome'];
			if ($prog != $xprog) {
				$sx .= '<tr><td colspan="6" class="lt4"><b>' . $prog . '</b></td></tr>';
				$sx .= $th;
				$xprog = $prog;
				$pos = 0;
			}

			$sx .= '<tr>';
			$sx .= '<td align="center" class="lt1" width="10">';
			$sx .= ($pos + 1) . '.';
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= link_perfil($line['us_nome'], $line['id_us'], $line);
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_campus_vinculo'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_link_lattes'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['es_escola'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= msg('genero_' . $line['us_genero']);
			$sx .= '</td>';

			$pos++;

		}
		$sx .= '</table>';
		return ($sx);
	}

	function calcula_linhas($prog) {
		$sql = "select distinct count(*) as total from ss_linha_pesquisa_programa where pp_id = $prog and sslpp_ativo = 1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]['total']);
		} else {
			return (0);
		}
	}

	function calcula_professores($prog) {
		$sql = "select count(*) as total from (
						select distinct us_usuario_id_us from ss_professor_programa_linha 
							where programa_pos_id_pp = $prog and sspp_ativo = 1
					) as tabela
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]['total']);
		} else {
			return (0);
		}
	}

	function linhas_do_programa($prog = 0) {
		$cp = 'sslpp_nome_linha, id_sslpp, sspp_tipo, us_usuario_id_us, us_nome, id_us ';
		$sql = "select distinct $cp from ss_linha_pesquisa_programa 
						left join ss_professor_programa_linha on sslpp_id = id_sslpp
						left join us_usuario on id_us = us_usuario_id_us
						 where sslpp_ativo = 1 and pp_id = $prog 
					order by sslpp_nome_linha";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$ln = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_sslpp'];
			if (isset($ln[$id])) {

			} else {
				$ln[$id] = array();
				$ln[$id]['nome'] = trim($line['sslpp_nome_linha']);
				$ln[$id]['permanente'] = 0;
				$ln[$id]['visitante'] = 0;
				$ln[$id]['colaborador'] = 0;
			}
			$tipo = trim($line['sspp_tipo']);

			switch ($tipo) {
				case 'Permanente' :
					$ln[$id]['permanente'] = $ln[$id]['permanente'] + 1;
					break;
				case 'Colaborador' :
					$ln[$id]['colaborador'] = $ln[$id]['colaborador'] + 1;
					break;
				case 'Visitante' :
					$ln[$id]['visitante'] = $ln[$id]['visitante'] + 1;
					break;
				default :
					$ln[$id]['permanente'] = $ln[$id]['permanente'] + 1;
					break;
			}
		}
		$sx = '<h2>Linhas de Pesquisa</h2>';
		$sx .= '<table width="100%" class="lt2 border1">';
		$sx .= '<tr>
						<th>Nome da linha</th>
						<th>Profs. Permanentes</th>
						<th>Profs. Colaboradores</th>
						<th>Profs. Visitantes</th>
					</tr>';
		foreach ($ln as $key => $value) {
			$sx .= '<tr>';
			$sx .= '<td class="borderb1">';
			$sx .= $ln[$key]['nome'];
			$sx .= '</td>';
			$sx .= '<td align="center" width="10%" class="borderb1">';
			$sx .= $ln[$key]['permanente'];
			$sx .= '</td>';
			$sx .= '<td align="center" width="10%" class="borderb1">';
			$sx .= $ln[$key]['colaborador'];
			$sx .= '</td>';
			$sx .= '<td align="center" width="10%" class="borderb1">';
			$sx .= $ln[$key]['visitante'];
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function professores_do_programa($prog = 0) {
		$sql = "select * from (
						select count(*) as linhas, sspp_tipo as situacao, min(sspp_dt_entrada) as entrada, us_usuario_id_us, programa_pos_id_pp from ss_professor_programa_linha where sspp_ativo = 1
							group by us_usuario_id_us, programa_pos_id_pp, situacao
					) as professor
					inner join us_usuario on us_usuario_id_us = id_us
					where programa_pos_id_pp = $prog
					order by us_nome
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h2>Professores do Programa</h2>';
		$sx .= '<table width="100%" class="lt2 border1">';
		$sx .= '<tr><th>Pos</th>
						<th>Professor</th>
						<th>Lattes</th>
						<th>Área de formação</th>
						<th>Situação no programa</th>
						<th>Ano de entrada</th>
						<th>Linhas de Pesquisa</th>
						';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr class="borderb1">';
			$sx .= '<td width="20" align="center" class="borderb1"> ';
			$sx .= ($r + 1);
			$sx .= '</td>';
			$sx .= '<td class="borderb1">';
			$link = link_perfil($line['us_nome'], $line['id_us']);
			$sx .= $link . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center">';
			$lattes = $line['us_link_lattes'];
			if (strlen($lattes) > 0) {
				$sx .= '<a href="' . $lattes . '" target="_new' . $line['id_us'] . '">';
				$sx .= '<img src="' . base_url('img/icon/icone_lattes.png') . '" height="20" border=0 >';
				$sx .= '</a>';
			}
			$sx .= '</td>';
			$sx .= '<td class="borderb1">';
			$sx .= '</td>';
			$sx .= '<td align="center" class="borderb1">' . $line['situacao'] . '</td>';
			$sx .= '<td align="center" class="borderb1">' . $line['entrada'] . '</td>';
			$sx .= '<td align="center" class="borderb1">' . $line['linhas'] . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function le($id = 0) {
		$id = round($id);
		$sql = "select * from ss_programa_pos
						left join us_usuario on id_us = id_us_coordenador
						left join area_avaliacao on pp_area = id_area  
						left join (select us_nome as us_secretaria_1, id_us as id_us_sec1 from us_usuario) as secretaria1 on id_us_sec1 = id_us_secretaria1
						left join (select us_nome as us_secretaria_2, id_us as id_us_sec2 from us_usuario) as secretaria2 on id_us_sec2 = id_us_secretaria2
						where id_pp = '$id' 
					order by pp_nome 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$line['modalidade'] = $this -> modalidade($line);
			$line['link_pp_codigo_capes'] = '<a href="http://conteudoweb.capes.gov.br/conteudoweb/ProjetoRelacaoCursosServlet?acao=detalhamentoIes&codigoPrograma=' . $line['pp_codigo_capes'] . '" class="link lt2" target="_new">' . $line['pp_codigo_capes'] . '</a>';
			return ($line);
		} else {
			return ( array());
		}
	}


	function cp() {
		$cp = array();
		
		array_push($cp, array('$H8', 'id_pp', '', False, True));
		
		array_push($cp, array('${', '', 'Dados do Programa', False, True));
		array_push($cp, array('$S100', 'pp_nome', 'Nome do programa', True, True));
		array_push($cp, array('$S10', 'pp_sigla', 'Sigla', True, True));
		$sql = "select * from area_avaliacao order by area_avaliacao_nome ";
		array_push($cp, array('$Q id_area:area_avaliacao_nome:' . $sql, 'pp_area', 'Área de avaliação', False, True));
		array_push($cp, array('$[2-7]', 'pp_conceito', 'Nota do programa', True, True));
		array_push($cp, array('$S15', 'pp_codigo_capes', 'Código CAPES', False, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('${', '', 'Modalidades disponíveis', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_mestrado', 'Mestrado', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_mestrado_prof', 'Mestrado Profissional', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_doutorado', 'Doutorado', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_pos_doutorado', 'Pós-Doutorado', True, True));
		array_push($cp, array('$[1950-' . date("Y") . ']', 'pp_ano_inicio', 'Início do Mestrado', False, True));
		array_push($cp, array('$[1950-' . date("Y") . ']', 'pp_ano_inicio_doutorado', 'Início do Doutorado', False, True));
		array_push($cp, array('$}', '', 'Modalidades disponíveis', False, True));

		array_push($cp, array('${', '', 'Administrativo', False, True));
		array_push($cp, array('$Q id_us:us_nome:select * from us_usuario where us_ativo = 1 and us_professor_tipo = 2', 'id_us_coordenador', 'Coordenador', False, True));
		array_push($cp, array('$Q id_us:us_nome:select * from us_usuario where us_ativo = 1 and usuario_tipo_ust_id = 4', 'id_us_secretaria1', 'Secretaria (1)', False, True));
		array_push($cp, array('$Q id_us:us_nome:select * from us_usuario where us_ativo = 1 and usuario_tipo_ust_id = 4', 'id_us_secretaria2', 'Secretaria (2)', False, True));
		
		array_push($cp, array('${', '', 'Contatos', False, True));
		array_push($cp, array('$S50', 'pp_email1', 'E-mail (1)', True, True));
		array_push($cp, array('$S50', 'pp_email2', 'E-mail (2)', False, True));
		array_push($cp, array('$S15', 'pp_fone1', 'Tefefone (1)', True, True));
		array_push($cp, array('$S15', 'pp_fone2', 'Tefefone (2)', False, True));
		array_push($cp, array('$}', '', '', False, True));
		
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_ativo', 'Ativo', True, True));
		array_push($cp, array('$}', '', '', False, True));
		
		array_push($cp, array('$B8', '', 'salvar', False, True));
		return ($cp);
	}

	function le_orientacao($id = 0) {
		$sql = "select * from ss_docente_orientacao
						left join ss_programa_pos on id_pp = od_programa_id
						left join (select us_nome as al_nome, us_cracha as al_cracha, id_us as al_id from us_usuario ) as aluno on al_cracha = od_aluno
						left join (select us_nome as pf_nome, us_cracha as pf_cracha, id_us as pf_id from us_usuario ) as prof on pf_cracha = od_professor
					WHERE id_od = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}

	function cp_orientacao_nova($programa = 0) {
		$cp = array();
		$aluno = $this -> usuarios -> limpa_cracha(get("dd1"));
		$aluno_nome = '';
		if (strlen($aluno) > 0)
			{
				$aluno = $this->usuarios->consulta_cracha($aluno);
				$dt = $this->usuarios->le_cracha($aluno);
				if (isset($dt['us_nome']))
					{
						$aluno_nome = $dt['us_nome'];		
					} else {
						$aluno = '';
					}
				
			}
		
		array_push($cp, array('$H8', 'id_od', '', False, True));
		array_push($cp, array('$S12', '', 'Código do aluno', True, True));
		array_push($cp, array('$HV', 'od_aluno', $aluno, True, True));
		array_push($cp, array('$HV', 'od_programa_id', $programa, True, True));
		
		array_push($cp, array('$M', '', '<h2>'.$aluno_nome.'</h2>', False, True));

		$sqlc = "ssm_cod:ssm_nome:select id_ssm, ssm_nome, ssm_cod from ss_modalidade where ssm_ativo = 1";
		array_push($cp, array('$Q ' . $sqlc, 'od_modalidade', 'Modalidade', True, True));

		array_push($cp, array('${', '', 'Sobre o programa', False, True));
		$sqla = "sss_cod:sss_descricao:select * from ss_docente_orientacao_situacao order by sss_descricao";

		$sqlc = "us_cracha:us_nome:select distinct id_us, us_nome, us_cracha from ss_professor_programa_linha inner join us_usuario on us_usuario_id_us = id_us where programa_pos_id_pp = $programa and sspp_ativo = 1";
		array_push($cp, array('$Q ' . $sqlc, 'od_professor', 'Orientador', True, True));

		array_push($cp, array('$Q ' . $sqla, 'od_status', 'Situação', True, True));
		$sqlb = "id_sslpp:sslpp_nome_linha:select * from ss_linha_pesquisa_programa where pp_id = $programa order by sslpp_nome_linha";
		array_push($cp, array('$Q ' . $sqlb, 'od_linha_id', 'Linha de Pesquisa', True, True));

		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('${', '', 'Datas', False, True));
		array_push($cp, array('$[1990-' . date("Y") . ']D', 'od_ano_ingresso', 'Ano ingresso', True, True));
		array_push($cp, array('$[1990-' . (date("Y") + 6) . ']D', 'od_ano_diplomacao', 'Ano titulação (previsão)', False, True));
		array_push($cp, array('$}', '', 'Ano ingresso', False, True));
		
		if (strlen($aluno) > 0)
			{
				array_push($cp, array('$B8', '', 'Confirmar >>>', False, True));
			} else {
				array_push($cp, array('$B8', '', 'Validar', False, True));		
			}

		
		return ($cp);
	}

	function cp_orientacao($programa = 0) {
		$cp = array();
		array_push($cp, array('$H8', 'id_od', '', False, True));

		array_push($cp, array('${', '', 'Sobre o programa', False, True));
		$sqla = "sss_cod:sss_descricao:select * from ss_docente_orientacao_situacao order by sss_descricao";
		array_push($cp, array('$Q ' . $sqla, 'od_status', 'Situação', True, True));
		$sqlb = "id_sslpp:sslpp_nome_linha:select * from ss_linha_pesquisa_programa where pp_id = $programa order by sslpp_nome_linha";
		array_push($cp, array('$Q ' . $sqlb, 'od_linha_id', 'Linha de Pesquisa', True, True));

		$sqlc = "ssm_cod:ssm_nome:select id_ssm, ssm_nome, ssm_cod from ss_modalidade where ssm_ativo = 1";
		array_push($cp, array('$Q ' . $sqlc, 'od_modalidade', 'Modalidade', True, True));

		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('${', '', 'Datas', False, True));
		array_push($cp, array('$[1990-' . date("Y") . ']D', 'od_ano_ingresso', 'Ano ingresso', True, True));
		array_push($cp, array('$[1990-' . (date("Y") + 6) . ']D', 'od_ano_diplomacao', 'Ano titulação (previsão)', False, True));
		array_push($cp, array('$}', '', 'Ano ingresso', False, True));

		array_push($cp, array('$B8', '', 'salvar', False, True));
		return ($cp);
	}

	function modalidade($line) {
		$modalidade = '';
		if ($line['pp_mestrado'] == '1') { $modalidade .= 'M;';
		}
		if ($line['pp_doutorado'] == '1') { $modalidade .= 'D;';
		}
		if ($line['pp_mestrado_prof'] == '1') { $modalidade .= 'P;';
		}
		if ($line['pp_pos_doutorado'] == '1') { $modalidade .= 'PhD;';
		}
		$modalidade = substr($modalidade, 0, strlen($modalidade) - 1);
		$modalidade = troca($modalidade, ';', '/');
		return ($modalidade);
	}

	function alunos_doutorandos($prog = 0) {
		$pf = array();
		$sql = "select * from (
						select count(*) as linhas, sspp_tipo as situacao, min(sspp_dt_entrada) as entrada, us_usuario_id_us, programa_pos_id_pp from ss_professor_programa_linha where sspp_ativo = 1
							group by us_usuario_id_us, programa_pos_id_pp, situacao
					) as professor
					inner join us_usuario on us_usuario_id_us = id_us
					where programa_pos_id_pp = $prog
					order by us_nome
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			array_push($pf, $line['us_usuario_id_us']);
		}
		return ($pf);

	}

	function professores_ss_do_programa($prog = 0) {
		$pf = array();
		$sql = "select * from (
						select count(*) as linhas, sspp_tipo as situacao, min(sspp_dt_entrada) as entrada, us_usuario_id_us, programa_pos_id_pp from ss_professor_programa_linha where sspp_ativo = 1
							group by us_usuario_id_us, programa_pos_id_pp, situacao
					) as professor
					inner join us_usuario on us_usuario_id_us = id_us
					where programa_pos_id_pp = $prog
					order by us_nome
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			array_push($pf, $line['us_usuario_id_us']);
		}
		return ($pf);
	}

	function lista_programas() {
		$sql = "select * from ss_programa_pos
						left join us_usuario on id_us = id_us_coordenador
						left join area_avaliacao on pp_area = id_area  
						where pp_ativo = 1 order by pp_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt2">';
		$sx .= '<tr>
							<th>Pos</th>
							<th>Programa</th>
							<th>Sigla</th>
							<th>Nível</th>
							<th>Código CAPES</th>
							<th>Área de avaliação</th>
							<th>Início Mestrado</th>
							<th>Início Doutorado</th>
							<th>Coordenador</th>
						</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Link */
			$link = '<A href="' . base_url('index.php/stricto_sensu/v/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp'])) . '" class="link lt2">';

			$sx .= '<tr valign="top">';
			$sx .= '<td class="border1">' . ($r + 1) . '</td>';
			$sx .= '<td class="border1">' . $link . $line['pp_nome'] . '</a>' . '</td>';
			$sx .= '<td align="left" class="border1">' . $link . $line['pp_sigla'] . '</a>' . '</td>';
			$modalidade = $this -> modalidade($line);
			$sx .= '<td class="border1" align="center">' . $modalidade . '</td>';

			$linkc = '<a href="http://conteudoweb.capes.gov.br/conteudoweb/ProjetoRelacaoCursosServlet?acao=detalhamentoIes&codigoPrograma=' . $line['pp_codigo_capes'] . '" class="link lt2" target="_new">';
			$sx .= '<td align="center" class="border1">' . $linkc . $line['pp_codigo_capes'] . '</a>' . '</td>';

			$sx .= '<td align="left" class="border1">' . $link . $line['area_avaliacao_nome'] . '</a>' . '</td>';
			$sx .= '<td align="center" class="border1">' . $link . $line['pp_ano_inicio'] . '</a>' . '</td>';
			$sx .= '<td align="center" class="border1">' . $link . $line['pp_ano_inicio_doutorado'] . '</a>' . '</td>';

			$sx .= '<td align="left" width="25%" class="border1">' . link_perfil($line['us_nome'], $line['id_us']) . '</td>';

			if (perfil('#CPP#SPI#ADM') == 1) {
				$link = '<A href="' . base_url('index.php/stricto_sensu/editar/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp'])) . '" class="link lt1">editar</A>';
				$sx .= '<td align="center" class="border1">' . $link . '</td>';
			}

			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

}
?>
