<?php
$link = '<a href="' . base_url('index.php/dgp/inport/' . $id_gp . '/' . checkpost_link($id_gp)) . '">coletar</A>';
?>
<font class="lt0">nome do grupo</font>
<br>
<a href="<?php echo $gp_egp_espelho;?>" target="_new"> <img src="<?php echo base_url('img/icon/icone_dgp.png');?>" border=0 height="20"></A>
<font class="lt6"><?php echo $gp_nome;?></font>
<table width="100%" class="tabela01" border=0>
	<tr valign="top">
		<td align="right" width="100"><?php echo msg('lider(es)');?></td>
		<td width="400"><?php echo $lideres;?></td>
	</tr>
	<tr valign="top">
		<td colspan=2 width="500">
		<fieldset class="border1">
			<legend class="lt1">
				<?php echo msg('gp_data');?>
			</legend>
			<table width="100%" class="tabela01 lt1">
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('gp_situacao');?>
					</nobr></td>
					<td><B><?php echo $gps_situacao;?></B></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('espelho_cnpq');?>
					</nobr></td>
					<td><B><A href="<?php echo $gp_egp_espelho;?>" target="_new"><?php echo $gp_egp_espelho;?></A></B></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('gp_ano_formacao');?>
					</nobr></td>
					<td><B><?php echo $gp_ano_formacao;?></B></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('gp_instituicao_grupo');?>
					</nobr></td>
					<td><B><?php echo $gp_instituicao_grupo;?></B></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('gp_cidade');?>
					</nobr></td>
					<td><B><?php echo $gp_cidade . '-' . $gp_uf;?></B></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('last_update');?>
					</nobr></td>
					<td><?php echo stodbr($gp_dt_ultimo_envio);?></td>
				</tr>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('last_harvesting');?>
					</nobr></td>
					<td><?php echo stodbr($gp_dt_coleta);?> <?php echo $link;?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend class="lt1">
				<?php echo msg('dgp_arquivos');?>
			</legend>
			<?php echo $ged_arquivos;?>
		</fieldset></td>
		<td rowspan=10 width="80%">
		<fieldset>
			<legend class="lt1">
				<?php echo msg('dgp_linhas');?>
			</legend>
			<?php echo $linhas_pesquisa;?>
		</fieldset>
		<fieldset>
			<legend class="lt1">
				<?php echo msg('dgp_membros');?>
			</legend>
			<?php echo $grupo_membros;?>
		</fieldset></td>
	</tr>
</table>
