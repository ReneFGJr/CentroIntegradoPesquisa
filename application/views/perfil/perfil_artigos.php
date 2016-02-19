<?php
if (!(isset($artigo_texto))) {
	$artigo_texto = '';
}

$cor_correcao = 'bg_bordo'; 
?>
<table class="captacao_folha border1" width="350" align="right" style="margin: 20px;">
	<tr>
		<td class="lt5 black" align="center"><?php echo msg("ARTI");?></td>
	</tr>
	<tr>
		<td>
		<table width="100%" >
			<!------ Artigos Cadastrados --------->
			<tr>
				<td width="25%"></td>
				<td width="25%"></td>
				<td width="25%"></td>
				<td width="25%"></td>
			</tr>
			<tr class="lt4" >
				<td colspan=4><b><?php echo msg('artigos_cadastrados');?></b></td>
			</tr>
			<tr valign="top" class="lt0">
				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">em cadastro</font>
				<br>
				<font class="lt6"><b><?php echo $artigos_em_cadastrados;?></b></font></td>

				<td class="captacao_folha <?php echo $cor_correcao;?>"><font class="lt0" color="white">para correção</font>
				<br>
				<font class="lt6"><b><?php echo $artigos_para_correcao;?></b></font></td>

				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">em análise</font>
				<br>
				<font class="lt6"><b><?php echo $artigos_em_analise;?></b></font></td>

				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">finalizado(s)</font>
				<br>
				<font class="lt6"><b><?php echo $artigos_finalizado;?></b></font></td>
			</tr>
			<tr>
				<td colspan=3>
					<?php echo $artigo_texto; ?>
				</td>
			</tr>			
		</table>
</table>
