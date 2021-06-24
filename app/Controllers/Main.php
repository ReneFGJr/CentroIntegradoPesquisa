<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
	private $MainModel;

	public function __construct()
	{
		$this->MainModel = new \App\Models\MainModel();
		helper('boostrap');
	}

	public function index()
	{
		$sx = view('header/head');
		$sx .= '<a href="'.base_url('main/service/').'">Services</a>';
		return $sx;
	}

	public function service($mod='',$id='')
	{
		//https://www.youtube.com/watch?v=MmG1zzztELs
		$sx = view('header/head');
		$sx .= bscontainer();
		$sx .= bsrow();
		$sx .= bscol(12);

		switch($mod)
		{
			case 'edit':
				$sx .= h("Serviços - Editar",1);
				$dt = $this->request->getPost();
				$sx .= $this->MainModel->editar($id,$dt);
				break;
			default:
			$sx .= view('mainServices', 
			//['services' => $this->MainModel->findAll()]
			[
				'services' => $this->MainModel->paginate(10),
				'pages' => $this->MainModel->pager
			]);
		}

		$sx .= bsdivclose();
		$sx .= bsdivclose();
		$sx .= bsdivclose();
		
		return $sx;
	}
}
