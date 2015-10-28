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

class ws_cs extends CI_model {
	var $producao = 'https://sarch.cwb.pucpr.br:8100/services/cs_student_service?wsdl';
	var $homologacao = 'https://haiti.cwb.pucpr.br:8100/services/cs_student_service?wsdl';
	var $desenvolvimento = 'https://rhea.cwb.pucpr.br:8100/services/cs_student_service?wsdl';

	function findStudentByCPF($cpf) {
		$client = new soapclient($wsdl, true);
		$response = $client -> call('opPesquisarPorCodigo', $param);
	}

	function findStudentByCracha($cracha) {
		$cracha = sonumero($cracha);

		if (strlen($cracha) == 12) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 11) { $cracha = substr($cracha, 3, 8);
		}
		if (strlen($cracha) == 9) { $cracha = substr($cracha, 0, 9);
		}
		if (strlen($cracha) > 8) {
			return ('');
		}
		if (strlen($cracha) < 8) {
			return ('');
		}

		echo $cracha;
		exit ;
	}

	function findStudentByName($nome) {

	}

	function findStudent($id,$type='C') {
		
		$wurl = 'http://haiti.cwb.pucpr.br:8280/services/cs_student_service?wsdl';
		$client = new soapclient($wurl);

		$name = 'João da Si%';
		$badge_nbr = '00000000';
		$emplid = '000000000000';
		switch($type)
			{
			case 'C':
				$badge_nbr = $id;
				break;			
			case 'N':
				$name = $id;
				break;			
			case 'I':
				$emplid = $id;
				break;			
			}

		if (isset($name)) {
			$parametros = array('name' => $name);
			$rlista = $client -> findStudentByName($parametros);
		}
		if (isset($cracha)) {
			$parametros = array('badge_nbr' => $badge_nbr);
			$rlista = $client -> findStudentByBadgeCode($parametros);
		}
		if (isset($emplid)) {
			$parametros = array('emplid' => $emplid);
			$rlista = $client -> findStudentByEmplid($parametros);
		}

		print_r($rlista);
	}

}
?>
