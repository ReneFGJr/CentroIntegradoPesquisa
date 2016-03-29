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
$lang['titulo_pesquisa'] = 'T�tulo do projeto do professor';
$lang['submit_PIBIC'] = 'Submiss�o IC';
$lang['area_conhecimento'] = '�rea do conhecimento';
$lang['area_estrategica'] = '�rea do estrat�gica (se aplicado)';
$lang['submit_PIBIC_text'] = 'Submiss�o de projetos e planos do PIBIC, PIBITI e PIBIC (jr)';
$lang['editar_impedimento'] = 'inpedimento do perfil';
$lang['shortcuts'] = 'Acesso r�pido';
$lang['bt_search'] = 'Busca';
$lang['bt_clear'] = 'Limpa filtro';
$lang['bt_new'] = 'Novo registro';
$lang['situacao'] = 'situa��o';
$lang['vinculo'] = 'v�nculo';
$lang['dt_atualizacao'] = '�ltima atualiza��o';
$lang['edital_ano'] = 'ano do edital';
$lang['inicio_vigencia'] = 'in�cio da vig�ncia';
$lang['duracao'] = 'dura��o';
$lang['prorrogacao'] = 'prorroga��o';
$lang['agencia'] = 'ag�ncia';
$lang['participacao'] = 'participa��o';
$lang['Isencoes'] = 'Isen��es';
$lang['isencoes'] = 'isen��es';
$lang['artigos'] = 'Artigos';
$lang['Isencoes_!'] = 'Isen��es para indicar';
$lang['Isencoes_A'] = 'Isen��es em processo de libera��o';
$lang['Isencoes_H'] = 'Isen��es concedidas';
$lang['Isencoes_X'] = 'Isen��o com processo cancelado';
$lang['Isencoes_Z'] = 'Isen��es com vig�ncia expirada';
$lang['isencoes_para_indicar'] = 'Isen��es para indicar';
$lang['isencoes_ativas'] = 'Isen��es ativas';
$lang['comunicacao'] = 'Comunica��o';

$lang['modalidade_M'] = 'Mestrado';
$lang['modalidade_D'] = 'Doutorado';
$lang['modalidade_P'] = 'P�s-Doutorado';
$lang['modalidade_O'] = 'Mst. Profissional';
$lang['SS'] = 'stricto sensu';
$lang['lancar_valor_isencao'] = 'Lan�ar Valores da Ren�ncia';
$lang['captacao_bonificacoes'] = 'Bonifica��es e Isen��es';

$lang['lb_bn_rf_valor'] = 'Valor da parcela de isen��o';
$lang['lb_bn_rf_parcela'] = 'N�mero de parcelas a isentar';

	
/* Menu Princicpal */
$lang['submit_ICMST'] = 'PIBIC MASTER';
$lang['submit_ICMST_text'] = 'Submiss�o para o Edital do PIBIC Master';
$lang['pj_aluno'] = 'Estudante';
$lang['submit_'] = 'Submiss�o';

$lang['export_to_excel'] = 'Exportar para o Excel';
$lang['update'] = 'Atualizar';
/* Genero */
$lang['genero_M'] = 'Masculino';
$lang['genero_F'] = 'Feminino';

$lang['conversao_bolsa_cip_para_capes'] = 'Convers�o de Bolsa CIP para CAPES';
$lang['isencao_reabirir'] = 'Reabrir isen�ao do professor?';
$lang['isencao_confirmar'] = 'Confirmar libera��o da bolsa?';
$lang['submit'] = 'Confirmar opera��o';

/* Artigos */
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_recursos'] = 'Estratifica��o';
$lang['artigo_arquivos'] = 'Arquivos comprobat�rios';
$lang['artigo_confirmacao'] = 'Confirma��o';
$lang['artigo_historico'] = 'Hist�rico de tramita��o';

$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['artigo_dados'] = 'Dados do Artigo';
$lang['ver_isencoes'] = 'Ver, indicar e acompanhar isen��es';
	
