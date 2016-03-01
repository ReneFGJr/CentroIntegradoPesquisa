<?php
$ops = array();
$chk = array();
for ($r=0;$r < 20;$r++) { array_push($chk,''); } 
if (strlen(get("dd1") > 0)) {
	$dd1 = round(get("dd1"));
	$chk[$dd1] = 'checked';
}
$ops[19] = 'Devolver para reavalição da Diretoria de Pesquisa';
$ops[5] = 'Cancelar protocolo, justificando o motivo';
$ops[20] = 'Gerar Isenção';

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
		<input type="radio" name="dd1" value="19" <?php echo $chk[19];?> >
		<?php echo $ops[19];?><br>
		<input type="radio" name="dd1" value="5" <?php echo $chk[5];?> >
		<?php echo $ops[5];?><br><?php
		/* Habilita isenção */
		if ($isencao == 1) {
			echo '<input type="radio" name="dd1" value="20" ' . $chk[5] . '">';
			echo $ops[20];
		}
		?>
		<br>
		</td>
		<td>		<textarea cols=40 rows=5 name="dd2"><?php echo get("dd2");?></textarea></td>
		<td>
		<input type="submit" name="acao" value="<?php echo $acao;?>" class="botao3d back_green_shadown back_green">
		<input type="hidden" name="xacao" value="<?php echo $xacao;?>">
		<input type="hidden" name="dd4" value="<?php echo $id_ca;?>">
		<input type="hidden" name="dd5" value="<?php echo checkpost_link($id_ca);?>">

		</td>
		</tr>
		<tr>
		<td><?php echo $erro;?></form></td>
		</tr>
		</table>
