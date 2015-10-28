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
				<?php echo $sm_rem_01;?>
				<?php echo $sm_rem_02;?>
				<?php echo $sm_rem_03;?>
				<?php echo $sm_rem_04;?>
				<?php echo $sm_rem_05;?>
			</P>
		</div><B>Palavras-chave</B>: <?php echo $sm_rem_06;?>
		<BR>
		<BR>
		</td>
		<?php if (strlen($sm_rem_11.$sm_rem_12.$sm_rem_13) > 0)
		?>
	</tr>
</table>
<br><br><br>
