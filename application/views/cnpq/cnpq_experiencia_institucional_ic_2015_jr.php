<BR><BR><BR>
<center>
	
	<table class="tabela00 lt2" width="900" align="center" border=0 cellpadding="10" style="background-color: #FFFFFF;">
	<tr>
		<td align="left"><h1>Experiência Institucional na Iniciação Científica Júnior</h1><h2>PIBIC_EM (Jr)</h2><span class="corpo-texto-explicativo lt3">
			<br>
			A PUCPR aderiu ao PIBIC Jr em 2006 e a cada ano vem amadurecendo esse processo de aproximação da Universidade com o Ensino Médio, totalizando até hoje mais de 500 alunos envolvidos no programa.
			<BR>
			<BR>
			A evolução dos últimos anos, com o número de alunos envolvidos no PIBIC Jr pode ser visualizado a seguir:
			<BR>
			<BR>
			<B>Quadro 1 - Número de Bolsas de Programas de Iniciação Científica e Tecnológica da Instituição (2009 - 2015)</B> </td>
		</span>
	</tr>
</table>
<BR>
<table class="tabela00 lt2" width="900" align="center" style="background-color: #FFFFFF;">
	<TR>
		<TH>ano</TH>
		<TH width="20%">Bolsa PUCPR</TH>
		<TH width="20%">Fundação Araucária</TH>
		<TH width="20%">CNPq</TH>
		<TH width="20%">total</TH>
	<TR>
		<th class="tabela01" align="center">2009 </th>
		<TD class="tabela01" align="center">40</td>
		<TD class="tabela01" align="center">40</td>
		<TD class="tabela01" align="center">- </td>
		<TD class="tabela01" align="center">80</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2010</th>
		<TD class="tabela01" align="center">40</td>
		<TD class="tabela01" align="center">-</td>
		<TD class="tabela01" align="center">40</td>
		<TD class="tabela01" align="center">80</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2011</th>
		<TD class="tabela01" align="center">45</td>
		<TD class="tabela01" align="center">-</td>
		<TD class="tabela01" align="center">35</td>
		<TD class="tabela01" align="center">80</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2012</th>
		<TD class="tabela01" align="center">45</td>
		<TD class="tabela01" align="center">-</td>
		<TD class="tabela01" align="center">35</td>
		<TD class="tabela01" align="center">80</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2013</th>
		<TD class="tabela01" align="center">30</td>
		<TD class="tabela01" align="center">16</td>
		<TD class="tabela01" align="center">35</td>
		<TD class="tabela01" align="center">81</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2014</th>
		<TD class="tabela01" align="center">50</td>
		<TD class="tabela01" align="center">-</td>
		<TD class="tabela01" align="center">35</td>
		<TD class="tabela01" align="center">85</td>
	</tr>
	<TR>
		<th class="tabela01" align="center">2015</th>
		<TD class="tabela01" align="center">50</td>
		<TD class="tabela01" align="center">-</td>
		<TD class="tabela01" align="center">35</td>
		<TD class="tabela01" align="center">85</td>
	</tr>

	<tr>
		<td colspan="7"><font style="font-size:10px">FONTE: Coordenação de Iniciação Científica - PIBIC PUCPR </font></td>
	</tr>
</table>
	
	
	
	
	
	<table class="tabela00 lt2" width="900" align="center" border=0 cellpadding="10">
		<tr><td>
		<img src="<?php echo base_url('img/cnpq/logo_ic_pibic_em.png');?>" width="200"; />	
		<tr valign="top">
			<td width="300" class="tabela01 border01" style="background-color: #FFFFFF;">
<?php
			/* PIBIC */
			$dado = array('2009' => 19,'2010' => 28, '2011' => 40, '2012' => 49, '2013*' => 9, '2014' => 74);
			$title = 'Histórico dos projetos finalizados';
			$title2 = 'Apresentação SEMIC - PIBIC';
			$ybar = 'Total de trabalhos';
			$xbar = 'Ano';
			$div_name = 'pibic_jr';
			
			//require ("view/apresentacao_semic.php");
			
