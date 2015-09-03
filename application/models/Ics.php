<?php
class ics extends CI_model
	{
	var $tabela_acompanhamento = 'switch';
	
	function le($id=0)
		{
			$sql = $this->table_view('ic.id_ic = '.$id,$offset=0, $limit = 9999999);
			$rlt = db_query($sql);
			
			if ($line = db_read($rlt))
				{
					print_r($line);
					return($line);
				}
		}
	
	function lista_ic_professor($id)
		{
			$wh = "id_professor = ".round($id);
			$sql = $this->table_view($wh); 
			$rlt = db_query($sql);
			
			$sx = '<table width="100%" border=0 class="tabela01">';
			while ($line = db_read($rlt))
				{
					$sx .= $this->show_med($line);					
				}
			$sx .= '</table>';
			return($sx);
		}
	function show_med($line)
		{
			$edital = trim($line['mb_tipo']);
			switch ($edital) {
				case 'ICI':
					$img = base_url('img/logo/logo_ic_internacional.png');		
					break;				
				default:
					$img = base_url('img/logo/logo_ic_semimagem.png');
					break;
			}
			/* Link do protocolo */
			$link = '<a href="'.base_url('index.php/ic/view/'.$line['id_ic'].'/'.checkpost_link($line['id_ic'])).'" class="link lt2">';
			
			/* Imagem bolsa */
			$img_bolsa = 'logo_bolsa_'.$line['id_mb'].'.jpg';
			$img_bolsa = '<img src="'.base_url('img/icon/'.$img_bolsa).'" height="15" style="border: 1px solid #ccc;">';
			
			$sx = '';
			$sx .= '<tr valign="top">';
			$sx .= '<td width="100" rowspan=5 style="border-top:1px solid #333;">';
			$sx .= '<img src="'.$img.'" height="50">';
			$sx .= '</td>';
			$sx .= '<td class="lt2" colspan=2  style="border-top:1px solid #333;">';
			$sx .= $link;
			$sx .= $line['pa_plano'];
			$sx .= '</a>';
			$sx .= '</td>';
			
			$sx .= '<td width="100" rowspan=5  style="border-top:1px solid #333;" align="center">';
			$sx .= $link.$line['codigo_pa'].'</A>';
			$sx .= '<BR><BR>'; 
			$sx .= '<font color="'.trim($line['s_cor']).'"><B>';
			$sx .= $line['s_situacao'];
			$sx .= '</b></font>';
			$sx .= '</td>';
			
			$sx .= '<tr>';
			$sx .= '<td class="lt0" width="70" align="right">'.msg('Orientador').':</td>';
			$sx .= '<td class="lt1"><B>'.$line['us_nome'].'</B>';
			$sx .= '</td>';

			$sx .= '<tr>';
			$sx .= '<td class="lt0" width="70" align="right">'.msg('Estudante').':</td>';
			$sx .= '<td class="lt1"><B>'.$line['al_nome'].'</B>';
			$sx .= '</td>';

			$sx .= '<tr>';
			$sx .= '<td class="lt0" width="70" align="right">'.msg('Vigencia').': ';
			$sx .= '</td>';
			$sx .= '<td class="lt1">';
			$sx .= '<B>';
			$sx .= stodbr($line['pa_dt_inicio_bolsa_aluno']);
			$sx .= ' até ';
			$sx .= stodbr($line['pa_dt_termino_bolsa_aluno']);
			$sx .= '</B>';
			$sx .= '</td>';
			
			$sx .= '<tr>';
			$sx .= '<td class="lt0" width="70" align="right">';
			$sx .= msg('Modalidade').': ';
			$sx .= '</td>';
			$sx .= '<td class="lt1" valign="top">';
			$sx .= $img_bolsa;
			$sx .= '&nbsp;';
			$sx .= $line['mb_descricao'];
			$sx .= '</td>';
						
			$sx .= '</tr>';
			return($sx);
		}
	function table_view($wh='',$offset=0, $limit = 9999999)
		{
			if (strlen($wh) > 0)
				{
					$wh = ' ('.$wh.') and ';
				}
			$tabela = "
				SELECT *
					FROM
				    ic_professor_aluno AS pa,
				    (select id_us as id_al, us_nome as al_nome, us_cracha as al_cracha from us_usuario) AS us_alu,
				    us_usuario AS us_prof,
				    ic_situacao AS sit,
				    ic_modalidade_bolsa AS mode,
				    ic AS ic,
				    ic_plano_aluno as pl_alu
				WHERE
					$wh 
					pa.id_professor = us_prof.id_us
					AND pa.id_aluno_ic = us_alu.id_al
					AND pa.mb_id = mode.id_mb
					AND pa.s_id = sit.id_s
					AND pa.id_ic = ic.id_ic
					AND ic.pa_codigo = pl_alu.codigo_pa			
				limit $limit offset $offset
				";		
			return($tabela);
		}
	
	function cp_switch()
		{
			$cp = array();
			array_push($cp,array('$H8','id_sw','',False,True));
			array_push($cp,array('$SW','sw_01',msg('sw_ic_submissao'),False,True));
			array_push($cp,array('$SW','sw_02',msg('sw_ic_rel_pacial'),False,True));
			array_push($cp,array('$SW','sw_03',msg('sw_ic_rel_final'),False,True));
			array_push($cp,array('$B','',msg('update'),False,True));
			return($cp);
		}	
		
	/** Proetos por escolas */
	function mostra_projetos_por_escolas()
		{
		$dados = array();
		$dados['Escola de Arquitetura e Design'] = 51;
		$dados['Escola de Ciências Agrárias e Medicina Veterinária'] = 162;
		$dados['Escola de Comunicação e Artes'] = 34;
		$dados['Escola de Direito'] = 143;
		$dados['Escola de Educação e Humanidades'] = 262;
		$dados['Escola de Medicina'] = 144;
		$dados['Escola de Negócios'] = 82;
		$dados['Escola de Saúde e Biociências'] = 295;
		$dados['Escola Politécnica'] = 257;
		return($dados);
		}
	function mostra_projetos_por_escolas_professor() {
		$dados = array();
		$dados['Ciência da computação'] = 18;
		$dados['Engenharia ambiental'] = 33;
		$dados['Engenharia civil'] = 36;
		$dados['Engenharia de alimentos'] = 8;
		$dados['Engenharia de computação'] = 14;
		$dados['Engenharia de controle e automação'] = 38;
		$dados['Engenharia de produção'] = 25;
		$dados['Engenharia mecânica'] = 29;
		$dados['Engenharia elétrica'] = 16;
		$dados['Engenharia química'] = 9;
		$dados['Sistemas de informação'] = 16;
		return($dados);
		$sql = "select centro_nome, pp_curso, count(*) as total,  pb_ano, pp_escola from pibic_bolsa_contempladas 
					left join pibic_bolsa_tipo on pb_tipo  = pbt_codigo
					left join pibic_professor on pb_professor = pp_cracha
					left join centro on pp_escola = centro_codigo
					left join curso on pp_curso = curso_codigo
					where (pbt_edital = 'PIBIC' or pbt_edital = 'PIBITI' or pbt_edital = 'IS') and pb_ano = '2014'
					and pp_escola = '00009'
					group by pp_curso, centro_nome, pp_escola, pb_ano
					order by centro_nome, pp_curso
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$line = $rlt[0];

		//return values
		$tot = 0;
		$dados = array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$dados[$line['pp_curso']] = $line['total'];
		}

		return ($dados);
	}
	}
?>
