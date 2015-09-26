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
		$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab_semic_2015.css');
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

	function works($id=0)
		{
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('semic/semic_avaliacoes');

		$this -> cab();
		$data = array();
		$data['title'] = 'Identificação dos Trabalhos';
		$data['erro'] = '';
		$this -> load -> view('semic/avaliacao/cab_works', $data);
		
			
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
				$ln = $this -> usuarios -> le($dd1);
				if (count($ln) > 0) {
					$avaliador = $ln['us_avaliador'];
					$id = $ln['id_us'];
					$nome = $ln['us_nome'];
					
					if ($avaliador > 0) {
						$this->semic_avaliacoes->set_avaliador($id,$nome);
						redirect(base_url('index.php/semic_avaliacao/works'));
					} else {
						$data['erro'] = 'ID do Avaliador não habilitado!';
					}
				} else {
					$data['erro'] = 'ID do Avaliador Inválido!';
				}
			}
		}

		$this -> load -> view('semic/avaliacao/cab_id', $data);
	}

}
?>
