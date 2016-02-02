<?php
$us_nada = '<font color="blue">[em construção]</font>';
?>
<table id="cabecalho-user-perfil" class="info-pessoais" border=0>
	<h1>Dados cadastrais do usuário</h1>
	<hr size="10" width="50%" align="left" noshade>
	<TR valign="top">
		<TD width="80">
			<div id="foto-perfil-2">
				<IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="80" class="foto-perfil">
			</div>
		</TD>
		<TD>
			<div id="nome-dados-perfil">
				<li class="lt5"> 
					<B><?php echo $us_nome;?>&nbsp;</B>
				</li>
				<li>
					CPF: <?php echo mask_cpf($us_cpf);?>
				</li>
				<li>
					<?php echo  $email;?>
					<BR>
				<li></li>
				<?php
				if (strlen($us_link_lattes) > 0) {
					echo '<li><a href="' . $us_link_lattes . '" target="new"><img src="http://www2.pucpr.br/reol/img/icone_plataforma_lattes.png" height="35" border=0></li>';
				}
				?>
			</div>
		</TD>
		<TD width="400" >
			<div id="info-pesquisador" class="info-pesquisador lt1" style="border:1px #333 solid; border-radius: 10px;">
				<span class="lt2 titulo-info-pesquisador">Informações do Usuario</span>
				<br />
				<br />
				<li>
					<strong>Crachá / EmployerID:</strong><?php echo $us_cracha;?>
					/ <?php echo $us_emplid;?>
				</li>
				<li>
					<strong>Genero: </strong><?php echo $us_genero;?>
				</li>
				<!--
				<li>
					<strong>Link Lattes: </strong> <a href="<?php echo $us_link_lattes;?>" target="new">Acessar <i>Lattes</i></a>
				</li>
				-->
				<li>
					<strong>Data de Nasc.: </strong><?php echo stodbr($us_dt_nascimento);?>
				</li>
			</div>
		</TD>
</table>
<hr size="10" width="100%" align="left" noshade>