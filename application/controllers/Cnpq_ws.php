<?php
class cnpq_ws extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> library("nuSoap_lib");
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> library('session');
		$this -> load -> helper('tcpdf');

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */
		$this -> load -> model('usuarios');
		$this -> usuarios -> security();
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
		array_push($js, 'high/highcharts.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Menu */
		$menus = array();
		array_push($menus, array('Home', 'index.php/cnpq_ws/'));

		/* Carrega Menu*/
		$data['menu'] = 1;
		$data['menus'] = $menus;

		/* Monta telas Padrao da IC*/
		$this -> load -> view('header/header', $data);
		$data['title_page'] = 'CNPq - WebService';
		$data['menu'] = 1;
		$this -> load -> view('header/cab', $data);

		/* Adiciona logo da IC*/
		$this -> load -> view('header/content_open');
		$data['logo'] = base_url('img/logo/logo_cnpq_2016.png');
		$this -> load -> view('header/logo', $data);

	}

	function index() {
		$this -> cab();
		$menu = array();
		$sx = '<a href="' . base_url('index.php/cnpq_ws/get_xml') . '">Get XML</a>';
		$sx .= '<br>';
		$sx .= '<a href="' . base_url('index.php/cnpq_ws/get_update') . '">Get update</a>';
		$sx .= '<br>';
		$sx .= '<a href="' . base_url('index.php/cnpq_ws/harvesting_ppgs/0/1/0') . '">Coleta todos os professores dos PPGs</a>';
		$data['content'] = $sx;
		$this -> load -> view('content', $data);
	}

	function get_xml($id = '3483667901818921') {
		/* Load Models */
		$this -> load -> model('webservice/ws_cnpq');

		$this -> cab();
		$data = array();

		$data['content'] = 'Atualizado em: ' . $this -> ws_cnpq -> getCurriculoCompactado($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function get_update($id = '3483667901818921') {
		/* Load Models */
		$this -> load -> model('webservice/ws_cnpq');

		$this -> cab();
		$data = array();

		$data['content'] = 'Atualizado em: ' . $this -> ws_cnpq -> getDataAtualizacaoCV($id);
		$this -> load -> view('content', $data);

		$this -> load -> view('header/content_close');
		$this -> load -> view('header/foot', $data);
	}

	function harvesting_ppg($id = 0, $force = 0, $page = 0) {
		$this -> load -> model("stricto_sensus");
		$this -> load -> model('webservice/ws_cnpq');

		$ss = $this -> stricto_sensus -> le($id);
		if ($force == 1)
			{
				$sql = " select distinct us_nome, id_us, us_lattes_update, us_link_lattes, us_ativo, us_cpf, us_nome_lattes
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
 					where programa_pos_id_pp = $id and us_ativo = 1 and sspp_ativo = 1
 					order by us_nome, id_us
 					 ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				
				for ($r=0;$r < count($rlt);$r++)
					{
						$line = $rlt[$r];
						$id_us = $line['id_us'];
						$situacao = '0000-00-00';
						$sql = "update us_usuario set us_lattes_update = '" . $situacao . "' where id_us = " . $id_us;
						$this -> db -> query($sql);
						
					}	
				$page = '1';
				$force = '0';
				redirect(base_url('index.php/cnpq_ws/harvesting_ppg/'.$id.'/'.$force.'/'.$page));			
			}
		
		$this -> cab();
		$sql = " select distinct us_nome, id_us, us_lattes_update, us_link_lattes, us_ativo, us_cpf, us_nome_lattes
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
 					where programa_pos_id_pp = $id and us_ativo = 1 and sspp_ativo = 1
 					order by us_nome, id_us
 					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table class="tabela01 lt1" width="100%">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$lattes = sonumero($line['us_link_lattes']);
			$nome_lattes = sonumero($line['us_nome_lattes']);
			if (strlen($nome_lattes) == 0) {
				$nome_lattes = UpperCaseSql($line['us_nome']);
				$sql = "update us_usuario set us_nome_lattes = '$nome_lattes' where id_us = " . $line['id_us'];
				$ttt = $this -> db -> query($sql);
			}

			$id_us = $line['id_us'];
			$situacao = $this -> ws_cnpq -> getDataAtualizacaoCV($lattes);
			$cpf = $line['us_cpf'];

			$sx .= '<tr>';
			$sx .= '<td>' . link_perfil($nome_lattes, $id_us, $line) . '</td>';
			$sx .= '<td align="center">' . trim($line['us_link_lattes']) . '</td>';
			$sx .= '<td align="center">' . stodbr($line['us_lattes_update']) . '</td>';
			$sx .= '<td align="center">' . $lattes . '</td>';
			$sx .= '<td>' . $situacao . '</td>';
			if (($force==1) or ($situacao != $line['us_lattes_update'])) 
				{
				$sx .= '<td><font color="green">Atualizando...</td>';
				$ok = $this -> ws_cnpq -> getCurriculoCompactado($lattes);
				if ($ok == 1) {
					$file = '_document/lattes/' . $lattes . '.xml';
					$this -> ws_cnpq -> xml_artigos($file, $cpf, $nome_lattes);
					$sql = "update us_usuario set us_lattes_update = '" . $situacao . "' where id_us = " . $id_us;
					$this -> db -> query($sql);
					
					$data['content'] = '<h3>Atualizado <b>'.$nome_lattes.'</b></h3><br>Aguarde ....';
					$data['content'] .= '<meta http-equiv="refresh" content="5">';
					$this->load->view('content',$data);	
					return('');
				}
			} else {
				$sx .= '<td><font color="blue">Atualizado</td>';
			}
			$sx .= '</tr>';
		}
		$sx .= '</table>';

		$data['content'] = $sx;
		$this -> load -> view('content', $data);
		//us_lattes_update
	}

	function harvesting_ppgs($id = 0, $force = 0, $page = 0) {
		$this -> load -> model("stricto_sensus");
		$this -> load -> model('webservice/ws_cnpq');

		if ($force == 1)
			{
				$sql = " select distinct us_nome, id_us, us_lattes_update, us_link_lattes, us_ativo, us_cpf, us_nome_lattes
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
 					where us_ativo = 1 and sspp_ativo = 1
 					order by us_nome, id_us
 					 ";
				$rlt = $this -> db -> query($sql);
				$rlt = $rlt -> result_array();
				
				for ($r=0;$r < count($rlt);$r++)
					{
						$line = $rlt[$r];
						$id_us = $line['id_us'];
						$situacao = '0000-00-00';
						$sql = "update us_usuario set us_lattes_update = '" . $situacao . "' where id_us = " . $id_us;
						$this -> db -> query($sql);
						
					}	
				$page = '1';
				$force = '0';
				redirect(base_url('index.php/cnpq_ws/harvesting_ppgs/'.$id.'/'.$force.'/'.$page));			
			}
		
		$this -> cab();
		$sql = " select distinct us_nome, id_us, us_lattes_update, us_link_lattes, us_ativo, us_cpf, us_nome_lattes
					 FROM ss_professor_programa_linha 
						LEFT JOIN us_usuario ON us_usuario_id_us = id_us
 					where us_ativo = 1 and sspp_ativo = 1
 					order by us_nome, id_us
 					 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<table class="tabela01 lt1" width="100%">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$lattes = sonumero($line['us_link_lattes']);
			$nome_lattes = sonumero($line['us_nome_lattes']);
			if (strlen($nome_lattes) == 0) {
				$nome_lattes = UpperCaseSql($line['us_nome']);
				$sql = "update us_usuario set us_nome_lattes = '$nome_lattes' where id_us = " . $line['id_us'];
				$ttt = $this -> db -> query($sql);
			}

			$id_us = $line['id_us'];
			$situacao = $this -> ws_cnpq -> getDataAtualizacaoCV($lattes);
			$cpf = $line['us_cpf'];

			$sx .= '<tr>';
			$sx .= '<td>' . link_perfil($nome_lattes, $id_us, $line) . '</td>';
			$sx .= '<td align="center">' . trim($line['us_link_lattes']) . '</td>';
			$sx .= '<td align="center">' . stodbr($line['us_lattes_update']) . '</td>';
			$sx .= '<td align="center">' . $lattes . '</td>';
			$sx .= '<td>' . $situacao . '</td>';
			if (($force==1) or ($situacao != $line['us_lattes_update'])) 
				{
				$sx .= '<td><font color="green">Atualizando...</td>';
				$ok = $this -> ws_cnpq -> getCurriculoCompactado($lattes);
				if ($ok == 1) {
					$file = '_document/lattes/' . $lattes . '.xml';
					$this -> ws_cnpq -> xml_artigos($file, $cpf, $nome_lattes);
					$sql = "update us_usuario set us_lattes_update = '" . $situacao . "' where id_us = " . $id_us;
					$this -> db -> query($sql);
					
					$data['content'] = '<h3>Atualizado <b>'.$nome_lattes.'</b></h3><br>Aguarde ....';
					$data['content'] .= '<meta http-equiv="refresh" content="5">';
					$this->load->view('content',$data);	
					return('');
				}
			} else {
				$sx .= '<td><font color="blue">Atualizado</td>';
			}
			$sx .= '</tr>';
		}
		$sx .= '</table>';

		$data['content'] = $sx;
		$this -> load -> view('content', $data);
		//us_lattes_update
	}

	function coletar($id = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_cnpq');
		$this -> load -> model('phplattess');

		$user = $this -> usuarios -> le($id);

		$lattes = sonumero($user['us_link_lattes']);
		$nome = $user['us_nome'];
		$cpf = $user['us_cpf'];
		$ok = $this -> ws_cnpq -> getCurriculoCompactado($lattes);
		if ($ok == 1) {
			$this -> ws_cnpq -> xml_artigos('_document/lattes/' . $lattes . '.xml', $cpf, $nome);
		}
	}
	function harvesting($id = 0) {
		/* Load Models */
		$this -> load -> model('usuarios');
		$this -> load -> model('webservice/ws_cnpq');
		$this -> load -> model('phplattess');

		$user = $this -> usuarios -> le($id);

		$lattes = sonumero($user['us_link_lattes']);
		$nome = $user['us_nome'];
		$cpf = $user['us_cpf'];
		$ok = $this -> ws_cnpq -> getCurriculoCompactado($lattes);
		if ($ok == 1) {
			$this -> ws_cnpq -> xml_artigos('_document/lattes/' . $lattes . '.xml', $cpf, $nome);
			echo "OK!";
		} else {
			echo 'OPS '.$user['us_link_lattes'];
		}
	}	
}
?>