<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
	private $MainModel;

	public function __construct()
	{
		$this->MainModel = new \App\Models\MainModel();
	}

	public function index()
	{
		//https://www.youtube.com/watch?v=MmG1zzztELs
		return view('mainServices', 
			//['services' => $this->MainModel->findAll()]
			[
				'services' => $this->MainModel->paginate(10),
				'pages' => $this->MainModel->pager
			]
	);
	}
}
