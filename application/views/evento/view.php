<table width="100%">
	<tr>
		<td><span class="lt6"><?php echo $ev_nome;?></span>
		<span class="lt1">
		</br> de: <?php echo stodbr($ev_de) . ' at� ' . stodbr($ev_ate);?>
		</span></td>
	</tr>
	
	<tr valign="top">
		<th class="borderr1">descri��o</th>
		<th width="200">divulga��o</th>		
	</tr>
	<tr valign="top">
		<td class="borderr1">
			<?php echo $ev_mailing;?>
			
		</td>
		<td width="300">
			<?php echo $mailing; ?>
			<a href="<?php echo base_url('index.php/evento/editar_mailing/0/0/'.$id_ev);?>" class="link lt0">nova comunica��o</a>
			
		</td>		
	</tr>
	
</table>
