<?php
class email_local extends CI_Model {
	function enviaremail($para, $titulo, $texto) {
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'pod51004.outlook.com', 'smtp_port' => 587, 'smtp_user' => 'rene.gabriel@pucpr.br', 'smtp_pass' => 'Eduardo@23', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'mail.sisdoc.com.br', 'smtp_port' => 587, 'smtp_user' => 'rene@sisdoc.com.br', 'smtp_pass' => 'Viviane@1970', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 465, 'smtp_user' => 'rene.gabriel@pucpr.br', 'smtp_pass' => 'Eduardo@23', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$config = Array('protocol' => 'smtp', 'smtp_host' => 'smtps.pucpr.br', 'smtp_port' => 443, 'smtp_user' => 'rene.gabriel@pucpr.br', 'smtp_pass' => 'Eduardo@22', 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE);
		$this -> load -> library('email', $config);

		$this -> email -> from('rene.gabriel@pucpr.br', 'Rene');
		$this -> email -> to('renefgj@gmail.com');
		$this -> email -> cc('rene.gabriel@pucpr.br');
		//$this -> email -> bcc('them@their-example.com');

		$this -> email -> subject('Email Test');
		$this -> email -> message('Testing the email class.');

		$this -> email -> send();
		echo $this->email->print_debugger();
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