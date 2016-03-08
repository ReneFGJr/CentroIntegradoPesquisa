<h1>Indicar avaliador do Relatório Parcial</h1>
<form method="post">
	<input type="submit" value="Indicar >>>" name="acao" class="botao3d">
	<input type="hidden" value="RPAR" name="dd1">
	<table width="100%">
		<tr>
			<th width="50%"><?php echo msg('ic_avaliador_interno');?></th>
			<th width="50%"><?php echo msg('ic_avaliador_gestor');?></th>
		</tr>
		<tr>
			<td><?php echo $sa;?></td>
			<td></td>
		</tr>
	</table>
</form>