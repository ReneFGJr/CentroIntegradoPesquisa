<?php
class semic_anais extends CI_Model {
	var $dir = '_TEMP_DIR__';
	var $save = 1;

	function __construct() {
		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
		$this -> dir = $path . '/semic/system/application/views/semic2015/anais/';
	}

	function resumo_title($cod,$mapa=0) {
		/* Recupera ID */
		$sql = "select * from semic_nota_trabalhos
					left join area_conhecimento on ac_cnpq = st_area_geral
					left join ic on ic_plano_aluno_codigo = st_codigo
					left join ic_aluno on ic_id = id_ic
					left join ic_modalidade_bolsa on mb_id = id_mb
					left join semic_trabalho on sm_codigo = st_codigo	
					where st_codigo = '" . $cod . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];

		$line['imagem'] = '';
		$line['autores'] = '';
		$line['imagem_texto'] = '';

		/* Recupera autores */
		$sql = "select * from semic_trabalho_autor 
						where sma_protocolo = '$cod'
						and sma_ativo >= 1
						order by sma_funcao 
						";
		$rlta = $this -> db -> query($sql);
		$rlta = $rlta -> result_array();
		$line2['autores'] = $rlta;

		$line = array_merge($line, $line2);
		$line['mapa'] = $mapa;

		$tela = $this -> load -> view('semic/semic_2015_title', $line, True);
		return ($tela);
	}

	function resumo_body($cod) {
		/* Recupera ID */
		$sql = "select * from semic_nota_trabalhos
					left join area_conhecimento on ac_cnpq = st_area_geral
					left join ic on ic_plano_aluno_codigo = st_codigo
					left join ic_aluno on ic_id = id_ic
					left join ic_modalidade_bolsa on mb_id = id_mb
					left join semic_trabalho on sm_codigo = st_codigo	
					where st_codigo = '" . $cod . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];

		$tp = (substr($line['st_section'], 0, 2));
		switch ($tp) {
			case 'JI' :
				$tela = $this -> load -> view('semic/semic_2015_ji_template_av', $line, True);
				break;
			case 'PE' :
				$tela = $this -> load -> view('semic/semic_2015_pe_template_av', $line, True);
				break;
			default :
				$tela = $this -> load -> view('semic/semic_2015_template_av', $line, True);
				break;
		}
		return ($tela);

	}

