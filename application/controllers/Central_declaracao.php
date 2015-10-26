<?php
class central_declaracao extends CI_Controller {
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
		$this -> load -> helper('tcpdf');
		$this -> load -> library("nuSoap_lib");

		date_default_timezone_set('America/Sao_Paulo');
		/* Security */
		$this -> security();
	}

	function security() {

		/* Seguranca */

	}

	function cab() {
		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($css, 'form_sisdoc.css');
		array_push($css, 'style_central_declaracao');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');

		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		/* Monta telas */
		$this -> load -> view('header/header', $data);
	}

	function perfil() {
		/* load model */
		$this -> load -> model('usuarios');
		$this -> load -> model('evento/eventos');

		$this -> cab();
		$id = $this -> session -> userdata('cc_user');
		$id = round('0' . $id);
		if ($id == 0) {
			redirect(base_url('index.php/central_declaracao'));
		}
		$data = $this -> usuarios -> le($id);

		/* Gerar declaracoes automaticamente */
		/* Ouvinete SEMIC */
		$this -> eventos -> emitir('SEMIC', 'OUVINTE', date("Y"), $data);

		/* Avaliador SEMIC */
		$this -> eventos -> emitir('SEMIC', 'AVALIADOR', date("Y"), $data);

		/* Orientador IC */
		$this -> eventos -> emitir('SEMIC', 'ORIENTADOR', date("Y"), $data);

		/* Orientador IC */
		$this -> eventos -> emitir('SEMIC', 'ESTUDANTE', date("Y"), $data);

		$this -> load -> view("perfil/user", $data);
		$cracha = $data['us_cracha'];

		$data['content'] = $this -> eventos -> mostra_declaracoes($id);
		$this -> load -> view('content', $data);

	}

	function index($id = 0) {
		$this -> load -> model('usuarios');

		/* Load Models */
		$this -> cab();

		/* Dados do Usuario */
		$dd1 = $this -> input -> post("dd1");
		if (strlen($dd1) > 0) {
			if (validaCPF($dd1)) {
				/* Consulta por CPF */
				$line = $this -> usuarios -> readByCPF($dd1);
			} else {
				/* Consulta por Cracha */
				$dd1 = $this -> usuarios -> limpa_cracha($dd1);
				$line = $this -> usuarios -> readByCracha($dd1);
			}
			if (count($line) > 0) {
				$data = array('cc_user' => $line['id_us']);
				$this -> session -> set_userdata($data);
				redirect(base_url('index.php/central_declaracao/perfil/'));
			} else {
				$msg = 'Código ou CPF Inválido';
				/* Consulta dados da base */
				echo 'Consultando ' . $dd1;
				$this -> load -> model('webservice/ws_sga');
				$this -> ws_sga -> findStudentByCracha($dd1);

				redirect(base_url('index.php/central_declaracao/')).'?dd1='.$dd1;
				echo $msg;
			}
		}

		/* Mostra tela de login */
		if (strlen($dd1) == 0) {
			$this -> load -> view('central_certificado/central_certificado');
		}
	}

	/* Avaliador SEMIC */
	function declaracao($id = '', $check = '') {
		$sql = "select * from central_declaracao
					inner join central_declaracao_evento on id_cde = dc_tipo
					inner join (select us_nome as nome_1, id_us as id_us_1, us_genero as us_g1 from us_usuario) as user_1 on id_us_1 = dc_us_usuario_id 
					left join (select us_nome as nome_2, id_us as id_us_2, us_genero as us_g2 from us_usuario) as user_2 on id_us_2 = dc_us_usuario_id_2
					left join ic on ic_plano_aluno_codigo = dc_texto_1 
					inner join ic_aluno as pa on ic_id = id_ic
					left join ic_modalidade_bolsa as mode on mb_id = id_mb
					where id_dc = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		if (count($rlt)==0)
			{
				echo 'Emissão não permitida, consulte pibicpr@pucpr.br informando o ID:'.$id;
				exit;
			}
		$view = $rlt[0]['cde_view'];
		$data = $rlt[0];

		/*
		 * DATA
		 */
		/* Dados */
		$tipo = $data['dc_tipo'];
		$data['nome'] = $data['nome_1'];
		$data['nome'] = UpperCase($data['nome']);
		$data['nome2'] = $data['nome_2'];
		$data['nome2'] = UpperCase($data['nome2']);
		$data['prof'] = 'Prof.';
		$data['titulacao'] = 'Dr.';
		$data['titulo_projeto'] = $data['ic_projeto_professor_titulo'];
		$data['modalidade'] = $data['mb_descricao'];
		$data['edital'] = $data['mb_tipo'];

		switch ($tipo) {
			/* Declaracao de Avaliador */
			case '2' :
				$content = 'Declaramos para os devidos fins que ' . $data['prof'] . ' ' . $data['titulacao'] . ' <b>' . $data['nome'] . '</b> atuou como avaliador de trabalhos científicos no XXIII Seminário de Iniciação Científica da PUCPR, durante os dias 6, 7 e 8 de outubro de 2015.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 8 de outubro de 2015.</td></tr></table>';
				break;
			/* Declaracao de Ouvinte */
			case '9' :
				$content = 'Declaro para os devidos fins que <b>' . $data['nome'] . '</b> participou do XXIII Congresso de Iniciação Cientifica da PUCPR na modalidade de ouvinte nos dias 6, 7 e 8 de outubro de 2015, cumprindo uma carga horária de 20horas.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 8 de outubro de 2015.</td></tr></table>';
				break;
			/* Declaracao de Orientador */
			case '7' :
				$artigo_estudante = 'o';
				if ($data['us_g2'] == 'F') { $artigo_estudante = 'a';
				}
				$artigo_professor = 'prof.';
				if ($data['us_g1'] == 'F') { $artigo_professor = 'profa.';
				}

				$content = 'Declaramos para os devidos fins que o ' . $artigo_professor . ' <b>' . $data['nome'] . '</b> orientou ' . $artigo_estudante . ' alun' . $artigo_estudante . ' <b>' . $data['nome_2'] . '</b> no projeto de pesquisa intitulado "<b>' . $data['titulo_projeto'] . '"</b>, com ' . $data['modalidade'] . ', no programa ' . $data['edital'] . ', no período de agosto de 2014 a julho de 2015.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 8 de outubro de 2015.</td></tr></table>';
				break;
			/* Certificado de IC */
			case '12' :
				$artigo_estudante = 'o';
				if ($data['us_g1'] == 'F') { $artigo_estudante = 'a';
				}
				$artigo_professor = 'prof.';
				if ($data['us_g2'] == 'F') { $artigo_estudante = 'profa.';
				}

				/* Consulta avaliacao */
				$protocolo = trim($data['dc_texto_1']);
				$sql = "select max(pp_p08) as nota from pibic_parecer_2015 WHERE pp_protocolo = '$protocolo'";
				$rlt = $this->db->query($sql);				
				$rlt = $rlt->result_array();
				if (count($rlt)==0)
					{
						echo 'Emissão bloqueada, consulte pibicpr@pucpr.br informando o código: #45/'.$id.'/'.$protocolo;
						exit;
					}
			
				$ln = $rlt[0];
				if ($ln['nota'] < 40)
					{
						echo 'Emissão bloqueada, consulte pibicpr@pucpr.br informando o código: #46/'.$id.'/'.$protocolo;
						exit;						
					}
				

				$content = 'Certificamos que ' . $artigo_estudante . ' estudante, <b>' . $data['nome'] . '</b> participou do programa ' . $data['edital'] . ' nesta Universidade, com ' . $data['modalidade'] . ', com o projeto de pesquisa intitulado <b>"' . $data['titulo_projeto'] . '"</b> sob orientação do ' . $artigo_professor . ' <b>' . $data['nome2'] . '</b> , no período de agosto 2014 a julho 2015, com 20 horas semanais.';
				$content = utf8_encode($content);
				$data['content'] = '<font style="line-height: 150%">' . $content;
				$data['content'] .= '<br><br><table width="100%"><tr><td align="right">' . 'Curitiba, 8 de outubro de 2015.</td></tr></table>';
				break;
			default :
				echo 'ERRO INTERNO ' . $tipo;
				exit ;
				break;
		}
		$this -> load -> view($view, $data);
	}

}
?>