<?php
class Ics_indicadores extends CI_model {
	var $tabela = 'ic';
	var $tabela2 = 'evento_inscricao';
	

	function ind_alunos_curso() {

		$sql = "SELECT s_id, 
										CASE
											WHEN s_id = 0 THEN ' '
											WHEN s_id = 1 THEN 'Ativo'
											WHEN s_id = 2 THEN 'Cancelado'
											WHEN s_id = 3 THEN 'Suspenso'
											WHEN s_id = 4 THEN 'Finalizado'
											WHEN s_id = 5 THEN 'Em implementação (aluno)'
											WHEN s_id = 6 THEN 'Aguardando documentação'
											ELSE s_id          
											END as char_id,
										ic_ano, count(s_id) as qtd
										FROM " . $this -> tabela . "
										group by s_id, char_id, ic_ano
										order by ic_ano";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		//tabela
		$sx = '<table width="50%" class="tabela00">';
		//titulos tabela
		$sx .= '<tr>
								<!-- <th width="3%">#</th> -->
								<th width="15%">ano</th>								
								<th width="10%">descrição</th>
								<th width="15%">qtd</th>
						</tr>';

		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			//variaveis
			$line = $rlt[$r];
			$tot++;

			//indice
			$sx .= '<tr>';
			//$sx .= '<td class="lt2" align="left">' . ($r + 1) . '.</td>';

			//ano da ic
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['ic_ano'];
			$sx .= '</td>';
			
			//descricao
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['char_id'];
			$sx .= '</td>';
			
			//qtd
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';
			
		}

		//soma total de registro
		$sx .= '<tr><td colspan=10>Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);

	}

	// alunos inscritos por evento
	function ind_alunos_inscritos_ev() {
			
		$sql = "SELECT distinct ev_nome, count(*) as qtd
						FROM " . $this -> tabela2 . "
						left join evento_nome on ei_evento_id = id_ev
						where ei_status = 1
						group by ei_evento_id";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
	
		$sql2 = "SELECT distinct ei_evento_confirmar, count(*) as qtd_confirmados
							FROM " . $this -> tabela2 . "
							left join evento_nome on ei_evento_id = id_ev
							where ei_status = 1
							and ei_evento_confirmar = 1
							group by ei_evento_id";

		$rlt2 = $this -> db -> query($sql2);
		$rlt2 = $rlt2 -> result_array();
	
		//tabela
		$sx = '<table width="70%" class="tabela00">';
		//titulos tabela
		$sx .= '<tr>
								<th width="40%">evento</th>								
								<th width="15%">inscritos</th>
								<th width="15%">Confirmados</th>
						</tr>';

		$tot = 0;
		
		for ($r = 0; $r < count($rlt); $r++) {
			//variaveis
			$line = $rlt[$r];
			$tot++;

			//indice
			$sx .= '<tr>';
			//$sx .= '<td class="lt2" align="left">' . ($r + 1) . '.</td>';

			//evento
			$sx .= '<td class="lt2" align="left">';
			$sx .= $line['ev_nome'];
			$sx .= '</td>';
			
			//total
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';
			
		}
		
		for ($r = 0; $r < count($rlt2); $r++) {
			//variaveis
			$line = $rlt2[$r];
			
			//total
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['qtd_confirmados'];
			$sx .= '</td>';
			
		}
		

		//soma total de registro
		$sx .= '<tr><td colspan=10>Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);

	}
	
	

	// alunos inscritos por evento
	function ind_alunos_curso_inscritos_ev() {
		$sql = "SELECT distinct us_curso_vinculo, count(*) as qtd, ev_nome
						FROM evento_inscricao
						left join evento_nome on ei_evento_id = id_ev
						left join us_usuario on id_us = ei_us_usuario_id
						where ei_status = 1
						group by ei_evento_id, us_curso_vinculo
						order by us_curso_vinculo, ev_nome";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
	
		//tabela
		$sx = '<table width="70%" class="tabela00">';
		//titulos tabela
		$sx .= '<tr>
								<th width="25%">curso</th>								
								<th width="35%">evento</th>
								<th width="10%">qtd</th>
						</tr>';

		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			//variaveis
			$line = $rlt[$r];
			$tot++;

			//indice
			$sx .= '<tr>';
			//$sx .= '<td class="lt2" align="left">' . ($r + 1) . '.</td>';

			//curso
			$sx .= '<td class="lt2" align="left">';
			$sx .= $line['us_curso_vinculo'];
			$sx .= '</td>';
			
			//evento
			$sx .= '<td class="lt2" align="left">';
			$sx .= $line['ev_nome'];
			$sx .= '</td>';
			
			//total
			$sx .= '<td class="lt2" align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';
			
		}

		//soma total de registro
		$sx .= '<tr><td colspan=10>Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);

	}
}
?>    