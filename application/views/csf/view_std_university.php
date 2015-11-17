<?php
$dados = '';
foreach ($dado_university as $key => $value) {
	$key2 = trim(substr($key,0,40));
	if ($key2 != $key)
		{
			$key2 .= '...';
		}
	$dados .= "['$key2',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		$('#graf-3').highcharts({//alterar nome da div para cada grafico
			chart : {
				//type : 'column'
				//type : 'line'
				//type : 'bar'
				//type : 'pie'
				type: 'column'
			},
			title : {
				text : 'Universidades de destino:'
			},
			subtitle : {
				text : 'Top 10'
			},
			xAxis : {
				type : 'category',
				labels : {
					rotation : -45,
					style : {
						fontSize : '10px',
						fontFamily : 'Arial, Verdana, sans-serif'
					}
				}
			},
			yAxis : {
				min : 0,
				title : {
					text : '<?php echo msg('studentes');?>'
				}
			},
			legend : {
				enabled : false
			},
			tooltip : {
				pointFormat : '<b>{point.y:.0f}</b> Estudantes'
			},
			series : [{
				name : 'Population',
				data : [<?php echo "$dados" ?>],
				dataLabels : {
					enabled : true,
					rotation : 0,
					color : '#FFFFFF',
					align : 'right',
					format : '{point.y:.0f}', // no decimal in number, format for inbteger
					y : 15, // 3 pixels down from the top
					style : {
						fontSize : '15px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			}]
		});
	}); 
</script>
<div id="graf-3" style="width: 800px; height: 400px; margin: 0 auto padding-bottom: 8px; border: 1px solid #AF3E4D; margin-top: 150px; "></div>

<br />


