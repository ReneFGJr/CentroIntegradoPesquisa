<fieldset class="fieldset01">
	<legend class="legend01">
		Histórico
	</legend>
	<table width="100%" class="tabela00" align="center" border=0>
		<tr>
			<thead>
				<th width="4%">Data</th>
				<th width="3%">Hora</th>
				<th width="60%">Historico</th>
				<th width="30%">Login</th>
				<th width="4%">cod.</th>
			</thead>
		</tr>
		<?php
		$sql = "select * from ic_historico
				left join us_usuario on us_cracha = bh_log 
					where bh_protocolo = '$ic_plano_aluno_codigo' order by bh_data desc, bh_hora desc";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		$sx = '';
		for ($r=0;$r < count($rlt);$r++) {
			$line = $rlt[$r];
			$sx .= '
				<tr valign="top" class="lt2">
					<td  align="center">' . stodbr($line['bh_data']) . '</td>
					<td  align="center">' . $line['bh_hora'] . '</td>
					<td >' . $line['bh_historico'] . '</td>
					<td >' . $line['us_nome'] . '</td>
					<td  align="center">' . $line['bh_motivo'] . '</td>
				</tr>';
			$obs = ($line['bh_obs']);
			if (strlen($obs) > 0) {
				$sx .= '<tr><td></td><td></td>
							<td colspan=5>' . $obs . '</td>
						</tr>';
			}
		}
		echo $sx;
		?>
	</table>
</fieldset>
