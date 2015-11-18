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
/* pagina de usuarios */
/* menu */
$lang['csf_home'] = 'Inicial';
$lang['csf_indicadores'] = 'Indicadores';
$lang['csf_sobre'] = 'Sobre';
$lang['csf_eventos'] = 'Eventos';
$lang['csf_depoimentos'] = 'Depoimentos';
$lang['csf_faq'] = 'FAQ';
$lang['csf_contato'] = 'Contato';
$lang['csf_o_que_e'] = 'O que �?';
$lang['csf_editais'] = 'Editais';
$lang['csf_despedida'] = 'Despedida 2015 1� Semestre';
$lang['csf_csf'] = 'Ci�ncia sem Fronteiras';

/* Crousel_parte_01 */
$lang['csf_banner_01_a'] = 'Somos 421 alunos CsF PUCPR pelo mundo.';
$lang['csf_banner_01_b'] = 'Saiba mais sobre os nossos bolsistas.';
$lang['csf_banner_01_c'] = 'Depoimento dos interc�mbistas CsF da PUCPR.';
$lang['csf_banner_01_d'] = 'Veja o que os estudantes da PUCPR est�o falando sobre o Ci�ncia sem Fronteiras.';
/* Botoes */
$lang['csf_banner_bt_1'] = 'Ver indicadores';
$lang['csf_banner_bt_2'] = 'Ver detalhes';

/* Crousel_part_02 */
$lang['csf_crousel_2_a'] = 'Indicadores CsF PUCPR';
$lang['csf_crousel_2_b'] = 'Resultados do Ci�ncia sem Fronteiras na PUCPR desde 2012.';
$lang['csf_crousel_2_c'] = 'Depoimentos';
$lang['csf_crousel_2_d'] = 'Saiba como foi a experi�ncia dos alunos PUCPR que j� foram para o interc�mbio Ci�ncia sem Fronteiras.';
$lang['csf_crousel_2_e'] = 'D�vidas?';
$lang['csf_crousel_2_f'] = 'Acesse a nossa sess�o de Perguntas Frequentes e tire suas d�vidas.';

/* Crousel_part_03 */
$lang['csf_crousel_3_a'] = 'Alunos aprovam 100% o Ci�ncia sem Fronteiras';
$lang['csf_crousel_3_b'] = '100% dos alunos responderam que fariam o interc�mbio novamente. Ainda est� com d�vidas que o Ci�ncia sem Fronteiras � uma �tima oportunidade para sua carreira? Veja os ';
$lang['csf_crousel_3_c'] = 'depoimentos dos alunos.';

/* indicadores */
$lang['csf_indicadores_a'] = 'Indicadores Ci�ncia sem Fronteiras administrado pela PUCPR.';
$lang['csf_indicadores_b'] = 'A PUCPR participou de todos os editais lan�ados pelo Governo Federal desde 2012. � a 1�. Institui��o de Ensino Superior Privado em n�mero de bolsas no Estado do Paran� e a 3� entre todas as IES do Estado. J� enviamos bolsistas para mais de 20 pa�ses em mais de 150 Universidades de Destino. Alguns de nossos bolsistas que j� conclu�ram a gradua��o deram continuidade em sua forma��o realizando cursos de especializados e mestrado; v�rios est�o se preparando para o doutorado. Confira estas e outras informa��es nos indicadores a seguir:';
$lang['csf_indicadores_bt_1'] = 'Bolsas por Parceiros';
$lang['csf_indicadores_bt_2'] = 'Bolsas por pa�s';
$lang['csf_indicadores_bt_3'] = 'Bolsas por curso';
$lang['csf_indicadores_bt_4'] = 'Bolsas por institui��o';
$lang['csf_indicadores_bt_5'] = 'Situa��o dos estudantes';
$lang['csf_indicadores_bt_6'] = 'Bolsas por g�nero';
$lang['csf_indicadores_bt_7'] = 'Avan�o anual';

/* footer */
$lang['csf_bt_back'] = 'Voltar';

