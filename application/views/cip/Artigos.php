<?php
$qualificacao = '
Qualis: <font color="blue">'.$ar_a.'</font><br>
Scopus Q: <font color="blue">'.$ar_q.'</font><br>
Excelence Rate: <font color="blue">'.$ar_er.'</font><br>
Colaboração: <font color="blue">'.msg('colaboracao_'.$ar_colaboracao).'</font><br>
Estudante: <font color="blue">'.msg('colaboracao_'.$ar_estudante).'</font>
<br>';
$ar_v6 = 0;
$art_total = $ar_v1 + $ar_v2 + $ar_v3 + $ar_v4 + $ar_v5 + $ar_v6;

?>
<h1><?php echo msg("bonificacao_artigo");?></h1>
<table cellpadding="0" border=0 cellspacing="4" class="tabela01 lt1" width="100%">
	<tr valign="top">
		<td width="150"><?php $this -> load -> view('gadget/progressbar_vertical');?></td>
		<td><h3>Dados do professor</h3><!--- Dados do usuario --><span></span><?php $this -> load -> view("usuario/view", $data);?>
		<hr size=1 width="50%">
		<h3>Dados do artigo</h3>
		<table width="100%" border=0 cellpadding="0" cellspacing="4" class="tabela01 lt1" >
			<tr valign="top">
				<td align="right" width="15%"><?php echo msg('art_titulo');?></td>
				<td class="lt3"><b><?php echo $ar_titulo;?></b></td>
				<td rowspan=10><!----------------- Valor da bonificacao ------>
				<table class="lt1" width="180">
					<th colspan=2><?php echo msg('art_valor_bonificacao');?>
					<?php
					/* Ativa editar para Diretoria de Pesquisa */
					if (perfil("#ADM#COO#CPS")) {
						echo ' | <A href="#" class="lt0 link">editar</A>';
					}
					?></th>
					<tr>
						<td align="right" width="40%"><?php echo msg("article_A1");?><td  align="right" ><b><?php echo number_format($ar_v1, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_A2");?><td  align="right" ><b><?php echo number_format($ar_v2, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_Q1");?><td  align="right" ><b><?php echo number_format($ar_v3, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_ExR");?><td  align="right" ><b><?php echo number_format($ar_v4, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_CI");?><td  align="right" ><b><?php echo number_format($ar_v5, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_CE");?><td  align="right" ><b><?php echo number_format($ar_v6, 2, ',', '.');?></b></td>
					</tr>
					<tr>
						<td align="right"><?php echo msg("article_total");?><td class="lt3" style="border-top: 1px solid #333;" align="right" ><b><?php echo number_format($art_total, 2, ',', '.');?></b></td>
					</tr>
					<tr></tr>
				</table><!----------------- Fim do Valor da bonificacao ------></td>
			</tr>
			<tr valign="top">
				<td align="right"><?php echo msg('art_journal');?></td>
				<td class="lt1"><b><?php echo $ar_journal . ', v. ' . $ar_vol . ', n. ' . $ar_num . ', p. ' . $ar_pags . ', ' . $ar_ano . ', ISSN: ' . $ar_issn;?></b></td>
			</tr>
			<tr valign="top">
				<td align="right"><?php echo msg('art_qualificacao');?></td>
				<td class="lt1"><?php echo $qualificacao;?></td>
			</tr>
		</table>
</table>
</table>