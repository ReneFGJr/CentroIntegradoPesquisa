<?php
class Fomentos extends CI_model {
	/*tabelas*/
	var $tabela  = 'fomento_editais';
	var $tabela1 = 'idioma';
	var $tabela2 = 'fomento_status';
	var $tabela3 = 'mensagem_own';
	var $tabela4 = 'fomento_tipo';
	var $tabela5 = 'fomento_agencia';
	
	function cp()
		{
			$info = '<TR><TD><TD class="tabela01">
					Informar a data do <I>Deadline</I>
					<BR>Informar 01/01/1910 - Para 90 dias antes do evento (Deadline)
					';	
			/*inicia array*/	
			$cp = array();
			
			/*querys*/
			$sql_tipo 			 = 'select * from '.$this->tabela.'  where ed_status 	= 1 order by ed_edital_tipo';
			$sql_idioma 		 = 'select * from '.$this->tabela1.' where i_ativo 		= 1 order by i_nome';
			$sql_fomento_status  = 'select * from '.$this->tabela2.' where fs_ativo 	= 1 order by fs_nome';
			$sql_dissiminador 	 = 'select * from '.$this->tabela3.' where m_ativo		= 1 order by m_descricao';
			$sql_fomento_tipo 	 = 'select * from '.$this->tabela4.' where ftp_ativo 	= 1 order by ftp_nome';
			$sql_fomento_agencia = 'select * from '.$this->tabela5.' where agf_ativo 	= 1 order by agf_nome';
			
			/*campos edit fomento*/
			array_push($cp,array('$H8','id_ed','',False,True));
			//array_push($cp,array('${', '', 'Dados do edital', False, True));
				array_push($cp,array('$T70:3','ed_titulo',msg('fm_titulo'),True,True));
				array_push($cp,array('$S20','ed_chamada', msg('fm_chamada'), True, True));
				array_push($cp,array('$Q id_agf:agf_nome:'.$sql_fomento_agencia,'ed_agencia',msg('fm_agencia'),true,True));
				array_push($cp,array('$Q id_ftp:ftp_nome:'.$sql_fomento_tipo,'ed_idioma',msg('fm_tipo_edital'),true,True));
				array_push($cp,array('$Q id_m:m_descricao:'.$sql_dissiminador, 'ed_local', msg('fm_disseminador'), False, True));
				array_push($cp,array('$Q id_i:i_nome:'.$sql_idioma,'ed_edital_tipo',msg('fm_idioma'),true,True));
				array_push($cp,array('$S70','ed_titulo_email',msg('fm_titulo_email'),false,True));
				array_push($cp,array('$HV', 'ed_dt_create', date("Y-m-d"), False, True));
				array_push($cp,array('$S70','ed_url_externa',msg('fm_url_externa'),false,True));
			//array_push($cp,array('$}', '', 'Dados do edital', False, True));
			
			//array_push($cp,array('${', '', 'Informativos', False, True));
				array_push($cp,array('$O 0:Não&1:Sim', 'ed_fluxo_continuo', msg('fm_fluxo_continuo'), True, True));
				array_push($cp,array('$S20','ed_login',msg('fm_login'),false,True));
				array_push($cp,array('$Q id_fs:fs_nome:'.$sql_fomento_status, 'ed_status', msg('fm_status'), False, True));
				array_push($cp,array('$C1', 'ed_document_require', msg('fm_assinatura'), False, True));
			//array_push($cp,array('$}', '', 'Informativos', False, True));
			
			//array_push($cp,array('${', '', 'Datas', False, True));
				array_push($cp,array('$M', '', $info, False, True));
				array_push($cp,array('$D','ed_dt_deadline_elet',msg('fm_data_01'),false,True));
				array_push($cp,array('$D','ed_dt_previsao_divulg_res',msg('fm_data_03'),false,True));
			//array_push($cp,array('$}', '', 'Datas', False, True));
			
			//array_push($cp,array('${', '', 'Observações', False, True));
				array_push($cp,array('$T70:6','ed_texto_1', msg('fm_texto_1'),false,True));
				array_push($cp,array('$T70:6','ed_texto_2', msg('fm_texto_2'),false,True));
				array_push($cp,array('$T70:6','ed_texto_3', msg('fm_texto_3'),false,True));
				array_push($cp,array('$T70:6','ed_texto_4', msg('fm_texto_4'),false,True));
				array_push($cp,array('$T70:6','ed_texto_5', msg('fm_texto_5'),false,True));
				array_push($cp,array('$T70:6','ed_texto_6', msg('fm_texto_6'),false,True));
				//array_push($cp,array('$T70:3','ed_texto_7', msg('fm_texto_7'),false,True));
				//array_push($cp,array('$T70:3','ed_texto_8', msg('fm_texto_8'),false,True));			
				//array_push($cp,array('$T70:3','ed_texto_9', msg('fm_texto_9'),false,True));
				//array_push($cp,array('$T70:3','ed_texto_10',msg('fm_texto_10'),false,True));
				array_push($cp,array('$T70:6','ed_texto_11',msg('fm_texto_11'),false,True));
				array_push($cp,array('$T70:6','ed_texto_12',msg('fm_texto_12'),false,True));
			//array_push($cp,array('$}', '', 'Observações', False, True));
				
			//button
			array_push($cp,array('$B','',msg('bt_salvar_continuar'),false,True));
			
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
