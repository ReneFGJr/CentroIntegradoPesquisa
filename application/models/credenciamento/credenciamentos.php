<?php
class credenciamentos extends CI_Model {
	var $key = '99me0r9vm0e09347987cecem';
	var $sala = 5;
	var $bloco = 123;

	var $nome = '';
	var $cracha = '';

	function set_evento($id) {
		$data = array('evento_id' => $id);
		$this -> session -> set_userdata($data);
		return (0);
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
			$rlt = $this -> db -> query($sql);
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
			$rlt = $this -> db -> query($sql);
			return (0);
		}
	}

	function registro_form() {
		$this -> load -> model("usuarios");

		$id = sonumero($this -> input -> post("dd1"));
		if (strlen($id) > 0) {
			$id = $this -> usuarios -> limpa_cracha($id);
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

	function entrega_kit_pessoa($id) {
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];

		$evento = round($_SESSION['evento_id']);

		$sql = "insert into evento_kits 
							(
							kits_user_id, kits_data, kits_hora,
							kits_ip, kits_evento
							) values (
							$id,'$data','$hora',
							'$ip',$evento)
					";
		$this -> db -> query($sql);
	}

	function entrega_kit($cracha) {
		$this -> load -> model("usuarios");
		$cracha = $this -> usuarios -> limpa_cracha($cracha);

		if (strlen($cracha) == 8) {

			/* Recupera dados do participante */
			$line = $this -> usuarios -> le_cracha($cracha);
			$id = 0;
			if (isset($line['id_us'])) {
				$id = $line['id_us'];
				$this -> nome = $line['us_nome'];
				$this -> cracha = $line['us_cracha'];
			}

			/* Valida se tem IC */
			$edital = $this -> is_ic($cracha);
			if (count($edital) > 0) {
				$mod = trim($edital['st_edital']);
			} else {
				$mod = '';
			}

			/* Pode retirar o Kit */
			if (strlen($mod) > 0) {
				/* Verifica se já não retirou */
				$sql = "select * from evento_kits 
							where kits_user_id = $id
						";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					/* Já retirou */
					return ('2');
				}

				if (count($edital) > 0) {
					if ($edital['st_professor'] == $cracha) {
						$this -> entrega_kit_pessoa($id);
						return ('20');
					}
					if ($mod == 'PIBIC') {
						$this -> entrega_kit_pessoa($id);
						return ('10');
					}
					/* PIBITI */
					if ($mod == 'PIBITI') {
						$this -> entrega_kit_pessoa($id);
						return ('11');
					}
					if ($mod == 'SENAI') {
						$this -> entrega_kit_pessoa($id);
						return ('11');
					}
					if ($mod == 'JI') {
						$this -> entrega_kit_pessoa($id);
						return ('12');
					}
					if ($mod == 'PIBICEM') {
						$this -> entrega_kit_pessoa($id);
						return ('13');
					}
					return ('8');
				} else {
					return ('9');
				}
			}
		}
		return ('0');
	}

	function is_ic($cracha) {
		$ano = (date("Y") - 1);
		/* Verificar se é IC */
		$sql = "select * from ic 
					left join ic_aluno on id_ic = ic_id
					left join semic_nota_trabalhos on ic_plano_aluno_codigo = st_codigo
				where (ic_cracha_prof = '$cracha' or ic_cracha_aluno = '$cracha')
						and ic_ano = '$ano' 
				";

		//$sql .= " and (st_poster = 'S' or st_oral = 'S') ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			return ( array());
		}
	}

	function kits_form() {
		$id = trim($this -> input -> post("dd1"));
		$msg = '';
		if (strlen($id) > 0) {
			$rs = $this -> entrega_kit($id);
			switch ($rs) {
				case '2' :
					$msg = '<font color="Green" class="lt6">Já Retirou o Kit!</font>';
					break;
				case '8' :
					$msg = '<font color="red" class="lt6">Não foi localizado a modalidade de apresentação</font>';
					break;
				case '9' :
					$msg = '<font color="red" class="lt6">Não tem trabalho para apresentar</font>';
					break;
				case '10' :
					$msg = '<font color="grey" style="font-size: 40px;">PIBIC</font><BR>';
					$msg .= '<img src="' . base_url('img/evento/camiseta-mod10.png') . '">';
					break;
				case '11' :
					$msg = '<font color="grey" style="font-size: 40px;">PIBITI</font><BR>';
					$msg .= '<img src="' . base_url('img/evento/camiseta-mod11.png') . '">';
					break;
				case '12' :
					$msg = '<font color="grey" style="font-size: 40px;">JOVENS IDEIAS</font><BR>';
					$msg .= '<img src="' . base_url('img/evento/camiseta-mod12.png') . '">';
					break;
				case '13' :
					$msg = '<font color="grey" style="font-size: 40px;">PIBIC JR</font><BR>';
					$msg .= '<img src="' . base_url('img/evento/camiseta-mod13.png') . '">';
					break;
				case '20' :
					$msg = '<font color="grey" style="font-size: 40px;">ORIENTADOR</font><BR>';
					$msg .= '<img src="' . base_url('img/evento/camiseta-mod20.png') . '">';
					break;
				default :
					$msg = '<font color="red" class="lt6">Problema no Cracha!</font>';
					break;
			}
		}
		$msg = '<center><font class="lt4">' . $this -> nome . '</font><br>' . $msg;
		$form = new form;
		$cp = array();
		$cp[0] = array('$H8', '', '', False, False);
		$cp[1] = array('$S15', '', 'ID', True, True);
		$cp[2] = array('$B8', '', 'Registrar', False, False);
		$cp[3] = array('$M', '', $msg, False, False);
		$tela = $form -> editar($cp, '');
		$tela .= '
			<script>
				$("#dd1").val( "" );
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
