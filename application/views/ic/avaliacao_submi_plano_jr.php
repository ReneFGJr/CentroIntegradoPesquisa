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
<h3>Ficha de avalia��o do Plano do estudante - Ensino M�dio - Plano <?php echo round(($ddx/10)-3);?></h3>
<form method="post">
<table width="90%" align="center">
<tr>
<td>
<?php echo $projeto; ?>
<br>
<!----------------- item 1 ---------------------------->
<br>
<!----------------- item 1 ---------------------------->
<?php $r = $ddx+1; /* numero da quest�o */ ?>
1) <?php echo $ob[$r]; ?>
<b>Crit�rio 1 (plano <?php echo $doc_protocolo;?>): As atividades propostas no plano do aluno est�o adequadas para estudante do ensino m�dio?.</b>:
</br>
<?php
$resposta = array('1'=>'SIM','2'=>'Parcialmente adequado','3'=>'N�O','4'=>'Tenho d�vidas');
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

<!----------------- item 2 ---------------------------->
<?php 
$r = ($ddx + 2); 
echo '<input name="dd'.$r.'" type="hidden" value="1">';

$r = ($ddx + 3); 
echo '<input name="dd'.$r.'" type="hidden" value="1">';

$r = ($ddx + 4);
echo '<input name="dd'.$r.'" type="hidden" value="1">';

$r = ($ddx + 5); 
echo '<input name="dd'.$r.'" type="hidden" value="1">';

$r = ($ddx + 9);; /* numero da quest�o */

if (strlen(get("dd".$r)) == 0)
	{
		$bg = ' background-color: #FFe0e0 ';
	} else {
		$bg = '';
	}
?>

Coment�rios sobre sua avalia��o do projeto do professor (obrigat�rio):
<br>
<textarea name="dd<?php echo $r;?>" cols=80 rows=4 style="width: 100%; <?php echo $bg; ?> " ><?php echo get("dd".$r); ?></textarea>
</td>
</tr>
</table>
<br>
<br>
