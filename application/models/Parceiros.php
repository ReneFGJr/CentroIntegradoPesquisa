<?php
class Parceiros extends CI_model {
	var $tabela = 'parceiros';
	
	function row($obj) {
		$obj -> fd = array('campo_id', 'campo_nome', 'campo_outro', 'campo_outro');
		$obj -> lb = array('legenda', 'legenda', 'legenda', 'legenda');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}
	
	
function cp()
		{
			$cp = array();
			$sql_tipo = 'select * from parceiros where campo_ativo = 1';
			array_push($cp,array('$H8','id_parceiro','',False,True));
			array_push($cp,array('$S200','campo_nome',msg('Label_nome'),True,True));
			
			
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}	
	
	
}
?>	