/* faq */
$lang['csf_faq_title'] = 'Perguntas Frequentes';
$lang['csf_faq_question_01'] = 'Como fa�o para me inscrever no programa?';
$lang['csf_faq_question_02'] = 'Quem inscreve os candidatos? O coordenador respons�vel ou o pr�prio candidato?';
$lang['csf_faq_question_03'] = 'O meu curso de gradua��o se inclui dentro das �reas priorit�rias?';
$lang['csf_faq_question_04'] = 'H� exig�ncia de profici�ncia em l�ngua estrangeira? Quais exames de profici�ncia em l�ngua estrangeira ser�o aceitos?';
$lang['csf_faq_question_05'] = 'Quais Universidades no exterior podem participar do programa?';
$lang['csf_faq_question_06'] = 'Quais s�o as �reas �reas priorit�rias que posso concorrer?';
$lang['csf_faq_question_07'] = 'Quem decide se o curso do candidato est� dentro das �reas priorit�rias?';
$lang['csf_faq_question_08'] = 'Os estudantes e pesquisadores beneficiados pelo programa s� poder�o atuar dentro das �reas priorit�rias do CsF?';
$lang['csf_faq_question_09'] = 'Ainda n�o tenho o resultado do Teste de Profici�ncia, posso enviar depois?';
$lang['csf_faq_question_10'] = 'Ainda n�o conclu� a gradua��o, posso participar do programa?';
$lang['csf_faq_question_11'] = 'Sou aluno PIBIC, como devo proceder?';
$lang['csf_faq_question_12'] = 'Onde devo anexar os documentos exigidos na inscri��o?';
$lang['csf_faq_question_13'] = 'A documenta��o exigida pode ser enviada por e-mail?';
$lang['csf_faq_question_14'] = 'Tenho Bolsa aux�lio da PUCPR, ProUNI ou FIES, como devo proceder?';
$lang['csf_faq_question_15'] = 'Qual � o valor da bolsa para alunos que v�o para o Exterior?';
$lang['csf_faq_question_16'] = 'Quando ficarei sabendo para qual institui��o irei?';
$lang['csf_faq_question_17'] = 'Posso escolher em que Universidade quero estudar no exterior?';

$lang['csf_faq_resp_quest_01_a'] = 'O aluno candidato dever� inscrever - se no site do Ci�ncia Sem Fronteiras pelo seguinte link:';
$lang['csf_faq_resp_quest_01_b'] = '� necess�ria a inscri��o nesse canal para que toda e qualquer informa��o sobre a candidatura do aluno seja disponibilizada a Coordena��o do Ci�ncia sem Fronteiras da PUCPR(CSF). Sendo assim, poderemos acompanhar o processo de inscri��o e aprova��o de cada aluno para assim esclarecer qualquer d�vida que se fa�a necess�ria.';
$lang['csf_faq_resp_quest_02'] = 'O pr�prio candidato � respons�vel pela sua inscri��o tanto no site do governo como no site da PUCPR. O coordenador � respons�vel por divulgar as chamadas, prazos e procedimentos espec�ficos. Ap�s o t�rmino das inscri��es a CAPES/CNPq enviam as inscri��es realizadas para que o coordenador fa�a a homologa��o.';
$lang['csf_faq_resp_quest_03'] = 'A rela��o das �reas consideradas priorit�rias no programa do Ci�ncia sem Fronteiras pode ser consultada no Portal do Programa.';
$lang['csf_faq_resp_quest_04'] = 'A exig�ncia ser� feita conforme acordo realizado entre as ag�ncias (CNPq e CAPES) e a institui��o de ensino estrangeira. Leia com aten��o o texto completo da Chamada ao Pa�s que voc� est� se candidatando. Cada chamada tem suas regras espec�ficas.';
$lang['csf_faq_resp_quest_05'] = 'As Universidades de excel�ncia no exterior  firmaram acordos com os representantes Educacionais (parceiros) de cada pa�s ou com o CNPq e a CAPES. O parceiro de cada chamada � que disponibilizar� a rela��o das Universidades participantes do Programa.';
$lang['csf_faq_resp_quest_06'] = 'Temas e �reas de interesse: Engenharias e demais �reas tecnol�gicas; Ci�ncias Exatas e da Terra: F�sica, Qu�mica, Biologia e Geoci�ncias, Ci�ncias Biom�dicas e da Sa�de; Computa��o e tecnologias da informa��o; Tecnologia Aeroespacial; F�rmacos; Produ��o Agr�cola Sustent�vel; Petr�leo, G�s e Carv�o Mineral; Energias Renov�veis; Tecnologia Mineral; Biotecnologia; Nanotecnologia e Novos materiais; Tecnologias de Preven��o e Mitiga��o de Desastres Naturais; Biodiversidade e Bioprospec��o; Ci�ncias do Mar; Ind�stria criativa; Novas Tecnologias de Engenharia Construtiva; Forma��o de Tecn�logos. Veja se h� restri��o de alguma �rea priorit�ria na chamada de seu interesse.';
$lang['csf_faq_resp_quest_07'] = 'A CAPES/CNPq analisam se o curso de gradua��o do candidato est� ou n�o inclu�do entre as �reas priorit�rias.';
$lang['csf_faq_resp_quest_08'] = 'Sim. Tanto estudantes como pesquisadores dever�o seguir as �reas priorit�rias, constantes do Programa.';
$lang['csf_faq_resp_quest_09'] = 'Leia com aten��o o cronograma da chamada que est� se candidatando e siga rigorosamente o prazo estabelecido. Geralmente � poss�vel enviar posteriormente ao t�rmino da inscri��o o  resultado do teste de profici�ncia';
$lang['csf_faq_resp_quest_10'] = 'Sim, desde que tenha conclu�do de 20% a no m�ximo 90% do curso na institui��o de ensino brasileira e esteja devidamente matriculado. Neste caso, a aluno pode pleitear a bolsa Gradua��o Sandu�che no Exterior (SWG) para fazer interc�mbio de 6 a 12 meses no exterior,de acordo com cada Chamada.';
$lang['csf_faq_resp_quest_11'] = 'Voc� dever� comunicar a Coordena��o do PIBIC da PUCPR sobre a sua aprova��o  na Universidade Destino, para que a bolsa  PIBIC seja cancelada. S� assim voc� poder� dar o aceite a sua bolsa do CSF. O CNPq/CAPES n�o autorizam o ac�mulo de bolsas.';
$lang['csf_faq_resp_quest_12'] = 'Os documentos da inscri��o exigidos na chamada p�blica devem ser anexados dentro do formul�rio de inscri��o dispon�vel no "formul�rio de inscri��es". Todos os documentos dever�o anexados em PDF.';
$lang['csf_faq_resp_quest_13'] = 'N�o. As documenta��es exigidas dever�o ser anexadas no site na p�gina do programa, respeitando o respectivo calend�rio. Lembrando que todos os documentos devem estar no formato PDF.';
$lang['csf_faq_resp_quest_14'] = 'Voc� dever� comunicar a Coordena��o do CsF caso tenha qualquer aux�lio para cursar a gradua��o na Universidade, seja Bolsa PUCPR, FIES ou ProUNI. Esse aux�lio ser� suspenso pela Coordena��o e o aluno dever� comparecer ao SIGA para assinar o termo de "suspens�o tempor�ria", assim a bolsa n�o ser� cancelada tendo o aluno direito de reativ�-la no seu retorno � PUCPR.';
$lang['csf_faq_resp_quest_15'] = 'No site do Ci�ncia Sem Fronteiras na chamada de cada Pa�s tem os valores espec�ficos. Os valores variam de um Pa�s para o outro.';
$lang['csf_faq_resp_quest_16'] = 'O estudante ser� comunicado por e-mail em qual Universidade foi aceito, bem como os procedimentos para os passos posteriores.';
$lang['csf_faq_resp_quest_17'] = 'Os parceiros que intermedeiam as universidades estrangeiras e as ag�ncias respons�veis pelo programa Ci�ncia sem Fronteiras ser�o os respons�veis por aplicar as universidades, utilizando a pertin�ncia quanto �s �reas priorit�rias do Programa Ci�ncia sem Fronteiras.';

