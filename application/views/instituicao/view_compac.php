<style type="text/css">
	.box {
		margin: auto;
		color: navy;
		text-align: justify;
		width: 450px;
		height: 300px;
		float: right;
		border: 1px solid #333333;
		margin: 1em;

	}
	.box2 {
		margin: auto;
		color: navy;
		background: white;
		text-align: justify;
		float: left;
		bottom:inherit;
		border-style: 1px solid #333333;
	}
</style>

<table width="60%">
	
	<div>
		<tr>
			<td colspan=4 class="lt6 borderb1"style="border-left: 1px solid #333333"><B>Instituição: <?php echo $gpip_nome; ?></B></td>
			<td width="10" rowspan=20><div style="width:20px;"></div>
		</tr>
	</div>
	
	<div>	
		<tr>		
			<td align="left" width="30"><?php echo msg('Label_instituicao_latitude'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_latitude; ?></td>
		</tr>	
		<tr>		
			<td align="left" width="30"><?php echo msg('Label_instituicao_longitude'); ?></td>
			<td align="left" class="lt2 border1" width="40%"><?php echo $gpip_longitude; ?></td>
		</tr>
		<tr>
			<td> <div id="map_canvas" class="box"><tr><?php echo $gpip_link_maps['js']; ?></tr></div></td>
		</tr>	
	</div>
</table>
<?php
//print_r($gpip_link_maps);
?>