<?php
class semic_anais extends CI_Model {
	var $dir = 'CIP/semic/system/application/views/semic2015/anais/';
	var $save = 1;
	function gerar_sumario_trabalhos($ano) {
		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];

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
		$sc = '<h1>'.msg('summary').'</h1>';
		$sc .= '<div style="text-align: justify">';
		while ($line = db_read($rlt)) {
			$total = $line['total'];
			$area = $line['ac_nome_area'];
			$area_id = $line['ac_cnpq'];
			$sz = round(log($total * 10) * 4);
			$sz = '25';
			//echo '<BR>'.$area.' = '.$total. ' = '.$sz;

			$link = base_url('index.php/semic2015/anais/' . $area_id . '/' . UpperCaseSql($area));
			$sc .= '<A href="' . $link . '" class="link cloud_' . $idc . ' cloud">';
			$sc .= '<font style="font-size: ' . $sz . 'px">' . $area . '</font></a>&nbsp; '.cr();
			$idc++;
			if ($idc > 3) { $idc = 1;
			}
		}
		$sc .= '</div>';
		/* Salva arquivo */
		if ($this -> save == 1) {
			$file = $path . $this -> dir . 'sumario_cloud' . '.php';
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
					and (st_poster = 'S' or st_oral = 'S' )
					order by st_area_geral
					limit 10;
					";
		$rlt = $this -> db -> query($sql);
		$rltx = $rlt -> result_array();
		
		$pgs = array();

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
						and sma_ativo = 1
						order by sma_funcao 
						";
			$rlta = $this -> db -> query($sql);
			$rlta = $rlta -> result_array();
			$line2['autores'] = $rlta;

			$line = array_merge($line, $line2);
			$line['ref'] = $this -> semic_salas -> referencia($line);
			$tela = $this -> montar_pagina_trabalho_lista($line);
			//return ($tela);
			//echo $tela;

			/* Salva arquivo */
			if ($this -> save == 2) {
				$file = $path . $this -> dir . trim($line['st_codigo']) . '.php';
				$flt = fopen($file, 'w+');
				fwrite($flt, $tela);
				fclose($flt);
			}
		}
	}


	function gerar_paginas_trabalho() {

		$this -> load -> model('semic/semic_salas');

		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];

		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos 
					where st_ano = '$ano' 
					and (st_poster = 'S' or st_oral = 'S' )
					limit 2000
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
						and sma_ativo = 1
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
				$file = $path . $this -> dir . trim($line['st_codigo']) . '.php';
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

		$line['imagem'] = base_url($img);
		$line['imagem_texto'] = $img_text;

		$tela = $this -> load -> view('semic/semic_2015_template', $line, True);
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

		$line['imagem'] = base_url($img);
		$line['imagem_texto'] = $img_text;

		$tela = $this -> load -> view('semic/semic_2015_lista_template', $line, True);
		return ($tela);
	}
}
?>
