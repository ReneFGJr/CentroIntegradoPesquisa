<table width="1024">
	<tr valign="top">
		<td width="180"><?php echo $bar;?></td>
		<td><h3>Postagem do Resumo para o SEMIC</h3>
		<form method="post">
			<table width="100%" class="lt0">
				<tr>
					<td>Autores, Orientadores e Colaboradores</td>
				</tr>
				<tr>
					<td>
					<div id="autores">
						loading...
					</div></td>
				</tr>
			</table>
			<input type="hidden" name="page" value="2">
		</form></td>
	</tr>
</table>
<style>
	.autores {
		font-size: 12px;
		width: 100%;
		height: 70px;
		border: 1px solid #000000;
	}
</style>
<script>
	var $url = '<?php echo base_url('index.php/ic/resumo_autores/' . $ic_plano_aluno_codigo . '/' . checkpost_link($ic_plano_aluno_codigo));?>';
	$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
			$("#autores").html(data);
		} } );
</script>
