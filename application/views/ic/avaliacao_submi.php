<?php
$color = '<font color="#3030ef">';
$obtrc = ' style="background-color: #FFe0e0;" ';
$chk = array();
$ob = array();
$obtr = array();
$ddx = 0;

for ($r=0;$r < (40);$r++)
	{
		$ob[$r] = '';
		$obtr[$r] = '';
	}

$acao = get("acao");
if (strlen($acao) > 0) {
	$obr = '<img src="' . base_url('img/icon/icone_exclamation.png') . '" height="30" align="left">';
	for ($r=$ddx;$r < ($ddx+40);$r++)
		{
			$vlr = get("dd".$r);
			if ((strlen($vlr) == 0) ) {
		 		$ob[$r] = $obr;
		 		$obtr[$r] = $obtrc;
			}			
		}	
}

?>
<h1>Ficha de avalia��o de Projeto e Plano</h1>
<br>
<form method="post">
<table width="90%" align="center">
<tr>
<td>
	<?php echo $texto_introducao;?>
<br>
<br>
<br>
<b>DADOS DO PROFESSOR</b>
<br>
<br>
<?php echo $projeto; ?>

1) <?php echo $ob[1]; ?>
<b>Crit�rio 1: Relev�ncia do projeto do orientador e contribui��o para a forma��o do estudante de gradua��o.</b>:
</br>
<?php
$r = 1; /* numero da quest�o */
$resposta = array('20'=>'Excelente','15'=>'Muito Bom','11'=>'Bom','7'=>'Regular', '3'=> 'Ruim','1'=>'Muito ruim');
$size = round(100/count($resposta)).'%';
?>
<table width="100%" cellpadding="5">
	<tr <?php echo $obtr[$r]; ?>>
		<?php
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			$vlr = trim(get("dd".$r));
			if ($vlr == $item) 
				{
					$checked = 'checked'; 
					$bg = 'background-color: #80ff80;';
				}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.' >'.$valor;
			echo '</td>';
		} ?>
	</tr>
</table>

<!----------------- item 2 ---------------------------->
<br>
<br>
2) <?php echo $ob[2]; ?>
<b>Crit�rio 2:</b>
Coer�ncia do projeto do orientador de acordo com os itens: Introdu��o, Objetivo, M�todo e Refer�ncias Bibliogr�ficas.
<br>
<?php
$r = 2; /* numero da quest�o */
$resposta = array('20'=>'Excelente','15'=>'Muito Bom','11'=>'Bom','7'=>'Regular', '3'=> 'Ruim','1'=>'Muito ruim');
$size = round(100/count($resposta)).'%';
?>
<table width="100%" cellpadding="5">
	<tr <?php echo $obtr[$r]; ?>>
		<?php
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
			echo '</td>';
		} ?>
	</tr>
</table>
<!----------------- item 3 ---------------------------->
<br>
<br>
3) <?php echo $ob[3]; ?>
<b>Crit�rio 3:</b> Coer�ncia e adequa��o entre a capacita��o e a experi�ncia do professor orientador proponente e a realiza��o do projeto, considerando as informa��es curriculares apresentadas.
<br>
<?php
$r = 3; /* numero da quest�o */
$resposta = array('20'=>'Excelente','15'=>'Muito Bom','11'=>'Bom','7'=>'Regular', '3'=> 'Ruim','1'=>'Muito ruim');
$size = round(100/count($resposta)).'%';
?>
<table width="100%" cellpadding="5">
	<tr <?php echo $obtr[$r]; ?>>
		<?php
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
			echo '</td>';
		} ?>
	</tr>
</table>
<!---------------------------------------------------------------- AREA ESTRAT�GICA ---------------->
<?php
		$r = ($ddx + 4);
		$resposta = array('11'=>'SIM','10'=>'N�O');
		$size = "50%";
		
		if (substr($area_estrategica,0,4) != '9.00')
		{
		echo '<table cellpadding="5">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '4) '.$ob[$r].' <b>Crit�rio 4:</b> ';
		echo 'Este projeto foi assinalado pelo professor proponente para concorrer as bolsas de IC de ';
		echo ' �reas estrat�gicas (<B>'.trim($area_estrategica_nome).'</B>) da PUCPR. O projeto se enquadra na �rea assinalada?';
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
			echo '</td>';
			}
		echo '</tr></table>';
		} else {
			echo '<input name="dd'.$r.'" type="hidden" value="12">';
		}
?>
<!------------------------------------------------ CEP ----------------------->
<br>
<br>
<?php
$r = 5; /* numero da quest�o */
		$resposta = array('1'=>'SIM','2'=>'N�O','3'=>'Tenho d�vidas','4'=>'J� existe o parecer de aprova��o anexado');
		$size = "";
		echo '<table cellpadding="5" width="100%">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '5) '.$ob[$r].' <b>Crit�rio 5:</b> ';
		echo 'Este projeto envolve SERES HUMANOS e, portanto, deve ser analisado pelo Comit� de �tica (CEP), respectivamente ?';
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
			echo '</td>';
			}
		echo '</tr></table>';
?>
<br><br>
<!------------------------------------------------ CEUA ---------------------->
<?php		
$r = 6; /* numero da quest�o */
		$resposta = array('1'=>'SIM','2'=>'N�O','3'=>'Tenho d�vidas','4'=>'J� existe o parecer de aprova��o anexado');
		$size = "";
		echo '<table cellpadding="5" width="100%">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '6) '.$ob[$r].' <b>Crit�rio 6:</b> ';
		echo 'Este projeto envolve ANIMAIS e, portanto, deve ser analisado pelo Comit� de �tica no Uso de Animais (CEUA), respectivamente ?';
		foreach ($resposta as $item => $valor) {
			$checked = '';
			$bg = '';
			if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
			echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
			echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
			echo '</td>';
			}
		echo '</tr></table>';

?>
<br>
<br>
Coment�rios sobre sua avalia��o do projeto do professor:
<br>
<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21; ?>
</textarea>
</td>
</tr>
</table>
