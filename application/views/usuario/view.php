<?php
/* Foto do aluno */
if (!(isset($img_foto))) {
	$img_foto = base_url('img/img_noPhoto.jpg');
} else {
	if (strlen($img_foto) == 0) {
		$img_foto = base_url('img/img_noPhoto.jpg');
	}
}

$us_nome = 'EVELYN MARTINA DUECK';
$us_perfil = 'Estudante';
$us_titulacao = 'Graduando';
$us_cracha = '89213248';
$us_cpf = '092.577.189-99';
$us_curso = 'ARQUITETURA E URBANISMO';
$us_contatos = 'evelyn_dueck@hotmail.com';
?>
<table width="80%" class="lt1" border=0 cellpadding="3">
	<tr valign="top">
		<td rowspan=10 width="10" ><img id="photo" src="<?php echo $img_foto;?>" height="200"></td>
		<td width="10%" align="right" class="lt1">nome:</td><td class="lt4"><B><?php echo $us_nome; ?></B></td>
	</tr>
	
	<tr>
		<td width="10%" align="right" class="lt1">titulação:</td><td class="lt2"><B><?php echo $us_titulacao; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1">perfil:</td><td class="lt2"><B><?php echo $us_perfil; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1">cpf:</td><td class="lt2"><B><?php echo $us_cpf; ?></B></td>
	</tr>

	<tr>
		<td width="10%" align="right" class="lt1">curso:</td><td class="lt2"><B><?php echo $us_curso; ?></B></td>
	</tr>
	
	<tr>
		<td width="10%" align="right" class="lt1">cracha:</td><td class="lt2"><B><?php echo $us_cracha; ?></B></td>
	</tr>	
	
	<tr>
		<td width="10%" align="right" class="lt1">contatos:</td><td class="lt2"><B><?php echo $us_contatos; ?></B></td>
	</tr>
		
	<tr>
		<td colspan=2><div style="min-height: 150px;"></div></td>
	</tr>
</table>