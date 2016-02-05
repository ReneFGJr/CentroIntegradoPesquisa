<?php
class editatis extends CI_model {
	function le($id = 0) {
		$sql = "select * from fomento_edital 
						WHERE id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else
			return ( array());
	}

}
?>
