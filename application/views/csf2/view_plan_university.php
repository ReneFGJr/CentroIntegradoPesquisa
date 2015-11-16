<?php
$dados = '';
foreach ($dado_university_plan as $key => $value) {
	$dados .= "<tr><td >$key</td><td class='tabela01' align='center'>$value</td></tr>";
}
?>
<style type="text/css">
	/***planilhas*/
	.planilhas td{
		font-family: Roboto, Roboto, Arial, Tahoma, Verdana;
		font-size: 15px;
		font-style: italic;
		color: #696969;
	}
</style>

<h1>Instituições que participam do intercâmbio PUCPR</h1>
<table >
	<tr>
		<td>
			<div class="planilhas">
				<fieldset>
					<table >
						<tr>
							<th>Instituição</th>
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