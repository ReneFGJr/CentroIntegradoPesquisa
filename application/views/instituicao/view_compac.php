<table width="100%">
	<div>
		<tr>
			<td colspan=4 class="lt6 borderb1"style="border-left: 1px solid #333333"><B>Instituição: <?php echo $gpip_nome; ?></B></td>
			<td width="10" rowspan=20><div style="width:20px;"></div>
		</tr>	
	</div>
	<div>	
		<tr>
			<td align="left" width="80"><?php echo msg('Label_instituicao_nome'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_nome; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_instituicao_sigla'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_sigla; ?></td>
		</tr>
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_instituicao_latitude'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_latitude; ?></td>
		</tr>	
		<tr>		
			<td align="left" width="80"><?php echo msg('Label_instituicao_longitude'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_longitude; ?></td>
		</tr>
	</div>
</table>