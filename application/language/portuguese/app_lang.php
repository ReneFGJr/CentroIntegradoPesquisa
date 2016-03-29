<?php
if (!function_exists(('msg')))
	{
		function msg($t)
			{
				$CI = &get_instance();
				if (strlen($CI->lang->line($t)) > 0)
					{
						return($CI->lang->line($t));
					} else {
						return($t);
					}
			}
	}
$lang['titulo_pesquisa'] = 'Título do projeto do professor';
$lang['submit_PIBIC'] = 'Submissão IC';
$lang['area_conhecimento'] = 'Área do conhecimento';
$lang['area_estrategica'] = 'Área do estratégica (se aplicado)';
$lang['submit_PIBIC_text'] = 'Submissão de projetos e planos do PIBIC, PIBITI e PIBIC (jr)';
$lang['editar_impedimento'] = 'inpedimento do perfil';
$lang['shortcuts'] = 'Acesso rápido';
$lang['bt_search'] = 'Busca';
$lang['bt_clear'] = 'Limpa filtro';
$lang['bt_new'] = 'Novo registro';
$lang['situacao'] = 'situação';
$lang['vinculo'] = 'vínculo';
$lang['dt_atualizacao'] = 'Última atualização';
$lang['edital_ano'] = 'ano do edital';
$lang['inicio_vigencia'] = 'início da vigência';
$lang['duracao'] = 'duração';
$lang['prorrogacao'] = 'prorrogação';
$lang['agencia'] = 'agência';
$lang['participacao'] = 'participação';
$lang['Isencoes'] = 'Isenções';
$lang['isencoes'] = 'isenções';
$lang['artigos'] = 'Artigos';
$lang['Isencoes_!'] = 'Isenções para indicar';
$lang['Isencoes_A'] = 'Isenções em processo de liberação';
$lang['Isencoes_H'] = 'Isenções concedidas';
$lang['Isencoes_X'] = 'Isenção com processo cancelado';
$lang['Isencoes_Z'] = 'Isenções com vigência expirada';
$lang['isencoes_para_indicar'] = 'Isenções para indicar';
$lang['isencoes_ativas'] = 'Isenções ativas';
$lang['comunicacao'] = 'Comunicação';

$lang['modalidade_M'] = 'Mestrado';
$lang['modalidade_D'] = 'Doutorado';
$lang['modalidade_P'] = 'Pós-Doutorado';
$lang['modalidade_O'] = 'Mst. Profissional';
$lang['SS'] = 'stricto sensu';
$lang['lancar_valor_isencao'] = 'Lançar Valores da Renúncia';
$lang['captacao_bonificacoes'] = 'Bonificações e Isenções';

$lang['lb_bn_rf_valor'] = 'Valor da parcela de isenção';
$lang['lb_bn_rf_parcela'] = 'Número de parcelas a isentar';

	
/* Menu Princicpal */
$lang['submit_ICMST'] = 'PIBIC MASTER';
$lang['submit_ICMST_text'] = 'Submissão para o Edital do PIBIC Master';
$lang['pj_aluno'] = 'Estudante';
$lang['submit_'] = 'Submissão';

$lang['export_to_excel'] = 'Exportar para o Excel';
$lang['update'] = 'Atualizar';
/* Genero */
$lang['genero_M'] = 'Masculino';
$lang['genero_F'] = 'Feminino';

$lang['conversao_bolsa_cip_para_capes'] = 'Conversão de Bolsa CIP para CAPES';
$lang['isencao_reabirir'] = 'Reabrir isençao do professor?';
$lang['isencao_confirmar'] = 'Confirmar liberação da bolsa?';
$lang['submit'] = 'Confirmar operação';

/* Artigos */
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_recursos'] = 'Estratificação';
$lang['artigo_arquivos'] = 'Arquivos comprobatórios';
$lang['artigo_confirmacao'] = 'Confirmação';
$lang['artigo_historico'] = 'Histórico de tramitação';

$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['ver_isencoes'] = 'Ver, indicar e acompanhar isenções';
	
