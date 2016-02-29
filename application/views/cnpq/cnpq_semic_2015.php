<h1>SEMIC</h1>
<span class="corpo-texto-explicativo"> 
	<center><h1>Tema do SEMIC 2015</h1></center>
	<BR>
	<table width="1024" class="tabela00 lt1" border=0 align="center" cellpadding="10">
		<tr valign="top">
			<td colspan=2>
				<center>
					<img src="<?php echo base_url('img/cnpq/semic_2015.png');?>" width="75%"; />
				</center>
			</td>
		<tr valign="top">
			<td>
				<?php

			/* PIBIC */
			$dado = array('1993' => 20, '1994' => 23, '1995' => 27, 
										'1996' => 35, '1997' => 35, '1998' => 37, 
										'1999' => 49, '2000' => 58, '2001' => 64, 
										'2002' => 106, '2003' => 224, '2004' => 220, 
										'2005' => 172, '2006' => 166, '2007' => 184, 
										'2008' => 231, '2009' => 265, '2010' => 466, 
										'2011' => 515, '2013' => 892, '2014' => 974, 
										'2015*' => 1114 );
			$title = 'Histórico de trabalhos no SEMIC';
			$title2 = '1993-2015';
			$ybar = 'Total de trabalhos';
			$xbar = 'Ano';
			$div_name = 'semic';
			
			//require ("view/apresentacao_semic_trabalhos.php");
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
			fontSize: '10px'
		},
		subtitle: {
		text: '<?php  echo $title2;?>'
		},
		xAxis: {
		type: 'category',
		labels: {
		rotation: -45,
		style: {
		fontSize: '8px',
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
		rotation: -90,
		color: '#222222',
		align: 'center',
		format: '{point.y:.0f}', // one decimal
		y: -15, // 10 pixels down from the top
		style: {
			fontSize: '10px',
			fontFamily: 'Verdana, sans-serif',
			fontcollor: 'red'
			}
	}
	}]
	});
	});</script>
</head>
<div id="<?php echo $div_name;?>" style="width: auto; margin: 0 auto"></div>
			
			<br />
			<font class="lt0">
					<?php echo '* 2015 - Valor estimado de apresentações, os relatórios estão em submissão e avaliação.';?>
			</font>
			
			<td width="60%" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 12px;">
			
			Novidades no evento:
			<uL>
				<li>
					Sessão internacional - apresentação oral e pôster em Inglês, arguição em inglês.
				</li>
				<li>
					Pesquisa é evoluir - exposição de protótipos de projeto de pesquisa com teor de inovação para estudantes da graduação e Pós-Graduação.
				</li>
				<li>
					Concurso Jovens Ideias - exposição de protótipos de alunos empreendedores.
				</li>
				<li>
					Eventos Culturais: Ciência, Arte e cultura.
				</li>
				<li>
					Evento temático focado nas áreas estratégicas da PUCPR, em 2015 a área selecionada foi de Direitos Humanos.
				</li>
				<li>
					Avaliação por iPad diretamente no evento desde 2013.
				</li>
			</uL>
			<BR>
			<BR>
			<BR>
			Premiações:
			<ul>
				<li>
					Desde 2010 as premiações são divuldadas no último dia do evento, na palestra de encerramento.
				</li>
				<li>
					Até 2012 a premiação dos 10 melhores do PIBIC e 2 melhores trabalhos do PIBITI. Os estudantes premiados foram para o SBPC com todas as despesas pagas.
				</li>
				<li>
					A partir de 2013, a premiação é a participação em congresso nacional (8 melhores do PIBIC e 2 melhores do PIBITI) e em congresso internacional os 2 melhores trabalhos da sessão internacional.
				</li>
				<li>
					Em 2013, para o PIBICjr/PIBIC_EM a premiação dos 2 melhores trabalhos foi um tablete Samsung em 2014 e 2 iPod da Apple.
				</li>
				<li>
					Em 2014 foram premiados com menção honrosa os trabalhos nas modalidades Pôster e Oral, os trabalhos melhor avaliados por categorias foram premiados em dinheiro. Neste ano os estudantes da Pós-Graduação foram integrados com os da graduação, tanto na apresentação oral como pôster.
				</li>
			</ul> Em 2014 a PUCPR sediou o 3ª Congresso Sul Brasileiro de Iniciação Científica e Pós-Graduação, com representantes de Universidades do Paraná, Santa Catarina e Rio Grande do Sul. 
			</td>
		</tr>
		<tr>
			<td colspan=2>
			<div id="colCenter">
				<h1>Seminário de Iniciação Científica - SEMIC</h1>
				<p>
					<strong>O Evento</strong>
					<br />
					O Seminário de Iniciação Científica (SEMIC) é realizado anualmente, com o objetivo de permitir aos bolsistas do PIBIC a apresentação dos resultados da pesquisa. O evento é de participação obrigatória por bolsistas e orientadores e é avaliado pelo CNPq. Simultaneamente ao Seminário, é realizada a Mostra de Pesquisa, com apresentação de trabalhos de pesquisa de estudantes de Iniciação Científica Voluntária e de estudantes de pós-graduação.
				</p>
				<p></p>
				<p>
					<strong>Histórico SEMIC</strong>
				</p>
				<table width="100%" cellpadding="10">
				<tr align="center" valign="top">
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2014.jpg');?>" width="150"; /> <br>
					<a title="CICPG" href="http://www2.pucpr.br/reol/eventos/cicpg/" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2014 + CICPG (Congresso Sul Brasileiro de Iniciação Científica e Pós-Graduação)</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2013.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/semic2013/" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2013</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2012.jpg');?>" width="150"; /> <br>
					<a title="XX SEMIC" href="http://www2.pucpr.br/reol/semic2012/" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2012</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2011.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/SEMIC19?dd99=contact" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2011</a>
				</td>
				</tr>
				<tr align="center" valign="top">
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2010.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/semic18" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2010</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2009.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/semic17" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2009</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2008.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/PIBIC2008?dd99=" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2008</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2007.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/PIBIC2007?dd99=" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2007</a>
				</td>
				</tr>
				<tr align="center" valign="top">
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2006.jpg');?>" width="150"; /> <br>
					<a href="http://www2.pucpr.br/reol/index.php/PIBIC2006" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2006</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2005.jpg');?>" width="150"; /> <br>
					<a href="http://www.pucpr.br/pesquisa_cientifica/iniciacao_pibic/pibic/eventos/evento2005/index.html" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2005</a>
				</td>
				<td width="25%">
					<img src="<?php echo base_url('img/cnpq/semic_2004.jpg');?>" width="150"; /> <br>
					<a href="http://www.pucpr.br/pesquisa_cientifica/iniciacao_pibic/pibic/eventos/evento2004/index.html" target="_blank" style="padding: 5px; font-family: Roboto, CICPG, Arial; font-size: 13px;">Evento 2004</a>
				</td>
				</table>
			</td>
		</tr>
	</table>