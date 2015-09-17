<?php
class credenciamentos extends CI_Model {
	var $key = '99me0r9vm0e09347987cecem';
	var $sala = 5;
	var $bloco = 123;
	
	function set_evento($id)
		{
			$data = array('evento_id'=>$id);
			$this->session->set_userdata($data);
			return(0);
		}

	function presentes($data, $bloco) {
		$sql = "select count(*) as total from evento_registro 
							where r_bloco = $bloco 
							and r_data = '" . $data . "' and r_status ='A' ";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			return ($line['total']);
		} else {
			return (0);
		}
	}

	function eventos_sel($id) {

	}

	function sala() {
		$bloco = 123;
		$date = date("Y-m-d");
		$data = array();
		$data['sala'] = '5';
		$data['sala_nome'] = 'Auditório Maria Madalena do Rocio';
		$data['bloco'] = $bloco;
		$data['bloco_nome'] = 'Apresentação Oral';

		$data['presente'] = $this -> presentes($date, $bloco);
		$data['logo_evento'] = base_url('img/evento/evento_002_banner.png');
		return ($data);
	}

	function registra($id) {
		$bloco = $this -> bloco;
		$sala = $this -> sala;
		$date = date("Y-m-d");
		$hora = date("H:i:s");
		$id = strzero($id, 11);

		$sql = "select * from evento_registro 
							where r_bloco = $bloco 
							and r_data = '" . $date . "' 
							and r_id = '$id'
							and r_status = 'A'
							";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			$tempo = 0;
			$sql = "update evento_registro set 
									r_status = 'B',
									r_hora_saida = '$hora',
									r_permanencia = $tempo
							where id_r = " . $line['id_r'];
			$rlt = $this->db->query($sql);
		} else {
			$sql = "insert into evento_registro
							(
							r_sala, r_data, r_hora_entrada,
							r_bloco, r_id, r_status,
							r_hora_saida, r_permanencia
							)
							values
							(
							'$sala','$date','$hora',
							'$bloco','$id','A',
							'',0
							)					
					";
			$rlt = $this->db->query($sql);
			return (0);
		}
	}

	function registro_form() {
		$id = sonumero($this -> input -> post("dd1"));
		if (strlen($id) > 0) {
			$this -> registra($id);
			redirect(base_url('index.php/credenciamento/registro'));
		}

		$form = new form;
		$cp = array();
		$cp[0] = array('$H8', '', '', False, False);
		$cp[1] = array('$S15', '', 'ID', True, True);
		$cp[2] = array('$B8', '', 'Registrar', False, False);
		$tela = $form -> editar($cp, '');
		$tela .= '
			<script>
				$("#dd1").focus();
			</script>
			';
		return ($tela);
	}

	function eventos_ativos_lista() {
		$data = date("Y-m-d");
		$sql = "select * from evento_nome where ev_ativo = 1 and ev_de <= '$data' and ev_ate >= '$data' ";
		$rlt = db_query($sql);
		$sx = '<ul>';
		while ($line = db_read($rlt)) {
			$link = '<A HREF="' . base_url('index.php/credenciamento/evento_sel/' . $line['id_ev'] . '/' . checkpost_link($line['id_ev'] . $this -> key)) . '">';
			$sx .= '<li>';
			$sx .= $link;
			$sx .= $line['ev_nome'];
			$sx .= '</A>';
			$sx .= '</li>';
		}
		$sx .= '</ul>';
		return ($sx);
	}

}
?>
