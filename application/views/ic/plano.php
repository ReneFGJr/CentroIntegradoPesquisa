<?php
$us_nada = '<font color="blue">[em construção]</font>';

if ($ic_pre_data != '0000-00-00') {
	if (perfil('#DGP#CPS#COO#CPP#SPI#ADM') == 1) {
		$link_pre = '<div class="nopr" style="z-index:999999; float: right;">
					<a href="#" onclick="newwindows(\'' . base_url('index.php/ic/form/PROF_FORM/' . $ic_plano_aluno_codigo . '/' . checkpost_link($ic_plano_aluno_codigo)) . '\',600,500);" class="link lt1" style="z-index: 1000;">
					<img src="' . base_url('img/icon/icone_post_form.png') . '" height="12">
					</A></div>';
	} else {
		$link_pre = '';
	}
}
?>
<fieldset class="fieldset01" >
	<legend class="legend01">
		Dados do projeto
	</legend>
	<table width="100%" class="tabela01" border=0>
		<tr class="lt0">
		<tr valign="top">
			<td class="lt0" align="left" colspan=4>Título da pesquisa do estudante (Plano do aluno)
			<BR>
			<font class="lt3"><B><?php echo $ic_projeto_professor_titulo;?></B></td>
			<td width="400" rowspan=10 >
			<div id="plano" style="width: 400px; z-index: 1; display: table; ">
				<div id="banner" style="background-image: url( '<?php echo base_url("img/ic/banner_" . $id_s . '.png');?>');
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
							<td class="lt2" ><font color="#333333"><b><?php echo $s_situacao;?></b></font></td>
						</tr>
						<tr>
							<td align="right" class="lt0">Ano<td class="lt1" width=60% ><B><?php echo $ic_ano;?></b></td>
						</tr>
						<tr>
							<td align="right" class="lt0">Programa</td><td class="lt1" ><B><?php echo $mb_tipo;?></b></td>
						</tr>
						<tr>
							<td align="right" class="lt0">Modalidade de IC</td><td class="lt1" ><B><?php echo $mb_descricao;?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Ativado</td><td class="lt1" ><B><?php echo $ic_dt_ativacao;?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right"><?php echo $link_pre;?>Form. Acompanhamento</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_pre_data;?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Data de entrega Rel. Parcial </td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_rp_data;?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Data de entrega Rel. Final</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_rf_data;?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Dt. Entrega Resumo</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_resumo_data;?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">semic</td><td class="lt1"><B><B><font color="a0a0a0"><?php echo $ic_semic_data;?></B></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Idioma de apresentação SEMIC</td>
							<td class="lt1"><b><?php echo msg($ic_semic_idioma);?></b></td>
						</tr>
						<tr>
							<td class="lt0" align="right">Área no SEMIC</td>
							<td class="lt1"><b><?php echo $ic_semic_area;?></b></td>
						</tr>
					</table>
				</div>
			</div>
			<tr class="lt0" valign="top">
				<td colspan=3>Nome do orientador (professor)
				<br>
				<font class="lt1"> <B><?php echo $pf_nome . ' (' . $pf_cracha . ')';?></td>
				<td class="lt0" align="right" rowspan=3 width="150">Protocolo
				<br>
				<B><font class="lt2">
					<nobr>
						<?php echo $ic_plano_aluno_codigo;?>
						/ <?php echo $ic_projeto_professor_codigo;?>
					</nobr></font>
				<br>
				<img src="<?php echo $logo;?>" height="50"> </td>
			</tr>
			<tr class="lt0">
				<td colspan=3>Nome do estudante
				<br>
				<font class="lt1"> <B><?php echo $al_nome . ' (' . $al_cracha . ')';?></td>
			</tr>
			<tr class="lt0">
				<td colspan=2>Curso professor / aluno<font class="lt1">
				<BR>
				<B><?php echo $pf_curso;?> / <?php echo $al_curso;?></td>
			</tr>
			<tr class="lt0">
				<td colspan=2><?php echo msg('Vigencia');?>
				<br>
				<font class="lt1">
				<B><?php echo stodbr($aic_dt_entrada);?> - <?php echo stodbr($aic_dt_saida);?> <?php echo $ic_ativar;?></td>
			</tr>
	</table>
</fieldset>