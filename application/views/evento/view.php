<table width="100%">
	<tr>
		<td><span class="lt6"><?php echo $ev_nome;?></span><span class="lt1"> </br> de: <?php echo stodbr($ev_de) . ' até ' . stodbr($ev_ate);?></span></td>
	</tr>
	<tr valign="top">
		<th class="borderr1">descrição</th>
			<td>
				
				 
			</td>
		<th width="200">divulgação</th>
	</tr>
	<tr valign="top">
		<td class="borderr1"><?php echo $ev_mailing;?></td>
		<td width="300"><?php echo $mailing;?>
		<ul>
			<li><a href="<?php echo base_url('index.php/evento/editar_mailing/0/0/' . $id_ev);?>" class="link lt0">nova comunicação</a></li>
			<?php
			if (strlen($ev_query) > 0) {
				echo '<li><a href="' . base_url('index.php/evento/ver_lista/' . $id_ev) . '" class="link lt0">ver lista</a>';
				} else {
		
				}
				echo ' </li> ';
			?>
			
					
			<li><a href="<?php echo base_url('index.php/evento/lista_inscritos/' . $id_ev);?>" class="link lt0">Lista de inscritos</a></li>
			
			<li><a href="<?php echo base_url('index.php/evento/importar_inscritos/' . $id_ev);?>" class="link lt0">Importar inscritos</a></li>
		</ul>			
		</td>
	</tr>
</table>
