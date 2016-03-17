<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php
$dt = '';
echo '<HR>';
print_r($dados);
$dt = '';
foreach ($dados as $key => $value) {
	if (strlen($dt) > 0) {
		$dt .= ' , ';
	}
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

echo $dt;

$data = "	{
            name: 'USSR/Russia',
            data: [null, null, null, null, null, null, null, null, null, null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
                15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
                33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
                35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000]
             }";
$data = $dt;
$title_grapho = 'T�tulo';
?>
<script>
		$(function () {
	$('#container').highcharts({
	chart: {
	type: 'area'
	},
	title: {
	text: '<?php echo $title_grapho; ?>
		'
		},
		subtitle: {
		text: 'Source: <a href="http://cip.pucpr.br">' +
		'cip.pucpr.br</a>'
		},
		xAxis : {
		categories : ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
		},
		xAxis: {
		allowDecimals: false,
		labels: {
		formatter: function () {
		return this.value; // clean, unformatted number for year
		}
		}
		},
		yAxis: {
		title: {
		text: 'Nuclear weapon states'
		},
		labels: {
		formatter: function () {
		return this.value / 1000 + 'k';
		}
		}
		},
		tooltip: {
		pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
		},
		plotOptions: {
		area: {
		marker: {
		enabled: false,
		symbol: 'circle',
		radius: 2,
		states: {
		hover: {
		enabled: true
		}
		}
		}
		}
		},
		series: [
	<?php echo $data; ?>
		]
		});
		});
</script>