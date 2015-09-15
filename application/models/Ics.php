<?php
class ics extends CI_model {
	var $tabela_acompanhamento = 'switch';

	function search($terms = '') {
		$cps = array('us_nome');

		$terms = troca($terms, ' ', ';');
		$term = splitx(';', $terms);

		$wh1 = '';
		$wh2 = '';
		$wh3 = '';
		for ($r = 0; $r < count($term); $r++) {
			if ($r > 0) {
				$wh1 .= ' and ';
				$wh2 .= ' and ';
				$wh3 .= ' and ';
			}
			$wh1 .= " (pf_nome like '%" . $term[$r] . "%') ";
			$wh2 .= " (al_nome like '%" . $term[$r] . "%') ";
			$wh3 .= " (pa_plano like '%" . $term[$r] . "%') ";
		}

		$wh = '(' . $wh1 . ' or ' . $wh2 . ' or ' . $wh3 . ')';
		$wh .= " or (pf_cracha = '" . $term[0] . "') ";
		$wh .= " or (al_cracha = '" . $term[0] . "') ";
		$sql = $this -> table_view($wh);
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela01" border=0>';
		while ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['img'] = $this -> logo_modalidade($edital);
			;
			$sx .= $this -> load -> view('ic/plano-lista', $line, True);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function resumo() {
		$total1 = 1010;
		$total2 = 145;
		$total3 = 105;
		$tot1[0] = 145;
		$tot1[1] = 150;
		$tot1[2] = 215;
		$tot1[3] = 424;

		$tot2[0] = 45;
		$tot2[1] = 50;
		$tot2[2] = 50;
		$tot2[3] = 14;

		$tot3[0] = 25;
		$tot3[1] = 25;
		$tot3[2] = 45;

		$sx = '<table width="100%" class="lt1 border1 radius10">
					<tr><td colspan=2 align="left" class="lt6 borderb1"><b>' . msg('resumo') . '</b><br><font class="lt0">orintações ativas</td></tr>
					<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibic.png') . '" height="40"></td><td class="lt6">' . $total1 . '</td></tr>
					<tr><td align="right">Bolsas CNPq</td><td class="lt3">' . $tot1[0] . '</td></tr>
					<tr><td align="right">Bolsas Fundação Araucária</td><td class="lt3">' . $tot1[1] . '</td></tr>
					<tr><td align="right">Bolsas PUCPR</td><td class="lt3">' . $tot1[2] . '</td></tr>
					<tr><td align="right">Voluntários</td><td class="lt3">' . $tot1[3] . '</td></tr>

					<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibiti.png') . '" height="40"></td><td class="lt6">' . $total2 . '</td></tr>
					<tr><td align="right">Bolsas CNPq</td><td class="lt3">' . $tot2[0] . '</td></tr>
					<tr><td align="right">Bolsas Fundação Araucária</td><td class="lt3">' . $tot2[1] . '</td></tr>
					<tr><td align="right">Bolsas PUCPR</td><td class="lt3">' . $tot2[2] . '</td></tr>
					<tr><td align="right" class="borderb1">Voluntários</td><td class="lt3 borderb1">' . $tot2[3] . '</td></tr>
					
					<tr><td align="right" class="borderb1">Total de estudantes de graduação</td><td class="lt5 borderb1">' . ($total1 + $total2) . '</td></tr>
					
					<tr><td>&nbsp;</td></tr>
										
					<tr><td align="right"><img src="' . base_url('img/logo/logo_ic_pibicem.png') . '" height="40"></td><td class="lt6">' . $total3 . '</td></tr>
					<tr><td align="right">Bolsas CNPq</td><td class="lt3">' . $tot3[0] . '</td></tr>
					<tr><td align="right">Bolsas PUCPR</td><td class="lt3">' . $tot3[2] . '</td></tr>
					</table>
			';
		return ($sx);
	}

	function le($id = 0) {
		$sql = $this -> table_view('ic.id_ic = ' . $id, $offset = 0, $limit = 9999999);
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$edital = trim($line['mb_tipo']);
			$line['logo'] = $this -> logo_modalidade($edital);
			return ($line);
		}
	}

