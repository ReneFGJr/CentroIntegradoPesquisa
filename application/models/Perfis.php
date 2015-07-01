<?php
class Perfis extends CI_model {
		var $tabela = 'logins_perfil';

	function row($obj) {
		$obj -> fd = array('id_usp', 'usp_codigo', 'usp_descricao', 'usp_ativo');
		$obj -> lb = array('id', msg('Label_perfil_codigo'), msg('Label_perfil_descricao'), msg('Label_perfil_status'));
		$obj -> mk = array('', 'L', 'L','C');
		return ($obj);
	}
	
function cp()
		{
				
			//$sql_idioma = 'select * from idioma where 1 = 1 order by i_nome';
				
			$cp = array();
			array_push($cp,array('$H8','id_usp','',False,True));
			array_push($cp,array('$S4','usp_codigo',msg('Label_perfil_codigo'),True,True));
			array_push($cp,array('$S10','usp_descricao',msg('Label_perfil_descricao'),false,True));
			array_push($cp,array('$O 1:SIM&0:NÃO','usp_ativo',msg('Label_perfil_status'),false,True));
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}


	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
					where id_usp = ".$id;
			
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			
			return($data);
		}


}
?>		
	