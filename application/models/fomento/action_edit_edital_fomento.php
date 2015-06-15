<?php

class fomento_editais extends CI_model {
	var $tabela = 'fomento_editais';
	
	function editar_edital_fomento($id = 1){
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];
		
		return ($line);
	}
	
	
	
	
}

?>