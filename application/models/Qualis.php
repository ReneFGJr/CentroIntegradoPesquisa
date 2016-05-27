<?php
class qualis extends CI_Model {
	
	function insert_qualis($data,$area,$ano)
		{
			$ln = troca($data,'"',';');
			$ln = splitx(';',$ln);
			if (count($ln) < 3)
				{
					return('');
				}
			$issn = $ln[0];
			$journal = $ln[1];
			$journal = troca($journal,"'","´");
			$estrato = $ln[2];
			$sx = '';
			
			if (strlen($issn) != 9)
				{
					$sx = 'OPS <font color="red">'.$issn.' '.$journal.'</font>';
				} else {
					$sql = "select * from webqualis where issn = '$issn' 
									and area_id = $area
									and ano = '$ano' ";
					$rlt = $this->db->query($sql);
					$rlt = $rlt->result_array();
					$sx .= $issn.' '.$estrato.' '.$journal;
					if (count($rlt) > 0)
						{
							$sx .= '(<font color="blue">update</font>) ';
						} else {
							$sql = "insert into webqualis
									(
									issn, wq_issn_l, titulo, 
									estrato, area_id, ano
									) values (
									'$issn','','$journal',
									'$estrato','$area','$ano') ";
							$this->db->query($sql);
							$sx .= '(<font color="green">inserido</font>) ';
						} 										
				}
			return($sx);
		}

	function excluir_estrato_area($id=0)
		{
			$sql = "delete from webqualis where area_id = $id ";
			$this->db->query($sql);
			
			return(1);
		}
		
	function inport_file($id = 0) {
		$dd2 = get("dd2");
		if (isset($_POST['dd1'])) { $dd1 = $_POST['dd1'];
		} else { $dd1 = '';
		}
		$file = '';
		if (strlen($dd1) > 0) {
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];
			$file = $_FILES['arquivo']['name'];
		} else {
			$temp = '';
		}

		$sx = '';
		if ((strlen($temp) == 0) or (strlen($dd2) == 0)) {
			$sa = '<div class="rows">
					Selecione a área de avaliação:<select name="dd2"><option>::defina a área</option>';
			$sql = "select * from area_avaliacao where area_avaliacao_ativa = 1";
			$rlt = $rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$sa .= '<option value="' . $line['id_area'] . '">' . $line['area_avaliacao_nome'] . '</option>' . cr();
			}
			$sa .= '</select>';
			$sx = '	<br><br>
					
							<form id="upload" action="' . base_url('index.php/inport/capes/qualis/') . '" method="post" enctype="multipart/form-data">
							' . $sa . '<br><br>
							<input type="file" name="arquivo" id="arquivo" />
							<BR>
							<input type="submit" name="dd1" value="enviar >>>">
						</form>
					</div>					
					';
			return ($sx);
		} else {
			$sx = 'Arquivo lido com sucesso!';
			$area = get("dd2");
			
			/* Excluir */
			$sx .= '<br>Exclir estrato anteriores da área';
			$this->excluir_estrato_area($area);
			$rHandle = fopen($temp, "r");
			$sData = '';
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Abrindo Arquivo ';
			while (!feof($rHandle)) {
				$sData .= fread($rHandle, filesize($temp));
			}
			fclose($rHandle);
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Tamanho do arquivo lido ' . number_format(strlen($sData) / 1024, 1, ',', '.') . ' kBytes';
			$sData = troca($sData, chr(13), ';');
			$sData = troca($sData, chr(10), ';');
			$sData = troca($sData, chr(11),'_');
			$sData = troca($sData, chr(12),'_');
			$sData = troca($sData, chr(14),'_');
			$sData = troca($sData, chr(15),'_');
			
			$sData = troca($sData, ';;', ';');

			$ln = array();
			$ln = splitx(';',$sData);
			
			/* segurança */
			
			$t1 = strpos('-'.$sData,'"ISSN"');
			$t2 = strpos($sData,'"Título"');
			$t3 = strpos($sData,'"Estrato"');
			
			
			if (($t1 == 0) or ($t2 <= $t1) or ($t3 <= $t2)) {
				$sx .= '<br><font color="red">Arquivo inválido</font>';
			} else {
				$sr = '<table class="tabela00 lt1" width="100%">';
				for ($r=1;$r < count($ln);$r++)
					{
						$issn = $ln[$r][0];
						$qualis = $ln[$r][2];
						$ano = '2014';
						$st = $this->insert_qualis($ln[$r],$area,$ano);
						
						$sr .= '<tr>';
						$sr .= '<td align="center">'.$r.'</td>';
						$sr .= '<td><tt>'.$st.'</tt></td>';					
					}
				$sr .= '</table>';
			}
			$sx .= $sr;
			$sx .= '<BR>Total de linhas: ' . count($ln);
			$sx .= '<BR>Indentificação do tipo de obra: ';
			/* Identicação do tipo de obra */
			return ($sx);
		}
	}

}
