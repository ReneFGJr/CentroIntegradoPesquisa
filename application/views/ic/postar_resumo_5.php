<?php
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
?>
<table width="100%">
	<tr valign="top">
		<td width="180"><?php echo $bar; ?></td>
		<td><h3>Postagem do Resumo para o SEMIC</h3>
			<table width="1024">
				<tr><td class="lt6" align="center">
					<?php echo $titulo; ?>
				</td></tr>
				<tr><td class="lt5" align="center">
					<i><?php echo $titulo_en; ?></i>
				</td></tr>
				<tr><td><br></td></tr>
				<tr><td>Resumo</td></tr>
				<tr><td class="lt2">
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
				</td></tr>
				
				<tr><td><br></td></tr>
				<tr><td>Abstract</td></tr>
				<tr><td class="lt2">
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
				<tr>
					<td>
						<br><br>
						<form method="post">
						<input type="hidden" name="page" value="5">
						<input type="submit" name="acao" value="Finalizar envio do resumo >>>">
						</form>
					</td>
				</tr>
								
			</table>			
		</td>
	</tr>
</table>
