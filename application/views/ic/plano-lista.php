<?php
$link_ic = link_ic($id_ic,$page);
$status = $icas_id_char;
$status = $s_situacao;
$cors = $s_cor;
$cors = ' style="background-color: '.$s_cor.' " ';
?>
<tr class="lt0" valign="top" cellspacing=0 cellpadding=3>
	<td rowspan="5" width="80">
		<img src="<?php echo $img; ?>" height="40">
		
	</td>
	<td class="lt3" align="left" colspan=1>
		<B><?php echo $link_ic.$ic_projeto_professor_titulo.'</a>'; ?></B>
	</td>			
	<td class="lt0" align="right" rowspan=3>
		Protocolo:<br>
		<font class="lt3"> 
		<b><?php echo $ic_plano_aluno_codigo; ?></b>
		</font>
	</td>
</tr>
<tr class="lt0" <?php echo $cors;?> >
		<td>Nome do orientador (professor)
			<br>
			<font class="lt1"> <B><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')'; ?></td>
</tr>
<tr class="lt0" <?php echo $cors;?>>
		<td>Nome do estudante
		<br>
		<font class="lt1"> <B><?php echo $al_nome . ' (' . $id_al . ')'; ?></td>
</tr>
<tr class="lt0" <?php echo $cors;?>>
		<td>Bolsa: <font class="lt1"> <b><?php echo $mb_descricao; ?> / <?php echo $ic_ano;?></b></td>
</tr>

<tr class="lt0" <?php echo $cors;?>>
		<td><?php echo msg('Vigencia'); ?>
		<br><font class="lt1">
		<B><?php echo stodbr($aic_dt_entrada); ?> - <?php echo stodbr($aic_dt_saida); ?></td>

<td align="right" class="lt3" bgcolor="#ffffff"><b><?php echo $s_situacao; ?></b></td>			
</tr>			
<?php
/* Parametros adicionais */
if (isset($botao))
	{
	echo '<tr class="lt0">';
	echo '<td></td>';
	echo '<td>';
	echo '<form>';
	echo '<input type="submit" value="'.$botao.'">';
	echo '<input type="hidden" name="dd2" value="'.$ic_plano_aluno_codigo.'">';
	echo '<input type="hidden" name="dd3" value="'.checkpost_link($ic_plano_aluno_codigo.$acao).'">';
	echo '<input type="hidden" name="dd4" value="'.$acao.'">';
	echo '</form>';
	echo '</td>';
	echo '</tr>';		
	}
?>
<tr><td colspan=3><hr width="50%" size="1"></td></tr>