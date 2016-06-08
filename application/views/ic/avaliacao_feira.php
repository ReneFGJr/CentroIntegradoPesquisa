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

1) <?php echo $ob[1]; ?>
<b>Critério 1:</b> ORIGINALIDADE: idéia que não segue nenhum modelo anterior; que não existia antes.
</br>
<?php
$sx = '<select class="lt6" name="dd1">'.cr();
$sx .= '<option></option>'.cr();
$dd1 = get("dd1");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd1) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>

<!----------------- item 2 ---------------------------->
<br>
<br>
2) <?php echo $ob[2]; ?>
<b>Critério 2:</b> CRIATIVIDADE:  capacidade de inventar, poder da imaginação.
<br>
<?php
$sx = '<select class="lt6" name="dd2">'.cr();
$sx .= '<option></option>'.cr();
$dd2 = get("dd2");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd2) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>
<!----------------- item 3 ---------------------------->
<br>
<br>
3) <?php echo $ob[3]; ?>
<b>Critério 3:</b> IMPACTO NA SOLUÇÃO DE PROBLEMAS:  o quanto o projeto em questão resolve algum problema no sub tema escolhido.
<br>
<?php
$sx = '<select class="lt6" name="dd3">'.cr();
$sx .= '<option></option>'.cr();
$dd3 = get("dd3");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd3) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>
<br><br>
<!----------------- item 3 ---------------------------->

4) <?php echo $ob[4]; ?>
<b>Critério 4:</b> VIABILIDADE TÉCNICA:  o quanto é  possível o serviço, processo ou produto ser produzido efetivamente, partindo de um recurso financeiro posterior.
<br>
<?php
$sx = '<select class="lt6" name="dd4">'.cr();
$sx .= '<option></option>'.cr();
$dd4 = get("dd4");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd4) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>
<br><br>
<!----------------- item 3 ---------------------------->
5) <?php echo $ob[5]; ?>
<b>Critério 5:</b> POTENCIAL DE IMPLEMENTAÇÃO: o quanto o serviço, processo ou produto é executável.
<br>
<?php
$sx = '<select class="lt6" name="dd5">'.cr();
$sx .= '<option></option>'.cr();
$dd5 = get("dd5");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd5) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>
<br><br>
<!----------------- item 3 ---------------------------->
6) <?php echo $ob[6]; ?>
<b>Critério 6:</b> QUALIDADE DO PROJETO:  forma de exposição do projeto quanto a contextualização, proposta do projeto, impactos da proposta, detalhamento técnico, viabilidade do negócio e referências de literatura.
<br>
<?php
$sx = '<select class="lt6" name="dd6">'.cr();
$sx .= '<option></option>'.cr();
$dd6 = get("dd6");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd6) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;
?>
<br><br>
<!----------------- item 3 ---------------------------->
7) <?php echo $ob[6]; ?>
<b>Critério 7:</b> Atribuia uma nota Geral a Proposta Submetida
<br>
<?php
$sx = '<select class="lt6" name="dd7">'.cr();
$sx .= '<option></option>'.cr();
$dd7 = get("dd7");
for ($r=1;$r <= 10;($r = $r + 0.5))
	{
		$selected = '';
		if ($r == $dd7) { $selected = 'selected'; }
		$sx .= '<option value="'.($r).'" '.$selected.'>'.number_format($r,1,',','.').'</option>'.cr();
		if ($r < 6) { $r = $r + (0.5); }
	}
$sx .= '</select>';
echo $sx;

$r = 20;
?>
<br><br>
Comentários sobre sua avaliação do projeto do professor (obrigatório):
<br>
<textarea name="dd<?php echo $r;?>" cols=80 rows=4 style="width: 100%;" ><?php echo get("dd".$r); ?></textarea>
</td>
</tr>
</table>
