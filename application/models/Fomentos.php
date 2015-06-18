<?php
class Fomentos extends CI_model {
	var $tabela = 'fomento_editais';
	
	function cp()
		{
			$cp = array();
			$sql_tipo = 'select * from '.$this->tabela.' where ed_status = 1';
			
			array_push($cp,array('$H','id_ed','',False,True));
			array_push($cp,array('$T80:2','ed_titulo',msg('fm_titulo'),True,True));
			array_push($cp,array('$S70','ed_titulo_email',msg('fm_titulo_email'),false,True));
			array_push($cp,array('$Q id_ed:ed_agencia:'.$sql_tipo,'ed_agencia',msg('fm_agencia'),False,True));
			array_push($cp,array('$S50','ed_idioma',msg('fm_idioma'),false,True));
			array_push($cp,array('$S20','ed_autor',msg('fm_autor'),true,True));
			
			array_push($cp,array('$D','ed_data',msg('fm_data_01'),false,True));
			array_push($cp,array('$D','ed_data_1',msg('fm_data_02'),false,True));
			array_push($cp,array('$D','ed_data_2',msg('fm_data_03'),false,True));
			array_push($cp,array('$D','ed_data_3',msg('fm_data_04'),false,True));
			
			array_push($cp,array('$T100:4','ed_texto_1',msg('fm_texto_1'),false,True));
			array_push($cp,array('$T100:4','ed_texto_2',msg('fm_texto_2'),false,True));
			array_push($cp,array('$T100:4','ed_texto_3',msg('fm_texto_3'),false,True));
			array_push($cp,array('$T100:4','ed_texto_4',msg('fm_texto_4'),false,True));
			array_push($cp,array('$T100:4','ed_texto_5',msg('fm_texto_5'),false,True));
			array_push($cp,array('$T100:4','ed_texto_6',msg('fm_texto_6'),false,True));
			array_push($cp,array('$T100:4','ed_texto_7',msg('fm_texto_7'),false,True));
			array_push($cp,array('$T100:4','ed_texto_8',msg('fm_texto_8'),false,True));			
			array_push($cp,array('$T100:4','ed_texto_9',msg('fm_texto_9'),false,True));
			array_push($cp,array('$T100:4','ed_texto_10',msg('fm_texto_10'),false,True));
			array_push($cp,array('$T100:4','ed_texto_11',msg('fm_texto_11'),false,True));
			array_push($cp,array('$T100:4','ed_texto_12',msg('fm_texto_12'),false,True));
			
			array_push($cp,array('$S70','ed_url_externa',msg('fm_url_externa'),false,True));	
			array_push($cp,array('$O 1:Editar&0:Cancelar&2:Concluido&3:Aberto','ed_status',msg('fm_status'),True,True));

			array_push($cp,array('$B','',msg('Gravar'),false,True));
			
			return($cp);
		}
	
	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
					where id_ed = ".$id;
					
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			
			return($data);
		}

}
?>
