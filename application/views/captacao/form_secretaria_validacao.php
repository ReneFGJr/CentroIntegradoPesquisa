<?php
$ops = array();
$chk = array('', '', '', '','','');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[4] = 'Devolver para o professor para corre��es';
$ops[5] = 'Cancelar protocolo, justificando o motivo';
$ops[6] = 'Validar documenta��o enviada';
$ops[7] = 'Finalizar processo';

$acao = 'Finalizar avalia��o';
$xacao = 'VALIDACAO_DOCUMENTAL';
$erro = '';
?>
<table width="100%" class="captacao_folha black border1">
	<tr>
		<td colspan=10 class="lt4"><?php echo msg('captacao_liberacao_secretaria');?></td>
	</tr>
	<tr>
		<td><form method="post"></td>
	</tr>
	<tr class="lt1" align="left">
		<td>delibera��o</td>
		<td>coment�rios</td>
		<td>a��o</td>
	</tr>
	<tr class="lt2" align="left" valign="top">
		<td>
		<input type="radio" name="dd1" value="6" <?php echo $chk[0];?> >
		<?php echo $ops[6];?><br>
		<input type="radio" name="dd1" value="7" <?php echo $chk[0];?> >
		<?php echo $ops[7];?><br>
		<input type="radio" name="dd1" value="4" <?php echo $chk[4];?> >
		<?php echo $ops[4];?><br>
		<input type="radio" name="dd1" value="5" <?php echo $chk[5];?> >
		<?php echo $ops[5];?><br>
		</td>
		<td>		<textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
			<input type="submit" name="acao" value="<?php echo $acao;?>" class="botao3d back_green_shadown back_green">
			<input type="hidden" name="xacao" value="<?php echo $xacao; ?>">
			<input type="hidden" name="dd4" value="<?php echo $id_ca; ?>">
			<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_ca); ?>">
			
		</td>
	</tr>
	<tr>
		<td><?php echo $erro;?></form></td>
	</tr>
</table>