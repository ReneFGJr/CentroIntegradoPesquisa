<table width="100%">
	<tr valign="top">
		<td width="180"><?php echo $bar;?></td>
		<td><h3>Postagem do Resumo para o SEMIC</h3>
		<form method="post">
			<table width="100%" class="lt0">
				<tr>
					<td>T�tulo do trabalho (Portugu�s)</td>
				</tr>
				<tr>
					<td><textarea name="dd1" class="form_textarea" class="lt3" ><?php echo $dd1;?></textarea></td>
				</tr>
				<tr>
					<td>T�tulo do trabalho (Ingl�s)</td>
				</tr>
				<tr>
					<td><textarea name="dd2" class="form_textarea" class="lt3" ><?php echo $dd2;?></textarea></td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="acao" value="Avan�ar pr�xima p�gina >>>">
					</td>
				</tr>
			</table>
			<input type="hidden" name="page" value="1">
		</form></td>
	</tr>
</table>
<style>
	.form_textarea {
		font-size: 20px;
		width: 800px;
		height: 70px;
	}
</style>
