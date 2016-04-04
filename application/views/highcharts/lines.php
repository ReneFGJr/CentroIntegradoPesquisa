<script>
$(function () {
    $('#container_line').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: <?php echo $source;?>',
            x: -20
        },
        xAxis: {
            categories: <?php echo $categorias;?>
        },
        yAxis: {
            title: {
                text: '<?php echo $unidade;?>'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'artigos'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [<?php echo $dados;?>]
    });
});
</script>