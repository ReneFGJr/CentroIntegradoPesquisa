<?php
class Ajax extends CI_Controller {

	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> database();
		$this -> lang -> load("app", "portuguese");

		$this -> load -> helper('links_users');
		$this -> load -> helper('url');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> library("nuSoap_lib");
		

		date_default_timezone_set('America/Sao_Paulo');
	}
	
	function aceite($id='',$rsp='',$chk='')
		{
			$this->load->model('usuarios');
			$this->load->model('avaliadores');
			
			$this->load->view('header/header',null);
			
			$chk2 = checkpost_link($id);
			if ($chk2 == $chk)
				{
					$txt = '<center>';
					$data['content'] = $txt;
					
					$this->load->view('content',$data);
					
					$data = $this->usuarios->le($id);
					$this->load->view('perfil/user',$data);
					
					$sql = "update us_usuario set us_avaliador = '".$rsp."' where id_us = ".round($id);
					$rlt = $this->db->query($sql);
					
					if ($rsp == 1)
						{
							$txt = '<h1><font color="green">Obrigado pelo aceite! Em breve entraremos em contato!</font></h1>';
							$data['content'] = $txt;					
							$this->load->view('content',$data);							
						} else {
							$txt = '<h1><font color="blue">Obrigado pela resposta!</font></h1>';
							$txt .= '<p>Esperamos que nos próximos anos possamos contar com sua participação!</p>';
							$data['content'] = $txt;					
							$this->load->view('content',$data);							
						}
				}
		}	
	
	function index()
		{
			echo "MODULO AJAX";
		}

	function submit_ajax_equipe_excluir($idp = '', $ida = 0) {
		$this -> load -> model('ics');
		$this -> ics -> equipe_membro_excluir($ida);

		$data['content'] = $this -> ics -> lista_equipe_projeto_lista($idp) . ' ' . date("Y:m:d H:i:s");
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

}
?>