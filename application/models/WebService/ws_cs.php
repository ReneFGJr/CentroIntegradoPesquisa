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

class ws_cs extends CI_model
	{
		var $producao = 'http://sarch.cwb.pucpr.br:8280/services/cs_student_service?wsdl';
		var $homologacao = 'http://haiti.cwb.pucpr.br:8280/services/cs_student_service?wsdl';
		var $desenvolvimento = 'http://rhea.cwb.pucpr.br:8280/services/cs_student_service?wsdl';
		
		function findStudentByCracha($cracha)
			{
				$cracha = sonumero($cracha);
				
				if (strlen($cracha) == 12) { $cracha = substr($cracha,3,8); }
				if (strlen($cracha) == 11) { $cracha = substr($cracha,3,8); }
				if (strlen($cracha) == 9) { $cracha = substr($cracha,0,9); }
				if (strlen($cracha) > 8) { return(''); }
				if (strlen($cracha) < 8) { return(''); }
				
				echo $cracha;
				exit;
			}
		
		function findStudentByName($nome)
			{
				
			}		
	}
?>
