<?php
class avaliador extends CI_Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();

		$this -> lang -> load("app", "portuguese");

		$this -> load -> library('form_validation');
		$this -> load -> helper('links_users_helper');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> helper('tcpdf');
		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function areas_limpar($id = 0) {
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> avaliador_area_impar($id);

		redirect(base_url('index.php/avaliador/view/' . $id . '/' . checkpost_link($id)));
	}

	function ajax_add($id = 0, $area = '') {
		$this -> load -> model('avaliadores');
		$this -> avaliadores -> avaliador_add_area($id, $area);

		echo ' <meta http-equiv="refresh" content="0">';
	}

	function ajax_change($id = 0, $idr = 0, $acao = '') {
		$data = date('Ymd');
		/************* AJAX ATIVAR / DESATIVAR */
		$sql = "select * from us_avaliador_area where id_pa = " . $idr;
		$rlt = db_query($sql);

		if ($line = db_read($rlt)) {
			$ativo = $line['pa_ativo'];
		} else {
			echo 'ERRO';
			return ('');
		}

		switch ($ativo) {
			case '1' :
				$acao = msg('inativo');
				$class = 'bt_desativado';
				$sql = "update us_avaliador_area set  pa_ativo = 0, pa_update = '$data' where id_pa = " . round($idr);
				$this -> db -> query($sql);
				break;
			default :
				$acao = msg('ativo');
				$class = 'bt_acao';
				$sql = "update us_avaliador_area set  pa_ativo = 1, pa_update = '$data' where id_pa = " . round($idr);
				$this -> db -> query($sql);
				break;
		}

		echo '<div class="' . $class . '"><b>' . $acao . '</b></div>';
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
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_avaliadores');
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_avaliador.jpg');
		$this -> load -> view('header/logo', $data);
	}

	function cab_avaliador() {
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
		array_push($menus, array('Avaliadores', 'index.php/ic/avaliadores'));

		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = msg('page_avaliadores');
		$data['menu'] = 0;
		//$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');
	}

	function index() {
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('ic_pareceres');

		$this -> cab_avaliador();
		$data = array();
		$id_us = $_SESSION['id_us'];

		$tela = $this -> ic_pareceres -> lista_para_avaliacao($id_us);
		$data['content'] = $tela;
		$data['title'] = 'Trabalhos para avaliação';
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot_modelo_2', $data);
	}

	function ficha($id = 0) {
		$this -> load -> model('ics');
		$this -> load -> model('geds');
		$this -> load -> model('usuarios');
		$this -> load -> model('mensagens');
		$this -> load -> model('ic_pareceres');

		$this -> cab_avaliador();

		$data = array();

		$dados = $this -> ic_pareceres -> le($id);
		$proto = $dados['pp_protocolo'];
		$tipo = $dados['pp_tipo'];
		$sta = $dados['pp_status'];
		/* Avaliação não disponível */
		if ($sta != 'A') {
			$txt = '<center><h1 color="red">Parecer já avaliador, cancelado ou declinado</h1></center>';
			return ('');
		}

		$dados2 = $this -> ics -> le_protocolo($proto);
		$dados = array_merge($dados, $dados2);

		$acao = get("acao");
		if (strlen($acao) == 0) {
			$data['dd1'] = $dados['pp_p01'];
			$data['dd2'] = $dados['pp_p02'];
			$data['dd3'] = $dados['pp_p03'];
			$data['dd4'] = $dados['pp_p04'];
			$data['dd5'] = $dados['pp_p05'];
			$data['dd6'] = $dados['pp_p06'];
			$data['dd7'] = $dados['pp_p07'];
			$data['dd8'] = $dados['pp_p08'];
			$data['dd9'] = $dados['pp_p09'];
			$data['dd10'] = $dados['pp_p10'];
			$data['dd11'] = $dados['pp_p11'];
			$data['dd12'] = $dados['pp_p12'];

			$data['dd21'] = $dados['pp_abe_01'];
			$data['dd22'] = $dados['pp_abe_02'];
			$data['dd23'] = $dados['pp_abe_03'];
			$data['dd24'] = $dados['pp_abe_04'];
			$data['dd25'] = $dados['pp_abe_05'];
			$data['dd26'] = $dados['pp_abe_06'];
			$data['dd27'] = $dados['pp_abe_07'];
			$data['dd28'] = $dados['pp_abe_08'];
			$data['dd29'] = $dados['pp_abe_09'];
		} else {
			$data['dd1'] = get("dd1");
			$data['dd2'] = get("dd2");
			$data['dd3'] = get("dd3");
			$data['dd4'] = get("dd4");
			$data['dd5'] = get("dd5");
			$data['dd6'] = get("dd6");
			$data['dd7'] = get("dd7");
			$data['dd8'] = get("dd8");
			$data['dd9'] = get("dd9");
			$data['dd10'] = get("dd10");
			$data['dd11'] = get("dd11");
			$data['dd12'] = get("dd12");

			$data['dd21'] = get('dd21');
			$data['dd22'] = get('dd22');
			$data['dd23'] = get('dd23');
			$data['dd24'] = get('dd24');
			$data['dd25'] = get('dd25');
			$data['dd26'] = get('dd26');
			$data['dd27'] = get('dd27');
			$data['dd28'] = get('dd28');
			$data['dd29'] = get('dd29');
			$data['dd30'] = get('dd30');
			$data['dd31'] = get('dd31');

			$sql = "update " . $this -> ic_pareceres -> tabela . " set 
							pp_p01 = " . round(get("dd1")) . ",
							pp_p02 = " . round(get("dd2")) . ",
							pp_p03 = " . round(get("dd3")) . ",
							pp_p04 = " . round(get("dd4")) . ",
							pp_p05 = " . round(get("dd5")) . ",
							pp_p06 = " . round(get("dd6")) . ",
							pp_p07 = " . round(get("dd7")) . ",
							pp_p08 = " . round(get("dd8")) . ",
							pp_p09 = " . round(get("dd9")) . ",
							pp_p10 = " . round(get("dd10")) . ",
							pp_abe_01 = '" . get('dd21') . "',
							pp_abe_02 = '" . get('dd22') . "',
							pp_abe_03 = '" . get('dd23') . "',
							pp_abe_04 = '" . get('dd24') . "',
							pp_abe_05 = '" . get('dd25') . "',
							pp_abe_06 = '" . get('dd26') . "',
							pp_abe_07 = '" . get('dd27') . "',
							pp_abe_08 = '" . get('dd28') . "',
							pp_abe_09 = '" . get('dd29') . "',
							pp_abe_10 = '" . get('dd30') . "',
							pp_abe_11 = '" . get('dd31') . "'
						where id_pp = " . $id;
			$rlt = $this -> db -> query($sql);
		}

		/* SALVAR */
		$ok = 0;
		for ($r = 1; $r <= 10; $r++) {
			if (strlen($data['dd' . $r]) > 0) { $ok++;
			}
		}

		if (strlen($data['dd21']) > 0) { $ok++;
		}
		if (strlen($data['dd22']) > 0) { $ok++;
		}
		if (strlen($data['dd23']) > 0) { $ok++;
		}
		if (strlen($data['dd24']) > 0) { $ok++;
		}
		if (strlen($data['dd25']) > 0) { $ok++;
		}
		if (strlen($data['dd28']) > 0) { $ok++;
		}

		/* arquivos */
		$this -> geds -> tabela = 'ic_ged_documento';
		$data['ged'] = $this -> geds -> list_files_table($proto, 'ic');
		$data['plano'] = $this -> load -> view('ic/plano', $dados, true);

		/* VALIDACOES */
		switch ($tipo) {
			case 'RPAR' :
				if ($ok == 15) {
					$dados = $this -> ic_pareceres -> le($id);
					$dados = array_merge($dados, $dados2);
					$nota = get('dd9');
					$proto = $dados['pp_protocolo'];
					$this -> ic_pareceres -> finaliza_nota_ic($proto, $nota);

					$aluno = $this -> usuarios -> le_cracha($dados['ic_cracha_aluno']);

					/* gera PDF */
					$file_local = $this -> ic_pareceres -> gera_parecer('RPAR', $dados);
					$anexos = array($file_local);

					/* Envia e-mail */
					$txt = $this -> mensagens -> busca('RPAR_RESULT_' . get("dd9"), $dados);

					$ass = $txt['nw_titulo'];
					$texto = $txt['nw_texto'];
					$prof_id = $dados['prof_id'];

					/* troca */
					$texto = troca($texto, '$aluno', $aluno['us_nome']);
					enviaremail_usuario($prof_id, $ass, $texto, 2, $anexos);

					/* Finaliza avaliacao */
					$this -> ic_pareceres -> finaliza_avaliacao($id);

					$data['volta'] = base_url('index.php/avaliador');
					$this -> load -> view('sucesso', $data);
					return ('');
				} else {
					if (strlen($acao) > 0) {
						echo '<script> alert("Existe campos não preenchidos!"); </script>';
					}
				}
				break;
			case 'RPRC' :
				if ($ok == 4) {
					$dados = $this -> ic_pareceres -> le($id);
					$dados = array_merge($dados, $dados2);
					$nota = get('dd9');
					$proto = $dados['pp_protocolo'];
					$this -> ic_pareceres -> finaliza_nota_ic($proto, $nota,'RPRC');

					$aluno = $this -> usuarios -> le_cracha($dados['ic_cracha_aluno']);

					/* gera PDF */
					$file_local = $this -> ic_pareceres -> gera_parecer('RPRC', $dados);
					$anexos = array($file_local);

					/* Envia e-mail */
					$txt = $this -> mensagens -> busca('RPAR_RESULT_' . get("dd9"), $dados);

					$ass = $txt['nw_titulo'];
					$texto = $txt['nw_texto'];
					$prof_id = $dados['prof_id'];

					/* troca */
					$texto = troca($texto, '$aluno', $aluno['us_nome']);
					enviaremail_usuario($prof_id, $ass, $texto, 2, $anexos);

					/* Finaliza avaliacao */
					$this -> ic_pareceres -> finaliza_avaliacao($id);

					$data['volta'] = base_url('index.php/avaliador');
					$this -> load -> view('sucesso', $data);
					return ('');
				} else {
					if (strlen($acao) > 0) {
						echo '<script> alert("Existe campos não preenchidos!"); </script>';
					}
				}
				break;				
			default :
				echo 'OPS - '.$tipo;
				exit ;
		}

		switch ($tipo) {
			case 'RPAR' :
				$this -> load -> view('ic/avaliacao_rpar', $data);
				break;
			case 'RPRC' :
				$this -> load -> view('ic/avaliacao_rprc', $data);
				break;				
		}
	}

	function zera_convite_avaliador() {
		$this -> load -> model('avaliadores');
		$this -> cab();

		$cp = array();
		array_push($cp, array('$H8', '', '', False, True));
		array_push($cp, array('$O 1:SIM', '', 'Confirma zerar?', False, True));
		array_push($cp, array('$M', '', '<hr>', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', 'Selecionar todos Orientador <b>Doutores</b> com IC?', False, True));
		array_push($cp, array('$O 1:SIM&0:NÃO', '', 'Selecionar todos Orientador <b>Mestres</b> com IC?', False, True));
		array_push($cp, array('$B8', '', 'Processar >>>', False, True));
		$form = new form;
		$tela = $form -> editar($cp, '');

		if ($form -> saved > 0) {
			/* Fase I */
			$tela = '';
			if (get("dd1") == '1') {
				$tela .= '<h2>Zerando indicação de avaliador ....</h2>';
				$this -> avaliadores -> zera_avaliadores();
			}
			if (get("dd3") == '1') {
				$tela .= '<h2>Selecionando prof. Doutores com IC....</h2>';
				$tela .= $this -> avaliadores -> ativa_dr_com_ic_avaliadores() . ' selecionados';
			}
			$data['title'] = 'Base de avaliadores';
			$data['content'] = $tela;
			$this -> load -> view('content', $data);

		} else {
			$data['title'] = 'Base de avaliadores';
			$data['content'] = $tela;
			$this -> load -> view('content', $data);
		}
	}

	function avaliador_status_alterar($id = 0, $st = '') {
		$this -> load -> model('usuarios');
		$this -> load -> model('avaliadores');
		switch($st) {
			case 'ACTIVE' :
				$this -> avaliadores -> avaliador_ativar($id);
				break;
			case 'DESACTIVE' :
				$this -> avaliadores -> avaliador_desativar($id);
				break;
		}
		$data = $this -> usuarios -> le($id);
		$data['us_avaliador'] = '';
		$this -> load -> view('avaliador/perfil_ativo', $data);
		echo ' <meta http-equiv="refresh" content="0">';
	}

	function view($id = 0) {
		$this -> load -> model('usuarios');
		$this -> load -> model('ics');
		$this -> load -> model('avaliadores');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> load -> model('ic_pareceres');

		$this -> cab();
		$data = array();

		$data = $this -> usuarios -> le($id);
		$this -> usuarios -> mostra_prefil($data);

		$data['areas'] = $this -> avaliadores -> avaliador_area($id);
		$data['areas_inclusao'] = $this -> load -> view('avaliador/form_area_associar', $data, True);
		$data['resumo_avaliacao'] = $this -> ic_pareceres -> avaliacoes_avaliador($id);

		$this -> load -> view('avaliador/perfil_resumo', $data);
		$this -> load -> view('avaliador/perfil_ativo', $data);
		$this -> load -> view('avaliador/perfil_ativo_js', $data);

		if ($data['us_avaliador'] > 0) {
			$this -> load -> view('avaliador/perfil_areas', $data);
		}

		$data['content'] = $this -> ic_pareceres -> lista_de_avaliacoes($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

}
?>