/* Captacao */
$lang['captacao_dados'] = 'Informa��es sobre a capta��o';
$lang['captacao_recursos'] = 'Recursos captados';
$lang['captacao_arquivos'] = 'Arquivos comprobat�rios';
$lang['captacao_confirmacao'] = 'Valida��o e Finaliza��o';
$lang['captacao_edital'] = 'Informa��es sobre o edital';
$lang['captacao_perfil'] = 'Perfil do projeto de capta��o';
$lang['captacao_descricao'] = 'Vinculo da capta��o com projeto de pesquisa';
$lang['captacao_titulo'] = 'T�tulo do projeto de pesquisa';
$lang['captacao_programa'] = 'Projeto vinculado ao programa';
$lang['captacao_vigencia_inicio '] = 'In�cio da vig�ncia da capta��o';
$lang['captacao_duracao'] = 'Dura��o do recurso';
$lang['captacao_prorrogacao'] = 'Prorroga��o';
$lang['captacao_vigencia'] = 'Sobre a vig�ncia dos recursos captados';
$lang['ca_vlr_capital'] = 'Valor em capital';
$lang['ca_vlr_custeio'] = 'Valor em custeio';
$lang['ca_vlr_bolsa'] = 'Valor em bolsas';
$lang['ca_vlr_outros'] = 'Outras r�bricas (servi�os)';
$lang['ca_proponente_vlr'] = 'Valor total aplicado na PUCPR';
$lang['ca_proponente'] = 'Proponente da capta��o';
$lang['ca_contexto'] = 'Informe o contexto<br>da capta��o (informativo)';
$lang['capt_file_texto'] = 'Deve ser anexado os documentos comprobat�rios e de aprova��o dos recursos.';
$lang['send'] = 'Confirmar e finalizar o cadastro >>>';
$lang['fomente_agencia'] = 'Ag�ncia de fomento / Financiador';
$lang['fomento_edital'] = 'Nr. do Edital (fomento)';
$lang['fomento_processo'] = 'Nr. Processo / Conv�nio';
$lang['fomento_ed_ano'] = 'Ano do Edital';
$lang['validation'] = 'Valida��o';
$lang['validataion_ok'] = 'Todos os campos obrigat�rio foram validados';
$lang['validataion_error'] = 'Existem campos n�o preenchido ou faltando informa��es';
$lang['rule'] = 'Regra';
$lang['chk'] = 'Valida��o';
$lang['file_posted'] = 'Arquivo(s) postado';
$lang['nao_aplicado'] = 'N�o aplicado';
$lang['captacao_historico'] = 'Hist�rico de tramita��o';
$lang['validacao_coordenador'] = 'Valida��o do Coordenador';
$lang['ARTI'] = 'Bonifica��o de Artigos';
$lang['CAPT'] = 'Capta��o de Recursos';
$lang['IC'] = 'Inicia��o Cient�fica';
$lang['ic_ativa'] = 'Orienta��es ativas';
$lang['ic_finalizados'] = 'Orienta��es conclu�das';
$lang['save_next'] = 'Salvar e continuar >>';
$lang['save'] = 'Salvar >>';	
$lang['continuous_flow'] = 'Fluxo cont�nuo';
$lang['validacao_coordenador_link'] = 'ver valida��es necess�rias';
$lang['captacoes'] = 'capta��es';
$lang['artigos'] = 'artigos';
$lang['captacao_liberacao_coordeador'] = 'An�lise e delibera��o do Coordenador do Programa';
$lang['captacao_vigencia_inicio'] = 'In�cio da vig�ncia';
$lang['ca_duracao'] = 'Dura��o da capta��o';
$lang['ca_programa'] = 'Vinculo com o programa de P�s-Gradua��o';
/***************************************************************************************************/
/************************************************************************************** C I P ******/
$lang['SELECIONA_IDIOMA'] = 'Selecionar Idioma >>';
$lang['SELECIONA_AREA'] = 'Selecionar �rea >>';
$lang['bt_submit_confirm'] = 'Confirmar envio >>>';
$lang['protocolo_botao_form_ic_rp'] = 'Enviar Relat�rio Parcial';
$lang['protocolo_botao_form_ic_rpc'] = 'Enviar Corre��es do Relat�rio Parcial';
$lang['sw_ic_rel_pacial'] = 'Submiss�o do Relat�rio Parcial';
$lang['sw_ic_rel_pacial_correcao'] = 'Submiss�o do Relat�rio Parcial (Corre��o)';
$lang['sw_ic_form_acompanhamento'] = 'Submiss�o do question�rio de acompanhamento';
$lang['sw_ic_rel_final'] = 'Submiss�o do Relat�rio Final';
$lang['sw_ic_rel_final_correcao'] = 'Submiss�o do Relat�rio Final (Corre��o)';
$lang['sw_ic_resumo'] = 'Submiss�o do Resumo';
$lang['sw_ic_validacao'] = 'Sistema de avalia��o';
$lang['sw_ic_submissao'] = 'Submiss�o de propostas';