	function lista_ic_professor($id) {
		$wh = "id_professor = " . round($id);
		$sql = $this -> table_view($wh);
		$rlt = db_query($sql);

		$sx = '<table width="100%" class="tabela00">';
		while ($line = db_read($rlt)) {
			$sx .= $this -> show_med($line);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function logo_modalidade($edital) {
		switch ($edital) {
			case 'ICI' :
				$img = base_url('img/logo/logo_ic_internacional.png');
				break;
			case 'PIBIC' :
				$img = base_url('img/logo/logo_ic_pibic.png');
				break;
			case 'PIBITI' :
				$img = base_url('img/logo/logo_ic_pibiti.png');
				break;
			default :
				$img = base_url('img/logo/logo_ic_semimagem.png');
				break;
		}
		return ($img);
	}

	function show_med($line) {
		$edital = trim($line['mb_tipo']);
		$img = $this -> logo_modalidade($edital);
		/* Link do protocolo */
		$link = '<a href="' . base_url('index.php/ic/view/' . $line['id_ic'] . '/' . checkpost_link($line['id_ic'])) . '" class="link lt2">';

		/* Imagem bolsa */
		$img_bolsa = 'logo_bolsa_' . $line['id_mb'] . '.jpg';
		$img_bolsa = '<img src="' . base_url('img/icon/' . $img_bolsa) . '" height="15" style="border: 1px solid #ccc;">';

		$sx = '';
		$sx .= '<tr valign="top">';
		$sx .= '<td width="100" rowspan=5 style="border-top:1px solid #333;">';
		$sx .= '<img src="' . $img . '" height="50">';
		$sx .= '</td>';
		$sx .= '<td class="lt2" colspan=2  style="border-top:1px solid #333;">';
		$sx .= $link;
		$sx .= $line['pa_plano'];
		$sx .= '</a>';
		$sx .= '</td>';

		$sx .= '<td width="100" rowspan=5  style="border-top:1px solid #333;" align="center">';
		$sx .= $link . $line['codigo_pa'] . '</A>';
		$sx .= '<BR><BR>';
		$sx .= '<font color="' . trim($line['s_cor']) . '"><B>';
		$sx .= $line['s_situacao'];
		$sx .= '</b></font>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Orientador') . ':</td>';
		$sx .= '<td class="lt1"><B>' . $line['us_nome'] . '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Estudante') . ':</td>';
		$sx .= '<td class="lt1"><B>' . $line['al_nome'] . '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">' . msg('Vigencia') . ': ';
		$sx .= '</td>';
		$sx .= '<td class="lt1">';
		$sx .= '<B>';
		$sx .= stodbr($line['pa_dt_inicio_bolsa_aluno']);
		$sx .= ' até ';
		$sx .= stodbr($line['pa_dt_termino_bolsa_aluno']);
		$sx .= '</B>';
		$sx .= '</td>';

		$sx .= '<tr>';
		$sx .= '<td class="lt0" width="70" align="right">';
		$sx .= msg('Modalidade') . ': ';
		$sx .= '</td>';
		$sx .= '<td class="lt1" valign="top">';
		$sx .= $img_bolsa;
		$sx .= '&nbsp;';
		$sx .= $line['mb_descricao'];
		$sx .= '</td>';

		$sx .= '</tr>';
		return ($sx);
	}

	function table_view($wh = '', $offset = 0, $limit = 9999999) {
		if (strlen($wh) > 0) {
			$wh = 'where (' . $wh . ') ';
		}

		$tabela = "
						select * from ic
						left join ic_plano_aluno on codigo_pa = pa_codigo 
						left join ic_situacao on id_s = s_id
						left join (select id_us as id_al, us_nome as al_nome, us_cracha as al_cracha from us_usuario) AS us_est on pa.id_aluno_ic = us_est.id_al
						left join (select id_us as id_pf, us_nome as pf_nome, us_cracha as pf_cracha from us_usuario) AS us_prof on pa.id_professor = us_prof.id_pf
						left join ic_modalidade_bolsa as mode on pa.mb_id = mode.id_mb
						$wh
						";

		return ($tabela);
	}

	function cp_switch() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sw', '', False, True));
		array_push($cp, array('$SW', 'sw_01', msg('sw_ic_submissao'), False, True));
		array_push($cp, array('$SW', 'sw_02', msg('sw_ic_rel_pacial'), False, True));
		array_push($cp, array('$SW', 'sw_03', msg('sw_ic_rel_final'), False, True));
		array_push($cp, array('$B', '', msg('update'), False, True));
		return ($cp);
	}

	/** Proetos por escolas */
	function mostra_projetos_por_escolas() {
		$dados = array();
		$dados['Escola de Arquitetura e Design'] = 51;
		$dados['Escola de Ciências Agrárias e Medicina Veterinária'] = 162;
		$dados['Escola de Comunicação e Artes'] = 34;
		$dados['Escola de Direito'] = 143;
		$dados['Escola de Educação e Humanidades'] = 262;
		$dados['Escola de Medicina'] = 144;
		$dados['Escola de Negócios'] = 82;
		$dados['Escola de Saúde e Biociências'] = 295;
		$dados['Escola Politécnica'] = 257;
		return ($dados);
	}

	function mostra_projetos_por_escolas_professor() {
		$dados = array();
		$dados['Ciência da computação'] = 18;
		$dados['Engenharia ambiental'] = 33;
		$dados['Engenharia civil'] = 36;
		$dados['Engenharia de alimentos'] = 8;
		$dados['Engenharia de computação'] = 14;
		$dados['Engenharia de controle e automação'] = 38;
		$dados['Engenharia de produção'] = 25;
		$dados['Engenharia mecânica'] = 29;
		$dados['Engenharia elétrica'] = 16;
		$dados['Engenharia química'] = 9;
		$dados['Sistemas de informação'] = 16;
		return ($dados);
		$sql = "select centro_nome, pp_curso, count(*) as total,  pb_ano, pp_escola from pibic_bolsa_contempladas 
					left join pibic_bolsa_tipo on pb_tipo  = pbt_codigo
					left join pibic_professor on pb_professor = pp_cracha
					left join centro on pp_escola = centro_codigo
					left join curso on pp_curso = curso_codigo
					where (pbt_edital = 'PIBIC' or pbt_edital = 'PIBITI' or pbt_edital = 'IS') and pb_ano = '2014'
					and pp_escola = '00009'
					group by pp_curso, centro_nome, pp_escola, pb_ano
					order by centro_nome, pp_curso
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$line = $rlt[0];

		//return values
		$tot = 0;
		$dados = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$dados[$line['pp_curso']] = $line['total'];
		}

		return ($dados);
	}

}
?>
