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
$lang['csf_home'] = 'Home';
$lang['csf_indicadores'] = 'Indicators';
$lang['csf_sobre'] = 'About the Programme';
$lang['csf_eventos'] = 'Events';
$lang['csf_depoimentos'] = 'Testimonials';
$lang['csf_faq'] = 'FAQ';
$lang['csf_contato'] = 'Contact';
$lang['csf_o_que_e'] = 'Description';
$lang['csf_editais'] = 'Calls';
$lang['csf_despedida'] = 'Farewell 2015 1st Semester';
$lang['csf_csf'] = 'Science without Borders';

/* Crousel_part_01 */
$lang['csf_banner_01_a'] = 'We are 421 students CsF PUCPR the world.';
$lang['csf_banner_01_b'] = 'Learn more about our fellows.';
$lang['csf_banner_01_c'] = 'Testimonials of SwB exchange students of the PUCPR.';
$lang['csf_banner_01_d'] = 'See what students from the PUCPR are saying aboutScience without Borders.';
/* Botoes banner */
$lang['csf_banner_bt_1'] = 'See indicators';
$lang['csf_banner_bt_2'] = 'See details';

/* Crousel_part_02 */
$lang['csf_crousel_2_a'] = 'PUCPR SwB Indicators';
$lang['csf_crousel_2_b'] = 'Results of Science without Borders at the PUCPR since 2012.';
$lang['csf_crousel_2_c'] = 'Testimonials';
$lang['csf_crousel_2_d'] = 'Learn about the experience of PUCPR students who have already embarked in Science without Borders.';
$lang['csf_crousel_2_e'] = 'Doubts?';
$lang['csf_crousel_2_f'] = 'Visit our Frequently Asked Questions section and get answers to your queries. See details.';
/* Botoes */
$lang['csf_crousel_2_bt_a'] = 'See details';

/* Crousel_part_03 */
$lang['csf_crousel_3_a'] = 'Students 100% approve Science without Borders';
$lang['csf_crousel_3_b'] = '100% of students responded that they would do the exchange again. Still having doubts that Science without Borders is a great opportunity for your career? See the ';
$lang['csf_crousel_3_c'] = 'student testimonials.';

/* indicadores */
$lang['csf_indicadores_a'] = 'Indicators of Science without Borders administered by the PUCPR.';
$lang['csf_indicadores_b'] = 'The PUCPR participated in all tenders launched by the Federal Government since 2012. It is the 1st. Institution of Private Higher Education in the number of scholarships in the state of Paranс and the 3rd among all state HEIs. We have sent scholars to over 20 countries in more than 150 Destination Universities. Some of our fellows who have completed graduation they continued their training in conducting specialized courses and masters; several are preparing for a doctorate. Check out this and other information in the following indicators:';
$lang['csf_indicadores_bt_1'] = 'SwB partners';
$lang['csf_indicadores_bt_2'] = 'Scholarships by country';
$lang['csf_indicadores_bt_3'] = 'Scholarships by course';
$lang['csf_indicadores_bt_4'] = 'Scholarships by institution';
$lang['csf_indicadores_bt_5'] = 'Status by students';
$lang['csf_indicadores_bt_6'] = 'Gender of students';
$lang['csf_indicadores_bt_7'] = 'Annual growth';

/* footer */
$lang['csf_bt_back'] = 'Back';

