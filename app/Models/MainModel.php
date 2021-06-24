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
		'serviceGroup'
	];

	protected $typeFields        = [
		'hi',
		'st20*',
		'st100*',
		'st20'
	];	

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	protected $url         = 'service';

	function editar($dt)
		{
			$sx = h('Hello',1);
			$url = base_url('main/'.$this->url.'/edit');
			$sx .= form($url,$this);
			
			echo '<pre>';
			print_r($dt);
			if ($this->save($dt))
				{
					echo "OK";
				} else {
					echo "ERRO";
				}		
			echo '</pre>';

			return($sx);
		}

}
