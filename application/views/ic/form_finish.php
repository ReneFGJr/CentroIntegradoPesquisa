<div style="border: 2px solid #ff8080; padding: 20px;" class="alert-danger">
<form methos="post">
<table width="100%" class="border0 lt3">
	<tr><td class="lt5">Confirma��o de Envio</td></tr>
	<tr><td>Prezado professor, 
			<br><br>
			Para finalizar o processo de envio da atividade � necess�rio confirmar pressionando o bot�o "<?php echo msg('bt_submit_confirm');?>". Ap�s pressionado n�o ser� mais poss�vel altera��o.
			<br><br>
		</td></tr>
	<tr><td><input type="submit" name="acao" value="<?php echo msg('bt_submit_confirm');?>" class="btn btn-primary"></td></tr>
	
</table>
<input type="hidden" value="FINISH" name="dd2">
</form>
</div>