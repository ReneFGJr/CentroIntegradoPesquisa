<?php
class avaliadores extends CI_Model {
	
	/*************** áreas do avaliador ****************************************/
	function avaliador_area($id)
		{
			$sql = "select * from us_usuario
						left join us_avaliador_area on pa_parecerista = id_us
						left join us_avaliador_situacao on us_avaliador = id_as
						left join area_conhecimento on ac_cnpq = pa_area
						left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
					where id_us = $id
					order by us_nome, ac_cnpq					
			";
			$rlt = db_query($sql);
			$sx = '';
			$xcracha = '';
			$to1 = 0;
			while ($line = db_read($rlt))
				{
					$idp = $line['id_us'];
					$ida = $line['id_pa'];
					$linkx = ' onclick="change_area('.$ida.');" ';
					$link = base_url('index.php/avaliador/view/'.$line['id_us'].'/'.checkpost_link($line['id_us']));
					$link = '<a href="'.$link.'" target="_new" class="link lt1">';
					$acao = '<b>ativo</b>';
					$class_acao = ' class="bt_acao" ';
					if ($line['pa_ativo'] == '0')
						{
							$class_acao = ' class="bt_desativado" ';
							$acao = '<b>inativo</b>';
						}					
					$sx .= '<tr>';
					$sx .= '<td class="border1" width="70">'.$line['ac_cnpq'].'</td>';
					$sx .= '<td width="70" id="td'.$ida.'" align="center" '.$linkx.' ><div '.$class_acao.'>'.$acao.'</div></td>';
					$sx .= '<td class="border1" >'.$line['ac_nome_area'].'</td>';
					$sx .= '<td class="border1" align="center" width="80">'.stodbr($line['pa_update']).'</td>';
					$sx .= '</tr>';
				}
			$sx .= '<tr><td colspan="10">Total de '.$to1.' avaliadores</td></tr>';
			$sx .= '
			<script>
				function change_area($id)
					{
						var $url = "'.base_url('index.php/avaliador/ajax_change/'.$idp).'/"+$id;
						var $div = "#td"+$id;
						$.ajax($url)
  						 .done(function(data) {
  						 		$($div).html(data);
  							})
  						.fail(function() {
    							alert( "error" );
  						})
  					}
			</script>
			';
			return($sx);
		}


	function avaliadores_area()
		{
			$sql = "select * from us_usuario
						left join us_avaliador_area on pa_parecerista = id_us
						left join us_avaliador_situacao on us_avaliador = id_as
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join area_conhecimento on ac_cnpq = pa_area
						left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
					where us_avaliador > 0
					order by us_nome, ac_cnpq					
			";
			$rlt = db_query($sql);
			$sx = '<table width="100%" class="lt1">';
			$sx .= '<tr><th>';
			$xcracha = '';
			$to1 = 0;
			while ($line = db_read($rlt))
				{
					$link = base_url('index.php/avaliador/view/'.$line['id_us'].'/'.checkpost_link($line['id_us']));
					$link = '<a href="'.$link.'" target="_new" class="link lt1">';
					$cracha = trim($line['id_us']);
					if ($xcracha != $cracha)
						{
							$to1++;
							$sx .= '<tr>';
							$sx .= '<td style="padding: 3px;"  class="border1" align="center" width="70">'.$link.$line['us_cracha'].'</a>'.'</td>';
							$sx .= '<td style="padding: 3px;"  class="border1">'.$line['ust_titulacao_sigla'].' '.$line['us_nome'].'</td>';
							$sx .= '<td style="padding: 3px;"  class="border1">'.$line['us_campus_vinculo'].'</td>';									
							$sx .= '<td style="padding: 3px;"  class="border1" align="center" width="150" bgcolor="'.$line['as_cor'].'">'.$line['as_situacao'].'</td>';
							$sx .= '</tr>';
							$xcracha = $cracha;
						}
					/* */
					$nome_area = $line['ac_cnpq'].' - '.$line['ac_nome_area'];
					if (strlen(trim($line['ac_cnpq']))==0)
						{
							$nome_area = '<font color="red">'.msg('area_nao_definida').'</font>';
						}
					$sx .= '<tr>';
					$sx .= '<td>';
					$sx .= '<td>'.$nome_area.'</td>';
				}
			$sx .= '<tr><td colspan="10">Total de '.$to1.' avaliadores</td></tr>';
			$sx .= '</table>';
			return($sx);
		}
	
	/****************************** REGRA DE SELECAO DE AVALIADOR */
	function regra_avaliadores()
		{
			$sql = "update us_usuario set us_avaliador = 0 where 1=1 ";
			$rlt = $this->db->query($sql);
			
			/* Professores Stricto Sensu */			
			$sql = "update us_usuario set us_avaliador = 0
						where 
							(
							usuario_titulacao_ust_id = 6 or usuario_titulacao_ust_id = 7
							)
							and us_ativo = 1 
							and us_professor_tipo = 2
							";
			$rlt = $this->db->query($sql);
			
			/* Professores orientadores IC com doutorado */
			$sql = "select * from semic_nota_trabalhos
					inner join us_usuario on st_professor = us_cracha
					where (st_ano = '".(date("Y"))."' or st_ano = '".(date("Y")-1)."' )
					and (usuario_titulacao_ust_id = 6 or usuario_titulacao_ust_id = 7)
					";
			$rlt = db_query($sql);
			$wh = '';
			$to = 0;
			while ($line = db_read($rlt))
				{
					$to++;
					if (strlen($wh) > 0) { $wh .= ' or '; }
					$wh .= ' id_us = '.$line['id_us'];
				}			
			if ($to > 0)
				{
					$sql = "update us_usuario set us_avaliador = 8 where ".$wh;
					$rlt = $this->db->query($sql);
				}		
		}

	function le($id) {
		$tabela = $this->tabela_view();
		
		$sql = "select *
				from
	                us_usuario
	                left join us_hora as h on h.usuario_id_us = us_usuario.id_us
	                left join us_email as e on e.usuario_id_us = us_usuario.id_us
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
				where id_us = ".$id;
		
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
					left join us_avaliador_situacao on us_avaliador = id_as
					left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
					where us_usuario.us_avaliador > 0
					) as docente ";
		return ($tabela);
	}

	function row($obj) {
		
		$obj -> fd = array('id_us', 'us_nome', 'ust_titulacao_sigla', 'us_campus_vinculo', 'us_cracha', 'id_us', 'as_situacao');
		$obj -> lb = array('ID', msg('nome'), msg('titulacao'), msg('campus'), msg('cracha'), msg('id'), msg('ativo'));
		$obj -> mk = array('', 'L', 'L', 'L', 'C');
		return ($obj);
	}

}
?>
