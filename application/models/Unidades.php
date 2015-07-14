<?php
class Unidades extends CI_model {
	var $tabela = 'unidade';

	function row($obj) {
		$obj -> fd = array('id_u', 'u_descricao', 'u_sigla');
		$obj -> lb = array('id', msg('Label_unidade_descricao'), msg('Label_unidade_sigla'));
		$obj -> mk = array('', 'L', 'C');
		return ($obj);
	}

	function cp() {

		$cp = array();
		array_push($cp, array('$H20', 'id_u', '', False, True));
		array_push($cp, array('$S200', 'u_descricao', msg('Label_unidade_descricao'), True, True));
		array_push($cp, array('$S10', 'u_sigla', msg('Label_unidade_sigla'), false, True));
		array_push($cp, array('$S8', 'u_decano', msg('Label_unidade_decano'), false, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'u_ativo', msg('Label_unidade_status'), false, True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
					where id_u = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);
	}

}
?>
