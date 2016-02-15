<?php
class artigos extends CI_Model
	{
	function resumo_artigos($cracha = '',$texto='')
		{
			$art = array('-','-','-','-');
			$sql = "select ar_status, count(*) as total from cip_artigo 
					WHERE ar_professor = '$cracha'
					GROUP BY ar_status";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
				
			for ($r=0;$r < count($rlt); $r++)
				{
					$line = $rlt[$r];
					$sta = $line['ar_status'];
					$tot = $line['total'];
					switch($sta)
						{
						case '0':
							$art[0] = $art[0] + $tot;
							break;
						case '25':
							$art[2] = $art[2] + $tot;
							break;	
						default:
							echo $sta.'...';
							break;						
						}
				}
			
			$data = array();
			$data['artigos_em_cadastrados'] = $art[0];
			$data['artigos_em_analise'] = $art[1];
			$data['artigos_finalizado'] = $art[2];
			$data['artigos_para_correcao'] = $art[3];
			$data['artigo_texto'] = $texto;
			
			//$sx = $this->load->view("perfil/perfil_artigos",$data,true);

			return($data);
		}
	function cp_01()
		{
			$cp = array();
			array_push($cp,array('$H8','id_ar','',False,True));
			array_push($cp,array('${','','Sobre a Publicação',False,True));
			array_push($cp,array('$S9','ar_issn','ISSN (0000-0000)',True,True));
			array_push($cp,array('$S100','ar_doi','DOI',False,True));
			array_push($cp,array('$T80:3','ar_doi','Título da Revista',True,True));
			array_push($cp,array('$}','','Sobre a Publicação',False,True));
			
			array_push($cp,array('${','','Dados do Artigo',False,True));
			array_push($cp,array('$T80:5','ar','Título do Artigo Original',True,True));
			array_push($cp,array('$[2010-'.(date("Y")+1).']','id_ar','Ano do Fascículo',True,True));			
			array_push($cp,array('$S5','ar','Vol.',False,True));
			array_push($cp,array('$S5','ar','Num.',False,True));
			array_push($cp,array('$S10','ar','Paginação Ex: (192-208)',False,True));
			array_push($cp,array('$}','','Dados do Artigo',False,True));
			
			array_push($cp,array('$B','',msg('save_next'),False,True));
			return($cp);
		}
		
	function cp_02()
		{
			$cp = array();
			array_push($cp,array('$H8','id_ar','',True,True));
			
			/* WEB QUALIS */
			array_push($cp,array('${','','Estrato WebQualis',False,True));
			array_push($cp,array('$O A1:A1&A2:A2&-:Outros Qualis','ar_qualis','Qualis da publicação',True,True));
			array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Qualis, no próximo passo (3)',False,True));
			array_push($cp,array('$}','','',False,True));

			/* SCImago */
			array_push($cp,array('${','','Classificação SCImago',False,True));
			array_push($cp,array('$O Q1:Q1&Q2:Q2&Q3:Q4&Q4:Q4&-:Não indexado','ar_qualis','Classificação SCImago',True,True));
			array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)',False,True));
			array_push($cp,array('$}','','',False,True));
			
			/* SCImago */
			array_push($cp,array('${','','Excellence Rate Report - SCImago',False,True));
			array_push($cp,array('$O ER:Excellence Rate (ExR)&--:Não é ExR no SCImago','ar_qualis','Excellence Rate Report',True,True));
			array_push($cp,array('$M','','O Excellence Rate corresponde a 10% de um conjunto de periódicos mais citados em suas respecticas áreas científicas. É uma medida de alta qualidade de produção de instituições de pesquisa.',False,True));
			array_push($cp,array('$M','','Necessário anexar um PDF do SCIMago com a área do Excellence Rate, no próximo passo (3)',False,True));
			array_push($cp,array('$}','','',False,True));	
			
			/* SCImago */
			array_push($cp,array('${','','Colaboração com outras instituições',False,True));
			array_push($cp,array('$O Q1:Q1&Q2:Q2&Q3:Q4&Q4:Q4&-:Não indexado','ar_qualis','Classificação SCImago',True,True));
			array_push($cp,array('$M','','Necessário anexar um PDF com o PrintScreen da tela do Periódico com o Q1 na área específica, no próximo passo (3)',False,True));
			array_push($cp,array('$}','','',False,True));
			
			array_push($cp,array('$B','',msg('save_next'),False,True));					

			return($cp);
		}

	function cp_03()
		{
			$proto = '000000';
			$cp = array();
			array_push($cp,array('$H8','id_ar','',False,True));
			array_push($cp,array('${','','Sobre a Publicação',False,True));
			array_push($cp,array('$SFILE','',$proto,True,True));
			array_push($cp,array('$}','','Sobre a Publicação',False,True));
			
			array_push($cp,array('$B','',msg('save_next'),False,True));
			
			return($cp);
		}
	function cp_04()
		{
			$proto = '000000';
			$cp = array();
			array_push($cp,array('$H8','id_ar','',False,True));
			array_push($cp,array('${','','Checklist',False,True));
			array_push($cp,array('$M','',$proto,True,True));
			array_push($cp,array('$}','','Checklist',False,True));
			
			array_push($cp,array('$C','','Confirmo a submissão',True,True));
			array_push($cp,array('$B','','Enviar cadastro',False,True));
			return($cp);
		}		
	function resumo_processos($id='')
		{
			$it = 6;
			$sz = round(100/$it);
			$ar = array(0,0,0,0,0,0,0,0,0,0);
			
			/* */
			$sql = "SELECT *
					FROM cip_artigo 
						left join cip_artigo_status on ar_situacao = id_cas 
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$tp = round($line['cas_grupo']);
					$ar[$tp] = $ar[$tp] + 1;
				}
			
			$sx = '<table class="lt2 border1" width="100%">';
			$sx .= '<tr class="lt1">';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_em_cadastro').'</th>';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_devolvido_correcoes').'</th>';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_validacao_coordenador').'</th>';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_validacao_diretoria').'</th>';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_comunicacao').'</th>';
				$sx .= '<th width="'.$sz.'%">'.msg('cap_finalizado').'</th>';
			$sx .= '</tr>';
			$sx .= '<tr align="center" class="lt5">';
			for ($r=0;$r < $it;$r++)
				{
					$link = '<a href="'.base_url('index.php/cip/artigos/'.$r).'" class="link lt6">';
					$sx .= '<td class="border1">'.$link.$ar[$r].'</a></td>';
				}
			$sx .= '</tr>';
			$sx .= '</table>';
			
			if (strlen($id) > 0)
				{
					$sx .= $this->lista_artigos_por_situacao($id);
				}
			
			return($sx);
		}
	function lista_artigos_por_situacao($sit=0)
		{
			/* */
			$sql = "SELECT *
					FROM cip_artigo 
						left join cip_artigo_status on ar_situacao = id_cas 
						left join us_usuario on us_cracha = ar_professor
					where cas_grupo = $sit
					order by ar_update desc
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="100%" class="lt1">';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<tr>';
					$sx .= '<td align="center" width="10" class="borderb1">';
					$sx .= ($r+1).'.';
					$sx .= '</td>';
					$sx .= '<td class="borderb1">';
					$sx .= $line['ar_issn'];
					$sx .= '</td>';
					
					$sx .= '<td class="borderb1">'.$line['us_nome'].'</td>';
					
					
					$sx .= '<td width="50%" class="borderb1">'.$line['ar_titulo'].'</td>';
					
					$sx .= '<td class="borderb1">'.$line['cas_descricao'].'</td>';
					
					$sx .= '</tr>';
					
				}
			$sx .= '</table>';
			print_r($line);
			return($sx);
		}
	function lista($cracha='')
		{
			$sql = "select * from captacao
					left join captacao_situacao on ca_status = ca_status_old 
					where ca_professor = '$cracha' ";
			$rlt = db_query($sql);
			$sx = '<table width="100%" class="tabela1 lt2" cellpadding=3>';
			while ($line = db_read($rlt))
				{
					$nome = $line['ca_descricao'];
					$edital_nr = $line['ca_edital_nr'];
					$ca_protocolo = $line['ca_protocolo'];
					$ano = $line['ca_edital_ano'];
					$vigencia = strzero($line['ca_vigencia_ini_mes'],2).'/'.strzero($line['ca_vigencia_ini_ano'],4);
					$duracao = $line['ca_duracao'];
					$situacao = $line['cs_situacao'];
					$cor = trim($line['cs_cor']);
					$xcor = '';
					if (strlen($cor) > 0)
						{
							$cor = '<font color="'.$cor.'">';
							$xcor = '</font>';
						}
					
					$sx .= '<tr>';
					$sx .= '<td class="border1" align="center">'.$cor.$ca_protocolo.$xcor.'</td>';
					
					$sx .= '<td class="border1">'.$cor.$nome.$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$edital_nr.'/'.strzero($ano,4).$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$vigencia.$xcor.'</td>';
					$sx .= '<td class="border1" align="center">'.$cor.$duracao.' mesês'.$xcor.'</td>';
					
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_capital'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_custeio'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_bolsa'],2,',','.').$xcor.'</td>';
					$sx .= '<td class="border1" align="right" width="8%">'.$cor.number_format($line['ca_vlr_outros'],2,',','.').$xcor.'</td>';
					
					$sx .= '<td class="border1" align="center">'.$cor.$situacao.$xcor.'</td>';
					
					$sx .= '</tr>';
					$ln = $line;
				}
				print_r($ln);
			$sx .= '</table>';
			return($sx);
		}	
	}
?>
