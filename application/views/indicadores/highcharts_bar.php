<?php
$title = 'Submissões nos programas de Iniciação Científica da PUCPR';
$categorias = "'PIBIC', 'PIBITI', 'PIBIC_EM', 'IC Internacional'";
?>
<link rel="stylesheet" type="text/css" href="/css/result-light.css">
<script type='text/javascript'>
	$(function() {
		$('#submissoes_ano').highcharts({
			chart : {
				type : 'column',
				backgroundColor : '#EEEEEE'
			},
			title : {
				text : '<?php echo $title;?>'
			},
			subtitle : {
				text : 'Source: cip.pucpr.br'
			},
			xAxis : {
				categories : [<?php echo $categorias;?>],
				crosshair : true,
				labels : {
					rotation : -45,
					style : {
						fontSize : '13px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			},
			yAxis : {
				min : 0,
				title : {
					text : 'Total de Submissões'
				},
				labels : {
					style : {
						fontSize : '13px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			},
			tooltip : {
				headerFormat : '<span class="lt1">{point.key}</span><table>',
				pointFormat : '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td class="lt0" style="padding:0"><b>{point.y:.1f} planos</b></td></tr>',
				footerFormat : '</table>',
				shared : true,
				useHTML : true
			},
			plotOptions : {
				column : {
					pointPadding : 0.1,
					borderWidth : 0
				}
			},
			bar : {
				dataLabels : {
					enabled : false
				}
			},
			series : [{
				name : '2012',
				color : '#990000',
				data : [1069, 128, 22, 0]

			}, {
				name : '2013',
				color : '#992222',
				data : [1153, 136, 11, 0]

			}, {
				name : '2014',
				color : '#994444',
				data : [1349, 152, 52, 28]

			}, {
				name : '2015',
				color : '#FFA500',
				data : [1243, 188, 28, 0]

			}]
		});
	});
	//]]>
</script>