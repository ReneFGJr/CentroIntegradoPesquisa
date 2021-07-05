<?php

namespace App\Models;

use CodeIgniter\Model;

class Patents extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'patents';
	protected $primaryKey           = 'id_p';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_p','p_ip','p_family','p_title'
	];

	protected $typeFields        = [
		'hi',
		'st40*',
		'st40*',
		'st100'
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

	function index($dt, $d1='',$d2='',$id='',$d4='',$d5='')		
		{
		$sx = '';
		switch($d1)
			{
				case 'cron':
					$sx = $this->cron_week('');
					break;
				default:
				$sx = $this->drashboard();
				break;
			}
			return $sx;		
		}	

	function drashboard()
		{
			$sx = bs(12);
			$sx .= h('Drashboard',1);
			$sx .= bsdivclose(3);

			return $sx;
		}

	function cron_week($file)
		{
			$d = scandir('/data/www/patent/_inpi/patente/txt');

			$file = '/data/www/patent/_inpi/patente/txt/p2634.txt';
			$txt = file_get_contents($file);
			$this->process('71',$txt);
			print_r($d);
		}
	function process($field,$txt)
		{
			$ln = explode(chr(10),$txt);
			for ($r=0;$r < count($ln);$r++)
				{
					echo $ln[$r].'<hr>';
				}
		}
}
