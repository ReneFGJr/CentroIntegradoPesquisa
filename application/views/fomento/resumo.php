<?php
$editar = 1;
$link = '<a href="'.base_url('index.php/Fomento/editEditalFomento/'.$id.'/'.checkpost_link($id)).'">';
?>
<table>
	<tr>
		<th></th>
		<th width="100">enviados</th>
		<th width="100">lidos</th>
		<th width="100">data envio</th>
		<th width="150">status</th>
	</tr>
	<tr clas="lt5" align="center">
		<td align="right">RESUMO</td>
		<td class="border1">-</td>
		<td class="border1">1</td>
		<td class="border1">-</td>
		<td class="border1">aberto</td>
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