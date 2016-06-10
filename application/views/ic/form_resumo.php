<?php

?>
<form method="post">
<h1>Resumo (em Portugues)</h1>
<table width="100%" class="tabela01">
	<tr>
		<td>
			<b>Introdução</b><br>
			<textarea name="dd10" id="dd10" rows=4 style="width: 100%"><?php echo get("dd10");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Objetivo(s):</b><br>
			<textarea name="dd11" id="dd11" rows=4 style="width: 100%"><?php echo get("dd11");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Metodologia</b><br>
			<textarea name="dd12" id="dd12" rows=4 style="width: 100%"><?php echo get("dd12");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Resultados</b><br>
			<textarea name="dd13" id="dd13" rows=4 style="width: 100%"><?php echo get("dd13");?></textarea>
		</td>
	</tr>			
	<tr>
		<td>
			<b>Conclusão</b><br>
			<textarea name="dd14" id="dd14" rows=4 style="width: 100%"><?php echo get("dd14");?></textarea>
		</td>
	</tr>		
	<tr>
		<td>
			<b>Palavras-chave (separadas por ponto e virgula ";")</b><br>
			<input type="text" name="dd15" id="dd15" style="width: 100%" value="<?php echo get("dd15");?>">
		</td>
	</tr>		
</table>

<h1>Abstract (em Inglês)</h1>
<table width="100%" class="tabela01">
	<tr>
		<td>
			<b>Introdução</b><br>
			<textarea name="dd20" id="dd20" rows=4 style="width: 100%"><?php echo get("dd20");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Objetivo(s):</b><br>
			<textarea name="dd21" id="dd21" rows=4 style="width: 100%"><?php echo get("dd21");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Metodologia</b><br>
			<textarea name="dd22" id="dd22" rows=4 style="width: 100%"><?php echo get("dd22");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Resultados</b><br>
			<textarea name="dd23" id="dd23" rows=4 style="width: 100%"><?php echo get("dd23");?></textarea>
		</td>
	</tr>			
	<tr>
		<td>
			<b>Conclusão</b><br>
			<textarea name="dd24" id="dd24" rows=4 style="width: 100%"><?php echo get("dd24");?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<b>Keywords (separadas por ponto e virgula ";")</b><br>
			<input type="text" name="dd25" id="dd25" style="width: 100%" value="<?php echo get("dd25");?>">
		</td>
	</tr>				
</table>

<input type="submit" value="Enviar >>>" name="acao" class="btn btn-primary">
</form>
