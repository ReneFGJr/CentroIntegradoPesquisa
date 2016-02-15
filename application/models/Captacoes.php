<?php
class captacoes extends CI_Model {
	
	function cp_01($id='')
		{
			$cracha = $_SESSION['cracha'];
			$sql_pos = "SELECT id_pp, pp_nome  FROM `ss_professor_programa_linha`
    					INNER JOIN us_usuario on us_usuario_id_us = id_us
    					inner join ss_programa_pos ON programa_pos_id_pp = id_pp
    				where us_cracha = '$cracha' ";	
			/* Vigencia */
			$vg = '';
			for ($r=2010;$r <= (date("Y")+1);$r++)
				{
					for ($m=1;$m <= 12;$m++)
						{
							$dt = $r.strzero($m,2).':'.strzero($m,2).'/'.$r;
							if (strlen($vg) > 0) { $vg .= '&'; }
							$vg .= $dt;		
						}
					
				}
			/* Duracao */
			$dr = '';
			for ($r=0; $r <= 72; $r++)
				{
					$dt = $r;
					/* regras */
					if ($dt == 1) { $dt = '1 '.msg('mes'); }
					if ($dt > 1) { $dt = $r.' '.msg('meses'); }
					
					if (round($r/12) == ($r/12))
						{
							$dt = round($r/12);
							if ($dt == 1)
								{
									$dt = '1 '.msg('ano');
								} else {
									$dt = round($r/12). ' '.msg('anos');
								}
						}
					if ($dt == 0) { $dt =  msg('nao_aplicado'); }						
					if (strlen($dr) > 0) { $dr .= '&'; }
					$dr .= $r.':'.$dt;
				}	
			
			$ops = 'cp_cod:cp_descricao:select * from captacao_participacao where cp_ativo = 1';
			$opa = 'agf_codigo:agf_nome:select * from fomento_agencia where agf_ativo = 1 order by agf_nome';
			$cp = array();
			array_push($cp,array('$HV','id_ca',$id,true,true));
			array_push($cp,array('${','',msg('Participacao'),false,true));
			
			
			array_push($cp,array('${','',msg('captacao_edital'),false,true));
			array_push($cp,array('$Q '.$ops,'ca_participacao','Sua participação neste projeto de pesquisa, perante a instituição é de:',True,true));
			array_push($cp,array('$Q '.$opa,'ca_agencia',msg('fomente_agencia'),false,true));
			array_push($cp,array('$S20','ca_edital_nr',msg('fomento_edital'),true,true));
			array_push($cp,array('$S20','ca_processo',msg('fomento_processo'),true,true));
			array_push($cp,array('$[2010-'.date("Y").']','ca_edital_ano',msg('fomento_ed_ano'),True,true));
			array_push($cp,array('$}','',msg('captacao_edital'),false,true));
			
			array_push($cp,array('${','',msg('captacao_perfil'),false,true));
			array_push($cp,array('$C','ca_academico','Projeto Acadêmico (Projeto de pesquisa, eventos, entre outros)',false,true));
			array_push($cp,array('$C','ca_insticional','Projeto de Coordenação Institucional (Recursos para infraestrutura, entre outros)',false,true));
			array_push($cp,array('$C','ca_desmembramento','Desmembramento de Projeto de Coordenação Institucional (Recursos para infraestrutura, entre outros)',false,true));
			array_push($cp,array('$}','',msg('captacao_perfil'),false,true));
			
			array_push($cp,array('${','',msg('captacao_dados'),false,true));
			array_push($cp,array('$A','',msg('captacao_descricao'),false,true));
			array_push($cp,array('$T80:3','ca_descricao',msg('captacao_titulo'),true,true));
			array_push($cp,array('$Q id_pp:pp_nome:'.$sql_pos,'ca_programa',msg('captacao_programa'),false,true));
			array_push($cp,array('$}','',msg('captacao_dados'),false,true));
			
			array_push($cp,array('${','',msg('captacao_vigencia'),false,true));
			array_push($cp,array('$O '.$vg,'ca_vigencia_final_ano',msg('captacao_vigencia_inicio'),true,true));
			array_push($cp,array('$O '.$dr,'ca_duracao',msg('captacao_duracao'),true,true));
			array_push($cp,array('$O '.$dr,'ca_duracao',msg('captacao_prorrogacao'),true,true));
			array_push($cp,array('$}','',msg('captacao_vigencia'),false,true));
			
			
			array_push($cp,array('$}','',msg('Participacao'),false,true));
			
			array_push($cp,array('$B8','',msg('save_next'),false,true));	
			return($cp);
			
		}
	function cp_02($id='')
		{
			$cp = array();
			array_push($cp,array('$HV','id_ca',$id,true,true));
			array_push($cp,array('${','',msg('Recusos captados'),false,true));
			
			array_push($cp,array('$N8','ca_vlr_capital',msg('ca_vlr_capital'),true,true));
			array_push($cp,array('$N8','ca_vlr_custeio',msg('ca_vlr_custeio'),true,true));
			array_push($cp,array('$N8','ca_vlr_bolsa',msg('ca_vlr_bolsa'),true,true));
			array_push($cp,array('$N8','ca_vlr_outros',msg('ca_vlr_outros'),true,true));
			/* ca_vlr_total */			
			array_push($cp,array('$L','',msg('ca_vlr_total'),false,false));
			
			
			$text = 'O valor aplicado refere-se a quantidade de recursos que serão aplicados na PUCPR, podendo ser qualquer uma das modalidades, capital, custeio ou bolsas, informando qual o valor total.';
			array_push($cp,array('${','','Valores para proponente',false,true));
			array_push($cp,array('$N8','ca_proponente_vlr',msg('ca_proponente_vlr'),true,true));
			array_push($cp,array('$N8','ca_proponente',msg('ca_proponente'),true,true));
			array_push($cp,array('$}','','',false,true));
			
			array_push($cp,array('$}','',msg('Recusos captados'),false,true));
			
			array_push($cp,array('$T80:6','ca_contexto',msg('ca_contexto'),false,false));
			
			array_push($cp,array('$B8','',msg('save_next'),false,true));
			return($cp);
		}

