<?php


$qs = array();
$qs[1][20] = 'Excelente';
$qs[1][10] = 'Bom';
$qs[1][5] = 'Regular';
$qs[1][1] = 'Ruim';

$qs[2][20] = 'adequado';
$qs[2][10] = 'parcialmente adequado';
$qs[2][1] = 'inadequado';

$qs[3][20] = 'Excelente';
$qs[3][10] = 'Bom';
$qs[3][5] = 'Regular';
$qs[3][1] = 'Ruim';

$qs[4][20] = 'Excelente';
$qs[4][10] = 'Bom';
$qs[4][5] = 'Regular';
$qs[4][1] = 'Ruim';
$qs[4][19] = 'Não se aplica';

$qs[5][20] = 'As atividades descritas não estão adequadas para uma proposta de IC';
$qs[5][10] = 'As atividades descritas são parcialmente válidas para IC';
$qs[5][5] = 'As atividades descritas são parcialmente válidas para IC';
$qs[5][1] = 'Ruim';
$qs[5][19] = 'Não se aplica';

$qs[6][1] = 'SIM';
$qs[6][2] = 'NÂO';

$qs[7][1] = 'SIM';
$qs[7][2] = 'NÂO';
$qs[7][3] = 'NÂO APLICÁVEL';

$qs[9][1] = '<font color="green"><b>APROVADO</b></font>';
$qs[9][2] = '<font color="red"><b>PENDENTE</b></font>';
?>
<h1>Ficha de avaliação do Relatório Parcial</h1>
<br>
<br>
<br>
<table width="90%" align="left">
	<tr>
		<td><!----------------- item 1 ----------------------------> 1) <b>Clareza, legibilidade e objetividade (português, organização geral do texto, figuras, gráficos,
		tabelas, referências, adequação do relatório ao modelo do Programa)</b>:
		<br>
		Avaliação: <?php echo $qs[1][$pp_p01];?>
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_01);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		2) <b>Na estruturação do relatório, os itens: introdução, desenvolvimento, resultados parciais, etapas
		futuras e referências bibliográficas, estão apresentados adequadamente, bem como, mantêm
		relação coerente entre si. Neste ponto este relatório está</b>:
		<br>
		Avaliação: <?php echo $qs[2][$pp_p02];?>
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_02);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		3) <b>Cumprimento do cronograma previsto</b>:
		<br>
		Avaliação: <?php echo $qs[3][$pp_p03];?>
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_03);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		4) <b>Resultados parciais obtidos</b>:
		<br>
		Avaliação: <?php echo $qs[4][$pp_p04];?>
		<br><br>
		Comentários sobre sua avaliação deste item:
		</td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_04);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		5) <b>No caso desta pesquisa de IC ser parte de uma pesquisa de mestrado, doutorado ou parte de projeto  mais amplo, assinale se</b>:
		<br><br>
		Avaliação: <?php echo $qs[5][$pp_p05];?>

		<br><br>
		Comentários sobre sua avaliação deste item:
		</td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_05);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		<br>
		<br>
		6) <b>O relatório parcial apresenta graves problemas relacionados a orientação desenvolvida e/ou
		problemas metodológicos que comprometem a formação do aluno de iniciação científica.
		Indique tais problemas no campo de comentários restrito. O avaliador considera que deve ser
		realizada uma reunião com o professor orientador</b>?
		<br>
		Avaliação: <?php echo $qs[6][$pp_p06];?>
		<br>
		<br>
		<br>
		7) <b>O projeto apresenta teor de tecnologia e inovação, portanto, seria indicado que migrasse para o PIBITI.</b>
		<br>
		Avaliação: <?php echo $qs[7][$pp_p07];?>
		<br>
		<br>
		<br>
		<br>
		8) <b>Outros comentários (o avaliador fica livre para suas sugestões e comentários sobre a apreciação geral do trabalho)</b>:
		<br>
		</td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_08);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		<br>
		<br>
		9) <b>Resultado da avaliação</b>:
		<br>
		Avaliação: <?php echo $qs[9][$pp_p09];?>
		<br>
		<br>
		<br>
		</td>
	</tr>
</table>
