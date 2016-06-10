<div style="border: 2px solid #ff8080; padding: 20px;" class="alert-danger">
<form methos="post">
<table width="100%" class="border0 lt3">
	<tr><td class="lt5">Confirmação de Envio</td></tr>
	<tr><td>Prezado professor, 
			<br><br>
			Para finalizar o processo de envio da atividade é necessário confirmar pressionando o botão "<?php echo msg('bt_submit_confirm');?>". Após pressionado não será mais possível alteração.
			<br><br>
		</td></tr>
	<tr><td><input type="submit" name="acao" value="<?php echo msg('bt_submit_confirm');?>" class="btn btn-primary"></td></tr>
	
</table>
<input type="hidden" value="FINISH" name="dd2">
</form>
</div>