<?php
class logins extends CI_Model {
	var $tabela = 'logins';
	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_login');
		$obj -> lb = array('ID', 'Nome', 'Login');
		$obj -> mk = array('', 'L', 'L');
		return ($obj);
	}
	function le($id=0)
		{
			$sql = "select * from ".$this->tabela." where id_us = ".round($id);
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			
			if (count($rlt) > 0)
				{
					$dadosUsuario = $rlt[0];
				} else {
					$dadosUsuario = array();
				}
				
			$dadosUsuario['us_perfil_list'] = $this->perfil_list($id);
			
			$dadosUsuario['us_perfil_associar'] = $this->perfil_associar($id);
				
			return($dadosUsuario);			
		}
		
	function perfil_associar($id)
		{
			$sql = "select * from logins_perfil order by usp_descricao ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$sx = '<select name="dd9" size=10>'.chr(13).chr(10);
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<option value="'.$line['id_usp'].'">';
					$sx .= $line['usp_descricao'];
					$sx .= '</option>';
				}
			$sx .= '</select>'.chr(13).chr(10);
			return($sx);
		}
	function perfil_list($id)
		{
			$sql = "select * from logins_perfil_ativo
						inner join logins_perfil on up_perfil = id_usp
						where up_ativo = 1
						order by usp_descricao 
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="400" class="lt2">';
			$sx .= '<tr>
						<th class="borderb1" width="60%">Perfil</th>
						<th class="borderb1" width="20%">Id</th>
						<th class="borderb1" width="20%">atualizado</th>
						';
			$to = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$to++;
					$sx .= '<tr>';
					$sx .= '<td>';
					$sx .= $line['usp_descricao'];
					$sx .= '</td>';
					$sx .= '<td align="center">';
					$sx .= $line['usp_codigo'];
					$sx .= '</td>';
					$sx .= '<td align="center">';
					$sx .= stodbr($line['up_data']);
					$sx .= '</td>';
				}
			if ($to==0)
				{
					$sx .= '<tr><td>'.msg('empty').'</td></tr>';
				}
			$sx .= '</table>';
			return($sx);
		}
}
?>