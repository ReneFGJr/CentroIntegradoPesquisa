<?php
$qs = array();
//----------------- Quest�o 1 do RF----------------------------
$qs[1][20] = 'Excelente';
$qs[1][10] = 'Bom';
$qs[1][5] = 'Regular';
$qs[1][1] = 'Ruim';

//----------------- Quest�o 2 do RF----------------------------
$qs[2][20] = 'Adequado';
$qs[2][10] = 'Parcialmente adequado';
$qs[2][1] = 'Inadequado';

//----------------- Quest�o 3 do RF----------------------------
$qs[3][20] = 'Excelente';
$qs[3][10] = 'Bom';
$qs[3][5] = 'Regular';
$qs[3][1] = 'Ruim';

//----------------- Quest�o 4 do RF----------------------------
$qs[4][20] = 'Excelente';
$qs[4][10] = 'Bom';
$qs[4][5] = 'Regular';
$qs[4][1] = 'Ruim';

//----------------- Quest�o 5 do RF----------------------------
//somente coment�rio extra
$qs[5][0] = 'Coment�rio';

//----------------- Quest�o 6 do RF----------------------------
$qs[6][20] = 'Relat�rio final aprovado com m�rito';
$qs[6][10] = 'Relat�rio final aprovado. As sugest�es apresentadas devem ser incorporadas para a apresenta��o no XXIV SEMIC.';
$qs[6][2]  = 'Relat�rio final com pend�ncia, submeter novamente ap�s realizar as corre��es.';
$qs[6][99] = 'Trabalho n�o indicado para apresenta��o p�blica.';

//----------------- Quest�o 7 do RF----------------------------
//$qs[7][0]  = 'Nota';
//nota geral

$pp_abe_01 = troca($pp_abe_01, '<', '&lt;');
$pp_abe_02 = troca($pp_abe_02, '<', '&lt;');
$pp_abe_03 = troca($pp_abe_03, '<', '&lt;');
$pp_abe_04 = troca($pp_abe_04, '<', '&lt;');
$pp_p06    = troca($pp_p06, '<', '&lt;');
$pp_abe_08 = troca($pp_abe_08, '<', '&lt;');
?>

<h1>Ficha de avalia��o do Relat�rio Final</h1>
<br>
<br>
<br>
<table width="90%" align="left">
	<tr>
		<td>
		<!----------------- item 1 ----------------------------> 
		1)<b> Clareza, legibilidade e objetividade (portugu�s, organiza��o geral do texto, figuras, gr�ficos,
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
		<!----------------- item 1 ----------------------------> 
		2) <b>Na estrutura��o do relat�rio, os itens: introdu��o, desenvolvimento, resultados, discuss�o, considera��es finais e
		refer�ncias bibliogr�ficas, est�o apresentados adequadamente, bem como, mant�m
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
		<!----------------- item 1 ----------------------------> 
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
		<!----------------- item 1 ----------------------------> 
		4) <b>Resultados obtidos</b>:
		<br>
		Avalia��o: <?php echo $qs[4][$pp_p04];?>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item: </td>
	</tr>
	<tr>
		<td><?php echo mst($pp_abe_04);?></td>
	</tr>
	<tr>
		<td>
		<br>
		<br>
		<!----------------- item 1 ----------------------------> 
		5) <b>Outros coment�rios</b>:
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item: </td>
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
		6) <b>Resultado da avalia��o do relat�rio Final e do Resumo</b>
		<br>
		Avalia��o: <?php echo $qs[6][$pp_p06];?>
		<br>
		<br>
		<br>
		</td>
	</tr>
</table>
