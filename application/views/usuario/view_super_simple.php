<table id="table" width="100%">
	<TR valign="top">
		<TD width="80">
		<div id="foto-perfil-2">
			<IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="80" class="foto-perfil">
		</div></TD>
		<TD>
		<div id="nome-dados-perfil">
				<B><?php echo $us_nome; ?></B>
			<br>
			<?php echo $email; ?>
			<br>
			<?php
			if (strlen($us_link_lattes) > 0) {
				echo '<a href="' . $us_link_lattes . '" target="new"><img src="http://www2.pucpr.br/reol/img/icone_plataforma_lattes.png" height="35" border=0>';
			}
			?>
		</div></TD>
		<TD width="400" >
		<div id="info-pesquisador" class="lt1">
			<span class="lt2 titulo-info-pesquisador">Informações do Usuario</span>
			<br />
			<br />
				<strong>Crachá / EmployerID:</strong><?php echo $us_cracha; ?>
				/ <?php echo $us_emplid; ?>
			<br>
				<strong>Genero: </strong><?php echo $us_genero; ?>
			<br>
				<strong>Data de Nasc.: </strong><?php echo stodbr($us_dt_nascimento); ?>
		</div></TD>
</table>
