<?php
$edital = lowercase($doc_edital);
$logo = 'logo_ic_'.$edital.'.png';
$cancel = '<a href="#" class="link" onclick="cancelar_plano('.$id_doc.');">
			<font color="red"><font class="lt0">excluir<br>plano</font><br><font class="lt6"><b>X</b></font></font>
			</a>';
$arquivos_label = 'Arquivos do Plano:';


if (isset($bloquear))
	{
		$cancel = '';
		$arquivos_label = '';
	}

if (!isset($fcn))
	{
		$sx = '
		<script>
		function cancelar_plano($id)
				{
					rsp = confirm(\'Confirmar exclusão deste plano?\'+$id);
					if (rsp)
						{
							window.location.assign("'.base_url('index.php/ic/submit_edit/'.$tipo.'/' . $id . '/3/3/DEL/').'/" + $id);
						}
				}
			</script>';
		echo $sx;
		$fnc=1;
	}
?>
<table width="100%" class="tabela00 border1" style="border-radius: 10px;">
	<tr valign="top">
		<td width="5%" class="lt6 border1" align="center" rowspan=4 ><font class="lt0">Plano</font><br><?php echo $nrplano;?>
			<br><font class="lt1"><?php echo $doc_protocolo;?></font>
			
		</td>
		<td rowspan=5 width="5%"><img src="<?php echo base_url('img/logo/'.$logo);?>" height="50"></td>
		<td><b><?php echo $doc_1_titulo;?></b></td>
		<td width="5%" align="center" rowspan=4 >
			<?php echo $cancel; ?>
			</td>
	</tr>
	<tr>
		<td class="lt1"><i>Estudante: <?php echo $us_nome;?></i></td>
	</tr>
	<tr>
		<td class="lt0"><i>Aluno oriundo de escola pública: <b>Não</b></i></td>
	</tr>	
	<tr>
		<td class="lt0"><?php echo $arquivos_label;?>
			<br><?php echo $arquivos;?>	
			<br><?php echo $arquivos_submit;?>
		</td>
	</tr>		
</table>
<br>

