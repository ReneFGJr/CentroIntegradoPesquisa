<?php
/*
 */
class ics_acompanhamento extends CI_model {
	var $tabela_acompanhamento = 'switch';
	var $tabela = 'ic';
	var $tabela_2 = "ic_modalidade_bolsa";
	
	function form_acompanhamento_exist($proto='',$tipo='')
		{
			$sql = "select * from ic_acompanhamento 
					where
						pa_protocolo = '$proto' and
						pa_tipo = '$tipo'
					";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			if (count($rlt) == 0)
				{
					$sqlx = "insert into ic_acompanhamento
								(
								pa_protocolo, 	pa_usuario_id, 	pa_tipo,
								pa_status
								) values (
								'$proto',0,'$tipo',
								'@') ";
					$xrlt = $this->db->query($sqlx);
					$rlt = $this->db->query($sql);
					$rlt = $rlt->result_array();
				}
			return($rlt[0]);
		}

	function entregas_abertas() {
		$sis = $this -> sistemas_abertos_para_submissao('PIBIC');
		$sx = '';
		
		/* Ações abertas */
		$action = array();
		/* Questionário de pré-relatorio parcial */
		if (trim($sis['sw_03']) == '1') {
			$f1 = $this -> submissao_questionarios_professor();
			$action = array_merge($f1,$action);			
			$f2 = $this -> submissao_questionarios_aluno();
			$action = array_merge($f2,$action);			
		}
		
		
		/* Mostra atividades */
		if (count($action) > 0)
			{
				$size = round(250 + 60);
				$sa = '';
				$sb = '';
				$sc = '';
				$st = '';
				foreach ($action as $key => $value) {
					$form_bt = '<form action="'.base_url('index.php/pibic/entrega/'.$key).'" method="get">';
					$form_bt .= '<input type="submit" value="'.msg('bt_entregar').'" class="botao3d back_green_shadown back_green" style="width: '.$size.'px; text-align: center;">';
					$form_bt .= '</form>';
					$sa .= '<td class="lt4" align="left"><b>'.msg($key).'</b></td>';
					$sb .= '<td class="lt5" align="left">'.$value.' atividades.</td>';
					$sc .= '<td class="lt3" align="center">'.$form_bt.'</td>';
					$st .= '<td class="lt2" align="left">'.$this->periodo_atividade($key)."</td>'";
				}
				$sx = '<table width="100%" bgcolor="#ececec" style="padding: 10px;" class="border1">';
				$label = '<td rowspan=5 width="50" >';
				//$label .= '<img src="'.base_url('img/icon/icone_atividade.png').'" height="60">';
				$label .= '<img src="'.base_url('img/icon/icone_post_form.png').'" height="90">';
				$label .= '</td>';
				
				$sx .= $label;
				$sx .= '<td class="lt5" width="'.$size.'" colspan=10><font class="red"><b>'.msg("ic_atividade_aberta").'</b></font></td>';
				$sx .= '<td width="50%"></td>';
				$sx .= '<tr><td align="right" class="lt1">Atividade:</td>'.$sa.'</tr>';
				$sx .= '<tr><td align="right" class="lt1">Período:</td>'.$st.'</tr>';
				$sx .= '<tr><td align="right" class="lt1">Para entregar:</td>'.$sb.'</tr>';
				$sx .= '<tr><td></td>'.$sc.'</tr>';
				$sx .= '</table>';
				$sx .= '<br><br><br>';
			} else {
				$sx = '';
			}
		return ($sx);
	}

	function periodo_atividade($n)
		{
			$ano = date("Y");
			$sql = "select * from ic_atividade where at_atividade = '$n' and at_ano = '$ano' ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$sx = 'não informado';
			if (count($rlt) > 0)
				{
					$line = $rlt[0];
					$sx = stodbr($line['at_data_ini']);
					$sx .= ' até ';
					$sx .= stodbr($line['at_data_fim']);
				}
			return($sx);
		}

	/* Submissoes */
	function submissao_questionarios_professor() {
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_prof = '$cracha' 
						and ic_ano = '" . date("Y") . "'
						and s_id = 1
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$data_pre = $line['ic_pre_data'];
			if ($data_pre == '0000-00-00')
				{
				$tot++;
				}
		}
		if ($tot > 0)
			{
				$it = array('IC_FORM_PROF'=>$tot);
			} else {
				$it = array();
			}
		return($it);

	}
	
	/* Submissoes */
	function submissao_questionarios_aluno() {
		/* professor */
		$cracha = $_SESSION['cracha'];
		$sql = "select * from ic
					left join ic_acompanhamento on pa_protocolo = ic_plano_aluno_codigo 
					where ic_cracha_aluno = '$cracha' 
						and ic_ano = '" . date("Y") . "'
						and s_id = 1						
			 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$proto = trim($line['ic_plano_aluno_codigo']);
			$tot++;
		}
		if ($tot > 0)
			{
				$it = array('IC_FORM_ESTU'=>$tot);
			} else {
				$it = array();
			}
		return($it);

	}	

	function sistemas_abertos_para_submissao($tipo = '') {
		$sql = "select * from " . $this -> tabela_acompanhamento . " where sw_tipo = '$tipo' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			return ( array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
		}
	}

}
?>
