<?php
$dados = '';
foreach ($dado_university_plan as $key => $value) {
	$dados .= "<tr><td >$key</td><td class='tabela01' align='center'>$value</td></tr>";
}
?>

<h1>Institui��es que participam do interc�mbio PUCPR</h1>
<table width="100%">
	<tr>
		<td>
			<div class="planilhas">
				<fieldset>
					<table >
						<tr>
							<th>Institui��o</th>
							<th>Qtd. de Estudantes</th>
						</tr>
						<?php
							echo "$dados"
						?>
					</table>
				</fieldset>
			</div>
		</td>
	</tr>
</table>