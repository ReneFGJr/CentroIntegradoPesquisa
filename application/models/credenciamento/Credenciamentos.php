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

	function kits_entregues_grafico($tp = 4) {
		$evento = $_SESSION['evento_id'];
		$sql = "select * from 
				( select count(*) as total, SUBSTRING(kits_hora,1," . $tp . ") as hora, kits_data 
						from evento_kits 
						where kits_evento = $evento
						group by hora, kits_data
				) as tabela
				order by kits_data, hora		
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$js = '';
		$sld = 0;
		$prod = array();
		$hora = array();
		$lb = '';
		$to = '';
		$total = 0;
		$tpc = '';
		if ($tp == 4) { $tpc = '0';
		}
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$hr = trim($line['hora']);
			$data = sonumero(trim($line['kits_data']));
			$total = $total + $line['total'];

			$lb .= "'" . $hr . $tpc . "h (dia " . substr($data, 6, 2) . ")', ";
			$to .= $total . ", ";
		}

		/* Script */
		$js = '$(function () {' . cr();
		$js .= '$(\'#container' . $tp . '\').highcharts({ ' . cr();
		$js .= 'chart: {' . cr();
		$js .= '    type: \'line\'' . cr();
		$js .= '},' . cr();
		$js .= 'title: {' . cr();
		$js .= '    text: \'Distribuição dos Kits\'' . cr();
		$js .= '},' . cr();
		$js .= 'subtitle: {' . cr();
		$js .= '    text: \'Source: cip.pucpr.br\'' . cr();
		$js .= '},' . cr();
		$js .= 'xAxis: {' . cr();
		$js .= '    categories: [' . $lb . ']' . cr();
		$js .= '},' . cr();
		$js .= 'yAxis: {' . cr();
		$js .= '    title: {' . cr();
		$js .= '        text: \'Distribuição\'' . cr();
		$js .= '    }' . cr();
		$js .= '},' . cr();
		$js .= 'plotOptions: {' . cr();
		$js .= '    line: {' . cr();
		$js .= '        dataLabels: {' . cr();
		$js .= '            enabled: true' . cr();
		$js .= '        },' . cr();
		$js .= '        enableMouseTracking: false' . cr();
		$js .= '    }' . cr();
		$js .= '},' . cr();
		$js .= 'series: [{' . cr();
		$js .= '    name: \'Camisetas\',' . cr();
		$js .= '    data: [' . $to . ']' . cr();
		$js .= '}]' . cr();
		$js .= '});' . cr();
		$js .= '});' . cr();

		$sx = '<table width="98%" align="center" cellpadding="2" cellspacing="2" class="border1"><tr><td>';
		$sx .= '<div id="container' . $tp . '" style="min-width: 310px; height: 400px; margin: 0 auto"></div>' . cr();
		$sx .= '</td></tr></table>';
		$sx .= '<script>' . cr();
		$sx .= $js;
		$sx .= '</script>' . cr();
		return ($sx);
	}

	function kits_entregues() {
		$evento = $_SESSION['evento_id'];
		$sql = "select * from 
				( select count(*) as total, kits_tipo 
						from evento_kits 
						where kits_evento = $evento
						group by kits_tipo 
				) as tabela
				left join evento_kits_descricao on id_ekd = kits_tipo
				order by kits_tipo 			
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="98%" align="center" cellpadding="2" cellspacing="2">';
		$sa = '<tr class="lt1" align="center">';
		$sb = '<tr class="lt6" align="center">';

		$sz = round(100 / (count($rlt) + 1));
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$estoque = $line['ekd_estoque'];
			$total = $line['total'];
			$img = trim($line['ekd_imagem']);

			if (strlen($img) > 0) {
				$sa .= '<td rowspan=2 class="border1">';
				$sa .= '<img src="' . base_url($img) . '" height="60">';
				$sa .= '</td>';
			}

			$sa .= '<td width="' . $sz . '%" class="border1">';
			$sa .= $line['ekd_descricao'];
			$sa .= '</td>';
			$sa .= '<td width="1%">&nbsp;</td>';

			$sb .= '<td width="' . $sz . '%" class="border1">';
			$sb .= $line['total'];
			$sb .= ' / ';
			$sb .= $estoque;
			$sb .= '<br><font class="lt3">(';
			if ($estoque > 0) {
				$sb .= number_format($total / $estoque * 100, 1, ',', '.') . '%';
			} else {
				$sb .= 'na';
			}
			$sb .= ')</font>';
			$sb .= '</td>';
			$sb .= '<td width="1%">&nbsp;</td>';

			$tot = $tot + $line['total'];
		}

		$sa .= '<td width="' . $sz . '%" class="border1">';
		$sa .= 'Total';
		$sa .= '</td>';

		$sb .= '<td width="' . $sz . '%" class="border1">';
		$sb .= $tot;
		$sb .= '</td>';

		$sx .= $sa . '</tr>';
		$sx .= $sb . '</tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function eventos_sel($id) {

	}

	function sala($bloco) {
		$evento = $this -> session -> userdata('evento_id');

		$date = date("Y-m-d");
		$sql = "select * from semic_bloco 
				inner join semic_salas on sb_sala = id_sl
				where id_sb = " . round($bloco);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$data = array();
		$data['sala'] = $line['sl_ordem'];
		$data['sala_nome'] = $line['sl_nome'];
		$data['bloco'] = $bloco;
		$data['bloco_nome'] = $line['sb_nome'];

		$data['presente'] = $this -> presentes($date, $bloco);
		$data['logo_evento'] = base_url('img/evento/evento_' . strzero($evento, 3) . '_banner.png');
		return ($data);
	}

	function presentes_por_sala() {
		$evento = $_SESSION['evento_id'];
		$sql = "select * from (
					select count(*) as total, r_bloco from 
						(
							select distinct r_id, r_bloco from evento_registro 
							where (r_status ='A' or r_status = 'B')
						) as tabela 
						group by r_bloco
					) as tabela01
				inner join semic_bloco on id_sb = r_bloco
				inner join semic_salas on sb_sala = id_sl
 
				order by sb_data, sb_hora, sl_ordem
				";
		$rlt = db_query($sql);
		$sx = '';
		while ($line = db_read($rlt)) {
			$sx .= '<div class="semic_salas">';
			$sx .= '<div class="lt6" style="float: right">'.$line['total'].'</div>';
			$sx .= '<font class="lt3">';
			$sx .= '<b>';
			$sx .= stodbr($line['sb_data']);
			$sx .= ' ';
			$sx .= $line['sb_hora'];
			$sx .= '</b>';
			$sx .= '</font>';
			
			$sx .= '<br>';
			$sx .= '<font class="lt3">';			
			$sx .= $line['sb_nome'];
			$sx .= '</font>';
			
			$sx .= '<br><font class="lt1">';
			$sx .= $line['sl_nome'];
			$sx .= '-';
			$sx .= $line['sl_bloco'];
			$sx .= '</font></div>';

		}
		return ($sx);
	}

	function registra($id) {
		$bloco = $this -> session -> userdata('bloco');
		;
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

	function entrega_kit_pessoa($id, $tipo) {
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];

		$evento = round($_SESSION['evento_id']);

		$sql = "insert into evento_kits 
							(
							kits_user_id, kits_data, kits_hora,
							kits_ip, kits_evento, kits_tipo
							) values (
							$id,'$data','$hora',
							'$ip',$evento, $tipo)
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

			if (strlen($mod) == 0) {
				/* Sem kit para retirar */
				return ('8');
			}

			/* Pode retirar o Kit */
			if (strlen($mod) > 0) {
				$evento = $_SESSION['evento_id'];

				/* Verifica se já não retirou */
				$sql = "select * from evento_kits 
							where kits_user_id = $id
							and kits_evento = $evento
						";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				if (count($rlt) > 0) {
					/* Já retirou */
					return ('2');
				}

				if (count($edital) > 0) {
					if ($edital['st_professor'] == $cracha) {
						$this -> entrega_kit_pessoa($id, 1);
						return ('20');
					}
					if ($mod == 'PIBIC') {
						$this -> entrega_kit_pessoa($id, 2);
						return ('10');
					}
					/* PIBITI */
					if ($mod == 'PIBITI') {
						$this -> entrega_kit_pessoa($id, 3);
						return ('11');
					}
					if ($mod == 'SENAI') {
						$this -> entrega_kit_pessoa($id, 3);
						return ('11');
					}
					if ($mod == 'JI') {
						$this -> entrega_kit_pessoa($id, 4);
						return ('12');
					}
					if ($mod == 'PIBICEM') {
						$this -> entrega_kit_pessoa($id, 5);
						return ('13');
					}
					if ($mod == 'PIBIC_EM') {
						$this -> entrega_kit_pessoa($id, 5);
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
		$tot = 0;
		while ($line = db_read($rlt)) {
			$tot++;
			$link = '<A HREF="' . base_url('index.php/credenciamento/evento_sel/' . $line['id_ev'] . '/' . checkpost_link($line['id_ev'] . $this -> key)) . '" class="lt5 link">';
			$sx .= '<li>';
			$sx .= $link;
			$sx .= $line['ev_nome'];
			$sx .= '</A>';
			$sx .= '</li>';
		}
		if ($tot == 0) {
			$sx .= '<li class="lt5 link"><A href="#">Nenhum evento ativo</a></li>';
		}
		$sx .= '</ul>';
		return ($sx);
	}

}
?>
