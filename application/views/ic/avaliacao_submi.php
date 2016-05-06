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
<h1>Ficha de avaliação de Projeto e Plano</h1>
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
<b>Critério 1: Relevância do projeto do orientador e contribuição para a formação do estudante de graduação.</b>:
</br>
<?php
$r = 1; /* numero da questão */
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
<b>Critério 2:</b>
Coerência do projeto do orientador de acordo com os itens: Introdução, Objetivo, Método e Referências Bibliográficas.
<br>
<?php
$r = 2; /* numero da questão */
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
<b>Critério 3:</b> Coerência e adequação entre a capacitação e a experiência do professor orientador proponente e a realização do projeto, considerando as informações curriculares apresentadas.
<br>
<?php
$r = 3; /* numero da questão */
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
<!---------------------------------------------------------------- AREA ESTRATÉGICA ---------------->
<?php
		$r = ($ddx + 4);
		$resposta = array('11'=>'SIM','10'=>'NÃO');
		$size = "50%";
		
		if (substr($area_estrategica,0,4) != '9.00')
		{
		echo '<table cellpadding="5">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '4) '.$ob[$r].' <b>Critério 4:</b> ';
		echo 'Este projeto foi assinalado pelo professor proponente para concorrer as bolsas de IC de ';
		echo ' áreas estratégicas (<B>'.trim($area_estrategica_nome).'</B>) da PUCPR. O projeto se enquadra na área assinalada?';
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
$r = 5; /* numero da questão */
		$resposta = array('1'=>'SIM','2'=>'NÃO','3'=>'Tenho dúvidas','4'=>'Já existe o parecer de aprovação anexado');
		$size = "";
		echo '<table cellpadding="5" width="100%">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '5) '.$ob[$r].' <b>Critério 5:</b> ';
		echo 'Este projeto envolve SERES HUMANOS e, portanto, deve ser analisado pelo Comitê de Ética (CEP), respectivamente ?';
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
$r = 6; /* numero da questão */
		$resposta = array('1'=>'SIM','2'=>'NÃO','3'=>'Tenho dúvidas','4'=>'Já existe o parecer de aprovação anexado');
		$size = "";
		echo '<table cellpadding="5" width="100%">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '6) '.$ob[$r].' <b>Critério 6:</b> ';
		echo 'Este projeto envolve ANIMAIS e, portanto, deve ser analisado pelo Comitê de Ética no Uso de Animais (CEUA), respectivamente ?';
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
Comentários sobre sua avaliação do projeto do professor:
<br>
<textarea name="dd21" cols=80 rows=4 style="width: 100%"><?php echo $dd21; ?>
</textarea>
</td>
</tr>
</table>
