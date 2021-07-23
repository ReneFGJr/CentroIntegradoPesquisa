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
				$sx .= bs(12);
				$sx .= h("Users - Editar", 1);
				$this->id = $id;				
				$sx .= form($this);
				$sx .= bsdivclose(3);
				break;
			case 'signup':
					$sx = $cab;
					$sx .= bs(12);
					$sx .= h("Users - Signup", 1);
					$this->id = $id;					
					$sx .= form($this);
					$sx .= bsdivclose(3);
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

		$sx = '';
		$bk = '#AA2439';
		$sx .= '
		<style>
		* {
		  box-sizing: border-box;
		}
		
		body {
		  font-family: Tahoma, Verdana, Segoe, sans-serif;
		  font-size: 14px;
		  background: #f6fffd;
		  padding: 20px;
		  text-align: center;
		}
		
		.wrapper {
		  width: 250px;
		  height: 350px;
		  margin: 60px auto;
		  perspective: 600px;
		  text-align: left;
		}
		
		.rec-prism {
		  width: 100%;
		  height: 100%;
		  position: relative;
		  transform-style: preserve-3d;
		  transform: translateZ(-100px);
		  transition: transform 0.5s ease-in;
		}
		
		.face {
		  position: absolute;
		  width: 250px;
		  height: 350px;
		  padding: 20px;
		  background: rgba(250, 250, 250, 0.96);
		  border: 3px solid '.$bk.';
		  border-radius: 3px;
		}
		.face .content {
		  color: #666;
		}
		.face .content h2 {
		  font-size: 1.2em;
		  color: '.$bk.';
		}
		.face .content .field-wrapper {
		  margin-top: 30px;
		  position: relative;
		}
		.face .content .field-wrapper label {
		  position: absolute;
		  pointer-events: none;
		  font-size: 0.85em;
		  top: 40%;
		  left: 0;
		  transform: translateY(-50%);
		  transition: all ease-in 0.25s;
		  color: #999999;
		}
		.face .content .field-wrapper input[type=text], .face .content .field-wrapper input[type=password], .face .content .field-wrapper input[type=submit], .face .content .field-wrapper textarea {
		  -webkit-appearance: none;
		  appearance: none;
		}
		.face .content .field-wrapper input[type=text]:focus, .face .content .field-wrapper input[type=password]:focus, .face .content .field-wrapper input[type=submit]:focus, .face .content .field-wrapper textarea:focus {
		  outline: none;
		}
		.face .content .field-wrapper input[type=text], .face .content .field-wrapper input[type=password], .face .content .field-wrapper textarea {
		  width: 100%;
		  border: none;
		  background: transparent;
		  line-height: 2em;
		  border-bottom: 1px solid '.$bk.';
		  color: #666;
		}
		.face .content .field-wrapper input[type=text]::-webkit-input-placeholder, .face .content .field-wrapper input[type=password]::-webkit-input-placeholder, .face .content .field-wrapper textarea::-webkit-input-placeholder {
		  opacity: 0;
		}
		.face .content .field-wrapper input[type=text]::-moz-placeholder, .face .content .field-wrapper input[type=password]::-moz-placeholder, .face .content .field-wrapper textarea::-moz-placeholder {
		  opacity: 0;
		}
		.face .content .field-wrapper input[type=text]:-ms-input-placeholder, .face .content .field-wrapper input[type=password]:-ms-input-placeholder, .face .content .field-wrapper textarea:-ms-input-placeholder {
		  opacity: 0;
		}
		.face .content .field-wrapper input[type=text]:-moz-placeholder, .face .content .field-wrapper input[type=password]:-moz-placeholder, .face .content .field-wrapper textarea:-moz-placeholder {
		  opacity: 0;
		}
		.face .content .field-wrapper input[type=text]:focus + label, .face .content .field-wrapper input[type=text]:not(:placeholder-shown) + label, .face .content .field-wrapper input[type=password]:focus + label, .face .content .field-wrapper input[type=password]:not(:placeholder-shown) + label, .face .content .field-wrapper textarea:focus + label, .face .content .field-wrapper textarea:not(:placeholder-shown) + label {
		  top: -35%;
		  color: #42509e;
		}
		.face .content .field-wrapper input[type=submit] {
		  -webkit-appearance: none;
		  appearance: none;
		  cursor: pointer;
		  width: 100%;
		  background: '.$bk.';
		  line-height: 2em;
		  color: #fff;
		  border: 1px solid '.$bk.';
		  border-radius: 3px;
		  padding: 5px;
		}
		.face .content .field-wrapper input[type=submit]:hover {
		  opacity: 0.9;
		}
		.face .content .field-wrapper input[type=submit]:active {
		  transform: scale(0.96);
		}
		.face .content .field-wrapper textarea {
		  resize: none;
		  line-height: 1em;
		}
		.face .content .field-wrapper textarea:focus + label, .face .content .field-wrapper textarea:not(:placeholder-shown) + label {
		  top: -25%;
		}
		.face .thank-you-msg {
		  position: absolute;
		  width: 200px;
		  height: 130px;
		  text-align: center;
		  font-size: 2em;
		  color: '.$bk.';
		  left: 50%;
		  top: 50%;
		  -webkit-transform: translate(-50%, -50%);
		}
		.face .thank-you-msg:after {
		  position: absolute;
		  content: "";
		  width: 50px;
		  height: 25px;
		  border: 10px solid '.$bk.';
		  border-right: 0;
		  border-top: 0;
		  left: 50%;
		  top: 50%;
		  -webkit-transform: translate(-50%, -50%) rotate(0deg) scale(0);
		  transform: translate(-50%, -50%) rotate(0deg) scale(0);
		  -webkit-animation: success ease-in 0.15s forwards;
		  animation: success ease-in 0.15s forwards;
		  animation-delay: 2.5s;
		}
		.face-front {
		  transform: rotateY(0deg) translateZ(125px);
		}
		.face-top {
		  height: 250px;
		  transform: rotateX(90deg) translateZ(125px);
		}
		.face-back {
		  transform: rotateY(180deg) translateZ(125px);
		}
		.face-right {
		  transform: rotateY(90deg) translateZ(125px);
		}
		.face-left {
		  transform: rotateY(-90deg) translateZ(125px);
		}
		.face-bottom {
		  height: 250px;
		  transform: rotateX(-90deg) translateZ(225px);
		}
		
		.nav {
		  margin: 20px 0;
		  padding: 0;
		}
		.nav li {
		  display: inline-block;
		  list-style-type: none;
		  font-size: 1em;
		  margin: 0 10px;
		  color: #42509e;
		  position: relative;
		  cursor: pointer;
		}
		.nav li:after {
		  content: "";
		  position: absolute;
		  bottom: 0;
		  left: 0;
		  width: 20px;
		  border-bottom: 1px solid #42509e;
		  transition: all ease-in 0.25s;
		}
		.nav li:hover:after {
		  width: 100%;
		}
		
		.psw, .signup, .singin {
		  display: block;
		  margin: 20px 0;
		  font-size: 0.75em;
		  text-align: center;
		  color: #42509e;
		  cursor: pointer;
		}
		
		small {
		  font-size: 0.7em;
		}
		
		@-webkit-keyframes success {
		  from {
			-webkit-transform: translate(-50%, -50%) rotate(0) scale(0);
		  }
		  to {
			-webkit-transform: translate(-50%, -50%) rotate(-45deg) scale(1);
		  }
		}
		</style>
		
		  <script>
		  window.console = window.console || function(t) {};
		</script>
		
		  
		  
		  <script>
		  if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		  }
		</script>
		
		
		</head>
		
		<body translate="no" >
		  <ul class="nav">
		  <li onclick="showLogin()">Login</li>
		  <li onclick="showSignup()">Sign up</li>
		  <li onclick="showForgotPassword()">Forgot password</li>
		  <li onclick="showSubscribe()">Subscribe</li>
		  <li onclick="showContactUs()">Contact us</li>
		</ul>
		<div class="wrapper">
		  <div class="rec-prism">
			<div class="face face-top">
			  <div class="content">
				<h2>Subscribe</h2>
				<small>Enter your email so we can send you the latest updates!</small>
				<form onsubmit="event.preventDefault()">
				  <div class="field-wrapper">
					<input type="text" name="email" placeholder="email">
					<label>e-mail</label>
				  </div>
				  <div class="field-wrapper">
					<input type="submit" onclick="showThankYou()">
				  </div>
				</form>
			  </div>
			</div>
			<div class="face face-front">
			  <div class="content">
				<h2>Sign in</h2>
				<form action="' . base_url(PATH . 'social/login_local') . '" method="post">
				  <div class="field-wrapper">
					<input type="text" name="user_login" placeholder="'.msg('user_login').'">
					<label>username</label>
				  </div>
				  <div class="field-wrapper">
					<input type="password" name="user_password" placeholder="'.msg('user_password').'" autocomplete="new-password">
					<label>password</label>
				  </div>
				  <div class="field-wrapper">
					<input type="submit" onclick="showThankYou()">
				  </div>
				  <span class="psw" onclick="showForgotPassword()">Forgot Password?   </span>
				  <span class="signup" onclick="showSignup()">Not a user?  Sign up</span>
				</form>
			  </div>
			</div>
			<div class="face face-back">
			  <div class="content">
				<h2>Forgot your password?</h2>
				<small>Enter your email so we can send you a reset link for your password</small>
				<form onsubmit="event.preventDefault()">
				  <div class="field-wrapper">
					<input type="text" name="email" placeholder="email">
					<label>e-mail</label>
				  </div>
				  <div class="field-wrapper">
					<input type="submit" onclick="showThankYou()">
				  </div>
				</form>
			  </div>
			</div>
			<div class="face face-right">
			  <div class="content">
				<h2>Sign up</h2>
				<form onsubmit="event.preventDefault()">
				  <div class="field-wrapper">
					<input type="text" name="email" placeholder="email">
					<label>e-mail</label>
				  </div>
				  <div class="field-wrapper">
					<input type="password" name="password" placeholder="password" autocomplete="new-password">
					<label>password</label>
				  </div>
				  <div class="field-wrapper">
					<input type="password" name="password2" placeholder="password" autocomplete="new-password">
					<label>re-enter password</label>
				  </div>
				  <div class="field-wrapper">
					<input type="submit" onclick="showThankYou()">
				  </div>
				  <span class="singin" onclick="showLogin()">Already a user?  Sign in</span>
				</form>
			  </div>
			</div>
			<div class="face face-left">
			  <div class="content">
				<h2>Contact us</h2>
				<form onsubmit="event.preventDefault()">
				  <div class="field-wrapper">
					<input type="text" name="name" placeholder="name">
					<label>Name</label>
				  </div>
				  <div class="field-wrapper">
					<input type="text" name="email" placeholder="email">
					<label>e-mail</label>
				  </div>
				  <div class="field-wrapper">
					<textarea placeholder="your message"></textarea>
					<label>your message</label>
				  </div>
				  <div class="field-wrapper">
					<input type="submit" onclick="showThankYou()">
				  </div>
				</form>
			  </div>
			</div>
			<div class="face face-bottom">
			  <div class="content">
				<div class="thank-you-msg">
				  Thank you!
				</div>
			  </div>
			</div>
		  </div>
		</div>
			<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>
		
		  
			  <script id="rendered-js" >
		let prism = document.querySelector(".rec-prism");
		
		function showSignup() {
		  prism.style.transform = "translateZ(-100px) rotateY( -90deg)";
		}
		function showLogin() {
		  prism.style.transform = "translateZ(-100px)";
		}
		function showForgotPassword() {
		  prism.style.transform = "translateZ(-100px) rotateY( -180deg)";
		}
		
		function showSubscribe() {
		  prism.style.transform = "translateZ(-100px) rotateX( -90deg)";
		}
		
		function showContactUs() {
		  prism.style.transform = "translateZ(-100px) rotateY( 90deg)";
		}
		
		function showThankYou() {
		  prism.style.transform = "translateZ(-100px) rotateX( 90deg)";
		}
		//# sourceURL=pen.js
			</script>
		';

		return ($sx);
	}

	function access_denied()
		{
			$sx = $this->view('access_denied.php');
		}
}
