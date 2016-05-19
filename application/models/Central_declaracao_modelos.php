<?php
class Central_declaracao_modelos extends CI_model {
	var $tabela = 'central_declaracao_modelo';
	var $tabela_2 = "ic_modalidade_bolsa";

	function row($obj) {
		$obj -> fd = array('id_cdm', 'cdm_titulo', 'cdm_nome', 'cdm_ano');
		$obj -> lb = array('id', msg('lb_cdm_titulo'), msg('lb_cdm_nome_evento'), msg('lb_cdm_ano_evento'));
		$obj -> mk = array('', 'L', 'L', 'C');
		return ($obj);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H20', 'id_cdm', '', False, True));
		//Dados do evento
		array_push($cp, array('${', '', 'Dados do Evento', false, True));
		$sql = "select * from evento_nome order by ev_nome";
		array_push($cp, array('$Q ev_nome:ev_nome:' . $sql, 'cdm_nome', msg('lb_cdm_nome_evento'), false, False));
		array_push($cp, array('$[2009-' . date("Y") . ']D', 'cdm_ano', msg('lb_cdm_ano'), false, True));
		array_push($cp, array('$S10', 'cdm_tipo', msg('lb_cdm_tipo'), false, True));
		array_push($cp, array('$}', '', 'Evento', false, True));
		//dados da declaracao
		array_push($cp, array('${', '', 'Dados da Declaraчуo', false, True));
		array_push($cp, array('$S80', 'cdm_titulo', msg('lb_cdm_titulo'), false, True));
		array_push($cp, array('$S100', 'cdm_background', msg('lb_cdm_background'), false, True));
		array_push($cp, array('$T50:20', 'cdm_body', msg('lb_cdm_body'), false, True));
		array_push($cp, array('$T30:5', 'cdm_assinaturas', msg('lb_cdm_assinatura'), false, false));
		array_push($cp, array('$S5', 'cdm_assinaturas_x', msg('lb_cdm_assinatura_posicao_x'), false, True));
		array_push($cp, array('$S5', 'cdm_assinaturas_y', msg('lb_cdm_assinatura_posicao_y'), false, True));
		array_push($cp, array('$T30:5', 'cdm_assinatura_2', msg('lb_cdm_assinatura_2'), false, false));
		array_push($cp, array('$S5', 'cdm_set_x_ass_2', msg('lb_cdm_assinatura2_posicao_x'), false, True));
		array_push($cp, array('$S5', 'cdm_set_y_ass_2', msg('lb_cdm_assinatura2_posicao_y'), false, True));
		array_push($cp, array('$}', '', 'Dados da Declaraчуo', false, True));
		//Tщcnico
		array_push($cp, array('${', '', 'Tщcnico', false, True));
		array_push($cp, array('$T50:15', 'cdm_query', msg('lb_cdm_query'), false, false));
		array_push($cp, array('$S5', 'cdm_marginTop', msg('lb_cdm_margem_top'), false, True));
		array_push($cp, array('$S5', 'cdm_marginBotton', msg('lb_cdm_margem_botton'), false, True));
		array_push($cp, array('$O P:Retrato&L:Paisagem', 'cdm_posicao', msg('lb_cdm_posicao'), false, True));
		array_push($cp, array('$O 1:SIM&0:NУO', 'cdm_qrcode', msg('lb_cdm_ativar_qrcode'), false, True));
		array_push($cp, array('$S5', 'cdm_set_qrcode_x', msg('lb_cdm_qrcode_pos_x'), false, True));
		array_push($cp, array('$S5', 'cdm_set_qrcode_y', msg('lb_cdm_qrcode_pos_y'), false, True));
		array_push($cp, array('$}', '', 'Dados Tщcnicos', false, True));

		array_push($cp, array('$B', '', msg('gravar modelo'), false, True));

		return ($cp);
	}

	function modelo_declaracao_view($id = 0, $data) {
		/* Load Models */
		$this -> load -> model('central_declaracao_modelos');
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');

		$body = $data['cdm_body'];

		if (isset($data['nome_1'])) {
			/* sequencia de trocas [aluno]*/
			$body = troca($body, '$nome_1', $data['nome_1']);
			$body = troca($body, '$curso_aluno', $data['curso_1']);
		}
		if (isset($data['nome_2'])) {
			/* sequencia de trocas [orientador]*/
			$body = troca($body, '$nome_2', $data['nome_2']);
			$body = troca($body, '$cracha_orientador', $data['cracha_2']);
			}
		if (isset($data['ic_projeto_professor_titulo'])) {	
			$body = troca($body, '$titulo_projeto', $data['ic_projeto_professor_titulo']);
		}

		if (isset($data['mb_tipo'])) {
			$body = troca($body, '$mb_bolsa_tipo', $data['mb_tipo']);
			$body = troca($body, '$mb_bolsa_desc', $data['mb_descricao']);
		}
		
		if ($data['dc_data1'] > '2000-01-01') {
			$body = troca($body, '$data1', stodbr($data['dc_data1']));
		}	
		if ($data['dc_data2'] > '2000-01-01') {
			$body = troca($body, '$data2', stodbr($data['dc_data2']));
		}

		$data['certificado'] = $body;

		$this -> load -> view('central_certificado/certificado_modelo', $data);


		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function le_modelo($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
					where id_cdm = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);
	}
	
	function le($id = 0) {

		$sql = "select * from central_declaracao 
						inner join central_declaracao_modelo on dc_tipo = id_cdm
						inner join (select us_nome as nome_1, id_us as id_us_1, us_genero as us_g1, us_curso_vinculo as curso_1, us_cracha as cracha_1 from us_usuario) as user_1 on id_us_1 = dc_us_usuario_id 
					 	left join (select us_nome as nome_2, id_us as id_us_2, us_genero as us_g2, us_cracha as cracha_2 from us_usuario) as user_2 on id_us_2 = dc_us_usuario_id_2
						where id_dc = $id		
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();	
		if (count($rlt) == 0) {
			return array();
		}
		
		/* dados adicionais */
		$line = $rlt[0];
		if ($line['cdm_tipo'] == 'IC')
			{
				$this->load->model('ics');
				$proto = $line['dc_protocolo'];
				$line2 = $this-> ics ->le_protocolo($proto);
				$line = array_merge($line,$line2);				
			}
		return ($line);

	}

}
?>