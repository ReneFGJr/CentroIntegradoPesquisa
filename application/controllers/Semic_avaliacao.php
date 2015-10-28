<?php
class semic_avaliacao extends CI_Controller {
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
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function poster($id, $chk) {
		$avaliador = $_SESSION['id'];

		$this -> cab();
		if (!checkpost($id, $chk)) {
			/* Load Models */
			$this -> load -> model('usuarios');
			$this -> load -> model('semic/semic_avaliacoes');
			$this -> load -> model('semic/semic_trabalhos');
			$this -> load -> model('semic/semic_anais');
			$this -> load -> model('semic/semic_salas');
			$this -> semic_avaliacoes -> security();

			$data = $this -> semic_trabalhos -> le($id);
			//print_r($data);
			$data['ref'] = $this -> semic_salas -> referencia($data);

			$data['title'] = 'Avaliação Pôster - ' . $data['ref'];
			$data['erro'] = '';
			
			$data['back'] = base_url('index.php/semic_avaliacao/bloco/'.$data['st_bloco_poster'].'/'.checkpost_link($data['st_bloco_poster']));
			$this -> load -> view('semic/avaliacao/cab_works', $data);

			$codigo = $data['st_codigo'];
			
			$data['title'] = '';
			$mapa = 1;
			$data['content'] = $this->semic_anais ->resumo_title($data['st_codigo'],$mapa);
			$this -> load -> view('content', $data);
			

			/* Recupera ID da avaliacao */
			$idpp = $this -> semic_avaliacoes -> recupera_avaliacao($codigo, $avaliador, 'SEMIC', 'POSTE');

			$data['title'] = '';
			$data['idpp'] = $idpp;
			$data['avaliador'] = $avaliador;
			$data['content'] = $this -> load -> view('semic/avaliacao/ficha_poster', $data, True);
			$this -> load -> view('content', $data);
			
			$data['title'] = '';
			$data['ala'] = $data['st_bloco_poster_ala'];
			$data['dia'] = $data['sb_data'].' '.$data['sb_hora'].'-'.$data['sb_hora_fim'];
			$this -> load -> view('semic/semic_localizacao_poster.php', $data);			
			
			$data['title'] = '';
			$data['content'] = $this->semic_anais ->resumo_body($data['st_codigo']);
			$this -> load -> view('content', $data);

		} else {
			$this -> load -> view("header/999");
		}
	}

	function je($id, $chk) {
		$avaliador = $_SESSION['id'];

		$this -> cab();
		if (!checkpost($id, $chk)) {
			/* Load Models */
			$this -> load -> model('usuarios');
			$this -> load -> model('semic/semic_avaliacoes');
			$this -> load -> model('semic/semic_trabalhos');
			$this -> load -> model('semic/semic_anais');
			$this -> load -> model('semic/semic_salas');
			$this -> semic_avaliacoes -> security();

			$data = $this -> semic_trabalhos -> le($id);
			//print_r($data);
			$data['ref'] = $this -> semic_salas -> referencia($data);

			$data['title'] = 'Avaliação Jovens Ideias & Pesquisa é Evoluir - ' . $data['ref'];
			$data['erro'] = '';
			
			$data['back'] = base_url('index.php/semic_avaliacao/bloco/'.$data['st_bloco'].'/'.checkpost_link($data['st_bloco']));
			$this -> load -> view('semic/avaliacao/cab_works', $data);

			$codigo = $data['st_codigo'];
			
			$data['title'] = '';
			$data['content'] = $this->semic_anais ->resumo_title($data['st_codigo']);
			$this -> load -> view('content', $data);
			

			/* Recupera ID da avaliacao */
			$idpp = $this -> semic_avaliacoes -> recupera_avaliacao($codigo, $avaliador, 'SEMIC','JE');

			$data['title'] = '';
			$data['idpp'] = $idpp;
			$data['avaliador'] = $avaliador;
			$data['content'] = $this -> load -> view('semic/avaliacao/ficha_pe', $data, True);
			$this -> load -> view('content', $data);
			
			$data['title'] = '';
			$data['content'] = $this->semic_anais ->resumo_body($data['st_codigo']);
			$this -> load -> view('content', $data);

		} else {
			$this -> load -> view("header/999");
		}
	}


