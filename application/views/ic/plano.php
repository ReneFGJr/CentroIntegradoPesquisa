<?php
$us_nada = '<font color="blue">[em constru��o]</font>';
?>
<fieldset class="fieldset01">
	<legend class="legend01">
		Dados do projeto
	</legend>
	<table width="100%" class="tabela01" border=0>
		<tr class="lt0">
			<tr valign="top">
				<td class="lt0" align="left" colspan=3>T�tulo da pesquisa do estudante (Plano do aluno)
				<BR>
				<font class="lt3"><B><?php echo $ic_projeto_professor_titulo; ?></B></td>
		
			<td class="lt0" align="right" rowspan=3>Protocolo</td>
				<td width="160" rowspan=3><B><?php echo $ic_plano_aluno_codigo; ?> / <?php echo $ic_projeto_professor_codigo; ?>
				<br>
				<img src="<?php echo $logo; ?>" height="50">				
				
			</td>
			<td width="400" rowspan=10 >
			<div id="plano" style="width: 400px; z-index: 1; display: table; ">
				<div id="banner" style="background-image: url( 'http://www2.pucpr.br/reol/img/banner_ativo.png');
				width: 200px; height: 134px;
				position: absolute;
				z-index: 2;
				margin-left: 200px;
				"
				class="nopr"></div>
				<div id="dados" style="width: 400px; display: table; ">
					<table width="100%" border=0 cellspan=0 cellpadding=0 style="background-color: #F0F0F0;">
						<tr>
							<td align="right" class="lt0"><I>Status</I></td>
							<td class="lt2" ><font color="<?php echo $s_cor; ?>"><b><?php echo $s_situacao; ?></b></font></td>
						</tr>
						
						<tr>
							<td align="right" class="lt0">Ano<td class="lt1" width=60% ><B><?php echo $ic_ano; ?></b></td>
						</tr>
						<tr>
							<td align="right" class="lt0">Programa</td><td class="lt1" ><B><?php echo $mb_tipo; ?></b></td>
						</tr>
						<tr>
							<td align="right" class="lt0">Modalidade de IC</td><td class="lt1" ><B><?php echo $mb_descricao; ?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Ativado</td><td class="lt1" ><B><?php echo $ic_dt_ativacao; ?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Data de entrega Rel. Parcial</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_rp_data; ?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Data de entrega Rel. Final</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_rf_data; ?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Dt. Entrega Resumo</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_resumo_data; ?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">semic</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_semic_data; ?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Idioma de apresenta��o SEMIC</td>
							<td class="lt1"><b><?php echo msg($ic_semic_idioma); ?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">�rea no SEMIC</td>
							<td class="lt1"><b><?php echo $ic_semic_area; ?></b></td>
						</tr>
					</table>
				</div>
			</div>

			<tr class="lt0">
				<td colspan=3>Nome do orientador (professor)
				<br>
				<font class="lt1"> <B><?php echo $pf_nome . ' (' . $pf_cracha . ')'; ?></td>
			</tr>
			<tr class="lt0">
				<td colspan=3>Nome do estudante
				<br>
				<font class="lt1"> <B><?php echo $al_nome . ' (' . $al_cracha . ')'; ?></td>
			</tr>
			<tr class="lt0">
				<td colspan=5>Curso professor / aluno<font class="lt1">
				<BR>
				<B><?php echo $us_nada; ?> / <?php echo $us_nada; ?></td>
			</tr>
			<tr class="lt0">
				<td colspan=5><?php echo mst('Vigencia'); ?>
				<br><font class="lt1">
				<B><?php echo stodbr($aic_dt_entrada); ?> - <?php echo stodbr($aic_dt_saida); ?> <?php echo $ic_ativar; ?></td>
			</tr>			
	</table>
</fieldset>