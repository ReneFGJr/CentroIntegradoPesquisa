<?php
class Fcas extends CI_model {

	//calcula mgn (média das notas geral)
	function calc_media_notas($tipo = '') {
		$sql = "select (AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8)) as media
						from pibic_parecer_2016 
						where pp_tipo = '$tipo' 
						AND pp_status = 'B'
						and pp_p01 <> ''
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$media = round(1000 * $rlt[0]['media']) / 1000;

		return ($media);
	}

	//calcula fca dos avaliadores
	function calc_media_notas_avaliador($tipo = '') {
		//atualiza
		$sql_up = "update us_usuario set us_fc = '0' where us_fc <> 0";
		$this -> db -> query($sql_up);

		//recupera media geral do metodo calc_media_notas_avaliador()
		$mgn = $this -> calc_media_notas($tipo);

		$sql = "select pp_avaliador_id, us_nome, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8))/1000 as media, count(*) as qtd, 
									CASE
										WHEN ies_instituicao_ies_id = '1' THEN 'Interno'
										WHEN ies_instituicao_ies_id != '1' THEN 'Externo'        
									END  as instituicao,
									us_fc
						from pibic_parecer_2016 
						inner join us_usuario on id_us = pp_avaliador_id
						where pp_tipo = '$tipo'  
						AND pp_status = 'B'
						and pp_p01 <> ''
						and pp_p11 >= 10 
						and pp_p01 >= 10 
						group by pp_avaliador_id
						order by us_nome, media
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo de fca</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">id avaliador</th>
							<th align="center">Nome avaliador</th>
							<th align="center">Instituição</th>
							<th align="rigth">Média avaliador</th>
							<th align="rigth">Média geral</th>.
							<th align="center">fca</th>
							<th align="center">Avaliações</th>
						</tr>';

		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$av_id = $line['pp_avaliador_id'];
			$av_nome = $line['us_nome'];
			$mgp = $line['media'];
			$instituicao = $line['instituicao'];
			$fc_us = $line['us_fc'];

			//calcula fca
			$fca = 0;
			$fca = round(1000 * ($mgn - $mgp)) / 1000;

			//diferencia fca < 0
			$sf = '';
			$sff = '';
			if ($fca < '0') {
				$sf = '<font color="red"><i>';
				$sff = '</i></font>';
			} else {
				$sf = '<font color="blue"><b>';
				$sff = '</b></font>';
			}

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $av_id;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $av_nome;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $instituicao;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgp, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgn, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $sf . number_format($fca, 3, '.', ',') . $sff;
			$sx .= '</td>';

			/**
			$sx .= '<td align="center">';
			$sx .= $fc_us;
			$sx .= '</td>';
			*/	
			$sx .= '<td align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';

			//atualiza fca na tabela us_usuario [us_fca]
			$sql_up2 = "update us_usuario set us_fc = $fca where id_us = $av_id";
			$this -> db -> query($sql_up2);

		}
		$sx .= '</table>';
		return ($sx);
	}


	function calc_media_notas_protocolo($tipo = '', $ano = ''){
		if($ano == ''){
			$ano = date('Y');
		}
		$sql = "select pp_protocolo_mae, pp_protocolo, count(*) as avaliacoes,
						                round(1000* avg(pp_p01))/1000 as pp1,
						                round(1000* avg(pp_p02))/1000 as pp2,
						                round(1000* avg(pp_p03))/1000 as pp3,
						                round(1000* avg(pp_p04))/1000 as pp4,
						                round(1000* avg(pp_p05))/1000 as pp5,              
						                round(1000* avg(pp_p11))/1000 as pp11,
						                round(1000* avg(pp_p12))/1000 as pp12,
						                round(1000* avg(pp_p13))/1000 as pp13,
						                round(1000* avg(pp_p14))/1000 as pp14,
						                round(1000* avg(pp_p15))/1000 as pp15              
						        from pibic_parecer_".$ano."
						        where pp_tipo = '$tipo' 
						        and pp_status = 'B'
						        and pp_p01 <> ''
						        group by pp_protocolo, pp_protocolo_mae
						        order by pp_protocolo, pp_protocolo_mae
						       						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo das notas individuais por protocolo</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">Protocolo</th>
							<th align="center">Protocolo mãe</th>
							<th align="rigth">Média p1</th>
							<th align="rigth">Média p2</th>
							<th align="rigth">Média p3</th>
							<th align="rigth">Média p4</th>														
							<th align="rigth">Média p5</th>
							<th align="rigth">Média p11</th>
							<th align="rigth">Média p12</th>
							<th align="rigth">Média p13</th>
							<th align="rigth">Média p14</th>														
							<th align="rigth">Média p15</th>	
							<th align="rigth">total avaliações</th>					
						</tr>';

		$tot = 0;				
		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			
			$tot++;
			//variaveis
			$proto   = $line['pp_protocolo'];
			$proto_mae = $line['pp_protocolo_mae'];
			$total_av = $line['avaliacoes'];

			$nt_p01 = $line['pp1'];
			$nt_p02 = $line['pp2'];
			$nt_p03 = $line['pp3'];
			$nt_p04 = $line['pp4'];
			$nt_p05 = $line['pp5'];
			$nt_p11 = $line['pp11'];
			$nt_p12 = $line['pp12'];
			$nt_p13 = $line['pp13'];
			$nt_p14 = $line['pp14'];
			$nt_p15 = $line['pp15'];

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';
			
			$sx .= '<td align="left">';
			$sx .= $proto;
			$sx .= '</td>';
			
			$sx .= '<td align="left">';
			$sx .= $proto_mae;
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p01, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p02, 3, '.', ',');
			$sx .= '</td>';			

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p03, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p04, 3, '.', ',');
			$sx .= '</td>';		
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p05, 3, '.', ',');
			$sx .= '</td>';	
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p11, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p12, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p13, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p14, 3, '.', ',');
			$sx .= '</td>';
			
			$sx .= '<td align="center">';
			$sx .= number_format($nt_p15, 3, '.', ',');
			$sx .= '</td>';	
			
			$sx .= '<td align="center">';
			$sx .= $total_av;
			$sx .= '</td>';		
			
			//passa o array() $line para o metodo insert
			$this -> inserir_notas_protocolo($line);	

		}
		$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';
		
		$sx .= '</table>';
		return ($sx);
		
	}

	function inserir_notas_protocolo($line){
			//variaveis
			$proto   = $line['pp_protocolo'];
			$proto_mae = $line['pp_protocolo_mae'];
			$total_av = $line['avaliacoes'];

			$nt_p01 = $line['pp1'];
			$nt_p02 = $line['pp2'];
			$nt_p03 = $line['pp3'];
			$nt_p04 = $line['pp4'];
			$nt_p05 = $line['pp5'];
			$nt_p11 = $line['pp11'];
			$nt_p12 = $line['pp12'];
			$nt_p13 = $line['pp13'];
			$nt_p14 = $line['pp14'];
			$nt_p15 = $line['pp15'];
		
		//grava notas na tabela ic_edital
			$sql_inst2 = "insert into ic_edital 
										(
										 ed_protocolo,
										 ed_protocolo_mae,
										 ed_c1, ed_c2, 
										 ed_c3, ed_c4,
										 ed_c5, ed_c6,
										 ed_c7, ed_c8,
										 ed_c9, ed_c10 
										) values (
										'$proto', '$proto_mae',
										'$nt_p01', '$nt_p02', '$nt_p03',
										'$nt_p04', '$nt_p05', '$nt_p11',
										'$nt_p12', '$nt_p13', '$nt_p14',
										'$nt_p15')
									";
			$this -> db -> query($sql_inst2);
		
		return ('');
		
	}

	function atualizar_notas_protocolo($tipo = '', $ano = ''){
		if($ano == ''){
			$ano = date('Y');
		}
		$sql = "select pp_protocolo, round(1000 * avg(media_notas + us_fc))/1000 as nota 
						from (select  pp_protocolo, pp_protocolo_mae, media_notas, us_fc, pp_avaliador_id 
						      from (select pp_protocolo_mae, pp_protocolo, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p05+pp_p11+pp_p12+pp_p13+pp_p14+pp_p15)/10))/1000 as media_notas, us_fc, pp_avaliador_id
								        from pibic_parecer_".$ano."
								        inner join us_usuario on id_us = pp_avaliador_id
								        where pp_tipo = '$tipo'  
								        AND pp_status = 'B'
								        and pp_p01 <> ''
								        group by pp_protocolo, pp_avaliador_id
						           ) as media
						       ) as resultado
						group by pp_protocolo        
						order by pp_protocolo
		";
		
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		
		//cabecalho
		$sx = '<table class="tabela00 lt1" width="30%">';
		$sx .= '<tr class="lt3"><b>Notas individuais atualizadas por protocolo</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="right">Protocolo</th>
							<th align="right">Nota atualizada</th>
						</tr>';
		
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			
			$proto = $line['pp_protocolo'];
			$nota  = $line['nota'];
			
			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';
			
			$sx .= '<td align="right">';
			$sx .= $proto;
			$sx .= '</td>';
			
			$sx .= '<td align="right">';
			$sx .= number_format($nota, 3, '.', ',');
			$sx .= '</td>';
			
			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_nota = '$nota' where ed_protocolo = '$proto'; ".cr();
			$this -> db -> query($sql_update);			
			}
			
			$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';
			$sx .= '</table>';
		
		return ($sx);
	}



}
?>