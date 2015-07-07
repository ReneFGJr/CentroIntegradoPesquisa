<div id="content">
	<img src="<?php echo base_url('img/logo/logo_dgp.png');?>" align="right" height="68">
	<h1>Diretório de Grupos de Pesquisa da PUCPR</h1>
	<table width="100%" cellpadding="0" cellspacing="0" border=0>
		<tr valign="top">
			<td style="min-width: 100px;">Filtros
			<form action="<?php echo base_url('index.php/dgp');?>" method="post">
				<select name="dd1">
					<option value="">::Área::</option>
					<option value="" style="margin-left: 15px;" >Ciência da Computação</option>
					<option value="" style="margin-left: 15px;" >Agronomia</option>
				</select>
				<BR>
				<BR>
				Busca:
				<BR>
				<input type="text" value="" name="dd2" style="width: 200px;">
				<BR>
				<BR>
				<input type="submit" value="Filtrar" name="acao" >
			</form>
			<!---- acoes ---->
			<?php
			//$this->load->model('dgps');
			echo $acoes;
			?>
			<!---- resumo ---->
			<BR>
			<BR>
			<?php
			$total_grupos = 10;
			$total_linhas = 20;
			$total_pesquisadores = 10;
			$total_envolvidos = 10;
			echo '				
			<table width="98%" class="lt1 border1 radius10">
				<tr>
					<td align="right">Total de grupos ativos</td>
					<td class="lt6">'.$total_grupos.'</td>
				</tr>
				<tr>
					<td align="right">Total de linhas de pesquisa</td>
					<td class="lt6">'.$total_linhas.'</td>
				</tr>
				<tr>
					<td align="right">Total de pesquisadores</td>
					<td class="lt6">'.$total_pesquisadores.'</td>
				</tr>
				<tr>
					<td align="right">Total de estudantes envolvidos em pesquisa</td>
					<td class="lt6">'.$total_envolvidos.'</td>
				</tr>
			</table></td>
			<td style="width:10px; border-left:1px solid #333333;"></td>
			<td width="78%">Últimos grupos atualizados';

			$sql = "select * from gp_grupo_pesquisa order by gp_dt_ultimo_envio desc limit 5 ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

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
