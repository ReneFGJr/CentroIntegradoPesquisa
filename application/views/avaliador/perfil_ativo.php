<div id="situacao">
<table width="60%" class="lt2 border1 shadown pad5" align="left">
	<tr>
		<td width="60">Situação:</td>
		<td><b><?php echo $avaliador;?></b></td>
		<td align="right">
			<?php
			$st = $us_avaliador;
			switch($st)
				{
				case '':
					$ds = '';
					$ida = '';
					break;
				case '0':
					$ds = mst('ativar_como_avaliador');
					$ida = 'ativar_avaliador';
					break;
				case '1':
					$ds = mst('desativar_como_avaliador');
					$ida = 'desativar_avaliador';
					break;					
				case '8':
					$ds = mst('desativar_como_avaliador');
					$ida = 'desativar_avaliador';
					break;
				case '9':
					$ds = mst('desativar_como_avaliador');
					$ida = 'desativar_avaliador';
					break;					
				default:
					$ds = 'Não localizado: '.$st;
					$ida = 'xxx';
					break;	
				}
			if (strlen($ds) > 0)
				{
					$ds = '<a href="#" class="link" id="'.$ida.'">'.msg($ds).'</a>';
				}
			?>
		<?php echo $ds; ?>			
		</td>	
	</tr>
</table>
</br>&nbsp;</br>
</div>