/* Captacao */
$lang['captacao_dados'] = 'Informações sobre a captação';
$lang['captacao_recursos'] = 'Recursos captados';
$lang['captacao_arquivos'] = 'Arquivos comprobatórios';
$lang['captacao_confirmacao'] = 'Validação e Finalização';
$lang['captacao_edital'] = 'Informações sobre o edital';
$lang['captacao_perfil'] = 'Perfil do projeto de captação';
$lang['captacao_descricao'] = 'Vinculo da captação com projeto de pesquisa';
$lang['captacao_titulo'] = 'Título do projeto de pesquisa';
$lang['captacao_programa'] = 'Projeto vinculado ao programa';
$lang['captacao_vigencia_inicio '] = 'Início da vigência da captação';
$lang['captacao_duracao'] = 'Duração do recurso';
$lang['captacao_prorrogacao'] = 'Prorrogação';
$lang['captacao_vigencia'] = 'Sobre a vigência dos recursos captados';
$lang['ca_vlr_capital'] = 'Valor em capital';
$lang['ca_vlr_custeio'] = 'Valor em custeio';
$lang['ca_vlr_bolsa'] = 'Valor em bolsas';
$lang['ca_vlr_outros'] = 'Outras rúbricas (serviços)';
$lang['ca_proponente_vlr'] = 'Valor total aplicado na PUCPR';
$lang['ca_proponente'] = 'Proponente da captação';
$lang['ca_contexto'] = 'Informe o contexto<br>da captação (informativo)';
$lang['capt_file_texto'] = 'Deve ser anexado os documentos comprobatórios e de aprovação dos recursos.';
$lang['send'] = 'Confirmar e finalizar o cadastro >>>';
$lang['fomente_agencia'] = 'Agência de fomento / Financiador';
$lang['fomento_edital'] = 'Nr. do Edital (fomento)';
$lang['fomento_processo'] = 'Nr. Processo / Convênio';
$lang['fomento_ed_ano'] = 'Ano do Edital';
$lang['validation'] = 'Validação';
$lang['validataion_ok'] = 'Todos os campos obrigatório foram validados';
$lang['validataion_error'] = 'Existem campos não preenchido ou faltando informações';
$lang['rule'] = 'Regra';
$lang['chk'] = 'Validação';
$lang['file_posted'] = 'Arquivo(s) postado';
$lang['nao_aplicado'] = 'Não aplicado';
$lang['captacao_historico'] = 'Histórico de tramitação';
$lang['validacao_coordenador'] = 'Validação do Coordenador';
$lang['ARTI'] = 'Bonificação de Artigos';
$lang['CAPT'] = 'Captação de Recursos';
$lang['IC'] = 'Iniciação Científica';
$lang['ic_ativa'] = 'Orientações ativas';
$lang['ic_finalizados'] = 'Orientações concluídas';
$lang['save_next'] = 'Salvar e continuar >>';
$lang['save'] = 'Salvar >>';	
$lang['continuous_flow'] = 'Fluxo contínuo';
$lang['validacao_coordenador_link'] = 'ver validações necessárias';
$lang['captacoes'] = 'captações';
$lang['artigos'] = 'artigos';
$lang['captacao_liberacao_coordeador'] = 'Análise e deliberação do Coordenador do Programa';
$lang['captacao_vigencia_inicio'] = 'Início da vigência';
$lang['ca_duracao'] = 'Duração da captação';
$lang['ca_programa'] = 'Vinculo com o programa de Pós-Graduação';
/***************************************************************************************************/
/************************************************************************************** C I P ******/
$lang['SELECIONA_IDIOMA'] = 'Selecionar Idioma >>';
$lang['SELECIONA_AREA'] = 'Selecionar Área >>';
$lang['bt_submit_confirm'] = 'Confirmar envio >>>';
$lang['protocolo_botao_form_ic_rp'] = 'Enviar Relatório Parcial';
$lang['protocolo_botao_form_ic_rpc'] = 'Enviar Correções do Relatório Parcial';
$lang['sw_ic_rel_pacial'] = 'Submissão do Relatório Parcial';
$lang['sw_ic_rel_pacial_correcao'] = 'Submissão do Relatório Parcial (Correção)';
$lang['sw_ic_form_acompanhamento'] = 'Submissão do questionário de acompanhamento';
$lang['sw_ic_rel_final'] = 'Submissão do Relatório Final';
$lang['sw_ic_rel_final_correcao'] = 'Submissão do Relatório Final (Correção)';
$lang['sw_ic_resumo'] = 'Submissão do Resumo';
$lang['sw_ic_validacao'] = 'Sistema de avaliação';
$lang['sw_ic_submissao'] = 'Submissão de propostas';

/* Artigos */

