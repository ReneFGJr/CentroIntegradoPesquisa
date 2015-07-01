<?php
class usuarios extends CI_model {
	var $tabela = 'us_usuario';
	function label($nome='',$id)
		{
			$nome = '<A HREF="'.base_url('index.php/person/view/'.$id.'/'.checkpost_link($id)).'" target="_new" class="link">'.nbr_autor($nome,7).'</A>';
			return($nome);
		}
		
	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_cpf', 'us_emplid');
		$obj -> lb = array('ID', 'Nome', 'Cracha', 'CPF','EmployEd');
		$obj -> mk = array('', 'L', 'C', 'C' ,'C');
		return ($obj);
	}	
	
	function lista_email($id=0)
		{
			$sql = "select * from us_email where usuario_id_us = ".$id;
			$sx = msg('nenhum e-mail localizado');
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<font class="lt2">';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<br>';
					//$sx .= '<A HREF="#">';
					$sx .= $line['usm_email'];
					//$sx .= '</A>';
					$sx .= '(*)';
				}
			return($sx);
		}
		
	function cp_email()
		{
			$cp = array();
			array_push($cp,array('$H8','id_usm','',False,True));
			array_push($cp,array('$H8','usuario_id_us','',False,True));
			
			array_push($cp,array('$O PERN:'.msg('pessoal').'&COOP:'.msg('corporativo'),'usm_tipo','',False,True));
			array_push($cp,array('$EMAIL','usm_email','',False,True));
			array_push($cp,array('$O 1:SIM&0:NÃO','usm_ativo','',False,True));
			array_push($cp,array('$O 1:SIM&0:NÃO','usm_email_preferencial','',False,True));
			return($cp);			
		}	
		
	function cp()
		{
			$cp = array();
			$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
			array_push($cp,array('$H8','id_us','',False,True));
			array_push($cp,array('$S200','us_nome',msg('us_nome'),True,False));
			array_push($cp,array('$S12','us_cracha',msg('cracha'),False,True));
			array_push($cp,array('$S20','us_cpf',msg('cpf'),False,True));
			array_push($cp,array('$S20','us_emplid',msg('employID'),False,True));
			
			array_push($cp,array('$S100','us_link_lattes',msg('link_lattes'),False,True));
			$sql = "select * from us_tipo order by ust_id ";
			array_push($cp,array('$Q ust_id:ust_nome:'.$sql,'usuario_tipo_ust_id',msg('us_tipo'),False,True));

			$sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
			array_push($cp,array('$Q usf_id:usf_nome:'.$sql,'usuario_funcao_usf_id',msg('us_funcao'),False,True));
			
			$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
			array_push($cp,array('$Q ust_id:ust_nome:'.$sql,'usuario_titulacao_ust_id',msg('us_titulacao'),False,True));
					
			array_push($cp,array('$O M:'.msg('masculino').'&F:'.msg('Feminino'),'us_genero',msg('us_genero'),True,True));
			
			array_push($cp,array('$O 1:SIM&0:NÃO','us_ativo',msg('eq_ativo_2'),True,True));
			array_push($cp,array('$O 0:NÃO&1:SIM','us_teste',msg('user_teste'),True,True));
			
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
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
		$sql = "select * from ".$this->tabela." where us_cracha = '" . $cracha . "' ";
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
			$sql = "select * from us_usuario where us_cracha = '" . $cracha . "' ";
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
		$sql = "select * from ".$this->tabela." as t1
					left join us_titulacao as t2 on t1.usuario_titulacao_ust_id = t2.ust_id				 
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
		$sql = "select *, us_titulacao.ust_nome as titulacao, 
					us_tipo.ust_nome as perfil
					 from ".$this->tabela."	
					left join us_titulacao on usuario_titulacao_ust_id= us_titulacao.ust_id		
					left join us_tipo on usuario_tipo_ust_id = us_tipo.ust_id		 
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

		$sql = "select * from ".$this->tabela." where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
		} else {
			/* Novo registro */
			$sql = "insert into ".$this->tabela." 
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