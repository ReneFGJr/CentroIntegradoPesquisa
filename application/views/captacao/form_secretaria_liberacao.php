<?php
$ops = array();
$chk = array('', '', '', '', '', '');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[19] = 'Devolver para reavalição da Diretoria de Pesquisa';
$ops[7] = 'Finalizar processo';

$acao = 'Finalizar avaliação';
$xacao = 'LIBERACAO_PROCESSO';
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
		<td>deliberação</td>
		<td>comentários</td>
		<td>ação</td>
	</tr>
	<tr class="lt2" align="left" valign="top">
		<td>
		<input type="radio" name="dd1" value="19" <?php echo $chk[0];?> >
		<?php echo $ops[19];?><br>
		<input type="radio" name="dd1" value="7" <?php echo $chk[0];?> >
		<?php echo $ops[7];?><br></td>
		<td><textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
		<input type="submit" name="acao" value="<?php echo $acao;?>" class="btn btn-primary">
		<input type="hidden" name="xacao" value="<?php echo $xacao;?>">
		<input type="hidden" name="dd4" value="<?php echo $id_ca;?>">
		<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_ca);?>">
		</td>
	</tr>
	<tr>
		<td><?php echo $erro;?></form></td>
	</tr>
</table>