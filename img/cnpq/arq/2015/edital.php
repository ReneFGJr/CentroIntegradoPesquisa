<?php

if ($_GET['printer']=='S')
{
$include = '../';
require("../db.php");
require('../_class/_class_pibic_projetos_v2.php');
require($include.'sisdoc_colunas.php');
require($include.'sisdoc_autor.php');

$relatorio_titulo = "Edital ".$dd[1]." ".date("Y")."/".(date("Y")+1)." - Resultado do Processo de Sele��o de Bolsas de Inicia��o Cient�fica";
$edital = new projetos;
?>
<link rel="STYLESHEET" type="text/css" href="../css/ic-edital.css">
<body topmargin="0" leftmargin="0" rightmargin="0">
<TABLE width="100%">
	<TR>
		<TD width="30%" valign="top">
		<img src="../img/logo_ic_pibic.png" height="80" alt="" border="0">
		</TD>
		<TD class="lt5" align="center"><?=$relatorio_titulo;?><?=$tit1;?></TD>
		<TD width="30%" align="right" valign="top"><NOBR>
		<img src="img/logo_pucpr.jpg" height="90" alt="" border="0">&nbsp;
		<img src="img/logo_re2ol.jpg" height="0" alt="" border="0">&nbsp;
		<img src="img/logo_fundacao_araucaria.jpg" height="50" alt="" border="0">
		</TD>
	</TR>
</TABLE>
<?
	$tit1 = " "; 
	$hb = '<table class="lt0" width="100%"><TR>';
	$hb .= '<TD>Bolsas:</TD>';
	//$hb .= '<TD><NOBR><img src="img/logo_cnpq_mini.jpg" width="34" height="15" alt="" border="0"> CNPQ';
	//$hb .= '<TD><NOBR><img src="img/logo_fa_mini.jpg" width="34" height="15" alt="" border="0"> Funda��o Arauc�ria';
	$hb .= '<TD><NOBR><img src="img/logo_bolsa_N.png" width="34" height="15" alt="" border="0"> Funda��o Arauc�ria - Inclus�o Social';
	$hb .= '<TD><NOBR><img src="img/logo_pucpr_mini.jpg" width="34" height="15" alt="" border="0"> PUCPR';
	$hb .= '<TD><NOBR><img src="img/logo_bolsa_7.png" width="34" height="15" alt="" border="0"> Junventude';	
	$hb .= '<TD><NOBR><img src="img/logo_bolsa_U.png" width="34" height="15" alt="" border="0">';
	$hb .= '<NOBR>Bolsa de Inicia��o Cient�fica em �reas estrat�gicas - PUCPR</TD>';
	$hb .= '<TD><NOBR><img src="img/logo_bolsa_M.png" width="34" height="15" alt="" border="0">';
	$hb .= '<NOBR>Bolsa PUCPR Doutorando</TD>';
	$hb .= '<TD width="10%">&nbsp;</TD>';
	
	$hb .= '<TR>';
	$hb .= '<TD colspan="5"><img src="img/logo_icv_mini.jpg" width="34" height="15" alt="" border="0">';
	$hb .= ' Projeto aprovado para Inicia��o Cient�fica Volunt�ria (obrigatoriedade de ades�o para concorrer a bolsas desistentes)</TD>';

//	$hb .= '<TR>';
//	$hb .= '<TD colspan="5"><img src="img/logo_aprov_mini.jpg" width="34" height="15" alt="" border="0">';
//	$hb .= ' Projeto qualificado para Inicia��o Cient�fica (obrigatoriedade de ades�o a ICV para concorrer a bolsas desistentes)</TD>';

	$hb .= '<TR>';
//	$hb .= '<TD colspan="5"><img src="img/logo_gr2_mini.jpg" width="34" height="15" alt="" border="0">';
//  $hb .= ' Bolsa de Inicia��o Cient�fica concedida diretamente ao pesquisador em editais de org�os de fomento ou por empresas</TD>';

//	$hb .= '<TR>';
//	$hb .= '<TD colspan="5"><img src="img/logo_estra_mini.jpg" width="34" height="15" alt="" border="0">';
//	$hb .= ' Bolsa de Inicia��o Cient�fica concedida a projetos em �reas estrat�gicas</TD>';

	$hb .= '</table>';
	
	echo $hb;
} else {
	require("cab.php");
	require('../_class/_class_pibic_projetos.php');
	require($include.'sisdoc_colunas.php');
	require($include.'sisdoc_autor.php');
	echo '11';
	$relatorio_titulo = "Edital PIBIC ".date("Y")."/".(date("Y")+1)." - Resultado do Processo de Sele��o de Bolsas de Inicia��o Cient�fica";
	$edital = new pibic_projetos;	
		
}
echo $edital->mostra_edital(date("Y"),$dd[3].$dd[0],$dd[1],'F');
?>
