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
<h1>Ficha de avalia��o do Relat�rio Final</h1>
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
			Com o intuito de aprimoramento dos programas PIBIC e PIBITI, todos os trabalhos que encerram sua vig�ncia
			em julho de 2016 ser�o classificados em quartil superior para realizar apresenta��o oral no XXIV SEMIC, os demais 
			trabalhos participar�o da sess�o de p�ster. Essa classifica��o ser� a m�dia aritm�tica das notas obtidas nas tr�s etapas:
			 sumiss�o, relat�rio parcial e relat�rio final.
			Esse procedimento visa inserir o aluno de IC e IT em mais uma etapa da forma��o do pesquisador.  		
		<br>
		<br>
			Pedimos a sua especial aten��o para o preenchimento do campo 5, com coment�rios sobre a sua avalia��o geral do trabalho 
			desenvolvido. Esse feedback � preciso para o aluno, para o orientador e para a melhoria da qualidade dos programas como um todo.
		<br>
			No resultado da avalia��o, voc� dever� atribuir uma nota de 0-100 para o conjunto das informa��es apresentadas.	
		<br>
		<br>
		<b>Comit� Gestor</b>
		<br>
		<br>
		<br>
		<br>
		<fieldset class="form-group">
		<b>AVALIA��O</b>
		<br>
		<br>
		
		
		<!----------------- Quest�o 1 do RF----------------------------> 
		1) <?php echo $ob[1];?>
		<b>Clareza, legibilidade e objetividade (portugu�s, organiza��o geral do texto, figuras, gr�ficos,
		tabelas, refer�ncias, adequa��o do relat�rio ao modelo do Programa)</b>:
		<br>
		<input name="dd1" type="radio" value="20" <?php echo $chk[1][0];?> >
		Excelente
		<br>
		<input name="dd1" type="radio" value="10" <?php echo $chk[1][1];?> >
		Bom <?php echo $color;?>(existem pequenos ajustes que precisem ser corrigidos, justificar)</font>
		<br>
		<input name="dd1" type="radio" value="5"  <?php echo $chk[1][2];?> >
		Regular <?php echo $color;?>(muitas corre��es s�o necess�rias, assinalar no campo dos coment�rios )</font>
		<br>
		<input name="dd1" type="radio" value="1"  <?php echo $chk[1][3];?> >
		Ruim <?php echo $color;?>(o relat�rio precisa ser refeito)</font>
		<br>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21;?></textarea>		
		
		
		<!----------------- Quest�o 2 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		2) <?php echo $ob[2];?>
		<b>Na estrutura��o do relat�rio, os itens: introdu��o, desenvolvimento, resultados, discuss�o, considera��es finais e 
			 refer�ncias bibliogr�ficas, est�o apresentados adequadamente, bem como, mant�m
		rela��o coerente entre si. Neste ponto este relat�rio est�</b>:
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
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd22" cols=80 rows=4 style="width: 100%"><?php echo $dd22;?></textarea>		
		
		
		<!----------------- Quest�o 3 do RF---------------------------->
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
		Bom <?php echo $color;?>(a maior parte das atividades previstas foram cumpridas. Houve algumas mudan�as
		nos objetivos e/ou cronograma, as quais foram devidamente justificadas)</font>
		<br>
		<input name="dd3" type="radio" value="5" <?php echo $chk[3][2];?> >
		Regular </font>
		<br>
		<input name="dd3" type="radio" value="1" <?php echo $chk[3][3];?> >
		Ruim <?php echo $color;?>(severo atraso no cronograma ou mudan�a n�o justificada ou n�o apropriada em
		rela��o aos objetivos iniciais propostos)</font>
		<br>
		<br>
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd23" cols=80 rows=4 style="width: 100%"><?php echo $dd23;?></textarea>		
		
		
		<!----------------- Quest�o 4 do RF---------------------------->
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
		Bom <?php echo $color;?>(dados obtidos s�o adequados, bem como a an�lise)</font>
		<br>
		<input name="dd4" type="radio" value="5" <?php echo $chk[4][2];?> >
		Regular <?php echo $color;?>(dados obtidos n�o foram analisados, dificultando a avalia��o da sua relev�ncia no contexto do projeto )</font>
		<br>
		<input name="dd4" type="radio" value="1" <?php echo $chk[4][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<!--
		<input name="dd4" type="radio" value="19" <?php echo $chk[4][4];?> >
		N�o se aplica <?php echo $color;?>(de acordo com o cronograma inicial apresentado, n�o � esperado a apresenta��o de resultados nesta etapa do trabalho)</font>
		-->
		<br>
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd24" cols=80 rows=4 style="width: 100%"><?php echo $dd24;?></textarea>		
		
		
		<!----------------- Quest�o 5 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		5) <?php echo $ob[5];?>
		<b>Outros coment�rios</b>:
		<br>
		<br>
		O avaliador fica livre para suas sugest�es e coment�rios sobre a aprecia��o geral do trabalho:
		<br>
		<textarea name="dd25" cols=80 rows=4 style="width: 100%" id="dd25"><?php echo $dd25;?></textarea>		
		
		<!----------------- Quest�o 6 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		6) <?php echo $ob[6];?>
		<b>Resultado da avalia��o do relat�rio Final e do Resumo</b>:
		<br>
		<input name="dd6" type="radio" value="20" <?php echo $chk[6][0];?> >
		Relat�rio final aprovado com m�rito.</font>
		<br>
		<input name="dd6" type="radio" value="10" <?php echo $chk[6][1];?> >
		Relat�rio final aprovado. As sugest�es apresentadas devem ser incorporadas para a apresenta��o no XXIV SEMIC.</font>
		<br> 
		<input name="dd6" type="radio" value="2" <?php echo $chk[6][2];?> >
		Relat�rio final com pend�ncia, submeter novamente ap�s realizar as corre��es.</font>
		<br>
		<input name="dd6" type="radio" value="99" <?php echo $chk[6][3];?> >
		Trabalho n�o indicado para apresenta��o p�blica.</font>

		
		<!----------------- Quest�o 7 do RF---------------------------->
		<br>
		<br>
		<br>
		<br>
		7) <?php echo $ob[7];?><b>Considerando o relat�rio como um todo, assinale atribua uma nota de 0 a 10,0</b>
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
		<input type="submit" name="acao" value="Finalizar a avalia��o >>>" class="btn btn-primary">
		</td>
	</tr>
	</fieldset>
</table>
</form>