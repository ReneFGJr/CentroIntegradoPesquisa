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
$lang['csf_o_que_e'] = 'O que щ?';
$lang['csf_editais'] = 'Editais';
$lang['csf_despedida'] = 'Despedida 2015 1К Semestre';
$lang['csf_csf'] = 'Ciъncia sem Fronteiras';

/* Crousel_parte_01 */
$lang['csf_banner_01_a'] = 'Somos 421 alunos CsF PUCPR pelo mundo.';
$lang['csf_banner_01_b'] = 'Saiba mais sobre os nossos bolsistas.';
$lang['csf_banner_01_c'] = 'Depoimento dos intercтmbistas CsF da PUCPR.';
$lang['csf_banner_01_d'] = 'Veja o que os estudantes da PUCPR estуo falando sobre o Ciъncia sem Fronteiras.';
/* Botoes */
$lang['csf_banner_bt_1'] = 'Ver indicadores';
$lang['csf_banner_bt_2'] = 'Ver detalhes';

/* Crousel_part_02 */
$lang['csf_crousel_2_a'] = 'Indicadores CsF PUCPR';
$lang['csf_crousel_2_b'] = 'Resultados do Ciъncia sem Fronteiras na PUCPR desde 2012.';
$lang['csf_crousel_2_c'] = 'Depoimentos';
$lang['csf_crousel_2_d'] = 'Saiba como foi a experiъncia dos alunos PUCPR que jс foram para o intercтmbio Ciъncia sem Fronteiras.';
$lang['csf_crousel_2_e'] = 'Dњvidas?';
$lang['csf_crousel_2_f'] = 'Acesse a nossa sessуo de Perguntas Frequentes e tire suas dњvidas.';

/* Crousel_part_03 */
$lang['csf_crousel_3_a'] = 'Alunos aprovam 100% o Ciъncia sem Fronteiras';
$lang['csf_crousel_3_b'] = '100% dos alunos responderam que fariam o intercтmbio novamente. Ainda estс com dњvidas que o Ciъncia sem Fronteiras щ uma ѓtima oportunidade para sua carreira? Veja os ';
$lang['csf_crousel_3_c'] = 'depoimentos dos alunos.';

/* indicadores */
$lang['csf_indicadores_a'] = 'Indicadores Ciъncia sem Fronteiras administrado pela PUCPR.';
$lang['csf_indicadores_b'] = 'A PUCPR participou de todos os editais lanчados pelo Governo Federal desde 2012. Щ a 1Њ. Instituiчуo de Ensino Superior Privado em nњmero de bolsas no Estado do Paranс e a 3Њ entre todas as IES do Estado. Jс enviamos bolsistas para mais de 20 paэses em mais de 150 Universidades de Destino. Alguns de nossos bolsistas que jс concluэram a graduaчуo deram continuidade em sua formaчуo realizando cursos de especializados e mestrado; vсrios estуo se preparando para o doutorado. Confira estas e outras informaчѕes nos indicadores a seguir:';
$lang['csf_indicadores_bt_1'] = 'Bolsas por Parceiros';
$lang['csf_indicadores_bt_2'] = 'Bolsas por paэs';
$lang['csf_indicadores_bt_3'] = 'Bolsas por curso';
$lang['csf_indicadores_bt_4'] = 'Bolsas por instituiчуo';
$lang['csf_indicadores_bt_5'] = 'Situaчуo dos estudantes';
$lang['csf_indicadores_bt_6'] = 'Bolsas por gъnero';
$lang['csf_indicadores_bt_7'] = 'Avanчo anual';

/* footer */
$lang['csf_bt_back'] = 'Voltar';

/* faq */
$lang['csf_faq_title'] = 'Perguntas Frequentes';
$lang['csf_faq_question_01'] = 'Como faчo para me inscrever no programa?';
$lang['csf_faq_question_02'] = 'Quem inscreve os candidatos? O coordenador responsсvel ou o prѓprio candidato?';
$lang['csf_faq_question_03'] = 'O meu curso de graduaчуo se inclui dentro das сreas prioritсrias?';
$lang['csf_faq_question_04'] = 'Hс exigъncia de proficiъncia em lэngua estrangeira? Quais exames de proficiъncia em lэngua estrangeira serуo aceitos?';
$lang['csf_faq_question_05'] = 'Quais Universidades no exterior podem participar do programa?';
$lang['csf_faq_question_06'] = 'Quais sуo as сreas сreas prioritсrias que posso concorrer?';
$lang['csf_faq_question_07'] = 'Quem decide se o curso do candidato estс dentro das сreas prioritсrias?';
$lang['csf_faq_question_08'] = 'Os estudantes e pesquisadores beneficiados pelo programa sѓ poderуo atuar dentro das сreas prioritсrias do CsF?';
$lang['csf_faq_question_09'] = 'Ainda nуo tenho o resultado do Teste de Proficiъncia, posso enviar depois?';
$lang['csf_faq_question_10'] = 'Ainda nуo concluэ a graduaчуo, posso participar do programa?';
$lang['csf_faq_question_11'] = 'Sou aluno PIBIC, como devo proceder?';
$lang['csf_faq_question_12'] = 'Onde devo anexar os documentos exigidos na inscriчуo?';
$lang['csf_faq_question_13'] = 'A documentaчуo exigida pode ser enviada por e-mail?';
$lang['csf_faq_question_14'] = 'Tenho Bolsa auxэlio da PUCPR, ProUNI ou FIES, como devo proceder?';
$lang['csf_faq_question_15'] = 'Qual щ o valor da bolsa para alunos que vуo para o Exterior?';
$lang['csf_faq_question_16'] = 'Quando ficarei sabendo para qual instituiчуo irei?';
$lang['csf_faq_question_17'] = 'Posso escolher em que Universidade quero estudar no exterior?';

