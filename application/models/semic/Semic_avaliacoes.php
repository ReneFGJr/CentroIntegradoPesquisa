<?php
class semic_avaliacoes extends CI_Model {
	function set_avaliador($id, $nome) {
		$chk = md5($id . $nome . 'SeMiC' . date("Ymd"));
		$se = array('id' => $id, 'nome' => $nome, 'chk' => $chk);
		$this->session->set_userdata($se);
		return(1);
	}
	

	function avaliadores_row($ano)
		{
		$ano = date("Y");
		$ano2 = ($ano-1);
		$cp = 'avaliador';
		$sql = "select * from ( 
							SELECT sb_avaliador_1 as avaliador, sb_avaliador_situacao_1 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_1 > 0 
								union 
							SELECT sb_avaliador_2 as avaliador, sb_avaliador_situacao_2 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_2 > 0 
								union 
							SELECT sb_avaliador_3 as avaliador, sb_avaliador_situacao_3 as situacao FROM semic_bloco WHERE sb_ano = '$ano' and sb_avaliador_3 > 0
								union 
							SELECT st_avaliador_1 as avaliador, st_avaliador_situacao_1 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_1 > 0						
								union 
							SELECT st_avaliador_2 as avaliador, st_avaliador_situacao_2 as situacao FROM semic_nota_trabalhos WHERE st_ano = '$ano2' and st_avaliador_2 > 0						
							) as tabela
						inner join us_usuario on id_us = avaliador
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join ies_instituicao on ies_instituicao_ies_id = id_ies
						group by $cp
						order by us_nome	
				";
		$rlt = db_query($sql);
		$sx = '<table width="1024" class="tabela01" align="center" border=0>';
		$tot = 0;
		while ($line = db_read($rlt))
			{
				$link = '<a href="'.base_url('index.php/semic_avaliacao/avaliador/'.$line['id_us'].'/'.checkpost_link($line['id_us'])).'" class="link lt2">';
				$tot++;
				$sx .= '<tr>';
				$sx .= '<td height="25" class="borderb1">';
				$sx .= $link.$line['ust_titulacao_sigla'];
				$sx .= ' ';
				$sx .= $line['us_nome'].'</a>';
				$sx .= '</td>';
							
				$sx .= '<td class="borderb1">';
				$sx .= $link.$line['ies_sigla'].'</a>';
				$sx .= '</td>';
				
				$sx .= '<td class="borderb1">';
				$sx .= $link.$line['us_campus_vinculo'].'</a>';
				$sx .= '</td>';
			}
		$sx .= '<tr><td colspan=4>Total '.$tot.' Avaliadores</td></tr>';
		$sx .= '</table>';
		return($sx);
		}

	function security() {
		$id = $this -> session -> userdata("id");
		$nome = $this -> session -> userdata("nome");
		$chk = $this -> session -> userdata("chk");
		
		$chk2 = md5($id . $nome . 'SeMiC' . date("Ymd"));
		if ($chk == $chk2)
			{
				$this->set_avaliador($id, $nome);		
			} else {
				redirect('index.php/semic_avaliacao');
			}	
	}

}
?>