/* faq */
$lang['csf_faq_title'] = 'Frequently Asked Questions';
$lang['csf_faq_question_01'] = 'How do I enrol in the program?';
$lang['csf_faq_question_02'] = 'Who enlists the candidates? The coordinator or the actual candidate?';
$lang['csf_faq_question_03'] = 'Is my graduation course included in the priority areas?';
$lang['csf_faq_question_04'] = 'Is there a foreign language proficiency requirement?';
$lang['csf_faq_question_05'] = 'Which overseas universities can participate in the programme?';
$lang['csf_faq_question_06'] = 'What are the priority areas that I can apply for?';
$lang['csf_faq_question_07'] = 'Who decides whether the candidate is in the priority areas?';
$lang['csf_faq_question_08'] = 'Should students and researchers who are beneficiaries of the programme adhere to SwB priority areas?';
$lang['csf_faq_question_09'] = 'I donДt have the result of my proficiency test. Can I send it later?';
$lang['csf_faq_question_10'] = 'I have not finished my undergraduate studies, yet. Can I still participate in the programme?';
$lang['csf_faq_question_11'] = 'IДm a PIBIC student, how should I proceed?';
$lang['csf_faq_question_12'] = 'Where do I submit the documents required for registration?';
$lang['csf_faq_question_13'] = 'Can the required documentation be submitted by e-mail?';
$lang['csf_faq_question_14'] = 'I have a PUCPR, ProUni or FIES grant. How should I proceed?';
$lang['csf_faq_question_15'] = 'When will I know to what institution I will go?';
$lang['csf_faq_question_16'] = 'Can I choose the overseas university I want to go to?';

$lang['csf_faq_resp_quest_01_a'] = 'Applicants should register at the Science without Borders website:';
$lang['csf_faq_resp_quest_01_b'] = 'The registration in this website is required for all and any information on student applications to be submitted to the Coordination Office of Science without Borders of the PUCPR (SwB). This way, we can accompany the registration and approval process of each student and answer any further queries.';
$lang['csf_faq_resp_quest_02'] = 'The candidate is responsible for registering at the government website and at the PUCPR website. The coordinator is responsible for the public calls, deadlines and specific procedures. At the end of the registration process, CAPES/CNPq submits all the applications to the coordinator for approval.';
$lang['csf_faq_resp_quest_03'] = 'The list of areas that are considered priorities in the Science without Borders programme is available at the programme website.';
$lang['csf_faq_resp_quest_04'] = 'Which foreign language proficiency examinations are accepted? The requirement is based on the agreement between the agencies (CNPq and CAPES) and the foreign language institute. Read the full text of the call for the country to which you are applying. Each call has its specific rules.';
$lang['csf_faq_resp_quest_05'] = 'Top overseas universities signed agreements with the educational representatives (partners) of each country or with the CNPq and CAPES. The partner of each call will provide the list of universities that are participating in the programme.';
$lang['csf_faq_resp_quest_06'] = 'Topics and areas of interest: Engineering and other technology areas; Exact and Earth Sciences: Physics, Chemistry, Biology and Geosciences, Biomedical and Health Sciences; Computer Science and information technologies; Aerospace Technology; Pharmaceuticals; Sustainable Agricultural Production; Oil, Gas and Coal; Renewable Energies; Mineral Technology; Biotechnology; Nanotechnology and new materials; Technologies of Prevention and Mitigation of Natural Disasters; Biodiversity and Bioprospecting; Marine Science; Creative industry; New Technologies of Constructive Engineering; Training for Technologists. See if there are any restrictions for the priority area in the call of your interest.';
$lang['csf_faq_resp_quest_07'] = 'CAPES/CNPq analyze if the applicantДs graduation course or field is included in the priority areas.';
$lang['csf_faq_resp_quest_08'] = 'Yes. Both students and researchers should observe the priority areas listed in the programme.';
$lang['csf_faq_resp_quest_09'] = 'Read the schedule of the call to which you are applying carefully and follow the required time limits. It is usually possible to send the proficiency test results after registration.';
$lang['csf_faq_resp_quest_10'] = 'Yes, provided you have completed a minimum of 20% and a maximum of 90% of the course at a Brazilian educational institution and you are properly registered. In this case, students can apply for the Undergraduate Overseas Sandwich (SWG) scholarship for a 6 to 12 month overseas exchange, according to each call.';
$lang['csf_faq_resp_quest_11'] = 'You must notify the PIBIC coordination office at the PUCPR about your approval at the destination university to cancel the PIBIC grant. Only then can you accept your SwB scholarship.  CNPq/CAPES does not allow the accumulation of scholarships.';
$lang['csf_faq_resp_quest_12'] = 'The registration documents requested in the public call should be attached to the registration form provided in "registration forms". All the attached documents should be in PDF format.';
$lang['csf_faq_resp_quest_13'] = 'No. The required documentation should be attached via the programme page at the website, according to the respective schedule. All documentation should be submitted in PDF format.';
$lang['csf_faq_resp_quest_14'] = 'You must notify the SwB coordination office if you receive any financial support to attend a university programme, regardless of whether the grant is from the PUCPR, FIES or ProUNI. This grant will be suspended by the coordination office and the student must report to SIGA to sign a term of "temporary suspension", so the grant is not cancelled and the student can reactivate the grant on his or her return to the PUCPR.';
$lang['csf_faq_resp_quest_15'] = 'Students will receive a notice of acceptance via email with the name of the university, and the procedures for the next steps.';
$lang['csf_faq_resp_quest_16'] = 'The intermediaries of the overseas universities and the agencies responsible for the Science without Borders programme will be responsible for applying to the universities according to the priority areas of the Science without Borders programme.';

