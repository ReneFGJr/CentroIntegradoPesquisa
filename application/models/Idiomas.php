<?php
class Idiomas extends CI_model {
		var $tabela = 'idioma';

	function row($obj) {
		$obj -> fd = array('id_i', 'i_nome', 'i_codificacao');
		$obj -> lb = array('id', msg('Label_idioma_nome'), msg('Label_idioma_codificacao'));
		$obj -> mk = array('', 'L', 'L');
		return ($obj);
	}
	
function cp()
		{
			$sql_idioma = 'select * from idioma where 1 = 1 order by nome';
				
			$cp = array();
			array_push($cp,array('$H8','id_i','',False,True));
			array_push($cp,array('$S80','i_nome',msg('Label_idioma_nome'),True,True));
			array_push($cp,array('$S20','i_ativo',msg('Label_idioma_ativo'),false,True));
			array_push($cp,array('$S250','i_codificacao',msg('Label_idioma_codificacao'),false,True));
			array_push($cp,array('$B','',msg('enviar'),false,True));
			
			return($cp);
		}	
	
	function le($id = 0)
		{
			$sql = "select * from ".$this->tabela." 
					where id_i = ".$id;
			
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array($rlt);
			$data = $rlt[0];
			
			return($data);
		}	
	function form_idioma($v = '', $idioma = '')
		{
		$sql = "SELECT * from idioma
						WHERE  i_ativo = 1
						order by i_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//$sa = '<select size=15 name="' . $v . '" class="lt2" style="width: 100%">';
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			
			$line = $rlt[$r];
			$cod = trim($line['i_codificacao']);
			$desc = trim($line['i_nome']);
			$chk = '';
			$ok = 1;

			/* Estilos */
			if (trim($cod) == '') { $ok = 0;
			}
			
			if ($idioma == $cod)
				{
					$chk = 'checked';
				}

			if ($ok == 1) {
				$sx .= '</br><input type="radio" name="'.$v.'" value="' . $cod . '" ' . $chk . '>' . $desc . ''.cr();
			}
		}
		return ($sx);
	}	
	
}
?>		
	