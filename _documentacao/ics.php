<?php
class ics extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";

	function entregas_abertas() {
		$sis = $this -> sistemas_abertos_para_submissao('PIBIC');
		$sx = 'xxx';
		/* Question�rio de pr�-relatorio parcial */
		if (trim($sis['sw_04']) == '1') {
			$sx .= $this -> submissao_questionarios();
		}
		return ($sx);
	}

	/* Submissoes */
	function submissao_questionarios() {
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_prof = '$cracha' 
						and ic_ano = '" . date("Y") . "'
						and s_id = 1
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$protoPA = trim($line['pa_protocolo']);
			if (strlen($protoPA) == 0)
				{
					echo $proto.'-'.$protoPA;
					echo ', parab�ns ';
				}

		}
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

	function inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs = '') {
		$data = date("Ymd");
		$hora = date("H:i");
		$log = $_SESSION['cracha'];

		$sql = "select * from ic_historico
					where bh_protocolo = '$proto'
					and bh_data = $data
					and bh_acao = $ac
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
		$sx = '<h2>Resumo de implementa��es ' . ($ano) . '-' . ($ano + 1) . '</h2>';
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

	function report_guia_estudante_xls($ano1 = 0, $ano2 = 0, $mod = '') {
		$sx = '';
		$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
		if (strlen($mod) > 0) {
			$wh .= ' and id_mb = ' . $mod;
		}
		$sql = $this -> table_view($wh, 0, 9999999, 'al_nome');
		//$sql .= " order by al_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="lt1">';
		$sx .= '<tr><th>protocolo<th>ano<th>nome_aluno<th>cracha_aluno<th>curso_aluno<th>nome_prof<th>cracha_prof<th>curso_prof<th>status<th>bolsa<th>modalidade<th>fomento<th>titulo</tr>';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$sx .= '<tr>';

			$sx .= '<td>';
			$sx .= $line['ic_plano_aluno_codigo'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['ic_ano'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['al_nome'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['ic_cracha_aluno'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['al_curso'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['pf_nome'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['ic_cracha_prof'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['pf_curso'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['s_situacao'];
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

			$sx .= '<td>';
			$sx .= $line['ic_projeto_professor_titulo'];
			$sx .= '</td>';

			$sx .= '</tr>';

		}
		$sx .= '<tr><td colspan=10>Total ' . $to . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	function report_guia_estudante($ano1 = 0, $ano2 = 0, $mod = '') {
		$sx = '';
		$wh = "(ic_ano >= $ano1 and ic_ano <= $ano2) ";
		if (strlen($mod) > 0) {
			$wh .= ' and id_mb = ' . $mod;
		}
		$sql = $this -> table_view($wh, 0, 9999999, 'al_nome');
		//$sql .= " order by al_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';
		$sh = '<tr><th>protocolo</th>
					<th>ano</th>
					<th>nome_aluno</th>
					<th>curso_aluno</th>
					<th>nome_prof</th>
					<th>curso_prof</th>
					<th>status</th>
					</tr>';
		$to = 0;
		$xmb = '';
		for ($r = 0; $r < count($rlt); $r++) {

			$line = $rlt[$r];
			$st = $line['icas_id'];
			$sf = '';
			$sff = '';
			if ($st == '2') {
				$sf = '<font color="red"><s>';
				$sff = '</s></font>';
			} else {
				$to++;
			}

			/**/
			$link_ic = link_ic($line['id_ic'], 'ic');

			$mb = $line['mb_descricao'];

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $link_ic . $line['ic_plano_aluno_codigo'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $sf . $line['ic_ano'] . $sff;
			$sx .= '</td>';

			$sx .= '<td>';
			$link = $sf . link_perfil($line['al_nome'], $line['aluno_id']);
			$sx .= $link . $sff;

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

			$sx .= '<td>';
			$sx .= $sf . $line['s_situacao'] . $sff;
			$sx .= '</td>';

			$sx .= '</tr>';

		}
		$sx .= '<tr><td colspan=10>Total ' . $to . ' registros</td></tr>';
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
		$sx .= 'Total: ' . $to;
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

			echo '<font color="blue">';
			print_r($line);

			echo '</font>';
			$idc = $line['id_ica'];
			$sql = "update ic_aluno set
								icas_id_char = 'S',
								icas_id = 3,
								aic_dt_saida = '$data',
								aic_dt_fim_bolsa = '$data'								
							where id_ica = " . $idc . ';' . cr();

			$sqli = "
							insert into ic_aluno 
							(
							aluno_id, ic_aluno_cracha, ic_id,
							mb_id, mb_id_char, icas_id, 
							icas_id_char,
							aic_dt_entrada, aic_dt_saida, aic_dt_inicio_bolsa,
							aic_dt_fim_bolsa 
							)
							values
							(
							$ida, '$cracha_novo','$ic_id',
							'$mb_id','$mb_id_char','$icas_id', '$icas_id_char',
							'$data','0000-00-00','$data',
							'0000-00-00'
							) 
					";
			$sqld = "
							update ic_aluno
							set aluno_id = $ida, ic_aluno_cracha = '$cracha_novo'
							where id_ica = " . $idc;

			$sqlf = "update ic set 
								ic_cracha_aluno = '$cracha_novo',
								ic_dt_ativacao = '$data'
								where ic_plano_aluno_codigo = '$protocolo' ";
			//$this->db->query($sql);
			//$this->db->query($sqli);
			$this -> db -> query($sqld);
			$this -> db -> query($sqlf);
		}
		echo '<hr>' . $sql . '<hr>';
		echo '<hr>' . $sqli . '<hr>';
	}

	function resumo_orientacoes() {
		$sx = '';
		$sx .= '<table width="100%" class="border1 lt1">';
		$sx .= '<tr><th>' . msg('guidelines_ic') . '</th></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function orientacoes() {
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

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%">';
		$sx .= '<tr><td colspan=10>Orienta��es abertas</td></tr>';
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

	function resumo_autores_mostra($id) {
		$funcao = array();
		$funcao['0'] = 'Discente';
		$funcao['1'] = '???';
		$funcao['2'] = 'Co-orientador';
		$funcao['3'] = 'Colaborador';
		$funcao['4'] = 'Pibic Junior';
		$funcao['5'] = 'Supervisor Pibic Junior';
		$funcao['6'] = 'Escola (para Pibic J�nior)';
		$funcao['7'] = 'Mestrando de P�s-Gradua��o';
		$funcao['8'] = 'Doutorando de P�s-Gradua��o';
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
						<th width="20%">Institui��o (SIGLA)</th>
						<th width="10%">a��o</th>
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
									<font class="error"><b>Sem autores inclu�dos</B>
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
			/* Titulo e Titulo em Ingl�s */
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
			$dd1 = troca($dd1, "'", "�");
			$dd2 = troca($dd2, "'", "�");
			$dd3 = troca($dd3, "'", "�");
			$dd4 = troca($dd4, "'", "�");
			$dd5 = troca($dd5, "'", "�");
			$dd6 = troca($dd6, "'", "�");

			/* Titulo e Titulo em Ingl�s */
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
			$dd1 = troca($dd1, "'", "�");
			$dd2 = troca($dd2, "'", "�");
			$dd3 = troca($dd3, "'", "�");
			$dd4 = troca($dd4, "'", "�");
			$dd5 = troca($dd5, "'", "�");
			$dd6 = troca($dd6, "'", "�");

			/* Titulo e Titulo em Ingl�s */
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
			/* Titulo e Titulo em Ingl�s */
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
			return ('Nome j� foi inserido!');
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
			/* Cadastro autom�tico do estudante e orientador */
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
					<tr><td colspan=2 align="left" class="lt6 borderb1"><b>' . msg('resumo') . '</b><br><font class="lt0">orinta��es ativas</td></tr>
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

		$sx .= '<tr><td align="right" class="borderb1">Total de estudantes de gradua��o</td><td class="lt5 borderb1">' . ($ed['PIBIC'] + $ed['PIBITI']) . '</td></tr>';

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
		$sx .= ' at� ';
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

	function table_view($wh = '', $offset = 0, $limit = 9999999, $orderby = '') {
		if (strlen($wh) > 0) {
			$wh = 'where (' . $wh . ') ';
		}
		if (strlen($orderby) > 0) {
			$orderby .= ', ';
		}
		$tabela = "	select * from ic
            			left join ic_aluno as pa on ic_id = id_ic
						left join (select us_cpf as al_cpf, us_cracha as id_al, id_us as aluno_id, us_nome as al_nome, us_cracha as al_cracha,us_curso_vinculo as al_curso from us_usuario) AS us_est on pa.ic_aluno_cracha = us_est.id_al
						left join (select us_cpf as pf_cpf, us_cracha as id_pf, id_us as prof_id, us_nome as pf_nome, us_cracha as pf_cracha, us_curso_vinculo as pf_curso from us_usuario) AS us_prof on ic.ic_cracha_prof = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						$wh
						order by $orderby ic_ano desc, ic_plano_aluno_codigo, pf_nome, al_nome
						limit $limit offset $offset
						";
		return ($tabela);
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
		array_push($cp, array('$T80:6', '', 'Introdu��o', True, True));
		array_push($cp, array('$T80:6', '', 'Objetivo(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Metodologia', True, True));
		array_push($cp, array('$T80:6', '', 'Resultado(s)', True, True));
		array_push($cp, array('$T80:6', '', 'Conclus�o(�es)', True, True));
		array_push($cp, array('$T80:2', '', 'Palavras-chave', True, True));
		array_push($cp, array('$B8', '', 'Avan�ar pr�xima p�gina >>>', False, True));

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
		array_push($cp, array('$B8', '', 'Avan�ar pr�xima p�gina >>>', False, True));

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
		array_push($cp, array('$D8', 'ic_dt_ativacao', msg('Ativa��o'), True, True));
		array_push($cp, array('$T80:6', 'ic_projeto_professor_titulo', msg('ic_plano_titulo'), True, True));
		array_push($cp, array('$H8', 'ic_plano_aluno_nome', '', False, True));

		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'ic_dt_ativacao', msg('Ativa��o'), True, True));

		return ($cp);
	}

	function cp_switch() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_04', msg('sw_ic_rel_acomp'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_rel_final'), False, True));
		array_push($cp, array('$B', '', msg('sw_update'), False, True));
		return ($cp);
	}

	/** Proetos por escolas */
	function mostra_projetos_por_escolas() {
		$dados = array();
		$dados['Escola de Arquitetura e Design'] = 51;
		$dados['Escola de Ci�ncias Agr�rias e Medicina Veterin�ria'] = 162;
		$dados['Escola de Comunica��o e Artes'] = 34;
		$dados['Escola de Direito'] = 143;
		$dados['Escola de Educa��o e Humanidades'] = 262;
		$dados['Escola de Medicina'] = 144;
		$dados['Escola de Neg�cios'] = 82;
		$dados['Escola de Sa�de e Bioci�ncias'] = 295;
		$dados['Escola Polit�cnica'] = 257;
		return ($dados);
	}

	function mostra_projetos_por_escolas_professor() {
		$dados = array();
		$dados['Ci�ncia da computa��o'] = 18;
		$dados['Engenharia ambiental'] = 33;
		$dados['Engenharia civil'] = 36;
		$dados['Engenharia de alimentos'] = 8;
		$dados['Engenharia de computa��o'] = 14;
		$dados['Engenharia de controle e automa��o'] = 38;
		$dados['Engenharia de produ��o'] = 25;
		$dados['Engenharia mec�nica'] = 29;
		$dados['Engenharia el�trica'] = 16;
		$dados['Engenharia qu�mica'] = 9;
		$dados['Sistemas de informa��o'] = 16;
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
		array_push($cp, array('${', '', 'Gest�o de Bolsas', False, True));
		array_push($cp, array('$S25', 'mb_descricao', msg('lb_mb_descricao'), False, True));
		array_push($cp, array('$S8', 'mb_tipo', msg('lb_mb_tipo'), True, True));
		array_push($cp, array('$O 1:sim&0:n�o', 'mb_ativo', msg('lb_mb_ativo'), True, True));
		array_push($cp, array('$O 1:sim&0:n�o', 'mb_vigente', msg('lb_mb_vigente'), True, True));
		array_push($cp, array('$O R$:R$&US:US', 'mb_moeda', msg('lb_mb_moeda'), False, True));
		array_push($cp, array('$S10', 'mb_valor', msg('lb_mb_valor'), True, True));
		array_push($cp, array('$S8', 'mb_fomento', msg('lb_mb_fomento'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		return ($cp);
	}

}
?>