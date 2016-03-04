<?php
$cp = array();
$nota = '0:ZERO';
$nota2 = '0:ZERO';
$nota2 .= '&110:10.0 com m�rito';
for ($r = 100; $r > 0; $r = $r - 5) {
	$nota .= '&' . $r . ':' . number_format($r / 10, 1);
	$nota2 .= '&' . $r . ':' . number_format($r / 10, 1);
}

$ops = array();
$ops[0] = 'professor orientador presente';
$ops[1] = 'professor ausente, enviou representante e justificativa por escrito';
$ops[2] = 'professor ausente, enviou representante sem justificativa por escrito';
$ops[3] = 'professor ausente e estudante justificou que o professor est� atuando como avaliador';
$ops[4] = 'professor ausente sem justificativa';
$ops[9] = '';
$op1 = '0:' . $ops[0];
$op1 .= '&1:' . $ops[1];
$op1 .= '&2:' . $ops[2];
$op1 .= '&3:' . $ops[3];
$op1 .= '&4:' . $ops[4];
$ido = 9;

$ope = array();
$ope[0] = 'estudante presente';
$ope[1] = 'estudante ausente, trabalho apresentado pelo professor';
$ope[2] = 'p�ster afixado e estudante ausente';
$ope[3] = 'estudante ausente e p�ster n�o afixado';
$ope[9] = '';
$op2  = '0:'  . $ope[0];
$op2 .= '&1:' . $ope[1];
$op2 .= '&2:' . $ope[2];
$op2 .= '&2:' . $ope[3];
$ids = 9;

$sn = 'N�O:N�O&SIM:SIM';
array_push($cp, array('$H8', 'id_pp', '', False, False));
array_push($cp, array('$HV', 'pp_data_leitura', date('Y-m-d'), True, True));
array_push($cp, array('$HV', 'pp_hora', date('H:i'), True, True));

array_push($cp, array('$HV', 'pp_status', 'A', True, True));

/* 1 */
$m1 = '<br><fonr class="lt1">Capacidade do estudante em apresentar de forma clara e objetiva a quest�o central da pesquisa, a metodologia desenvolvida, pontos relevantes da discuss�o e das considera��es finais.</font>';
array_push($cp, array('$O ' . $nota, 'pp_p01', 'Poder de S�ntese' . $m1, True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));

/* 2 */
$m2 = '<br><font class="lt1">A pesquisa foi desenvolvida de modo efetivo para que o estudante ingresse no universo da ci�ncia. Foi poss�vel identificar que o estudante depreendeu, a partir do percurso realizado, os pontos nodais do desenvolvimento de uma pesquisa</font>';
array_push($cp, array('$O ' . $nota, 'pp_p02', 'Contribui��o para forma��o cient�fica' . $m2, True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));

/* 3 */
$m3 = '<br><font class="lt1">Identificam-se na apresenta��o oral as etapas da pesquisa que foram desenvolvidas? Est�o de acordo com o que � esperado para a metodologia cient�fica e reda��o cient�fica</font>';
array_push($cp, array('$O ' . $nota, 'pp_p03', 'Conte�do' . $m3, True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));

/* 4 */
$m4 = '<br><font class="lt1">A qualidade visual dos slides � adequada e valoriza a exposi��o da pesquisa desenvolvida</font>';
array_push($cp, array('$O ' . $nota, 'pp_p04', 'Qualidade Visual' . $m4, True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));

array_push($cp, array('$R ' . $op2, 'pp_p05', ' Sobre a presen�a do estudante', True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));
array_push($cp, array('$HV', 'pp_abe_01', $ops[$ids], false, True));
/* 5 */
$m5 = '<br><font class="lt1">Soube apresentar as informa��es relevantes da pesquisa desenvolvida? Inclua neste item: vocabul�rio e postura adequados; foi capaz responder a argui��o do avaliador.</font>';
array_push($cp, array('$O ' . $nota, 'pp_p06', 'Desempenho do Aluno' . $m5, True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));

array_push($cp, array('$R ' . $op1, ' ', 'Sobre a presen�a do professor orientador', True, True));
array_push($cp, array('$M', '', '&nbsp;', false, false));
array_push($cp, array('$HV', 'pp_abe_02', $ope[$ido], false, True));
array_push($cp, array('$HV', 'pp_p19', 'POSTE', false, True));

/* FINAL */
$mg = '<br><font class="lt0">Considerando todos os crit�rios anteriores, d� uma nota de 0 a 10. Se o trabalho tiver m�rito para concorrer ao melhor trabalho de cada grande �rea (C. Exatas e Engenharias; C. Agr�rias; C. da Vida; C. Humanas; C. Sociais Aplicadas), assinale 10 com m�rito. </font>';
array_push($cp, array('$O ' . $nota2, 'pp_p08', 'D� uma nota geral para a exposi��o como um todo' . $mg, True, True));
array_push($cp, array('$B8', '', 'Finalizar >>', False, False));
$form = new form;
$form -> css_select = 'form_select_semic';

$tabela = 'pibic_parecer_' . date("Y");
$form -> id = $idpp;

$tela = $form -> editar($cp, $tabela);

if ($form -> saved > 0) {
	$bloco = $st_bloco_poster;
	$url = base_url('index.php/semic_avaliacao/bloco/' . $bloco . '/' . checkpost_link($bloco));
	redirect($url);
}

echo '<center>';
echo '<table width="940" cellpadding=0 cellspacing=0 align="center" border=0><tr><td>';
echo '<font class="lt6"><b>Ficha de Avalia��o - P�STER</b></font>';
echo $tela;
echo '</td></tr></table>';
?>
