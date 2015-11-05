<table width="100%">
	<tr>
		<td class="lt0" colspan=5>
			PROGRAMA
		</td>
		<td width="10" rowspan=10>
			<img src="<?php echo base_url('img/ss/icone_conceito_'.$pp_conceito.'.png');?>">
		</td>				
		
	</tr>
	<tr>
		<td class="lt6" colspan=10>
			<b><?php echo $pp_nome;?></b>
		</td>
	</tr>
	
	<!---- Infos --->
	<tr><td style="height: 10px;"></td></tr>
	<tr class="lt0">
		<td>Ano de forma��o</td>
		<td>Mestrado</td>
		<td>Doutorado</td>
		<td>Situa��o</td>
		<td>N�vel</td>
	</tr>
	
	<tr class="lt2">
		<td width="18%">
			<?php echo $pp_ano_inicio; ?>
		</td>
		<td width="18%">
			<?php echo 'Desde '.$pp_ano_inicio; ?>
		</td>
		<td width="18%">
			<?php
			if ($pp_ano_inicio_doutorado > 0)
				{ 
				echo 'Desde '.$pp_ano_inicio_doutorado;
				} 
			?>
		</td>
		<td width="18%">
			<?php
			switch($pp_ativo)
				{
				case '1': echo '<b>'.msg('ativo').'</b>'; break;
				default: echo 'n�o definido'; break;
				}
			?>
		</td>
		<td width="18%">
			<?php echo $modalidade; ?>
		</td>
	</tr>
	<!---- AREAS --->
	<tr><td style="height: 10px;"></td></tr>
	<tr class="lt0">
		<td colspan=2>�REA DE AVALIA��O</td>		
		<td colspan=2>COORDENADOR DO PROGRAMA</td>
		<td colspan=2>C�D CAPES</td>
	</tr>
	
	<tr>
		<td colspan=2>
			<?php echo $area_avaliacao_nome; ?>
		</td>
		<td colspan=2>
			<?php echo $us_nome; ?>
		</td>	
		<td colspan=1>
			<?php echo $link_pp_codigo_capes; ?>
		</td>			
	</tr>
	
	<!---- AREAS --->
	<tr><td style="height: 10px;"></td></tr>
	<tr class="lt0">
		<td colspan=2>Escola / Centro</td>		
		<td colspan=2>Secretaria</td>
	</tr>
	
	<tr>
		<td colspan=2>
			<?php echo $area_avaliacao_nome; ?>
		</td>
		<td colspan=2>
			<?php echo $us_nome; ?>
		</td>		
	</tr>	
</table>