<?php
global $hd;
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
?>
<tr>
	<td class="borderb1" align="center"><?php echo $nr;?></td>
	<td class="borderb1" align="center"><?php echo $link.$pj_codigo.'</a>';?></td>
	<td class="borderb1"><?php echo $pj_titulo;?></td>
	<td class="borderb1"><?php echo $us_nome;?></td>
	<td class="borderb1" align="center"><?php echo msg('situacao_'.$pj_status);?></td>
</tr>
