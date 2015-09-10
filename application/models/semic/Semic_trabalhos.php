<?php
class semic_trabalhos extends CI_Model {
	var $tabela = 'semic_ic_trabalho';

	function avaliadores_seminario() {
		$ano = date("Y");
		$sql = "select * from ( 
							SELECT id_sb as id_bl, sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT id_sb as id_bl, sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT id_sb as id_bl, sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0 
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join semic_bloco on id_bl = id_sb
						left join semic_salas on id_sl = sb_sala
						order by us_nome, sb_data, sb_hora				
				";
		$rlt = db_query($sql);
		$sx = '<table class="tabela00 lt1" width="100%">';
		$xava = '';
		while ($line = db_read($rlt)) {
			$ava = $line['avaliador'];
			/* Avaliador */
			if ($xava != $ava) {
				$xava = $ava;
				$sx .= '<tr class="lt3">';
				$sx .= '<td colspan=5>';
				$sx .= $line['ust_titulacao_sigla'];
				$sx .= ' ';
				$sx .= $line['us_nome'];
				$ln = $line;
				$sx .= '</td>';
			}

			/* Situacao */
			$sx .= '<tr>';
			$rav = $this -> situacao_avaliador($line['situacao']);
			$op = 'style="background-color: ' . $rav['cor'] . '; "';
			$sx .= '<td ' . $op . ' align="center" width="120">';
			$sx .= $rav['status'];
			$sx .= '</td>';
			
			$sx .= '<td align="center" width="80">';
			$sx .= stodbr($line['sb_data']);
			$sx .= '</td>';
			
			$sx .= '<td align="center" width="80">';
			$sx .= ($line['sb_hora']);
			$sx .= ' - ';
			$sx .= ($line['sb_hora_fim']);
			$sx .= '</td>';
			
			$sx .= '<td align="left">';
			$sx .= $line['sl_nome'];
			$sx .= '</td>';
			
			$sx .= '<td align="left">';
			$sx .= $line['sb_nome'];
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function situacao_avaliador($op) {
		$sx = array();
		switch ($op) {
			case '1' :
				$sx['status'] = 'Convidado';
				$sx['cor'] = '#8080ff';
				$sx['opacity'] = '0.4';
				break;
			case '2' :
				$sx['status'] = 'Convite enviado';
				$sx['cor'] = '#80FFFF';
				$sx['opacity'] = '0.4';
				break;
			case '9' :
				$sx['status'] = 'Convite não aceito';
				$sx['cor'] = '#FF8080';
				$sx['opacity'] = '1';
				break;
			case '10' :
				$sx['status'] = 'Convite aceito';
				$sx['cor'] = '#80FF80';
				$sx['opacity'] = '1';
				break;
			default :
				$sx['status'] = 'Não informado';
				$sx['cor'] = '';
				$sx['opacity'] = '1';
		}
		return ($sx);
	}

	function avaliador_set($bloco, $aval_id, $nr) {
		$sit = '1';
		if ($aval_id == 0) { $sit = '0';
		}
		switch ($nr) {
			case '3' :
				$fld = 'sb_avaliador_3';
				$fld_sit = 'sb_avaliador_situacao_3';
				break;
			case '2' :
				$fld = 'sb_avaliador_2';
				$fld_sit = 'sb_avaliador_situacao_2';
				break;
			default :
				$fld = 'sb_avaliador_1';
				$fld_sit = 'sb_avaliador_situacao_1';
				break;
		}
		$sql = "update semic_bloco 
						set $fld = '$aval_id',
						$fld_sit = '$sit'
						where id_sb = " . round($bloco);
		$this -> db -> query($sql);
		return ('');
	}

	function avaliadores_indicar($aval, $bloco, $nr_avaliador) {
		$sx = '<table width="100%" class="tabela00">';

		$link = base_url('/index.php/semic/bloco_avaliador/' . $bloco . '/' . $nr_avaliador . '/' . checkpost_link($bloco) . '/0/SET');
		$href = '<a href="' . $link . '" class="link">[remover]</a>';
		$sx .= '<tr>';
		$sx .= '<td align="center" width="30">' . $href . '</td>';
		$sx .= '<td>** remover indicação **</td>';
		$sx .= '<td>-</td>';
		$sx .= '<td align="center" width="30">-</td>';
		$sx .= '</tr>';

		for ($r = 0; $r < count($aval); $r++) {
			$line = $aval[$r];

			$link = base_url('/index.php/semic/bloco_avaliador/' . $bloco . '/' . $nr_avaliador . '/' . checkpost_link($bloco) . '/' . $line['id_us'] . '/SET');
			$href = '<a href="' . $link . '" class="link">[indicar]</a>';

			$sx .= '<tr>';
			$sx .= '<td align="center" width="30">' . $href . '</td>';
			$sx .= '<td>' . $line['ust_titulacao_sigla'] . ' ' . $line['us_nome'] . '</td>';
			$sx .= '<td>' . usuario_tipo($line['usuario_tipo_ust_id']) . '</td>';
			$sx .= '<td align="center" width="30">' . $line['oral'] . '</td>';
			$sx .= '<td align="center" width="30">' . $line['poster'] . '</td>';
			$sx .= '</tr>';
		}
		return ($sx);
	}

	function avaliadores_area($areas, $orientadores) {
		$wh = '';
		$wh_prof = '';
		$ano = date("Y");
		/* AREAS */
		foreach ($areas as $key => $value) {
			if (strlen($wh) > 0) { $wh .= ' or ';
			}
			$wh .= " (pa_area = '" . trim($key) . "') ";
		}
		/* Orientadores */
		foreach ($orientadores as $key => $value) {
			if (strlen($wh_prof) > 0) { $wh_prof .= ' or ';
			}
			$wh_prof .= " (pa_cracha = '" . trim($key) . "') ";
		}

		$sql = "select * from (
							select pa_parecerista from us_avaliador_area 
							where pa_ativo = 1
							and ($wh) and not ($wh_prof)
							group by pa_parecerista
						) as avaliadores 
						inner join us_usuario on pa_parecerista = id_us
						inner join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join (
							select avaliador, count(*) as oral from (
									SELECT sb_avaliador_1 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0
									union 
									SELECT sb_avaliador_2 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0
									union 
									SELECT sb_avaliador_3 as avaliador FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
									) as total group by avaliador
								) as indicacoes on avaliador = id_us
						where us_avaliador > 0
						order by us_nome
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['poster'] = 0;
			array_push($aval, $line);
		}
		return ($aval);
	}

