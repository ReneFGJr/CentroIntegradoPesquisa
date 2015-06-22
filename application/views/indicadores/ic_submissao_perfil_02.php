<link rel="stylesheet" type="text/css" href="/css/result-light.css">
<script type='text/javascript'>
	$(function() {
		$('#subm_ano_perf_2').highcharts({
			chart : {
				plotBackgroundColor : null,
				plotBorderWidth : 0,
				plotShadow : false,
				backgroundColor : '#EEEEEE'
			},
			title : {
				text : 'Stricto Sensu',
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
				name : 'Browser share',
				innerSize : '50%',
				data : [['Stricto Sensu', 65.0], ['Graduação', 26.8]]
			}]
		});
	});
	//]]>
</script>