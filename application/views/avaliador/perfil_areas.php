<BR>
<a name="areas"></a>
<div id="areas">
	<table width="60%" class="lt1 border1 shadown pad5"  cellspacing="2"  align="left" border=0>
		<tr id="active_add_div">
			<td colspan=5>
			<div >
				<a href="#areas" id="active_add" class="link" >Ativar nova �rea</a>
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
							<td>Adicionar a �rea:</td>
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
			<td colspan=5 class="lt2"><B>�reas de avalia��o</B></td>
		</tr>
		<tr>
			<th width="60">�rea</th>
			<th width="120">a��o</th>
			<th width="60%">descri��o</th>
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