/* Artigos */

$lang['artigos_cadastrados'] = 'Artigos cadastrados';
$lang['artigo_ver_cadastro'] = 'ver e cadastrar artigos';
$lang['captacao_ver_cadastro'] = 'ver e cadastrar projetos';
$lang['captacaoes_cadastrados'] = 'Capta��es cadastradas';

$lang['cap_em_cadastro'] = 'Em cadastro';
$lang['cap_devolvido_correcoes'] = 'Corre��o do professor';
$lang['cap_validacao_coordenador'] = 'Valida��o do coordenador';
$lang['cap_validacao_diretoria'] = 'Valida��o da diretoria';
$lang['cap_comunicacao'] = 'Para comunica��o';
$lang['cap_finalizado'] = 'Finalizado';
$lang['cap_validacao_secretaria'] = 'Valida��o Documental';
$lang['cap_acao_coordenador'] = 'a��o do coordenador';
$lang['cap_acao_secretaria'] = 'a��o da secretaria';
$lang['cap_acao_diretoria'] = 'a��o da diretoria';

/* GED */
$lang['none_file_posted'] = 'Nenhum arquivo postado';
$lang['file_tipo'] = 'Tipo de Arquivo';
$lang['upload_submit'] = 'Enviar arquivo';
$lang['file_req'] = 'Requisitos';
$lang['not_defined'] = '::: N�o selecionado :::';
$lang['ged_upload'] = 'Enviar arquivo >>>';

$lang['ic_semic_area'] = '�rea do Conhecimento';
$lang['ic_semic_idioma'] = 'Idioma de Apresenta��o';
$lang['ic_arquivos'] = 'Apresenta��o de Documentos';
	
/* pagina de usuarios */
$lang['messagem_cadastradas'] = 'Mensagens / Comunica��es';
$lang['comunicacoes_cadastradas'] = 'Comunica��es por e-mail';
$lang['page_usuarios'] = 'Cadastro de pessoas';
$lang['add_email'] = 'novo e-mail';

$lang['lb_us_nome'] 	= 'Nome';
$lang['lb_us_cracha'] 	= 'Cracha';
$lang['lb_us_cpf'] 	= 'CPF';
$lang['lb_us_dt_nascimento'] 	= 'Data de Nascimento';
$lang['lb_us_genero'] 	= 'G�nero';
$lang['lb_usu_tipo'] 	= 'Tipo';
$lang['lb_us_codigo_rh'] 	= 'Codigo RH';
$lang['lb_usu_funcao'] 	= 'Fun��o';
$lang['lb_usu_titulacao'] 	= 'Titula��o';
$lang['lb_us_nome_lattes'] 	= 'Nome no Lattes';
$lang['lb_us_link_lattes'] 	= 'Link Lattes';
$lang['lb_us_regime'] 	= 'Regime';
$lang['lb_eq_ativo_2'] 	= 'Ativo';
$lang['lb_us_curso_vinculo'] 	= 'Curso V�nculo';
$lang['lb_us_escola_vinculo'] 	= 'Escola V�nculo';
$lang['lb_user_teste'] 	= 'Usu�rio teste';
$lang['us_genero'] = 'G�nero';
$lang['lb_us_ativo'] = 'Usu�rio ativo'; 
$lang['us_titulacao'] = 'Titula��o';
$lang['lb_us_origem'] 	= 'Origem';
$lang['instituicao'] = 'Institui��o';
$lang['lb_us_professor_tipo'] 	= 'Professor Tipo';
$lang['lb_us_usuario_cursando'] 	= 'Cursando';
$lang['lb_user_conclusao_em'] 	= 'Cursou ensino m�dio em escola p�blica? ';

