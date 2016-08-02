<?php
/**
 * LOGIN JOSSO CIP (C) 2016
 *
 * @package	Login
 * @author	Rene F. Gabriel Junior <renefgj@gmail.com>
 * @copyright	Copyright (c) 2009 - 2016, PUCPR
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://cip.pucpr.br/about
 * @since	Version v0.15.23
 * @filesource
 */

class login extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> load -> database();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users_helper');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');

		//$this -> lang -> load("app", "english");
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('CIP', '/cip/'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}

	function ab($id = 0, $chk = '') {
		/* Remover */
		$chk2 = checkpost_link($id);

		if ($chk != $chk2) {
			//echo checkpost_link($id);
			echo 'Erro de Checkpost - ' . $chk2;
			return ('');
		} else {
			$id = UpperCase($id);
			$sql = "select * from logins where us_login = '$id' ";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();

			/* Login não localizado */
			if (count($rlt) == 0) {
				redirect(base_url('index.php'));
			}
			$line = $rlt[0];

			/* Model */
			$this -> load -> model('usuarios');

			if (count($rlt) > 0) {
				/* Recupera dados */
				$this -> josso_login_pucpr -> cpf = $line['us_cpf'];
				//$this -> josso_login_pucpr -> josso = $line['jossoSession'];
				$this -> josso_login_pucpr -> nome = $line['us_nome'];
				//$this -> josso_login_pucpr -> perfil = $line['us_perfil'];
				$this -> josso_login_pucpr -> id = $line['id_us'];
				$this -> josso_login_pucpr -> cracha = '';
				$this -> josso_login_pucpr -> nomeEmpresa = '';
				$this -> josso_login_pucpr -> nomeFilial = '';
				$this -> josso_login_pucpr -> cracha = $line['us_cracha'];
				$this -> josso_login_pucpr -> us_id = $line['us_id'];
				$this -> josso_login_pucpr -> us_id = $line['us_id'];
				$this -> josso_login_pucpr -> loged = 1;
				$this -> josso_login_pucpr -> josso = date("YmfHis");
				$this -> usuarios -> security_set($line['id_us']);
				$this -> usuarios -> historico_insere($line['us_cpf'], 'ACB');
				$link = base_url('index.php/main');
				redirect($link);
			}
		}
		echo 'ERRO DE ACESSO!';
		exit ;
	}

	function email($id, $chk = '') {
		$this -> cab();
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');
		$dados = $this -> usuarios -> le($id);
		$data = array();
		$data['nome'] = $dados['us_nome'];
		$nw = $this -> mensagens -> busca('email_password', $data);
		$txt = $nw['nw_texto'];
		$assunto = $nw['nw_titulo'];
		$fmt = $nw['nw_formato'];
		$link = $this->usuarios->link_acesso($id);
		$link = '<a href="' . $link . '">link de acesso</a><br>ou ' . $link;
		$txt = troca($txt, '$link', $link);

		$this -> load -> view('usuario/view', $dados);

		$para = 1;
		enviaremail_usuario($id, $assunto, $txt, 2);
		$tela = '<font color="green">e-mail enviado com sucesso!</font>';
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
	}

	function ac($id = 0, $chk = '') {
		/* Remover */
		$chk = checkpost_link($id); //retirado do ar a pedido da diretoria, pois entra em conflito de regras de segurança

		if ($chk != checkpost_link($id)) {
			echo checkpost_link($id);
		} else {
			$id = round($id);
			$sql = "select * from us_usuario where id_us = " . $id;

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) == 0) {
				$link = base_url('index.php/login');
			}
			$line = $rlt[0];

			/* Model */
			$this -> load -> model('usuarios');

			if (count($rlt) > 0) {
				/* Recupera dados */
				$this -> usuarios -> security_set($id);
				$this -> usuarios -> historico_insere($line['us_cpf'], 'ACR');
				$link = base_url('index.php/main');
				redirect($link);
			}
		}
		
		$link = base_url('index.php/error');
		redirect($link);
		
		exit ;
	}

	function ap($id = 0, $chk = '') {
		/* Remover */
		$chk2 = checkpost_link($id . date("Ymdhi"));

		if ($chk != $chk2) {
			redirect(base_url("index.php/login"));
		} else {
			$id = round($id);
			$sql = "select * from us_usuario where id_us = " . $id;

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];

			/* Model */
			$this -> load -> model('usuarios');

			if (count($rlt) > 0) {
				/* Recupera dados */
				$this -> usuarios -> security_set($line['id_us']);
				$this -> usuarios -> historico_insere($line['us_cpf'], 'ACP');
				$link = base_url('index.php/main');
				redirect($link);
			}
		}
		echo 'ERRO DE ACESSO!';
		exit ;
	}

	function a($id = 0, $chk = '') {
		$this -> load -> model('usuarios');
		$this -> load -> model('login/josso_login_pucpr');
		/* Remover */
		$chk2 = checkpost_link($id . 'acesso_professor');

		if ($chk != $chk2) {
			redirect(base_url("index.php/login"));
		} else {
			$id = round($id);
			$sql = "select * from us_usuario where id_us = " . $id;

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];

			/* Model */
			$this -> load -> model('usuarios');

			if (count($rlt) > 0) {
				/* Recupera dados */
				$this -> josso_login_pucpr -> cpf = $line['us_cpf'];
				//$this -> josso_login_pucpr -> josso = $line['jossoSession'];
				$this -> josso_login_pucpr -> nome = $line['us_nome'];
				//$this -> josso_login_pucpr -> perfil = $line['us_perfil'];
				$this -> josso_login_pucpr -> id = $line['id_us'];
				$this -> josso_login_pucpr -> cracha = '';
				$this -> josso_login_pucpr -> nomeEmpresa = '';
				$this -> josso_login_pucpr -> nomeFilial = '';
				$this -> josso_login_pucpr -> cracha = $line['us_cracha'];
				$this -> josso_login_pucpr -> id_us = $line['id_us'];
				$this -> josso_login_pucpr -> loged = 1;
				$this -> josso_login_pucpr -> ghost = 1;
				$this -> josso_login_pucpr -> josso = date("YmfHis");
				$this -> usuarios -> security_set($line['id_us']);
				$this -> usuarios -> historico_insere($line['us_cpf'], 'ACP');
				$link = base_url('index.php/main');
				redirect($link);
			}
		}
		echo 'ERRO DE ACESSO!';
		exit ;
	}

	function r($id = 0, $chk = '') {
		$data = array();
		$this -> load -> view('header/header', $data);
		$check = checkpost_link($id . 'avaliador_semic');
		echo $chk . '<BR>';
		echo $check;
		if ($chk != $check) {
			$this -> load -> view('header/503.php');
			return ('');
		} else {
			$id = round($id);
			$sql = "select * from us_usuario where id_us = " . $id;

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];

			/* Model */
			$this -> load -> model('usuarios');

			if (count($rlt) > 0) {
				/* Recupera dados */
				echo '===>' . $line['us_cpf'];
				$prefil = '#AVA';

				$this -> josso_login_pucpr -> cpf = $line['us_cpf'];
				//$this -> josso_login_pucpr -> josso = $line['jossoSession'];
				$this -> josso_login_pucpr -> nome = $line['us_nome'];
				$this -> josso_login_pucpr -> perfil = $perfil;
				$this -> josso_login_pucpr -> id = $line['id_us'];
				$this -> josso_login_pucpr -> cracha = '';
				$this -> josso_login_pucpr -> nomeEmpresa = '';
				$this -> josso_login_pucpr -> nomeFilial = '';
				$this -> josso_login_pucpr -> loged = 1;
				$rs = $this -> usuarios -> security();
				$this -> josso_login_pucpr -> historico_insere($line['us_cpf'], 'ADR');

				/*
				 /* Grava dados na Session */
				if ($rs == 0) {
					$dados = array('perfil' => $perfil, 'id_us' => $this -> josso_login_pucpr -> id, 'cracha' => '', 'cpf' => $line['us_cpf'], 'josso' => $this -> josso, 'nome' => $line['us_nome']);
					$this -> session -> set_userdata($dados);
				}

				$link = base_url('index.php/semic/aceite');
				redirect($link);
			}
		}
		echo 'ERRO DE ACESSO!';
		exit ;
	}

	function logout() {
		/* Model */
		$this -> load -> model('usuarios');
		$this -> usuarios -> logout();

		/* Redireciona */
		$link = index_page();
		if (strlen($link) > 0) { $link .= '/';
		}
		$link = base_url('index.php/login');
		redirect($link);
	}

	function debug() {
		global $dd, $acao;
		//form_sisdoc_getpost();
		$data['login_error'] = '';

		/* Carrega modelo */
		$err = $this -> load -> model('usuarios');
		$login = '';
		$password = '';

		$acao = $this -> input -> post('acao');

		if (isset($acao) and (strlen($acao) > 0)) {
			/* ZERA ERROS
			 */
			$data['login_error'] = '';

			$login = $this -> input -> get_post('dd1');
			$password = $this -> input -> get_post('dd2');
			$ok = $this -> usuarios -> consulta_login($login, $password, 1);
			exit ;
		}

		/* Monta telas */
		$data['login_versao'] = 'DEBUG';
		$data['versao'] = '';
		$data['login_name'] = '';
		$data['lg_name'] = '';
		$data['login_password'] = '';
		$data['lg_password'] = '';
		$data['login_entrar'] = 'ENTRAR';
		$data['modo'] = 'DEBUG';
		$data['link_debug'] = '/debug';
		$this -> load -> view('header/header', $data);
		$this -> load -> view('login/login');
	}

	function id($id = 0, $chk = '') {
		$data = array();
		$this -> load -> view("header/header", $data);
		$this -> load -> view("errors/cli/cpf_not_found", $data);

		/* Carrega modelo */
		$this -> load -> model('usuarios');
		$form = new form;
		$form -> id = $id;
		$cp = array();
		$cpf = get('dd3');
		$cpf_valid = validaCPF($cpf);

		array_push($cp, array('$H8', 'id_us', '', false, false));
		array_push($cp, array('$S80', 'us_nome', msg('us_nome'), false, false));
		array_push($cp, array('$S20', 'us_login', msg('us_login'), false, false));
		array_push($cp, array('$S12', 'us_cpf', msg('informe seu cpf'), True, True));
		array_push($cp, array('$HV', '', $cpf_valid, True, True));
		if ($cpf_valid == 0) {
			array_push($cp, array('$A', '', '<font color="red">' . msg('cpf_invalido') . '</font>', false, false));
		}
		$tela = $form -> editar($cp, 'logins');
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		if ($form -> saved > 0) {
			$cpf = strzero(sonumero($cpf), 11);
			$sql = "select * from us_usuario where us_cpf = '$cpf' order by us_ativo desc ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			if (count($rlt) > 0) {
				$line = $rlt[0];
				$idu = $line['id_us'];
				$sql = "update logins set 
									us_id = $idu,
									us_cpf = '$cpf' 
								where id_us = $id
								";
				$rltx = $this -> db -> query($sql);
			}
			redirect(base_url('index.php'));
		}

	}

	function cracha($id = 0, $chk = '') {
		$this -> load -> model("usuarios");

		$data = array();
		$this -> load -> view("header/header", $data);
		$this -> load -> view("errors/cli/cracha_not_found", $data);

		$data = $this -> usuarios -> le($id);
		$us_nome = $data['us_nome'];

		/* Carrega modelo */
		$this -> load -> model('usuarios');
		$form = new form;
		$form -> id = $id;
		$cp = array();
		$cracha = get('dd5');
		$cracha = $this -> usuarios -> limpa_cracha($cracha);
		if (strlen($cracha) > 0) { $cracha_valid = 1;
		} else { $cracha_valid = 0;
		}

		array_push($cp, array('$H8', 'id_us', '', false, True));
		array_push($cp, array('${', '', 'Nome do usuário', False, True));
		array_push($cp, array('$M', '', $us_nome, False, False));
		array_push($cp, array('$}', '', '', False, True));
		array_push($cp, array('${', '', 'Informe seu Cracha', False, True));
		array_push($cp, array('$S12', 'us_cracha', msg('us_cracha'), True, True));
		array_push($cp, array('$}', '', '', False, True));

		array_push($cp, array('$M', '', '=>' . $cracha, False, True));

		array_push($cp, array('$HV', '', $cracha_valid, True, True));
		if ($cracha_valid == 0) {
			array_push($cp, array('$A', '', '<font color="red">' . msg('cracha_invalido') . '</font>', false, false));
		}
		$tela = $form -> editar($cp, 'us_usuario');
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		if ($form -> saved > 0) {
			$line = $data;
			$idu = $line['id_us'];
			$sql = "update us_usuario set 
								us_cracha = '$cracha' 
							where id_us = $id";
			$rltx = $this -> db -> query($sql);
			redirect(base_url('index.php/login'));
		}

	}

	function link() {
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');

		$data['login_error'] = '';

		/* Carrega modelo */
		$login = '';
		$password = '';
		$acao = get('acao');

		if (isset($acao) and (strlen($acao) > 0)) {
			/* ZERA ERROS
			 */

			$ok = 0;
			$cracha = get('dd1');
			$password = get('dd2');
			$data = $this -> usuarios -> le_cracha($login);
			$data['login_error'] = '';
			if (count($data) > 0) {
				$ok = 1;
			} else {
				$ok = -1;
			}
			switch($ok) {
				case (1) :
				/* Associar login com user */
					$cracha = $this -> usuarios -> limpa_cracha($cracha);
					$sql = "select * from us_usuario where us_cracha = '$cracha' ";
					$rlo = $this -> db -> query($sql);
					$rlo = $rlo -> result_array();
					if (count($rlo) > 0) {
						$dados = $rlo[0];
						$id = trim($dados['id_us']);
						$cracha = trim($dados['us_cracha']);

						$data = array();
						$data['nome'] = $dados['us_nome'];
						$nw = $this -> mensagens -> busca('email_password', $data);
						$txt = $nw['nw_texto'];
						$assunto = $nw['nw_titulo'];
						$fmt = $nw['nw_formato'];
						$link = base_url('index.php/login/a/' . $id . '/' . checkpost_link($id . 'acesso_professor'));
						$link = '<a href="' . $link . '">link de acesso</a><br>ou ' . $link;
						$txt = troca($txt, '$link', $link);

						$para = 1;
						enviaremail_usuario($id, $assunto, $txt, 2);
						$tela = '<font color="green">e-mail enviado com sucesso!</font>';
						$data['content'] = $tela;
						$this -> load -> view('content', $data);
					} else {
						$data['login_error'] = 'Crachá não localizado';
					}

				//$this->
				case (-1) :
					$data['login_error'] = '<div id="login_erro">' . $this -> lang -> line('login_erro_01') . '</div>';
					$link = '<a href="' . base_url('index.php/login/link') . '" class="link lt1">';
					$data['login_error'] .= '<BR>' . $link . '<div id="login_erro">Dificuldades no acesso? Clique aqui e receba um link de acesso em seu e-mail cadastrado</div></a>';

					break;
				default :
					$data['login_error'] = 'Error - Empty ' . $ok;
					break;
			}
		}

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_login.css');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		$data['lg_name'] = $login;
		$data['lg_password'] = $this -> input -> get_post('dd2'); ;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$this -> load -> view('login/send_password');
	}

	function index() {
		$this -> load -> model('usuarios');

		$data['login_error'] = '';

		/* Carrega modelo */
		$login = '';
		$password = '';
		$acao = get('acao');

		if (isset($acao) and (strlen($acao) > 0)) {
			/* ZERA ERROS
			 */
			$data['login_error'] = '';

			$login = get('dd1');
			$password = get('dd2');
			$ok = $this -> usuarios -> consulta_login($login, $password);

			switch($ok) {
				case (1) :
				/* Associar login com user */
					$sql = "select * from us_usuario where us_login = '$login' ";
					$rlo = $this -> db -> query($sql);
					$rlo = $rlo -> result_array();
					$line = $rlo[0];
					$id_us = trim($line['id_us']);
					$cracha = trim($line['us_cracha']);

					/* Sem identificacao (LOGINS) registrado*/
					if ((strlen($cracha) == 0) or (strlen($cpf) == 0)) {
						$cpf = $line['us_cpf'];

						if (strlen($cracha) == 0) {
							redirect(base_url('index.php/login/cracha/' . $line['id_us'] . '/' . checkpost_link($line['id_us'] . date("Ymdhi"))));
							return ('');
						}

						if (strlen($cpf) == 0) {
							redirect(base_url('index.php/login/cpf/' . $line['id_us'] . '/' . checkpost_link($line['id_us'] . date("Ymdhi"))));
							return ('');
						}
					}

					/* Seta Security */

					redirect(base_url('index.php/main'));
					exit ;
					break;
				case (2) :
				/* validado_por_senha_anterior */
					$this -> usuarios -> security_set($this -> usuarios -> id);
					redirect(base_url('index.php/main'));
					exit ;
					break;
				case (-1) :
					$data['login_error'] = '<div id="login_erro">' . $this -> lang -> line('login_erro_01') . '</div>';
					$link = '<a href="' . base_url('index.php/login/link') . '" class="link lt1">';
					$data['login_error'] .= '<BR>' . $link . '<div id="login_erro">Dificuldades no acesso? Clique aqui e receba um link de acesso em seu e-mail cadastrado</div></a>';

					break;
				default :
					$data['login_error'] = 'Error - Empty ' . $ok;
					break;
			}
		}

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_login.css');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Autenticacao */
		$data['login_name'] = $this -> lang -> line('login_name');
		$data['login_password'] = $this -> lang -> line('login_password');
		$data['login_entrar'] = $this -> lang -> line('login_entrar');
		$data['login_versao'] = $this -> lang -> line('login_versao');
		$data['versao'] = $this -> lang -> line('versao');
		$data['link_debug'] = '';

		$data['lg_name'] = $login;
		$data['lg_password'] = $this -> input -> get_post('dd2'); ;

		require ("_server_type.php");
		switch ($server_type) {
			case '1' :
				$data['modo'] = 'Modo: <A href="' . base_url('index.php/login/ac/2') . '"><B>Desenvolvimento</B></A>';
				break;
			case '2' :
				$data['modo'] = 'Modo: <B>Homologação</B>';
				break;
			case '3' :
				$data['modo'] = 'Modo: <B>Produção</B>';
				break;
			default :
				$data['modo'] = 'Não definido';
				break;
		}

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$this -> load -> view('login/login');
	}

}
