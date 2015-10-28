<?php
class semic_salas extends CI_Model {
	var $tabela = 'semic_salas';
	var $tabela_bloco = 'semic_bloco';
	var $tabela_status = 'semic_bloco_situacao';
	var $tabela_tipo_apresentacao = 'semic_tipo_apresentacao';

	function referencia($line) {
		$sc = '';
		$sta = $line['st_status'];

		if (trim($line['st_eng']) == 'S') {
			$sc .= 'i';
		}

		$sc .= $line['st_section'];
		$sc .= $line['st_nr'];
		if (trim($line['st_edital']) == 'PIBITI') {
			$sc .= 'T';
		}
		if ($sta == 'C') {
			$sc = '<s><font color="red">' . $sc . '</font></sc>';
		}
		return ($sc);
	}

	function row($obj) {
		$obj -> fd = array('id_sl', 'sl_nome', 'sl_bloco');
		$obj -> lb = array('ID', 'Nome', 'Bloco');
		$obj -> mk = array('', 'L', 'C', 'L');
		return ($obj);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_sl', '', False, True));
		array_push($cp, array('$S100', 'sl_nome', msg('nome'), True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'sl_ativo', msg('ativo'), True, True));
		array_push($cp, array('$T80:5', 'sl_descricao', msg('descricao'), False, True));
		array_push($cp, array('$S40', 'sl_bloco', msg('bloco'), False, True));
		array_push($cp, array('$S7', 'sl_cor', msg('cor'), False, True));
		array_push($cp, array('$[1-30]', 'sl_ordem', msg('ordem'), False, True));
		return ($cp);
	}

	function cp_bloco() {
		$h = '';
		$hi = 8;
		$him = 0;
		$hora = '';
		for ($r = 0; $r < 55; $r++) {
			if (strlen($hora) > 0) {
				$h .= '&';
			}
			$hora = strzero($hi, 2) . 'h' . strzero($him, 2);
			$him = $him + 15;
			if ($him >= 60) { $him = 0;
				$hi++;
			}
			$h .= $hora . ':' . $hora;
		}

		$cp = array();
		$sql_sala = 'id_sl:sl_nome:select * from semic_salas order by sl_nome';
		$sql_tipo = 'id_st:st_nome:select * from semic_tipo_apresentacao order by st_nome';
		$sql_situ = 'id_sbs:sbs_nome:select * from semic_bloco_situacao order by sbs_nome';
		array_push($cp, array('$H8', 'id_sb', '', False, True));
		array_push($cp, array('$S100', 'sb_nome', msg('titulo'), True, True));
		array_push($cp, array('$Q ' . $sql_sala, 'sb_sala', msg('sala'), True, True));
		array_push($cp, array('$D8', 'sb_data', msg('data'), False, True));
		array_push($cp, array('$O ' . $h, 'sb_hora', msg('hora_inicio'), True, True));
		array_push($cp, array('$O ' . $h, 'sb_hora_fim', msg('hora_fim'), True, True));
		array_push($cp, array('$Q ' . $sql_tipo, 'sb_tipo', msg('tipo'), True, True));
		array_push($cp, array('$Q ' . $sql_situ, 'sb_situacao', msg('situacao'), False, True));
		array_push($cp, array('$[2015-' . date("Y") . ']D', 'sb_ano', msg('ano'), False, True));
		return ($cp);
	}

