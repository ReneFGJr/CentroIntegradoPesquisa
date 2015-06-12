<?php
class estudantes extends CI_model {

	function readByCracha($cracha) {
		/* Busca dados do cadastro */
		$sql = "select * from usuario
					 
					where us_cracha = '" . $cracha . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		$line = $rlt[0];
		$line['us_titulacao'] = '';
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

}
?>
