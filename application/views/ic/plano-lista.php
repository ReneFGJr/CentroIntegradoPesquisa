<tr class="lt0" valign="top">
	<td rowspan="5" width="80">
		<img src="<?php echo $img; ?>" height="40">
		
	</td>
	<td class="lt3" align="left">
		<B><?php echo link_ic($id_ic,$page).$ic_projeto_professor_titulo.'</a>'; ?></B>
	</td>			
	<td class="lt0" align="right" rowspan=3>
		Protocolo:<br>
		<font class="lt3"> 
		<b><?php echo $ic_plano_aluno_codigo; ?></b>
		</font>
	</td>
</tr>
<tr class="lt0">
		<td>Nome do orientador (professor)
			<br>
			<font class="lt1"> <B><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')'; ?></td>
</tr>
<tr class="lt0">
		<td>Nome do estudante
		<br>
		<font class="lt1"> <B><?php echo $al_nome . ' (' . $ic_cracha_aluno . ')'; ?></td>
</tr>
<tr class="lt0">
		<td>Bolsa: <font class="lt1"> <b><?php echo $mb_descricao; ?> / <?php echo $ic_ano;?></b></td>
</tr>

<tr class="lt0">
		<td><?php echo msg('Vigencia'); ?>
		<br><font class="lt1">
		<B><?php echo stodbr($aic_dt_entrada); ?> - <?php echo stodbr($aic_dt_saida); ?></td>

<td align="right" class="lt3"><font color="<?php echo $s_cor; ?>"><b><?php echo $s_situacao; ?></b></font></td>			
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