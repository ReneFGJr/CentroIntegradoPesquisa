<?php
$ops = array();
$chk = array('', '', '', '','','');
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[0] = 'Indicar para bonifica��o do projeto com isen��o';
$ops[1] = 'Indicar somente para bonifica��o do projeto e sem isen��o';
$ops[2] = 'Indicar somente para isen��o sem bonifica��o do projeto';
$ops[3] = 'N�o bonificar o projeto, nem habilidar a isen��o';
$ops[4] = 'Devolver para o professor para corre��es';
$ops[5] = 'Cancelar protocolo, justificando o motivo';

$acao = 'Finalizar avalia��o';
$xacao = 'LIBERACAO_COORDENADOR';
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
		<td>Delibera��o</td>
		<td>Parecer sobre a delibera��o (obrigat�rio)</td>
		<td>A��o</td>
	</tr>
	<tr class="lt2" align="left" valign="top">
		<td>
		<input type="radio" name="dd1" value="0" <?php echo $chk[0];?> >
		<?php echo $ops[0];?><br>
		<input type="radio" name="dd1" value="1" <?php echo $chk[1];?> >
		<?php echo $ops[1];?><br>
		<input type="radio" name="dd1" value="2" <?php echo $chk[2];?> >
		<?php echo $ops[2];?><br>
		<input type="radio" name="dd1" value="3" <?php echo $chk[3];?> >
		<?php echo $ops[3];?><br>
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