<?php
class issns extends CI_Model
	{
		
	function row_scimago($obj)
		{
		$obj -> fd = array('id_sc', 'issn', 'titulo', 'assunto', 'sjr_quartile','h_index','pais');
		$obj -> lb = array('ID', 'ISSN', 'Titulo', 'Área','Quartil','Indice h','Pais');
		$obj -> mk = array('', 'L', 'L', 'L', 'C', 'C', 'C');
		return ($obj);
		}
	function scimago_base()
		{
			// select concat(substr(issn,1,4),substr(issn,6,4)) as issn, min(sjr_quartile) as quaril from scimago group by issn
		}	
	}
?>