<?php
$icon = 'img/icon/icone_exclamation.png';

/* ARQUIVOS */
$file_div = ' style="border: 0px solid #ff3030; width: 100%; min-height: 450px;" ';
$icon_file = 'img/icon/icone_exclamation.png';
if ($chk3 > 0) {
	$icon_file = 'img/icon/icone_valided.png';
}
?>
<table width="100%" class="tabela01">
	<tr class="lt6">
		<th width="34%"></th>
		<th width="1%">&nbsp;</th>
		<th width="14%"></th>
		<th width="1%">&nbsp;</th>
		<th width="50%"><?php echo msg("ic_arquivos"); ?></th>
	</tr>
	<tr valign="top">
		<td>
		</td>
		<td class="borderr1"></td>
		<!--- IDIOMA -->
		<td>
		</td>
		<td class="borderr1"></td>
		<td><!--- Files --->
		<div id="files" <?php echo $file_div; ?>>
			<div id="files_show">
				<table class="lt1 border0" width="100%" align="center">
					<tr>
						<td align="right" width="25%">Total de relatórios postados:</td>
						<td class="lt3"><b><?php echo $tot_rp_posted; ?></b></td>
					</tr>
					<tr valign="top">
						<td align="right">Situação:</td>
						<td><img src="<?php echo base_url($icon_file); ?>" height="32"></td>
					</tr>
				</table>
				<?php echo $mostra_arquivo; ?>
			</div>
		</td>
	</tr>
</table>
