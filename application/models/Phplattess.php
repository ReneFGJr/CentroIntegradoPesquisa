<?php
class phpLattess extends CI_Model {
	
	/********************************
	 * Relatórios */
	function producao_artigos()
		{
		$sql = "select acpp_ano, count(*) as total 
					from cnpq_acpp inner 
					join us_usuario on acpp_autor = us_nome_lattes 
					group by acpp_ano";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		return($rlt);
		}
		
	function producao_bibliografica()
		{
		$sql = "select cc_ano, count(*) as total 
					from cnpq_bibliografia inner 
					join us_usuario on cc_nome = us_nome_lattes 
					where cc_ano > 1980 and cc_ano <= '".date("Y")."'
					group by cc_ano";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		return($rlt);
		}
		
	function producao_orientacao()
		{
		$sql = "select or_ano, count(*) as total 
					from cnpq_orientacao inner 
					join us_usuario on or_nome = us_nome_lattes 
					where or_ano > 1980 and or_ano <= '".date("Y")."'
					group by or_ano";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		return($rlt);
		}	
	function producao_patente()
		{
		$sql = "select pt_ano, count(*) as total 
					from cnpq_patente inner 
					join us_usuario on pt_nome = us_nome_lattes 
					where pt_ano > 1980 and pt_ano <= '".date("Y")."'
					group by pt_ano";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		return($rlt);
		}			
		
	
	function inport_lattes_orientacoes($tipo='TESE') {
		$file = $this -> next_file_process($tipo.'_');
		$sx = '<h3>Processando Arquivos Lattes - '.$tipo.'</h3>';

		/* Processar */
		if (strlen($file) > 0) {
			/* Processar arquivo */
			$sx .= $file;
			$txt = fopen($file, 'r');
			$s = '';
			while (!feof($txt)) {
				$s .= fread($txt, 1024);
			}
			fclose($txt);

			$ln = troca($s, chr(13), '¢');
			$ln = troca($ln, '"', '_');
			$ln = splitx('¢', $ln);

			for ($r = 1; $r < count($ln); $r++) {
				$lll = $ln[$r];
				$lll = troca($lll, "'", '´');
				$l = splitx(';', $lll . ';');

				if (count($l) > 0) {

					/* Dados */
					$autor = trim(troca($l[0], '_', ''));
					$titulo = trim(troca($l[1], '_', ''));
					$titulo = trim(troca($titulo, '\\', ''));
					$ano = trim(troca($l[2], '_', ''));
					$orientado = trim(troca($l[3], '_', ''));
					$instituicao = trim(troca($l[4], '_', ''));
					$curso = trim(troca($l[5], '_', ''));
										
					$outros = '';
					for ($t = 4; $t < 20; $t++) {
						if (isset($l[$t])) {
							$outros .= $l[$t] . ' ';
						}
					}
					$outros = trim(troca($outros,'_',' '));
					
					$sx .= '<br>' . $autor . ', <b>' . $titulo . '</b>';
					$sx .= ', ' . $ano . ', ' . $orientado;

					$sql = "select * from cnpq_orientacao
								where or_nome = '$autor'
									and or_orientado = '$orientado'
									and or_ano = '$ano' 
									and or_tipo = '$tipo' ";
					$rlt = $this -> db -> query($sql);

					$rlt = $rlt -> result_array();

					if (count($rlt) == 0) {
						//$sx .= '<br>'.$sql;
						$sql = "insert into cnpq_orientacao
								(
								or_nome, or_orientado, or_ano, 
								or_titulo, or_instituicao, or_tipo,
								or_curso
								) values (
								'$autor','$orientado','$ano',
								'$titulo','$instituicao','$tipo',
								'$curso'
								)
							";
						$rltx = $this -> db -> query($sql);
						$sx .= ' <font color="green"><b>Inserido</b></font>';
					} else {
						$sx .= ' <font color="red"><b>já inserido</b></font>';
					}
				} else {
					$sx .= '<br><font color="red">' . $ln[$r] . '</font>';
				}

			}
			unlink($file);
			$sx .= '<meta http-equiv="refresh" content="10">';
		}
		return ($sx);
	}	

