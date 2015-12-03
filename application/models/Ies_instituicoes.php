<?php
class Ies_instituicoes extends CI_model {
	var $tabela = 'ies_instituicao';
	
	function row($obj) {
		$obj -> fd = array('id_ies', 'ies_nome', 'ies_sigla', 'ies_uf');
		$obj -> lb = array('id', msg('lb_inst_nome'), msg('lb_inst_sigla'), msg('lb_inst_uf'));
		$obj -> mk = array('', 'L', 'L', 'L');
		return ($obj);
	}

	function cp() {
		$sql_estado = 'select * from estado order by es_uf';

		$cp = array();
		array_push($cp, array('$H11', 'id_ies', '', False, True));
		array_push($cp, array('${', '', 'Dados da Instituição', FALSE, True));
		array_push($cp, array('$S80', 'ies_nome', msg('lb_inst_nome'), True, True));
		array_push($cp, array('$S15', 'ies_sigla', msg('lb_inst_sigla'), FALSE, True));
		array_push($cp, array('$}', '', '', FALSE, True));
		array_push($cp, array('${', '', 'Endereço', FALSE, True));
		array_push($cp, array('$S80', 'ies_endereco', msg('lb_inst_endereco'), false, True));
		array_push($cp, array('$S45', 'ies_cidade', msg('lb_inst_cidade'), false, True));
		array_push($cp, array('$Q es_uf:es_uf:' . $sql_estado, 'ies_uf', msg('lb_inst_uf'), false, True));
		array_push($cp, array('$O CO:CENTRO-OESTE&N:NORTE&ND:NORDESTE&S:SUL&SD:SUDESTE', 'ies_regiao', msg('lb_inst_regiao'), false, True));
		array_push($cp, array('$}', '', '', FALSE, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function le($id = 0) {
		$sql = "select * from " . $this -> tabela . " 
					  where id_ies = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];
		
		//Grava as coordenadas nas variaveis para renderizar o mapa
		$lat = $data['ies_latitude'];
		$long = $data['ies_longitude'];
		
		$config['center'] = $lat.',' .$long;
		$config['zoom'] = '9';
		$this -> googlemaps -> initialize($config);
		

		$marker = array();
		
		$marker['position'] = $lat.',' .$long;
		$this -> googlemaps -> add_marker($marker);
		$data['gpip_link_maps'] = $this -> googlemaps -> create_map();
		//print_r($data);
		return ($data);
	}

}
?>
