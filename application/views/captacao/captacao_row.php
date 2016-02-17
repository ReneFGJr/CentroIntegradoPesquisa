<?php
if (!isset($editar)) { $editar = 0;
}

$sx = '';
/* LINKS */
$link = '<a href="' . base_url('index.php/captacao/view/' . $id_ca . '/' . checkpost_link($id_ca)) . '" class="link lt2">';

$sx .= '<tr valign="top">';
$sx .= '<td class="border1"align="center">' . $link . $ca_protocolo . '</a>' . '</td>';
$sx .= '<td class="border1"align="center">' . $ca_agencia . '</td>';
$sx .= '<td class="border1" align="center">' . $ca_processo . '</td>';
$sx .= '<td class="border1">' . $ca_descricao . '</td>';

$sx .= '<td class="border1" align="center"><nobr>' . stodbr($ca_lastupdate) . '</nobr></td>';

$vg = $ca_vigencia_final_ano;
$vg_ini = substr($vg, 5, 2) . '/' . substr($vg, 0, 4);
$sx .= '<td class="border1"align="center">' . $vg_ini . '</td>';

$sx .= '<td class="border1" align="center">' . $ca_duracao . '</td>';

$sx .= '<td class="border1" align="center">&nbsp;' . $ca_vigencia_prorrogacao . '&nbsp;</td>';

$sx .= '<td class="border1">' . $cp_descricao . '</td>';

$sx .= '<td align="right" class="border1">' . number_format($ca_vlr_total, 2, ',', '.') . '</td>';
$sx .= '<td align="right" class="border1">' . number_format($ca_proponente_vlr, 2, ',', '.') . '</td>';

if ($ca_insticional == '1') {
	$sx .= '<td class="border1" align="center">SIM</td>';
} else {
	$sx .= '<td class="border1">&nbsp;</td>';
}
$cor = '<font>';
$situacao = trim($cs_situacao);
if (strlen($cs_cor) > 0) {
	$cor = '<font color="' . $cs_cor . '">';
}
if (strlen($situacao) == 0) {
	$situacao = $ca_status;
}

$sx .= '<td class="border1" align="center">' . $cor . $situacao . '</font>' . '</td>';

/* Modo editar */
if ($editar == 1) {
	$sx .= '<td align="center" class="border1">';
	if ($ca_status == 1) {
		$sx .= '<a href="' . base_url('index.php/captacao/editar/' . $id_ca . '/' . checkpost_link($id_ca)) . '" class="link lt2">';
		$sx .= 'editar';
		$sx .= '</a>';
	} else {
		$sx .= '&nbsp';
	}
	$sx .= '</td>';
}
$sx .= '</tr>';
echo $sx;
?>