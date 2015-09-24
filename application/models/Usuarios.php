<?php
class usuarios extends CI_model {
	var $tabela = 'us_usuario';

	function mostra_prefil($data) {
		$sx = $this -> load -> view('perfil/docente', $data);
		return ($sx);
	}

	function cp_perfil() {
		$cp = array();
		$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
		array_push($cp, array('$H8', 'id_us', '', False, True));
		//		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		//		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));

		//$sql = "select * from us_tipo order by ust_id ";
		//array_push($cp, array('$Q ust_id:ust_nome:' . $sql, 'usuario_tipo_ust_id', msg('us_tipo'), False, True));

		//$sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
		//array_push($cp, array('$Q usf_id:usf_nome:' . $sql, 'usuario_funcao_usf_id', msg('us_funcao'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));

		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));

		array_push($cp, array('$O 1:SIM&0:NÃO', 'us_ativo', msg('eq_ativo_2'), True, True));
		array_push($cp, array('$O 0:NÃO&1:SIM', 'us_teste', msg('user_teste'), True, True));

		array_push($cp, array('$Q id_as:as_situacao:select * from us_avaliador_situacao where as_ativo = 1', 'us_avaliador', msg('avaliador'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function label($nome = '', $id) {
		$nome = '<A HREF="' . base_url('index.php/person/view/' . $id . '/' . checkpost_link($id)) . '" target="_new" class="link">' . nbr_autor($nome, 7) . '</A>';
		return ($nome);
	}

	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_cpf', 'us_emplid');
		$obj -> lb = array('ID', 'Nome', 'Cracha', 'CPF', 'EmployEd');
		$obj -> mk = array('', 'L', 'C', 'C', 'C');
		return ($obj);
	}

	function le_cracha($cracha) {
		$rs = $this -> readByCracha($cracha);
		return ($rs);
	}

	function consulta_cracha($cracha = '') {
		if (strlen($cracha) == 0) {
			return ('');
		}

		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_sga');
		$rs = $this -> ws_sga -> findStudentByCracha($cracha);

		if (isset($rs['pessoa'])) {
			$cracha = $rs['pessoa'];
			$data = $this -> usuarios -> le_cracha($cracha);
			return ($cracha);
		} else {
			return ('');
		}
	}

	function le($id) {
		$sql = "select *
				from
	                us_usuario
	                left join us_hora as h on h.usuario_id_us = us_usuario.id_us
	                left join us_email as e on e.usuario_id_us = us_usuario.id_us
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
	                left join us_avaliador_situacao on us_avaliador = id_as
				where id_us = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$line['us_ss'] = '';
		$line['us_lattes'] = '';
		$line['avaliador'] = $line['as_situacao'];

		$line['email'] = $this -> lista_email($id);
		return ($line);
	}

	function email_add($id, $email) {
		$email = lowercase($email);
		if (validaemail($email)) {
			$sx = 'OK';
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

	function recupera_email($id) {
		$sql = "select * from us_email where id_usm = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		return ($line['usm_email']);
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

	function lista_email($id = 0, $edit = 1) {
		$sql = "select * from us_email where usm_ativo = 1 and usuario_id_us = " . $id;
		$sx = msg('nenhum e-mail localizado');
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<font class="lt2">';
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
		$cracha = 'F' . strzero($line['total'], 7);
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
		if (strlen($cracha) == 9) { $cracha = substr($cracha, 0, 9);
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
		$cpf = $DadosUsuario['cpf'];
		$genero = $DadosUsuario['sexo'];
		$dtnasc = sonumero($DadosUsuario['dataNascimento']);
		$dtnasc = substr($dtnasc, 4, 4) . '-' . substr($dtnasc, 2, 2) . '-' . substr($dtnasc, 0, 2);
		$cracha = $DadosUsuario['pessoa'];
		$emplid = '';
		$tipo = $DadosUsuario['tipo'];

		$sql = "select * from " . $this -> tabela . " where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
		} else {
			/* Novo registro */
			$sql = "insert into " . $this -> tabela . " 
							(
							us_nome, us_cpf, us_cracha,
							us_emplid, usuario_tipo_ust_id, us_dt_nascimento
							) values (
							'$nome','$cpf','$cracha',
							'$emplid','$tipo','$dtnasc'
							)					
					";
			$this -> db -> query($sql);
		}
	}

}
?>