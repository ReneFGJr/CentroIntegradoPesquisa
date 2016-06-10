<script>
function send($this)
	{
		var nome = document.getElementById("nome").value;
		var tipo = document.getElementById("tipo").value;
		var inst = document.getElementById("instituicao").value;
		
		$.post( "<?php echo base_url('index.php/ajax/resumo_autores/'.$id.'/'.$check);?>", { dd10: nome, dd11: tipo, dd12: inst, acao: 'ADD' })
  			.done(function( data ) {
   			 $("#autores").html(data);
  		});
	}
function remove_autor(id)
	{
		alert(id);
		$.post( "<?php echo base_url('index.php/ajax/resumo_autores/'.$id.'/'.$check);?>", { dd10: id, acao: 'DEL' })
  			.done(function( data ) {
   			 $("#autores").html(data);
  		});	
	}
	
</script>