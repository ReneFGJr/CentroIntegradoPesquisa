<center>
<h1 style="color: green;">CERTIFICADO VALIDADO</h1>
<table with="800" align="center">
	<tr>
		<td align="right"><b>
			tipo:
			</b>
		</td>
		<td>
			<?php echo $cde_nome;?>
			
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
			if (isset($ic_projeto_professor_titulo)) { echo $ic_projeto_professor_titulo; }
			?>
		</td>
	</tr>
</table>
</center>

