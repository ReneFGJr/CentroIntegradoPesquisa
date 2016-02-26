<?php
class produtividades extends CI_model {
	function cp_produtividade() {
		$cp = array();
		array_push($cp, array('$H8', 'id_usb', '', False, True));
		array_push($cp, array('$S8', 'us_id', 'Professor', False, False));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'usb_ativo', 'Ativo', True, True));
		array_push($cp, array('$Q id_bpn:bpn_bolsa_descricao:select * from us_bolsa_prod_nome  order by bpn_bolsa_descricao', 'bpn_id', 'Ativo', True, True));
		array_push($cp, array('$D8', 'usb_dt_inicio', 'Dt. Início', False, True));
		array_push($cp, array('$D8', 'usb_dt_termino', 'Dt. Término', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', 'usb_renovacao', 'Renovação', True, True));
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
			$sb .= '<td width="10%"  class="border1 lt6" align="center"><b>'.$totr.'</b></td>';
			$sb .= '<td width="10%"  class="border1 lt6" align="center"><b>'.($total - $totr).'</b></td>';
			
			$sx .= '<tr>' . $sa . '</td>';
			$sx .= '<tr>' . $sb . '</td>';
			$sx .= '</table>';
		}
		return ($sx);
	}

	function lista_produtivade($editar=1) {
		$sql = "SELECT * FROM us_bolsa_produtividade
					INNER JOIN us_usuario on id_us = us_id 
					INNER JOIN us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn
					WHERE usb_ativo = 1
					ORDER BY us_nome, id_usb";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$id = 0;
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr>
					<th>Nome</th>
					<th>Cracha</th>
					<th class="nopr">Lattes</th>
					<th>Curso</th>
					<th>Bolsista</th>
					<th>Fomento</th>
					';
		if (perfil('#COO#CPP#SPI#ADM') == 1) { $sx .= '<th>tipo</th>'; }
		$sx .= '</tr>';
		
		$xnome = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$id++;
			$line = $rlt[$r];
			$link = '<a href="' . base_url('index.php/usuario/produtividade_ed/' . $line['id_usb'] . '/' . checkpost_link($line['id_usb'])) . '">editar</a>';

			$nome = $line['us_cracha'];
			if ($xnome == $nome) {
				$cor = '<font color="red">';
				$pre = '*';
			} else {
				$cor = '<font>';
				$pre = '';
			}
			$sx .= '<tr>';
			$sx .= '<td class="lt2">' . $cor . $line['us_nome'] . $pre. '</font></td>';
			$sx .= '<td class="lt2" align="center">' . $cor . $line['us_cracha'] . '</font></td>';
			$lattes = '<a href="' . $line['us_link_lattes'] . '" class="link" target="_new">lattes</a>';
			$sx .= '<td class="lt2 nopr" align="center">' . $lattes . '</font></td>';

			$sx .= '<td class="lt2">' . $cor . $line['us_curso_vinculo'] . '</font></td>';
			$sx .= '<td class="lt2">' . $cor . $line['bpn_bolsa_descricao'] . '</font></td>';
			$sx .= '<td class="lt2">' . $cor . $line['bpn_fomento'] . '</font></td>';
			if ($line['usb_renovacao'] == '1') {
				$sx .= '<td class="lt2">' . msg('renovação') . '</td>';
			} else {
				$sx .= '<td class="lt2">&nbsp;</td>';
			}
			if ((perfil('#COO#CPP#SPI#ADM') == 1) and ($editar == 1)) {
				$sx .= '<td class="nopr" align="center">' . $link . '</td>';
			}
			$sx .= '</tr>';

			$xnome = $nome;
		}
		$sx .= '</table>';
		$sx .= '* Bolsas de duas agências de fomento';
		return ($sx);
	}

}
?>