$lang['lb_blu_motivo'] 		= 'Motivo do impedimento';
$lang['lb_blu_dt_inicio'] = 'Data in�cio do impedimento ';
$lang['lb_blu_dt_fim'] 		= 'Data fim do impedimento';
$lang['lb_blu_ativo'] 		= 'Deseja ativar impedimento?';



/* Contratos IC */
$lang['lb_icc_modelo_contrato'] = 'Modelo de Contrato';
$lang['lb_icc_ano_contrato'] = 'Ano';
$lang['lb_icc_modalidade_bolsa'] = 'Modalidade da bolsa';
$lang['lb_icc_tit_model_contrato'] = 'Modelo de contrato';
$lang['lb_icc_texto_contrato'] = 'Texto do Contrato)';
$lang['lb_mensagens_title'] = 'Constru��o do Modelo de Contrato';

$lang['versao'] = 'v0.16.10';
/* Fundo de Pesquisa */
$lang['page_fundo'] = 'Fundo de Pesquisa';


$lang['protocolo_botao_form_pre'] = 'Preencher formul�rio de acompanhamento';
$lang['lb_form_prof_inf'] = '<p class="lt3">Prezado orientador, este question�rio tem como objetivo realizar um acompanhamento das ativididades e emprenho do seu aluno na Inicia��o Cient�fica e Tecnol�gica. Todas as quest�es s�o obrigat�rias, existe um espa�o livre ao final do formul�rio para seus coment�rios.</p>
							 <p class="lt3">Destacamos que este formul�rio n�o ser� encaminhado para seu orientando.</p><BR><BR>';

/***************************** PIBIC */
$lang['ic_atividade_aberta'] = 'Atividades para entrega';
$lang['IC_FORM_RP'] = 'Entrega do Relat�rio Parcial (professor)';
$lang['IC_FORM_RPC'] = 'Entrega das Corre��es do Relat�rio Parcial (professor)';
$lang['IC_FORM_PROF'] = 'Formul�rio de acompanhamento (professor)';
$lang['IC_FORM_ESTU'] = 'Formul�rio de acompanhamento (estudante)';
$lang['bt_entregar'] = 'Entregar Atividade';

$lang['protocolo_F'] = 'Finalizados';
$lang['protocolo_A'] = 'Abertos';
$lang['protocolo_C'] = 'Indeferidos / cancelados';

$lang['nao_postado'] = 'n�o postado';
$lang['resumo_postado'] = 'resumo postado';
$lang['list_arquivos'] = 'Arquivos postados';

/* Status */
$lang['status_protocolo_C'] = 'Cancelado';
$lang['status_protocolo_A'] = 'Aberto';
$lang['status_protocolo_B'] = 'Em an�lise';
$lang['status_protocolo_F'] = 'Finalizado';

/* IC */
$lang['protocolo_ic_ALT'] = 'Substitui��o de estudante';
$lang['protocolo_ic_CAN'] = 'Cancelamento de orienta��o';
$lang['protocolo_ic_CAN_info'] = 'Informe a orienta��o que deseja solicitar cancelamento.';
$lang['protocolo_botao_CAN'] = 'Solicitar cancelamento de orienta��o deste trabalho';