/* contato */
$lang['csf_contact_title'] = 'Contact';
$lang['csf_contact_01'] = 'Science without Border Coordination Office at PUCPR';
$lang['csf_contact_02'] = 'Coordination of International Exchange and Cooperation';
$lang['csf_contact_03'] = 'Administrative';
$lang['csf_contact_04'] = 'Street Imaculada Conceiчуo, 1155';
$lang['csf_contact_05'] = 'Administrative building - 6th walking - Campus Curitiba';
$lang['csf_contact_06'] = 'Distrito Prado Velho';
$lang['csf_contact_07'] = 'Zip code 80215-901';
$lang['csf_contact_08'] = 'Administrative building - Ground floor - Campus Curitiba';

/* o que e */
$lang['csf_whats_title'] = 'What is it?';
$lang['csf_whats_01'] = 'The Science without Borders Programme was launched by the Federal Government in 2012. It is managed by the Brazilian higher education agencies CAPES (Coordenaчуo de Aperfeiчoamento de Pessoal de Nэvel Superior) and CNPq (Conselho Nacional de Desenvolvimento Cientэfico e Tecnolѓgico). The programme chiefly aims to provide extended education for highly qualified human resources in the best foreign universities and research institutions in order to promote the internationalisation of national science and technology, and to encourage the studies and research of Brazilians abroad with the significant expansion of exchange experiences and the mobility of graduation students.';

$lang['csf_whats_title_02'] = 'Specific goals:';
$lang['csf_whats_02'] = 'To offer Brazilian students the opportunity to study in universities of excellence, and the possibility of completing a programmed internship of research or technological innovation with supervision;';
$lang['csf_whats_03'] = 'To enable the updating of knowledge in distinguished curricula by allowing Brazilian students access to top institutions in order to complement their technical and scientific training in priority and strategic areas for the development of Brazil;';
$lang['csf_whats_04'] = 'To complement the higher education of Brazilian students by giving them the opportunity to benefit from an educational experience that is based on quality, entrepreneurship, competitiveness and innovation;';
$lang['csf_whats_05'] = 'To stimulate the internationalization initiatives of Brazilian universities;';
$lang['csf_whats_06'] = 'To enable the quality education of a highly qualified technical and scientific work force.';

/* o que e */
$lang['csf_editais_title'] = 'Public Call Pages';
$lang['csf_editais_01'] = 'No scholarship calls at the moment.';

/* footer */
$lang['csf_footer_01'] = 'Coordination of the Science without Borders PUCPR';
$lang['csf_footer_bt_back'] = 'Back';





























?>