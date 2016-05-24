<?php
function perfil($p, $trava = 0) {
	$ac = 0;
	if (isset($_SESSION['perfil'])) {
		$perf = $_SESSION['perfil'];
		for ($r = 0; $r < strlen($p); $r = $r + 4) {
			$pc = substr($p, $r, 4);
			//echo '<BR>'.$pc.'='.$perf.'=='.$ac;
			if (strpos(' ' . $perf, $pc) > 0) { $ac = 1;
			}
		}
	} else {
		$ac = 0;
	}
	return ($ac);
}

class usuarios extends CI_model {
	var $tabela = 'us_usuario';
	var $id = 0;
	var $id_us = 0;
	var $nome = '';
	var $ss = '';
	var $cracha = '';

	function view_prefil($id) {
		$this -> load -> model('programas_pos');
		$this -> load -> model('producoes');
		$this -> load -> model('captacoes');
		$this -> load -> model('stricto_sensus');
		$this -> load -> model('ics');

		/* Visualiza��es */
		$captacoes_ativo = 0;
		$ic_ativo = 0;
		$carga_horaria_ativo = 0;
		$pos_ativo = 0;
		$producao_ativo = 0;

		//* Dados */
		$data = $this -> usuarios -> le($id);
		$cpf = strzero(sonumero($data['us_cpf']), 11);
		$cracha = $data['us_cracha'];
		$id_us = $data['id_us'];
		$area_avaliacao = $data['us_area_conhecimento'];

		/* Monta telas */
		$tipo = $data['usuario_tipo_ust_id'];
		$abas = array();

		switch ($tipo) {
			/* Docente */
			case '2' :
				$data['logo'] = base_url('img/logo/logo_docentes.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/docente', $data);

				/* Captacoes */
				$captacoes_ativo = 1;
				/* Producao */
				$producao_ativo = 1;
				/* Carga Horaria */
				$carga_horaria_ativo = 1;
				/* Iniciacao cient�fica */
				$ic_ativo = $this -> ics -> is_ic($cracha);
				/* Stricto sensu */
				$stricto_sensu = $this -> is_ss($id_us);

				break;
			/* Colaborador */
			case '4' :
				$data['logo'] = base_url('img/logo/logo_colaborador.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/colaborador', $data);
				break;
			/* Discente */
			case '3' :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				$cpf = strzero(sonumero($data['us_cpf']), 11);
				$abas[3]['title'] = 'Inicia��o Cient�fica';
				$abas[3]['content'] = $this -> usuarios -> mostra_formacao($cpf);

				/* Iniciacao cientifica */
				$data['content'] = $this -> usuarios -> mostra_ic($cpf);
				$this -> load -> view('content', $data);

				/* habilida captacoes */
				$captacoes_ativo = 1;
				/* Iniciacao cientifica */
				$ic_ativo = $this -> ics -> is_ic($id_us);
				break;
			/* Externo */
			case '5' :
				$data['logo'] = base_url('img/logo/logo_docentes.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/docente', $data);

				/* Captacoes */
				$captacoes_ativo = 0;
				/* Producao */
				$producao_ativo = 1;
				/* Carga Horaria */
				$carga_horaria_ativo = 0;
				/* Iniciacao cient�fica */
				$ic_ativo = $this -> ics -> is_ic($cracha);
				/* Stricto sensu */
				$stricto_sensu = $this -> is_ss($id_us);

				break;				
			default :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Montagens das telas */

		/* Aba 1 - RESUMO */
		$abas[0]['title'] = 'Resumo';
		$abas[0]['content'] = '';

		/* Aba - Producao Cient�fica */
		if ($producao_ativo == 1) {
			/* SS */
			$pos = $this -> programas_pos -> professor_ss_area($id);
			$areas = array();
			$sa = '<table width="100%">';
			$sa .= '<tr>';
			for ($r = 0; $r < count($pos); $r++) {
				$area = $pos[$r]['pp_area'];
				/* Producao */
				$sa .= '<td align="center">' . $this -> producoes -> producao_perfil_grafico($cpf, $area) . '</td>';
				//$sa .= $this -> load -> view('content', $data, true);
				//array_push($areas, $area);
			}
			$sa .= '</table>';

			$abas[1]['title'] = 'Produ��o Cient�fica';
			$abas[1]['content'] = $sa . $this -> producoes -> producao_perfil($cpf, $area_avaliacao);
		}

		/* captacoes */
		if ($captacoes_ativo == 1) {
			$capt = $this -> captacoes -> resumo_projetos($data['us_cracha']);
			$data = array_merge($data, $capt);

			$abas[0]['content'] .= $this -> load -> view('perfil/perfil_captacao', $data, True);

			$abas[3]['title'] = 'Capta��es';
			$abas[3]['content'] = $capt['captacoes'];
		}

		/* Aba - Stricto Sensu */
		if (isset($stricto_sensu)) {
			if ($stricto_sensu == '1') {
				$abas[2]['title'] = 'Mestrado/Doutorado';
				$abas[2]['content'] = $this -> stricto_sensus -> orientacoes($cracha);
				$data['orientacoes'] = $this -> stricto_sensus -> resumo;
				$abas[0]['content'] .= $this -> load -> view('perfil/perfil_ss', $data, True);
			}
		}

		/* Aba - Iniciacao Cientifica */
		if ($ic_ativo == 1) {
			$data['perfil'] = $this -> ics -> resumo;
			$abas[4]['title'] = 'Inicia��o Cient�fica';
			$tela = $this -> ics -> orientacoes($cracha);
			$abas[4]['content'] = $tela;
			$abas[0]['content'] .= $this -> load -> view('perfil/perfil_ic', $data, True);
		}

		/* Aba - Carga horaria */
		if ($carga_horaria_ativo == 1) {
			$abas[9]['title'] = 'Carga Hor�ria';
			$abas[9]['content'] = $this -> usuarios -> mostra_carga_horaria($cpf);
		}

		$data['abas'] = $abas;
		$tela = $this -> load -> view('content_foldes', $data, true);
		return ($tela);
	}

	function sem_email() {
		//$ano_ver = (date("Y") - 1);
		$ano = date("Y");
		if (date("m") < 7) {
			$ano = $ano - 1;
		}

		$sql = "select distinct email, us_nome, us_cracha, id_us,
									CASE
						         WHEN email = '' THEN 'Sem email cadastrado'
						       ELSE email          
						       END as email
						from  us_usuario
						left join(select 1 as email, usuario_id_us from  us_email where usm_ativo = 1 group by usuario_id_us, email) as email on usuario_id_us = id_us
						inner join ic on ic_cracha_prof = us_cracha 
						and ic_ano = '" . $ano . "'  
						where us_ativo = 1 and email is null
						order by us_nome
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela01 lt2">';
		$sx .= '<tr><td class="lt1" colspan=3> </td></tr>';
		$sx .= '<tr>			<th width="2%">#</th>
								<th width="5%" align="left">Crach�</th>
								<th width="85%" align="left">Nome</th>								
								<th width="8%" align="left">email</th>
					</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {

			$cor = '';

			$line = $rlt[$r];
			$tot++;

			if (strlen($line['email']) == 0) {
				$cor = '<font color="red">';
			} else {
				$cor = '<font color="green">';
			}

			$sx .= '<tr align="left" class="lt2">';
			$sx .= '<td class="lt1 border1" align="center">';
			$sx .= $tot;
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1"  align="center">';
			$sx .= $cor;
			$sx .= $line['us_cracha'];
			$sx .= '</font>';
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1">';
			$sx .= $cor;
			$sx .= link_perfil($line['us_nome'], $line['id_us']);
			$sx .= '</font>';
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1" align="center">';
			$sx .= $cor;
			$sx .= msg('sem registro');
			$sx .= '</font>';
			$sx .= '</td>';

		}
		$sx .= '</table>';
		$sx .= '<br>' . $tot . ' total ';

		return ($sx);

	}

	function lista_docentes_escola()
		{
			$sql = "select * from us_usuario 
						LEFT JOIN escola ON us_escola_vinculo = id_es
						LEFT JOIN us_titulacao on usuario_titulacao_ust_id	= ust_id
					WHERE usuario_tipo_ust_id  = 2 
						and us_ativo = 1
						order by es_escola, us_nome ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			$tot = 0;
			$tot2 = 0;
			$sx = '<table width="100%" class="tabela00 lt1 table">';
			$sh = ' <tr>
						<th width="3%">#</th>
						<th width="3%">##</th>
						<th width="34%">Nome do docente</th>						
						<th width="5%">Titula��o</th>
						<th width="15%">Campus</th>
						<th width="30%">Link Lattes</th>
						<th width="10%">Lattes Atualiza��o</th>
					</tr>
					';
			$xescola = 0;
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					$escola = $line['us_escola_vinculo'];
					if ($escola != $xescola)
						{
							$sx .= '</table>';
							$sx .= '<br>';
							$sx .= '<table width="100%" class="tabela00 lt1 table">';
							$sx .= '<tr>';
							$sx .= '<td class="lt3" colspan="6">'.$line['es_escola'].'</td></tr>';
							$sx .= $sh;
							$xescola = $escola;
							$tot2 = 0;
						}
					$tot++;
					$tot2++;
					
					$sx .= '<tr>';
					$sx .= '<td align="center">'.$tot.'</td>';
					$sx .= '<td align="center">'.$tot2.'</td>';
					$sx .= '<td align="left">'.link_user($line['us_nome'],$line['id_us']).'</td>';
					$sx .= '<td align="left">'.$line['ust_titulacao_sigla'].'</td>';
					$sx .= '<td align="left">'.$line['us_campus_vinculo'].'</td>';
					$sx .= '<td align="left">'.$line['us_link_lattes'].'</td>';
					$sx .= '<td align="center">'.stodbr($line['us_lattes_update']).'</td>';
				}
			$sx .= '</table>';
			return($sx);
			
		}