$lang['artigos_cadastrados'] = 'Artigos cadastrados';
$lang['artigo_ver_cadastro'] = 'ver e cadastrar artigos';
$lang['captacao_ver_cadastro'] = 'ver e cadastrar projetos';
$lang['captacaoes_cadastrados'] = 'Captações cadastradas';

$lang['cap_em_cadastro'] = 'Em cadastro';
$lang['cap_devolvido_correcoes'] = 'Correção do professor';
$lang['cap_validacao_coordenador'] = 'Validação do coordenador';
$lang['cap_validacao_diretoria'] = 'Validação da diretoria';
$lang['cap_comunicacao'] = 'Para comunicação';
$lang['cap_finalizado'] = 'Finalizado';
$lang['cap_validacao_secretaria'] = 'Validação Documental';
$lang['cap_acao_coordenador'] = 'ação do coordenador';
$lang['cap_acao_secretaria'] = 'ação da secretaria';
$lang['cap_acao_diretoria'] = 'ação da diretoria';

/* GED */
$lang['none_file_posted'] = 'Nenhum arquivo postado';
$lang['file_tipo'] = 'Tipo de Arquivo';
$lang['upload_submit'] = 'Enviar arquivo';
$lang['file_req'] = 'Requisitos';
$lang['not_defined'] = '::: Não selecionado :::';
$lang['ged_upload'] = 'Enviar arquivo >>>';

$lang['ic_semic_area'] = 'Área do Conhecimento';
$lang['ic_semic_idioma'] = 'Idioma de Apresentação';
$lang['ic_arquivos'] = 'Apresentação de Documentos';
	
/* pagina de usuarios */
$lang['messagem_cadastradas'] = 'Mensagens / Comunicações';
$lang['comunicacoes_cadastradas'] = 'Comunicações por e-mail';
$lang['page_usuarios'] = 'Cadastro de pessoas';
$lang['add_email'] = 'novo e-mail';

$lang['lb_us_nome'] 	= 'Nome';
$lang['lb_us_cracha'] 	= 'Cracha';
$lang['lb_us_cpf'] 	= 'CPF';
$lang['lb_us_dt_nascimento'] 	= 'Data de Nascimento';
$lang['lb_us_genero'] 	= 'Gênero';
$lang['lb_usu_tipo'] 	= 'Tipo';
$lang['lb_us_codigo_rh'] 	= 'Codigo RH';
$lang['lb_usu_funcao'] 	= 'Função';
$lang['lb_usu_titulacao'] 	= 'Titulação';
$lang['lb_us_nome_lattes'] 	= 'Nome no Lattes';
$lang['lb_us_link_lattes'] 	= 'Link Lattes';
$lang['lb_us_regime'] 	= 'Regime';
$lang['lb_eq_ativo_2'] 	= 'Ativo';
$lang['lb_us_curso_vinculo'] 	= 'Curso Vínculo';
$lang['lb_us_escola_vinculo'] 	= 'Escola Vínculo';
$lang['lb_user_teste'] 	= 'Usuário teste';
$lang['us_genero'] = 'Gênero';
$lang['lb_us_ativo'] = 'Usuário ativo'; 
$lang['us_titulacao'] = 'Titulação';
$lang['lb_us_origem'] 	= 'Origem';
$lang['instituicao'] = 'Instituição';
$lang['lb_us_professor_tipo'] 	= 'Professor Tipo';
$lang['lb_us_usuario_cursando'] 	= 'Cursando';
$lang['lb_user_conclusao_em'] 	= 'Cursou ensino médio em escola pública? ';

$lang['lb_blu_motivo'] 		= 'Motivo do impedimento';
$lang['lb_blu_dt_inicio'] = 'Data início do impedimento ';
$lang['lb_blu_dt_fim'] 		= 'Data fim do impedimento';
$lang['lb_blu_ativo'] 		= 'Deseja ativar impedimento?';



/* Contratos IC */
$lang['lb_icc_modelo_contrato'] = 'Modelo de Contrato';
$lang['lb_icc_ano_contrato'] = 'Ano';
$lang['lb_icc_modalidade_bolsa'] = 'Modalidade da bolsa';
$lang['lb_icc_tit_model_contrato'] = 'Modelo de contrato';
$lang['lb_icc_texto_contrato'] = 'Texto do Contrato)';
$lang['lb_mensagens_title'] = 'Construção do Modelo de Contrato';

$lang['versao'] = 'v0.16.10';
/* Fundo de Pesquisa */
$lang['page_fundo'] = 'Fundo de Pesquisa';


