<div id="content">
<h1>Banco de Projetos</h1>

<table width="100%" cellpadding="0" cellspacing="0" border=0>
	<tr valign="top">
		<td style="min-width: 100px;">Filtros
		<form action="<?php echo base_url('index.php/banco_projetos');?>" method="post">
		<select name="dd1">
			<option value="">::Área::</option>
			<option value="" style="font-size:14px; font-weight:bolder;">Humanidades</option>
			<option value="" style="margin-left: 15px;" >Edicação Infantil</option>
		</select>
		<BR><BR>
		Busca:
		<BR>
			<input type="text" value="" name="dd2" style="width: 200px;">
		<BR><BR>
			<input type="submit" value="Filtrar" name="acao" >
		</form>
		
		<!---- resumo ---->
		<BR><BR>
			<table width="98%" class="lt1 border1 radius10">
				<tr><td align="right">Total de projetos de pesquisa</td>
					<td class="lt6">2.231</td>
				</tr>
				<tr><td align="right">Total de pesquisadores</td>
					<td class="lt6">714</td>
				</tr>
				<tr><td align="right">Total de estudantes envolvidos em pesquisa</td>
					<td class="lt6">3.172</td>
				</tr>
			</table>
		</td>
		<td style="width:10px; border-left:1px solid #333333;"></td>
		<td width="78%">Últimos projetos atualizados
			
		<table width="100%" border=0>
			<tr><td colspan=3><hr size=1></td></tr>
			
			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_2.00.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/banco_projetos/view/".$id);?>" class="no-undeline grey">
					A EXEQUIBILIDADE DA INCLUSÃO NO ENSINO SUPERIOR E A MOBILIDADE SOCIOCULTURAL – PROUNI e o Direito social.</B>
					</A>
					<BR><span class="lt1">Pesquisador: Maria Eliza Correa Pacheco</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>
			<tr><td colspan=3><hr size=1></td></tr>
		</table>	
			
		</td>
	</tr>
</table>

</div>