<table width="100%"  border=0 class="lt2">
	<tr align="center">
		<th width="40%">Autor</th>
		<th width="20%">participacao</th>
		<th width="20%">Instituição (SIGLA)</th>
		<th width="10%">ação</th>
	</tr>
	<tr>
		<td><input type="text" id="dd10" name="dd10" class="form_string" style="width: 100%;"></td>
		<td><select id="dd11" class="form_string" style="width: 100%;" size=1>
			<option value=""></option>
			<option value="2">Co-orientador</option>
			<option value="3">Colaborador</option>
			<option value="7">Mestrando de Pós-Graduação</option>
			<option value="8">Doutorando de Pós-Graduação</option>
			<option value="4">Pibic Junior</option>
			<option value="5">Supervisor Pibic Junior</option>
			<option value="6">Escola (para Pibic Júnior)</option>
			<option value="9">Orientador</option>
			</select>
		</td>
		<td><input type="text" id="dd12" class="form_string" style="width: 100%;"></td>
		<td><input type="button" id="acao" class="form_button" style="width: 100%;" value="Incluir"></td>
	</tr>
</table>

<script>
$("#acao").click(function() {
	$("#autores").html('Loading...');
	var $url = '<?php echo base_url('index.php/ic/resumo_autores/' . $id . '/' . $check);?>';
	var $dd10 = $("#dd10").val();
	var $dd11 = $("#dd11 option:selected").val();
	var $dd12 = $("#dd12").val();
	alert($dd10);
	alert($dd11);
	alert($dd12);
	$.ajax({
			url : $url,
			type : "post",
			data : { acao: "save", dd10: $dd10, dd11: $dd11, dd12: $dd12 }, 
			success : function(data) {
			$("#autores").html(data);
		} } );
});
</script>
