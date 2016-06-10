<table width="100%"  border=0 class="lt2">
	<tr align="center">
		<th width="40%">Autor</th>
		<th width="20%">participacao</th>
		<th width="20%">Instituição (SIGLA)</th>
		<th width="10%">ação</th>
	</tr>
	<tr>
		<td><input type="text" id="nome" name="nome" class="form_string" style="width: 100%;" value=""></td>
		<td><select id="tipo" class="form_string" style="width: 100%;" size=1>
			<option value=""></option>
			<?php
			$sql = "select * from semic_trabalho_autor_tipo 
							where stat_editavel = 1 
							order by stat_ordem ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					echo '<option value="'.$line['id_stat'].'">'.$line['stat_descricao'].'</option>'.cr();
				}
			?>
			</select>
		</td>
		<td><input type="text" id="instituicao" class="form_string" style="width: 100%;"></td>
		<td><input type="button" id="acao" class="form_button" style="width: 100%;" value="Incluir" onclick="send(this);"></td>
	</tr>
	
	<tr>
		<td class="error" colspan=3><?php echo $msg; ?></td>
	</tr>
</table>
