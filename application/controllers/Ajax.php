<?php
class Ajax extends CI_Controller {

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
		$this -> load -> helper('tcpdf');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function edital($id, $chk = '', $id_us = 0) {
		$this -> load -> model('fomento_editais');
		$id = round($id);
		$id_us = round($id_us);

		$edital = $this -> fomento_editais -> le($id);
		$this -> fomento_editais -> incrementa_download($id, $id_us);

		$url_externa = $edital['ed_url_externa'];
		redirect($url_externa);
	}

	function edital_lido($id, $chk = '', $id_us = 0) {
		$this -> load -> model('fomento_editais');
		$id = round($id);
		$id_us = round($id_us);

		$edital = $this -> fomento_editais -> le($id);
		$this -> fomento_editais -> incrementa_leitura($id, $id_us);

		$im = imagecreatefrompng('img/sele_email.png');

		header('Content-Type: image/png');
		imagepng($im);
		imagedestroy($im);
	}

	function aceite($id = '', $rsp = '', $chk = '') {
		$this -> load -> model('usuarios');
		$this -> load -> model('avaliadores');

		$this -> load -> view('header/header', null);

		$chk2 = checkpost_link($id);
		if ($chk2 == $chk) {
			$txt = '<center>';
			$data['content'] = $txt;

			$this -> load -> view('content', $data);

			$data = $this -> usuarios -> le($id);
			$this -> load -> view('perfil/user', $data);

			$sql = "update us_usuario set us_avaliador = '" . $rsp . "' where id_us = " . round($id);
			$rlt = $this -> db -> query($sql);

			if ($rsp == 1) {
				$txt = '<h1><font color="green">Obrigado pelo aceite! Em breve entraremos em contato!</font></h1>';
				$data['content'] = $txt;
				$this -> load -> view('content', $data);
			} else {
				$txt = '<h1><font color="blue">Obrigado pela resposta!</font></h1>';
				$txt .= '<p>Esperamos que nos próximos anos possamos contar com sua participação!</p>';
				$data['content'] = $txt;
				$this -> load -> view('content', $data);
			}
		}
	}

	function index() {
		echo "MODULO AJAX";
	}

	function submit_ajax_equipe_excluir($idp = '', $ida = 0) {
		$this -> load -> model('ics');
		$this -> ics -> equipe_membro_excluir($ida);

		$data['content'] = $this -> ics -> lista_equipe_projeto_lista($idp) . ' ' . date("Y:m:d H:i:s");
		$this -> load -> view('content', $data);
	}

	function submit_ajax_equipe_nome($proto = '') {
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$sx = '';

		$lock = 0;
		$nome = utf8_decode(get("name"));
		$cpf = get("cpf");
		$escola = utf8_decode(get("email"));
		$cracha = '';

		$this -> ics -> incluir_membro_na_equipe($proto, $nome, $cpf, $cracha, $escola, $lock);

		$data['content'] = $this -> ics -> lista_equipe_projeto_lista($proto) . ' ' . date("Y:m:d H:i:s");
		$this -> load -> view('content', $data);
	}

	function submit_ajax_equipe($proto = '', $cracha) {
		$this -> load -> model('ics');
		$this -> load -> model('usuarios');
		$sx = '';

		$user = $this -> usuarios -> le_cracha($cracha);

		if (count($user) == 0) {
			echo '<HR>CONSULTA<hr>';
			$cracha2 = $this -> usuarios -> consulta_cracha($cracha);
		} else {
			$cracha2 = $user['us_cracha'];
		}

		if (strlen($cracha2) > 0) {
			$user = $this -> usuarios -> le_cracha($cracha2);
			$lock = 0;
			$nome = $user['us_nome'];
			$cpf = $user['us_cpf'];
			$cracha = $user['us_cracha'];
			$escola = $user['us_curso_vinculo'];

			$this -> ics -> incluir_membro_na_equipe($proto, $nome, $cpf, $cracha, $escola, $lock);
		} else {
			$sx .= '
				<script>
					alert("Codigo do Aluno não localizado");
				</script>
				';
			$data['content'] = $sx;
			$this -> load -> view('content', $data);
		}

		$data['content'] = $this -> ics -> lista_equipe_projeto_lista($proto) . ' ' . date("Y:m:d H:i:s");
		$this -> load -> view('content', $data);

	}

	function ic($parm1 = '', $parm2 = '', $parm3 = '') {
		$this -> load -> model("ics");
		$proto = substr($parm2, 0, 7);
		
		$sql = "select * from ic_submissao_plano
					INNER JOIN us_usuario on doc_aluno = us_cracha 
					where doc_protocolo = '$proto' ";
		$rlt = $this->db->query($sql);
		$rlt = $rlt->result_array();
		
		if (count($rlt) == 0)
			{
				return('ERRO NO NÚMERO DO PROTOCOLO');
			}
		$line = $rlt[0];
		$aluno1 = $line['doc_aluno'];
		$obs = '';
		$nome = '<b>'.$line['us_nome'].'</b>';
		
		switch($parm1) {
			case 'ic_set_trabalha' :
				$tipo = substr($parm2, 7, 1);
				

				$aluno1 = '';
				$aluno2 = '';
				$motivo = '060';
				if ($parm3 == 'true') {
					$value = 1;
				} else {
					$value = 0;
				}

				if ($value == 1) {
					$hist = 'Informado que o aluno '.$nome.' trabalha';
					$ac = '060';
				} else {
					$hist = 'Informado que o aluno '.$nome.' NÃO trabalha';
					$ac = '061';					
				}				
				$sql = "update ic_submissao_plano set doc_icv = $value where doc_protocolo = '$proto' ";
				$this->db->query($sql);
				$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);
				$data = array();
				$data['ic_plano_aluno_codigo'] = $proto;
				$this->load->view('ic/plano_historico',$data);

				
				break;
			case 'ic_set_publico' :
				$tipo = substr($parm2, 7, 1);
				$proto = substr($parm2, 0, 7);

				$aluno1 = '';
				$aluno2 = '';
				$motivo = '062';
				
				if ($parm3 == 'true') {
					$value = 1;
				} else {
					$value = 0;
				}

				if ($value == 1) {
					$hist = 'Informado que o aluno '.$nome.' é de escola pública';
					$ac = '062';
				} else {
					$hist = 'Informado que o aluno '.$nome.' NÃO É de escola pública';
					$ac = '063';					
				}				
				$sql = "update ic_submissao_plano set doc_escola_publica = $value where doc_protocolo = '$proto' ";
				$this->db->query($sql);
				$this -> ics -> inserir_historico($proto, $ac, $hist, $aluno1, $aluno2, $motivo, $obs);
				
				$data = array();
				$data['ic_plano_aluno_codigo'] = $proto;
				$this->load->view('ic/plano_historico',$data);
								
				break;				
		}
		//$this->ics->set_plano_estudante
	}

}
?>