$lang['protocolo_botao_form_pre'] = 'Preencher formulário de acompanhamento';
$lang['lb_form_prof_inf'] = '<p class="lt3">Prezado orientador, este questionário tem como objetivo realizar um acompanhamento das ativididades e emprenho do seu aluno na Iniciação Científica e Tecnológica. Todas as questões são obrigatórias, existe um espaço livre ao final do formulário para seus comentários.</p>
							 <p class="lt3">Destacamos que este formulário não será encaminhado para seu orientando.</p><BR><BR>';

/***************************** PIBIC */
$lang['ic_atividade_aberta'] = 'Atividades para entrega';
$lang['IC_FORM_RP'] = 'Entrega do Relatório Parcial (professor)';
$lang['IC_FORM_RPC'] = 'Entrega das Correções do Relatório Parcial (professor)';
$lang['IC_FORM_PROF'] = 'Formulário de acompanhamento (professor)';
$lang['IC_FORM_ESTU'] = 'Formulário de acompanhamento (estudante)';
$lang['bt_entregar'] = 'Entregar Atividade';

$lang['protocolo_F'] = 'Finalizados';
$lang['protocolo_A'] = 'Abertos';
$lang['protocolo_C'] = 'Indeferidos / cancelados';

$lang['nao_postado'] = 'não postado';
$lang['resumo_postado'] = 'resumo postado';
$lang['list_arquivos'] = 'Arquivos postados';

/* Status */
$lang['status_protocolo_C'] = 'Cancelado';
$lang['status_protocolo_A'] = 'Aberto';
$lang['status_protocolo_B'] = 'Em análise';
$lang['status_protocolo_F'] = 'Finalizado';

/* IC */
$lang['protocolo_ic_ALT'] = 'Substituição de estudante';
$lang['protocolo_ic_CAN'] = 'Cancelamento de orientação';
$lang['protocolo_ic_CAN_info'] = 'Informe a orientação que deseja solicitar cancelamento.';
$lang['protocolo_botao_CAN'] = 'Solicitar cancelamento de orientação deste trabalho';

$lang['protocolo_ic_SBS'] = 'Substituição de estudante';
$lang['protocolo_botao_SBS'] = 'Solicitar substituição de estudante';
$lang['codigo_aluno_novo'] = 'Código do novo aluno';

$lang['protocolo_ic_RCS'] = 'Recurso de avaliação';
$lang['protocolo_ic_RSM'] = 'Recurso para o SEMIC';

$lang['justify'] = 'Justificativa';
$lang['pr_descricao'] = 'Motivo do cancelamento';
$lang['pr_confirm_cancel'] = 'Confirmar cancelamento';
$lang['bt_confirm'] = 'Confirmar >>>';
$lang['::select an option::'] = ':: Selecione uma opção ::';
$lang['Already_exists_protocol'] = 'Já existe um protocolo aberto deste tipo';
$lang['pr_confirm_sbs'] = 'Confirmar solicitação de substituíção';

$lang['proto_th_open'] = 'abertas';
$lang['proto_th_close'] = 'fechadas';
$lang['proto_th_cancel'] = 'canceladas';
$lang['request'] = 'Solicitações';
$lang['protocol_successful'] = 'Protocolo aberto com sucesso!';
$lang['guidelines_ic'] = 'Orientações IC/IT';
$lang['codigo_aluno_novo'] = 'Informe o código do novo estudante';
$lang['pr_descricao_sbs'] = 'Motivo da substituição';
$lang['successful'] = 'Operação realizada com sucesso!';

$lang['lb_mb_descricao'] = 'Descrição';
$lang['lb_mb_tipo'] = 'Tipo';
$lang['lb_mb_ativo'] = 'Bolsa Ativa';
$lang['lb_mb_moeda'] = 'Moeda'; 	
$lang['lb_mb_valor'] = 'Valor da bolsa';
$lang['lb_mb_fomento'] = 'Fomento';
$lang['lb_mb_titulo'] = 'Gestão das modalidades de Bolsas de IC';

$lang['lb_usc_banco'] = 'Banco';
$lang['lb_usc_agencia'] = 'Agencia';
$lang['lb_usc_conta'] = 'Conta';
$lang['lb_usc_tipo'] = 'Tipo de Conta';
$lang['lb_usc_modo'] = 'Modo';
$lang['lb_sem_conta'] = 'Sem conta cadastrada';