	function salas_por_dia($evento, $data, $sala = '', $horario = '') {
		$ano = date("Y");
		if (strlen($sala) == 0) {
			$sql = "select id_sl, sl_bloco, sl_nome from semic_salas 
					inner join semic_bloco on sb_sala = id_sl
					where sb_data >= '$data' and sb_ano = '$ano' and 
					(sb_tipo <> '7' and sb_tipo <> '8' and sb_tipo <> '2')
					group by id_sl, sl_bloco, sl_nome
					order by sl_bloco, sl_nome
			";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$sx = '<h3>Apresentação Oral</h3>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$link = '<A HREF="' . base_url('index.php/credenciamento/salas_sel/' . $line['id_sl']) . '">';
				$sx .= $link;
				$sx .= '<div class="semic_salas">';
				$sx .= $line['sl_nome'];
				$sx .= '<br><font class="lt1">';
				$sx .= $line['sl_bloco'];
				$sx .= '</font></div>';
				$sx .= '</a>';
			}
		} else {
			/* Mostra Blocos */
			$sql = "select * from semic_salas 
						inner join semic_bloco on sb_sala = id_sl
					where id_sl = $sala and
					(sb_tipo <> '7' and sb_tipo <> '8') 
					order by sb_data, sb_hora ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$sx = '<h3>Apresentação Oral</h3>';
			$sx = '<table width="100%" border=0 cellpadding=5>';
			$sx .= '<tr>
					<th width="100">Data</th>
					<th width="90%">Descrição</th>
					<th>tipo</th>
					</tr>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$link = '<A HREF="' . base_url('index.php/credenciamento/salas_sel/' . $line['id_sl'] . '/'.$line['id_sb']).'" class="link lt3">';
				if ($r==0)
					{
						$sx .= '<tr class="lt6">';
						$sx .= '<td colspan="3">';
						$sx .= $line['sl_nome'];
						$sx .= '<hr>';
						$sx .= '</td>';
						$sx .= '</tr>';
					}
				
				$sx .= '<tr>';
				$sx .= '<td align="center"><nobr>';				
				$sx .= $link.stodbr($line['sb_data']);
				$sx .=' ';
				$sx .= $line['sb_hora'].'</a>'; 
				$sx .= '</nobr>';
				$sx .= '</td>';
				
				$sx .= '<td>';
				$sx .= $link.$line['sb_nome'].'</a>';
				$sx .= '</td>';
				
				$sx .= '<td>';
				$sx .= $link.$line['sb_tipo'].'</a>';
				$sx .= '</td>';
				
				$sx .= '</tr>';
			}
			$sx .= '</table>';
			
		}
		return ($sx);
	}

	function situacao_avaliador($sa = 0) {
		$st = array();
		$st[0] = '<font color="blue">não indicado</font>';
		$st[1] = '<font color="orange">convidado</font>';
		$st[2] = '<font color="green">aceito</font>';
		$st[3] = '<font color="red">recusado</font>';
		$st[9] = '<font color="red">recusado</font>';
		$st[10] = '<font color="green">aceito</font>';
		;

		return ($st[$sa]);
	}

	function mostra_dados_sala($id = 0) {
		$sql = "select * from semic_bloco 
						where id_sb = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$sl = '';
		$sl .= $line['sb_data'];
		$sl .= ' ';
		$sl .= $line['sb_hora'];
		$sl .= ' ';
		$sl .= $line['sb_nome'];
		return ($sl);
	}

	function mostra_bloco($id = 0, $area = '', $nr = '', $acao) {

		if (strlen($nr) > 0) {
			if ($acao == 'ADD') {
				$sql = "update semic_nota_trabalhos set st_bloco = $id where id_st = $nr ";
				$this -> db -> query($sql);
			}
			if ($acao == 'DEL') {
				$sql = "update semic_nota_trabalhos set st_bloco = 0 where id_st = $nr ";
				$this -> db -> query($sql);
			}
		}
		$ano = (date("Y") - 1);
		$sql = "select * from semic_bloco 
						where id_sb = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$sl = '';
		/* Tipo do bloco 1-Oral, 2-Pôster */
		$tipo_bloco = $line['sb_tipo'];

		$sl .= '<h1>' . $this -> mostra_dados_sala($id) . '</h1>';
		$sa = '';

		/* Redirecionamentos */
		if ($tipo_bloco != '1') {
			redirect(base_url('index.php/semic'));
		}

		if ($tipo_bloco == '1') {
			$avaliador_1 = link_avaliador('', $line['sb_avaliador_1']);
			$avaliador_2 = link_avaliador('', $line['sb_avaliador_2']);
			$avaliador_3 = link_avaliador('', $line['sb_avaliador_3']);

			$situacao_1 = $this -> situacao_avaliador($line['sb_avaliador_situacao_1']);
			$situacao_2 = $this -> situacao_avaliador($line['sb_avaliador_situacao_2']);
			$situacao_3 = $this -> situacao_avaliador($line['sb_avaliador_situacao_3']);

			$editar_1 = '<a href="#" onclick="newwin(\'' . base_url('index.php/semic/bloco_avaliador/' . $id . '/1/' . checkpost_link($id . '1')) . '\');">editar</a>';
			$editar_2 = '<a href="#" onclick="newwin(\'' . base_url('index.php/semic/bloco_avaliador/' . $id . '/2/' . checkpost_link($id . '2')) . '\');">editar</a>';
			$editar_3 = '<a href="#" onclick="newwin(\'' . base_url('index.php/semic/bloco_avaliador/' . $id . '/3/' . checkpost_link($id . '3')) . '\');">editar</a>';

			$sql = "select count(*) as total, st_section from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = 0 or st_bloco is null)
					group by st_section
					";
			$rlt = db_query($sql);

			$sa = '<table class="tabela00">';
			$tot = 0;
			while ($line = db_read($rlt)) {
				$tot++;
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '">';
				$sa .= '<tr>';
				$sa .= '<td>';
				$sa .= $href . $line['st_section'] . '</A>';
				$sa .= '</td>';
				$sa .= '<td>';
				$sa .= $href . $line['total'] . '</A>';
				$sa .= '</td>';
				$sa .= '</tr>';
			}
			$sa .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
			$sa .= '</table>';
		}

		/******************* SEM BLOCO *******************/
		$sb = '<table class="tabela00">';
		if (strlen($area) > 0) {
			$sql = "select * from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = 0 or st_bloco is null)
					and st_section = '$area'
					order by lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			while ($line = db_read($rlt)) {
				$tot++;
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/ADD">';
				$sb .= '<tr>';
				$sb .= '<td>';
				$sb .= $href . $this -> referencia($line) . '</A>';
				$sb .= '</td>';
				$sb .= '</tr>';

			}
		}
		$sb .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
		$sb .= '</table>';

		/* Avalaidores deste bloco */

		$se = '<table width="100%" class="lt1">';
		$se .= '<tr>
				<td align="right"  width="100">Avaliador 1:</td>
				<td>' . $avaliador_1 . '</td>
				<td width="100">' . $situacao_1 . '</td>
				<td width="10">' . $editar_1 . '</td>
				</tr>';
		$se .= '<tr>
				<td align="right">Avaliador 2:</td>
				<td>' . $avaliador_2 . '</td>
				<td width="100">' . $situacao_2 . '</td>
				<td width="10">' . $editar_2 . '</td>
				</tr>';
		$se .= '<tr>
				<td align="right">Suplente:</td>
				<td>' . $avaliador_3 . '</td>
				<td width="100">' . $situacao_3 . '</td>
				<td width="10">' . $editar_3 . '</td>
				</tr>';
		$se .= '</table>';

		/******************* NO BLOCO *******************/
		$total = 0;
		$sc = '';
		if (strlen($id) > 0) {
			$sc = '<table class="tabela00">';
			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco = $id)
					order by lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			while ($line = db_read($rlt)) {
				$total++;
				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL">';
				$sc .= '<tr>';
				$sc .= '<td>';
				$sc .= $href . $this -> referencia($line) . '</A>';
				$sc .= '</td>';

				$sc .= '<td>';
				$sc .= $href . $line['us_nome'] . '</A>';
				$sc .= '</td>';

				$sc .= '</tr>';
			}
			$sc .= '<tr><td colspan=2>Total ' . $total . '</td></tr>';
			$sc .= '</table>';
		}

		/******************* EM OUTROS BLOCS *******************/
		$totax = 0;
		$sd = '';
		if (strlen($id) > 0) {
			$sd = '<table class="tabela00">';
			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					left join semic_bloco on id_sb = st_bloco
					left join semic_salas on id_sl = sb_sala
					where (st_ano = '$ano')
					and st_oral = 'S' and (st_bloco <> $id and st_bloco <> 0) and (st_section = '" . $area . "')
					order by sb_sala, sb_data, sb_hora, lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			$xsl = '';
			while ($line = db_read($rlt)) {
				$sl = $line['sl_nome'];
				$totax++;

				if ($sl != $xsl) {
					$xsl = $sl;
					$sd .= '<tr>
								<td colspan=5 class="lt3">
								' . $sl . '
								</td>
								</tr>';
				}

				$href = '<a href="' . base_url('index.php/semic/bloco_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL">';
				$sd .= '<tr>';
				$sd .= '<td>';
				$sd .= $href . $this -> referencia($line) . '</A>';
				$sd .= '</td>';

				$hrefa = '<a href="' . base_url('index.php/semic/bloco_view/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '">';

				$sd .= '<td>' . $hrefa . $line['sb_data'] . '</a></td>';
				$sd .= '<td>' . $hrefa . $line['sb_hora'] . '</a></td>';

				$sd .= '<td>';
				$sd .= $href . $line['us_nome'] . '</A>';
				$sd .= '</td>';

				$sd .= '</tr>';
			}
			$sd .= '<tr><td colspan=2>Total ' . $totax . '</td></tr>';
			$sd .= '</table>';
		}

		$sr = '<table width="100%" border=1 align="center">';
		$sr .= '<tr valign="top">';
		$sr .= '<td width="20%"><h2>Áreas abertas</h2>' . $sa . '</td>';
		$sr .= '<td width="20%"><h2>Não indicados</h2>' . $sb . '</td>';
		$sr .= '<td width="20%"><h2>Indicados</h2>' . $sc . $sd . '</td>';
		$sr .= '<td width="40%"><h2>Avaliadores</h2>' . $se . '</td>';
		$sr .= '</table>';

		$sql = "update " . $this -> tabela_bloco . " set sb_trabalhos = '$total' where id_sb = $id ";
		$this -> db -> query($sql);
		return ($sl . $sr);
	}

	function mostra_poster_bloco($id = 0, $area = '', $nr = '', $acao) {

		if (strlen($nr) > 0) {
			if ($acao == 'ADD') {
				$sql = "update semic_nota_trabalhos set st_bloco_poster = $id where id_st = $nr ";
				$this -> db -> query($sql);
			}
			if ($acao == 'DEL') {
				$sql = "update semic_nota_trabalhos set st_bloco_poster = 0 where id_st = $nr ";
				$this -> db -> query($sql);
			}
		}
		$ano = (date("Y") - 1);
		$sql = "select * from semic_bloco 
						where id_sb = " . $id;
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$sl = '';
		/* Tipo do bloco 1-Oral, 2-Pôster */
		$tipo_bloco = $line['sb_tipo'];

		$sl .= '<h1>' . $this -> mostra_dados_sala($id) . '</h1>';
		$sa = '';

		/* Redirecionamentos */
		if ($tipo_bloco != '2') {
			redirect(base_url('index.php/semic2'));
		}

		if ($tipo_bloco == '2') {

			$sql = "select count(*) as total, st_section from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_poster = 'S' and (st_bloco_poster = 0 or st_bloco_poster is null)
					and (st_status = 'A' or st_status = 'F')
					group by st_section
					";
			$rlt = db_query($sql);

			$sa = '<table class="tabela00">';
			$tot = 0;
			while ($line = db_read($rlt)) {
				$tot++;
				$href = '<a href="' . base_url('index.php/semic/bloco_poster_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '">';
				$sa .= '<tr>';
				$sa .= '<td>';
				$sa .= $href . $line['st_section'] . '</A>';
				$sa .= '</td>';
				$sa .= '<td>';
				$sa .= $href . $line['total'] . '</A>';
				$sa .= '</td>';
				$sa .= '</tr>';
			}
			$sa .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
			$sa .= '</table>';
		}

		/******************* SEM BLOCO *******************/
		$sb = '<table class="tabela00">';
		if (strlen($area) > 0) {
			$sql = "select * from semic_nota_trabalhos 
					where (st_ano = '$ano')
					and st_poster = 'S' and (st_bloco_poster = 0 or st_bloco_poster is null)
					and st_section = '$area'
					order by st_section, lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;
			while ($line = db_read($rlt)) {
				$tot++;
				$href = '<a href="' . base_url('index.php/semic/bloco_poster_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/ADD">';
				$sb .= '<tr>';
				$sb .= '<td>';
				$sb .= $href . $this -> referencia($line) . '</A>';
				$sb .= '</td>';
				$sb .= '</tr>';

			}
		}
		$sb .= '<tr><td colspan=2>Total ' . $tot . '</td></tr>';
		$sb .= '</table>';

		/* Avalaidores deste bloco */

		/******************* NO BLOCO *******************/
		$total = 0;
		$sc = '';

		if (strlen($id) > 0) {

			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					left join (select id_us as id_av_1, us_nome as av_nome_1 from us_usuario) as aval1 on id_av_1 = st_avaliador_1
					left join (select id_us as id_av_2, us_nome as av_nome_2 from us_usuario) as aval2 on id_av_2 = st_avaliador_2
					where (st_ano = '$ano')
					and st_poster = 'S' and (st_bloco_poster = $id)
					order by st_section, lpad(st_nr,4,'0')
					";
			$rlt = db_query($sql);
			$tot = 0;

			$sc = '<a name="00"></a>
					<table class="tabela00" width="100%">';
			$sc .= '<tr><th width="10%">Modalidade</th>
						<th width="10%">ID</th>
						<th width="30%">Orientador</th>
						<th width="25%">Avaliador 1</th>
						<th width="25%">Avaliador 2</th>
					';
			$idx = 0;
			$idx1 = '00';
			$tot1 = 0;
			$xsec = '';
			$total = 0;
			while ($line = db_read($rlt)) {
				$total++;

				$idt = $line['id_st'];

				if ($idx >= 10) { $idx1 = $idx;
				}

				$sec = trim($line['st_section']);
				if ($xsec != $sec) {
					if ($tot1 > 0) {
						$sc .= '<tr><td colspan=5 align="right">';
						$sc .= 'sub-total:' . $tot1;
						$sc .= '</td></tr>';
						$tot1 = 0;
					}
					$xsec = $sec;
				}

				/* posicionamento da tela */
				$idx1 = $idx;
				$href = '<a name="' . $idx1 . '" href="' . base_url('index.php/semic/bloco_poster_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL" class="link">';
				$sc .= '<tr>';
				$sc .= '<td>' . $line['st_edital'] . '</td>';
				$sc .= '<td>';
				$sc .= $href . $this -> referencia($line) . '</A>';
				$sc .= '</td>';

				$sc .= '<td>';
				$sc .= $href . $line['us_nome'] . '</A>';
				$sc .= '</td>';

				$tot1++;

				/* Avaliador 1 */
				$ava1 = trim($line['av_nome_1']);
				$avs1 = trim($line['st_avaliador_situacao_1']);
				$cor1 = '<font color="#333;">';
				if ($avs1 == 9) { $cor1 = '<font color="red">';
				}
				if ($avs1 == 10) { $cor1 = '<font color="blue">';
				}

				/* Calculo do TAG */
				if ($idx < 10) {
					$idx2 = 0;
				} else {
					$idx2 = $idx - 10;
				}

				if (strlen($ava1) == 0) {
					$ava1 = '- não indicado -';
					$href1 = '<a href="#' . $idx2 . '" onclick="newwin(\'' . base_url('index.php/semic/bloco_poster_avaliador/' . $idt . '/1/' . checkpost_link($idt)) . '\');" class="link">';
				} else {
					$href1 = '<a href="#' . $idx2 . '" onclick="newwin(\'' . base_url('index.php/semic/bloco_poster_avaliador/' . $idt . '/1/' . checkpost_link($idt)) . '\');" class="link">';
				}

				$sc .= '<td>';
				$sc .= $href1 . $cor1 . $ava1 . '</font></A>';
				$sc .= '</td>';

				/* Avaliador 2 */
				$ava2 = trim($line['av_nome_2']);
				$avs2 = trim($line['st_avaliador_situacao_2']);
				$cor2 = '<font color="#333;">';
				if ($avs2 == 9) { $cor2 = '<font color="red">';
				}
				if ($avs2 == 10) { $cor2 = '<font color="blue">';
				}

				if (strlen($ava2) == 0) {
					$idt = $line['id_st'];
					$ava2 = '- não indicado -';
					$href2 = '<a href="#' . $idt . '" onclick="newwin(\'' . base_url('index.php/semic/bloco_poster_avaliador/' . $idt . '/2/' . checkpost_link($idt)) . '\');" class="link">';
				} else {
					$idt = $line['id_st'];
					$href2 = '<a href="#' . $idt . '" onclick="newwin(\'' . base_url('index.php/semic/bloco_poster_avaliador/' . $idt . '/2/' . checkpost_link($idt)) . '\');" class="link">';
				}

				$sc .= '<td>';
				$sc .= $href2 . $cor2 . $ava2 . '</font></A>';
				$sc .= '</td>';

				$sc .= '</tr>';

				$idx++;
			}
			if ($tot1 > 0) {
				$sc .= '<tr><td colspan=5 align="right">';
				$sc .= 'sub-total:' . $tot1;
				$sc .= '</td></tr>';
			}
			$sc .= '<tr><td colspan=5 align="right"><b>Total Geral: ' . $total . '</b></td></tr>';
			$sc .= '</table>';
		}

		/******************* EM OUTROS BLOCS *******************/
		$totax = 0;
		$sd = '';
		if (strlen($id) > 0) {
			$sd = '<table class="tabela00">';
			$sql = "select * from semic_nota_trabalhos 
					left join us_usuario on us_cracha = st_professor 
					left join semic_bloco on id_sb = st_bloco
					left join semic_salas on id_sl = sb_sala
					where (st_ano = '$ano')
					and st_poster = 'S' and (st_bloco_poster <> $id and st_bloco_poster <> 0) and (st_section = '" . $area . "')
					order by sb_sala, sb_data, sb_hora, lpad(st_nr,4,'0')
					";

			$rlt = db_query($sql);
			$tot = 0;
			$xsl = '';
			while ($line = db_read($rlt)) {
				$sl = $line['sl_nome'];
				$totax++;

				if ($sl != $xsl) {
					$xsl = $sl;
					$sd .= '<tr>
								<td colspan=5 class="lt3">
								' . $sl . '
								</td>
								</tr>';
				}

				$href = '<a href="' . base_url('index.php/semic/bloco_poster_view/' . $id . '/' . checkpost_link($id) . '/' . $line['st_section']) . '/' . $line['id_st'] . '/DEL">';
				$sd .= '<tr>';
				$sd .= '<td>';
				$sd .= $href . $this -> referencia($line) . '</A>';
				$sd .= '</td>';

				$hrefa = '<a href="' . base_url('index.php/semic/bloco_poster_view/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '">';

				$sd .= '<td>' . $hrefa . $line['sb_data'] . '</a></td>';
				$sd .= '<td>' . $hrefa . $line['sb_hora'] . '</a></td>';

				$sd .= '<td>';
				$sd .= $href . $line['us_nome'] . '</A>';
				$sd .= '</td>';

				$sd .= '</tr>';
			}
			$sd .= '<tr><td colspan=2>Total ' . $totax . '</td></tr>';
			$sd .= '</table>';
		}

		$sr = '<table width="100%" border=1 align="center">';
		$sr .= '<tr valign="top">';
		$sr .= '<td width="20%"><h2>Áreas abertas</h2>' . $sa . '</td>';
		$sr .= '<td width="20%"><h2>Não indicados</h2>' . $sb . '</td>';
		$sr .= '<td width="60%"><h2>Indicados</h2>' . $sc . $sd . '</td>';
		//$sr .= '<td width="40%"><h2>Avaliadores</h2>' . $se . '</td>';
		$sr .= '</table>';

		$sql = "update " . $this -> tabela_bloco . " set sb_trabalhos = '$total' where id_sb = $id ";
		$this -> db -> query($sql);
		return ($sl . $sr);
	}

	function mostra_blocos($ano = '') {
		if (strlen($ano) == 0) { $ano = date("Y");
		}
		$sql = "select distinct sb_data from " . $this -> tabela_bloco . " where EXTRACT(YEAR FROM sb_data) = " . $ano;
		$rlty = $this -> db -> query($sql);
		$rlty = $rlty -> result_array();
		$sx = '';
		for ($l = 0; $l < count($rlty); $l++) {
			$data = $rlty[$l]['sb_data'];
			$sx .= '<h1>' . $data . '</h1>';
			$sx .= $this -> mostra_blocos_data($data);
		}
		return ($sx);
	}

	function mostra_blocos_data($data = '') {
		$this -> load -> model('semic/semic_trabalhos');
		$salas = 10;
		$horai = '08h00';
		$horaf = '20h00';

		$sql = "select * from " . $this -> tabela_bloco . "
					left join " . $this -> tabela . " on id_sl = sb_sala 
					left join " . $this -> tabela_status . " on id_sbs = sb_situacao
					left join " . $this -> tabela_tipo_apresentacao . " on id_st = sb_tipo
					where sb_data = '$data'
					order by sb_data, sl_ordem, sb_hora
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00"><tr valign="top">';
		$xsala = '';

		/* Horas do Sistema */
		$hr = array();
		$hrr = array();
		$hi = 8;
		$him = 0;
		for ($r = 0; $r < 55; $r++) {
			$hora = strzero($hi, 2) . 'h' . strzero($him, 2);
			$him = $him + 15;
			if ($him >= 60) { $him = 0;
				$hi++;
			}
			$hr[$hora] = $r;
			$hrr[$r] = $hora;
		}

		/* Matrix de Salas / Hora */
		$matrix = array();
		$matrix_hr = array();
		$matrix_cor = array();
		$matrix_bgcor = array();

		/* Gera tabela */
		$blocos = array();
		$sh = '<tr><th></th>';
		$err = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			/* Dados */
			$bloco_tipo = $line['sb_tipo'];
			$hi = $line['sb_hora'];
			$hf = $line['sb_hora_fim'];
			$id_hi = $hr[$hi];
			$id_hf = $hr[$hf];
			$idb = $line['id_sb'];
			$id_sl = (round($line['sl_ordem']) - 1);

			//echo '<BR>' . $hi . '-[' . $id_hi . '] == ' . $hf . '-' . $id_hf . '-[' . $id_sl . ']';

			$matrix_cor[$id_hi][$id_sl] = $line['sbs_cor'];
			$matrix_bgcor[$id_hi][$id_sl] = $line['st_cor'];
			for ($y = $id_hi; $y < $id_hf; $y++) {
				//$matrix[$y][$id_sl] = '';
				if (isset($matrix_hr[$y][$id_sl])) {
					$err .= '<BR>Conflito de horário :' . $line['sl_nome'] . ' - ' . $hi;
					$err .= ' | <A HREF="' . base_url('index.php/semic/bloco_edit/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="nopr">';
					$err .= msg('editar');
					$err .= '</A>';

				}
				$matrix_hr[$y][$id_sl] = 0;
			}
			$matrix[$id_hi][$id_sl] = $idb;
			$matrix_hr[$id_hi][$id_sl] = ($id_hf - $id_hi);

			$sala = $line['id_sl'];
			if ($xsala != $sala) {
				$sh .= '<th>' . $line['sl_nome'] . '</th>';
				$xsala = $sala;
			}
			$sa = '';
			//$sa = $line['sb_hora'] . '-' . $line['sb_hora_fim'];
			//$sa .= '<BR>';

			/* Mostra se for oral */
			switch ($bloco_tipo) {
				/************* ORAL */
				case '1' :
					$sa .= '<A HREF="' . base_url('index.php/semic/bloco_view/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="link">';
					break;
				case '2' :
					$sa .= '<A HREF="' . base_url('index.php/semic/bloco_poster_view/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="link">';
					break;
			}

			$sa .= '<font class="lt3">';
			$sa .= '<b>' . $line['sb_nome'] . '</b>';
			$sa .= '</font>';
			$sa .= '</a>';

			$sa .= '<BR><font class="lt0">';
			$sa .= '<A HREF="' . base_url('index.php/semic/bloco_edit/' . $line['id_sb'] . '/' . checkpost_link($line['id_sb'])) . '" class="nopr">';
			$sa .= msg('editar');
			$sa .= '</A>';
			$sa .= '</font>';

			$tot = $line['sb_trabalhos'];
			if ($tot > 0) {
				$sa .= '<br><center><font class="lt5">' . $tot . '</font></center>';
			}
			$sa .= '<br>';

			for ($rx = 1; $rx <= 3; $rx++) {
				if ($line['sb_avaliador_' . $rx] > 0) {
					$rav = $this -> semic_trabalhos -> situacao_avaliador($line['sb_avaliador_situacao_' . $rx]);
					$op = 'opacity:' . $rav['opacity'] . ';';
					$op .= 'border-left: 4px solid ' . $rav['cor'] . '; height: 20px; width: 20px;';
					$op .= 'float: left; ';
					$sa .= '<div style="' . $op . '"><img src="' . base_url('img/logo/logo_avaliador.jpg') . '" height="20" title="' . $rav['status'] . '"></div>';
				}
			}
			$blocos[$idb] = $sa;
		}
		$sx .= '</table>';

		$sx .= '<table width="100%" cellpadding=5 cellspacing=1 class="lt0" border=0>';
		$sx .= '<tr><td></td>' . $sh;
		$sx .= '</tr>';

		for ($y = 0; $y < count($hrr); $y++) {

			$sx .= '<tr valign="top">';
			$sx .= '<td>';
			$sx .= $hrr[$y];
			$sx .= '</td>';

			$size = round(96 / ($salas));
			for ($r = 0; $r <= $salas; $r++) {
				if (isset($matrix[$y][$r])) {
					$bcor = $matrix_cor[$y][$r];
					$bgcor = $matrix_bgcor[$y][$r];
					$rowc = $matrix_hr[$y][$r];
					if ($rowc > 0) {
						$sx .= '<td rowspan="' . $rowc . '" width="' . $size . '%" class="border1" style="background-color: ' . $bgcor . '; border-left: 10px solid ' . $bcor . '">';
					}
					//$sx .= $y . 'x' . $r;
					$idx = $matrix[$y][$r];
					$sx .= $blocos[$idx];
					$sx .= '</td>';
				} else {
					if (isset($matrix_hr[$y][$r])) {
						//$sx .= '<td>x</td>';
					} else {
						$sx .= '<td width="' . $size . '%" class="border0">&nbsp;';
						//$sx .= $y . 'x' . $r;
						$sx .= '</td>';
					}
				}
			}
		}
		$sx .= '</table>';

		$sx = '<font color="red">' . $err . '</font>' . $sx;
		return ($sx);
	}

	function botao_novo_bloco() {
		/* Submit Buttom */
		$sx = form_open('semic/bloco_edit/0/0');
		$data = array('name' => 'acao', 'class' => 'estilo-botao nopr', 'id' => 'semic_bloco', 'value' => msg('novo bloco'));
		$sx .= form_submit($data);
		$sx .= form_close();
		return ($sx);
	}

}
?>
