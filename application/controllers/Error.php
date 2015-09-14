<?php
class Error extends CI_Controller {
 
	function index()
	{
		$this->load->view('header/header');
		$this->load->view('header/404');
	}
}
?>