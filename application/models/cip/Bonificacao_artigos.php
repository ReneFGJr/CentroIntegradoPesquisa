<?php
class bonificacao_artigos extends CI_Model {
	var $tabela = "cip_artigo";
	var $tabela_view = "bonificao_artigo_view";
	
	function le($id)
		{
			$sql = "select * from ".$this->tabela_view." where id_ar = ".$id;
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$line = $rlt[0];
			return($line);
		}

	function create_view() {
		/* Verifica se ja na existe a view */
		$rlt = $this -> db -> query("SHOW TABLES LIKE 'bonificao_artigo_view'");
		$rlt = $rlt->result_array();
		if (count($rlt) > 0)
		 {
			return ('');
		}		
		/* Criar View */
		$cp = '*';
		$sql = "
					SELECT " . $cp . " FROM cip_artigo
						left join cip_artigo_status on id_cas = ar_situacao
						left join us_usuario on us_cracha = ar_professor
			";

		$sql = "CREATE OR REPLACE VIEW bonificao_artigo_view AS (" . $sql . ");";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function row($obj) {
		$obj -> fd = array('id_ar', 'ar_protocolo', 'us_nome', 'ar_titulo','cas_descricao','ar_update');
		$obj -> lb = array('ID', 'Protocolo', 'autor','titulo','situacao','atualizado');
		$obj -> mk = array('', 'L', 'L', 'L','D');
		return ($obj);
	}

	function bar_menu() {
		$sql = "select * from cip_artigo_status where cas_contabiliza = 1 order by cas_ordem ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$menu = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$key = $line['id_cas'];
			$value = $line['cas_descricao'];
			$menu[$key] = $value;
		}
		return ($menu);
	}

}
