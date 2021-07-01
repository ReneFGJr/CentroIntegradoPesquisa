<?php

namespace App\Models;

use CodeIgniter\Model;

class LattesGroupsMembers extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'lattes_groups_members';
	protected $primaryKey           = 'id_lgm';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_lgm','lgm_group','lgm_member'
	];

	protected $typeFields        = [
		'hi',
		'st100*',
		'st10'
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

	function members($id)
		{
			$sx = 'membros';
			$dt = $this->where(['lgm_group', $id])->findAll();
			$dt = $this->findAll();
			$sx .= bs(12);
			
			$sx .= '<table class="table">';
			for ($r=0;$r < count($dt);$r++)
				{
					$line = $dt[$r];
					$this->id = $line['id_lgm'];

					$sx .= '<tr>';
					$sx .= '<td>';					
					$sx .= $line['lgm_member'];
					$sx .= '</td>';

					$sx .= '<td>';					
					$sx .= $line['lgm_member'];
					$sx .= '</td>';

					$sx .= '<td>';
					$sx .= $line['lgm_group'];
					$sx .= '</td>';

					$sx .= '<td>';
					$url = base_url('main/lattes/groups/viewid/'.$id.'/delete/'.$line['id_lgm']);
					$sx .= linkdel($url);
					$sx .= '</td>';

					$sx .= '</tr>';
				}
			$sx .= '</table>';
			$sx .= bsclose(3);
			return $sx;
		}

	function form_import($id,$dt)
		{
			$vlr = '';
			$sx = '';
			$url = $_SERVER['REQUEST_URI'];		
			$url = str_replace(array('members_gr'),'viewid',$url);

			if (isset($dt['members'])) { $vlr = $dt['members']; }
			$vlr = str_replace(array(';',','),chr(13),$vlr);

			if (strlen($vlr) > 0)
				{
					$sx .= bs(12);
					$ln = explode(chr(13),$vlr);
					for ($r=0;$r < count($ln);$r++)
						{
							$l = trim($ln[$r]);
							$sx .= '<li>';
							if (strlen($l) == 16) { 
								$sx .= $l.' = valid = ';
								$sx .= $this->group_members_include($id,$l);
							} else {
								$sx .= $l.' = invalid = ';
							}
							$sx .= '</li>';
						}
					$sx .= bsclose(1);
					$sx .= bscol(12);
					$sx .= bt_cancel($url);
					return($sx);
				}
			$sx = form_open();

			$sx .= 'Informe o número do Lattes, podendo ser um por linha ou separados por ";" ou ",".';
			$sx .= '<textarea name="members" class="form-control" rows=10>'.$vlr.'</textarea>';
			$sx .= bt_submit(msg('send'));
			$sx .= bt_cancel($url);
			$sx .= form_close();
			return $sx;
		}
	
	function group_members_include($id,$l)
		{
			$dt = $this->where(['lgm_group', $id],['lgm_member',$l])->findAll();
			
			if (count($dt) == 0) 
				{
					$dt['lgm_group'] = $id;
					$dt['lgm_member'] = $l;
					$this->save($dt);
					$sx = 'saved';
				} else {
					$sx = 'ignored';
				}
			return $sx;
		}

	function bt_import($id)
		{
			$sx = anchor(base_url('main/lattes/groups/viewid/'.$id.'/inport'),msg('Import_members'),['class'=>'btn btn-outline-primary']);
			return $sx;
		}
}
