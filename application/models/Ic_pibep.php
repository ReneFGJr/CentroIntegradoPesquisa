<?php
class ic_pibep extends CI_model {
	
	function welcome()
		{
			$txt = '<div class="containter text-left">';
			$txt .= '<h1>Bem vindo!</h1>';
			$txt .= '<p>Para submeter um projeto para o PIBEP é necessário que você tenha participado do encontro no dia 30/abril/2016 na PUCPR e se inscrito antes desta data.</p>';
			$txt .= '<p>Para continuar é necessário que informe o número do Cracha do Lider do Grupo e Responsável pelo Projeto</p>';
			$txt .= '</div>';
			return($txt);
		}

	function submissao($idp, $ids, $pag) {

		/* SUBMISSAO */

		$this -> load -> model('geds');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$prt = $this -> ics -> le_projeto($ids);
		$proto = $prt['pj_codigo'];
		
		$cracha = $prt['pj_professor'];
		$user = $this -> usuarios -> le_cracha($cracha);		
		
		/* Líder do Projeto */
		$this->ics->lider_de_equipe($proto,$user);
		
		
		/* Dados */
		$tela = '<div class="container"><h3>Estudante Líder</h3>'.$this -> load -> view('perfil/user', $user, true).'</div>';
		$data = array();
		$data['content'] = $tela;
		$this->load->view('content',$data);

		$this -> geds -> tabela = 'ic_ged_documento';

		$cp = array();
		array_push($cp, array('$H8', 'id_pj', '', False, False));

		array_push($cp, array('$A', '', 'Título do projeto', False, True));
		array_push($cp, array('$T80:3', 'pj_titulo', '', False, True));

		$txt = '<br><br><fieldset><legend>Validação da Submissão</legend>';
		$txt .= $this -> validacao($ids);
		$txt .= '</fieldset>';
		array_push($cp, array('$M', '', $txt, False, True));
		
		/**************************************************************************** ESTUDANTES */

		$txt = '<br><br><fieldset><legend>Equipe</legend>';
		$txt .= '<div id="equipe">';
		$txt .= $this -> ics -> lista_equipe_projeto($proto);
		
		$txt .= '<br>'.$this -> ics -> botao_novo_equipe_projeto($proto);
		
		$txt .= '</div>';
		$txt .= '</fieldset>';
		array_push($cp, array('$M', '', $txt, False, True));
		
		
		/**************************************************************************** ARQUIVOS */

		$txt = '<br><br><fieldset><legend>Arquivos</legend>';

		$files = $this -> geds -> list_files_table($proto, 'ic');
		if (strlen($files) == 0)
			{
				$files = '<table class="table"><tr><td><font color="red">Nenhum arquivo postado</font></td></tr></table>';
			}
		$txt .= $files;
		
		$txt .= '<br>'.$this -> geds -> form_upload($proto, 'ic', 'PROJT');
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
		$tela = '<table width="960" border=0><tr><td>'.$form -> editar($cp, 'ic_submissao_projetos').'</td></tr></table>';

		$tela .= '<br><br><br>';

		return ($tela);
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
		if ((count($rlt) > 1) and (count($rlt) <= 5)) {
			$vd[6] = $class_ok;
			$vdt[6] = $ok;
		}

		/* Cursos diferentes */
		$curso = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen(trim($line['ispe_curso']))) {
				$nome_curso = UpperCaseSql($line['ispe_curso']);
				$curso[$nome_curso] = 1;
			}
		}
		if (count($curso) >= 2) {
			$vd[2] = $class_ok;
			$vdt[2] = $ok;
		}

		/* Vinculos com Outros Projetos */
		$in = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = trim($line['ispe_cracha']);
			if (strlen($cracha) > 0) {
				$sql = "select * from ic_submissao_projetos_equipe where ispe_protocolo <> '$proto' and ispe_cracha = '$cracha' ";
				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();

				if (count($rrr) > 0) {
					$in .= '<li>' . $line['ispe_nome'] . ' está vinculado ao protocolo ' . $rrr[0]['ispe_protocolo'] . '</li>';
				}
			}
		}
		if (strlen($in) > 0) {
			$in = '<ul>' . $in . '</ul>';
		} else {
			$vd[5] = $class_ok;
			$vdt[5] = $ok;
		}
		
		/* Vinculos com Programs de IC */
		$in_ic = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = trim($line['ispe_cracha']);
			if (strlen($cracha) > 0) {
				$sql = "select * from ic_aluno
							inner join us_usuario on id_us = aluno_id
							where us_cracha = '$cracha' and icas_id = 1 ";
							
				$rrr = $this -> db -> query($sql);
				$rrr = $rrr -> result_array();

				if (count($rrr) > 0) {
					$in_ic .= '<li>' . $line['ispe_nome'] . ' está vinculado a IC</li>';
				}
			}
		}
		if (strlen($in_ic) > 0) {
			$in_ic = '<ul>' . $in_ic . '</ul>';
		} else {
			$vd[1] = $class_ok;
			$vdt[1] = $ok;
		}		

		$sx = '<table class="table">';
		$sx .= '<tr class="' . $vd[0] . '"><td>Título do projeto</td><td align="center">' . $vdt[0] . '</tr>';

		$sx .= '<tr class="' . $vd[1] . '"><td>Membros da equipe não podem ter vinculos com programa IC/Monitoria.'.$in_ic.'</td><td align="center">' . $vdt[1] . '</tr>';

		$sx .= '<tr class="' . $vd[2] . '"><td>Estudantes de Cursos diferentes (mínimo dois cursos) - ' . count($curso) . ' cursos</td><td align="center">' . $vdt[2] . '</tr>';

		$sx .= '<tr class="' . $vd[3] . '"><td>Link do projeto no Youtube</td><td align="center">' . $vdt[3] . '</tr>';

		$sx .= '<tr class="' . $vd[4] . '"><td>Arquivo do Projeto em PDF</td><td align="center">' . $vdt[4] . '</tr>';

		$sx .= '<tr class="' . $vd[5] . '"><td>Membros da equipe, vinculo com outros projetos (o estudante pode somente estar vinculado a um projeto)' . $in . '</td><td align="center">' . $vdt[5] . '</tr>';

		$sx .= '<tr class="' . $vd[6] . '"><td>Membros da equipe (entre 2 e 5 alunos) - ' . count($rlt) . ' as membros registrados</td><td align="center">' . $vdt[6] . '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function inscricao($ide = 0) {
		/* */
		$this -> load -> model('ics');
		$cracha = get("dd1");
		$erro = '';

		if (strlen($cracha) > 0) {
			$cracha = $this -> usuarios -> limpa_cracha($cracha);

			if (strlen($cracha) == 8) {
				$habilitado = $this -> habilata_inscricao($cracha);

				if ($habilitado == 1) {
					/* HABILITADO PARA SUBMISSAO */
					$redirect = False;
					$id = $this -> ics -> projeto_novo($cracha, 'PIBEP', $redirect);

					$url = base_url('index.php/evento/submit/' . $ide . '/' . $id . '/' . checkpost_link($id));
					redirect($url);
				}
			}
		}

		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$S15', '', 'Informe seu cracha', True, True));
		array_push($cp, array('$M', '', $erro, False, False));
		array_push($cp, array('$B8', '', 'Iniciar submissão >>', False, True));

		$form = new form;
		$tela = '<table width="960"><tr><td>'.$form -> editar($cp, '').'</td></tr></table>';

		return ($tela);
	}

	function submit($id) {

	}

	function habilata_inscricao($cracha = '', $cpf = '') {
		return (1);
	}

}
?>
