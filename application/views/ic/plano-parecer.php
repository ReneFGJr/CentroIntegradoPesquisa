<center>
	<h3><?php echo $ic_projeto_professor_titulo;?></h3>
</center>
<table width="100%">
	<tr>
		<td style="font-size: 10px;">Protocolo:
		<br>
		<b><?php echo $ic_plano_aluno_codigo;?></b></td>
		<td style="font-size: 10px;">Situação:
		<br>
		<b><?php echo $s_situacao;?></b></td>
		<td style="font-size: 10px;"> Ano Edital:
		<br>
		<b><?php echo $ic_ano;?></b></td>
		<td style="font-size: 10px;"> Modalidade:
		<br>
		<b><?php echo $mb_tipo;?></b></td>
	</tr>
	<tr>
		<td class="lt3" align="left"></td>
		<td align="right" rowspan=5 width="1"></td>
	</tr>
</table>

<table width="100%">
	<tr>
		<td style="font-size: 8px;" align="right" width="30%">Nome do orientador (professor) </td><td> <B><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')';?></B></td>
	</tr>
	<tr >
		<td style="font-size: 8px;" align="right" width="30%">Nome do estudante </td><td> <B><?php echo $al_nome . ' (' . $id_al . ')';?></B></td>
	</tr>
	<tr >
		<td style="font-size: 8px;" align="right" width="30%">Bolsa: </td><td> <b><?php echo $mb_descricao;?>/ <?php echo $ic_ano;?></B></td>
	</tr>
	<tr >
		<td  style="font-size: 8px;" align="right" width="30%"><?php echo msg('Vigencia');?>:</td><td> <B><?php echo stodbr($aic_dt_entrada);?>- <?php echo stodbr($aic_dt_saida);?></B></td>
	</tr>
</table>