<?php
class ceps extends CI_model {
	function inport($txt) {
		$txt = troca($txt, chr(13), '¬');
		$txt = troca($txt, '	', ';');
		$txt = troca($txt, ';;', ';0;');
		
		$ln = splitx('¬', $txt);

		for ($r = 0; $r < count($ln); $r++) {
			$l = $ln[$r];
			$tn = splitx(';', $l);

			/**************************************** PAUTA *****************************/
			if (count($tn) > 2) {
				$caae = $tn[0];

				if ((substr($caae, 8, 1) == '.') and (substr($caae, 10, 1) == '.')) {
					echo '<br>' . $l;
					$this -> pauta_da_reuniao($tn);
				}
			}

			/**************************************** LISTA GERAL *****************************/
			if (count($tn) > 2) {
				$caae = $tn[2];

				if ((substr($caae, 8, 1) == '.') and (substr($caae, 10, 1) == '.')) {
					echo '<br>' . $l;
					$autor = $tn[3];
					$ver = $tn[4];
					$pclast = $tn[5];
					$d2 = $tn[6];
					$d3 = $tn[7];
					$pc1st = $tn[8];
					$relator = $tn[9];
					$tipo = $tn[0];
					$data = '0000-00-00';
					$this -> protocolo_na_base($caae, '', $autor, $pc1st, $pclast);
					$this->insere_tramitacao($caae,$tipo,$ver,$relator);
				}
			}
		}
	}

	function mostra_pauta($dt)
	{
		$dt = substr($dt,0,4).'-'.substr($dt,4,2).'-'.substr($dt,6,2);
		$sql = "select * from cep_tramitacao
					INNER JOIN cep_protocolo ON pc_caae = ct_caae
					INNER JOIN us_usuario ON id_us = ct_relator
					where ct_data = '$dt' ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sh = '<tr><th>#</th><th>CAAE</th>
					<th>Título</th>
					<th>Inst./Pesquisador</th>
					<th>Relator</th>
					<th class="noscreen">Avaliação</th>
			</tr>';
		$sx .= $sh;
		$id = 0;
		for ($r=0;$r < count($rlt);$r++)
			{
				$id++;
				$line = $rlt[$r];
				$remove = '<a href="'.base_url('index.php/cep/pauta_montar/'.sonumero($dt).'?dd1='.$line['id_ct'].'&dd10=DEL').'" class="link lt4"><font color="#FF0000"><b>X</b></font></a>';
				
				$sx .= '<tr class="lt2" valign="top">';
				$sx .= '<td align="center">'.$id.'</td>';
				$sx .= '<td align="center" class="lt1 borderb1">'.$line['ct_caae'];
				$sx .= '<br>'.$line['ct_tipo'].' - v.'.$line['ct_versao'].'</td>';
				$sx .= '<td align="left" class="lt1 borderb1">'.$line['pc_titulo'].'</td>';
				
				$sx .= '<td align="left" class="lt1 borderb1">'.$line['pc_instituicao'].'<br>';
				$sx .= '<i>'.$line['pc_autor'].'</i></td>';
				$sx .= '<td align="left" class="lt1 borderb1">'.$line['us_nome'].'</td>';
				$sx .= '<td align="center" class="nopr">'.$remove.'</td>';
				$sx .= '<td align="center" class="noscreen"><div style="width:20px; height: 20px; border: 4px solid #808080;"></div></td>';
				
			}
		$sx .= '</table>';
		$sx .= '<font class="lt0">Situação: A - Aprovado; N - Não aprovado; R - Retirado; P - Pendente</font>';
		$sx .= '<br><font class="lt0">Legenda: PO - Projeto do Centro Coordenador; POp - Projeto do Centro Participante; POc - Projeto do Centro Coparticipante; 
				<br>E - Emenda; Ep - Emenda de Centro Participante; Ec - Emenda de Centro Coparticipante;
				N - Notificação; Np - Notificação do centro Participante</font>';
		return($sx);
	}

