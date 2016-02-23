<?php
if (!(isset($captacao_texto))) {
	$$captacao_texto = '';
}

$cor_correcao = 'bg_bordo'; 
?>
<table class="captacao_folha border1" width="350" align="right" style="margin: 20px; display: table;">
	<tr>
		<td class="lt5 black" align="center"><?php echo msg("CAPT");?></td>
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
				<td colspan=4><b><?php echo msg('captacaoes_cadastrados');?></b></td>
			</tr>
			<tr valign="top" class="lt0">
				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">em cadastro</font>
				<br>
				<font class="lt6"><b><?php echo $captacao_em_cadastrado;?></b></font></td>

				<td class="captacao_folha <?php echo $cor_correcao;?>"><font class="lt0" color="white">para correção</font>
				<br>
				<font class="lt6"><b><?php echo $captacao_para_correcao;?></b></font></td>

				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">em análise</font>
				<br>
				<font class="lt6"><b><?php echo $captacao_em_analise;?></b></font></td>

				<td class="captacao_folha bg_bordo"><font class="lt0" color="white">finalizado(s)</font>
				<br>
				<font class="lt6"><b><?php echo $captacao_finalizado;?></b></font></td>
			</tr>
			<tr>
				<td colspan=3>
					<?php echo $captacao_texto; ?>
				</td>
			</tr>			
		</table>
</table>
