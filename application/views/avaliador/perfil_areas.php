<BR>
<a name="areas"></a>
<div id="areas">
	<table width="60%" class="lt1 border1 shadown pad5"  cellspacing="2"  align="left" border=0>
		<tr id="active_add_div">
			<td colspan=5>
			<div >
				<a href="#areas" id="active_add" class="link" >Ativar nova área</a>
				|
				<a href="<?php echo base_url('index.php/avaliador/areas_limpar/'.$id_us.'/');?>" id="exclude"class="link" >Excluir inativos</a>
			</div></td>
		</tr>		
		<tr id="areas_add" style="display: none; ">
			<td colspan=5>
			<div id="area_html">
				<span class="link" id="active_del">fechar</span>
				<BR>
				<form id="form_area">
					<table>
						<tr>
							<td>Adicionar a Área:</td>
						</tr>
						<tr>
							<td colspan=5 class="lt1">
							<?php
							echo $areas_inclusao;
							?></td>
						</tr>
					</table>
				</form>
			</div></td>
		</tr>		
		<tr>
			<td colspan=5 class="lt2"><B>Áreas de avaliação</B></td>
		</tr>
		<tr>
			<th width="60">área</th>
			<th width="120">ação</th>
			<th width="60%">descrição</th>
			<th width="80">atualizado</th>
		</tr>
		<?php echo $areas;?>



	</table>
</div>
<script>
	$("#active_add").click(function() {
		$("#areas_add").toggle();
		$("#active_add_div").toggle();
	});

	$("#active_del").click(function() {
		$("#areas_add").toggle();
		$("#active_add_div").toggle();
	});

</script>