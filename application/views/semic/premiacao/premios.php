<?php
echo '<table align="right">';
$ri = ($pos-1);
if ($ri < 1) { $ri = 1; }
for ($r=$ri;$r < count($rlt);$r++)
	{
		$link = '<A href="'.base_url('index.php/semic/premiacao/'.$r).'" class="link">';
		echo '<tr align="center"><td class="border1" width="40">'.$link.$r.'</a></td></tr>';
	}
echo '</table>';
$line = $rlt[$id];
$spt_area = $line['spt_area'];
$spt_modalidade = $line['spt_modalidade'];
$nome_aluno = $line['us_aluno'];
$titulo_trabalho = $line['sm_titulo'];
$nome_professor = $line['us_professor'];


?>
<div id="content" class="content" style="display: none;">
	<div style="topo">
		<div class="topoesq">
			<img src="<?php echo base_url('img/semic/2015/topo_logo_divisor.png');?>" />
		</div>
		<div style="width:574px; height:225px; float:left;">
			<div style="width:100%; "><img src="<?php echo base_url('img/semic/2015/AREALOGO_pibic.png');?>" width="464" height="74" />
			</div>
			<div class="area">
				<?php echo $spt_area;?>
			</div>
			<div class="modalidade">
				<?php echo $spt_modalidade;?>
			</div>
		</div>
	</div>

	<div class="miolo">
		<div class="premios">
			<div class="icone">
				<img src="<?php echo base_url($line['smp_icone']);?>" width="290" height="143"/>
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
