<?php
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
	
function link_ic($id=0)
	{
		$href = '<a href="'.base_url('index.php/ic/view/'.$id.'/'.checkpost_link($id)).'" class="link lt4">';
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