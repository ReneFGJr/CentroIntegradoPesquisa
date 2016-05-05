<?php
$editar = 1;
$link = '<a href="'.base_url('index.php/edital/edit/'.$id_ed.'/'.checkpost_link($id_ed)).'">';

$sta = array('1'=>'Aberto','2'=>'Enviado','3'=>'Cancelado','4'=>'Em edição');

$link = '<a href="'.base_url('index.php/edital/quem_leu/'.$id_ed).'" class="lt5 link">';
?>
<table>
	<tr>
		<th></th>
		<th width="100">Cobertura</th>
		<th width="100">lidos</th>
		<th width="100">+informações</th>
		<th width="150">situação</th>
	</tr>
	<tr clas="lt5" align="center">
		<td align="right">RESUMO</td>
		<td class="border1"><?php echo $ed_cobertura;?></td>
		<td class="border1"><?php echo $link.$ed_readed;?></a></td>
		<td class="border1"><?php echo $link.$ed_more_info;?></a></td>
		<td class="border1"><?php echo $sta[$ed_status];?></td>
		<?php
		if ($editar == 1)
		echo '
		<td class="border1">'.
			$link.'
			<img src="'.base_url('img/icon/icone_editar.png').'" height="18" title="editar" border=0>
			</A>
		</td>
		';
		?>
	</tr>
</table>