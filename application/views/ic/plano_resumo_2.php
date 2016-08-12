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
echo '<hr size="10" width="50%" align="center" noshade>';
?>
<table width="90%" align="center">
<tr><h1><center> <b>AVALIAÇÃO DO RELATÓRIO FINAL</b> </center></h1></tr>
<tr>
<td>
Prezado avaliador
		<br>
		<br>
			Com o intuito de aprimoramento dos programas PIBIC e PIBITI, todos os trabalhos que encerram sua vigência
			em julho de 2016 serão classificados em quartil superior para realizar apresentação oral no XXIV SEMIC, os demais 
			trabalhos participarão da sessão de pôster. Essa classificação será a média aritmética das notas obtidas nas três etapas:
			 sumissão, relatório parcial e relatório final.
			Esse procedimento visa inserir o aluno de IC e IT em mais uma etapa da formação do pesquisador.  		
		<br>
		<br>
			Pedimos a sua especial atenção para o preenchimento do campo 5, com comentários sobre a sua avaliação geral do trabalho 
			desenvolvido. Esse feedback é preciso para o aluno, para o orientador e para a melhoria da qualidade dos programas como um todo.
		<br>
			No resultado da avaliação, você deverá atribuir uma nota de 0-100 para o conjunto das informações apresentadas.	
		<br>
		<br>
		<br>
		<b>Comitê Gestor</b>
		<br>
		<br>
		</td>
	</tr>	
 </table>
 <br/>
<table width="80%" border=0>

	<?php
	if (isset($resumo))
		{
			echo '<font style="color: blue;" size="5">'.msg('resumo_postado').'</font>';
			if (isset($edit))
				{
				echo ' | ';			
				echo '<a href="'.base_url('index.php/ic/postar_resumo/'.$id_ic.'/'.checkpost_link($id_ic)).'" class="link lt0">editar</A>';
				}
			
			?>
				
				<tr>
					<td class="lt6" align="center">
						<br><?php echo $titulo; ?>
				  </td>
				  
				
				</tr>
				<tr><td><br></td></tr>
				<tr valign="top">
					<td width="100%">
					<div style="text-align: justify;">
						<b>Introdução:</b>
						<?php echo $resumo_01; ?>
						<br><br>
						<b>Objetivo:</b>
						<?php echo $resumo_02; ?>
						<br><br>
						<b>Metodologia:</b>
						<?php echo $resumo_03; ?>
						<br><br>
						<b>Resultados:</b>
						<?php echo $resumo_04; ?>
						<br><br>
						<b>Conclusões:</b>
						<?php echo $resumo_05; ?>
					</div>
					<br>
					<b>Palavras-chave</b>: <?php echo $resumo_06; ?> 
				</td>
				</tr>
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