<?php
class programas_pos extends CI_model {
	var $tabela = 'programa_pos';

	function row($obj) {
		$obj -> fd = array('id_pp', 'pp_nome', 'pp_sigla', 'pp_conceito');
		$obj -> lb = array('ID', 'Nome do programa', 'Siglas', 'Nota');
		$obj -> mk = array('', 'L', 'L', 'C');
		return ($obj);
	}
	
	function cp()
		{
			$cp = array();
			$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
			array_push($cp,array('$H8','id_pp','',False,True));
			array_push($cp,array('$S200','pp_nome',msg('pos_nome'),True,True));
			array_push($cp,array('$S40','pp_sigla',msg('pos_sigla'),False,True));
			array_push($cp,array('$[1-7]','pp_conceito',msg('pos_conceito'),False,True));
			return($cp);
		}
		
	function professor_ss_area($prof=0)
		{
			$sql = "SELECT distinct pp_area FROM ss_professor_programa_linha 
						inner join ss_programa_pos on programa_pos_id_pp = id_pp 
						
					WHERE us_usuario_id_us = $prof 
							and sspp_ativo = 1";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();	
			return($rlt);
		}		

	function edit() {

	}

	function le($id = 0) {

	}

}
