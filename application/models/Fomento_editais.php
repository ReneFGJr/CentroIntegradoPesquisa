<?php
class fomento_editais extends CI_model {
	var $tabela = 'fomento_editais';
	var $tabela_agencia = 'fomento_agencia';

	function row($obj) {
		$obj -> fd = array('id_ed', 'ed_titulo', 'ed_chamada', 'ed_status');
		$obj -> lb = array('ID', 'nome da chamada', 'edital', 'estatus');
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}

	function row_ag($obj) {
		$obj -> fd = array('id_agf', 'agf_nome', 'agf_sigla', 'agf_ordem');
		$obj -> lb = array('ID', 'nome da agencia', 'sigla', 'ordem');
		$obj -> mk = array('', 'L', 'L', 'C', 'C');
		return ($obj);
	}

	function le($id) {
		$sql = "select * from " . $this -> tabela . " where id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];
		return ($line);
	}

	function cp_ag() {
		$cp = array();
		/*campos edit fomento*/
		array_push($cp, array('$H8', 'id_agf', '', False, True));

		//array_push($cp,array('${', '', 'Informativos', False, True));
		array_push($cp, array('$S100', 'agf_nome', 'Nome da agência', false, True));
		array_push($cp, array('$S20', 'agf_sigla', 'Sigla', false, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'agf_ativo', 'Ativo', false, True));
		array_push($cp, array('$S100', 'agf_imagem', 'Logo (http://)', false, True));
		array_push($cp, array('$O 1:Alta&2:Média&3:Baixa', 'agf_ordem', 'Frequência', false, True));

		//button
		array_push($cp, array('$B', '', msg('bt_salvar_continuar'), false, True));

		return ($cp);
	}