$lang['protocolo_ic_SBS'] = 'Substitui��o de estudante';
$lang['protocolo_botao_SBS'] = 'Solicitar substitui��o de estudante';
$lang['codigo_aluno_novo'] = 'C�digo do novo aluno';

$lang['protocolo_ic_RCS'] = 'Recurso de avalia��o';
$lang['protocolo_ic_RSM'] = 'Recurso para o SEMIC';

$lang['justify'] = 'Justificativa';
$lang['pr_descricao'] = 'Motivo do cancelamento';
$lang['pr_confirm_cancel'] = 'Confirmar cancelamento';
$lang['bt_confirm'] = 'Confirmar >>>';
$lang['::select an option::'] = ':: Selecione uma op��o ::';
$lang['Already_exists_protocol'] = 'J� existe um protocolo aberto deste tipo';
$lang['pr_confirm_sbs'] = 'Confirmar solicita��o de substitu���o';

$lang['proto_th_open'] = 'abertas';
$lang['proto_th_close'] = 'fechadas';
$lang['proto_th_cancel'] = 'canceladas';
$lang['request'] = 'Solicita��es';
$lang['protocol_successful'] = 'Protocolo aberto com sucesso!';
$lang['guidelines_ic'] = 'Orienta��es IC/IT';
$lang['codigo_aluno_novo'] = 'Informe o c�digo do novo estudante';
$lang['pr_descricao_sbs'] = 'Motivo da substitui��o';
$lang['successful'] = 'Opera��o realizada com sucesso!';

$lang['lb_mb_descricao'] = 'Descri��o';
$lang['lb_mb_tipo'] = 'Tipo';
$lang['lb_mb_ativo'] = 'Bolsa Ativa';
$lang['lb_mb_moeda'] = 'Moeda'; 	
$lang['lb_mb_valor'] = 'Valor da bolsa';
$lang['lb_mb_fomento'] = 'Fomento';
$lang['lb_mb_titulo'] = 'Gest�o das modalidades de Bolsas de IC';

$lang['lb_usc_banco'] = 'Banco';
$lang['lb_usc_agencia'] = 'Agencia';
$lang['lb_usc_conta'] = 'Conta';
$lang['lb_usc_tipo'] = 'Tipo de Conta';
$lang['lb_usc_modo'] = 'Modo';
$lang['lb_sem_conta'] = 'Sem conta cadastrada';

$lang['lb_pa_TT_lista_registro'] = 'Acompanhamento de estudantes';
$lang['lb_pa_protocolo'] = 'Protocolo';
$lang['lb_pa_usuario_id'] = 'Usu�rio';
$lang['lb_pa_status'] = 'Status';

/** Fomularios ******/
 /** para aluno */
$lang['lb_form_aluno_pa1'] = '1) Voc� tem participado das discuss�es com o grupo de pesquisa do professor orientador ?';
$lang['lb_form_aluno_pa2'] = '2) No grupo de pesquisa tenho contato com:';
$lang['lb_form_aluno_pa3'] = '3) Com que frequ�ncia voc� tem encontrado com seu orientador ?';
$lang['lb_form_aluno_pa4'] = '4) Seu contato com professor orientador �: ';
$lang['lb_form_aluno_pa5'] = '5) At� este momento realizei:';
$lang['lb_form_aluno_pa6'] = '6) O cronograma do meu plano de atividades est�: ';
$lang['lb_form_aluno_pa7'] = '7) Voc� mant�m seu curricullum lattes atualizado? ';
$lang['lb_form_aluno_pa8'] = '8) J� incluiu seu projeto de PIBIC/PIBITI?';
$lang['lb_form_aluno_pa9'] = '9) Qual sua avalia��o geral sobre sua experi�ncia no PIBIC/PIBITI ?';
$lang['lb_form_aluno_pa10'] = 'Descrever atividades';

 /** para professor */