	function inport_lattes_patente($tipo='PATEN') {
		$file = $this -> next_file_process($tipo.'_');
		$sx = '<h3>Processando Arquivos Lattes - '.$tipo.'</h3>';

		/* Processar */
		if (strlen($file) > 0) {
			/* Processar arquivo */
			$sx .= $file;
			$txt = fopen($file, 'r');
			$s = '';
			while (!feof($txt)) {
				$s .= fread($txt, 1024);
			}
			fclose($txt);

			$ln = troca($s, chr(13), '¢');
			$ln = troca($ln, '"', '_');
			$ln = splitx('¢', $ln);

			for ($r = 1; $r < count($ln); $r++) {
				$lll = $ln[$r];
				$lll = troca($lll, "'", '´');
				$l = splitx(';', $lll . ';');

				if (count($l) > 0) {

					/* Dados */
					$autor = trim(troca($l[0], '_', ''));
					$titulo = trim(troca($l[1], '_', ''));
					$titulo = trim(troca($titulo, '\\', ''));
					$ano = trim(troca($l[2], '_', ''));
					$registro = trim(troca($l[3], '_', ''));
										
					$outros = '';
					for ($t = 4; $t < 20; $t++) {
						if (isset($l[$t])) {
							$outros .= $l[$t] . ' ';
						}
					}
					$outros = trim(troca($outros,'_',' '));
					
					$sx .= '<br>' . $autor . ', <b>' . $titulo . '</b>';
					$sx .= ', ' . $ano . ', ' . $registro;

					$sql = "select * from cnpq_patente
								where pt_nome = '$autor'
									and pt_registro = '$registro'
									and pt_ano = '$ano' ";
					$rlt = $this -> db -> query($sql);

					$rlt = $rlt -> result_array();

					if (count($rlt) == 0) {
						//$sx .= '<br>'.$sql;
						$sql = "insert into cnpq_patente
								(
								pt_nome, pt_registro, pt_ano, 
								pt_titulo, pt_outros
								) values (
								'$autor','$registro','$ano',
								'$titulo','$outros'
								)
							";
						$rltx = $this -> db -> query($sql);
						$sx .= ' <font color="green"><b>Inserido</b></font>';
					} else {
						$sx .= ' <font color="red"><b>já inserido</b></font>';
					}
				} else {
					$sx .= '<br><font color="red">' . $ln[$r] . '</font>';
				}

			}
			unlink($file);
			$sx .= '<meta http-equiv="refresh" content="10">';
		}
		return ($sx);
	}
	
	function inport_lattes_evento($tipo='EVENC') {
		$file = $this -> next_file_process($tipo.'_');
		$sx = '<h3>Processando Arquivos Lattes - '.$tipo.'</h3>';

		/* Processar */
		if (strlen($file) > 0) {
			/* Processar arquivo */
			$sx .= $file;
			$txt = fopen($file, 'r');
			$s = '';
			while (!feof($txt)) {
				$s .= fread($txt, 1024);
			}
			fclose($txt);

			$ln = troca($s, chr(13), '¢');
			$ln = troca($ln, '"', '_');
			$ln = splitx('¢', $ln);

			for ($r = 1; $r < count($ln); $r++) {
				$lll = $ln[$r];
				$lll = troca($lll, "'", '´');
				$l = splitx(';', $lll . ';');

				if (count($l) > 0) {

					/* Dados */
					$autor = trim(troca($l[0], '_', ''));
					$titulo = trim(troca($l[1], '_', ''));
					$titulo = trim(troca($titulo, '\\', ''));
					$evento = trim(troca($l[2], '_', ''));
					$isbn = trim(troca($l[3], '_', ''));
					$ano = trim(troca($l[4], '_', ''));
					$vol = trim(troca($l[5], '_', ''));
					$pagi = trim(troca($l[6],'_',''));
					$pagf = trim(troca($l[7],'_',''));
					$num = trim(troca($l[8],'_',''));
					$ordem = trim(troca($l[9],'_',''));
					$doi = trim(troca($l[10],'_',''));
					
					$outros = '';
					for ($t = 6; $t < 20; $t++) {
						if (isset($l[$t])) {
							$outros .= $l[$t] . ' ';
						}
					}
					$outros = trim(troca($outros,'_',' '));
					
					$sx .= '<br>' . $autor . ', <b>' . $titulo . '</b>';
					$sx .= ', ' . $ano . ', ' . $isbn;

					$sql = "select * from cnpq_evento
								where ev_nome = '$autor'
									and ev_isbn = '$isbn'
									and ev_ano = '$ano'
									and ev_titulo = '$titulo' 
									and ev_tipo = '$tipo'
									and ev_volume = '$vol'
									and ev_pag_ini = '$pagi' ";
					$rlt = $this -> db -> query($sql);

					$rlt = $rlt -> result_array();

					if (count($rlt) == 0) {
						//$sx .= '<br>'.$sql;
						$sql = "insert into cnpq_evento
								(
								ev_nome, ev_isbn, ev_ano, ev_volume, ev_num,
								ev_titulo, ev_outros, ev_tipo, ev_pag_ini, ev_pag_fim,
								ev_doi, ev_evento
								) values (
								'$autor','$isbn','$ano','$vol','$num',
								'$titulo','$outros', '$tipo','$pagi','$pagf',
								'$doi','$evento'
								)
							";
						$rltx = $this -> db -> query($sql);
						$sx .= ' <font color="green"><b>Inserido</b></font>';
					} else {
						$sx .= ' <font color="red"><b>já inserido</b></font>';
					}
				} else {
					$sx .= '<br><font color="red">' . $ln[$r] . '</font>';
				}

			}
			unlink($file);
			$sx .= '<meta http-equiv="refresh" content="10">';
		}
		return ($sx);
	}	

