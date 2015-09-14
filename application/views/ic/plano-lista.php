<tr class="lt0" valign="top">
	<td rowspan="4" width="80">
		<img src="<?php echo $img; ?>" height="40">
		
	</td>
	<td class="lt3" align="left">
		<B><?php echo link_ic($id_ic).$pa_plano.'</a>'; ?></B>
	</td>			
	<td class="lt3" align="right">
		Protocolo: <b><?php echo $pa_codigo; ?></b>
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
		<td><?php echo mst('Vigencia'); ?>
		<br><font class="lt1">
		<B><?php echo stodbr($pa_dt_inicio_bolsa_aluno); ?> - <?php echo stodbr($pa_dt_termino_bolsa_aluno); ?></td>

<td align="right" class="lt3"><font color="<?php echo $s_cor; ?>"><b><?php echo $s_situacao; ?></b></font></td>			
</tr>			
<tr><td colspan=3><hr width="50%" size="1"></td></tr>