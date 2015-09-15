<?php
$sx = '<table class="lt1 border1 pad5" width="100%">
	<tr>
		<th width="15%">área</th>
		<th width="10%">ação</th>
	</tr>
	<tr><td>
	<select id="area_cod">
';
$sql = "select * from area_conhecimento where ac_semic = 1 and ac_ativo = 1 order by ac_cnpq ";
$rlt = db_query($sql);
while ($line = db_read($rlt)) {
	$sx .= '<option value="' . $line['ac_cnpq'] . '">';
	$sx .= $line['ac_cnpq'];
	$sx .= ' | ';
	$sx .= $line['ac_nome_area'];
	$sx .= '</option>';
}
$sx .= '</select>';
$sx .= '<td width="120"><input type="button" value="adicionar >>" id="botao_area_add"></td>';
$sx .= '</table>';
echo $sx;
?>

<script>
	$("#botao_area_add").click(function() {
		$vl = $("#area_cod").val();
		$url = '<?php echo base_url('index.php/avaliador/ajax_add/'.$id_us);?>/'+$vl;
		$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
				$("#area_html").html(data); },
			error:function(data){ 
				$("#area_html").html("<font color=red >Erro de acesso</font>"); }
			});		
	});
</script>