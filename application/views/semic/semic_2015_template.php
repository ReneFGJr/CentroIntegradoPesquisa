
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
<h3><?php echo $ref;?></h3>
<BR>
<div id="trabalho">
	<table width="100%" border=1>
		<tr>
			<td width="100"><img src="<?php echo $imagem;?>" align="left" title="<?php echo $imagem_texto;?>">
			<br>
			<?php echo $imagem_texto;?></td>
			<td align="center"><font class="lt5"><b><?php echo $sm_titulo;?></b></font>
			<BR>
			<font class="lt4"><i><?php echo $sm_titulo_en;?></i></font>
			<BR>
			</td>
		</tr>
	</table>
	<br>
	<?php echo $ac_nome_area;?>
	<div style="text-align:right;">
		<?php echo $nome_trab; ?>
		<BR>
		<?php echo $mb_tipo;?> - <?php echo $mb_descricao;?>
		<BR>
		<I>--</I>
	</div>
	<BR>
	<table width="100%">
		<tr valign="top">
			<td width="44%"> Resumo
			<div style="text-align:justify;">
				<P>
					<B>Introdu��o</B>: <?php echo $sm_rem_01;?>
					<B>Objetivo</B>: <?php echo $sm_rem_02;?>
					<B>Metodologia</B>: <?php echo $sm_rem_03;?>
					<B>Resultados</B>: <?php echo $sm_rem_04;?>
					<B>Conclus�es</B>: <?php echo $sm_rem_05;?>
				</P>
			</div><B>Palavras-chave</B>: <?php echo $sm_rem_06;?>
			<BR>
			<BR>
			</td><td width="2%">&nbsp;</td><td width="44%"> Abstract
			<div style="text-align:justify;">
				<P>
					<B>Introduction</B>: <?php echo $sm_rem_11;?>
					<B>Objectives</B>: <?php echo $sm_rem_12;?>
					<B>Methods</B>: <?php echo $sm_rem_13;?>
					<B>Results</B>: <?php echo $sm_rem_14;?>
					<B>Conclusion</B>: <?php echo $sm_rem_15;?>
				</P>
			</div><B>Keywords</B>: <?php echo $sm_rem_16;?></td>
		</tr>
	</table>
	<BR>
	<BR>
	<?php echo $nome_quali; ?>
	<BR>
	<BR>
	<BR>
	<BR>
</div>
<BR>
<BR>
<BR>
</div>
<table width="100%">
	<tr>
		<td> <?php echo $nome_cita; ?>. <?php echo $sm_titulo;?>. In: SEMIC, Semin�rio de Inicia��o Cient�fica, 23, 2015, Curitiba-PR. Anais do 23� Semin�rio de Inicia��o Cient�fica. Curitiba: PUCPR, 2015. p. <?php echo $ref;?>.</td>
	</tr>
</table>
