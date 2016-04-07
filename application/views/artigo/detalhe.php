<h1>Artigo - detalhe</h1>
<table width="100%" class="tabela01 lt0">
	<tr><td colspan=4>título do artigo</td>
		<td align="right" colspan=2 align="right">situação</td>
	</tr>
	<tr valign="top">
		<td colspan=4 class="lt4"><?php echo $ar_titulo;?></td>
		<td align="right" class="lt2" colspan=2><font color="orange"><b><?php echo $cas_descricao;?></b></font></td>
	</tr>
	
	<tr><td colspan=4>solicitante</td>
	</tr>	
	<tr valign="top">
		<td colspan=4 class="lt4"><b><?php echo $us_nome;?></b></td>
	</tr>
	
	
	<tr>
		<td width="20%">ISSN</td>
		<td width="20%">Ano de publicação</td>
		<td width="20%">Volume</td>
		<td width="20%">Número</td>
		<td width="10%">Paginação</td>
		<td width="10%" align="right">Protocolo</td>
	</tr>
	<tr>
		<td class="lt4"><?php echo $ar_issn;?></td>
		<td class="lt4"><?php echo $ar_ano;?></td>
		<td class="lt4"><?php echo $ar_vol;?></td>
		<td class="lt4"><?php echo $ar_num;?></td>
		<td class="lt4"><?php echo $ar_pags;?></td>
		<td class="lt4" align="right"><?php echo $ar_protocolo;?></td>
	</tr>
	
	<tr><td colspan=4>publicação</td></tr>
	<tr><td colspan=4 class="lt4"><?php echo $ar_journal;?></td></tr>	

	<tr><td colspan=4>DOI</td></tr>
	<tr><td colspan=4 class="lt4"><?php echo $ar_doi;?>&nbsp;</td></tr>	
</table>
