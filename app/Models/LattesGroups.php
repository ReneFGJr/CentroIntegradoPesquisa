<?php

namespace App\Models;

use CodeIgniter\Model;

class LattesGroups extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'lattes_groups';
	protected $primaryKey           = 'id_lg';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_lg','lg_name','lg_description','lg_own','lg_public'
	];

	protected $typeFields        = [
		'hi',
		'st100*',
		'tx5',
		'hi',
		'sn'
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

	function viewtable($id='')
		{
				$sx = '';
				$sx .= h('Lattes Extractor - GROUP',2);
				$dt =
					[
						'services' => $this->paginate(3),
						'pages' => $this->pager
					];
				$sx .= tableview($this);
				return $sx;			
		}

	function index($dt='',$id,$d2,$d3,$d4)		
		{
		$lgm = new \App\Models\LattesGroupsMembers;			
		$sx = '';

		$sx = bs(12);
		$dl = $this->find($id);			
		$sx .= h('Lattes Extractor - GROUP',2);				
		$sx .= h($dl['lg_name'],1);
		$sf = '';
		switch($d2)
			{
			case 'viewid':
				/* delete */				
				switch($d3)
					{
					case 'inport':
						$sf = $lgm->form_import($id,$dt);
						break;						
					case 'delete':
						if (round($d4) > 0) 
						{ 
							$sx = $lgm->delete($d4); 
						}
						break;
					}

				$sx .= $lgm->bt_import($id);	
				$sx .= bsclose(1);
				$sx .= bscol(12);			
				$sx .= $lgm->members($id);
				$sx .= $sf;
				break;
			case 'view':
				$sx = '';
				$sx .= h('Lattes Extractor - GROUP',2);
				$this->id = $id;
				$dt =
					[
						'services' => $this->paginate(3),
						'pages' => $this->pager
					];
				$sx .= tableview($this);
				break;
			case 'edit':
				$sx .= bs(12);
				$sx .= h('Lattes Extractor - GROUP',2);
				$this->id = $id;

				$sx .= form($this);
				$sx .= bsclose(3);
				break;
			case 'delete':
				$sx .= h('Lattes Extractor - GROUP',2);
				$this->id = $id;
				$sx .= form_del($this);
				break;

			default:
				$sx = $this->viewtable();
				break;
			}
		$sx .= bsclose(3);			
		return $sx;
	}	
}
