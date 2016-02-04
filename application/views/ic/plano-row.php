<?php
$link_ic = link_ic($id_ic, $page);
$status = $icas_id_char;
$status = $s_situacao;
$cors = '';
$img_status = base_url('img/icon/icone_canceled.png');
$cors = $s_cor;
$lt_cor = '<font color="blue">';
$cor_tb = '#ffffff';
?>
<tr>
	<td class="borderb1"><?php echo $ic_plano_aluno_codigo;?></td>
	<td class="borderb1"><?php echo $s_situacao;?></td>
	<td class="borderb1"><?php echo $ic_ano;?></td>
	<td class="borderb1"><?php echo $link_ic . $lt_cor . $ic_projeto_professor_titulo . '</a>';?></td>
	<td class="borderb1"><?php echo $pf_nome . ' (' . $ic_cracha_prof . ')';?></td>
	<td class="borderb1"><?php echo $al_nome . ' (' . $id_al . ')';?></td>
	<td class="borderb1"><?php echo $mb_descricao;?>/ <?php echo $ic_ano;?></td>
</tr>
