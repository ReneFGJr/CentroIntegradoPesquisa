<?php
class equipamentos extends CI_model {
	var $tabela = 'pro_equipamento';
	function row($obj) {
		$obj -> fd = array('id_pe', 'pe_nome', 'pe_marca', 'pe_modelo');
		$obj -> lb = array('ID', 'Equipamento', 'Marca', 'Modelo');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}
	
	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
						left join pro_equipamento_tipo on pe_tipo = id_pet
						left join pro_equipamento_contabil on pet_contabil = id_pec
					where id_pe = ".$id;
					
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			$data['imgs'] = $this->imagens($id);
			
			return($data);
		}
	function imagens($id)
		{
			$file = 'img/equipamento/pd_'.strzero($id,7);
			$imgs = array();
			for ($r=0;$r < 64;$r++)
				{
					$complement = '';
					if ($r > 0)
						{
							$complement = chr(64+$r);
						}
					$filename = $file.$complement.'.jpg';
					if (file_exists($filename))
						{
							array_push($imgs,$filename);
						}
				}
			if (count($imgs) == 0)
				{
					array_push($imgs,'img/equipamento/pd_0000000.jpg');
				}
			return($imgs);
		}

}
?>
