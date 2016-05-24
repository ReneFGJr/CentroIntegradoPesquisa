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

}
?>