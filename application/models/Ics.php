<?php
class ics extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";
	var $tabela_3 = "pibic_acompanhamento";

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
	
	function alterar_titulo_plano($proto,$titulo)
		{
			$sql = "update ic set ic_projeto_professor_titulo = '$titulo'
						where 	ic_plano_aluno_codigo = '$proto' ";
			$rlt = $this -> db -> query($sql);
			return(1);
		}

	function alterar_orientador_plano($proto,$prof)
		{
			$sql = "update ic set ic_cracha_prof = '$prof'
						where 	ic_plano_aluno_codigo = '$proto' ";
			$rlt = $this -> db -> query($sql);
			return(1);
		}

	function pagamentos_ic($cracha)
		{
			$sql = "select * from us_usuario where us_cracha = '$cracha' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					$cpf = strzero(sonumero($rlt[0]['us_cpf']),11);
					$sql = "SELECT * 
							FROM ic_pagamentos 
							WHERE pg_cpf = '$cpf' 
							ORDER BY pg_vencimento
							";
					$rlt = $this->db->query($sql);
					$rlt = $rlt->result_array();
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
					for ($r=0;$r < count($rlt);$r++)
						{
							$line = $rlt[$r];
							$sx .= '<tr>';
							$sx .= '<td align="center">'.($r+1).'</td>';
							$sx .= '<td align="center">'.stodbr($line['pg_vencimento']).'</td>';
							$sx .= '<td align="center">'.$line['pg_nrdoc'].'</td>';
							$sx .= '<td align="left">'.$line['pg_nome'].'</td>';
							$sx .= '<td align="center">'.mask_cpf($line['pg_cpf']).'</td>';
							$sx .= '<td align="right">'.number_format($line['pg_valor'],2,',','.').'</td>';
							$sx .= '<td align="center">'.$line['pg_banco'].'</td>';
							$sx .= '<td align="center">'.$line['pg_agencia'].'</td>';
							$sx .= '<td align="center">'.$line['pg_conta'].'</td>';
							$sx .= '<td align="center">'.$line['pg_cc'].'</td>';
							$tot = $tot + $line['pg_valor'];
						}
					$sx .= '<tr><td align="right" colspan=10"><b>Valor total '.number_format($tot,2,',','.').'</b></td></tr>';
					$sx .= '</table>';
					return($sx);
				}
			return('');
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
					<th align="left">nome_aluno</th>
					<th align="left">cpf_aluno</th>
					<th align="left">curso_aluno</th>
					<th align="left">nome_prof</th>
					<th align="left">curso_prof</th>
					<th align="right">status</th>
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

	function reativar_protocolo($protocolo,$ica) {
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

	function set_area_semic($proto,$area)
		{
			$sql = "update ic set ic_semic_area = '$area' where ic_plano_aluno_codigo = '$proto' ";
			$this->db->query($sql);
			return(1);
		}	
	function set_idioma_semic($proto,$idioma)
		{
			$sql = "update ic set ic_semic_idioma = '$idioma' where ic_plano_aluno_codigo = '$proto' ";
			$this->db->query($sql);
			return(1);
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
			$line = $this->le($id);
			return($line);
		} else {
			return(array());
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
	
	function le_form_prof($plano = 0){
		$sql = "select * from ic_acompanhamento" . " 
					where pa_protocolo = " . $plano;

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
						left join area_conhecimento on ic_semic_area = ac_cnpq
						$wh
						order by $orderby ic_ano desc, s_id, ic_plano_aluno_codigo, pf_nome, al_nome
						limit $limit offset $offset
						";
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
		$sql = "select * from ic_modalidade_bolsa where id_mb = ".$obj['pr_ica'];
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
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
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
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
		$this -> ics -> reativar_protocolo($proto,$obj['pr_ica']);

		/****************************************/
		/* Enviar e-mail de cancelamento        */
		$data = $this -> ics -> le_protocolo($proto);

		$txt = $this -> load -> view('ic/plano-email', $data, true);
		$txt .= '<hr>' . $this -> load -> view('ic/protocolo.php', $data, true);
		enviaremail_usuario($us_id, 'Cancelamento de orientação', $txt, 2);

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
	
	function cp_alterar_orientador()
		{
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$Q us_cracha:us_nome:select * from us_usuario where usuario_tipo_ust_id =2 and us_ativo = 1 order by us_nome', '', 'Nome do novo orientador', True, False));
		array_push($cp, array('$T80:5', '', 'Justificativa', True, True));
		array_push($cp, array('$B', '', 'Confirmar alteração >>>', False, True));
		return ($cp);	
		}
	
	function cp_cancelar()
		{
		$cp = array();
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para o cancelamento', True, True));
		array_push($cp, array('$B', '', 'Confirmar cancelamento >>>', False, True));
		return ($cp);
		}	

	function cp_troca_bolsa($id=0)
		{
		$cp = array();
		$sql = "select * from ic_modalidade_bolsa where mb_ativo = 1 and mb_vigente = 1 order by mb_descricao ";
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para troca', True, True));
		array_push($cp, array('$Q id_mb:mb_descricao:'.$sql, '', 'Nova modalidade', True, True));
		array_push($cp, array('$B', '', 'Confirmar alteração >>>', False, True));
		return ($cp);
		}

	function cp_reativar($id=0)
		{
		$cp = array();
		$sql = "select * from (
					select * from ic_aluno  
					inner join us_usuario on aluno_id = id_us 
					where ic_id = $id) as tabela ";
		array_push($cp, array('$H8', 'id_ic', '', False, True));
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$T80:5', '', 'Justificativa para reativar', True, True));
		array_push($cp, array('$QR id_ica:us_nome:'.$sql, '', 'Estudante para reativar', True, True));
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
	
	function cp_atividades()
		{
		$cp = array();
		$opA = 'IC_FORM_PROF:Formulário de acompanhamento do professor';
		$opA .= '&IC_FORM_RP:Entrega do Relatório Parcial';
		array_push($cp, array('$H8', 'id_at', '', False, True));
		array_push($cp, array('$O '.$opA, 'at_atividade', msg('Atividade'), False, True));
		array_push($cp, array('$D8', 'at_data_ini', msg('data_inicial'), True, True));
		array_push($cp, array('$D8', 'at_data_fim', msg('data_final'), True, True));
		array_push($cp, array('$[2014-'.date("Y").']', 'at_ano', msg('ic_edital_ano'), True, True));

		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'ic_dt_ativacao', msg('Ativação'), True, True));

		return ($cp);
		}

	function cp_switch() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_form_acompanhamento'), False, True));
		array_push($cp, array('$SW', 'sw_04', msg('sw_ic_rel_final'), False, True));
		array_push($cp, array('$SW', 'sw_05', msg('sw_ic_resumo'), False, True));
		//array_push($cp, array('$SW', 'sw_03', msg('sw_ic_rel_final'), False, True));
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

	function orientadores_ic($ano1=0, $ano2=0)
		{
			if ($ano2 == 0) { $ano2 = $ano1; }
			$sql = "select distinct us_nome, us_cracha, us_cpf, id_us, 
							us_campus_vinculo, us_escola_vinculo, 
							us_curso_vinculo, es_escola, us_ativo
					from ic
					left join us_usuario on ic_cracha_prof = us_cracha 
					left join escola on id_es = us_escola_vinculo
				    where ic_ano >= '$ano1' and ic_ano <= '$ano2'
				    		and (s_id = 1 or s_id = 4 or s_id = 3) 
				    order by us_nome ";

			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<h2>Orientadores '.$ano1.'</h2>';
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
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$tot++;
					$sx .= '<tr>';
					$sx .= '<td class="borderb1">';
					$sx .= link_perfil($line['us_nome'],$line['id_us'],$line);
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
			$sx .= '<tr><td colspan=10>Total '.$tot.' orientadores</td></tr>';
			$sx .= '</table>';
			return($sx);
		}
		
		
		function validar_area($area)
			{
				$ok = 0;
				$sql = "select * from area_conhecimento where ac_cnpq = '$area' ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				if (count($rlt) > 0)
					{
						$line = $rlt[0];
						$ok = $line['ac_semic'];
					}
				return($ok);
			}
		function validar_idioma($idioma)
			{
				$ok = 0;
				$sql = "select * from idioma where i_codificacao = '$idioma' ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				if (count($rlt) > 0)
					{
						$line = $rlt[0];
						$ok = $line['i_ativo'];
					}
				return($ok);
			}
		function validar_arquivo($proto,$tipo)
			{
				
				$ok = 0;
				$sql = "select count(*) as total from ic_ged_documento where doc_dd0 = '$proto' and doc_tipo = '$tipo' ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				if (count($rlt) > 0)
					{
						$line = $rlt[0];
						if ($line['total'] > 0)
							{
								$ok = 1;
							}
					}
				return($ok);
			}

}
?>
