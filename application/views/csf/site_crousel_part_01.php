
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide" src="<?php echo base_url('img/evento/csf/photo-99.jpg');?>" alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo msg('csf_banner_01_a');?></h1>
					<p>
						<?php echo msg('csf_banner_01_b');?>
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/indicadores');?>" role="button"><?php echo msg('csf_banner_bt_1');?></a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slidee" src="<?php echo base_url('img/evento/csf/photo-55.jpg');?>" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo msg('csf_banner_01_c');?></h1>
					<p>
						<?php echo msg('csf_banner_01_d');?>
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/depoimentos');?>" role="button"><?php echo msg('csf_banner_bt_2');?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-chevron-left"></i></span> <!-- <span class="sr-only">Anterior</span> --> </a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-chevron-right"></i></span> <!-- <span class="sr-only">Próximo</span> --> </a>
</div><!-- /.carousel -->