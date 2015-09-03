<?php
class avaliador extends CI_Controller {
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
		/* Security */
		$this -> security();
	}
	
	function ajax_change($id=0,$idr=0,$acao='')
		{
			$data = date('Ymd');
			/************* AJAX ATIVAR / DESATIVAR */
			$sql = "select * from us_avaliador_area where id_pa = ".$idr;
			$rlt = db_query($sql);
			
			if ($line = db_read($rlt))
				{
					$ativo = $line['pa_ativo'];
				} else {
					echo 'ERRO';
					return('');
				}
				
			switch ($ativo)
				{
				case '1':
					$acao = msg('inativo');
					$class = 'bt_desativado';
					$sql = "update us_avaliador_area set  pa_ativo = 0, pa_update = '$data' where id_pa = ".round($idr);
					$this->db->query($sql);
					break;
				default:
					$acao = msg('ativo');
					$class = 'bt_acao';
					$sql = "update us_avaliador_area set  pa_ativo = 1, pa_update = '$data' where id_pa = ".round($idr);
					$this->db->query($sql);					
					break;
				}
			
			
			echo '<div class="'.$class.'"><b>'.$acao.'</b></div>';
		}

	function security() {

		/* SeguranCa */
		$this -> load -> model('login/josso_login_pucpr');
		$this -> josso_login_pucpr -> security();
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

	function index() {
		$this -> cab();
		$data = array();
		$this -> load -> view('header/content_open');


		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	function view($id=0)
		{
		$this->load->model('usuarios');
		$this->load->model('ics');
		$this->load->model('avaliadores');
		$this->load->model('semic/semic_trabalhos');
		
		$this -> cab();
		$data = array();
		
		$data = $this->usuarios->le($id);		

		$this -> load -> view('perfil/docente',$data);
		
		$data['areas'] = $this->avaliadores->avaliador_area($id);
		$this -> load -> view('avaliador/perfil_areas',$data);
		$this -> load -> view('avaliador/perfil_resumo',$data);
		
		
		$data['content'] = $this->ics->lista_ic_professor($id);
		$this -> load -> view('content',$data);
		
		/* Dados de apresentacao */
		$data['semic'] = $this->semic_trabalhos->lista_trabalhos($data['us_cracha']);
		$this -> load -> view('content',$data);	

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
		}

}
?>