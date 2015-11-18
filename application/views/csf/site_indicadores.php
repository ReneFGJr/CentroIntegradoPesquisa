<div class="page-header">
	<br />
	<br />
	<br />
	<br />
	<h1><?php echo msg('csf_indicadores_a');?></h1>
</div>
<div class="indicadores-paragrafo">
	<p>
		<?php echo msg('csf_indicadores_b');?>
	</p>
</div>
<!--Botões-->
<div class="botoes-indicadores">
	<!--Grafico Parceiros-->
	<a href="<?php echo base_url('index.php/csf/view_std_partners');?>">
	<div class="botao-1">
		<span><i class="fa fa-map-marker"></i><?php echo msg('csf_indicadores_bt_1');?></span>
	</div> </a>
	<!--Grafico estudantes por pais-->
	<a href="<?php echo base_url('index.php/csf/view_std_country');?>">
	<div class="botao-1">
		<span></i><?php echo msg('csf_indicadores_bt_2');?></span>
	</div> </a>
	<!--Grafico estudantes por cursos-->
	<a href="<?php echo base_url('index.php/csf/view_std_course');?>">
	<div class="botao-1">
		<span></i><?php echo msg('csf_indicadores_bt_3');?></span>
	</div> </a>
	<!--Grafico estudantes por instituicao de ensino-->
	<a href="<?php echo base_url('index.php/csf/view_std_university');?>">
	<div class="botao-2">
		<span></i><?php echo msg('csf_indicadores_bt_4');?></span>
	</div> </a>
	<!--Grafico estudantes por status-->
	<a href="<?php echo base_url('index.php/csf/view_std_status');?>">
	<div class="botao-2">
		<span></i><?php echo msg('csf_indicadores_bt_5');?></span>
	</div></a>
	<!--Grafico estudantes por genero-->
	<a href="<?php echo base_url('index.php/csf/view_std_genero');?>">
	<div class="botao-2">
		<span></i><?php echo msg('csf_indicadores_bt_6');?></span>
	</div> </a>
	<!--Grafico mapa mundi de onde estão os estudantes-->
	<a href="<?php echo base_url('index.php/csf/view_std_map_word');?>">
	<div class="botao-3">
		<span></i><?php echo msg('csf_indicadores_bt_7');?></span>
	</div> </a>
	<!--
	<a href="<?php echo base_url('index.php/csf/view_std_xxx');?>">
	<div class="botao-3">
	<span>Mapa 2</span>
	</div> </a>
	<a href="<?php echo base_url('index.php/csf/view_std_xxx');?>">
	<div class="botao-3">
	<span>Mapa 2</span>
	</div> </a>
	-->
</div>
<div class="clear"></div>