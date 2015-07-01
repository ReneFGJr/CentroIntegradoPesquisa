<?php
class Instituicoes extends CI_model {
		var $tabela = 'gp_instituicao_parceira';

	function row($obj) {
		$obj -> fd = array('id_gpip', 'gpip_nome', 'gpip_sigla', 'gpip_uf');
		$obj -> lb = array('id', msg('Label_unidade_descricao'), msg('Label_unidade_sigla'), msg('Label_unidade_sigla'));
		$obj -> mk = array('', 'L','L','L');
		return ($obj);
	}
	
	
	function cp()
		{ 
				
			$cp = array();
			array_push($cp,array('$H11','id_gpip','',False,True));
			array_push($cp,array('$S80' ,'gpip_nome',msg('Label_unidade_descricao'),True,True));
			array_push($cp,array('$S10','gpip_sigla',msg('Label_unidade_sigla'),false,True));
			array_push($cp,array('$S2','gpip_uf',msg('Label_unidade_decano'),false,True));
			
			array_push($cp,array('$S90','gpip_razao_social',msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S20','gpip_cnpj',msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S60','gpip_natureza_juridica',				msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S15','gpip_faixa_po',						msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S60','gpip_cidade',							msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$T80:4','gpip_setores_atividade_economica',	msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$I11','gpip_use',								msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S20','gpip_latitude',						msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$S20','gpip_longitude',						msg('Label_unidade_decano'),false,True));
			array_push($cp,array('$I2','gpip_ordem',							msg('Label_unidade_decano'),false,True));
			
			array_push($cp,array('$O 1:SIM&0:NÃO','u_ativo',msg('Label_unidade_status'),false,True));
			
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
	