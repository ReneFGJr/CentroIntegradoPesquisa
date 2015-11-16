<?php
class ies_comunitarias extends CI_Model
	{
		function vincula($email,$inst)
			{
				$sql = "select * from ies_contato_pessoal where iescp_email = '$email' and iesi_id = '$inst' ";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				if (count($rlt) == 0)
					{
						$sql = "insert into ies_contato_pessoal 
								(iescp_email, iesi_id)
								values
								('$email',$inst)
						";
						$rlt = $this->db->query($sql);
					}
				return(1);
			}
		function row()
			{
				$sql = "SELECT ies_nome, ies_sigla, ies_abruc, ies_ggrupo, 
							ies_foprop, iesc_contato, iescp_email FROM `ies_instituicao` 
							left join ies_contato on ies_contato.iesi_id = ies_instituicao.id_ies 
							left join ies_contato_pessoal on ies_contato_pessoal.iesi_id = ies_instituicao.id_ies 
							WHERE `ies_ggrupo` ='S' or `ies_abruc` = 'S'
							order by ies_nome, iesc_contato
							";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				
				$sx = '<h2>Comunitárias</h2>';	
				$sx .= '<table width="100%" class="lt1">';
				$sx .= '<tr>
							<th>Instituição</th>
							<th>sigla</th>
							<th>ABRUC</th>
							<th>Group</th>
							<th>FOPROP</th>
							<th>Nome</th>
						';
				$id = 0;
				for ($r=0;$r < count($rlt);$r++)
					{
						$id++;
						$line = $rlt[$r];
						$sx .= '<tr>';
						$sx .= '<td class="border1">';
						$sx .= $line['ies_nome'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_sigla'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_abruc'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_ggrupo'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_foprop'];
						$sx .= '</td>';
						$sx .= '<td class="border1">';
						$sx .= $line['iesc_contato'];
						$sx .= '</td>';
						$sx .= '</tr>';
					}
				$sx .= '<tr><td colspan=10>Total '.$id;
				$sx .= '</table>';
				return($sx);
				
			}
		/* */
		function row2()
			{
				$sql = "SELECT ies_nome, ies_sigla, ies_abruc, ies_ggrupo, 
							ies_foprop 
						FROM `ies_instituicao` 
							WHERE `ies_ggrupo` ='S' or `ies_abruc` = 'S'
							order by ies_nome
							";
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				
				$sx = '<h2>Comunitárias</h2>';	
				$sx .= '<table width="100%" class="lt1">';
				$sx .= '<tr>
							<th>Instituição</th>
							<th>sigla</th>
							<th>ABRUC</th>
							<th>Group</th>
							<th>FOPROP</th>
						';
				$id = 0;
				for ($r=0;$r < count($rlt);$r++)
					{
						$id++;
						$line = $rlt[$r];
						$sx .= '<tr>';
						$sx .= '<td class="border1">';
						$sx .= $line['ies_nome'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_sigla'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_abruc'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_ggrupo'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_foprop'];
						$sx .= '</td>';
						$sx .= '</tr>';
					}
				$sx .= '<tr><td colspan=10>Total '.$id;
				$sx .= '</table>';
				return($sx);
				
			}
		/* */
		function row3()
			{
				$sql = "select * from ies_email_ggrupo
						left join ies_contato_pessoal on iescp_email = iese_email
						left join ies_instituicao on id_ies = iesi_id
						order by ies_nome
						";							
				$rlt = $this->db->query($sql);
				$rlt = $rlt->result_array();
				
				$sx = '<h2>Comunitárias</h2>';	
				$sx .= '<table width="100%" class="lt1">';
				$sx .= '<tr>
							<th>Instituição</th>
							<th>sigla</th>
							<th>ABRUC</th>
							<th>Group</th>
							<th>FOPROP</th>
						';
				$id = 0;
				for ($r=0;$r < count($rlt);$r++)
					{
						$line = $rlt[$r];
						$id++;
						$email = $line['iese_email'];
						$x = strpos($email,'@');
						$email1 = substr($email,0,$x);
						$email2 = substr($email,$x+1,strlen($email));
						  
						$link = '<A href="#" onclick="newxy(\''.base_url('index.php/ies/vinculo/'.$email1.'/'.$email2).'\',800,300);">';
						if (strlen(trim($line['ies_nome'])) > 0)
							{
								$link = '';
							}
						
						$sx .= '<tr>';
						$sx .= '<td class="border1">';
						$sx .= $line['ies_nome'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_sigla'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_abruc'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_ggrupo'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="center">';
						$sx .= $line['ies_foprop'];
						$sx .= '</td>';
						$sx .= '<td class="border1" align="left">';
						$sx .= $link;
						$sx .= $line['iese_email'];
						$sx .= '</a>';
						$sx .= '</td>';
												
						$sx .= '</tr>';
					}
				$sx .= '<tr><td colspan=10>Total '.$id;
				$sx .= '</table>';
				return($sx);
				
			}

	}