?>
<?php
			$dados = '';
			
			foreach ($dado as $key => $value) {
				$dados .= "['$key',   $value],";
			}
			?>
			
			<!-- Grafico HighChart--->
			<script type="text/javascript">
					$(function () {
				$('#<?php  echo $div_name;?>
					').highcharts({
						chart: {
					type: 'column'
					},
					title: {
						text: '<?php  echo $title;?>',
						fontSize: '13px'
					},
					subtitle: {
					text: '<?php  echo $title2;?>'
					},
					xAxis: {
					type: 'category',
					labels: {
					rotation: -45,
					style: {
					fontSize: '11px',
					fontFamily: 'Verdana, sans-serif'
					}
					}
					},
					yAxis: {
					min: 0,
					style: {
					fontSize: '8px',
					fontFamily: 'Verdana, sans-serif'
					},		
					title: {
					text: '<?php  echo $ybar;?>'
					}
					},
					legend: {
					enabled: false
					},
					tooltip: {
					pointFormat: '<?php  echo $ybar;?>: <b>{point.y:.0f}</b>'
					},
					series: [{
					name: '<?php  echo $xbar;?>',
					data: [ <?php echo "$dados";?> ],
				dataLabels: {
					enabled: true,
					rotation: -45,
					color: '#222222',
					align: 'center',
					format: '{point.y:.0f}', // one decimal
					y: 5, // 10 pixels down from the top
					style: {
						fontSize: '15px',
						fontFamily: 'Verdana, sans-serif'
						}
				}
				}]
				});
				});</script>
			</head>
			<div id="<?php echo $div_name;?>" style="width: 300px; height: 250px; margin: 0 auto"></div>


<?php			
			echo '<font class="lt0">* Em 2013 as bolsas do CNPq foram prorrogadas, os alunos apresentaram no ano seguinte, com dois eventos no ano.</font>';

			/* PIBIC  model: pizza */
			$dado = array('CNPq' => 35, 'PUCPR' => 50);
			$title = 'Bolsas PIBIC Implementadas - ' . date("Y");
			$title2 = '';
			$ybar = 'Distribuição';
			$div_name_jr = 'pibic_jr_pie';
			
			//require ("view/apresentacao_origem_bolsas.php");
?>

<?php

/* PIBITI */
/*
 $dado = array('CNPq' => 94, 'FA' => 145, 'PUCPR' => 350, 'ICV' => 448);
 $title = 'Origem das bolsas PIBITI';
 $title2 = '';
 $ybar = 'Distribuição';
 */

$dados = '';
foreach ($dado as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function () {
	// Radialize the colors
	Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
	return {
	radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
	stops: [
	[0, color],
	[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
	]
	};
	});

	// Build the chart
	$('#<?php echo $div_name_jr;?>').highcharts({
		chart: {
		plotBackgroundColor: null,
		plotBorderWidth: null,
		plotShadow: false
		},
	title: {
		text: '<?php echo $title;?>'
	},
	tooltip: {
		pointFormat: '{series.name}: <b>{point.y} bolsas</b>'
	},
	plotOptions: {
		pie: {
		allowPointSelect: true,
		cursor: 'pointer',
		dataLabels: {
		enabled: true,
		format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		style: {
		color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		},
		connectorColor: 'silver'
		}
		}
	},
	series: [{
	type: 'pie',
	name: 'Quantidade',
	data: [<?php echo $dados;?>]
	}]
	});
	});
	</script>
