<?php
class semic_avaliacoes extends CI_Model {
	
	function alunos_ausentes(){
		
		$ano_semic = (date("Y")-1);
		//busca presenca de alunos e professores no semic
		$sql = "
						select distinct
						pp_protocolo as proto,
						aluno.us_cracha as al_cracha,
						aluno.id_us as al_id,
						aluno.us_nome as al_nome,
						prof.us_cracha as pof_cracha,
						prof.id_us as prof_id,  
						prof.us_nome  as pf_nome, 
						aval.us_cracha as aval_cracha,
						aval.id_us as aval_id,  
						aval.us_nome  as aval_nome,
						pp_p05 as p05, pp_p07 as p07,
						pp_tipo,CASE
						         WHEN pp_p05 = 0 THEN 'estudante presente'
						         WHEN pp_p05 = 1 THEN 'estudante ausente, trabalho apresentado pelo professor'
						         WHEN pp_p05 = 2 THEN 'pôster afixado e estudante ausente'
						         WHEN pp_p05 = 3 THEN 'estudante ausente e pôster não afixado'
						       else pp_p05          
						       END as pres_aluno,
						       CASE
						         WHEN pp_p07 = 0 THEN 'professor orientador presente'
						         WHEN pp_p07 = 1 THEN 'professor ausente, enviou representante e justificativa por escrito'
						         WHEN pp_p07 = 2 THEN 'professor ausente, enviou representante sem justificativa por escrito'
						         WHEN pp_p07 = 3 THEN 'professor ausente e estudante justificou que o professor está atuando como avaliador'
						         WHEN pp_p07 = 4 THEN 'professor ausente sem justificativa'
						       else pp_p07          
						       END as pres_prof,
						pp_p19 as apresentacao
						from  pibic_parecer_". $ano_semic . "
						inner join semic_trabalho on sm_codigo = pp_protocolo 
						inner join us_usuario as aluno on sm_discente = aluno.us_cracha
						inner join us_usuario as prof on sm_docente = prof.us_cracha
						inner join us_usuario as aval on pp_avaliador_id = aval.id_us
						where pp_p19 not in('JI', 'JE')
						and ( pp_p05 = 1 or pp_p05 = 2 or pp_p05 = 3 ) 
						order by al_nome, proto		
       ";
      //result sql 
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			//cria cabecalho da tab
			$sx = '<table width="100%" class="tabela00">';
			$sx .= '<tr><td class="lt3" colspan=5> SEMIC '. (date("Y")-1) .'</tr>'; 
			$sx .= '<tr><th align="left">#</th>
									<th align="left">Protocolo</th>
									<th align="left" >Aluno</th>
									<th align="left">Crachá aluno</th>
									<th align="left">Professor</th>
									<th align="left">Crachá professor</th>
									<th align="left">Pres_aluno</th>
									<th align="left">Pres_prof</th>
									<th align="left">Evento</th>
									<th align="left">Apresentação</th>
									<th align="left">Avaliador</th>
						</tr>';
			//itera array nas linhas da tab				
			$tot = 0;
			//$tot2 = 0;	
			//$tot3 = 0;		
			for ($r=0;$r < count($rlt);$r++){
					//transfere para variavel $line todo o result da query
					$line = $rlt[$r];
					//soma ao total
					$tot++;
					//
					$sx .= '<tr align="left">';
					$sx .= '<td width="20" class="lt2">'.($r+1).'.</td>';				
					//protocolo
					$sx .= '<td class="lt1">';
					$sx .= $line['proto'];
					$sx .= '</td>';
					//nome_al
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['al_nome'], $line['al_id']);
					$sx .= '</td>';
					//cracha
					$sx .= '<td class="lt1">';
					$sx .= $line['al_cracha'];
					$sx .= '</td>';
					//nome_prof
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['pf_nome'], $line['prof_id']);
					$sx .= '</td>';					
					//cracha_prof
					$sx .= '<td class="lt1">';
					$sx .= $line['pof_cracha'];
					$sx .= '</td>';				
					//presença_al					
					$st = $line['p05'];
					$sf = '';
					$sff = '';
					if ($st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
						//$tot2++;
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
						
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_aluno']. $sff;
					$sx .= '</td>';
					//presença_prof					
					$st = $line['p07'];
					$sf = '';
					$sff = '';
					if ( $st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
						//$tot3++;
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
						
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_prof']. $sff;
					$sx .= '</td>';	
					//evento
					$sx .= '<td class="lt1">';
					$sx .= $line['pp_tipo'];
					$sx .= '</td>';
					//tipo apresentacao
					$sx .= '<td class="lt1">';
					$sx .= $line['apresentacao'];
					$sx .= '</td>';	
					//avaliador
					$sx .= '<td class="lt0">';
					$sx .= link_perfil($line['aval_nome'], $line['aval_id']);
					$sx .= '</td>';				
				}
				
				$sx .= '</table>';
				//mostra soma
				$sx .= '<br>'.$tot.' casos registrados ';
				//$sx .= '<br>'.$tot2.' casos de alunos com alguma pendência';
				//$sx .= '<br>'.$tot3.' casos de professores com alguma pendência';
			
			return($sx);
		
	}


function professores_ausentes(){
		
		$ano_semic = (date("Y")-1);
		
		$sql = "
						select distinct
						pp_protocolo as proto,
						aluno.us_cracha as al_cracha,
						aluno.id_us as al_id,
						aluno.us_nome as al_nome,
						prof.us_cracha as pof_cracha,
						prof.id_us as prof_id,  
						prof.us_nome  as pf_nome, 
						aval.us_cracha as aval_cracha,
						aval.id_us as aval_id,  
						aval.us_nome  as aval_nome,
						pp_p05 as p05, pp_p07 as p07,
						pp_tipo,CASE
						         WHEN pp_p05 = 0 THEN 'estudante presente'
						         WHEN pp_p05 = 1 THEN 'estudante ausente, trabalho apresentado pelo professor'
						         WHEN pp_p05 = 2 THEN 'pôster afixado e estudante ausente'
						         WHEN pp_p05 = 3 THEN 'estudante ausente e pôster não afixado'
						       else pp_p05          
						       END as pres_aluno,
						       CASE
						         WHEN pp_p07 = 0 THEN 'professor orientador presente'
						         WHEN pp_p07 = 1 THEN 'professor ausente, enviou representante e justificativa por escrito'
						         WHEN pp_p07 = 2 THEN 'professor ausente, enviou representante sem justificativa por escrito'
						         WHEN pp_p07 = 3 THEN 'professor ausente e estudante justificou que o professor está atuando como avaliador'
						         WHEN pp_p07 = 4 THEN 'professor ausente sem justificativa'
						       else pp_p07          
						       END as pres_prof,
						pp_p19 as apresentacao
						from  pibic_parecer_". $ano_semic . "
						inner join semic_trabalho on sm_codigo = pp_protocolo 
						inner join us_usuario as aluno on sm_discente = aluno.us_cracha
						inner join us_usuario as prof on sm_docente = prof.us_cracha
						inner join us_usuario as aval on pp_avaliador_id = aval.id_us
						where pp_p19 not in('JI', 'JE')
						and ( pp_p07 = 1 or pp_p07 = 2 or pp_p07 = 3 or pp_p07 = 4 ) 
						order by pf_nome
       ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<table width="100%" class="tabela00">';
			$sx .= '<tr><td class="lt6" colspan=5> SEMIC '. (date("Y")-1) .'</tr>'; 
			$sx .= '<tr><th align="left">Id</th>
									<th align="left">Protocolo</th>
									<th align="left">Professor</th>
									<th align="left">Crachá professor</th>
									<th align="left">Aluno</th>
									<th align="left">Crachá aluno</th>
									<th align="left">Pres_aluno</th>
									<th align="left">Pres_prof</th>
									<th align="left">Evento</th>
									<th align="left">Apresentação</th>
									<th align="left">Avaliador</th>
						</tr>';
							
			$tot = 0;			
			for ($r=0;$r < count($rlt);$r++){
				//transfere para variavel $line todo o result da query
					$line = $rlt[$r];
					//soma ao total
					$tot++;
					//
					$sx .= '<tr align="left">';
					$sx .= '<td width="20" class="lt2">'.($r+1).'.</td>';				
					//protocolo
					$sx .= '<td class="lt1">';
					$sx .= $line['proto'];
					$sx .= '</td>';
					//nome_al
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['al_nome'], $line['al_id']);
					$sx .= '</td>';
					//cracha
					$sx .= '<td class="lt1">';
					$sx .= $line['al_cracha'];
					$sx .= '</td>';
					//nome_prof
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['pf_nome'], $line['prof_id']);
					$sx .= '</td>';					
					//cracha_prof
					$sx .= '<td class="lt1">';
					$sx .= $line['pof_cracha'];
					$sx .= '</td>';				
					//presença_al					
					$st = $line['p05'];
					$sf = '';
					$sff = '';
					if ($st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_aluno']. $sff;
					$sx .= '</td>';
					//presença_prof					
					$st = $line['p07'];
					$sf = '';
					$sff = '';
					if ( $st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_prof']. $sff;
					$sx .= '</td>';	
					//evento
					$sx .= '<td class="lt1">';
					$sx .= $line['pp_tipo'];
					$sx .= '</td>';
					
					//tipo apresentacao
					$sx .= '<td class="lt1">';
					$sx .= $line['apresentacao'];
					$sx .= '</td>';	
					//avaliador
					$sx .= '<td class="lt0">';
					$sx .= link_perfil($line['aval_nome'], $line['aval_id']);
					$sx .= '</td>';		
					
				}
				
				$sx .= '</table>';
				$sx .= '<br>'.$tot.' casos registrados ';
			
			return($sx);
		
	}
	
	
	function presenca_geral(){
		
		$ano_semic = (date("Y")-1);
		
		$sql = "
						select distinct
						pp_protocolo as proto,
						aluno.us_cracha as al_cracha,
						aluno.id_us as al_id,
						aluno.us_nome as al_nome,
						prof.us_cracha as pof_cracha,
						prof.id_us as prof_id,  
						prof.us_nome  as pf_nome, 
						aval.us_cracha as aval_cracha,
						aval.id_us as aval_id,  
						aval.us_nome  as aval_nome,
						pp_p05 as p05, pp_p07 as p07,       
						pp_tipo,
						CASE
						         WHEN pp_p05 = 0 THEN 'estudante presente'
						         WHEN pp_p05 = 1 THEN 'estudante ausente, trabalho apresentado pelo professor'
						         WHEN pp_p05 = 2 THEN 'pôster afixado e estudante ausente'
						         WHEN pp_p05 = 3 THEN 'estudante ausente e pôster não afixado'
						       else pp_p05          
						       END as pres_aluno,
						       CASE
						         WHEN pp_p07 = 0 THEN 'professor orientador presente'
						         WHEN pp_p07 = 1 THEN 'professor ausente, enviou representante e justificativa por escrito'
						         WHEN pp_p07 = 2 THEN 'professor ausente, enviou representante sem justificativa por escrito'
						         WHEN pp_p07 = 3 THEN 'professor ausente e estudante justificou que o professor está atuando como avaliador'
						         WHEN pp_p07 = 4 THEN 'professor ausente sem justificativa'
						       else pp_p07          
						       END as pres_prof,
						pp_p19 as apresentacao
						from  pibic_parecer_". $ano_semic . "
						inner join semic_trabalho on sm_codigo = pp_protocolo 
						inner join us_usuario as aluno on sm_discente = aluno.us_cracha
						inner join us_usuario as prof on sm_docente = prof.us_cracha
						inner join us_usuario as aval on pp_avaliador_id = aval.id_us
						where pp_p19 not in('JI', 'JE')
						order by al_nome, proto 	
       ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$sx = '<table width="100%" class="tabela00">';
			$sx .= '<tr><td class="lt6" colspan=5> SEMIC '. (date("Y")-1) .'</tr>';
			$sx .= '<tr><th align="left">Id</th>
									<th align="left">Protocolo</th>
									<th align="left">Crachá aluno</th>
									<th align="left">Aluno</th>
									<th align="left">Crachá professor</th>
									<th align="left">Professor</th>
									<th align="left">Evento</th>
									<th align="left">Pres_aluno</th>
									<th align="left">Pres_prof</th>
									<th align="left">Apresentação</th>
									<th align="left">Avaliador</th>
						</tr>';
							
			$tot = 0;

			for ($r=0;$r < count($rlt);$r++){
					
					$line = $rlt[$r];
				
					$tot++;
					$sx .= '<tr align="left">';
					$sx .= '<td width="20" class="lt2">'.($r+1).'.</td>';				
					
					$sx .= '<td class="lt1">';
					$sx .= $line['proto'];
					$sx .= '</td>';
					
					$sx .= '<td class="lt1">'.$line['al_cracha'].'</td>';
					
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['al_nome'], $line['al_id']);
					$sx .= '</td>';	
					
					$sx .= '<td class="lt1">';
					$sx .= $line['pof_cracha'];
					$sx .= '</td>';				
					
					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['pf_nome'], $line['prof_id']);
					$sx .= '</td>';	
					
