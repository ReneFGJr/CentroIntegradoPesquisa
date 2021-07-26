<?php

namespace App\Models;

use CodeIgniter\Model;

class LattesExtrator extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'lattes';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_lt','lt_lattes','lt_nome','lt_update','lt_pais','lt_nivel'
	];

	protected $typeFields        = [
		'hi',
		'st50*',
		'st100*',
		'st100',
		'st10', 
		's2'
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

	var $producao = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';
	var $homologacao = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';
	var $desenvolvimento = 'http://servicosweb.cnpq.br/srvcurriculo/WSCurriculo?wsdl';

	function coleta_cnpq($id='x')
		{
			$url = "";
			$client = new \SoapClient($url, array("trace" => 1, "exception" => 0));
    		$response = $client->getOfficeRegistryList();
		    var_dump($response); 			
			print_r($client);
		}

	function index($dt, $d1='',$d2='',$id='',$d4='',$d5='')		
		{
		$sx = '';
		switch($d1)
			{

			case 'groups':
				$sx .= bs(12);
				$lg = new \App\Models\LattesGroups;
				$sx .= $lg->index($dt,$id,$d2,$d4,$d5);
				break;

			case 'extract':
				$sx .= bs(12);
				$sx .= h('Lattes Extractor',2);
				$sx .= $this->coleta_cnpq();
				$sx .= bsclose(3);
			break;

			case 'view':
				$sx = '';
				$sx .= h("Lattes - View", 1);
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
				$sx .= h("Users - Editar", 1);
				$this->id = $id;
				$sx .= form($this);
				$sx .= bsclose(3);
				break;
			case 'delete':
				$sx .= h("Serviços - Excluir", 1);
				$this->id = $id;
				$sx .= form_del($this);
				break;

			default:
				$sx = $this->menu();
				break;
			}
		return($sx);
	}

	function menu()
		{
			$sx = bs(2);
			$sx .= 'MENU';
			$sx .= '
			<ul>
				<a href="'.base_url(PATH.'lattes/extract').'"><li class="">Teste</li></a>
				<a href="'.base_url(PATH.'lattes/view').'"><li class="">View</li></a>
				<a href="'.base_url(PATH.'lattes/groups').'"><li class="">Groups</li></a>
				<li class="">Asas 2</li>
				<li class="">Asas 3</li>
			</ul>
			';
			$sx .= bsclose(1);
			$sx .= bscol(10);
			$sx .= h('LattesExtrator',1);
			$sx .= bsclose(3);

			return($sx);
		}
}