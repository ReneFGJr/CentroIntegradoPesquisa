<?php
$area_div = ' style="border: 0px solid #ff3030; width: 100%; min-height: 450px;" ';

if (strlen(trim($ac_nome_area)) > 0) {
	$area_div_show = ' style="border: 0px solid #ff3030; width: 100%; display: block;" ';
	$icon = 'img/icon/icone_valided.png';
	$area_div = ' style="display: none;" ';
} else {
	$area_div = ' style="display: block;" ';
	$area_div_show = ' style="border: 0px solid #ff3030; width: 100%; display: block;" ';
	$icon = 'img/icon/icone_exclamation.png';
}

/* IDIOMA */
$idioma_div = ' style="border: 0px solid #ff3030; width: 100%; min-height: 450px;" ';
$idioma_div_show = ' style="width: 300px; " ';
$icon_idioma = 'img/icon/icone_exclamation.png';
$ic_semic_idioma_icon = base_url('img/icon/icone_flag_' . $ic_semic_idioma . '.png');

if (strlen($ic_semic_idioma) > 0) {
	$icon_idioma = 'img/icon/icone_valided.png';
	$idioma_div = ' style="border: 0px solid #ff3030; width: 100%; display: none;" ';
}
/* ARQUIVOS */
$file_div = ' style="border: 0px solid #ff3030; width: 100%; min-height: 450px;" ';
$icon_file = 'img/icon/icone_exclamation.png';
if ($tot_rp_posted > 0)
	{
		$icon_file = 'img/icon/icone_valided.png';	
	}
?>
<table width="100%" class="tabela01">
	<tr class="lt6">
		<th width="34%"><?php echo msg("ic_semic_area");?></th>
		<th width="1%">&nbsp;</th>
		<th width="14%"><?php echo msg("ic_semic_idioma");?></th>
		<th width="1%">&nbsp;</th>
		<th width="50%"><?php echo msg("ic_arquivos");?></th>
	</tr>
	<tr valign="top">
		<td>
		<div id="area_show" <?php echo $area_div_show;?>>
			<table class="lt1 border0" width="100%" align="center">
				<tr>
					<td align="right" width="25%">Área:</td>
					<td class="lt3"><b><?php echo $ic_semic_area;?></b></td>
				</tr>
				<tr>
					<td align="right">Descrição:</td>
					<td class="lt3"><b><?php echo $ac_nome_area;?></b></td>
				</tr>
				<tr valign="top">
					<td align="right">Situação:</td>
					<td><img src="<?php echo base_url($icon);?>" height="32"></td>
				</tr>
				<tr>
					<td align="right">Ação:</td>
					<td><span onclick="show_area();" class="link lt3" style="cursor: pointer;">Alterar Área</span></td>
				</tr>
			</table>
		</div>
		<br>
		<br>
		<div id="area_sel" <?php echo $area_div;?>>
			<form method="post">
				<?php echo $mostra_area;?>
				<br>
				<input type="submit" value="<?php echo msg('selecionar_area')?> >>" name="acao" class="botao3d back_green_shadown back_green" style="width: 280px; text-align: center;">
				<input type="hidden" name="dd2" value="AREA">
			</form>
		</div></td>
		<td class="borderr1"></td>
		<!--- IDIOMA -->
		<td>
		<div id="idioma_show" <?php echo $idioma_div_show;?>>
			<table class="lt1 border0" width="100%" align="center">
				<tr>
					<td align="right" width="25%">Idioma:</td>
					<td class="lt3"><img src="<?php echo $ic_semic_idioma_icon;?>" height="16"></td>
				</tr>
				<tr>
					<td align="right">Descrição:</td>
					<td class="lt3"><b><?php echo msg('idioma_' . $ic_semic_idioma);?></b></td>
				</tr>
				<tr valign="top">
					<td align="right">Situação:</td>
					<td><img src="<?php echo base_url($icon_idioma);?>" height="32"></td>
				</tr>
				<tr>
					<td align="right">Ação:</td>
					<td><span onclick="show_idioma();" class="link lt3" style="cursor: pointer;">Alterar Idioma</span></td>
				</tr>
			</table>
		</div>
		<br>
		<br>
		<div id="idioma_sel" <?php echo $idioma_div;?>>
			<form method="post">
				<?php echo $mostra_idioma;?>
				<br>
				<input type="submit" value="<?php echo msg('selecionar_idioma')?> >>" name="acao" class="botao3d back_green_shadown back_green" style="width: 280px; text-align: center;">
				<input type="hidden" name="dd2" value="IDIOMA">
			</form>
		</div></td>
		<td class="borderr1"></td>
		<td><!--- Files --->
		<div id="files" <?php echo $file_div;?>>
			<div id="files_show">
				<table class="lt1 border0" width="100%" align="center">
					<tr>
						<td align="right" width="25%">Total de relatórios postados:</td>
						<td class="lt3"><b><?php echo $tot_rp_posted;?></b></td>
					</tr>
					<tr valign="top">
						<td align="right">Situação:</td>
						<td><img src="<?php echo base_url($icon_file);?>" height="32"></td>
					</tr>
				</table>
				<?php echo $mostra_arquivo;?>
			</div>
		</td>
	</tr>
</table>
<script>
	function show_area() {

		$("#area_sel").toggle('slow');
		//$("#area_show").fadeOut('slow');
	}

	function show_idioma() {

		$("#idioma_sel").toggle('slow');
		//$("#area_show").fadeOut('slow');
	}
</script>