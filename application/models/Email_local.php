<?php
class email_local extends CI_Model {
	
	var $e_mail = '';
	var $e_nome = '';
	
	function enviaremail($para, $titulo, $texto) {

		$this -> email -> from($this->e_mail, $this->e_nome);
		$this -> email -> to($para[0]);
		//$this -> email -> cc('rene.gabriel@pucpr.br');
		//$this -> email -> bcc('them@their-example.com');

		$this -> email -> subject($titulo);
		$this -> email -> message($texto);

		$this -> email -> send();
		//echo $this->email->print_debugger();
	}

	function enviaremail2($para, $titulo, $texto) {
		//$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtp.pucpr.br.com', 'smtp_port' => 465, 'smtp_user' => 'rene.gabriel@pucpr.br', 'smtp_pass' => 'Eduardo@23', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'pod51004.outlook.com', 'smtp_port' => 587, 'smtp_user' => 'rene.gabriel@pucpr.br', 'smtp_pass' => 'Eduardo@23', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);

		$this -> load -> library('email', $config);

		$this -> email -> from('rene.gabriel@pucpr.br', 'CIP');
		$this -> email -> to($para);
		$this -> email -> reply_to('rene.gabriel@pucpr.br', 'CIP');

		$this -> email -> subject($titulo);

		$message = "Contact form\n\n";
		$message .= "Name: " . $para . "\n";
		$message .= "texto: " . $texto . "\n";

		$this -> email -> message($message);

		$this -> email -> send();
		echo 'Enviado para ' . $para;
	}

}
?>