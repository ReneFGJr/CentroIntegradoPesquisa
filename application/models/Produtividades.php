<?php
class produtividades extends CI_model {
	function cp_produtividade() {
		$cp = array();
		$sql = 'select id_us, us_nome from us_usuario where usuario_tipo_ust_id  = \'2\' order by us_nome ';
		array_push($cp, array('$H8', 'id_usb', '', False, True));
		array_push($cp, array('$Q id_us:us_nome:'.$sql, 'us_id', 'Professor', False, False));
		array_push($cp, array('$O 1:SIM&0:N�O&9:CANCELAR', 'usb_ativo', 'Ativo', True, True));
		array_push($cp, array('$Q id_bpn:bpn_bolsa_descricao:select * from us_bolsa_prod_nome  order by bpn_bolsa_descricao', 'bpn_id', 'Ativo', True, True));
		array_push($cp, array('$D8', 'usb_dt_inicio', 'Dt. In�cio', False, True));
		array_push($cp, array('$D8', 'usb_dt_termino', 'Dt. T�rmino', False, True));
		array_push($cp, array('$O 1:SIM&0:N�O&2:NOVO', 'usb_renovacao', 'Renova��o', True, True));
		return ($cp);
	}

	function resumo_produtividade() {
		$sql = "select count(*) as repetidos from (
					select us_id, count(*) as total from us_bolsa_produtividade 
						WHERE usb_ativo = 1 
						group by us_id
				) as alias where total > 1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$totr = $line['repetidos'];

		$sql = "SELECT count(*) as total, bpn_bolsa_descricao FROM us_bolsa_produtividade
					INNER JOIN us_usuario on id_us = us_id 
					INNER JOIN us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn
					WHERE usb_ativo = 1
					GROUP BY bpn_bolsa_descricao
					ORDER BY bpn_bolsa_descricao";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$sa = '';
		$sb = '';
		if (count($rlt) > 0) {
			$sx .= '<table width="100%">';
			$sx .= '<tr>';
			$size = round(80 / count($rlt));
			$total = 0;
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$total = $total + $line['total'];
				$sa .= '<th align="center" width="' . $size . '%">' . $line['bpn_bolsa_descricao'] . '</td>';
				$sb .= '<td class="border1 lt6" align="center" width="' . $size . '%">' . $line['total'] . '</td>';
			}
			$sa .= '<th align="center">Dois fomentos</td>';
			$sa .= '<th align="center">Total</td>';
			$sb .= '<td width="10%"  class="border1 lt6" align="center"><b>' . $totr . '</b></td>';
			$sb .= '<td width="10%"  class="border1 lt6" align="center"><b>' . ($total - $totr) . '</b></td>';

			$sx .= '<tr>' . $sa . '</td>';
			$sx .= '<tr>' . $sb . '</td>';
			$sx .= '</table>';
		}
		return ($sx);
	}

	function lista_produtivade($editar = 1) {
		$sql = "SELECT * FROM us_bolsa_produtividade
					INNER JOIN us_usuario on id_us = us_id 
					INNER JOIN us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn
					WHERE usb_ativo <> 9
					ORDER BY us_nome, id_usb";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$id = 0;
		$sx = '';
		if (perfil('#ADM#CPS') == '1') {
			$sx .= '<a href="' . base_url('index.php/usuario/produtividade_ed/0') . '" class="botao3d back_green_shadown back_green nopr">inserir novo registro</a>';

		}

		$sx .= '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr>
					<th>Nome</th>
					<th class="nopr">Lattes</th>
					<th>Situa��o</th>
					<th>Bolsista</th>
					<th>Fomento</th>
					<th>In�cio</th>
					<th>Fim</th>
					';
		if (perfil('#COO#CPP#SPI#ADM') == 1) { $sx .= '<th>tipo</th>';
		}
		$sx .= '</tr>';

		$xnome = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$id++;
			$line = $rlt[$r];
			
			/* Altera perfil para professor */
			if ($line['usuario_tipo_ust_id'] != '2')
				{
					$sql = "update us_usuario set usuario_tipo_ust_id = '2' where id_us = ".$line['id_us'];
					$xxx = $this->db->query($sql);
				}
				
			$link = '<a href="' . base_url('index.php/usuario/produtividade_ed/' . $line['id_usb'] . '/' . checkpost_link($line['id_usb'])) . '" class="link lt1">editar</a>';

			$nome = $line['us_cracha'];
			if ($xnome == $nome) {
				$cor = '<font color="red">';
				$pre = '*';
			} else {
				$cor = '<font>';
				$pre = '';
			}
			$sx .= '<tr>';
			$sx .= '<td class="lt2">' . $cor . link_perfil($line['us_nome'],$line['id_us'],$line) . $pre . '</font></td>';
			$lattes = '<a href="' . $line['us_link_lattes'] . '" class="link" target="_new">lattes</a>';
			$sx .= '<td class="lt2 nopr" align="center">' . $lattes . '</font></td>';

			//$sx .= '<td class="lt2">' . $cor . $line['us_curso_vinculo'] . '</font></td>';
			$sx .= '<td class="lt2">' . $cor . msg('situacao_bp_'.$line['usb_ativo']) . '</font></td>';
			$sx .= '<td class="lt2">' . $cor . $line['bpn_bolsa_descricao'] . '</font></td>';
			$sx .= '<td class="lt2">' . $cor . $line['bpn_fomento'] . '</font></td>';
			
			$sx .= '<td class="lt2" align="center">' . $cor . substr($line['usb_dt_inicio'],0,7) . '</font></td>';
			$sx .= '<td class="lt2" align="center">' . $cor . substr($line['usb_dt_termino'],0,7) . '</font></td>';

			switch ($line['usb_renovacao']) 
				{
				case '1':
					$sx .= '<td class="lt2">' . msg('renova��o') . '</td>';
					break;
				case '2':
					$sx .= '<td class="lt2">' . msg('novo') . '</td>';
					break;
				default:
					$sx .= '<td class="lt2">&nbsp;</td>';
					break;
			}
			if ((perfil('#COO#CPP#SPI#ADM') == 1) and ($editar == 1)) {
				$sx .= '<td class="nopr" align="center">' . $link . '</td>';
			}
			$sx .= '</tr>';

			$xnome = $nome;
		}
		$sx .= '</table>';
		$sx .= '* Bolsas de duas ag�ncias de fomento';
		return ($sx);
	}

}
?>
