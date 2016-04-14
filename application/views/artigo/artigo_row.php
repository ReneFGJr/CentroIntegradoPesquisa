<?php
if (!isset($editar)) { $editar = 0;
}
$ft = '';
$ff = '';

if ($ar_status == 9)
	{
		$ft = '<font color="red"><strike>';
		$ff = '</strike></font>';
	}
	
$sx = '';
/* LINKS */
$link = '<a href="' . base_url('index.php/artigo/detalhe/' . $id_ar . '/' . checkpost_link($id_ar)) . '" class="link lt2">';

$sx .= '<tr valign="top">';
$sx .= '<td class="border1"align="center">' . $link . $ar_protocolo . $ff. '</a>' . '</td>';
$sx .= '<td class="border1"align="center">' . $ft . $ar_titulo . $ff. '</td>';
$sx .= '<td class="border1" align="center">' . $ft . $ar_journal ;
if (strlen($ar_vol) > 0) { $sx .= ', v.'.$ar_vol; }
if (strlen($ar_num) > 0) { $sx .= ', n.'.$ar_num; }
if (strlen($ar_pags) > 0) { $sx .= ', p.'.$ar_pags; }
if (strlen($ar_ano) > 0) { $sx .= ', '.$ar_ano; }
$sx .= $ff;
$sx .= '</td>';
$sx .= '<td class="border1" align="center">' . $ar_a . '</td>';
$sx .= '<td class="border1" align="center">' . $ar_q . '</td>';

$sx .= '<td class="border1" align="center"><nobr>' . stodbr($ar_update) . '</nobr></td>';


$cor = '<font>';
$situacao = trim($cas_descricao);
$cs_cor = '';
if (strlen($cs_cor) > 0) {
	$cor = '<font color="' . $cs_cor . '">';
}
if (strlen($situacao) == 0) {
	$situacao = $ar_status;
}

$sx .= '<td class="border1" align="center">' . $cor . $situacao . '</font>' . '</td>';
$sx .= '<td class="border1" align="center">&nbsp;' . link_user($us_nome,$id_us) . '&nbsp;</td>';
/* Modo editar */
if ($editar == 1) {
	$sx .= '<td align="center" class="border1">';
	switch($ca_status) {
		case '1' :
			$sx .= '<a href="' . base_url('index.php/captacao/editar/' . $id_ca . '/' . checkpost_link($id_ca)) . '" class="link lt2">';
			$sx .= 'editar';
			$sx .= '</a>';
			break;

		case '8' :
			$sx .= '<a href="' . base_url('index.php/captacao/corrigir/' . $id_ca . '/' . checkpost_link($id_ca)) . '" class="link lt2">';
			$sx .= 'corrigir';
			$sx .= '</a>';
			break;
	}
	$sx .= '</td>';
}
$sx .= '</tr>';
echo $sx;
?>