<?php
$color = '<font color="#3030ef">';

		$chk = array();
		$chk[1] = array('', '', '', '', '', '', '', '');
		$chk[2] = array('', '', '', '', '', '', '', '');
		$chk[3] = array('', '', '', '', '', '', '', '');
		$chk[4] = array('', '', '', '', '', '', '', '');
		$chk[5] = array('', '', '', '', '', '', '', '');
		$chk[6] = array('', '', '', '', '', '', '', '');
		$chk[7] = array('', '', '', '', '', '', '', '');
		$chk[8] = array('', '', '', '', '', '', '', '');
		$chk[9] = array('', '', '', '', '', '', '', '');
		$chk[10] = array('', '', '', '', '', '', '', '');
		$chk[11] = array('', '', '', '', '', '', '', '');	
		
		
/* Checked */
if (strlen($dd1) > 0)
	{
		if ($dd1=='20') { $chk[1][0] = 'checked'; }
		if ($dd1=='10') { $chk[1][1] = 'checked'; }
		if ($dd1=='5') { $chk[1][2] = 'checked'; }
		if ($dd1=='1') { $chk[1][3] = 'checked'; }
	}
if (strlen($dd2) > 0)
	{
		if ($dd2=='20') { $chk[2][0] = 'checked'; }
		if ($dd2=='10') { $chk[2][1] = 'checked'; }
		if ($dd2=='1') { $chk[2][2] = 'checked'; }
	}			
if (strlen($dd3) > 0)
	{
		if ($dd3=='20') { $chk[3][0] = 'checked'; }
		if ($dd3=='10') { $chk[3][1] = 'checked'; }
		if ($dd3=='5') { $chk[3][2] = 'checked'; }
		if ($dd3=='1') { $chk[3][3] = 'checked'; }
	}			
if (strlen($dd4) > 0)
	{
		if ($dd4=='20') { $chk[4][0] = 'checked'; }
		if ($dd4=='10') { $chk[4][1] = 'checked'; }
		if ($dd4=='5') { $chk[4][2] = 'checked'; }
		if ($dd4=='1') { $chk[4][3] = 'checked'; }
		if ($dd4=='19') { $chk[4][4] = 'checked'; }
	}
if (strlen($dd5) > 0)
	{
		if ($dd5=='20') { $chk[5][0] = 'checked'; }
		if ($dd5=='10') { $chk[5][1] = 'checked'; }
		if ($dd5=='5') { $chk[5][2] = 'checked'; }
		if ($dd5=='1') { $chk[5][3] = 'checked'; }
		if ($dd5=='19') { $chk[5][4] = 'checked'; }
	}
if (strlen($dd6) > 0)
	{
		if ($dd6=='2') { $chk[6][2] = 'checked'; }
		if ($dd6=='1') { $chk[6][1] = 'checked'; }
	}		
if (strlen($dd7) > 0)
	{
		if ($dd7=='2') { $chk[7][2] = 'checked'; }
		if ($dd7=='1') { $chk[7][1] = 'checked'; }
	}
if (strlen($dd9) > 0)
	{
		if ($dd9=='1') { $chk[9][1] = 'checked'; }
		if ($dd9=='-1') { $chk[9][2] = 'checked'; }
	}			