	function mostra_abertos($tipo = 0, $abertos = 1) {
		$deadline = date("Y-m-d");
		//$deadline = '2010-01-01';
		if ($abertos == 1) {
			$wh = " ed_data_1 >= '" . $deadline . "' or ed_fluxo_continuo = '1' ";
		} else {
			$wh = " ed_data_1 <= '" . $deadline . "' ";
		}

		$sql = "select * from fomento_editais
					LEFT JOIN fomento_agencia on id_agf = ed_agencia
					LEFT JOIN fomento_tipo on id_ftp = ed_edital_tipo
					WHERE $wh
					ORDER BY ed_edital_tipo, ed_dt_deadline_elet 
					";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) == 0) {
			return ('<h1>Nenhum edital disponível</h1>');
		}
		$sx = '';
		$sx .= '<h1>Editais Abertos</h1>';
		$sx .= '<table width="100%" class="tabela01 lt1">';
		$sh = '<tr>
					<th width="30">Ag</th>
					<th width="15%">Fomento</th>
					<th width="15%">Edital</th>					
					<th width="70%">Nome do Edital</th>
					<th width="5%"><i>Deadline</i></th>
				  </tr>';
		$xsec = 'START';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sec = $line['ed_edital_tipo'];
			if ($sec != $xsec) {
				$sx .= '<tr><td colspan=5><br><br><br></td></tr>';
				$sx .= '<tr><td colspan=5 class="lt5">' . $line['ftp_nome'] . '</td></tr>';
				$sx .= $sh;
				$xsec = $sec;
			}
			$link = '<a href="' . base_url('index.php/edital/ver/' . $line['id_ed']) . '" class="link lt2">';
			$sx .= '<tr valign="top">';
			$sx .= '<td class="borderb1" align="center"><img src="' . $line['agf_imagem'] . '" height="36"></td>';
			$sx .= '<td class="borderb1">' . $link . $line['agf_nome'] . '</a>' . '</td>';
			$sx .= '<td class="borderb1">' . $link . $line['ed_chamada'] . '</a>' . '</td>';
			$sx .= '<td class="borderb1">' . $link . $line['ed_titulo'] . '</a>' . '</td>';
			if ($line['ed_fluxo_continuo'] == 1) {
				$sx .= '<td class="borderb1" align="center">' . $link . msg('continuous_flow') . '</a>' . '</td>';
			} else {
				$sx .= '<td class="borderb1" align="center">' . $link . stodbr($line['ed_dt_deadline_elet']) . '</a>' . '</td>';
			}

		}
		$sx .= '</table>';
		return ($sx);
	}

	function public_selector($id = 0) {
		$sx = '';

		/*
		 *
		 * Mostra área já seleciondas
		 */
		print_r($_POST);

		$sql = "SELECT c.id_ct as id_ct, m.ct_descricao as master,
					c.ct_descricao as slave, fec_ativo
				FROM fomento_categoria as m
					left join fomento_categoria as c on c.ct_ordem = m.id_ct
				    left join fomento_edital_categoria on c.id_ct = fe_id and fc_id = $id
				WHERE c.ct_ativo = 1
					and c.id_ct <> m.id_ct
				order by m.id_ct";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '<form method="post">';
		$sx .= '<table width="100%" border=0>';
		$sx .= '<tr><th colspan=2 style="border-bottom: 1px solid #000000;">Selecionar perfis</th></tr>';
		$xcat = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idr = $line['id_ct'];
			$cat = $line['master'];
			if ($cat != $xcat) {
				$sx .= '	<tr>
						<td><b>' . $line['master'] . '</b></td>
						</tr>';
				$xcat = $cat;
			}
			$checked = '';
			if ($line['fec_ativo'] == '1')
			{
				$checked = 'checked';
			}
			$sx .= '<tr><td class="lt1">';
			$sx .= '<input type="checkbox" name="dd" value="1" '.$checked.' > ';
			$sx .= $line['slave'];
			$sx .= '</td></tr>';
		}
		$sx .= '<tr><td class="lt0">Clique no nome para ampliar</td></tr>';
		$sx .= '<tr><td class="lt0"><input type="submit" value="' . msg('bt_update') . '" name="acao"></td></tr>';
		$sx .= '</table>';
		$sx .= '</form>';

		return ($sx);
	}

	function show_edital($id) {
		$sql = "select * from " . $this -> tabela . " 
					LEFT JOIN fomento_agencia on id_agf = ed_agencia
					LEFT JOIN fomento_tipo on id_ftp = ed_edital_tipo
				WHERE id_ed = " . $id;
		$rlt = $this -> db -> query($sql);
		$data = $rlt -> result_array($rlt);
		$line = $data[0];

		$imagem = trim($line['agf_imagem']);

		$url_externa = $line['ed_url_externa'];

		if (strlen($url_externa) > 0) {
			$url_externo = '<br><br>Mais informações em: <a href="' . $url_externa . '" target="_new">link externo</a>';
		} else {
			$url_externo = '';
		}

		/* Deadline */
		$data = stodbr($line['ed_dt_deadline_elet']);
		$deadline = '
				<tr>
				<td align="right">
					<font style="font-size: 18px;">
						<I>Deadline</I> para submissão eletrônica <B>
						<font color="red">' . $data . '</font>
				</td>
				</tr>';

		/* Fluxo continuo */
		if ($line['ed_fluxo_continuo'] == 1) {
			$deadline = '
				<tr>				
				<td align="right">
					<font style="font-size: 18px;">
						<font color="blue">FLUXO CONTÍNUO</font>
					</font>
				</td>
				</tr>';
		}
		$ass = '';
		if ($line['ed_document_require'] > 0) {
			$ass = '				
				<td align="right">
					<img src="' . base_url('img/icon/icone_exclamation.png') . '" height="32" align="right">
					<font style="font-size: 12px;">
						<font color="red">Esta proposta requer assinatura dos Representantes Institucional no documento,<br>havendo a necessidade de enviar 7 dias antes do prazo final de submissão.</font>
					</font>
				</td>';
		}
		$sx = '<table width="640" border=0 align="center" style="border: 1px solid #000000; font-size: 14px; font-family: tahoma, verdana, arial;">
					<tr valign="top">
						<td><img src="http://www2.pucpr.br/reol/img/email_pdi_header.png" ><BR></td></tr>
					<tr valign="top">
						<td valign="top" ALIGN="left" style="font-size:21px;">
						<img src="' . $imagem . '" height="100" align="left"  style="padding: 0px 20px 0px 5px;">
						<font style="font-size:25px">
						' . $line['ed_titulo'] . '
						</font><BR><BR></td></tr>
				';
		$cap = array('', 'Objetivo(s)', 'Recursos', 'Elegibilidade', 'Contato', '', 'Áreas e categorias', '', '', '', '', 'Submissão da proposta', 'Contato na instituição');

		for ($r = 1; $r < count($cap); $r++) {
			$fld = $r;

			if (strlen($cap[$fld] . $line['ed_texto_' . $fld]) > 0) {
				$sx .= '<tr>';
				$sx .= '<td><B>' . $cap[$fld] . '</B></td>';
				$sx .= '</tr>' . cr();

				$sx .= '<tr>';
				$sx .= '<td>';
				$sx .= $line['ed_texto_' . $fld];
				$sx .= '</td>';
				$sx .= '</tr>';
			}
		}
		$sx .= $deadline;
		$sx .= $ass;
		$sx .= '
				<tr>
					<tr><td>' . $url_externo . '</td></tr>
				</table>';
		return ($sx);
	}

}
