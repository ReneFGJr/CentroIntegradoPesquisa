<?php
require ('cab.php');
?>
<?php
require ('componentes/headerpuc.php');
?>
<body>
	<div class="navbar-wrapper">
		<div class="container">
			<?php
			require ('componentes/nav.php');
			?>
			<div class="page-header">
				<h1>Estudantes por curso e institui��o</h1>
			</div>
			<div class="container">
				<p>
					Voltar para <a href="http://www2.pucpr.br/reol/cienciasemfronteiras/indicadores.php">indicadores</a>
				</p>
			</div>
			<br>
			<?php
			require ('index_curso.php');
			?>
			<!-- FOOTER -->
			<?php
			require ('componentes/footer.php');
			?>
		</div><!-- /.container -->
	</div>
	</div>
</body>
</html>