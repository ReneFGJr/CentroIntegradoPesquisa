<?php
class csfs extends CI_model {
	var $tabela = "csf";

	function create_view() {
		$cp = '*';
		$sql = "
					SELECT " . $cp . " FROM csf
						left join usuario on id_us = csf_aluno
						left join csf_status on csf_status = id_cs
					    left join pais on csf_pais = iso3
					    left join fomento_editais on csf_chamada = id_ed
					    left join csf_parceiro on csf_parceiro = id_cp
					    /*
					    
					    left join instituicao on csf_universidade = id_ies
					    left join curso on csf_curso = id_curso
					    */			
			";

		$sql = "CREATE OR REPLACE VIEW csf_view AS (" . $sql . ");";
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function le($id = 0) {
		$sql = "select * from csf_view where id_csf = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$line = $rlt[0];
		return ($line);
	}

	function mostra_todas_csf($aluno_id) {
		$sql = "select * from csf_view where id_us = " . round($aluno_id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '<table width="100%" align="left" class="border1 tabela01" border=0>';
		$sx .= '<tr>						
						<th width="5%">protocolo</th>
						<th width="10%">situação</th>
						<th width="20%">edital</th>
						<th width="24%">universidade</th>
						<th width="10%">país</th>
						<th width="10%">parceiro</th>
						<th width="5%">saída</th>
						<th width="5%">retorno</th>
						<th width="1%">-</th>
					</tr>
					';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;
			$line = $rlt[$r];

			$link = base_url('index.php/csf/ver/' . $line['id_csf'] . '/' . checkpost_link($line['id_csf']));
			$link = '<A HREF="' . $link . '" class="lt4 link">';

			$sx .= '<tr valign="top">';
			$sx .= '<td class="borderb1" align="center">';
			$sx .= $link . 'CF' . strzero($line['id_csf'], 5) . '</A>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['cs_descricao'];
			$sx .= '</td>';

			$sx .= '<td class="lt1 borderb1">';
			$sx .= $line['ed_titulo'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			//$sx .= $line['inst_nome'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['nome'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['cp_descricao'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center">';
			$dt1 = $line['csf_saida'];
			$prev = '';
			if ($dt1 == '0000-00-00') { $dt1 = $line['csf_saida_previsao'];
				$prev = '<a ref="#" title="previsão de saída">*</A>';
			}
			$sx .= stodbr($dt1);
			$sx .= '<span color="blue">' . $prev . '</span>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center">';
			$dt1 = $line['csf_retorno'];
			$prev = '';
			if ($dt1 == '0000-00-00') { $dt1 = $line['csf_retorno_previsao'];
				$prev = '<a ref="#" title="previsão de retorno">*</A>';
			}
			$sx .= stodbr($dt1);
			$sx .= '<span color="blue">' . $prev . '</span>';
			$sx .= '</td>';
			
			$sx .= '<td class="borderb1">';
			$img = '<img src="'.base_url('img/icon/icone_editar.png').'" border=0 height="24" onclick="mostra(\'#csf'.$r.'\','.$line['id_csf'].');" class="link">';
			$sx .= $img;
			$sx .= '</td>';
			
			$sx .= '<tr><td colspan=10>';
			$sx .= '<div id="csf'.$r.'" style="display:none; width: 100%;">xx</div>';
			$sx .= '</td></tr>';			
		}
		$sx .= '<tr><td colspan=10 class="lt0">* Previsão</td></tr>';
		$sx .= '</table>';
		
		$sx .= '
		<script>
			function mostra($id,$reg)
				{
					$($id).fadeIn();
					var $url = "'.base_url('index.php/csf/ajax/').'/"+$reg;
					$.ajax({
					        url: $url,
					        type: "post",
					        success: function(data){
					            $($id).html(\'Submitted successfully\' + data);
					        },
					        error:function(data){
					            $($id).html(\'There is error while submit\' + data);
					        }
					    });					
				}
		</script>
		';
		return ($sx);
	}

	function lista_status($id = 0) {
		$this -> create_view();
		$sql = "select * from csf_view where csf_status = " . round($id) . ' order by us_nome ';
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$sx = '<table width="100%" align="left" class="border1 tabela01">';
		$sx .= '<tr>						
						<th width="30%">estudantes</th>
						<th width="10%">situação</th>
						<th width="30%">edital</th>
						<th width="10%">país</th>
						<th width="10%">parceiro</th>
					</tr>
					';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;
			$line = $rlt[$r];

			$link = base_url('index.php/csf/ver/' . $line['id_csf'] . '/' . checkpost_link($line['id_csf']));
			$link = '<A HREF="' . $link . '" class="lt4 link">';

			$sx .= '<tr valign="top">';
			$sx .= '<td class="borderb1">';
			$sx .= $link . $line['us_nome'] . '</A>';
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['cs_descricao'];
			$sx .= '</td>';

			$sx .= '<td class="lt1 borderb1">';
			$sx .= $line['ed_titulo'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['nome'];
			$sx .= '</td>';

			$sx .= '<td class="borderb1">';
			$sx .= $line['cp_descricao'];
			$sx .= '</td>';

		}
		$sx .= '<tr class="lt0">
					<td class="bold">Total ' . $tot . ' estudantes.</td>
					</tr>';
		$sx .= '</table>';
		return ($sx);
		echo $sql;
	}

	function csf_resumo() {
		$sql = "select csf_status, count(*) as total, cs_descricao
						from " . $this -> tabela . " 
						left join csf_status on csf_status = id_cs
						group by csf_status ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$sx = '<table width="300" align="left" class="border1 tabela00">';
		$sx .= '<tr>
						<th>situação</th>
						<th>estudantes</th>
					</tr>
					';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$link = base_url('index.php/csf/status/' . $line['csf_status'] . '/' . checkpost_link($line['csf_status']));
			$link = '<A HREF="' . $link . '" class="lt2 link">';

			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $link . trim($line['cs_descricao']) . '</A>';
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['total'];
			$sx .= '</td>';
			$sx .= cr();

			$tot = $tot + $line['total'];
		}
		$sx .= '<tr class="lt0">
					<td class="bold">Total ' . $tot . ' estudantes.</td>
					</tr>';

		$sx .= '</table>';
		return ($sx);
	}

	function mostra_bolsa($usuario) {
		$sx = '<table class="tabela00 lt2">';
		$sx .= '<tr>
						<th width="20">
						<th width="200">programa</th>
						<th>chamada</th>
						<th width="200">situação</th>
						<th width="300">universidade</th>
						<th width="60">saída</th>
						<th width="60">retorno</th>
					</tr>
					';

		$sx .= '<tr>';

		$sx .= '<td>';
		$sx .= '<img src="' . base_url('img/logo/logo_csf.png') . '" height="20">';
		$sx .= '</td>';

		$sx .= '<td>';
		$sx .= 'Ciencia sem Fronteiras';
		$sx .= '</td>';

		$sx .= '<td>';
		$sx .= 'Chamada CsF 181/2014 - Alemanha/DAAD';
		$sx .= '</td>';

		$sx .= '<td align="center">';
		$sx .= 'Homologado';
		$sx .= '</td>';

		$sx .= '<td>';
		$sx .= 'Leibniz Universitat Hannover';
		$sx .= '</td>';

		$sx .= '<td align="center">';
		$sx .= '07/2015';
		$sx .= '</td>';

		$sx .= '<td align="center">';
		$sx .= '08/2016';
		$sx .= '</td>';

		$sx .= '</table>';
		return ($sx);
	}

	function insere_candidato($aluno, $edital, $saida, $pais) {
		$pais = substr($pais, 0, 3);

		$sql = "select * from usuario where us_cracha = '" . $aluno . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$aluno_id = $rlt[0]['id_us'];

		/* valida se ja nao foi inserido */
		$sql = "select * from csf where
						csf_aluno = $aluno_id and
						csf_chamada = $edital 
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			echo 'Já existe;';
		} else {
			$saida = stosql($saida);
			$sql = "insert into csf  
					(
					csf_aluno, csf_orientador, csf_modalidade,
					csf_saida, csf_saida_previsao, csf_retorno,
					csf_retorno_previsao, csf_pa_intercambio, csf_pais,
					csf_universidade, csf_status, csf_obs,
					csf_area, csf_curso, csf_chamada,
					csf_parceiro
					) values (
					'$aluno_id',0,0,
					0,'$saida','0000-00-00',
					'0000-00-00',0,'$pais',
					0,1,'',
					0,0,$edital,
					0)";
			$this -> db -> query($sql);
		}
	}

	function cp_novo($aluno = '') {
		$cp = array();
		array_push($cp, array('$H8', '', '', False, False));
		array_push($cp, array('$S8', '', msg('cracha'), True, True));

		$sql = "id_ed:ed_titulo:select * from fomento_editais where ed_local = 'CSF' order by ed_titulo";
		array_push($cp, array('$Q ' . $sql, '', 'Edital', True, True));

		array_push($cp, array('$MES', '', 'Previsão de saída', True, True));

		$sql = "iso3:nome:select * from pais order by nome";
		array_push($cp, array('$Q ' . $sql, '', 'País', False, True));

		return ($cp);
	}

}
?>
