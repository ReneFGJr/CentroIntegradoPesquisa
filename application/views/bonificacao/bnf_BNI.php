<?php
$img = base_url('img/icon/icone_label_artigo.png');
?>
<table width="100%"  class="captacao_folha black border1">
	<tr>
		<th width="80"></th>
		<th width="5%"></th>
		<th width="60%"></th>
		<th width="5%"></th>
		<th width="20%" colspan=2></th>
	</tr>
	<tr valign="top">
		<td rowspan=10 width="20"><img src="<?php echo $img;?>" width="100"></td>
		<td colspan=3 class="lt4" align="left">Bonificação</td>
		<td rowspan=5>
		<table width="300" class="captacao_folha black border1 bg_lgrey">
			<tr>
				<td align="right" class="lt0">Nr. Processo:</td>
				<td class="lt2" align="left"><?php echo $bn_codigo;?></td>
			</tr>
			<tr>
				<td class="lt0" align="right"><B>Encaminhado para o DRH/Financeiro em:</td>
				<td class="lt2" align="left"><?php echo stodbr($bn_liberacao);?></B></td>
			</tr>
			<tr valign="top">
				<td class="lt0" align="right">Valor da Bonificação:</td>
				<td class="lt2" align="left" colspan=1><B><?php echo number_format($bn_valor, 2, ',', '.');?></B></td>
			</tr>
			<tr valign="top">
				<td class="lt0" align="right">Centro de Custo (CR):</td>
				<td class="lt2" align="left" colspan=1><?php echo $bn_cr;?></td>
			</tr>
			<tr></tr>
		</table></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right" width="5%">Beneficiário:</td>
		<td class="lt2" colspan=2 align="left"><b><?php echo $bn_professor_nome;?></b></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right" rowspan=1>Descrição:</td>
		<td class="lt1" colspan=2 rowspan=1 align="left"><?php echo $bn_descricao;?></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right">Situação:</td>
		<td class="lt2" colspan=4 align="left"><?php echo $bns_descricao;?></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right">Arquivos:</td>
		<td class="lt2" colspan=4 align="left"><?php echo $bns_arquivos;?></td>
	</tr>
</table>
<BR><BR>