	function oral($id, $chk) {
		$avaliador = $_SESSION['id'];

		$this -> cab();
		if (!checkpost($id, $chk)) {
			/* Load Models */
			$this -> load -> model('usuarios');
			$this -> load -> model('semic/semic_avaliacoes');
			$this -> load -> model('semic/semic_trabalhos');
			$this -> load -> model('semic/semic_anais');
			$this -> load -> model('semic/semic_salas');
			$this -> semic_avaliacoes -> security();

			$data = $this -> semic_trabalhos -> le($id);
			//print_r($data);
			$data['ref'] = $this -> semic_salas -> referencia($data);

			$data['title'] = 'Avaliação Oral - ' . $data['ref'];
			$data['erro'] = '';
			
			$data['back'] = base_url('index.php/semic_avaliacao/bloco/'.$data['st_bloco'].'/'.checkpost_link($data['st_bloco']));
			$this -> load -> view('semic/avaliacao/cab_works', $data);

			$codigo = $data['st_codigo'];
			
			$data['title'] = '';
			$data['content'] = $this->semic_anais ->resumo_title($data['st_codigo']);
			$this -> load -> view('content', $data);
			

			/* Recupera ID da avaliacao */
			$idpp = $this -> semic_avaliacoes -> recupera_avaliacao($codigo, $avaliador, 'SEMIC','ORAL');

			$data['title'] = '';
			$data['idpp'] = $idpp;
			$data['avaliador'] = $avaliador;
			$data['content'] = $this -> load -> view('semic/avaliacao/ficha_oral', $data, True);
			$this -> load -> view('content', $data);
			
			$data['title'] = '';
			$data['content'] = $this->semic_anais ->resumo_body($data['st_codigo']);
			$this -> load -> view('content', $data);

		} else {
			$this -> load -> view("header/999");
		}
	}

	function avaliador($id, $check) {
		/* Load Models */
		$ano = (date("Y") - 1);
		$this -> load -> model('usuarios');
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> model('semic/semic_trabalhos');

		$this -> cab();
		$data = array();
		$data['title'] = 'Perfil do Avaliador';
		$data['erro'] = '';
		$this -> load -> view('semic/avaliacao/cab_works', $data);

		$data['title'] = '';
		$data['content'] = '<table width="1024" align="center"><tr><td>';
		$this -> load -> view('content', $data);

		$data = $this -> usuarios -> le($id);
		$this -> load -> view('perfil/avaliador_mini', $data);

		$data['content'] = '</table>';
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_trabalhos -> mostra_agenda_pessoal($id, $ano);
		$this -> load -> view('content', $data);

		$this -> load -> view('semic/avaliacao/user_guide');
	}

