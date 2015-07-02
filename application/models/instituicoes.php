<?php
class Instituicoes extends CI_model {
		var $tabela = 'gp_instituicao_parceira';

	function row($obj) {
		$obj -> fd = array('id_gpip', 'gpip_nome', 'gpip_sigla', 'gpip_uf');
		$obj -> lb = array('id', msg('Label_instituicao_nome'), msg('Label_instituicao_sigla'), msg('Label_instituicao_uf'));
		$obj -> mk = array('', 'L','L','L');
		return ($obj);
	}
	
	
	function cp()
		{ 
				
			$cp = array();
			array_push($cp,array('$H11','id_gpip','',False,True));
			array_push($cp,array('$S80' ,'gpip_nome', msg('Label_instituicao_nome'),True,True));
			array_push($cp,array('$S10','gpip_sigla', msg('Label_instituicao_sigla'),false,True));
			array_push($cp,array('$S2','gpip_uf', msg('Label_instituicao_uf'),false,True));
			array_push($cp,array('$S90','gpip_razao_social', msg('Label_instituicao_rzsocial'),false,True));
			array_push($cp,array('$S20','gpip_cnpj', msg('Label_instituicao_cnpj'),false,True));
			array_push($cp,array('$S60','gpip_natureza_juridica', msg('Label_instituicao_natjuridica'),false,True));
			array_push($cp,array('$S15','gpip_faixa_po', msg('Label_instituicao_faixapo'),false,True));
			array_push($cp,array('$S60','gpip_cidade', msg('Label_instituicao_cidade'),false,True));
			array_push($cp,array('$T50:4','gpip_setores_atividade_economica', msg('Label_instituicao_ativeconomic'),false,True));
			//array_push($cp,array('$I11','gpip_use', msg('Label_instituicao_'),false,True));
			array_push($cp,array('$S20','gpip_latitude', msg('Label_instituicao_latitude'),false,True));
			array_push($cp,array('$S20','gpip_longitude', msg('Label_instituicao_longitude'),false,True));
			//array_push($cp,array('$I2','gpip_ordem', msg('Label_instituicao_ordem'),false,True));
			
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}


	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
					where id_gpip = ".$id;
			
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			
			return($data);
		}


}
?>		
	