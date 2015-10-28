<?php
/****** Autores ************/
$nome_trab = '';
$nome_cita = '';
$nome_quali = '';
?>
<a name="resumo"></a>

<table width="980" border=0>
	<tr><td align="left"><font class="lt6"><b>Resumo e Abstract</b></font></td></tr>	
	<tr><td align="left"><a href="#top" class="link lt1">VOLTA AO TOPO</a></td></tr>
	<tr><td><br><br></td></tr>
	<tr>
		<td align="center"><font class="lt5"><b><?php echo $sm_titulo;?></b></font>
		<BR>
		<font class="lt4"><i><?php echo $sm_titulo_en;?></i></font>
		<BR>
		</td>
	</tr>
	<tr valign="top">
		<td> Resumo
		<div style="text-align:justify;">
			<P>
				<B>Introdução</B>: <?php echo $sm_rem_01;?>
				<B>Objetivo</B>: <?php echo $sm_rem_02;?>
				<B>Metodologia</B>: <?php echo $sm_rem_03;?>
				<B>Resultados</B>: <?php echo $sm_rem_04;?>
				<B>Conclusões</B>: <?php echo $sm_rem_05;?>
			</P>
		</div><B>Palavras-chave</B>: <?php echo $sm_rem_06;?>
		<BR>
		<BR>
		</td>
		<?php if (strlen($sm_rem_11.$sm_rem_12.$sm_rem_13) > 0)
{
		?>
	</tr>
	<tr valign="top">
		<td> Abstract
		<div style="text-align:justify;">
			<P>
				<B>Introduction</B>: <?php echo $sm_rem_11;?>
				<B>Objectives</B>: <?php echo $sm_rem_12;?>
				<B>Methods</B>: <?php echo $sm_rem_13;?>
				<B>Results</B>: <?php echo $sm_rem_14;?>
				<B>Conclusion</B>: <?php echo $sm_rem_15;?>
			</P>
		</div><B>Keywords</B>: <?php echo $sm_rem_16;?></td>
		<?php }?>
	</tr>
</table>
<br><br><br>
