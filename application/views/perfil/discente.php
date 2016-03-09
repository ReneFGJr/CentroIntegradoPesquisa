<?php
$us_nada = '<font color="grey">[em construção]</font>';
if (!isset($us_nome))
	{
		echo 'Código inválido ou não localizado';
	} else {
?>
<table id="cabecalho-user-perfil" class="info-pessoais" border=0>
	<TR valign="top">
		<TD width="150">
		<?php echo $img_blacklist;?>	
		<div id="foto-perfil"><IMG SRC="http://www2.pucpr.br/reol/cip/img/no_photo.jpg" border=0 width="130" class="foto-perfil">
		</div><?php echo $editar_blacklist;?><TD>
		<div id="nome-dados-perfil">
			<li class="lt5">
				<B><?php echo $us_nome;?>&nbsp;</B><?php echo $ghost;?><strong>
			</li>
			<li>
				CPF: <?php echo mask_cpf($us_cpf);?>
			</li>
			<li>
				<?php echo $email;?>
				<BR>
			</li>
			<li class="lt1">
				Data Nascimento <?php echo stodbr($us_dt_nascimento);?>
				- <?php echo $us_idade;?>
			</li>
			<li>
				<?php echo $us_curso_vinculo;?>
			</li>
			<li></li>
			<li>
				<?php
				if (strlen($us_link_lattes) > 0) {
					echo '<a href="' . $us_link_lattes . '" target="new"><img src="' . base_url('img/icon/icone_lattes.png') . '" height="26" border=0></a>';
				}
				?>
			</li>
			<li>
				<?php echo $us_cc;?>
			</li>
			<li>
				<?php echo $us_ic_pagamento;?>
			</li>
		</div><TD width="300">
		<div id="info-pesquisador" class="info-pesquisador lt1">
			<span class="lt2 titulo-info-pesquisador">Informaçães do Pesquisador</span>
			<br />
			<br />
			<li>
				<strong>Crachá / EmployerID:</strong><?php echo $us_cracha;?>
				/ <?php echo $us_emplid;?>
			</li>
			<li>
				<strong>Genero:</strong><?php echo $us_genero;?>
			</li>
			<li>
				<strong>Maior titulação:</strong><?php echo $ust_titulacao_sigla;?>
			</li>
			<li>
				<strong>Curso:</strong><?php echo $us_curso_vinculo;?>
			</li>
			<li>
				<strong>Centro:</strong><?php echo $us_nada;?>
			</li>
			<li>
				<strong>Escola:</strong><?php echo $us_nada;?>
			</li>
			<li>
				<strong>Instituição:</strong><?php echo $ies_sigla;?>
			</li>
			<li>
				<strong>Dados Atualizados:</strong><?php echo stodbr($us_dt_update_cs);?>
			</li>
			<li>
				<strong><?php echo $editar;?>
			</li>
		</div>
</table>
<!-- Iniciacao cientifica -->
<div id="pagamentos"></div>
<script>
	function mostra_pagamentos_ic()
{
var $url = "<?php echo base_url('index.php/ic/pagamento_cracha/' . $us_cracha . '/' . checkpost_link($us_cracha));?>
	";
	var $div = "#pagamentos";
	$.ajax($url)
	.done(function(data) {
	$($div).html(data);
	})
	.fail(function() {
	alert( "error" );
	});
	}
</script>
<?php } ?>
