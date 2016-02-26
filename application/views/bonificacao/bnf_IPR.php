<?php
$img = base_url('img/icon/icone_label_isencao.png');
$benef = '-';
if ( $bn_rf_valor > 0)
	{
			$benef = $bn_rf_parcela .' x '.number_format($bn_rf_valor, 2, ',', '.');		
	}
$fundo = '';
if ($bn_status == '!')
	{
		$fundo = 'bg_lgreen';
	}
if ($bn_status == 'Z')
	{
		$fundo = 'bg_lred';
	}	
?>
<table width="100%"  class="captacao_folha black border1 <?php echo $fundo;?>">
	<tr>
		<th width="80"></th>
		<th width="5%"></th>
		<th width="60%"></th>
		<th width="5%"></th>
		<th width="20%" colspan=2></th>
	</tr>
	<tr valign="top">
		<td rowspan=10 width="20"><img src="<?php echo $img;?>" width="100"></td>
		<td colspan=3 class="lt4" align="left">Isen��o PUCPR</td>
		<td rowspan=5>
		<table width="300" class="captacao_folha black border1 bg_lgrey">
			<tr>
				<td align="right" class="lt0">Nr. Processo:</td>
				<td class="lt2" align="left"><?php echo $bn_codigo;?></td>
			</tr>
			<tr>
				<td class="lt0" align="right"><B>Encaminhado em:</td>
				<td class="lt2" align="left"><?php echo stodbr($bn_data);?></B></td>
			</tr>
			<tr valign="top">
				<td class="lt0" align="right">Valor do Benef�cio:</td>
				<td class="lt2" colspan=1 align="left"><B><?php echo $benef; ?></B></td>
			</tr>
			<tr valign="top">
				<td class="lt0" align="right">Centro de Custo (CR):</td>
				<td class="lt2" colspan=1 align="left"><?php echo $bn_cr;?></td>
			</tr>
			<tr></tr>
		</table></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right" width="5%">Orientador:</td>
		<td class="lt2" colspan=2 align="left"><b><?php echo $bn_professor_nome;?></b></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right" rowspan=1>Benefici�rio:</td>
		<td class="lt2" colspan=2 rowspan=1 align="left"><b><?php echo UpperCase($us_nome);?></b></td>
	</tr>
	<tr valign="top">
		<td class="lt0" align="right">Situa��o:</td>
		<td class="lt2" colspan=4 align="left"><?php echo $bns_descricao . '('.$bn_status.')';?></td>
	</tr>
</table>
<BR><BR>