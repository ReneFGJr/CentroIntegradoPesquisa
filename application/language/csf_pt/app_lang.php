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
$lang['csf_home'] = 'Inicial';
$lang['csf_indicadores'] = 'Indicadores';
$lang['csf_sobre'] = 'Sobre';
$lang['csf_eventos'] = 'Eventos';
$lang['csf_depoimentos'] = 'Depoimentos';
$lang['csf_faq'] = 'Faq';
$lang['csf_contato'] = 'Contato';
$lang['csf_o_que_e'] = 'O que é?';
$lang['csf_editais'] = 'Editais';
$lang['csf_despedida'] = 'Despedida 2015 1º Semestre';
$lang['csf_csf'] = 'Ciência sem Fronteiras';


?>