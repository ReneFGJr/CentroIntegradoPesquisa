<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
	private $MainModel, $Socials;

	public function __construct()
	{
		$this->MainModel = new \App\Models\MainModel();
		$this->Socials = new \App\Models\Socials();
		$this->DDI = new \App\Models\Ddi();
		$this->Patent = new \App\Models\Patents();
		$this->LattesExtrator = new \App\Models\LattesExtrator();
		$this->session = \Config\Services::session();

		helper(['boostrap','url','']);
		define("PATH", "index.php/main/");
		define("LIBRARY", "");
		define("LIBRARY_NAME", "");
	}

	public function index()
	{
		$sx = view('header/head');

		#### Logado
		if (isset($_SESSION['user']['id']))
			{
				$sx = $this->MainModel->cab();
				$p = $_SESSION['user']['id'];
				$sx .= $this->MainModel->index();				
			} else {
				$sx = $this->MainModel->cab(0);
				$sx .= view('welcome', ['form' => $this->Socials->login()]);
			}		
		return $sx;
	}

	public function social($d1 = '', $id = '')
	{
		$cab = $this->MainModel->cab();
		$dt = $this->request->getPost();
		$sx = $this->Socials->index($d1,$id,$dt,$cab);
		return $sx;
	}

	public function ddi($d1 = '', $d2 = '', $d3='',$d4='',$d5='')
	{
		$sx = $this->MainModel->cab();
		$dt = $this->request->getPost();
		model("ddi");
		$sx .= $this->DDI->index($dt,$d1,$d2,$d3,$d4,$d5);
		return $sx;
	}	

	public function patent($d1 = '', $d2 = '', $d3='',$d4='',$d5='')
	{
		$sx = $this->MainModel->cab();
		$dt = $this->request->getPost();
		model("Patent");
		$sx .= $this->Patent->index($dt,$d1,$d2,$d3,$d4,$d5);
		return $sx;
	}		

	public function lattes($d1 = '', $d2 = '', $d3='',$d4='',$d5='')
	{
		$sx = $this->MainModel->cab();
		$dt = $this->request->getPost();
		$sx .= $this->LattesExtrator->index($dt,$d1,$d2,$d3,$d4,$d5);
		return $sx;
	}	

	public function service($mod = '', $id = '')
	{
		$sx = $this->MainModel->cab();
		//https://www.youtube.com/watch?v=MmG1zzztELs
		$sx .= bscontainer();
		$sx .= bsrow();
		$sx .= bscol(12);

		switch ($mod) {
			case 'edit':
				$sx .= h("Serviços - Editar", 1);
				$this->MainModel->id = $id;
				$sx .= form($this->MainModel);
				break;
			case 'delete':
				$sx .= h("Serviços - Excluir", 1);
				$this->MainModel->id = $id;
				return form_del($this->MainModel);				
				break;
			default:
				$sx .= view(
					'mainServices',
					//['services' => $this->MainModel->findAll()]
					[
						'services' => $this->MainModel->paginate(10),
						'pages' => $this->MainModel->pager
					]
				);
		}

		$sx .= bsdivclose();
		$sx .= bsdivclose();
		$sx .= bsdivclose();

		return $sx;
	}
}
