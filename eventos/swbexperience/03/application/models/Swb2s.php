<?php

class swb2s extends CI_model
{



function cp() {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$S8', '', 'Informe seu ccrachс', True, False));
		array_push($cp, array('$B8', '', 'Iniciar Inscriчуo', false, False));
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

		array_push($cp, array('$O 1:SIM&0:NУO', 'us_ativo', msg('eq_ativo_2'), True, True));
		array_push($cp, array('$O 0:NУO&1:SIM', 'us_teste', msg('user_teste'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
 * 
 * 
 */
	
	}