<?php
class central_declaracao extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> helper('tcpdf');
		$this -> load -> library("nuSoap_lib");

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */

	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($css, 'style_central_declaracao');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}

	function perfil() {
		
		echo '<h1>EM MANUTENÇÃO</h1>';
	}
	function perfil2() {
		/* load model */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$id = $this -> session -> userdata('cc_user');
		$id = round('0' . $id);
		if ($id == 0) {
			redirect(base_url('index.php/central_declaracao'));
		}
		$data = $this -> usuarios -> le($id);
		
		/**#############################################################################################*/
		/**############################																							   ###################
		/**############################    G E R A   D E C L A R A C O E S             ###################
		/**############################																							   ###################
		/**##############################################################################################*/
		
		/**###################################>> SEMIC 2011 <<############################################*/
		$ano = '2011';
		/* Estudante IC 2011 */
		$err1 = $this -> eventos -> emitir('IC', 'ESTUDANTE', $ano, $data);
						/* Avaliador SEMIC 2011*/
						$this -> eventos -> emitir('IC', 'AVALIADOR', $ano, $data);
						/* Orientador IC 2011*/
						$this -> eventos -> emitir('IC', 'ORIENTADOR', $ano, $data);
		
		/**###################################>> SEMIC 2012 <<############################################*/
		$ano = '2012';
		/* Estudante IC 2012 */
		$err1 = $this -> eventos -> emitir('IC', 'ESTUDANTE', $ano, $data);
						/* Avaliador SEMIC 2012*/
						$this -> eventos -> emitir('IC', 'AVALIADOR', $ano, $data);
						/* Orientador IC 2012*/
						$this -> eventos -> emitir('IC', 'ORIENTADOR', $ano, $data);

		/**###################################>> SEMIC 2013 <<############################################*/
		$ano = '2013';
		/* Estudante IC 2013 */
		$err1 = $this -> eventos -> emitir('SEMIC', 'ESTUDANTE', $ano, $data);
						/* Avaliador SEMIC 2013*/
						$this -> eventos -> emitir('SEMIC', 'AVALIADOR', $ano, $data);
						/* Orientador IC 2013*/
						$this -> eventos -> emitir('SEMIC', 'ORIENTADOR', $ano, $data);

		/**###################################>> SEMIC 2014 <<############################################*/
		$ano = '2014';
		/* Estudante IC 2014 */
		$err1 = $this -> eventos -> emitir('SEMIC', 'ESTUDANTE', $ano, $data);
						/* Avaliador SEMIC 2014*/
						$this -> eventos -> emitir('SEMIC', 'AVALIADOR', $ano, $data);
						/* Orientador IC 2014*/
						$this -> eventos -> emitir('SEMIC', 'ORIENTADOR', $ano, $data);

		/**###################################>> SEMIC 2015 <<############################################*/
		$ano = '2015';
					/* Ouvinte SEMIC */
					$this -> eventos -> emitir('SEMIC', 'OUVINTE', $ano, $data);
					/* Avaliador SEMIC */
					$this -> eventos -> emitir('SEMIC', 'AVALIADOR', $ano, $data);		
					/* Orientador IC */
					$err2 = $this -> eventos -> emitir('SEMIC', 'ORIENTADOR', $ano, $data);
					/* Estudante IC */
					$err1 = $this -> eventos -> emitir('SEMIC', 'ESTUDANTE', $ano, $data);
					/* Estudante Apresentação */
					$err1 = $this -> eventos -> emitir('SEMIC', 'APRESENTACAO', $ano, $data);
					/* SwB2 - Participação */
					$err1 = $this -> eventos -> emitir('SWB', 'SWB2', $ano, $data);
					/* SwB2 - Participação */
					$err1 = $this -> eventos -> emitir('SENAI', 'APRESENTACAO', $ano, $data);
		
		/**###################################>> SEMIC 2015 <<############################################*/
		$ano = '2016';
					/* Ouvinte SEMIC */
					$this -> eventos -> emitir('SEMIC', 'OUVINTE', $ano, $data);
					/* Avaliador SEMIC */
					$this -> eventos -> emitir('SEMIC', 'AVALIADOR', $ano, $data);
					/* Orientador IC */
					$err2 = $this -> eventos -> emitir('SEMIC', 'ORIENTADOR', $ano, $data);
					/* Estudante IC */
					$err1 = $this -> eventos -> emitir('SEMIC', 'ESTUDANTE', $ano, $data);
					/* Estudante Apresentação */
					$err1 = $this -> eventos -> emitir('SEMIC', 'APRESENTACAO', $ano, $data);
					/* SwB2 - Participação */
					$err1 = $this -> eventos -> emitir('SWB', 'SWB2', $ano, $data);
					/* SwB2 - Participação */
					$err1 = $this -> eventos -> emitir('SENAI', 'APRESENTACAO', $ano, $data);		
		/*********************************************************************************************/
		/*********************************************************************************************/
		$this -> load -> view("perfil/user", $data);
		$cracha = $data['us_cracha'];

		$data['content'] = $this -> eventos -> mostra_declaracoes($id);
		$data['content'] .= '<table width="800" align="center"><tr><td><font color="red">' . $err1 . $err2 . '</font></td></tr></table>';
		$this -> load -> view('content', $data);
	}

	function index($id = 0) {
		$this -> load -> model('usuarios');

		/* Load Models */
		$this -> cab();
		
		/* Dados do Usuario */
		$dd1 = $this -> input -> post("dd1");
		if (strlen($dd1) > 0) {
			if (validaCPF($dd1)) {
				/* Consulta por CPF */
				$line = $this -> usuarios -> readByCPF($dd1);
			} else {
				/* Consulta por Cracha */
				$dd1 = $this -> usuarios -> limpa_cracha($dd1);
				$line = $this -> usuarios -> readByCracha($dd1);
			}
			if (count($line) > 0) {
				$data = array('cc_user' => $line['id_us']);
				$this -> session -> set_userdata($data);
				redirect(base_url('index.php/central_declaracao/perfil/'));
			} else {
				$msg = 'Código ou CPF Inválido';
				/* Consulta dados da base */
				echo 'Consultando ' . $dd1;
				$this -> load -> model('webservice/ws_sga');
				$this -> ws_sga -> findStudentByCracha($dd1);

				redirect(base_url('index.php/central_declaracao/')) . '?dd1=' . $dd1;
				echo $msg;
			}
		}

		/* Mostra tela de login */
		if (strlen($dd1) == 0) {
			$this -> load -> view('central_certificado/central_certificado');
		}
	}

	function validador($id = 0, $chk = '') {
		/* Carrega Modelos */
		$this -> load -> model('evento/eventos');
		$chk2 = substr(checkpost_link($id . 'certificado'), 4, 6);

		$this -> cab();

		if ($chk != $chk2) {
			$this -> load -> view('central_certificado/declaracao_link_invalido', null);
		} else {
			$data = $this -> eventos -> valida_certificado($id);
			if (count($data) > 0) {
				$this -> load -> view('central_certificado/declaracao_valida', $data);
			} else {
				$this -> load -> view('central_certificado/declaracao_invalida', $data);
			}
		}
	}

	/* Avaliador SEMIC */
	function declaracao($id = '', $check = '') {
		$sql = "select * from central_declaracao
					inner join central_declaracao_evento on id_cde = dc_tipo
					inner join (select us_nome as nome_1, id_us as id_us_1, us_genero as us_g1 from us_usuario) as user_1 on id_us_1 = dc_us_usuario_id 
					 left join (select us_nome as nome_2, id_us as id_us_2, us_genero as us_g2 from us_usuario) as user_2 on id_us_2 = dc_us_usuario_id_2
					left join ic on ic_plano_aluno_codigo = dc_texto_1 
					inner join ic_aluno as pa on ic_id = id_ic
					left join ic_modalidade_bolsa as mode on mb_id = id_mb
					where id_dc = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) == 0) {
			echo 'Emissão não permitida, consulte pibicpr@pucpr.br informando o ID:' . $id;
			exit ;
		}
		$view = $rlt[0]['cde_view'];
		$data = $rlt[0];

		/*Dados */
		$tipo = $data['dc_tipo'];
		//nome aluno
		$data['nome_user_main'] = $data['nome_2'];
		$data['nome_user_main'] = UpperCase($data['nome_user_main']);
		//nome professor
		$data['nome_user_second'] = $data['nome_1'];
		$data['nome_user_second'] = UpperCase($data['nome_user_second']);
		//perfil e titulacao
		$data['prof'] = 'Prof.';
		$data['titulacao'] = 'Dr.';
		//projetos
		$data['titulo_projeto'] = $data['ic_projeto_professor_titulo'];
		$data['modalidade'] = $data['mb_descricao'];
		$data['edital'] = $data['mb_tipo'];

		switch ($tipo) {
			/*#############################################################################################*/
			/*#######################     INICIACAO CIENTIFICA DE 2014 à 2015    ##############################*/
			/*#############################################################################################*/
			/* Declaracao de Avaliador */
			case '2':
				$content = 'Declaramos para os devidos fins que ' . $data['prof'] . ' ' . $data['titulacao'] . ' <b>' . $data['nome_user_second'] . '</b> atuou como avaliador de trabalhos científicos no XXIII Seminário de Iniciação Científica da PUCPR, durante os dias 06, 07 e 08 de outubro de 2015.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Declaracao de Ouvinte */
			case '9':
				$content = 'Declaro para os devidos fins que <b>' . $data['nome_user_second'] . '</b> participou do XXIII Congresso de Iniciação Cientifica da PUCPR na modalidade de ouvinte nos dias 06, 07 e 08 de outubro de 2015, cumprindo uma carga horária de 20horas.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Declaracao de Orientador */
			case '7':
				$artigo_estudante = 'o';
				if ($data['us_g2'] == 'F') { $artigo_estudante = 'a';
				}
				$artigo_professor = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_professor = 'profa.';
				}
				$content = 'Declaramos para os devidos fins que o ' . $artigo_professor . ' <b>' . $data['nome_user_main'] . '</b> orientou ' . 
										$artigo_estudante . ' alun' . $artigo_estudante . ' <b>' . 
										$data['nome_user_second'] . '</b> no projeto de pesquisa intitulado "<b>' . 
										$data['titulo_projeto'] . '"</b>, com ' . 
										$data['modalidade'] . ', no programa ' . 
										$data['edital'] . ', no período de agosto de 2014 a julho de 2015.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Certificado de IC */
			case '12':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}
				$artigo_professor = 'prof.';
				$artigo_prof_complemento = 'o';
				if ($data['us_g2'] == 'F') {
					$artigo_professor = 'profa.';
					$artigo_prof_complemento = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$sql = "select max(pp_p08) as nota from pibic_parecer_2015 WHERE pp_protocolo = '$protocolo'";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) == 0) {
					echo 'Emissão bloqueada, consulte pibicpr@pucpr.br informando o código: #45/' . $id . '/' . $protocolo;
					exit ;
				}

				$ln = $rlt[0];
				if ($ln['nota'] < 40) {
					echo 'Emissão bloqueada, consulte pibicpr@pucpr.br informando o código: #46/' . $id . '/' . $protocolo;
					exit ;
				}
				$content = 'Certificamos que ' . $artigo_estudante . ' estudante, <b>' . $data['nome_user_second'] . '</b> participou do programa ' . $data['edital'] . ' nesta Universidade, com ' . $data['modalidade'] . ', com o projeto de pesquisa intitulado <b>"' . $data['titulo_projeto'] . '"</b> sob orientação d' . $artigo_prof_complemento . ' ' . $artigo_professor . ' <b>' . $data['nome_user_main'] . '</b> , no período de agosto 2014 a julho 2015, com 20 horas semanais.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Apresentacao Oral e Poster */
			case '15':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos que <b>' . $data['nome_user_second'] . '</b> apresentou o trabalho "<b>' . $data['titulo_projeto'] . '</b>" nas modalidades <b>Oral e Pôster</b> no XXIII Seminário de Iniciação Científica da PUCPR, realizado no período de 06 a 8 de outubro de 2015, na Pontifícia Universidade Católica do Paraná, Curitiba-PR.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Apresentacao Poster */
			case '18':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos que <b>' . $data['nome_user_second'] . '</b> apresentou o trabalho "<b>' . $data['titulo_projeto'] . '</b>" na modalidade <b>Oral</b> no XXIII Seminário de Iniciação Científica da PUCPR, realizado no período de 06 a 08 de outubro de 2015, na Pontifícia Universidade Católica do Paraná, Curitiba-PR.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Apresentacao Poster */
			case '21':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos que <b>' . $data['nome_user_second'] . '</b> apresentou o trabalho "<b>' . $data['titulo_projeto'] . '</b>" na modalidade <b>Pôster</b> no XXIII Seminário de Iniciação Científica da PUCPR, realizado no período de 06 a 0 de outubro de 2015, na Pontifícia Universidade Católica do Paraná, Curitiba-PR.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 08 de outubro de 2015.</td></tr></table>';
				break;
			/* Apresentacao SWB 2nd */
			case '22':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaro para os devidos fins que <b>' . $data['nome_user_second'] . '</b> participou do 2nd Science without Borders na PUCPR no dia 11 de novembro de 2015 no período da tarde, cumprindo uma carga horária de 6horas.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 11 de novembro de 2015.</td></tr></table>';
				break;
			/* Apresentacao SWB 2nd */
			case '24':
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos que <b>' . $data['nome_user_second'] . '</b> apresentou o trabalho "<b>' . $data['titulo_projeto'] . '</b>" nas modalidades <b>Oral e Pôster</b> no XXIII Seminário de Iniciação Científica da PUCPR em parceria com o SENAI, realizado no período de 06 a 08 de outubro de 2015, na Pontifícia Universidade Católica do Paraná, Curitiba-PR.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 11 de novembro de 2015.</td></tr></table>';
				break;

			/*#############################################################################################*/
			/*#######################     INICIACAO CIENTIFICA DE 2013 à 2014    ##############################*/
			/*#############################################################################################*/

			/* Apresentacao Oral e Poster */
			case '25':
				//Artigos complementos	
				$artigo_estudante = 'o';
					if ($data['us_g1'] == 'F') { 
						$artigo_estudante = 'a';
					}
				$artigo_professor = 'prof.';
				$artigo_prof_complemento = 'o';
				
					if ($data['us_g2'] == 'F') {

						$artigo_prof_complemento = 'a';
					}
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaro para os devidos fins que '. $artigo_estudante .' alun'. $artigo_estudante .' <b>' . $data['nome_user_second'] . '</b> 
				participou do Programa Institucional de Bolsas de Iniciação Científica
				(' . $data['edital'] . ') com Bolsa ' . $data['modalidade'] . ' no período de agosto de 2013 até julho de 2014, 
				com o projeto de pesquisa "<b>' . $data['titulo_projeto'] . '</b>", orientad'. $artigo_estudante .'  pel'. $artigo_prof_complemento .'  ' . $artigo_professor . '  <b>' . $data['nome_user_main'] . '</b>
				e, com o mesmo trabalho, realizou	apresentação oralmente e em forma de pôster no XXI Seminário de Iniciação Científica da PUCPR e XV Mostra de Pesquisa da pós-graduação, realizado nos dias 22, 23 e 24 de novembro de 2013. 
				';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 30 de novembro de 2014.</td></tr></table>';
				break;

			/* Declaracao de Avaliador */
			case '26':
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g5 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g5 = 'a';}
				$artigo_g6 = '';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				
				$content = 'Declaramos para os devidos fins que '. 
										$artigo_g5 .' ' . 
										$artigo_g1 . ' ' .  ' <b>' . $data['nome_user_second'] . '</b> atuou como avaliador' . $artigo_g6 . ' de trabalhos científicos no XXI Seminário de Iniciação Científica, XX Mostra de Pesquisa, II PIBITI, realizado nos dias 22, 23 e 24 de novembro de 2014.';
				
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 30 de novembro de 2014.</td></tr></table>';
				break;

			/* Declaracao de Orientador */
			case '27':
				$artigo_g2 = 'aluno';
				if ($data['us_g2'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g6 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				$artigo_g5 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g5 = 'a';}
					
				$content = 'Declaramos para os devidos fins que ' . 
										$artigo_g6 . ' ' .
										$artigo_g1 . ' <b>' . $data['nome_user_second'] . '</b> orientou '. 
										$artigo_g5 . ' ' .
									 	$artigo_g2 . ' <b>' . $data['nome_user_main'] .'</b> no projeto de pesquisa intitulado "<b>' . 
	                  $data['titulo_projeto'] . '</b>", com ' . $data['modalidade'] . ', no programa ' . 
	                  $data['edital'] . ', no período de agosto de 2013 até julho de 2014.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 30 de novembro de 2014.</td></tr></table>';
				break;

			/*#############################################################################################*/
			/*#######################     INICIACAO CIENTIFICA DE 2012 à 201    ##############################*/
			/*#############################################################################################*/

			/* Declaracao de participacao estudante*/
			case '28':
				$artigo_g2 = 'aluno';
				if ($data['us_g1'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g2'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g3 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g3 = 'a';}
				$artigo_g4 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g4 = 'a';}

				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaro para os devidos fins que '. 
										$artigo_g4 .  ' '. $artigo_g2 . ' <b>' . $data['nome_user_second'] . '</b>
										participou do Programa Institucional de Bolsas de Iniciação Científica (PIBIC) com Bolsa (' . 
										$data['edital'] . ') no período de agosto de 2013 até julho de 2014, com o projeto de pesquisa "<b>' . $data['titulo_projeto'] . '</b>", 
										orientad'. $artigo_g4 .' pel'. $artigo_g3 .' ' . $artigo_g1 . ' <b>' . 
										$data['nome_user_main'] . '</b>" e, realizou apresentação no III Congresso Sul Brasileiro de de Iniciação Científica e Pós-Graduação e 
										XXII Seminário de Iniciação Científica da PUCPR, realizado nos dias 04, 05 e 06 de Novembro de 2014.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 21 de Novembro de 2014.</td></tr></table>';
				break;

			/* Declaracao de Avaliador */
			case '29':
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g5 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g5 = 'a';}
				$artigo_g6 = '';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos para os devidos fins que '. 
										$artigo_g5 .' ' . 
										$artigo_g1 . ' ' . ' <b>' . $data['nome_user_second'] . 
										'</b> atuou como avaliador' . $artigo_g6 . ' de trabalhos científicos no III Congresso Sul Brasileiro de de Iniciação Científica e Pós-Graduação e XXII Seminário de Iniciação Científica da PUCPR, realizado nos dias 04, 05 e 06 de Novembro de 2014.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 21 de Novembro de 2014.</td></tr></table>';
				break;

			/* Declaracao de Orientador */
			case '30':
				$artigo_g2 = 'aluno';
				if ($data['us_g2'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g6 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				$artigo_g5 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g5 = 'a';}
				
				$content = 'Declaramos para os devidos fins que  ' .
									 	$artigo_g6  .' '.
										$artigo_g1 . ' <b>' . $data['nome_user_second'] . '</b> orientou '.
										$artigo_g5  .' '. 
									  $artigo_g2 . ' <b>' . $data['nome_user_main'] .'</b> no projeto de pesquisa intitulado "<b>' . $data['titulo_projeto'] . '"</b>, com ' . $data['modalidade'] . ', no programa ' . $data['edital'] . ', no período de agosto de 2013 até julho de 2014.';

				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 21 de Novembro de 2014.</td></tr></table>';
				break;
				
			/*#############################################################################################*/
			/*#######################     INICIACAO CIENTIFICA DE 2012 à 2013    ##############################*/
			/*#############################################################################################*/
			/* Declaracao de participacao estudante*/
			case '31':
				//Artigos complementos	
				$artigo_g2 = 'aluno';
				if ($data['us_g1'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g2'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g3 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g3 = 'a';}
				$artigo_g4 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g4 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				
				$content = 'Declaro para os devidos fins que '. $artigo_g4 . ' alun'. $artigo_g4 . ' <b>' . $data['nome_user_second'] . '</b>
				participou do Programa Institucional de Bolsas de Iniciação Científica (PIBIC)
				com Bolsa (' . $data['edital'] . ') no período de agosto de 2012 até julho de 2013, 
				com o projeto de pesquisa "<b>' . $data['titulo_projeto'] . '</b>" , orientad'. $artigo_g4 .' pel'. $artigo_g3 .' '. $artigo_g1 . ' '.  '<b>' . $data['nome_user_main'] . '</b>" e,
				realizou apresentação no XX Seminário de Iniciação Científica da PUCPR, XIV Mostra de Pesquisa da pós-graduação, realizado nos dias 06, 07 e 08 de Novembro de 2013.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 12 de Novembro de 2013.</td></tr></table>';
				break;

			/* Declaracao de Avaliador */
			case '32':
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g5 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g5 = 'a';}
				$artigo_g6 = '';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos para os devidos fins que '. 
										$artigo_g5 .' ' . 
										$artigo_g1 . ' ' .  ' <b>' . $data['nome_user_second'] . '</b> atuou como avaliador' . $artigo_g6 . ' de trabalhos científicos no XX Seminário de Iniciação Científica, XIV Mostra de Pesquisa, I PIBITI da PUCPR, 06, 07 e 08 de Novembro de 2012.';
						
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 12 de Novembro de 2013.</td></tr></table>';
				break;
				
			/* Declaracao de Orientador */
			case '33':
				$artigo_g2 = 'aluno';
				if ($data['us_g2'] == 'F') { $artigo_g2 = 'aluna';
				}
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';
				}
				$artigo_g6 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				$artigo_g5 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g5 = 'a';}
				$content = 'Declaramos para os devidos fins que  ' .
									 	$artigo_g6  .' '.
										$artigo_g1 . ' <b>' . $data['nome_user_second'] . '</b> orientou '.
										$artigo_g5  .' '. 
									  $artigo_g2 . ' <b>' . $data['nome_user_main'] .'</b> no projeto de pesquisa intitulado "<b>' . $data['titulo_projeto'] . '"</b>, com ' . $data['modalidade'] . ', no programa ' . $data['edital'] . ', no período de agosto de 2012 até julho de 2013.';

				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 12 de Novembro de 2013.</td></tr></table>';
				break;				

				
			/*#############################################################################################*/
			/*#######################     INICIACAO CIENTIFICA DE 2011 à 2012    ##############################*/
			/*#############################################################################################*/

			/* Declaracao de participacao estudante */
			/* VALIDADE POR RENE EM 26/02/2016 ******/
			case '34':
				//Artigos complementos	
				$artigo_g2 = 'aluno';
				if ($data['us_g1'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g2'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g3 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g3 = 'a';}
				$artigo_g4 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g4 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				
				$content = 'Declaro para os devidos fins que '. $artigo_g4 . ' alun'. $artigo_g4 . ' <b>' . $data['nome_user_second'] . '</b>
				participou do Programa Institucional de Bolsas de Iniciação Científica (PIBIC)
				com Bolsa (' . $data['edital'] . ') no período de agosto de 2011 até julho de 2012, 
				com o projeto de pesquisa "<b>' . $data['titulo_projeto'] . '</b>" , orientad'. $artigo_g4 .' pel'. $artigo_g3 .' '. $artigo_g1 . ' '.  '<b>' . $data['nome_user_main'] . '</b>" e,
				realizou apresentação no XIX Seminário de Iniciação Científica da PUCPR, XIII Mostra de Pesquisa da pós-graduação, realizado nos dias 25, 26 e 27 de outubro de 2011.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 31 de Outubro de 2012.</td></tr></table>';
				break;

			/* Declaracao de Avaliador */
			case '35':
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g5 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g5 = 'a';}
				$artigo_g6 = '';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				
				$protocolo = trim($data['dc_texto_1']);
				$content = 'Declaramos para os devidos fins que '. 
										$artigo_g5 .' ' . 
										$artigo_g1 . ' ' .  ' <b>' . $data['nome_user_second'] . '</b> atuou como avaliador' . 
										$artigo_g6 . ' de trabalhos científicos no XIX Seminário de Iniciação Científica, XIII Mostra de Pesquisa, I PIBITI da PUCPR, 25, 26 e 27 de Outubro de 2012.';
						
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="left">' . 'Curitiba, 31 de Outubro de 2012.</td></tr></table>';
				break;
				
			/* Declaracao de Orientador */
			case '36':
				$artigo_g2 = 'aluno';
				if ($data['us_g2'] == 'F') { $artigo_g2 = 'aluna';}
				$artigo_g1 = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_g1 = 'profa.';}
				$artigo_g6 = 'o';
				if ($data['us_g1'] == 'F') { $artigo_g6 = 'a';}
				$artigo_g5 = 'o';
				if ($data['us_g2'] == 'F') { $artigo_g5 = 'a';}
				$content = 'Declaramos para os devidos fins que  ' .
									 	$artigo_g6  .' '.
										$artigo_g1 . ' <b>' . $data['nome_user_second'] . '</b> orientou '.
										$artigo_g5  .' '. 
									  $artigo_g2 . ' <b>' . $data['nome_user_main'] .'</b> no projeto de pesquisa intitulado "<b>' . 
									                        $data['titulo_projeto'] . '"</b>, com ' . $data['modalidade'] . ', no programa ' . 
									                        $data['edital'] . ', no período de agosto de 2011 até julho de 2012.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 31 de Outubro de 2012.</td></tr></table>';
				break;				


			/*#######################     DEFAULT      ###############################*/
			default :
				echo 'ERRO INTERNO ' . $tipo;
				exit ;
				break;
		}
		$this -> load -> view($view, $data);
	}

}
?>