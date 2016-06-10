<?php
class isencoes extends CI_model {

	/* Isenções */
	function cp_isencoes_01() {
		$cp = array();
		array_push($cp, array('$H8', 'id_bn', '', False, True));
		$txt = '<font class="lt3">';
		$txt .= 'Informar o código do estudante que ira receber a isenção, conforme ato normativo.';
		$txt .= '<br><br>';
		$txt .= 'Ex:101<b>88112233</b>1 (informe somente os 8 digitos) ';
		$txt .= '<br><br>';
		$txt .= '</font>';
		array_push($cp, array('$M', '', $txt, false, True));
		array_push($cp, array('$S8', 'bn_beneficiario', msg('código do aluno'), True, True));
		array_push($cp, array('$M', '', '<br><br>', false, True));
		array_push($cp, array('$B8', '', 'Prosseguir >>>', False, True));
		return ($cp);
	}

	function cp_isencoes_02($id = 0) {
		$cp = array();
		$data = $this -> le_id($id);
		$idb = $data['bn_beneficiario'];
		$data = $this -> usuarios -> le_cracha($idb);
		
		if (count($data) == 0)
			{
			$this -> load -> model('webservice/ws_sga');
			$rs = $this -> ws_sga -> findStudentByCracha($idb);
			$data = $this -> usuarios -> le_cracha($idb);
			}
		
		
		$tela = $this -> load -> view('perfil/discente', $data, true);

		array_push($cp, array('$H8', 'id_bn', '', False, True));
		$txt = $tela;
		array_push($cp, array('$M', '', $txt, false, True));
		$op = 'M:Mestrado&D:Doutorado';
		array_push($cp, array('$[' . (date("Y") - 3) . '-' . date("Y") . ']', 'bn_ano', msg('entrada_no_programa'), True, True));
		array_push($cp, array('$O ' . $op, 'bn_modalide', msg('modalidade'), True, True));
		$sql = "select * from ss_programa_pos where pp_ativo = 1 order by pp_nome";
		array_push($cp, array('$Q id_pp:pp_nome:' . $sql, 'bn_programa', msg('programa'), True, True));
		array_push($cp, array('$M', '', '<br><br>', false, True));
		array_push($cp, array('$B8', '', 'Prosseguir >>>', False, True));
		return ($cp);
	}

	function cp_isencoes_03($id = 0) {
		$cp = array();
		array_push($cp, array('$H8', 'id_bn', '', False, True));

		$link = base_url('index.php/ss/termo_gerar/' . $id . '/' . checkpost_link($id));

		$cap = 'Geração e impressão do Termo de Isenção.';
		array_push($cp, array('${', '', $cap, false, True));
		$txt = '<font class="lt3">';
		$txt .= 'Clique no botão "Gerar" para gerar o termo de isenção, solicitando a assinatura do estudante, coordenador do programa e do professor orietador.';
		$txt .= '<br><br>';
		$txt .= '<input type="button" value="gerar termo de isenção" onclick="newwin(\'' . $link . '\',800,600);">';
		array_push($cp, array('$M', '', $txt, false, True));
		array_push($cp, array('$}', '', $cap, false, True));
		$txt .= '</font>';

		array_push($cp, array('$M', '', '<br><br>', false, True));
		array_push($cp, array('$B8', '', 'Prosseguir >>>', False, True));
		return ($cp);
	}

	function altera_status($id = 0, $sta = '') {
		$sql = "update bonificacao set bn_status = '$sta' where id_bn = " . $id;
		$this -> db -> query($sql);
		return (1);
	}

