<?php
/**
 * CodeIgniter Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	WebService
 * @category	Campus Solution
 * @author		Rene F. Gabriel Junior <renefgj@gmail.com>
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ws_cnpq extends CI_model {
	var $producao = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';
	var $homologacao = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';
	var $desenvolvimento = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';

	function getCurriculoCompactado($id = '') {
		if (strlen($id) > 0) {

			/* create the client for my rpc/encoded web service */
			require ("_server_type.php");
			switch ($server_type) {
				case '1' :
					$wsdl = $this -> producao;
					break;
				case '2' :
					$wsdl = $this -> homologacao;
					break;
				case '3' :
					$wsdl = $this -> desenvolvimento;
					break;
			}
			$endpoint = "http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo";
			$client = new soapclient($wsdl, true);
			$client -> setEndpoint($endpoint);
			
			$param = array('id' => $id);
			//print_r($client);
			$response = $client -> call('getCurriculoCompactado', $param);
			
			if (strlen($response) > 0)
				{
					$response = base64_decode($response);
					$file = fopen('tst.zip','w+');
					fwrite($file,$response);
					fclose($file);
				}
			
		}

	}

}
