<?php
class mensagens extends CI_model {
	var $tabela = 'mensagem';

	function busca($ref, $data) {

		$sql = "select * from " . $this -> tabela . " where nw_ref = '$ref' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = array();
		$sx['nw_texto'] = '';
		if (count($rlt) > 0) {
			$sx = $rlt[0];
		} else {
			echo 'Mensagem: "' . $ref . '" não foi localizada!';
			return ('');
		}
		$txt = $sx['nw_texto'];
		if ($sx['nw_formato'] != 'HTML') {
			$txt = mst($txt);
		}
		/* Substituicoes */
		
		/* NOME PROFESSOR ALUNO */
		if (isset($data['nome'])) { $txt = troca($txt, '$nome', $data['nome']);
		}
		if (isset($data['pf_nome'])) { $txt = troca($txt, '$nome', $data['pf_nome']);
		}
		if (isset($data['ic_plano'])) { $txt = troca($txt, '$ic_plano', $data['ic_plano']);
		}
		if (isset($data['us_nome'])) {
			$txt = troca($txt, '$NOME', $data['us_nome']);
		}
		
		/************* LINK **************/
		if (isset($data['link'])) {
			$botao = '<button ><a href="' . $data['link'] . '">Link de acesso</a></button>';
			$botao .= '<br><br>ou pelo link <a href="' . $data['link'] . '">'.$data['link'] . '</a>';
			$txt = troca($txt, '$LINK', $botao);
		}
		
		/* PROTOCOLO */
		if (isset($data['pp_procotocolo'])) {
			$txt = troca($txt, '$PROTOCOLO', $data['pp_protocolo']);
		}
		if (isset($data['pj_codigo'])) {
			$txt = troca($txt, '$PROTOCOLO', $data['pj_codigo']);
		}
		
		/* DADOS */
		if (isset($data['dados'])) { $txt = troca($txt, '$DADOS', $data['dados']);
		}			

		/********** TITULO DO PROJETO & PLANO ***********/	

		if (isset($data['ic_projeto_professor_titulo'])) { $txt = troca($txt, '$plano_titulo', $data['ic_projeto_professor_titulo']);
		}
		if (isset($data['pj_titulo'])) { $txt = troca($txt, '$TITULO', $data['pj_titulo']);
		}
		

		/* HORAS */
		if (isset($data['ic_projeto_professor_titulo'])) {
			$txt = troca($txt, '$TITULO', $data['ic_projeto_professor_titulo']);
			$txt = troca($txt, '$NOME', $data['pf_nome']);
			$txt = troca($txt, '$ALUNO', $data['al_nome']);

		}

		if (isset($data['motivo'])) { $txt = troca($txt, '$MOTIVO', '<tt><b>'.$data['motivo'].'</b></tt>');
		}
		

		if (isset($data['dados_do_artigo'])) {
			$txt = troca($txt, '$DADOS_DO_ARTIGO', $data['dados_do_artigo']);
		}
		if (isset($data['DIA'])) {
			$txt = troca($txt, '$DIA', $data['DIA']);
			$txt = troca($txt, '$MES', $data['MES']);
			$txt = troca($txt, '$ANO', $data['ANO']);
		}

		$txt .= '<br><br><br><font style="font-size: 4px;">' . $ref . '</font>';

		$sx['nw_texto'] = $txt;

		return ($sx);
	}

	function cp() {
		$cp = array();
		$sql_own = 'id_m:m_descricao:select * from mensagem_own where m_ativo = 1 ';
		array_push($cp, array('$H8', 'id_nw', '', False, True));
		array_push($cp, array('$S20', 'nw_ref', msg('ref'), False, True));
		array_push($cp, array('$S40', 'nw_titulo', msg('titulo'), False, True));
		array_push($cp, array('$T80:13', 'nw_texto', msg('texto'), False, True));
		array_push($cp, array('$Q ' . $sql_own, 'nw_own', 'Enviador', False, True));

		array_push($cp, array('$U8', 'nw_dt_cadastro', '', False, True));
		array_push($cp, array('$O 1:Sim&0:Não', 'nw_ativo', msg('ativo'), True, True));
		array_push($cp, array('$O HTML:HTML&TEXT:TEXT', 'nw_formato', msg('formato'), True, True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));
		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . "
						left join mensagem_own on nw_own = id_m
						where id_nw = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		return ($line);
	}

	function row($obj) {
		$obj -> fd = array('id_nw', 'nw_ref', 'nw_own', 'nw_titulo', 'nw_dt_cadastro', 'nw_ativo');
		$obj -> lb = array('ID', 'Ref', 'Dono', 'Título', 'Cadastro', 'Ativo', '', '');
		$obj -> mk = array('', 'L', 'L', 'L', 'C', 'SN');
		return ($obj);
	}

}
?>