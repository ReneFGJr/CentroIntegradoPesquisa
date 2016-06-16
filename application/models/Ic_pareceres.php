<?php
class Ic_pareceres extends CI_model {
	var $tabela = "pibic_parecer_2016";
	
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this->tabela = "pibic_parecer_".date("Y");
	}

	function que_foi_avaliador($proto, $tipo) {
		$sql = "select * from " . $this -> tabela . " where pp_protocolo = '$proto' and pp_tipo = '$tipo' and pp_status = 'B' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$id = $rlt[0]['pp_avaliador_id'];
		} else {
			$id = 0;
		}
		return ($id);
	}

	function cp_declinar() {

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

	function salva_parecer_generico($is,$notas)
		{
			$sql = "update ".$this->tabela." set ";
			$r = 0;
			foreach ($notas as $key => $value) {
				if ($r > 0) { $sql .= ', ';}
				$sql .= $key . " = '$value' ".cr();
				$r++;				
			}
			$sql .= ' where id_pp = '.round($is);
			$rlt = $this->db->query($sql);
		}

	function existe_documento($proto, $tipo) {
		$sql = "select * from ic_ged_documento 
					where doc_dd0 = '$proto'  
						  and doc_tipo = '$tipo' 
						  and doc_status <> 'X'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function existe_indicacao($proto, $tipo) {
		$sql = "select * from " . $this -> tabela . " where pp_protocolo = '$proto' 
						and (pp_status <> 'D') 
						and pp_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function resumo_parecer() {
		$sql = "select count(*) as total, pp_tipo, pp_status from " . $this -> tabela . " 
						group by pp_tipo, pp_status 
						order by pp_tipo, pp_status";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$rs = array();
		$rs['RPAR'] = array();
		$rs['RPRC'] = array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tipo = $line['pp_tipo'];
			$sta = $line['pp_status'];
			$rs[$tipo][$sta] = $line['total'];
		}

		$sx = '<table width="700">';
		$sx .= '<tr class="lt1"><th>Tipo</th><th>Abertos</th><th>Avaliados</th><th>Declinados</th></tr>';

		foreach ($rs as $key => $value) {
			$tp = array('A', 'B', 'D');
			$sx .= '<tr>';
			$sx .= '<td>' . msg('ic_tipo_' . $key) . '</td>';

			for ($r = 0; $r < count($tp); $r++) {

				//variaveis
				$tt = $tp[$r];
				$link0 = '';
				$vr = '';

				if (isset($rs[$key][$tt])) {

					$link0 = '<a href="' . base_url('index.php/ic/avaliacoes_situacao/' . $key . '/' . $tt) . '" class="link lt6">';
					$vr = $link0 . $rs[$key][$tt] . '</a>';

				} else {
					$vr = '-';
				}
				$sx .= '<td align="center" class="border1" width="20%">' . $vr . '</td>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_parecer_mostrar($tipo = '', $status = '') {
		$sql = "select * 
						from pibic_parecer_2016
						left join us_usuario on pp_avaliador_id = id_us
						left join ic on ic_plano_aluno_codigo = pp_protocolo
						where pp_status = '$status'
						and pp_tipo = '$tipo'
						order by us_nome
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {

			$line = $rlt[$r];
			$sta = trim($line['pp_status']);

			$sx = '<table width="100%" class="tabela00">';

			//Troca de titulo conforme status
			switch($sta) {
				case 'A' :
					$sx .= '<tr><td class="lt6" colspan=4> Avaliações em aberto </tr>';
					break;
				case 'B' :
					$sx .= '<tr><td class="lt6" colspan=4> Avaliações finalizadas </tr>';
					break;
				case 'D' :
					$sx .= '<tr><td class="lt6" colspan=4> Avaliações declinadas </tr>';
					break;
			}
		}
		//titulos tabela
		$sx .= '<tr>
								<th width="2%">#</th>
								<th width="8%">Protocolo</th>
								<th width="10%">acao</th>
								<th width="50%">Avaliador</th>
								<th width="10%">Observação</th>
								<th width="10%">Resultado da avaliação</th>
						</tr>';

		$tot = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			//variaveis
			$line = $rlt[$r];
			$tot++;
			$acao = '-';
			$acao2 = '';
			$sta = trim($line['pp_status']);
			$resultado = trim($line['pp_p09']);
			$link_ic = link_ic($line['id_ic']);
			
			/********** LINK */
			switch ($line['pp_tipo'])
				{
				case 'SUBMI':
					$link_ic = link_projeto($line['pp_protocolo']);
					break;
				case 'SUBMP':
					$link_ic = link_projeto($line['pp_protocolo_mae']);
					break;
				case 'FEIRA':
					$link_ic = link_projeto($line['pp_protocolo']);
					break;	
				}

			//Resultado das avaliações
			switch($sta) {
				case 'A' :
					$url = base_url('index.php/ic/indicacao_declinar/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp']));
					$click = ' onclick="newwin2(\'' . $url . '\',300,100);" ';
					$acao = '<font color="#808000">declinar<font>';
					$acao = '<span class="link" style="cursor: pointer;" ' . $click . '>' . $acao . '</span>';
					break;
				case 'B' :
					$acao = '<font color="#308030">Avaliado<font>';
					break;
				case 'D' :
					$acao = '<font color="#A0001F">Declinou<font>';
					break;
			}

			//acao resultado RP
			switch($resultado) {
				case '1' :
					$acao2 = '<font color="#308030">Aprovado<font>';
					break;
				case '2' :
					$acao2 = '<font color="#8A0419">Pendente<font>';
					break;
				case '' :
					$acao2 = '<font color="#A0001F"> - <font>';
					break;
			}
			//indice
			$sx .= '<tr>';
			$sx .= '<td class="lt2" align="left">' . ($r + 1) . '.</td>';
			//protocolo
			$sx .= '<td class="lt2" align="center">';
			$sx .= $link_ic . $line['pp_protocolo'] . '</a>';
			$sx .= '</td>';
			//acao de declinio
			$sx .= '<td class="lt2" align="center">' . $acao . '</td>';
			//nome avaliador
			$sx .= '<td class="lt2" align="rigth">';
			$sx .= link_perfil($line['us_nome'], $line['id_us'], $line);
			$sx .= '</td>';

			/* Aletar */
			if (($tipo = 'RPAR') and ($line['pp_p06'] == '1')) {
				$sx .= '<td align="center"><font color="red">Alerta</font>';
			} else {
				$sx .= '<td></td>';
			}
			//resultado do RP
			$sx .= '<td class="lt2" align="center">' . $acao2 . '</td>';
		}

		$sx .= '<tr><td colspan=10>Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';
		return ($sx);

	}

	function gera_parecer($tipo, $dados) {
		$this -> load -> model("geds");
		$this -> geds -> tabela = 'ic_ged_documento';

		switch($tipo) {
			case 'RPRC' :
				/* Background */
				$avaliacao = $this -> load -> view('ic/avaliacao_rprc_pdf', $dados, true);

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
				$pdf -> Image($image_file, 0, 0, 220, 50, 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
				/* Background */
				//$pdf -> Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
				/* Posição de impressão */
				$pdf -> SetXY(20, 50);
				$pdf -> writeHTMLCell(0, 0, '', '', $content, 0, 2, 0, true, 'J', true);
				/* Arquivo de saida */
				$proto = UpperCaseSql($dados['pp_protocolo']) . '-';
				//$nome_asc = troca($nome_asc,' ','_');
				$nome_asc = substr(md5(date("YmdHis")), 4, 5);
				$file = $proto . 'avaliacao-rpc-' . $nome_asc . '.pdf';

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
				$this -> geds -> file_type = 'PRC';
				$this -> geds -> file_name = $file;
				$this -> geds -> file_status = 'A';
				$this -> geds -> file_data = date("Ymd"); ;
				$this -> geds -> file_time = date("H:is");
				$this -> geds -> file_saved = $file_local;
				$this -> geds -> file_extensao($this -> geds -> file_name) . "'";
				$this -> geds -> file_size = filesize($file_local);
				$this -> geds -> versao = "0.1";
				$this -> geds -> user = $_SESSION['id_us'];
				$this -> geds -> save();
				return ($file_local);
				break;
			case 'RPAR' :
				/* Background */
				$avaliacao = $this -> load -> view('ic/avaliacao_rpar_pdf', $dados, true);

				$content = $this -> load -> view('ic/plano-parecer', $dados, true);
				$content = utf8_encode($content . $avaliacao);
				//$content = troca($content,'<','&lt;');
				//$content = troca($content,'>','&gt;');

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
				$pdf -> Image($image_file, 0, 0, 220, 50, 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
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
				$this -> geds -> file_type = 'PRP';
				$this -> geds -> file_name = $file;
				$this -> geds -> file_status = 'A';
				$this -> geds -> file_data = date("Ymd"); ;
				$this -> geds -> file_time = date("H:is");
				$this -> geds -> file_saved = $file_local;
				$this -> geds -> file_extensao($this -> geds -> file_name) . "'";
				$this -> geds -> file_size = filesize($file_local);
				$this -> geds -> versao = "0.1";
				$this -> geds -> user = $_SESSION['id_us'];
				$this -> geds -> save();
				return ($file_local);
				break;
		}
	}

	function finaliza_nota_ic($proto, $nota, $tipo = 'RPAR') {
		switch ($tipo) {
			case 'RPAR' :
				if ($nota == 1) {
					$sql = "update ic set ic_nota_rp = $nota, ic_nota_rpc = 0
						where ic_plano_aluno_codigo = '$proto' ";
				} else {
					$sql = "update ic set ic_nota_rp = 2, ic_nota_rpc = -1
						where ic_plano_aluno_codigo = '$proto' ";
				}
				$rlt = $this -> db -> query($sql);
				return (1);
				break;
			case 'RPRC' :
				if ($nota == 1) {
					$sql = "update ic set ic_nota_rpc = $nota
						where ic_plano_aluno_codigo = '$proto' ";
				} else {
					$sql = "update ic set ic_nota_rpc = 2
						where ic_plano_aluno_codigo = '$proto' ";
				}
				$rlt = $this -> db -> query($sql);
				return (1);
				break;
		}
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
			$botao = '<a href="' . $link . '" class="btn btn-primary">Avaliar</a>';
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

		$sql = "select * from " . $this -> tabela . "
					 INNER JOIN ic_submissao_projetos on pp_protocolo = pj_codigo
					 INNER JOIN us_usuario on us_cracha = pj_professor
					 left join area_conhecimento on pj_area = ac_cnpq
					 WHERE pp_avaliador_id = $id_us 
					 AND pp_status = 'A' ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = base_url('index.php/avaliador/ficha/' . $line['id_pp'] . '/' . checkpost_link($line['id_pp']));
			$botao = '<a href="' . $link . '" class="btn btn-primary">Avaliar</a>';
			$sx .= '<tr valign="top">';
			$sx .= '<td align="center">' . ($r + 1) . '</td>';
			$sx .= '<td class="border1">' . $line['pp_protocolo'] . '</td>';
			$sx .= '<td class="border1">' . $line['pj_titulo'] . '</td>';
			$sx .= '<td class="border1">' . $line['us_nome'] . '</td>';
			$sx .= '<td class="border1">' . $line['ac_nome_area'] . '</td>';
			$sx .= '<td class="border1" align="center" colspan=2 >' . $line['pj_edital'] . '/' . $line['pj_ano'] . '</td>';
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
		$user = $this -> usuarios -> le($id_us);
		$data = array_merge($data, $user);
		$txt = $this -> mensagens -> busca($tipo, $data);
		$texto = mst($txt['nw_texto']);
		$ass = mst($txt['nw_titulo']);
		$dono = mst($txt['nw_own']);

		enviaremail_usuario($id_us, $ass, $texto, $dono);
	}

	function avaliacoes_abertas($proto, $tipo = '') {
		$sql = "select count(*) as total from pibic_parecer_" . date("Y") . " where pp_protocolo = '$proto' and pp_tipo = '$tipo' and pp_status <> 'D' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]['total']);
		} else {
			return (0);
		}
	}

	function mostra_indicacoes_interna($proto = '', $tipo = 'RPAR', $ic_semic_area = '', $data) {
		
		/* avaliadores */
		$sav = $this->lista_de_avaliacoes_protocolo($proto);
		
		$indicados = array();
		
		
		$cracha = $data['ic_cracha_prof'];
		$area = substr($ic_semic_area, 0, 5);
		$sql = "select * from us_avaliador_area
			inner join us_usuario on pa_parecerista = id_us
			LEFT JOIN area_conhecimento on pa_area = ac_cnpq
			left join (SELECT COUNT(*) as indicados, pp_avaliador_id as id_av_usuario from pibic_parecer_" . date("Y") . " where pp_tipo = '$tipo' and (pp_status = '@' or pp_status = 'A' or pp_status = 'B') group by pp_avaliador_id ) as indicados on id_us = id_av_usuario
			left join (SELECT COUNT(*) as declinados, pp_avaliador_id as id_dc_usuario from pibic_parecer_" . date("Y") . " where pp_tipo = '$tipo' and (pp_status = 'D') group by pp_avaliador_id ) as declinados on id_us = id_dc_usuario
			left join ies_instituicao on ies_instituicao_ies_id = id_ies    
			WHERE pa_area like '$area%' 
				/* and substr(pa_area,6,2) = '00' */
				AND pa_ativo = 1 and us_avaliador = 1 and us_ativo = 1
				AND us_cracha <> '$cracha'			
			ORDER BY pa_area, us_nome";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sa = '';
		$sb = '';
		$sc = '';

		$xarea = '';
		$ed = 0;
		$co1 = '';
		$co2 = '';
		$co3 = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$inst = $line['ies_instituicao_ies_id'];

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
				$co1 .= '<h3>' . $line['pa_area'] . ' - ' . $line['ac_nome_area'] . '</h3>';
				$co2 .= '<h3>' . $line['pa_area'] . ' - ' . $line['ac_nome_area'] . '</h3>';
				$co3 .= '<h3>' . $line['pa_area'] . ' - ' . $line['ac_nome_area'] . '</h3>';
				$xarea = $area;
			}
			if ((strlen($dec) > 0) and (strlen($ind) > 0)) {
				$dec = ', ' . $dec;
			}

			$nome = link_avaliador($line['us_nome'], $line['id_us']) . ' (' . $line['ies_sigla'] . ')';
			$sq = '<input type="checkbox" name="av' . $line['id_us'] . '" value="1"> ' . $nome;
			$sq .= ' ' . $ind . $dec . ' ';
			$sq .= '<br>';

			if ($inst == 1) {
				$prl = trim($line['us_perfil']);
				if (strpos($prl, '#PIB')) {
					$co3 .= $sq;
				} else {
					$co1 .= $sq;
				}

			} else {
				$co2 .= $sq;
			}

			if (($ed == 0) and (get("av" . $line['id_us']) == '1')) {
				$av_aberta = $this -> ic_pareceres -> avaliacoes_abertas($proto, 'SUBMI');

				if (($av_aberta <= 1) or (perfil('#CPI#TST'))) {
					
					$this -> ic_pareceres -> indicar_avaliador($line['id_us'], $tipo, $proto);

					switch($tipo) {
						case 'RPAR' :
							$tipom = 'IC_RPAR_INDICACAO';
							break;
						case 'SUBMI' :
							$tipom = 'IC_SUBMI_INDICACAO';
							break;
						default :
							$tipom = 'IC_SUBMI_INDICACAO';
							break;							
					}
					$idus = $line['id_us'];
					if (!isset($indicados[$idus]))
						{
							$this -> comunicar_avaliador($line['id_us'], $proto, $tipom);
							$sc .= '<h3>Enviado indicação de avaliação para :' . $line['us_nome'] . '</h3>';
							$indicados[$idus] = 1;							
						}
				} else {
					$sa .= '<font color="red">Não foi enviado indicação de avaliação para :' . $line['us_nome'] . ' por ja ter dois avaliadores</font><br>';
				}

			}
			if (strlen($sc) > 0) { $sa = $sc;
			}
		}
		if (strlen($sa) == 0) {
			$sa = '<table width="100% lt1" border=1>' . '<tr>
							<th>Professores Internos</th>
							<th>Professores Externos</th>
							<th>Comitê Gestor</th>
						</tr>' . '<tr valign="top" class="lt1">
						<td with="33%">' . $co1 . '</td>
						<td width="33%">' . $co2 . '</td>
						<td width="33%">' . $co3 . '</td>
					</tr>
				</table>';
		} else {
			$sa .= $this -> load -> view('sucesso', null, true);
		}
		return ($sav.'<br>'.$sa);
	}

	function lista_de_avaliacoes_protocolo($proto) {
		$sql = "select * from " . $this -> tabela . "
					left JOIN us_usuario on pp_avaliador_id = id_us 
					where pp_protocolo = '$proto' ";
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
						<th width="20%">tipo</th>
						<th width="10%">indicação</th>
						<th width="60%">avaliador</th>						
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
				case 'D' :
					$acao = '<font color="#A0001F">Declinou<font>';
					break;
			}

			$sx .= '<tr>';
			$sx .= '<td align="center">' . $pos . '</td>';
			$sx .= '<td align="center">' . $line['pp_protocolo'] . '</td>';
			$sx .= '<td align="center">' . $acao . '</td>';
			$sx .= '<td>' . msg('ic_tipo_' . $line['pp_tipo']) . '</td>';
			$sx .= '<td align="center">' . stodbr($line['pp_data']) . '</td>';
			$sx .= '<td align="left">' . $line['us_nome'] . '</td>';
		}
		$sx .= '</table>';
		return ($sx);
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
				case 'D' :
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

	function checa_dados_pareceres($proto_mae, $avaliador) {
		$tipo1 = 'SUBMI';
		$tipo2 = 'SUBMP';

		$sql = "select * from " . $this -> tabela . " 
						where (pp_protocolo = '$proto_mae' or pp_protocolo_mae = '$proto_mae')
							AND pp_avaliador_id = $avaliador
							AND (pp_tipo = '$tipo1' or pp_tipo = '$tipo2')
							AND (pp_status = '@' or pp_status = 'A')";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$ok = 1;
		for ($q = 0; $q < count($rlt); $q++) {
			$line = $rlt[$q];

			if ($line['pp_tipo'] == 'SUBMI') {
				for ($r = 1; $r <= 6; $r++) {
					if (strlen($line['pp_p' . strzero($r, 2)]) == 0) { $ok = 0;
					}
				}
				if (strlen($line['pp_abe_01']) == 0) { $ok = 0;
				}
			}

			if ($line['pp_tipo'] == 'SUBMP') {
				for ($r = 11; $r <= 15; $r++) {
					if (strlen($line['pp_p' . strzero($r, 2)]) == 0) { $ok = 0;
					}
				}
				if (strlen($line['pp_abe_11']) == 0) { $ok = 0;
				}
			}
		}
		return($ok);
	}

	function salva_pareceres($proto, $proto_mae, $ddx, $avaliador, $tipo) {
		$data = date("Ymd");
		$hora = date("H:i:s");

		$sql = "select * from " . $this -> tabela . " 
						where pp_protocolo = '$proto' 
							AND pp_tipo = '$tipo'
							AND pp_avaliador_id = $avaliador
						limit 50";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {

			$xsql = "insert into " . $this -> tabela . " 
							(pp_protocolo, pp_protocolo_mae, pp_tipo, pp_avaliador_id, pp_status, pp_data, pp_hora)
							values
							('$proto','$proto_mae', '$tipo','$avaliador','A', '$data','$hora')";
			$rlt = $this -> db -> query($xsql);
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];
			$id = $line['id_pp'];
		} else {
			$line = $rlt[0];
			$id = $line['id_pp'];
		}

		$sql = "update " . $this -> tabela . " set
			
							pp_p01 = '" . get("dd" . (1)) . "',
							pp_p02 = '" . get("dd" . (2)) . "', 
							pp_p03 = '" . get("dd" . (3)) . "', 
							pp_p04 = '" . get("dd" . (4)) . "', 
							pp_p05 = '" . get("dd" . (5)) . "', 
							pp_p06 = '" . get("dd" . (6)) . "', 
							pp_p07 = '" . get("dd" . (7)) . "',						
			
							pp_p11 = '" . get("dd" . (1 + $ddx)) . "',
							pp_p12 = '" . get("dd" . (2 + $ddx)) . "', 
							pp_p13 = '" . get("dd" . (3 + $ddx)) . "', 
							pp_p14 = '" . get("dd" . (4 + $ddx)) . "', 
							pp_p15 = '" . get("dd" . (5 + $ddx)) . "', 
							pp_p16 = '" . get("dd" . (6 + $ddx)) . "', 
							pp_p17 = '" . get("dd" . (7 + $ddx)) . "',
							pp_p18 = '" . get("dd" . (8 + $ddx)) . "',
							
							
							pp_abe_01 = '" . get("dd9") . "',
							pp_abe_11 = '" . get("dd" . (9 + $ddx)) . "',						 
							
							pp_parecer_data = '$data',
							pp_parecer_hora = '$hora'
							
					where id_pp = " . $id;
		$rrr = $this -> db -> query($sql);
		/* Parecer do projeto */
		$sql = "update " . $this -> tabela . " set
			
							pp_p01 = '" . get("dd" . (1)) . "',
							pp_p02 = '" . get("dd" . (2)) . "', 
							pp_p03 = '" . get("dd" . (3)) . "', 
							pp_p04 = '" . get("dd" . (4)) . "', 
							pp_p05 = '" . get("dd" . (5)) . "', 
							pp_p06 = '" . get("dd" . (6)) . "', 
							pp_p07 = '" . get("dd" . (7)) . "',						
										
							pp_abe_01 = '" . get("dd9") . "',
							pp_abe_11 = '" . get("dd9") . "',						 
							
							pp_parecer_data = '$data',
							pp_parecer_hora = '$hora'
							
					where pp_protocolo = '$proto_mae' and pp_avaliador_id = " . $avaliador;
		$rrr = $this -> db -> query($sql);
	}

	function fecha_avaliacao($proto,$avaliador)
		{
			$sql = "update ".$this->tabela." 
						set pp_status = 'B'
					where (pp_protocolo = '$proto' or pp_protocolo_mae = '$proto')
						and pp_avaliador_id = $avaliador ";
			$rlt = $this->db->query($sql);
			return(1);
		}
	function pareceres_aberto($tipo='')
		{
			$sql = "select distinct pp_avaliador_id, ies_instituicao_ies_id, us_nome, id_us
						FROM ".$this->tabela." 
						INNER JOIN us_usuario on pp_avaliador_id = id_us
						WHERE pp_tipo = '$tipo'
						AND pp_status = 'A'
						ORDER BY us_nome";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			return($rlt);
		}

}
?>