$lang['lb_pa_TT_lista_registro'] = 'Acompanhamento de estudantes';
$lang['lb_pa_protocolo'] = 'Protocolo';
$lang['lb_pa_usuario_id'] = 'Usuário';
$lang['lb_pa_status'] = 'Status';

/** Fomularios ******/
 /** para aluno */
$lang['lb_form_aluno_pa1'] = '1) Você tem participado das discussões com o grupo de pesquisa do professor orientador ?';
$lang['lb_form_aluno_pa2'] = '2) No grupo de pesquisa tenho contato com:';
$lang['lb_form_aluno_pa3'] = '3) Com que frequência você tem encontrado com seu orientador ?';
$lang['lb_form_aluno_pa4'] = '4) Seu contato com professor orientador é: ';
$lang['lb_form_aluno_pa5'] = '5) Até este momento realizei:';
$lang['lb_form_aluno_pa6'] = '6) O cronograma do meu plano de atividades está: ';
$lang['lb_form_aluno_pa7'] = '7) Você mantém seu curricullum lattes atualizado? ';
$lang['lb_form_aluno_pa8'] = '8) Já incluiu seu projeto de PIBIC/PIBITI?';
$lang['lb_form_aluno_pa9'] = '9) Qual sua avaliação geral sobre sua experiência no PIBIC/PIBITI ?';
$lang['lb_form_aluno_pa10'] = 'Descrever atividades';

 /** para professor */
$lang['lb_form_prof_pa1'] = '1)	O estudante tem participado das discussões com seu grupo de pesquisa?';
$lang['lb_form_prof_pa2'] = '2)	Com que frequência você tem encontrado com seu orientado? ';
$lang['lb_form_prof_pa3'] = '3)	Seu contato com o estudante é: ';
$lang['lb_form_prof_pa4'] = '4)	O cronograma do plano de atividades está: ';
$lang['lb_form_prof_pa5'] = '5)	Há indícios de displicência do estudante com as atividades de pesquisa? ';
$lang['lb_form_prof_pa6'] = '6)	Espaço livre para algum comentário';
$lang['lb_form_prof_pa7'] = '6)	Comentários Gerais.';

//Perguntas do formulário de acompanhamento do professor com o aluno
//pergunta 01
$lang['lb_form_prof_pa1_1'] = 'Sim';
$lang['lb_form_prof_pa1_2'] = 'Não';
//pergunta 02

//pergunta 03
$lang['lb_form_prof_pa3_1'] = 'Contato por e-mail';
$lang['lb_form_prof_pa3_2'] = 'Presencial';
$lang['lb_form_prof_pa3_3'] = 'Por e-mail e presencial';
//pergunta 04
$lang['lb_form_prof_pa4_1'] = 'Esta em dia';
$lang['lb_form_prof_pa4_2'] = 'No momento atrasado';
$lang['lb_form_prof_pa4_3'] = 'Adiantado';
//pergunta 05
$lang['lb_form_prof_pa5_1'] = 'Sim';
$lang['lb_form_prof_pa5_2'] = 'Não';



/****************************** AVALIADORES */
$lang['desactive'] = 'desativar';
$lang['active'] = 'ativar';
$lang['avaliador'] = 'avaliador';
$lang['desativar_como_avaliador'] = 'desativar avaliador';
$lang['ativar_como_avaliador'] = 'ativar como avaliador';
$lang['active_area'] = 'Ativar área';
$lang['add_area'] = 'Incorporado área';

$lang['add_area'] = 'Incorporado área';
$lang['aceitar_avaliacao'] = 'ACEITAR';
$lang['recusar_avaliacao'] = 'RECUSAR';
$lang['recusar_avaliacao_confirma'] = 'GRAVAR RECUSA >>';

$lang['lb_ic_avaliaçãoes_pendentes'] = 'Avaliações';

/* Perfil */
$lang['captacao_academica'] = 'Total de captações acadêmicas';
$lang['captacao_institucional'] =  'Total de captação institucionais';
/*****************************************************************/
$lang['page_docentes'] = 'Docentes';
$lang['page_avaliadores'] = 'Avaliadores';
$lang['page_discente'] = 'Discentes';
$lang['Vigencia'] = 'Vigência';
$lang['Orientador'] = 'Orientador';

$lang['pt_BR'] = 'Português';
$lang['us_EN'] = 'Inglês';
$lang['en'] = 'Inglês';
$lang['Orientador'] = 'Orientador';
$lang['Areas'] = 'Áreas';
$lang['area_nao_definida'] = 'Área não definida';

