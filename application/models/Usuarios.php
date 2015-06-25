<?php
class usuarios extends CI_model {
	
	function label($nome='',$id)
		{
			$nome = '<A HREF="'.base_url('index.php/person/view/'.$id.'/'.checkpost_link($id)).'" target="_new" class="link">'.nbr_autor($nome,7).'</A>';
			return($nome);
		}
		
	function findStudentByCracha($cracha) {
		$cracha = sonumero($cracha);

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

		/* Busca dados do cadastro */
		$sql = "select * from usuario where us_cracha = '" . $cracha . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($cracha);
		} else {
			/* Consulta Web Service */
			$this->load->model('webservice/ws_sga');
			$rst = $this -> ws_sga -> findStudentByCracha($cracha);

			/* Busca dados do cadastro */
			$sql = "select * from usuario where us_cracha = '" . $cracha . "' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			if (count($rlt) > 0) {
				$line = $rlt[0];
				return ($cracha);
			} else {
				return ('');
			}
		}

	}	

	function readByCracha($cracha) {
		/* Busca dados do cadastro */
		$sql = "select * from usuario as t1
					left join usuario_titulacao as t2 on t1.usuario_titulacao_ust_id= t2.usuario_titulacao_ust_id				 
					where us_cracha = '" . $cracha . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		$line = $rlt[0];
		$line['us_titulacao'] = $line['ust_sigla'];
		$line['us_perfil'] = '';
		$line['us_curso'] = '';
		$line['us_contatos'] = '';
		
		$tipo = $line['usuario_tipo_ust_id'];
		if ($tipo=='2')
			{
				$line['us_perfil'] = 'Estudante';
			}
		return($line);
	}	
	
	function readById($id)
		{
		/* Busca dados do cadastro */
		$sql = "select *, usuario_titulacao.ust_nome as titulacao, 
					usuario_tipo.ust_nome as perfil
					 from usuario	
					left join usuario_titulacao on usuario_titulacao_ust_id= usuario_titulacao.ust_id		
					left join usuario_tipo on usuario_tipo_ust_id = usuario_tipo.ust_id		 
					where id_us = '" . $id . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		$line = $rlt[0];
		$line['us_titulacao'] = $line['titulacao'];
		$line['us_titulacao_sigla'] = $line['ust_sigla'];
		$line['us_perfil'] = $line['perfil'];
		$line['us_curso'] = '';
		$line['us_contatos'] = '';
				
		return($line);		
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

		$sql = "select * from usuario where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
		} else {
			/* Novo registro */
			$sql = "insert into usuario 
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