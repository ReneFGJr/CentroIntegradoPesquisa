<?php
$edital = lowercase($doc_edital);
$logo = 'logo_ic_'.$edital.'.png';
?>
<table width="100%" class="tabela00 border1" style="border-radius: 10px;">
	<tr valign="top">
		<td width="5%" class="lt6 border1" align="center" rowspan=4 ><font class="lt0">Plano</font><br><?php echo $nrplano;?>
			<br><font class="lt1"><?php echo $doc_protocolo;?></font>
			
		</td>
		<td rowspan=5 width="5%"><img src="http://localhost/projeto/CentroIntegradoPesquisa/img/logo/<?php echo $logo;?>" height="50"></td>
		<td><b><?php echo $doc_1_titulo;?></b></td>
		<td width="5%" align="center" rowspan=4 >
			<a href="#" class="link">
			<font color="red"><font class="lt0">excluir<br>plano</font><br><font class="lt6"><b>X</b></font></font>
			</a>
			</td>
	</tr>
	<tr>
		<td class="lt1"><i>Estudante: <?php echo $us_nome;?></i></td>
	</tr>
	<tr>
		<td class="lt0"><i>Aluno oriundo de escola pública: <b>Não</b></i></td>
	</tr>	
	<tr>
		<td class="lt0">Arquivos do Plano:
			<br>XXX	
		</td>
	</tr>		
</table>
<br>