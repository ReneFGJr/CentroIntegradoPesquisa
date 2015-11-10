<?php
if (isset($resumo)) {
	$titulo = $line['sm_titulo'];
	$titulo_en = $line['sm_titulo_en'];

	$resumo_01 = $line['sm_rem_01'];
	$resumo_02 = $line['sm_rem_02'];
	$resumo_03 = $line['sm_rem_03'];
	$resumo_04 = $line['sm_rem_04'];
	$resumo_05 = $line['sm_rem_05'];
	$resumo_06 = $line['sm_rem_06'];

	$resumo_11 = $line['sm_rem_11'];
	$resumo_12 = $line['sm_rem_12'];
	$resumo_13 = $line['sm_rem_13'];
	$resumo_14 = $line['sm_rem_14'];
	$resumo_15 = $line['sm_rem_15'];
	$resumo_16 = $line['sm_rem_16'];
}
?>
<fieldset>
	<legend>Resumo / Abstract</legend>
	<?php
	if (isset($resumo))
		{
			echo '<font style="color: blue;">'.msg('resumo_postado').'</font>';
			if (isset($edit))
				{
				echo ' | ';			
				echo '<a href="'.base_url('index.php/ic/postar_resumo/'.$id_ic.'/'.checkpost_link($id_ic)).'" class="link lt0">editar</A>';
				}
			
			?>
			<table width="100%" border=0>
				<tr><td class="lt6" align="center">
					<?php echo $titulo; ?>
				</td>
				<td rowspan=3 width="20">&nbsp;</td>
				<td class="lt6" align="center">
					<i><?php echo $titulo_en; ?></i>
				</td></tr>
				<tr><td><br></td></tr>
				<tr valign="top">
					<td width="50%">Resumo
					<br>
					<div style="text-align: justify;">
						<b>Introdução:</b>
						<?php echo $resumo_01; ?>
						<b>Objetivo:</b>
						<?php echo $resumo_02; ?>
						<b>Metodologia:</b>
						<?php echo $resumo_03; ?>
						<b>Resultados:</b>
						<?php echo $resumo_04; ?>
						<b>Conclusões:</b>
						<?php echo $resumo_05; ?>
					</div>
					<br>
					<b>Palavras-chave</b>: <?php echo $resumo_06; ?> 
				</td>				
				<td width="50%">Abstract
					<br>
					<div style="text-align: justify;">
						<b>Introduction:</b>
						<?php echo $resumo_11; ?>
						<b>Objectives:</b>
						<?php echo $resumo_12; ?>
						<b>Methods:</b>
						<?php echo $resumo_13; ?>
						<b>Results:</b>
						<?php echo $resumo_14; ?>
						<b>Conclusion:</b>
						<?php echo $resumo_15; ?>
					</div>
					<br>
					<b>Keywords</b>: <?php echo $resumo_06; ?> 
				</td></tr>
			</table>
			<?php
			} else {
			echo '<font class="error">'.msg('nao_postado').'</font>';
			if (isset($edit))
				{
				echo ' | ';
				echo '<a href="'.base_url('index.php/ic/postar_resumo/'.$id_ic.'/'.checkpost_link($id_ic)).'" class="link lt0">postar resumo</A>';
				}
			}
	?>
</fieldset>