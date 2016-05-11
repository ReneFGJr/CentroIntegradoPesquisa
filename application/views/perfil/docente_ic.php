<?php
$us_nada = '<font color="grey">[em construção]</font>';
$perfil_completo_ver = '';
if (isset($ver_perfil)) {
	if ($ver_perfil == 1) {
		$perfil_completo_ver = '
			<li class="nopr">
				<a href="' . base_url('index.php/usuario/profile/' . $id_us . '/' . checkpost_link($id_us)) . '" class="btn">ver perfil completo</a>
			</li>';
	}
}

if (!isset($area_avaliacao_nome)) { $area_avaliacao_nome = 'não definida';
}
?>
<table id="cabecalho-user-perfil" class="info-pessoais" border=0>
	<TR valign="top">
		<TD width="150">
		<?php echo $img_blacklist;?>	
		<div id="foto-perfil"><IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="130" class="foto-perfil">
		</div><?php echo $editar_blacklist;?><TD>
		<div id="nome-dados-perfil">
			<li class="lt5">
				<B><?php echo $us_nome;?>
			</li>
			<li><?php echo $ies_sigla; ?></li>
			<?php
			if ($ss > 0) {
				echo '<li><i>' . msg('stricto sensu') . '</i></li>';
			}
			?>
			</li>
			<li></li>
			<li>
				<?php
				if (strlen($us_link_lattes) > 0) {
					echo '<a href="' . $us_link_lattes . '" target="new"><img src="' . base_url('img/icon/icone_lattes.png') . '" height="26" border=0></a>';
				}
				?>
			</li>
			<?php echo $perfil_completo_ver;?>
		</div><TD width="300">
		<div id="info-pesquisador" class="info-pesquisador lt1">
			<span class="lt2 titulo-info-pesquisador">Informaçães do Pesquisador</span>
			<br />
			<br />
			<li>
				<strong>Genero:</strong><?php echo $us_genero;?>
			</li>
			<li>
				<strong>Maior titulação:</strong><?php echo $ust_titulacao_sigla;?>
			</li>
			<li>
				<strong>Regime:</strong><?php echo $us_regime;?>
			</li>
			<li>
				<strong>Curso:</strong><?php echo $us_curso_vinculo;?>
			</li>
			<li>
				<strong>Centro:</strong><?php echo $us_campus_vinculo;?>
			</li>
			<li>
				<strong>Escola:</strong><?php echo $es_escola;?>
			</li>
			<?php
			if ($ss > 0) {
				echo '<li><strong>Stricto Sensu:</strong> ' . msg('sim') . '</li>';
			}
			?>
			<?php
			if (strlen($bpn_bolsa_descricao) > 0)
				echo '<li><strong>Bolsa produtividade:</strong> ' . $bpn_bolsa_descricao . '</li>';
			?>
			<li>
				<strong>Carga horária:</strong> <?php echo $ush_total;?>
				horas
			</li>
		</div>
</table>
</br> </br>