<?php
$cp = array();
$nota = '0:ZERO';
$nota2 = '0:ZERO';
$nota2 = '110:10.0 com mérito';
for ($r=100; $r > 0;$r = $r - 5)
	{
		$nota .= '&'.$r.':'.number_format($r/10,1);
		$nota2 .= '&'.$r.':'.number_format($r/10,1);
	}
	
$ops = array();
$ops[0] = 'professor orientador presente';
$ops[1] = 'professor ausente, enviou representante e justificativa por escrito';
$ops[2] = 'professor ausente, enviou representante sem justificativa por escrito';
$ops[3] = 'professor ausente e estudante justificou que o professor está atuando como avaliador';
$ops[3] = 'professor ausente sem justificativa';
$op1 = '0:'.$ops[0];
$op1 .= '&1:'.$ops[1];
$op1 .= '&2:'.$ops[2];
$op1 .= '&3:'.$ops[3];

$ope = array();
$ope[0] = 'estudante presente';
$ope[1] = 'estudante ausente';
$ope[2] = 'estudante ausente, pôster na fixado';
$op2 = '0:'.$ops[0];
$op2 .= '&1:'.$ops[1];
$op1 .= '&2:'.$ops[2];


$sn = 'NÃO:NÃO&SIM:SIM';
array_push($cp,array('$H8','id_pp','',False,False));
array_push($cp,array('$HV '.$nota,'pp_01','0',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Poder de Síntese',True,True));
/* 1 */
$m1 = 'o estudante foi capaz de apresentar de forma clara e objetiva a questão central da pesquisa, a metodologia desenvolvida, pontos relevantes da discussão e das considerações finais.';
array_push($cp,array('$M','',$m1,True,True));

array_push($cp,array('$O '.$nota,'pp_01','Contribuição para formação científica',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Conteúdo',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Qualidade Visual',True,True));
array_push($cp,array('$O '.$nota,'pp_01','Desempenho do Aluno',True,True));
array_push($cp,array('$O '.$op1,'pp_01','Sobre a presença do professor orientador',True,True));
array_push($cp,array('$O '.$op2,'pp_01',' Sobre a presença do estudante',True,True));
array_push($cp,array('$O '.$nota2,'pp_01','Dê uma nota geral para a exposição como um todo',True,True));
array_push($cp,array('$B8','','Finalizar >>',False,False));
$form = new form;
$form->css_select = 'form_select_semic';

$tela = $form->editar($cp,'');

echo '<table width="1024" cellpadding=0 cellspacing=0 align="center" border=1><tr><td>';
echo $tela;
echo '</td></tr></table>';
?>
