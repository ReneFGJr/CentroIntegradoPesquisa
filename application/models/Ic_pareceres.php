<?php
class Ic_pareceres extends CI_model {
	var $tabela = "pibic_parecer_2016";

	function cp_declinar(){
		
		$cp = array();
		array_push($cp, array('$H20', 'id_pp', '', False, True));
		array_push($cp, array('$S8', 'pp_tipo', msg('lb_parecer_tipo'), false, True));
		array_push($cp, array('$O D:SIM&A:NÃO', 'pp_status', msg('lb_parecer_declinar'), True, True));
		array_push($cp, array('$T50:5', 'pp_abe_19', msg('lb_parecer_motivo_declinar'), True, True));
		//array_push($cp, array('$S20', 'pp_avaliador_id', msg('lb_parecer_avaliador'), false, True));
		array_push($cp, array('$HV', 'pp_data_leitura', date('Ymd'), True, True));
		
		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
		
	}

	function update_line($line) {
		$tabela = $this -> tabela;
		$sql = "select * from " . $tabela . " where id_pp = " . $id_pp;
		$rlt = db_query($sql);

		if ($rlt = db_read($rlt)) {

		} else {

		}
	}
	
	function existe_documento($proto, $tipo)
		{
			$sql = "select * from ic_ged_documento 
					where doc_dd0 = '$proto'  
						  and doc_tipo = '$tipo' 
						  and doc_status <> 'X'";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return(1);
				} else {
					return(0);
				}
		}	
	
	function existe_indicacao($proto, $tipo)
		{
			$sql = "select * from ".$this->tabela." where pp_protocolo = '$proto' 
						and (pp_status <> 'D') 
						and pp_tipo = '$tipo' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return(1);
				} else {
					return(0);
				}
		}

	function gera_parecer($tipo, $dados) {
		$this -> load -> model("geds");
		$this -> geds -> tabela = 'ic_ged_documento';

		switch($tipo) {
			case 'RPARC' :
			/* Background */
				$avaliacao = $this -> load -> view('ic/avaliacao_rpar_pdf', $dados, true);

				$content = $this -> load -> view('ic/plano-parecer', $dados, true);
				$content = utf8_encode($content . $avaliacao);

				$image_file = 'img/headers/header_model_contrato_ic_150.JPG';

				/* Construção do PDF */
				tcpdf();

				$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				// PAGE 1 - BIG background image
				$pdf -> AddPage();
				$pdf -> SetAutoPageBreak(True, 0);

				// set image scale factor
				//$pdf -> Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
				//$pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
				$pdf->Image($image_file, 0, 0, 220, 50, 'JPG', '', '', true, 150, '', false, false, '', false, false, false);				
				/* Background */
				//$pdf -> Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
				/* Posição de impressão */
				$pdf -> SetXY(20, 50);
				$pdf -> writeHTMLCell(0, 0, '', '', $content, 0, 2, 0, true, 'J', true);
				/* Arquivo de saida */
				$proto = UpperCaseSql($dados['pp_protocolo']) . '-';
				//$nome_asc = troca($nome_asc,' ','_');
				$nome_asc = substr(md5(date("YmdHis")), 4, 5);
				$file = $proto . 'avaliacao-rp-' . $nome_asc . '.pdf';
				echo '<h1>'.$dados['doc_arquivo'].'</h1>';
						$path = $_SERVER['DOCUMENT_ROOT'];
						$this -> geds -> dir('_document');
						$this -> geds -> dir('_document/' . date("Y"));
						$this -> geds -> dir('_document/' . date("Y") . "/" . date("m"));
						$file_long = $path . '_document/' . $file;
						$pdf -> Output($file_long, 'F');
						$file_local = '_document/' . date("Y") . '/' . date("m") . '/' . $file;

				copy($file_long, $file_local);
				unlink($file_long);

				return($file_local);
			
			case 'RPAR' :
			/* Background */
				$avaliacao = $this -> load -> view('ic/avaliacao_rpar_pdf', $dados, true);

				$content = $this -> load -> view('ic/plano-parecer', $dados, true);
				$content = utf8_encode($content . $avaliacao);

				$image_file = 'img/headers/header_model_contrato_ic_150.JPG';

				/* Construção do PDF */
				tcpdf();

				$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				// PAGE 1 - BIG background image
				$pdf -> AddPage();
				$pdf -> SetAutoPageBreak(True, 0);

				// set image scale factor
				//$pdf -> Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
				//$pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
				$pdf->Image($image_file, 0, 0, 220, 50, 'JPG', '', '', true, 150, '', false, false, '', false, false, false);				
				/* Background */
				//$pdf -> Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
				/* Posição de impressão */
				$pdf -> SetXY(20, 50);
				$pdf -> writeHTMLCell(0, 0, '', '', $content, 0, 2, 0, true, 'J', true);
				/* Arquivo de saida */
				$proto = UpperCaseSql($dados['pp_protocolo']) . '-';
				//$nome_asc = troca($nome_asc,' ','_');
				$nome_asc = substr(md5(date("YmdHis")), 4, 5);
				$file = $proto . 'avaliacao-rp-' . $nome_asc . '.pdf';

				$path = $_SERVER['DOCUMENT_ROOT'];
				$this -> geds -> dir('_document');
				$this -> geds -> dir('_document/' . date("Y"));
				$this -> geds -> dir('_document/' . date("Y") . "/" . date("m"));
				$file_long = $path . '_document/' . $file;
				$pdf -> Output($file_long, 'F');
				$file_local = '_document/' . date("Y") . '/' . date("m") . '/' . $file;
				
				copy($file_long, $file_local);
				unlink($file_long);

				/* Save File */
				$this -> geds -> protocol = $dados['pp_protocolo'];
				$this -> geds-> file_type = 'PRP';
				$this -> geds-> file_name = $file;
				$this -> geds-> file_status = 'A';
				$this -> geds-> file_data = date("Ymd");;
				$this -> geds-> file_time = date("H:is");
				$this -> geds-> file_saved = $file_local;
				$this -> geds-> file_extensao($this -> geds -> file_name) . "'";
				$this -> geds-> file_size = filesize($file_local);
				$this -> geds-> versao = "0.1";
				$this -> geds-> user = $_SESSION['id_us'];
				$this->geds->save();
				return($file_local);
		}
	}

	function finaliza_nota_ic($proto,$nota,$tipo = 'RPAR')
		{
			if ($nota == 1)
				{
				$sql = "update ic set ic_nota_rp = $nota, ic_nota_rpc = 0
						where ic_plano_aluno_codigo = '$proto' ";
				} else {
				$sql = "update ic set ic_nota_rp = 2, ic_nota_rpc = -1
						where ic_plano_aluno_codigo = '$proto' ";
				}
			$rlt = $this->db->query($sql);
			return(1);
		}
	function finaliza_avaliacao($id) {
		$data = date("Ymd");
		$hora = date("H:i:s");
		$sql = "update " . $this -> tabela . " set pp_status = 'B', 
						pp_parecer_data = $data, pp_parecer_hora = '$hora'
					WHERE id_pp = $id ";
		$this -> db -> query($sql);
		return (1);
	}

	function lista_para_avaliacao($id_us) {
		$sql = "select * from " . $this -> tabela . "
					 INNER JOIN ic on pp_protocolo = ic_plano_aluno_codigo
					 INNER JOIN us_usuario on us_cracha = ic_cracha_prof
					 left join ic_aluno as pa on ic_id = id_ic
						left join ic_modalidade_bolsa as mode on mb_id = mode.id_mb
						left join ic_situacao on id_s = icas_id
						left join area_conhecimento on ic_semic_area = ac_cnpq					 
					 WHERE pp_avaliador_id = $id_us 
					 AND pp_status = 'A' ";
					 echo $sql;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="lt2">';
		$sx .= '<tr>
						<th>#</th>
						<th width="5%">Protocolo</th>
						<th width="35%">Título do plano</th>
						<th width="30%">Orientador</th>
						<th width="10%">Área</th>
						<th width="10%">Modalidade</th>
						<th width="5%">Edital</th>
						<th width="5%">Ação</th>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = base_url('index.php/avaliador/ficha/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp']));
			$botao = '<a href="' . $link . '" class="botao3d back_green_shadown back_green">Avaliar</a>';
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center">' . ($r + 1) . '</td>';
			$sx .= '<td class="border1">' . $line['pp_protocolo'] . '</td>';
			$sx .= '<td class="border1">' . $line['ic_projeto_professor_titulo'] . '</td>';
			$sx .= '<td class="border1">' . $line['us_nome'] . '</td>';
			$sx .= '<td class="border1">' . $line['ac_nome_area'] . '</td>';
			$sx .= '<td class="border1">' . $line['mb_descricao'] . '</td>';
			$sx .= '<td class="border1">' . $line['mb_tipo'] . '</td>';
			$sx .= '<td class="border1">' . $botao . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function le($id) {
		$sql = "select * from " . $this -> tabela . " where id_pp = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt)) {
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	function avaliacoes_avaliador($id) {
		for ($r = date("Y"); $r < (date("Y") - 4); $r--) {
			echo "++";
		}
	}

	function comunicar_avaliador($id_us, $proto, $tipo = '') {
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');

		$data = $this -> ics -> le_protocolo($proto);
		$data['link'] = $this -> usuarios -> link_acesso($id_us);
		$txt = $this -> mensagens -> busca($tipo, $data);
		$texto = mst($txt['nw_texto']);
		$ass = mst($txt['nw_titulo']);
		enviaremail_usuario($id_us, $ass, $texto, 2);
	}

	function mostra_indicacoes_interna($proto = '', $tipo = 'RPAR', $ic_semic_area = '' , $data) {
		$cracha = $data['ic_cracha_prof'];
		$area = substr($ic_semic_area, 0, 5);
		$sql = "select * from us_avaliador_area
			inner join us_usuario on pa_parecerista = id_us
			LEFT JOIN area_conhecimento on pa_area = ac_cnpq
			left join (SELECT COUNT(*) as indicados, pp_avaliador_id as id_av_usuario from pibic_parecer_" . date("Y") . " where pp_tipo = '$tipo' and (pp_status = '@' or pp_status = 'A' or pp_status = 'B') group by pp_avaliador_id ) as indicados on id_us = id_av_usuario
			left join (SELECT COUNT(*) as declinados, pp_avaliador_id as id_dc_usuario from pibic_parecer_" . date("Y") . " where pp_tipo = '$tipo' and (pp_status = 'D') group by pp_avaliador_id ) as declinados on id_us = id_dc_usuario 
			WHERE pa_area like '$area%' 
				/* and substr(pa_area,6,2) = '00' */
				AND pa_ativo = 1 and us_avaliador = 1
				AND us_cracha <> '$cracha'			
			ORDER BY pa_area, us_nome";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sa = '';
		$sb = '';
		$sc = '';

		$xarea = '';
		$ed = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$dec = '';
			$ind = '';
			if ($line['declinados'] > 0) {
				$dec = '<font color="red">' . round($line['declinados']) . ' declinado(s)</font>';
			}
			if ($line['indicados'] > 0) {
				$ind = '<font color="blue">' . round($line['indicados']) . ' indicado(s)</font>';
			}
			$area = $line['pa_area'];
			if ($area != $xarea) {
				$sa .= '<h3>' . $line['pa_area'] . ' - ' . $line['ac_nome_area'] . '</h3>';
				$xarea = $area;
			}
			if ((strlen($dec) > 0) and (strlen($ind) > 0)) {
				$dec = ', ' . $dec;
			}

			$nome = link_avaliador($line['us_nome'], $line['id_us']);
			$sa .= '<input type="checkbox" name="av' . $line['id_us'] . '" value="1"> ' . $nome;
			$sa .= ' ' . $ind . $dec . ' ';
			$sa .= '<br>';

			if (($ed == 0) and (get("av" . $line['id_us']) == '1')) {
				$sc .= '<h1>Indicado - ' . $line['us_nome'] . '</h1>';
				$this -> ic_pareceres -> indicar_avaliador($line['id_us'], $tipo, $proto);
				$tipom = 'IC_RPAR_INDICACAO';
				$this -> comunicar_avaliador($line['id_us'], $proto, $tipom);
			}
			if (strlen($sc) > 0) { $sa = $sc;
			}
		}
		return ($sa);
	}

	function lista_de_avaliacoes($id_us) {
		$sql = "select * from " . $this -> tabela . " where pp_avaliador_id = $id_us ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$sx .= '<table width="100%"><tr><td><br></tr></table>';
		$sx .= '<table width="100%" class="lt2 border1 shadown pad5">';
		$sx .= '<tr><td colspan="15" class="lt4">';
		$sx .= 'Avaliações Indicadas';
		$sx .= '</td></tr>';
		$sx .= '<tr><th width="2%">#</th>
						<th width="5%">protocolo</th>
						<th width="100">acao</th>
						<th width="50%">tipo</th>
						<th width="10%">indicação</th>
						<th width="3%">nota<br>1</th>
						<th width="3%">nota<br>2</th>
						<th width="3%">nota<br>3</th>
						<th width="3%">nota<br>4</th>
						<th width="3%">nota<br>5</th>
						<th width="3%">nota<br>6</th>
						<th width="3%">nota<br>7</th>
						<th width="3%">nota<br>8</th>
						<th width="3%">nota<br>9</th>
						<th width="3%">nota<br>10</th>						
					</tr>';
		$pos = 0;
		for ($ri = 0; $ri < count($rlt); $ri++) {
			$line = $rlt[$ri];
			$pos++;
			$acao = '-';
			$sta = trim($line['pp_status']);
			switch($sta) {
				case 'A' :
					$url = base_url('index.php/ic/indicacao_declinar/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp']));
					$click = ' onclick="newwin2(\'' . $url . '\',300,100);" ';
					$acao = '<font color="#808000">declinar<font>';
					$acao = '<span class="link" style="cursor: pointer;" ' . $click . '>' . $acao . '</span>';
					break;
				case 'D':
					$acao = '<font color="#A0001F">Declinou<font>';
					break;	
			}

			$sx .= '<tr>';
			$sx .= '<td align="center">' . $pos . '</td>';
			$sx .= '<td align="center">' . $line['pp_protocolo'] . '</td>';
			$sx .= '<td align="center">' . $acao . '</td>';
			$sx .= '<td>' . msg('ic_tipo_' . $line['pp_tipo']) . '</td>';
			$sx .= '<td align="center">' . stodbr($line['pp_data']) . '</td>';
			for ($r = 1; $r <= 10; $r++) {
				$sx .= '<td align="center">' . $line['pp_p' . strzero($r, 2)] . '</td>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function indicar_avaliador($id_us = 0, $tipo = '', $proto = '') {
		$sql = "select * from " . $this -> tabela . " where pp_avaliador_id = $id_us and pp_protocolo = '$proto' and pp_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
				$data = date("Ymd");
			$sql = "update " . $this -> tabela . " 
							set pp_status = 'A'
							where pp_avaliador_id = $id_us 
							and pp_protocolo = '$proto' 
							and pp_tipo = '$tipo'
					";
			$rlt = $this -> db -> query($sql);
		
		} else {
			$data = date("Ymd");
			$sql = "insert into " . $this -> tabela . " 
					(pp_avaliador_id, pp_protocolo, pp_tipo,
					pp_status, pp_data 
					) values (
					$id_us,'$proto','$tipo',
					'A',$data) ";
			$rlt = $this -> db -> query($sql);
		}
		return (1);
	}

}
?>
