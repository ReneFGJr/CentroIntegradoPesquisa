<center>
<h1 style="color: green;">CERTIFICADO VALIDADO</h1>
<table with="800" align="center">
	<tr>
		<td align="right"><b>
			tipo:
			</b>
		</td>
		<td>
			<?php echo $cdm_nome;?>
			
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right"><b>
			Certificado emitido para:
		</td>
		<td>
			<?php echo $nome_1;?>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right"><b>
			Outras informações:
			</b>
		</td>
		<td>
			<?php 
			if (isset($dc_data)) { echo 'Emitido em '.stodbr($dc_data); }
			?>
		</td>
	</tr>
</table>
</center>

