<?php

namespace App\Models;

use CodeIgniter\Model;

class Ddi extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ddis';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

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
				default:
				$sx = $this->ddi_xml();
				break;
			}
			return $sx;
		}

	function ddi_xml()
		{
			$url = 'https://dadosderede.rnp.br/api/datasets/export?exporter=ddi&persistentId=hdl%3A20.500.12401/FK2/23';
			$url = 'https://dadosderede.rnp.br/api/datasets/export?exporter=ddi&persistentId=hdl%3A20.500.12401/FK2/22';
			dircheck("_DDI");
			$dir = "_DDI/temp/";
			dircheck($dir);
			$m = md5($url);
			$file = $dir.$m.'.xml';

			if (!file_exists($file))
			{
				$t = file_get_contents($url);				
				
				if (strlen($t) > 0)
					{
						file_put_contents($file,$t);
					}
			}
			$xml = simplexml_load_file($file);

			$doc = $xml->docDscr;
			$sty = $xml->stdyDscr;
			$fil = $xml->fileDscr;
			$dat = $xml->dataDscr;
			
			echo '<pre>';
			//print_r($sty);			
			//print_r($dat);
			echo '</pre>';
			$sx = '';
			$sx .= $this->ddi_citation($doc);
			$sx .= $this->ddi_descript($sty->citation,'Study');
			$sx .= $this->ddi_descript($sty->stdyInfo,'Information');
			$sx .= $this->ddi_descript($fil,'Files');	
			$sx .= $this->ddi_files($dat,'Dados dos Arquivos');	

			return $sx;
		}
function ddi_files($x,$tp)		
		{
			$sx = bscol(12);
			$sx .= '<h1>Variables - '.$tp.'</h1>';
			$sx .= bsdivclose(1);

			//echo '<pre>';
			//print_r($x->var[0]);
			//exit;

			$leg = array('xx','Max.','Valid','Min.','Mean','StDev','-6-','-6-','-6-','-6-','-6-');

			for ($r=0;$r < count($x->var);$r++)
				{
					$v = $x->var[$r];

					$att = (array)$v->attributes();
					$att = $att['@attributes'];
					$sx .= bscol(2);
					$sx .= $att['ID'];
					$sx .= bsdivclose(1);
					$sx .= bscol(4);
					$sx .= $att['name'];
					$sx .= '<br>';
					$sx .= $att['intrvl'];

					$sx .= '<br>';
					$fileid = $v->location->attributes();
					$fileid = (string)$fileid['fileid'][0];
					$nvar = $v->labl;
					$sx .= $nvar;
					$sx .= '['.$fileid.']';

					$sx .= bsdivclose(1);

					$sx .= bscol(6);


					if (isset($v->sumStat))
						{
							$vats = (array)($v->sumStat);
							//print_r($vats);
							foreach($vats as $id => $valor)
								{
									if (is_array($valor))
										{

										} else {
											$sx .= $leg[$id];
											$sx .= $valor.'<br>';
										}
									
								}
						}

					$sx .= bsdivclose(1);
				}
			return $sx;
		}

	function ddi_descript($x,$tp)		
		{
			$sx = bscol(12);
			$sx .= '<h1>Metadata - '.$tp.'</h1>';
			$sx .= bsdivclose(1);
			$x = (array)$x;
			foreach($x as $var => $t)
				{
					$sx .= bscol(12);
					$sx .= h($var,3);
					$sx .= bsdivclose(1);

					foreach((array)$x[$var] as $v2 => $v3)
					{
						if ($v2 != '0')
						{
							/*********** Coluna dupla */
							$sx .= bscol(2);
							$sx .= $v2;
							$sx .= bsdivclose(1);

							$sx .= bscol(10);
							if (is_array($v3))
								{
									$sx .= $this->mostra_array($v3);
								} else {
									$sx .= $v3;
								}							
						} else {
							/*********** Coluna única */
							$sx .= bscol(12);
							if (is_array($v3))
								{
									$sx .= $this->mostra_array($v3);
								} else {
									$sx .= $v3;
								}
						}
						$sx .= bsdivclose(1);
					}
				}
			//$sx .= bsdivclose(1);
			return $sx;
		}
	function mostra_array($a)
		{
			$sx = '<ul>';
			for ($r=0;$r < count($a);$r++)
				{
					$sx .= '<li>'.$a[$r].'</li>';
				}
			$sx .= '</ul>';
			return $sx;
		}

	function ddi_citation($x)
		{
			$sx = bs(12);
			$sx .= '<h1>Metadata - Citation</h1>';
			$sx .= bsdivclose(3);

			$titlStmt = $x->citation->titlStmt;
			$distStmt = $x->citation->distStmt;
			$verStmt = $x->citation->verStmt;

			$sx .= bscol(8);
			$sx .= '<span class="small">'.msg('title').'</span><br/>';
			$sx .= (string)$titlStmt->titl;
			$sx .= bsdivclose(1);

			$sx .= bscol(4);
			$sx .= '<span class="small">'.msg('ID Nº').'</span><br/>';
			$sx .= (string)$titlStmt->IDNo;
			$sx .= bsdivclose(1);

			$sx .= bscol(8);
			$sx .= '<span class="small">'.msg('distrbtr').'</span><br/>';
			$sx .= (string)$distStmt->distrbtr;
			$sx .= bsdivclose(4);

			$sx .= bscol(4);
			$sx .= '<span class="small">'.msg('distDate').'</span><br/>';
			$sx .= (string)$distStmt->distDate;
			$sx .= bsdivclose(4);			

			$sx .= bscol(8);
			$sx .= '<span class="small">'.msg('biblCit').'</span><br/>';
			$sx .= (string)$x->citation->biblCit;
			$sx .= bsdivclose(1);

			$sx .= bscol(4);
			$att = (array)$verStmt->attributes();
			$att = $att['@attributes'];
			$sx .= '<span class="small">'.msg('source').'</span><br/>';
			$sx .= (string)$att['source'];
			$sx .= '<br/>';
			$sx .= '<span class="small">'.msg('distDate').'</span><br/>';
			$sx .= 'Version '.(string)$verStmt->version;
			$sx .= bsdivclose(3);	

			$sx .= '<style> div { border: 1px solid #000; } </style>';

			return $sx;
		}
}
