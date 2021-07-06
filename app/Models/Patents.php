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

	function __construct()
	{
		$this->PatentAuthority = new \App\Models\PatentAuthority();
	}

	function index($dt, $d1='',$d2='',$id='',$d4='',$d5='')		
		{
		$sx = '';
		switch($d1)
			{
				case 'cron':
					$sx = $this->cron_week('');
					break;
				case 'authorities':
					$sx = $this->PatentAuthority->tableView();
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

			$dt = $this->PatentAuthority->findAll();
			if (is_array($dt)) 
				{ $sx .= bscol(4).bscard('Authorities',count($dt).' Authorities').bsdivclose(1); }

			$sx .= '<li>'.anchor(base_url(PATH.'patent/cron'),'Processamento de Revista').'</li>';
			$sx .= '<li>'.anchor(base_url(PATH.'patent/authorities'),'Autoridades').'</li>';
			$sx .= bsdivclose(3);

			return $sx;
		}

	function cron_week($file)
		{
			$d = scandir('/data/www/patent/_inpi/patente/txt');
			$fim = count($d)-1;
			$file = '/data/www/patent/_inpi/patente/txt/'.$d[$fim];
			$txt = file_get_contents($file);
			$sx = $this->process('71',$txt);
			return $sx;
			
		}
	function autority($l)
		{
			$ll = $l;
			$l = trim(troca($l,array('(71)','(72)','(73)'),''));
			$l = troca($l,'?','-');
			$l = troca($l,' -','-');			
			$l = troca($l,'- ','-');
			$l = troca($l,'.,','.');
			$l = troca($l,'  ',' ');
			if (strpos($l,';') > 0)
				{
					$ln = explode(';',$l);
				} else {
					$ln = array($l);
				}
			$rst = array();
			for ($r=0;$r < count($ln);$r++)
			{
			$l = trim($ln[$r]);
			$ext = '';
			if (substr($l,strlen($l)-1,1) == ')')
				{
					$pos = strlen($l)-1;
					while ($pos > 5)
						{
							if (substr($l,$pos,1) == '(')
								{
									$ext = substr($l,$pos,strlen($l));
									$l = trim(substr($l,0,$pos-1));
									break;
								}
							$pos--;
						}
				}
				if (strpos($l,'(') > 0)
					{
						//echo 'erro';
						//echo '<hr>'.$l;
						//exit;
					}
				$l = nbr_author($l,7);
				array_push($rst,array('name'=>$l,'ext'=>$ext));
			}
			return $rst;
		}

	function process($field,$txt)
		{
			$sx = bs(12);
			$ln = explode(chr(10),$txt);
			$pr = '';
			for ($r=0;$r < count($ln);$r++)
			//for ($r=0;$r < 420;$r++)
				{
					$l = trim($ln[$r]);
					
					$cod = trim(substr($l,0,4));
					//echo $cod.'---'.$l.'<hr>';
					switch($cod)
						{
							case '(21)':
								$pr = trim(substr($l,5,strlen($l)));
								break;
							/* Depositante */
							case '(71)':
								$dt = $this->autority($l);	
								for ($q=0;$q < count($dt);$q++)
									{
										$sa = $this->PatentAuthority->check($dt[$q]['name'],$dt[$q]['ext']);
										if ($sa > 0 ) { $sx .= '<br>'.$dt[$q]['name'].'==>'. msg('status_'.$sa); }
									}
								break;
							/* Inventor */
							case '(72)':
								$dt = $this->autority($l);	
								for ($q=0;$q < count($dt);$q++)
									{
										$sa = $this->PatentAuthority->check($dt[$q]['name'],$dt[$q]['ext']);
										if ($sa > 0 ) { $sx .= '<br>'.$dt[$q]['name'].'==>'. msg('status_'.$sa); }
									}
								break;								
							/* Representante */
							case '(73)':
								$dt = $this->autority($l);	
								for ($q=0;$q < count($dt);$q++)
									{
										$sa = $this->PatentAuthority->check($dt[$q]['name'],$dt[$q]['ext']);
										if ($sa > 0 ) { $sx .= '<br>'.$dt[$q]['name'].'==>'. msg('status_'.$sa); }
									}
								break;								
						}
				}
			$sx .= bsdivclose(3);
			return $sx;
		}
}
