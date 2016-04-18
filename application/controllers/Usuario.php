<?php
class usuario extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> lang -> load("app", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('session');
		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}
	
	function inport_lattes_acpp($id = 0) {
		if (isset($_POST['dd1'])) { $dd1 = $_POST['dd1'];
		} else { $dd1 = '';
		}
		$file = '';
		if (strlen($dd1) > 0) {
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];
			$file = $_FILES['arquivo']['name'];
		} else {
			$temp = '';
		}

		if (strlen($temp) == 0) {
			$sx = '
					<center>
							<form id="upload" action="' . base_url('index.php/inport/lattes/arquivo/') . '" method="post" enctype="multipart/form-data">
							<input type="file" name="arquivo" id="arquivo" />
							<input type="submit" name="dd1" value="enviar >>>">
						</form>
					</center>					
					';
			return ($sx);
		} else {
			$sx = 'Arquivo lido com sucesso!';
			$rHandle = fopen($temp, "r");
			$sData = '';
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Abrindo Arquivo ';
			while (!feof($rHandle)) {
				$sData .= fread($rHandle, filesize($temp));
			}
			fclose($rHandle);
			$sx .= '<BR>' . date("d/m/Y H:i::s") . ' Tamanho do arquivo lido ' . number_format(strlen($sData) / 1024, 1, ',', '.') . ' kBytes';

			$ln = splitx(chr(13), $sData);
			$sx .= '<BR>Total de linhas: ' . count($ln);
			$sx .= '<BR>Indentificação do tipo de obra: ';
			/* Identicação do tipo de obra */
			$tpo = $this -> tipo_obra($ln[0], $file);
			if (strlen($tpo) > 0) {
				$sx .= '<B>' . $tpo . '</B>';
				$sx .= $this -> arquivos_salva_quebrado($ln, $tpo);
				$sx .= '<BR>SALVO!';
			} else {
				$sx .= '<font color="red">Tipo de obra não identificada</font>';
				for ($r = 0; $r < 100; $r++) {
					print_r($ln[$r]);
					echo '<HR>';
				}
			}
			return ($sx);
		}
	}	

	function integracao_sga($id = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_sga');

		$this -> cab();
		$data = array();
		$sql = "select * from us_usuario 
					where (usuario_tipo_ust_id = 3 or usuario_tipo_ust_id = 0)
					and us_dt_update_cs < '" . date("Y-m") . "-01'
					limit 10";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = $line['us_cracha'];
			$idu = $line['id_us'];

			/* Atualiza data */
			$sql = "update us_usuario set us_dt_update_cs = '" . date("Y-m-d") . "'
				where id_us = $idu ";
			$this -> db -> query($sql);

			$rs = $this -> ws_sga -> findStudentByCracha($cracha);

			if (isset($rs['pessoa'])) {
				$cracha = $rs['pessoa'];
				$data = $this -> usuarios -> le($idu);
				$this -> load -> view('perfil/user', $data);
			}
		}
		if ($r > 0) {
			echo '<meta http-equiv="refresh" content="3">';
		}
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot');
	}

	function consulta_usuario($cracha = '') {
		if (strlen($cracha) == 0) {
			$cracha = get("dd10");
		}

		$this -> cab();
		if (strlen($cracha) == 0) {
			$this -> load -> view('usuario/form_cracha');
		} else {
			$this -> load -> model('usuarios');
			$this -> load -> model('webservice/ws_sga');
			$rs = $this -> ws_sga -> findStudentByCracha($cracha);
			
			if (isset($rs['pessoa'])) {
				$cracha = $rs['pessoa'];
				$data = $this -> usuarios -> le_cracha($cracha);
				$this -> load -> view('usuario/view', $data);
			} else {
				$tela = '<h1><font color="red">Erro de consulta</font></h1>';
				$data['content'] = $tela;
				$this -> load -> view('content', $data);
			}

			$this -> load -> view('usuario/form_cracha');

		}
	}

	function row($id = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$link = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '">Consulta SGA</a>';
		$data2['title'] = '';
		$data2['content'] = $link;
		$this -> load -> view('content', $data2);

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = false;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/usuario/usuarios_edit');
		$form -> row_view = base_url('index.php/usuario/view');
		$form -> row = base_url('index.php/usuario/row/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_usuarios');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function security() {

		/* SeguranCa */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Docentes & Discentes', 'index.php/usuario/row'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_usuarios');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');

	}

	function email_mod($id, $chk) {
		/* Model */
		$this -> load -> model('usuarios');

		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();

		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$email = $this -> input -> post("dd1");
		$acao = $this -> input -> post("acao");

		/* Se não existe acao, recupera e-mail */
		if (strlen($acao) == 0) {
			$email = $this -> usuarios -> recupera_email($id);
		}

		$this -> load -> view('header/header', $data);
		$data['email'] = $email;
		$data['bt_acao'] = msg('email_modificar');
		$data['bt_excluir'] = msg('email_excluir');
		$this -> load -> view('usuario/add_email.php', $data);

		if ($acao == $data['bt_excluir']) {
			$data['content'] = $this -> usuarios -> email_excluir($id);
			$this -> load -> view('content', $data);
			return (0);
		}

		if ((strlen($email) > 0) and ($acao == $data['bt_acao'])) {
			$data['content'] = $this -> usuarios -> email_modify($id, $email);
		} else {
			$data['content'] = '';
		}
		$this -> load -> view('content', $data);
	}

	function email_add($id, $chk) {
		/* Model */
		$this -> load -> model('usuarios');

		/* Carrega classes adicionais */
		$css = array();
		array_push($css, 'form_sisdoc.css');
		$js = array();

		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$email = $this -> input -> post("dd1");
		$acao = $this -> input -> post("acao");
		$this -> load -> view('header/header', $data);
		$data['email'] = $email;
		$data['bt_acao'] = msg('email_adicionar');
		$data['bt_excluir'] = '';
		$this -> load -> view('usuario/add_email.php', $data);

		if (strlen($email) > 0) {
			$data['content'] = $this -> usuarios -> email_add($id, $email);
		} else {
			$data['content'] = '';
		}

		$this -> load -> view('content', $data);
	}

	function index() {
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function profile($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('usuarios');

		/* Carrega classes adicionais */
		$this -> cab();
		$data = array();

		if ($id == 0) {
			redirect(base_url('index.php/main'));
			exit ;
		}

		$tela = $this -> usuarios -> view_prefil($id);
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close.php');
		$this -> load -> view('header/foot');
	}

	function view($id = 0) {
		$this -> load -> model('usuarios');
		$this -> load -> model('ics');
		$this -> load -> model('producoes');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);
		$data['ver_perfil'] = 1;

		$tipo = $data['usuario_tipo_ust_id'];
		switch ($tipo) {
			/* Docente */
			case '2' :
				$data['logo'] = base_url('img/logo/logo_docentes.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/docente', $data);
				$cpf = strzero(sonumero($data['us_cpf']), 11);

				break;
			/* Colaborador */
			case '4' :
				$data['logo'] = base_url('img/logo/logo_colaborador.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/colaborador', $data);
				break;
			/* Discente */
			case '3' :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				$cpf = strzero(sonumero($data['us_cpf']), 11);
				$data['content'] = $this -> usuarios -> mostra_formacao($cpf);
				$this -> load -> view('content', $data);

				/* Iniciacao cientifica */
				$data['content'] = $this -> usuarios -> mostra_ic($cpf);
				$this -> load -> view('content', $data);

				break;
			default :
				$data['logo'] = base_url('img/logo/logo_discente.jpg');
				$this -> load -> view('header/logo', $data);
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Dados de apresentacao */
		$data['content'] = '';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function edit($id = 0) {
		global $dd;
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);

		$tipo = $data['usuario_tipo_ust_id'];

		switch ($tipo) {
			case '2' :
				$this -> load -> view('perfil/docente', $data);
				break;
			default :
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Form */
		$form = new form;
		$form -> tabela = 'us_usuario';
		$form -> id = $id;
		$cp = $this -> usuarios -> cp_perfil();
		$data['tela'] = $form -> editar($cp, 'us_usuario');

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario/row'));
		}

		$data['title'] = 'Formulário';
		$this -> load -> view('form/form', $data);

		$cracha = trim($data['us_cracha']);
		if (strlen($cracha) > 0) {
			$link = '<A href="' . base_url('index.php/usuario/consulta_usuario/' . $cracha) . '">Consulta SGA</a>';
			$data2['title'] = '';
			$data2['content'] = $link;
			$this -> load -> view('content', $data2);
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function produtividade_ed($id = 0, $chk = '') {
		global $dd;
		$this -> load -> model('produtividades');

		$this -> cab();
		$data = array();

		/* Form */
		$form = new form;
		$form -> tabela = 'us_bolsa_produtividade';
		$form -> id = $id;
		$cp = $this -> produtividades -> cp_produtividade();
		$data['content'] = $form -> editar($cp, $form -> tabela);

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/indicadores/docente/produtividade'));
		}

		$data['title'] = 'Produtividade';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/*edita conta bancaria do usuário */
	function edit_conta_cc($id = 0) {
		global $dd;
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);
		$tipo = $data['usuario_tipo_ust_id'];

		switch ($tipo) {
			case '2' :
				$this -> load -> view('perfil/docente', $data);
				break;
			default :
				$this -> load -> view('perfil/discente', $data);
				break;
		}

		/* Form */
		$form = new form;
		$form -> tabela = 'us_conta';
		$form -> id = $id;
		$cp_conta_usu = $this -> usuarios -> cp_conta_usuario();
		$data['tela'] = $form -> editar($cp_conta_usu, 'us_conta');

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario/view/' . $id));
		}

		$data['title'] = 'Manutenção de Conta bancária';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/*edita dados do usuário da sessão */
	function atualiza_dados() {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		$cracha = $_SESSION['cracha'];
		$dados = $this -> usuarios -> le_cracha($cracha);
		$id = $dados['id_us'];

		if (strlen($cracha) < 8) {
			redirect(base_url('index.php/main'));
		}

		$this -> load -> view('usuario/view_simple', $dados);
		$cp = $this -> usuarios -> cp_usuario_session();

		$form = new form;
		$form -> id = $id;
		$tela = $form -> editar($cp, $this -> usuarios -> tabela);

		$data['title'] = msg('Atualizar dados');
		//$data['logo'] = base_url('img/icon/ico_engrenagem.png');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/main'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function edit_usuario_session($id = 0, $check = '') {

		/* Load Models */
		$this -> load -> model('usuarios');

		$cp = $this -> usuarios -> cp_usuario_session();
		$data = array();

		$this -> cab();
		//$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> usuarios -> tabela);

		$data['title'] = msg('Dados cadastrais do usuário');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function view_usuario_session($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		//$this -> load -> view('header/content_open');

		$data = $this -> usuarios -> le_usuario_session($id);

		$this -> load -> view('usuario/view_edita_usu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	/*edita conta bancaria do usuário */
	function edit_blackList($id = 0, $check = '') {
		global $dd;
		$this -> load -> model('usuarios');
		
		$this -> cab();
		$data = array();
		
		//print_r($id);
		//exit;
		
		$id_bl = $this -> usuarios -> existe_impedimento($id);
		
		$data = $this -> usuarios -> le($id);
		$tipo = $data['usuario_tipo_ust_id'];

		switch ($tipo) {
			case '2' :
				$this -> load -> view('perfil/docente', $data);
				break;
			default :
				$this -> load -> view('perfil/discente', $data);
				break;
		}
			
		/* Form */
		$form = new form;
		$form -> tabela = 'ic_blacklist';
		
		$form -> id = $id_bl;
		$cp_usu_blacklist = $this -> usuarios -> cp_usu_blacklist($id);
		$data['tela'] = $form -> editar($cp_usu_blacklist, 'ic_blacklist');

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/usuario/view/' . $id));
		}

		$data['title'] = 'Edita usuário com impedimentos';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	

}
?>