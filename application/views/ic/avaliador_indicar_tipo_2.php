<?php
if (!isset($tipo))
	{
		echo '<span class="danger lt4">$tipo não informado</span>';
		return('');
	}
?>
<h1>Indicar avaliador - <?php echo msg('avaliacao_'.$tipo);?></h1>
<form method="post">
	<input type="submit" value="Indicar >>>" name="acao" class="btn btn-primary btn-lg">
	<!-- tipo de protocolo -->
	<input type="hidden" value="RFIN" name="dd1">
<h3><?php echo msg('ic_avaliador_indicar'); ?></h3>
<?php echo $sa; ?>
</form>