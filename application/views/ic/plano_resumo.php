<fieldset>
	<legend>Resumo / Abstract</legend>
	<?php
	if (isset($resumo))
		{
			
		} else {
			echo '<font class="error">'.msg('nao_postado').'</font>';
			echo ' | ';
			echo '<a href="'.base_url('index.php/ic/postar_resumo/'.$id_ic.'/'.checkpost_link($id_ic)).'" class="link lt0">postar resumo</A>';		
		}
	
	?>
</fieldset>