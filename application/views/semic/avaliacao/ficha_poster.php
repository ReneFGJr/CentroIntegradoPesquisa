<?php
$cp = array();
$nota = '0:ZERO';
$nota2 = '0:ZERO';
$nota2 = '110:10.0 com m�rito';
for ($r=100; $r > 0;$r = $r - 5)
	{
		$nota .= '&'.$r.':'.number_format($r/10,1);
		$nota2 .= '&'.$r.':'.number_format($r/10,1);
	}
	
$ops = array();
$ops[0] = 'professor orientador presente';
$ops[1] = 'professor ausente, enviou representante e justificativa por escrito';
$ops[2] = 'professor ausente, enviou representante sem justificativa por escrito';
$ops[3] = 'professor ausente e estudante justificou que o professor est� atuando como avaliador';
$ops[3] = 'professor ausente sem justificativa';
$op1 = '0:'.$ops[0];
$op1 .= '&1:'.$ops[1];
$op1 .= '&2:'.$ops[2];
$op1 .= '&3:'.$ops[3];

$ope = array();
$ope[0] = 'estudante presente';
$ope[1] = 'estudante ausente';
$ope[2] = 'estudante ausente, p�ster na fixado';
$op2 = '0:'.$ops[0];
$op2 .= '&1:'.$ops[1];
$op1 .= '&2:'.$ops[2];


$sn = 'N�O:N�O&SIM:SIM';
array_push($cp,array('$H8','id_pp','',False,False));
array_push($cp,array('$HV '.$nota,'pp_01','0',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Poder de S�ntese',True,True));
/* 1 */
$m1 = 'o estudante foi capaz de apresentar de forma clara e objetiva a quest�o central da pesquisa, a metodologia desenvolvida, pontos relevantes da discuss�o e das considera��es finais.';
array_push($cp,array('$M','',$m1,True,True));

array_push($cp,array('$O '.$nota,'pp_01','Contribui��o para forma��o cient�fica',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Conte�do',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Qualidade Visual',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Desempenho do Aluno',True,True));
array_push($cp,array('$O '.$op1,'pp_01','Sobre a presen�a do professor orientador',True,True));
array_push($cp,array('$O '.$op2,'pp_01',' Sobre a presen�a do estudante',True,True));
array_push($cp,array('$O '.$nota2,'pp_01','D� uma nota geral para a exposi��o como um todo',True,True));
array_push($cp,array('$B8','','Finalizar >>',False,False));
$form = new form;
$form->css_select = 'form_select_semic';

$tela = $form->editar($cp,'');

echo '<table width="1024" cellpadding=0 cellspacing=0 align="center" border=1><tr><td>';
echo $tela;
echo '</td></tr></table>';
?>
