<?php
$color = '<font color="#3030ef">';

		$chk = array();
		$chk[1] = array('', '', '', '', '', '', '', '');
		$chk[2] = array('', '', '', '', '', '', '', '');
		$chk[3] = array('', '', '', '', '', '', '', '');
		$chk[4] = array('', '', '', '', '', '', '', '');
		$chk[5] = array('');
		$chk[6] = array('', '', '', '', '', '', '', '');
		$chk[7] = array('');
		
		$ob = array('','','','','','','','','','','','','');
		
		$acao = get("acao");
		if (strlen($acao) > 0)
			{
				$obr = '<img src="'.base_url('img/icon/icone_exclamation.png').'" height="30" align="left">';
				
				if ((strlen($dd1)  == 0) or (strlen($dd21)==0)) { $ob[1] = $obr; }
				if ((strlen($dd2)  == 0) or (strlen($dd22)==0)) { $ob[2] = $obr; }
				if ((strlen($dd3)  == 0) or (strlen($dd23)==0)) { $ob[3] = $obr; }
				if ((strlen($dd4)  == 0) or (strlen($dd24)==0)) { $ob[4] = $obr; }
				if (                        (strlen($dd25)==0)) { $ob[5] = $obr; }
				if ((strlen($dd6)  == 0))                       { $ob[6] = $obr; }
				if ((strlen($dd7)  == 0)) { $ob[7] = $obr; }
				if ((strlen($dd10) == 0)) { $ob[10] = $obr; }
			}		
		
		/* Checked */
		if (strlen($dd1) > 0)
			{
				if ($dd1=='20') { $chk[1][0] = 'checked'; }
				if ($dd1=='10') { $chk[1][1] = 'checked'; }
				if ($dd1=='5')  { $chk[1][2] = 'checked'; }
				if ($dd1=='1')  { $chk[1][3] = 'checked'; }
			}
		if (strlen($dd2) > 0)
			{
				if ($dd2=='20') { $chk[2][0] = 'checked'; }
				if ($dd2=='10') { $chk[2][1] = 'checked'; }
				if ($dd2=='1')  { $chk[2][2] = 'checked'; }
			}			
		if (strlen($dd3) > 0)
			{
				if ($dd3=='20') { $chk[3][0] = 'checked'; }
				if ($dd3=='10') { $chk[3][1] = 'checked'; }
				if ($dd3=='5')  { $chk[3][2] = 'checked'; }
				if ($dd3=='1')  { $chk[3][3] = 'checked'; }
			}			
		if (strlen($dd4) > 0)
			{
				if ($dd4=='20') { $chk[4][0] = 'checked'; }
				if ($dd4=='10') { $chk[4][1] = 'checked'; }
				if ($dd4=='5')  { $chk[4][2] = 'checked'; }
				if ($dd4=='1')  { $chk[4][3] = 'checked'; }
			}
		
		if (strlen($dd6) > 0)
			{
				if ($dd6=='20') { $chk[6][0] = 'checked'; }
				if ($dd6=='10') { $chk[6][1] = 'checked'; }
				if ($dd6=='2')  { $chk[6][2] = 'checked'; }
				if ($dd6=='99') { $chk[6][3] = 'checked'; }
			}		
?>

