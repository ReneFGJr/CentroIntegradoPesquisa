<?php
$color = '<font color="#3030ef">';
$obtrc = ' style="background-color: #FFe0e0;" ';
$chk = array();
$ob = array();
$obtr = array();

$acao = get("acao");
for ($r=$ddx;$r < ($ddx+10);$r++)
	{
		$ob[$r] = '';
		$obtr[$r] = '';
	}

$acao = get("acao");

if (strlen($acao) > 0) {
	$obr = '<img src="' . base_url('img/icon/icone_exclamation.png') . '" height="30" align="left">';
	for ($r=$ddx;$r < ($ddx+10);$r++)
		{
			$vlr = get("dd".$r);
			if ((strlen($vlr) == 0) ) {
		 		$ob[$r] = $obr;
		 		$obtr[$r] = $obtrc;
			}			
		}	
}
?>
<br>
<ul>
		<br>
    <hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;">
</ul>
<h3>Avaliação do Plano do estudante - Plano <?php echo round(($ddx/10)-3);?></h3>
<form method="post">
<table width="90%" align="center">
<tr>
<td>
<?php echo $projeto; ?>
<br>
<!----------------- item 1 ---------------------------->
<br>
<!----------------- item 1 ---------------------------->
<?php $r = $ddx+1; /* numero da questão */ ?>
1) <?php echo $ob[$r]; ?>
<b>Critério 1 (plano <?php echo $doc_protocolo;?>)</b>: Coerência entre o projeto do orientador e o plano de trabalho do estudante, considerando a contribuição para a formação do discente.
</br>
<?php
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
<br>
<br>
<!----------------- item 2 ---------------------------->
<?php $r = $ddx+2; /* numero da questão */ ?>
2) <?php echo $ob[$r]; ?>
<b>Critério 2:</b>
Roteiro de atividades do aluno considerando a sua adequação ao processo de iniciação científica do estudante.
<br>
<?php
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
<br>
<br>
<!----------------- item 3 ---------------------------->
<?php $r = $ddx+3; /* numero da questão */ ?>
3) <?php echo $ob[$r]; ?>
<b>Critério 3:</b> 
Adequação do cronograma para a execução da proposta.
<br>
<?php
$resposta = array('10'=>'Adequado','5'=>'Parcialmente adequado','1'=>'Inadequado');
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
<br>
<br>
<?php
$r = ($ddx + 4);
switch ($doc_edital)
	{
	case 'PIBIC':
		echo '<input name="dd'.$r.'" type="hidden" value="12">';
		break;
		
	case 'PIBITI':
		if($doc_edital = 'PIBITI'){
				$resposta = array('1'=>'SIM, deve migrar para o PIBITI','2'=>'NÃO','3'=>'Tenho dúvidas');
				$size = "33%";
				
				echo '<table cellpadding="5">'.cr();
				echo '<tr '.$obtr[$r].'>'.cr();
				echo '5) '.$ob[$r].' <b>Critério 4:</b> ';
				echo 'Este projeto apresenta inovação tecnológica ?';
				foreach ($resposta as $item => $valor) {
					$checked = '';
					$bg = '';
					if (get("dd".$r) == $item) { $checked = 'checked'; $bg = 'background-color: #80ff80;';}
					echo '<td class="border1" style="'.$bg.'" width="'.$size.'">';
					echo '<input name="dd'.$r.'" type="radio" value="'.$item.'" '.$checked.'>'.$valor;
					echo '</td>';
					}
				echo '</tr></table>';
				break;
		}else{
			
		}
	case 'DEFAULT':
		echo '<input name="dd'.$r.'" type="hidden" value="0">';
		break;
	}
	
$r=($ddx+5);	
echo '<input name="dd'.$r.'" type="hidden" value="0">';


$r = ($ddx + 9);
if (strlen(get("dd".$r)) == 0)
	{
		$bg = ' background-color: #FFe0e0 ';
	} else {
		$bg = '';
	}
?>
<!---------------------------------------------------------------- CEP / CEUA ----------------------->

<br>
Comentários sobre sua avaliação referente a este plano do estudante: (obrigatório)<br>
<textarea name="dd<?php echo $r;?>" cols=80 rows=4 style="width: 100%; <?php echo $bg; ?> " ><?php echo get("dd".$r); ?></textarea>
</td>
</tr>
</table>
