<?php
$data = '';
if (strlen($l1) > 0) { $data .= "['$l1 ($v1)', $v1]"; }
if (strlen($l2) > 0) { $data .= ", ['$l2 ($v2)', $v2]"; }
if (strlen($l3) > 0) { $data .= ", ['$l3 ($v3)', $v3]"; }
?>
<link rel="stylesheet" type="text/css" href="/css/result-light.css">
<script type='text/javascript'>
	$(function() {
		$('#<?php echo $frame;?>').highcharts({
			chart : {
				plotBackgroundColor : null,
				plotBorderWidth : 0,
				plotShadow : false,
				backgroundColor : '#EEEEEE'
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
				name : 'Percentual',
				innerSize : '50%',
				data : [<?php echo $data;?>],
			}]
		});
	});
	//]]>
</script>