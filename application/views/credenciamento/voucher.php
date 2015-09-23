<?php $id = 1;?>
<style>
	body {
		background-color: #ffffff;
		margin: 0px;
	}
</style>
<table width="400">
	<tr>
		<td><img src="<?php echo base_url('img/evento/evento_' . strzero($id, 3) . '_banner.png');?>" width="400">
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td class="lt5" colspan=2><?php echo $us_nome;?></td></td>
	</tr>
	<tr>
		<td>CPF:<?php echo $us_cpf;?></td>
	</tr>
	<tr valign="top">
		<td align="right"><img src="<?php echo base_url('index.php/credenciamento/barcode/' . $us_cracha . '/' . checkpost_link($us_cracha));?>"></td>
	</tr>
</table>

<script>
	window.print();
</script>