<!-- ##################### Inicio da ficha $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<h1>Ficha de avaliação do Relatório Final</h1>
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
		<b>Comitê Gestor</b>
		<br>
		<br>
		<br>
		<br>
		<fieldset class="form-group">
		<b>AVALIAÇÃO</b>
		<br>
		<br>
		
		
		<!----------------- Questão 1 do RF----------------------------> 
		1) <?php echo $ob[1];?>
		<b>Clareza, legibilidade e objetividade (português, organização geral do texto, figuras, gráficos,
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
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21;?></textarea>		
		
		
		<!----------------- Questão 2 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		2) <?php echo $ob[2];?>
		<b>Na estruturação do relatório, os itens: introdução, desenvolvimento, resultados, discussão, considerações finais e 
			 referências bibliográficas, estão apresentados adequadamente, bem como, mantêm
		relação coerente entre si. Neste ponto este relatório está</b>:
		<br>
		<input name="dd2" type="radio" value="20" <?php echo $chk[2][0];?> >
		Adequado
		<br>
		<input name="dd2" type="radio" value="10" <?php echo $chk[2][1];?> >
		Parcialmente adequado
		<br>
		<input name="dd2" type="radio" value="1" <?php echo $chk[2][2];?> >
		Inadequado
		<br>
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd22" cols=80 rows=4 style="width: 100%"><?php echo $dd22;?></textarea>		
		
		
		<!----------------- Questão 3 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		3) <?php echo $ob[3];?>
		<b>Cumprimento do cronograma previsto</b>:
		<br>
		<input name="dd3" type="radio" value="20" <?php echo $chk[3][0];?> >
		Excelente <?php echo $color;?>( as atividades foram realizadas dentro do cronograma previsto)</font>
		<br>
		<input name="dd3" type="radio" value="10" <?php echo $chk[3][1];?> >
		Bom <?php echo $color;?>(a maior parte das atividades previstas foram cumpridas. Houve algumas mudanças
		nos objetivos e/ou cronograma, as quais foram devidamente justificadas)</font>
		<br>
		<input name="dd3" type="radio" value="5" <?php echo $chk[3][2];?> >
		Regular </font>
		<br>
		<input name="dd3" type="radio" value="1" <?php echo $chk[3][3];?> >
		Ruim <?php echo $color;?>(severo atraso no cronograma ou mudança não justificada ou não apropriada em
		relação aos objetivos iniciais propostos)</font>
		<br>
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd23" cols=80 rows=4 style="width: 100%"><?php echo $dd23;?></textarea>		
		
		
		<!----------------- Questão 4 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		4) <?php echo $ob[4];?>
		<b>Resultados obtidos</b>:
		<br>
		<input name="dd4" type="radio" value="20" <?php echo $chk[4][0];?> >
		Excelente <?php echo $color;?>(resultados altamente relevantes)</font>
		<br>
		<input name="dd4" type="radio" value="10" <?php echo $chk[4][1];?> >
		Bom <?php echo $color;?>(dados obtidos são adequados, bem como a análise)</font>
		<br>
		<input name="dd4" type="radio" value="5" <?php echo $chk[4][2];?> >
		Regular <?php echo $color;?>(dados obtidos não foram analisados, dificultando a avaliação da sua relevância no contexto do projeto )</font>
		<br>
		<input name="dd4" type="radio" value="1" <?php echo $chk[4][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<!--
		<input name="dd4" type="radio" value="19" <?php echo $chk[4][4];?> >
		Não se aplica <?php echo $color;?>(de acordo com o cronograma inicial apresentado, não é esperado a apresentação de resultados nesta etapa do trabalho)</font>
		-->
		<br>
		Comentários sobre sua avaliação deste item:
		<br>
		<textarea name="dd24" cols=80 rows=4 style="width: 100%"><?php echo $dd24;?></textarea>		
		
		
		<!----------------- Questão 5 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		5) <?php echo $ob[5];?>
		<b>Outros comentários</b>:
		<br>
		<br>
		O avaliador fica livre para suas sugestões e comentários sobre a apreciação geral do trabalho:
		<br>
		<textarea name="dd25" cols=80 rows=4 style="width: 100%" id="dd25"><?php echo $dd25;?></textarea>		
		
		<!----------------- Questão 6 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		6) <?php echo $ob[6];?>
		<b>Resultado da avaliação do relatório Final e do Resumo</b>:
		<br>
		<input name="dd6" type="radio" value="20" <?php echo $chk[6][0];?> >
		Relatório final aprovado com mérito.</font>
		<br>
		<input name="dd6" type="radio" value="10" <?php echo $chk[6][1];?> >
		Relatório final aprovado. As sugestões apresentadas devem ser incorporadas para a apresentação no XXIV SEMIC.</font>
		<br> 
		<input name="dd6" type="radio" value="2" <?php echo $chk[6][2];?> >
		Relatório final com pendência, submeter novamente após realizar as correções.</font>
		<br>
		<input name="dd6" type="radio" value="99" <?php echo $chk[6][3];?> >
		Trabalho não indicado para apresentação pública.</font>

		
		<!----------------- Questão 7 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		7) <?php echo $ob[7];?><b>Considerando o relatório como um todo, assinale atribua uma nota de 0 a 10,0</b>
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
		</select>
		
		<!----------------- Finaliza e salva o RF---------------------------->
		<br>
		<br>
		<br>
		<input type="submit" name="acao" value="Finalizar a avaliação >>>" class="btn btn-primary">
		</td>
	</tr>
	</fieldset>
</table>
</form>