$lang['lb_form_prof_pa1'] = '1)	O estudante tem participado das discuss�es com seu grupo de pesquisa?';
$lang['lb_form_prof_pa2'] = '2)	Com que frequ�ncia voc� tem encontrado com seu orientado? ';
$lang['lb_form_prof_pa3'] = '3)	Seu contato com o estudante �: ';
$lang['lb_form_prof_pa4'] = '4)	O cronograma do plano de atividades est�: ';
$lang['lb_form_prof_pa5'] = '5)	H� ind�cios de displic�ncia do estudante com as atividades de pesquisa? ';
$lang['lb_form_prof_pa6'] = '6)	Espa�o livre para algum coment�rio';
$lang['lb_form_prof_pa7'] = '6)	Coment�rios Gerais.';

//Perguntas do formul�rio de acompanhamento do professor com o aluno
//pergunta 01
$lang['lb_form_prof_pa1_1'] = 'Sim';
$lang['lb_form_prof_pa1_2'] = 'N�o';
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
$lang['lb_form_prof_pa5_2'] = 'N�o';



/****************************** AVALIADORES */
$lang['desactive'] = 'desativar';
$lang['active'] = 'ativar';
$lang['avaliador'] = 'avaliador';
$lang['desativar_como_avaliador'] = 'desativar avaliador';
$lang['ativar_como_avaliador'] = 'ativar como avaliador';
$lang['active_area'] = 'Ativar �rea';
$lang['add_area'] = 'Incorporado �rea';

$lang['add_area'] = 'Incorporado �rea';
$lang['aceitar_avaliacao'] = 'ACEITAR';
$lang['recusar_avaliacao'] = 'RECUSAR';
$lang['recusar_avaliacao_confirma'] = 'GRAVAR RECUSA >>';

$lang['lb_ic_avalia��oes_pendentes'] = 'Avalia��es';

/* Perfil */
$lang['captacao_academica'] = 'Total de capta��es acad�micas';
$lang['captacao_institucional'] =  'Total de capta��o institucionais';
/*****************************************************************/
$lang['page_docentes'] = 'Docentes';
$lang['page_avaliadores'] = 'Avaliadores';
$lang['page_discente'] = 'Discentes';
$lang['Vigencia'] = 'Vig�ncia';
$lang['Orientador'] = 'Orientador';

$lang['pt_BR'] = 'Portugu�s';
$lang['us_EN'] = 'Ingl�s';
$lang['en'] = 'Ingl�s';
$lang['Orientador'] = 'Orientador';
$lang['Areas'] = '�reas';
$lang['area_nao_definida'] = '�rea n�o definida';