	function aluno_sem_email() {
		//$ano_ver = (date("Y") - 1);
		$ano = date("Y");
		if (date("m") < 7) {
			$ano = $ano - 1;
		}
		$sql = "select distinct email, us_nome, us_cracha, id_us, mb_descricao,
									CASE
						         WHEN email = '' THEN 'Sem email cadastrado'
						       ELSE email          
						       END as email
						from  us_usuario
						left join(
						          select 1 as email, usuario_id_us from  us_email where usm_ativo = 1 group by usuario_id_us, email
						          ) as email on usuario_id_us = id_us
						inner join ic on ic_cracha_aluno = us_cracha
						inner join ic_aluno on  ic_aluno_cracha = ic_cracha_aluno
						inner join ic_modalidade_bolsa on mb_id = id_mb
						and ic_ano = '" . $ano . "'  
						where us_ativo = 1 
						and email is null
						and mb_ativo = 1
						order by us_nome
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="tabela01 lt2">';
		$sx .= '<tr><td class="lt1" colspan=4> </td></tr>';
		$sx .= '<tr><th width="2%">#</th>
								<th width="8%" align="left">Crach�</th>
								<th width="60%" align="left">Nome</th>
								<th width="20%" align="left">Bolsa</th>								
								<th width="10%" align="left">email</th>
					</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {

			$cor = '';

			$line = $rlt[$r];
			$tot++;

			if (strlen($line['email']) == 0) {
				$cor = '<font color="red">';
			} else {
				$cor = '<font color="green">';
			}

			$sx .= '<tr align="left" class="lt2">';
			$sx .= '<td class="lt1 border1" align="center">';
			$sx .= $tot;
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1"  align="center">';
			$sx .= $cor;
			$sx .= $line['us_cracha'];
			$sx .= '</font>';
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1">';
			$sx .= $cor;
			$sx .= link_perfil($line['us_nome'], $line['id_us']);
			$sx .= '</font>';
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1">';
			$sx .= $line['mb_descricao'];
			$sx .= '</font>';
			$sx .= '</td>';

			$sx .= '<td class="lt1 border1" align="center">';
			$sx .= $cor;
			$sx .= msg('sem registro');
			$sx .= '</font>';
			$sx .= '</td>';

		}
		$sx .= '</table>';
		$sx .= '<br>' . $tot . ' total ';

		return ($sx);

	}

