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

	function getDataAtualizacaoCV($lattes) {
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

		$param = array('id' => $lattes);
		//print_r($client);
		$response = $client -> call('getDataAtualizacaoCV', $param);

		if (strlen($response) > 0) {
			$data = $response;
			$data = sonumero($data);
			$data = substr($data, 4, 4) . '-' . substr($data, 2, 2) . '-' . substr($data, 0, 2);
			return ($data);
		}
		return ('0000-00-00');
	}

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

			if (strlen($response) > 0) {
				$response = base64_decode($response);
				$filename = '_document/lattes/xml-lattes-' . $id . '.zip';
				$file = fopen($filename, 'w+');
				fwrite($file, $response);
				fclose($file);

				$zip = new ZipArchive;
				if ($zip -> open($filename) === TRUE) {
					$zip -> extractTo('_document/lattes/');
					$zip -> close();
					$sx = '<font color="green">Extração ok</font><br>';
					unlink($filename);
				} else {
					$sx = '<font color="red">Extração error</font><br>';
				}

				$sx .= '<a href="' . base_url($filename) . '">download</a>';
				return ($sx);
			}
			return ('');

		}

	}

}
