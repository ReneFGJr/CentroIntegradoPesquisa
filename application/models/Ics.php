<?php
class ics extends CI_model
	{
	var $tabela_acompanhamento = 'switch';
	
	function cp_switch()
		{
			$cp = array();
			array_push($cp,array('$H8','id_sw','',False,True));
			array_push($cp,array('$SW','sw_01',msg('sw_ic_submissao'),False,True));
			array_push($cp,array('$SW','sw_02',msg('sw_ic_rel_pacial'),False,True));
			array_push($cp,array('$SW','sw_03',msg('sw_ic_rel_final'),False,True));
			array_push($cp,array('$B','',msg('update'),False,True));
			return($cp);
		}	
	}
?>
