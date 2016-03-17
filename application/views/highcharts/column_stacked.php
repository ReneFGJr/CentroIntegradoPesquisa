<?php

$dt = '';
$label = '';
foreach ($dados as $key => $value) {
	if (strlen($dt) > 0) {
		$dt .= ' , ';
	}
	if (strlen($label) > 1)
		{
			$label .= ', ';
		}
	$label .= "'".$key."' ";
	$dt .= '{
		name: \'' . $key . '\',
		data: [';
	$dd = $value;
	$a = 0;
	foreach ($dd as $key2 => $value2) {
		if ($a > 0) { $dt .= ', ';
		}
		$dt .= $value2 . ' ';
		$a++;
	}
	$dt .= ']}';
}
$label .= '';
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="grapho_cs" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>
	$(function() {
		$('#grapho_cs').highcharts({
			chart : {
				type : 'column'
			},
			title : {
				text : 'Stacked column chart'
			},
			xAxis : {
				categories : [<?php echo $label;?>]
			},
			yAxis : {
				min : 0,
				title : {
					text : 'Total fruit consumption'
				},
				stackLabels : {
					enabled : true,
					style : {
						fontWeight : 'bold',
						color : (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
					}
				}
			},
			legend : {
				align : 'right',
				x : -30,
				verticalAlign : 'top',
				y : 25,
				floating : true,
				backgroundColor : (Highcharts.theme && Highcharts.theme.background2) || 'white',
				borderColor : '#CCC',
				borderWidth : 1,
				shadow : false
			},
			tooltip : {
				headerFormat : '<b>{point.x}</b><br/>',
				pointFormat : '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
			},
			plotOptions : {
				column : {
					stacking : 'normal',
					dataLabels : {
						enabled : true,
						color : (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
						style : {
							textShadow : '0 0 3px black'
						}
					}
				}
			},
			series : [<?echo $dt;?>]
		});
	}); 
</script>