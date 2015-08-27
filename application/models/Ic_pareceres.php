<?php
class Ic_pareceres extends CI_model {
	var $tabela = "pibic_parecer_2015";

	function update_line($line) {
		$tabela = $this -> tabela;
		$sql = "select * from " . $tabela . " where id_pp = " . $id_pp;
		$rlt = db_query($sql);

		if ($rlt = db_read($rlt)) {

		} else {

		}
	}

}
?>