	function cp_03($id='')
		{
			$cp = array();
			array_push($cp,array('$HV','id_ca',$id,true,true));
			array_push($cp,array('${','',msg('Recusos captados'),false,true));
			
			array_push($cp,array('$FILE:captacao_ged_documento:captacao','',$id,false,true));
			array_push($cp,array('$}','','',false,true));
			
			array_push($cp,array('$}','',msg('Recusos captados'),false,true));
			
			array_push($cp,array('$B8','',msg('save_next'),false,true));
			return($cp);
		}
		
	function validacao_cp($id='')
		{
			$data = $this->le($id);
			$cp = array();
			array_push($cp,array('$HV','id_ca',$id,true,true));
			$sx = '<table width="100%">';
			$sx .= '<tr><td class="lt4">'.msg('validacao').'</td></tr>';
			$sx .= '<tr><td>'.$this->load->view('captacao/detalhe',$data,true);
			$sx .= '</table>';
			
			array_push($cp,array('$A','',$sx,false,true));
			array_push($cp,array('$B8','',msg('send'),false,true));
			return($cp);
		}	
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
		
	function captacao_em_cadastro($cracha)
		{
			$sql = "select * from captacao 
					WHERE ca_professor = '$cracha'	
					AND ca_status = 1 ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					return($line['id_ca']);
				} else {
					return(0);
				}			
		}
		
	function nova_captacao($cracha)
		{
			$id = $this->captacao_em_cadastro($cracha);
			$data = date("Ymd");
			$inip = date("Ym");
			$dura = '0';
			$vigencia = '0';
			
			$data_D2 = date("Y-m-d");
			if ($id == 0)
				{
					$sql = "select max(id_ca) as id from captacao";
					$rlt = $this->db->query($sql);
					$rlt = $rlt->result_array();
					if (count($rlt) > 0)
						{
							$cod = $rlt[0]['id'];
						} else {
							$cod = 1;
						}
					$proto = strzero($cod,7);
					$sql = "insert into captacao
							(
								ca_professor, ca_status, ca_lastupdate,
								ca_update, ca_ativo, ca_descricao,
								ca_protocolo, ca_academico,
								ca_vigencia_fim_ano, ca_duracao, ca_vigencia_prorrogacao
							) values (
								'$cracha','1','$data_D2',
								$data,1,'em cadastro', 
								'$proto',1,
								$inip, $dura, $vigencia
								
							)";
					$this->db->query($sql);
					$id = $this->captacao_em_cadastro($cracha);		
				}
			return($id);
		}

	function resumo_projetos($cracha = '', $editar = 0) {
		$cap = array('-','-','-','-');
		
		$th_editar = '';
		if ($editar == 1)
			{
				$th_editar = '<th>ação</th>';
			}
		$sql = "select * from captacao 
					LEFT JOIN captacao_situacao ON ca_status_old = ca_status
					LEFT JOIN captacao_participacao ON cp_cod = ca_participacao
					where ca_professor = '$cracha' 
					and ca_status > 0
					ORDER BY ca_edital_ano desc
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt1">';
		$sh = '<tr>
				<th width="5%">protocolo</th>
				<th width="5%">fomento</th>
				<th width="5%">Edital</th>
				<th>Descrição do Edital</th>
				<th width="5%">Atualizado</th>
				<th width="5%">Início da Vigência</th>
				<th width="5%">Duração</th>
				<th width="5%">Prorrogação</th>
				<th>Participação</th>
				<th width="10%">Vlr. Projeto</th>
				<th width="10%">Vlr. Proponente</th>
				<th>Inst.*</th>
				<th>Situação</th>	
				'.$th_editar.'			
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
			$sx .= '<td class="border1">' . $line['ca_descricao'] . '</td>';
			
			$sx .= '<td class="border1" align="center">' . $line['ca_lastupdate'] . '</td>';

			$vg = $line['ca_vigencia_final_ano'];
			$vg_ini = substr($vg,5,2).'/'.substr($vg,0,4);
			$sx .= '<td class="border1"align="center">' . $vg_ini . '</td>';

			$sx .= '<td class="border1" align="center">' . $line['ca_duracao'] . '</td>';

			$sx .= '<td class="border1" align="center">&nbsp;' . $line['ca_vigencia_prorrogacao'] . '&nbsp;</td>';

			$sx .= '<td class="border1">' . $line['cp_descricao'] . '</td>';

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
				
			/********************* resumo */
			switch ($line['cs_resumo'])
				{
					case '2':
						$cap[2] = $cap[2] + 1;
						break;
					default:
						$cap[1] = $cap[1] + 1;
						break;
				}
			$sx .= '<td class="border1" align="center">' . $cor. $situacao . '</font>'. '</td>';
			
			/* Modo editar */
			if ($editar == 1)
				{
					$sx .= '<td align="center" class="border1">';
					$sx .= '<a href="index.php/captacao/editar/'.$line['id_ca'].'/'.checkpost_link($line['id_ca']).'" class="link lt2">';
					$sx .= 'editar';
					$sx .= '</a>';
					$sx .= '</td>';
				}
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
		
		$sr ['captacao_em_cadastrado'] = $cap[0];
		$sr ['captacao_para_correcao'] = $cap[3];
		$sr ['captacao_em_analise'] = $cap[1];
		$sr ['captacao_finalizado'] = $cap[2];
		
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
