<?php
if (!isset($tipo))
	{
		echo '<span class="danger lt4">$tipo não informado</span>';
		return('');
	}
?>
<h1>Indicar avaliador - <?php echo msg('avaliacao_'.$tipo);?></h1>
<form method="post">
	<input type="submit" value="Indicar >>>" name="acao" class="botao3d">
	<input type="hidden" value="RPAR" name="dd1">
<h3><?php echo msg('ic_avaliador_indicar'); ?></h3>
<?php echo $sa; ?>
</form>