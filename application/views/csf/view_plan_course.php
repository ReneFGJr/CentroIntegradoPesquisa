<?php
$dados = '';
foreach ($dado_course_plan as $key => $value) {
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

<h1>Cursos que mais participam do intercâmbio</h1>
<table >
	<tr>
		<td>
			<div class="planilhas">
				<fieldset>
					<table >
						<tr>
							<th>Pais</th>
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