<?php
class paises extends CI_Model {
	var $tabela = 'pais';
	function busca_pais($pais) {
		$sql = "select * from " . $this -> tabela . " where nome like '$pais%' ";
		echo $sql;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id = $line['iso3'];
			return ($id);
		} else {
			$id = 'NNN';
			return ($id);
		}

	}

}
?>
