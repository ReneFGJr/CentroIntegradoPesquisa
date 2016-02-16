<?php
class ic_contratos extends CI_model {
	var $tabela = 'ic_contrato';

	function cp() {

		$cp = array();

		array_push($cp, array('$H8', 'id_icc', '', False, True));
		array_push($cp, array('$S20', 'icc_cod_contrato', msg('lb_icc_condigo_contrato'), False, True));
		array_push($cp, array('$S80', 'icc_titulo_plano', msg('lb_icc_titulo_plano'), False, True));
		array_push($cp, array('$T80:13', 'icc_text_contrato', msg('lb_icc_texto_contrato'), False, True));
		//array_push($cp, array('$Q us_cracha:us_nome:select * from us_usuario where usuario_tipo_ust_id =2 and us_ativo = 1 order by us_nome', 'icc_orientador_cracha', 'Nome do orientador', False, False));
		//array_push($cp, array('$Q us_cracha:us_nome:select * from us_usuario where usuario_tipo_ust_id =3 and us_ativo = 1 order by us_nome', 'icc_estudante_cracha', 'Nome do aluno', False, False));
		//array_push($cp, array('$S15', 'icc_orientador_cracha', msg('lb_icc_cracha_orientador'), False, True));
		//array_push($cp, array('$S15', 'icc_estudante_cracha', msg('lb_icc_cracha_estudante'), False, True));
		//array_push($cp, array('$S15', 'icc_edital', msg('lb_icc_edital'), False, True));
		//array_push($cp, array('$[2009-' . date("Y") . ']D', 'icc_ano_edital', msg('lb_icc_ano_edital'), False, True));
		//array_push($cp, array('$Q id_mb:mb_descricao:select * from ic_modalidade_bolsa where mb_ativo=1 order by mb_tipo, mb_descricao', 'icc_bolsa_modalidade', msg('lb_icc_modalidade'), False, True));
		//array_push($cp, array('$D10', 'icc_inicio_bolsa', msg('lb_icc_inicio_bolsa'), False, True));
		//array_push($cp, array('$D10', 'icc_fim_bolsa', msg('lb_icc_inicio_bolsa'), False, True));
		//array_push($cp, array('$S8', 'icc_convenio_fa', msg('lb_icc_convenia_fa'), False, True));

		return ($cp);

	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
						where id_icc = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);

	}

	function row($obj) {
		$obj -> fd = array('id_icc', 'icc_cod_contrato', 'icc_titulo_plano', 'icc_edital', 'icc_ano_edital');
		$obj -> lb = array('ID', msg('lb_icc_cod_contrato'), msg('lb_icc_titulo_plano'), msg('lb_icc_edital'), msg('lb_icc_ano_edital'));
		$obj -> mk = array('', 'L', 'L', 'L', 'C');
		return ($obj);
	}


}
?>