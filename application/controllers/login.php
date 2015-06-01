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
				case (1):
					$link = index_page();
					if (strlen($link) > 0) { $link .= '/'; }
					$link = base_url($link.'main');					
					redirect($link);
					exit;
					break;
				case (-1):
					$data['login_error'] = '<div id="login_erro">'.$this -> lang -> line('login_erro_01').'</div>';
					break;	
				default :
					$data['login_error'] = 'Empty '.$ok;
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

		$data['lg_name'] = $login;
		$data['lg_password'] = $this -> input -> get_post('dd2');
		;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$this -> load -> view('login/login');
	}

}
