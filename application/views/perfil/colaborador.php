	<?php
$us_nada = '<font color="blue">[em construção]</font>';
?>
<table id="cabecalho-user-perfil" class="info-pessoais" border=0>
			<TR valign="top">
			<TD width="150">
			<div id="foto-perfil"><IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="130" class="foto-perfil"></div>
			<TD>
			<div id="nome-dados-perfil">
				<li class="lt5"><B><?php echo $us_nome; ?>&nbsp;</B></li>
				<li>CPF: <?php echo $us_cpf; ?> </li>
				<li><?php echo $email;?> <BR>
				<li></li>
				<?php
				if (strlen($us_lattes) > 0)
					{
						echo '<li><a href="'.$us_lattes.'" target="new"><img src="http://www2.pucpr.br/reol/img/icone_plataforma_lattes.png" height="35" border=0></li>';
					}
				?>			
			</div>
			<TD width="300">
			<div id="info-pesquisador" class="info-pesquisador lt1">
				<span class="lt2 titulo-info-pesquisador">Informaçães do Pesquisador</span><br /><br />
				<li><strong>Crachá / EmployerID:</strong> <?php echo $us_cracha;?> / <?php echo $us_emplid;?></li>
				<li><strong>Genero:</strong> <?php echo $us_genero;?></li>
				<li><strong>Maior titulação:</strong> <?php echo $ust_titulacao_sigla;?> </li>
				<li><strong>Dados Atualizados:</strong> <?php echo stodbr($us_dt_updat_drh);?></li>				
			</div>	
			</table>