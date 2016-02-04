<?php
class mensagens extends CI_model {
	var $tabela = 'mensagem';
	
	function busca($ref,$data)
		{
			$sql = "select * from ".$this->tabela." where nw_ref = '$ref' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt -> result_array();
			$sx = array();
			$sx['nw_texto'] = '';
			if (count($rlt) > 0)
				{
					$sx = $rlt[0];
				}
			$txt = $sx['nw_texto'];
			if ($sx['nw_formato'] != 'HTML')
				{
					$txt = mst($txt);
				} 			
			/* Substituicoes */
			if (isset($data['nome'])) 
				{ $txt = troca($txt,'$nome',$data['nome']); }
			if (isset($data['ic_plano']))
				{ $txt = troca($txt,'$ic_plano',$data['ic_plano']); }
				
			$txt .= '<br><br><br><font style="fonte-size: 6px;">'.$ref.'</font>';
				
			$sx['nw_texto'] = $txt;
			
			return($sx);
		}

	function cp() {
		$cp = array();
		$sql_own = 'id_m:m_descricao:select * from mensagem_own where m_ativo = 1 ';
		array_push($cp, array('$H8', 'id_nw', '', False, True));
		array_push($cp, array('$S20', 'nw_ref', msg('ref'), False, True));
		array_push($cp, array('$S40', 'nw_titulo', msg('titulo'), False, True));
		array_push($cp, array('$T80:13', 'nw_texto', msg('texto'), False, True));
		array_push($cp, array('$Q ' . $sql_own, 'nw_own', 'Enviador', False, True));

		array_push($cp, array('$U8', 'nw_dt_cadastro', '', False, True));
		array_push($cp, array('$O 1:Sim&0:Não', 'nw_ativo', msg('ativo'), True, True));
		array_push($cp,array('$O HTML:HTML&TEXT:TEXT','nw_formato',msg('formato'),True,True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));
		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . "
						left join mensagem_own on nw_own = id_m
						where id_nw = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		return ($line);
	}

	function row($obj) {
		$obj -> fd = array('id_nw', 'nw_ref','nw_own','nw_titulo', 'nw_dt_cadastro', 'nw_ativo');
		$obj -> lb = array('ID', 'Ref','Dono','Título', 'Cadastro', 'Ativo','','');
		$obj -> mk = array('', 'L', 'L', 'L','C','SN');
		return ($obj);
	}
}
?>