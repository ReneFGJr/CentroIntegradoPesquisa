<?php
global $hd;
if (!isset($agrupar)) { $agrupar = 0; }

$agrupar_td = '';
if ($agrupar == '1')
	{
		$agrupar_td = '<td>';
		$agrupar_td .= '<a href="#" title="agrupar" onclick="newwin(\''.base_url('index.php/ic/agrupar_projetos/'.$pj_codigo).'\',600,600);">';
		$agrupar_td .= '<img src="'.base_url('img/icon/icone_group.png').'" height="16">';
		$agrupar_td .= '</a>';
		$agrupar_td .= '</td>';
	}

if (!isset($hd))
	{
		$hd = true;
		echo '<tr>';
		echo '<th width="2%">#</th>';
		echo '<th width="6%">Protocolo</th>';
		echo '<th width="42%">Titulo</th>';
		echo '<th width="40%">Professor</th>';
		echo '<th width="10%">Situação</th>';
		echo '</tr>';
	}
	
	$link = '<a href="'.base_url('index.php/ic/projeto_view/'.$id_pj.'/'.checkpost_link($id_pj)).'" target="_new" class="link lt1">';
	
	$class = "";
	if (isset($igual) and $igual == 1)
		{
			$class = "danger";
		}
?>
<tr class="<?php echo $class;?>">
	<td class="borderb1" align="center"><?php echo $nr;?></td>
	<td class="borderb1" align="center"><?php echo $link.$pj_codigo.'</a>';?></td>
	<td class="borderb1"><?php echo $pj_titulo;?></td>
	<td class="borderb1"><?php echo $us_nome;?></td>
	<td class="borderb1" align="center"><?php echo msg('situacao_'.$pj_status);?></td>
	<?php echo $agrupar_td;?>
</tr>
