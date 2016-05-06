<div id="chamadas_pdi">
	<h1>Editais abertos<br>
	<a href="<?php echo base_url('index.php/' . 'edital/abertos'); ?>" class="link lt0">ver todos</a>
	</h1>

	<div id="chamadas">
		<div id="calls">
			<?php 
			for ($r=0;$r < count($editais); $r++)
				{
					$edital = $editais[$r];
					echo '
						<a href="'.base_url('index.php/edital/ver/'.$edital['id_ed']).'" target="_blank" style="display: none;"> 
						<img src="'.$edital['agf_imagem'].'" 
								alt="'.$edital['ed_titulo'].'" width="100%" />
						<span class="lt2"><b>'.$edital['ed_titulo'].'</b>
						<hr size=1 width="80%">
						<span class="lt1">'.$edital['ed_texto_1'].'</span></span> </a>'.cr();					
				}
			?>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url('/css/coin-slider-styles.css'); ?>">
<script language="JavaScript" type="text/javascript" src="<?php echo base_url('js/coin-slider.js'); ?>"></script>

<style>
	#chamadas {
		padding: 1px;
		margin-top: 10px;
		width: 280px;
		border: 0px solid #000000;
	}
</style>

<script>
	$(document).ready(function() {
		$('#calls').coinslider({
			hoverPause : false
		});
	}); 
</script>