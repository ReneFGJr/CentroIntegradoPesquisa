<?php
$link_ic = link_ic($id_ic, $page);
$status = $icas_id_char;
$status = $s_situacao;
$cors = '';
$img_status = base_url('img/icon/icone_canceled.png');
$cors = $s_cor;
$lt_cor = '<font color="blue">';
$st = '<div id="banner' . $id_ic . '" style="background-image: url( \'' . base_url('img/ic/banner_' . $id_s . '.png') . '\'); 
	width: 200px; height: 130px;	border: 0px solid #000000;	position: absolute;	margin-left: -200px;"></div>';
$cor_tb = '#ffffff';
switch ($id_s) {
	case '2' :
		$lt_cor = '<font color="#C00000"><s>';
		$cor_tb = "#FFF0F0";
		break;
	case '4' :
		$lt_cor = '<font color="#000">';
		$cor_tb = "#f0f0f0";
		break;
}
?>
<tr>
	<td>
	<table border=0 width="100%" class="border1" cellpadding="4" cellspacing="0" bgcolor="<?php echo $cor_tb;?>">
		<tr class="lt0" valign="top" cellspacing=0 cellpadding=3>
			<td rowspan="5" width="80"><img src="<?php echo $img;?>" height="40">
			<br>
			Protocolo:
			<br>
			<b><?php echo $ic_plano_aluno_codigo;?></b>
			<br>
			<FONT CLASS="lt2"><?php echo $s_situacao;?></FONT>
			<br>
			<font class="lt6"><b><?php echo $ic_ano;?></b></font></td>
			<td class="lt3" align="left" colspan=1>
			<div>
				<B><?php echo $link_ic . $lt_cor . $ic_projeto_professor_titulo . '</font></a>';?></B>
			</div></td>
			<td class="lt0" align="right" rowspan=5 width="1">
			<div>
				<?php echo $st;?>
			</div></td>
		</tr>
		<tr class="lt0" <?php echo $cors;?> >
			<td>Nome do orientador (professor)
			<br>
			<font class="lt1"> <B><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')';?></td>
		</tr>
		<tr class="lt0" <?php echo $cors;?>>
			<td>Nome do estudante
			<br>
			<font class="lt1"> <B><?php echo $al_nome . ' (' . $id_al . ')';?></td>
		</tr>
		<tr class="lt0" <?php echo $cors;?>>
			<td>Bolsa: <font class="lt1"> <b><?php echo $mb_descricao;?>/ <?php echo $ic_ano;?></b></td>
		</tr>
		<tr class="lt0" <?php echo $cors;?>>
			<td><?php echo msg('Vigencia');?>
			<br>
			<font class="lt1">
			<B><?php echo stodbr($aic_dt_entrada);?> - <?php echo stodbr($aic_dt_saida);?></td>
		</tr>
		<?php
		/* Parametros adicionais */
		if ((isset($botao)) and (strlen($botao) > 0)) {
			echo '<tr class="lt0">';
			echo '<td></td>';
			echo '<td>';
			echo '<form>';
			echo '<input type="submit" value="' . $botao . '" class="btn btn-primary" style="text-align: center;">';
			echo '<input type="hidden" name="dd2" value="' . $ic_plano_aluno_codigo . '">';
			echo '<input type="hidden" name="dd3" value="' . checkpost_link($ic_plano_aluno_codigo . $acao) . '">';
			echo '<input type="hidden" name="dd4" value="' . $acao . '">';
			echo '</form>';
			echo '</td>';
			echo '</tr>';
		}
		?>
	</table></td>
</tr>
<tr>
	<td colspan=3>
	<hr width="50%" size="1">
	</td>
</tr>