/* contato */
$lang['csf_contact_title'] = 'Contato';
$lang['csf_contact_01'] = 'Coordena��o do Ci�ncia sem Fronteiras da PUCPR';
$lang['csf_contact_02'] = 'Coordena��o de Interc�mbio Internacional e Coopera��o';
$lang['csf_contact_03'] = 'Administrativo';
$lang['csf_contact_04'] = 'Rua Imaculada Concei��o, 1155';
$lang['csf_contact_05'] = 'Pr�dio Administrativo - T�rreo C�mpus Curitiba';
$lang['csf_contact_06'] = 'Bairro Prado Velho';
$lang['csf_contact_07'] = 'CEP 80215-901';
$lang['csf_contact_08'] = 'Pr�dio Administrativo - T�rreo C�mpus Curitiba';

/* o que e */
$lang['csf_whats_title'] = 'O que �?';
$lang['csf_whats_01'] = 'O Programa Ci�ncia sem Fronteiras objetiva propiciar a forma��o de recursos humanos altamente qualificados nas melhores universidades e institui��es de pesquisa estrangeiras, com vistas a promover a internacionaliza��o da ci�ncia e da tecnologia nacional, estimulando estudos e pesquisas de brasileiros no exterior, inclusive com a expans�o significativa do interc�mbio e da mobilidade de graduandos.';

$lang['csf_whats_title_02'] = 'Objetivos espec�ficos:';
$lang['csf_whats_02'] = 'oferecer oportunidade de estudo a discentes brasileiros em universidades de excel�ncia, bem como oferecer a possibilidade de est�gio programado de pesquisa ou inova��o tecnol�gica com acompanhamento;';
$lang['csf_whats_03'] = 'permitir a atualiza��o de conhecimentos em grades curriculares diferenciadas, possibilitando o acesso de estudantes brasileiros a institui��es de elevado padr�o de qualidade, visando a complementar sua forma��o t�cnico-cient�fica em �reas priorit�rias e estrat�gicas para o desenvolvimento do Brasil;';
$lang['csf_whats_04'] = 'complementar a forma��o de estudantes brasileiros, dando-lhes a oportunidade de vivenciar experi�ncias educacionais voltadas para a qualidade, o empreendedorismo, a competitividade e inova��o;';
$lang['csf_whats_05'] = 'estimular iniciativas de internacionaliza��o das universidades brasileiras;';
$lang['csf_whats_06'] = 'possibilitar a forma��o, com qualidade, de uma for�a de trabalho t�cnico-cient�fica altamente especializada.';

/* o que e */
$lang['csf_editais_title'] = 'Editais';
$lang['csf_editais_01'] = 'Nenhum edital dispon�vel no momento.';

/* footer */
$lang['csf_footer_01'] = 'Coordena��o do Ci�ncia sem Fronteiras da PUCPR';
$lang['csf_footer_bt_back'] = 'Voltar';











?>