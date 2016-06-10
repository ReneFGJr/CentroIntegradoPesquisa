<?php
$ops = array();
$chk = array('', '', '', '','','');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[10] = 'Com bonificação do projeto e com isenção';
$ops[11] = 'Com bonificação do projeto sem isenção';
$ops[12] = 'Com isenção e sem bonificação do projeto';
$ops[13] = 'Sem bonificação do projeto e sem isenção';
$ops[4] = 'Devolver para o professor para correções';
$ops[5] = 'Cancelar protocolo, justificando o motivo';

$acao = 'Finalizar avaliação';
$xacao = 'LIBERACAO_DIRETORIA';
$erro = '';
?>
<table width="100%" class="captacao_folha black border1">
	<tr>
		<td colspan=10 class="lt4"><?php echo msg('captacao_liberacao_diretoria');?></td>
	</tr>
	<tr>
		<td><form method="post"></td>
	</tr>
	<tr class="lt1" align="left">
		<td>deliberação</td>
		<td>comentários</td>
		<td>ação</td>
	</tr>
	<tr class="lt2" align="left" valign="top">
		<td>
		<input type="radio" name="dd1" value="10" <?php echo $chk[0];?> >
		<?php echo $ops[10];?><br>
		<input type="radio" name="dd1" value="11" <?php echo $chk[1];?> >
		<?php echo $ops[11];?><br>
		<input type="radio" name="dd1" value="12" <?php echo $chk[2];?> >
		<?php echo $ops[12];?><br>
		<input type="radio" name="dd1" value="13" <?php echo $chk[3];?> >
		<?php echo $ops[13];?><br>
		<hr>
		<input type="radio" name="dd1" value="4" <?php echo $chk[4];?> >
		<?php echo $ops[4];?><br>
		<input type="radio" name="dd1" value="5" <?php echo $chk[5];?> >
		<?php echo $ops[5];?><br>
		</td>
		<td>		<textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
			<input type="submit" name="acao" value="<?php echo $acao;?>" class="btn btn-primary">
			<input type="hidden" name="xacao" value="<?php echo $xacao; ?>">
			<input type="hidden" name="dd4" value="<?php echo $id_ca; ?>">
			<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_ca); ?>">
			
		</td>
	</tr>
	<tr>
		<td><?php echo $erro;?></form></td>
	</tr>
</table>