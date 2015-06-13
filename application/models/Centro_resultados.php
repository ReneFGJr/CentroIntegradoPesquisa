<?php
class centro_resultados extends CI_model {
	var $tabela = 'centro_resultado';

	function row($obj) {
		$obj -> fd = array('id_cr', 'cr_descricao', 'cr_nr');
		$obj -> lb = array('ID', 'Centro de Resultado', 'Nº CR');
		$obj -> mk = array('', 'L', 'C', 'L');
		return ($obj);
	}

}
