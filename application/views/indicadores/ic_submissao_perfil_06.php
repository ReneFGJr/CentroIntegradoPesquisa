<link rel="stylesheet" type="text/css" href="/css/result-light.css">
<script type='text/javascript'>
	$(function() {
		$('#subm_ano_perf_6').highcharts({
			chart : {
				plotBackgroundColor : null,
				plotBorderWidth : 0,
				plotShadow : false,
				backgroundColor : '#EEEEEE'
			},
			title : {
				text : 'Planos<br>Titulação Docentes',
				align : 'center',
				verticalAlign : 'middle',
				y : 50
			},
			tooltip : {
				pointFormat : '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions : {
				pie : {
					dataLabels : {
						enabled : true,
						distance : -50,
						style : {
							fontWeight : 'bold',
							color : 'white',
							textShadow : '0px 1px 2px black'
						}
					},
					startAngle : -90,
					endAngle : 90,
					center : ['50%', '60%']
				}
			},
			series : [{
				type : 'pie',
				name : 'Titulaão',
				innerSize : '50%',
				data : [['Doutores SS', 45.0], ['Doutores', 26.8], ['Mestres', 12.8], ['Doutorandos', 8.5], ['Pós-Doutorandos', 6.2]]
			}]
		});
	});
	//]]>
</script>