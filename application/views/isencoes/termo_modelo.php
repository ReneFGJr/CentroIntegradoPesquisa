<?php
switch ($bn_modalide)
	{
	case 'M': $modalidade = 'Mestrado'; break;
	case 'D': $modalidade = 'Doutorado'; break;	
	default:
		$modalidade = 'N�o informada';
		break;
	}
$agencia = '';
if (strlen($agf_nome) > 0)
	{
		$agencia = ', financiado por <B>'.$agf_nome.'</B>';	
	}
?>
<table width="100%">
	<tr><td align="center">
<h1>Termo de Isen��o para Estudante de <?php echo $modalidade;?>
</h1>
</td></tr>
</table>


<h4>Dados do professor orientador</h4>
<table width="100%" >
	<tr><td width="20%" style="font-size: 10px;" align="right">ORIENTADOR &nbsp;</td>
		<td width="80%" style="font-size: 13px;"> <b><?php echo UpperCase($pr_nome); ?></b></td></tr>
	<tr><td width="20%" style="font-size: 10px;" align="right">CPF &nbsp;</td>
		<td width="80%" style="font-size: 11px;"> <b><?php echo mask_cpf($pr_cpf);?></b></td></tr>
	<tr><td width="20%" style="font-size: 10px;" align="right">PROGRAMA &nbsp;</td>
		<td width="80%" style="font-size: 11px;"> <b><?php echo $pp_nome;?></b></td></tr>	
</table>


<h4>Dados do estudante</h4>
<table width="100%" >
	<tr><td width="20%" style="font-size: 10px;" align="right">ESTUDANTE &nbsp;</td>
		<td width="80%" style="font-size: 13px;"> <b><?php echo UpperCase($al_nome);?></b></td></tr>
	<tr><td width="20%" style="font-size: 10px;" align="right">CPF &nbsp;</td>
		<td width="80%" style="font-size: 11px;"> <b><?php echo mask_cpf($al_cpf);?></b></td></tr>
	<tr><td width="20%" style="font-size: 10px;" align="right">MODALIDADE &nbsp;</td>
		<td width="80%" style="font-size: 11px;"> <b><?php echo $modalidade;?></b></td></tr>	
</table>

<br><br><br>

<font style="font-size: 11px"><b>Condi��es Gerais</b></font><br>

<font style="font-size: 10px"><br>
Ao aceitar a concess�o, que ora lhe � feita, compromete-se o(a) bolsista a:<br><br>
a) Dedicar-se no m�nimo 20 horas semanais ao programa;<br>
b) Manter um bom desempenho acad�mico que ser� atestado pela Comiss�o de Bolsas do PPG;<br>
c) Observar as determina��es do(a) orientador(a) alusivas ao bom desenvolvimento da do seu projeto pesquisa.<br>
<br>
<br>
Protocolo de isen��o <b><?php echo $bn_codigo;?></b> referente ao protocolo de capta��o <?php echo $bn_original_protocolo;?>
 - "<b><?php echo $ca_titulo_projeto;?></b>" <?php echo $agencia;?>.
<br>
<br>
<br>
<br>
<br>
<br>
<table width="100%">
	<tr>
		<td>_____________________________________</td>
		<td>_____________________________________</td>
	</tr>
	<tr>
		<td>Assinatura do Estudante<br><?php echo UpperCase($al_nome);?></td>
		<td>Assinatura do Orientador<br><?php echo UpperCase($pr_nome);?></td>
	</tr>
	
	<tr><td><br><br></td></tr>
	<tr><td><br><br></td></tr>
	
	<tr>
		<td>_____________________________________</td>
		
	</tr>
	
	<tr>
		<td>Assinatura do Coordenador do Programa<br><?php echo UpperCase($co_nome);?></td>
		
	</tr>	
	<tr>
		<td></td>
		<td align="right">Curitiba, <?php echo round(date("d")).' de '.meses(round(date("m"))).' de '.date("Y");?>.</td>		
	</tr>	
</table>
</font><br>

<br>