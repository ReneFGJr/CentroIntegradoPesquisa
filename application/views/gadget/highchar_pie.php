<?php
$dados = '';
foreach ($dado as $key => $value) {
	//$dados .= "['$key',   $value],";
	$dados .= "{ name: '$key ($value)', y: $value }, ";	
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">

	$(function() {
	    // Make monochrome colors and set them as default for all pies
	    Highcharts.getOptions().plotOptions.pie.colors = (function () {
	        var colors = [],
	            base = Highcharts.getOptions().colors[3],
	            i;
	
	        for (i = 0; i < 20; i += 1) {
	            // Start out with a darkened base color (negative brighten), and end
	            // up with a much brighter color
	            colors.push(Highcharts.Color(base).brighten((i - 8) /15).get());
	        }
	        return colors;
	    }());		
		$('#<?php echo $gr_frame;?>').highcharts({//alterar nome da div para cada grafico
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie'
	        },
			title : {
				text : '<?php echo $gr_title;?>'
			},
			subtitle : {
				text : '<?php echo $gr_title_sub;?>'
			},
			xAxis : {
				type : 'category',
				labels : {
					rotation : 0,
					style : {
						fontFamily : 'Verdana, sans-serif'
					}
				}
			},
			yAxis : {
				min : 0,
				title : {
					text : '<?php echo $gr_x;?>'
				}
			},
			legend : {
				enabled : false
			},
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
	                    }
	                }
	            }
	        },
			series : [{
				name : '<?php echo $gr_y;?>',
				data : [<?php echo "$dados" ?>],

			}]
		});
	}); 
</script>
<?php
if ($show)
	{
		echo '<div id="'.$gr_frame.'"></div>'.cr();
	}
?>
