<!doctype html>
<html lang="br ">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>PUCPR - SWB Experience</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/gsdk.css" rel="stylesheet"/>
		<link href="assets/css/demo.css" rel="stylesheet" />
		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<!--	Customização		-->
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body style="background-color:#a6272f;">
		<!-- Navbar will come here -->
		<nav class="nav navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button id="menu-toggle" type="button" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar bar1"></span>
						<span class="icon-bar bar2"></span>
						<span class="icon-bar bar3"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse">
					<ul  class="nav navbar-nav navbar-left">
						<li>
							<a href="https://cip.pucpr.br/eventos/swbexperience/">Home</a>
						</li>
						<li>
							<a href="#conheca">O Encontro</a>
						</li>
						<!--
						<li>
						<a href="#programacao">Programação</a>
						</li>
						<li>
						<a href="#reports">Reports</a>
						</li>
						<li>
						<a href="#contatos">Contato</a>
						</li>
						-->
					</ul>
					<ul  class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="assets/img/flags/BR.png" data-pin-nopin="true"> Português<span class="caret"></span></a>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"> <img src="assets/img/flags/US.png">English </a>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
		</nav>
		<!-- end navbar -->
		<div class="wrapper">
			<!--Banner-->
			<div class="container">
				<div class="parallax">
					<div class="parallax-image">
						<img src="img/banner.png" width="960">
					</div>
				</div>
			</div>
				
			<!--Section Inscrições
			<div class="container-fluid" style="background-color:#7a282e;">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2 style="color:#fff; margin: 30px 0 30px;">Inscreva-se pelo site até o </br>
							dia <strong>06 de Novembro</strong></h2>
						</div>
						<div class="col-md-6">
							<h2 style="margin: 43px 0 30px;">
							<button href="#" class="btn btn-block btn-lg btn-info" style="color:#fff; border-color:#fff;">
								Inscreva-se
							</button></h2>
						</div>
					</div>
				</div>
			</div>
			-->
			
			<!--Section 1-->
			<div class="section">
				<div class="container" >
					<div class="row">
						<div class="col-md-6 pull-left">
							<h2 style="color:#a6272f; padding-left:10px;"><strong><a name="conheca" > Conheça</a> </strong>
							<br/>o encontro</h2>
							<br/>
							<p>
								Este evento traz a oportunidade de encontro de todos os estudantes bolsistas do Ciência sem Fronteiras da PUCPR que já retornaram para PUCPR, criando um espaço para compartilhar experiências, relembrar das coisas boas da viagem.
								<br/>
								<br/>
								A PUCPR também quer saber dos bolsistas quais foram as melhores experiências que tiveram na Universidade Destino, bem como as experiências ruins.
								<br/>
								<br/>
								Você tem alguma sugestão de coisas que viu lá fora e acha que seria ótimo e viável ter na PUCPR? Ter no seu curso de graduação? Ou vivenciou algum problema que poderia ter sido evitado?
							</p>
						</div>
						<div class="col-md-6 pull-right">
							<img src="img/img_01.png">
						</div>
					</div>
				</div>
			</div>
			<!--Section 2-->
			<div class="section">
				<div class="container">
					<div class="well well-lg" style="border:none; background-color:#a6272f; border-radius:8px;">
						<div class="row">
							<div class="col-md-3">
								<img src="img/palestrante.png">
							</div>
							<div class="col-md-9">
								<h2 style="color:#fff;"><strong>Alex Anton,</strong>
								<br/>
								o palestrante</h2>
								<p  style="color:#fff;">
									Co-fundador de uma empresa de consultoria de admissões criativas e bem-sucedidas que ajuda os brasileiros a alcançar seus sonhos de estudar em melhores escolas do mundo. Focado em estratégia e melhoria operacional, iniciativas de liderança em indústrias. Também altamente interessados em educação, tecnologia e desenvolvimento de liderança. Director of membership of Harvard Business School Club of Brazil.
								</p>
								<br/>
								<p>
									<a class="btn btn-default" href="#" role="button" style="color:#fff; border-color:#fff;">Linkedin</a>
								<p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="toTop" style="display: none;">
			^ <?php echo msg('back');?>
		</div>
	</body>
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<!--  Plugins -->
	<script src="assets/js/gsdk-checkbox.js"></script>
	<script src="assets/js/gsdk-morphing.js"></script>
	<script src="assets/js/gsdk-radio.js"></script>
	<script src="assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="assets/js/bootstrap-select.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/chartist.min.js"></script>
	<script src="assets/js/jquery.tagsinput.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="assets/js/get-shit-done.js"></script>
</html>