<?php
class dgps extends CI_model
	{
	var $tabela = 'dgp';
	function row($obj)
		{
		$obj -> fd = array('id_dgp', 'dgp_nome', 'dgp_lastupdate', 'dgp_status');
		$obj -> lb = array('ID', 'Nome do Grupo', 'atualizado', 'estatus');
		$obj -> mk = array('', 'L', 'L', 'L');
		return($obj);
		}	
	function le($id=0)
		{
			$this->load->model('usuarios');

			$sql = "select * from ".$this->tabela." where id_dgp = ".$id;
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			$nome = $this->usuarios->label('Rene Faustino GABRIEL JUnior',1);
			$data['lideres'] = $nome;
			return($data);
		}
	function cp()
		{
			$cp = array();
			array_push($cp,array('$H8','id_dgp','',False,True));
			array_push($cp,array('$S200','dgp_nome',msg('dgp_nome'),True,True));
			array_push($cp,array('$S200','dgp_link',msg('dgp_espelho'),True,True));
			//array_push($cp,array('$S200','dgp_link',msg('dgp_instituicao'),True,True));
			array_push($cp,array('$HV','dgp_instituicao','0',True,True));
			array_push($cp,array('$HV','dgp_lastupdate','0000-00-00',False,True));
			array_push($cp,array('$HV','dgp_status','@',False,True));
			
			array_push($cp,array('$B','',msg('gravar'),false,True));
			
			return($cp);
		}
	}
?>
