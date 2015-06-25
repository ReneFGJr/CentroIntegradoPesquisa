<?php
class debug extends CI_Controller
	{
		function index()
			{
				$this->load->view("header/header");
				echo '<h1>DEBUG MODE</h1>';
			}
		function phpinfo()
			{
				phpinfo();
			}
	}
?>