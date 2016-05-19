<?php
class escolas extends CI_Model
	{
		function le($id)
			{
				$sql = "select es_escola, decano.us_nome as decano_nome, decano.id_us as decano_id
						 from escola
							left join us_usuario as decano on es_decano = decano.id_us
							left join us_usuario as secre1 on es_secretaria_1 = secre1.id_us
							left join us_usuario as secre2 on es_secretaria_2 = secre2.id_us
							left join us_usuario as secre3 on es_secretaria_3 = secre3.id_us 
							where id_es = ".$id;
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				
				if (count($rlt) > 0)
					{
						return($rlt[0]);		
					} else {
						return(array());
					}				
			}
	}
?>
