<table width="100%" border=0 class="lt2">
	<tr class="lt0">
		<td>Protocolo</td>
		<td>Tipo de solicitação</td>
		<td>Solicitante</td>
	</tr>
	<tr>
		<td><?php echo $pr_protocolo_original.'/'.substr($pr_ano,2,2);?></td>
		<td><?php echo msg('protocolo_ic_'.$pr_tipo);?></td>
		<td><?php echo $us_nome;?></td>
	</tr>
	
	<tr>
		<td colspan=3>
			<fieldset>
				<legend><?php echo msg('descript');?></legend>
			</fieldset>
		</td>
	</tr>
</table>
