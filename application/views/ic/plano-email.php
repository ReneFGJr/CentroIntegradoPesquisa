<style>
	.lt0 {
		font-size: 10px;
		font-family: Arial, Helvetica, sans-serif;
	}
	.lt1 {
		font-size: 11px;
		font-family: Arial, Helvetica, sans-serif;
	}
	.lt2 {
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
	}
	.lt3 {
		font-size: 13px;
		font-family: Arial, Helvetica, sans-serif;
	}
	.lt5 {
		font-size: 16px;
		font-family: Arial, Helvetica, sans-serif;
	}
	.lt6 {
		font-size: 17px;
		font-family: Arial, Helvetica, sans-serif;
	}
</style>
<table class="lt0">
	<tr>
		<td>
		<table border=0 width="100%" class="border1" cellpadding="4" cellspacing="0">
			<tr class="lt0" valign="top" cellspacing=0 cellpadding=3>
				<td rowspan=4> Protocolo:
				<br>
				<b><?php echo $ic_plano_aluno_codigo;?></b>
				<br>
				<FONT CLASS="lt2"><?php echo $s_situacao;?></FONT>
				<br>
				<font class="lt6"><b><?php echo $ic_ano;?></b></font>
				<br>
				<FONT class="lt1">Modalidade</FONT>
				<br>
				<font class="lt6"><b><?php echo $mb_tipo;?></b></font></td>
				<td class="lt3" align="left" colspan=1>
				<div>
					<B><?php echo $ic_projeto_professor_titulo;?></B>
				</div></td>
				<td class="lt0" align="right" rowspan=5 width="1"></td>
			</tr>
			<tr class="lt0"  >
				<td>Nome do orientador (professor)
				<br>
				<font class="lt1"> <B><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')';?></td>
			</tr>
			<tr class="lt0" >
				<td>Nome do estudante
				<br>
				<font class="lt1"> <B><?php echo $al_nome . ' (' . $id_al . ')';?></td>
			</tr>
			<tr class="lt0" >
				<td>Bolsa: <font class="lt1"> <b><?php echo $mb_descricao;?>/ <?php echo $ic_ano;?></b></td>
			</tr>
			<tr class="lt0" >
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
				echo '<input type="submit" value="' . $botao . '">';
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
</table>