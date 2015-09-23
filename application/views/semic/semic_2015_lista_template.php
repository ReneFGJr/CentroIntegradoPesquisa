<?php
/****** Autores ************/
$nome_trab = '';
$nome_cita = '';
$nome_quali = '';
$link = base_url('index.php/semic/view/' . $st_codigo);
$link = 'http://www2.pucpr.br/reol/semic/index.php/semic/view/' . $st_codigo;
$link = '<?php echo base_url(\'index.php/semic/view/\');?>' . $st_codigo;

/* Titulo */
if (strlen($sm_titulo) == 0) {
	$sm_titulo = $ic_projeto_professor_titulo;
}
$sm_titulo = troca($sm_titulo, '[e]', '&');
$sm_titulo = troca($sm_titulo, '&lt;', '<');
$sm_titulo = troca($sm_titulo, '&rt;', '>');

/* Horario */
$sm_age = '';

if ($poster == 'S') {
	$sm_age .= msg('Sessão') . ' ' . msg('pôster') . ': ';
	$sm_age .= $poster_sala_nome . ' as ';
	$sm_age .= stodbr($poster_data) . ' ' . $poster_hora . '-' . $poster_hora_fim;
}
if ($oral == 'S') {
	if (strlen($sm_age) > 0) {
		$sm_age .= '; ';
	}
	$sm_age .= msg('Sessão') . ' ' . msg('oral') . ': ';
	$sm_age .= $oral_sala_nome . ' (' . $oral_bloco_nome . ') as ';
	$sm_age .= stodbr($oral_data) . ' ' . $oral_hora . '-' . $oral_hora_fim;
}

for ($r = 0; $r < count($autores); $r++) {
	$nome = nbr_autor($autores[$r]['sma_nome'], 7);
	$t = $autores[$r]['sma_funcao'];
	if ($r > 0) { $nome_trab .= '; ';
	}
	if ($r > 0) { $nome_cita .= '; ';
	}
	$nome_trab .= nbr_autor($nome, 1);
	$nome_cita .= nbr_autor($nome, 5);
}
$imm = '<?php echo base_url(\'' . $imagem . '\');?>';
?>
<tr class="trabalho_background">
	<td width="100" rowspan=4 class="lt2" align="center"><font class="lt3"><b><?php echo $ref;?></b></font>
	<br>
	<img src="<?php echo $imm;?>" title="<?php echo $imagem_texto;?>" height="40">
	<br>
	<?php echo $imagem_texto;?></td>
	<td class="lt5" colspan=2><b><a href="<?php echo $link;?>" class="lt4 link"><?php echo $sm_titulo;?></a></b></td>
</tr>
<tr class="trabalho_background">
	<td colspan=3 class="lt3"><?php echo $nome_trab;?></td>
</tr>
<tr class="trabalho_background">
	<td colspan=3 class="lt1"><?php echo $mb_tipo;?>- <?php echo $mb_descricao;?></td>
</tr>
<tr class="trabalho_background">
	<td colspan=3 class="lt1"><b><?php echo $sm_age;?></b></td>
</tr>
<tr>
	<td colspan=3 align="center">
	<hr size=1 width="50%">
	</td>
</tr>