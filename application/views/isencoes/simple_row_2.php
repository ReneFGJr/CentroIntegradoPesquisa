<?php
global $header;
if (!(isset($acao))) { $acao = '&nbsp;'; }

if (!(isset($header))) {
	$header = 1;
	$sh = ' <tr>
				<th>#</th>
				<th>protocolo</th>
				<th width="20%">Professor</th>
				<th width="5%">Agência</th>
				<th width="20%">Título Projeto</th>
				<th width="10%">Nome do Edital</th>
				<th width="5%">Nr. Edital</th>
				<th width="20%">Beneficiário</th>
				<th width="20%">Situação</th>
			</tr>';
	echo $sh; 
	}
$id = $id_ca;
$cor = '';
switch ($bn_status)
	{
	case 'X':
		$cor = ' class="bg_lred" ';
		break;
	case 'Z':
		$cor = ' class="bg_lred" ';
		break;
	case 'H':		
		$cor = ' class="bg_lblue" ';
		break;
	default:
		$cor = ' class="bg_lgreen" ';
		break;
	}
?>
<tr valign="top" <?php echo $cor; ?>>
	<td class="border1" align="center"><?php echo $pos;?></td>
	<td class="border1"><a href="<?php echo base_url('index.php/captacao/view/'.$id.'/'.checkpost_link($id));?>" class="link"><?php echo $bn_original_protocolo;?></a></td>
	<td class="border1" align="center"><?php echo link_user($pf_nome,$id_pf);?></td>
	<td class="border1" align="center"><?php echo $ca_agencia;?></td>
	<td class="border1"><?php echo $ca_titulo_projeto;?></td>
	<td class="border1"><?php echo $ca_descricao;?></td>
	<td class="border1" align="center"><?php echo $ca_edital_nr;?></td>
	<td class="border1"><?php echo link_user($al_nome,$id_al);?></td>	
	<td class="border1"><?php echo $bns_descricao;?></td>
</tr>