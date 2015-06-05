<div id="content">
<img src="<?php echo base_url('img/logo/logo_dgp.png');?>" align="right" height="68">
<h1>Diretório de Grupos de Pesquisa da PUCPR</h1>

<table width="100%" cellpadding="0" cellspacing="0" border=0>
	<tr valign="top">
		<td style="min-width: 100px;">Filtros
		<form action="<?php echo base_url('index.php/dgp');?>" method="post">
		<select name="dd1">
			<option value="">::Área::</option>
			<option value="" style="margin-left: 15px;" >Ciência da Computação</option>
			<option value="" style="margin-left: 15px;" >Agronomia</option>
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
				<tr><td align="right">Total de grupos ativos</td>
					<td class="lt6">135</td>
				</tr>
				<tr><td align="right">Total de linhas de pesquisa</td>
					<td class="lt6">1.212</td>
				</tr>
				
				<tr><td align="right">Total de pesquisadores</td>
					<td class="lt6">456</td>
				</tr>
				<tr><td align="right">Total de estudantes envolvidos em pesquisa</td>
					<td class="lt6">1.432</td>
				</tr>
			</table>
		</td>
		<td style="width:10px; border-left:1px solid #333333;"></td>
		<td width="78%">Últimos grupos atualizados
			
		<table width="100%" border=0>
			<tr><td colspan=3><hr size=1></td></tr>
			
			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_1.00.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/dgp/view/".$id);?>" class="no-undeline grey">
					AGENTES DE SOFTWARE.</B>
					</A>
					<BR><span class="lt1">Pesquisadores: Bráulio Coelho Ávila; Fabrício Enembreck</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>
			<tr><td colspan=3><hr size=1></td></tr>
			
			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_3.10.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/dgp/view/".$id);?>" class="no-undeline grey">
					APRENDIZAGEM E CONHECIMENTO NA PRÁTICA DOCENTE.</B>
					</A>
					<BR><span class="lt1">Pesquisadores: Ricardo Tescarolo; Evelise Maria Labatut Portilho.</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>
			<tr><td colspan=3><hr size=1></td></tr>			

			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_3.10.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/dgp/view/".$id);?>" class="no-undeline grey">
					ASPECTOS PSIQUICOS E PSICOSSOCIAIS DO SER HUMANO EM DESENVOLVIMENTO.</B>
					</A>
					<BR><span class="lt1">Pesquisadores: Jussara Maria Weigert Janowski.</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>
			<tr><td colspan=3><hr size=1></td></tr>
			
			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_1.30.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/dgp/view/".$id);?>" class="no-undeline grey">
					BIOTECNOLOGIA PARA A SUSTENTABILIDADE AGROPECUÁRIA E AMBIENTAL.</B>
					</A>
					<BR><span class="lt1">Pesquisadores: Jussara Maria Weigert Janowski.</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>
			<tr><td colspan=3><hr size=1></td></tr>
			
			<tr valign="top">
				<td width="3%" ><img src="<?php echo base_url("img/bp/icone_4.10.00.00.png");?>" width="48">
				</td>
				<td width="90%">
					<?php
					$id = 1;
					?>
					<B>
					<A HREF="<?php echo base_url("index.php/dgp/view/".$id);?>" class="no-undeline grey">
					ECOLOGIA E INTERAÇÃO AMBIENTAL.</B>
					</A>
					<BR><span class="lt1">Pesquisadores: Márcio Coraiola; Alexandre Bernardi Koehler.</span>
					</td>
				<td width="7%" class="lt1">05/jun./2015</td>
			</tr>									
		</table>	
			
		</td>
	</tr>
</table>

</div>