<?php
$tam_masc = 142;
$tam_fem = 180;

$total = ($tam_masc+$tam_fem);

$tam_masc_percentual = number_format($tam_masc / $total * 100,1,',','.').'%';
$tam_fem_percentual = number_format($tam_fem / $total * 100,1,',','.').'%';
?>
<table border=0 class="tabela01">
	<tr>
		<th colspan=2 align="left"><H2>Estudantes por genero</h2>
		<tr>
			<td class="tabela01" align="left"><img src="<?php echo base_url('img/icon/icone_masc.jpg');?>" height="60"></td>
			<td width="200"><div id="bar_man"><?php echo $tam_masc;?><BR>Masculino<BR><?php echo $tam_masc_percentual;?></div></td>
		<tr>
			<td class="tabela01" align="left"><img src="<?php echo base_url('img/icon/icone_fem.jpg');?>" height="60"></td>
			<td width="200"><div id="bar_woman"><?php echo $tam_fem;?><br>Feminino<BR><?php echo $tam_fem_percentual;?></div></td>
		</tr>
		<tr>
			<td colspan=2>Total <?php echo ($total);?> de estudantes.</td>
		</tr>
</table>

<?php
echo '
<style>
	#bar_man {
		padding: 5px;
		height: 60px;
		width: 220px;
		border: 1px solid #000000;
		background-image: url("'.base_url('img/bg_blue.png').'");
   		background-size: '.$tam_masc.'px 70px;
    	background-repeat: no-repeat;
		"); "
	}

	#bar_woman {
		padding: 5px;
		height: 60px;
		width: 220px;
		border: 1px solid #000000;
		background-image: url("'.base_url('img/bg_pink.png').'");
   		background-size: '.$tam_fem.'px 70px;
    	background-repeat: no-repeat;
		"); "
	}
</style>'
?>