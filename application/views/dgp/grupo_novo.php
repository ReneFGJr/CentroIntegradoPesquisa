<h1><?php echo msg('grupo_novo');?></h1>
<!-- CSS -->
<style rel="stylesheet" type="text/css">
	.tudo {
		display: table;
	}
	.conteudo1 {
		border: 0px #333 solid;
		float: left;
		width: 110%;
	}
	.conteudo2 {
		margin-top: 10%;
		margin-left: 120%;
		border: 0px #333 solid;
		width: 50%;
	}

</style>
<!-- HTML -->
<div class="tudo">
	<div class="conteudo1">
		<h1> Criação de novos grupos de Pesquisa</h1>
		<br />
	<!-- DADOS PESSOAIS-->
			<fieldset>
				<legend>Dados do Grupo</legend>
				<table cellspacing="10">
					<tr>
						<td align="left" width="80"><?php echo msg('Label_gp_nome'); ?></td>
						<td align="left" class="lt2 border1" width="80%"><?php echo "variavel"; ?></td>
					</tr>
					<tr>
						<td align="left" width="80"><?php echo msg('Label_gp_link'); ?></td>
						<td align="left" class="lt2 border1" width="80%"><?php echo "variavel"; ?></td>
					</tr>
					<tr>
						<td align="left" width="80"><?php echo msg('Label_gp_situacao'); ?></td>
						<td align="left" class="lt2 border1" width="80%"><?php echo "variavel"; ?></td>
					</tr>
					<tr>
						<td align="left" width="80"><?php echo msg('Label_gp_info_comp'); ?></td>
						<td align="left" class="lt2 border1" width="80%"><?php echo "variavel"; ?></td>
					</tr>
					<tr>
						<td align="left" width="80"><?php echo msg('Label_gp_criacao'); ?></td>
						<td align="left" class="lt2 border1" width="80%"><?php echo "variavel"; ?></td>
					</tr>									
				
				
				</table>
			</fieldset>
			<br />
			
			<!-- Adicionar arquivo -->
			<fieldset>
				<legend>
					Arquivos
				</legend>
				<table cellspacing="10">
					<tr>
						<td><label for="imagem">Adicionar arquivo:</label></td>
						<td>
							<input type="file" name="imagem" >
						</td>
					</tr>
					
				</table>
			</fieldset>
			<br />
			<input type="submit">
			<input type="reset" value="Limpar">
		</form>
	</div>
	<div class="conteudo2">
		<fieldset>
			<legend>
				Informações
			</legend>
			<table width="100%" class="tabela01">
				<tr valign="top">
					<td width="50%"><h4>Instruções para o pesquisador</h4> Dos requisitos para criação de grupo de pesquisa:
					<ul>
						<li>
							O lider deve ter titulação de Doutor.
						</li>
						<li>
							Carga horária superior a 12horas.
						</li>
					</ul></td>
				</tr>
			</table>
		</fieldset>
	</div>
</div>