	function is_ss($id) {
		/* Strict Sensu */
		$ss = '0';
		$sql = "select * from ss_professor_programa_linha
					WHERE us_usuario_id_us = " . $id . "
					AND sspp_ativo=1";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return (1);
		} else {
			return (0);
		}
	}

	function historico_insere_erro($login, $erro, $us = 0) {
		if ((strlen($login) == 0) and ($us == 0)) {
			return ('');
		}
		$ip = ip();
		$CI = &get_instance();
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$login = uppercase($login);

		$sql = "insert into logins_erros
					(
						ler_ip, ler_erro, 
						ler_user_id, ler_data, ler_hora
					) values (
						'$ip','$erro',
						'$login', '$data', '$hora'
					)
			";
		$rlt = $CI -> db -> query($sql);
		return (0);
	}

	/* Registra historico de acesso
	 *
	 */
	function historico_insere($cpf, $proto) {
		$ip = ip();
		$data = date("Ymd");
		$hora = date("H:i:s");
		$sql = "insert into logins_log 
				(ul_data, ul_hora, ul_ip, ul_proto, ul_cpf)
				values
				($data,'$hora','$ip','$proto','$cpf')		
		";
		$this -> db -> query($sql);
		return (1);
	}

	/* Logout
	 *
	 */
	function logout() {
		$dados = array('cracha' => '', 'cpf' => '', 'josso' => '', 'nome' => '', 'nome_display' => '', 'us_id' => '', 'id_us' => '', 'cracha' => '');
		$this -> session -> set_userdata($dados);
		return (1);
	}

	function security() {
		$data = date("Y-m-d");
		$hora = date("H:i:s");

		$dados = $this -> session -> userdata();
		$josso = $this -> session -> userdata('nome');

		if (strlen($josso) == 0) {
			$erro = 999;
			/* sess�o finalizada pelo servidor */
			$this -> historico_insere_erro('', $erro, 0);
			$link = base_url('index.php/login');
			redirect($link);
		} else {
			$this -> session -> set_userdata($dados);
			return (1);
		}
	}

	function security_set($id, $ghost = 0) {
		$id = round($id);
		$sql = "select * from us_usuario where id_us = $id ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id_us = $line['id_us'];
			$perfil = $line['us_perfil'];
			$cracha = $line['us_cracha'];
			$cpf = $line['us_cpf'];
			$nome = $line['us_nome'];
			$ss = $this -> is_ss($id);
			if (strlen($perfil) == 0) { $prefil = '#FRE';
			}

			/* reduz nome do ususario */
			$n = trim($nome);
			$n = troca($n, ' ', ';') . ';';
			$n = splitx(';', $n);
			$nome_display = $n[0] . ' ' . $n[1];

			$dados = array('us_id' => $id_us, 'perfil' => $perfil, 'ghost' => $ghost, 'id_us' => $id_us, 'cracha' => $cracha, 'cpf' => $cpf, 'josso' => md5(date("YmdHis")), 'nome' => $nome, 'nome_display' => $nome_display, 'ss' => $ss);
			$this -> session -> set_userdata($dados);

			$sql = "update us_usuario set us_lastupdate = '" . date("Y-m-d") . "', 
							us_lastupdate_hora = '" . date("H:i:s") . "' 
						WHERE id_us = " . $id_us;
			$rlt = $this -> db -> query($sql);
		}
		return (1);
	}

	/* Entrada do login
	 * CHECKED
	 *
	 */
	function consulta_login($login, $pass, $debug = 0) {
		$this -> load -> model('login/josso_login_pucpr');
		/* Verifica se foi locado recentemente */
		if ($this -> valida_senha_anterior($login, $pass) == 1) {
			return (2);
		} else {
			$ok = $this -> josso_login_pucpr -> nusoap_consulta($login, $pass, $debug);
			return ($ok);
		}
	}

	/* Valida ultimo login
	 *
	 */
	function valida_senha_anterior($login, $pass) {
		$login = troca($login, "'", "");
		$login = UpperCaseSql($login);
		$sql = "select * from us_usuario where us_login = '$login' ";
		$qr = $this -> db -> query($sql);
		$qr = $qr -> result_array();

		if (count($qr) > 0) {
			$line = $qr[0];
			$senha = trim($line['us_senha']);

			/* Senha em branco */
			if (strlen($senha) == 0) {
				/* Falha */
				return (0);
			}

			/* Senha OK */
			$pass_crypt = md5($pass . date("Ym"));
			if ($pass_crypt == $senha) {
				$this -> id = $line['id_us'];
				$this -> nome = $line['us_nome'];
				$this -> cracha = $line['us_cracha'];
				$this -> prefil = $line['us_perfil'];
				return (1);
				exit ;
			}
			return (0);

		} else {
			return (0);
		}
	}

	/* Ativa usuario */
	/* CHECKED */
	function ativa_usuario($login, $pass, $dados) {
		/* Dados */
		$cpf = $dados['cpf'];
		$cracha = '';
		if (strlen($cpf) == 0) {
			echo 'ERRO #32# CPF N�o cadastrado';
			exit ;
		}
		/************************ VALIDACAO */
		$sql_login = "select * from us_usuario 
						WHERE us_login = '$login' 
						AND us_ativo = 1 ";
		$qr = $this -> db -> query($sql_login);
		$qr = $qr -> result_array();

		/* Login n�o localizado */
		if (count($qr) == 0) {
			$sql_login = "select * from us_usuario 
							WHERE us_cpf = '$cpf' 
							ORDER BY usuario_tipo_ust_id ";
			$qr = $this -> db -> query($sql_login);
			$qr = $qr -> result_array();
			if (count($qr) > 0) {
				$line = $qr[0];
				if ($line['id_us'] > 0) {
					$sql = "update us_usuario set us_login = '$login' where id_us = " . $line['id_us'];
					$qr2 = $this -> db -> query($sql);
				}
			}
		}

		if (count($qr) == 0) {
			$nome = $this -> nome;
			$data = date("Y-m-d");
			$hora = date("H:i:s");
			$cpf = $this -> cpf;
			$pass_crypt = md5($pass . date("Ym"));
			$login = UpperCase($login);
			$cracha = '';

			$sql = "insert into us_usuario 
						(
						us_nome, us_login, us_senha,
						us_lastupdate, us_lastupdate_hora,
						us_cpf, us_dt_update_cs,
						us_cracha, us_perfil,
						us_ativo, us_teste, 
						us_professor_tipo, us_usuario_cursando,
						usuario_tipo_ust_id 
						) 
						values
						('$nome','$login','$pass_crypt',
						$data,'$hora',
						'$cpf','$data',
						'$cracha','',
						1,0,
						1,1,
						1						
						)				
				";
			$this -> db -> query($sql);
		}

		$qr = $this -> db -> query($sql_login);
		$qr = $qr -> result_array();
		if (count($qr) > 0) {
			$line = $qr[0];
			$id = $line['id_us'];
		} else {
			$id = 0;
		}
		return ($id);
	}

	function lista_ultimos_erros_acessos($data = '') {
		if (strlen($data) == 0) {
			$data = date("Ymd");
		}

		$sql = "select * from logins_erros where ler_data = '$data' order by id_ler desc limit 50";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><td class="lt4" colspan=10>' . stodbr($data) . ' - �ltimos Erros de Acesso' . '</td></tr>';
		$sx .= '<tr><th>login</th><th>ip</th><th>data</th><th>hora</th><th>Erro</th></tr>' . cr();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $line['ler_user_id'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ler_ip'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ler_data'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ler_hora'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ler_erro'];
			$sx .= '</td>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function lista_ultimos_acessos($data = '') {
		if (strlen($data) == 0) {
			$data = date("Ymd");
		}
		$sql = "select * from logins_log
					LEFT JOIN us_usuario on us_cpf = ul_cpf 
					WHERE ul_data = '$data' order by id_ul desc limit 50";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><td class="lt4" colspan=10>' . stodbr($data) . ' - �ltimos Acessos Bem sucedidos' . '</td></tr>';
		$sx .= '<tr><th>nome</th><th>login</th><th>ip</th><th>data</th><th>hora</th><th>Erro</th></tr>' . cr();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>';
			$sx .= $line['us_nome'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['us_login'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ul_ip'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= stodbr($line['ul_data']);
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ul_hora'];
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $line['ul_proto'];
			$sx .= '</td>';
		}
		$sx .= '</table>';

		return ($sx);
	}

	function ghost_link($id = 0) {
		if (function_exists("perfil")) {
			if (perfil('#SPI#ADM#CPP#CPI#GST') == 1) {
				$link = '<a href="' . base_url('index.php/login/ap/' . $id . '/' . checkpost_link($id . date("Ymdhi"))) . '">';
				$link .= '<img src="' . base_url('img/icon/icone_ghost.png') . '" border=0 height="16" title="' . msg("ghost_access") . '"></a>';

				$link .= '<a href="#" onclick="newwin2(\'' . base_url('index.php/login/email/' . $id . '/' . checkpost_link($id . '')) . '\',600,400);">';
				$link .= '<img src="' . base_url('img/icon/icone_email.png') . '" border=0 height="16" title="enviar acesso ao usu�rios"></a>';

				return ($link);
			} else {
				return ("");
			}
		}
		return ("");
	}

	function link_acesso($id) {
		$link = base_url('index.php/login/a/' . $id . '/' . checkpost_link($id . 'acesso_professor'));
		return ($link);
	}

	function cp_usuario() {
		$cp = array();
		array_push($cp, array('$H8', 'id_us', '', False, True));
		//		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		//		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_nome', msg('nome'), True, True));
		array_push($cp, array('$S12', 'us_cracha', msg('cracha'), True, True));
		array_push($cp, array('$S16', 'us_cpf', msg('cpf'), False, True));
		array_push($cp, array('$D8', 'us_dt_nascimento', msg('dt_nascimento'), False, True));

		array_push($cp, array('$Q c_campus:c_campus:select * from campus order by c_campus', 'us_campus_vinculo', msg('Campus'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));
		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));
		array_push($cp, array('$HV', 'us_ativo', '1', True, True));
		array_push($cp, array('$Q id_ustp:ustp_nome:select * from us_tipo order by ustp_nome', 'usuario_tipo_ust_id', msg('perfil'), True, True));
		array_push($cp, array('$Q id_ies:ies_nome:select id_ies, CONCAT(ies_nome,\' (\',ies_sigla,\')\') as ies_nome from ies_instituicao order by ies_nome', 'ies_instituicao_ies_id', msg('instituicao'), True, True));
		array_push($cp, array('$B', '', msg('enviar'), false, True));
		return ($cp);
	}

	function cracha_duplicados() {
		$sql = "select * from (
					select us_cracha, count(*) as total, max(id_us) as max from us_usuario 
						where us_cracha <> ''
						group by us_cracha
					) as tabela where total > 1
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$cracha = $line['us_cracha'];
			$sx .= '<br>CRACHA: ' . $cracha . ' ' . $total;
		}

		$sql = "select * from (
					select us_cpf, count(*) as total, max(id_us) as max from us_usuario 
						where us_cpf <> '' and us_ativo = 1
						group by us_cpf
					) as tabela where total > 1
					";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$total = $line['total'];
			$cracha = $line['us_cpf'];
			$sx .= '<br>CPF: ' . $cracha . ' ' . $total;
		}
		return ($sx);
	}

	function mostra_ic($cpf) {
		$wh = " al_cpf = '$cpf' ";
		$sql = $this -> ics -> table_view($wh);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		$sx = '';
		$sx .= '<h2>Inica��o Cient�fica e Tecnol�gica</h2>';
		$sx .= '<table width="100%" cellpadding=5 cellspacing=0 class="border1 lt1">';
		$sx .= '<tr>
						<td width="5%"><b>Protocolo</b></td>
						<td width="5%"><b>Ano</b></td>
						<td width="5%"><b>Edital</b></td>
						<td width="10%"><b>Tipo</b></td>
						<td width="20%"><b>Orientador</b></td>
						<td width="50%"><b>Trabalho</b></td>
						<td width="5%"><b>Situa��o</b></td>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;

			$line = $rlt[$r];

			$link = base_url('index.php/ic/view/' . $line['id_ic'] . '/' . checkpost_link($line['id_ic']));
			$link = '<a href="' . $link . '" class="link lt1" target="_new">';
			$sx .= '<tr>';
			$sx .= '<td>' . $link . $line['ic_plano_aluno_codigo'] . '</a></td>';
			$sx .= '<td>' . $line['ic_ano'] . '</td>';
			$sx .= '<td>' . $line['mb_tipo'] . '</td>';
			$sx .= '<td>' . $line['mb_descricao'] . '</td>';
			$sx .= '<td>' . $line['pf_nome'] . '</td>';
			$sx .= '<td>' . $line['ic_projeto_professor_titulo'] . '</td>';
			$sx .= '<td>' . $line['s_situacao'] . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		if ($to == 0) {
			$sx = '';
		}
		return ($sx);
	}

	function mostra_formacao($cpf) {
		$sql = "select distinct centroAcademico, nomeCurso, nivelCurso, situacao from us_usuario 
						inner join us_importar_sga on us_cracha = pessoa						 
						where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$to = 0;
		$sx = '';
		$sx .= '<h2>Forma��o acad�mica</h2>';
		$sx .= '<table width="100%" cellpadding=5 cellspacing=0 class="border1 lt1">';
		$sx .= '<tr>
						<td width="30%"><b>Centro / Escola</b></td>
						<td width="30%"><b>Curso</b></td>
						<td width="35%"><b>N�vel</b></td>
						<td width="5%"><b>Situa��o</b></td>
					</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$sx .= '<tr>';
			$sx .= '<td>' . $line['centroAcademico'] . '</td>';
			$sx .= '<td>' . $line['nomeCurso'] . '</td>';
			$sx .= '<td>' . $line['nivelCurso'] . '</td>';
			$sx .= '<td>' . $line['situacao'] . '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		if ($to == 0) {
			$sx = '';
		}
		return ($sx);
	}

	function mostra_idade($data) {
		$data = sonumero($data);
		
		if (strlen($data) == 8)
			{
			$data = strtotime($data);
			$now = strtotime(date("Ymd"));
			
			// data de nascimento
			$interval = $now - $data;
			$interval = round($interval / 60 / 60 / 24 / 365);
			// data definida
	
			$idade = $interval . ' anos';
			} else {
				$idade = '';
			}
		return ($idade);
	}

	function idade($data) {
		$data = sonumero($data);
		
		if (strlen($data) == 8)
			{
			$data = strtotime($data);
			$now = strtotime(date("Ymd"));
			
			// data de nascimento
			$interval = $now - $data;
			$interval = round($interval / 60 / 60 / 24 / 365);
			// data definida
	
			$idade = $interval;
			} else {
				$idade = '0';
			}
		return ($idade);
	}

	function checar_cpf($pg = 0) {
		$sql = "select * from us_usuario where us_cpf like '%.%' or us_cpf like '%-%' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$id = $line['id_us'];
			$cpf = $line['us_cpf'];
			$cpf = strzero(sonumero($cpf), 11);
			$sql = "update us_usuario set us_cpf = '$cpf' where id_us = $id ";
			$rltx = $this -> db -> query($sql);
			$sx .= '<br>' . $line['us_cpf'] . '==>' . $cpf;
		}
		$sx = '<h1>Valida��o de CPF</h1>' . $sx;
		$sx .= '<p>Total de ' . $to . ' CPFs ajustados</p>';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);
	}

	function inport_arquivo($id = 0) {
		if (isset($_POST['dd1'])) { $dd1 = $_POST['dd1'];
		} else { $dd1 = '';
		}
		$file = '';
		if (strlen($dd1) > 0) {
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];
			$file = $_FILES['arquivo']['name'];
		} else {
			$temp = '';
		}

		if (strlen($temp) == 0) {
			$sx = '
					<center>
							<form id="upload" action="' . base_url('index.php/inport/docente/arquivo/') . '" method="post" enctype="multipart/form-data">
							<input type="file" name="arquivo" id="arquivo" />
							<input type="submit" name="dd1" value="enviar >>>">
						</form>
					</center>					
					';
			return ($sx);
		} else {
			$sx = 'Arquivo lido com sucesso!';
			$rHandle = fopen($temp, "r");
			$sData = '';
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Abrindo Arquivo ';
			while (!feof($rHandle)) {
				$sData .= fread($rHandle, filesize($temp));
			}
			fclose($rHandle);
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Tamanho do arquivo lido ' . number_format(strlen($sData) / 1024, 1, ',', '.') . ' kBytes';

			$ln = splitx(chr(13), $sData);
			$sx .= '<BR>Total de linhas: ' . count($ln);
			$sx .= '<BR>Indentifica��o do tipo de obra: ';
			/* Identica��o do tipo de obra */
			$tpo = 'DRH';
			if (strlen($tpo) > 0) {
				$sx .= '<B>' . $tpo . '</B>';
				$this -> salvar_arquivo_importado($ln);

				$sx .= '<BR>SALVO!';
			} else {
				$sx .= '<font color="red">Tipo de obra n�o identificada</font>';
				for ($r = 0; $r < 100; $r++) {
					print_r($ln[$r]);
					echo '<HR>';
				}
			}
			return ($sx);
		}

	}

	function salvar_arquivo_importado($ln) {
		$hd = array();
		$h = splitx(';', $ln[0]);
		/* deleta registros */
		$sql = "delete from us_importar_drh where 1=1 ";
		$rlt = $this -> db -> query($sql);

		/* N�vel, Situa��o do Empregado */
		for ($r = 0; $r < count($h); $r++) {
			$t = trim($h[$r]);
			switch ($t) {
				case 'Matr�cula ADP' :
					$fld[$r] = 'matricula_adp';
					break;
				case 'Matr�cula  ADP' :
					$fld[$r] = 'matricula_adp';
					break;
				case 'Curso V�nculo' :
					$fld[$r] = 'curso';
					break;
				case 'Nome' :
					$fld[$r] = 'nome_professor';
					break;
				case 'N�mero Crach�' :
					$fld[$r] = 'cracha';
					break;
				case 'Situa��o do Empregado' :
					$fld[$r] = 'situacao';
					break;
				case 'Sexo' :
					$fld[$r] = 'sexo';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'dt_nascimento';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'pais_nascimento';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'estado_nascimento';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'nacionalidade';
					break;
				case 'N�vel' :
					$fld[$r] = 'nivel';
					break;
				case 'XXXXXXXXXXXXXXXX' :
					$fld[$r] = 'escolaridade';
					break;
				case 'CPF' :
					$fld[$r] = 'cpf';
					break;
				case 'XXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'tipo_endereco';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'logradouro';
					break;
				case 'XXXXXXXXXXXXXX' :
					$fld[$r] = 'numero';
					break;
				case 'XXXXXXXXXXXXXXXX' :
					$fld[$r] = 'complemento';
					break;
				case 'XXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'bairro';
					break;
				case 'XXXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'pais';
					break;
				case 'XXXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'estado';
					break;
				case 'XXXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'municipio';
					break;
				case 'XXXXXXXXXXXXXXXXXX' :
					$fld[$r] = 'email';
					break;
				case 'Campus V�nculo' :
					$fld[$r] = 'campus';
					break;
				case 'XXXXX' :
					$fld[$r] = 'centro_academico';
					break;
				case 'TOTAL' :
					$fld[$r] = 'horas_semanais';
					break;
				case 'Horas Letivas' :
					$fld[$r] = 'horas_letivas';
					break;
				case 'Horas de Perman�ncia' :
					$fld[$r] = 'horas_permanencia';
					break;
				case 'Horas Permanencia Discip Especiais' :
					$fld[$r] = 'horas_permanencia_esp';
					break;
				case 'Complementa��o Pedag�gica' :
					$fld[$r] = 'horas_pedagogicas';
					break;
				case 'Horas Dire��o' :
					$fld[$r] = 'horas_direcao';
					break;
				case 'Horas Administrativas' :
					$fld[$r] = 'horas_administrativas';
					break;
				case 'Horas Mestrado/Doutorado' :
					$fld[$r] = 'horas_ss';
					break;
				case 'Licen�a' :
					$fld[$r] = 'horas_licencao';
					break;
				case 'Fun��o - Nome' :
					$fld[$r] = 'funcao';
					break;
				case 'T�tula��o' :
					$fld[$r] = 'titulacao';
					break;
				case 'Curso V�nculo' :
					$fld[$r] = 'curso_vinculo';
					break;
				case 'Regime de trabalho' :
					$fld[$r] = 'regime_trabalho';
					break;
				case 'Data da Admiss�o' :
					$fld[$r] = 'dt_inicio_vinculo';
					break;
				case 'Escola V�nculo' :
					$fld[$r] = 'escola';
					break;
				case 'XX' :
					$fld[$r] = 'modulacao';
					break;
				case 'CR' :
					$fld[$r] = 'CR';
					break;
				default :
					echo 'Not found:' . $t . '<br>';
			}
		}
		$data = date("Y-m-d");

		for ($r = 1; $r < count($ln); $r++) { {
				$s1 = '';
				$s2 = '';

				$dt = $ln[$r];

				$sh = splitx(';', $dt);

				for ($y = 0; $y < count($sh); $y++) {
					if (isset($fld[$y])) {

						switch ($fld[$y]) {
							case 'cpf' :
								$sh[$y] = strzero($sh[$y], 11);
								break;
							case 'CR' :
								$sh[$y] = strzero($sh[$y], 6);
								break;
							case 'cracha' :
								$cracha = trim($sh[$y]);
								$cracha = $this -> limpa_cracha($cracha);
								$sh[$y] = $cracha;
								break;
						}

						$s1 .= "" . $fld[$y] . ", ";
						$s2 .= "'" . $sh[$y] . "', ";
					}
				}
			}
			$sql = "insert into us_importar_drh
					($s1 lastupdate) values ($s2 '$data') 
			";
			$rrr = $this -> db -> query($sql);
		}

	}

	function inport_professores() {
		$tabela = 'us_importar_drh';

		$sql = "update us_usuario set usuario_tipo_ust_id = 3
						where usuario_tipo_ust_id = 2";
		$this -> db -> query($sql);

		$sql = "select * from " . $tabela . " ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$hora = date("H:i:s");
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = $line['cracha'];
			$idrh = $line['matricula_adp'];
			$data = $this -> usuarios -> le_cracha($cracha);

			//print_r($line);
			//echo '<hr>';
			//($data);

			if (count($data) > 0) {
				$dt = $line['lastupdate'];
				$id_us = $data['id_us'];
				$sql = "update us_usuario set 
								us_dt_updat_drh = '$dt',
								us_dt_import_drh = '$dt',
								usuario_tipo_ust_id = 2, 
								us_prof_drh = 1,
								us_lastupdate = '$dt',
								us_lastupdate_hora = '$hora',
								us_codigo_rh = $idrh
							where id_us = $id_us ";
				$this -> db -> query($sql);
				$sx .= '. ';
			} else {
				//echo '**************** NOVO *******************';
				//print_r($line);
				$nome = nbr_autor($line['nome_professor'],7);
				$cpf = $line['cpf'];
				$cracha = $line['cracha'];
				$nome_lattes = nbr_autor($line['nome_professor'],0);
				$curso = $line['curso'];
				$regime = $line['regime_trabalho'];
				$sexo = substr($line['sexo'],0,1);
				$tipo = '2';
				$idrh = $line['matricula_adp'];
				$ti = $line['titulacao'];
				$sql = "select * from us_titulacao where ust_titulacao = '$ti' ";
				$qqq = $this->db->query($sql);
				$qqq = $qqq->result_array();
				$titulacao = 0;
				if (count($qqq) > 0)
					{
						$qqq = $qqq[0];
						$titulacao = $qqq['ust_id'];
					}
				
				$sql = "insert into us_usuario 
						(
						us_nome, us_cpf, us_cracha,
						us_codigo_rh, us_nome_lattes,
						us_curso_vinculo, us_ativo, us_regime,
						us_genero, usuario_tipo_ust_id, us_prof_drh,
						ies_instituicao_ies_id, usuario_titulacao_ust_id
						) values (
						'$nome','$cpf','$cracha',
						'$idrh','$nome_lattes',
						'$curso','1','$regime',
						'$sexo','2','1',
						1,$titulacao
						)";
				$qqq = $this->db->query($sql);
				$sx .= 'N ';
			}

		}
		return ($sx);

	}

	function mostra_conta($id) {
		$this -> load -> model('bancos');
		$sx = '';
		$sql = "select * from us_conta
						left join banco on id_banco = usc_banco
						where us_usuario_id_us = $id ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx .= '<table width="400" class="border1 lt1">';
		if (count($rlt) > 0) {

			$line = $rlt[0];
			//Verifica se a conta existe
			if (isset($rlt)) {

				/* Mosta sem conta */
				if (strlen(trim($rlt[0]['usc_banco'])) == 0) {
					$editar_conta = '';

					if (function_exists('perfil')) {
						if (perfil('#CPP#SPI#ADM') == 1) {
							$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link">editar</a>';
						}
					}
					$sx .= '<tr>';
					$sx .= '<td>' . msg('lb_sem_conta') . '<td>';
					$sx .= $editar_conta;
				} else {
					/* Valida conta */
					$ag = $line['usc_agencia'];
					$cc = $line['usc_conta_corrente'];
					if ($cc == '0000000') {$cc = '<font color="blue">ORDEM</font>';
					}
					$banco = $line['usc_banco'];
					$mod = $line['usc_modo'];

					$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);

					$sx .= '<tr>';
					$sx .= '<td rowspan=4 width="40">' . '<img src="' . base_url('img/bancos/banco_' . $line['usc_banco']) . '.jpg" height="40"></td>';
					$sx .= '<td align="right" width="40">Banco:</td>
								<td colspan=3 width="80%"><b>' . $line['usc_banco'] . ' - ' . $line['banco_nome'] . '</b></td>';
					$sx .= '</tr><tr>';
					$sx .= '<td align="right">Ag�ncia:</td><td><b>' . $line['usc_agencia'] . '</b></td>';
					$sx .= '</tr><tr>';
					$sx .= '<td align="right">Conta:</td><td><b>' . trim($line['usc_modo'] . ' ' . $line['usc_conta_corrente']) . '</b>' . ' tipo: ' . '<b>' . $line['usc_tipo'] . '</b>' . '  </td>';
					$sx .= '<td align="right">Situa��o:</td><td><b>' . $situacao . '</b></td>';
					$sx .= '</tr>';

					//edita conta bancaria do usuario
					$sx .= '<tr>';
					$sx .= '<td align="right" width="40" colspan=4>';
					$editar_conta = '';
					if (function_exists('perfil')) {
						if (perfil('#CPP#SPI#ADM') == 1) {
							$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link"><strong>editar</strong></a>';
						}
					}
					$sx .= $editar_conta;
					$sx .= '</td>';
					$sx .= '</tr>';
				}
			}
		} else {
			$this -> insere_conta_corrente_vazia($id);

			$sx .= '<tr>';
			$sx .= '<td>' . msg('lb_sem_conta') . '<td>';

			$editar_conta = '';
			if (function_exists('perfil')) {
				if (perfil('#CPP#SPI#ADM') == 1) {
					$editar_conta = '<a href="' . base_url('index.php/usuario/edit_conta_cc/' . $id . '/' . checkpost_link($id)) . '" class="lt0 link">editar</a>';
				}
			}
			$sx .= $editar_conta;
			$sx .= '</td>';
			$sx .= '</tr>';

		}
		$sx .= '</table>';

		return ($sx);
	}

	function perfil($id) {
		$data = $this -> usuarios -> le($id);
		$tipo = $data['usuario_tipo_ust_id'];
		$sx = '';
		switch($tipo) {
			case '1' :
				/* N�o Definido */
				$sx = $this -> load -> view('perfil/docente.php', $data, true);
				break;
			case '2' :
				/* Docente */
				$sx = $this -> load -> view('perfil/docente.php', $data, true);
				break;
			case '3' :
				/* Discente */
				$sx = $this -> load -> view('perfil/discente.php', $data, true);
				break;
			case '4' :
				/* Colaborador */
				$sx = $this -> load -> view('perfil/docente.php', $data, true);
				break;
			case '5' :
				/* Externo */
				$sx = $this -> load -> view('perfil/docente.php', $data, true);
				break;
		}
		return ($sx);
	}

	function insere_conta_corrente_vazia($id) {
		$sql = "insert into us_conta 
					(us_usuario_id_us) values ($id)
			";
		$this -> db -> query($sql);
		return (0);
	}

	function valida_cc($banco, $agencia, $conta) {

	}

	function mostra_prefil($data) {
		$this -> load -> view('perfil/docente', $data);
		return ('');
	}

	function mostra_carga_horaria($cpf) {
		$sql = "select * from us_importar_drh where cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table width="100%" class="lt1 border1">';
		$sx .= '<tr><th width="15%">Curso</th>
						<th width="6%">Horas Semanais</th>
						<th width="6%">Letivas</th>
						<th width="6%">Perman�ncia</th>
						<th width="6%">Pedag�gica</th>
						<th width="6%">Administrativas</th>
						<th width="6%">Dire��o / Coord.</th>
						<th width="6%">Permanencia Esp.</th>
						<th width="6%">Compl. Pedag.</th>
						<th width="6%">Horas SS</th>
						<th width="6%">Tipo Horas</th>
						<th width="30%">Fun��o</th>
					</tr>
					';
		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			
			$tot = $tot + $line['horas_semanais'];
			$sx .= '<tr>';
			$sx .= '<td class="border1 lt1">';
			$sx .= $line['curso'];
			$sx .= '</td>';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= '<b>'.$line['horas_semanais'].'h</b>';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_letivas'].'h';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_permanencia'].'h';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['complementacao_pedagogica'].'h';
			
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_administrativas'].'h';
			
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_direcao'].'h';
			

			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_licencao'].'h';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= $line['horas_permanencia_esp'].'h';
			$sx .= '<td align="center" class="border1 lt3">';
			$sx .= '<b>'.$line['horas_ss'].'h</b>';															
			$sx .= '</td>';
			$sx .= '<td align="center" class="border1 lt1">';
			$sx .= $line['regime_trabalho'];
			$sx .= '</td>';
			$sx .= '<td class="border1 lt1">';
			$sx .= $line['funcao'];
			$sx .= '</td>';

			$sx .= '<td>';
			$sx .= $line['curso_vinculo'];
			$sx .= '</td>';

			$sx .= '</tr>';
		}
		$sx .= '<tr><td colspan="5">Total de horas <b>' . $tot . ' horas</b></td></tr>';
		$sx .= '</table>';
		return ($sx);
	}

	function search($termos, $page, $popup = 0) {
		$termos = troca($termos, ' ', ';');
		$termos = splitx(';', $termos);

		$wh1 = '';
		$wh2 = '';
		$wh3 = '';
		for ($r = 0; $r < count($termos); $r++) {
			if ($r > 0) { $wh1 .= ' and ';
				$wh2 .= ' and ';
				$wh3 .= ' and ';
			}
			$t = $termos[$r];
			$wh1 .= "( us_nome like '%" . $t . "%')";
			$wh2 .= "( us_cracha = '" . $t . "')";
			$wh3 .= "( us_cpf = '" . $t . "')";
		}
		$sql = "select * from us_usuario where ($wh1) or ($wh2) or ($wh3) order by us_nome limit 20";
		$sx = '<table width="100%" class="tabela00 lt2">';
		$sx .= '<tr><th>cracha</th><th>nome</th><th>CPF</th></tr>';
		$rlt = db_query($sql);

		while ($line = db_read($rlt)) {
			$id = $line['id_us'];
			$link = '<a href="' . base_url($page) . '/' . $line['id_us'] . '" class="link">';
			if ($popup == 1) {
				$link = '<a href="#" onclick="newxy3(\'' . base_url('index.php/credenciamento/voucher/' . $id . '/' . checkpost_link($id)) . '\',800,500);"  class="link">';
			}
			$sx .= '<tr class="lt3" valign="top">';
			$sx .= '<td align="center" width="80">';
			$sx .= $link . $line['us_cracha'] . '</a>';
			$sx .= '</td>';
			$sx .= '<td>';
			$sx .= $link . $line['us_nome'] . '</a>';
			$sx .= '</td>';
			$sx .= '<td align="center">';
			$sx .= $link . mask_cpf($line['us_cpf']) . '</a>';
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function tabela_view() {
		$sql = "(select *
				from
	                us_usuario
	                left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
	                left join us_avaliador_situacao on us_avaliador = id_as
	                left join ies_instituicao on id_ies = ies_instituicao_ies_id
	                left join us_tipo on id_ustp = usuario_tipo_ust_id
				) as usuario";
		return ($sql);
	}

	function cp_perfil() {
		$cp = array();
		$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
		array_push($cp, array('$H8', 'id_us', '', False, True));
		//		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		//		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('${', '', 'Dados de Pesquisa', False, True));
		array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));
		array_push($cp, array('$S100', 'us_nome_lattes', msg('link_nome'), False, True));
		array_push($cp, array('$Q id_area:area_avaliacao_nome:select * from area_avaliacao order by area_avaliacao_nome', 'us_area_conhecimento', msg('area_avaliacao'), False, True));
		array_push($cp, array('$}', '', 'Dados de Pesquisa', False, True));

		array_push($cp, array('${', '', 'Vinculo institucional', False, True));
		array_push($cp, array('$Q c_campus:c_campus:select * from campus order by c_campus', 'us_campus_vinculo', msg('Campus'), False, True));
		array_push($cp, array('$Q id_ies:ies_nome:select id_ies, CONCAT(ies_nome,\' (\',ies_sigla,\')\') as ies_nome from ies_instituicao order by ies_nome', 'ies_instituicao_ies_id', msg('instituicao'), True, True));
		
		$sql = "select * from escola where es_ativo = 1 order by es_escola";
		array_push($cp, array('$Q id_es:es_escola:' . $sql, 'us_escola_vinculo', msg('lb_curso_escola'), True, False));
		
		array_push($cp, array('$S8', 'us_codigo_rh', 'C�digo do RH', False, True));
		array_push($cp, array('$O 0:N�O&1:SIM', 'us_conclusao_em', msg('lb_user_conclusao_em'), False, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('${', '', 'Dados Pessoais', False, True));
		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));
		array_push($cp, array('$D8', 'us_dt_nascimento', msg('lb_us_dt_nascimento'), True, True));
		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('${', '', 'Dados no CIP', False, True));
		array_push($cp, array('$O 1:SIM&0:N�O', 'us_ativo', msg('lb_us_ativo'), True, True));
		array_push($cp, array('$O 0:N�O&1:SIM', 'us_teste', msg('lb_user_teste'), True, True));
		array_push($cp, array('$Q id_ustp:ustp_nome:select * from us_tipo order by ustp_nome', 'usuario_tipo_ust_id', msg('perfil'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('$B', '', msg('save'), false, True));

		return ($cp);
	}

	/*cria  formulario para cadastro e edicao de contas do usuario */
	function cp_conta_usuario() {
		$cp_conta = array();
		array_push($cp_conta, array('$H8', 'us_usuario_id_us', '', False, True));
		array_push($cp_conta, array('${', '', 'Cadastro de Conta', False, True));
		array_push($cp_conta, array('$Q id_banco:banco_nome:select * from banco where banco_preferencial = 1 order by banco_nome', 'usc_banco', msg('lb_usc_banco'), False, True));
		array_push($cp_conta, array('$S15', 'usc_agencia', msg('lb_usc_agencia'), False, True));
		array_push($cp_conta, array('$S20', 'usc_conta_corrente', msg('lb_usc_conta'), False, True));
		array_push($cp_conta, array('$HV', 'usc_tipo', 'CC', FALSE, TRUE));
		array_push($cp_conta, array('$S10', 'usc_modo', msg('lb_usc_modo'), False, True));
		array_push($cp_conta, array('$}', '', '', False, True));

		array_push($cp_conta, array('$B', '', msg('enviar'), false, True));

		return ($cp_conta);
	}

	function label($nome = '', $id) {
		$nome = '<A HREF="' . base_url('index.php/person/view/' . $id . '/' . checkpost_link($id)) . '" target="_new" class="link">' . nbr_autor($nome, 7) . '</A>';
		return ($nome);
	}

	function row($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_cpf', 'us_emplid', 'ies_sigla', 'ustp_nome');
		$obj -> lb = array('ID', 'Nome', 'Cracha', 'CPF', 'EmployEd', 'Institui��o', 'Perfil');
		$obj -> mk = array('', 'L', 'C', 'C', 'C');
		return ($obj);
	}

	function le_cracha($cracha) {
		$cracha = $this -> limpa_cracha($cracha);
		$rs = $this -> readByCracha($cracha);

		if (count($rs) == 0) {
			$rs = array();
		} else {
			$id = $rs['id_us'];
			$rs = $this -> usuarios -> le($id);
		}

		return ($rs);
	}


	function le_cpf($cpf) {
		$cpf = sonumero($cpf);
		$cpf = strzero($cpf,11);
		
		$sql = "select * from us_usuario where us_cpf = '$cpf' ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();

		if (count($rlt) == 0) {
			$rlt = array();
		} else {
			$rlt = $rlt[0];
			$id = $rlt['id_us'];
			$rlt = $this -> usuarios -> le($id);
		}

		return ($rlt);
	}

	/* Consulta Usuario */
	function consulta_cracha($cracha = '', $source = 'sga') {
		if (strlen($cracha) == 0) {
			return ('');
		}
		$cracha = $this->limpa_cracha($cracha);
		
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_sga');

		if ($source == 'cs') {
		} else {
			$rs = $this -> ws_sga -> findStudentByCracha($cracha);
		}

		if (isset($rs['pessoa'])) {
			$cracha = $rs['pessoa'];
			$data = $this -> usuarios -> le_cracha($cracha);
			return ($cracha);
		} else {
			return ('');
		}
	}

	/* pagamentos de iniciacao cientifica */
	function pagamentos_cpf($cpf) {
		$sql = "SELECT count(*) as total, sum(pg_valor) as valor 
							FROM ic_pagamentos 
							WHERE pg_cpf = '$cpf' 
							group by pg_cpf
							";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			return ($rlt[0]);
		} else {
			$rs = array();
			$rs['total'] = 0;
			$rs['valor'] = 0;
			return ($rs);
		}
	}

	function le($id) {
		$sql = "select * from
            us_usuario
            left join us_hora as h on h.usuario_id_us = us_usuario.id_us
            left join us_email as e on e.usuario_id_us = us_usuario.id_us
            left join us_titulacao as t on t.ust_id = us_usuario.usuario_titulacao_ust_id
            left join us_avaliador_situacao on us_avaliador = id_as
            left join ies_instituicao on id_ies = ies_instituicao_ies_id
            left join us_tipo on usuario_tipo_ust_id = id_ustp
            left join area_avaliacao on us_area_conhecimento = id_area
            left join escola on us_escola_vinculo = id_es
            left join us_bolsa_produtividade on id_us = us_bolsa_produtividade.us_id 
            left join us_bolsa_prod_nome on bpn_id = us_bolsa_prod_nome.id_bpn
            left join ic_blacklist on bl_user_id = us_usuario.id_us
            left join (select distinct 1 as ss, us_usuario_id_us as us_id_ss from ss_professor_programa_linha where sspp_ativo = 1) as ss on id_us = us_id_ss  
			WHERE id_us = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$line = $rlt[0];
		$line['us_ss'] = '';
		//$line['us_lattes'] = '';
		$line['avaliador'] = $line['as_situacao'];
		$line['us_contatos'] = $this -> recupera_fone($id);
		$line['us_cc'] = $this -> mostra_conta($id);
		$line['us_idade'] = $this -> mostra_idade($line['us_dt_nascimento']);

		$line['editar_blacklist'] = '';
		$line['editar'] = '';
		$line['img_blacklist'] = '';
		
		/* Lattes Update */
		$line['lattes_link_update'] = '';
		
		if (strpos($line['us_link_lattes'],'lattes.cnpq.br'))
			{
		$line['lattes_link_update'] = '
					<a href="'.base_url('index.php/cnpq_ws/harvesting/'.$line['id_us']).'" title="coletar dados do Lattes" target="_blank">
					<img src="'.base_url('img/icon/img_update.png').'" border=0 height="24">
					</a>';
			} 

		if (function_exists('perfil')) {
			/*perfil editar user*/
			if (perfil('#CPP#SPI#ADM') == 1) {
				$line['editar'] = '<a href="' . base_url('index.php/usuario/edit/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="lt0 link">editar</a>';
			}
			/*perfil editar blacklist*/
			if (perfil('#SPI#ADM') == 1) {
				$line['editar_blacklist'] = '<a href="' . base_url('index.php/usuario/edit_blackList/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="lt0 link">' . msg("editar_impedimento") . '</a>';
				//$line['editar_blacklist'] = '<a href="' . base_url('index.php/usuario/edit_blackList/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '" class="lt0 link">impedimento</a>';

				if (($line['id_bl'] > 0) and ($line['bl_ativo'] == 1)) {
					$line['img_blacklist'] = '<div style="border: 5px solid #000000"></div>';
				}

			}
		}
		$line['ghost'] = $this -> ghost_link($line['id_us']);
		if ($line['us_genero'] == 'M') { $line['us_genero'] = msg('Masculino');
		}
		if ($line['us_genero'] == 'F') { $line['us_genero'] = msg('Feminino');
		}

		if (validaCPF($line['us_cpf']) == false) {
			$line['us_cpf'] = '<font color="red">inv�lido</font>';
		}

		$line['us_ic_pagamento'] = '';

		/* */
		$vlr_ic_recebido = $this -> pagamentos_cpf($line['us_cpf']);
		if ($vlr_ic_recebido['total'] > 0) {
			$txt = 'Valores de Bolsas Recebidas IC/IT: ' . number_format($vlr_ic_recebido['valor'], 2, ',', '.');
			$txt = '<a href="#pagamentos" class="link lt2" onclick="mostra_pagamentos_ic();">' . $txt . '</a>';
			$line['us_ic_pagamento'] = $txt;
		} else {

		}

		$line['email'] = $this -> lista_email($id);
		return ($line);
	}

	function email_add($id, $email) {
		$email = lowercase($email);
		if (validaemail($email)) {
			$sx = '';
			/* valida se j� n�o existe */
			$sql = "select * from us_email 
								where usm_email = '$email' and usuario_id_us = $id ";
			$rlt = db_query($sql);
			if ($line = db_read($rlt)) {
				if ($line['usm_ativo'] == '0') {
					$sql = "update us_email set usm_ativo = '1' 
											where usm_email = '$email' and usuario_id_us = $id ";
					$rlt = $this -> db -> query($sql);
					$sx .= 'e-mail atualizado';
					$sx .= '<script> wclose(); </script>';
				} else {
					$sx = '<span class="error">E-mail j� cadastrado</span>';
				}

			} else {
				$data = date("Y-m-d");

				$sql = "insert into us_email 
									(
									usuario_id_us, usm_tipo, usm_email,
									usm_ativo, usm_email_preferencial, usm_drh,
									usm_dt_atualizacao, usm_dt_insercao
									) values (
									'$id','corp','$email',
									'1','1','1',
									'$data','$data'
									)";
				$rlt = $this -> db -> query($sql);
				$sx .= '<script> wclose(); </script>';
			}

		} else {
			$sx = '<span class="error">E-mail inv�lido</span>';
		}
		return ($sx);
	}

	function tel_add($id, $fone) {
		$fone = sonumero($fone);
		//if (validafone($email)) {
		$sx = '';
		/* valida se j� n�o existe */
		$sql = "select * from us_fone 
						where usf_fone = '$fone' and usuario_id_us = $id ";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			if ($line['usf_ativo'] == '0') {
				$sql = "update us_fone set usf_ativo = '1' 
								where usf_fone = '$fone' and usuario_id_us = $id ";
				$rlt = $this -> db -> query($sql);
				$sx .= 'telefone atualizado';
				$sx .= '<script> wclose(); </script>';
			} else {
				$sx = '<span class="error">E-mail j� cadastrado</span>';
			}

		} else {
			$data = date("Y-m-d");

			$sql = "insert into us_fone 
									(
									usuario_id_us, usf_tipo, usf_fone,
									usf_ativo, usf_fone_preferencial
									) values (
									'$id','corp','$fone',
									'1','1'
									)";
			$rlt = $this -> db -> query($sql);
			$sx .= '<script> wclose(); </script>';
		}
		//} else {
		//	$sx = '<span class="error">E-mail inv�lido</span>';
		//}
		return ($sx);
	}

	function recupera_email($id) {
		$sql = "select * from us_email where usuario_id_us = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line['usm_email']);
		} else {
			return ('');
		}
	}

	function recupera_fone($id) {
		$sql = "select * from us_fone where usuario_id_us = " . $id;
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			if (strlen($sx) > 0) { $sx .= ', ';
			}
			$sx .= format_fone($line['usf_fone']);
		}

		return ($sx);
	}

	function email_excluir($id) {
		$sql = "update us_email set usm_ativo = 0 where id_usm = " . $id;
		$rlt = $this -> db -> query($sql);
		$sx = '<script> wclose(); </script>';
		return ($sx);
	}

	function email_modify($id, $email) {
		$email = lowercase($email);
		/* $$$$ Inserir regra se j� existe e-mail em outro registro */
		if (validaemail($email)) {
			$sql = "update us_email set usm_ativo = 1, usm_email = '$email' where id_usm = " . $id;
			$rlt = $this -> db -> query($sql);
			$sx = '<script> wclose(); </script>';
		} else {
			$sx = '<span class="error">E-mail inv�lido</span>';
		}
		return ($sx);
		return ($sx);
	}

	function lista_email($id = 0, $edit = 0) {
		$sql = "select * from us_email where usm_ativo = 1 and usuario_id_us = " . $id;
		$sx = msg('nenhum e-mail localizado');
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<font class="lt2">';

		if ((function_exists('perfil'))) {
			if (perfil('#CPP#SPI#ADM#SEP') == 1) {
				$edit = 1;
			}
		}

		/* Adiciona e-mail */
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$idx = $line['id_usm'];
			if ($r > 0) {
				$sx .= '; ';
			}
			if ($edit == 1) {
				$onclick = 'onclick="newxy(\'' . base_url('index.php/usuario/email_mod/' . $idx . '/' . checkpost_link($idx)) . '\',600,200);" ';
				$sx .= '<A HREF="#" class="link lt2" ' . $onclick . '>';
			}
			$sx .= $line['usm_email'];
			if ($edit == 1) {
				$sx .= '</A>';
			}

			//$sx .= '(*)';
		}

		if ($edit == 1) {
			$onclick = 'onclick="newxy(\'' . base_url('index.php/usuario/email_add/' . $id . '/' . checkpost_link($id)) . '\',600,200);" ';
			$sx .= ' | ';
			$sx .= '<a href="#" class="link lt0" ' . $onclick . '>' . msg('add_email') . '</A>';
		}
		return ($sx);
	}

	function cp_email() {
		$cp = array();
		array_push($cp, array('$H8', 'id_usm', '', False, True));
		array_push($cp, array('$H8', 'usuario_id_us', '', False, True));
		array_push($cp, array('$O PERN:' . msg('pessoal') . '&COOP:' . msg('corporativo'), 'usm_tipo', '', False, True));
		array_push($cp, array('$EMAIL', 'usm_email', '', False, True));
		array_push($cp, array('$O 1:SIM&0:N�O', 'usm_ativo', '', False, True));
		array_push($cp, array('$O 1:SIM&0:N�O', 'usm_email_preferencial', '', False, True));
		return ($cp);
	}

	function cp() {
		$cp = array();
		$sql_tipo = 'select * from pro_equipamento_tipo where pet_ativo = 1';
		array_push($cp, array('$H8', 'id_us', '', False, True));
		array_push($cp, array('$S200', 'us_nome', msg('us_nome'), True, False));
		array_push($cp, array('$S12', 'us_cracha', msg('cracha'), False, True));
		array_push($cp, array('$S20', 'us_cpf', msg('cpf'), False, True));
		array_push($cp, array('$S20', 'us_emplid', msg('employID'), False, True));

		array_push($cp, array('$S100', 'us_link_lattes', msg('link_lattes'), False, True));
		//		$sql = "select * from us_tipo order by ust_id ";
		//		array_push($cp, array('$Q ust_id:ust_titulacao_sigla:' . $sql, 'usuario_tipo_ust_id', msg('us_tipo'), False, True));

		$sql = "select * from us_funcao where usf_ativo = 1 order by usf_id ";
		array_push($cp, array('$Q usf_id:usf_nome:' . $sql, 'usuario_funcao_usf_id', msg('us_funcao'), False, True));

		$sql = "select * from us_titulacao where ust_ativo = 1 order by ust_id ";
		array_push($cp, array('$Q ust_id:ust_nome:' . $sql, 'usuario_titulacao_ust_id', msg('us_titulacao'), False, True));

		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('Feminino'), 'us_genero', msg('us_genero'), True, True));

		array_push($cp, array('$O 1:SIM&0:N�O', 'us_ativo', msg('eq_ativo_2'), True, True));
		array_push($cp, array('$O 0:N�O&1:SIM', 'us_teste', msg('user_teste'), True, True));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function readByCracha($cracha) {
		/* Busca dados do cadastro */
		if (strlen($cracha) == 0) {
			return ( array());
		}
		$sql = "select * from " . $this -> tabela . " as t1
					left join us_titulacao as t2 on t1.usuario_titulacao_ust_id = t2.ust_id				 
					where us_cracha = '" . $cracha . "' ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id = $line['id_us'];
			$line = $this -> le($id);
		} else {
			$line = array();
		}
		return ($line);
	}

	function geraCracha() {
		$sql = "select count(*) as total from us_usuario ";
		$rlt = db_query($sql);
		$line = db_read($rlt);
		$cracha = 'F' . strzero(($line['total'] + 1), 7);
		return ($cracha);
	}

	function readByCPF($cpf) {
		$cpf = sonumero($cpf);
		/* Busca dados do cadastro */
		$sql = "select * from " . $this -> tabela . " as t1
					left join us_titulacao as t2 on t1.usuario_titulacao_ust_id = t2.ust_id				 
					where us_cpf = '" . $cpf . "' order by usuario_tipo_ust_id desc ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			$line = $rlt[0];
			$id = $line['id_us'];
			$line = $this -> le($id);
		} else {
			$line = array();
		}
		return ($line);
	}

	function readById($id) {
		/* Busca dados do cadastro */
		$sql = "select *, us_titulacao.ust_nome as titulacao, 
					us_tipo.ust_titulacao_sigla as perfil
					 from " . $this -> tabela . "	
					left join us_titulacao on usuario_titulacao_ust_id= us_titulacao.ust_id		
					left join us_tipo on usuario_tipo_ust_id = us_tipo.ust_id		 
					where id_us = '" . $id . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$line = $rlt[0];
		$line['us_titulacao'] = $line['titulacao'];
		$line['us_titulacao_sigla'] = $line['ust_titulacao_sigla'];
		$line['us_perfil'] = $line['perfil'];
		$line['us_curso'] = '';
		$line['us_contatos'] = '';

		return ($line);
	}

	function limpa_cracha($cracha) {
		if (strlen($cracha) == 13) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 12) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 11) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 9) { $cracha = substr($cracha, 0, 8);
		}
		if (strlen($cracha) > 8) {
			return ('');
		}
		if (strlen($cracha) < 8) {
			return ('');
		}
		return ($cracha);
	}

	function buscaCentro($centro) {
		$sql = "select * from centro_academico 
						INNER JOIN campus on da_campus = id_c
					WHERE da_nome = '$centro' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];

			$rt = array($line['id_da'], $line['c_campus']);
			return ($rt);
		} else {
			echo 'OPS ' . $centro;
			exit ;
		}
	}

	function insere_usuario($DadosUsuario) {

		$nome = nbr_autor($DadosUsuario['nome'], 7);
		$nome = troca($nome, "'", '�');
		$cpf = $DadosUsuario['cpf'];
		$cpf = strzero($cpf, 11);

		$email1 = trim($DadosUsuario['email1']);
		$email2 = trim($DadosUsuario['email2']);

		$tel1 = trim($DadosUsuario['tel1']);
		$tel2 = trim($DadosUsuario['tel2']);
		$curso = trim($DadosUsuario['nomeCurso']);

		$genero = $DadosUsuario['sexo'];
		$dtnasc = sonumero($DadosUsuario['dataNascimento']);
		$dtnasc = substr($dtnasc, 4, 4) . '-' . substr($dtnasc, 2, 2) . '-' . substr($dtnasc, 0, 2);
		$cracha = $DadosUsuario['pessoa'];

		if (isset($DadosUsuario['nomeCurso'])) {
			$data = $DadosUsuario['nomeCurso'];
			$curso = trim($this -> limpaCursos($curso));
		} else {
			$data = array();
			$curso = '';
		}

		$rs = $this -> buscaCentro($DadosUsuario['centroAcademico']);
		$centro = $rs[0];
		$campus = $rs[1];
		$emplid = '';
		$tipo = $DadosUsuario['tipo'];

		$sql = "select * from " . $this -> tabela . " where 
				us_cpf = '$cpf' 
				and us_cracha = '$cracha'
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
			$line = $rlt[0];
			$idu = $line['id_us'];

			if ($line['us_cracha'] != $cracha) {
				$up = ", us_cracha = '$cracha' ";
			} else {
				$up = '';
			}
			if ($DadosUsuario['tipo'] != '') {
				$up = ", us_tipo = '$tipo' ";
			} else {
				$up = '';
			}			

			$sql = "update " . $this -> tabela . " set
						us_curso_vinculo = '$curso',
						us_cpf = '$cpf',
						us_dt_update_cs = '" . date("Y-m-d") . "',
						usuario_tipo_ust_id = $tipo,						
						us_genero = '$genero',
						us_centro_academico = '$centro',
						us_campus_vinculo = '$campus',
						us_dt_nascimento = '$dtnasc'
						$up
					where us_cracha = '$cracha'";

			$this -> db -> query($sql);
		} else {
			/* Novo registro */
			$sql = "insert into " . $this -> tabela . " 
							(
							us_nome, us_cpf, us_cracha,
							us_emplid, usuario_tipo_ust_id, us_dt_nascimento,
							us_curso_vinculo, us_dt_update_cs,
							us_campus_vinculo, us_centro_academico
							) values (
							'$nome','$cpf','$cracha',
							'$emplid','$tipo','$dtnasc',
							'$curso', '" . date("Y-m-d") . "',
							'$campus','$centro'
							)					
					";
			$this -> db -> query($sql);

			$sql = "select * from " . $this -> tabela . " where us_cpf = '$cpf' order by usuario_tipo_ust_id";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			$line = $rlt[0];
			$idu = $line['id_us'];
		}
		if ($idu > 0) {
			if (strlen($email1) > 0) { $this -> email_add($idu, $email1);
			}
			if (strlen($email2) > 0) { $this -> email_add($idu, $email2);
			}
			if (strlen($tel1) > 0) { $this -> tel_add($idu, $tel1);
			}
			if (strlen($tel2) > 0) { $this -> tel_add($idu, $tel2);
			}
		}
	}

	function limpaCursos($c) {
		$c = troca($c, '(Tarde)', '');
		$c = troca($c, '(Diurno)', '');
		$c = troca($c, '(Noturno)', '');
		return ($c);
	}

	function row_usuario_session($obj) {
		$obj -> fd = array('id_us', 'us_nome', 'us_cracha', 'us_cpf');
		$obj -> lb = array('id', msg('nome'), msg('cracha'), msg('cpf'));
		$obj -> mk = array('', 'L', 'C', 'C');
		return ($obj);
	}

	/*Atualiza dados do usuario */
	function cp_usuario_session() {

		$cp = array();

		array_push($cp, array('$H8', 'id_us', '', False, True));
		array_push($cp, array('${', '', 'Pessoais', False, False));
		array_push($cp, array('$S100', 'us_nome', msg('lb_us_nome'), False, False));
		array_push($cp, array('$S20', 'us_cracha', msg('lb_us_cracha'), False, False));
		array_push($cp, array('$S20', 'us_cpf', msg('lb_us_cpf'), False, False));
		array_push($cp, array('$D20', 'us_dt_nascimento', msg('lb_us_dt_nascimento'), False, True));
		array_push($cp, array('$O M:' . msg('masculino') . '&F:' . msg('feminino'), 'us_genero', msg('lb_us_genero'), True, True));
		array_push($cp, array('$O 1:N�o definido&2:Professor&3:Aluno&4:Colaborador&5:Externo', 'usuario_tipo_ust_id', msg('lb_usu_tipo'), True, True));

		array_push($cp, array('$}', '', '', False, False));

		array_push($cp, array('${', '', 'Profissionais e Acad�mico', False, False));
		//array_push($cp, array('$S30', 'us_codigo_rh', msg('lb_us_codigo_rh'), False, True));
		//array_push($cp, array('$O 1:N�o definido&2:Professor auxiliar de ensino&3:Professor assistente&4:Professor adjunto&8:Professor titular', 'usuario_funcao_usf_id', msg('lb_usu_funcao'), FALSE, True));
		//array_push($cp, array('$O 1:N�o definido&2:T�cnico&3:Gradua��o&4:Especialista&5:Mestre&6:Doutor&7:P�s-Doutorado&8:Resid�ncia M�dica', 'usuario_titulacao_ust_id', msg('lb_usu_titulacao'), FALSE, True));
		//array_push($cp, array('$S100', 'us_nome_lattes', msg('lb_us_nome_lattes'), False, True));
		array_push($cp, array('$S100', 'us_link_lattes', msg('lb_us_link_lattes'), False, True));
		//array_push($cp, array('$S100', 'us_curso_vinculo', msg('lb_us_curso_vinculo'), False, True));
		//array_push($cp, array('$S100', 'us_escola_vinculo', msg('lb_us_escola_vinculo'), False, True));
		//array_push($cp, array('$O 1:N�o definido&2:PUCPR&3:Externo', 'us_origem', msg('lb_us_origem'), False, True));
		//array_push($cp, array('$O 1:N�o definido&2:Stricto Sensu&3:Gradua��o', 'us_professor_tipo', msg('lb_us_professor_tipo'), False, True));
		//array_push($cp, array('$O 1:N�o definido&2:Inativo&3:Gradua��o&4:Mestrado&5:Doutorado&6:P�s-Doutorado', 'us_usuario_cursando', msg('lb_us_usuario_cursando'), False, True));
		//array_push($cp, array('$O 1:Horista&2:TI&36:TP', 'us_regime', msg('lb_us_regime'), False, True));
		//array_push($cp, array('$O 1:SIM&0:N�O', 'us_ativo', msg('lb_eq_ativo_2'), True, True));
		//array_push($cp, array('$O 0:N�O&1:SIM', 'us_teste', msg('user_teste'), False, True));
		array_push($cp, array('$}', '', '', False, False));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function le_usuario_session($id = 0) {
		$sql = "select * from us_usuario where id_us = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$data = $rlt[0];

		return ($data);
	}

	/*Atualiza usuario na blacklist */
	function cp_usu_blacklist($id = 0) {

		$cp = array();

		array_push($cp, array('$H8', 'id_bl', '', False, True));
		array_push($cp, array('${', '', 'Edita Impedimentos', False, False));
		array_push($cp, array('$HV', 'bl_user_id', $id, False, True));
		array_push($cp, array('$T30:5', 'bl_motivo', msg('lb_blu_motivo'), False, True));
		array_push($cp, array('$D20', 'bl_data', msg('lb_blu_dt_inicio'), False, True));
		array_push($cp, array('$D20', 'bl_data_ate', msg('lb_blu_dt_fim'), False, True));
		array_push($cp, array('$O 1:SIM&0:N�O', 'bl_ativo', msg('lb_blu_ativo'), False, True));
		array_push($cp, array('$}', '', '', False, False));

		array_push($cp, array('$B', '', msg('enviar'), false, True));

		return ($cp);
	}

	function existe_impedimento($id = 0) {

		$sql = "select * from ic_blacklist 
						where bl_user_id = " . $id;

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			$line = $rlt[0];
			return $line['id_bl'];
		} else {
			return 0;
		}
	}

}
?>