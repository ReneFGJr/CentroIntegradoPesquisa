<?php
echo '<table align="right" style="position: absolute; top: 0px;"><tr align="center">';
$ri = $id;
		echo '<A href="'.base_url('index.php/semic/premiacao/'.($ri-1)).'" class="link"><<</a>';
		echo '<A href="'.base_url('index.php/semic/premiacao/'.($ri+1)).'" class="link">>></a>';

echo '</tr></table>';

$spt_area = $spt_area;
$spt_modalidade = $spt_modalidade;
$nome_aluno = $us_aluno;
$titulo_trabalho = $sm_titulo;	
$nome_professor = $us_professor;
$pre = $smp_modalidade;

?>
<div id="content" class="content" style="display: none;">
	<div style="topo">
		<div class="topoesq">
			<img src="<?php echo base_url('img/semic/2015/topo_logo_divisor.png');?>" />
		</div>
		<div style="width:574px; height:225px; float:left;">
			<div style="width:100%; "><!--<img src="<?php echo base_url('img/semic/2015/AREALOGO_pibic.png');?>" width="464" height="74" />-->
			</div>
			
			<div class="area">
				<?php echo $spt_area;?> - <?php echo $spt_edital;?>
			</div>
			<font style="font-size: 24px;"><?php echo $pre;?></font>
			<div class="modalidade">
				<?php echo $spt_modalidade;?>
			</div>
		</div>
	</div>


	<div class="miolo">
		<div class="premios">
			<div class="icone">
				<!-- <img src="<?php echo base_url($line['smp_icone']);?>" width="290" height="143"/> -->
			</div>
			<div class="conteudopremio">
				<font class="aluno"><?php echo $nome_aluno;?></font>
				<br/>
				<font class="titulotrab"><?php echo $titulo_trabalho;?></font>
				<br/>
				<font class="professor"><?php echo $nome_professor;?></font>
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
