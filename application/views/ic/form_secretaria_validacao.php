<?php
$ops = array();
$chk = array('', '', '', '','','','','','','','','','','','','','','','','');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[4] = 'Devolver para o professor para correções';
$ops[5] = 'Cancelar protocolo, justificando o motivo';
$ops[6] = 'Validar documentação enviada';
$ops[7] = 'Finalizar submissão (não implementado)';

$acao = 'Finalizar avaliação';
$xacao = 'VALIDACAO_DOCUMENTAL';
$erro = '';
?>
<table width="100%" class="captacao_folha black border1">
	<tr>
		<td colspan=10 class="lt4"><?php echo msg('artigo_liberacao_secretaria');?></td>
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
		<input type="radio" name="dd1" value="6" <?php echo $chk[6];?> >
		<?php echo $ops[6];?><br>
		<input type="radio" name="dd1" value="7" <?php echo $chk[7];?> >
		<?php echo $ops[7];?><br>
		<input type="radio" name="dd1" value="4" <?php echo $chk[4];?> >
		<?php echo $ops[4];?><br>
		<input type="radio" name="dd1" value="5" <?php echo $chk[5];?> >
		<?php echo $ops[5];?><br>
		<hr>
		<input type="checkbox" name="dd10" value="1"> Enviar e-mail de confirmação de validação
		</td>
		<td><textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
			<input type="submit" name="acao" value="<?php echo $acao;?>" class="btn btn-primary">
			<input type="hidden" name="xacao" value="<?php echo $xacao; ?>">
			<input type="hidden" name="dd4" value="<?php echo $id_pj; ?>">
			<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_pj); ?>">
			
		</td>
	</tr>
	<tr>
		<td><?php echo $erro;?></form></td>
	</tr>
</table>