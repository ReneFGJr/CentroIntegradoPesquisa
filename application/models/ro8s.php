<?php
class ro8s extends CI_Model {

	function inport_semic_trabalho_autor($id = 0) {
		$tabela = "semic_nota_trabalhos";
		$offset = $id;

		echo '<hr>IMPORT<hr>';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=semic_ic_trabalho_autor&limit=50&offset=' . $offset;
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';

		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$id_sma = utf8_decode($xml -> id_sma);
			$sma_titulacao = utf8_decode($xml -> sma_titulacao);
			$sma_nome = utf8_decode($xml -> sma_nome);
			$sma_funcao = utf8_decode($xml -> sma_funcao);
			$sma_instituicao = utf8_decode($xml -> sma_instituicao);
			$sma_ativo = utf8_decode($xml -> sma_ativo);
			$sma_protocolo = utf8_decode($xml -> sma_protocolo);

			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $id_sma . '.</td>';
			$sx .= '<td>' . $sma_nome . '</td>';
			$sx .= '<td>' . $sma_titulacao . '</td>';
			$sx .= '<td>' . $sma_funcao . '</td>';

			$sql = "select * from semic_trabalho_autor where id_sma = '$id_sma' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$sql = "INSERT INTO semic_trabalho_autor
						(
							id_sma, sma_titulacao, sma_nome,
							sma_funcao, sma_instituicao, sma_ativo,
							sma_protocolo
						) VALUES (
							'$id_sma', '$sma_titulacao', '$sma_nome', 
							'$sma_funcao', '$sma_instituicao', '$sma_ativo',
							'$sma_protocolo'
						)";
				$this -> db -> query($sql);
				$in++;
				$sx .= '<td>novo registro</td>';
			} else {
				/* Atualiza registro */
				$sql = "UPDATE semic_trabalho_autor SET 
						sma_titulacao='$sma_titulacao',
						sma_nome='$sma_nome',
						sma_funcao='$sma_funcao',
						sma_instituicao='$sma_instituicao',
						sma_ativo='$sma_ativo'
						WHERE id_sma = $id_sma";
				//$this -> db -> query($sql);
				$sx .= '<td>atualizado registro</td>';

			}
		}
		$sx .= '</table>';
		echo $sx;
		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/semic-trabalho-autor/' . ($offset + 50));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';
	}

	function inport_semic_trabalho($id = 0) {
		$tabela = "semic_nota_trabalhos";
		$offset = $id;

		echo '<hr>IMPORT<hr>';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=semic_ic_trabalho&limit=50&offset=' . $offset;
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';

		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$id_sm = utf8_decode($xml -> id_sm);
			$sm_codigo = utf8_decode($xml -> sm_codigo);
			$sm_titulo = utf8_decode($xml -> sm_titulo);
			$sm_titulo_en = utf8_decode($xml -> sm_titulo_en);
			$sm_programa = utf8_decode($xml -> sm_programa);
			$sm_status = utf8_decode($xml -> sm_status);
			$sm_curso = utf8_decode($xml -> sm_curso);
			$sm_docente = utf8_decode($xml -> sm_docente);
			$sm_discente = utf8_decode($xml -> sm_discente);
			$sm_colaboradores = utf8_decode($xml -> sm_colaboradores);
			$sm_autores = utf8_decode($xml -> sm_autores);
			$sm_edital = utf8_decode($xml -> sm_edital);
			$sm_ano = utf8_decode($xml -> sm_ano);
			$sm_lastupdate = utf8_decode($xml -> sm_lastupdate);
			$sm_resumo_01 = utf8_decode($xml -> sm_resumo_01);
			$sm_resumo_02 = utf8_decode($xml -> sm_resumo_02);
			$sm_rem_01 = utf8_decode($xml -> sm_rem_01);
			$sm_rem_02 = utf8_decode($xml -> sm_rem_02);
			$sm_rem_03 = utf8_decode($xml -> sm_rem_03);
			$sm_rem_04 = utf8_decode($xml -> sm_rem_04);
			$sm_rem_05 = utf8_decode($xml -> sm_rem_05);
			$sm_rem_06 = utf8_decode($xml -> sm_rem_06);
			$sm_rem_11 = utf8_decode($xml -> sm_rem_11);
			$sm_rem_12 = utf8_decode($xml -> sm_rem_12);
			$sm_rem_13 = utf8_decode($xml -> sm_rem_13);
			$sm_rem_14 = utf8_decode($xml -> sm_rem_14);
			$sm_rem_15 = utf8_decode($xml -> sm_rem_15);
			$sm_rem_16 = utf8_decode($xml -> sm_rem_16);

			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $id_sm . '.</td>';
			$sx .= '<td>' . $sm_codigo . '</td>';
			$sx .= '<td>' . $sm_ano . '</td>';
			$sx .= '<td>' . $sm_titulo . '</td>';

			$sql = "select * from semic_trabalho where id_sm = '$id_sm' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$sql = "INSERT INTO semic_trabalho
						(
							id_sm, sm_codigo, sm_titulo, 
							sm_titulo_en, sm_programa, sm_status, 
							sm_curso, sm_docente, sm_discente, 
							sm_colaboradores, sm_autores, sm_edital, 
							sm_ano, sm_lastupdate, sm_resumo_01, 
							sm_resumo_02, sm_rem_01, sm_rem_02, 
							sm_rem_03, sm_rem_04, sm_rem_05, 
							sm_rem_06, sm_rem_11, sm_rem_12, 
							sm_rem_13, sm_rem_14, sm_rem_15, 
							sm_rem_16
						) VALUES (
							'$id_sm', '$sm_codigo', '$sm_titulo', 
							'$sm_titulo_en', '$sm_programa', '$sm_status', 
							'$sm_curso', '$sm_docente', '$sm_discente', 
							'$sm_colaboradores', '$sm_autores', '$sm_edital', 
							'$sm_ano', '$sm_lastupdate', '$sm_resumo_01', 
							'$sm_resumo_02', '$sm_rem_01', '$sm_rem_02', 
							'$sm_rem_03', '$sm_rem_04', '$sm_rem_05', 
							'$sm_rem_06', '$sm_rem_11', '$sm_rem_12', 
							'$sm_rem_13', '$sm_rem_14', '$sm_rem_15', 
							'$sm_rem_16'
						)";
				$this -> db -> query($sql);
				$in++;
				$sx .= '<td>novo registro</td>';
			} else {
				$line = $rlt[0];
				/* Atualiza registro */
				$trava = $line['sm_trava'];
				if ($trava == '0') {
					$sql = "UPDATE semic_trabalho SET 
						sm_codigo='$sm_codigo',
						sm_titulo='$sm_titulo',
						sm_titulo_en='$sm_titulo_en',
						sm_programa='$sm_programa',
						sm_status='$sm_status',
						sm_curso='$sm_curso',
						sm_docente='$sm_docente',
						sm_discente='$sm_discente',
						sm_colaboradores='$sm_colaboradores',
						sm_autores='$sm_autores',
						sm_edital='$sm_edital',
						sm_ano='$sm_ano',
						sm_lastupdate='$sm_lastupdate',
						sm_resumo_01='$sm_resumo_01',
						sm_resumo_02='$sm_resumo_02',
						sm_rem_01='$sm_rem_01',
						sm_rem_02='$sm_rem_02',
						sm_rem_03='$sm_rem_03',
						sm_rem_04='$sm_rem_04',
						sm_rem_05='$sm_rem_05',
						sm_rem_06='$sm_rem_06',
						sm_rem_11='$sm_rem_11',
						sm_rem_12='$sm_rem_12',
						sm_rem_13='$sm_rem_13',
						sm_rem_14='$sm_rem_14',
						sm_rem_15='$sm_rem_15',
						sm_rem_16='$sm_rem_16' 
						WHERE id_sm = $id_sm";
					$this -> db -> query($sql);
					$sx .= '<td>atualizado registro</td>';
				} else {
					$sx .= '<td>ignorado</td>';
				}

			}
		}
		$sx .= '</table>';
		echo $sx;
		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/semic-trabalho/' . ($offset + 50));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$site = base_url('index.php/inport/ro8/semic-trabalho-autor/');
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';
	}

	function inport_semic_notas($id = 0) {
		$tabela = "semic_nota_trabalhos";
		$offset = $id;

		echo '<hr>IMPORT<hr>';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=semic_nota_trabalhos&limit=100&offset=' . $offset;
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$id_st = utf8_decode($xml -> id_st);
			$st_codigo = utf8_decode($xml -> st_codigo);
			$st_cod_trabalho = utf8_decode($xml -> st_cod_trabalho);
			$st_edital = utf8_decode($xml -> st_edital);
			$st_modalidade = utf8_decode($xml -> st_modalidade);
			$st_id = utf8_decode($xml -> st_id);
			$st_area = utf8_decode($xml -> st_area);
			$st_nota_submint = utf8_decode($xml -> st_nota_submint);
			$st_nota_rel_parcial = utf8_decode($xml -> st_nota_rel_parcial);
			$st_nota_rel_final = utf8_decode($xml -> st_nota_rel_final);
			$st_nota_media = utf8_decode($xml -> st_nota_media);
			$st_nota_semic_oral = utf8_decode($xml -> st_nota_semic_oral);
			$st_nota_semic_poster = utf8_decode($xml -> st_nota_semic_poster);
			$st_status = utf8_decode($xml -> st_status);
			$st_cnpq = utf8_decode($xml -> st_cnpq);
			$st_area_geral = utf8_decode($xml -> st_area_geral);
			$st_section = utf8_decode($xml -> st_section);
			$st_eng = utf8_decode($xml -> st_eng);
			$st_professor = utf8_decode($xml -> st_professor);
			$st_aluno = utf8_decode($xml -> st_aluno);
			$st_nr = utf8_decode($xml -> st_nr);
			$st_oral = utf8_decode($xml -> st_oral);
			$st_poster = utf8_decode($xml -> st_poster);
			$st_ano = utf8_decode($xml -> st_ano);

			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $id_st . '.</td>';
			$sx .= '<td>' . $st_codigo . '</td>';
			$sx .= '<td>' . $st_cod_trabalho . '-' . $st_nr . '</td>';
			$sx .= '<td>' . $st_edital . '</td>';

			$sql = "select * from semic_nota_trabalhos where id_st = '$id_st' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {

				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "INSERT INTO semic_nota_trabalhos
						(
							id_st, st_codigo, st_cod_trabalho, st_edital, 
							st_modalidade, st_id, st_area, 
							st_nota_submint, st_nota_rel_parcial, 
							st_nota_rel_final, st_nota_media, st_nota_semic_oral, 
							st_nota_semic_poster, st_status, st_cnpq, 
							st_area_geral, st_section, st_eng, 
							st_professor, st_aluno, st_nr, 
							st_oral, st_poster, st_ano
						) VALUES (
							'$id_st', '$st_codigo', '$st_cod_trabalho', '$st_edital',
							'$st_modalidade', '$st_id', '$st_area',
							'$st_nota_submint', '$st_nota_rel_parcial',
							'$st_nota_rel_final', '$st_nota_media', '$st_nota_semic_oral',
							'$st_nota_semic_poster', '$st_status', '$st_cnpq',
							'$st_area_geral', '$st_section', '$st_eng',
							'$st_professor', '$st_aluno', '$st_nr',
							'$st_oral', '$st_poster', '$st_ano'	
						)";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "UPDATE semic_nota_trabalhos SET 
							st_codigo = '$st_codigo', 
							st_cod_trabalho = '$st_cod_trabalho', 
							st_edital = '$st_edital',  
							st_modalidade = '$st_modalidade', 
							st_id = '$st_id', 
							st_area = '$st_area', 
							st_nota_submint = '$st_nota_submint', 
							st_nota_rel_parcial = '$st_nota_rel_parcial', 
							st_nota_rel_final = '$st_nota_rel_final',
							st_nota_media = '$st_nota_media', 
							st_nota_semic_oral = '$st_nota_semic_oral', 
							st_nota_semic_poster = '$st_nota_semic_poster', 
							st_status = '$st_status', 
							st_cnpq = '$st_cnpq', 
							st_area_geral = '$st_area_geral', 
							st_section = '$st_section', 
							st_eng = '$st_eng', 
							st_professor = '$st_professor', 
							st_aluno = '$st_aluno', 
							st_nr = '$st_nr', 
							st_oral = '$st_oral', 
							st_poster = '$st_poster', 
							st_ano = '$st_ano'
							WHERE id_st = $id_st
							";
				$this -> db -> query($sql);
				$up++;
			}
		}

		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/semic-notas/' . ($offset + 100));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function inport_ic_parecer($id = 0, $ano) {
		$tabela = "pibic_parecer_" . $ano;
		$offset = $id;

		echo '<hr>IMPORT<hr>';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_parecer_' . $ano . '&limit=100&offset=' . $offset;

		$this -> load -> model('ic_pareceres');

		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$id_pp = utf8_decode($xml -> id_pp);
			$pp_nrparecer = utf8_decode($xml -> pp_nrparecer);
			$pp_tipo = utf8_decode($xml -> pp_tipo);
			$pp_protocolo = utf8_decode($xml -> pp_protocolo);
			$pp_protocolo_mae = utf8_decode($xml -> pp_protocolo_mae);
			$pp_avaliador = utf8_decode($xml -> pp_avaliador);
			$pp_revisor = utf8_decode($xml -> pp_revisor);
			$pp_status = utf8_decode($xml -> pp_status);
			$pp_pontos = utf8_decode($xml -> pp_pontos);
			$pp_pontos_pp = utf8_decode($xml -> pp_pontos_pp);
			$pp_data = utf8_decode($xml -> pp_data);
			$pp_data_leitura = utf8_decode($xml -> pp_data_leitura);
			$pp_hora = utf8_decode($xml -> pp_hora);
			$pp_parecer_data = utf8_decode($xml -> pp_parecer_data);
			$pp_parecer_hora = utf8_decode($xml -> pp_parecer_hora);
			$pp_p01 = utf8_decode($xml -> pp_p01);
			$pp_p02 = utf8_decode($xml -> pp_p02);
			$pp_p03 = utf8_decode($xml -> pp_p03);
			$pp_p04 = utf8_decode($xml -> pp_p04);
			$pp_p05 = utf8_decode($xml -> pp_p05);
			$pp_p06 = utf8_decode($xml -> pp_p06);
			$pp_p07 = utf8_decode($xml -> pp_p07);
			$pp_p08 = utf8_decode($xml -> pp_p08);
			$pp_p09 = utf8_decode($xml -> pp_p09);
			$pp_p10 = utf8_decode($xml -> pp_p10);
			$pp_p11 = utf8_decode($xml -> pp_p11);
			$pp_p12 = utf8_decode($xml -> pp_p12);
			$pp_p13 = utf8_decode($xml -> pp_p13);
			$pp_p14 = utf8_decode($xml -> pp_p14);
			$pp_p15 = utf8_decode($xml -> pp_p15);
			$pp_p16 = utf8_decode($xml -> pp_p16);
			$pp_p17 = utf8_decode($xml -> pp_p17);
			$pp_p18 = utf8_decode($xml -> pp_p18);
			$pp_p19 = utf8_decode($xml -> pp_p19);
			$pp_abe_01 = utf8_decode($xml -> pp_abe_01);
			$pp_abe_02 = utf8_decode($xml -> pp_abe_02);
			$pp_abe_03 = utf8_decode($xml -> pp_abe_03);
			$pp_abe_04 = utf8_decode($xml -> pp_abe_04);
			$pp_abe_05 = utf8_decode($xml -> pp_abe_05);
			$pp_abe_06 = utf8_decode($xml -> pp_abe_06);
			$pp_abe_07 = utf8_decode($xml -> pp_abe_07);
			$pp_abe_08 = utf8_decode($xml -> pp_abe_08);
			$pp_abe_09 = utf8_decode($xml -> pp_abe_09);
			$pp_abe_10 = utf8_decode($xml -> pp_abe_10);
			$pp_abe_11 = utf8_decode($xml -> pp_abe_11);
			$pp_abe_12 = utf8_decode($xml -> pp_abe_12);
			$pp_abe_13 = utf8_decode($xml -> pp_abe_13);
			$pp_abe_14 = utf8_decode($xml -> pp_abe_14);
			$pp_abe_15 = utf8_decode($xml -> pp_abe_15);
			$pp_abe_16 = utf8_decode($xml -> pp_abe_16);
			$pp_abe_17 = utf8_decode($xml -> pp_abe_17);
			$pp_abe_18 = utf8_decode($xml -> pp_abe_18);
			$pp_abe_19 = utf8_decode($xml -> pp_abe_19);

			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $id_pp . '.</td>';
			$sx .= '<td>' . $pp_nrparecer . '</td>';
			$sx .= '<td>' . $pp_protocolo . '-' . $pp_status . '</td>';
			$sx .= '<td>' . $pp_avaliador . '</td>';

			$sql = "select * from $tabela where id_pp = '$id_pp' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {

				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "INSERT INTO  $tabela ( 
						id_pp ,  pp_nrparecer ,  pp_tipo ,  
						pp_protocolo ,  pp_protocolo_mae ,  pp_avaliador ,  
						pp_revisor ,  pp_status ,  pp_pontos ,
						  
						pp_pontos_pp ,  pp_data ,  pp_data_leitura ,  
						pp_hora ,  pp_parecer_data ,  pp_parecer_hora ,  
						pp_p01 ,  pp_p02 ,  pp_p03 ,  pp_p04 ,  
						
						pp_p05 ,  pp_p06 ,  pp_p07 ,  
						pp_p08 ,  pp_p09 ,  pp_p10 ,  
						pp_p11 ,  pp_p12 ,  pp_p13 ,  
						
						pp_p14 ,  pp_p15 ,  pp_p16 ,  
						pp_p17 ,  pp_p18 ,  pp_p19 ,  
						pp_abe_01 ,  pp_abe_02 ,  
						
						pp_abe_03 ,  pp_abe_04 ,  pp_abe_05 ,  
						pp_abe_06 ,  pp_abe_07 ,  pp_abe_08 ,  
						pp_abe_09 ,  pp_abe_10 ,  pp_abe_11 ,  
						
						pp_abe_12 ,  pp_abe_13 ,  pp_abe_14 ,  
						pp_abe_15 ,  pp_abe_16 ,  pp_abe_17 ,  
						pp_abe_18 ,  pp_abe_19 
						) VALUES (
						'$id_pp','$pp_nrparecer','$pp_tipo',
						'$pp_protocolo','$pp_protocolo_mae','$pp_avaliador',
						'$pp_revisor','$pp_status','$pp_pontos',
						  
						'$pp_pontos_pp','$pp_data','$pp_data_leitura',
						'$pp_hora','$pp_parecer_data','$pp_parecer_hora',
						'$pp_p01','$pp_p02','$pp_p03','$pp_p04',
						
						'$pp_p05','$pp_p06','$pp_p07',
						'$pp_p08','$pp_p09','$pp_p10',
						'$pp_p11','$pp_p12','$pp_p13',
						
						'$pp_p14','$pp_p15','$pp_p16',
						'$pp_p17','$pp_p18','$pp_p19',
						'$pp_abe_01','$pp_abe_02',
						
						'$pp_abe_03','$pp_abe_04','$pp_abe_05',
						'$pp_abe_06','$pp_abe_07','$pp_abe_08',
						'$pp_abe_09','$pp_abe_10','$pp_abe_11',
						
						'$pp_abe_12','$pp_abe_13','$pp_abe_14',
						'$pp_abe_15','$pp_abe_16','$pp_abe_17',
						'$pp_abe_18','$pp_abe_19'			
						)";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "UPDATE pibic_parecer_" . $ano . " SET 
							pp_nrparecer='$pp_nrparecer',
							pp_tipo='$pp_tipo',
							pp_protocolo='$pp_protocolo',
							pp_protocolo_mae='$pp_protocolo_mae',
							pp_avaliador='$pp_avaliador',
							pp_revisor='$pp_revisor',
							pp_status='$pp_status',
							pp_pontos='$pp_pontos',
							pp_pontos_pp='$pp_pontos_pp',
							pp_data='$pp_data',
							pp_data_leitura='$pp_data_leitura',
							pp_hora='$pp_hora',
							pp_parecer_data='$pp_parecer_data',
							pp_parecer_hora='$pp_parecer_hora',
							pp_p01='$pp_p01',
							pp_p02='$pp_p02',
							pp_p03='$pp_p03',
							pp_p04='$pp_p04',
							pp_p05='$pp_p05',
							pp_p06='$pp_p05',
							pp_p07='$pp_p05',
							pp_p08='$pp_p05',
							pp_p09='$pp_p05',
							pp_p10='$pp_p10',
							pp_p11='$pp_p11',
							pp_p12='$pp_p12',
							pp_p13='$pp_p13',
							pp_p14='$pp_p14',
							pp_p15='$pp_p15',
							pp_p16='$pp_p16',
							pp_p17='$pp_p17',
							pp_p18='$pp_p18',
							pp_p19='$pp_p19',
							pp_abe_01='$pp_abe_01',
							pp_abe_02='$pp_abe_02',
							pp_abe_03='$pp_abe_03',
							pp_abe_04='$pp_abe_04',
							pp_abe_05='$pp_abe_05',
							pp_abe_06='$pp_abe_06',
							pp_abe_07='$pp_abe_07',
							pp_abe_08='$pp_abe_08',
							pp_abe_09='$pp_abe_09',
							pp_abe_10='$pp_abe_10',
							pp_abe_11='$pp_abe_11',
							pp_abe_12='$pp_abe_12',
							pp_abe_13='$pp_abe_13',
							pp_abe_14='$pp_abe_14',
							pp_abe_15='$pp_abe_15',
							pp_abe_16='$pp_abe_16',
							pp_abe_17='$pp_abe_17',
							pp_abe_18='$pp_abe_18',
							pp_abe_19='$pp_abe_19' 
							WHERE id_pp = $id_pp
							";
				$this -> db -> query($sql);
				$up++;
			}
		}

		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/ic_parecer/' . ($offset + 100) . '/' . $ano);
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';

		return ($sx);

	}

	function inport_ic_semic($id = 0) {
		$offset = $id;
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=semic_ic_trabalho&limit=100&offset=' . $offset;

		$this -> load -> model('semic/semic_trabalhos');

		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$sm_codigo = utf8_decode($xml -> sm_codigo);
			$sm_titulo = utf8_decode($xml -> sm_titulo);
			$sm_titulo_en = utf8_decode($xml -> sm_titulo_en);
			$sm_programa = utf8_decode($xml -> sm_programa);
			$sm_curso = utf8_decode($xml -> sm_curso);
			$sm_docente = utf8_decode($xml -> sm_docente);
			$sm_discente = utf8_decode($xml -> sm_discente);
			$sm_colaboradores = utf8_decode($xml -> sm_colaboradores);
			$sm_autores = utf8_decode($xml -> sm_autores);
			$sm_edital = utf8_decode($xml -> sm_edital);
			$sm_ano = utf8_decode($xml -> sm_ano);
			$sm_lastupdate = utf8_decode($xml -> sm_lastupdate);
			$sm_resumo_01 = utf8_decode($xml -> sm_resumo_01);
			$sm_resumo_02 = utf8_decode($xml -> sm_resumo_02);
			$sm_rem_01 = utf8_decode($xml -> sm_rem_01);
			$sm_rem_02 = utf8_decode($xml -> sm_rem_02);
			$sm_rem_03 = utf8_decode($xml -> sm_rem_03);
			$sm_rem_04 = utf8_decode($xml -> sm_rem_04);
			$sm_rem_05 = utf8_decode($xml -> sm_rem_05);
			$sm_rem_06 = utf8_decode($xml -> sm_rem_06);
			$sm_rem_11 = utf8_decode($xml -> sm_rem_11);
			$sm_rem_12 = utf8_decode($xml -> sm_rem_12);
			$sm_rem_13 = utf8_decode($xml -> sm_rem_13);
			$sm_rem_14 = utf8_decode($xml -> sm_rem_14);
			$sm_rem_15 = utf8_decode($xml -> sm_rem_15);
			$sm_rem_16 = utf8_decode($xml -> sm_rem_16);
			$sm_status = utf8_decode($xml -> sm_status);
			$sm_modalidade = utf8_decode($xml -> sm_modalidade);
			$sm_formacao = utf8_decode($xml -> sm_formacao);
			$sm_obs = utf8_decode($xml -> sm_obs);
			$sm_revisor = utf8_decode($xml -> sm_revisor);

			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $to . '.</td>';
			$sx .= '<td>' . $sm_codigo . '</td>';
			$sx .= '<td>' . $sm_edital . '-' . $sm_ano . '</td>';
			$sx .= '<td>' . $sm_titulo . '</td>';

			$sql = "select * from semic_ic_trabalho where sm_codigo = '$sm_codigo' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {

				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "INSERT INTO semic_ic_trabalho(
							sm_codigo, sm_titulo, 
							sm_titulo_en, sm_programa, sm_curso, 
							sm_docente, sm_discente, sm_colaboradores, 
							sm_autores, sm_edital, sm_ano, 
							sm_lastupdate, sm_resumo_01, sm_resumo_02, 
							sm_rem_01, sm_rem_02, sm_rem_03, 
							sm_rem_04, sm_rem_05, sm_rem_06, 
							sm_rem_11, sm_rem_12, sm_rem_13, 
							sm_rem_14, sm_rem_15, sm_rem_16, 
							sm_status, sm_modalidade, sm_formacao, 
							sm_obs, sm_revisor
							) VALUES (
							'$sm_codigo', '$sm_titulo', 
							'$sm_titulo_en', '$sm_programa', '$sm_curso', 
							'$sm_docente', '$sm_discente', '$sm_colaboradores', 
							'$sm_autores', '$sm_edital', '$sm_ano', 
							'$sm_lastupdate', '$sm_resumo_01', '$sm_resumo_02', 
							'$sm_rem_01', '$sm_rem_02', '$sm_rem_03', 
							'$sm_rem_04', '$sm_rem_05', '$sm_rem_06', 
							'$sm_rem_11', '$sm_rem_12', '$sm_rem_13', 
							'$sm_rem_14', '$sm_rem_15', '$sm_rem_16', 
							'$sm_status', '$sm_modalidade', '$sm_formacao', 
							'$sm_obs', '$sm_revisor'
							)
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update gp_instituicao_parceira set 
								";
				//$this -> db -> query($sql);
				$up++;
			}
		}

		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/semic_ic/' . ($offset + 100));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function inport_csf($id = 0) {
		$offset = $id;
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_bolsa_contempladas&limit=100&offset=' . $offset;

		$this -> load -> model('instituicoes');
		$this -> load -> model('paises');

		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$pb_protocolo = utf8_decode($xml -> pb_protocolo);
			$pb_aluno = utf8_decode($xml -> pb_aluno);
			$pb_tipo = utf8_decode($xml -> pb_tipo);
			$pb_status = utf8_decode($xml -> pb_status);
			$pb_titulo_plano = utf8_decode($xml -> pb_titulo_plano);
			$pb_area_conhecimento = utf8_decode($xml -> pb_area_conhecimento);
			$pb_ano = utf8_decode($xml -> pb_ano);
			$pb_professor = utf8_decode($xml -> pb_professor);

			$cracha = utf8_decode($xml -> pb_data);
			$cracha = utf8_decode($xml -> pb_hora);
			$cracha = utf8_decode($xml -> pb_ativo);
			$cracha = utf8_decode($xml -> pb_ativacao);
			$cracha = utf8_decode($xml -> pb_desativacao);
			$cracha = utf8_decode($xml -> pb_contrato);
			$cracha = utf8_decode($xml -> pb_titulo_projeto);
			$cracha = utf8_decode($xml -> pb_titulo_plano);
			$cracha = utf8_decode($xml -> pb_fomento);
			//$cracha = utf8_decode($xml -> pb_status);
			//$cracha = utf8_decode($xml -> pb_area_conhecimento);
			$cracha = utf8_decode($xml -> pb_codigo);
			$cracha = utf8_decode($xml -> pb_data_ativacao);
			$cracha = utf8_decode($xml -> pb_data_encerramento);
			$cracha = utf8_decode($xml -> pb_relatorio_parcial_nota);
			$cracha = utf8_decode($xml -> pb_relatorio_final);
			$cracha = utf8_decode($xml -> pb_relatorio_final_nota);
			$cracha = utf8_decode($xml -> pb_resumo);
			$cracha = utf8_decode($xml -> pb_resumo_nota);
			$cracha = utf8_decode($xml -> pibic_resumo_text);
			$cracha = utf8_decode($xml -> pibic_resumo_colaborador);
			//$cracha = utf8_decode($xml -> pibic_resumo_keywork);
			$cracha = utf8_decode($xml -> pb_ano);
			$cracha = utf8_decode($xml -> pb_semic);
			$cracha = utf8_decode($xml -> pb_relatorio_parcial);
			$cracha = utf8_decode($xml -> pb_semic_area);
			$cracha = utf8_decode($xml -> pb_semic_idioma);
			$cracha = utf8_decode($xml -> pb_relatorio_parcial_correcao);
			$cracha = utf8_decode($xml -> pb_relatorio_parcial_correcao_nota);
			$cracha = utf8_decode($xml -> pb_aluno_nome);
			$cracha = utf8_decode($xml -> pb_colegio);
			$cracha = utf8_decode($xml -> pb_colegio_orientador);
			$cracha = utf8_decode($xml -> pb_area_estrategica);

			$data_saida = $xml -> pb_data . '01';
			$data_saida = substr($data_saida, 0, 4) . '-' . substr($data_saida, 4, 2) . '-' . substr($data_saida, 6, 2);

			if ($pb_tipo == 'S') {
				//print_r($xml);

				$universidade = $this -> instituicoes -> busca_instituicao(utf8_decode($xml -> pb_colegio));
				$pais = $this -> paises -> busca_pais(utf8_decode($xml -> pb_colegio_orientador));

				echo '<HR>';
				$data = date("Y-m-d");

				$ativo = 1;
				//				$ativo = 1;
				$to++;
				$sx .= '<tr class="lt0">';
				$sx .= '<td>' . $to . '.</td>';
				$sx .= '<td>' . $pb_protocolo . '</td>';
				$sx .= '<td>' . $pb_aluno . '</td>';

				$sql = "select * from csf where csf_aluno = '$pb_aluno' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				if (count($rlt) == 0) {
					$data = date("Y-m-d");
					$sx .= '<td>novo registro</td>';
					/* Novo registro */
					$sql = "insert into csf 
									(
										csf_aluno, csf_orientador, csf_modalidade,
										csf_saida, csf_saida_previsao, csf_retorno,
										csf_retorno_previsao, csf_pa_intercambio, csf_pais, 

										csf_universidade, csf_status, csf_obs,
										csf_area, csf_curso, csf_chamada,
										csf_parceiro, csf_bolsista
									) values (
										'$pb_aluno','$pb_professor','1',
										'$data_saida','$data_saida','00000-00-00',
										'00000-00-00',0,'$pais',
										
										$universidade,5,0,
										0,0,0,
										0,0
									)
							";
					echo $sql;
					//$this -> db -> query($sql);
					$in++;
				} else {
					/* Atualiza registro */
					$sx .= '<td>atualizado registro</td>';
					$sql = "update gp_instituicao_parceira set 
											gpip_nome = '$nome',
											gpip_sigla = '$nome'
										where gpip_nome = '$nome'
								";
					//$this -> db -> query($sql);
					$up++;
				}
			}
		}
		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/csf/' . ($offset + 100));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function inport_pibic($id = 0) {
		$offset = $id;
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_bolsa_contempladas&limit=100&offset=' . $offset;

		$this -> load -> model('instituicoes');
		$this -> load -> model('paises');
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_sga');

		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$pb_protocolo = utf8_decode($xml -> pb_protocolo);
			$pb_aluno = utf8_decode($xml -> pb_aluno);
			$pb_tipo = utf8_decode($xml -> pb_tipo);
			$pb_status = utf8_decode($xml -> pb_status);
			$pb_titulo_plano = utf8_decode($xml -> pb_titulo_plano);
			$pb_area_conhecimento = utf8_decode($xml -> pb_area_conhecimento);
			$pb_ano = utf8_decode($xml -> pb_ano);
			$pb_professor = utf8_decode($xml -> pb_professor);
			$pb_aluno = utf8_decode($xml -> pb_aluno);
			$pb_data_ativacao = $xml -> pb_ativacao;
			$pb_data_ativacao = substr($pb_data_ativacao, 0, 4) . '-' . substr($pb_data_ativacao, 4, 2) . '-' . substr($pb_data_ativacao, 6, 2);
			$pb_status = $xml -> pb_status;

			/* Conversao do Tipo */
			$pb_tipo_c = 0;
			switch ($pb_tipo) {
				/* Desqualificado */
				case 'D' :
					$pb_tipo_c = 18;
					break;
				/* CNPq */
				case 'C' :
					$pb_tipo_c = 3;
					break;
				/* PUCPR */
				case 'P' :
					$pb_tipo_c = 14;
					break;
				/* PUCPR - PIBITI*/
				case 'O' :
					$pb_tipo_c = 8;
					break;
				/* PUCPR - BOLSA ESTRATEGICA */
				case 'U' :
					$pb_tipo_c = 20;
					break;
				/* PUCPR - CIENCIA E TRANSCENDENCIA */
				case '[' :
					$pb_tipo_c = 13;
					break;
				/* PUCPR - Mobilidade Internacional (Alunos estarngeiros) */
				case '5' :
					$pb_tipo_c = 36;
					break;
				/* PUCPR - Mobilidade Internacional (Alunos estarngeiros) */
				case '4' :
					$pb_tipo_c = 11;
					break;
				/* PUCPR - Mobilidade Internacional (Alunos estarngeiros) */
				case '3' :
					$pb_tipo_c = 12;
					break;
				/* PUCPR - JUVENTUDES */
				case '7' :
					$pb_tipo_c = 6;
					break;
				/* PUCPR - DOUTORANDO */
				case 'M' :
					$pb_tipo_c = 33;
					break;
				/* PUCPR - EM */
				case 'J' :
					$pb_tipo_c = 24;
					break;
				/* CNPq - EM */
				case 'H' :
					$pb_tipo_c = 25;
					break;
				/* CNPq - EM */
				case 'L' :
					$pb_tipo_c = 26;
					break;
				/* CNPq - Estrategica */
				case 'E' :
					$pb_tipo_c = 19;
					break;
				/* CNPq - GR2 */
				case '2' :
					$pb_tipo_c = 15;
					break;
				/* AGENCIA */
				case 'G' :
					$pb_tipo_c = 22;
					break;
				/* FUNDACAO */
				case 'F' :
					$pb_tipo_c = 4;
					break;
				/* FUNDACAO - PIBITI */
				case '=' :
					$pb_tipo_c = 9;
					break;
				/* FUNDACAO - IS */
				case 'N' :
					$pb_tipo_c = 5;
					break;
				/* FUNDACAO - IS Tecnológica */
				case 'Z' :
					$pb_tipo_c = 7;
					break;
				/* CNPQ - PIBITI */
				case 'B' :
					$pb_tipo_c = 21;
					break;
				/* VOLUNTARIOS */
				case 'I' :
					$pb_tipo_c = 16;
					break;
				/* VOLUNTARIOS */
				case 'A' :
					$pb_tipo_c = 16;
					break;
				/* VOLUNTARIOS - PIBITI */
				case 'V' :
					$pb_tipo_c = 23;
					break;
				case 'Y' :
					$pb_tipo_c = 23;
					break;
				/* CsF */
				case 'S' :
					$pb_tipo_c = -1;
					break;
				case 'T' :
					$pb_tipo_c = -1;
					$pb_tipo = 'S';
					break;
				case '' :
					$pb_tipo_c = -1;
					$pb_tipo = 'S';
					break;
				case '{' :
					$pb_tipo_c = -1;
					$pb_tipo = 'S';
					break;
				case '}' :
					$pb_tipo_c = -1;
					$pb_tipo = 'S';
					break;
				default :
					echo 'OPS - [' . $pb_tipo . '] - ' . $pb_protocolo;
					exit ;
					break;
			}

			$data_saida = $xml -> pb_data . '01';
			$data_saida = substr($data_saida, 0, 4) . '-' . substr($data_saida, 4, 2) . '-' . substr($data_saida, 6, 2);
			$sx .= '<tr><td>' . $pb_protocolo . '</td>';
			$sx .= '<td>' . $pb_ano . '</td>';
			$ok = 0;
			if ($pb_tipo != 'S') {
				$sql = "select * from ic 
							where ic_plano_aluno_codigo = '$pb_protocolo' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				if (count($rlt) > 0) {
					$line = $rlt[0];
					$lt_aluno = trim($line['ic_cracha_aluno']);
					$lt_status = $line['s_id_char'];
					$ida = $line['id_ic'];

					/* Comparacoes */
					$ok = 0;
					/* Modalidade da Bolsa */
					$sql = "update ic_aluno set
									mb_id = $pb_tipo_c,
									mb_id_char = '$pb_tipo'
									where ic_id = $ida ";
					$rrr = $this -> db -> query($sql);

					/* Status */
					if ($pb_status != $line['s_id_char']) {

						echo '<br>Status Diferente - ' . $pb_status . ' ' . $lt_status . ' - ' . $pb_protocolo . '<hr>';

						if (($pb_status == 'C') and ($lt_status == 'A')) {
							$this -> ics -> cancelar_protocolo($pb_protocolo);
							$ok = 1;
						}
						if (($pb_status == 'F')) {
							$sql = "update ic_aluno set
									icas_id = 4,
									icas_id_char = 'F'
									where ic_id = $ida; ".cr();
							$sql = "update ic set
										s_id_char = 'F',
										s_id = 4
									where id_ic = $ida ";
							
							$rrr = $this -> db -> query($sql);
						}
						if ($ok == 0) {
							//print_r($line);
							//echo '<hr>';
							//print_r($xml);
							//exit;
						}
					}
					if ($pb_professor != $line['ic_cracha_prof']) {
						echo '<br>Professor diferente';
						$ok = 1;
					}
					if ($pb_aluno != $line['ic_cracha_aluno']) {
						/* Consulta dados do aluno */
						$rs = $this -> ws_sga -> findStudentByCracha($pb_aluno);

						$this -> ics -> substituicao_aluno($lt_aluno, $pb_protocolo, $pb_aluno, $pb_data_ativacao);
						echo '<br>Aluno diferente';
						$ok = 1;
					}
				}
			}
		}
		$sx .= '</tr>';
		$sx .= '</table>';
		if ($RowT > 0) {
			$url = base_url('index.php/inport/ro8/pibic/' . ($offset + 100));
			$sx .= '<meta http-equiv="refresh" content="5;' . $url . '">';
		}
		return ($sx);
	}

	function inport_professor($id = 0) {
		$offset = $id;
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_professor&limit=100&offset=' . $offset;
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$nome = utf8_decode($xml -> pp_nome);
			$nome = nbr_autor($nome, 8);
			$cracha = utf8_decode($xml -> pp_cracha);
			$cpf = sonumero(utf8_decode($xml -> pp_cpf));
			$update = $xml -> pp_update;
			$genero = utf8_decode($xml -> pp_genero);
			$nasc = utf8_decode($xml -> pp_nasc);
			$lattes = utf8_decode($xml -> pp_nome_lattes);
			$nasc = substr($nasc, 0, 4) . '-' . substr($nasc, 4, 2) . '-' . substr($nasc, 6, 2);
			$data = date("Y-m-d");

			$ativo = 1;
			//				$ativo = 1;
			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $to . '.</td>';
			$sx .= '<td>' . $nome . '</td>';
			$sx .= '<td>' . $cracha . '</td>';

			$sql = "select * from us_usuario where us_cracha = '$cracha' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "insert into us_usuario 
									(
										us_nome, us_cpf, us_cracha,
										us_emplid, us_link_lattes, us_ativo,
										us_teste, us_origem, us_professor_tipo, 

										us_usuario_cursando, us_regime, us_genero,
										usuario_tipo_ust_id, usuario_funcao_usf_id, usuario_titulacao_ust_id,
										us_dt_nascimento, us_prof_drh, us_avaliador
									) values (
										'$nome','$cpf','$cracha',
										'','$lattes',1,
										'0','2', '1',
										
										'1', '0', '$genero',
										'2', 1, 1,
										'$nasc', 0, 0
									)
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update gp_instituicao_parceira set 
											gpip_nome = '$nome',
											gpip_sigla = '$nome'
										where gpip_nome = '$nome'
								";
				//$this -> db -> query($sql);
				$up++;
			}
		}
		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/professor/' . ($offset + 100));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function inport_estudante($id = 0) {
		return('');
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_aluno&limit=100&offset=' . $id;
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {
			$xml = $xmlRaw -> record[$r];

			$nome = utf8_decode($xml -> pa_nome);
			$nome = nbr_autor($nome, 8);
			$cracha = utf8_decode($xml -> pa_cracha);
			$cpf = sonumero(utf8_decode($xml -> pa_cpf));
			$update = $xml -> pa_update;
			$genero = utf8_decode($xml -> pa_genero);
			$nasc = utf8_decode($xml -> pa_nasc);
			$lattes = utf8_decode($xml -> pa_lattes);
			$lattes_nome = utf8_decode($xml -> pa_nome_lattes);
			if (strlen($lattes_nome) == 0)
				{
					$lattes_nome = utf8_decode($xml -> pa_nome);		
				}
			$nasc = substr($nasc, 0, 4) . '-' . substr($nasc, 4, 2) . '-' . substr($nasc, 6, 2);
			$data = date("Y-m-d");

			$ativo = 1;
			//				$ativo = 1;
			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $to . '.</td>';
			$sx .= '<td>' . $nome . '</td>';
			$sx .= '<td>' . $lattes . '</td>';
			$sx .= '<td>' . $lattes_nome . '</td>';
			$sx .= '<td>' . $cracha . '</td>';

			$sql = "select * from us_usuario where us_cracha = '$cracha' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "insert into us_usuario 
									(
										us_nome, us_cpf, us_cracha,
										us_emplid, us_link_lattes, us_nome_lattes, us_ativo,
										us_teste, us_origem, us_professor_tipo, 

										us_usuario_cursando, us_regime, us_genero,
										usuario_tipo_ust_id, usuario_funcao_usf_id, usuario_titulacao_ust_id,
										us_dt_nascimento, us_prof_drh, us_avaliador
									) values (
										'$nome','$cpf','$cracha',
										'','$lattes','$lattes_nome',1,
										'0','3', '1',
										
										'1', '0', '$genero',
										'3', 1, 1,
										'$nasc', 0, 0
									)
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update us_usuario set
											us_nome = '$nome',
											us_link_lattes = '$lattes', 
											us_nome_lattes = '$lattes_nome',
											us_genero = '$genero'
										where us_cracha = '$cracha'
								";
				$this -> db -> query($sql);
				$up++;
			}
		}

		$sx .= '</table>';
		if ($RowT > 0) {
			$site = base_url('index.php/inport/ro8/estudante/' . ($id + 100));
			echo '
					<meta http-equiv="refresh" content="5;' . $site . '">
					';
		} else {
			$sx .= '<h1>FIM</h1>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function inport_cip_artigos() {
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=artigo&limit=3000';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=artigo&limit=1000&offset=0';
		//get the raw textdata of sample.xml
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {

			$xml = $xmlRaw -> record[$r];

			$ar_protocolo = utf8_decode($xml -> ar_protocolo);
			$id_ar = utf8_decode($xml -> id_ar);
			$ar_titulo = utf8_decode($xml -> ar_titulo);
			$ar_protocolo = utf8_decode($xml -> ar_protocolo);
			$ar_professor = utf8_decode($xml -> ar_professor);
			$ar_issn = utf8_decode($xml -> ar_issn);
			$ar_ano = utf8_decode($xml -> ar_ano);
			$ar_vol = utf8_decode($xml -> ar_vol);
			$ar_num = utf8_decode($xml -> ar_num);
			$ar_pags = utf8_decode($xml -> ar_pags);
			$ar_journal = utf8_decode($xml -> ar_journal);
			$ar_status = utf8_decode($xml -> ar_status);
			$ar_data = utf8_decode($xml -> ar_data);
			$ar_hora = utf8_decode($xml -> ar_hora);
			$ar_update = utf8_decode($xml -> ar_update);
			$ar_obs = utf8_decode($xml -> ar_obs);
			$ar_q = utf8_decode($xml -> ar_q);
			$ar_er = utf8_decode($xml -> ar_er);
			$ar_a = utf8_decode($xml -> ar_a);
			$ar_tipo = utf8_decode($xml -> ar_tipo);
			$ar_doi = utf8_decode($xml -> ar_doi);
			$ar_coordenador = utf8_decode($xml -> ar_coordenador);
			$ar_comentario = utf8_decode($xml -> ar_comentario);
			$ar_v1 = utf8_decode($xml -> ar_v1);
			$ar_v2 = utf8_decode($xml -> ar_v2);
			$ar_v3 = utf8_decode($xml -> ar_v3);
			$ar_v4 = utf8_decode($xml -> ar_v4);
			$ar_v5 = utf8_decode($xml -> ar_v5);
			$ar_c1 = round('0' . utf8_decode($xml -> ar_c1));
			$ar_c2 = round('0' . utf8_decode($xml -> ar_c2));
			$ar_c3 = round('0' . utf8_decode($xml -> ar_c3));
			$ar_c4 = round('0' . utf8_decode($xml -> ar_c4));
			$ar_c5 = round('0' . utf8_decode($xml -> ar_c5));
			$ar_colaboracao = utf8_decode($xml -> ar_colaboracao);
			$ar_sponsor = utf8_decode($xml -> ar_sponsor);
			$ar_estudante = utf8_decode($xml -> ar_estudante);

			$ativo = 1;
			//				$ativo = 1;
			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $ar_protocolo . '.</td>';
			$sx .= '<td>' . $ar_professor . '</td>';
			$sx .= '<td>' . $ar_journal . '</td>';

			$sql = "select * from cip_artigo where ar_protocolo = '$ar_protocolo' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "INSERT INTO cip_artigo(
					            id_ar, ar_titulo, ar_protocolo, ar_professor, ar_issn, ar_ano, 
					            ar_vol, ar_num, ar_pags, ar_journal, ar_status, ar_data, ar_hora, 
					            ar_update, ar_obs, ar_q, ar_er, ar_a, ar_tipo, ar_doi, ar_coordenador, 
					            ar_comentario, ar_v1, ar_v2, ar_v3, ar_v4, ar_v5, ar_c1, ar_c2, 
					            ar_c3, ar_c4, ar_c5, ar_colaboracao, ar_sponsor, ar_estudante)
					    VALUES ($id_ar, '$ar_titulo', '$ar_protocolo', '$ar_professor', '$ar_issn', '$ar_ano', 
					            '$ar_vol', '$ar_num', '$ar_pags', '$ar_journal', '$ar_status', '$ar_data', '$ar_hora', 
					            '$ar_update', '$ar_obs', '$ar_q', '$ar_er', '$ar_a', '$ar_tipo', '$ar_doi', '$ar_coordenador', 
					            '$ar_comentario', '$ar_v1', '$ar_v2', '$ar_v3', '$ar_v4', '$ar_v5', '$ar_c1', '$ar_c2', 
					            '$ar_c3', '$ar_c4', '$ar_c5', '$ar_colaboracao', '$ar_sponsor', '$ar_estudante');
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update cip_artigo set 
											ar_titulo = '$ar_titulo',
											ar_status = '$ar_status'
										where ar_protocolo = '$ar_protocolo'
								";
				//$this -> db -> query($sql);
				$up++;
			}
		}

		$sx .= '</table>';

		$sql = "update cip_artigo set ar_situacao = 7 where ar_status = 24 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 1 where ar_status = 0 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 5 where ar_status = 1 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 3 where ar_status = 10 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 2 where ar_status = 8 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 9 where ar_status = 9 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 8 where ar_status = 90 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 10  where ar_status = 23 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 8  where ar_status = 25 ";
		$this -> db -> query($sql);
		$sql = "update cip_artigo set ar_situacao = 11  where ar_status = 2 ";
		$this -> db -> query($sql);
		return ($sx);
	}

	function inport_insituicao() {
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=instituicao&limit=3000';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=instituicao&limit=1000&offset=800';
		//get the raw textdata of sample.xml
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);

		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {

			$xml = $xmlRaw -> record[$r];

			$nome = utf8_decode($xml -> inst_nome);
			$abre = utf8_decode($xml -> inst_abreviatura);
			$inst_lat = utf8_decode($xml -> inst_lat);
			$inst_log = utf8_decode($xml -> inst_log);
			$ordem = $xml -> inst_ordem;
			$data = date("Y-m-d");

			$ativo = 1;
			//				$ativo = 1;
			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $to . '.</td>';
			$sx .= '<td>' . $nome . '</td>';
			$sx .= '<td>' . $abre . '</td>';

			$sql = "select * from gp_instituicao_parceira where gpip_nome = '$nome' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "insert into gp_instituicao_parceira 
									(
										gpip_nome, gpip_sigla, gpip_uf,
										gpip_use,
										gpip_latitude, gpip_longitude, gpip_ordem
									) values (
										'$nome','$abre','',
										0,
										'$inst_lat','$inst_log',$ordem
									)
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update gp_instituicao_parceira set 
											gpip_nome = '$nome',
											gpip_sigla = '$abre'
										where gpip_nome = '$nome'
								";
				$this -> db -> query($sql);
				$up++;
			}
		}

		$sx .= '</table>';
		return ($sx);
	}

	function inport_ic_noticia() {
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=ic_noticia&limit=1000';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=ic_noticia&limit=3000';
		//get the raw textdata of sample.xml
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {

			$xml = $xmlRaw -> record[$r];
			$jid = $xml -> nw_journal;

			$titulo = utf8_decode($xml -> nw_titulo);
			$texto = utf8_decode($xml -> nw_descricao);
			$data = $xml -> nw_dt_cadastro;
			$ativo = round('0' . $xml -> nw_ativo);
			//				$ativo = 1;
			$ref = UpperCaseSql($xml -> nw_ref);
			if ($jid == 20) {
				$to++;
				$sx .= '<tr class="lt0">';
				$sx .= '<td>' . $to . '.</td>';
				$sx .= '<td>' . $xml -> id_nw . '</td>';
				$sx .= '<td>' . $jid . '</td>';
				$sx .= '<td>' . $ref . '</td>';
				$sx .= '<td>' . $titulo . '</td>';

				$sql = "select * from mensagens where nw_ref = '$ref' and nw_own = 'IC' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				/* Trata texto */
				$texto = troca($texto, '[e]', '&');
				$texto = troca($texto, '&lt;', '<');
				$texto = troca($texto, '&rt;', '>');
				$texto = troca($texto, "'", '"');
				if (count($rlt) == 0) {
					$sx .= '<td>novo registro</td>';

					/* Novo registro */
					$sql = "insert into mensagens 
										(
										nw_titulo, nw_ref, nw_texto,
										nw_dt_cadastro, nw_own, nw_ativo
										) values (
										'$titulo','$ref','$texto',
										$data,'IC',$ativo
										)
								";
					$this -> db -> query($sql);
					$in++;
				} else {
					/* Atualiza registro */
					$sx .= '<td>atualizado registro</td>';
					$sql = "update mensagens set 
											nw_titulo = '$titulo',
											nw_texto = '$texto'
										where nw_ref = '$ref' and nw_own = 'IC'
								";
					$this -> db -> query($sql);
					$up++;
				}
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

}
?>
