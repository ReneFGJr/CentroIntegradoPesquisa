<?php

namespace App\Models;

use CodeIgniter\Model;

class PatentAuthority extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'patentsAuthority';
	protected $primaryKey           = 'id_pa';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_pa','pa_name','pa_place','pa_use','pa_monitor'
	];

	protected $typeFields        = [
		'hi',
		'st100*',
		'st10*',
		'st5',
		'SN',
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

	function check($name,$ext)
		{
			$status = 0;
			$dt = $this->where('pa_name',$name)->first();
			if (is_array($dt))
				{
					$sz = count($dt);
				} else {
					$sz = 0;
				}

			if ($sz == 0)
			{
				$dt['pa_name'] = $name;
				$dt['pa_place'] = troca(troca($ext,'(',''),')','');
				$dt['pa_use'] = 0;
				$this->save($dt);
				$status = 1;
			}
			return $status;
		}
	function tableView()
		{
			$sx = tableview($this);
			return $sx;			
		}
}