	function avaliadores_row() {
		/* Load Models */
		$ano = (date("Y") - 1);
		$this -> load -> model('usuarios');
		$this -> load -> model('semic/semic_avaliacoes');

		$this -> cab();
		$data = array();
		$data['title'] = 'Lista de Avaliadores';
		$data['erro'] = '';
		$this -> load -> view('semic/avaliacao/cab_works', $data);

		$data['title'] = '';
		$data['content'] = $this -> semic_avaliacoes -> avaliadores_row($ano);
		$this -> load -> view('content', $data);
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab_semic_2015.css');
		array_push($css, 'style_semic_2015.css');
		array_push($css, 'form_sisdoc.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();

		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}

	function bloco($id, $chk) {
		$this -> cab();
		$avaliador = $_SESSION['id'];
		if (!checkpost($id, $chk)) {
			/* Load Models */
			$this -> load -> model('usuarios');
			$this -> load -> model('semic/semic_avaliacoes');
			$this -> load -> model('semic/semic_trabalhos');
			$this -> load -> model('semic/semic_salas');
			$this -> semic_avaliacoes -> security();

			$data['title'] = 'Avaliação';
			$data['erro'] = '';
			$data['back'] = base_url('index.php/semic_avaliacao/works');
			$this -> load -> view('semic/avaliacao/cab_works', $data);

			$data = $this -> semic_trabalhos -> le_bloco($id, $avaliador);
			$bloco = $id;			

			/* TB - Tipo de bloco */
			$tb = $data['sb_tipo'];
			switch($tb) {
				case '1' :
					$this->load->view('semic/avaliacao/dados_do_bloco',$data);
					$data['content'] = $this -> semic_avaliacoes -> lista_trabalhos_avaliador_oral($avaliador, $bloco);
					break;
				case '2' :
					$this->load->view('semic/avaliacao/dados_do_bloco',$data);
					$data['content'] = $this -> semic_avaliacoes -> lista_trabalhos_avaliador_poster($avaliador, $bloco);
					break;					
			}
			$data['title'] = '';
			$this -> load -> view('content', $data);

		} else {
			$this -> load -> view("header/999");
		}
	}

	function works($id = 0) {
		$id = $_SESSION['id'];

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('semic/semic_avaliacoes');
		$this -> load -> model('semic/semic_trabalhos');
		$this -> semic_avaliacoes -> security();

		$ano = (date("Y") - 1);

		$this -> cab();
		$data = array();
		$data['title'] = 'Perfil do Avaliador';
		$data['erro'] = '';
		$this -> load -> view('semic/avaliacao/cab_works', $data);

		$data['title'] = '';
		$data['content'] = '<table width="980" align="center"><tr><td>';
		$this -> load -> view('content', $data);

		$data = $this -> usuarios -> le($id);
		$this -> load -> view('perfil/avaliador_mini', $data);

		$data['content'] = '</table>';
		$this -> load -> view('content', $data);

		$data['content'] = $this -> semic_trabalhos -> mostra_agenda_pessoal($id, $ano);
		$this -> load -> view('content', $data);

		$this -> load -> view('semic/avaliacao/user_guide');

	}

	function index($id = 0) {

		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('semic/semic_avaliacoes');

		$this -> cab();
		$data = array();
		$data['title'] = 'Identificação do Avaliador';
		$data['erro'] = '';
		$acao = $this -> input -> post("acao");
		$dd1 = sonumero($this -> input -> post("dd1"));

		if (strlen($acao) > 0) {
			if (strlen($dd1) == 0) {
				/* Número vazio */
				$data['erro'] = 'O ID é obrigatório';
			} else {
				/* Valida Nr Avalaidor */
				$idu = round(substr($dd1, 0, strlen($dd1) - 1)) / 3;
				$dva = substr($dd1, strlen($dd1) - 1, 1);

				$idc = $this -> semic_avaliacoes -> avaliador_id($idu);
				$dvb = substr($idc, strlen($idc) - 1, 1);
				if ($dvb != $dva) {
					$data['erro'] = 'ID do Avaliador inválido!';
				} else {
					$ln = $this -> usuarios -> le($idu);
					if (count($ln) > 0) {
						$avaliador = $ln['us_avaliador'];
						$id = $ln['id_us'];
						$nome = $ln['us_nome'];

						if ($avaliador > 0) {
							$this -> semic_avaliacoes -> set_avaliador($id, $nome);
							redirect(base_url('index.php/semic_avaliacao/works'));
						} else {
							$data['erro'] = 'ID do Avaliador não habilitado!';
						}
					} else {
						$data['erro'] = 'ID do Avaliador Inválido!';
					}
				}
			}
		}

		$this -> load -> view('semic/avaliacao/cab_id', $data);
	}

}
?>
