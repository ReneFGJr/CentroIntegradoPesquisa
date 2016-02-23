<?php
class ic_contratos extends CI_model {
	var $tabela = 'ic_contrato';

	function cp() {

		$cp = array();

		array_push($cp, array('$H8', 'id_icc', '', False, True));
		array_push($cp, array('$Q	 id_mb:mb_descricao: select * from ic_modalidade_bolsa order by mb_descricao', 'icc_id_mb', msg('lb_icc_modalidade_bolsa'), False, True));
		array_push($cp, array('$S80', 'icc_tit_contrato', msg('lb_icc_tit_model_contrato'), False, True));
		array_push($cp, array('$T80:13', 'icc_text_contrato', msg('lb_icc_texto_contrato'), False, True));
		array_push($cp, array('$[2010-'.date('Y').']', 'icc_ano_contrato', msg('lb_icc_ano_contrato'), False, True));

		return ($cp);

	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
						where id_icc = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		$data = $rlt[0];

		return ($data);

	}
	
		function le_modelo($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
						where icc_id_mb = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		$data = $rlt[0];

		return ($data);

	}
	

	function row($obj) {
		$obj -> fd = array('id_icc', 'icc_tit_contrato', 'icc_ano_contrato');
		$obj -> lb = array('ID', msg('lb_icc_modelo_contrato'), msg('lb_icc_ano_contrato'));
		$obj -> mk = array('', 'L', 'C');
		return ($obj);
	}
	
	/* Verifica se existe o contrato */
	function existe_contrato($id = 0){

		$sql = "select * from ic_contrato_emitido 
						where ice_id_ic_aluno = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		if(count($rlt > 0)){
			return 1;
		}
		else{
			$data = $this -> ics -> le($id);

			if(count($data) == 0){
				return 0;
			}
			
			print_r($data);
			exit;
			
			$id_contrato 	= $line['id_ica'];
			$id_aluno			= $line['aluno_id'];
			$id_prof 			= $line['prof_id'];
			$id_ic_aluno 	= $line['id_ica'];
			$Date 				= date('Y-m-d');
			$time 				= date('H:i:s');
			$ip 					= ip();
			$log 					= $_SESSION['id_us'];
			
			$sql = "insert into ic_contrato_emitir 
			       (ice_id_icc, ice_id_aluno, ice_id_professor, 
			        ice_id_ic_aluno, ice_data, ice_hora, 
			        ice_ip, ice_log_user)
			        values(".$id_contrato.','.$id_aluno.','.$id_prof.','.
			        				 $id_ic_aluno.','.$Date.','.$time.','.
			        				 $ip.','.$Date.','.$log."'.')'";
									 
			$rlt = $this -> db -> query($sql);
			
			return (1);					 
			
			}
	
	}
		


}
?>