<?php
$edital = lowercase($doc_edital);
$logo = 'logo_ic_'.$edital.'.png';
$cancel = '';
$arquivos_label = 'Arquivos do Plano:';

$doc_aluno_escola_publica = 'N�O';
if ($doc_icv == '1')
	{
		$doc_aluno_escola_publica = 'SIM';
	}

if (isset($bloquear))
	{
		$cancel = '';
		$arquivos_label = '';
	}

if (isset($bloquear))
	{
		$cancel = '';
		$arquivos_label = '';
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
		<td class="lt1"><i>Estudante: <?php echo $us_nome;?> (<?php echo $doc_aluno; ?>)</i></td>
	</tr>
	<tr>
		<td class="lt0"><i>Aluno oriundo de escola p�blica: <b><?php echo $doc_aluno_escola_publica; ?></b></i></td>
	</tr>	
	<tr>
		<td class="lt0"><?php echo $arquivos_label;?>
			<br><?php echo $arquivos;?>	
			<br><?php echo $arquivos_submit;?>
		</td>
	</tr>		
</table>
<br>
