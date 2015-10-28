<?php
class protocolos_ic extends CI_Model
	{
	function protocolos_abertos()
		{
			return(0);
			$sql = "select count(*) as total from ic_protocolos where pt_status ='A' group by pt_status = 'A' ";
			$rlt = db_query($sql);
			if ($line = db_read($rlt))
				{
					$total = $line['total'];
				} else {
					$total = 0;
				}
			return($total);
		}	
	}
?>
