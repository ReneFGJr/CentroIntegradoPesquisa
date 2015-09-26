<?php
class semic_avaliacoes extends CI_Model {
	function set_avaliador($id, $nome) {
		$chk = md5($id . $nome . 'SeMiC' . date("Ymd"));
		$se = array('id' => $id, 'nome' => $nome, 'chk' => $chk);
		$this->session->set_userdata($se);
		return(1);
	}

	function security() {
		$id = $this -> session -> userdata("id");
		$nome = $this -> session -> userdata("nome");
		$chk = $this -> session -> userdata("chk");
		
		$chk2 = md5($id . $nome . 'SeMiC' . date("Ymd"));
		if ($chk == $chk2)
			{
				$this->set_avaliador($id, $nome);		
			} else {
				redirect('index.php/semic_avaliacao');
			}	
	}

}
?>
