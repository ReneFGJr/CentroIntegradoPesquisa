<h1>Artigo - detalhe</h1>
<table width="100%" class="tabela01 lt0">
	<tr><td colspan=4>t�tulo do artigo</td>
		<td align="right">situa��o</td>
	</tr>
	<tr valign="top">
		<td colspan=4 class="lt4"><?php echo $ar_titulo;?></td>
		<td align="right" class="lt2"><font color="orange"><b><?php echo $cas_descricao;?></b></font></td>
	</tr>
	
	<tr>
		<td width="20%">ISSN</td>
		<td width="20%">Ano de publica��o</td>
		<td width="20%">Volume</td>
		<td width="20%">N�mero</td>
		<td width="20%">Pagina��o</td>
	</tr>
	<tr>
		<td class="lt4"><?php echo $ar_issn;?></td>
		<td class="lt4"><?php echo $ar_ano;?></td>
		<td class="lt4"><?php echo $ar_vol;?></td>
		<td class="lt4"><?php echo $ar_num;?></td>
		<td class="lt4"><?php echo $ar_pags;?></td>
	</tr>
	
	<tr><td colspan=4>publica��o</td></tr>
	<tr><td colspan=4 class="lt4"><?php echo $ar_journal;?></td></tr>	

	<tr><td colspan=4>DOI</td></tr>
	<tr><td colspan=4 class="lt4"><?php echo $ar_doi;?>&nbsp;</td></tr>	
</table>