	function cp_isencoes_04($id = 0) {
		$cp = array();
		array_push($cp, array('$H8', 'id_bn', '', False, True));

		$cap = 'Envio do termo assinado.';
		array_push($cp, array('${', '', $cap, false, True));
		$txt = '<font class="lt3">';
		$txt .= 'O termo deve ser digitaliza com as assinaturas e enviado ao sistema';
		$txt .= '<br><br>';
		array_push($cp, array('$M', '', $txt, false, True));
		array_push($cp, array('$FILE:bonificacao_ged_documento:isencao', '', strzero($id, 7), false, True));
		array_push($cp, array('$}', '', $cap, false, True));
		$txt .= '</font>';

		array_push($cp, array('$M', '', '<br><br>', false, True));
		array_push($cp, array('$B8', '', 'Prosseguir >>>', False, True));
		return ($cp);
	}

	function cp_isencoes_05($id = 0) {
		$cp = array();
		array_push($cp, array('$H8', 'id_bn', '', False, True));

		$cap = 'Finalização.';
		array_push($cp, array('${', '', $cap, false, True));
		$txt = '<font class="lt3">';
		$txt .= 'O termo em papel deve ser encaminhado a secretaria do programa para finalização do processo';
		$txt .= '<br><br>';
		$txt .= '</font>';
		array_push($cp, array('$M', '', $txt . '<br><br>', false, True));
		array_push($cp, array('$}', '', $cap, false, True));
		array_push($cp, array('$B8', '', 'Finalizar >>>', False, True));
		return ($cp);
	}

	
	function resumo()
		{
			$sql = "select bn_status, count(*) as total, bns_descricao
					FROM bonificacao_situacao
					LEFT JOIN bonificacao ON bn_status = bns_codigo and bns_tipo = 'IPR'
						WHERE bn_original_tipo = 'IPR'
						GROUP BY bn_status, bns_descricao
						order by bns_codigo ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<table width="100%>';
			$sa = '';
			$sb = '';
			for ($r=0;$r < count($rlt); $r++)
				{
					$line = $rlt[$r];
					$link = '<a href="?dd0='.$line['bn_status'].'" class="lt6 link">';
					$sa .= '<th>'.$line['bns_descricao'].'</th>';
					$sb .= '<td class="border1">'.$link.$line['total'].'</a>'.'</td>';
				}
			$sx .= '<tr class="lt1">'.$sa.'</tr>';
			$sx .= '<tr class="lt6" align="center">'.$sb.'</tr>';
			
			$sx .= '</table>';
			return($sx);
		}	
		