$lang['csf_faq_resp_quest_01_a'] = 'O aluno candidato deverс inscrever - se no site do Ciъncia Sem Fronteiras pelo seguinte link:';
$lang['csf_faq_resp_quest_01_b'] = 'Щ necessсria a inscriчуo nesse canal para que toda e qualquer informaчуo sobre a candidatura do aluno seja disponibilizada a Coordenaчуo do Ciъncia sem Fronteiras da PUCPR(CSF). Sendo assim, poderemos acompanhar o processo de inscriчуo e aprovaчуo de cada aluno para assim esclarecer qualquer dњvida que se faчa necessсria.';
$lang['csf_faq_resp_quest_02'] = 'O prѓprio candidato щ responsсvel pela sua inscriчуo tanto no site do governo como no site da PUCPR. O coordenador щ responsсvel por divulgar as chamadas, prazos e procedimentos especэficos. Apѓs o tщrmino das inscriчѕes a CAPES/CNPq enviam as inscriчѕes realizadas para que o coordenador faчa a homologaчуo.';
$lang['csf_faq_resp_quest_03'] = 'A relaчуo das сreas consideradas prioritсrias no programa do Ciъncia sem Fronteiras pode ser consultada no Portal do Programa.';
$lang['csf_faq_resp_quest_04'] = 'A exigъncia serс feita conforme acordo realizado entre as agъncias (CNPq e CAPES) e a instituiчуo de ensino estrangeira. Leia com atenчуo o texto completo da Chamada ao Paэs que vocъ estс se candidatando. Cada chamada tem suas regras especэficas.';
$lang['csf_faq_resp_quest_05'] = 'As Universidades de excelъncia no exterior  firmaram acordos com os representantes Educacionais (parceiros) de cada paэs ou com o CNPq e a CAPES. O parceiro de cada chamada щ que disponibilizarс a relaчуo das Universidades participantes do Programa.';
$lang['csf_faq_resp_quest_06'] = 'Temas e сreas de interesse: Engenharias e demais сreas tecnolѓgicas; Ciъncias Exatas e da Terra: Fэsica, Quэmica, Biologia e Geociъncias, Ciъncias Biomщdicas e da Saњde; Computaчуo e tecnologias da informaчуo; Tecnologia Aeroespacial; Fсrmacos; Produчуo Agrэcola Sustentсvel; Petrѓleo, Gсs e Carvуo Mineral; Energias Renovсveis; Tecnologia Mineral; Biotecnologia; Nanotecnologia e Novos materiais; Tecnologias de Prevenчуo e Mitigaчуo de Desastres Naturais; Biodiversidade e Bioprospecчуo; Ciъncias do Mar; Indњstria criativa; Novas Tecnologias de Engenharia Construtiva; Formaчуo de Tecnѓlogos. Veja se hс restriчуo de alguma сrea prioritсria na chamada de seu interesse.';
$lang['csf_faq_resp_quest_07'] = 'A CAPES/CNPq analisam se o curso de graduaчуo do candidato estс ou nуo incluэdo entre as сreas prioritсrias.';
$lang['csf_faq_resp_quest_08'] = 'Sim. Tanto estudantes como pesquisadores deverуo seguir as сreas prioritсrias, constantes do Programa.';
$lang['csf_faq_resp_quest_09'] = 'Leia com atenчуo o cronograma da chamada que estс se candidatando e siga rigorosamente o prazo estabelecido. Geralmente щ possэvel enviar posteriormente ao tщrmino da inscriчуo o  resultado do teste de proficiъncia';
$lang['csf_faq_resp_quest_10'] = 'Sim, desde que tenha concluэdo de 20% a no mсximo 90% do curso na instituiчуo de ensino brasileira e esteja devidamente matriculado. Neste caso, a aluno pode pleitear a bolsa Graduaчуo Sanduэche no Exterior (SWG) para fazer intercтmbio de 6 a 12 meses no exterior,de acordo com cada Chamada.';
$lang['csf_faq_resp_quest_11'] = 'Vocъ deverс comunicar a Coordenaчуo do PIBIC da PUCPR sobre a sua aprovaчуo  na Universidade Destino, para que a bolsa  PIBIC seja cancelada. Sѓ assim vocъ poderс dar o aceite a sua bolsa do CSF. O CNPq/CAPES nуo autorizam o acњmulo de bolsas.';
$lang['csf_faq_resp_quest_12'] = 'Os documentos da inscriчуo exigidos na chamada pњblica devem ser anexados dentro do formulсrio de inscriчуo disponэvel no "formulсrio de inscriчѕes". Todos os documentos deverуo anexados em PDF.';
$lang['csf_faq_resp_quest_13'] = 'Nуo. As documentaчѕes exigidas deverуo ser anexadas no site na pсgina do programa, respeitando o respectivo calendсrio. Lembrando que todos os documentos devem estar no formato PDF.';
$lang['csf_faq_resp_quest_14'] = 'Vocъ deverс comunicar a Coordenaчуo do CsF caso tenha qualquer auxэlio para cursar a graduaчуo na Universidade, seja Bolsa PUCPR, FIES ou ProUNI. Esse auxэlio serс suspenso pela Coordenaчуo e o aluno deverс comparecer ao SIGA para assinar o termo de "suspensуo temporсria", assim a bolsa nуo serс cancelada tendo o aluno direito de reativс-la no seu retorno р PUCPR.';
$lang['csf_faq_resp_quest_15'] = 'No site do Ciъncia Sem Fronteiras na chamada de cada Paэs tem os valores especэficos. Os valores variam de um Paэs para o outro.';
$lang['csf_faq_resp_quest_16'] = 'O estudante serс comunicado por e-mail em qual Universidade foi aceito, bem como os procedimentos para os passos posteriores.';
$lang['csf_faq_resp_quest_17'] = 'Os parceiros que intermedeiam as universidades estrangeiras e as agъncias responsсveis pelo programa Ciъncia sem Fronteiras serуo os responsсveis por aplicar as universidades, utilizando a pertinъncia quanto рs сreas prioritсrias do Programa Ciъncia sem Fronteiras.';

