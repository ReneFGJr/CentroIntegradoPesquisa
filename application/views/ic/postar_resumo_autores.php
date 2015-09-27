<table width="100%"  border=0 class="lt2">
	<tr align="center">
		<th width="40%">Autor</th>
		<th width="20%">participacao</th>
		<th width="20%">Instituição (SIGLA)</th>
		<th width="10%">ação</th>
	</tr>
	<tr>
		<td><input type="text" id="nome" name="nome" class="form_string" style="width: 100%;" value=""></td>
		<td><select id="tipo" class="form_string" style="width: 100%;" size=1>
			<option value=""></option>
			<option value="2">Co-orientador</option>
			<option value="3">Colaborador</option>
			<option value="7">Mestrando de Pós-Graduação</option>
			<option value="8">Doutorando de Pós-Graduação</option>
			<option value="4">Pibic Junior</option>
			<option value="5">Supervisor Pibic Junior</option>
			<option value="6">Escola (para Pibic Júnior)</option>
			</select>
		</td>
		<td><input type="text" id="instituicao" class="form_string" style="width: 100%;"></td>
		<td><input type="button" id="acao" class="form_button" style="width: 100%;" value="Incluir" onclick="send(this);"></td>
	</tr>
	
	<tr>
		<td class="error" colspan=3><?php echo $msg; ?></td>
	</tr>
</table>
<script>
function send($this)
	{
		var nome = document.getElementById("nome").value;
		var tipo = document.getElementById("tipo").value;
		var inst = document.getElementById("instituicao").value;
		
		$.post( "<?php echo base_url('index.php/ic/resumo_autores/'.$id.'/'.$check);?>", { dd10: nome, dd11: tipo, dd12: inst, acao: 'ADD' })
  			.done(function( data ) {
   			 $("#autores").html(data);
  		});
	}
function remove(id)
	{
		$.post( "<?php echo base_url('index.php/ic/resumo_autores/'.$id.'/'.$check);?>", { dd10: id, acao: 'DEL' })
  			.done(function( data ) {
   			 $("#autores").html(data);
  		});	
	}
	
</script>
