
<?php
/****** Autores ************/
$nome_trab = '';
$nome_cita = '';
$nome_quali = '';
for ($r = 0; $r < count($autores); $r++) {
	$nome = nbr_autor($autores[$r]['sma_nome'],7);
	$t = $autores[$r]['sma_funcao'];
	if ($r > 0) { $nome_trab .= '; ';}
	if ($r > 0) { $nome_cita .= '; ';}
	$nome_trab .= nbr_autor($nome,1).'<sup>'.($r+1).'</sup>';
	$nome_cita .= nbr_autor($nome,5);
	switch($t)
		{
		case '9':
			$nome_quali .= '<sup>'.($r+1).'</sup> Orientador. '.$autores[$r]['sma_instituicao'];
			break;
		case '0':
			$nome_quali .= '<sup>'.($r+1).'</sup> Estudante. '.$autores[$r]['sma_instituicao'].'<br>';
			break;
		}
}
?>
<tr>
	<td width="100"><img src="<?php echo $imagem;?>" align="left" title="<?php echo $imagem_texto;?>"></td>
	<td><?php echo $ref;?></td>
	<td><b><?php echo $sm_titulo;?></b></td>
</tr>
<tr>
	<td><?php echo $ac_nome_area;?></td>
	<td><?php echo $nome_trab; ?></td>
	<td><?php echo $mb_tipo;?> - <?php echo $mb_descricao;?></td>
</tr>