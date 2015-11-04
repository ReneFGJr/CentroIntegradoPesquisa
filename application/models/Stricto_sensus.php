<?php
class Stricto_sensus extends CI_model
	{
		function cp()
			{
				$cp = array();
				array_push($cp,array('$H8','id_pp','',False,True));
				array_push($cp,array('$S100','pp_nome','Nome do programa',True,True));
				array_push($cp,array('$S10','pp_sigla','Sigla',True,True));
				array_push($cp,array('$O 1:SIM&0:NÃO','pp_mestrado','Mestrado',True,True));
				array_push($cp,array('$O 1:SIM&0:NÃO','pp_doutorado','Doutorado',True,True));
				array_push($cp,array('$Q id_us:us_nome:select us_usuario where us_ativo = 1 and us_ss = 1','id_us_coordenador','Coordenador',True,True));
				array_push($cp,array('$B8','','salvar',False,True));
				return($cp);
			}
		function lista_programas()
			{
				$sql = "select * from ss_programa_pos
						left join us_usuario on id_us = id_us_coordenador  
						where pp_ativo = 1 order by pp_nome ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				$sx = '<table width="100%" class="lt2 tabela">';
				$sx .= '<tr>
							<th>Pos</th>
							<th>Programa</th>
							<th>Sigla</th>
							<th>Modalidades</th>
							<th>Código CAPES</th>
							<th>Início Mestrado</th>
							<th>Início Doutorado</th>
							<th>Coordenador</th>
						</tr>';
				for ($r=0;$r < count($rlt);$r++)
					{
						$line = $rlt[$r];
						$sx .= '<tr>';
						$sx .= '<td>'.($r+1).'</td>';
						$sx .= '<td>'.$line['pp_nome'].'</td>';
						$sx .= '<td align="left">'.$line['pp_sigla'].'</td>';
						$modalidade = '';
						if ($line['pp_mestrado']=='1') { $modalidade .= 'M;'; }
						if ($line['pp_doutorado']=='1') { $modalidade .= 'D;'; }
						if ($line['pp_mestrado_prof']=='1') { $modalidade .= 'P;'; }
						if ($line['pp_pos_doutorado']=='1') { $modalidade .= 'PhD;'; }
						$modalidade = substr($modalidade,0,strlen($modalidade)-1);
						$modalidade = troca($modalidade,';','/');
						$sx .= '<td>'.$modalidade.'</td>';
						$sx .= '<td align="center">'.$line['pp_codigo_capes'].'</td>';
						$sx .= '<td align="center">'.$line['pp_ano_inicio'].'</td>';
						$sx .= '<td align="center">'.$line['pp_ano_inicio_doutorado'].'</td>';
						
						$sx .= '<td align="center" width="25%">'.$line['us_nome'].'</td>';
						
						$link = '<A href="'.base_url('index.php/stricto_sensu/editar/'.$line['id_pp'].'/'.checkpost_link($line['id_pp'])).'" class="link lt1">editar</A>';
						$sx .= '<td align="center">'.$link.'</td>';
						
						
						$sx .= '</tr>';
					}
				$sx .= '</table>';
				return($sx);
			}
	}
?>
