<h1>Artigo - detalhe</h1>
<table width="100%" class="tabela01 lt0">
	<tr><td colspan=4>t�tulo do artigo</td>
		<td align="right" colspan=2 align="right">situa��o</td>
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
		<td width="20%">Ano de publica��o</td>
		<td width="20%">Volume</td>
		<td width="20%">N�mero</td>
		<td width="10%">Pagina��o</td>
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
	
	<tr><td colspan=4>publica��o</td></tr>
	<tr><td colspan=4 class="lt4"><?php echo $ar_journal;?></td></tr>	

	<tr><td colspan=2>DOI</td>
		<td colspan=1>Indicado como:</td>
		<?php if (perfil("#ADM")==1) { echo '<td colspan=1>Bonificar como:</td>'; } ?>
	</tr>
	<tr valign="top">
		<td colspan=2 class="lt4"><?php echo $ar_doi;?>&nbsp;</td>
		<td colspan=1 class="lt4"><?php echo $ar_q. ' '.$ar_a.' '.$ar_er;?> &nbsp;</td>
		<?php if (perfil("#ADM")==1) {
			echo '<td colspan=1 class="lt2">';
			echo 'A1: '.number_format($ar_v1,2,',','.').'<br>';
			echo 'A2: '.number_format($ar_v2,2,',','.').'<br>';
			echo 'Q1: '.number_format($ar_v3,2,',','.').'<br>';
			//echo 'ExR: '.number_format($ar_v4,2,',','.').'<br>';
			//echo 'Colabora��o: '.number_format($ar_v5,2,',','.').'<br>';
			echo 'Total: <b>'.number_format($ar_v1+$ar_v2+$ar_v3+$ar_v4+$ar_v5,2,',','.').'</b><br>';
			echo '<a href="#" onclick="newwin(\''.base_url('index.php/artigo/editar_valor/'.$id_ar.'/'.checkpost_link($id_ar)).'\',600,600);" class="link lt1">editar</a>';
			echo '</td>'; 
			} 
		?>		
	</tr>	
</table>
