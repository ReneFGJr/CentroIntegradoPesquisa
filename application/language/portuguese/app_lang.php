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

$lang['versao'] = 'v0.15.25';

/* Formulário de consulta */
$lang['busca'] = 'BUSCA';

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

/* Botoes */
$lang['bt_update'] = 'ATUALIZAR';

/*
 * Ciência sem fronteiras */
$lang['csf_title_novo'] = 'Novo registro de aluno - CSF';

/* Atores do sistema */
$lang['titulacao'] = 'titulação';
$lang['link_lattes'] = 'link para o Lattes';

/* Fomentos */
$lang['fomento_editais'] = 'Editais de fomento';
$lang['title_fomento_editais'] = 'Editais de fomento';



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
?>