	function gerar_sumario_trabalhos($ano) {
		$sql = "select * from (
    				select count(*) as total, st_area_geral as area from semic_nota_trabalhos 
					where st_ano = '$ano' 
					and (st_poster = 'S' or st_oral = 'S' )
					group by st_area_geral ) as grupo
        			left join area_conhecimento on area = ac_cnpq
        			order by ac_nome_area        
					";
		$rlt = db_query($sql);
		$idc = 1;
		$sc = '<h1>' . msg('summary') . '</h1>';
		$sc .= '<div style="text-align: justify" id="summary">';
		$sc .= '<h3>Procure os trabalhos pela área:</h3>';
		while ($line = db_read($rlt)) {
			$total = $line['total'];
			$area = $line['ac_nome_area'];
			$area_id = $line['ac_cnpq'];
			$sz = round(log($total * 10) * 4);
			$sz = '25';
			//echo '<BR>'.$area.' = '.$total. ' = '.$sz;

			$link = base_url('index.php/semic/summary#' . $area_id . '/' . UpperCaseSql($area));
			$link = '#' . $area_id;
			$sc .= '<A href="' . $link . '" class="link cloud_' . $idc . ' cloud">';
			$sc .= '<font style="font-size: ' . $sz . 'px">' . $area . '</font></a>&nbsp; ' . cr();
			$idc++;
			if ($idc > 3) { $idc = 1;
			}
		}
		$sc .= '</div>';
		/* Salva arquivo */
		echo '<h3>Iniciando salvamento dos arquivos .'.$this->save.'</h3>';
		if ($this -> save == 1) {
			$file = $this -> dir . 'sumario_cloud' . '.php';
			$flt = fopen($file, 'w+');
			fwrite($flt, $sc);
			fclose($flt);
		}
	}

	function gerar_sumario_areas($ano) {
		$this -> load -> model('semic/semic_salas');

		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];

		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos 
					where st_ano = '$ano' 
					and (st_poster = 'S' or st_oral = 'S' ) and (st_status = 'A' or st_status = 'F')
					order by st_area_geral, lpad(st_nr,4,'0')
					";
		$rlt = $this -> db -> query($sql);
		$rltx = $rlt -> result_array();
		$pgs = array();

		$xarea = '';
		$sx = '<br><br><br><h1><?php echo msg(\'semic_apres_area\'); ?></h1>';
		$sx .= '<table width="100%" border=0 cellpading=0 cellspacing=0>';
		for ($rq = 0; $rq < count($rltx); $rq++) {
			$line = $rltx[$rq];
			$id_st = $line['id_st'];
			$proto = $line['st_codigo'];

			$fld_id = 'st_bloco_poster';

			/* Recupera ID */
			$sql = "select * from semic_nota_trabalhos
					left join area_conhecimento on ac_cnpq = st_area_geral
					left join ic on ic_plano_aluno_codigo = st_codigo
					left join ic_aluno on ic_id = id_ic
					left join ic_modalidade_bolsa on mb_id = id_mb
					left join semic_trabalho on sm_codigo = st_codigo
					left join
							(
							select id_sb as id_poster, sb_nome as poster, sb_data as poster_data, sb_hora as poster_hora, sb_hora_fim as poster_hora_fim,
								sl_nome as poster_sala_nome, sl_bloco as poster_bloco_nome 
							from semic_bloco
							left join semic_salas on id_sl = sb_sala
							) as sala_poster on id_poster = st_bloco_poster
					left join
							(
							select id_sb as id_oral, sb_nome as oral, sb_data as oral_data, sb_hora as oral_hora, sb_hora_fim as oral_hora_fim,
									sl_nome as oral_sala_nome, sl_bloco as oral_bloco_nome 
							from semic_bloco
							left join semic_salas on id_sl = sb_sala
							) as sala_oral on id_oral = st_bloco					
					where id_st = " . $id_st;

			$rltd = $this -> db -> query($sql);
			$rltd = $rltd -> result_array();
			$line2 = $rltd[0];

			$area = $line2['ac_nome_area'];
			if ($xarea != $area) {

				$sx .= '<tr ><td><br></td></tr>';
				$sx .= '<tr><td calign="left" class="lt5 trabalho_background_tr" 
									style="
									border-top: 1px solid #333;
									border-bottom: 1px solid #333;									
									" 
									colspan=3><a name="' . $line2['ac_cnpq'] . '"></a>' . $area . '</td></tr>';
				$xarea = $area;

			}

			/* Recupera autores */
			$sql = "select * from semic_trabalho_autor 
						where sma_protocolo = '$proto'
						and sma_ativo >= 1 
						order by sma_funcao 
						";

			$rlta = $this -> db -> query($sql);
			$rlta = $rlta -> result_array();
			$line2['autores'] = $rlta;
			$line = array_merge($line, $line2);
			$line['ref'] = $this -> semic_salas -> referencia($line);
			$tela = $this -> montar_pagina_trabalho_lista($line);
			$sx .= $tela;

		}
		$sx .= '</table>';
		/* Salva arquivo */
		if ($this -> save == 1) {
			$file = $this -> dir . 'sumario_geral' . '.php';
			$flt = fopen($file, 'w+');
			fwrite($flt, $sx);
			fclose($flt);
		}
	}

	function gerar_paginas_trabalho() {

		$this -> load -> model('semic/semic_salas');

		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];

		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos 
					where st_ano = '$ano' 
					and (st_poster = 'S' or st_oral = 'S' )
					";
		$rlt = $this -> db -> query($sql);
		$rltx = $rlt -> result_array();

		for ($rq = 0; $rq < count($rltx); $rq++) {
			$line = $rltx[$rq];
			$id_st = $line['id_st'];
			$proto = $line['st_codigo'];

			/* Recupera ID */
			$sql = "select * from semic_nota_trabalhos
					left join area_conhecimento on ac_cnpq = st_area_geral
					left join ic on ic_plano_aluno_codigo = st_codigo
					left join ic_aluno on ic_id = id_ic
					left join ic_modalidade_bolsa on mb_id = id_mb
					left join semic_trabalho on sm_codigo = st_codigo
					where id_st = " . $id_st;

			$rltd = $this -> db -> query($sql);
			$rltd = $rltd -> result_array();
			$line2 = $rltd[0];

			/* Recupera autores */
			$sql = "select * from semic_trabalho_autor 
						where sma_protocolo = '$proto'
						and sma_ativo >= 1
						order by sma_funcao 
						";
			$rlta = $this -> db -> query($sql);
			$rlta = $rlta -> result_array();
			$line2['autores'] = $rlta;

			$line = array_merge($line, $line2);
			$line['ref'] = $this -> semic_salas -> referencia($line);
			$tela = $this -> montar_pagina_trabalho($line);
			//return ($tela);
			//echo $tela;

			/* Salva arquivo */
			if ($this -> save == 1) {
				$file = $this -> dir . trim($line['st_codigo']) . '.php';
				echo '<br>saved: '.$file;
				$flt = fopen($file, 'w+');
				fwrite($flt, $tela);
				fclose($flt);
			}
		}
	}

	function montar_pagina_trabalho($line) {
		/* Icone de apresentacao */

		$img = 'img/semic/icone-poster-grad.png';
		$img_text = 'Não indicado';

		if ($line['st_poster'] == 'S') {
			$img = 'img/semic/icone-poster-grad.png';
			$img_text = 'Pôster';
		}

		if ($line['st_oral'] == 'S') {
			$img = 'img/semic/icone-oral-grad.png';
			$img_text = 'Oral';
		}
		if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) {
			$img = 'img/semic/icone-oral-post-grad.png';
			$img_text = 'Oral/Pôster';
		}

		$line['imagem'] = $img;
		$line['imagem_texto'] = $img_text;

		$tp = (substr($line['st_section'], 0, 2));
		switch ($tp) {
			case 'JI' :
				$tela = $this -> load -> view('semic/semic_2015_ji_template', $line, True);
				break;
			case 'PE' :
				$tela = $this -> load -> view('semic/semic_2015_pe_template', $line, True);
				break;
			default :
				$tela = $this -> load -> view('semic/semic_2015_template', $line, True);
				break;
		}

		return ($tela);
	}

	function montar_pagina_trabalho_lista($line) {
		/* Icone de apresentacao */

		$img = 'img/semic/icone-poster-grad.png';
		$img_text = 'Não indicado';

		if ($line['st_poster'] == 'S') {
			$img = 'img/semic/icone-poster-grad.png';
			$img_text = 'Pôster';
		}

		if ($line['st_oral'] == 'S') {
			$img = 'img/semic/icone-oral-grad.png';
			$img_text = 'Oral';
		}
		if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) {
			$img = 'img/semic/icone-oral-post-grad.png';
			$img_text = 'Oral/Pôster';
		}

		$line['imagem'] = $img;
		$line['imagem_texto'] = $img_text;
		$line['poster'] = $line['st_poster'];
		$line['oral'] = $line['st_oral'];

		$tela = $this -> load -> view('semic/semic_2015_lista_template', $line, True);
		return ($tela);
	}

}
?>
