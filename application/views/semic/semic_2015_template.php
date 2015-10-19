<?php
/****** Autores ************/
$nome_trab = '';
$nome_cita = '';
$nome_quali = '';
for ($r = 0; $r < count($autores); $r++) {
	$nome = nbr_autor($autores[$r]['sma_nome'], 7);
	$t = $autores[$r]['sma_funcao'];
	if ($r > 0) { $nome_trab .= '; ';
	}
	if ($r > 0) { $nome_cita .= '; ';
	}
	$nome_trab .= nbr_autor($nome, 1) . '<sup>' . ($r + 1) . '</sup>';
	$nome_cita .= nbr_autor($nome, 5);
	switch($t) {
		case '2' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Co-orientador. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;
		case '3' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Colaborador. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;
		case '7' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Mestrando de Pós-Graduação. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;
		case '8' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Doutorando de Pós-Graduação. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;
		case '4' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Pibic Junior. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;	
		case '5' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Supervisor Pibic Junior. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;																				
		case '6' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Escola (para Pibic Júnior). ' . $autores[$r]['sma_instituicao']. '<br>';
			break;																				
		case '9' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Orientador. ' . $autores[$r]['sma_instituicao']. '<br>';
			break;
		case '0' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Estudante. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
	}
}

$imm = '<?php echo base_url(\''.$imagem.'\');?>';
?>
<div id="trabalho">
	<table width="100%" border=0>
		<tr valign="top">
			<td colspan=2><?php echo $nome_cita;?> <?php echo $sm_titulo;?>. 
				In: SEMINÁRIO DE INICIAÇÃO CIENTÍFICA - SEMIC, 23., 2015, Curitiba. <b>Anais...</b> Curitiba: PUCPR, 2015. p. <?php echo $ref;?>. ISSN 2176-1930.</td>
			<td width="100" align="right" rowspan=2>
				<?php echo $imagem_texto;?>
				<br>
				<img src="<?php echo $imm;?>" title="<?php echo $imagem_texto;?>">
			</td>
		</tr>
		<tr>
			<td colspan=2 class="lt3"><font class="lt6"><?php echo $ref;?></font>
				<br><b><?php echo $ac_nome_area;?></b></td>
		</tr>
		<tr>
			<td align="center"><font class="lt5"><b><?php echo $sm_titulo;?></b></font>
			<BR>
			<font class="lt4"><i><?php echo $sm_titulo_en;?></i></font>
			<BR>
			</td>
		</tr>
	</table>
	<br>
	<div style="text-align:right;">
		<?php echo $nome_trab;?>
		<BR>
		<?php echo $mb_tipo;?>
		- <?php echo $mb_descricao;?>
		<BR>
		<I>--</I>
	</div>
	<BR>
	<table width="100%">
		<tr valign="top">
			<td width="44%"> Resumo
			<div style="text-align:justify;">
				<P>
					<B>Introdução</B>: <?php echo $sm_rem_01;?>
					<B>Objetivo</B>: <?php echo $sm_rem_02;?>
					<B>Metodologia</B>: <?php echo $sm_rem_03;?>
					<B>Resultados</B>: <?php echo $sm_rem_04;?>
					<B>Conclusões</B>: <?php echo $sm_rem_05;?>
				</P>
			</div><B>Palavras-chave</B>: <?php echo $sm_rem_06;?>
			<BR>
			<BR>
			</td><td width="2%">&nbsp;</td>
			
			<?php if (strlen($sm_rem_11.$sm_rem_12.$sm_rem_13) > 0)
			{
			?>
			<td width="44%"> Abstract
			<div style="text-align:justify;">
				<P>
					<B>Introduction</B>: <?php echo $sm_rem_11;?>
					<B>Objectives</B>: <?php echo $sm_rem_12;?>
					<B>Methods</B>: <?php echo $sm_rem_13;?>
					<B>Results</B>: <?php echo $sm_rem_14;?>
					<B>Conclusion</B>: <?php echo $sm_rem_15;?>
				</P>
			</div><B>Keywords</B>: <?php echo $sm_rem_16;?></td>
		<?php } ?>
		</tr>
	</table>
	<BR>
	<BR>
	<?php echo $nome_quali;?>
	<BR>
	<BR>
	<BR>
	<BR>
</div>
<BR>
<BR>
<BR>
</div> 