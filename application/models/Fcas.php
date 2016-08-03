<?php
class Fcas extends CI_model {
	
	function resultado_bolsas_indicadas($edital = '', $area = '') {
		$ano = date("Y");
		if (strlen($area) > 0) {
			$wh = " and ed_area = '$area' ";
		} else {
			$wh = "";
		}
		//consulta
		$sql = "select  
								ed_area, 
                ed_nota_normalizada, 
                ed_estudante, 
                professor.us_nome as nome_professor,
                professor.usuario_titulacao_ust_id AS id_titulacao,
                professor.us_ativo as prof_ativo,
                professor.us_genero as us_gen_prof,
                ust_titulacao_sigla as sigla_titulacao,
                mb.mb_link_logo_bolsas,
                mb.mb_descricao,
                doc_1_titulo, 
                aluno.us_nome as aluno_nome,
                aluno.us_ativo as al_ativo
		FROM ic_edital
		left join(SELECT id_us,
		                 us_nome,
		                 us_campus_vinculo,
		                 us_professor_tipo,
		                 usuario_titulacao_ust_id,
		                 us_ativo, us_genero FROM us_usuario where us_ativo = 1)as professor on professor.id_us = ed_professor
		left join us_titulacao on ust_id = professor.usuario_titulacao_ust_id
		left join (select distinct bpn_id, us_id as id_prod from us_bolsa_produtividade where usb_ativo = 1) as produtividade on id_prod =  professor.id_us 
		left join us_bolsa_prod_nome on id_bpn = bpn_id
		left join ic_modalidade_bolsa as mb on ed_modalidade = mb.id_mb
		left join ic_submissao_plano on doc_protocolo = ed_protocolo
		left join(SELECT id_us, 
		                 us_nome,
						         us_cracha,
						         us_ativo FROM us_usuario where us_ativo = 1)AS aluno on doc_aluno = aluno.us_cracha  
		where ed_edital = '$edital'
		$wh
		and ed_ano = '$ano'
		and doc_status = 'B'
		and id_mb not in (4, 17,18,27,28,9)
		and professor.us_ativo = 1
		order by nome_professor, ed_area
		";
		
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		$sx = '';
		$sh = '';
		//area selecionada
		$edital_select = $edital;
		
		//Colunas da tabela
		$sx .= '<table class="lt3" width="100%"';
		$sh .= '<tr><th align="letf"></th>';
		$sh .= '<tr>
							  <th align="letf" class="lt3" bgcolor="#D3D3D3">Bolsa</th>
							  <th align="letf" class="lt3" bgcolor="#D3D3D3">Tit. e Nome do Professor</th>
								<th align="letf" class="lt3" bgcolor="#D3D3D3">Nome do Aluno</th>
								<th align="letf" class="lt3" bgcolor="#D3D3D3">Título do plano de trabalho</th>
						</tr>';
		
		$tot = 0;
		$tot2 = 0;
		$xarea = '-';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			/** VARIAVEIS */
			//logo da bolsa
			$nome_bolsa = $line['mb_descricao'];
			$logo = $line['mb_link_logo_bolsas'];
			$img = '<img src="' . base_url( $logo ) . '" width="40" height="40" alt="image">';
			
			$area_select = $area;
			$area = $line['ed_area'];
			
			if ($area_select != $xarea) {
				$edital = trim($edital);
				
				$sx .= '<tr>';
				$sx .= '<TD class="lt4" colspan=6><letf>' . $this -> areas_mostra($area);
				$sx .= $sh . chr(13);
				$xarea = $area_select;
			}
			
			/*################### INICIO DO PREENCHIMENTO DA TABELA ####################################*/
			//indice
			$sx .= '<tr width="10%">';
			//logo da bolsa e bolsa indicada
			$sx .= '<td align="letf" width="5%" style="border-bottom:1px solid;">';
			$sx .= $img;
			$sx .= '</td>';
			
			//diferencia professor inativo no sistema
			$nome_prof = $this->tratar_nome($line['nome_professor']);
			$prof_ativo = $line['prof_ativo'];//professor ativo
			$gen = $line['us_gen_prof'];
			$titulacao = $line['sigla_titulacao'];
			
			$artigo_gen = '';
			if ($gen == 'F') {
				$artigo_gen = 'a';
			}
			
			if ($prof_ativo == '0') {
				//professor ativo
				$sx .= '<td align="letf" width="18%" style="border-bottom:1px solid;">';
				$sx .= ' - ';
				//$sx .= '<font color=red>'.$line['sigla_titulacao'] . ' ' .$nome_prof.'</font>';
				$sx .= '</td>';
			} else {
				//professor desativo
				$sx .= '<td align="left" width="25%" style="border-bottom:1px solid;" class="lt2">';
				$sx .= $titulacao . $artigo_gen. '  ' .$nome_prof;
				$sx .= '</td>';
			}
			
			//Nome aluno
			$nome_al = $this->tratar_nome($line['aluno_nome']);
			$al_nome = $line['aluno_nome'];//aluno ativo
			if (strlen($al_nome) == NULL) {//trata se o nome do aluno não existe e subistitui por um texto
				//aluno ativo
				$sx .= '<td align="letf" width="18%" style="border-bottom:1px solid;" class="lt2">';
				$sx .= ':: Sem Definição de Aluno ::';
				$sx .= '</td>';
			}else{
				$sx .= '<td align="letf" width="25%" style="border-bottom:1px solid;" class="lt2">';
				$sx .= $nome_al;
				$sx .= '</td>';
			}
			
			//Titulo do Protocolo
			$titulo = strtoupper($line['doc_1_titulo']);
			
			$sx .= '<td align="left" width="45%" style="border-bottom:1px solid;" class="lt2">';
			$sx .= $titulo;
			$sx .= '</td>';
		}
		$sx .= '</table>';
		
