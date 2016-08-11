<?php
$qs = array();
//----------------- Questão 1 do RF----------------------------
$qs[1][20] = 'Excelente';
$qs[1][10] = 'Bom';
$qs[1][5] = 'Regular';
$qs[1][1] = 'Ruim';

//----------------- Questão 2 do RF----------------------------
$qs[2][20] = 'Adequado';
$qs[2][10] = 'Parcialmente adequado';
$qs[2][1] = 'Inadequado';

//----------------- Questão 3 do RF----------------------------
$qs[3][20] = 'Excelente';
$qs[3][10] = 'Bom';
$qs[3][5] = 'Regular';
$qs[3][1] = 'Ruim';

//----------------- Questão 4 do RF----------------------------
$qs[4][20] = 'Excelente';
$qs[4][10] = 'Bom';
$qs[4][5] = 'Regular';
$qs[4][1] = 'Ruim';

//----------------- Questão 5 do RF----------------------------
//somente comentário extra
$qs[5][0] = 'Comentário';

//----------------- Questão 6 do RF----------------------------
$qs[6][20] = 'Relatório final aprovado com mérito';
$qs[6][10] = 'Relatório final aprovado. As sugestões apresentadas devem ser incorporadas para a apresentação no XXIV SEMIC.';
$qs[6][2]  = 'Relatório final com pendência, submeter novamente após realizar as correções.';
$qs[6][99] = 'Trabalho não indicado para apresentação pública.';

//----------------- Questão 7 do RF----------------------------
//$qs[7][0]  = 'Nota';
//nota geral

$pp_abe_01 = troca($pp_abe_01, '<', '&lt;');
$pp_abe_02 = troca($pp_abe_02, '<', '&lt;');
$pp_abe_03 = troca($pp_abe_03, '<', '&lt;');
$pp_abe_04 = troca($pp_abe_04, '<', '&lt;');
$pp_p06    = troca($pp_p06, '<', '&lt;');
$pp_abe_08 = troca($pp_abe_08, '<', '&lt;');
?>

<h1>Ficha de avaliação do Relatório Final</h1>
<br>
<br>
<br>
<table width="90%" align="left">
	<tr>
		<td>
		<!----------------- item 1 ----------------------------> 
		1)<b> Clareza, legibilidade e objetividade (português, organização geral do texto, figuras, gráficos,
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
		<!----------------- item 1 ----------------------------> 
		2) <b>Na estruturação do relatório, os itens: introdução, desenvolvimento, resultados, discussão, considerações finais e
		referências bibliográficas, estão apresentados adequadamente, bem como, mantêm
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
		<!----------------- item 1 ----------------------------> 
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
		<!----------------- item 1 ----------------------------> 
		4) <b>Resultados obtidos</b>:
		<br>
		Avaliação: <?php echo $qs[4][$pp_p04];?>
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_04);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		<!----------------- item 1 ----------------------------> 
		5) <b>Outros comentários</b>:
		<br>
		<br>
		Comentários sobre sua avaliação deste item: </td>
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
		<!----------------- item 1 ----------------------------> 
		6) <b>Resultado da avaliação do relatório Final e do Resumo</b>
		<br>
		Avaliação: <?php echo $qs[6][$pp_p06];?>
		<br>
		<br>
		<br>
		</td>
	</tr>
</table>