					$sx .= '<td class="lt1">';
					$sx .= $line['pp_tipo'];
					$sx .= '</td>';

					$st = $line['p05'];
					$sf = '';
					$sff = '';
					if ($st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_aluno']. $sff;
					$sx .= '</td>';
					
					$st = $line['p07'];
					$sf = '';
					$sff = '';
					if ( $st > '0' ) {
						$sf = '<font color="red">';
						$sff = '</font>';
					} else {
						$sf = '<font color="green">';
						$sff = '</font>';
					}
					$sx .= '<td class="lt1">';
					$sx .= $sf .$line['pres_prof']. $sff;
					$sx .= '</td>';
					 
					$sx .= '<td class="lt1">';
					$sx .= $line['apresentacao'];
					$sx .= '</td>';	

					$sx .= '<td class="lt1">';
					$sx .= link_perfil($line['aval_nome'], $line['aval_id']);
					$sx .= '</td>';				
				}
				$sx .= '</table>';
				$sx .= '<br>'.$tot.' casos registrados ';

			return($sx);
		
	}
	
	
	function resultado_semic($area, $edital='PIBIC', $mod= 'POSTER')
		{
			switch ($area)
				{
				case '1':
					$wh = " (st_area_geral like '1.%' or st_area_geral like '3.%') ";
					$narea = "Ciências Exatas e Engenharias";
					break;
				case '2':
					$wh = " (st_area_geral like '2.%' or st_area_geral like '4.%') ";
					$narea = "Ciências da Vida";
					break;	
				case '5':
					$wh = " (st_area_geral like '5.%') ";
					$narea = "Ciências Agrárias";
					break;													
				case '6':
					$wh = " (st_area_geral like '6.%') ";
					$narea = "Ciências Sociais Aplicadas";
					break;													
				case '7':
					$wh = " (st_area_geral like '7.%' or st_area_geral like '8.%') ";
					$narea = "Ciências Humanas, Lingística e Artes";
					break;	
				case '10':
					$wh = " (st_eng = 'S') ";
					$narea = "Internacional";
					break;	
				case '11':
					$wh = " (st_section = 'PE') ";
					$narea = "Pesquisar é evoluir";
					$edital = '';
					break;	
				case '12':
					$wh = " (st_section = 'JI') ";
					$narea = "Jovens Ideias";
					$edital = '';
					break;	
				case '13':
					$wh = " (st_section = 'PEjr') ";
					$narea = "Jovens Ideias (jr)";
					$edital = '';
					break;	
				}
			
			if (strlen($edital) > 0)
				{
					$wh .= " and st_edital = '$edital' ";
					if ($edital == 'PIBITI')
						{
							$wh = " st_edital = '$edital' "; 
						}
					if ($edital == 'PIBIC_EM')
						{
							$wh = " st_edital = '$edital' "; 
						}											
				}
			if (strlen($mod) > 0)
				{
					if ($mod == 'POSTER')
						{
						$wh .= " and st_poster = 'S' and pp_p19 = 'POSTE' ";
						}
					if ($mod == 'ORAL')
						{
						$wh .= " and st_oral = 'S' and pp_p19 <> 'POSTE' ";
						}
				}
			
			$sql = "select count(*) as av, pp_protocolo, avg(nota) as nota, st_section, st_nr, st_poster, st_oral,
						st_edital, st_status, st_eng,  
						avg(outras) as outras, avg(nf) as nf, avg(st_nota_media) as st_nota_media,
						avg(uaf_fc) as uaf_fc from
					(
					select pp_protocolo, pp_p08 as nota, st_section, st_nr, st_poster, st_oral,
						st_edital, st_status, st_eng,  
						(pp_p01 + pp_p02 + pp_p03 + pp_p04 + pp_p06) / 5 as outras,
						(pp_p08 + uaf_fc + st_nota_media) / 2 as nf , st_nota_media, uaf_fc
						from pibic_parecer_".date("Y")." 
						inner join semic_nota_trabalhos on st_codigo = pp_protocolo 
						inner join us_avaliador_fc on us_usuario_us_id = pp_avaliador_id
					where $wh
					) as tabela01
					group by pp_protocolo, st_section, st_nr, st_poster, st_oral,
						st_edital, st_status, st_eng
					order by nf desc, nota desc, outras desc
					limit 40
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="100%">';
			$sx .= '<tr><td class="lt6" colspan=10>'.$narea.' - '.$edital.' - '.$mod.'</td></tr>';
			$sx .= '<tr><th>Pos</th>
						<th>Protocolo</th>
						<th>Nota final</th>
						<th>Codigo</th>
						<th>Avaliação Pôster</th>
						<th>Média Sub+RP+RF</th>
						<th>desempate</th>
						<th>Pôster</th>
						<th>Oral</th>
						<th>CN</th>
						</tr>';
						
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<tr align="center">';
					
					$sx .= '<td width="20">'.($r+1).'.</td>';
					$sx .= '<td>';
					$sx .= $line['pp_protocolo'];
					$sx .= '</td>';
					
					$sx .= '<td>';
					$sx .= number_format($line['nf'],3);
					$sx .= '</td>';					
					 
					$sx .= '<td>';
					$sx .= $this->semic_salas->referencia($line);
					$sx .= '</td>'; 

					$nota = $line['nota'];
					if ($nota == 110)
						{
							$nota = '10 com mérito';
						} else {
							$nota = ($nota / 10);
						}
					$sx .= '<td>';
					$sx .= $nota;
					$sx .= '</td>';

					 					 
					$sx .= '<td>';
					$sx .= $line['st_nota_media']/10;
					$sx .= '</td>';
					
					$sx .= '<td>';
					$sx .= $line['outras']/10;
					$sx .= '</td>';
					 
					$sx .= '<td>';
					$sx .= $line['st_poster'];
					$sx .= '</td>';
					
					$sx .= '<td>';
					$sx .= $line['st_oral'];
					$sx .= '</td>';
					
					$sx .= '<td>';
					$sx .= number_format($line['uaf_fc']/10,4);
					$sx .= ' / '.$line['av'];
					$sx .= '</td>';
				}
				$sx .= '</table>';
				return($sx);
						
		}
	
	/* Calcular fator de correcao do avaliador */
	function avaliador_cn()
		{
			
			$sql = "SELECT avg(pp_p08) as media  
					FROM pibic_parecer_".date("Y")." WHERE pp_p08 > 60  ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$line = $rlt[0];
			$vfct = $line['media'];			
			$sx = '<h1>FC: '.$vfct.'</h1>';
			$sql = "SELECT pp_avaliador_id, count(*) as total, avg(pp_p08) as media, 
						max(pp_p08) as max, min(pp_p08) as min, sum(pp_p08) as soma
					FROM pibic_parecer_".date("Y")." WHERE pp_p08 > 60 
					group by pp_avaliador_id ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$tot = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$tot++;
					$line = $rlt[$r];
					$vm = $line['media'];
					$vtotal = $line['total'];
					$vmax = $line['max'];
					$vmin = $line['min'];
					$vsoma = $line['soma'];
					$id = $line['pp_avaliador_id'];
					$data = date("Y-m-d");
					$vfc = $vfct - $line['media'];	
					$sql = "select * from us_avaliador_fc 
								where us_usuario_us_id = ".$line['pp_avaliador_id'];
					$rrr = $this->db->query($sql);
					$rrr = $rrr->result_array();
					if (count($rrr) > 0)
						{
							$sql = "update us_avaliador_fc set
										uaf_media = $vm,
										uaf_max = $vmax,
										uaf_min = $vmin,
										uaf_total = $vtotal,
										uaf_fc = $vfc,
										uaf_update = '$data',
										uaf_somatoria = $vsoma
									where us_usuario_us_id = ".$id;
							$rq = $this->db->query($sql);
						} else {
							$sql = "insert into us_avaliador_fc
									(
									uaf_media, uaf_max, uaf_min,
									uaf_total, uaf_fc, uaf_update, 
									uaf_somatoria, us_usuario_us_id
									) values (
									$vm, $vmax, $vmin,
									$vtotal, $vfc, '$data',
									$vsoma, $id)
							";
							$rq = $this->db->query($sql);
						}
						$sx .= '. ';
				}
			$sx .= '<br>'.$tot.' avaliadores ';
			return($sx);
		}
	function set_avaliador($id, $nome) {
		$chk = md5($id . $nome . 'SeMiC' . date("Ymd"));
		$se = array('id' => $id, 'nome' => $nome, 'chk' => $chk);
		$this -> session -> set_userdata($se);
		return (1);
	}

	function avaliador_id($id) {
		$id = round($id) * 3;
		$dv = $id * 337;
		$dv = substr($dv, 0, 1);
		$id = $id . '-' . $dv;
		return ($id);
	}

	function imprime_etiquetas_avaliador($id) {
		$sql = "select * from us_usuario
					where id_us = " . round($id);

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data = $line;
			$data['line'] = $line;
			$data['ref'] = $this -> avaliador_id($id);

			$sx .= $this -> load -> view('semic/etiqueta_avaliador', $data, true);
		}
		return ($sx);
	}
	
	function posicao_avaliadores($data)
		{
			$sql = "select * from 
					(select st_bloco_poster from semic_nota_trabalhos 
					where st_bloco_poster > 0
					group by st_bloco_poster
					) as tabela 
					left join semic_bloco on st_bloco_poster = id_sb
					order by sb_data, sb_hora						
						
						";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<ul>';
			for ($r=0;$r < count($rlt); $r++)
				{
					$line = $rlt[$r];
					
					$link = '<a href="'.base_url('index.php/credenciamento/cockpit_poster/'.$line['st_bloco_poster']).'" class="link">';
					$sx .= '<li class="lt3">';
					$sx .= $link;
					$sx .= stodbr($line['sb_data']).' '.$line['sb_hora'];
					$sx .= ' ';
					$sx .= $line['sb_nome'];
					$sx .= '</a>';				
					$sx .= '</li>';
				}
			$sx .= '</ul>';
			return($sx);
						
		}
		
	function posicao_avaliacao_poster($bloco)
		{
			$sql = "select * from semic_nota_trabalhos
					left join pibic_parecer_2015 on st_codigo = pp_protocolo  and pp_p19 = 'POSTE'
					left join us_usuario on id_us = st_avaliador_1 and st_avaliador_1 <> 0
					where st_bloco_poster = $bloco
					order by us_nome, pp_status, st_section, lpad(st_nr,3,0)
			";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<table width="800">';
			for ($r=0;$r < count($rlt); $r++)
				{
					$line = $rlt[$r];
					$ref = $this->semic_salas->referencia($line);
					
					$st = trim($line['pp_status']);
					if (strlen($st)> 0)
						{
							$bg = ' bgcolor="#AAFFAA" ';
						} else {
							$bg = ' bgcolor="#FFAAAA" ';
						}
					$sx .= '<tr '.$bg.'><td>';
					$sx .= $line['st_codigo'];
					$sx .= '</td>';
					
					$sx .= '<td>'.$ref.'</td>';
					
					$sx .= '<td>'.$line['st_modalidade'].'</td>';
					$sx .= '<td>'.$line['pp_status'].'</td>';
					$sx .= '<td>'.$line['us_nome'].'</td>';
					//exit;
				}
			$sx .= '</table>';
			return($sx);
		}

	function cp_premiacao()
		{
			$cp = array();
			$area = '&Todas as áreas:Todas as áreas';
			$area .= '&Ciências Exatas e Engenharias:Ciências Exatas e Engenharias';
			$area .= '&Ciências da Vida:Ciências da Vida';
			$area .= '&Ciências Agrárias:Ciências Agrárias';
			$area .= '&Ciências Humanas, Linguística, Letras e Artes:Ciências Humanas, Linguística, Letras e Artes';
			$area .= '&Ciências Sociais Aplicadas:Ciências Sociais Aplicadas';
			$area .= '&Pesquisar é Evoluir:Pesquisar é Evoluir';
			$area .= '&Jovens Ideias:Jovens Ideias';
			
			$mod = 'PÔSTER:PÔSTER';
			$mod .= '&ORAL:ORAL';
			$mod .= '&APRESENTAÇÃO:APRESENTAÇÃO';
			
			$ed = 'PIBIC:PIBIC';
			$ed .= '&PIBITI:PIBITI';
			$ed .= '&PIBIC Internacional:PIBIC Internacional';
			$ed .= '&PIBIC_EM:PIBIC_EM';
			$ed .= '&Jovens Ideias:Jovens Ideias';
			$ed .= '&Pesquisar é Evoluir:Pesquisar é Evoluir';
			$ed .= '&Pesquisar é Evoluir Junior:Pesquisar é Evoluir Junior';
			$ed .= '&Concurso:Concurso';			
			
			array_push($cp,array('$H8','id_spt','',False,True));
			array_push($cp,array('$Q id_smp:smp_modalidade:select * from semic_premiacao order by smp_modalidade','spt_premiacao','Prêmio',True,True));
			array_push($cp,array('$O '.$area,'spt_area','Área',True,True));
			array_push($cp,array('$O '.$mod,'spt_modalidade','Modalidade',True,True));
			array_push($cp,array('$O '.$ed,'spt_edital','Edital',True,True));
			array_push($cp,array('$[1-99]','spt_ordem','Ordem',True,True));
			array_push($cp,array('$['.date("Y").'-'.date("Y").']','spt_ano','Ano',True,True));
			array_push($cp,array('$S8','spt_protocolo','Protocolo do trabalho',False,True));
			return($cp);			
		}

	function premiacao_row()
		{
			$ano = date("Y");
			$sql = "SELECT * FROM `semic_premiacao_trabalho` 
					left join semic_premiacao on spt_premiacao = id_smp
					left join semic_nota_trabalhos on spt_protocolo = st_codigo
					left join (select us_nome as us_professor, us_cracha as us_ch1, us_campus_vinculo as us_professor_campus from us_usuario ) as prof on us_ch1 = st_professor
					left join (select us_nome as us_aluno, us_cracha as us_ch2 from us_usuario ) as est on us_ch2 = st_aluno 
					WHERE spt_ano = '$ano' 
					order by spt_ordem ";
			$rlt = db_query($sql);
			$sx = '<table width="100%" class="lt2">';
			$xarea = '';
			while ($line = db_read($rlt))
				{
					$area = $line['spt_area'];
					if ($area != $xarea)
						{
							$sx .= '<tr><td colspan=10 class="lt6">';
							$sx .= $line['spt_modalidade'] .' - '.$line['spt_area'];
							$sx .= '</td></tr>';
							$xarea = $area;
						}
					$link = '<A href="'.base_url('index.php/semic/premiacao_ed/'.$line['id_spt'].'/'.checkpost_link($line['id_spt'])).'" class="link">';
					$sx .= '<tr>';
					
					$sx .= '<td class="borderb1" align="center" width="40">';
					$sx .= $line['spt_ordem'];
					$sx .= '</td>';
					
					$sx .= '<td class="borderb1" align="center" width="70">';
					$sx .= $line['spt_edital'];
					$sx .= '</td>';						
					
					$sx .= '<td class="borderb1" align="center" width="70">';
					$sx .= $line['spt_modalidade'];
					$sx .= '</td>';	
					
					$sx .= '<td class="borderb1" align="center" width="120">';
					$sx .= $this->semic_salas->referencia($line);
					$sx .= '</td>';

					$sx .= '<td class="borderb1" align="left" width="140">';
					$sx .= $line['smp_modalidade'];
					$sx .= '</td>';
					
					$sx .= '<td class="borderb1" align="left">';
					$sx .= $line['us_aluno'];
					$sx .= '</td>';					
					
					$sx .= '<td class="borderb1" align="left">';
					$sx .= $line['us_professor'];
					$sx .= '</td>';					

					$sx .= '<td class="borderb1" align="left">';
					$sx .= $line['us_professor_campus'];
					$sx .= '</td>';
					$sx .= '<td class="borderb1" align="center"  width="40">';
					$sx .= $link;
					$sx .= 'editar';
					$sx .= '</a>';
					$sx .= '</td>';					

					$sx .= '</tr>';
				}
			$sx .= '</table>';
			return($sx);
		}

	function premiacao_gerar()
		{
			$ano = date("Y");
			$sql = "SELECT * FROM `semic_premiacao_trabalho` 
					left join semic_premiacao on spt_premiacao = id_smp
					left join semic_nota_trabalhos on spt_protocolo = st_codigo
					left join (select us_nome as us_professor, us_cracha as us_ch1, us_campus_vinculo as us_professor_campus from us_usuario ) as prof on us_ch1 = st_professor
					left join (select us_nome as us_aluno, us_cracha as us_ch2 from us_usuario ) as est on us_ch2 = st_aluno 
					WHERE spt_ano = '$ano' 
					order by spt_modalidade, spt_area, spt_ordem desc";
			$rlt = db_query($sql);
			$sx = '<table width="100%" class="lt2">';
			$xarea = '';
			$xmod = '';
			while ($line = db_read($rlt))
				{
					$area = $line['spt_area'];
					$mod = $line['spt_edital'];
					if (($area != $xarea) or ($mod != $xmod))
						{
							$sx .= '<tr><td colspan=10 class="lt6">';
							$sx .= $line['spt_edital']  .' - '.$line['spt_area'] 
									. ' <br><font class="lt2">'. $line['spt_modalidade'].'</font>';
							$sx .= '</td></tr>';
							$xarea = $area;
							$xmod = $mod;
						}
					$img = base_url('/img/semic/'.date("Y").'/icone_'.$line['id_smp'].'.png');
					$sx .= '<tr>';
					
					$sx .= '<td><img src="'.$img.'" height="30">';
										
					$sx .= '<td  align="center" width="120">';
					$sx .= $this->semic_salas->referencia($line);
					$sx .= '</td>';

					$sx .= '<td align="left" width="140">';
					$sx .= $line['smp_modalidade'];
					$sx .= '</td>';
					
					$sx .= '<td align="left">';
					$sx .= $line['us_aluno'];
					$sx .= '</td>';					
					
					$sx .= '<td align="left">';
					$prof = trim($line['us_ch1']);
					if ((strlen($prof) > 0) and ($prof <> '00000000'))
						{
						$sx .= 'Prof.: '.$line['us_professor'];
						}
					$sx .= '</td>';					

					$sx .= '<td align="left">';
					$sx .= $line['us_professor_campus'];
					$sx .= '</td>';		

					$sx .= '</tr>';
				}
			$sx .= '</table>';
			
			$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
			$file = $path . '/semic/system/application/views/semic2015/anais/';
			$file .=  'premiacao.php';
			
			echo $file;
			
			$flt = fopen($file, 'w+');
			fwrite($flt, $sx);
			fclose($flt);			
			
			return($sx);
		}
	function premiacoes_lista($r)
		{
			$ano = date("Y");
			$sql = "SELECT * FROM semic_premiacao_trabalho 
					left join semic_premiacao on spt_premiacao = id_smp
					left join semic_nota_trabalhos on spt_protocolo = st_codigo
					left join (select us_nome as us_professor, us_cracha as us_ch1, us_campus_vinculo as us_professor_campus from us_usuario ) as prof on us_ch1 = st_professor
					left join (select us_nome as us_aluno, us_cracha as us_ch2 from us_usuario ) as est on us_ch2 = st_aluno 
					left join semic_trabalho on st_codigo = sm_codigo
					WHERE spt_ano = '$ano'
					order by spt_ordem
					 ";
					 echo $r;
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$rlt = $rlt[$r];
			return($rlt);			
		}
		
	function posicao_avaliadores_bloco($bloco)
		{
		$data = date("Y-m-d");
		$ano = date("Y");
		$ano2 = (date("Y")-1);
		
		$cp = "avaliador, id_us, us_nome, st_bloco_poster, pp_avaliador_id ";
		$sql = "select $cp, count(*) as total from ( 
							SELECT st_bloco_poster, st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0 and st_bloco_poster = $bloco
								union
							SELECT st_bloco_poster, st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0 and st_bloco_poster = $bloco				
																				
							) as total 
						inner join us_usuario on id_us = avaliador
						left join (
						SELECT pp_avaliador_id FROM `semic_nota_trabalhos` 
							left join pibic_parecer_2015 on st_codigo = pp_protocolo and pp_p19 = 'POSTE'
							WHERE st_bloco_poster = $bloco
							group by pp_avaliador_id
						) as tabela2 on pp_avaliador_id = id_us
						group by $cp
						order by us_nome				
				";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		$sx = '<table width="800">';
		$tot = 0;
		for ($r=0;$r < count($rlt); $r++)
			{
				$line = $rlt[$r];
				
				$sit = trim($line['pp_avaliador_id']);
				if (strlen($sit) == 0)
					{
						$bg = ' bgcolor="#ffa0a0" ';
						$tot++; 
					} else {
						$bg = ' bgcolor="#a0ffa0"' ;
					}
				
				$sx .= '<tr '.$bg.'>';
				$sx .= '<td >';
				$sx .= $line['us_nome'];
				$sx .= '</td>';
				$sit = trim($line['pp_avaliador_id']);
				$sx .= '<td>';
				$sx .= $sit;
				$sx .= '</td>';										
			}
		$sx .= '<tr><td colspan=3>Sem avaliação: '.$tot.'</td></tr>';
		$sx .= '</table>';
		return($sx);
		}
		

	function mostra_etiquetas_avaliadores_todas() {
		$ano2 = (date("Y") - 1);
		$ano = (date("Y"));
		$cp = "avaliador, id_us, us_nome ";
		$sql = "select $cp, count(*) as total from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0
								union
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
																				
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						group by $cp
						order by us_nome				
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$data = $line;
			$id = $line['id_us'];
			$data['line'] = $line;
			$data['ref'] = $this -> avaliador_id($id);

			$sx .= $this -> load -> view('semic/etiqueta_avaliador', $data, true);
		}
		return ($sx);
	}

	function mostra_etiquetas_avaliadores() {
		$ano2 = (date("Y") - 1);
		$ano = (date("Y"));
		$cp = "avaliador, id_us, us_nome ";
		$sql = "select $cp, count(*) as total from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0
								union
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
																				
							) as total 
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						group by $cp
						order by us_nome				
				";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xbloco = '';
		$sx = '<a href="#" onclick="newxy3(\'' . base_url('index.php/semic/etiquetas_av_all/') . '\',800,500);"  class="link">::todas etiquetas::</A><br><br>';
		$sx .= '<table>';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/semic/etiquetas_av/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '\',800,500);"  class="link">';
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link;
			$sx .= $line['us_nome'];
			$sx .= '</a>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function recupera_avaliacao($id, $av, $tipo, $modalidade) {
		$ano = date("Y");
		$sqlq = "select * from pibic_parecer_$ano where 
					pp_avaliador_id = '$av' and pp_protocolo = '$id' 
					and pp_tipo = '$tipo' 
					and pp_p19 = '$modalidade' ";
		$rlt = $this -> db -> query($sqlq);
		$rlt = $rlt -> result_array();
		$data = date("Y-m-d");

		if (count($rlt) == 0) {
			$sql = "insert into pibic_parecer_$ano
					(
					pp_tipo, pp_protocolo, pp_protocolo_mae, 
					pp_avaliador, pp_avaliador_id, pp_status,
					pp_pontos, pp_pontos_pp, pp_data, pp_p19 
					)
					values
					(
					'$tipo','$id','',
					'',$av,'@',
					0,0,'$data', '$modalidade'
					)					
					";
			$rlt = $this -> db -> query($sql);

			/* Recupera ID */
			$rlt = $this -> db -> query($sqlq);
			$rlt = $rlt -> result_array();

		}
		$line = $rlt[0];
		$id = $line['id_pp'];
		return ($id);
	}
	
	function lista_trabalhos_avaliador_poster($av,$bl)
		{
			
		$sql = "select * from semic_nota_trabalhos 
						left join semic_bloco on id_sb = st_bloco
						left join semic_trabalho on st_codigo = sm_codigo
						left join pibic_parecer_" . date("Y") . " on pp_protocolo = st_codigo and pp_avaliador_id = $av and (pp_p19 = 'POSTE' OR pp_p19 = 'JI' or pp_p10 = 'PE')
						where st_poster = 'S' and st_bloco_poster = $bl
						and st_status <> 'C'
						and (st_avaliador_1 = $av or st_avaliador_2 = $av)
					order by sb_data, sb_hora, st_section, lpad(st_nr,3,'0')	
					";
		$rlt = db_query($sql);
		$sx = '<table width="980" align="center" cellspacing="10">';
		$sx .= '<tr><td class="lt3" align="left">' . msg('Modaliade') . ': ' . msg('Pôster') . '</td></tr>';
		while ($line = db_read($rlt)) {
			$situacao = '0';
			$pre = '';
			$sta = trim($line['pp_status']);
			switch ($sta) {
				case '@' :
					$sit2 = '1';
					break;
				case 'A' :
					$sit2 = '2';
					$pre = 'RE';
					break;
				case 'B' :
					$sit2 = '3';
					$pre = 'RE';
					break;
				default :
					$sit2 = '0';
					break;
			}

			if ($line['sb_avaliador_1'] == $av) { $situacao = $line['sb_avaliador_situacao_1'];
			}
			if ($line['sb_avaliador_2'] == $av) { $situacao = $line['sb_avaliador_situacao_2'];
			}
			if ($line['sb_avaliador_3'] == $av) { $situacao = $line['sb_avaliador_situacao_3'];
			}
			$ref = $this -> semic_salas -> referencia($line);

			$sit = 'semic_status_' . $sit2;
			//echo $sit;
			$sx .= '<tr>';
			$sx .= '<td class="lt6 semic_lista_oral ' . $sit . '">';
			$ids = $line['id_st'];
			/* Botao avaliar */
			$sx .= '<a href="' . base_url('index.php/semic_avaliacao/poster') . '/' . $ids . '/' . checkpost_link($ids) . '">';
			$sx .= '<div class="div_semic_avaliar">' . $pre . 'AVALIAR</div>';
			$sx .= '</a>';

			/* Nota do trabalho */
			$nota = $line['pp_p08'];
			if (strlen($nota) > 0) {
				if ($nota == 110)
					{
						$img = '<img src="'.base_url('img/icon/icone_estrela.png').'" height="30" align="right">';
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . $img . '10,0</div>';
					} else {
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . number_format($nota/10,1,',','.'). '</div>';		
					}
				
			}

			/* Referencia do trabalho */
			$sx .= '<div style="float: left; min-width: 120px;">' . $ref . '</div>';

			/* Dados do Trabalho */
			$sx .= '<div style="float: left" class="lt1">';
			$sx .= $line['st_edital'];
			//$sx .= '<br>' . $line['st_titulo'];
			$sx .= '<br><font class="lt2"><b>' . $line['sm_titulo'].'</b>';
			$sx .= '</div>';
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
		}

	function lista_trabalhos_avaliador_oral($av, $bl) {

		$sql = "select * from semic_nota_trabalhos 
						left join semic_bloco on id_sb = st_bloco
						left join semic_trabalho on st_codigo = sm_codigo
						left join pibic_parecer_" . date("Y") . " on (pp_protocolo = st_codigo) and (pp_avaliador_id = $av) and (pp_p19 = 'ORAL'  OR pp_p19 = 'JI' or pp_p10 = 'PE')
						where st_oral = 'S' and st_bloco = $bl
						and st_status <> 'C'
						and (sb_avaliador_1 = $av or sb_avaliador_2 = $av or sb_avaliador_3 = $av)
					order by sb_data, sb_hora, st_section, lpad(st_nr,3,'0')	
					";
		$rlt = db_query($sql);
		$sx = '<table width="980" align="center" cellspacing="10">';
		$sx .= '<tr><td class="lt3" align="left">' . msg('Modaliade') . ': ' . msg('Oral') . '</td></tr>';
		while ($line = db_read($rlt)) {
			$situacao = '0';
			$pre = '';
			$sta = trim($line['pp_status']);
			switch ($sta) {
				case '@' :
					$sit2 = '1';
					break;
				case 'A' :
					$sit2 = '2';
					$pre = 'RE';
					break;
				case 'B' :
					$sit2 = '3';
					$pre = 'RE';
					break;
				default :
					$sit2 = '0';
					break;
			}

			if ($line['sb_avaliador_1'] == $av) { $situacao = $line['sb_avaliador_situacao_1'];
			}
			if ($line['sb_avaliador_2'] == $av) { $situacao = $line['sb_avaliador_situacao_2'];
			}
			if ($line['sb_avaliador_3'] == $av) { $situacao = $line['sb_avaliador_situacao_3'];
			}
			$ref = $this -> semic_salas -> referencia($line);

			$sit = 'semic_status_' . $sit2;
			//echo $sit;
			$sx .= '<tr>';
			$sx .= '<td class="lt6 semic_lista_oral ' . $sit . '">';
			$ids = $line['id_st'];
			/* Botao avaliar */
			$tp = substr($line['st_section'],0,2);
			if ($tp == 'JI' or $tp == 'PE')
				{
					$sx .= '<a href="' . base_url('index.php/semic_avaliacao/je') . '/' . $ids . '/' . checkpost_link($ids) . '">';					
				} else {
					$sx .= '<a href="' . base_url('index.php/semic_avaliacao/oral') . '/' . $ids . '/' . checkpost_link($ids) . '">';		
				}
			
			$sx .= '<div class="div_semic_avaliar">' . $pre . 'AVALIAR</div>';
			$sx .= '</a>';

			/* Nota do trabalho */
			$nota = $line['pp_p08'];
			if (strlen($nota) > 0) {
				if ($nota == 110)
					{
						$img = '<img src="'.base_url('img/icon/icone_estrela.png').'" height="30" align="right">';
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . $img . '10,0</div>';
					} else {
						$sx .= '<div class="div_semic_nota"><font class="lt0">NOTA</font><br>' . number_format($nota/10,1,',','.'). '</div>';		
					}
				
			}

			/* Referencia do trabalho */
			$sx .= '<div style="float: left; min-width: 120px;">' . $ref . '</div>';

			/* Dados do Trabalho */
			$sx .= '<div style="float: left" class="lt1">';
			$sx .= $line['st_edital'];
			//$sx .= '<br>' . $line['st_titulo'];
			$sx .= '<br><font class="lt2"><b>' . $line['sm_titulo'].'</b>';
			$sx .= '</div>';
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function avaliadores_row($ano) {
		$ano = date("Y");
		$ano2 = ($ano - 1);
		$cp = 'avaliador';
		$sql = "select * from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as tabela
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join ies_instituicao on ies_instituicao_ies_id = id_ies
						group by $cp
						order by us_nome	
				";
		$rlt = db_query($sql);
		$sx = '<table width="1024" class="tabela01" align="center" border=0>';
		$tot = 0;
		while ($line = db_read($rlt)) {
			$link = '<a href="' . base_url('index.php/semic_avaliacao/avaliador/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="link lt2">';
			$tot++;
			$sx .= '<tr>';
			$sx .= '<td height="25" class="borderb1">';
			$sx .= $link . $line['ust_titulacao_sigla'];
			$sx .= ' ';
			$sx .= $line['us_nome'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $link . $line['ies_sigla'] . '</a>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $link . $line['us_campus_vinculo'] . '</a>';
			$sx .= '</td>';
		}
		$sx .= '<tr><td colspan=4>Total ' . $tot . ' Avaliadores</td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function security() {
		$id = $this -> session -> userdata("id");
		$nome = $this -> session -> userdata("nome");
		$chk = $this -> session -> userdata("chk");

		$chk2 = md5($id . $nome . 'SeMiC' . date("Ymd"));
		if ($chk == $chk2) {
			$this -> set_avaliador($id, $nome);
		} else {
			redirect(base_url('index.php/semic_avaliacao'));
		}
	}

}
?>
