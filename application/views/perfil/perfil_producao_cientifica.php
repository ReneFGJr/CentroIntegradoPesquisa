<br><br>
<font class="lt4"><b>Produção Científica</b></font>
<table width="100%">
	<tr valign="top">
		<td class="borderg1" width="20%">
			<table width="100%" class="lt1">
				<tr valign="top">
					<td width="50%" align="center">
						JCR (médio)<br>
						<font class="lt4"><b>2.386</b></font>
					</td>
					<td>
						Artigos com JCR: <b>10</b>
						<br>JCR (min): <b>0.366</b>
						<br>JCR (máx): <b>4.925</b>
					</td>
				</tr>
			</table>			
		</td>
		
		<td class="borderg1" width="20%">
			<table width="100%" class="lt1">
				<tr valign="top">
					<td width="50%" align="center">
						Índice h<br>
						<font class="lt4"><b>12</b></font>
					</td>
					<td>
						Total de trabalhos: <b>16</b>
						<br>Total citações: <b>43</b>
						<br>Atualizado: <b>10/12/2015</b>
					</td>
				</tr>
			</table>			
		</td>
		
		<td class="borderg1" width="10%">
			<table width="100%" class="lt1">
				<tr valign="top">
					<td align="center">
						Artigos publicados<br>
						<font class="lt4"><b>12</b></font>
					</td>
				</tr>
			</table>			
		</td>
				
		<td class="borderg1" width="50%" class="lt1">
			Produção em periódicos
			<table width="100%">
				<?php
				$c1 =''; $c2= '';
				
				for ($r=(date("Y")-20);$r <= date("Y");$r++)
					{
						$vlr = 12;
						$img = '<img src="'.base_url('img/icon/icone_fem.jpg').'" height="10">';
						$c1 .= '<td>'.$vlr.'<br>'.$img.'</td>';
						$c2 .= '<td>'.$r.'</td>';
					}
				echo '<tr valign="bottom" class="lt0" align="center">'.$c1.'</tr>';
				echo '<tr valign="bottom" class="lt0" align="center">'.$c2.'</tr>';
				?>
			</table>
		</td>
	</tr>
</table>

<style>
	.borderg1
		{
			border: 1px solid #CFCFCF;
			background-color: #EFEFEF;
		}
</style>
