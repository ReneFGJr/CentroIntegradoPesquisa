<table width="100%" border=0 class="lt2">
	<tr class="lt0">
		<td width="25%">Protocolo</td>
		<td width="25%">Tipo de solicitação</td>
		<td width="25%">Solicitante</td>
		<td width="25%">Data de abertura</td>
	</tr>
	<tr>
		<td><?php echo $pr_protocolo_original.'/'.substr($pr_ano,2,2);?></td>
		<td><?php echo msg('protocolo_ic_'.$pr_tipo);?></td>
		<td><?php echo $us_nome;?></td>
		<td><?php echo stodbr($pr_data).' '.$pr_hora;?></td>
	</tr>
	
	<tr>
		<td colspan=4>
			<fieldset>
				<legend><?php echo msg('descript');?></legend>
				<?php echo $pr_descricao;?>
			</fieldset>
		</td>
	</tr>
	
	<tr>		
		<td colspan=4>
			<fieldset>
				<legend><?php echo msg('justify');?></legend>
				<?php echo mst($pr_justificativa);?>
			</fieldset>
		</td>
	</tr>
	
	<tr>
		<td colspan=4>Situação: <b><?php echo msg('status_protocolo_'.$pr_status);?></b></td>
	</tr>	
	
	<?php
	if (strlen($pr_solucao_log) > 0)
		{
			echo '
			<tr><td colspan=4>
			<fieldset>
				<legend>'.msg('soluction').'</legend>
				'.mst($pr_solucao).'
				<br><br>'.stodbr($pr_solucao_data).' '.$pr_solucao_hora.' '.$pr_solucao_log.'
				</fieldset>		
					
			</td></tr>
			';
		}
	?>	
</table>