</head>
<div id="<?php echo $div_name_jr;?>" style="width: 300px; height: 250px; margin: 1px; auto"></div>

			
			</td>
			<td width="10" style="border-right: 1px solid #333333;"></td>
			<td><?php
			$mul1 = 100 * 12; /* Valor da bolsa no ano em 12 meses */
			$mul2 = 150 * 12; /* Valor da bolsa no ano em 12 meses */
			$mul2 = 150 * 12; /* Valor da bolsa no ano em 12 meses */
			$mul3 = 50 * 12; /* Complemento */
			
			$dados = array();
			$dados['title'] = 'Dispêndio Anual com Bolsas';
			$dados['2010-2011'] = array(40 * $mul1,  40 * $mul1, 80 * $mul1);
			$dados['2011-2012'] = array(45 * $mul1,  0 * $mul1, 35 * $mul1);
			$dados['2012-2013'] = array(45 * $mul2,  0 * $mul3, 35 * $mul2);
			$dados['2013-2014'] = array(30 * $mul2,  0 * $mul2, 35 * $mul2);
			$dados['2014-2015'] = array(50 * $mul2 + 35 * $mul3,  16 * $mul2, 35 * $mul2);
			$dados['2015-2016'] = array(50 * $mul2 + 35 * $mul3,  0 * $mul2, 35 * $mul2);
			$dados['2016-2017'] = array(0 * $mul2 + 0 * $mul3,  0 * $mul2, 0 * $mul2);
			
			$dados['obs'] = 'As bolsas do CNPq são complementadas em R$ 50,00 pela PUCPR nos anos de 2014 e 2015 para equiparação com as bolsas da Fundação Araucária.';
			$dados['header'] = array('Vigências das bolsas','PUCPR','Fundação Araucária (FA)','CNPq*','Total');
			//require ("view/tabela_dispendio_anual.php");
?>
		<table width="100%" align="right" class="tabela00 lt1">
	<tr>
		<td colspan=5><h3><?php echo $dados['title']; ?></h3></td>
	</tr>
	<tr>
		<th width="20%"><?php echo $dados['header'][0];?></td> 
		<th width="20%"><?php echo $dados['header'][1];?></th>
		<th width="20%"><?php echo $dados['header'][2];?></th>
		<th width="20%"><?php echo $dados['header'][3];?></th>
		<th width="20%"><?php echo $dados['header'][4];?></th>
	</tr>
	<?php
	for ($r = 2010; $r <= date("Y"); $r++) {
		$lb = $r . '-' . ($r + 1);
		echo '<tr>';
		echo '<th align="center">' . $lb . '</th>';
		echo '<td align="center" class="tabela01">' . number_format($dados[$lb][0], 2, ',', '.') . '</td>';
		echo '<td align="center" class="tabela01">' . number_format($dados[$lb][1], 2, ',', '.') . '</td>';
		echo '<td align="center" class="tabela01">' . number_format($dados[$lb][2], 2, ',', '.') . '</td>';
		$tot = $dados[$lb][0] + $dados[$lb][1] + $dados[$lb][2];
		echo '<th align="center" class="tabela01">' . number_format($tot, 2, ',', '.') . '</th>';
	}
	?>
	<tr>
		<td></td>
	<td colspan=5 class="lt0"><?php echo $dados['obs']; ?></tr>
</table>			
			
			
			
<?php			
			$dados = array();
			$dados['title'] = 'Demanda Bruta e Atendida	';
			$dados[0] = array('Edital 2014', 43, 43, 0, 43);
			$dados[1] = array('Edital 2015', 56, 52, 4, 52);
			$dados['obs'] = 'Todos os alunos do Ensino médio recebem uma bolsa de R$ 150,00. O CNPq faz repasse de R$ 100,00 mensal para cada aluno, complementado com R$ 50,00 pela PUCPR
							para equipação com as bolsas da Fundação Araucária.';
			//require ("view/tabela_demanda.php");

			?>
	<table width="100%" align="right" class="tabela00 lt1">
	<tr>
		<td colspan=5><BR><BR><h3><?php echo $dados['title'];?></h3></td>
	</tr>
	<tr>
		<th width="20%">&nbsp;</th> 
		<th width="20%">Demanda Bruta</th>
		<th width="20%">Demanda Qualificada</th>
		<th width="20%">Reprovados</th>
		<th width="20%">Demanda Atendida</th>
	</tr>
	<?php
	for ($r = 0; $r < 2; $r++) {
		$lb = $r . '-' . ($r + 1);
		$red = '<font color="red">';
		$green = '<font color="green">';
		$prec_rep = ' ('.number_format($dados[$r][3] / $dados[$r][1] * 100,1,',','.').'%)';
		$prec_ate = ' ('.number_format($dados[$r][4] / $dados[$r][2] * 100,1,',','.').'%)';
		echo '<tr>';
		echo '<th align="center" class="tabela01">' . $dados[$r][0] . '</th>';
		echo '<td align="center" class="tabela01">' . number_format($dados[$r][1], 0, ',', '.') . '</td>';
		echo '<td align="center" class="tabela01">' . number_format($dados[$r][2], 0, ',', '.') . '</td>';
		echo '<td align="center" class="tabela01">' . $red .number_format($dados[$r][3], 0, ',', '.') . $prec_rep. '</font></td>';
		echo '<td align="center" class="tabela01">' . $green. number_format($dados[$r][4], 0, ',', '.') . $prec_ate. '</font></td>';
	}
	?>
