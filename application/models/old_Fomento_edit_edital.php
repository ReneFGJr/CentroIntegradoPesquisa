<?php

class action_edit_edital_fomento extends CI_model {
		
	var $tabela = 'fomento_editais';
	
	function editar_edital_fomento($id = 1){
			
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];
		
		return ($line);
	
	}
	
	public function listar(){
		
		return $this->db->get('.$this -> tabela.');
		
	}

	public function salvar($dados = null){
		
		if ($dados) {
			return $this->db->insert('.$this -> tabela.', $dados);
		}
	}
	
	public function atualizar(){
		
				$data = array('titulo' => $titulo, 'agencia' => $agencia, 'idioma' => $idioma);
				$where = "id = 1 AND status = 'active'"; 
				$str = $this->db->update_string('.$this -> tabela.', $data, $where);
	}	

		
		
		
	
	
}

?>