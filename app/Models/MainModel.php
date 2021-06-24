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
		'service',
		'serviceName',
		'serviceGroup'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

}
