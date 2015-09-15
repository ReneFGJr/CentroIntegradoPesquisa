<tr class="lt0" valign="top">
	<td rowspan="5" width="80">
		<img src="<?php echo $img; ?>" height="40">
		
	</td>
	<td class="lt3" align="left">
		<B><?php echo link_ic($id_ic).$ic_projeto_professor_titulo.'</a>'; ?></B>
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
			<font class="lt1"> <B><?php echo $pf_nome . ' (' . $pf_cracha . ')'; ?></td>
</tr>
<tr class="lt0">
		<td>Nome do estudante
		<br>
		<font class="lt1"> <B><?php echo $al_nome . ' (' . $al_cracha . ')'; ?></td>
</tr>
<tr class="lt0">
		<td>Bolsa: <font class="lt1"> <b><?php echo $mb_descricao; ?> / <?php echo $ic_ano;?></b></td>
</tr>

<tr class="lt0">
		<td><?php echo mst('Vigencia'); ?>
		<br><font class="lt1">
		<B><?php echo stodbr($aic_dt_entrada); ?> - <?php echo stodbr($aic_dt_saida); ?></td>

<td align="right" class="lt3"><font color="<?php echo $s_cor; ?>"><b><?php echo $s_situacao; ?></b></font></td>			
</tr>			
<tr><td colspan=3><hr width="50%" size="1"></td></tr>