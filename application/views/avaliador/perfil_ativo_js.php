<script>
	$("#ativar_avaliador").click(function() {
		$url = '<?php echo base_url('index.php/avaliador/avaliador_status_alterar/'.$id_us.'/ACTIVE');?>';
		$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
				$("#situacao").html(data); },
			error:function(data){ 
				$("#situacao").html("<font color=red >Erro de acesso</font>"); }
			});
		});

	$("#desativar_avaliador").click(function() {
		$url = '<?php echo base_url('index.php/avaliador/avaliador_status_alterar/'.$id_us.'/DESACTIVE');?>';
		$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
				$("#situacao").html(data); },
			error:function(data){ 
				$("#situacao").html("<font color=red >Erro de acesso</font>"); }
			});
		});	
</script>