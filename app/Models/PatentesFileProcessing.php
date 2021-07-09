<?php

namespace App\Models;

use CodeIgniter\Model;

class PatentesFileProcessing extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'patentsFileProcessing';
	protected $primaryKey           = 'id_fl';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_fl','fl_name','fl_status'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	function processed($file)
		{
			$dt = $this->where('fl_name',$file)->FindAll();
			if (isset($dt[0]))
				{
					$dt = $dt[0];
					return $dt['fl_status'];
				} else {
					$dt = array();
					$dt['fl_name'] = $file;
					$dt['fl_status'] = 1;
					$this->save($dt);
					return 1;
				}
		}
		function close($file)		
		{
			$dt = $this->where('fl_name',$file)->FindAll();
			if (isset($dt[0]))
				{
					$dt = $dt[0];
					$dt['fl_status'] = 9;
					$this->save($dt);
					
				} else {
					echo "ERRO";
					exit;
				}
		}		

}
