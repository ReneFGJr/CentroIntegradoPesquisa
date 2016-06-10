<?php
class semics extends CI_Model {
	function mostra_autores($proto = '', $editar = 1) {
		$this -> inclui_autores_automatico($proto);

		$sx = '<div id="autores">'.$this->ics->resumo_autores_mostra($proto);		
		$data = array();
		$data['msg'] = 'msg';
		$data['id'] = $proto;
		$data['check'] = checkpost_link($proto);
		$sx .= $this->load->view("ic/postar_resumo_autores.php",$data,true);
		$sx .= '</div>';
		return($sx);
	}


	function inclui_autores_automatico($proto) {
		$this -> load -> model("ics");
		$sql = "select * from semic_trabalho_autor where sma_protocolo = '$proto' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$line = $this -> ics -> le_protocolo($proto);
			$isql = "insert into semic_trabalho_autor (sma_protocolo, sma_nome, sma_funcao, sma_instituicao, sma_ativo, sma_titulacao) values ";
			$sql = $isql .= "('" . $proto . "','" . $line['pf_nome'] . "','9','PUCPR','1','')";
			$zrlt = $this -> db -> query($sql);

			$isql = "insert into semic_trabalho_autor (sma_protocolo, sma_nome, sma_funcao, sma_instituicao, sma_ativo, sma_titulacao) values ";
			$sql = $isql .= "('" . $proto . "','" . $line['al_nome'] . "','1','PUCPR','1','')";
			$zrlt = $this -> db -> query($sql);

			$isql = "insert into semic_trabalho_autor (sma_protocolo, sma_nome, sma_funcao, sma_instituicao, sma_ativo, sma_titulacao) values ";
			$sql = $isql .= "('" . $proto . "','" . $line['al_campus'] . " - " . $line['es_escola'] . "','21','','1','')";
			$zrlt = $this -> db -> query($sql);
		}
	}

}
?>