	function orientadores_bloco($ida) {
		$sql = "select st_professor from semic_nota_trabalhos 
							where st_bloco = " . $ida . "
							group by st_professor ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$key = $line['st_professor'];
			$aval[$key] = '1';
		}
		return ($aval);
	}

	function areas_bloco($ida) {
		$sql = "select st_area_geral from semic_nota_trabalhos 
							where st_bloco = " . $ida . "
							group by st_area_geral ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$aval = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$key = $line['st_area_geral'];
			$aval[$key] = '1';
		}
		return ($aval);
	}

	function lista_trabalhos($prof) {
		$sql = "select * from semic_nota_trabalhos
							left join us_usuario on us_cracha = st_aluno 
							where st_professor = '$prof' ";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela01 lt1">';
		while ($line = db_read($rlt)) {
			$sx .= $this -> show_small($line);
		}
		$sx .= '</table>';
		return ($sx);
	}

	function tipo_apresentacao($line) {
		$sx = '<font color="red">não indicado</font>';
		if ($line['st_poster'] == 'S') { $sx = 'pôster';
		}
		if ($line['st_oral'] == 'S') { $sx = 'oral';
		}
		if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) { $sx = 'oral/pôster';
		}
		return ($sx);
	}

	function show_small($line, $tipo = 1) {
		$idt = trim($line['st_section']);
		$idt .= trim($line['st_nr']);

		/* Links */
		$link = '<A href="' . base_url('index.php/ic/view/' . $line['st_codigo'] . '/' . checkpost_link($line['st_codigo'])) . '" class="link lt1">';
		$link_dis = '<A href="' . base_url('index.php/estudante/view/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="link lt1">';

		$sx = '';
		if (trim($line['st_edital']) == 'PIBITI') { $idt .= 'T';
		}
		if (trim($line['st_eng']) == 'S') { $idt = 'i' . $idt;
		}

		/* Apresentado */
		switch ($line['st_apresentado']) {
			case (1) :
				$sa = 'Apresentado';
				break;
			case (0) :
				$sa = '<font color="red">Não apresentou</font>';
				break;
			default :
				$sa = 'não informado';
				break;
		}
		switch ($tipo) {
			case 1 :
				$sx .= '<tr>';
				$sx .= '<td align="center">' . $line['st_edital'] . '</td>';
				$sx .= '<td align="center">' . $link . $line['st_codigo'] . '</a>' . '</td>';
				$sx .= '<td>' . $idt . '</td>';
				$sx .= '<td align="center">' . $this -> tipo_apresentacao($line) . '</td>';
				$sx .= '<td>' . $link_dis . $line['us_nome'] . '</A>' . '</td>';
				$sx .= '<td align="center">' . $line['st_ano'] . '</td>';
				$sx .= '<td>' . $sa . '</td>';
				$sx .= cr();
		}
		return ($sx);
	}

}
