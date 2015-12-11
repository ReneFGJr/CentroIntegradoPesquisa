	<?php
	if (isset($title))
		{
			echo '<h1>'.$title.'</h1>';
		}
?>
<center>
<h1><font style="color: green">Processo finalizado com sucesso!</font></h1>
<br>
	<?php
	if (isset($volta))
		{
			echo '<a href="'.$volta.'" class="botao3d back_grey_shadown back_grey" style="width: 80px; text-align: center;">VOLTAR</a>';
		}
	?>

</center>