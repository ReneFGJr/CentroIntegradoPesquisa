<?php
class fomento_editais extends CI_model {
	var $tabela = 'fomento_edital';
	function row($obj) {
		$obj -> fd = array('id_ed', 'ed_titulo', 'ed_chamada', 'ed_status');
		$obj -> lb = array('ID', 'nome da chamada', 'chamadas', 'estatus');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}

	function le($id) {
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];
		return ($line);
	}

	function public_selector($id = 0) {
		$sx = '';
		
		/*
		 * 
		 * Mostra área já seleciondas
		 */

		$sql = "SELECT * FROM fomento_edital_categoria
						inner join fomento_categoria on fe_id = id_ct
						where fe_id = $id and ct_ativo = 1
						";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$sx .= '<table width="350" align="center">';
		$sx .= '<tr><th colspan=2 style="border-bottom: 1px solid #000000;">Perfins ativos</th></tr>';
		$sx .= '<tr>';
		$sx .= '<td class="lt1" colspan=2>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<input type="checkbox" value="1" name="dd1" checked>&nbsp;';
			$sx .= $line['ct_descricao'];
			$sx .= '<BR>';
		}

		$sx .= '</td>';
		$sx .= '</tr>';
		
		/*
		 * 
		 * Mostra todas as areas
		 */		

		$sql = "select * from fomento_categoria 
					where ct_main = '1' and ct_ativo=1 
					order by ct_descricao";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$sx .= '<tr><th>&nbsp;</th></tr>';
		$sx .= '<tr><th colspan=2 style="border-bottom: 1px solid #000000;">Selecionar perfis</th></tr>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idr = $line['id_ct'];
			$sx .= '
						<tr onclick="show(' . $r . ');" style="cursor: pointer;">
						<td><b>' . $line['ct_descricao'] . '</b></td>
						<td><div id="wd' . $r . '" >+</div></td>
						</tr>
						
						<tr>
						<td id="wd' . $r . 'a" style="display: none;" class="lt1">';
		/*
		 * 
		 * Mostra sub areas
		 */
			$sql = "select * from fomento_categoria
						left join fomento_edital_categoria on fe_id = id_ct and fe_id = $id and ct_ativo = 1
						where id_ct = $idr order by ct_descricao";

			$rlt2 = $this -> db -> query($sql);
			$rlt2 = $rlt2 -> result_array($rlt2);
			for ($y = 0; $y < count($rlt2); $y++) {
				$line = $rlt2[$y];
				$checked = '';
				if (strlen($line['fe_id']) > 0) { $checked = ' checked ';
				}
				$sx .= '<input type="checkbox" name="dd8" value="' . $line['id_ct'] . '" ' . $checked . '>';
				$sx .= $line['ct_descricao'];
				$sx .= '<BR>';
			}
			$sx .= '</td></tr>';
		}
		$sx .= '<tr><td class="lt0">Clique no nome para ampliar</td></tr>';
		$sx .= '<tr><td class="lt0"><input type="submit" value="'.msg('bt_update').'" name="acao"></td></tr>';
		$sx .= '</table>';

		$sx .= '
		<script>
		function show(id)
			{
				$obj = \'#wd\'+id+\'a\';
				$($obj).toggle();
			}
		</script>
		';

		return ($sx);
	}

	function show_edital($id) {
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];

		$sx = '<table width="640" border=0 align="center" style="border: 1px solid #000000; font-size: 14px; font-family: tahoma, verdana, arial;">
					<tr valign="top">
						<td><img src="http://www2.pucpr.br/reol/img/email_pdi_header.png" ><BR></td></tr>
					<tr valign="top">
						<td valign="top" ALIGN="left" style="font-size:21px;">
						<img src="http://www.uem.br/simpapasto/app/img/4.jpg" height="100" align="left"  style="padding: 0px 20px 0px 5px;">
						<font style="font-size:25px">
						' . $line['ed_titulo'] . '
						</font><BR><BR></td></tr>
					<tr>
						<td><BR><B>Objetivo(s)</B></td>
					</tr>
					
					<tr>
						<td>' . $line['ed_texto_1'] . '<br></td>
					</tr>
					
					<tr><td><BR><B>Recursos</B></td></tr>
					<tr>
						<td>' . $line['ed_texto_2'] . '<br></td>
					</tr>
					<tr><td><BR><B>Elegibilidade</B></td></tr>
					<tr>
						<td>' . $line['ed_texto_3'] . '<br></td>
					</tr>
					<tr><td><BR><B>Contato</B></td></tr>
					<tr>
						<td>' . $line['ed_texto_4'] . '<br></td>
					</tr>
					<tr><td><BR><B>Submissão</B></td></tr>
					<tr>
						<td>' . $line['ed_texto_5'] . '<br></td>
					</tr>
					<tr>
						<td align="right">
							<font style="font-size: 18px;">
								<I>Deadline</I> para submissão eletrônica <B>
								<font color="red">12/12/2014</font>
								</table>
				</table>			
			';
		return ($sx);
	}

}
