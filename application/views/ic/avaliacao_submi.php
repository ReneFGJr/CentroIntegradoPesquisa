<?php
$color = '<font color="#3030ef">';
$obtrc = ' style="background-color: #FFe0e0;" ';
$chk = array();
$ob = array();
$obtr = array();
$ddx = 0;
if (!isset($ac_texto)) { $ac_texto = ''; }

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
<style>
HTML  CSS   Result
Edit on 
/**
 * Demo styles
 * Not needed for tooltips to work
 */

/* `border-box`... ALL THE THINGS! */
html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}


/**
 * Tooltip Styles
 */

/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 2;
  cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-bottom: 5px;
  margin-left: -80px;
  padding: 7px;
  width: 360px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background-color: #000;
  background-color: hsla(0, 0%, 20%, 0.9);
  color: #fff;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 14px;
  line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-left: -5px;
  width: 0;
  border-top: 5px solid #000;
  border-top: 5px solid hsla(0, 0%, 20%, 0.9);
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";
  font-size: 0;
  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}	
</style>
<?php
		$r = ($ddx + 4);
		$resposta = array('11'=>'SIM','10'=>'NÃO');
		$size = "50%";
		
		if (substr($area_estrategica,0,4) != '9.00')
		{
		echo '<br><br>';
		echo '<table cellpadding="5">'.cr();
		echo '<tr '.$obtr[$r].'>'.cr();
		echo '4) '.$ob[$r].' <b>Critério 4:</b> ';
		echo 'Este projeto foi assinalado pelo professor proponente para concorrer as bolsas de IC de ';
		echo ' áreas estratégicas (<B><a href="#" data-tooltip="'.$ac_texto.'" class="link">'.trim($area_estrategica_nome).'</a></B>) da PUCPR. O projeto se enquadra na área assinalada?';
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
			echo '<br><br>';
			echo '4) <b>Critério 4:</b> Área estratégica (Não aplicável).<br>';
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

$r = 9; /* numero da questão */
if (strlen(get("dd".$r)) == 0)
	{
		$bg = ' background-color: #FFe0e0 ';
	} else {
		$bg = '';
	}
?>
<br>
<br>
Comentários sobre sua avaliação do projeto do professor (obrigatório):
<br>
<textarea name="dd<?php echo $r;?>" cols=80 rows=4 style="width: 100%; <?php echo $bg; ?> " ><?php echo get("dd".$r); ?></textarea>
</td>
</tr>
</table>