$lang['email_modificar'] = 'Atualizar e-mail';
$lang['email_excluir'] = 'Excluir e-mail';
$lang['email_adicionar'] = 'Adicionar e-mail';
$lang['email_sem'] = 'Sem e-mail';
$lang['email_ok'] = 'E-mail ok';

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/* Ciencia sem fronteiras */
$lang['csf_bt_cancelar'] 			= 'Cancelar processo';
$lang['csf_bt_homologar_no'] 		= 'N�o homologado';
$lang['csf_bt_homologar'] 			= 'Homologado pela Institui��o';
$lang['csf_bt_homologar_capes_no'] 	= 'N�o homologado pela CAPES/CNPq';
$lang['csf_bt_homologar_capes'] 	= 'Homologa��o da CAPES/CNPq';
$lang['csf_bt_homologar_parceiro'] 	= 'Aceite do Parceiro';
$lang['csf_bt_desistente'] 			= 'Desistente';
$lang['csf_bt_viagem'] 				= 'Sa�da do Brasil';
$lang['csf_bt_fim_viagem'] 			= 'Retorno ao Brasil';
$lang['csf_bt_troca_universidade'] 	= 'Troca de Univerisdade';
$lang['csf_bt_troca_pais'] 			= 'Troca de pa�s';
$lang['scf_historico'] 				= 'Hist�rico';
$lang['csf_bt_retorno'] 			= 'Retorno antecipado';
$lang['last_harvesting'] 			= '�ltima coleta';

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/* Grupos de Pesquisa */
$lang['gp_situacao'] 				= 'Situa��o';
$lang['espelho_cnpq'] 				= 'Espelho (DGP)';
$lang['gp_ano_formacao'] 			= 'Ano de forma��o';
$lang['gp_instituicao_grupo'] 		= 'Institu���o';
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
$lang['gpus_titulacao_max'] 		= 'Titula��o';
$lang['gpus_dt_inclusao'] 			= 'Dt. Inclus�o';
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
$lang['fm_agencia'] 		= 'Ag�ncia';
$lang['fm_idioma'] 			= 'Idioma';
$lang['fm_chamada'] 		= 'Chamada';
$lang['fm_status'] 			= 'Status';
$lang['fm_autor'] 			= 'Respons�vel (LOGIN)';
$lang['fm_corpo'] 			= 'Corpo';
$lang['fm_url_externa'] 	= 'Link da chamada';
$lang['fm_total_visualizacoes'] = 'Total de visualiza��es';
$lang['fm_local'] 			= 'Local';
$lang['fm_disseminador'] 	= 'Disseminador';
$lang['fm_tipo_edital'] 	= 'Tipo de edital';
$lang['fm_fluxo_continuo'] 	= 'Fluxo continuo';
$lang['fm_assinatura'] 		= 'Requer assinatura de documento';
$lang['fm_login'] 			= 'Respons�vel (LOGIN)';
$lang['fm_texto_1'] 		= 'Objetivo(s)';
$lang['fm_texto_2'] 		= 'Recursos';
$lang['fm_texto_3'] 		= 'Elegibilidade';
$lang['fm_texto_4'] 		= 'Contato';
$lang['fm_texto_5'] 		= '';
$lang['fm_texto_6'] 		= '�reas e categorias';
$lang['fm_texto_7'] 		= '';
$lang['fm_texto_8'] 		= '';
$lang['fm_texto_9'] 		= '';
$lang['fm_texto_10'] 		= '';
$lang['fm_texto_11'] 		= 'Submiss�o da proposta';
$lang['fm_texto_12'] 		= 'Contato na institui��o';
$lang['fm_data_01'] 		= 'Deadline para submiss�o da proposta';
$lang['fm_data_02'] 		= 'Deadline (envio da documenta��o)';
$lang['fm_data_03'] 		= 'Previs�o de divulga��o dos resultados';
$lang['fm_data_04'] 		= '';
$lang['fomento_editais'] 	= 'Editais de fomento';
$lang['title_fomento_editais'] = 'Editais de fomento';


/* Idiomas */
$lang['Label_idioma_nome'] 			= 'Nome do idioma';
$lang['Label_idioma_ativo'] 		= 'Status';
$lang['Label_idioma_codificacao']	= 'Codifica��o';
$lang['Label_index_idioma'] 	  	= 'Lista de idiomas';
$lang['Label_editar_idioma'] 	  	= 'Editar idioma';


/* Perfis */
$lang['Label_perfil_codigo'] 	= 'C�digo';
$lang['Label_perfil_descricao'] = 'Descri��o';
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


/* Institui��es */
$lang['Label_instituicao_nome'] 		= 'Nome';
$lang['Label_instituicao_sigla'] 		= 'Sigla';
$lang['Label_instituicao_uf'] 			= 'UF';
$lang['Label_instituicao_rzsocial']		= 'Raz�o Social';
$lang['Label_instituicao_cnpj'] 		= 'CNPJ';
$lang['Label_instituicao_natjuridica']	= 'Natureza Juridica';
$lang['Label_instituicao_faixapo'] 		= 'Faixa po';
$lang['Label_instituicao_cidade'] 		= 'Cidade';
$lang['Label_instituicao_ativeconomic'] = 'Atividade Econ�mica';
$lang['Label_instituicao_latitude'] 	= 'Latitude';
$lang['Label_instituicao_longitude'] 	= 'Longitude';
$lang['Label_instituicao_use'] 			= 'Use';
$lang['Label_instituicao_ordem'] 		= 'Ordem';
$lang['Label_index_instituicao'] 		= 'Lista de institui��es';
$lang['Label_editar_instituicao'] 		= 'Editar instituicao';