?>
<h1>Ficha de avaliação do Relatório Parcial</h1>
<?php echo $plano;?>
<?php echo $ged;?>
<br>
<br>
<br>
<form method="post">
<table width="90%" align="center">
	<tr>
		<td> Prezado avaliador
		<br>
		<br>
		Para cada pergunta abaixo haverá um campo de preenchimento obrigatório para seus comentários
		relacionados com a opção assinalada. Informamos que as frases na cor azul são informativas e restritas
		aos avaliadores e tem o propósito de dar uma uniformidade mínima nas avaliações.
		<br>
		<br>
		Após a sua avaliação, o parecer será enviado ao professor orientador para conhecimento e correções, se
		for o caso. Nosso intuito é que aluno e professor orientador recebam seu feedback qualitativo e, a partir
		destes, poderão aprimorar o andamento da pesquisa e o aprendizado do aluno.
		Agradecemos imensamente sua participação e colaboração.
		<br>
		<br>
		<b>Comitê Gestor</b>
		<br>
		<br>
		<br>
		<br>
		<b>AVALIAÇÃO</b>
		<br>
		<br>
		<!----------------- item 1 ----------------------------> 1) <b>Clareza, legibilidade e objetividade (português, organização geral do texto, figuras, gráficos,
		tabelas, referências, adequação do relatório ao modelo do Programa)</b>:
		<br>
		<input name="dd1" type="radio" value="20" <?php echo $chk[1][0];?> >
		Excelente
		<br>
		<input name="dd1" type="radio" value="10" <?php echo $chk[1][1];?> >
		Bom <?php echo $color;?>(existem pequenos ajustes que precisem ser corrigidos, justificar)</font>
		<br>
		<input name="dd1" type="radio" value="5"  <?php echo $chk[1][2];?> >
		Regular <?php echo $color;?>(muitas correções são necessárias, assinalar no campo dos comentários )</font>
		<br>
		<input name="dd1" type="radio" value="1"  <?php echo $chk[1][3];?> >
		Ruim <?php echo $color;?>(o relatório precisa ser refeito)</font>
		<br>
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21;?></textarea>		<!----------------- item 2 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		2) <b>Na estruturação do relatório, os itens: introdução, desenvolvimento, resultados parciais, etapas
		futuras e referências bibliográficas, estão apresentados adequadamente, bem como, mantêm
		relação coerente entre si. Neste ponto este relatório está</b>:
		<br>
		<input name="dd2" type="radio" value="20" <?php echo $chk[2][0];?> >
		adequado
		<br>
		<input name="dd2" type="radio" value="10" <?php echo $chk[2][1];?> >
		parcialmente adequado
		<br>
		<input name="dd2" type="radio" value="1" <?php echo $chk[2][2];?> >
		inadequado
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd22" cols=80 rows=4 style="width: 100%"><?php echo $dd22;?></textarea>		<!----------------- item 3 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		3) <b>Cumprimento do cronograma previsto</b>:
		<br>
		<input name="dd3" type="radio" value="20" <?php echo $chk[3][0];?> >
		Excelente <?php echo $color;?>( as atividades estão sendo realizadas dentro do cronograma previsto)</font>
		<br>
		<input name="dd3" type="radio" value="10" <?php echo $chk[3][1];?> >
		Bom <?php echo $color;?>(a maior parte das atividades previstas foram cumpridas. Houve algumas mudanças
		nos objetivos e/ou cronograma, as quais foram devidamente justificadas)</font>
		<br>
		<input name="dd3" type="radio" value="5" <?php echo $chk[3][2];?> >
		Regular <?php echo $color;?>(importante atraso no cronograma que poderá comprometer o cumprimento dos
		objetivos inicias propostos. Há necessidade de ajuste no cronograma e/ou objetivos do projeto. Justificativas devem ser apresentadas )</font>
		<br>
		<input name="dd3" type="radio" value="1" <?php echo $chk[3][3];?> >
		Ruim <?php echo $color;?>(severo atraso no cronograma ou mudança não justificada ou não apropriada em
		relação aos objetivos iniciais propostos)</font>
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd23" cols=80 rows=4 style="width: 100%"><?php echo $dd23;?></textarea>		<!----------------- item 4 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		4) <b>Resultados parciais obtidos</b>:
		<br>
		<input name="dd4" type="radio" value="20" <?php echo $chk[4][0];?> >
		Excelente <?php echo $color;?>(resultados parciais altamente relevantes para o prosseguimento das atividades)</font>
		<br>
		<input name="dd4" type="radio" value="10" <?php echo $chk[4][1];?> >
		Bom <?php echo $color;?>(dados obtidos são adequados, bem como a análise preliminar. Na próxima  etapa deve haver complementação e aprofundamento)</font>
		<br>
		<input name="dd4" type="radio" value="5" <?php echo $chk[4][2];?> >
		Regular <?php echo $color;?>(dados obtidos não foram analisados, dificultando a avaliação da sua relevância no contexto do projeto )</font>
		<br>
		<input name="dd4" type="radio" value="1" <?php echo $chk[4][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<input name="dd4" type="radio" value="19" <?php echo $chk[4][4];?> >
		Não se aplica <?php echo $color;?>(de acordo com o cronograma inicial apresentado, não é esperado a apresentação de resultados nesta etapa do trabalho)</font>
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd24" cols=80 rows=4 style="width: 100%"><?php echo $dd24;?></textarea>		
		
		<!----------------- item 5 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		5) <b>No caso desta pesquisa de IC ser parte de uma pesquisa de mestrado, doutorado ou parte de projeto  mais amplo, assinale se</b>:
		<br>
		<input name="dd5" type="radio" value="20" <?php echo $chk[5][0];?> >
		As atividades descritas não estão adequadas para uma proposta de IC <?php echo $color;?>(obrigatória a modificação, ver justificativa)</font>
		<br>
		<input name="dd5" type="radio" value="10" <?php echo $chk[5][1];?> >
		As atividades descritas são parcialmente válidas para IC <?php echo $color;?>( sugerir modificações na justificativa)</font>
		<br>
		<input name="dd5" type="radio" value="5" <?php echo $chk[5][2];?> >
		as atividades descritas são adequadas para a formação do aluno de IC.
		<br>
		<input name="dd5" type="radio" value="1" <?php echo $chk[5][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<input name="dd5" type="radio" value="19" <?php echo $chk[5][4];?> >
		Não se aplica.
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd25" cols=80 rows=4 style="width: 100%"><?php echo $dd25;?></textarea>		<!----------------- item 6 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		6) <b>O relatório parcial apresenta graves problemas relacionados a orientação desenvolvida e/ou
		problemas metodológicos que comprometem a formação do aluno de iniciação científica.
		Indique tais problemas no campo de comentários restrito. O avaliador considera que deve ser
		realizada uma reunião com o professor orientador</b>?
		<br>
		<input name="dd6" type="radio" value="2" <?php echo $chk[6][2];?> >
		NÃO
		<br>
		<input name="dd6" type="radio" value="1" <?php echo $chk[6][1];?> >
		SIM <!----------------- item 7 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		<?php 
		if ($mb_tipo == 'PIBIC') { ?>
		7) <b>O projeto apresenta teor de tecnologia e inovação, portanto, seria indicado que migrasse para o PIBITI.</b>
		<br>
		<input name="dd7" type="radio" value="2" <?php echo $chk[7][2];?> >
		NÃO
		<br>
		<input name="dd7" type="radio" value="1" <?php echo $chk[7][1];?> >
		SIM <!----------------- item 8 ---------------------------->
		<?php } else { ?>
		<input name="dd7" type="hidden" value="3">	
		<?php } ?>
		<br>
		<br>
		<br>
		<br>
		8) <b>Outros comentários (o avaliador fica livre para suas sugestões e comentários sobre a apreciação geral do trabalho)</b>:
		<br>
		<textarea name="dd28" cols=80 rows=4 style="width: 100%"><?php echo $dd28;?></textarea>		<!----------------- item 9 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		9) <b>Resultado da avaliação</b>:
		<br>
		<input name="dd9" type="radio" value="1" <?php echo $chk[9][1];?> >
		<font color="green"><B>APROVADO</B></font> - comentários e sugestões deverão ser incorporados no relatório final. Sugerimos que a pontuação atribuída seja de 7,0 a 10,0.
		<br>
		<input name="dd9" type="radio" value="-1" <?php echo $chk[9][2];?> >
		<font color="red"><B>PENDÊNCIAS</B></font> - relatório parcial deve ser reapresentado realizando as devidas correções. Sugerimos que a pontuação atribuída seja abaixo de 7,0. 
		<!----------------- item 10 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		10) <b>Considerando o relatório como um todo, assinale atribua uma nota de 0 a 10,0.</b>:
		&nbsp;
		<select name="dd10"  class="lt3">
			<option value=""></option>
			<?php
			for ($r = 10; $r >= 1; $r = $r - 0.5) {
				$sel = '';
				if ($r == $dd10) { $sel = 'selected'; }
				echo '<option value="' . $r . '" '.$sel.'>' . number_format($r, 1, ',', '.') . '</option>';
				if ($r <= 5) { $r = $r - 0.5;
				}
			}
			?>
		</select><!----------------- item 10 ---------------------------->
		<br>
		<br>
		<br>
		<input type="submit" name="acao" value="Finalizar avaliação >>>" class="botao3d back_green_shadown back_green">
		</td>
	</tr>
</table>
</form>