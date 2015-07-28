<?php
class ro8s extends CI_Model {

	function inport_csf($id = 0) {
		$offset = $id;
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_bolsa_contempladas&limit=100&offset='.$offset;

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
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&table=pibic_bolsa_contempladas&limit=10000&offset=0';

		$this -> load -> model('instituicoes');
		$this -> load -> model('paises');
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
		}
		$sx .= '</table>';

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
			$lattes = utf8_decode($xml -> pa_nome_lattes);
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
