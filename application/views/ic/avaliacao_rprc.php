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
		$ob = array('','','','','','','','','','','','','');
		
		$acao = get("acao");
		if (strlen($acao) > 0)
			{
				$obr = '<img src="'.base_url('img/icon/icone_exclamation.png').'" height="30" align="left">';
				if ((strlen($dd1) == 0) or (strlen($dd21)==0)) { $ob[1] = $obr; }
				if ((strlen($dd2) == 0) or (strlen($dd22)==0)) { $ob[2] = $obr; }
				if ((strlen($dd3) == 0) or (strlen($dd23)==0)) { $ob[3] = $obr; }
				if ((strlen($dd4) == 0) or (strlen($dd24)==0)) { $ob[4] = $obr; }
				if ((strlen($dd5) == 0) or (strlen($dd25)==0)) { $ob[5] = $obr; }
				if ((strlen($dd6) == 0) 					 ) { $ob[6] = $obr; }
				if ((strlen($dd7) == 0) 					 ) { $ob[7] = $obr; }
				if (					   (strlen($dd28)==0)) { $ob[8] = $obr; }
				if ((strlen($dd9) == 0) 				     ) { $ob[9] = $obr; }
				if ((strlen($dd10) == 0)) { $ob[10] = $obr; }
			}		
		
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
		if ($dd9=='2') { $chk[9][2] = 'checked'; }
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
		relacionados com a opção assinalada. 
		<br>
		<br>
		Após a sua avaliação, o parecer será enviado ao professor orientador para conhecimento. 
		Nosso intuito é que aluno e professor orientador recebam seu feedback qualitativo e, a partir
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
		<!----------------- item 1 ----------------------------> 1) <?php echo $ob[1];?><b>As correções solicitadas foram realizadas?</b>:
		<br>
		<input name="dd1" type="radio" value="20" <?php echo $chk[1][0];?> >
		Sim, integralmente
		<br>
		<input name="dd1" type="radio" value="10" <?php echo $chk[1][1];?> >
		Sim, parcialmente</font>
		<br>
		<input name="dd1" type="radio" value="5"  <?php echo $chk[1][2];?> >
		Não</font>
		<br>
		<br>
		Comentários sobre sua avaliação deste item (obrigatório):
		<br>
		<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21;?></textarea>		<!----------------- item 2 ---------------------------->
		<br>
		<br>
		<br>
		<br>
		2) <?php echo $ob[2];?><b>Os itens descritos na questão 1 (se aplicável) poderão ser corrigidos no relatório final?</b>:
		<br>
		<input name="dd2" type="radio" value="20" <?php echo $chk[2][0];?> >
		Sim
		<br>
		<input name="dd2" type="radio" value="10" <?php echo $chk[2][1];?> >
		Não
		<br>
		<input name="dd2" type="radio" value="1" <?php echo $chk[2][2];?> >
		Não aplicável
		<br>
		<br>
		<br>
		3) <?php echo $ob[9];?><b>Resultado da reavaliação</b>:
		<br>
		<input name="dd9" type="radio" value="1" <?php echo $chk[9][1];?> >
		<font color="green"><B>APROVADO</B></font>.
		<br>
		<input name="dd9" type="radio" value="2" <?php echo $chk[9][2];?> >
		<font color="red"><B>ENVIO PARA O COMITÊ GESTOR</B></font> - com indicação de cancelamento do projeto.
		<!----------------- item 10 ---------------------------->
		<br>
		<br>
		<br>
		<input type="submit" name="acao" value="Finalizar avaliação >>>" class="botao3d back_green_shadown back_green">
		</td>
	</tr>
</table>
</form>