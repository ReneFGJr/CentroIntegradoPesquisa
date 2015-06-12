<?php
class sga_pucpr extends CI_Model {
	var $tabela = 'logins';
	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_login');
		$obj -> lb = array('ID', 'Nome', 'Login');
		$obj -> mk = array('', 'L', 'L');
		return ($obj);
	}
	
	function ws_sc_findCracha($cracha='')
		{
			/* Campus Solutions
			$this->load->model('WebService/ws_cs');
			$data = $this->ws_cs->findStudentByCracha($cracha);
			 */
			$this->load->model('webservice/ws_sga');
			$data = $this->ws_sga->findStudentByCracha($cracha);
			$data['tipo'] = '2';
			
			print_r($data);
			$this->insere_usuario($data);
			 
		}

}
?>
