<table width="100%">
	<div>
		<tr>
			<td colspan=4 class="lt6 borderb1"style="border-left: 1px solid #333333"><B>Código do perfil: <?php echo $usp_codigo; ?></B></td>
			<td width="10" rowspan=20><div style="width:20px;"></div>
				
		</tr>	
	</div>
	<div>
		<tr>
			<td align="left" width="80"><?php echo msg('Label_perfil_codigo'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $usp_codigo; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_perfil_status'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $usp_ativo; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_perfil_descricao'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $usp_descricao; ?></td>
		</tr>
	</div>
</table>