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
<h1>Ficha de avalia��o do Relat�rio Parcial</h1>
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
		Para cada pergunta abaixo haver� um campo de preenchimento obrigat�rio para seus coment�rios
		relacionados com a op��o assinalada. Informamos que as frases na cor azul s�o informativas e restritas
		aos avaliadores e tem o prop�sito de dar uma uniformidade m�nima nas avalia��es.
		<br>
		<br>
		Ap�s a sua avalia��o, o parecer ser� enviado ao professor orientador para conhecimento e corre��es, se
		for o caso. Nosso intuito � que aluno e professor orientador recebam seu feedback qualitativo e, a partir
		destes, poder�o aprimorar o andamento da pesquisa e o aprendizado do aluno.
		Agradecemos imensamente sua participa��o e colabora��o.
		<br>
		<br>
		<b>Comit� Gestor</b>
		<br>
		<br>
		<br>
		<br>
		<b>AVALIA��O</b>
		<br>
		<br>
		<!----------------- item 1 ----------------------------> 1) <b>Clareza, legibilidade e objetividade (portugu�s, organiza��o geral do texto, figuras, gr�ficos,
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
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21;?></textarea>		<!----------------- item 2 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		2) <b>Na estrutura��o do relat�rio, os itens: introdu��o, desenvolvimento, resultados parciais, etapas
		futuras e refer�ncias bibliogr�ficas, est�o apresentados adequadamente, bem como, mant�m
		rela��o coerente entre si. Neste ponto este relat�rio est�</b>:
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
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd22" cols=80 rows=4 style="width: 100%"><?php echo $dd22;?></textarea>		<!----------------- item 3 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		3) <b>Cumprimento do cronograma previsto</b>:
		<br>
		<input name="dd3" type="radio" value="20" <?php echo $chk[3][0];?> >
		Excelente <?php echo $color;?>( as atividades est�o sendo realizadas dentro do cronograma previsto)</font>
		<br>
		<input name="dd3" type="radio" value="10" <?php echo $chk[3][1];?> >
		Bom <?php echo $color;?>(a maior parte das atividades previstas foram cumpridas. Houve algumas mudan�as
		nos objetivos e/ou cronograma, as quais foram devidamente justificadas)</font>
		<br>
		<input name="dd3" type="radio" value="5" <?php echo $chk[3][2];?> >
		Regular <?php echo $color;?>(importante atraso no cronograma que poder� comprometer o cumprimento dos
		objetivos inicias propostos. H� necessidade de ajuste no cronograma e/ou objetivos do projeto. Justificativas devem ser apresentadas )</font>
		<br>
		<input name="dd3" type="radio" value="1" <?php echo $chk[3][3];?> >
		Ruim <?php echo $color;?>(severo atraso no cronograma ou mudan�a n�o justificada ou n�o apropriada em
		rela��o aos objetivos iniciais propostos)</font>
		<br>
		Coment�rios sobre sua avalia��o deste item:
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
		Bom <?php echo $color;?>(dados obtidos s�o adequados, bem como a an�lise preliminar. Na pr�xima  etapa deve haver complementa��o e aprofundamento)</font>
		<br>
		<input name="dd4" type="radio" value="5" <?php echo $chk[4][2];?> >
		Regular <?php echo $color;?>(dados obtidos n�o foram analisados, dificultando a avalia��o da sua relev�ncia no contexto do projeto )</font>
		<br>
		<input name="dd4" type="radio" value="1" <?php echo $chk[4][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<input name="dd4" type="radio" value="19" <?php echo $chk[4][4];?> >
		N�o se aplica <?php echo $color;?>(de acordo com o cronograma inicial apresentado, n�o � esperado a apresenta��o de resultados nesta etapa do trabalho)</font>
		<br>
		Coment�rios sobre sua avalia��o deste item:
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
		As atividades descritas n�o est�o adequadas para uma proposta de IC <?php echo $color;?>(obrigat�ria a modifica��o, ver justificativa)</font>
		<br>
		<input name="dd5" type="radio" value="10" <?php echo $chk[5][1];?> >
		As atividades descritas s�o parcialmente v�lidas para IC <?php echo $color;?>( sugerir modifica��es na justificativa)</font>
		<br>
		<input name="dd5" type="radio" value="5" <?php echo $chk[5][2];?> >
		as atividades descritas s�o adequadas para a forma��o do aluno de IC.
		<br>
		<input name="dd5" type="radio" value="1" <?php echo $chk[5][3];?> >
		Ruim. <?php echo $color;?>(poucos ou nenhum resultado relevante no contexto do projeto foram apresentados)</font>
		<br>
		<input name="dd5" type="radio" value="19" <?php echo $chk[5][4];?> >
		N�o se aplica.
		<br>
		Coment�rios sobre sua avalia��o deste item:
		<br>
		<textarea name="dd25" cols=80 rows=4 style="width: 100%"><?php echo $dd25;?></textarea>		<!----------------- item 6 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		6) <b>O relat�rio parcial apresenta graves problemas relacionados a orienta��o desenvolvida e/ou
		problemas metodol�gicos que comprometem a forma��o do aluno de inicia��o cient�fica.
		Indique tais problemas no campo de coment�rios restrito. O avaliador considera que deve ser
		realizada uma reuni�o com o professor orientador</b>?
		<br>
		<input name="dd6" type="radio" value="2" <?php echo $chk[6][2];?> >
		N�O
		<br>
		<input name="dd6" type="radio" value="1" <?php echo $chk[6][1];?> >
		SIM <!----------------- item 7 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		<?php 
		if ($mb_tipo == 'PIBIC') { ?>
		7) <b>O projeto apresenta teor de tecnologia e inova��o, portanto, seria indicado que migrasse para o PIBITI.</b>
		<br>
		<input name="dd7" type="radio" value="2" <?php echo $chk[7][2];?> >
		N�O
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
		8) <b>Outros coment�rios (o avaliador fica livre para suas sugest�es e coment�rios sobre a aprecia��o geral do trabalho)</b>:
		<br>
		<textarea name="dd28" cols=80 rows=4 style="width: 100%"><?php echo $dd28;?></textarea>		<!----------------- item 9 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		9) <b>Resultado da avalia��o</b>:
		<br>
		<input name="dd9" type="radio" value="1" <?php echo $chk[9][1];?> >
		<font color="green"><B>APROVADO</B></font> - coment�rios e sugest�es dever�o ser incorporados no relat�rio final. Sugerimos que a pontua��o atribu�da seja de 7,0 a 10,0.
		<br>
		<input name="dd9" type="radio" value="-1" <?php echo $chk[9][2];?> >
		<font color="red"><B>PEND�NCIAS</B></font> - relat�rio parcial deve ser reapresentado realizando as devidas corre��es. Sugerimos que a pontua��o atribu�da seja abaixo de 7,0. 
		<!----------------- item 10 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		10) <b>Considerando o relat�rio como um todo, assinale atribua uma nota de 0 a 10,0.</b>:
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
		<input type="submit" name="acao" value="Finalizar avalia��o >>>" class="botao3d back_green_shadown back_green">
		</td>
	</tr>
</table>
</form>