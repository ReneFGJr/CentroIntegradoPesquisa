<?php
class ro8s extends CI_Model {

	function inport_insituicao() {
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=instituicao&limit=3000';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=instituicao&limit=1000&offset=800';
		//get the raw textdata of sample.xml
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);

		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {

			$xml = $xmlRaw -> record[$r];

			$nome = utf8_decode($xml -> inst_nome);
			$abre = utf8_decode($xml -> inst_abreviatura);
			$inst_lat = utf8_decode($xml -> inst_lat);
			$inst_log = utf8_decode($xml -> inst_log);
			$ordem = $xml->inst_ordem;
			$data = date("Y-m-d");

			$ativo = 1;
			//				$ativo = 1;
			$to++;
			$sx .= '<tr class="lt0">';
			$sx .= '<td>' . $to . '.</td>';
			$sx .= '<td>' . $nome . '</td>';
			$sx .= '<td>' . $abre . '</td>';

			$sql = "select * from gp_instituicao_parceira where gpip_nome = '$nome' ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			if (count($rlt) == 0) {
				$data = date("Y-m-d");
				$sx .= '<td>novo registro</td>';
				/* Novo registro */
				$sql = "insert into gp_instituicao_parceira 
									(
										gpip_nome, gpip_sigla, gpip_uf,
										gpip_use,
										gpip_latitude, gpip_longitude, gpip_ordem
									) values (
										'$nome','$abre','',
										0,
										'$inst_lat','$inst_log',$ordem
									)
							";
				$this -> db -> query($sql);
				$in++;
			} else {
				/* Atualiza registro */
				$sx .= '<td>atualizado registro</td>';
				$sql = "update gp_instituicao_parceira set 
											gpip_nome = '$nome',
											gpip_sigla = '$abre'
										where gpip_nome = '$nome'
								";
				$this -> db -> query($sql);
				$up++;
			}
		}

		$sx .= '</table>';
		return ($sx);
	}

	function inport_ic_noticia() {
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=ic_noticia&limit=1000';
		$site = 'http://www2.pucpr.br/reol/ro8_index.php?verbo=ListRecord&verbo=ListRecord&table=ic_noticia&limit=3000';
		//get the raw textdata of sample.xml
		$xmlRaw = simplexml_load_file($site);
		$RowT = count($xmlRaw -> record);
		$to = 0;
		$in = 0;
		$up = 0;
		$sx = '<table width="100%" align="center" class="tabela00 lt0">';
		for ($r = 0; $r < $RowT; $r++) {

			$xml = $xmlRaw -> record[$r];
			$jid = $xml -> nw_journal;

			$titulo = utf8_decode($xml -> nw_titulo);
			$texto = utf8_decode($xml -> nw_descricao);
			$data = $xml -> nw_dt_cadastro;
			$ativo = round('0' . $xml -> nw_ativo);
			//				$ativo = 1;
			$ref = UpperCaseSql($xml -> nw_ref);
			if ($jid == 20) {
				$to++;
				$sx .= '<tr class="lt0">';
				$sx .= '<td>' . $to . '.</td>';
				$sx .= '<td>' . $xml -> id_nw . '</td>';
				$sx .= '<td>' . $jid . '</td>';
				$sx .= '<td>' . $ref . '</td>';
				$sx .= '<td>' . $titulo . '</td>';

				$sql = "select * from mensagens where nw_ref = '$ref' and nw_own = 'IC' ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();

				/* Trata texto */
				$texto = troca($texto, '[e]', '&');
				$texto = troca($texto, '&lt;', '<');
				$texto = troca($texto, '&rt;', '>');
				$texto = troca($texto, "'", '"');
				if (count($rlt) == 0) {
					$sx .= '<td>novo registro</td>';

					/* Novo registro */
					$sql = "insert into mensagens 
										(
										nw_titulo, nw_ref, nw_texto,
										nw_dt_cadastro, nw_own, nw_ativo
										) values (
										'$titulo','$ref','$texto',
										$data,'IC',$ativo
										)
								";
					$this -> db -> query($sql);
					$in++;
				} else {
					/* Atualiza registro */
					$sx .= '<td>atualizado registro</td>';
					$sql = "update mensagens set 
											nw_titulo = '$titulo',
											nw_texto = '$texto'
										where nw_ref = '$ref' and nw_own = 'IC'
								";
					$this -> db -> query($sql);
					$up++;
				}
			}
		}
		$sx .= '</table>';
		return ($sx);
	}

}
?>
