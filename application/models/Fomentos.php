<?php
class Fomentos extends CI_model {
	/*tabelas*/
	var $tabela  = 'fomento_edital';
	var $tabela1 = 'idioma';
	var $tabela2 = 'fomento_status';
	var $tabela3 = 'fomento_disseminador';
	
	
	function tipo_edital() {
		$ed = array();
		$ed['1'] = 'Bolsas / Recursos Humanos';
		$ed['2'] = 'Auxilio a Pesquisa';
		$ed['3'] = 'Cooperação Internacional';
		$ed['4'] = 'Prêmios';
		$ed['5'] = 'Eventos';
		return ($ed);
	}
	
	function cp()
		{
			$info = '<TR><TD><TD class="tabela01">
			Informar a data do <I>Deadline</I>
			<BR>Informar 01/01/1910 - Para 90 dias antes do evento (Deadline)
			';	
				
			$cp = array();
			
			/*querys*/
			$sql_tipo 			= 'select * from '.$this->tabela.'  where ed_status = 1 order by ed_edital_tipo';
			$sql_idioma 		= 'select * from '.$this->tabela1.' where i_ativo = 1 order by i_nome';
			$sql_fomento_status = 'select * from '.$this->tabela2.' where fs_ativo = 1 order by fs_nome';
			$sql_dissiminador 	= 'select * from '.$this->tabela3.' where fdis_ativo = 1 order by fdis_nome';
			
			array_push($cp,array('$H8','id_ed','',False,True));
			array_push($cp,array('$T70:3','ed_titulo',msg('fm_titulo'),True,True));
			array_push($cp,array('$S70','ed_titulo_email',msg('fm_titulo_email'),false,True));
			array_push($cp,array('$HV', 'ed_dt_create', date("Y-m-d"), False, True));
			array_push($cp,array('$Q id_fdis:fdis_nome:'.$sql_dissiminador, 'ed_local', msg('fm_disseminador'), False, True));
			/* tipos */  
			$op_tipo = '';
			$tp = $this -> tipo_edital();
				for ($r = 1; $r < (count($tp) + 1); $r++) {
					$op_tipo .= '&' . $r;
					$op_tipo .= ':';
					
					$op_tipo .= trim($tp[$r]);
				}
			array_push($cp,array('$O ' . $op_tipo, 'ed_edital_tipo', msg('fm_tipo_edital'), true, True));
			array_push($cp,array('$Q id_i:i_nome:'.$sql_idioma,'ed_idioma',msg('fm_idioma'),true,True));
			array_push($cp,array('$S20', 'ed_chamada', msg('fm_chamada'), True, True));
			//array_push($cp, array('${', '', 'Datas', False, True));
			array_push($cp,array('$D','ed_dt_deadline_elet',msg('fm_data_01'),false,True));
			array_push($cp,array('$D','ed_dt_previsao_divulg_res',msg('fm_data_03'),false,True));
			//array_push($cp, array('$}', '', 'Datas', False, True));
			array_push($cp,array('$M', '', $info, False, True));
			//array_push($cp,array('$D','ed_dt_deadline_envio',msg('fm_data_02'),false,True));
			array_push($cp,array('$O 0:Não&1:Sim', 'ed_fluxo_continuo', msg('fm_fluxo_continuo'), True, True));
			array_push($cp,array('$C1', 'ed_document_require', msg('fm_assinatura'), False, True));
			array_push($cp,array('$S20','ed_login',msg('fm_login'),true,True));
			//array_push($cp, array('${', '', 'Categoria', False, True));
			array_push($cp,array('$T70:3','ed_texto_1', msg('fm_texto_1'),false,True));
			array_push($cp,array('$T70:3','ed_texto_2', msg('fm_texto_2'),false,True));
			array_push($cp,array('$T70:3','ed_texto_3', msg('fm_texto_3'),false,True));
			array_push($cp,array('$T70:3','ed_texto_4', msg('fm_texto_4'),false,True));
			array_push($cp,array('$T70:3','ed_texto_5', msg('fm_texto_5'),false,True));
			array_push($cp,array('$T70:3','ed_texto_6', msg('fm_texto_6'),false,True));
			array_push($cp,array('$T70:3','ed_texto_7', msg('fm_texto_7'),false,True));
			array_push($cp,array('$T70:3','ed_texto_8', msg('fm_texto_8'),false,True));			
			array_push($cp,array('$T70:3','ed_texto_9', msg('fm_texto_9'),false,True));
			array_push($cp,array('$T70:3','ed_texto_10',msg('fm_texto_10'),false,True));
			array_push($cp,array('$T70:3','ed_texto_11',msg('fm_texto_11'),false,True));
			array_push($cp,array('$T70:3','ed_texto_12',msg('fm_texto_12'),false,True));
			//array_push($cp, array('$}', '', 'Categoria', False, True))
			array_push($cp,array('$S70','ed_url_externa',msg('fm_url_externa'),false,True));	
			array_push($cp,array('$Q id_fs:fs_nome:'.$sql_fomento_status, 'ed_status', msg('fm_status'), False, True));
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
