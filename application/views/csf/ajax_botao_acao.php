<?php
if ($cancelar == 1) {
	echo '<input type="button" value="' . msg('csf_bt_cancelar') . '" class="botao-grande">';
}

if ($homologar == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar') . '" class="botao-grande" id="bt_homologar">';
}
?>

<script>
	$("#bt_homologar").click(function() {
		
		var $url = "<?php echo base_url('index.php/csf/ajax_acao/');?>/<?php echo $id;?>/<?php echo $ack;?>/homologar";
		
		$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
				$("#<?php echo $ack;?>").html(data);
			} });
	});
</script>