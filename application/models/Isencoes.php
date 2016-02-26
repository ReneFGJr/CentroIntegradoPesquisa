<?php
class isencoes extends CI_model {
	

	/* Isen��es */
	function cp_isencoes_01()
		{
			$cp = array();
			array_push($cp,array('$H8','id_bn','',False,True));
			$txt = '<font class="lt3">';
			$txt .= 'Informar o c�digo do estudante que ira receber a isen��o, conforme ato normativo.';
			$txt .= '<br><br>';
			$txt .= 'Ex:101<b>88112233</b>1 (informe somente os 8 digitos) ';
			$txt .= '<br><br>';
			$txt .= '</font>';
			array_push($cp,array('$M','',$txt,false,True));
			array_push($cp,array('$S8','bn_beneficiario',msg('c�digo do aluno'),True,True));
			array_push($cp,array('$M','','<br><br>',false,True));
			array_push($cp,array('$B8','','Prosseguir >>>',False,True));
			return($cp);
		}
	function cp_isencoes_02($id=0)
		{
			$cp = array();
			$data = $this->le_id($id);
			$idb = $data['bn_beneficiario'];
			$data = $this->usuarios->le_cracha($idb);
			$tela = $this->load->view('perfil/discente',$data,true);
			
			array_push($cp,array('$H8','id_bn','',False,True));
			$txt = $tela;
			array_push($cp,array('$M','',$txt,false,True));
			$op = 'M:Mestrado&D:Doutorado';
			array_push($cp,array('$['.(date("Y")-3).'-'.date("Y").']','bn_ano',msg('entrada_no_programa'),True,True));
			array_push($cp,array('$O '.$op,'bn_modalide',msg('modalidade'),True,True));
			$sql = "select * from ss_programa_pos where pp_ativo = 1 order by pp_nome";
			array_push($cp,array('$Q id_pp:pp_nome:'.$sql,'bn_modalide',msg('programa'),True,True));
			array_push($cp,array('$M','','<br><br>',false,True));
			array_push($cp,array('$B8','','Prosseguir >>>',False,True));
			return($cp);
		}		

	function transfere_para_outra_modalidade($mod='',$proto='')
		{
			
			$sql = "update bonificacao set 
						bn_original_tipo =  '$mod' 
					where bn_codigo = '$proto' and
						bn_original_tipo = 'IPR' ";
			$rlt = $this->db->query($sql);			
			return(1);			
		}
	function habilita_isencao($mod,$user,$proto_original)
		{
			$data = date("Ymd");
			$hora = date("H:i:s");
			$ano = date("Y");
			$us_cracha = $user['us_cracha'];
			$us_nome = $user['us_nome'];
			$sql = "insert into bonificacao
					(
					bn_codigo, bn_ano, bn_professor, 
					bn_professor_nome, bn_professor_cracha, bn_data,
					bn_hora, bn_status, bn_original_protocolo, 
					bn_original_tipo
					) values (
					'','$ano','$us_cracha',
					'$us_nome','','$data',
					'$hora','!','$proto_original',
					'IPR'
					)";
			$rlt = $this->db->query($sql);
			$sql = "update bonificacao set bn_codigo = lpad(id_bn,5,0) 
						where bn_codigo = '' ";
			$rlt = $this->db->query($sql);
		}
		
