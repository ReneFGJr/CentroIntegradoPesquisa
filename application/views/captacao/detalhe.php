<?php
if ($ca_vigencia_prorrogacao > 0) {
	$ca_vigencia_prorrogacao .= ' ' . msg('meses');
} else {
	$ca_vigencia_prorrogacao .= ' na ';
}

$indicacoes = '';
if (($ca_bonificacao == 1) or ($ca_isencao == 1)) {
	$s = '<br><table align="right" class="captacao_folha border1 black">';
	$s .= '<tr class="lt0"><td colspan=2>Indicações</td></tr>';
	$s .= '<tr>';
	if (($ca_bonificacao == 1)) {
		$s .= '<td align="right">';
		$s .= '<img src="' . base_url('img/icon/icone_label_3percente_green.png') . '" height="50" title="Bonificação">';
		$s .= '</td>';
	}
	if (($ca_isencao == 1)) {
		$s .= '<td align="right">';
		$s .= '<img src="' . base_url('img/icon/icone_label_isencao.png') . '" height="50" title="Isenção">';
		$s .= '</td>';
	}
	$s .= '</table>';
	$indicacoes = $s;
}

/* Editar */
$ca_editar = '';
$ca_editar2 = '';
if (perfil('#ADM#CPS')) {
	$linke = base_url('index.php/captacao/edit_ca/' . $id_ca . '/' . checkpost_link($id_ca));
	$ca_editar = '<a href="#" class="link lt0" onclick="newwin(\'' . $linke . '\',300,300);">editar</a>';
	
	$linkf = base_url('index.php/captacao/edit_cb/' . $id_ca . '/' . checkpost_link($id_ca));
	$ca_editar2 = '<a href="#" class="link lt0" onclick="newwin(\'' . $linkf . '\',300,300);">editar</a>';
}
?>
<h1>Projeto de Captação</h1>
<table class="tabela01" width="100%">
	<tr>
		<td class="lt0" colspan=4><?php echo msg('projeto'); ?></td>
		<td class="lt0" colspan=1 align="right"><?php echo msg('protocolo'); ?></td>
	</tr>
	<tr>
		<td class="lt4" colspan=4><b><?php echo $ca_descricao; ?></b>
			<br><?php echo $ca_editar2;?>
		</td>
		<td class="lt2" colspan=1 align="right"><?php echo $ca_protocolo . ''; ?></td>
	</tr>
	<tr valign="top">
		<td class="lt0" colspan=2><?php echo msg('participacao'); ?></td>
		<td class="lt0" colspan=2><?php echo msg('contexto'); ?></td>
		<td width="350" rowspan=10>
		<table width="350" class="captacao_folha black border1">
			<tr>
				<td align="right">Vlr. Total da Captação</td><td class="lt3" align="right"><b><?php echo number_format($ca_vlr_total, 2, ',', '.'); ?></b></td>
			</tr>
			<tr>
				<td align="right">Capital</td><td class="lt3" align="right"><?php echo number_format($ca_vlr_capital, 2, ',', '.'); ?></td>
			</tr>
			<tr>
				<td align="right">Custeio</td><td class="lt3" align="right"><?php echo number_format($ca_vlr_custeio, 2, ',', '.'); ?></td>
			</tr>
			<tr>
				<td align="right">Bolsas</td><td class="lt3" align="right"><?php echo number_format($ca_vlr_bolsa, 2, ',', '.'); ?></td>
			</tr>
			<tr>
				<td align="right">Outros</td><td class="lt3" align="right"><?php echo number_format($ca_vlr_outros, 2, ',', '.'); ?></td>
			</tr>
			<tr>
				<td align="right">Vlr. Proponente</td><td class="lt3" align="right"><b><?php echo number_format($ca_proponente_vlr, 2, ',', '.'); ?></b></td>
			</tr>
			<tr><td colspan=2 align="right"><?php echo $ca_editar; ?></td></tr>
		</table><?php echo $indicacoes; ?></td>
	</tr>
	<tr>
		<td colspan=2 class="lt2"><?php echo $cp_descricao; ?></td>
		<td colspan=2 class="lt2"><?php echo $ca_contexto; ?></td>
	</tr>
	<tr>
		<td class="lt0" colspan=2><?php echo msg('agencia'); ?></td>
		<td class="lt0"><?php echo msg('processo'); ?></td>
		<td class="lt0"><?php echo msg('edital'); ?></td>
	</tr>
	<tr>
		<td class="lt4" colspan=2><?php echo $agf_nome; ?></td>
		<td class="lt4"><?php echo $ca_processo; ?></td>
		<td class="lt4"><?php echo $ca_edital_nr; ?></td>
	</tr>
	<tr>
		<td class="lt0"><?php echo msg('edital_ano'); ?></td>
		<td class="lt0"><?php echo msg('inicio_vigencia'); ?></td>
		<td class="lt0"><?php echo msg('duracao'); ?></td>
		<td class="lt0"><?php echo msg('prorrogacao'); ?></td>
	</tr>
	<tr>
		<td class="lt4"><?php echo $ca_edital_ano; ?></td>
		<td class="lt4"><?php echo substr($ca_vigencia_final_ano, 4, 2) . '/' . substr($ca_vigencia_final_ano, 0, 4); ?></td>
		<td class="lt4"><?php echo $ca_duracao . ' ' . msg('meses'); ?></td>
		<td class="lt4"><?php echo $ca_vigencia_prorrogacao; ?></td>
	</tr>
	<tr>
		<td class="lt0" colspan=4><?php echo msg('vinculo'); ?></td>
	</tr>
	<tr>
		<td class="lt4" colspan=4><?php echo $pp_nome . ' ' . $pp_sigla . ''; ?>&nbsp;</td>
	</tr>
	<tr>
		<td class="lt0" colspan=3><?php echo msg('situacao'); ?></td>
		<td class="lt0" colspan=1><?php echo msg('dt_atualizacao'); ?></td>
	</tr>
	<tr>
		<td class="lt4" colspan=3><font color="orange"><b><?php echo $cs_situacao; ?></b></font></td>
		<td class="lt4" colspan=1><?php echo stodbr($ca_update); ?></td>
	</tr>
</table>