<?php
/* */
$logo = '';
if (!isset($ged)) { $ged = ''; $ged_arquivos = '';}
switch ($pj_edital)
	{
	case 'ICMST':
		$logo = '<img src="'.base_url('img/logo/logo_ic_master.png').'" width="150">';
		break;
	}
?>
<table class="captacao_folha border1 black" width="100%" border=0>
	<tr class="lt0" align="left" valign="top">
		<td colspan=3><?php echo msg('projeto_titulo');?></td>
		<td align="right"><?php echo msg('protocolo');?></td>
		<td align="right" rowspan=5 width="150"><?php echo $logo;?></td>
	</tr>
	<tr class="lt2">
		<td align="left" colspan=3 class="lt4"><b><?php echo $pj_titulo;?></b></td>
		<td align="right"><?php echo $pj_codigo;?></td>
	</tr>
	<tr class="lt0" align="left">
		<td colspan=3><?php echo msg('orientador');?></td>
		<td align="right"><?php echo msg('ano');?></td>
	</tr>
	<tr class="lt2" align="left">
		<td colspan=3><?php echo link_perfil($pf_nome, $id_pf);?></td>
		<td align="right"><?php echo $pj_ano;?></td>
	</tr>
	
	<?php if ($id_al > 0) { ?>
	<tr class="lt0" align="left">
		<td colspan=3><?php echo msg('estudante');?></td>
	</tr>
	<tr class="lt2" align="left">
		<td colspan=5><?php echo link_perfil($al_nome, $id_al);?></td>
	</tr>
	<?php } ?>
	
	<tr class="lt0" align="left">
		<td colspan=2><?php echo msg('area');?></td>
		<td colspan=3><?php echo msg('situacao');?></td>
	</tr>	
	<tr class="lt2" align="left">
		<td align="left" colspan=2><?php echo $ac_nome_area;?>(<?php echo $pj_area;?>)</td>
		<td align="left" colspan=3 class="lt2"><b><?php echo $ssi_descricao;?></b></td>
	</tr>
	<tr class="lt2" align="left">
		<td align="left" colspan=5>
			<?php echo $ged;?>
			<?php echo $ged_arquivos;?>			
		</td>
	</tr>	
</table>