<tr>
	<td colspan=5 class="lt0"><?php echo $dados['obs'];?></tr>		
</table>

	
			
	</td>
	</tr>
	</table>
	<table border="0" width="900" align="center" class="corpo-texto-explicativo">
	<tr><td colspan=2>
	<BR><BR><BR><BR>
	<h2>Instituições parceiras no PIBICJr</h2>	
		A PUCPR é a única IES que como contrapartida às bolsas recebidas dos órgãos de fomento desenvolve o mesmo programa com colégios da rede privada. Abaixo relacionamos nossos colégios parceiros, bem como o respectivo tempo em que mantemos o programa na instituição:
	<br>
	<ul>
    	<li>Colégio Marista Santa Maria - (7 anos)</li>
        <li>Colégio Marista Paranaense - (7 anos)</li>
        <li>Colégio Marista (Maringá) - (1 ano)</li>
        <li>Colégio Top Gun - (1 ano)</li>
    </ul>

	<TR>
		<TD width="50%">
			<ul>
        <li>C.E. Abraham Lincoln - (2 anos)</li>
        <li>C.E. Ambrósio Bini</li>
        <li>C.E. André Andreatta</li>
        <li>C.E. Arnaldo Jansen</li>
        <li>C.E. Benedicto João Cordeiro</li>
			<li>C.E. Cruzeiro do Sul</li>
        <li>C.E. da Policia Militar do Paraná</li>
        <li>C.E. Dep. Olívio Belich - (2 anos)</li>
        <li>C.E. Elsa Scherner Moro </li>
        <li>C.E. Emílio de Menezes</li>
        <li>C.E. Etelvina Cordeiro Ribas</li>
        <li>C.E. Hasdrubal Bellegard - (2 anos)</li>
        <li>C.E. Homero Baptista de Barros</li>
        <li>C.E. Jardim Maracanã</li>
        <li>C.E. Jayme Canet</li>
        <li>C.E. João Batista Vera - (3 anos)</li>
			</ul>
		</TD>
		<TD>
			<ul>
        <li>C.E. João Gueno</li>
        <li>C.E. Juscelino Kubitschek de Oliveira</li>
        <li>C.E. Leocádia Braga Ramos - (3 anos)</li>
        <li>C.E. Maria da Luz Furquim</li>
        <li>C.E. Nilo Brandão</li>
        <li>C.E. Otilia Homero da Silva </li>
        <li>C.E. Pedro Macedo</li>
        <li>C.E. Pinheiro do Paraná</li>
        <li>C.E. Prof Olavo Del Claro</li>
        <li>C.E. Prof. Francisco Zardo</li>
        <li>C.E. Protásio de Carvalho</li>
        <li>C.E. Rosilda de Souza Oliveira</li>
        <li>C.E. Silveira da Mota</li>
        <li>C.E. Timbu Velho</li>
        <li>C.E. Victor do Amaral</li>
			</ul>
		<br>
		</TD>
	</TR>
	<tr>
		<td colspan=2>
			Essa grande rotatividade de colégios e o pequeno número de alunos de cada colégio envolvidos não favorecem a disseminação e sedimentação da cultura da iniciação científica na escola. Apesar de, sem dúvida alguma, os bolsistas se beneficiarem sobremaneira da experiência. A nova formatação da IC Jr em PIBIC_EM nos parece ser uma boa estratégia para enfrentar esta questão, uma vez que a IES faz parceria com um ou mais colégio, as bolsas ficam concentradas numa escola, podendo envolver toda a comunidade em torno de um eixo de interesse comum. Desse modo, a intervenção pode ser mais efetiva.
			</span><img src="<?php echo base_url('img/cnpq/IC-2014-08.JPG');?>" width="98%"; />
		</td>
	</tr>
</table>	