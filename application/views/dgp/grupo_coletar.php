<?php
$link = '<a href="' . base_url('index.php/dgp/inport/' . $id_dgp . '/' . checkpost_link($id_dgp)) . '">coletar</A>';
?>
<font class="lt0">nome do grupo</font>
<br>
<a href="<?php echo $dgp_link;?>" target="_new"> <img src="<?php echo base_url('img/icon/icone_dgp.png');?>" border=0 height="20"></A>
<font class="lt6"><?php echo $dgp_nome;?></font>
<table width="500" class="tabela01">
	<tr>
		<td colspan=2>
				<tr valign="top">
					<td align="right" width="30%">
					<nobr>
						<?php echo msg('last_harvesting');?>
					</nobr></td>
					<td><?php echo stodbr($dgp_lastupdate);?> <?php echo $link;?></td>
				</tr>
			</table>
		</fieldset></td>
	</tr>
</table>
