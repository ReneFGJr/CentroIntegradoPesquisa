<?php
function enviaremail_usuario($para, $assunto, $texto, $de)
	{
		global $server_type;
		require("_server_type.php");
		$ok = 0;

		$CI = &get_instance();
		$sql = "select usm_email from us_email 
					where usuario_id_us = ".$para." and usm_ativo = 1 
					order by usm_email_preferencial desc ";
		$rlt = $CI->db->query($sql);
		$rlt = $rlt->result_array();
		
		$ok = 0;
		$email = array();
		for ($r=0;$r < count($rlt);$r++)
			{
				$line = $rlt[$r];
				$e = $line['usm_email'];
				if ((strlen($e) > 0) and (strpos($e,'@') > 0))
					{
						array_push($email,$e);
					}
			}
		if ($server_type > 2)
				{			
					$ok = enviaremail($email, $assunto, $texto, $de);
				}
		return($ok);
	}


function base_url_site($link)
	{
		$http = 'http://cip.pucpr.br/'.$link;
		return($http);
	}
function usuario_tipo($tp)
	{
		switch($tp)
			{
			case '2':
				$sx = 'Professor';
				break;
			case '3':
				$sx = 'Aluno';
				break;
			case '4':
				$sx = 'Colaborador';
				break;				
			case '5':
				$sx = 'Externo';
				break;			
			default:
				$sx = 'Não definido';
				break;
			}
		return($sx);
	}
	
function link_ic($id=0,$page='ic')
	{
		$href = '<a href="'.base_url('index.php/'.$page.'/view/'.$id.'/'.checkpost_link($id)).'" class="link">';
		return($href);
	}
function link_user($nome,$id,$ln=array())
	{
		return(link_perfil($nome='',$id,$ln=array()));
	}
function link_perfil($nome='',$id,$ln=array())
	{
		$id = round($id);
		/* Inativo */
		$cor = '<font>';
		if (isset($ln['us_inativo']))
			{
				if ($ln['us_inativo'] == 0)
					{
						$cor='<font color="red">';
					}
			}
		$href = '<a href="'.base_url('index.php/usuario/view/'.$id.'/'.checkpost_link($id)).'" target="_new" class="link">';
		if ($id == 0)
			{
				$href = '<font color="#c0c0c0">-sem indicação-</A>';
			} else {
				if (strlen($nome) == '')
					{
						$sql = "select * from us_usuario where id_us = ".round($id);
						$rlt = db_query($sql);
						$line = db_read($rlt);
						$nome = $line['us_nome'];
					}
				$href .= $cor.$nome.'</font></A>';		
			}
		
		return($href);
	}	
function link_avaliador($nome='',$id)
	{
		$id = round($id);
		$href = '<a href="'.base_url('index.php/avaliador/view/'.$id.'/'.checkpost_link($id)).'" target="_new">';
		if ($id == 0)
			{
				$href = '<font color="blue">-sem indicação-</A>';
			} else {
				if (strlen($nome) == '')
					{
						$sql = "select * from us_usuario where id_us = ".round($id);
						$rlt = db_query($sql);
						$line = db_read($rlt);
						$nome = $line['us_nome'];
					}
				$href .= $nome.'</A>';		
			}
		
		return($href);
	}
?>