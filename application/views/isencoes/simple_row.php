<?php
if (!(isset($acao))) { $acao = '&nbsp;'; }
?>
<tr valign="top">
	<td class="border1"><?php echo $bn_codigo;?></td>
	<td class="border1"><?php echo $ca_titulo_projeto;?></td>
	<td class="border1" align="center"><?php echo $ca_agencia;?></td>
	<td class="border1"><?php echo $ca_descricao;?></td>
	<td class="border1" align="center"><?php echo $ca_edital_nr;?></td>	
	<td class="border1"><?php echo $bns_descricao;?></td>
	<td class="border1"><?php echo $acao;?></td>
</tr>