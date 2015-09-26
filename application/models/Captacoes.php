<?php
class captacoes extends CI_Model
	{
	function lista($cracha='')
		{
			$sql = "select * from captacao
					left join captacao_situacao on ca_status = ca_status_old 
					where ca_professor = '$cracha' ";
			$rlt = db_query($sql);
			$sx = '<table width="100%" class="tabela1 lt2" cellpadding=3>';
			while ($line = db_read($rlt))
				{
					$nome = $line['ca_descricao'];
					$edital_nr = $line['ca_edital_nr'];
					$ca_protocolo = $line['ca_protocolo'];
					$ano = $line['ca_edital_ano'];
					$vigencia = strzero($line['ca_vigencia_ini_mes'],2).'/'.strzero($line['ca_vigencia_ini_ano'],4);
					$duracao = $line['ca_duracao'];
					$situacao = $line['cs_situacao'];
					$cor = trim($line['cs_cor']);
					$xcor = '';
					if (strlen($cor) > 0)
						{
							$cor = '<font color="'.$cor.'">';
							$xcor = '</font>';
						}
					
					$sx .= '<tr>';
					$sx .= '<td class="border1" align="center">'.$cor.$ca_protocolo.$xcor.'</td>';
					
					$sx .= '<td class="border1">'.$cor.$nome.$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$edital_nr.'/'.strzero($ano,4).$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$vigencia.$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$duracao.' mesês'.$xcor.'</td>';
					
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_capital'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_custeio'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_bolsa'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_outros'],2,',','.').$xcor.'</td>';
					
					$sx .= '<td class="border1" align="center">'.$cor.$situacao.$xcor.'</td>';
					
					$sx .= '</tr>';
					$ln = $line;
				}
				print_r($ln);
			$sx .= '</table>';
			return($sx);
		}	
	}
?>
