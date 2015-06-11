<?php
/**
 * LOGIN JOSSO CIP
 *
 * @package	Login
 * @author	Rene F. Gabriel Junior <renefgj@gmail.com>
 * @copyright	Copyright (c) 2009 - 2015, PUCPR
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

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		date_default_timezone_set('America/Sao_Paulo');

		//$this -> lang -> load("app", "english");
	}

	function ac($id=0, $chk='') {
		/* Remover */
		$chk = checkpost_link($id);
		
		if ($chk != checkpost_link($id)) {
			echo checkpost_link($id);
		} else {
			$id = round($id);
			$sql = "select * from logins where id_us = " . $id;
			
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
			$line = $rlt[0];
			
			/* Model */
			$this -> load -> model('login/josso_login_pucpr');

			if (count($rlt) > 0) {
				/* Recupera dados */
				$this -> josso_login_pucpr -> cpf = $line['us_cpf'];
				//$this -> josso_login_pucpr -> josso = $line['jossoSession'];
				$this -> josso_login_pucpr -> nome = $line['us_nome'];
				$this -> josso_login_pucpr -> cracha = '';
				$this -> josso_login_pucpr -> nomeEmpresa = '';
				$this -> josso_login_pucpr -> nomeFilial = '';
				$this -> josso_login_pucpr -> loged = 1;
				$this -> josso_login_pucpr -> security();
				$this -> josso_login_pucpr -> historico_insere($line['us_cpf'],'ADR');
				$link = base_url('index.php/main');
				redirect($link);
			}
		}
		echo 'ERRO DE ACESSO!';
		exit ;
	}

	function logout() {
		/* Model */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> logout();

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
		$err = $this -> load -> model('login/josso_login_pucpr');
		$login = '';
		$password = '';

		$acao = $this -> input -> post('acao');

		if (isset($acao) and (strlen($acao) > 0)) {
			/* ZERA ERROS
			 */
			$data['login_error'] = '';

			$login = $this -> input -> get_post('dd1');
			$password = $this -> input -> get_post('dd2');
			$ok = $this -> josso_login_pucpr -> consulta_login($login, $password, 1);
			exit;
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
	

	function index() {
		global $dd, $acao;
		//form_sisdoc_getpost();
		$data['login_error'] = '';

		/* Carrega modelo */
		$err = $this -> load -> model('login/josso_login_pucpr');
		$login = '';
		$password = '';

		$acao = $this -> input -> post('acao');

		if (isset($acao) and (strlen($acao) > 0)) {
			/* ZERA ERROS
			 */
			$data['login_error'] = '';

			$login = $this -> input -> get_post('dd1');
			$password = $this -> input -> get_post('dd2');
			$ok = $this -> josso_login_pucpr -> consulta_login($login, $password);

			switch($ok) {
				case (1) :
					$link = index_page();
					if (strlen($link) > 0) { $link .= '/';
					}
					$link = base_url($link . 'main');
					redirect($link);
					exit ;
					break;
				case (-1) :
					$data['login_error'] = '<div id="login_erro">' . $this -> lang -> line('login_erro_01') . '</div>';
					break;
				default :
					$data['login_error'] = 'Empty ' . $ok;
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
				$data['modo'] = 'Modo: <B>Desenvolvimento</B>';
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
