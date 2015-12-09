<?php
class usuarios extends CI_model {
	var $tabela = 'us_usuario';

	function ghost_link($id = 0) {
		if (function_exists("perfil")) {
			if (perfil('#SPI#ADM#CPP#CPI') == 1) {
				$link = '<a href="' . base_url('index.php/login/ap/' . $id . '/' . checkpost_link($id . date("Ymdhi"))) . '">';
				$link .= '<img src="' . base_url('img/icon/icone_ghost.png') . '" border=0 height="16" title="' . msg("ghost_access") . '"></a>';
				return ($link);
			} else {
				return ("");
			}
		}
		return ("");
	}

	function cp_usuario() {
		$cp = array();
		array_push($cp, array('$H8', 'id_us', '', False, True));
		//		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		//		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_nome', msg('nome'), True, True));
		array_push($cp, array('$S12', 'us_cracha', msg('cracha'), True, True));
		array_push($cp, array('$S16', 'us_cpf', msg('cpf'), False, True));
		array_push($cp, array('$D8', 'us_dt_nascimento', msg('dt_nascimento'), False, True));

		array_push($cp, array('$Q c_campus:c_campus:select * from campus order by c_campus', 'us_campus_vinculo', msg('Campus'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));
		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));
		array_push($cp, array('$HV', 'us_ativo', '1', True, True));
		array_push($cp, array('$Q id_ustp:ustp_nome:select * from us_tipo order by ustp_nome', 'usuario_tipo_ust_id', msg('perfil'), True, True));
		array_push($cp, array('$Q id_ies:ies_nome:select id_ies, CONCAT(ies_nome,\' (\',ies_sigla,\')\') as ies_nome from ies_instituicao order by ies_nome', 'ies_instituicao_ies_id', msg('instituicao'), True, True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));
		return ($cp);
	}

	function cracha_duplicados() {
		$sql = "select * from (
					select us_cracha, count(*) as total, max(id_us) as max from us_usuario 
						where us_cracha <> ''
						group by us_cracha
					) as tabela where total > 1
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$cracha = $line['us_cracha'];
			$sx .= '<br>CRACHA: ' . $cracha . ' ' . $total;
		}

		$sql = "select * from (
					select us_cpf, count(*) as total, max(id_us) as max from us_usuario 
						where us_cpf <> '' and us_ativo = 1
						group by us_cpf
					) as tabela where total > 1
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$cracha = $line['us_cpf'];
			$sx .= '<br>CPF: ' . $cracha . ' ' . $total;
		}
		return ($sx);
	}

	function mostra_ic($cpf) {
		$wh = " al_cpf = '$cpf' ";
		$sql = $this -> ics -> table_view($wh);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		$sx = '';
		$sx .= '<h2>Inicação Científica e Tecnológica</h2>';
		$sx .= '<table width="100%" cellpadding=5 cellspacing=0 class="border1 lt1">';
		$sx .= '<tr>
						<td width="5%"><b>Protocolo</b></td>
						<td width="5%"><b>Ano</b></td>
						<td width="5%"><b>Edital</b></td>
						<td width="10%"><b>Tipo</b></td>
						<td width="20%"><b>Orientador</b></td>
						<td width="50%"><b>Trabalho</b></td>
						<td width="5%"><b>Situação</b></td>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;

			$line = $rlt[$r];

			$link = base_url('index.php/ic/view/' . $line['id_ic'] . '/' . checkpost_link($line['id_ic']));
			$link = '<a href="' . $link . '" class="link lt1" target="_new">';
			$sx .= '<tr>';
			$sx .= '<td>' . $link . $line['ic_plano_aluno_codigo'] . '</a></td>';
			$sx .= '<td>' . $line['ic_ano'] . '</td>';
			$sx .= '<td>' . $line['mb_tipo'] . '</td>';
			$sx .= '<td>' . $line['mb_descricao'] . '</td>';
			$sx .= '<td>' . $line['pf_nome'] . '</td>';
			$sx .= '<td>' . $line['ic_projeto_professor_titulo'] . '</td>';
			$sx .= '<td>' . $line['s_situacao'] . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		if ($to == 0) {
			$sx = '';
		}
		return ($sx);
	}

	function mostra_formacao($cpf) {
		$sql = "select distinct centroAcademico, nomeCurso, nivelCurso, situacao from us_usuario 
						inner join us_importar_sga on us_cracha = pessoa						 
						where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		$sx = '';
		$sx .= '<h2>Formação acadêmica</h2>';
		$sx .= '<table width="100%" cellpadding=5 cellspacing=0 class="border1 lt1">';
		$sx .= '<tr>
						<td width="30%"><b>Centro / Escola</b></td>
						<td width="30%"><b>Curso</b></td>
						<td width="35%"><b>Nível</b></td>
						<td width="5%"><b>Situação</b></td>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>' . $line['centroAcademico'] . '</td>';
			$sx .= '<td>' . $line['nomeCurso'] . '</td>';
			$sx .= '<td>' . $line['nivelCurso'] . '</td>';
			$sx .= '<td>' . $line['situacao'] . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		if ($to == 0) {
			$sx = '';
		}
		return ($sx);
	}

	function mostra_idade($data) {

		$date = new DateTime($data);
		// data de nascimento
		$interval = $date -> diff(new DateTime('2011-12-14'));
		// data definida

		$idade = $interval -> format('%Y') . ' anos';
		return ($idade);
	}

	function checar_cpf($pg = 0) {
		$sql = "select * from us_usuario where us_cpf like '%.%' or us_cpf like '%-%' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$id = $line['id_us'];
			$cpf = $line['us_cpf'];
			$cpf = strzero(sonumero($cpf), 11);
			$sql = "update us_usuario set us_cpf = '$cpf' where id_us = $id ";
			$rltx = $this -> db -> query($sql);
			$sx .= '<br>' . $line['us_cpf'] . '==>' . $cpf;
		}
		$sx = '<h1>Validação de CPF</h1>' . $sx;
		$sx .= '<p>Total de ' . $to . ' CPFs ajustados</p>';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);
	}

	function inport_professores() {
		$tabela = 'us_importar_drh_nov2015';
		$sql = "select s1.cpf, us.us_cpf, s1.nome from " . $tabela . " as s1
						left join  us_usuario as us on s1.cpf = us.us_cpf 
					where us.us_cpf is null";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			print_r($line);
			exit ;
		}

	}

	function mostra_conta($id) {
		$this -> load -> model('bancos');
		$sx = '';
		$sql = "select * from us_conta
						left join banco on id_banco = usc_banco
						where us_usuario_id_us = $id ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx .= '<table width="400" class="border1 lt1">';
		if (count($rlt) > 0) {

			$line = $rlt[0];
			//Verifica se a conta existe
			if (isset($rlt)) {

				/* Mosta sem conta */
				if (strlen(trim($rlt[0]['usc_banco'])) == 0) {
					$editar_conta = '';

					if (function_exists('perfil')) {
						if (perfil('#CPP#SPI#ADM') == 1) {
							$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link">editar</a>';
						}
					}
					$sx .= '<tr>';
					$sx .= '<td>' . msg('lb_sem_conta') . '<td>';
					$sx .= $editar_conta;
				} else {
					/* Valida conta */
					$ag = $line['usc_agencia'];
					$cc = $line['usc_conta_corrente'];
					if ($cc == '0000000') {$cc = '<font color="blue">ORDEM</font>';
					}
					$banco = $line['usc_banco'];
					$mod = $line['usc_modo'];

					$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);

					$sx .= '<tr>';
					$sx .= '<td rowspan=4 width="40">' . '<img src="' . base_url('img/bancos/banco_' . $line['usc_banco']) . '.jpg" height="40"></td>';
					$sx .= '<td align="right" width="40">Banco:</td>
								<td colspan=3 width="80%"><b>' . $line['usc_banco'] . ' - ' . $line['banco_nome'] . '</b></td>';
					$sx .= '</tr><tr>';
					$sx .= '<td align="right">Agência:</td><td><b>' . $line['usc_agencia'] . '</b></td>';
					$sx .= '</tr><tr>';
					$sx .= '<td align="right">Conta:</td><td><b>' . trim($line['usc_modo'] . ' ' . $line['usc_conta_corrente']) . '</b>' . ' tipo: ' . '<b>' . $line['usc_tipo'] . '</b>' . '  </td>';
					$sx .= '<td align="right">Situação:</td><td><b>' . $situacao . '</b></td>';
					$sx .= '</tr>';

					//edita conta bancaria do usuario
					$sx .= '<tr>';
					$sx .= '<td align="right" width="40" colspan=4>';
					$editar_conta = '';
					if (function_exists('perfil')) {
						if (perfil('#CPP#SPI#ADM') == 1) {
							$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link"><strong>editar</strong></a>';
						}
					}
					$sx .= $editar_conta;
					$sx .= '</td>';
					$sx .= '</tr>';
				}
			}
		} else {
			$this -> insere_conta_corrente_vazia($id);

			$sx .= '<tr>';
			$sx .= '<td>' . msg('lb_sem_conta') . '<td>';

			$editar_conta = '';
			if (function_exists('perfil')) {
				if (perfil('#CPP#SPI#ADM') == 1) {
					$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link">editar</a>';
				}
			}
			$sx .= $editar_conta;
			$sx .= '</td>';
			$sx .= '</tr>';

		}
		$sx .= '</table>';

		return ($sx);
	}

	function insere_conta_corrente_vazia($id) {
		$sql = "insert into us_conta 
					(us_usuario_id_us) values ($id)
			";
		$this -> db -> query($sql);
		return (0);
	}

	function valida_cc($banco, $agencia, $conta) {

	}

	function mostra_prefil($data) {
		$this -> load -> view('perfil/docente', $data);
		return ('');
	}

	function mostra_carga_horaria($cpf) {
		$sql = "select * from us_importar_drh where cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="lt1 border1">';
		$sx .= '<tr><th>Curso</th>
						<th>Horas</th>
						<th>Integral</th>
						<th>Tipo Horas</th>
						<th>Função</th>
						<th>Vinculo</th>
					</tr>
					';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot = $tot + $line['horas_semanais'];
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $line['curso'];
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= $line['horas_semanais'];
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= $line['tempo_integral'];
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= $line['tipo_hora'];
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= $line['funcao'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['curso_vinculo'];
			$sx .= '</td>';

			$sx .= '</tr>';
		}
		$sx .= '<tr><td colspan="5">Total de horas <b>' . $tot . '</b></td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function search($termos, $page, $popup = 0) {
		$termos = troca($termos, ' ', ';');
		$termos = splitx(';', $termos);

		$wh1 = '';
		$wh2 = '';
		$wh3 = '';
		for ($r = 0; $r < count($termos); $r++) {
			if ($r > 0) { $wh1 .= ' and ';
				$wh2 .= ' and ';
				$wh3 .= ' and ';
			}
			$t = $termos[$r];
			$wh1 .= "( us_nome like '%" . $t . "%')";
			$wh2 .= "( us_cracha = '" . $t . "')";
			$wh3 .= "( us_cpf = '" . $t . "')";
		}
		$sql = "select * from us_usuario where ($wh1) or ($wh2) or ($wh3) order by us_nome limit 20";
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><th>cracha</th><th>nome</th><th>CPF</th></tr>';
		$rlt = db_query($sql);

		while ($line = db_read($rlt)) {
			$id = $line['id_us'];
			$link = '<a href="' . base_url($page) . '/' . $line['id_us'] . '" class="link">';
			if ($popup == 1) {
				$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/credenciamento/voucher/' . $id . '/' . checkpost_link($id)) . '\',800,500);"  class="link">';
			}
			$sx .= '<tr class="lt3" valign="top">';
			$sx .= '<td align="center" width="80">';
			$sx .= $link . $line['us_cracha'] . '</a>';
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= $link . $line['us_nome'] . '</a>';
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= $link . mask_cpf($line['us_cpf']) . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function tabela_view() {
		$sql = "(select *
				from
	                us_usuario
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
	                left join us_avaliador_situacao on us_avaliador = id_as
	                left join ies_instituicao on id_ies = ies_instituicao_ies_id
	                left join us_tipo on id_ustp = usuario_tipo_ust_id
				) as usuario";
		return ($sql);
	}

	function cp_perfil() {
		$cp = array();
		$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
		array_push($cp, array('$H8', 'id_us', '', False, True));
		//		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		//		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));
		array_push($cp, array('$S100', 'us_nome_lattes', msg('link_nome'), False, True));

		array_push($cp, array('$Q c_campus:c_campus:select * from campus order by c_campus', 'us_campus_vinculo', msg('Campus'), False, True));

		//$sql = "select * from us_tipo order by ust_id ";
		//array_push($cp, array('$Q ust_id:ust_nome:' . $sql, 'usuario_tipo_ust_id', msg('us_tipo'), False, True));

		//$sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
		//array_push($cp, array('$Q usf_id:usf_nome:' . $sql, 'usuario_funcao_usf_id', msg('us_funcao'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));

		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));

		array_push($cp, array('$O 1:SIM&0:NÃO', 'us_ativo', msg('eq_ativo_2'), True, True));
		array_push($cp, array('$O 0:NÃO&1:SIM', 'us_teste', msg('user_teste'), True, True));

		array_push($cp, array('$Q id_ustp:ustp_nome:select * from us_tipo order by ustp_nome', 'usuario_tipo_ust_id', msg('perfil'), True, True));

		array_push($cp, array('$Q id_ies:ies_nome:select id_ies, CONCAT(ies_nome,\' (\',ies_sigla,\')\') as ies_nome from ies_instituicao order by ies_nome', 'ies_instituicao_ies_id', msg('instituicao'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	/*cria  formulario para cadastro e edicao de contas do usuario */
	function cp_conta_usuario() {
		$cp_conta = array();
		array_push($cp_conta, array('$H8', 'us_usuario_id_us', '', False, True));
		array_push($cp_conta, array('${', '', 'Cadastro de Conta', False, True));
		array_push($cp_conta, array('$Q id_banco:banco_nome:select * from banco where banco_preferencial = 1 order by banco_nome', 'usc_banco', msg('lb_usc_banco'), False, True));
		array_push($cp_conta, array('$S15', 'usc_agencia', msg('lb_usc_agencia'), False, True));
		array_push($cp_conta, array('$S20', 'usc_conta_corrente', msg('lb_usc_conta'), False, True));
		array_push($cp_conta, array('$HV', 'usc_tipo', 'CC', FALSE, FALSE));
		array_push($cp_conta, array('$S10', 'usc_modo', msg('lb_usc_modo'), False, True));
		array_push($cp_conta, array('$}', '', '', False, True));

		array_push($cp_conta, array('$B', '', msg('enviar'), false, True));

		return ($cp_conta);
	}

	function label($nome = '', $id) {
		$nome = '<A HREF="' . base_url('index.php/person/view/' . $id . '/' . checkpost_link($id)) . '" target="_new" class="link">' . nbr_autor($nome, 7) . '</A>';
		return ($nome);
	}

	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_cpf', 'us_emplid', 'ies_sigla', 'ustp_nome');
		$obj -> lb = array('ID', 'Nome', 'Cracha', 'CPF', 'EmployEd', 'Instituição', 'Perfil');
		$obj -> mk = array('', 'L', 'C', 'C', 'C');
		return ($obj);
	}

	function le_cracha($cracha) {
		$rs = $this -> readByCracha($cracha);

		if (count($rs) == 0) {
			$rs = array();
		} else {
			$id = $rs['id_us'];
			$rs = $this -> usuarios -> le($id);
		}

		return ($rs);
	}

	/* Consulta Usuario */
	function consulta_cracha($cracha = '', $source = 'sga') {
		if (strlen($cracha) == 0) {
			return ('');
		}
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_sga');

		if ($source == 'cs') {
		} else {
			$rs = $this -> ws_sga -> findStudentByCracha($cracha);
		}

		if (isset($rs['pessoa'])) {
			$cracha = $rs['pessoa'];
			$data = $this -> usuarios -> le_cracha($cracha);
			return ($cracha);
		} else {
			return ('');
		}
	}

	function le($id) {
		$sql = "select * from
            us_usuario
            left join us_hora as h on h.usuario_id_us = us_usuario.id_us
            left join us_email as e on e.usuario_id_us = us_usuario.id_us
            left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
            left join us_avaliador_situacao on us_avaliador = id_as
            left join ies_instituicao on id_ies = ies_instituicao_ies_id
            left join us_tipo on usuario_tipo_ust_id = id_ustp 
						where id_us = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$line['us_ss'] = '';
		//$line['us_lattes'] = '';
		$line['avaliador'] = $line['as_situacao'];
		$line['us_contatos'] = $this -> recupera_fone($id);
		$line['us_cc'] = $this -> mostra_conta($id);
		$line['us_idade'] = $this -> mostra_idade($line['us_dt_nascimento']);

		$line['editar'] = '';
		if (function_exists('perfil')) {
			if (perfil('#CPP#SPI#ADM') == 1) {
				$line['editar'] = '<a href="' . base_url('index.php/usuario/edit/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="lt0 link">editar</a>';
			}
		}
		$line['ghost'] = $this -> ghost_link($line['id_us']);
		if ($line['us_genero'] == 'M') { $line['us_genero'] = msg('Masculino');
		}
		if ($line['us_genero'] == 'F') { $line['us_genero'] = msg('Feminino');
		}
		
		if (validaCPF($line['us_cpf']) == false)
			{
				$line['us_cpf'] = '<font color="red">inválido</font>';
			}

		$line['email'] = $this -> lista_email($id);
		return ($line);
	}

	function email_add($id, $email) {
		$email = lowercase($email);
		if (validaemail($email)) {
			$sx = '';
			/* valida se já não existe */
			$sql = "select * from us_email 
								where usm_email = '$email' and usuario_id_us = $id ";
			$rlt = db_query($sql);
			if ($line = db_read($rlt)) {
				if ($line['usm_ativo'] == '0') {
					$sql = "update us_email set usm_ativo = '1' 
											where usm_email = '$email' and usuario_id_us = $id ";
					$rlt = $this -> db -> query($sql);
					$sx .= 'e-mail atualizado';
					$sx .= '<script> wclose(); </script>';
				} else {
					$sx = '<span class="error">E-mail já cadastrado</span>';
				}

			} else {
				$data = date("Y-m-d");

				$sql = "insert into us_email 
									(
									usuario_id_us, usm_tipo, usm_email,
									usm_ativo, usm_email_preferencial, usm_drh,
									usm_dt_atualizacao, usm_dt_insercao
									) values (
									'$id','corp','$email',
									'1','1','1',
									'$data','$data'
									)";
				$rlt = $this -> db -> query($sql);
				$sx .= '<script> wclose(); </script>';
			}

		} else {
			$sx = '<span class="error">E-mail inválido</span>';
		}
		return ($sx);
	}

	function tel_add($id, $fone) {
		$fone = sonumero($fone);
		//if (validafone($email)) {
		$sx = '';
		/* valida se já não existe */
		$sql = "select * from us_fone 
						where usf_fone = '$fone' and usuario_id_us = $id ";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			if ($line['usf_ativo'] == '0') {
				$sql = "update us_fone set usf_ativo = '1' 
								where usf_fone = '$fone' and usuario_id_us = $id ";
				$rlt = $this -> db -> query($sql);
				$sx .= 'telefone atualizado';
				$sx .= '<script> wclose(); </script>';
			} else {
				$sx = '<span class="error">E-mail já cadastrado</span>';
			}

		} else {
			$data = date("Y-m-d");

			$sql = "insert into us_fone 
									(
									usuario_id_us, usf_tipo, usf_fone,
									usf_ativo, usf_fone_preferencial
									) values (
									'$id','corp','$fone',
									'1','1'
									)";
			$rlt = $this -> db -> query($sql);
			$sx .= '<script> wclose(); </script>';
		}
		//} else {
		//	$sx = '<span class="error">E-mail inválido</span>';
		//}
		return ($sx);
	}

	function recupera_email($id) {
		$sql = "select * from us_email where usuario_id_us = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line['usm_email']);
		} else {
			return ('');
		}
	}

	function recupera_fone($id) {
		$sql = "select * from us_fone where usuario_id_us = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen($sx) > 0) { $sx .= ', ';
			}
			$sx .= format_fone($line['usf_fone']);
		}

		return ($sx);
	}

	function email_excluir($id) {
		$sql = "update us_email set usm_ativo = 0 where id_usm = " . $id;
		$rlt = $this -> db -> query($sql);
		$sx = '<script> wclose(); </script>';
		return ($sx);
	}

	function email_modify($id, $email) {
		$email = lowercase($email);
		/* $$$$ Inserir regra se já existe e-mail em outro registro */
		if (validaemail($email)) {
			$sql = "update us_email set usm_ativo = 1, usm_email = '$email' where id_usm = " . $id;
			$rlt = $this -> db -> query($sql);
			$sx = '<script> wclose(); </script>';
		} else {
			$sx = '<span class="error">E-mail inválido</span>';
		}
		return ($sx);
		return ($sx);
	}

	function lista_email($id = 0, $edit = 0) {
		$sql = "select * from us_email where usm_ativo = 1 and usuario_id_us = " . $id;
		$sx = msg('nenhum e-mail localizado');
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<font class="lt2">';

		if ((function_exists('perfil'))) {
			if (perfil('#CPP#SPI#ADM') == 1) {
				$edit = 1;
			}
		}

		/* Adiciona e-mail */
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idx = $line['id_usm'];
			if ($r > 0) {
				$sx .= '; ';
			}
			if ($edit == 1) {
				$onclick = 'onclick="newxy(\'' . base_url('index.php/usuario/email_mod/' . $idx . '/' . checkpost_link($idx)) . '\',600,200);" ';
				$sx .= '<A HREF="#" class="link lt2" ' . $onclick . '>';
			}
			$sx .= $line['usm_email'];
			if ($edit == 1) {
				$sx .= '</A>';
			}

			//$sx .= '(*)';
		}

		if ($edit == 1) {
			$onclick = 'onclick="newxy(\'' . base_url('index.php/usuario/email_add/' . $id . '/' . checkpost_link($id)) . '\',600,200);" ';
			$sx .= ' | ';
			$sx .= '<a href="#" class="link lt0" ' . $onclick . '>' . msg('add_email') . '</A>';
		}
		return ($sx);
	}

	function cp_email() {
		$cp = array();
		array_push($cp, array('$H8', 'id_usm', '', False, True));
		array_push($cp, array('$H8', 'usuario_id_us', '', False, True));
		array_push($cp, array('$O PERN:' . msg('pessoal') . '&COOP:' . msg('corporativo'), 'usm_tipo', '', False, True));
		array_push($cp, array('$EMAIL', 'usm_email', '', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'usm_ativo', '', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'usm_email_preferencial', '', False, True));
		return ($cp);
	}

	function cp() {
		$cp = array();
		$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
		array_push($cp, array('$H8', 'id_us', '', False, True));
		array_push($cp, array('$S200', 'us_nome', msg('us_nome'), True, False));
		array_push($cp, array('$S12', 'us_cracha', msg('cracha'), False, True));
		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));
		//		$sql = "select * from us_tipo order by ust_id ";
		//		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_tipo_ust_id', msg('us_tipo'), False, True));

		$sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
		array_push($cp, array('$Q usf_id:usf_nome:' . $sql, 'usuario_funcao_usf_id', msg('us_funcao'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_nome:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));

		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));

		array_push($cp, array('$O 1:SIM&0:NÃO', 'us_ativo', msg('eq_ativo_2'), True, True));
		array_push($cp, array('$O 0:NÃO&1:SIM', 'us_teste', msg('user_teste'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function readByCracha($cracha) {
		/* Busca dados do cadastro */
		if (strlen($cracha) == 0) {
			return ( array());
		}
		$sql = "select * from " . $this -> tabela . " as t1
					left join us_titulacao as t2 on t1.usuario_titulacao_ust_id = t2.ust_id				 
					where us_cracha = '" . $cracha . "' ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id = $line['id_us'];
			$line = $this -> le($id);
		} else {
			$line = array();
		}
		return ($line);
	}

	function geraCracha() {
		$sql = "select count(*) as total from us_usuario ";
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$cracha = 'F' . strzero(($line['total'] + 1), 7);
		return ($cracha);
	}

	function readByCPF($cpf) {
		$cpf = sonumero($cpf);
		/* Busca dados do cadastro */
		$sql = "select * from " . $this -> tabela . " as t1
					left join us_titulacao as t2 on t1.usuario_titulacao_ust_id = t2.ust_id				 
					where us_cpf = '" . $cpf . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id = $line['id_us'];
			$line = $this -> le($id);
		} else {
			$line = array();
		}
		return ($line);
	}

	function readById($id) {
		/* Busca dados do cadastro */
		$sql = "select *, us_titulacao.ust_nome as titulacao, 
					us_tipo.ust_titulacao_sigla as perfil
					 from " . $this -> tabela . "	
					left join us_titulacao on usuario_titulacao_ust_id= us_titulacao.ust_id		
					left join us_tipo on usuario_tipo_ust_id = us_tipo.ust_id		 
					where id_us = '" . $id . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$line = $rlt[0];
		$line['us_titulacao'] = $line['titulacao'];
		$line['us_titulacao_sigla'] = $line['ust_titulacao_sigla'];
		$line['us_perfil'] = $line['perfil'];
		$line['us_curso'] = '';
		$line['us_contatos'] = '';

		return ($line);
	}

	function limpa_cracha($cracha) {
		if (strlen($cracha) == 13) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 12) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 11) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 9) { $cracha = substr($cracha, 0, 8);
		}
		if (strlen($cracha) > 8) {
			return ('');
		}
		if (strlen($cracha) < 8) {
			return ('');
		}
		return ($cracha);
	}

	function insere_usuario($DadosUsuario) {

		$nome = nbr_autor($DadosUsuario['nome'], 7);
		$nome = troca($nome, "'", '´');
		$cpf = $DadosUsuario['cpf'];
		$cpf = strzero($cpf, 11);

		$email1 = trim($DadosUsuario['email1']);
		$email2 = trim($DadosUsuario['email2']);

		$tel1 = trim($DadosUsuario['tel1']);
		$tel2 = trim($DadosUsuario['tel2']);

		$genero = $DadosUsuario['sexo'];
		$dtnasc = sonumero($DadosUsuario['dataNascimento']);
		$dtnasc = substr($dtnasc, 4, 4) . '-' . substr($dtnasc, 2, 2) . '-' . substr($dtnasc, 0, 2);
		$cracha = $DadosUsuario['pessoa'];
		$curso = trim(limpaCursos($DadosUsuario['nomeCurso']));
		$emplid = '';
		$tipo = $DadosUsuario['tipo'];

		$sql = "select * from " . $this -> tabela . " where 
				us_cpf = '$cpf' 
				or us_cracha = '$cracha'
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
			$line = $rlt[0];
			$idu = $line['id_us'];

			if ($line['us_cracha'] != $cracha) {
				$up = ", us_cracha = '$cracha' ";
			} else {
				$up = '';
			}

			$sql = "update " . $this -> tabela . " set
						us_curso_vinculo = '$curso',
						us_cpf = '$cpf',
						us_dt_update_cs = '" . date("Y-m-d") . "',
						usuario_tipo_ust_id = $tipo,						
						us_genero = '$genero'
						$up
					where id_us = $idu ";
			$this -> db -> query($sql);
		} else {
			/* Novo registro */
			$sql = "insert into " . $this -> tabela . " 
							(
							us_nome, us_cpf, us_cracha,
							us_emplid, usuario_tipo_ust_id, us_dt_nascimento,
							us_curso_vinculo, us_dt_update_cs
							) values (
							'$nome','$cpf','$cracha',
							'$emplid','$tipo','$dtnasc',
							'$curso', '" . date("Y-m-d") . "'
							)					
					";
			$this -> db -> query($sql);

			$sql = "select * from " . $this -> tabela . " where us_cpf = '$cpf' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			$line = $rlt[0];
			$idu = $line['id_us'];
		}
		if ($idu > 0) {
			if (strlen($email1) > 0) { $this -> email_add($idu, $email1);
			}
			if (strlen($email2) > 0) { $this -> email_add($idu, $email2);
			}
			if (strlen($tel1) > 0) { $this -> tel_add($idu, $tel1);
			}
			if (strlen($tel2) > 0) { $this -> tel_add($idu, $tel2);
			}
		}
	}

}

function limpaCursos($c) {
	$c = troca($c, '(Tarde)', '');
	$c = troca($c, '(Diurno)', '');
	$c = troca($c, '(Noturno)', '');
	return ($c);
}
?>