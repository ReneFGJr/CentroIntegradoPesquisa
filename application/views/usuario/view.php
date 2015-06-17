<?php
/* Foto do aluno */
if (!(isset($img_foto))) {
	$img_foto = base_url('img/img_noPhoto.jpg');
} else {
	if (strlen($img_foto) == 0) {
		$img_foto = base_url('img/img_noPhoto.jpg');
	}
}
?>
<table width="80%" class="lt1" border=0 cellpadding="1">
	<tr valign="top">
		<td rowspan=10 width="10" ><img id="photo" src="<?php echo $img_foto;?>" height="150"></td>
		<td width="10%" align="right" class="lt1">nome:</td><td class="lt4"><B><?php echo $us_nome; ?></B></td>
	</tr>
	
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('titulacao');?>:</td><td class="lt2"><B><?php echo $us_titulacao; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('perfil');?>:</td><td class="lt2"><B><?php echo $us_perfil; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('cpf');?>:</td><td class="lt2"><B><?php echo $us_cpf; ?></B></td>
	</tr>

	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('curso');?>:</td><td class="lt2"><B><?php echo $us_curso; ?></B></td>
	</tr>
	
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('cracha');?>:</td><td class="lt2"><B><?php echo $us_cracha; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('contatos');?>:</td><td class="lt2"><B><?php echo $us_contatos; ?></B></td>
	</tr>
		
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('link_lattes');?>:</td><td class="lt2"><B><?php echo $us_link_lattes; ?></B></td>
	</tr>

	<tr>
		<td colspan=2><div style="min-height: 5px;"></div></td>
	</tr>
</table>