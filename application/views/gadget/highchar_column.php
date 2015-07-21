<?php
$dados = '';
foreach ($dado as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		$('#<?php echo $gr_frame;?>').highcharts({//alterar nome da div para cada grafico
			chart : {
				type : 'column'
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
					rotation : -45,
					style : {
						fontSize : '7px',
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
			tooltip : {
				pointFormat : '<b>{point.y:.0f}</b> Estudantes'
			},
			series : [{
				name : '<?php echo $gr_y;?>',
				data : [<?php echo "$dados" ?>],
				dataLabels : {
					enabled : true,
					rotation : 0,
					color : '#FFFFFF',
					align : 'right',
					format : '{point.y:.0f}', // no decimal in number, format for inbteger
					y : 3, // 3 pixels down from the top
					style : {
						fontSize : '10px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
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
