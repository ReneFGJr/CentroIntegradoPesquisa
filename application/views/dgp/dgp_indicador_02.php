<script type="text/javascript">
	$(function() {
		$('#container-2').highcharts({
			chart : {
			},
			title : {
				text : '<?php echo $title;?>',
				align : 'center',
				verticalAlign : 'top',
				y : 10
			},
			tooltip : {
				pointFormat : '{point.y:.1f}%'
			},
        xAxis: {
            type: 'category'
        },			
        yAxis: {
            title: {
                text: 'Total Grupos de Pesquisa'
            }

        },
			series : [{
				type : 'column',
				name : 'Grupos de Pesquisa',
				data : [<?php echo $data;?>]
			}]
		});
	});
</script>
<div id="container-2" style="border: 5px solid #00000; min-width: 610px; height: 310px; max-width: 610px; margin: 0 auto"></div>