/*Instituicoes de ensino  */
$lang['lb_inst_nome'] 	= 'Nome';
$lang['lb_inst_sigla'] 	= 'Sigla';
$lang['lb_inst_endereco'] 	= 'Endere�o';
$lang['lb_inst_cidade'] 	= 'Cidade';
$lang['lb_inst_uf'] 	= 'UF';
$lang['lb_inst_regiao'] 	= 'Regi�o';
$lang['lb_lista_instituicao'] 	= 'Lista de Institui��es';
$lang['lb_editar_instituicao'] 	= 'Editar Institui��o';

/* Paises */
$lang['Label_csf_pais'] 	= 'Nome do pa�s';
$lang['Label_csf_iso'] 		= 'Codigo Iso3';
$lang['Label_csf_cod_iso'] 	= 'C�digo Numerico';

/* Pareceres - Declinio */
$lang['lb_parecer_title'] = 'Declinar Parecer';
$lang['lb_parecer_tipo'] = 'Tipo Parecer';
$lang['lb_parecer_declinar'] = 'Declinar?';
$lang['lb_parecer_motivo_declinar'] = 'Motivo';
$lang['lb_parecer_avaliador'] = 'id avaliador';
$lang['lb_parecer_data_declinou'] = 'Data declinio';
$lang['ic_tipo_RPAR'] = 'Relat�rio Parcial';
$lang['ic_tipo_RPRC'] = 'Corre��o do Relat�rio Parcial';

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
$lang['mes_03'] = 'Mar�o';
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
$lang['cab_expediente_01'] = 'Pr�-Reitoria de Pesquisa';
$lang['cab_expediente_02'] = 'Diretoria de P�s-Gradua��o Stricto Sensu';
$lang['cab_expediente_03'] = 'Diretoria de Pesquisa';
$lang['cab_expediente_04'] = 'Centro Integrado de Pesquisa';
$lang['cab_expediente_05'] = 'Observat�rio';
$lang['cab_expediente_06'] = 'Inicia��o Cient�fica';
$lang['cab_expediente_07'] = 'Fundo de Pesquisa';
$lang['cab_expediente_08'] = 'Comit� de �tica com Seres Humanos (CEP)';
$lang['cab_expediente_09'] = 'Comit� de �tica no Uso de Animais (CEUA)';
$lang['cab_expediente_10'] = 'Biot�rio';

/* Botoes de Formul�rio*/
$lang['bt_update'] = 'ATUALIZAR';
$lang['bt_salvar_continuar'] = 'Salvar e continuar >>>';
$lang['busca'] = 'BUSCA';


/* Atores do sistema */
$lang['titulacao'] = 'titula��o';
$lang['link_lattes'] = 'link para o Lattes';

$lang['cab_admin'] = 'Administra��o';
$lang['cab_logout'] = 'Sair';

$lang['fast_search'] = 'Deseja fazer uma busca r�pida?';
$lang['fast_search_place'] = 'Procure por assuntos, pesquisadores, pesquisas... ';

$lang['title_admin'] = 'Usu�rios do sistema';

$lang['about_expediente'] = 'Expediente';

/* LOGIN */
$lang['login_entrar'] = 'ENTRAR';
$lang['login_name'] = 'Login de rede';
$lang['login_password'] = 'Senha';
$lang['login_versao'] = 'vers�o';

$lang['login_erro_01'] = 'Login ou senha incorreta';

/* Rodape */
$lang['about_sistem'] = 'Sobre o CIP';
$lang['contact_sistem'] = 'Contato';
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%**/
?>
