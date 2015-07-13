<?php
class Parceiros extends CI_model {
	var $tabela = 'csf_parceiro';
	
	function row($obj) {
		$obj -> fd = array('id_cp', 'cp_descricao');
		$obj -> lb = array('id', msg('Label_csf_descricao_parceiro'));
		$obj -> mk = array('', 'L');
		return ($obj);
	}
	
	
	function cp()
		{
				
			$sql_pais = 'select * from pais where 1 = 1 order by nome';
				
			$cp = array();
			array_push($cp,array('$H8','id_cp','',False,True));
			array_push($cp,array('$S80','cp_descricao',msg('Label_csf_descricao_parceiro'),True,True));
			array_push($cp,array('$Q iso3:nome:'.$sql_pais,'cp_pais',msg('Label_csf_nome_pais_parceiro'),True,True));
			array_push($cp,array('$O 1:SIM&0:NÃO','cp_ativo',msg('Label_csf_ativo_parceiro'),True,True));
			array_push($cp,array('$S50','cp_contato',msg('Label_csf_contato_parceiro'),false,True));
			array_push($cp,array('$S80','cp_email_1',msg('Label_csf_email1_parceiro'),false,True));
			array_push($cp,array('$S80','cp_email_2',msg('Label_csf_email2_parceiro'),false,True));
			array_push($cp,array('$S20','cp_phone_1',msg('Label_csf_phone1_parceiro'),false,True));
			array_push($cp,array('$S20','cp_phone_2',msg('Label_csf_phone2_parceiro'),false,True));
			array_push($cp,array('$S250','cp_site',msg('Label_csf_site_parceiro'),false,True));
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}	
	
	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
					left join pais on iso3 = cp_pais
					where id_cp = ".$id;
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			//$data['imgs'] = $this->imagens($id);
			
			return($data);
		}
	
	
}
?>	