<?php
	$dd10 = get("dd10");
	$dd11 = get("dd11");
	$dd12 = get("dd12");
?>
<div id="content">
	<img src="<?php echo base_url('img/logo/logo_dgp.png');?>" align="right" height="68">
	<h1>Diretório de Grupos de Pesquisa da PUCPR</h1>
	<table width="100%" cellpadding="0" cellspacing="0" border=0>
		<tr valign="top">
			<td style="min-width: 100px;">Filtros
			<form action="<?php echo base_url('index.php/dgp');?>" method="get">
				<select name="dd10" id="dd10">
					<option value="">::Área::</option>
					<?php
						$sql = "select ac_cnpq, ac_nome_area from (
							select gpap_area_predominante as area from gp_area_predominante
							union
							select gpap_area_especifica as area from gp_area_predominante
							) as tabela
							inner join area_conhecimento on area = ac_cnpq
							group by ac_cnpq, ac_nome_area
							order by ac_nome_area
							";
						$rlt = $this -> db -> query($sql);
						$rlt = $rlt -> result_array();
						for ($r = 0; $r < count($rlt); $r++) {
							$sel = '';
							$line = $rlt[$r];
							if ($line['ac_cnpq'] == $dd10) { $sel = ' selected ';
							}
							echo '<option value="' . $line['ac_cnpq'] . '" style="margin-left: 15px;" ' . $sel . '>' . $line['ac_nome_area'] . '</option>' . cr();
						}
						echo '</select>' . cr();
					?>
				</select>
				<BR>
				<BR>
				Busca no título do grupo:
				<BR>
				<input type="text" value="<?php echo $dd11;?>" name="dd11" style="width: 200px;">
				<BR>
				<BR>
				Busca por participante:
				<BR>
				<input type="text" value="<?php echo $dd12;?>" name="dd12" style="width: 200px;">
				<BR>
				<BR>
				<input type="submit" value="Filtrar" name="acao" >
			</form><!---- acoes ----><?php
			//$this->load->model('dgps');
			echo $acoes;
			?>
			<!---- resumo ---->
			<BR>
			<BR>
			<?php
			echo '				
			<table width="98%" class="lt1 border1 radius10">
				<tr>
					<td align="right">Total de grupos ativos</td>
					<td class="lt6">' . $total_grupos . '</td>
				</tr>
				<tr>
					<td align="right">Total de linhas de pesquisa</td>
					<td class="lt6">' . $total_linhas . '</td>
				</tr>
				<tr>
					<td align="right">Total de pesquisadores</td>
					<td class="lt6">' . $total_1 . '</td>
				</tr>
				<tr>
					<td align="right">Total de estudantes envolvidos em pesquisa</td>
					<td class="lt6">' . $total_2 . '</td>
				</tr>
				<tr>
					<td align="right">Total de técnicos</td>
					<td class="lt6">' . $total_6 . '</td>
				</tr>
				<tr>
					<td align="right">Total de estrangeiros</td>
					<td class="lt6">' . $total_8 . '</td>
				</tr>
				<tr>
					<td align="right">Total de egressos em grupos de pesquisa</td>
					<td class="lt6">' . ($total_9 + $total_11) . '</td>
				</tr>												
			</table></td>
			<td style="width:10px; border-left:1px solid #333333;"></td>
			<td width="78%">Últimos grupos atualizados';

			if ((strlen($dd10) > 0) and (strlen($dd12)==0))
				{
					if (strlen($dd11) > 0)
						{
							$wh = " and gp_nome like '%$dd11%' ";
						} else {
							$wh = '';
						}
					if (strlen($dd12) > 0)
						{
							$wh = " and gp_nome like '%$dd11%' ";
						} else {
							$wh = '';
						}					
					$sql = "select * from gp_grupo_pesquisa as gp
								left join gp_area_predominante as t1 on t1.id_gp = gp.id_gp 
								where 
									(gpap_area_predominante = '$dd10' or 
									gpap_area_especifica = '$dd10')
									$wh
								order by gp_dt_ultimo_envio desc limit 30 ";
					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();					
				} else {
					if (strlen($dd11) > 0)
						{
							$wh = " where gp_nome like '%$dd11%' ";
						} else {
							$wh = '';
						}
					/* busca por membro */	
					if (strlen($dd12) > 0)
						{
							$dd12 = troca($dd12,' ',';');
							$term = splitx(';',$dd12);
							if (strlen($wh) > 0) { $wh .= ' and '; }
							$wh .= ' (';
							for ($rt=0;$rt < count($term);$rt++)
								{
									$nm = $term[$rt];
									if ($rt > 0) 
										{ $wh .= ' and ';}
									$wh .= " gpus_cnpq_nome like '%$nm%' ";
								}
							$wh .= ') ';
							
							$sql = "select * from gp_usuario 
								left join gp_recursos_humanos on id_gprh = gprh_gp_id
								left join gpus_cnpq on id_gpus_cnpq = gp_usuario.us_id
								left join gp_grupo_pesquisa on id_gp = gp_id
								where $wh
								order by id_gprh, gpus_cnpq_nome
					 		";
						} else {
							$sql  = "select * from gp_grupo_pesquisa
								$wh order by gp_dt_ultimo_envio desc limit 15 ";
						}						

					$rlt = $this -> db -> query($sql);
					$rlt = $rlt -> result_array();					
				}

			echo '<table width="100%" border=0>' . cr();
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$id = $line['id_gp'];
				echo '<tr><td colspan=3><hr size=1></td></tr>' . cr();
				echo '<tr valign="top"><td width="3%" ><img src="' . base_url("img/bp/icone_1.00.png") . '" width="48"></td>' . cr();
				echo '<td width="90%">' . cr();
				echo '<B> <A HREF="' . base_url("index.php/dgp/view/" . $id) . '" class="no-undeline grey"> ' . $line['gp_nome'] . '</B> </A>';
				echo '<BR>';
				echo '<span class="lt1">' . ($line['gp_instituicao_grupo']) . '</span></td>';
				echo '<td width="7%" class="lt1">' . stodbr($line['gp_dt_ultimo_envio']) . '</td>';
				echo '</tr>';
			}
			echo '</table></td></tr></table></div>';
			?>
