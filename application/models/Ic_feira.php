<?php
class ic_feira extends CI_model {

	var $validated = False;

	function welcome() {
		$txt = '<div class="containter text-left">';
		$txt .= '<h1>Bem vindo!</h1>';
		$txt .= '<p>Para submeter um projeto para Feira de Ciências Jovens da PUCPR é necessário informar o número do CPF do professor responsável pela equipe.</p>';
		$txt .= '</div>';
		return ($txt);
	}

	function submissao($idp, $ids, $pag) {

		/* SUBMISSAO */

		$this -> load -> model('geds');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');

		$prt = $this -> ics -> le_projeto($ids);
		$proto = $prt['pj_codigo'];
		$status = $prt['pj_status'];

		if ($status <> '@') {
			$txt = '<div  class="danger text-center">
							<h1>Projeto não está habilitado para edição</h1>
						</div>';
			return ($txt);
		}

		$cracha = $prt['pj_professor'];
		$user = $this -> usuarios -> le_cracha($cracha);

		/* Líder do Projeto */
		$this -> ics -> lider_de_equipe($proto, $user);

		/* Dados */
		$tela = '<div class="container"><h3>Professor Líder</h3>' . $this -> load -> view('perfil/user', $user, true) . '</div>';
		$data = array();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> geds -> tabela = 'ic_ged_documento';

		$cp = array();
		array_push($cp, array('$H8', 'id_pj', '', False, False));

		array_push($cp, array('$A', '', 'Título do projeto', False, True));
		array_push($cp, array('$T80:3', 'pj_titulo', '', False, True));

		array_push($cp, array('$M', '', '<h3>Dados da escola</h3>', False, True));
		array_push($cp, array('$M', '', 'Informe o nome da escola, telefone, endereço e formas de contato', False, True));
		array_push($cp, array('$T80:3', 'pj_ext_local', '', False, True));

		/*************************************************************************** CATEGORIAS */
		$op = '';
		$op .= 'Ensino Fundamental II:Ensino Fundamental II';
		$op .= '&Ensino Médio e Técnico - 1. ano:Ensino Médio e Técnico - 1. ano';
		$op .= '&Ensino Médio e Técnico - Livre:Ensino Médio e Técnico - Livre';
		array_push($cp, array('$R ' . $op, 'pj_gr2_local', 'Categoria da inscrição', False, True));
		
		
		/**************************************************************************** TEMA */
		
		$op = '';
		$op .= 'Cidades e Comunidade Sustentáveis:Cidades e Comunidade Sustentáveis';
		$op .= '&Inovação e Infraestrutura:Inovação e Infraestrutura';
		$op .= '&Consumo responsável:Consumo responsável';
		$op .= '&Combate às mudanças climáticas:Combate às mudanças climáticas';
		$op .= '&Energias renováveis:Energias renováveis';
		$op .= '&Água limpa e saneamento:Água limpa e saneamento';
		
		array_push($cp, array('$R ' . $op, 'pj_resumo', 'Tema a ser submetido', False, True));

		/**************************************************************************** ESTUDANTES */

		$txt = '<br><br><fieldset><legend>Equipe</legend>';
		$txt .= '<div id="equipe">';
		$txt .= $this -> ics -> lista_equipe_projeto($proto);

		$txt .= '<br>' . $this -> ics -> botao_novo_equipe_projeto_por_nome($proto);

		$txt .= '</div>';
		$txt .= '</fieldset>';
		array_push($cp, array('$M', '', $txt, False, True));

		/**************************************************************************** ARQUIVOS */

		$txt = '<br><br><fieldset><legend>Arquivos</legend>';

		$files = $this -> geds -> list_files_table($proto, 'ic');
		if (strlen($files) == 0) {
			$files = '<table class="table"><tr><td><font color="red">Nenhum arquivo postado</font></td></tr></table>';
		}
		$txt .= $files;

		$txt .= '<br>' . $this -> geds -> form_upload($proto, 'ic', 'PROJT');
		$txt .= '</fieldset>';
		$txt .= '<br>';
		array_push($cp, array('$M', '', $txt, False, True));

		$txt = '<br><br><fieldset><legend>Link do video do projeto no YouTube</legend>';
		array_push($cp, array('$M', '', $txt, False, True));
		array_push($cp, array('$M', '', 'informe o link do vídeo, exemplo: <a href="https://www.youtube.com/watch?v=w9PQ-f9OOjw" target="_new">https://www.youtube.com/watch?v=w9PQ-f9OOjw</a>', False, True));
		array_push($cp, array('$S80', 'pj_coment', '', False, True));
		$txt = '</fieldset><br><br><br>';
		array_push($cp, array('$M', '', $txt, False, True));

		array_push($cp, array('$B8', '', 'Confirmar Inscrição', False, True));

		$form = new form;
		$form -> id = $ids;
		$tela = '<table width="960" border=0><tr><td>' . $form -> editar($cp, 'ic_submissao_projetos') . '</td></tr></table>';

		$tela .= '<br><br><br>';

		$txt = '<br><br><fieldset><legend>Validação da Submissão</legend>';
		$txt .= $this -> validacao($ids);
		$txt .= '</fieldset>';

		/* VALIDADO */
		if ($this -> validated == 1) {

			/* Enviar e-mail */
			$sql = "select * from evento_mailing where ml_ev = " . round($idp) . " and ml_query = 'CONFIRMACAO' and ml_status = 1";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0) {
				$line = $rlt[0];
				$txt = $line['ml_html'];
				$ass = $line['ml_subject'];
				$id_us = $user['id_us'];
				$txt = troca($txt,'$NOME',$user['us_nome']);
				$txt = troca($txt,'$PROTOCOLO',$proto);
				$txt .= '<BR><BR><BR><BR>';
				enviaremail_usuario($id_us, $ass, $txt, 2);
			}
			$this -> ics -> altera_status_projeto_submissao($proto, '@', 'A');
			$url = base_url('index.php/evento/submit_success/' . $idp . '/' . $ids);
			redirect($url);
			exit ;
		}