$lang['email_modificar'] = 'Atualizar e-mail';
$lang['email_excluir'] = 'Excluir e-mail';
$lang['email_adicionar'] = 'Adicionar e-mail';
$lang['email_sem'] = 'Sem e-mail';
$lang['email_ok'] = 'E-mail ok';

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/* Ciencia sem fronteiras */
$lang['csf_bt_cancelar'] 			= 'Cancelar processo';
$lang['csf_bt_homologar_no'] 		= 'Não homologado';
$lang['csf_bt_homologar'] 			= 'Homologado pela Instituição';
$lang['csf_bt_homologar_capes_no'] 	= 'Não homologado pela CAPES/CNPq';
$lang['csf_bt_homologar_capes'] 	= 'Homologação da CAPES/CNPq';
$lang['csf_bt_homologar_parceiro'] 	= 'Aceite do Parceiro';
$lang['csf_bt_desistente'] 			= 'Desistente';
$lang['csf_bt_viagem'] 				= 'Saída do Brasil';
$lang['csf_bt_fim_viagem'] 			= 'Retorno ao Brasil';
$lang['csf_bt_troca_universidade'] 	= 'Troca de Univerisdade';
$lang['csf_bt_troca_pais'] 			= 'Troca de país';
$lang['scf_historico'] 				= 'Histórico';
$lang['csf_bt_retorno'] 			= 'Retorno antecipado';
$lang['last_harvesting'] 			= 'Última coleta';

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/* Grupos de Pesquisa */
$lang['gp_situacao'] 				= 'Situação';
$lang['espelho_cnpq'] 				= 'Espelho (DGP)';
$lang['gp_ano_formacao'] 			= 'Ano de formação';
$lang['gp_instituicao_grupo'] 		= 'Instituíção';
$lang['gp_cidade'] 					= 'Cidade';
$lang['gp_data'] 					= 'Dados do grupo';
$lang['csf_title_novo'] 			= 'Novo registro de aluno - CSF';
$lang['nome_linha'] 				= 'Nome da linha de pesquisa';
$lang['dgp_pesquisadores'] 			= 'Pesquisadores';
$lang['dgp_estudantes'] 			= 'Estudantes';
$lang['dgp_espelho'] 				= 'Link do CNPq';
$lang['last_update'] 				= 'Atualizado CNPq';
$lang['gpus_cnpq_nome'] 			= 'nome';
$lang['dgp_linhas'] 				= 'Linhas de pesquisa';
$lang['gpus_titulacao_max'] 		= 'Titulação';
$lang['gpus_dt_inclusao'] 			= 'Dt. Inclusão';
$lang['dgp_membros'] 				= 'Membros do Grupo';


/* Ciencia sem fronteiras Parceiros */
$lang['Label_csf_descricao_parceiro'] = 'Parceiro';
$lang['Label_csf_nome_pais_parceiro'] = 'Pais';
$lang['Label_csf_ativo_parceiro'] 	  = 'Status';
$lang['Label_csf_contato_parceiro']   = 'Contato';
$lang['Label_csf_email1_parceiro']    = 'E-mail 1';
$lang['Label_csf_email2_parceiro']    = 'E-mail 2';
$lang['Label_csf_phone1_parceiro']    = 'Fone 1';
$lang['Label_csf_phone2_parceiro']    = 'Fone 2';
$lang['Label_csf_site_parceiro']      = 'Site';
$lang['Label_index_parceiros'] 	  	  = 'Lista de parceiros';
$lang['Label_editar_parceiros'] 	  = 'Editar parceiro';
$lang['Label_csf_edital'] 	  		  = 'Edital';