	function indicar_para_reuniao($id,$dt)
		{
			$dt = substr($dt,0,4).'-'.substr($dt,4,2).'-'.substr($dt,6,2);
			$sql = "update cep_tramitacao set ct_data = '$dt' where id_ct = ".round($id);
			$this->db->query($sql);
		}
	function protocolos_para_indicacao()
		{
			$sql = "select * from cep_tramitacao where ct_data = '0000-00-00' order by ct_caae ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = '<form method="get">';
			$sx .= '<input type="submit" value="Indicar >>>" name="acao"><BR>';
			$sx .= '<select name="dd1" style="width:100%;" size=30>';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$id = $line['id_ct'];
					$sx .= '<option value="'.$id.'" class="lt3">'.$line['ct_caae'].' '.$line['ct_tipo'].' v.'.$line['ct_versao'].'</option>';
				}
			$sx .= '</select></form>';
			return($sx);
		}

	function le($caae = '') {
		$sql = "select * from cep_protocolo where pc_caae = '$caae' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}
	
	function insere_tramitacao($caae,$tipo,$versao,$relator,$data='0000-00-00')
		{
			$sql = "select * from cep_tramitacao where ct_caae = '$caae' and ct_tipo = '$tipo' and ct_versao = '$versao' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) == 0)
				{
					$relator_id = $this->busca_relator($relator);
					if ($relator_id == 0)
						{
							echo '<font color="red">Nome do relator não localizado na Base: <b>'.$relator.'</b></font>';
						} else {
							$sql = "insert into cep_tramitacao 
									(
									ct_caae, ct_tipo, ct_versao,
									ct_relator, ct_data
									) values (
									'$caae','$tipo','$versao',
									'$relator_id','$data')";
							$rlt = $this->db->query($sql);		
						}
					
				}
		}
	
	function pauta_da_reuniao($tn) {
		$caae = $tn[0];
		$titulo = $tn[1];
		$data = $this -> le($caae);
		$autor = $tn[2];
		$pc1st = "00/00/0000";
		$pclast = "00/00/0000";
		$inst = $tn[3];
		$relator = $tn[4];
		$data = date("Y-m-d");
		$tipo = '';
		$versao = '';

		/* Valida dados do protocolo */
		$this -> protocolo_na_base($caae, $titulo, $autor, $pc1st, $pclast, 1, $inst);		
		return(1);
	}
	
	function busca_relator($relator)
		{
			/* Recupera Relator */
			$w = troca($relator,' ',';');
			$w = splitx(';',$w);
			$wh = '';
			for ($r=0;$r < count($w);$r++)
				{
					$nome = $w[$r];
					if (strlen($nome) > 1)
						{
							if (strlen($wh) > 0) { $wh .= ' AND '; }
						$wh .= " us_nome like '%$nome%' ";
						}
				}
			$sql = "select * from us_usuario where ".$wh;
			$rrr = $this -> db -> query($sql);
			$rrr = $rrr -> result_array();
			if (count($rrr) > 0)
				{
					$relator = $rrr[0]['id_us'];
				} else {
					$relator = 0;
				}	
			return($relator);		
		}

	function protocolo_na_base($caae, $titulo, $autor, $pc1st, $pclast, $situacao = 1, $inst = "") {
		$pc1st = substr($pc1st, 6, 4) . substr($pc1st, 3, 2) . substr($pc1st, 0, 2);
		$pclast = substr($pclast, 6, 4) . substr($pclast, 3, 2) . substr($pclast, 0, 2);
		$sql = "select * from cep_protocolo where pc_caae = '$caae' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			$sql = "insert into cep_protocolo 
								(
								pc_caae, pc_autor, pc_dt_1st,
								pc_dt_last, pc_situacao, pc_instituicao,
								pc_titulo
								) values (
								'$caae','$autor','$pc1st',
								'$pclast','$situacao', '$inst',
								'$titulo')
					";
			$rlt = $this -> db -> query($sql);
			return (1);
		} else {
			$line = $rlt[0];
			$up = array();
			if ((strlen($titulo) > 0) and (strlen($line['pc_titulo']) == 0)) {
				array_push($up, " pc_titulo = '$titulo' ");
			}
			if (($pc1st != '00000000') and ($line['pc_dt_1st'] == '0000-00-00')) {
				array_push($up, " pc_dt_1st = '$pc1st' ");
			}

			if (count($up) > 0) {
				$sql = "update cep_protocolo set ";
				for ($r = 0; $r < count($up); $r++) {
					if ($r > 0) { $sql .= ', '; }
					$sql .= $up[$r];
				}
				$sql .= "where pc_caae = '$caae' ";
				$rlt = $this->db->query($sql);
			}
		}
	}

}
?>
