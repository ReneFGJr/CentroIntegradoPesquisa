<?php
class protocolos_ic extends CI_Model
	{
	function le($id=0)
		{
			$sql = "select * from ic_protocolos
						left join us_usuario on us_cracha = pr_solicitante 
						where id_pr = ".round($id);
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return($rlt[0]);
				} else {
					return(array());
				}
		}
	function acoes_abertas()
		{
			$sx = '<h3>'.msg('solicitacoes').':</h3>';
			$sx .= '<ul >';
			/* */
			$linka = '<a href="'.base_url('index.php/pibic/proto_abrir/SBS/').'" class="link lt2">';
			$sx .= '<li>'.$linka.'Substituição do aluno'.'</a>'.'</li>';
			
			/* cancelamento de orientação */
			$linka = '<a href="'.base_url('index.php/pibic/proto_abrir/CAN/').'" class="link lt2">';
			$sx .= '<li>'.$linka.'Cancelamento de Orientação'.'</a>'.'</li>';
			
			/* */
			$linka = '<a href="'.base_url('index.php/pibic/proto_abrir/ALT/').'" class="link lt2">';
			$sx .= '<li>'.$linka.'Alteração de título do Plano do Aluno'.'</a>'.'</li>';
			

			/* */
			$linka = '<a href="'.base_url('index.php/pibic/proto_abrir/REC/').'" class="link lt2">';
			$sx .= '<li>'.$linka.'Recurso'.'</a>'.'</li>';
			/* */
			//$linka = '<a href="'.base_url('index.php/protocolos_ic/abrir/004/').'" class="link lt2">';
			//$sx .= '<li>'.$linka.'Impressão do Convite Horas Eventuais IC'.'</a>'.'</li>';

			$sx .= '</ul>';
			return($sx);
		}
	function protocolos_abertos_pesquisador($cracha='')
		{
			$sql = "select * from ic_protocolos 
					left join us_usuario on us_cracha = pr_solicitante
						where pr_solicitante = '$cracha'
						order by pr_status
					 ";
			$rlt = db_query($sql);
			$total = 0;
			$sx = '<table width="100%" class="lt2">';
			$sx .= '<tr><th>protocolo</th>
						<th>abertura</th>
						<th>tipo</th>
						<th>solicitante</th>
						<th>status</th>
					</tr>						
					';
			if ($line = db_read($rlt))
				{
					$link = '<a href="'.base_url('index.php/pibic/pibic_protocolo_ver/'.$line['id_pr']).'/'.checkpost_link($line['id_pr']).'" class="link lt2">';
					$total++;
					$sx .= '<tr>';
					$sx .= '<td align="center">';
					$sx .= $link;
					$sx .= strzero($line['id_pr'],5).'/'.substr($line['pr_ano'],2,2);
					$sx .= '</a>';
					$sx .= '</td>';
					
					$sx .= '<td align="center">';
					$sx .= stodbr($line['pr_data']);
					$sx .= '</td>';

					$sx .= '<td>';
					$sx .= msg('protocolo_ic_'.$line['pr_tipo']);
					$sx .= '</td>';
					
					$sx .= '<td>';
					$sx .= $line['us_nome'];
					$sx .= '</td>';

					$sx .= '<td align="center">';
					$sx .= msg('status_protocolo_'.$line['pr_status']);
					$sx .= '</td>';
					$sx .= '</tr>';
				} else {
					$total = 0;
				}
				$sx .= '</table>';
			return($sx);
		}
	function protocolos_abertos()
		{
			return(0);
			$sql = "select count(*) as total from ic_protocolos where pr_status ='A' group by pr_status = 'A' ";
			$rlt = db_query($sql);
			if ($line = db_read($rlt))
				{
					$total = $line['total'];
				} else {
					$total = 0;
				}
			return($total);
		}	
	}
?>
