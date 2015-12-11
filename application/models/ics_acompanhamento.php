<?php
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
				$size = round(250 * count($action) + 60);
				$sa = '';
				$sb = '';
				$sc = '';
				foreach ($action as $key => $value) {
					$form_bt = '<form action="'.base_url('index.php/pibic/entrega/'.$key).'" method="get">';
					$form_bt .= '<input type="submit" value="'.msg('bt_entregar').'" class="botao3d back_green_shadown back_green" style="width: '.$size.'px; text-align: center;">';
					$form_bt .= '</form>';
					$sa .= '<td class="lt2 border1" align="center">'.msg($key).'</td>';
					$sb .= '<td class="lt5 border1" align="center">'.$value.'</td>';
					$sc .= '<td class="lt3" align="center">'.$form_bt.'</td>';
				}
				$sx = '<table width="'.$size.'" bgcolor="#ffecec" style="padding: 10px;">';
				$label = '<td rowspan=4 width="50" >';
				//$label .= '<img src="'.base_url('img/icon/icone_atividade.png').'" height="60">';
				$label .= '<img src="'.base_url('img/icon/icone_exclamation.png').'" height="60">';
				$label .= '</td>';
				
				$sx .= $label;
				$sx .= '<td class="lt5"><font class="red"><b>'.msg("ic_atividade_aberta").'</b></font></td>';
				$sx .= '<tr>'.$sa.'</tr>';
				$sx .= '<tr>'.$sb.'</tr>';
				$sx .= '<tr>'.$sc.'</tr>';
				$sx .= '</table>';
				$sx .= '<br><br><br>';
			} else {
				$sx = '';
			}
		return ($sx);
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
