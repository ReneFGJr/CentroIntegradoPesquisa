<?php
$total_ic_ativo = 0;
$total_ic_finalizado = 0;
$boneco = array();
$boneco_finalizado = array();
print_r($orientacoes);
for ($r=0;$r < count($orientacoes[0]);$r++)
	{
		array_push($boneco,'DR');
	}
for ($r=0;$r < count($orientacoes[1]);$r++)
	{
		array_push($boneco_finalizado,'PIBIC');
	}	
/* Bonecos */
$bnc = '';
for ($r = 0; $r < count($boneco); $r++) {
	$bnc .= ' <img src="' . base_url('img/icon/img_icone_boneco_' . $boneco[$r] . '.png') . '" style="margin-right: 10px;" title="' . $boneco[$r] . '">';
}
$bnf = '';
for ($r = 0; $r < count($boneco_finalizado); $r++) {
	$bnf .= ' <img src="' . base_url('img/icon/img_icone_boneco_' . $boneco_finalizado[$r] . '.png') . '" style="margin-right: 5px;" height="30" title="' . $boneco_finalizado[$r] . '">';
}
?>
<table class="captacao_folha border1" width="400" style="width: 400px;">
	<tr><td class="lt5 black" align="center"><?php echo msg("SS");?></td></tr>
	<tr><td>
	<table width="100%" border=0>
		<!------ Captacao academica --------->
		<tr>
			<td width="25%"></td>
			<td width="75%"></td>
		</tr>
		<tr class="lt4" >
			<td colspan=2><b><?php echo msg('ic_ativa');?></b></td>
		</tr>
		<tr valign="top" class="lt0">
			<td align="center" class="captacao_folha border1"><font class="lt0 black">orientações</font>
			<br>
			<font class="lt6 black"><b><?php echo number_format($total_ic_ativo, 0, ',', '.');?></b></font></td>
			<td align="left" class="captacao_folha border1" ><font class="lt0" color="black">modalidades</font>
			<br>
			<?php echo $bnc;?>
		</tr>
		<!------ salto --->
		<tr>
			<td>&nbsp;</td>
		</tr>
		<!------ Orientacoes finalizadas --------->
		<tr class="lt4" >
			<td colspan=2><b><?php echo msg('ic_finalizados');?></b></td>
		</tr>
		<tr valign="top" class="lt0">
			<td align="center" class="captacao_folha border1"><font class="lt0 black">orientações</font>
			<br>
			<font class="lt6 black"><b><?php echo number_format($total_ic_finalizado, 0, ',', '.');?></b></font></td>
			<td align="left" class="captacao_folha border1" ><font class="lt0" color="black">modalidades</font>
			<br>
			<?php echo $bnf;?>
		</tr>
	</table>
</td></tr></table>
<br>