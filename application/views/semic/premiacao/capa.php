<?php
echo '<table align="right">';
$link = '<A href="'.base_url('index.php/semic/premiacao/1').'" class="link">';
echo '<tr align="center"><td class="border1" width="40">'.$link.'Início</a></td></tr>';
echo '</table>';
?>
<div id="content" class="content" style="display: none; height: 550px;">
	<div style="topo">
		<div class="topoesq">
			<img src="<?php echo base_url('img/semic/2015/topo_logo_divisor.png');?>" />
		</div>
		<div style="width:574px; height:225px; float:left;">
			<div style="width:100%; "></div>
			<div class="area">
				PREMIAÇÃO
			</div>
			<div class="modalidade">
				SEMIC-2015
			</div>
		</div>
	</div>

	<div class="miolo">
		<div class="premios">
			<div class="icone" style="width: 100%;">
				<img src="<?php echo base_url('img/semic/2015/icone_1.png');?>" width="290" height="143" align="left">
				<img src="<?php echo base_url('img/semic/2015/icone_2.png');?>" width="290" height="143" align="left">
				<img src="<?php echo base_url('img/semic/2015/icone_3.png');?>" width="290" height="143" align="left">
				<img src="<?php echo base_url('img/semic/2015/icone_mh.png');?>" width="290" height="143" align="left">
			</div>
			<div class="conteudopremio">
				<font class="aluno"></font>
				<br/>
				<font class="titulotrab"></font>
				<br/>
				<font class="professor"></font>
				<br/>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
	$("#content").fadeIn( 5000);
</script>
