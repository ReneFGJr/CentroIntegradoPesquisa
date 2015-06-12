<?php
$page = base_url('index.php/csf/novo/');
$dd10 = $this->input->post('dd10');
?>
<form method="post" action="<?php echo $page;?>">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td>Informe o cracha do estudante</td>
		</tr>
		<tr>
			<td>
			<input type="text" name="dd10" value="<?php echo $dd10;?>" class="form_estudante_id">
			</td>
			<td>
			<input type="submit" name="acao" value="<?php echo msg("busca");?>" class="form_estudante_id">
			</td>
		</tr>
	</table>
</form>