	function lista_por_grupo_status($sta='') {
		$sql = "select prof.us_nome as pf_nome, prof.id_us as id_pf,
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					id_ca, bn_status, bn_original_protocolo, ca_agencia,
					ca_titulo_projeto, ca_descricao, ca_edital_nr, bns_descricao					
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
					LEFT JOIN captacao on ca_protocolo = bn_original_protocolo
					LEFT JOIN us_usuario as aluno on bn_beneficiario = aluno.us_cracha and bn_beneficiario <> '' 
					LEFT JOIN us_usuario as prof on bn_professor = prof.us_cracha
					
							WHERE bn_original_tipo = 'IPR' 
							and bn_status = '$sta'
				order by bn_status, bns_descricao  ";
				
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela01 border1 lt1">';
		$id = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id++;
			$line['pos'] = ($id);
			$sx .= $this -> load -> view('isencoes/simple_row_2', $line, true);
		}
		$sx .= '</table>';
		return ($sx);
	}
		
	function transfere_para_outra_modalidade($mod = '', $proto = '') {

		$sql = "update bonificacao set 
						bn_original_tipo =  '$mod' 
					where bn_codigo = '$proto' and
						bn_original_tipo = 'IPR' ";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function habilita_isencao($mod, $user, $proto_original) {
		$data = date("Ymd");
		$hora = date("H:i:s");
		$ano = date("Y");
		
		$us_cracha = $user['us_cracha'];
		$us_nome = $user['us_nome'];
		
		$sql = "select * from bonificacao 
					WHERE bn_original_protocolo = '$proto_original' 
						AND bn_professor = '$us_cracha'
						AND bn_original_tipo = 'IPR' ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		if (count($rlt)==0)
		{				
			$sql = "insert into bonificacao
						(
						bn_codigo, bn_ano, bn_professor, 
						bn_professor_nome, bn_professor_cracha, bn_data,
						bn_hora, bn_status, bn_original_protocolo, 
						bn_original_tipo
						) values (
						'','$ano','$us_cracha',
						'$us_nome','','$data',
						'$hora','!','$proto_original',
						'IPR'
						)";
			$rlt = $this -> db -> query($sql);
			$sql = "update bonificacao set bn_codigo = lpad(id_bn,5,0) 
							where bn_codigo = '' ";
			$rlt = $this -> db -> query($sql);
		} else {
			print_r($rlt);
			echo 'OPS, já existe uma isenção para este projeto';
		}
	}

	function is_insencao_cip($proto) {
		$sql = "select * from bonificacao where 
						bn_codigo = '$proto' and 
						bn_original_tipo = 'IPR' and 
						bn_status = 'H' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function le($id) {
		$sql = "select prof.us_nome as pr_nome, prof.us_cpf as pr_cpf,
						   alun.us_nome as al_nome, alun.us_cpf as al_cpf,
						   coor.us_nome as co_nome, coor.us_cpf as co_cpf,
						   bn_codigo, bn_modalide, bn_programa, pp_nome,
						   bn_original_protocolo, ca_titulo_projeto, bn_status,
						   agf_nome, agf_sigla
					 from bonificacao 
					LEFT JOIN us_usuario as alun on bn_beneficiario = alun.us_cracha
					LEFT JOIN us_usuario as prof on bn_professor = prof.us_cracha
					LEFT JOIN ss_programa_pos on bn_programa = id_pp
					LEFT JOIN us_usuario as coor on id_us_coordenador = coor.id_us
					LEFT JOIN captacao on bn_original_protocolo = ca_protocolo		
					LEFT JOIN fomento_agencia ON ((ca_agencia_id = id_agf) and (ca_agencia_id > 0)) or ((ca_agencia = agf_codigo) and (ca_agencia <> ''))		
					where id_bn = $id ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	function le_protocolo($id) {
		$sql = "select prof.us_nome as pr_nome, prof.us_cpf as pr_cpf,
						   alun.us_nome as al_nome, alun.us_cpf as al_cpf,
						   coor.us_nome as co_nome, coor.us_cpf as co_cpf,
						   bn_codigo, bn_modalide, bn_programa, pp_nome,
						   bn_original_protocolo, ca_titulo_projeto, bn_status,
						   agf_nome, agf_sigla, bn_professor, prof.us_cracha as us_cracha
					 from bonificacao 
					LEFT JOIN us_usuario as alun on bn_beneficiario = alun.us_cracha
					LEFT JOIN us_usuario as prof on bn_professor = prof.us_cracha
					LEFT JOIN ss_programa_pos on bn_programa = id_pp
					LEFT JOIN us_usuario as coor on id_us_coordenador = coor.id_us
					LEFT JOIN captacao on bn_original_protocolo = ca_protocolo		
					LEFT JOIN fomento_agencia ON ((ca_agencia_id = id_agf) and (ca_agencia_id > 0)) or ((ca_agencia = agf_codigo) and (ca_agencia <> ''))		
					where bn_codigo = '$id' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	function gerar_isencao($proto = '', $dt = array()) {
		if ($this -> isencoes -> tem_isencao($proto) == 0) {
			$data = date("Ymd");
			$hora = date("H:i:s");
			$ano = date("Y");
			$pf_cracha = $dt['us_cracha'];
			$pf_nome = $dt['us_nome'];
			$desc = 'Isenção de Discente-Projeto de Pesquisa-Captação';

			$sql = "insert into bonificacao
							(
							bn_codigo, bn_ano, bn_professor,
							bn_professor_nome, bn_professor_cracha,
							bn_data, bn_hora, bn_status,
							bn_descricao, bn_cr, bn_valor,
							bn_liberacao, bn_previsao, bn_original_tipo,
							bn_original_protocolo
							) values (
							'','$ano','$pf_cracha',
							'$pf_nome','$pf_cracha',
							'$data','$hora','!',
							'$desc','',0,
							'$data',0,'IPR',
							'$proto')
							";
			$rlt = $this -> db -> query($sql);

			$sql = "update bonificacao set bn_codigo = lpad(id_bn,5,0) where bn_codigo = '' ";
			$rlt = $this -> db -> query($sql);
		}
	}

	function tem_isencao($proto = '') {
		$sql = "select * from bonificacao where bn_original_protocolo = '$proto' and bn_original_tipo = 'IPR' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}

	}

	function le_id($id) {
		$sql = "select * from bonificacao
					where 
						id_bn = '$id'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	function cp_isencao_cip_capes() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$S6', '', msg('fomento_processo'), True, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', msg('isencao_reabirir'), True, True));
		array_push($cp, array('$C6', '', msg('isencao_confirmar'), True, True));
		array_push($cp, array('$B6', '', msg('submit'), false, True));
		return ($cp);
	}
	
	function cp_isencoes() {
		$cp = array();
		array_push($cp, array('$H8', 'id_bn', '', False, False));
		array_push($cp, array('$N8', 'bn_rf_valor', msg('lb_bn_rf_valor'), True, True));
		array_push($cp, array('$[1-48]', 'bn_rf_parcela', msg('lb_bn_rf_parcela'), True, True));
		array_push($cp, array('$HV', 'bn_status', 'H', True, True));
		array_push($cp,array('$U8','bn_liberacao','',False,True));
		array_push($cp, array('$B6', '', msg('save'), false, True));
		return ($cp);
	}	

	function minhas_isencoes($cracha) {
		$sx = '';
		$sql = "select count(*) as total, bn_status, bns_descricao
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
							WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
				group by bn_status, bns_descricao  ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		if (count($rlt) > 0) {
			$sz = ' width="' . round(100 / count($rlt)) . '%" ';
			$sx = '<table width="350" class="captacao_folha border1 black" style="margin: 20px;" align="right">
						<tr><td colspan=10 class="lt5">Isenção de Estudantes</td></tr>
						<tr>
						';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$sx .= '<td align="center" class="lt0 captacao_folha bg_bordo" ' . $sz . '>';
				$sx .= $line['bns_descricao'];
				$sx .= '</br>';
				$sx .= '<font class="lt6"><b>' . $line['total'] . '</b></font>';
			}
			$sx .= '</tr>';
			$sx .= '<tr><td colspan=10 align="left"><a href="' . base_url('index.php/ss/isencoes') . '" class="link lt2">' . msg('ver_isencoes') . '</a>';
			$sx .= '</table>';
			$sx .= '<br>';
		}
		return ($sx);
	}

	function lista_minhas_isencoes($cracha) {
		$sx = '';
		$sql = "select *
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
					LEFT JOIN captacao on ca_protocolo = bn_original_protocolo
							WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
							and bn_status = '!'
				order by bn_status, bns_descricao  ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table class="tabela01 lt3" width="100%" border=0 cellpadding=5>';
		$sx .= '<tr>
					<th width="5%">Protocolo</th>
					<th>Título Projeto</th>
					<th width="5%">Agência</th>
					<th width="5%">Edital</th>
					<th>Edital descrição</th>
					<th width="15%">Situação</th>
					<th width="12%">Situação</th>
				</tr>';
		if (count($rlt) > 0) {
			$tot = 0;
			for ($r = 0; $r < count($rlt); $r++) {
				$tot++;
				$line = $rlt[$r];
				$link = base_url('index.php/ss/indicar_isencao/' . $line['id_bn'] . '/' . checkpost_link($line['id_bn']));
				$acao = '<a href="' . $link . '" class="btn btn-primary">Indicar isenção</a>';
				$line['acao'] = $acao;
				$sx .= $this -> load -> view('isencoes/simple_row', $line, true);
			}
			if ($tot > 0) {
				$sx .= '<tr><td colspan=10>Total de ' . $tot . ' isenções disponíveis(is)</td></tr>';
			} else {
				$sx .= '<tr><td colspan=10 class="lt3">' . msg('nenhum insenção disponível') . '</td></tr>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function lista_minhas_isencoes_indicadas($cracha) {
		$sx = '';
		$sql = "select *
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
					LEFT JOIN captacao on ca_protocolo = bn_original_protocolo 
					LEFT JOIN us_usuario on bn_beneficiario = us_cracha and bn_beneficiario <> ''
							WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
							and bn_status != '!'
				order by bn_status, bns_descricao  ";
				
		$sql = "select prof.us_nome as pf_nome, prof.id_us as id_pf,
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					id_ca, bn_status, bn_original_protocolo, ca_agencia,
					ca_titulo_projeto, ca_descricao, ca_edital_nr, bns_descricao					
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
					LEFT JOIN captacao on ca_protocolo = bn_original_protocolo
					LEFT JOIN us_usuario as aluno on bn_beneficiario = aluno.us_cracha and bn_beneficiario <> '' 
					LEFT JOIN us_usuario as prof on bn_professor = prof.us_cracha
				WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
							and bn_status != '!'
				order by bn_status, bns_descricao  ";
										

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table class="tabela01 lt2" width="100%" border=0 cellpadding=5>';
		if (count($rlt) > 0) {
			$tot = 0;
			for ($r = 0; $r < count($rlt); $r++) {
				$tot++;
				$line = $rlt[$r];
				$line['acao'] = '';
				$line['pos'] = $tot;
				$sx .= $this -> load -> view('isencoes/simple_row_2', $line, true);
			}
			if ($tot > 0) {
				$sx .= '<tr><td colspan=10>Total de ' . $tot . ' isenções</td></tr>';
			} else {
				$sx .= '<tr><td colspan=10 class="lt3">' . msg('nenhum insenção disponível') . '</td></tr>';
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

	function lista_status($st = '') {
		if (strlen($st) > 0) {
			$sz = '35%';
			$wh = " bn_status = '$st' and ";
			$th = '';
		} else {
			$wh = '';
			$sz = '20%';
			$th = '<th width="20%">Situação</th>';
		}
		$sql = "select * from bonificacao
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha
						LEFT JOIN bonificacao_situacao on bn_status = bns_codigo
						WHERE $wh bn_original_tipo = 'IPR'
						ORDER BY bn_professor_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		if (count($rlt) > 0) {
			$sx = '<table width="100%" class="tabela00 lt1">';
			if (strlen($st) > 0) {
				$sx .= '<tr><td colspan="10" class="lt5">Situação: ' . $rlt[0]['bns_descricao'] . '</td></tr>';
			}

			$sx .= '<tr>
						<th width="2%">#</th>
						<th width="5%">Protocolo</th>
						<th width="' . $sz . '">Professor</th>
						<th width="3%">Tipo</th>
						<th width="5%">Dt. Liberação</th>
						<th width="' . $sz . '">Beneficiário</th>
						' . $th . '
					</tr>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				$sx .= '<tr>';
				$sx .= '<td align="center">' . ($r + 1) . '.</td>';
				$sx .= '<td>' . $line['bn_original_protocolo'] . '</td>';
				$sx .= '<td>' . $line['bn_professor_nome'] . '</td>';

				$sx .= '<td align="center">' . $line['bn_original_tipo'] . '</td>';
				//$sx .= '<td>'.$line['bn_nome'].'</td>';

				$sx .= '<td align="center">' . stodbr($line['bn_data']) . '</td>';

				$sx .= '<td>' . link_perfil($line['us_nome'], $line['id_us']) . '</td>';
				if (strlen($st) == 0) {
					$sx .= '<td>' . $line['bns_descricao'] . '</td>';
				}
			}
			$sx .= '</table>';
		} else {
			$sx .= msg('nada a listar');
		}

		return ($sx);
	}

}
?>
