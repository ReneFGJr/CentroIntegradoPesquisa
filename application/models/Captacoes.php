<?php
class captacoes extends CI_Model {
	function le($id=0)
		{
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN us_usuario ON ca_professor = us_cracha
					LEFT JOIN fomento_agencia on agf_sigla = ca_agencia
					LEFT JOIN ss_programa_pos ON ca_programa = id_pp_char 
					where id_ca = $id 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0)
			{
				$line = $rlt[0];
			} else {
				$line = array();
			}
		return($line);
		}
		
	function resumo_projetos($cracha = '', $editar = 0) {
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					where ca_professor = '$cracha' 
					and ca_status > 0
					ORDER BY ca_edital_ano desc
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sh = '<tr>
				<th>protocolo</th>
				<th>fomento</th>
				<th>Edital</th>
				<th>Descrição do Edital</th>
				<th>Início da Vigência</th>
				<th>Duração</th>
				<th>Prorrogação</th>
				<th>Participação</th>
				<th>Vlr. Projeto</th>
				<th>Vlr. Proponente</th>
				<th>Inst.*</th>
				<th>Situação</th>				
			  </tr>';
		$xano = '';
		$tot1=0;
		$tot2=0;
		$tot3=0;
		$tot4=0;
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			
			/* LINKS */
			$link = '<a href="'.base_url('index.php/captacao/view/'.$line['id_ca'].'/'.checkpost_link($line['id_ca'])).'" class="link lt2">';
			$ano = $line['ca_edital_ano'];
			$atualizacao = '<font class="lt0">Atualizado em ' . stodbr($line['ca_lastupdate']) . '</font>';
			if ($xano != $ano) {
				$sx .= '<tr valign="top">';
				$sx .= '<td class="lt4" colspan=12 >' . $ano . '</td>';
				$sx .= $sh;
				$xano = $ano;
			}
			$sx .= '<tr valign="top">';
			$sx .= '<td class="border1"align="center">' . $link. $line['ca_protocolo'] . '</a>' . '</td>';
			$sx .= '<td class="border1"align="center">' . $line['ca_agencia'] . '</td>';
			$sx .= '<td class="border1" align="center">' . $line['ca_processo'] . '</td>';
			$sx .= '<td class="border1">' . $line['ca_descricao'] . $atualizacao . '</td>';

			$vg = $line['ca_vigencia_final_ano'];
			$vg_ini = substr($vg,5,2).'/'.substr($vg,0,4);
			$sx .= '<td class="border1"align="center">' . $vg_ini . '</td>';

			$sx .= '<td class="border1" align="center">' . $line['ca_duracao'] . '</td>';

			$sx .= '<td class="border1" align="center">&nbsp;' . $line['ca_vigencia_prorrogacao'] . '&nbsp;</td>';

			$sx .= '<td class="border1">' . $line['ca_participacao'] . '</td>';

			$sx .= '<td align="right" class="border1">' . number_format($line['ca_vlr_total'], 2, ',', '.') . '</td>';
			$sx .= '<td align="right" class="border1">' . number_format($line['ca_proponente_vlr'], 2, ',', '.') . '</td>';

			if ($line['ca_insticional'] == '1') {
				$sx .= '<td class="border1" align="center">SIM</td>';
				$tot3++;
				$tot4 = $tot4 + $line['ca_proponente_vlr'];
			} else {
				$tot1++;
				$tot2 = $tot2 + $line['ca_proponente_vlr'];
				$sx .= '<td class="border1">&nbsp;</td>';
			}
			$cor = '<font>';
			$situacao = trim($line['cs_situacao']);
			if (strlen($line['cs_cor']) > 0)
				{
					$cor = '<font color="'.$line['cs_cor'].'">';
				}
			if (strlen($situacao) == 0)
				{
					$situacao = $line['ca_status'];
				}
			$sx .= '<td class="border1" align="center">' . $cor. $situacao . '</font>'. '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		$sx .= '<font class="lt0">* projetos institucionais envolvendo mais de um programa, escola ou coordenação.';
		$sr = array();
		$sr['captacoes'] = $sx;
		$sr['captacao_academica_tot'] = $tot1;
		$sr['captacao_academica_vlr'] = $tot2;
		$sr['captacao_institucional_tot'] = $tot3;
		$sr['captacao_institucional_vlr'] = $tot4;
		return($sr);
	}

	function resumo_processos() {
		$it = 6;
		$sz = round(100 / $it);
		$ar = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		$sx = '<table class="lt2 border1" width="100%">';
		$sx .= '<tr class="lt1">';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_em_cadastro') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_devolvido_correcoes') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_validacao_coordenador') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_validacao_diretoria') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_comunicacao') . '</th>';
		$sx .= '<th width="' . $sz . '%">' . msg('cap_finalizado') . '</th>';
		$sx .= '</tr>';
		$sx .= '<tr align="center" class="lt5">';
		for ($r = 0; $r < $it; $r++) {
			$link = '<a href="' . base_url('index.php/cip/captacoes/' . $r) . '" class="link lt6">';
			$sx .= '<td class="border1">' . $link . $ar[$r] . '</a></td>';
		}
		$sx .= '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function lista($cracha = '') {
		$sql = "select * from captacao
					left join captacao_situacao on ca_status = ca_status_old 
					where ca_professor = '$cracha' ";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela1 lt2" cellpadding=3>';
		while ($line = db_read($rlt)) {
			$nome = $line['ca_descricao'];
			$edital_nr = $line['ca_edital_nr'];
			$ca_protocolo = $line['ca_protocolo'];
			$ano = $line['ca_edital_ano'];
			$vigencia = strzero($line['ca_vigencia_ini_mes'], 2) . '/' . strzero($line['ca_vigencia_ini_ano'], 4);
			$duracao = $line['ca_duracao'];
			$situacao = $line['cs_situacao'];
			$cor = trim($line['cs_cor']);
			$xcor = '';
			if (strlen($cor) > 0) {
				$cor = '<font color="' . $cor . '">';
				$xcor = '</font>';
			}

			$sx .= '<tr>';
			$sx .= '<td class="border1" align="center">' . $cor . $ca_protocolo . $xcor . '</td>';

			$sx .= '<td class="border1">' . $cor . $nome . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $edital_nr . '/' . strzero($ano, 4) . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $vigencia . $xcor . '</td>';
			$sx .= '<td class="border1" align="center">' . $cor . $duracao . ' mesês' . $xcor . '</td>';

			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_capital'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_custeio'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_bolsa'], 2, ',', '.') . $xcor . '</td>';
			$sx .= '<td class="border1" align="right" width="8%">' . $cor . number_format($line['ca_vlr_outros'], 2, ',', '.') . $xcor . '</td>';

			$sx .= '<td class="border1" align="center">' . $cor . $situacao . $xcor . '</td>';

			$sx .= '</tr>';
			$ln = $line;
		}
		print_r($ln);
		$sx .= '</table>';
		return ($sx);
	}

}
?>
