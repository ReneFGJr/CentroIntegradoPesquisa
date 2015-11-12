<?php
class discentes extends CI_Model {
	
	function limpar_habilitacao_curso()
		{
			$t = ' - Hab.:';
			$sql = "select * from us_usuario where us_curso_vinculo like '%".$t."%' ";
			$sql .= "limit 10";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$tot = 0;
			$sx = '';
			for ($r=0;$r < count($rlt);$r++)
			{
				$line = $rlt[$r];
				
				$tot = 0;
				$curso = trim($line['us_curso_vinculo']);
				$pos = strpos($curso,$t);
				if ($pos > 0)
					{
						$curso2 = troca($curso,$t,':');
						$sx .= $curso.'<BR>'.$curso2;
						$sx .= '<HR>';
						
						$sql = "update us_usuario set us_curso_vinculo = '".$curso2."' where us_curso_vinculo = '".$curso."' ";
						$this->db->query($sql);
					}
			}
			return($sx);
		}
	
	function limpar_turno_curso_estudante()
		{
			$sql = "select * from us_usuario where us_curso_vinculo like '%(%' ";
			$sql .= "limit 10";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$tot = 0;
			$sx = '';
			for ($r=0;$r < count($rlt);$r++)
			{
				$line = $rlt[$r];
				
				$tot = 0;
				$curso = trim($line['us_curso_vinculo']);
				$pos = strpos($curso,'(');
				if ($pos > 0)
					{
						$curso2 = substr($curso,0,$pos);
						$sx .= $curso.'<BR>'.$curso2;
						$sx .= '<HR>';
						
						$sql = "update us_usuario set us_curso_vinculo = '".$curso2."' where us_curso_vinculo = '".$curso."' ";
						$this->db->query($sql);
					}
			}
			return($sx);
		}	

	function le($id) {
		$tabela = $this->tabela_view();
		
		$sql = "select *
				from
	                us_usuario
	                left join us_hora as h on h.usuario_id_us = us_usuario.id_us
	                left join us_email as e on e.usuario_id_us = us_usuario.id_us
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
				where us_usuario.usuario_tipo_ust_id = 3
					and id_us = ".$id;
		
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {

			if ($line['ush_stricto_sensu'] > 0) { $line['us_ss'] = 'SIM'; } else { $line['us_ss'] = 'NÃO'; }
			$line['us_lattes'] = '';
			
			/* Regime */
			$rg = trim($line['us_regime']);
			if ($rg == 'Tempo Inte') { $rg = 'Tempo Integral'; }
			if ($rg == 'Tempo Parc') { $rg = 'Tempo Parcial'; }
			if ($rg == 'Professore') { $rg = 'Horista'; }
			$line['us_regime'] = $rg;
			
			/*********** Produtividade */
			$prod = '';
			if (strlen($prod) ==0) { $prod = 'não'; }
			$line['bmod_modalidade'] = $prod;
			
			/*********** GENERO */
			if ($line['us_genero']='M') { $line['us_genero'] = msg('Masculino'); }
			if ($line['us_genero']='F') { $line['us_genero'] = msg('Feminino'); }
			
			/************ us_emplid */
			if (strlen(trim($line['us_emplid'])) == 0) { $line['us_emplid'] =  'na'; }
			
			/************ us_emplid */
			if (strlen(trim($line['us_cpf'])) > 0) { $line['us_cpf'] =  mask_cpf($line['us_cpf']); }
			
			
			return ($line);
		} else {
			return ( array());
		}
	}

	function tabela_view() {
		$tabela = "(select * from us_usuario
					where us_usuario.usuario_tipo_ust_id = 2
					) as docente ";
		return ($tabela);
	}

	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_emplid', 'id_us', 'us_ativo');
		$obj -> lb = array('ID', msg('nome'), msg('cracha'), msg('emplid'), msg('id'), msg('ativo'));
		$obj -> mk = array('', 'L', 'L', 'L', 'C');
		return ($obj);
	}

}
?>
