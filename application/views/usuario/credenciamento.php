<form method="post">
<table width="60%" align="center">
	<tr class="lt4" valign="top">
		<td colspan=2>Credencimaneto de Usuário</td>
		<td rowspan=20 align="center">
			<?php echo $pr;?>
		</td>
	</tr>
	<tr>
		<td class="lt0">Nome completo</td>
		<td><input type="text" name="dd1" id="dd1" class="form_string" value="<?php echo $nome;?>"></td>
	</tr>
	<tr>
		<td class="lt0">Cracha (PUCPR)</td>
		<td><input type="text" name="dd2" id="dd2" class="form_string" value="<?php echo $cracha;?>"style="width: 320px;"></td>
	</tr>	
	<tr>
		<td class="lt0"></td>
		<td><input type="checkbox" name="dd12" id="dd12" value="1">Gerar Cracha (Fictício)</td>
	</tr>		
	<tr>
		<td class="lt0">CPF (opcional)</td>
		<td><input type="text" name="dd3" id="dd3" class="form_string" value="<?php echo $cpf;?>"style="width: 320px;"></td>
	</tr>
	<tr>
		<td class="lt0"></td>
		<td><input type="checkbox" name="dd13" id="dd13" value="1">Gerar CPF (Fictício)</td>
	</tr>		
	<tr>
		<td class="lt0">e-mail</td>
		<td><input type="text" name="dd10" id="dd10" class="form_string"value="<?php echo $email;?>"></td>
	</tr>	
	<tr>
		<td><input type="submit" value="cadastrar" name="acao" id="acao" class="form_submit"></td>
	</tr>	
	<tr>
		<td class="lt4" colspan=2><?php echo $msg;?></td>
	</tr>
</table>
</form>
