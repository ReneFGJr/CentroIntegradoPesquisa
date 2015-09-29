<?php $id = 1;?>
<style>
	body {
		background-color: #ffffff;
		margin: 0px;
		font-family: "CICPG",Verdana, Geneva, Arial, Helvetica, sans-serif;
	}
</style>
<table width="94%" border=0 align="center" style="max-width: 600px;">
	<tr>
		<td align="center"><img src="<?php echo base_url('img/evento/evento_' . strzero($id, 3) . '_banner.png');?>" height="120">
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td style="font-size: 28px; height: 120px;" colspan=2><?php echo $us_nome;?></td></td>
	</tr>

	<tr valign="top">
		<td align="right"><img src="<?php echo base_url('index.php/credenciamento/barcode/' . $us_cracha . '/' . checkpost_link($us_cracha));?>"></td>
	</tr>
</table>

<script>
	window.print();
</script>