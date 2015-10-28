<?php
/****** Autores ************/
$nome_trab = '';
$nome_cita = '';
$nome_quali = '';
for ($r = 0; $r < count($autores); $r++) {
	$nome = nbr_autor($autores[$r]['sma_nome'], 7);
	$t = $autores[$r]['sma_funcao'];
	if ($r > 0) { $nome_trab .= '; ';
	}
	if ($r > 0) { $nome_cita .= '; ';
	}
	$nome_trab .= nbr_autor($nome, 1) . '<sup>' . ($r + 1) . '</sup>';
	$nome_cita .= nbr_autor($nome, 5);
	switch($t) {
		case '2' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Co-orientador. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '3' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Colaborador. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '7' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Mestrando de Pós-Graduação. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '8' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Doutorando de Pós-Graduação. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '4' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Pibic Junior. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '5' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Supervisor Pibic Junior. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '6' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Escola (para Pibic Júnior). ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '9' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Orientador. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
		case '0' :
			$nome_quali .= '<sup>' . ($r + 1) . '</sup> Estudante. ' . $autores[$r]['sma_instituicao'] . '<br>';
			break;
	}
}
?>
<table width="980" border=0 align="center">
	<tr>
		<td>
			<a href="#resumo" class="link lt1">VER RESUMO</a>
			<?php if ($mapa==1)
				{
					echo ' | <a href="#mapa" class="link lt1">VER LOCALIZAÇÂO DO PÔSTER</a>';		
				}
			?>			
		</td>
	</tr>
	<tr>
		<td align="center"><font class="lt5"><b><?php echo $sm_titulo;?></b></font>
		<BR>
		<font class="lt4"><i><?php echo $sm_titulo_en;?></i></font>
		<BR>
		</td>
	</tr>
	<tr>
		<td>
		<br>
		<div style="text-align:right;">
			<?php echo $nome_trab;?>
			<BR>
			<?php echo $mb_tipo;?>
			- <?php echo $mb_descricao;?>
			<BR>
			<I>--</I>
			<br>
			<font class="lt1"><?php echo $nome_quali;?></font>
		</div>
		<BR>
		</td>
	</tr>
</table>
<BR>
