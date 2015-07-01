<?php
class Idiomas extends CI_model {
		var $tabela = 'idioma';

	function row($obj) {
		$obj -> fd = array('id_i', 'i_nome', 'i_codificacao');
		$obj -> lb = array('id', msg('Label_idioma_nome'), msg('Label_idioma_codificacao'));
		$obj -> mk = array('', 'L', 'L');
		return ($obj);
	}
	
function cp()
		{
				
			$sql_idioma = 'select * from idioma where 1 = 1 order by nome';
				
			$cp = array();
			array_push($cp,array('$H8','id_i','',False,True));
			array_push($cp,array('$S80','i_nome',msg('Label_idioma_nome'),True,True));
			array_push($cp,array('$S20','i_ativo',msg('Label_idioma_ativo'),false,True));
			array_push($cp,array('$S250','i_codificacao',msg('Label_idioma_codificacao'),false,True));
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}	
	
	
	
}
?>		
	