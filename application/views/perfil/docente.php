<?php
$us_nada = '<font color="grey">[em construção]</font>';
?>
<table id="cabecalho-user-perfil" class="info-pessoais" border=0>
	<TR valign="top">
		<TD width="150">
		<div id="foto-perfil"><IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="130" class="foto-perfil">
		</div><TD>
		<div id="nome-dados-perfil">
			<li class="lt5">
				<B><?php echo $us_nome;?>&nbsp;</B>
			</li>
			<li>
				CPF: <?php echo mask_cpf($us_cpf);?>
			</li>
			<li>
				<?php echo $us_nada;?>
			</li>
			<li>
				<?php echo $us_nada;?>
			</li>
			<li>
				<?php echo $email;?>
				<BR>
				<?php echo $us_nada;?>
			</li>
			<li></li>
			<li>
				<a href="<?php echo $us_lattes;?>" target="new"><img src="http://www2.pucpr.br/reol/img/icone_plataforma_lattes.png" height="35" border=0>
			</li>
		</div><TD width="300">
		<div id="info-pesquisador" class="info-pesquisador lt1">
			<span class="lt2 titulo-info-pesquisador">Informaçães do Pesquisador</span>
			<br />
			<br />
			<li>
				<strong>Crachá / EmployerID:</strong> <?php echo $us_cracha;?>
				/ <?php echo $us_emplid;?>
			</li>
			<li>
				<strong>Genero:</strong> <?php echo $us_genero;?>
			</li>
			<li>
				<strong>Maior titulação:</strong> <?php echo $ust_titulacao_sigla;?>
			</li>
			<li>
				<strong>Regime:</strong> <?php echo $us_regime;?>
			</li>
			<li>
				<strong>Curso:</strong> <?php echo $us_curso_vinculo;?>
			</li>
			<li>
				<strong>Centro:</strong> <?php echo $us_campus_vinculo;?>
			</li>
			<li>
				<strong>Escola:</strong> <?php echo $us_escola_vinculo;?>
			</li>
			<li>
				<strong>Stricto Sensu:</strong> <?php echo $us_ss;?>
			</li>
			<li>
				<strong>Bolsa produtividade:</strong> <?php echo $us_nada;?>
			</li>
			<li>
				<strong>Carga horária:</strong> <?php echo $ush_total;?>
				horas
			</li>
			<li>
				<strong>Dados Atualizados:</strong> <?php echo stodbr($us_dt_update_cs);?>
			</li>
			<li><strong><?php echo $editar;?></li>
		</div>
</table>
</br>
</br>