<?php
class admin extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> library("nuSoap_lib");

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'switch_onoff.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Perfis', 'index.php/admin/logins/'));
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Administração';

		if (perfil('#ADM')) {
			$data['menu'] = 1;
			$data['menus'] = $menus;
		} else {
			$data['menu'] = 0;
			$data['menus'] = $menus;
		}
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');

		if (perfil('#ADM', 1) == false) {
			redirect(base_url('index.php'));
			return (0);
		}
	}

	function checar_cpf($pg = 0) {
		$this -> load -> model('usuarios');
		$this -> cab();

		$tela = $this -> usuarios -> checar_cpf($pg);
		echo $tela;
	}

	function cracha_duplicados() {
		$this -> load -> model('usuarios');
		$this -> cab();

		$sx = $this -> usuarios -> cracha_duplicados();
		$data['content'] = $sx;
		$this -> load -> view('content', $data);
	}

	function checar_cracha_aluno_ic() {
		$this -> load -> model('webservice/ws_sga');
		$this -> load -> model('usuarios');
		$this -> cab();

		$sql = "SELECT distinct ic_aluno_cracha FROM ic_aluno 
						left join us_usuario on us_cracha = ic_aluno_cracha 
					where us_nome is null and ic_aluno_cracha <> ''";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cracha = $line['ic_aluno_cracha'];

			$sx .= '<br>->' . $cracha;
			$this -> ws_sga -> findStudentByCracha($cracha, 1);
			$sx .= 'ok';
		}
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}

	function nome_sem_escola() {
		$this -> load -> model('usuarios');
		$this -> cab();

		$sql = "SELECT * from us_usuario 
						left join escola on us_escola_vinculo = id_es
						where id_es is null 
						order by us_nome
						limit 100 
						";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';
		$sx .= '<table width="100%" class="lt1">';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			print_r($line);
			exit ;
			$id = $line['id_us'];
			$nome = $line['us_nome'];
			$nome_asc = UpperCaseSQL($line['us_nome']);

			$sx .= '<tr>';
			$sx .= '<td align="center" width="4%">';
			$sx .= $id;
			$sx .= '</td>';
			$sx .= '<td width="48%">';
			$sx .= $nome;
			$sx .= '</td>';
			$sx .= '<td width="48%">';
			$sx .= $nome_asc;
			$sx .= '</td>';
			$sx .= '</tr>';

			$sql = "update us_usuario set us_nome_lattes = '$nome_asc' where id_us = $id ";
			$rrr = $this -> db -> query($sql);
		}
		if ($to > 0) {
			$sx .= '<meta http-equiv="refresh" content="2">';
		}

		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}

	function nome_lattes() {
		$this -> load -> model('usuarios');
		$this -> cab();

		$sql = "SELECT * from us_usuario 
						where us_nome_lattes = '' or us_nome_lattes = '' 
							or us_nome_lattes like '%http%'
						order by us_nome
						limit 100 
						";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '';
		$sx .= '<table width="100%" class="lt1">';
		$to = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$to++;
			$line = $rlt[$r];
			$id = $line['id_us'];
			$nome = $line['us_nome'];
			$nome_asc = UpperCaseSQL($line['us_nome']);

			$sx .= '<tr>';
			$sx .= '<td align="center" width="4%">';
			$sx .= $id;
			$sx .= '</td>';
			$sx .= '<td width="48%">';
			$sx .= $nome;
			$sx .= '</td>';
			$sx .= '<td width="48%">';
			$sx .= $nome_asc;
			$sx .= '</td>';
			$sx .= '</tr>';

			$sql = "update us_usuario set us_nome_lattes = '$nome_asc' where id_us = $id ";
			$rrr = $this -> db -> query($sql);
		}
		if ($to > 0) {
			$sx .= '<meta http-equiv="refresh" content="2">';
		}

		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}

	function index() {
		$this -> cab();
		$data = array();

		/* Menu de botões na tela Admin*/
		$menu = array();
		array_push($menu, array('Parceiros', 'Parceiros da PUCPR', 'ITE', '/parceiro'));
		array_push($menu, array('Idiomas', 'Idiomas do Sistema', 'ITE', '/idioma'));

		array_push($menu, array('Cadastros', 'IC - Manutenção de Bolsas por modalidade', 'ITE', '/admin/ic_modal_bolsas'));
		array_push($menu, array('Cadastros', 'Usuários do sistema', 'ITE', '/admin/usuarios'));

		array_push($menu, array('Usuários', 'Integração SGA/CIP Estudantes', 'ITE', '/usuario/integracao_sga'));
		array_push($menu, array('Usuários', 'Perfil de usuário do Sistema', 'ITE', '/perfil'));
		array_push($menu, array('Usuários', 'Nome lattes não existe', 'ITE', '/admin/nome_lattes'));
		array_push($menu, array('Usuários', 'Limpa Curso (Turnos)', 'ITE', '/admin/limpa_curso'));
		array_push($menu, array('Usuários', 'Cruzar dados do professor', 'ITE', '/admin/inporta_professor'));
		array_push($menu, array('Usuários', 'Ajustar/Validar CPF', 'ITE', '/admin/checar_cpf'));
		array_push($menu, array('Usuários', 'Crachas duplicados', 'ITE', '/admin/cracha_duplicados'));
		array_push($menu, array('Usuários', 'Sem escolas', 'ITE', '/admin/nome_sem_escola'));

		array_push($menu, array('Unidades', 'Unidades da PUCPR', 'ITE', '/unidade'));

		array_push($menu, array('Instituições', 'Instituições do grupo de pesquisa', 'ITE', '/instituicao'));
		array_push($menu, array('Instituições', 'Instituições de ensino', 'ITE', '/ies_instituicao'));		

		array_push($menu, array('Iniciação Científica', 'Manutenção de Bolsas', 'ITE', '/admin/ic'));
		array_push($menu, array('Iniciação Científica', 'ID/usuarios bas bolsas', 'ITE', '/admin/ic_id'));
		array_push($menu, array('Iniciação Científica', 'Vinculo Usuários / Bolsas', 'ITE', '/admin/checar_cracha_aluno_ic'));
		array_push($menu, array('Iniciação Científica', 'Finalizar projetos do ano anterior', 'ITE', '/admin/finalizar_ic'));

		array_push($menu, array('Iniciação Científica', 'Converter Pasta GED', 'ITE', '/admin/ged_ic'));

		array_push($menu, array('SEMIC', 'Salas de Apresentação', 'ITE', '/semic/salas'));
		array_push($menu, array('SEMIC', 'Trabalhos', 'ITE', '/semic/trabalhos_row'));
		array_push($menu, array('SEMIC', 'Correção UTF8', 'ITE', '/semic/trabalhos_correcao'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu Administração';
		$this -> load -> view('header/main_menu', $data);

		/*Fecha */ 		/*Gera rodapé*/
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function inporta_professor() {
		$this -> load -> model('usuarios');
		$this -> cab();

		$tela = $this -> usuarios -> inport_professores();
		$data['title'] = 'Inportação dos professores';
		$data['content'] = $tela;
		$this -> load -> view('content', $data);
	}

	function ic($id = 0, $pg = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> ics -> table_row();
		$form -> see = true;
		$form -> edit = true;
		$form -> novo = true;
		$form = $this -> ics -> row($form);

		$form -> row_edit = base_url('index.php/admin/ic_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/admin/ic/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('ic');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ic_id($id = 0, $pg = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		$this -> ics -> indicacoes_sem_id_usuario();

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ged_ic() {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		//$this -> ics -> indicacoes_sem_id_usuario();
		$folder = '/pucpr/httpd/htdocs/www2.pucpr.br/reol/pibic/document/';
		$folder_new = '_document/pibic/';
		$tabela = 'ic_ged_documento';
		$sql = "select * from $tabela where doc_arquivo like '%" . $folder . "%' limit 300";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$path = $line['doc_arquivo'];
			$path_new = troca($path, $folder, $folder_new);
			$id = $line['id_doc'];
			$sx .= '<br>' . $id . ' - ' . $path . ' -> ' . $path_new;
			$sql = "update " . $tabela . " set doc_arquivo = '$path_new' where id_doc = $id ";
			$xrlt = $this -> db -> query($sql);
		}
		if (strlen($sx) > 0) {
			$sx .= '<meta http-equiv="refresh" content="2">';
		}
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	/* Discente */
	function finalizar_ic() {
		/* Load Models */
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		$tela = $this -> ics -> encerrar_planos_ano_anterior();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	/* Discente */
	function limpa_curso() {
		/* Load Models */
		$this -> load -> model('discentes');
		$this -> cab();
		$data = array();

		$tela = '<h3>Buscando cursos</h3>';
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$tela = $this -> discentes -> limpar_habilitacao_curso();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$tela = $this -> discentes -> limpar_turno_curso_estudante();
		$data['content'] = $tela;
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ic_edit($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ics -> tabela);
		$data['title'] = msg('ic');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/admin/ic'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function centro_resultado($id = 0) {
		$this -> load -> model('centro_resultados');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> centro_resultados -> tabela;
		$form -> see = true;
		$form = $this -> centro_resultados -> row($form);

		$form -> row_edit = base_url('index.php/admin/centro_resultado_edit/');
		$form -> row_view = '';
		$form -> row = base_url('index.php/admin/centro_resultado/');

		$tela['tela'] = row($form, $id);

		$tela['title'] = $this -> lang -> line('title_centro_resultado');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function logins_view($id = 0, $check = '', $act = '', $id_act = 0) {
		/* Load Models */
		$this -> load -> model('logins');

		/* Se acao EXCLUIR */
		if ($act == 'del') {
			$data = $this -> logins -> perfil_desassociar($id_act);
		}

		$this -> cab();
		$data = array();

		if (!checkpost_link($id) == $check) {
			redirect("index.php/main");
		}

		$data = $this -> logins -> le($id);
		$this -> load -> view('login/login_show', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function logins($id = 0) {
		$this -> load -> model('logins');
		$this -> cab();
		$data = array();

		$form = new form;
		$form -> tabela = $this -> logins -> tabela;
		$form -> see = true;
		$form = $this -> logins -> row($form);

		$form -> row_edit = base_url('index.php/admin/logins_edit/');
		$form -> row_view = base_url('index.php/admin/logins_view/');
		$form -> row = base_url('index.php/admin/logins/');

		$tela['tela'] = row($form, $id);
		$url = base_url('author');

		$tela['title'] = $this -> lang -> line('title_admin');

		$this -> load -> view('form/form', $tela);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ic_modal_bolsas($id = 0, $pg = '') {
		$this -> load -> model('ics');
		$this -> cab();
		$data = array();

		//Cria o Formulario
		$form = new form;

		//chama uma tabela exclusiva
		$form -> tabela = $this -> ics -> table_row_modal_bolsa();

		//Torna a linha da linha clicavel
		//$form -> see = true;

		//Mostra o action para editar os valores dos campos
		$form -> edit = true;

		//mostra o botão novo
		$form -> novo = true;

		//Define a qtd. de linha a mostrar do formulário por vez(default 25 a 30 linhas-form_sisdoc)

		//$form -> offset = '25';

		//Monta o formulario com os parametro acima
		$form = $this -> ics -> row_ic_modal_bolsas($form);

		//redireciona o edit para a view de edição dos campos
		$form -> row_edit = base_url('index.php/admin/ic_edit_modal_bolsa/');

		//Ao clicar na linha é redirecionado para uma view onde se vê os valores dos campos(opcional)
		$form -> row_view = base_url('index.php/admin/view_modal_bolsa');
		$form -> row = base_url('index.php/admin/ic_modal_bolsas');
		$tela['tela'] = row($form, $id);
		$tela['title'] = $this -> lang -> line('ic');

		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);

	}

	function ic_edit_modal_bolsa($id = 0, $check = '') {
		/* Load Models */
		$this -> load -> model('ics');
		$cp = $this -> ics -> cp_modal_bolsa();
		$data = array();

		$this -> cab();

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> ics -> tabela_2);
		$data['title'] = msg('lb_mb_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva e redireciona para pagina anterior*/
		if ($form -> saved > 0) {
			redirect(base_url('index.php/admin/ic_modal_bolsas'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function usuarios($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();
		$data['content'] = '<A href="' . base_url('index.php/usuario/consulta_usuario/') . '">' . msg('consulta') . ' ' . msg('cracha') . '</a>';
		$this -> load -> view('content', $data);

		/* Lista de comunicacoes anteriores */
		$form = new form;
		$form -> tabela = $this -> usuarios -> tabela_view();
		$form -> see = true;
		$form -> edit = false;
		$form -> novo = true;
		$form = $this -> usuarios -> row($form);

		$form -> row_edit = base_url('index.php/admin/usuarios_edit');
		$form -> row_view = base_url('index.php/usuario/view');
		$form -> row = base_url('index.php/admin/usuarios/');

		$data['content'] = row($form, $id);
		$data['title'] = msg('page_docentes');

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function usuarios_edit($id=0)
		{
		global $dd;
		$this -> load -> model('usuarios');

		$this -> cab();
		$data = array();

		/* Form */
		$form = new form;
		$form -> tabela = 'us_usuario';
		$form -> id = $id;
		$cp = $this -> usuarios -> cp_usuario();
		$data['tela'] = $form -> editar($cp, '');

		/* salved */
		if ($form -> saved > 0) {
			$tabela = 'us_usuario';
			$cracha = get("dd2");
			$cracha = $this->usuarios->limpa_cracha($cracha);
			$us = $this->usuarios->le_cracha($cracha);
			
			if (count($us) > 0)
				{
					$data['content'] = '<h2><font color="red">Usuário já cadastrado</font></h2>';
					$this -> load -> view('content', $data);
				} else {
					$_POST['dd2'] = $cracha;
					$form -> editar($cp, $tabela);
					redirect(base_url('index.php/admin/usuarios'));
				}
			
			//
		}

		$data['title'] = 'Cadastro de novo usuário';
		$data['tela'] .=
		'
		<script>
			$("#dd3").mask(\'999.999.999-99\');
		</script>
		';
		$this -> load -> view('form/form', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);			
		}

}
