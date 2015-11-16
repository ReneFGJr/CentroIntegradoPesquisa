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

?>