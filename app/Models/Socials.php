<?php

namespace App\Models;

use CodeIgniter\Model;
use \app\Model\MainModel;

class Socials extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users2';
	protected $primaryKey           = 'id_us';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        =
	[
		'id_us', 'us_nome', 'us_email',
		'us_image', 'us_genero', 'us_verificado',
		'us_login', 'us_password', 'us_password_method',
		'us_oauth2', 'us_lastaccess'
	];

	protected $typeFields        = [
		'hi',
		'st100*',
		'st100*',
		'hi', 'hi', 'hi',
		'st50', 'st50', 'hi',
		'hi', 'up'
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

	function user()
		{
			$sx = '';
			if (isset($_SESSION['user']['name']))
			{
				$user = $_SESSION['user']['name'];
				$sx = '
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						'.$user.'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="'.base_url(PATH.'social/perfil').'">Perfil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="'.base_url(PATH.'social/logout').'">Logout</a>
						</div>
					</li>				
				';
			}
			return($sx);
		}

	function index($d1, $id, $dt=array(),$cab='')
	{
		switch ($d1) {
			case 'perfil':
				$sx = $cab;
				$sx .= $this->perfil();
				break;
			case 'view':
				$sx = $cab;
				$sx .= h("Usuários - View", 1);
				$this->id = $id;
				$dt =
					[
						'services' => $this->paginate(3),
						'pages' => $this->pager
					];
				$sx .= tableview($this,$dt);
				break;
			case 'edit':
				$sx = $cab;
				$sx .= h("Users - Editar", 1);
				$this->id = $id;
				$sx .= form($this);
				break;
			case 'access_denied':
				$sx = view('access_denied');
				break;				
			case 'delete':
				$sx = $cab;
				$sx .= h("Serviços - Excluir", 1);
				$this->Social->id = $id;
				$sx .= form_del($this);
				break;
			case 'logout':
				return $this->logout();
				break;
			case 'login_local':
				return $this->login_local($dt);
				break;
			default:
				$sx = $cab;
				$sx .= bs(12);
				$sx .= h('Service not found - ' . $d1, 1);
				$sx .= anchor("main/social/access_denied","Acesso Negado (Page)",["class"=>"btn btn-outline-primary"]);
				$sx .= bsclose(3);
				break;
		}
		return $sx;
	}

	function perfil()
		{
			$id = $_SESSION['user']['id'];
			$sx = '';
			$sx .= bscontainer();
			$sx .= bsrow();

			$dt = $this->find($id);
			$sx .= bscol(10);
			/****************** Perfil */
			$sx .= h('Perfil '.$dt['us_nome'],1);
			$sx .= '<hr>';

			/****************** Dados **/
			$sx .= bscontainer(1);
			$sx .= bsrow();
			
			/****************** E-mail **/
			$sx .= bscol(6);
			$sx .= '<span clas="small">email</span>: <b>'.$dt['us_email'].'</b>';
			$sx .= bsdivclose();

			/****************** Login **/
			$sx .= bscol(6);
			$sx .= '<span clas="small">login</span>: <b>'.$dt['us_login'].'</b>';
			$sx .= bsdivclose();

			$sx .= bsdivclose();
			$sx .= bsdivclose();
			$sx .= bsdivclose();
			$sx .= '<hr>';

			/****************** Imagem **/
			$sx .= bscol(2);
			$sx .= 'IMAGE';
			$sx .= bsdivclose();

			$sx .= bsdivclose();
			$sx .= bsdivclose();
			$sx .= bsdivclose();
			//$sx .= '<style> div { border: 1px solid #000000; } </style>';
			return $sx;
		}

	function logout()
	{
		$session = \Config\Services::session();
		$url = \Config\Services::url();
		$session->destroy();

		return (redirect()->to('/'));
	}

	function login_local($dt)
	{
		$sx = '';
		$ok = 0;
		$d = $this->where('us_login', $dt['user_login'])->findAll();
		if (count($d) > 0) {
			$d = $d[0];
			$method = $d['us_password_method'];
			switch ($method) {
				default:
					$pw1 = md5($d['us_password']);
					$pw2 = md5($dt['user_password']);
					if ($pw1 == $pw2) {
						$ok = 1;
					} else {
						$sx = $this->login('Erro de Login');
					}
			}
		} else {
			$sx = $this->login('Erro de Login');
		}
		if ($ok == 1) {
			$_SESSION['user']['id'] = $d['id_us'];
			$_SESSION['user']['name'] = $d['us_nome'];
			return (redirect()->to('/'));
		}
		return ($sx);
	}

	function login($err = '')
	{
		$sx = '';
		$sx .= '
        <!---- Social Login ---->
        <style>
        .form_title { font-size: 300%; line-height: 100%; }
        </style>';

		$sx .= bscontainer();
		$sx .= bsrow();
		$sx .= bscol(12);

		$sx .= '
        <form method="post" action="' . base_url(PATH . 'social/login_local') . '">
        <span class="form_title"> ' . LIBRARY_NAME . ' </span>

        <!-- TITLE -->
        <h2 class="text-center">' . msg('SignIn') . '</h2>
        
        <!--- email login social --->
        <div class="" data-validate = "Valid email is: name@domain.com">
        <span>' . msg('e-mail') . '</span>
            <input class="form-control" type="text" name="user_login">
            <span class="focus-input100" data-placeholder="Email"></span>
        </div>
        
        <!--- password login social --->
        <br/>

        <div class="" data-validate="Enter password">
            <span>' . msg('password') . '</span>
            <input class="form-control" type="password" name="user_password">
            <span class="focus-input100" data-placeholder="Password"></span>
        </div>
        <br/>

        <div class="">
            <input type="submit" class="btn btn-primary" style="width: 100%;" value="' . msg('login') . '">
        </div>
        <br/>';

		if (!isset($data['forgot'])) {
			$sx .= '
        <!--- Forgot Password --->
        <div class="text-center p-t-115">
        <a class="txt2 text-dark" href="' . base_url(PATH . 'social/forgot') . '"> ' . msg('Forgot Password?') . ' </a>
        </div>
        <br/>';
		}

		if (!isset($data['signup'])) {
			$sx .= '
        <!--- Create a Passwrod --->
        <div class="text-center p-t-115">
        <span class="txt1">' . msg('Don’t have an account?') . '</span>                
        <a class="txt2 text-dark" href="' . base_url(PATH . 'social/signup') . '"> ' . msg('SignUp') . ' </a>
        </div>
        <br/>';
		}

		$sx .= '
        </form>';
		$sx .= bsdivclose();
		$sx .= bsdivclose();
		$sx .= bsdivclose();

		$sx .= bsmessage($err, 1);

		return ($sx);
	}

	function access_denied()
		{
			$sx = $this->view('access_denied.php');
		}
}