/*Fomento*/
$lang['fm_titulo'] 			= 'Nome da chamada';
$lang['fm_titulo_swb'] 			= '2nd SWB Experience - PUCPR';
$lang['fm_titulo_email'] 	= 'Titulo do e-mail(opcional)';
$lang['fm_agencia'] 		= 'Agência';
$lang['fm_idioma'] 			= 'Idioma';
$lang['fm_chamada'] 		= 'Chamada';
$lang['fm_status'] 			= 'Status';
$lang['fm_autor'] 			= 'Responsável (LOGIN)';
$lang['fm_corpo'] 			= 'Corpo';
$lang['fm_url_externa'] 	= 'Link da chamada';
$lang['fm_total_visualizacoes'] = 'Total de visualizações';
$lang['fm_local'] 			= 'Local';
$lang['fm_disseminador'] 	= 'Disseminador';
$lang['fm_tipo_edital'] 	= 'Tipo de edital';
$lang['fm_fluxo_continuo'] 	= 'Fluxo continuo';
$lang['fm_assinatura'] 		= 'Requer assinatura de documento';
$lang['fm_login'] 			= 'Responsável (LOGIN)';
$lang['fm_texto_1'] 		= 'Objetivo(s)';
$lang['fm_texto_2'] 		= 'Recursos';
$lang['fm_texto_3'] 		= 'Elegibilidade';
$lang['fm_texto_4'] 		= 'Contato';
$lang['fm_texto_5'] 		= '';
$lang['fm_texto_6'] 		= 'Áreas e categorias';
$lang['fm_texto_7'] 		= '';
$lang['fm_texto_8'] 		= '';
$lang['fm_texto_9'] 		= '';
$lang['fm_texto_10'] 		= '';
$lang['fm_texto_11'] 		= 'Submissão da proposta';
$lang['fm_texto_12'] 		= 'Contato na instituição';
$lang['fm_data_01'] 		= 'Deadline para submissão da proposta';
$lang['fm_data_02'] 		= 'Deadline (envio da documentação)';
$lang['fm_data_03'] 		= 'Previsão de divulgação dos resultados';
$lang['fm_data_04'] 		= '';
$lang['fomento_editais'] 	= 'Editais de fomento';
$lang['title_fomento_editais'] = 'Editais de fomento';


/* Idiomas */
$lang['Label_idioma_nome'] 			= 'Nome do idioma';
$lang['Label_idioma_ativo'] 		= 'Status';
$lang['Label_idioma_codificacao']	= 'Codificação';
$lang['Label_index_idioma'] 	  	= 'Lista de idiomas';
$lang['Label_editar_idioma'] 	  	= 'Editar idioma';


/* Perfis */
$lang['Label_perfil_codigo'] 	= 'Código';
$lang['Label_perfil_descricao'] = 'Descrição';
$lang['Label_perfil_status']	= 'Status';
$lang['Label_index_perfil'] 	= 'Lista de perfis';
$lang['Label_editar_perfil'] 	= 'Editar perfil';


/* Unidades */
$lang['Label_unidade_descricao'] 	= 'Unidade';
$lang['Label_unidade_sigla'] 		= 'Sigla';
$lang['Label_unidade_decano'] 		= 'Decano';
$lang['Label_unidade_status']		= 'Status';
$lang['Label_index_unidade'] 		= 'Lista de unidades';
$lang['Label_editar_unidade'] 		= 'Editar unidade';


/* Instituições */
$lang['Label_instituicao_nome'] 		= 'Nome';
$lang['Label_instituicao_sigla'] 		= 'Sigla';
$lang['Label_instituicao_uf'] 			= 'UF';
$lang['Label_instituicao_rzsocial']		= 'Razão Social';
$lang['Label_instituicao_cnpj'] 		= 'CNPJ';
$lang['Label_instituicao_natjuridica']	= 'Natureza Juridica';
$lang['Label_instituicao_faixapo'] 		= 'Faixa po';
$lang['Label_instituicao_cidade'] 		= 'Cidade';
$lang['Label_instituicao_ativeconomic'] = 'Atividade Econômica';
$lang['Label_instituicao_latitude'] 	= 'Latitude';
$lang['Label_instituicao_longitude'] 	= 'Longitude';
$lang['Label_instituicao_use'] 			= 'Use';
$lang['Label_instituicao_ordem'] 		= 'Ordem';
$lang['Label_index_instituicao'] 		= 'Lista de instituições';
$lang['Label_editar_instituicao'] 		= 'Editar instituicao';

/*Instituicoes de ensino  */
$lang['lb_inst_nome'] 	= 'Nome';
$lang['lb_inst_sigla'] 	= 'Sigla';
$lang['lb_inst_endereco'] 	= 'Endereço';
$lang['lb_inst_cidade'] 	= 'Cidade';
$lang['lb_inst_uf'] 	= 'UF';
$lang['lb_inst_regiao'] 	= 'Região';
$lang['lb_lista_instituicao'] 	= 'Lista de Instituições';
$lang['lb_editar_instituicao'] 	= 'Editar Instituição';

