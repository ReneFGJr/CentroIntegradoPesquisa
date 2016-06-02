<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> load -> library("nuSoap_lib");
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');

		/* Security */
		//$this -> security();

		//$this -> lang -> load("app", "english");
	}

	function wdsl() {
		$server = new nusoap_server;
		$server -> configureWSDL('server', 'urn:server');

		$server -> wsdl -> schemaTargetNamespace = 'urn:server';

		//SOAP complex type return type (an array/struct)
		$server -> wsdl -> addComplexType('Person', 'complexType', 'struct', 'all', '', array('id_user' => array('name' => 'id_user', 'type' => 'xsd:int'), 'fullname' => array('name' => 'fullname', 'type' => 'xsd:string'), 'email' => array('name' => 'email', 'type' => 'xsd:string'), 'level' => array('name' => 'level', 'type' => 'xsd:int')));

		//first simple function
		$server -> register('hello', array('username' => 'xsd:string'), //parameter
		array('return' => 'xsd:string'), //output
		'urn:server', //namespace
		'urn:server#helloServer', //soapaction
		'rpc', // style
		'encoded', // use
		'Just say hello');
		//description

		//this is the second webservice entry point/function
    $server->register('hello',
        array('name' => 'xsd:string'),
        array('return' => 'xsd:string'),
        'urn:server.hello',
        'urn:server.hello#hello',
        'rpc',
        'encoded',
        'Retorna o nome'
    );

		//first function implementation
		function hello($username) {
			return 'Howdy, ' . $username . '!';
		}

		//second function implementation
		function login($username, $password) {
			//should do some database query here
			// .... ..... ..... .....
			//just some dummy result
			return array('id_user' => '1', 'fullname' => 'John Reese', 'email' => 'john@reese.com', 'level' => '99');
		}

		$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

		$server -> service($HTTP_RAW_POST_DATA);
	}

	public function index() {
		return ('');
	}

}
