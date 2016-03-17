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
$qs[4][19] = 'N�o se aplica';

$qs[5][20] = 'As atividades descritas n�o est�o adequadas para uma proposta de IC';
$qs[5][10] = 'As atividades descritas s�o parcialmente v�lidas para IC';
$qs[5][5] = 'As atividades descritas s�o parcialmente v�lidas para IC';
$qs[5][1] = 'Ruim';
$qs[5][19] = 'N�o se aplica';

$qs[6][1] = 'SIM';
$qs[6][2] = 'N�O';

$qs[7][1] = 'SIM';
$qs[7][2] = 'N�O';
$qs[7][3] = 'N�O APLIC�VEL';

$qs[9][1] = '<font color="green"><b>APROVADO</b></font>';
$qs[9][2] = '<font color="red"><b>PENDENTE</b></font>';
?>
<h1>Ficha de avalia��o do Relat�rio Parcial</h1>
<br>
<br>
<br>
<table width="90%" align="left">
	<tr>
		<td><!----------------- item 1 ----------------------------> 1) <b>Clareza, legibilidade e objetividade (portugu�s, organiza��o geral do texto, figuras, gr�ficos,
		tabelas, refer�ncias, adequa��o do relat�rio ao modelo do Programa)</b>:
		<br>
		Avalia��o: <?php echo $qs[1][$pp_p01];?>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_01);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		2) <b>Na estrutura��o do relat�rio, os itens: introdu��o, desenvolvimento, resultados parciais, etapas
		futuras e refer�ncias bibliogr�ficas, est�o apresentados adequadamente, bem como, mant�m
		rela��o coerente entre si. Neste ponto este relat�rio est�</b>:
		<br>
		Avalia��o: <?php echo $qs[2][$pp_p02];?>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item: </td>
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
		Avalia��o: <?php echo $qs[3][$pp_p03];?>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item: </td>
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
		Avalia��o: <?php echo $qs[4][$pp_p04];?>
		<br><br>
		Coment�rios sobre sua avalia��o deste item:
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
		Avalia��o: <?php echo $qs[5][$pp_p05];?>

		<br><br>
		Coment�rios sobre sua avalia��o deste item:
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
		6) <b>O relat�rio parcial apresenta graves problemas relacionados a orienta��o desenvolvida e/ou
		problemas metodol�gicos que comprometem a forma��o do aluno de inicia��o cient�fica.
		Indique tais problemas no campo de coment�rios restrito. O avaliador considera que deve ser
		realizada uma reuni�o com o professor orientador</b>?
		<br>
		Avalia��o: <?php echo $qs[6][$pp_p06];?>
		<br>
		<br>
		<br>
		7) <b>O projeto apresenta teor de tecnologia e inova��o, portanto, seria indicado que migrasse para o PIBITI.</b>
		<br>
		Avalia��o: <?php echo $qs[7][$pp_p07];?>
		<br>
		<br>
		<br>
		<br>
		8) <b>Outros coment�rios (o avaliador fica livre para suas sugest�es e coment�rios sobre a aprecia��o geral do trabalho)</b>:
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
		9) <b>Resultado da avalia��o</b>:
		<br>
		Avalia��o: <?php echo $qs[9][$pp_p09];?>
		<br>
		<br>
		<br>
		</td>
	</tr>
</table>