/* contato */
$lang['csf_contact_title'] = 'Contato';
$lang['csf_contact_01'] = 'Coordenaчуo do Ciъncia sem Fronteiras da PUCPR';
$lang['csf_contact_02'] = 'Coordenaчуo de Intercтmbio Internacional e Cooperaчуo';
$lang['csf_contact_03'] = 'Administrativo';
$lang['csf_contact_04'] = 'Rua Imaculada Conceiчуo, 1155';
$lang['csf_contact_05'] = 'Prщdio Administrativo - Tщrreo Cтmpus Curitiba';
$lang['csf_contact_06'] = 'Bairro Prado Velho';
$lang['csf_contact_07'] = 'CEP 80215-901';
$lang['csf_contact_08'] = 'Prщdio Administrativo - Tщrreo Cтmpus Curitiba';

/* o que e */
$lang['csf_whats_title'] = 'O que щ?';
$lang['csf_whats_01'] = 'O Programa Ciъncia sem Fronteiras objetiva propiciar a formaчуo de recursos humanos altamente qualificados nas melhores universidades e instituiчѕes de pesquisa estrangeiras, com vistas a promover a internacionalizaчуo da ciъncia e da tecnologia nacional, estimulando estudos e pesquisas de brasileiros no exterior, inclusive com a expansуo significativa do intercтmbio e da mobilidade de graduandos.';

$lang['csf_whats_title_02'] = 'Objetivos especэficos:';
$lang['csf_whats_02'] = 'oferecer oportunidade de estudo a discentes brasileiros em universidades de excelъncia, bem como oferecer a possibilidade de estсgio programado de pesquisa ou inovaчуo tecnolѓgica com acompanhamento;';
$lang['csf_whats_03'] = 'permitir a atualizaчуo de conhecimentos em grades curriculares diferenciadas, possibilitando o acesso de estudantes brasileiros a instituiчѕes de elevado padrуo de qualidade, visando a complementar sua formaчуo tщcnico-cientэfica em сreas prioritсrias e estratщgicas para o desenvolvimento do Brasil;';
$lang['csf_whats_04'] = 'complementar a formaчуo de estudantes brasileiros, dando-lhes a oportunidade de vivenciar experiъncias educacionais voltadas para a qualidade, o empreendedorismo, a competitividade e inovaчуo;';
$lang['csf_whats_05'] = 'estimular iniciativas de internacionalizaчуo das universidades brasileiras;';
$lang['csf_whats_06'] = 'possibilitar a formaчуo, com qualidade, de uma forчa de trabalho tщcnico-cientэfica altamente especializada.';

/* o que e */
$lang['csf_editais_title'] = 'Editais';
$lang['csf_editais_01'] = 'Nenhum edital disponэvel no momento.';

/* footer */
$lang['csf_footer_01'] = 'Coordenaчуo do Ciъncia sem Fronteiras da PUCPR';
$lang['csf_footer_bt_back'] = 'Voltar';











?>