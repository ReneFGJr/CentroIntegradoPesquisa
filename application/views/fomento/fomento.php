<?php
	$classAction = "index.php/Fomento/editEditalFomento.php";
?>

<html>
<head> 
</head>
<body>
  <h2> Preencha o formul�rio abaixo</h2><br />

	<form method="post" action="<?= base_url('.$classAction.') ?>" >
	
	<!-- Dados do Edital -->
		<fieldset>
			<legend> ATUALIZAR DADOS DO EDITAL </legend>	
		
		<fieldset>
			 <legend>Dados do edital</legend>
			 <table width="98%" border=0 cellpadding=5 cellspacing=2 align="center" class="lt1">
			  <TR>
				<td><?php echo msg('fm_titulo'); ?><br/>
					<textarea name="titulo"></textarea>
				</td>
				<TR>
					<td><?php echo msg('fm_titulo_email'); ?><br/>
					<textarea name="titulo"></textarea>		
				</TR>
				
				
				
				
				
				<td><?php echo msg('fm_agencia'); ?><br/>
					<textarea name="agencia"></textarea></td>
				<br/>
				<td><?php echo msg('fm_idioma'); ?><br/>
					<textarea name="idioma"></textarea></td>
				</TR>
			</table>
		</fieldset>			
					
<!-- -------------------------------------------------------------------	
					<TR>
						<td><label for="status">Status: </label></td>
						<td align="left"><input type="text" name="status"></td>

					</TR>
					<TR>	
						<td><label for="urlext">Url Externa: </label></td>
						<td align="left"><input type="text" name="urlext"></td>
					</TR>
					<TR>
						<td><label for="autor">Autor: </label></td>
						<td align="left"><input type="text" name="autor"></td>
					</TR>
					<TR>
						<td><label for="corpo">Corpo: </label></td>
						<td align="left"><input type="text" name="corpo"></td>
					</TR>
					<TR>
						<td><label for="totVisualizacoes">Total de Visualiza��es: </label></td>
						<td align="left"><input type="text" name="totVisualizacoes"></td>
					</TR>
					<TR>
						<td><label for="local">Local: </label></td>
						<td align="left"><input type="text" name="local"></td>
					</TR>
					<TR>
						<td><label><?php echo msg('fm_data_envio'); ?></label></td>
						<td align="left">
						  	<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
						  	<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
						  	<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
						 </td>
					</TR>
					<TR>
						<td><label for="login">Login: </label></td>
						<td align="left"><input type="text" name="login"></td>
					</TR>
					
					<TR>
						<td><label for="editalTipo">Edital tipo: </label></td>
						<td align="left"><input type="text" name="editalTipo"></td>
					</TR>
						
				<TR>	
				<td><label for="chamada">Chamada: </label></td>
					<td align="left"><input type="text" name="chamada"></td>
		
			  	<td><label>Data: </label></td>
				  <td align="left">
				  	<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
				  	<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
				  	<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
				  </td>
			  </TR>
			 </table>
  		
		</fieldset>	
		<br />	
		 
		<fieldset>
			 <legend>Datas</legend>
			 <table cellspacing="5">
			  <TR>
			   <td><label>Data 01: </label></td>
			   <td align="left">
			   		<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
			   		<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
			   		<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
			   </td>
			   </TR>
			   <TR>
			   <td><label>Data 02: </label></td>
			   <td align="left">
			   		<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
			   		<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
			   		<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
			   </td>	   
			   </TR>
				 <TR>	  
			   <td><label>Data 03: </label></td>
			   <td align="left">
			   		<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
			   		<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
			   		<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
			   </TR>	
			  </tr>   
			 </table>
		</fieldset>
		<br/>	
		
		
		<fieldset>
			<legend> Textos </legend>
			 <table cellspacing="2">
			 	<TR>
					<td>
						<label for="texto01">Texto 01: </label>
					</td>
						<td align="left"><input type="text" name="texto01" size="50"></td>
					<td>
					</TR>
					
					</TR>	
					<td>
						<label for="texto02">Texto 02: </label>
					</td>
						<td align="left"><input type="text" name="texto02" size="50"></td>
					<td>
					<TR>
					</TR>
					<td>
						<label for="texto03">Texto 03: </label>
					</td>
						<td align="left"><input type="text" name="texto03" size="50"></td>
					<td>
					<TR>
					</TR>
					<td>
						<label for="texto04">Texto 04: </label>
					</td>
						<td align="left"><input type="text" name="texto04" size="50"></td>
					<td>
					<TR>
					</TR>
					<td>
						<label for="texto05">Texto 05: </label>
					</td>
						<td align="left"><input type="text" name="texto05" size="50"></td>
					<td>
					<TR>
					</TR>
					<td>
						<label for="texto06">Texto 06: </label>
					</td>
						<td align="left"><input type="text" name="texto06" size="50"></td>
					<td>
					<TR>
					</TR>				
				<TR>	
					<td>
						<label for="texto07">Texto 07: </label>
					</td>
						<td align="left"><input type="text" name="texto07" size="50"></td>
					<td> 		
				</TR>
				<TR>		
					<td>
						<label for="texto08">Texto 08: </label>
					</td>
						<td align="left"><input type="text" name="texto08" size="50"></td>
					<td>
				</TR>
				<TR>	
					<td>
						<label for="texto09">Texto 09: </label>
					</td>
						<td align="left"><input type="text" name="texto09" size="50"></td>
					<td>
				</TR>
				<TR>	
					<td>
						<label for="texto10">Texto 10: </label>
					</td>
						<td align="left"><input type="text" name="texto10" size="50"></td>
					<td>
				</TR>
				<TR>	
					<td>
						<label for="texto11">Texto 11: </label>
					</td>
						<td align="left"><input type="text" name="texto11" size="50"></td>
					<td>
				</TR>
				<TR>	
					<td>
						<label for="texto12">Texto 12: </label>
					</td>
						<td align="left"><input type="text" name="texto12" size="50"></td>
					<td>
			 	</TR>
			 	
		
			 	</tr>
			</table>
			
		</fieldset>	
				
		</fieldset>		
		<br />	
-->
		<br />	
		<!-- Botoes -->
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>
		
</body>
</html>