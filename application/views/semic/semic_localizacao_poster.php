<?php
$img = base_url('img/semic/2015/mapa_geral.png');
$img = '';
if (strlen($ala) > 0) {
	$img = base_url('img/semic/2015/mapa_poster_' . $ala . '.png');
	$img = '<img src="' . $img . '">';
}
?>
<center>
	<font style="font-size: 40px;"><b><?php echo $ref;?></b></font>
	<br>
	<font class="lt4"> Identifique o código de seu trabalho:
		<select name="dd1" class="form_string" ONCHANGE="location = this.options[this.selectedIndex].value;">
			<?php echo $trabalhos;?>
		</select> </font>
	<hr>
	<?php echo $img;?>
