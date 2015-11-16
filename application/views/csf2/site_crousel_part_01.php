
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
					<h1>Somos 421 alunos CsF PUCPR pelo mundo.</h1>
					<p>
						Saiba mais sobre os nossos bolsistas.
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/indicadores');?>" role="button">Ver indicadores</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slidee" src="<?php echo base_url('img/evento/csf/photo-55.jpg');?>" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Depoimento dos interc�mbistas CsF da PUCPR.</h1>
					<p>
						Veja o que os estudantes da PUCPR est�o falando sobre o <i>Ci�ncia sem Fronteiras</i>.
					</p>
					<p>
						<a class="btn btn-lg btn-primary botao-home" href="<?php echo base_url('index.php/csf/depoimentos');?>" role="button">Ver detalhes</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-chevron-left"></i></span> <!-- <span class="sr-only">Anterior</span> --> </a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-chevron-right"></i></span> <!-- <span class="sr-only">Pr�ximo</span> --> </a>
</div><!-- /.carousel -->