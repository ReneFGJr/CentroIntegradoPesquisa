<?php

$qs = array();
$qs[1][20] = 'Sim, integralmente ';
$qs[1][10] = 'Sim, parcialmente ';
$qs[1][5] = 'Não';

$qs[2][20] = 'Sim';
$qs[2][10] = 'Não';
$qs[2][1] = 'Não aplicárvel';

$qs[9][1] = '<font color="green"><b>APROVADO</b></font>';
$qs[9][2] = '<font color="red"><b>ENVIADO PARA O COMITÊ GESTOR</b></font>';
?>
<h1>Ficha de avaliação do Relatório Parcial</h1>
<br>
<br>
<br>
<table width="90%" align="left">
	<tr>
		<td><!----------------- item 1 ----------------------------> 1) <b>As correções solicitadas foram realizadas?</b>:
		<br>
		Avaliação: <?php echo $qs[1][$pp_p01]; ?>
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_01); ?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		2) <b>Os itens descritos na questão 1 (se aplicável) poderão ser corrigidos no relatório final?</b>:
		<br>
		Avaliação: <?php echo $qs[2][$pp_p02]; ?>
		<br>
		</td>
	</tr>

	<tr>
		<td>
		<br>
		<br>
		<br>
		<br>
		9) <b>Resultado da avaliação</b>:
		<br>
		Avaliação: <?php echo $qs[9][$pp_p09]; ?>
		<br>
		<br>
		<br>
		</td>
	</tr>
</table>