	function inport_lattes_bibliografia($tipo='LIVRO') {
		$file = $this -> next_file_process($tipo.'_');
		$sx = '<h3>Processando Arquivos Lattes - '.$tipo.'</h3>';

		/* Processar */
		if (strlen($file) > 0) {
			/* Processar arquivo */
			$sx .= $file;
			$txt = fopen($file, 'r');
			$s = '';
			while (!feof($txt)) {
				$s .= fread($txt, 1024);
			}
			fclose($txt);

			$ln = troca($s, chr(13), '¢');
			$ln = troca($ln, '"', '_');
			$ln = splitx('¢', $ln);

			for ($r = 1; $r < count($ln); $r++) {
				$lll = $ln[$r];
				$lll = troca($lll, "'", '´');
				$l = splitx(';', $lll . ';');

				if (count($l) > 0) {

					/* Dados */
					$autor = trim(troca($l[0], '_', ''));
					$titulo = trim(troca($l[1], '_', ''));
					$isbn = trim(troca($l[2], '_', ''));
					$ano = trim(troca($l[3], '_', ''));
					$idioma = trim(troca($l[4], '_', ''));
					$vol = trim(troca($l[5], '_', ''));
					$pagina = trim(troca($l[6],'_',''));
					$doi = trim(troca($l[11],'_',''));
					$editora = trim(troca($l[7],'_',' '));

					$outros = '';
					for ($t = 6; $t < 20; $t++) {
						if (isset($l[$t])) {
							$outros .= $l[$t] . ' ';
						}
					}
					$outros = trim(troca($outros,'_',' '));
					
					$sx .= '<br>' . $autor . ', <b>' . $titulo . '</b>';
					$sx .= ', ' . $ano . ', ' . $isbn;

					$sql = "select * from cnpq_bibliografia 
								where cc_nome = '$autor'
									and cc_isbn = '$isbn'
									and cc_ano = '$ano'
									and cc_titulo = '$titulo' 
									and cc_tipo = '$tipo'
									and cc_idioma = '$idioma'
									and cc_volume = '$vol' ";
					$rlt = $this -> db -> query($sql);

					$rlt = $rlt -> result_array();

					if (count($rlt) == 0) {
						//$sx .= '<br>'.$sql;
						$sql = "insert into cnpq_bibliografia
								(
								cc_nome, cc_isbn, cc_ano, cc_volume, cc_idioma,
								cc_titulo, cc_outros, cc_tipo, cc_paginas,
								cc_doi, cc_editora
								) values (
								'$autor','$isbn','$ano','$vol','$idioma',
								'$titulo','$outros', '$tipo','$pagina',
								'$doi', '$editora'
								)
							";
						$rltx = $this -> db -> query($sql);
						$sx .= ' <font color="green"><b>Inserido</b></font>';
					} else {
						$sx .= ' <font color="red"><b>já inserido</b></font>';
					}
				} else {
					$sx .= '<br><font color="red">' . $ln[$r] . '</font>';
				}

			}
			unlink($file);
			$sx .= '<meta http-equiv="refresh" content="10">';
		}
		return ($sx);
	}

