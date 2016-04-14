<?php
$ops = array();
$chk = array('', '', '', '','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[25] = 'Encaminhar para Diretoria de Pesquisa';
$ops[4] = 'Devolver para o professor para correções';
$ops[5] = 'Cancelar protocolo, justificando o motivo';
$ops[7] = 'Finalizar processo';


$acao = 'Finalizar avaliação';
$xacao = 'LIBERACAO_ADMIN';
$erro = '';
?>
<table width="100%" class="captacao_folha black border1">
	<tr>
		<td colspan=10 class="lt4"><?php echo msg('captacao_liberacao_coordeador');?></td>
	</tr>
	<tr>
		<td><form method="post"></td>
	</tr>
	<tr class="lt1" align="left">
		<td>Deliberação</td>
		<td>Parecer sobre a deliberação (obrigatório)</td>
		<td>Ação</td>
	</tr>
	<tr class="lt2" align="left" valign="top">
		<td>
		<input type="radio" name="dd1" value="25" <?php echo $chk[25];?> >
		<?php echo $ops[25];?><br>
		<input type="radio" name="dd1" value="7" <?php echo $chk[7];?> >
		<?php echo $ops[7];?><br>		
		<hr>
		<input type="radio" name="dd1" value="4" <?php echo $chk[4];?> >
		<?php echo $ops[4];?><br>
		<input type="radio" name="dd1" value="5" <?php echo $chk[5];?> >
		<?php echo $ops[5];?><br>
		</td>
		<td>		<textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
			<input type="submit" name="acao" value="<?php echo $acao;?>" class="botao3d back_green_shadown back_green">
			<input type="hidden" name="xacao" value="<?php echo $xacao; ?>">
			<input type="hidden" name="dd4" value="<?php echo $id_ar; ?>">
			<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_ar); ?>">
			
		</td>
	</tr>
	
	<tr>
		<td><?php echo $erro;?></form></td>
	</tr>
</table>