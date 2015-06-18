<?php
class Fomentos extends CI_model {
	var $tabela = 'fomento_editais';
	
	
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
			$sql_tipo = 'select * from '.$this->tabela.' where ed_status = 1';
			
			array_push($cp,array('$H8','id_ed','',False,True));
			array_push($cp,array('$T70:3','ed_titulo',msg('fm_titulo'),True,True));
			array_push($cp,array('$S70','ed_titulo_email',msg('fm_titulo_email'),false,True));
			//array_push($cp,array('$Q agf_nome:agf_codigo:select * from agencia_de_fomento where agf_ativo=1 order by agf_nome', 'fm_agencia', '', False, True));
			array_push($cp,array('$O : &Observatório:Observatório&IC:IC', 'ed_local', msg('fm_disseminador'), False, True));
			/* tipos */
			$op_tipo = '';
			$tp = $this -> tipo_edital();
			for ($r = 1; $r < (count($tp) + 1); $r++) {
				$op_tipo .= '&' . $r;
				$op_tipo .= ':';
				$op_tipo .= trim($tp[$r]);
			}
			array_push($cp,array('$O : ' . $op_tipo, 'ed_edital_tipo', msg('fm_tipo_edital'), true, True));
			array_push($cp,array('$O : &pt_BR:Portugues&us_EN:Inglês','ed_idioma',msg('fm_idioma'),true,True));
			array_push($cp,array('$S20', 'ed_chamada', msg('fm_chamada'), True, True));
			//array_push($cp, array('$H8', '', '', False, True));
			array_push($cp,array('$D','ed_data_1',msg('fm_data_01'),false,True));
			array_push($cp,array('$M', '', $info, False, True));
			array_push($cp,array('$D','ed_data_2',msg('fm_data_02'),false,True));
			array_push($cp,array('$D','ed_data_3',msg('fm_data_03'),false,True));
			array_push($cp,array('$O : &0:Não&1:Sim', 'ed_fluxo_continuo', msg('fm_fluxo_continuo'), True, True));
			array_push($cp,array('$C', 'ed_document_require', msg('fm_assinatura'), False, True));
			
			
			
			/*
			array_push($cp,array('$Q id_ed:ed_agencia:'.$sql_tipo,'ed_agencia',msg('fm_agencia'),False,True));
			array_push($cp,array('$S20','ed_autor',msg('fm_autor'),true,True));
			
			
			array_push($cp,array('$D','ed_data',msg('fm_data_01'),false,True));
			
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
			
			 * 
			 */
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
