<?php
class Stricto_sensus extends CI_model {
	function le($id=0)
		{
			$id = round($id);
			$sql = "select * from ss_programa_pos
						left join us_usuario on id_us = id_us_coordenador
						left join area_avaliacao on pp_area = id_area  
						where id_pp = '.$id.' 
					order by pp_nome 
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			if (count($rlt) > 0)
				{
					return($rlt[0]);
				} else {
					return(array());
				}			
		}
	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_pp', '', False, True));
		array_push($cp, array('$S100', 'pp_nome', 'Nome do programa', True, True));
		array_push($cp, array('$S10', 'pp_sigla', 'Sigla', True, True));

		$sql = "select * from area_avaliacao order by area_avaliacao_nome ";
		array_push($cp, array('$Q id_area:area_avaliacao_nome:' . $sql, 'pp_area', 'Área de avaliação', False, True));

		array_push($cp, array('$[2-7]', 'pp_conceito', 'Nota do programa', True, True));

		array_push($cp, array('${', '', 'Modalidades disponíveis', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_mestrado', 'Mestrado', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_mestrado_prof', 'Mestrado Profissional', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_doutorado', 'Doutorado', True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_pos_doutorado', 'Pós-Doutorado', True, True));

		array_push($cp, array('$[1950-' . date("Y") . ']', 'pp_ano_inicio', 'Início do Mestrado', False, True));
		array_push($cp, array('$[1950-' . date("Y") . ']', 'pp_ano_inicio_doutorado', 'Início do Doutorado', False, True));
		array_push($cp, array('$}', '', 'Modalidades disponíveis', False, True));

		array_push($cp, array('$Q id_us:us_nome:select * from us_usuario where us_ativo = 1 and us_professor_tipo = 2', 'id_us_coordenador', 'Coordenador', False, True));

		array_push($cp, array('$O 1:SIM&0:NÃO', 'pp_ativo', 'Ativo', True, True));

		array_push($cp, array('$B8', '', 'salvar', False, True));
		return ($cp);
	}

	function lista_programas() {
		$sql = "select * from ss_programa_pos
						left join us_usuario on id_us = id_us_coordenador
						left join area_avaliacao on pp_area = id_area  
						where pp_ativo = 1 order by pp_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="lt2">';
		$sx .= '<tr>
							<th>Pos</th>
							<th>Programa</th>
							<th>Sigla</th>
							<th>Nível</th>
							<th>Código CAPES</th>
							<th>Área de avaliação</th>
							<th>Início Mestrado</th>
							<th>Início Doutorado</th>
							<th>Coordenador</th>
						</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Link */
			$link = '<A href="' . base_url('index.php/stricto_sensu/ver/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp'])) . '" class="link lt2">';

			$sx .= '<tr valign="top">';
			$sx .= '<td class="border1">' . ($r + 1) . '</td>';
			$sx .= '<td class="border1">' . $link . $line['pp_nome'] . '</a>' . '</td>';
			$sx .= '<td align="left" class="border1">' . $link . $line['pp_sigla'] . '</a>' . '</td>';
			$modalidade = '';
			if ($line['pp_mestrado'] == '1') { $modalidade .= 'M;';
			}
			if ($line['pp_doutorado'] == '1') { $modalidade .= 'D;';
			}
			if ($line['pp_mestrado_prof'] == '1') { $modalidade .= 'P;';
			}
			if ($line['pp_pos_doutorado'] == '1') { $modalidade .= 'PhD;';
			}
			$modalidade = substr($modalidade, 0, strlen($modalidade) - 1);
			$modalidade = troca($modalidade, ';', '/');
			$sx .= '<td class="border1" align="center">' . $modalidade . '</td>';

			$linkc = '<a href="http://conteudoweb.capes.gov.br/conteudoweb/ProjetoRelacaoCursosServlet?acao=detalhamentoIes&codigoPrograma=' . $line['pp_codigo_capes'] . '" class="link lt2" target="_new">';
			$sx .= '<td align="center" class="border1">' . $linkc . $line['pp_codigo_capes'] . '</a>' . '</td>';

			$sx .= '<td align="left" class="border1">' . $link . $line['area_avaliacao_nome'] . '</a>' . '</td>';
			$sx .= '<td align="center" class="border1">' . $link . $line['pp_ano_inicio'] . '</a>' . '</td>';
			$sx .= '<td align="center" class="border1">' . $link . $line['pp_ano_inicio_doutorado'] . '</a>' . '</td>';

			$sx .= '<td align="left" width="25%" class="border1">' . $line['us_nome'] . '</td>';

			if (perfil('#CPP#SPI#ADM') == 1) {
				$link = '<A href="' . base_url('index.php/stricto_sensu/editar/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp'])) . '" class="link lt1">editar</A>';
				$sx .= '<td align="center" class="border1">' . $link . '</td>';
			}

			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

}
?>
