<?php
$us_nada = '<font color="grey">[em construção]</font>';
if (!isset($lattes_link_update)) { $lattes_link_update = ''; }
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
				<?php echo $us_contatos;?>
			</li>
			<li>
				<?php echo $ies_sigla;?>
			</li>
			<li>
				<?php echo $email;?>				
			</li>
			<li></li>
			<li>
				<?php
				if (strlen($us_link_lattes) > 0)
					{
						echo '<a href="'.$us_link_lattes.'" target="new"  title="Atualizado em '.stodbr($us_lattes_update).'"><img src="'.base_url('img/icon/icone_lattes.png').'" height="26" border=0 ></a>';
					}
				?>
			<?php echo $lattes_link_update; ?>			
			</li>
		</div><TD width="300">
		<div id="info-pesquisador" class="info-pesquisador lt1">
			<span class="lt2 titulo-info-pesquisador">Informaçães do Avaliador</span>
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
			<?php if (strlen($bpn_bolsa_descricao) > 0)
				echo '<li>
						<strong>Bolsa produtividade:</strong> '.$bpn_bolsa_descricao.'
					 </li>';
			?>
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