		return ($sx);
	}
	
	//**************************** Inicio do metodo **************************************
	/* @function: tratar_nome($var)
	 *           Faz tratamento de nome proprio
	 * @date: 04/05/2015
	 */	
	  function tratar_nome($nome) {
	    $nome = strtolower($nome); // Converter o nome(campo) todo para minúsculo
	    $nome = explode(" ", $nome); // Separa todo o nome(campo) por espaços
	    $saida = '';
	    for ($i=0; $i < count($nome); $i++) {
	        // Tratar cada palavra do nome(campo)
	        if ($nome[$i] == "de" or $nome[$i] == "da" or $nome[$i] == "e" or $nome[$i] == "dos" or $nome[$i] == "do") {
	            $saida .= $nome[$i].' '; // Se a palavra estiver dentro das complementares mostrar toda em minúsculo
	        }else {
	            $saida .= ucfirst($nome[$i]).' '; // Se for um nome, mostrar a primeira letra maiúscula
	        }
	    }
	    return $saida;
	}
	
	function areas_mostra($c) {
		if ($c == 'E') { $sx = '<font style="color: #006b9f; font-size: 30px;">Ciências Exatas</font>';
		}
		if ($c == 'H') { $sx = '<font style="color: #ff0000; font-size: 30px;">Ciências Humanas</font>';
		}
		if ($c == 'S') { $sx = '<font style="color: #204D6E; font-size: 30px;">Ciências Sociais Aplicadas</font>';
		}
		if ($c == 'V') { $sx = '<font style="color: #00A000; font-size: 30px;">Ciências da Vida</font>';
		}
		if ($c == 'A') { $sx = '<font style="color: #4B0082; font-size: 30px;">Ciências Agrárias</font>';
		}
		return ($sx);
	}

	function bolsas_indicadas($edital = '', $area = '') {
		$ano = date("Y");
		if (strlen($area) > 0) {
			$wh = " and ed_area = '$area' ";
		} else {
			$wh = "";
		}
		//consulta
		$sql = "select distinct id_ed,
                ed_nota_normalizada, 
                ed_edital, 
                ed_protocolo,
                ed_protocolo, 
                ed_estudante, 
                ed_protocolo_mae, 
                ed_avaliacoes, 
                (ed_nota_normalizada + ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota,
                (ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota_bn, 
                ed_area,               
                professor.id_us as id_professor,
                professor.us_nome as nome_professor,
                professor.us_campus_vinculo as campus_professor,
                professor.us_professor_tipo as tipo_professor,
                professor.usuario_titulacao_ust_id AS id_titulacao,
                professor.us_ativo as ativo,
                ust_titulacao_sigla AS sigla_titulacao,
                bpn_bolsa_descricao,
                mb.mb_link_logo_bolsas,
                mb.mb_descricao,
                doc_escola_publica, 
                doc_icv,  
                doc_protocolo, 
                doc_aluno,
                aluno.id_us as id_aluno,
                aluno.us_nome as aluno_nome,
                aluno.us_cracha as aluno_cracha
		FROM ic_edital
		left join(SELECT id_us,
		                 us_nome,
		                 us_campus_vinculo,
		                 us_professor_tipo,
		                 usuario_titulacao_ust_id,
		                 us_ativo FROM us_usuario)as professor on professor.id_us = ed_professor
		left join us_titulacao on ust_id = professor.usuario_titulacao_ust_id
		left join (select distinct bpn_id, us_id as id_prod from us_bolsa_produtividade where usb_ativo = 1) as produtividade on id_prod =  professor.id_us 
		left join us_bolsa_prod_nome on id_bpn = bpn_id
		left join ic_modalidade_bolsa as mb on ed_modalidade = mb.id_mb
		left join ic_submissao_plano on doc_protocolo = ed_protocolo
		left join(SELECT id_us, 
		                 us_nome,
						         us_cracha FROM us_usuario where us_ativo = 1)AS aluno on doc_aluno = aluno.us_cracha  
		where ed_edital = '$edital'
		$wh
		and ed_ano = '$ano'
		AND doc_status = 'B'
		order by nota desc, ed_protocolo_mae
		";
		
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		$sx = '';
		//area selecionada
		$area_select = $area;
		$edital_select = $edital;
		
		if ($edital_select == 'PIBIC' OR $edital_select == 'PIBITI') {
		//Colunas da tabela
		$sx .= '<table class="tabela00 lt2" width="100%">';
		//Troca de sub-titulo conforme area selecionada
		switch($area_select) {
			case 'V' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências da Vida </strong></font></tr>';
				break;
			case 'E' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Exatas e Engenharias </strong></font></tr>';
				break;
			case 'H' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Humanas </strong></font></tr>';
				break;
			case 'A' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências Agrárias </strong></font></tr>';
				break;
			case 'S' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências Sociais Aplicadas </strong></font></tr>';
				break;	
			default :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Indique uma área no menu anterior! </strong></font></tr>';
				break;			
			}	
			
		$sx .= '<tr><th align="center" class="lt01">#</th>
							  <th align="center">Bolsa indicada</th>
							  <th align="center">Nome do Orientador</th>
								<th align="center">Câmpus do professor</th>
								<th align="center">Nome do Aluno</th>
								<th align="center">Aluno Trabalha?</th>
								<th align="center">Estudou em Esc. pública?</th>
								<th align="center">Nota da Avaliação</th>
								<th align="center">Projeto do Professor</th>
								<th align="center">Plano do Aluno</th>
						</tr>';
		
		} elseif($edital_select == 'PIBICEM') {
		
		//Colunas da tabela
		$sx .= '<table class="tabela00 lt2" width="100%">';
		//Troca de sub-titulo conforme area selecionada
		switch($area_select) {
			case 'V' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências da Vida </strong></font></tr>';
				break;
			case 'E' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Exatas e Engenharias </strong></font></tr>';
				break;
			case 'H' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Humanas </strong></font></tr>';
				break;
			case 'A' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências Agrárias </strong></font></tr>';
				break;
			case 'S' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Área de Ciências Sociais Aplicadas </strong></font></tr>';
				break;	
			default :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"><strong> Indique uma área no menu anterior! </strong></font></tr>';
				break;			
			}	
			
		$sx .= '<tr><th align="center" class="lt01">#</th>
							  <th align="center">Bolsa indicada</th>
							  <th align="center">Nome do Orientador</th>
								<th align="center">Câmpus do professor</th>
								<th align="center">Nome do Aluno</th>
								<th align="center">Aluno Trabalha?</th>
								<th align="center">Estudou em Esc. pública?</th>
								<th align="center">Projeto do Professor</th>
								<th align="center">Plano do Aluno</th>
						</tr>';
			
				}
		
		
		$tot = 0;
		$tot2 = 0;
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			
			//logo da bolsa
			$nome_bolsa = $line['mb_descricao'];
			$logo = $line['mb_link_logo_bolsas'];
			$img = '<img src="' . base_url( $logo ) . '" width="40" height="40" alt="image">';
			
			//link do projeto
			$proto = round(substr($line['ed_protocolo_mae'], 1, 6));
			$link_projeto = '<a href="' . base_url('index.php/ic/projeto_view/' . $proto . '/' . checkpost_link($proto)) . '" class="link nopr">';
			//link do plano
			$plano = round(substr($line['ed_protocolo'], 1, 6));
			$link_plano = '<a href="' . base_url('index.php/ic/plano_view/' . $plano . '/' . checkpost_link($plano)) . '" class="link nopr">';
			//$nota = $line['ed_nota_normalizada'];
			$nota = $line['nota'];
			$cor = '';
			
			/*################### INICIO DO PREENCHIMENTO DA TABELA ####################################*/
			//indice
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';
			
			//logo da bolsa e bolsa indicada
			$sx .= '<td align="left" width="23%">';
			$sx .= $img.' '.$line['mb_descricao'];
			$sx .= '</td>';
			
			//diferencia professor inativo no sistema
			$sf = '';
			$sf2 = '';
			$prof_ativo = $line['ativo'];//professor ativo
			if ($prof_ativo == '0') {
				//$sf = '<font color="red"><strong> * <strong></font>';
				$sf = '<font color="red"><strike>';
				$sf2 = '<strike></font>';
			} else {
				
			}
			//professor
			$sx .= '<td align="left" width="18%">';
			//$sx .= $sf.$line['sigla_titulacao'] . ' ' . link_user($line['nome_professor'], $line['id_professor']).$sf2;
			$sx .= $sf.$line['sigla_titulacao'] . ' ' .$line['nome_professor'].$sf2;
			$sx .= '</td>';
			
			//Centro
			$sx .= '<td align="left" width="8%">';
			$sx .= $line['campus_professor'];
			$sx .= '</td>';
			
			//Nome aluno
			$sx .= '<td align="left" width="18%">';
			//$sx .= link_user($line['aluno_nome'], $line['id_aluno']);
			$sx .= $line['aluno_nome'];
			$sx .= '</td>';
     	//Aluno trabalha ?
			$sx .= '<td align="center" width="5%">';
			$tb = $line['doc_icv'];
			if ($tb == '1') {
				$sx .= '<font color="red">Sim</font>';
			} else {
				$sx .= 'Não';
			}
			$sx .= '</td>';
			//Aluno estudou escola publica ?
			$sx .= '<td align="center" width="5%">';
			$ep = $line['doc_escola_publica'];
			if ($ep == '1') {
				$sx .= '<font color="red">Sim</font>';
			} else {
				$sx .= 'Não';
			}
			$sx .= '</td>';
			
			//NOTAS
			if ($edital_select == 'PIBITI'  OR $edital_select == 'PIBIC') {
			//$sx .= $line['ed_nota_normalizada'];
			if ($nota < 70) {
				 $tot2++; 
				 $cor = 'red';
			}
			$sx .= '<td width="50" align="center" style="color: ' . $cor . ';">' . number_format($nota, 2, ',', '.') . '</td>';
			
			} elseIF($edital_select == 'PIBICEM') {
			
			}
			
			
			
			//só pode editar se for perfil admin ou coordenador pibic
			if ((perfil("#CPP#ADM#CNQ") == 1)) {
				//Protocolo mae
				$sx .= '<td align="center" width="10%">';
				$sx .= $link_projeto . $line['ed_protocolo_mae'] . '</a>';
				$sx .= '</td>';
				//Protocolo
				$sx .= '<td align="center" width="10%">';
				$sx .= $link_plano . $line['ed_protocolo'] . '</a>';
				$sx .= '</td>';
			}else{
				//Protocolo mae
				$sx .= '<td align="center" width="10%">';
				$sx .= $line['ed_protocolo_mae'];
				$sx .= '</td>';
				//Protocolo
				$sx .= '<td align="center" width="10%">';
				$sx .= $line['ed_protocolo'];
				$sx .= '</td>';
			}
		}
		//qtd de registros
		$sx .= '<tr><td colspan=16 align="right">Total de ' . $tot . ' registro(s)</td></tr>';
		if ($nota < 70) {
			$sx .= '<tr><td colspan=16 align="right" style="color: ' . $cor . ';">' . $tot2 . ' nota(s) esta(ão) abaixo da linha de corte</td></tr>';
		}
		$sx .= '</table>';

		return ($sx);

	}


	function indicar_bolsas($edital = '', $area = '') {
		$ano = date("Y");
		if (strlen($area) > 0) {
			$wh = " and ed_area = '$area' ";
		} else {
			$wh = "";
		}
		//consulta
		$sql = "select distinct id_ed,
                ed_nota_normalizada, 
                ed_edital, 
                ed_protocolo,
                ed_protocolo, 
                ed_estudante, 
                ed_protocolo_mae, 
                ed_avaliacoes, 
                (ed_nota_normalizada + ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota,
                (ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota_bn, 
                ed_area,               
                professor.id_us as id_professor,
                professor.us_nome as nome_professor,
                professor.us_campus_vinculo as campus_professor,
                professor.us_professor_tipo as tipo_professor,
                professor.usuario_titulacao_ust_id AS id_titulacao,
                professor.us_ativo as ativo,
                ust_titulacao_sigla AS sigla_titulacao,
                bpn_bolsa_descricao,
                mb.mb_link_logo_bolsas,
                mb.mb_descricao,
                doc_escola_publica, 
                doc_icv,  
                doc_protocolo, 
                doc_aluno,
                aluno.id_us as id_aluno,
                aluno.us_nome as aluno_nome,
                aluno.us_cracha as aluno_cracha
								
		FROM ic_edital
		left join(SELECT id_us,
		                 us_nome,
		                 us_campus_vinculo,
		                 us_professor_tipo,
		                 usuario_titulacao_ust_id,
		                 us_ativo FROM us_usuario)as professor on professor.id_us = ed_professor
		left join us_titulacao on ust_id = professor.usuario_titulacao_ust_id
		left join (select distinct bpn_id, us_id as id_prod from us_bolsa_produtividade where usb_ativo = 1) as produtividade on id_prod =  professor.id_us 
		left join us_bolsa_prod_nome on id_bpn = bpn_id
		left join ic_modalidade_bolsa as mb on ed_modalidade = mb.id_mb
		left join ic_submissao_plano on doc_protocolo = ed_protocolo
		left join(SELECT id_us, 
		                 us_nome,
						         us_cracha FROM us_usuario where us_ativo = 1)AS aluno on doc_aluno = aluno.us_cracha  
		
		where ed_edital = '$edital'
		$wh
		and ed_ano = '$ano'
		order by nota desc, ed_protocolo_mae
		";
		//order by nota desc, ed_avaliacoes asc
		/**
		$sql = "select distinct id_ed, ed_nota_normalizada, ed_edital, ust_titulacao_sigla,us_nome,
						id_us, us_campus_vinculo, bpn_bolsa_descricao, ed_protocolo, ed_estudante, 
						ed_protocolo_mae, mb_descricao, us_professor_tipo, ed_avaliacoes, 
						(ed_nota_normalizada + ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota,
						(ed_bn_produtividade + ed_bn_titulacao + ed_bn_ss + ed_bn_jr - ed_bn_penalidade) as nota_bn, 
						ed_area, doc_escola_publica, doc_icv, ed_protocolo, doc_protocolo, doc_aluno
						FROM ic_edital
						left join us_usuario on id_us = ed_professor
						left join us_titulacao on ust_id = usuario_titulacao_ust_id
						left join (select distinct bpn_id, us_id as id_prod from us_bolsa_produtividade where usb_ativo = 1) as produtividade on id_prod = id_us 
						left join us_bolsa_prod_nome on id_bpn = bpn_id
						left join ic_modalidade_bolsa on ed_modalidade = id_mb
						left join ic_submissao_plano on doc_protocolo = ed_protocolo
						where ed_edital = '$edital'
						$wh
						and ed_ano = '$ano'
						order by ed_protocolo_mae
					";
				*/	
					//order by nota desc, ed_avaliacoes asc
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		$sx = '';
		//area selecionada
		$area_select = $area;
		
		//Colunas da tabela
		$sx .= '<table class="tabela00 lt1" width="100%">';
		//Troca de sub-titulo conforme area selecionada
		switch($area_select) {
			case 'V' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Ciências da Vida </font></tr>';
				break;
			case 'E' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Exatas e Engenharias </font></tr>';
				break;
			case 'H' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Humanas </font></tr>';
				break;
			case 'A' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Ciências Agrárias </font></tr>';
				break;
			case 'S' :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Ciências Sociais Aplicadas </font></tr>';
				break;	
			default :
				$sx .= '<tr><td class="lt3" colspan=4><font color="red"> Todas as áreas </font></tr>';
				break;			
			}	
		$sx .= '<tr><th align="center" class="lt01">#</th>
							  <th align="center">Bolsa indicada</th>
							  <th align="center">Aluno</th>
								<th align="center">Trabalha</th>
								<th align="center">Esc. pública</th>
								<th align="center">Professor</th>
								<th align="center">Área</th>
								<th align="center">Centro</th>
								<th align="center">SS</th>
								<th align="center">Produ</th>
								<th align="center">ICV</th>
								<th align="center">Estrat.</th>
								<th align="center">Nota</th>
								<th align="center">DR.</th>
								<th align="center">Aval.</th>
								<th align="center">Protocolo mãe</th>
								<th align="center">Protocolo</th>
								<th align="center">Qtd. Aval</th>
								<th align="center">ação</th>
						</tr>';
			
		$tot = 0;
		$tot2 = 0;
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;
			$edit = '';
			
			//logo da bolsa
			$nome_bolsa = $line['mb_descricao'];
			$logo = $line['mb_link_logo_bolsas'];
			if(strlen($nome_bolsa) > 0){
				$img = '<img src="' . base_url( $logo ) . '" width="40" height="40" alt="image">';
			}else{
				$img = '<img >';
			}
			//link do projeto
			$proto = round(substr($line['ed_protocolo_mae'], 1, 6));
			$link_projeto = '<a href="' . base_url('index.php/ic/projeto_view/' . $proto . '/' . checkpost_link($proto)) . '" class="link nopr">';
			//link do plano
			$plano = round(substr($line['ed_protocolo'], 1, 6));
			$link_plano = '<a href="' . base_url('index.php/ic/plano_view/' . $plano . '/' . checkpost_link($plano)) . '" class="link nopr">';
			//$nota = $line['ed_nota_normalizada'];
			$nota = $line['nota'];
			$cor = '';
			//se perfil Admin mostra
			if ((perfil("#ADM") == 1)) {
				$link = base_url('index.php/ic/indicar_bolsa_ed/' . $line['id_ed'] . '/' . checkpost_link($line['id_ed']));
				$edit = '<span class="link lt1" onclick="newwin(\'' . $link . '\')">indicar</span>';

				$link2 = base_url('index.php/ic/indicar_bolsa_ed/' . $line['id_ed'] . '/' . checkpost_link($line['id_ed']));
				$edit2 = '<span class="link lt1" onclick="newwin(\'' . $link . '\')">indicado</span>';
			}
			/*################### INICIO DO PREENCHIMENTO DA TABELA ####################################*/
			//indice
			$sx .= '<tr>';
			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';
			
			//logo da bolsa e bolsa indicada
			$sx .= '<td align="left" width="15%">';
			$sx .= $img.' '.$line['mb_descricao'];
			$sx .= '</td>';
			//Nome aluno
			$sx .= '<td align="left">';
			$sx .= link_user($line['aluno_nome'], $line['id_aluno']);
			$sx .= '</td>';
     	//Aluno trabalha ?
			$sx .= '<td align="center">';
			$tb = $line['doc_icv'];
			if ($tb == '1') {
				$sx .= '<font color="red">Sim</font>';
			} else {
				$sx .= 'Não';
			}
			$sx .= '</td>';
			//Aluno estudou escola publica ?
			$sx .= '<td align="center">';
			$ep = $line['doc_escola_publica'];
			if ($ep == '1') {
				$sx .= '<font color="red">Sim</font>';
			} else {
				$sx .= 'Não';
			}
			$sx .= '</td>';
			
			//diferencia professor inativo no sistema
			$sf = '';
			$sf2 = '';
			$prof_ativo = $line['ativo'];//professor ativo
			if ($prof_ativo == '0') {
				//$sf = '<font color="red"><strong> * <strong></font>';
				$sf = '<font color="red"><strike>';
				$sf2 = '<strike></font>';
			} else {
				
			}
			//professor
			$sx .= '<td align="left">';
			$sx .= $sf.$line['sigla_titulacao'] . ' ' . link_user($line['nome_professor'], $line['id_professor']).$sf2;
			$sx .= '</td>';
			//area do professor
			$area_prof = $line['ed_area'];
			switch ($area_prof) {
				case 'V' :
					$sx .= '<td align="left">';
					$sx .= msg("Vida");
					$sx .= '</td>';
					break;
				case 'E' :
					$sx .= '<td align="left">';
					$sx .= msg("Exatas");
					$sx .= '</td>';
					break;
				case 'H' :
					$sx .= '<td align="left">';
					$sx .= msg("Humanas");
					$sx .= '</td>';
					break;
				case 'A' :
					$sx .= '<td align="left">';
					$sx .= msg("Agrárias");
					$sx .= '</td>';
					break;
				case 'S' :
					$sx .= '<td align="left">';
					$sx .= msg("Sociais aplicadas");
					$sx .= '</td>';
					break;
				default :
					$sx .= '<td align="left">';
					$sx .= msg("Não indicada");
					$sx .= '</td>';
					break;
			}

			//Centro
			$sx .= '<td align="left">';
			$sx .= $line['campus_professor'];
			$sx .= '</td>';
			//Stricto
			$sx .= '<td align="center">';
			$ss = $line['tipo_professor'];
			if ($ss == '2') {
				$sx .= '<font color="red">Sim</font>';
			} else {
				$sx .= '-';
			}
			$sx .= '</td>';
			//Produtividade
			$sx .= '<td align="center">';
			$sx .= '<small>'.$line['bpn_bolsa_descricao'].'</small>';
			$sx .= '</td>';
			//Estudante
			$sx .= '<td align="center">';
			$sx .= $line['ed_estudante'];
			$sx .= '</td>';
			//ICV
			$sx .= '<td align="center">';
			$sx .= '-';
			$sx .= '</td>';
			//Nota normalizada
			$sx .= '<td width="50" align="center" style="color: ' . $cor . ';">' . number_format($line['ed_nota_normalizada'], 2, ',', '.') . '</td>';
			//Nota bonificação
			$sx .= '<td width="50" align="center" style="color: ' . $cor . ';">' . number_format($line['nota_bn'], 2, ',', '.') . '</td>';
			//$sx .= $line['ed_nota_normalizada'];
			if ($nota < 70) {
				 $tot2++; 
				 $cor = 'red';
			}
			$sx .= '<td width="50" align="center" style="color: ' . $cor . ';">' . number_format($nota, 2, ',', '.') . '</td>';
			//só pode editar se for perfil admin ou coordenador pibic
			if ((perfil("#CPP#ADM") == 1)) {
			//Protocolo mae
			$sx .= '<td align="center">';
			$sx .= $link_projeto . $line['ed_protocolo_mae'] . '</a>';
			$sx .= '</td>';
			//Protocolo
			$sx .= '<td align="center">';
			$sx .= $link_plano . $line['ed_protocolo'] . '</a>';
			$sx .= '</td>';
			}else{
				//Protocolo mae
			$sx .= '<td align="center">';
			$sx .= $line['ed_protocolo_mae'];
			$sx .= '</td>';
			//Protocolo
			$sx .= '<td align="center">';
			$sx .= $line['ed_protocolo'];
			$sx .= '</td>';
			}
			//Qtd de avaliações
			$sx .= '<td align="center">';
			$sx .= $line['ed_avaliacoes'];
			$sx .= '</td>';			
			//acao
			//diferencia indicações em aberto
			$sf = '';
			$sf2 = '';
			$var = $line['mb_descricao'];
			if ($var < '0') {
				$sf = '<font color="blue"><i>';
				$sf2 = '</i></font>';
			} else {
				$sf = '<font color="red"><b>';
				$sf2 = '</b></font>';
			}
			//verifica status das indicacoes
			if (strlen($var) == 0) {
				$sx .= '<td class="nopr" align="center">' . $sf . '' . $edit . '' . $sf2 . '</td>';
			} else {
				$sx .= '<td class="nopr" align="center">' . $sf . '' . $edit2 . '' . $sf2 . '</td>';
			}
		}
		//qtd de registros
		$sx .= '<tr><td colspan=16 align="right">Total de ' . $tot . ' registro(s)</td></tr>';
		if ($nota < 70) {
			$sx .= '<tr><td colspan=16 align="right" style="color: ' . $cor . ';">' . $tot2 . ' nota(s) esta(ão) abaixo da linha de corte</td></tr>';
		}
		$sx .= '</table>';

		return ($sx);

	}

	//calcula mgn (média das notas geral)
	function calc_media_notas($tipo = '') {
		$sql = "select (AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8)) as media
						from pibic_parecer_2016 
						where pp_tipo = '$tipo' 
						AND pp_status = 'B'
						and pp_p01 <> ''
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		$media = round(1000 * $rlt[0]['media']) / 1000;

		return ($media);
	}

	//calcula fca dos avaliadores
	function calc_media_notas_avaliador($tipo = '') {
		//atualiza
		$sql_up = "update us_usuario set us_fc = '0' where us_fc <> 0";
		$this -> db -> query($sql_up);

		//recupera media geral do metodo calc_media_notas_avaliador()
		$mgn = $this -> calc_media_notas($tipo);

		$sql = "select pp_avaliador_id, us_nome, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p11+pp_p12+pp_p13+pp_p14)/8))/1000 as media, count(*) as qtd, 
									CASE
										WHEN ies_instituicao_ies_id = '1' THEN 'Interno'
										WHEN ies_instituicao_ies_id != '1' THEN 'Externo'        
									END  as instituicao,
									us_fc
						from pibic_parecer_2016 
						inner join us_usuario on id_us = pp_avaliador_id
						where pp_tipo = '$tipo'  
						AND pp_status = 'B'
						and pp_p01 <> ''
						and pp_p11 >= 10 
						and pp_p01 >= 10 
						group by pp_avaliador_id
						order by us_nome, media
						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo de fca</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">id avaliador</th>
							<th align="center">Nome avaliador</th>
							<th align="center">Instituição</th>
							<th align="rigth">Média avaliador</th>
							<th align="rigth">Média geral</th>.
							<th align="center">fca</th>
							<th align="center">Avaliações</th>
						</tr>';

		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$av_id = $line['pp_avaliador_id'];
			$av_nome = $line['us_nome'];
			$mgp = $line['media'];
			$instituicao = $line['instituicao'];
			$fc_us = $line['us_fc'];

			//calcula fca
			$fca = 0;
			$fca = round(1000 * ($mgn - $mgp)) / 1000;

			//diferencia fca < 0
			$sf = '';
			$sff = '';
			if ($fca < '0') {
				$sf = '<font color="red"><i>';
				$sff = '</i></font>';
			} else {
				$sf = '<font color="blue"><b>';
				$sff = '</b></font>';
			}

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $av_id;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $av_nome;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $instituicao;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgp, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($mgn, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $sf . number_format($fca, 3, '.', ',') . $sff;
			$sx .= '</td>';

			/**
			 $sx .= '<td align="center">';
			 $sx .= $fc_us;
			 $sx .= '</td>';
			 */
			$sx .= '<td align="center">';
			$sx .= $line['qtd'];
			$sx .= '</td>';

			//atualiza fca na tabela us_usuario [us_fca]
			$sql_up2 = "update us_usuario set us_fc = $fca where id_us = $av_id";
			$this -> db -> query($sql_up2);

		}
		$sx .= '</table>';
		return ($sx);
	}

	function calc_media_notas_protocolo($tipo = '', $ano = '') {
		if ($ano == '') {
			$ano = date('Y');
		}

		if ($tipo == 'SUBMP') {
			$sql = "delete from ic_edital 
							where (ed_edital = 'PIBIC' or ed_edital = 'PIBITI' or ed_edital = 'PIBICEM')
							and (ed_ano = '' or ed_ano = '$ano') ";
			$rlt = $this -> db -> query($sql);
		}

		$sql = "select pp_protocolo_mae, pp_protocolo, count(*) as avaliacoes,
						                round(1000* avg(pp_p01))/1000 as pp1,
						                round(1000* avg(pp_p02))/1000 as pp2,
						                round(1000* avg(pp_p03))/1000 as pp3,
						                round(1000* avg(pp_p04))/1000 as pp4,
						                round(1000* avg(pp_p05))/1000 as pp5,              
						                round(1000* avg(pp_p11))/1000 as pp11,
						                round(1000* avg(pp_p12))/1000 as pp12,
						                round(1000* avg(pp_p13))/1000 as pp13,
						                round(1000* avg(pp_p14))/1000 as pp14,
						                round(1000* avg(pp_p15))/1000 as pp15              
						        from pibic_parecer_" . $ano . "
						        where pp_tipo = '$tipo' 
						        and pp_status = 'B'
						        and pp_p01 <> ''
						        group by pp_protocolo, pp_protocolo_mae
						        order by pp_protocolo, pp_protocolo_mae
						       						";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Calculo das notas individuais por protocolo</b></tr>';
		$sx .= '<tr>
							<th>#</th>
							<th align="center">Protocolo</th>
							<th align="center">Protocolo mãe</th>
							<th align="rigth">Média p1</th>
							<th align="rigth">Média p2</th>
							<th align="rigth">Média p3</th>
							<th align="rigth">Média p4</th>														
							<th align="rigth">Média p5</th>
							<th align="rigth">Média p11</th>
							<th align="rigth">Média p12</th>
							<th align="rigth">Média p13</th>
							<th align="rigth">Média p14</th>														
							<th align="rigth">Média p15</th>	
							<th align="rigth">total avaliações</th>					
						</tr>';

		$tot = 0;
		/*linhas da tabela*/
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$tot++;
			//variaveis
			$proto = $line['pp_protocolo'];
			$proto_mae = $line['pp_protocolo_mae'];
			$total_av = $line['avaliacoes'];

			$nt_p01 = $line['pp1'];
			$nt_p02 = $line['pp2'];
			$nt_p03 = $line['pp3'];
			$nt_p04 = $line['pp4'];
			$nt_p05 = $line['pp5'];
			$nt_p11 = $line['pp11'];
			$nt_p12 = $line['pp12'];
			$nt_p13 = $line['pp13'];
			$nt_p14 = $line['pp14'];
			$nt_p15 = $line['pp15'];
			$line['ano'] = $ano;

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $proto;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $proto_mae;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p01, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p02, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p03, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p04, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p05, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p11, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p12, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p13, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p14, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($nt_p15, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $total_av;
			$sx .= '</td>';

			//passa o array() $line para o metodo insert
			$this -> inserir_notas_protocolo($line);

		}
		$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';

		$sx .= '</table>';
		return ($sx);

	}

	function inserir_notas_protocolo($line) {
		//variaveis
		$ano = $line['ano'];
		$proto = $line['pp_protocolo'];
		$proto_mae = $line['pp_protocolo_mae'];
		$total_av = $line['avaliacoes'];

		$nt_p01 = $line['pp1'];
		$nt_p02 = $line['pp2'];
		$nt_p03 = $line['pp3'];
		$nt_p04 = $line['pp4'];
		$nt_p05 = $line['pp5'];
		$nt_p11 = $line['pp11'];
		$nt_p12 = $line['pp12'];
		$nt_p13 = $line['pp13'];
		$nt_p14 = $line['pp14'];
		$nt_p15 = $line['pp15'];

		//grava notas na tabela ic_edital
		$sql_inst2 = "insert into ic_edital 
										(
										 ed_protocolo, ed_ano,
										 ed_protocolo_mae,
										 ed_c1, ed_c2, 
										 ed_c3, ed_c4,
										 ed_c5, ed_c6,
										 ed_c7, ed_c8,
										 ed_c9, ed_c10 
										) values (
										'$proto', '$ano', 
										'$proto_mae',
										'$nt_p01', '$nt_p02', '$nt_p03',
										'$nt_p04', '$nt_p05', '$nt_p11',
										'$nt_p12', '$nt_p13', '$nt_p14',
										'$nt_p15')
									";
		$this -> db -> query($sql_inst2);

		return ('');

	}

	function atualizar_produtividade() {
		$sql = "select distinct us_id, us_nome, id_us from us_bolsa_produtividade
					INNER JOIN us_usuario on id_us = us_id 
					where usb_ativo = 1
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Bolsistas Produtividade</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
					<th>Pesquisador</th>
					<th>atribuição</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_produtividade = 4
						   where ed_professor = " . $line['us_id'] . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;">+4 pontos</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function atualizar_nota_aprovado_externamente() {
		$ano = date("Y");
		$sql = "SELECT * FROM `ic_submissao_projetos` 
					where pj_ano = '$ano' and pj_status <> 'X' and pj_status <> '@' and pj_status <> '!' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Projetos Junior</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
					<th>Pesquisador</th>
					<th>atribuição</th>
				</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$pt = 0;
			$externo = $line['pj_ext_sn'];
			if ($externo > 0) { $pt = 2;
			}

			$area = substr($line['pj_area'], 0, 1);
			$xarea = '?';
			switch($area) {
				case '1' :
					$xarea = 'E';
					/* Exatas */
					break;
				case '2' :
					$xarea = 'V';
					/* Exatas */
					break;
				case '3' :
					$xarea = 'E';
					/* Exatas */
					break;
				case '4' :
					$xarea = 'V';
					/* Exatas */
					break;
				case '5' :
					$xarea = 'A';
					/* Exatas */
					break;
				case '6' :
					$xarea = 'S';
					/* Exatas */
					break;
				case '7' :
					$xarea = 'H';
					/* Exatas */
					break;
				case '8' :
					$xarea = 'H';
					/* Exatas */
					break;
				case '9' :
					$xarea = 'E';
					/* Exatas */
					break;
				default :
					$xarea = 'N';
					break;
			}

			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_externo = $pt, ed_area = '$xarea'
						   where ed_protocolo_mae = '" . $line['pj_codigo'] . "'" . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . $line['pj_codigo'] . '</td>';
			$sx .= '<td>' . $line['pj_titulo'] . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;"><nobr>+2 pontos</nobr></td>';
			$sx .= '<td>' . $xarea . '</td>';
			$sx .= '<td>' . $area . '</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	function atualizar_projeto_jr() {
		$sql = "SELECT distinct us_nome, id_us FROM ic_submissao_plano
					INNER JOIN us_usuario on doc_autor_principal = us_cracha
				WHERE doc_edital = 'PIBICEM' 
					and doc_ano = '" . date("Y") . "'
					and doc_status <> 'X'
					and doc_status <> '@'
					and doc_status <> '!'
				ORDER BY us_nome
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<h1>Pontos para Projetos Junior</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th>#</th>
							<th>Pesquisador</th>
							<th>atribuição</th>
						</tr>';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_bn_jr = 3
						   where ed_professor = " . $line['id_us'] . cr();
			$this -> db -> query($sql_update);
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			$sx .= '<td width="20" align="center" style="color: blue;">+3 pontos</td>';
		}
		$sx .= '</table>';
		return ($sx);
	}

	/**
	 * documented function
	 * Função para trazer notas e comentários dados pelos avaliadores 
	 *  ao projetos submetidos para o edital PIBIC E PIBITI.
	 * Recebe o protocolo($proto) como parâmetro
	 *
	 * @return $sx
	 * @author elizandro Lima 
	 * Data: 28/06/2016
	 */
	function avaliacao_notas_projetos($proto) {
		$sx = '';
		if ((perfil("#ADM#3AV#CPP") == 1)) {//Perfis atorizados para ver notas e comentários
			$ano = date("Y");
			$sql = "select pp_protocolo_mae, pp_protocolo, pp_avaliador_id, id_pp, 
	                 pp_p01, pp_p02, pp_p03,
	                 pp_p04, pp_p05, pp_p06, pp_p11,
	                 pp_p12, pp_p13, pp_p14,
	                 pp_p15,
	                 pp_abe_01, pp_abe_02, pp_abe_03,
	                 pp_abe_04, pp_abe_05, pp_abe_06,
	                 pp_abe_07, pp_abe_08, pp_abe_09,
	                 pp_abe_10, pp_abe_11, pp_abe_12,
	                 pp_abe_13, pp_abe_14, pp_abe_15,
	                 pp_abe_16, pp_abe_17, pp_abe_18,
	                 pp_abe_19
		        from pibic_parecer_" . $ano . "
		        where pp_protocolo_mae = " . $proto . "
		        and pp_tipo <> 'SUBMI'
		        and pp_status = 'B'
		        group by pp_avaliador_id
		        order by id_pp
						";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			
			//cabecalho
			$sx = '<div class="alert alert-info" style="padding:5px 10px;">';
			$sx .= '<table class="tabela00 lt1" width="100%">';
			$sx .= '<tr class="lt3"><th></th>';
			$sx .= '<tr class="lt3"><th><b></b></th>';
			$sx .= '<th colspan="9" class="lt3">Avaliação sobre o Projeto do professor</th></tr>';
			$sx .= '<tr>
							<th>#</th>
							<th align="left"   class="lt2">Protocolo Proj.</th>	
							<th align="center" class="lt2">CT_01</th>
							<th align="center" class="lt2">CT_02</th>
							<th align="center" class="lt2">CT_03</th>
							<th align="center" class="lt2">CT_04</th>
							<th align="center" class="lt2">CT_05</th>
							<th align="center" class="lt2">CT_06</th>
						  <th align="center" class="lt2">Comentários do projeto</th>
						</tr>';

			/*linhas da tabela*/
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				//notas
				$nt_p01 = $line['pp_p01'];
				$nt_p02 = $line['pp_p02'];
				$nt_p03 = $line['pp_p03'];
				$nt_p04 = $line['pp_p04'];
				$nt_p05 = $line['pp_p05'];
				$nt_p06 = $line['pp_p06'];
				$nt_p11 = $line['pp_p11'];
				$nt_p12 = $line['pp_p12'];
				$nt_p13 = $line['pp_p13'];
				$nt_p14 = $line['pp_p14'];
				$nt_p15 = $line['pp_p15'];

				//variaveis
				$proto = $line['pp_protocolo'];
				$proto_mae = $line['pp_protocolo_mae'];
				//$observacoes = '';
				$obsv = '';
				
				/**
				//chama observacoes
				for ($i = 1; $i < 15; $i++) {
					if ($i == 6) {
						$i = 11;
					}
					//variavel
					$obs_ab = $line['pp_abe_' . strzero($i, 2)];

					if (strlen($obs_ab) > 0) {
						$observacoes .= $line['pp_protocolo'] . ': ' . $obs_ab . cr() . cr();
					}
				}
				
					//variavel
					//$observacoes2 = 'Sem observações';
				*/
					
				$sx .= '<tr>';
				//indice
				$sx .= '<td align="center">';
				$sx .= $r + 1;
				$sx .= '</td>';
				
				//protocolo mae
				$sx .= '<td align="center">';
				$sx .= $proto_mae;
				$sx .= '</td>';
				
				//nota 01
				switch ($nt_p01) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro na nota 01!";
						break;
				}
								
				//nota 02
				switch ($nt_p02) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro na nota 02!";
						break;
				}
				//nota 03
				switch ($nt_p03) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro na nota 03!";
						break;
				}
				//nota 04
				switch ($nt_p04) {
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Sim';
						$sx .= '</td>';
						break;
					case '10':
						$sx .= '<td align="center">';
						$sx .= 'Não';
						$sx .= '</td>';
						break;
					case '12':
						$sx .= '<td align="center">';
						$sx .= 'Não aplicável';
						$sx .= '</td>';
						break;						
					default:
						echo "Erro na nota 04!";
						break;
				}
				//nota 05
				switch ($nt_p05) {
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Sim';
						$sx .= '</td>';
						break;
					case '2':
						$sx .= '<td align="center">';
						$sx .= 'Não';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Tenho dúvidas';
						$sx .= '</td>';
						break;
					case '4':
						$sx .= '<td align="center">';
						$sx .= 'Já existe o parecer';
						$sx .= '</td>';
						break;		
					default:
						echo "Erro na nota 05!";
						break;
				}	
				
				//nota 06
				switch ($nt_p06) {
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Sim';
						$sx .= '</td>';
						break;
					case '2':
						$sx .= '<td align="center">';
						$sx .= 'Não';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Tenho dúvidas';
						$sx .= '</td>';
						break;
					case '4':
						$sx .= '<td align="center">';
						$sx .= 'Já existe o parecer';
						$sx .= '</td>';
						break;	
					case '':
						$sx .= '<td align="center">';
						$sx .= ' - ';
						$sx .= '</td>';
						break;		
					default:
						echo "Erro na nota 06!";
						break;
				} 
				
				//comentario
				$sx .= '<td width="50%" align="left">';
				$sx .= $line['pp_abe_01'];
				$sx .= '</td>';				
			
			/**

				//observações
				if (strlen($observacoes) > 0) {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-warning" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body text-left">
									        ' . mst($observacoes) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				} else {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-success" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body">
									        ' . mst($observacoes2) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				}
			}
		
			 * */
			 }
			 $sx .= '</table>';
		$sx .= '</div>';	
		}
		return ($sx);

	}

	/**
	 * documented function
	 * Função para trazer comentários dados pelos avaliadores 
	 *  ao plano submetidos para o edital Jr.
	 * Recebe o protocolo mãe e o plano($proto, $plano) como os parâmetros
	 *
	 * @return $sx
	 * @author elizandro Lima 
	 * Data: 27/07/2016
	 */
	function avaliacao_notas_planos_jr($proto, $plano) {
		$sx = '';
		if ((perfil("#ADM#3AV#CPP") == 1)) {
			$ano = date("Y");
			$sql = "select pp_protocolo_mae, pp_protocolo, pp_avaliador_id, id_pp, 
	                 pp_p01, pp_p02, pp_p03,
	                 pp_p04, pp_p05, pp_p06, pp_p11,
	                 pp_p12, pp_p13, pp_p14,
	                 pp_p15,
	                 pp_abe_01, pp_abe_02, pp_abe_03,
	                 pp_abe_04, pp_abe_05, pp_abe_06,
	                 pp_abe_07, pp_abe_08, pp_abe_09,
	                 pp_abe_10, pp_abe_11, pp_abe_12,
	                 pp_abe_13, pp_abe_14, pp_abe_15,
	                 pp_abe_16, pp_abe_17, pp_abe_18,
	                 pp_abe_19
		        from pibic_parecer_" . $ano . "
		        where pp_protocolo_mae = " . $proto . "
		        and pp_protocolo = " . $plano . "
		        and pp_tipo <> 'SUBMI'
		        and pp_status = 'B'
		        group by pp_abe_01
		        order by id_pp
						";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			
			/*linhas da tabela*/
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				
				//variaveis
				$plano_proj_jr = $plano;
				$proto_mae_jr = $proto;
				
				}
			
			
			//cabecalho
			$sx = '<div class="alert alert-info" style="padding:5px 10px;">';
			$sx .= '<table class="tabela00 lt1" width="100%">';
			$sx .= '<tr class="lt3"><th></th>';
			$sx .= '<tr class="lt3"><th><b></b></th>';
			$sx .= '<th colspan="7" class="lt3">Avaliação do Plano <font color="red">'. $plano_proj_jr . '</font> do Aluno Jr</th></tr>';
			$sx .= '<tr>
							<th>#</th>
							<th align="left" class="lt2">Protocolo mãe</th>	
							<th align="left" class="lt2">Plano</th>
						  <th align="center" class="lt2">Comentários sobre plano do aluno</th>
						</tr>';

			/*linhas da tabela*/
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				//variaveis
				$plano_proj = $plano;
				$proto_mae = $proto;
				$observacoes = 'pp_abe_01';
				$obsv = '';

				$sx .= '<tr>';
				//indice
				$sx .= '<td width="5%" align="center">';
				$sx .= $r + 1;
				$sx .= '</td>';
				
				//protocolo mae
				$sx .= '<td width="15%" align="left">';
				$sx .= $proto;
				$sx .= '</td>';
				
				//protocolo
				$sx .= '<td width="15%" align="left">';
				$sx .= $plano_proj;
				$sx .= '</td>';	
								
				//Comentários
				$sx .= '<td align="left" width="70%">';
				$sx .= $line['pp_abe_11'];
				$sx .= '</td>';

			 }
			 $sx .= '</table>';
		$sx .= '</div>';	
		}

	
		return ($sx);

	}

	function avaliacao_notas_planos_id($proto, $id_plano) {
		$sx = '';
		if ((perfil("#ADM#3AV#CPP") == 1)) {
			$ano = date("Y");
			$sql = "select pp_protocolo_mae, pp_protocolo, pp_avaliador_id, id_pp, 
		                 pp_p01, pp_p02, pp_p03,
		                 pp_p04, pp_p05, pp_p06, pp_p11,
		                 pp_p12, pp_p13, pp_p14,
		                 pp_p15,
		                 pp_abe_01, pp_abe_02, pp_abe_03,
		                 pp_abe_04, pp_abe_05, pp_abe_06,
		                 pp_abe_07, pp_abe_08, pp_abe_09,
		                 pp_abe_10, pp_abe_11, pp_abe_12,
		                 pp_abe_13, pp_abe_14, pp_abe_15,
		                 pp_abe_16, pp_abe_17, pp_abe_18,
		                 pp_abe_19, doc_edital, pj_edital
		        from pibic_parecer_" . $ano . "
		        left join ic_submissao_plano on doc_protocolo_mae = pp_protocolo
						left join ic_submissao_projetos on pj_codigo = pp_protocolo_mae
		        where pp_protocolo_mae = " . $proto . "
		        and id_pj = " . $id_plano . "
		        and pp_tipo <> 'SUBMI'
		        and pp_status = 'B'
						";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			
			
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
					//variaveis
					$plano_proj_aux = $line['pp_protocolo'];;
					$proto_mae_aux = $proto;
				}
			
			//cabecalho
			$sx = '<div class="alert alert-info" style="padding:5px 10px;">';
			$sx .= '<table class="tabela00 lt1" width="100%">';
			$sx .= '<tr class="lt3"><th></th>';
			$sx .= '<tr class="lt3"><th><b></b></th>';
			$sx .= '<th colspan="7" class="lt3">Avaliação do Plano do Aluno <font color="red">'. $plano_proj_aux .' </font></th></tr>';
			$sx .= '<tr>
							<th>#</th>
							<th align="left" class="lt2">Protocolo mãe</th>
							<th align="left" class="lt2">Plano</th>	
							<th align="center" class="lt2">CT_01</th>
							<th align="center" class="lt2">CT_02</th>
							<th align="center" class="lt2">CT_03</th>
							<th align="center" class="lt2">CT_04</th>
							<th align="center" class="lt2">Pergunta</th>
						  <th align="center" class="lt2">Comentários sobre plano do aluno</th>
						</tr>';
			
			/*linhas da tabela*/
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				//notas
				$nt_p01 = $line['pp_p01'];
				$nt_p02 = $line['pp_p02'];
				$nt_p03 = $line['pp_p03'];
				$nt_p04 = $line['pp_p04'];
				$nt_p05 = $line['pp_p05'];
				$nt_p11 = $line['pp_p11'];
				$nt_p12 = $line['pp_p12'];
				$nt_p13 = $line['pp_p13'];
				$nt_p14 = $line['pp_p14'];
				$nt_p15 = $line['pp_p15'];

				//variaveis
				$plano_proj = $line['pp_protocolo'];;
				$proto_mae = $proto;
				$observacoes = 'pp_abe_01';
				$obsv = '';

				//chama observacoes
				for ($i = 1; $i < 15; $i++) {
					if ($i == 6) {
						$i = 11;
					}
					//variavel
					$obs_ab = $line['pp_abe_' . strzero($i, 2)];

					if (strlen($obs_ab) > 0) {
						$observacoes .= $line['pp_protocolo'] . ': ' . $obs_ab . cr() . cr();
					}
				}

				//variavel
				$observacoes2 = 'Sem observações';

				$sx .= '<tr>';
				//indice
				$sx .= '<td align="center">';
				$sx .= $r + 1;
				$sx .= '</td>';
				////protocolo mae
				$sx .= '<td align="center">';
				$sx .= $proto;
				$sx .= '</td>';
				//protocolo
				$sx .= '<td align="center">';
				$sx .= $plano_proj;
				$sx .= '</td>';
				//nota 1
				switch ($nt_p11) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro nota 1!";
						break;
				}
				//nota 2
				switch ($nt_p12) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro nota 2!";
						break;
				}
				//nota 13
				switch ($nt_p13) {
					case '10':
						$sx .= '<td align="center">';
						$sx .= 'Adequado';
						$sx .= '</td>';
						break;
					case '5':
						$sx .= '<td align="center">';
						$sx .= 'Parcialmente adequado';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Inadequado';
						$sx .= '</td>';
						break;
					default:
						echo "Erro nota 13";
						break;
				}
				//nota 14
				switch ($nt_p14) {
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'SIM, deve migrar para o PIBITI';
						$sx .= '</td>';
						break;
					case '2':
						$sx .= '<td align="center">';
						$sx .= 'Não';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Tenho dúvidas';
						$sx .= '</td>';
						break;
					default:
						echo "Erro nota 14!";
						break;
				}						
				
				//comentário
				$sx .= '<td align="left" width="50%">';
				$sx .= $line['pp_abe_11'];
				$sx .= '</td>';

			
			/**

				//observações
				if (strlen($observacoes) > 0) {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-warning" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body text-left">
									        ' . mst($observacoes) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				} else {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-success" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body">
									        ' . mst($observacoes2) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				}
			}
		
			 * */
			 }
			 $sx .= '</table>';
		$sx .= '</div>';	
		}

	
		return ($sx);

	}

	function avaliacao_notas_planos($proto, $plano) {
		$sx = '';
		if ((perfil("#ADM#3AV#CPP") == 1)) {
			$ano = date("Y");
			$sql = "select pp_protocolo_mae, pp_protocolo, pp_avaliador_id, id_pp, 
	                 pp_p01, pp_p02, pp_p03,
	                 pp_p04, pp_p05, pp_p06, pp_p11,
	                 pp_p12, pp_p13, pp_p14,
	                 pp_p15,
	                 pp_abe_01, pp_abe_02, pp_abe_03,
	                 pp_abe_04, pp_abe_05, pp_abe_06,
	                 pp_abe_07, pp_abe_08, pp_abe_09,
	                 pp_abe_10, pp_abe_11, pp_abe_12,
	                 pp_abe_13, pp_abe_14, pp_abe_15,
	                 pp_abe_16, pp_abe_17, pp_abe_18,
	                 pp_abe_19
		        from pibic_parecer_" . $ano . "
		        where pp_protocolo_mae = " . $proto . "
		        and pp_protocolo = " . $plano . "
		        and pp_tipo <> 'SUBMI'
		        and pp_status = 'B'
		        group by pp_abe_01
		        order by id_pp
						";

			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			
			
			
			//cabecalho
			$sx = '<div class="alert alert-info" style="padding:5px 10px;">';
			$sx .= '<table class="tabela00 lt1" width="100%">';
			$sx .= '<tr class="lt3"><th></th>';
			$sx .= '<tr class="lt3"><th><b></b></th>';
			$sx .= '<th colspan="7" class="lt3">Avaliação do Plano do Aluno</th></tr>';
			$sx .= '<tr>
							<th>#</th>
							<th align="left" class="lt2">Plano</th>
							<th align="left" class="lt2">Protocolo mãe</th>	
							<th align="center" class="lt2">CT_01</th>
							<th align="center" class="lt2">CT_02</th>
							<th align="center" class="lt2">CT_03</th>
							<th align="center" class="lt2">Pergunta</th>
						  <th align="center" class="lt2">Comentários sobre plano do aluno</th>
						</tr>';

			/*linhas da tabela*/
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];

				//notas
				$nt_p01 = $line['pp_p01'];
				$nt_p02 = $line['pp_p02'];
				$nt_p03 = $line['pp_p03'];
				$nt_p04 = $line['pp_p04'];
				$nt_p05 = $line['pp_p05'];
				$nt_p11 = $line['pp_p11'];
				$nt_p12 = $line['pp_p12'];
				$nt_p13 = $line['pp_p13'];
				$nt_p14 = $line['pp_p14'];
				$nt_p15 = $line['pp_p15'];

				//variaveis
				$plano_proj = $plano;
				$proto_mae = $proto;
				$observacoes = 'pp_abe_01';
				$obsv = '';

				//chama observacoes
				for ($i = 1; $i < 15; $i++) {
					if ($i == 6) {
						$i = 11;
					}
					//variavel
					$obs_ab = $line['pp_abe_' . strzero($i, 2)];

					if (strlen($obs_ab) > 0) {
						$observacoes .= $line['pp_protocolo'] . ': ' . $obs_ab . cr() . cr();
					}
				}

				//variavel
				$observacoes2 = 'Sem observações';

				$sx .= '<tr>';
				//indice
				$sx .= '<td align="center">';
				$sx .= $r + 1;
				$sx .= '</td>';
				//protocolo
				$sx .= '<td align="center">';
				$sx .= $plano_proj;
				$sx .= '</td>';
				////protocolo mae
				$sx .= '<td align="center">';
				$sx .= $proto;
				$sx .= '</td>';
			
				//nota 1
				switch ($nt_p11) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro!";
						break;
				}
				//nota 2
				switch ($nt_p12) {
					case '20':
						$sx .= '<td align="center">';
						$sx .= 'Excelente';
						$sx .= '</td>';
						break;
					case '15':
						$sx .= '<td align="center">';
						$sx .= 'Muito bom';
						$sx .= '</td>';
						break;
					case '11':
						$sx .= '<td align="center">';
						$sx .= 'Bom';
						$sx .= '</td>';
						break;
					case '7':
						$sx .= '<td align="center">';
						$sx .= 'Regular';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Ruim';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Muito ruim';
						$sx .= '</td>';
						break;	
					default:
						echo "Erro!";
						break;
				}
				//nota 13
				switch ($nt_p13) {
					case '10':
						$sx .= '<td align="center">';
						$sx .= 'Adequado';
						$sx .= '</td>';
						break;
					case '5':
						$sx .= '<td align="center">';
						$sx .= 'Parcialmente adequado';
						$sx .= '</td>';
						break;
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'Inadequado';
						$sx .= '</td>';
						break;
					default:
						echo "Erro!";
						break;
				}
				//nota 14
				switch ($nt_p14) {
					case '1':
						$sx .= '<td align="center">';
						$sx .= 'SIM';
						$sx .= '</td>';
						break;
					case '2':
						$sx .= '<td align="center">';
						$sx .= 'Não';
						$sx .= '</td>';
						break;
					case '3':
						$sx .= '<td align="center">';
						$sx .= 'Tenho dúvidas';
						$sx .= '</td>';
						break;
					default:
						echo "Erro!";
						break;
				}						
				
				$sx .= '<td align="left" width="50%">';
				$sx .= $line['pp_abe_11'];
				$sx .= '</td>';

			
			/**

				//observações
				if (strlen($observacoes) > 0) {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-warning" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body text-left">
									        ' . mst($observacoes) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				} else {
					$sx .= '<td align="center">';
					$sx .= '<button type="button" class="glyphicon glyphicon-comment btn btn-success" data-toggle="modal" data-target="#myModal">
									  Verificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Observações do avaliador</h4>
									      </div>
									      <div class="modal-body">
									        ' . mst($observacoes2) . '
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									      </div>
									    </div>
									  </div>
									</div>';
					$sx .= '</td>';
				}
			}
		
			 * */
			 }
			 $sx .= '</table>';
		$sx .= '</div>';	
		}

	
		return ($sx);

	}

	function normaliza_nota() {
		$ano = date("Y");
		$sql = "SELECT max(ed_nota) as max FROM ic_edital
				WHERE ed_ano = '" . date("Y") . "'";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$max = $rlt[0]['max'];
		$fc_max = 100 / $max;
		$nota = '';
		
		$sql = "select * from ic_edital
					INNER JOIN us_usuario on id_us = ed_professor
					where ed_ano = '$ano' 
					order by us_nome";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<h1>Normalização das notas</h1>';
		$sx .= '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr><th width="20">#</th>
					<th width="80">Protocolo</th>
					<th>Pesquisador</th>
					<th width="80">Nota</th>
				</tr>';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$notaB = $line['ed_nota'];
			$nota = round((($notaB * $fc_max) * 100) / 100);

			//atualiza tabela ic_edital
			$sql_update = "UPDATE ic_edital 
										 SET ed_nota_normalizada = $nota
						   			 WHERE id_ed = " . $line['id_ed'] . cr();
			$this -> db -> query($sql_update);
			
			$sx .= '<tr>';
			$sx .= '<td width="20" align="center">' . ($r + 1) . '</td>';
			$sx .= '<td>' . $line['ed_protocolo'] . '</td>';
			$sx .= '<td>' . link_user($line['us_nome'], $line['id_us']) . '</td>';
			
			$cor = 'blue';
			
			if ($nota < 70) {
				 $cor = 'red';
			}
			
			$sx .= '<td width="20" align="center" style="color: ' . $cor . ';">' . number_format($nota, 2, ',', '.') . '</td>';
		}
		$sx .= '</table>';
		
		return ($sx);
	}

	function atualizar_notas_protocolo($tipo = '', $ano = '') {
		if ($ano == '') {
			$ano = date('Y');
		}
		$sql = "select doc_edital, pp_protocolo, round(1000 * avg(media_notas + resultado.us_fc))/1000 as nota, count(*) as avaliacoes,
					  prof.us_cracha as pf_cracha, prof.id_us as id_pf, prof.us_nome as pf_nome, prof.us_professor_tipo as pf_ss, usuario_titulacao_ust_id as pf_tit 
						from (select  pp_protocolo, pp_protocolo_mae, media_notas, us_fc, pp_avaliador_id 
						      from (select pp_protocolo_mae, pp_protocolo, round(1000 * AVG((pp_p01+pp_p02+pp_p03+pp_p04+pp_p05+pp_p11+pp_p12+pp_p13+pp_p14+pp_p15)/10))/1000 as media_notas, us_fc, pp_avaliador_id
								        from pibic_parecer_" . $ano . "
								        inner join us_usuario on id_us = pp_avaliador_id
								        where pp_tipo = '$tipo'  
								        AND pp_status = 'B'
								        and pp_p01 <> ''
								        group by pp_protocolo, pp_avaliador_id
						           ) as media
						       ) as resultado
					 INNER JOIN ic_submissao_plano ON doc_protocolo = pp_protocolo
					 INNER JOIN us_usuario as prof ON prof.us_cracha = doc_autor_principal
					 group by pp_protocolo, doc_edital, id_pf, prof.us_professor_tipo      
					 order by pp_protocolo, doc_edital, id_pf
		";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		//cabecalho
		$sx = '<table class="tabela00 lt1" width="100%">';
		$sx .= '<tr class="lt3"><b>Edital Geral - Notas individuais atualizadas por protocolo</b></tr>';
		$sx .= '<tr>
							<th width="2%">#</th>
							<th width="8%" align="right">Protocolo</th>
							<th width="5%" align="right">Nota atualizada</th>
							<th width="5%">avaliações</th>
							<th width="8%">edital</th>
							<th width="62%">professor</th>
							<th width="5%">tit.</th>
							<th width="5%">mest./doutor.</th>
						</tr>';

		$tot = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$tot++;

			$proto = $line['pp_protocolo'];
			$nota = $line['nota'];
			$avali = $line['avaliacoes'];
			$edital = $line['doc_edital'];
			$us_prof = $line['pf_nome'] . ' (' . $line['pf_cracha'] . ')';
			$id_pf = $line['id_pf'];
			$titulacao = $line['pf_tit'];
			$ss = $line['pf_ss'];
			$pt_titu = 0;
			$pt_ss = 0;
			if ($titulacao == 6) { $pt_titu = 2;
			}
			if ($ss == 2) { $pt_ss = 2;
			}

			$sx .= '<tr>';

			$sx .= '<td align="center">';
			$sx .= $r + 1;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= $proto;
			$sx .= '</td>';

			$sx .= '<td align="right">';
			$sx .= number_format($nota, 3, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= number_format($avali, 0, '.', ',');
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $edital;
			$sx .= '</td>';

			$sx .= '<td align="left">';
			$sx .= $us_prof;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $pt_titu;
			$sx .= '</td>';

			$sx .= '<td align="center">';
			$sx .= $pt_ss;
			$sx .= '</td>';

			//atualiza tabela ic_edital
			$sql_update = "update ic_edital set ed_nota = '$nota', 
									ed_avaliacoes = $avali,
									ed_edital = '$edital',
									ed_professor = '$id_pf',
									ed_bn_titulacao = $pt_titu,
									ed_bn_ss = $ss
						   where ed_protocolo = '$proto'; " . cr();
			$this -> db -> query($sql_update);
		}

		$sx .= '<tr><td colspan=15 align="right">Total de ' . $tot . ' registros</td></tr>';
		$sx .= '</table>';

		return ($sx);
	}

	function le($id) {
		$sql = "select * from ic_edital
						left join ic_submissao_plano on doc_protocolo = ed_protocolo
						left join(SELECT id_us, 
		                 	us_nome,
						         	us_cracha FROM us_usuario where us_ativo = 1)AS aluno on doc_aluno = aluno.us_cracha
						         	WHERE id_ed = " . round($id);
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) > 0) {
			$line = $rlt[0];
			return ($line);
		} else {
			result(array());
		}
	}

	function mostra_modalidades($data, $data2) {
		$edital     = $data['ed_edital'];
		$idx        = $data['ed_modalidade'];
		$id         = $data['id_ed'];
		$ed_id_prof = $data['ed_professor'];
		$ano        = $data['ed_ano'];
		$prof_tit   = $data2['usuario_titulacao_ust_id'];

		/* Salvar */
		$rs = get("dd20");
		if ($rs > 0) {
			$sql = "update ic_edital set ed_modalidade = $rs where id_ed = " . $id;
			$this -> db -> query($sql);
			$this -> load -> view('header/windows_close_only', null);
			return ('');
		}
		
		$sql2 = "SELECT * from ic_edital
					 	 INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
						 WHERE ed_ano = '$ano' and ed_professor = $ed_id_prof and ed_edital = '$edital' ";
		$rlt = $this -> db -> query($sql2);
		$rlt = $rlt -> result_array();
		
		$id_modalidade = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id_modalidade = $line['ed_modalidade'];
		}
		
		switch ($edital) {
//*############################  INDICAÇÃO DE BOLSAS PIBIC    #######################################################*/			
			case 'PIBIC':
					if ($idx == $idx) {
							//mostra bolsa PUC, mesmo que já tenha uma indicada
							if (($id_modalidade == '3' ) or 
									($id_modalidade == '4' ) or 
					        ($id_modalidade == '5' ) or 
					        ($id_modalidade == '14') or
					        ($id_modalidade == '16') or
					        ($id_modalidade == '17') or 
					        ($id_modalidade == '18')  
					    ) {
									$sql = "SELECT * from ic_modalidade_bolsa 
											WHERE mb_tipo_2 = '$edital'
							        and mb_ativo = 1 
							        and mb_ano_edicao = '$ano' 
											order by mb_descricao
										 ";
									break;
							} else {
											//não mostra a mesma bolsa que já tenha sido indicada, menos a PUC que pode ter mais de uma
											$sql = "SELECT * from ic_modalidade_bolsa 
															WHERE mb_tipo_2 = '$edital'
															       and mb_ativo = 1 
															       and mb_ano_edicao = '$ano' 
															       and id_mb not in (
																						            SELECT ed_modalidade from ic_edital
																											 	INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
																												WHERE ed_ano = '$ano' 
																						            and ed_professor = '$ed_id_prof' 
																						            and ed_edital = '$edital'          
																						            )     
															order by mb_descricao
															";
												break;
									}
						} else {
							//mostra todas as modalidades de bolsas
							$sql = "select * from ic_modalidade_bolsa WHERE (mb_tipo_2 = '$edital' and mb_ativo = 1 and mb_ano_edicao = '2016') order by mb_descricao ";
							break;
						}	
							
//*############################  INDICAÇÃO DE BOLSAS PIBITI   #######################################################*/		
			case 'PIBITI':
				if ($idx == $idx) {
					//caso o prof. já tenha recebido uma dessas bolsas, para um proximo plano ele pode indicar mais uma bolsa da mesma modalidade
					if (($id_modalidade == '8')  or 
					    ($id_modalidade == '9' ) or
					    ($id_modalidade == '21') or 
					    ($id_modalidade == '23') or 
					    ($id_modalidade == '27') or
					    ($id_modalidade == '28') or   
					    ($id_modalidade == '2')  
					    ) {
					$sql = "SELECT * from ic_modalidade_bolsa 
									WHERE mb_tipo_2 = '$edital'
					        and mb_ativo = 1 
					        and mb_ano_edicao = '$ano' 
									order by mb_descricao
								 ";
							break;
					} else {
							//não mostra a bolsa da mesma modalidade caso o prof. já tenha recebido ela na indicação
							$sql = "SELECT * from ic_modalidade_bolsa 
											WHERE mb_tipo_2 = '$edital'
											       and mb_ativo = 1 
											       and mb_ano_edicao = '$ano' 
											       and id_mb not in (
																		            SELECT ed_modalidade from ic_edital
																							 	INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
																								WHERE ed_ano = '$ano' 
																		            and ed_professor = '$ed_id_prof' 
																		            and ed_edital = '$edital'          
																		            )     
											order by mb_descricao
											";
								break;
					}
								
			} else {
				$sql = "select * from ic_modalidade_bolsa WHERE (mb_tipo_2 = '$edital' and mb_ativo = 1 and mb_ano_edicao = '2016') order by mb_descricao ";
				break;
			}
			
//*############################   INDICAÇÃO DE BOLSAS JR     #######################################################*/			
			case 'PIBICEM':
				if ($idx == $idx) {
					if (($id_modalidade == '24') or 
					    ($id_modalidade == '25') or
					    ($id_modalidade == '42')   
					    ) {
									$sql = "SELECT * from ic_modalidade_bolsa 
													WHERE mb_tipo_2 = '$edital'
									        and mb_ativo = 1 
									        and mb_ano_edicao = '$ano' 
													order by mb_descricao
												 ";
											break;
									} else {
											$sql = "SELECT * from ic_modalidade_bolsa 
															WHERE mb_tipo_2 = '$edital'
															       and mb_ativo = 1 
															       and mb_ano_edicao = '$ano' 
															       and id_mb not in (
																		            SELECT ed_modalidade from ic_edital
																							 	INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
																								WHERE ed_ano = '$ano' 
																		            and ed_professor = '$ed_id_prof' 
																		            and ed_edital = '$edital'          
																		            )     
											order by mb_descricao
											";
								break;
					}
			} else {
				$sql = "select * from ic_modalidade_bolsa WHERE (mb_tipo_2 = '$edital' and mb_ativo = 1 and mb_ano_edicao = '2016') order by mb_descricao ";
				break;
			}
			default :
				echo "Erro ao indicar bolsa!";
				break;
		}
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '<form method="post" action="' . base_url('index.php/ic/indicar_bolsa_ed/' . $data['id_ed'] . '/' . checkpost_link($data['id_ed'])) . '">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$chk = '';
			if ($idx == $line['id_mb']) { $chk = 'checked';
			}
			$sx .= '<input type="radio" name="dd20" value="' . $line['id_mb'] . '" ' . $chk . '>' . $line['mb_descricao'] . '<br>';
		}
		$sx .= '</br><input type="submit" class="btn btn-primary" value="indicar">';
		
		return ($sx);
	}

	function mostra_indicacoes_professor($id_us, $edital, $ano) {
		$sql = "SELECT * from ic_edital
						INNER JOIN ic_modalidade_bolsa ON id_mb = ed_modalidade
						left join ic_submissao_projetos on pj_codigo = ed_protocolo_mae
						left join ic_submissao_plano  on doc_protocolo_mae = pj_codigo
						LEFT JOIN us_usuario on us_cracha = doc_aluno 
						WHERE ed_ano = '$ano' 
						and ed_professor = '$id_us' 
						and ed_edital = '$edital'
						AND pj_status = 'B'
						AND doc_status = 'B'
						GROUP BY ed_protocolo
					
					";	
					
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			
			$id_modalidade = $line['id_mb'];
			$orientador = $line['ed_professor'];
			$id_edital_bolsa = $line['ed_edital'];
			$plano = $line['ed_protocolo'];
			$estudante = $line['us_nome'];

			$link_edital = '<a href="'. base_url('index.php/ic/remover_bolsa_indicada/'.$plano .'/'. $orientador .'/'. $id_edital_bolsa.'/'.$ano).'"  class="link nopr">';
			
			if (strlen($estudante) > 0) {
					$sx .= '<div class="btn btn-info" style="width: 100%; margin-bottom: 5px; text-align:left;">';
					$sx .= $link_edital.$line['mb_descricao'].' Plano: ' .$plano.' aluno: '.$estudante.''.'</a>';
					//$sx .= $line['mb_descricao'].' Plano: ' .$plano.' aluno: '.$estudante;
					$sx .= '</div>';
				} else {
					$sx .= '<div class="btn btn-info" style="width: 100%; margin-bottom: 5px; text-align:left;">';
					$sx .= $line['mb_descricao'].' Plano: ' .$plano.' Aluno: '.$estudante;  
					$sx .= '</div>';
				}
	
			}
		return ($sx);
	}
	
	function remover_bolsa_modalidade_indicada($plano, $id_orientador, $id_edital, $ano){
		$sql = "update ic_edital set ed_modalidade = 'null'
						WHERE ed_ano = '$ano' 
						and ed_professor = '$id_orientador' 
						and ed_edital = '$id_edital'
						and ed_protocolo = '$plano'
						";
		$rlt = $this -> db -> query($sql);
		exit;
	}
	
	function resumo_bolsas_indicadas($id_edital, $ano) {
		$sql = "select CASE
											WHEN mb_descricao IS NULL THEN 'Sem indicação'
									 ELSE mb_descricao          
									 END  as bolsas, 
						count(ed_modalidade) as qtd
						FROM ic_edital
						left join ic_modalidade_bolsa on ed_modalidade = id_mb 
						where ed_edital = '$id_edital'
						and ed_ano = '$ano'
						group by ed_modalidade";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		
		//Colunas da tabela
		$sx = '<table class="tabela00 lt3" width="40%" border="1 solid">';
		$sx .= '<tr><td colspan=2 align="center" class="lt3"><font color="red"><i>Bolsas Indicadas</i></font></tr>';	
		$sx .= '<tr><th align="center">Modalidade</th>
							  <th align="center">Bolsa indicada</th>
						</tr>';
		$tot = 0;				
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			
			//acumulador
			$tot++;
			
			$sx .= '<tr>';		
			//Variaveis
			$nome_bolsa = $line['bolsas'];
			$total = $line['qtd'];
			//nome da bolsa
			$sx .= '<td align="left" class="border1 lt2" width="70%">';
			$sx .= $nome_bolsa;
			$sx .= '</td>';
			//Quantidade indicada
			$sx .= '<td align="center" class="border1 lt2" width="30%">';
			$sx .= $total;
			$sx .= '</td>';
			
			$sx .= '</tr>';
			
		}
		$sx .= '</table>';
		return ($sx);
	}
	
}
?>