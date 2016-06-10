<?php
$dd20 = get("dd20");
$dd30 = get("dd30");
$dd31 = get("dd31");
$dd32 = get("dd32");
$dd33 = get("dd33");
$dd34 = get("dd34");
$dd35 = get("dd35");


$check_dd32 = '';
if ($dd32 == '1') { $check_dd32 = 'checked';
}

$dsp = 'none';
$dsp_bt = '';


$dd20 = get("dd20");
if ($dd20 == '1') {
	$dsp_bt = 'none';
	$dsp = '';
}

$check_dd33A = '';
$check_dd33B = '';
$check_dd33C = '';

/******************************************************* REGRAS DE VALIDAÇÂO DE PLANOS ****************************/
$pl = $resumo_planos;
$post_pibic = 1;
$post_pibiti = 1;
$post_pibicem = 1;

$total_pibic = 0;
$total_pibiti = 0;
$total_pibicem = 0;

for ($r = 0; $r < count($pl); $r++) {
	$tipo = $pl[$r]['doc_edital'];
	$total = $pl[$r]['total'];
	$proto = $pl[$r]['doc_protocolo_mae'];

	if ($proto == $doc_protocolo_mae) {
		if (($tipo == 'PIBIC') and ($total >= 2)) { $post_pibic = 0;
		}
		if (($tipo == 'PIBITI') and ($total >= 2)) { $post_pibiti = 0;
		}
		if (($tipo == 'PIBICEM') and ($total >= 1)) { $post_pibicem = 0;
		}
	}
	if ($tipo == 'PIBIC') { $total_pibic = $total_pibic + $total;
	}
	if ($tipo == 'PIBITI') { $total_pibiti = $total_pibiti + $total;
	}
	if ($tipo == 'PIBICEM') { $total_pibicem = $total_pibicem + $total;
	}
}


/**************************** Limite por titulacao ***************************/
/********** MESTRE *************/
$titulacao = $usuario_titulacao_ust_id;
$us_tipo = $id_ustp;

/***** Professores *************/
if ($us_tipo == 2) {
	/* Mestre  */
	if ($titulacao == 5) {
		if ($total_pibic >= 2) { $post_pibic = 0;
		}
		if ($total_pibiti >= 2) { $post_pibiti = 0;
		}
		if ($total_pibicem >= 2) { $post_pibicem = 0;
		}
	}
	/********** MESTRE *************/
	if (($titulacao == 6) or ($titulacao == 7)) {
		if ($total_pibic >= 4) { $post_pibic = 0;
		}
		if ($total_pibiti >= 4) { $post_pibiti = 0;
		}
		if ($total_pibicem >= 4) { $post_pibicem = 0;
		}
	}
} else {
	/* Doutorando */
	if ($usuario_tipo_ust_id == 7)
		{
			$us_tipo = '7';
		}
	$post_pibicem = 0;
	/********** MESTRANDO *************/
	if (($us_tipo != 7) and ($us_tipo != 8)) {
		$post_pibic = 0;
		$post_pibiti = 0;
	}
	/********** DOUTORANDO *************/
	if ($us_tipo == 7) {
		if ($total_pibic >= 1) { $post_pibic = 0;
		}
		if ($total_pibiti >= 1) { $post_pibiti = 0;
		}
	}	
	/********** Pós-Doutorando *************/
	if ($us_tipo == 8) {
		if ($total_pibic >= 2) { $post_pibic = 0;
		}
		if ($total_pibiti >= 2) { $post_pibiti = 0;
		}
	}
}

if (($post_pibic == 0) and ($post_pibiti == 0) and ($post_pibicem == 0))
	{
		echo '<div>';
		echo '<img src="'.base_url('img/icon/icone_exclamation.png').'" height="50" align="left">';
		echo '<h1>Atingido o número máximo de Planos</h1>';
		echo '</div>';
		return('');
	}

/****************************************************************/
if ($dd33 == 'PIBIC') { $check_dd33A = 'checked';
}
if ($dd33 == 'PIBITI') { $check_dd33B = 'checked';
}
if ($dd33 == 'PIBICEM') { $check_dd33C = 'checked';
}
?>
<table width="100%" class="tabela01 lt1 border1" style="display: <?php echo $dsp; ?>; padding:20px; border-radius: 10px;" id="plano_novo">
	<tr>
		<td><h1>Dados do Plano do Aluno</h1></td>
	</tr>
	<tr>
		<Td>Título do plano</Td>
	</tr>
	<tr>
		<td>		<textarea name="dd30" id="dd30" style="width:100%; height: 80px;"><?php echo $dd30; ?></textarea></td>
	</tr>

	<tr>
		<td><font class="lt3">Modalidade de Submissão</font>
		<br>
		<?php if ($post_pibic==1) {
		?>
		<input type="radio" name="dd33" value="PIBIC" <?php echo $check_dd33A; ?>   >
		<font class="lt1">Iniciação Científica (PIBIC)</b>.<br>
		<?php } else { ?>
		<font class="lt1"><strike>Iniciação Científica (PIBIC)</strike></b> (<font color="red">limite de planos</font>).<br>
		<?php } ?>

		<?php if ($post_pibiti==1) {
		?>
		<input type="radio" name="dd33" value="PIBITI" <?php echo $check_dd33B; ?>  ><font class="lt1">Iniciação Tecnológica (PIBITI)</b>.<br>
		<?php } else { ?>
		<font class="lt1"><strike> Iniciação Tecnológica (PIBITI)</strike></b> (<font color="red">limite de planos</font>).<br>
		<?php } ?>

		<?php if ($post_pibicem==1) {
		?>		<input type="radio" name="dd33" value="PIBICEM" <?php echo $check_dd33C; ?> ><font class="lt1">Iniciação Científica - Ensimo médio (PIBIC_EM) (Júnior)</b>.<br>
		<?php } else { ?>
		<font class="lt1"><strike> Iniciação Científica - Ensimo médio (PIBIC_EM) (Júnior)</strike></b> (<font color="red">limite de planos</font>).<br>
		<?php } ?>			
		</font></td>
	</tr>

	<tr>
		<td>
		<br>
		<font class="lt3">Informações do Aluno</font>
		<br>
		<input type="checkbox" name="dd99" value="1" onclick="$('#dd31').val('00000000');">
		<font class="lt1">Não vou indicar o aluno na submissão, somente na implementação</b>.</font>
		<br>
		Código do aluno:
		<input type="text" name="dd31" id="dd31" value="<?php echo $dd31; ?>">
		<br>
		<font class="lt0">Informe o crachá do aluno, caso não tenha aluno para indicar, utilize '00000000' (oito zeros).</font>
		</td>
	</tr>

	<tr>
		<td>
		<input type="checkbox" name="dd32" value="1" <?php echo $check_dd32; ?> >
		<font class="lt1">O aluno fez o Ensino Médio em <b>Escola Pública</b>.</font>
		<br>
		<input type="submit" name="acao" value="gravar plano >>">
		</td></tr>
		</table>
		<input type="hidden" name="dd20" value="1">

		<a href="#" class="btn btn-primary" id="botao" style="display: <?php echo $dsp_bt; ?>;">Incluir novo Plano de Aluno >
		>></a>
		<br>
		<br>
		<br>
		<script>
			$("#botao").click(function() {
				$("#plano_novo").toggle();
				$("#botao").toggle();
			});
		</script>