/* Paises */
$lang['Label_csf_pais'] 	= 'Nome do país';
$lang['Label_csf_iso'] 		= 'Codigo Iso3';
$lang['Label_csf_cod_iso'] 	= 'Código Numerico';

/* Pareceres - Declinio */
$lang['lb_parecer_title'] = 'Declinar Parecer';
$lang['lb_parecer_tipo'] = 'Tipo Parecer';
$lang['lb_parecer_declinar'] = 'Declinar?';
$lang['lb_parecer_motivo_declinar'] = 'Motivo';
$lang['lb_parecer_avaliador'] = 'id avaliador';
$lang['lb_parecer_data_declinou'] = 'Data declinio';
$lang['ic_tipo_RPAR'] = 'Relatório Parcial';
$lang['ic_tipo_RPRC'] = 'Correção do Relatório Parcial';

/* Guia de estudante - gera Excel */
$lang['lb_ano_inicio'] = 'Ano Inicial';
$lang['lb_ano_final'] = 'Ano Final';
$lang['lb_ic_modalidade'] = 'Modalidade da Bolsa';


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/**              ADMINISTRATIVOS                                      **/
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/* Nome do mes */
$lang['mes_01'] = 'Janeiro';
$lang['mes_02'] = 'Fevereiro';
$lang['mes_03'] = 'Março';
$lang['mes_04'] = 'Abril';
$lang['mes_05'] = 'Maio';
$lang['mes_06'] = 'Junho';
$lang['mes_07'] = 'Julho';
$lang['mes_08'] = 'Agosto';
$lang['mes_09'] = 'Setembro';
$lang['mes_10'] = 'Outubro';
$lang['mes_11'] = 'Novembro';
$lang['mes_12'] = 'Dezembro';
/* Nome do mes abreviados*/
$lang['mes_01a'] = 'JAN.';
$lang['mes_02a'] = 'FEV.';
$lang['mes_03a'] = 'MAR.';
$lang['mes_04a'] = 'ABR.';
$lang['mes_05a'] = 'MAIO';
$lang['mes_06a'] = 'JUN.';
$lang['mes_07a'] = 'JUL.';
$lang['mes_08a'] = 'AGO.';
$lang['mes_09a'] = 'SET.';
$lang['mes_10a'] = 'OUT.';
$lang['mes_11a'] = 'NOV.';
$lang['mes_12a'] = 'DEZ.';

/* Cabecalho */
$lang['cab_update'] = 'Atualizar dados';
$lang['cab_expediente_01'] = 'Pró-Reitoria de Pesquisa';
$lang['cab_expediente_02'] = 'Diretoria de Pós-Graduação Stricto Sensu';
$lang['cab_expediente_03'] = 'Diretoria de Pesquisa';
$lang['cab_expediente_04'] = 'Centro Integrado de Pesquisa';
$lang['cab_expediente_05'] = 'Observatório';
$lang['cab_expediente_06'] = 'Iniciação Científica';
$lang['cab_expediente_07'] = 'Fundo de Pesquisa';
$lang['cab_expediente_08'] = 'Comitê de Ética com Seres Humanos (CEP)';
$lang['cab_expediente_09'] = 'Comitê de Ética no Uso de Animais (CEUA)';
$lang['cab_expediente_10'] = 'Biotério';

/* Botoes de Formulário*/
$lang['bt_update'] = 'ATUALIZAR';
$lang['bt_salvar_continuar'] = 'Salvar e continuar >>>';
$lang['busca'] = 'BUSCA';


/* Atores do sistema */
$lang['titulacao'] = 'titulação';
$lang['link_lattes'] = 'link para o Lattes';

$lang['cab_admin'] = 'Administração';
$lang['cab_logout'] = 'Sair';

$lang['fast_search'] = 'Deseja fazer uma busca rápida?';
$lang['fast_search_place'] = 'Procure por assuntos, pesquisadores, pesquisas... ';

$lang['title_admin'] = 'Usuários do sistema';

$lang['about_expediente'] = 'Expediente';

/* LOGIN */
$lang['login_entrar'] = 'ENTRAR';
$lang['login_name'] = 'Login de rede';
$lang['login_password'] = 'Senha';
$lang['login_versao'] = 'versão';

$lang['login_erro_01'] = 'Login ou senha incorreta';

/* Rodape */
$lang['about_sistem'] = 'Sobre o CIP';
$lang['contact_sistem'] = 'Contato';
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
?>
