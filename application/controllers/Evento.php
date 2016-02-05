<?php
class evento extends CI_controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> helper('links_users');
		$this -> load -> library('session');
		$this -> load -> helper('email');

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
	}

	/* Eventos Redirecionados */
	function spsr() {
		$this -> load -> view('evento/spsr/home');
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
	}

	function cab() {
		/* Security */
		$this -> security();

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
		array_push($menus, array('Eventos', 'index.php/evento'));
		if (isset($_SESSION['evento'])) {
			array_push($menus, array('Inscri��es', 'index.php/evento/inscricoes'));
			array_push($menus, array('Lista de presen�a', 'index.php/evento/lista_presenca'));
		}

		/* Monta telas */
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$data['title_page'] = 'M�dulo de Eventos';
		$this -> load -> view('header/header', $data);
		$this -> load -> view('header/cab', $data);
	}

	function index() {
		/* Load Models */
		//$this -> load -> model('ics');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Eventos', 'Lista dos Eventos', 'ITE', '/evento/row'));
		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Eventos';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function etiqueta_print($id = 0) {
		if (!isset($_SESSION['evento'])) {
			echo 'Evento n�o selecionado';
		}
		$ev = $_SESSION['evento'];
		$data['title_page'] = 'Impress�o de Etiquetas';
		$this -> load -> view('header/header', $data);

		if ($id > 0) {
			$sql = "select * from evento_inscricao 
						inner join us_usuario on id_us = ei_us_usuario_id
							where ei_evento_id = $ev 
						and ei_status = 1
						and ei_us_usuario_id = $id
						order by us_nome
						";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
		} else {
			$sql = "select * from evento_inscricao 
						inner join us_usuario on id_us = ei_us_usuario_id
							where ei_evento_id = $ev 
						and ei_status = 1
						order by us_nome
						";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array();
		}
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$this -> load -> view("evento/etiqueta_100x35_land", $line);
		}
		$data['content'] = '<script> window.print(); </script>';
		$this -> load -> view('content', $data);
	}

	function etiqueta() {
		if (!isset($_SESSION['evento'])) {
			redirect(base_url('index.php/evento'));
		}
		$ev = $_SESSION['evento'];
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$link = '<A href="#" onclick="newxy2(\'' . base_url('index.php/evento/etiqueta_print/') . '\',400,500);" class="link lt2">';
		$link .= 'Imprimir todas as etiquetas</a>';
		$data['content'] = $link;

		$this -> load -> view('content', $data);
	}

	function inscricoes() {
		/* Load Models */
		//$this -> load -> model('ics');
		if (!isset($_SESSION['evento'])) {
			redirect(base_url('index.php/evento'));
		}
		$ev = $_SESSION['evento'];

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$tela['title'] = $this -> lang -> line('title_ic');
		$tela['tela'] = '';

		/* Menu de bot�es na tela Admin*/
		$menu = array();
		array_push($menu, array('Eventos', 'Lista dos Inscritos', 'ITE', '/evento/lista_inscritos/' . $ev));
		array_push($menu, array('Eventos', 'Impress�o de Etiquetas', 'ITE', '/evento/etiqueta'));

		/*View principal*/
		$data['menu'] = $menu;
		$data['title_menu'] = 'Menu de Eventos';
		$this -> load -> view('header/main_menu', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function row() {
		/* Load Models */
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$data['content'] = $this -> eventos -> row();
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function editar($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> eventos -> tabela);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/evento/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function email($id = 0) {
		global $email_own;
		$email = 1;
		$email_own = 2;
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();

		$this -> eventos -> enviar_email($id);

		/*
		 $this->email->attach('img/img_noPhoto.jpg');
		 $cid = $this->email->attachment_cid('img/img_noPhoto.jpg');
		 $msg = '<center><img src="cid:'. $cid .'" alt="'.$cid.'" />';

		 if ($email == 1) {
		 //enviaremail_usuario($id,'Agenda',$data['agenda'],$email_own);
		 enviaremail_usuario($id, 'XXXXX', $msg , $email_own);
		 }
		 */

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function email_test($id = 0) {
		global $email_own;
		$email = 1;
		$email_own = 2;
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$data = array();

		$this -> load -> view('header/content_open');
		$this -> eventos -> enviar_email_test($id);

		$data['content'] = 'Enviado teste';

		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function editar_mailing($id = 0, $chk = '', $evento = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp_mailing();

		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, $this -> eventos -> tabela_mailing);
		$data['title'] = msg('fm_titulo');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);

		/* Salva */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/evento/row'));
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function ver_lista($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$this -> load -> model('usuarios');
		$cp = $this -> eventos -> cp();

		$this -> cab();
		$this -> load -> view('header/content_open');

		$ml = $this -> eventos -> le($id);
		$sql = $ml['ev_query'];
		$sql = 'select * from us_usuario as user inner join 
					(' . $sql . ') as tabela on tabela.id_us = user.id_us 
				order by user.us_nome';

		$sx = '';
		$sql = troca($sql, '�', "'");
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<table>';
		$email = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_us'];
			$sx .= '<tr>';
			$sx .= '<td>' . ($r + 1) . '.</td>';
			$sx .= '<td>';
			$sx .= $line['us_nome'];
			$sx .= '</td>';
			$sx .= '<td>';
			$em = $this -> usuarios -> lista_email($id, 0);
			$email .= $em . '; ';
			$sx .= $em;
			$sx .= '</td>';
			$sx .= '</tr>';
		}
		$sx .= '<tr><td colspan=10>' . $email . '</td></tr>';
		$sx .= '</table>';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);
	}

	function ver($id = 0, $chk = '', $idm = 0) {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$cp = $this -> eventos -> cp();

		$this -> cab();
		$this -> load -> view('header/content_open');

		/* Seta como evento padr�o */
		$_SESSION['evento'] = $id;

		$data = $this -> eventos -> le($id);
		$data['ev_mailing'] = '';

		/* Mailing */
		if ($idm > 0) {
			$data2 = $this -> eventos -> show_mailing($idm);
			$data['email'] = '';
			$data['ev_mailing'] = $this -> load -> view('evento/mailing', $data2, True);

		} else {
			$data['email'] = '';
		}

		$this -> load -> view('evento/view', $data);

		//$data['content'] = 'https://cip.pucpr.br/img/evento/SwB/';
		if ($idm > 0) {
			$data['content'] = '<a href="' . base_url('index.php/evento/editar_mailing/' . $idm) . '" class="link lt1">editar</a>';
			$data['content'] .= ' | ';
			$data['content'] .= '<a href="' . base_url('index.php/evento/email_test/' . $idm) . '" class="link lt1">enviar teste de e-mail</a>';
			$data['content'] .= ' | ';
			$data['content'] .= '<a href="' . base_url('index.php/evento/email/' . $idm) . '" class="link lt1">disparar e-mail</a>';
			$this -> load -> view('content', $data);
		}

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function lista_inscritos($id = 0, $chk = '') {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$this -> load -> model('usuarios');
		$this -> load -> model('eventos/swb2s');

		$cp = $this -> eventos -> cp();

		$this -> cab();

		$this -> load -> view('header/content_open');

		$ml = $this -> eventos -> le($id);
		$sql = $ml['ev_query'];
		$sql = "Select * from evento_inscricao as evento
						inner join us_usuario as user on user.id_us = evento.ei_us_usuario_id 
						where evento.ei_evento_id = $id
						order by user.us_nome";

		$sx = '';
		$sql = troca($sql, '�', "'");
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx .= '<table width="100%" class="lt2" border=0>';

		$sx .= '<h1>Lista de Inscritos</h1>';
		$sx .= '<th align=left>id<th>nome<th>
				<th>etiq.<th>
				<th align=center>n� inscricao<th>
				<th align=right>cracha<th>
				<th>data da insc.<th>
				<th>email contato<th>
				<th>inscrito';

		$email = '';
		$tot = 0;
		$totc = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;

			$line = $rlt[$r];
			$inscrito = $line['ei_status'];
			$ei_evento_confirmar = $line['ei_evento_confirmar'];

			if ($inscrito != '1') {
				$ft = '<font color = red><s>';
				$ftend = '</s></font>';
			} else {
				$totc++;
				$ft = '';
				$ftend = '';
			}
			if ($ei_evento_confirmar == '1') {
				$ft = '<font color = green><b>';
				$ftend = '</b></font>';
			}
			$id_us = $line['id_us'];

			$sx .= '<tr>';
			$sx .= '<td>' . ($r + 1) . '.</td>';
			$sx .= '<td>';
			$sx .= $ft . $line['us_nome'] . $ftend;
			$sx .= '</td>';

			/* Etiqueta */
			$sx .= '<td align=center width="5">' . " | " . '</td>';
			$sx .= '<td width="10" align="center">';
			if ($inscrito != '0') {
				$link_etiqueta = '<A href="#" onclick="newxy2(\'' . base_url('index.php/evento/etiqueta_print/' . $line['ei_us_usuario_id']) . '\',400,500);" class="link lt2" alt="imprimir cracha">';
				$link_etiqueta .= '<img src="' . base_url('img/icon/icone_cracha.png') . '" border=0 height="18" title="imprimir cracha">';
				$link_etiqueta .= '</a>';
				$sx .= $link_etiqueta;
			}
			$sx .= '</td>';

			$sx .= '<td align=center width="5">' . " | " . '</td>';
			$sx .= '<td align=right>';
			$sx .= $ft . $line['id_ei'] . $ftend;
			$sx .= '</td>';
			$sx .= '<td >' . " | " . '</td>';
			$sx .= '<td align=right>';
			$sx .= $ft . $line['us_cracha'] . $ftend;
			$sx .= '</td>';
			$sx .= '<td >' . " | " . '</td>';
			$sx .= '<td align=right>';
			$sx .= $ft . $line['ei_data_inscricao'] . $ftend;
			$sx .= '</td>';
			$sx .= '<td >' . " | " . '</td>';
			$sx .= '<td>';
			$em = '';
			$em = $this -> usuarios -> recupera_email($id_us, 0);
			$email .= $em . '; ';
			$sx .= $ft . $em . $ftend;
			$sx .= '</td>';

			$sx .= '<td >' . " | " . '</td>';

			$id_ei = $line['id_ei'];

			if ($inscrito == '1') {
				$sx .= '<td align=center>';
				$link = '<A HREF="' . base_url("index.php/evento/lista_inscritos_editar/" . $id_ei . "/" . checkpost_link($id_ei)) . '" class="link lt2" >  editar';
				$sx .= $link;
				$sx .= '</td>';
			} else {
				$sx .= '<td align=center>';
				$link = '<A HREF="' . base_url("index.php/evento/lista_inscritos_editar/" . $id_ei . "/" . checkpost_link($id_ei)) . '"><font color="red">editar</font>';
				$sx .= $link;
				$sx .= '</td>';
			}

			$sx .= '</tr>';
		}

		//Soma os inscritos
		$sql_inscrito = "Select count(*) as total
											from evento_inscricao 
											where ei_status = 1";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$tot = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;
			$line = $rlt[$r];
		}

		$sx .= '<TR>
				 		<TD colspan=14 align=right BGCOLOR="#C0C0C0" valign="bottom">
						<font color="white">Total de ' . ($tot - $totc) . ' estudantes inscritos</font>';

		//Lista de e-mails
		$sx .= '<tr><td colspan=14></br><fieldset style="border:3px solid #d5d5d5; "><legend><b>Lista com todos os e-mails dos inscritos no evento </b></legend>' . $email . '</fieldset></td></tr>';
		$sx .= '</table>';

		$sx .= '';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}


	function lista_presenca($us = 0, $chk = '', $tp = 0) {
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$this -> load -> model('usuarios');
		$this -> load -> model('eventos/swb2s');
		
		$sx = '';
		if (!isset($_SESSION['evento'])) {
			echo 'Evento n�o selecionado';
			exit;
		}
		$id = $_SESSION['evento'];

		if ($us > 0) {
			$chk2 = checkpost_link($us);
			if ($chk == $chk2) {
				/* Lanca entrada do estudante */
				$hora = date("H:i:s");
				$data = date("Y-m-d");
				if ($tp == 0)
					{
						$hora = '';
						$data = '0000-00-00';
					}
				$sql = "update evento_inscricao set
									ei_evento_confirmar = $tp,
									ei_evento_chegada = '" . $data . "',
									ei_evento_chegada_hora = '" . $hora . "' 
								where id_ei = $us ";
				$this -> db -> query($sql);
				redirect(base_url('index.php/evento/lista_presenca/'));
				exit ;
			}
		}



		$cp = $this -> eventos -> cp();

		$data = array();
		$this -> load -> view('header/header', $data);
		

		/* Titulo do evento */
		$ml = $this -> eventos -> le($id);
		$data['content'] = '<h1>evento: '.$ml['ev_nome'].'</h1>';
		$this->load->view("content",$data);
		
		/* Dados do evento */
		$tela = $this->eventos->resumo_presenca();
		$data['content'] = $tela;
		$this->load->view("content",$data);		
				
		$sql = $ml['ev_query'];
		$sql = "Select * from evento_inscricao as evento
						inner join us_usuario as user on user.id_us = evento.ei_us_usuario_id 
						where evento.ei_evento_id = $id
						and ei_status > 0
						order by ei_evento_confirmar, user.us_nome";

		
		$sql = troca($sql, '�', "'");
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx .= '<table width="100%" class="lt2" border=0>';

		$sx .= '<h1>Lista de Inscritos</h1>';
		$sx .= '<th width="2%" align=left >id</th>
				<th width="3%">confirmar</th>
				<th width="60%">nome</th>
				<th width="10%">cracha</th>
				<th width="10%">chegada</th>
				<th width="10%">dt. inscri��o</th>
				</tr>
				';

		$email = '';
		$tot = 0;
		$totc = 0;

		for ($r = 0; $r < count($rlt); $r++) {
			$tot++;

			$line = $rlt[$r];
			$ei_evento_confirmar = $line['ei_evento_confirmar'];

			$ft = '';
			$ftend = '';

			if ($ei_evento_confirmar == '1') {
				$ft = '<font color = green><b>';
				$ftend = '</b></font>';
			}

			$sx .= '<tr valign="middle" style="height: 50px;">';
			$sx .= '<td class="borderb1">' . ($r + 1) . '.</td>';

			/* Botao confirmar */
			$sx .= '<td  class="borderb1">';
			if ($ei_evento_confirmar == 0) {
				$sx .= '<a href="' . base_url('index.php/evento/lista_presenca/' . $line['id_ei'] . '/' . checkpost_link($line['id_ei']) . '/1') . '" class="botao3d back_green_shadown back_green" style="width: 80px; text-align: center;">';
				$sx .= 'chegou';
				$sx .= '</a>';
			} else {
				$sx .= '<a href="' . base_url('index.php/evento/lista_presenca/' . $line['id_ei'] . '/' . checkpost_link($line['id_ei']) . '/0') . '" class="botao3d back_grey_shadown back_grey" style="width: 80px; text-align: center;">';
				$sx .= 'saiu';
				$sx .= '</a>';
			}
			$sx .= '</td>';

			$sx .= '<td class="borderb1 lt4">';
			$sx .= $ft . $line['us_nome'] . $ftend;
			$sx .= '</td>';

			$sx .= '<td align=center class="borderb1">';
			$sx .= $ft . $line['us_cracha'] . $ftend;
			$sx .= '</td>';

			$sx .= '<td align=center class="borderb1">';
			if ($line['ei_evento_chegada'] != '0000-00-00') {
				$sx .= $ft . stodbr($line['ei_evento_chegada']) . ' ' . $line['ei_evento_chegada_hora'] . $ftend;
			}
			$sx .= '</td>';

			$sx .= '<td align=right  class="borderb1">';
			$sx .= $ft . $line['ei_data_inscricao'] . $ftend;
			$sx .= '</td>';

			$sx .= '</tr>';
		}

		$sx .= '<TR>
				 		<TD colspan=14 align=right BGCOLOR="#C0C0C0" valign="bottom">
						<font color="white">Total de ' . ($tot - $totc) . ' estudantes inscritos</font>';

		//Lista de e-mails
		$sx .= '</table>';

		$sx .= '';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);

	}

	/** Monta a lista de inscritos no evento SWB2  */
	function lista_inscritos_editar($id = 0, $chk = '') {
		/* Load Models */
		/* Load Models */
		$this -> load -> model('evento/eventos');
		$this -> load -> model('usuarios');
		$this -> load -> model('eventos/swb2s');

		$this -> cab();
		//consulta
		$cp = $this -> eventos -> cp_editar_status();
		$ev = $this -> eventos -> le_inscricao($id);
		$us = $this -> usuarios -> le($ev['ei_us_usuario_id']);

		$data = array();
		$this -> load -> view('header/content_open');

		$this -> load -> view('usuario/view', $us);

		$form = new form;
		$form -> id = $id;

		$tela = $form -> editar($cp, 'evento_inscricao');
		$data['title'] = msg('fm_titulo_swb');
		$data['tela'] = $tela;
		$this -> load -> view('form/form', $data);
		/* Salva */
		if ($form -> saved > 0) {

			redirect(base_url('index.php/evento/lista_inscritos/' . $ev['ei_evento_id']));
		}

	}

}
?>
