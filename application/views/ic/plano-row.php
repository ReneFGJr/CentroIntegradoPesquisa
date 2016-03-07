<?php
global $hd;
$link_ic = link_ic($id_ic, $page);
$status = $icas_id_char;
$status = $s_situacao;
$cors = '';
$img_status = base_url('img/icon/icone_canceled.png');
$cors = $s_cor;
$lt_cor = '<font color="blue">';
$cor_tb = '#ffffff';

if (!isset($hd))
	{
			echo 	'<tr>
						<th width="2%">#</th>
						<th width="5%">protocolo</th>
						<th width="5%">situação</th>
						<th width="3%">ano</th>
						<th width="25%">Título do plano</th>
						<th width="20%">Orientador</th>
						<th width="20%">Estudante</th>
						<th width="15%">Modalidade</th>
					</tr>';
			$hd = 1;
	} else {
		$hd++;
	}
?>
<tr valign="top">
	<td class="borderb1" align="center"><?php echo $hd;?></td>
	<td class="borderb1" align="center"><?php echo $link_ic . $ic_plano_aluno_codigo .'</a>' ;?></td>
	<td class="borderb1" align="center"><?php echo $s_situacao;?></td>
	<td class="borderb1" align="center"><?php echo $ic_ano;?></td>
	<td class="borderb1"><?php echo $ic_projeto_professor_titulo ;?></td>
	<td class="borderb1"><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')';?></td>
	<td class="borderb1"><?php echo $al_nome . ' (' . $id_al . ')';?></td>
	<td class="borderb1"><?php echo $mb_descricao;?>/ <?php echo $ic_ano;?></td>
</tr>