	function inport_lattes_professar() {
		$sx = '<h3>Processando Arquivos Lattes - Artigos</h3>';
		$file = $this -> next_file_process('ARTIG_');
		if (strlen($file) > 0) {
			/* Processar arquivo */
			$sx .= $file;
			$txt = fopen($file, 'r');
			$s = '';
			while (!feof($txt)) {
				$s .= fread($txt, 1024);
			}
			fclose($txt);

			$ln = troca($s, chr(13), '¢');
			$ln = splitx('¢', $ln);

			for ($r = 1; $r < count($ln); $r++) {
				$lll = $ln[$r];
				$lll = troca($lll, "'", '´');
				$l = splitx(';', $lll . ';');

				$acpp_autor = troca(trim($l[0]), '"', '');
				$acpp_tipo = $l[1];
				$acpp_idioma = $l[2];

				$acpp_ano = troca(trim($l[3]), '"', '');
				$acpp_titulo = troca(trim($l[4]), '"', '');
				$acpp_ordem = $l[5];

				$acpp_relevante = $l[6];
				$acpp_periodico = $l[7];
				$acpp_issn = $l[8];

				$acpp_volume = $l[9];
				$acpp_fasciculo = $l[10];
				$acpp_pg_ini = troca(trim($l[11]), '"', '');

				$acpp_pg_fim = troca($l[12], '"', '');
				$acpp_editora = $l[13];
				$acpp_doi = $l[14];

				$acpp_jcr = $l[15];
				$acpp_qualis = $l[16];
				$acpp_circulacao = $l[17];

				$acpp_qt_autores = $l[18];

				$acpp_autores = '';

				$sql = "select * from cnpq_acpp 
										where acpp_autor = '$acpp_autor'
										and acpp_titulo = '$acpp_titulo'
										and acpp_ano = '$acpp_ano'
										and acpp_pg_ini = '$acpp_pg_ini'
										and acpp_pg_fim = '$acpp_pg_fim'
									";
				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();

				if (count($rrr) == 0) {

					for ($rq = 19; $rq < count($l); $rq++) { $acpp_autores .= trim($l[$rq]) . '; ';
					}

					$sql = "insert into cnpq_acpp (
							acpp_autor, acpp_tipo, acpp_idioma,
							acpp_ano, acpp_titulo, acpp_ordem,
							acpp_relevante, acpp_periodico, acpp_issn,
							
							acpp_volume, acpp_fasciculo, acpp_pg_ini,
							acpp_pg_fim, acpp_editora, acpp_doi,
							acpp_jcr, acpp_qualis, acpp_circulacao,
							
							acpp_qt_autores, acpp_autores
							) values (
							'$acpp_autor', '$acpp_tipo', '$acpp_idioma',
							'$acpp_ano', '$acpp_titulo', '$acpp_ordem',
							'$acpp_relevante', '$acpp_periodico', '$acpp_issn',
							
							'$acpp_volume', '$acpp_fasciculo', '$acpp_pg_ini',
							'$acpp_pg_fim', '$acpp_editora', '$acpp_doi',
							'$acpp_jcr', '$acpp_qualis', '$acpp_circulacao',
							
							'$acpp_qt_autores', '$acpp_autores'
							)";
					$sql = troca($sql, '"', '');
					$this -> db -> query($sql);
					$sx .= '<br>Inserido ' . $acpp_autor . ' ' . $acpp_periodico . ' ' . $acpp_ano;
				} else {
					$sx .= '<br><font color="red">Já cadastrado</font>: ' . $acpp_autor . ' ' . $acpp_periodico . ' (<B>' . $acpp_titulo . '</B>) ' . $acpp_ano . '-' . $acpp_pg_ini;
				}
			}
			unlink($file);
			$sx .= '<meta http-equiv="refresh" content="10">';
		}
		return ($sx);
	}

	function next_file_process($tipo = 'TIPO') {
		$ft = 0;
		for ($r = 0; $r < 1000; $r++) {
			$fl = $tipo . strzero($r, 4);
			if (file_exists('_document/' . $fl)) {
				return ('_document/' . $fl);
			}
		}
		return ('');
	}

	function arquivos_salva_quebrado($ln, $tipo) {
		$lnh = $ln[0];
		$arq = 0;
		$pos = 0;
		$open = 0;
		$cr = chr(13);
		dir('_document/');
		$sx = '';
		for ($r = 1; $r < count($ln); $r++) {
			if (($pos == 0) or ($pos > 49)) {
				if ($open == 1) { fclose($farq);
				}
				$farq = fopen('_document/' . $tipo . '_' . strzero($arq++, 4), 'w');
				$sx .= '<BR>Salvando... ' . $tipo . '_' . strzero($arq, 4);
				fwrite($farq, $lnh . $cr);
				$open = 1;
				$pos = 0;
			}
			$pos++;
			fwrite($farq, $ln[$r] . $cr);
		}
		if ($open == 1) { fclose($farq);
		}
		return ($sx);
	}

	function tipo_obra($ln, $file = '') {
		$file = substr($file, 0, strpos($file, '0'));

		$tp = '';
		if ($file == 'LP') { $tp = 'LIVRO';
		}

		if (strpos($ln, '"Título do Projeto";') > 0) { $tp = 'PROJE';
		}

		if (strpos($ln, '"Tipo da Produção";"Idioma";"Ano";"Título do Artigo";') > 0) { $tp = 'ARTIG';
		}

		if ($file == 'PAT') { $tp = 'PATEN';
		}		

		if (strpos($ln, '"Título da Dissertação de Mestrado";"Ano";"Orientado";"Instituição";"Curso"') > 0) {
			$tp = 'DISSE';
		}
		if (strpos($ln, '"Título da Tese de Doutorado";"Ano";"Orientado";"Instituição";"Curso"') > 0) {
			$tp = 'TESE';
		}
		/* Capitulos de livros */
		if ($file == 'TCPE') {
			$tp = 'EVENC';
		}		
		
		/* Capitulos de livros */
		if ($file == 'CLP') {
			$tp = 'CAPIT';
		}		

		/* Obras organizadas */
		if ($file == 'OOP') {
			$tp = 'ORGAN';
		}		
		
		/* Pós-Doc */
		if ($file == 'OCSPD') {
			$tp = 'POSDC';
		}
		/* Coorientacao Dissertação */
		if ($file == 'OCSPD') {
			$tp = 'CDISS';
		}
		/* Coorientação Tese */
		if ($file == 'COCTD') {
			$tp = 'CTESE';
		}

		if (strlen($tp) == 0) {
			echo '<pre>' . $ln . '</pre>';
			exit ;
		}
		return ($tp);
	}

	function inport_lattes_acpp($id = 0) {
		if (isset($_POST['dd1'])) { $dd1 = $_POST['dd1'];
		} else { $dd1 = '';
		}
		$file = '';
		if (strlen($dd1) > 0) {
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];
			$file = $_FILES['arquivo']['name'];
		} else {
			$temp = '';
		}

		if (strlen($temp) == 0) {
			$sx = '
					<center>
							<form id="upload" action="' . base_url('index.php/inport/lattes/arquivo/') . '" method="post" enctype="multipart/form-data">
							<input type="file" name="arquivo" id="arquivo" />
							<input type="submit" name="dd1" value="enviar >>>">
						</form>
					</center>					
					';
			return ($sx);
		} else {
			$sx = 'Arquivo lido com sucesso!';
			$rHandle = fopen($temp, "r");
			$sData = '';
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Abrindo Arquivo ';
			while (!feof($rHandle)) {
				$sData .= fread($rHandle, filesize($temp));
			}
			fclose($rHandle);
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Tamanho do arquivo lido ' . number_format(strlen($sData) / 1024, 1, ',', '.') . ' kBytes';

			$ln = splitx(chr(13), $sData);
			$sx .= '<BR>Total de linhas: ' . count($ln);
			$sx .= '<BR>Indentificação do tipo de obra: ';
			/* Identicação do tipo de obra */
			$tpo = $this -> tipo_obra($ln[0], $file);
			if (strlen($tpo) > 0) {
				$sx .= '<B>' . $tpo . '</B>';
				$sx .= $this -> arquivos_salva_quebrado($ln, $tpo);
				$sx .= '<BR>SALVO!';
			} else {
				$sx .= '<font color="red">Tipo de obra não identificada</font>';
				for ($r = 0; $r < 100; $r++) {
					print_r($ln[$r]);
					echo '<HR>';
				}
			}
			return ($sx);
		}
	}

	function dgp_import($link) {
		if (substr($link, 0, 4) != 'http') {
			$link = 'http://' . $link;
		}

		$data = $this -> inport_data($link);
		$data = $this -> removeSCRIPT($data);
		$data = $this -> removeCLASS($data);
		$data = $this -> removeSPACE($data);
		$data = $this -> removeTAG($data);

		/* Dados da instituicao */
		$datar = array();
		$datar['espelho'] = $this -> phplattess -> recupera_espelho($data);
		$datar['grupo'] = $this -> phplattess -> recupera_nomegrupo($data);
		$datar['instituicao'] = $this -> phplattess -> recupera_identificacao($data);
		$datar['endereco'] = $this -> phplattess -> recupera_endereco($data);
		$datar['repercusao'] = $this -> phplattess -> recupera_repercussao($data);
		$datar['linhas'] = $this -> phplattess -> recupera_linha_pesquisa($data);
		$datar['equipe'] = $this -> phplattess -> recupera_recursosHumanos($data);
		$datar['parceiras'] = $this -> phplattess -> recupera_instituicoesparceiras($data);
		$datar['equipamentos'] = $this -> phplattess -> recupera_equipamentos_softwares($data);
		$datar['atualizacao'] = $this -> phplattess -> recupera_atualizacao($data);
		return ($datar);
	}

	function recupera_atualizacao($text) {
		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');
		$data = array();
		$dt = $this -> recupera_method_3($text, 'Data do último envio:', '</div>');
		$dt = substr($dt, 0, 10);
		$dt = brtosql($dt);
		return ($dt);
	}

	function recupera_nomegrupo($text) {
		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');
		$data = array();
		$data['nome_grupo'] = $this -> recupera_method_5($text, '<h1 >', '<div >');
		return ($data);
	}

	function recupera_espelho($text) {
		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');
		$data = array();
		$data['espelho'] = 'http://' . $this -> recupera_method_3($text, 'acessar este espelho:', '</div>');
		return ($data);
	}

	function recupera_identificacao($text) {
		$sc = 'id="identificacao"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');
		$data = array();
		$data['situacao_grupo'] = $this -> recupera_method_1($text, 'Situação do grupo:');
		$data['ano_formacao'] = $this -> recupera_method_1($text, 'Ano de formação:');
		$data['data_situacao'] = $this -> recupera_method_1($text, 'Data da Situação:');
		$data['ultimo_envio'] = $this -> recupera_method_1($text, 'Data do último envio:');
		$data['lideres'] = $this -> recupera_method_2($text, 'Líder(es) do grupo:');
		$data['area_predominante'] = $this -> recupera_method_6($text, 'Área predominante:');
		$data['instituicao'] = $this -> recupera_method_1($text, 'Instituição do grupo:');
		$data['unidade'] = $this -> recupera_method_1($text, 'Unidade:');

		return ($data);
	}

	/* Endereco e contato do grupo */
	function recupera_endereco($text) {
		$sc = 'id="endereco"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['logradouro'] = $this -> recupera_method_1($text, 'Logradouro:');
		$data['numero'] = $this -> recupera_method_1($text, 'Número:');
		$data['complemento'] = $this -> recupera_method_1($text, 'Complemento:');
		$data['bairro'] = $this -> recupera_method_1($text, 'Bairro:');
		$data['estado'] = $this -> recupera_method_1($text, 'UF:');
		$data['localidade'] = $this -> recupera_method_1($text, 'Localidade:');
		$data['cep'] = $this -> recupera_method_1($text, 'CEP:');
		$data['caixa_postal'] = $this -> recupera_method_1($text, 'Caixa Postal:');
		$data['latitude'] = $this -> recupera_method_1($text, 'Latitude:');
		$data['longitude'] = $this -> recupera_method_1($text, 'Longitude:');
		$data['telefone'] = $this -> recupera_method_1($text, 'Telefone:');
		$data['fax'] = $this -> recupera_method_1($text, 'Fax:');
		$data['contato_email'] = $this -> recupera_method_1($text, 'Contato do grupo:');
		$data['website'] = $this -> recupera_method_1($text, 'Website:');

		return ($data);
	}

	/* Repercursao */
	function recupera_repercussao($text) {
		$sc = 'id="repercussao"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['repercussao'] = $this -> recupera_method_3($text, '<h4>Repercussões dos trabalhos do grupo</h4>', '</p>');
		$data['rede_pesquisa'] = $this -> recupera_method_3($text, '<h4>Participação em redes de pesquisa</h4>', '</table>');

		return ($data);
	}

	/* Recursos Humanos */
	function recupera_recursosHumanos($text) {
		$sc = 'id="recursosHumanos"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['pesquisadores'] = $this -> recupera_method_4($text, '<span>Pesquisadores', '</table>');
		$data['estudantes'] = $this -> recupera_method_4($text, '<span>Estudantes', '</table>');
		$data['tecnicos'] = $this -> recupera_method_4($text, '<span>Técnicos', '</table>');
		$data['estrangeiros'] = $this -> recupera_method_4($text, '<span>Colaboradores estrangeiros', '</table>');

		/* Egresso */
		$sc = '<h4>Egressos</h4>';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));

		$data['egresso_pesquisadores'] = $this -> recupera_method_4($text, '<span>Pesquisadores', '</table>');
		$data['egresso_estudantes'] = $this -> recupera_method_4($text, '<span>Estudantes', '</table>');

		return ($data);
	}

	/* Equipamentos e Softwares */
	function recupera_equipamentos_softwares($text) {
		$sc = 'id="equipamentos_softwares"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['hardware'] = $this -> recupera_method_4($text, '<span>Equipamentos', '</table>');
		$data['software'] = $this -> recupera_method_4($text, '<span>Softwares', '</table>');

		return ($data);
	}

	/* Parceiras */
	function recupera_instituicoesparceiras($text) {
		$sc = 'id="instituicoesParceiras"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['parceiras'] = $this -> recupera_method_4($text, 'Nome da Instituição Parceira', '</table>');

		return ($data);
	}

	/* Linhas de Pesquisa */
	function recupera_linha_pesquisa($text) {
		$sc = 'id="linhaPesquisa"';
		$text = substr($text, strpos($text, $sc) + strlen($sc) + 1, strlen($text));
		$text = substr($text, 0, strpos($text, '</fieldset>') + 1);

		/* */
		$text = troca($text, '<span >ui-button</span>', '');
		$text = troca($text, '<span >', '');
		$text = troca($text, '</span>', '');
		$text = troca($text, chr(13) . chr(10) . chr(13) . chr(10), chr(13) . chr(10));
		$text = troca($text, chr(13) . chr(10) . ' ', '');

		/* */
		$data = array();
		$data['linhas'] = $this -> recupera_method_4($text, '<legend>Linhas de pesquisa', '</table>');

		return ($data);
	}

	function recupera_method_1($text, $tag) {
		$tag = '<label >' . $tag . '</label>';
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, '</div')));
		$s1 = trim(troca($s1, '<div >', ''));
		$s1 = trim(troca($s1, '</label>', ''));
		$s1 = strip_tags($s1);
		$s1 = troca($s1, chr(13) . chr(10), '');
		$s1 = trim($s1);
		return ($s1);
	}

	function recupera_method_2($text, $tag) {
		$tag = '<label >' . $tag . '</label>';
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, '</div')));
		$s1 = trim(troca($s1, '<div >', ''));
		$s1 = troca($s1, chr(13) . chr(10), ';') . ';';
		$sa = splitx(';', $s1);
		return ($sa);
	}

	function recupera_method_3($text, $tag, $tagoff) {
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, $tagoff)));
		$s1 = trim(troca($s1, '<div >', ''));
		$s1 = trim(troca($s1, '</label>', ''));
		$s1 = strip_tags($s1);
		$s1 = troca($s1, chr(13) . chr(10), '');
		$s1 = trim($s1);
		return ($s1);
	}

	/* Linhas de Pesquisa */
	function recupera_method_4($text, $tag, $tagoff) {
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, $tagoff)));
		$s1 = troca($s1, '<tr', '#<TR');
		$s1 = troca($s1, '<td', ';<TD');
		$s1 = strip_tags($s1);
		$s1 = troca($s1, chr(13) . chr(10), '');
		$s1 = trim($s1);
		$s1 = splitx('#', $s1);
		$sr = array();
		for ($r = 1; $r < count($s1); $r++) {
			$s1[$r] = splitx(';', $s1[$r]);
			/* ID do grupo */
			if (isset($s1[$r][3])) {
				$ss = $s1[$r][3];
				$ss = trim(substr($ss, strpos($ss, 'id="') + 4, strlen($ss)));
				$ss = trim(substr($ss, 0, strpos($ss, '"')));
				$s1[$r][3] = $ss;
			} else {
				$s1[$r][3] = '';
			}
			$s1[$r][0] = trim(troca($s1[$r][0], $r . '.', ''));
			array_push($sr, $s1[$r]);
		}
		return ($sr);
	}

	function recupera_method_5($text, $tag, $tagoff) {
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, $tagoff)));
		$s1 = strip_tags($s1);
		$s1 = troca($s1, chr(13) . chr(10), '');
		$s1 = trim($s1);
		return ($s1);
	}

	function recupera_method_6($text, $tag) {
		$tag = $tag . '</label>';
		$pos = strpos($text, $tag) + strlen($tag);
		$s1 = substr($text, $pos, strlen($text));
		$s1 = trim(substr($s1, 0, strpos($s1, '</div')));
		$s1 = trim(troca($s1, '<div >', ''));
		$s1 = troca($s1, chr(13) . chr(10), ';') . ';';
		$sa = splitx(';', $s1);
		return ($sa);
	}

	/*
	 *
	 *
	 */

	function removeTAG($text) {
		$search = array('<button');

		for ($r = 0; $r < count($search); $r++) {
			$sc = $search[$r];
			$pos = strpos($text, $sc);
			while ($pos > 0) {
				$text1 = substr($text, 0, $pos);
				$text2 = substr($text, $pos + strlen($sc), strlen($text));

				$sb = '>';
				$pos2 = strpos($text2, $sb) + strlen($sb);

				$text = $text1 . substr($text2, $pos2, strlen($text2));
				$pos = strpos($text, $sc);
			}
		}
		return ($text);
	}

	function removeSPACE($text) {
		$text = troca($text, '<br />', '');
		$text = troca($text, '</button>', '');
		$text = troca($text, chr(13), ' ');
		$text = troca($text, chr(10), '');
		$text = troca($text, chr(10), '');
		$text = troca($text, '	', '');
		$text = troca($text, 'idFormVisualizarGrupoPesquisa:', '');

		while (strpos($text, '  ')) {
			$text = troca($text, '  ', ' ');
		}
		$text = troca($text, '> <', '><');
		$text = troca($text, '><', '>' . chr(13) . chr(10) . '<');
		return ($text);
	}

	function removeSCRIPT($text) {
		$sc = '<script';
		$pos = strpos($text, $sc);
		while ($pos > 0) {
			$text1 = substr($text, 0, $pos);
			$text2 = substr($text, $pos, strlen($text));

			$sb = '</script>';
			$pos2 = strpos($text2, $sb) + strlen($sb);

			$text2 = substr($text2, $pos2, strlen($text2));
			$text = $text1 . $text2;
			$pos = strpos($text, $sc);
		}
		return ($text);
	}

	function removeCLASS($text) {
		$search = array('class="', 'style="', 'role="', 'onclick="', 'name="', 'aria-live="', 'aria-live="');

		for ($r = 0; $r < count($search); $r++) {
			$sc = $search[$r];
			$pos = strpos($text, $sc);
			while ($pos > 0) {
				$text1 = substr($text, 0, $pos);
				$text2 = substr($text, $pos + strlen($sc), strlen($text));

				$sb = '"';
				$pos2 = strpos($text2, $sb) + strlen($sb);

				$text = $text1 . substr($text2, $pos2, strlen($text2));
				$pos = strpos($text, $sc);
			}
		}
		return ($text);
	}

	function inport_data($link) {
		$data = date("Y-m-d");
		$new = 1;
		/* Verifica se ja foi coletado */
		$sql = "select * from dgp_cache where dgpc_link = '$link' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$new = 0;
			$line = $rlt[0];
			$sta = $line['dgpc_status'];
			//return ($line['dgpc_content']);
		}
		$content = '';

		if ($new == 0) {
			$sql = "update dgp_cache 
							set dgpc_status = '@',
							dgpc_content = '$content'
							where id_dgpc = " . $line['id_dgpc'];
			$this -> db -> query($sql);
		} else {
			$sql = "insert into dgp_cache 
							(dgpc_link, dgpc_content, dgpc_data, dgpc_status)
							values
							('$link','$content','$data','@')
					";
			$this -> db -> query($sql);
		}

		/* Busca conteudo do link */
		$fl = load_page($link);

		$fl = utf8_decode($fl['content']);

		$fl = troca($fl, "'", "´");

		/* Atualiza o conteudo */
		$sql = "update dgp_cache set 
					dgpc_status = 'A',
					dgpc_content = '$fl',
					dgpc_data = '$data'
				where dgpc_link = '$link'";
		$this -> db -> query($sql);

		/* Retorna */
		return ($fl);
	}

	function dgp_nome_do_grupo($fl) {
		$sx = 'Nome do grupo: ';
		$pos = round(strpos($fl, $sx));

		if ($pos > 0) {
			$st = substr($fl, $pos + strlen($sx), 400);
			return ($st);
		} else {
			return ("# nome não localizado #");
		}
	}

}
?>