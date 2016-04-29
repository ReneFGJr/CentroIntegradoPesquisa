<?php
class Cursos extends CI_model {
	var $tabela = 'curso';

	function row($obj) {
		$obj -> fd = array('id_c', 'c_nome_curso', 'c_ativo');
		$obj -> lb = array('id', msg('Label_curso_nome'), msg('Label_curso_status'));
		$obj -> mk = array('', 'L', 'C');
		return ($obj);
	}

	function cp() {
		$cp = array();
		
		array_push($cp, array('$H20', 'id_c', '', False, True));
		array_push($cp, array('$S80', 'c_nome_curso', msg('Label_curso_nome'), True, True));
		array_push($cp, array('$S25', 'c_nome_curso_en', msg('Label_curso_nome_eng'), false, True));
		array_push($cp, array('$S25', 'c_nome_curso_fr', msg('Label_curso_nome_fr'), false, True));	
		array_push($cp, array('$S25', 'c_nome_curso_es', msg('Label_curso_nome_esp'), false, True));	
		
		$sql = "select * from escola order by es_escola";
		array_push($cp, array('$Q id_es:es_escola:' . $sql, 'c_escola', msg('lb_curso_escola'), True, False));
		
		array_push($cp, array('$O 1:SIM&0:NÃO', 'c_ativo', msg('Label_curso_status'), True, True));
		
		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
					where id_c = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);
	}

}
?>
