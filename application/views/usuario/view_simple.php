<?php
/* Foto do aluno */
if (!(isset($img_foto))) {
	$img_foto = base_url('img/img_noPhoto.jpg');
} else {
	if (strlen($img_foto) == 0) {
		$img_foto = base_url('img/img_noPhoto.jpg');
	}
}
if (!isset($botao_editar)) { $botao_editar = '';
}
?>
<table width="100%" class="lt1" border=0 cellpadding="1">
	<tr valign="top">
		<td width="10%" align="right" class="lt1">nome:</td><td class="lt4"><B><?php echo $us_nome;?></B></td>
		<td width="280" >email <div id="email_list" style="width: 280px;"></div></td>
	</tr>
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('titulacao');?>:</td><td class="lt2"><B><?php echo $ust_titulacao;?></B></td>
	</tr>
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('perfil');?>:</td><td class="lt2"><B><?php echo $ustp_nome;?></B></td>
	</tr>
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('cpf');?>:</td><td class="lt2"><B><?php echo $us_cpf;?></B></td>
	</tr>
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('curso');?>:</td><td class="lt2"><B><?php echo $us_curso_vinculo;?></B></td>
	</tr>
	<tr>
		<td width="10%" align="right" class="lt1"><?php echo msg('cracha');?>:</td><td class="lt2"><B><?php echo $us_cracha;?></B></td>
	</tr>
	<tr>
		<td colspan=2><div style="min-height: 5px;"></div></td>
	</tr>
</table>
