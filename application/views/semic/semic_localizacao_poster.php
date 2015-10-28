<?php
$img = base_url('img/semic/2015/mapa_geral.png');
$img = '';
if (strlen($ala) > 0) {
	$img = base_url('img/semic/2015/mapa_poster_' . $ala . '.png');
	$img = '<img src="' . $img . '">';
}
?>
<A name="mapa"></A>
<center>
	<font style="font-size: 40px;"><b><?php echo $ref;?></b></font>
	<br>
	<font style="font-size: 20px;"><b><?php echo $dia;?></b></font>
	<br>
	<?php
	if (isset($trabalhos) > 0) {
		echo '
			<font class="lt4"> Identifique o código de seu trabalho:
			<select name="dd1" class="form_string" ONCHANGE="location = this.options[this.selectedIndex].value;">
			'.$trabalhos.'
			</select> </font>
			<hr>';
	}
	echo $img;
	?>
