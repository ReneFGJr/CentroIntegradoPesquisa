<?php
if (!(isset($acao))) { $acao = '&nbsp;'; }
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
	<td class="border1"><a href="<?php echo base_url('index.php/captacao/view/'.$id.'/'.checkpost_link($id));?>" class="link"><?php echo $bn_original_protocolo;?></a></td>
	<td class="border1" align="center"><?php echo $ca_agencia;?></td>
	<td class="border1"><?php echo $ca_titulo_projeto;?></td>
	<td class="border1"><?php echo $ca_descricao;?></td>
	<td class="border1" align="center"><?php echo $ca_edital_nr;?></td>
	<td class="border1"><?php echo $us_nome;?></td>	
	<td class="border1"><?php echo $bns_descricao;?></td>
</tr>