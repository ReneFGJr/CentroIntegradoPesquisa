<?php
class ics_master extends CI_model
	{
		var $tabela = "ic_submissao_projetos";
		
		function cp_subm_01()
			{
				$cp = array();
				array_push($cp,array('$H8','id_pj','',False,True));
				array_push($cp,array('$T80:5','pj_titulo',msg('titulo_pesquisa'),True,True));
				
				$sql = "select ac_cnpq, concat(ac_cnpq,' - ',ac_nome_area) as ac_nome_area from area_conhecimento where ac_ativo = 1 and ac_semic = 1  and not (ac_cnpq like '0%') order by ac_nome_area";
				array_push($cp,array('$Q ac_cnpq:ac_nome_area:'.$sql,'',msg('area_conhecimento'),True,True));
				
				array_push($cp,array('$U8','pj_update','',False,True));
				//pj_area_estrapj_area
				return($cp);
			}
		
		function cp_subm_02()
			{
				$cp = array();
				array_push($cp,array('$H8','id_pj','',False,True));
				array_push($cp,array('$FILE','','',False,True));
				
				//pj_area_estrapj_area
				return($cp);
			}
		function projeto_novo($cracha)
			{
				$ano = date("Y");
				$data = date("Y-m-d");
				
				$id = $this->exist_submit($cracha,$ano);
				if ($id == 0)
					{
						$sql = "insert into ".$this->tabela." 
							(
							pj_edital, pj_titulo, pj_codigo,
							pj_ano,	pj_grupo_pesquisa, pj_dt_update,
							pj_update, pj_status, pj_professor
							) values (
							'ICMST','','',
							'$ano','','$data',
							'$data','@','$cracha') ";
						$rlt = $this->db->query($sql);
						$id = $this->exist_submit($cracha,$ano);
					}
					
				$this->updatex();	
				$url = base_url('index.php/ic/submit_edit/ICMST/'.$id.'/'.checkpost_link($id));
				redirect($url);				
				return($id);
			}
		function updatex()
			{
				$sql = "update ".$this->tabela." set pj_codigo = concat('1',lpad(id_pj,6,0)) where pj_codigo = '' ";
				$rlt = $this->db->query($sql);
			}
		function exist_submit($cracha,$ano)
			{
				$sql = "select id_pj from ".$this->tabela." where pj_status = '@' 
							and pj_edital = 'ICMST' 
							and pj_ano = '$ano' 
							and pj_professor = '$cracha' 
							LIMIT 1";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				if (count($rlt) > 0)
					{
						$line = $rlt[0];
						return($rlt[0]['id_pj']);
					} else {
						return(0);
					}				
			}
		function resumo_submit($cracha='',$ano='')
			{
				$res = array('-','-','-','-','-','-');
				$link = array('','','','','','');

				$sql = "select count(*) as total, pj_status 
							FROM ".$this->tabela."
							WHERE pj_edital = 'ISMST' and pj_ano = '$ano' and pj_professor = '$cracha'
							GROUP BY pj_status ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				for ($r=0;$r < count($rlt);$r++)
					{
						$line = $rlt[$r];
						$sta = $line['pj_status'];
						switch($sta)
							{
							case '@':
									{
										$res[0] = $res[0] + $line['total'];
										$lk = base_url('index.php/ic/submit_ICMST/@');
										$lk = '<A href="'.$link.'">';
										$link[0] = $lk;
									}
							}
					}
				$sql = "ic_submissao_plano";
				
				$sx = '<table width="100%" class="tabela01 lt2" cellspacing=10>';
				$sx .= '<tr>';
				$sx .= '<td colspan="10" class="lt6">'.msg('resumo_das_submissoes').' - '.msg('ICMST').'</td>';
				$sx .= '</tr>';
				
				$sz = round(100/6).'%';
				
				$sx .= '<tr>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_projetos').' '.msg('em_cadastro').'</th>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_planos').' '.msg('em_cadastro').'</th>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_projetos').' '.msg('em_submetidos').'</th>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_planos').' '.msg('em_submetidos').'</th>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_projetos').' '.msg('cancelados').'</th>';
				$sx .= '<th width="'.$sz.'">'.msg('ic_planos').' '.msg('cancelados').'</th>';
				$sx .= '</tr>';
				
				$sx .= '<tr class="lt6">';
				for ($r=0;$r < 6;$r++)
					{
						$bg = '';
						/* Submetidos */
						if (($r >= 2) and ($r <= 3))
							{
								$bg = 'bg_lgreen';
							}

						/* Cancelados */
						if (($r >= 4) and ($r <= 5))
							{
								$bg = 'bg_lred';
							}
						$sx .= '<td class="captacao_folha border1 black '.$bg.'" align="center">'.$link[$r].$res[$r].'</a></td>';
					}
				$sx .= '</table>';
				return($sx);
			}
	}
?>
