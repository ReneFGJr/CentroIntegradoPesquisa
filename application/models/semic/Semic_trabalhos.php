<?php
class semic_trabalhos extends CI_Model
	{
		var $tabela = 'semic_ic_trabalho';
		
		function lista_trabalhos($prof)
			{
				$sql = "select * from semic_nota_trabalhos
							left join us_usuario on us_cracha = st_aluno 
							where st_professor = '$prof' ";
				$rlt = db_query($sql);
				$sx = '<table width="100%" class="tabela01 lt1">';
				while ($line = db_read($rlt))
					{
						$sx .= $this->show_small($line);
					}
				$sx .= '</table>';
				return($sx);
			}
		function tipo_apresentacao($line)
			{
				$sx = '<font color="red">não indicado</font>';
				if ($line['st_poster'] == 'S') { $sx = 'pôster'; }
				if ($line['st_oral'] == 'S') { $sx = 'oral'; }
				if (($line['st_oral'] == 'S') and ($line['st_poster'] == 'S')) { $sx = 'oral/pôster'; }
				return($sx);
			}
		function show_small($line,$tipo=1)
			{
				$idt = trim($line['st_section']);
				$idt .= trim($line['st_nr']);
				
				/* Links */
				$link = '<A href="'.base_url('index.php/ic/view/'.$line['st_codigo'].'/'.checkpost_link($line['st_codigo'])).'" class="link lt1">';
				$link_dis = '<A href="'.base_url('index.php/estudante/view/'.$line['id_us'].'/'.checkpost_link($line['id_us'])).'" class="link lt1">';
				
				$sx = '';
				if (trim($line['st_edital']) == 'PIBITI') { $idt .= 'T'; }
				if (trim($line['st_eng']) == 'S') { $idt = 'i'.$idt; }
				
				/* Apresentado */
				switch ($line['st_apresentado'])
					{
					case (1):
						$sa = 'Apresentado';
						break;
					case (0):
						$sa = '<font color="red">Não apresentou</font>';
						break;
					default:
						$sa = 'não informado';
						break;
					}
				switch ($tipo)
					{
					case 1:
						$sx .= '<tr>';
						$sx .= '<td align="center">'.$line['st_edital'].'</td>';
						$sx .= '<td align="center">'.$link.$line['st_codigo'].'</a>'.'</td>';
						$sx .= '<td>'.$idt.'</td>';
						$sx .= '<td align="center">'.$this->tipo_apresentacao($line).'</td>';
						$sx .= '<td>'.$link_dis.$line['us_nome'].'</A>'.'</td>';
						$sx .= '<td align="center">'.$line['st_ano'].'</td>';
						$sx .= '<td>'.$sa.'</td>';  
						$sx .= cr();
					}
				return($sx);
			}
	}