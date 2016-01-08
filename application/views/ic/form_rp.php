<?php
$area_div = ' style="border: 5px solid #ff3030; width: 100%; min-height: 450px;" ';
$idioma_div = ' style="border: 5px solid #ff3030; width: 100%; min-height: 450px;" ';
$file_div = ' style="border: 5px solid #ff3030; width: 100%; min-height: 450px;" ';

if (strlen($ic_semic_area) > 0) {
	$area_div = ' style="border: 5px solid #ff3030; width: 100%; min-height: 450px; display: none;" ';
}
?>
<table width="100%" class="tabela01">
	<tr class="lt4">
		<th width="34%"><?php echo msg("ic_semic_area"); ?></th>
		<th width="1%">&nbsp;</th>
		<th width="14%"><?php echo msg("ic_semic_idioma"); ?></th>
		<th width="1%">&nbsp;</th>
		<th width="50%"><?php echo msg("ic_arquivos"); ?></th>
	</tr>
	
	<tr valign="top">
		<td>
			<div id="idioma_sel" <?php echo $area_div; ?>>
			<form method="post">
			<?php echo $mostra_area; ?>
			<br>
			<input type="submit" value="<?php echo msg('selecionar_area')?> >>" name="acao" class="botao3d back_green_shadown back_green" style="width: 280px; text-align: center;">
			<input type="hidden" name="dd2" value="AREA">
			</form>
			</div>
		</td>
		<td></td>
		<td><div id="idioma_sel" <?php echo $idioma_div; ?>>
			Idioma
			</div>
		</td>
		<td></td>
		<td><div id="idioma_sel" <?php echo $file_div; ?>>Arquivos
		</div></td>
	</tr>
</table>
