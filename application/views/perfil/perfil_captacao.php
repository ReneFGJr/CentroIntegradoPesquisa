<?php
if (!(isset($captacao_texto))) {
	$captacao_texto = '';
}
?>
<table class="captacao_folha border1" width="300" align="right" style="margin: 20px;">
<tr>
<td class="lt5 black" align="center"><?php echo msg("CAPT");
?></td>
	</tr>
	<tr>
		<td>
		<table width="100%" >
			<!------ Captacao academica --------->
			<tr>
				<td width="50"></td>
				<td width="350"></td>
			</tr>
			<tr class="lt4" >
				<td colspan=2><b><?php echo msg('captacao_academica'); ?></b></td>
			</tr>
			<tr valign="top" class="lt0">
				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">captações</font>
				<br>
				<font class="lt6"><b><?php echo number_format($captacao_academica_tot, 0, ',', '.'); ?></b></font></td>
				<td class="captacao_folha bg_bordo" ><font class="lt0" color="white">valor captado</font>
				<br>
				<font class="lt6"><b><?php echo number_format($captacao_academica_vlr, 2, ',', '.'); ?></b></font></td>
			</tr>
			<!------ salto --->
			<tr>
				<td>&nbsp;</td>
			</tr>
			<!------ Captacao institucional --------->
			<tr class="lt4" >
				<td colspan=2 ><b><?php echo msg('captacao_institucional'); ?></b></td>
			</tr>
			<tr valign="top" class="lt0">
				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">captações</font>
				<br>
				<font class="lt6"><b><?php echo number_format($captacao_institucional_tot, 0, ',', '.'); ?></b></font></td>
				<td class="captacao_folha bg_bordo" ><font class="lt0" color="white">valor captado</font>
				<br>
				<font class="lt6"><b><?php echo number_format($captacao_institucional_vlr, 2, ',', '.'); ?></b></font></td>
			</tr>
			<tr>
				<td colspan=3>
					<?php echo $captacao_texto; ?>
				</td>
			</tr>
		</table>
</table>
