<?php

class swb2s extends CI_model {
	var $tabela = 'evento_inscricao';

	function row($obj) {
		$obj -> fd = array('id_ie', 'ei_us_usuario_id');
		$obj -> lb = array('id', msg('Label_'));
		$obj -> mk = array('', 'L');
		return ($obj);
	}

	function le($id = 0) {
		$sql = "select * from evento_inscricao where id_ei = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array());
		}
	}

	function insere_inscricao($id = 0, $ev = 0) {
		$sql = "select * from evento_inscricao where ei_us_usuario_id = $id and ei_evento_id = $ev ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$idi = $rlt[0]['id_ei'];
		} else {
			/* Insere inscricao */
			$xsql = "insert into evento_inscricao
						(
							ei_us_usuario_id, ei_evento_id
						) values (
							$id,$ev
						)";
			$rlt = $this -> db -> query($xsql);

			/* recupera Id da inscricao */
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$idi = $rlt[0]['id_ei'];
		}
		return ($idi);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$S8', '', 'Informe seu crach�', True, TRUE));
		array_push($cp, array('$B8', '', 'Iniciar Inscri��o', false, False));
		return ($cp);
	}

	function cp_questionario() {
		$cp = array();
		array_push($cp, array('$H8', 'id_ei', '', False, True));

		array_push($cp, array('${', '', 'Alguns dados', False, TRUE));
		array_push($cp, array('$S80', 'ei_text_1', 'Curso da PUCPR', True, TRUE));
		array_push($cp, array('$S80', 'ei_text_2', 'Universidade de destino', True, TRUE));
		array_push($cp, array('$Q nome_pt:nome_pt:select * from pais order by nome_pt', 'ei_text_3', 'Pa�s de Destino', True, TRUE));
		array_push($cp, array('$}', '', 'Alguns dados', False, TRUE));

		array_push($cp, array('${', '', 'In�cio e T�rmino da vig�ncia da bolsa', False, TRUE));
		array_push($cp, array('$D8', 'ei_text_4', 'Data de sa�da do Brasil', True, TRUE));
		array_push($cp, array('$D8', 'ei_text_5', 'Data de retorno ao Brasil', True, TRUE));
		array_push($cp, array('$}', '', 'In�cio e T�rmino da vig�ncia da bolsa', False, TRUE));

		array_push($cp, array('${', '', 'Sobre sua perman�ncia', False, TRUE));
		array_push($cp, array('$O 1:SIM&0:N�O', 'ei_text_6', 'Voc� fez est�gio durante o interc�mbio?', True, TRUE));
		array_push($cp, array('$O 1:SIM&0:N�O', 'ei_text_7', 'Voc� fez pesquisa durante o interc�mbio?', True, TRUE));
		array_push($cp, array('$O 1:SIM&0:N�O', 'ei_text_8', 'Voc� est� trabalhando?', True, TRUE));
		array_push($cp, array('$}', '', 'Sobre sua perman�ncia', False, TRUE));

		array_push($cp, array('${', '', 'Outras informa��es', False, TRUE));
		array_push($cp, array('$D8', 'ei_text_9', 'Informe a data que retornou as suas atividades na Universidade do Brasil:', True, TRUE));

		$ops = '0:Nenhum&25:at� 25%&50:at� 50%&75:at� 75%&76-100:entre 76% e 100%';
		array_push($cp, array('$O ' . $ops, 'ei_text_10', 'Qual o percentual em cr�ditos de disciplinas realizadas no exterior com aproveitamento pela Universidade?', True, TRUE));

		$ops = 'N�o se aplica:N�o se aplica';
		$ops .= '&Disciplinas j� cursadas pelo aluno na IES brasileira:Disciplinas j� cursadas pelo aluno na IES brasileira';
		$ops .= '&Disciplinas que n�o fazem parte da grade curricular na IES brasileira:Disciplinas que n�o fazem parte da grade curricular na IES brasileira';
		$ops .= '&Disciplinas com formato/conte�do distinto:Disciplinas com formato/conte�do distinto';
		$ops .= '&Desempenho insatisfat�rio/reprova��o do aluno:Desempenho insatisfat�rio/reprova��o do aluno';
		array_push($cp, array('$O ' . $ops, 'ei_text_11', 'O que motivou o poss�vel n�o aproveitamento de cr�ditos foi: (pode ser marcada mais de uma op��o):', True, TRUE));
		array_push($cp, array('$}', '', 'Outras informa��es', False, TRUE));

		array_push($cp, array('$B8', '', 'Finalizar Inscri��o', False, TRUE));

		return ($cp);
	}

	/**

	 array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));
	 //		$sql = "select * from us_tipo order by ust_id ";
	 //		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_tipo_ust_id', msg('us_tipo'), False, True));

	 $sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
	 array_push($cp, array('$Q usf_id:usf_nome:' . $sql, 'usuario_funcao_usf_id', msg('us_funcao'), False, True));

	 $sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
	 array_push($cp, array('$Q ust_id:ust_nome:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));

	 array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));

	 array_push($cp, array('$O 1:SIM&0:N�O', 'us_ativo', msg('eq_ativo_2'), True, True));
	 array_push($cp, array('$O 0:N�O&1:SIM', 'us_teste', msg('user_teste'), True, True));

	 array_push($cp, array('$B', '', msg('enviar'), false, True));

	 return ($cp);
	 *
	 *
	 */

}
