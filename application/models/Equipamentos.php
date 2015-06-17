<?php
class equipamentos extends CI_model {
	var $tabela = 'pro_equipamento';
	
	function row($obj) {
		$obj -> fd = array('id_pe', 'pe_nome', 'pe_marca', 'pe_modelo');
		$obj -> lb = array('ID', 'Equipamento', 'Marca', 'Modelo');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}
	
	function cp()
		{
			$cp = array();
			$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
			array_push($cp,array('$H8','id_pe','',False,True));
			array_push($cp,array('$S200','pe_nome',msg('eq_nome'),True,True));
			array_push($cp,array('$S40','pe_marca',msg('eq_marca'),False,True));
			array_push($cp,array('$S40','pe_modelo',msg('eq_modelo'),False,True));
			array_push($cp,array('$N8','pe_preco',msg('eq_preco'),False,True));
			array_push($cp,array('$Q id_pet:pet_descricao:'.$sql_tipo,'pe_tipo',msg('eq_tipo'),False,True));
			array_push($cp,array('$S40','pe_part_number',msg('eq_part_number'),False,True));
			array_push($cp,array('$T80:4','pe_descricao_1',msg('eq_descricao_1'),False,True));
			array_push($cp,array('$T80:4','pe_descricao_2',msg('eq_descricao_2'),False,True));
			array_push($cp,array('$T80:4','pe_descricao_3',msg('eq_ativo_1'),False,True));
			array_push($cp,array('$O 1:SIM&0:NÃO','pe_ativo',msg('eq_ativo_2'),True,True));
			
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
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
