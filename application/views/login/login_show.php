<?php

?>
<table width="100%" class="lt2" border=0>
	<tr>
		<th width="150"></th>
		<th width="400"></th>
		<th></th>
	</tr>
	<tr valign="top">
		<td class="lt1" align="right"><?php echo msg("us_login");?></td>
		<td><?php echo $us_login;?></td>
		
		<!---- Associar Perfirs ----->
		<td rowspan=20>
				<?php echo $us_perfil_list;?>
				<?php echo $us_perfil_associar;?>
		</td>
	</tr>

	<tr>
		<td class="lt1" align="right"><?php echo msg("us_nome");?></td>
		<td class="lt3"><B><?php echo $us_nome;?></B></td>
	</tr>

	<tr>
		<td class="lt1" align="right"><?php echo msg("us_cpf");?></td>
		<td><?php echo mask_cpf($us_cpf);?></td>
	</tr>

	<tr>
		<td class="lt1" align="right"><?php echo msg("us_ultimo_acesso");?></td>
		<td><?php echo stodbr($us_lastupdate);?> <?php echo $us_lastupdate_hora; ?></td>
	</tr>
	
	<tr>
		<td colspan=2><hr size=1 width="50%"></td>
	</tr>		
	
	<tr>
		<td><div style="min-height: 400px;" colspan=2></div></td>
	</tr>

</table>
