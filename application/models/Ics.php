<?php
class ics extends CI_model
	{
	var $tabela_acompanhamento = 'switch';
	
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
		$dados['Escola de Ci�ncias Agr�rias e Medicina Veterin�ria'] = 162;
		$dados['Escola de Comunica��o e Artes'] = 34;
		$dados['Escola de Direito'] = 143;
		$dados['Escola de Educa��o e Humanidades'] = 262;
		$dados['Escola de Medicina'] = 144;
		$dados['Escola de Neg�cios'] = 82;
		$dados['Escola de Sa�de e Bioci�ncias'] = 295;
		$dados['Escola Polit�cnica'] = 257;
		return($dados);
		}
	function mostra_projetos_por_escolas_professor() {
		$dados = array();
		$dados['Ci�ncia da computa��o'] = 18;
		$dados['Engenharia ambiental'] = 33;
		$dados['Engenharia civil'] = 36;
		$dados['Engenharia de alimentos'] = 8;
		$dados['Engenharia de computa��o'] = 14;
		$dados['Engenharia de controle e automa��o'] = 38;
		$dados['Engenharia de produ��o'] = 25;
		$dados['Engenharia mec�nica'] = 29;
		$dados['Engenharia el�trica'] = 16;
		$dados['Engenharia qu�mica'] = 9;
		$dados['Sistemas de informa��o'] = 16;
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
