<?php
class ics_master extends CI_model {
	var $tabela = "ic_submissao_projetos";
	
	function mostra_protetos($st,$ano='')
		{
			$ano = date("Y");
			switch ($st)
				{
				case '1':
					$wh = " (pj_status = 'A' or pj_status = 'B')";
					break;
				case '0':
					$wh = " pj_status = '@' ";
					break;					
				case '2':
					$wh = " pj_status = 'F' ";
					break;	
				default:
					$wh = " (1 = 1) "; 
					break;									
				}
			$sql = "select *
						FROM ".$this->tabela." 
						INNER JOIN us_usuario on pj_professor = us_cracha
						WHERE pj_edital = 'ICMST' and pj_ano = '$ano' 
						AND $wh ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$t = array(0,0,0);
			
			$sx = '<table width="100%" class="captacao_folha border1 lt1 black">';
			$sx .= '<tr><th width="5%">protocolo</th>
						<th width="55%">Título do projeto</th>
						<th width="5%">ano</th>
						<th width="30%">autor</th>
						<th width="5%">postado</th>
						</tr>';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$link = '<a href="'.base_url('index.php/ic_master/view/'.$line['id_pj'].'/'.checkpost_link($line['id_pj'])).'" class="lt1 link">';
					$sx .= '<tr valign="top">';
					$sx .= '<td align="center" class="border1">'.$link.$line['pj_codigo'].'</A>'.'</td>';
					$sx .= '<td align="left" class="border1">'.$line['pj_titulo'].'</td>';
					$sx .= '<td align="center" class="border1">'.$line['pj_ano'].'</td>';
					$sx .= '<td align="left" class="border1">'.link_perfil($line['us_nome'],$line['id_us'],$line)	.'</td>';
					$sx .= '<td align="left" class="border1">'.stodbr($line['pj_dt_update']).'</td>';
				}
			$sx .= '</table>';
			return($sx);	
		}
	
	function resumo($ano = '')
		{
			$ano = date("Y");
			$sql = "select count(*) as total, pj_status from ".$this->tabela." 
						WHERE pj_edital = 'ICMST' and pj_ano = '$ano' 
						GROUP BY pj_status";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$t = array(0,0,0);
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sta = $line['pj_status'];
					switch ($sta)
						{
						case '@':
							$t[0] = $t[0] + $line['total'];
							break;							
						case 'A':
							$t[1] = $t[1] + $line['total'];
							break;							
						}
				}
			$link0 = '<a href="'.base_url('index.php/ic_master/resumo/0').'" class="link lt6">';
			$link1 = '<a href="'.base_url('index.php/ic_master/resumo/1').'" class="link lt6">';
			$link2 = '<a href="'.base_url('index.php/ic_master/resumo/2').'" class="link lt6">';
			
			$sx = '<table width="100%" class="captacao_folha border1 lt0 black">';
			$sx .= '<tr>';
			$sx .= '<td width="33%">'.msg('em_cadastro').'</br><font class="lt6">'.$link0.$t[0].'</a>'.'</font></td>';
			$sx .= '<td width="33%">'.msg('analisando').'</br><font class="lt6">'.$link1.$t[1].'</a>'.'</font></td>';
			$sx .= '<td width="33%">'.msg('em_pesquisa').'</br><font class="lt6">'.$link2.$t[2].'</a>'.'</font></td>';
			$sx .= '</tr>';
			$sx .= '</table>';
			return($sx);
		}

	function cp_subm_01() {
		$cp = array();
		array_push($cp, array('$H8', 'id_pj', '', False, True));
		array_push($cp, array('$T80:5', 'pj_titulo', msg('titulo_pesquisa'), True, True));

		$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
		array_push($cp, array('$Q ac_cnpq:ac_nome_area:' . $sql, 'pj_area', msg('area_conhecimento'), True, True));

		array_push($cp, array('$S12', 'pj_aluno', msg('cracha_do_aluno'), True, True));

		array_push($cp, array('$U8', 'pj_update', '', False, True));

		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		//pj_area_estrapj_area
		return ($cp);
	}

	function cp_subm_02($id = 0) {
		$cp = array();
		$idp = '1' . strzero($id, 6);
		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));

		$txt = '<b>Documentos obrigatórios para submissão:</b><br><br>
						- O projeto de pesquisa</br>
						- Carta de aceite do co-orientador da universidade de destino, bem como seu curriculum vitae.</br>
						- Histórico escolar do aluno com o índice de rendimento acadêmico (IRA);</br>
						- Carta de recomendação do estudante por dois professores, um deles o professor orientador;</br>
						- Carta de motivação do Estudante</br>
						- Resultado do teste de proficiência da língua</br>
						- plano acadêmico do estudante</br>
						- Comprovante da bolsa PROUNI, FIES ou Rotativa PUCPR, se for o caso.</br>
						- Deve ser apresentado um plano de estudos</br>';

		array_push($cp, array('$M', '', ($txt), False, True));

		array_push($cp, array('${', '', msg('list_arquivos'), False, True));
		array_push($cp, array('$FILE:ic_ged_documento:ic', '', $idp, false, true));
		array_push($cp, array('$}', '', msg('files'), False, True));

		//pj_area_estrapj_area
		array_push($cp, array('$M', '', '<br><br>', False, True));
		array_push($cp, array('$B8', '', msg('bt_salvar_continuar'), False, True));
		return ($cp);
	}

	function le($id) {
		$sql = "select *, 
					aluno.us_nome as al_nome, aluno.id_us as id_al,
					prof.us_nome as pf_nome, prof.id_us as id_pf
				FROM " . $this -> tabela . "
					LEFT JOIN us_usuario as prof  on prof.us_cracha = pj_professor
					LEFT JOIN us_usuario as aluno on aluno.us_cracha = pj_aluno
					LEFT JOIN area_conhecimento ON pj_area = ac_cnpq
					LEFT JOIN ic_submissao_situacao on pj_status = ssi_status  
				where id_pj = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$rlt = $rlt[0];
		} else {
			$rlt = array();
		}
		return ($rlt);
	}

	function valida_entrada($id = '') {
		$data = $this -> le($id);
		$erro = '<font color="red">Erro</font>';
		$ok = '<font color="green">OK</font>';
		$vd = array($erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro, $erro);
		/* Regra */
		if (strlen($data['pj_titulo']) > 10) {
			$vd[0] = $ok;
		}

		$sx = '<table class="tabela01 lt1" width="50%">';
		$sx .= '<tr><th width="80%">' . msg('rule') . '</th><th width="20%">' . msg('chk') . '</th></tr>';

		$sx .= '<tr><td class="border1">Título do projeto - (' . strlen($data['pj_titulo']) . ' caracteres)</td>
						<td class="border1" align="center">' . $vd[0] . '</tr>';

		/* REGRA - ISSN */
		if (strlen($data['pj_aluno']) == 8) {
			$vd[1] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('pj_aluno') . '(' . $data['pj_aluno'] . ')' . '</td>
						<td class="border1" align="center">' . $vd[1] . '</tr>';

		/* REGRA - arquivos postados */
		$sql = "select 1 as total from ic_ged_documento 
					WHERE doc_dd0 = '" . strzero($id, 6) . "' and doc_status <> 'X' ";
		$rrr = $this -> db -> query($sql);
		$rrr = $rrr -> result_array();

		if (count($rrr) > 0) {
			$vd[3] = $ok;
		}
		$sx .= '<tr><td class="border1">' . msg('captacao_arquivos') . ' - ' . count($rrr) . ' ' . msg('file_posted') . '' . '</td>
						<td class="border1" align="center">' . $vd[3] . '</tr>';

		/* valicacao */
		$ok = 1;
		$cps = 3;
		/* Campos para validacao */

		for ($r = 0; $r <= $cps; $r++) {
			if ($vd[$r] == $erro) { $ok = 0;
			}
		}
		if ($ok == 1) {
			$sx .= '<tr><td><B><font color="green">' . msg('validataion_ok') . '</font></b></td></tr>';
		} else {
			$sx .= '<tr><td><B><font color="red">' . msg('validataion_error') . '</font></b></td></tr>';
		}
		$sx .= '</table>';

		$cp = array();
		$idp = '1' . strzero($id, 6);
		array_push($cp, array('$HV', 'pj_codigo', $idp, False, True));
		array_push($cp, array('$M', '', $sx, False, True));
		array_push($cp, array('$C', '', 'Concordo em enviar o projeto para análise!', True, True));

		return ($cp);
	}

	function altera_status($id, $sta = '') {
		$sql = "update " . $this -> tabela . " set pj_status = '$sta' where id_pj = '$id' ";
		$this -> db -> query($sql);
	}

	function projeto_novo($cracha) {
		$ano = date("Y");
		$data = date("Y-m-d");

		$id = $this -> exist_submit($cracha, $ano);
		if ($id == 0) {
			$sql = "insert into " . $this -> tabela . " 
							(
							pj_edital, pj_titulo, pj_codigo,
							pj_ano,	pj_grupo_pesquisa, pj_dt_update,
							pj_update, pj_status, pj_professor
							) values (
							'ICMST','','',
							'$ano','','$data',
							'$data','@','$cracha') ";
			$rlt = $this -> db -> query($sql);
			$id = $this -> exist_submit($cracha, $ano);
		}

		$this -> updatex();
		$url = base_url('index.php/ic/submit_edit/ICMST/' . $id . '/' . checkpost_link($id));
		redirect($url);
		return ($id);
	}

	function updatex() {
		$sql = "update " . $this -> tabela . " set pj_codigo = concat('2',lpad(id_pj,6,0)) where pj_codigo = '' ";
		$rlt = $this -> db -> query($sql);
	}

	function exist_submit($cracha, $ano) {
		$sql = "select id_pj from " . $this -> tabela . " where pj_status = '@' 
							and pj_edital = 'ICMST' 
							and pj_ano = '$ano' 
							and pj_professor = '$cracha' 
							LIMIT 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($rlt[0]['id_pj']);
		} else {
			return (0);
		}
	}

	function resumo_submit($cracha = '', $ano = '') {
		$res = array('0', '-', '-', '-', '-', '-');
		$link = array('', '', '', '', '', '');

		$sql = "select count(*) as total, pj_status 
							FROM " . $this -> tabela . "
							WHERE pj_edital = 'ICMST' and pj_ano = '$ano' and pj_professor = '$cracha'
							GROUP BY pj_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sta = $line['pj_status'];
			switch($sta) {
				case '@' :
					$res[0] = round($res[0]) + $line['total'];
					$lk = base_url('index.php/ic/submit_ICMST/0');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[0] = $lk;
					break;
				case 'A' :
					$res[2] = round($res[2]) + $line['total'];
					$lk = base_url('index.php/ic/submit_ICMST/A');
					$lk = '<A href="' . $lk . '" class="link lt6">';
					$link[2] = $lk;
			}

		}
		$sql = "ic_submissao_plano";

		$sx = '<table width="100%" class="tabela01 lt2" cellspacing=10>';
		$sx .= '<tr>';
		$sx .= '<td colspan="10" class="lt6">' . msg('resumo_das_submissoes') . ' - ' . msg('ICMST') . '</td>';
		$sx .= '</tr>';

		$sz = round(100 / 6) . '%';

		$cap = array();
		$sx .= '<tr>';
		$cap[0] = msg('ic_projetos') . ' ' . msg('em_cadastro');
		$cap[1] = msg('ic_planos') . ' ' . msg('em_cadastro');
		$cap[2] = msg('ic_projetos') . ' ' . msg('em_submetidos');
		$cap[3] = msg('ic_planos') . ' ' . msg('em_submetidos');
		$cap[4] = msg('ic_projetos') . ' ' . msg('cancelados');
		$cap[5] = msg('ic_planos') . ' ' . msg('cancelados');
		$sx .= '</tr>';

		$sx .= '<tr class="lt6">';
		for ($r = 0; $r < 6; $r++) {
			$bg = '';
			/* Submetidos */
			if (($r >= 2) and ($r <= 3)) {
				$bg = 'bg_lgreen';
			}

			/* Cancelados */
			if (($r >= 4) and ($r <= 5)) {
				$bg = 'bg_lred';
			}
			$sx .= '<td class="captacao_folha border1 black ' . $bg . '" align="center" width="' . $sz . '">';
			$sx .= '<font class="lt1">' . $cap[$r] . '</font><br/>';
			$sx .= $link[$r] . $res[$r] . '</a></td>';
		}
		$sx .= '</table>';

		return ($sx);
	}

}
?>
