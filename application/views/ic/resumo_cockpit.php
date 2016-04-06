<?php
		$soma = 0;
		$dados = '';
		foreach ($dado_coc as $key => $value) {
			$dados .= "['$key',   $value],";
			$soma += $value ;
		}
		//print_r($dados);
		//print_r($soma);
		
		$meta = 1200;
		$tot  = $soma;
		
		$part = $meta - $tot;
		$rest = $tot;
		$cap = 'Planos submetidos';
		
		if ($part < 0)
			{
				$part = $meta;
				$rest = $tot - $meta;
				$cap = 'Planos acima da meta';
			}
?>		 
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	  <script type="text/javascript">
	    google.load("visualization", "1", {packages:["corechart"]});
	    google.setOnLoadCallback(drawChart);
	    function drawChart() {
	      var data = new google.visualization.DataTable();
	      data.addColumn('string', 'Task');
	      data.addColumn('number', 'Hours per Day');
	      data.addRows([
						          ['<?=$cap;?>',    <?php echo $rest;?>],
						          ['Meta (<?php echo $meta;?> planos)', <?php echo $part;?>]
						      	 ]);
	      var options = {
	        title: 'Metas da Iniciação Científica '
	      };
	
	      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	      chart.draw(data, options);
	    }
	  </script>
		<div id="chart_div" style="width: 600px; height: 400px;"></div>
















<!-- Grafico HighChart
<script type="text/javascript">
	$(function() {
		//alterar nome da div para cada grafico
		$('#graf').highcharts({
			chart : {
				type : 'pie'
			},
			title : {
				text : 'Titulo Grafico:'
			},
			subtitle : {
				text : 'Top 7'
			},
			xAxis : {
				type : 'category',
				labels : {
					rotation : 0,
					style : {
						fontSize : '10px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			},
			yAxis : {
				min : 0,
				title : {
					text : 'Escala'
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
				color: '#B21120',
				data : [<?php echo "$dados" ?>],
				dataLabels : {
					enabled : true,
					rotation : 0,
					color : '#FFFFFF',
					align : 'center',
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
<div id="graf" style="width: 800px; height: 400px; margin: 0 auto padding-bottom: 8px; border: 1px solid #AF3E4D; margin-top: 150px; "></div>
<br />
--->