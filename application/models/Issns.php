<?php
class issns extends CI_Model {
	
	function issn_ajuste()
		{
			$sql = "update scimago set issn_l = concat(substr(issn,1,4),substr(issn,6,4)) 
						where issn_l = '' ";
			//or issn_l like '%-%'";
			$rlt = $this->db->query($sql);
			
			/***************** SCIMAGO ********************************/
			$sql = "SELECT * FROM issn_l 
						INNER JOIN scimago on il_issn2 = issn_l
						WHERE issn_l <> il_issn_l2";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$id = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$id++;
					$line = $rlt[$r];
					$issn = $line['il_issn_l2'];
					$issn_old = $line['issn_l'];
					$sql = "update scimago set issn_l = '$issn' where issn_l = '$issn_old' ";
					$rrr = $this->db->query($sql);
				}
			
			/***************** LATTES ********************************/
			$sql = "update cnpq_acpp  set acpp_issn_link = acpp_issn 
						where acpp_issn_link = '' ";
			//or not (acpp_issn_link like '%-%')";
			$rlt = $this->db->query($sql);
						
			
			$sql = "SELECT * FROM issn_l 
						INNER JOIN cnpq_acpp on il_issn2 = acpp_issn_link
						WHERE acpp_issn_link <> il_issn_l2";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$ie = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$ie++;
					$line = $rlt[$r];
					$issn = $line['il_issn_l2'];
					$issn_old = $line['acpp_issn_link'];
					$sql = "update cnpq_acpp set acpp_issn_link = '$issn' where acpp_issn_link = '$issn_old' ";
					$rrr = $this->db->query($sql);
				}
				
				
			/************** WEB QUALIS *******************************/
			$sql = "update webqualis  set wq_issn_l = concat(substr(issn,1,4), substr(issn,6,4))
							where wq_issn_l = '' ";
			//or wq_issn_l like '%-%' ";
			$rlt = $this->db->query($sql);
			
			$sql = "SELECT * FROM issn_l 
						INNER JOIN webqualis on il_issn2 = wq_issn_l
						WHERE wq_issn_l <> il_issn_l2";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$if = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$if++;
					$line = $rlt[$r];
					$issn = $line['il_issn_l2'];
					$issn_old = $line['wq_issn_l'];
					$sql = "update webqualis set wq_issn_l = '$issn' where wq_issn_l = '$issn_old' ";
					$rrr = $this->db->query($sql);
				}				
			$sx = '<h1>Processamento do ISSN-L</h1>';
			$sx .= 'Total de registros processados do SCIMAGO: '.$id.'<br>';
			$sx .= 'Total de registros processados do LATTES: '.$ie.'<br>';
			$sx .= 'Total de registros processados do QUALIS: '.$if.'<br>';
			return($sx);
		}

	function row_scimago($obj) {
		$obj -> fd = array('id_sc', 'issn', 'titulo', 'assunto', 'sjr_quartile', 'h_index', 'pais');
		$obj -> lb = array('ID', 'ISSN', 'Titulo', 'Área', 'Quartil', 'Indice h', 'Pais');
		$obj -> mk = array('', 'L', 'L', 'L', 'C', 'C', 'C');
		return ($obj);
	}

	function scimago_base() {
		// select concat(substr(issn,1,4),substr(issn,6,4)) as issn, min(sjr_quartile) as quaril from scimago group by issn
	}

	function issn_l() {

	}

	function inport_file($id = 0) {
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
		
		if (strlen($temp) == 0) {
			$sx = '
					<center>
							<form id="upload" action="' . base_url('index.php/inport/issn/arquivo/') . '" method="post" enctype="multipart/form-data">
							<input type="file" name="arquivo" id="arquivo" />
							<input type="submit" name="dd1" value="enviar >>>">
						</form>
					</center>					
					';
			return ($sx);
		} else {
			$sx = 'Arquivo lido com sucesso!';
			$rHandle = fopen($temp, "r");
			$sData = '';
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Abrindo Arquivo ';
			while (!feof($rHandle)) {
				$sData .= fread($rHandle, filesize($temp));
			}
			fclose($rHandle);
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Tamanho do arquivo lido ' . number_format(strlen($sData) / 1024, 1, ',', '.') . ' kBytes';
			$sData = troca($sData, chr(13), ';');
			$sData = troca($sData, ';;', ';');

			$ln = 0;
			/* segurança */
			if ((strpos($sData, 'ISSN-L')) and (strpos($sData,'[wejioc20]')) and (strpos($sData,'[break]'))) {
				$sData = troca($sData,'[wejioc20]','');
				$sData = troca($sData,'"',"'");
				
				/* Excluir anteriores */
				$sql = "delete from issn_l where il_manual <> 1";
				$rlt = $this->db->query($sql);

				while (strpos($sData,'[break]'))
					{
						$pos = strpos($sData,'[break]');
						$sql = substr($sData,0,$pos);
						$sData = substr($sData,$pos+strlen('[break]'),strlen($sData));
						
						if (strpos($sql,'il_issn'))
							{
								$sql = troca($sql,';','');
								$this->db->query($sql);
								$sx .= '. ';
							}
					} 
				/* Atualiza tabela de ISSN sem os tracos */
				$sql = "update issn_l set
						il_issn2 = concat(substr(il_issn,1,4),substr(il_issn,6,4)), 
						il_issn_l2 = concat(substr(il_issn_l,1,4),substr(il_issn_l,6,4)) 
						where 1=1";
				$rlt = $this->db->query($sql);		
									
			} else {
				$sx .= '<br><font color="red">Arquivo inválido</font>';
			}

			$sx .= '<BR>Total de linhas: ' . count($ln);
			$sx .= '<BR>Indentificação do tipo de obra: ';
			/* Identicação do tipo de obra */

			return ($sx);
		}
	}

}
?>