<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'mains';
	protected $primaryKey           = 'id_service';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_service',
		'service',
		'serviceName',
		'serviceGroup',
		'serviceDescription',
		'servicePath'
	];

	protected $typeFields        = [
		'hi',
		'st20*',
		'st100*',
		'st20',
		'tx5',
		'st50'
	];	

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	protected $url         = 'service';

	function index()
		{
			$sx = '';
			$sx .= bscontainer();
			$sx .= bsrow();
			$sx .= bscol(12);
			$sx .= h('Serviços',1);
			$sx .= bsdivclose();

			$menu = $this->findAll();
			for ($r=0;$r < count($menu);$r++)
				{
					$line = $menu[$r];
					$sx .= bscol(4);
					$sx .= '<div class="card mt-1">
							<!--
							<img class="card-img-top" src="..." alt="Card image cap">
							-->
							<div class="card-body">
								<h5 class="card-title">'.msg($line['serviceName']).'</h5>
								<p class="card-text">'.$line['serviceDescription'].'</p>
								<a href="'.base_url(PATH.strtolower($line['servicePath'])).'" class="btn btn-primary">'.$line['service'].'</a>
							</div>
							</div>';
							
					$sx .= bsdivclose();
				}
			$sx .= '<a href="'.base_url('main/service/view').'">Service</a>';
			$sx .= bsdivclose();
			$sx .= bsdivclose();
			$sx .= bsdivclose();
			return($sx);
		}

	function cab($nv=1)
		{
			$sx = view('header/head');
			if ($nv != 0)
			{
				$sx .= view('header/navbar');
			}
			return($sx);
		}	

}