		return ($txt . $tela);
	}

	function validacao($proto_id) {
		$projeto = $this -> ics -> le_projeto($proto_id);

		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$class_ok = 'success';
		$class_erro = 'danger';

		$vdt = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);
		$vd = array($class_erro, $class_erro, $class_erro, $class_erro, $class_erro, $class_erro, $class_erro, $class_erro);

		/* regras */
		/* #01 - Titulo */
		if (strlen($projeto['pj_titulo']) > 0) { $vd[0] = $class_ok;
			$vdt[0] = $ok;
		}

		/* #03 - Video do YouTube */
		if (strlen($projeto['pj_coment']) > 0) { $vd[3] = $class_ok;
			$vdt[3] = $ok;
		}

		/* REGRA - arquivos postados */
		$proto = $projeto['pj_codigo'];

		$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . $projeto['pj_codigo'] . "' and doc_status <> 'X'
					and doc_tipo = 'PROJT' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		if (count($rrr) > 0) {
			$vdt[4] = $ok;
			$vd[4] = $class_ok;
		}

		/* Membros da equipe */
		$sql = "select * from ic_submissao_projetos_equipe 
				where ispe_protocolo = '$proto' and ispe_ativo = 1 
				order by id_ispe ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		/* Total de membros */
		if ((count($rlt) >= 1) and (count($rlt) <= 5)) {
			$vd[6] = $class_ok;
			$vdt[6] = $ok;
		}

		/* Cursos diferentes */
		if (strlen($projeto['pj_gr2_local']) >= 2) {
			$vd[2] = $class_ok;
			$vdt[2] = $ok;
		}

		/* Vinculos com Outros Projetos */
		if (strlen($projeto['pj_resumo']) >= 2) {
			$vd[5] = $class_ok;
			$vdt[5] = $ok;
		}
		

		/* Vinculos com Programs de IC */
		if (strlen($projeto['pj_ext_local']) >= 2) {
			$vd[1] = $class_ok;
			$vdt[1] = $ok;
		}

		$sx = '<table class="table">';
		$sx .= '<tr class="' . $vd[0] . '"><td>Título do projeto</td><td align="center">' . $vdt[0] . '</tr>';

		$sx .= '<tr class="' . $vd[1] . '"><td>Informações sobre a Escola / Colégio</td><td align="center">' . $vdt[1] . '</tr>';

		$sx .= '<tr class="' . $vd[2] . '"><td>Categoria da submissão</td><td align="center">' . $vdt[2] . '</tr>';

		$sx .= '<tr class="' . $vd[3] . '"><td>Link do projeto no Youtube</td><td align="center">' . $vdt[3] . '</tr>';

		$sx .= '<tr class="' . $vd[4] . '"><td>Arquivo do Projeto em PDF</td><td align="center">' . $vdt[4] . '</tr>';

		$sx .= '<tr class="' . $vd[5] . '"><td>Tema da submissão</td><td align="center">' . $vdt[5] . '</tr>';

		$sx .= '<tr class="' . $vd[6] . '"><td>Membros da equipe (entre 1 e 5 alunos) - ' . count($rlt) . ' as membros registrados</td><td align="center">' . $vdt[6] . '</tr>';
		$sx .= '</table>';

		$validated = True;
		for ($r = 0; $r <= 6; $r++) {
			if ($vdt[$r] != $ok) {
				$validated = False;
			}
		}
		$this -> validated = $validated;
		return ($sx);
	}

	function inscricao($ide = 0) {
		/* */
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$cpf = sonumero(get("dd1"));
		$erro = '';
		$ok = 0;
		if (strlen($cpf) > 0) {
			$ok = validaCPF($cpf);

			if ($ok == 1) {
				$nome = get("dd2");
				$email = get("dd3");

				$habilitado = $this -> habilata_inscricao('', $cpf);
				if (((strlen($nome) > 5) and (validaemail($email))) or ($habilitado == 1)) {

					if ($habilitado == 0) {
						$data = array();
						$this -> usuarios -> $nome = nbr_autor($nome, 7);
						$data['nome'] = troca($nome, "'", '´');
						$cpf = $cpf;
						$data['cpf'] = strzero($cpf, 11);

						$data['email1'] = $email;
						$data['email2'] = '';

						$data['tel1'] = '';
						$data['tel2'] = '';
						$data['nomeCurso'] = '';

						$data['genero'] = '';
						$data['sexo'] = '';

						$data['tipo'] = '5';
						$dtnasc = '00000000';
						$data['centroAcademico'] = 'Escola de ensino médio';

						$data['dataNascimento'] = substr($dtnasc, 4, 4) . '-' . substr($dtnasc, 2, 2) . '-' . substr($dtnasc, 0, 2);
						$data['cracha'] = $this -> usuarios -> geraCracha();
						$data['pessoa'] = $data['cracha'];

						$this -> usuarios -> insere_usuario($data);

					}

					$dados = $this -> usuarios -> le_cpf($cpf);
					$cracha = $dados['us_cracha'];
					if (count($dados) > 0) {
						$habilitado = 1;
					}

					if ($habilitado == 1) {
						/* HABILITADO PARA SUBMISSAO */
						$redirect = False;
						$id = $this -> ics -> projeto_novo($cracha, 'FEIRA', $redirect);

						$url = base_url('index.php/evento/submit/' . $ide . '/' . $id . '/' . checkpost_link($id));
						redirect($url);
					}
				} else {
					$erro = '<font color="red">Nome ou e-mail inválidos!</font>';
				}

			} else {
				$erro = '<font color="red">CPF Inválido!</font>';
			}
		}

		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));

		if ($ok == 1) {
			array_push($cp, array('$S15', '', 'Informe seu CPF', False, False));
			array_push($cp, array('$S80', '', 'Nome completo', False, True));
			array_push($cp, array('$S80', '', 'Informe seu e-mail', False, True));
			array_push($cp, array('$M', '', $erro, False, False));
		} else {
			array_push($cp, array('$S15', '', 'Informe seu CPF', False, True));
			array_push($cp, array('$M', '', $erro, False, False));
			array_push($cp, array('$H', '', '', False, False));
			array_push($cp, array('$M', '', '', False, False));
		}
		array_push($cp, array('$B8', '', 'Iniciar submissão >>', False, True));

		$form = new form;
		$tela = '<table width="960"><tr><td>' . $form -> editar($cp, '') . '</td></tr></table>';

		return ($tela);
	}

	function submit($id) {

	}

	function habilata_inscricao($cracha = '', $cpf = '') {
		$usr = $this -> usuarios -> le_cpf($cpf);
		if (count($usr) > 0) {
			return (1);
		}
		return (0);
	}

}
?>
