<style>
	body {
		margin-left: 20px;
		margin-top: 20px;
	}
</style>
<form method="post">
	e-mail:
	<input type="text" name="dd1" value="<?php echo $email;?>" class="form_string" style="width:320px;">
	<input type="submit" name="acao" value="<?php echo $bt_acao;?>" class="botao3d back_green_shadown back_green" >
</form>
<?php
if (strlen($bt_excluir) > 0)
{
?>
<form method="post">
	<input type="submit" name="acao" value="<?php echo $bt_excluir;?>" class="botao3d back_red_shadown back_red" >
</form>
<?php
}
?>
