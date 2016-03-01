<?php
class ss extends CI_Controller {

	// Proprietário do e-mail
	var $id_own_pibic = 2;

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
	}
	
	function coordenador()
		{
		$this->load->model('artigos');
		$this->load->model('captacoes');
		$this->load->model('stricto_sensus');
		
		$cracha = $_SESSION['cracha'];

		$this -> cab('Coordenador de programa');
		$data = array();
		
		$id_us = $_SESSION['id_us'];
		if ($this->stricto_sensus->is_coordenador($id_us) == 0)
			{
				redirect(base_url('index.php/main'));
			}
		$tela['content'] = $this->stricto_sensus->lista_atividades_coordenador($id_us);
		$this->load->view('content',$tela);
		
		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
		}
	
	public function cab($title = '') {

		/* Security */
		$this -> load -> model('usuarios');
		$this -> load -> model('stricto_sensus');
		$this -> usuarios -> security();

		/* FALHA NO LOGIN */
		$cracha = $_SESSION['cracha'];
		if (strlen($cracha) == 0) {
			$us = $_SESSION['id_us'];
			$erro = 999;
			/* sessão finalizada pelo servidor */
			//$this->josso_login_pucpr->historico_insere_erro('',$erro,$us);
			$link = base_url('index.php/login');
			redirect($link);
		}

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;
		$data['cabtitle'] = $title;

		/* Menu */
		$menus = array();
		//array_push($menus, array('Home', 'index.php/ss'));
		
		/* COORDENADOR DE PROGRAMA */
		$id_us = $_SESSION['id_us'];
		if ($this->stricto_sensus->is_coordenador($id_us))
			{				
				array_push($menus, array('Validações', 'index.php/ss/coordenador'));		
			}
		
		array_push($menus, array('Meus Artigos', 'index.php/artigo/grants'));		
		array_push($menus, array('Minhas Captações', 'index.php/captacao/grants'));		


		/* Monta telas */
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'Stricto Sensu';
		$data['menu'] = 1;
		$data['menus'] = $menus;
		$this -> load -> view('header/cab', $data);
		$this -> load -> view('header/content_open');		
		$this -> load -> view('ss/index', $data);
	}	

	function le($id)
		{
			$sql = "select * from bonificacao where id_bn = ".round($id);
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result($rlt);
			if (count($rlt) > 0)
				{
					$rlt = $rlt[0];
				} else {
					$rlt = array();
				}
			return($rlt);
		}
	function isencoes()
		{
		$this->load->model('artigos');
		$this->load->model('isencoes');
		$this->load->model('captacoes');		
		$this->load->model('stricto_sensus');
		
		$this -> cab('Isenções <i>stricto sensu</i>');
		
		$cracha = $_SESSION['cracha'];
		$tela = $this->isencoes->lista_minhas_isencoes($cracha);
		$data['content'] = $tela;
		$this->load->view('content',$data);
		}
		
	function termo_gerar($id=0,$chk='')
		{
		$this -> load -> helper('tcpdf');
					
		$this->load->model('artigos');
		$this->load->model('isencoes');
		$this->load->model('captacoes');
		$this->load->model('usuarios');			
		$this->load->model('bonificacoes');
		
		$data = $this->isencoes->le($id);
				
		$data['txt'] = $this->load->view('isencoes/termo_modelo',$data, true);
		$this->load->view('isencoes/termo_pdf',$data);			
			
		}
		
	function indicar_isencao($id=0,$check='',$pag=1)
		{
		if ($pag < 1) { $pag = 1; }
		$this->load->model('artigos');
		$this->load->model('isencoes');
		$this->load->model('captacoes');
		$this->load->model('usuarios');			
		$this->load->model('stricto_sensus');
		
		$data = $this->isencoes->le($id);
		if ((count($data) == 0) or ($data['bn_status'] != '!'))
			{
				redirect(base_url('index.php/ss'));
			}
		
		$this -> cab('Indicar Isenção');
		$data = array();
		$bp = array();
		$bp[1] = 'Indicação do Aluno';
		$bp[2] = 'Confirmação do Aluno';
		$bp[3] = 'Impressão da Isenção';
		$bp[4] = 'Upload da Isenção';
		$bp[5] = 'Finalização';
		
		$data['bp_atual'] = round($pag);
		$data['bp_link'] = base_url('index.php/ss/indicar_isencao/' . $id . '/' . $check ). '/';	
		$data['bp'] = $bp;
		


		$form = new form;
		$form -> id = $id;
		
		$this->load->view('gadget/progessbar_horizontal.php',$data);
		
		switch ($pag)
			{
			case '1':
				$cp = $this->isencoes->cp_isencoes_01();
				$data['cracha'] = '';
				$tela = $form->editar($cp,'bonificacao');
				$data['content'] = $tela;
				$this->load->view('content',$data);
				break;
			case '2':
				$cp = $this->isencoes->cp_isencoes_02($id);
				$data['cracha'] = '';
				$tela = $form->editar($cp,'bonificacao');
				$data['content'] = $tela;
				$this->load->view('content',$data);
				break;
			case '3':
				$cp = $this->isencoes->cp_isencoes_03($id);
				$data['cracha'] = '';
				$tela = $form->editar($cp,'bonificacao');
				$data['content'] = $tela;
				$this->load->view('content',$data);
				break;
			case '4':
				$cp = $this->isencoes->cp_isencoes_04($id);
				$data['cracha'] = '';
				$tela = $form->editar($cp,'bonificacao');
				$data['content'] = $tela;
				$this->load->view('content',$data);
				break;	
			case '5':
				$cp = $this->isencoes->cp_isencoes_05($id);
				$data['cracha'] = '';
				$tela = $form->editar($cp,'bonificacao');
				$data['content'] = $tela;
				$this->load->view('content',$data);
				break;	
			case '6':
				$cp = $this->isencoes->altera_status($id,'A');
				$data['content'] = '<h1><font color="green">'.msg('successful').'</font></h1>';
				$this->load->view('content',$data);
				break;	
			}
		
		if ($form->saved > 0)
			{
				$pag++;
				redirect(base_url('index.php/ss/indicar_isencao/'.$id.'/'.checkpost_link($id).'/'.$pag));
			}						
		}
	public function index($id = 0) {
		$this->load->model('artigos');
		$this->load->model('isencoes');
		$this->load->model('captacoes');		
		$this->load->model('stricto_sensus');
		
		$cracha = $_SESSION['cracha'];

		$this -> cab('Programas de Pós-Graduação <i>stricto sensu</i>');
		$data = array();
		
		/* Recupera cracha */
		$cracha = $_SESSION['cracha'];
		$id_us = $_SESSION['id_us'];
		
		$txr = '';
		$txl = '';
		
		/* Resumo das Captacoes */
		$texto = '<a href="'.base_url('index.php/captacao/grants/').'" class="lt2 link">'.msg('captacao_ver_cadastro').'</a>'; /* Texto para visualizar todas as captacoes */
		$capt = $this -> captacoes -> resumo_projetos($cracha);
		$data = array_merge($data, $capt);
		$data['captacao_texto'] = $texto;
			
		/* Carrega Views */
		$capt_resumo = $this -> load -> view('perfil/perfil_captacoes', $data, True);
		$capt_lista = $capt['captacoes'];	
		
		/* Resumo de Artigos */
		$texto = '<a href="'.base_url('index.php/artigo/grants/').'" class="lt2 link">'.msg('artigo_ver_cadastro').'</a>'; /* Texto para visualizar todos os artigos */	
		$arti = $this->artigos->resumo_artigos($cracha);
		$data = array_merge($data, $arti);
		$data['artigo_texto'] = $texto;
		
		/* Carrega Views */
		$resumo_artigos = $this -> load -> view('perfil/perfil_artigos', $data, True);
		
		$data['content'] = $capt_resumo;
		$data['content'] .= $resumo_artigos;
		$txr .= $this->load->view('content',$data, true);
		
		/* Atividades do coordenador */
		if ($this->stricto_sensus->is_coordenador($id_us)==1)
			{	
			$atividade = $this->stricto_sensus->atividades_coordenador($id_us);
			$data['content'] = $atividade;
			$txl .= $this->load->view('content',$data, True);
			}
			
		
		/* Minhas isenções */
		$txr .= $this->isencoes->minhas_isencoes($cracha);
		
		$tela = '<table width="100%" border=0>';
		$tela .= '<tr valign="top">';
		$tela .= '<td>'.$txl.'</td>';
		$tela .= '<td width="300">'.$txr.'</td>';
		$tela .= '</tr>';
		$tela .= '</table>';
		
		$data['content'] = $tela;
		$this->load->view('content',$data);		

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}
	
	public function artigo($id = 0,$chk='',$pag=1) {
		$this->load->model('artigos');
		$cracha = $_SESSION['cracha'];

		$this -> cab();
		$data = array();
		$bp = array();
		array_push($bp,'DADOS');
		array_push($bp,'ESTRATOS');
		array_push($bp,'ARQUIVOS');
		array_push($bp,'FINALIZAÇÂO');
		$data['bp'] = $bp;
		$data['bp_atual'] = ($pag-1);
		$data['bp_link'] = base_url('index.php/ss/artigo/'.$id.'/'.checkpost_link($id).'/');
		$this->load->view('gadget/progessbar_horizontal.php',$data);
		
		/* Form */
		$form = new form;
		$form -> tabela = 'cip_artigo';
		$form -> id = $id;
		switch ($pag)
			{
			case '1':
				$cp = $this -> artigos -> cp_01();
				break;
			case '2':
				$cp = $this -> artigos -> cp_02();
				break;
			case '3':
				$cp = $this -> artigos -> cp_03();
				break;
			case '4':
				$cp = $this -> artigos -> cp_04();
				break;				
			default:
				$cp = array();
				break;
			}
		
		$data['content'] = $form -> editar($cp, $form -> tabela);

		/* salved */
		if ($form -> saved > 0) {
			redirect(base_url('index.php/indicadores/produtividade'));
		}

		$data['title'] = 'Cadastro de Artigos';
		$this -> load -> view('content', $data);		

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}	

}
?>