	function is_insencao_cip($proto)
		{
			$sql = "select * from bonificacao where 
						bn_codigo = '$proto' and 
						bn_original_tipo = 'IPR' and 
						bn_status = 'H' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return(1);
				} else {
					return(0);
				}
		}
	function le($proto)
		{
			$sql = "select * from bonificacao where 
						bn_codigo = '$proto'";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return($rlt[0]);
				} else {
					return(array());
				}
		}		

	function le_id($id)
		{
			$sql = "select * from bonificacao where 
						id_bn = '$id'";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) > 0)
				{
					return($rlt[0]);
				} else {
					return(array());
				}
		}		
		
	function cp_isencao_cip_capes()
		{
			$cp = array();
			array_push($cp,array('$H8','','',False,False));
			array_push($cp,array('$S6','',msg('fomento_processo'),True,True));
			array_push($cp,array('$O 1:SIM&0:N�O','',msg('isencao_reabirir'),True,True));
			array_push($cp,array('$C6','',msg('isencao_confirmar'),True,True));
			array_push($cp,array('$B6','',msg('submit'),false,True));
			return($cp);
		}
	
	function minhas_isencoes($cracha)
		{
		$sql = "select count(*) as total, bn_status, bns_descricao
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
							WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
				group by bn_status, bns_descricao  ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		
		if (count($rlt) > 0)
			{
			$sz = ' width="'.round(100 / count($rlt)).'%" ';
			$sx = '<table width="350" class="captacao_folha border1 black" style="margin: 20px;" align="right">
						<tr><td colspan=10 class="lt5">Isen��o de Estudantes</td></tr>
						<tr>
						';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$sx .= '<td align="center" class="lt0 captacao_folha bg_bordo" '.$sz.'>';
					$sx .= $line['bns_descricao'];
					$sx .= '</br>';
					$sx .= '<font class="lt6"><b>'.$line['total'].'</b></font>';
				}
			$sx .= '</tr>';
			$sx .= '<tr><td colspan=10 align="left"><a href="'.base_url('index.php/ss/isencoes').'" class="link lt2">'.msg('ver_isencoes').'</a>';
			$sx .= '</table>';
			$sx .= '<br>';
			}
		return($sx);
		}

	function lista_minhas_isencoes($cracha)
		{
		$sx = '';
		$sql = "select *
					FROM bonificacao
					LEFT JOIN bonificacao_situacao on bns_codigo = bn_status 
					LEFT JOIN captacao on ca_protocolo = bn_original_protocolo
							WHERE bn_original_tipo = 'IPR' and bn_professor = '$cracha'
							and bn_status = '!'
				group by bn_status, bns_descricao  ";
				
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		$sx = '<table class="tabela01 lt3" width="100%" border=0 cellpadding=5>';
		$sx .= '<tr>
					<th width="5%">Protocolo</th>
					<th>T�tulo Projeto</th>
					<th width="5%">Ag�ncia</th>
					<th width="5%">Edital</th>
					<th>Edital descri��o</th>
					<th width="15%">Situa��o</th>
					<th width="12%">Situa��o</th>
				</tr>';		
		if (count($rlt) > 0)
			{
			$tot = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$tot++;
					$line = $rlt[$r];
					$link = base_url('index.php/ss/indicar_isencao/'.$line['id_bn'].'/'.checkpost_link($line['id_bn'])); 
					$acao = '<a href="'.$link.'" class="botao3d back_green_shadown back_green">Inidicar isen��o</a>';
					$line['acao'] = $acao;
					$sx .= $this->load->view('isencoes/simple_row',$line,true);
				}
			if ($tot > 0)
				{
					$sx .= '<tr><td colspan=10>Total de '.$tot.' isen��es dispon�veis(is)</td></tr>';
				} else {
					$sx .= '<tr><td colspan=10 class="lt3">'.msg('nenhum insen��o dispon�vel').'</td></tr>';
				}
			}
		$sx .= '</table>';
		return($sx);
		}

		
	function lista_status($st = '') {
		if (strlen($st) > 0)
			{
				$sz = '35%';
				$wh = " bn_status = '$st' and ";
				$th = '';
			} else {
				$wh = '';
				$sz = '20%';
				$th = '<th width="20%">Situa��o</th>';
			}
		$sql = "select * from bonificacao
						LEFT JOIN us_usuario on bn_beneficiario = us_cracha
						LEFT JOIN bonificacao_situacao on bn_status = bns_codigo
						WHERE $wh bn_original_tipo = 'IPR'
						ORDER BY bn_professor_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		if (count($rlt) > 0) {
			$sx = '<table width="100%" class="tabela00 lt1">';
			if (strlen($st) > 0)
				{
					$sx .= '<tr><td colspan="10" class="lt5">Situa��o: ' . $rlt[0]['bns_descricao'] . '</td></tr>';
				}

			$sx .= '<tr>
						<th width="2%">#</th>
						<th width="5%">Protocolo</th>
						<th width="'.$sz.'">Professor</th>
						<th width="3%">Tipo</th>
						<th width="5%">Dt. Libera��o</th>
						<th width="'.$sz.'">Benefici�rio</th>
						'.$th.'
					</tr>';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				$sx .= '<tr>';
				$sx .= '<td align="center">'.($r+1).'.</td>';
				$sx .= '<td>' . $line['bn_original_protocolo'] . '</td>';
				$sx .= '<td>' . $line['bn_professor_nome'] . '</td>';

				$sx .= '<td align="center">' . $line['bn_original_tipo'] . '</td>';
				//$sx .= '<td>'.$line['bn_nome'].'</td>';

				$sx .= '<td align="center">' . stodbr($line['bn_data']) . '</td>';

				$sx .= '<td>' . link_perfil($line['us_nome'],$line['id_us']) . '</td>';
			if (strlen($st) == 0)
				{
				$sx .= '<td>' . $line['bns_descricao'] . '</td>';	
				}				
			}
			$sx .= '</table>';
		} else {
			$sx .= msg('nada a listar');
		}
		
		return ($sx);
	}

}
?>