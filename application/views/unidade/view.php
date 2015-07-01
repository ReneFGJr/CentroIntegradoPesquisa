<table width="100%">
	<div>
		<tr>
			<td colspan=4 class="lt6 borderb1"style="border-left: 1px solid #333333"><B>Unidade: <?php echo $u_descricao; ?></B></td>
			<td width="10" rowspan=20><div style="width:20px;"></div>
				
		</tr>	
	</div>
	<div>
		<tr>
			<td align="left" width="80"><?php echo msg('Label_unidade_descricao'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $u_descricao; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_unidade_sigla'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $u_sigla; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_unidade_decano'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $u_decano; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_unidade_status'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $u_ativo; ?></td>
		</tr>
	</div>
</table>