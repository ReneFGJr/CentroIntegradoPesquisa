<?php
class semic_anais extends CI_Model {
	var $dir = 'CIP/semic/system/application/views/semic2015/anais/';
	function gerar_paginas_trabalho() {

		$path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];

		$ano = (date("Y") - 1);
		$sql = "select * from semic_nota_trabalhos 
					left join area_conhecimento on ac_cnpq = st_area_geral
					left join ic on ic_projeto_professor_codigo = st_codigo
					left join semic_trabalho on sm_codigo = st_codigo
					where st_ano = '$ano' 
					and (st_poster = 'S' or st_oral = 'S' )
					limit 10
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			print_r($line);
			$tela = $this -> montar_pagina_trabalho($line);
			return ($tela);

			/* Salva arquivo */
			if (1 == 2) {
				$file = $path . $this -> dir . trim($line['st_codigo']) . '.php';
				$flt = fopen($file, 'w+');
				fwrite($flt, 'OLA');
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
			$img = 'img/semic/icone-oral-grad';
			$img_text = 'Oral';
		}
		if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) { $img = 'img/semic/icone-oral-grad.png';
		}
		
		$line['imagem'] = base_url($img);
		$line['imagem_texto'] = $img_text;

		$tela = $this -> load -> view('semic/semic_2015_template', $line);
		return ($tela);
	}

}
?>
