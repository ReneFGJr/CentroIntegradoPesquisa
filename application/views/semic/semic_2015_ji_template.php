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
			<td width="100" align="right" rowspan=2>
				<img src="<?php echo base_url('img/semic/icone-jovens-ideias.png');?>" title="<?php echo msg('Jovens Ideias');?>">
			</td>
		</tr>
		<tr>
			<td colspan=2 class="lt3"><font class="lt6"><?php echo $ref;?></font>
				<br><b><?php echo $ac_nome_area;?></b></td>
		</tr>
		<tr>
			<td align="center" colspan=2><font class="lt6"><b><?php echo $sm_titulo;?></b></font>
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
					<?php echo $sm_rem_01;?><br>
					<?php echo $sm_rem_02;?><br>
					<?php echo $sm_rem_03;?><br>
					<?php echo $sm_rem_04;?><br>
					<?php echo $sm_rem_05;?><br>
				</P>
			</div>
			<BR>
			<BR>
			</td>
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