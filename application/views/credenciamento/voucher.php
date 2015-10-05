<?php $id = 1;?>
<style>
	body {
		background-color: #ffffff;
		margin: 0px;
		font-family: "CICPG",Verdana, Geneva, Arial, Helvetica, sans-serif;
	}
</style>
<table width="96%" border=0 align="center" >
	<!--
	<?php
	/*
	<tr>
		<td align="center"><img src="<?php echo base_url('img/evento/evento_' . strzero($id, 3) . '_banner.png');?>" height="120">
	</tr>
	<tr><td><br></td></tr>
	*/
	?>
	-->
	
	<tr>
		<td style="font-size: 12px; height: 120px;" colspan=2><?php echo $us_nome;?></td></td>
	</tr>

	<tr valign="top">
		<td align="right"><img src="<?php echo base_url('index.php/credenciamento/barcode/' . $us_cracha . '/' . checkpost_link($us_cracha));?>" width="80%"></td>
	</tr>
</table>

<script>
	window.print();
</script>