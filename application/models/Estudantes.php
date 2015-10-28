<?php
class estudantes extends CI_Model
	{
	function tabela_view()
		{
			$tabela = "(select * from us_usuario where usuario_tipo_ust_id = 3 and us_ativo = 1) as docente ";
			return($tabela);
		}
	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome','us_cracha','us_emplid','id_us','us_ativo');
		$obj -> lb = array('ID', msg('nome'),msg('cracha'),msg('emplid'),msg('id'),msg('ativo'));
		$obj -> mk = array('', 'L','L','L','C');
		return ($obj);
	}
		
	}
?>
