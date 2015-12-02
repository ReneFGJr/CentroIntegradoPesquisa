<script type="text/javascript">
	$(function() {
		$('#container-1').highcharts({
			chart : {
				plotBackgroundColor : null,
				plotBorderWidth : 0,
				plotShadow : false
			},
			title : {
				text : '<?php echo $title;?>',
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
						distance : -10,
						style : {
							fontWeight : 'bold',
							color : 'white',
							textShadow : '0px 1px 2px black'
						}
					},
					startAngle : 0,
					endAngle : 360,
					center : ['50%', '75%']
				}
			},
			series : [{
				type : 'pyramid',
				name : 'Browser share',
				innerSize : '50%',
				data : [<?php echo $data;?>, {
					name : 'Others',
					y : 0.7,
					dataLabels : {
						enabled : false
					}
				}]
			}]
		});
	});
</script>
<div id="container-1" style="border: 5px solid #00000; min-width: 410px; height: 250px; max-width: 510px; margin: 0 auto"></div>
