<table width="1024" border=0 align="center" cellpadding="0" cellspacing="0">
	<tr class="cab_semic">
		<td><?php echo $title; ?></td>
	</tr>
	<tr class="cab_logo_semic" valign="middle">
		<td><br>&nbsp;<br><img src="<?php echo base_url('img/semic/banner_semic_2015.png'); ?>"><br>&nbsp;<br>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<form method="post">
		</td>
	</tr>
	<tr class="cab_logo_semic" valign="middle">
		<td>
		<table width="100%" cellpadding="0" cellspacing="0" style="border: 0px #000000 solid;">
			<tr>
				<td valign="right" class="cab_id pad20" width="80%">ID do AVALIADOR
				<input type="text" name="dd1" class="cad_form_id">
				</td>
				<td class="cab_id" width="10%">
					<img src="<?php echo base_url('img/semic/semic_id.png'); ?>" height="100%">
				</td>
				<td width="2%">
					<div style="height: 3px; background-color: #D9BD85;"></div>
				</td>
				<td>
					<input type="submit" value="ENTRAR" name="acao" class="id_submit">
				</td>
				<td width="2%">
					<div style="height: 3px; background-color: #D9BD85;"></div>
				</td>
			</tr>
		</table></td>
	</tr>
	<tr><td><br></td></tr>
	<tr><td align="center"><font class="cab_error"><?php echo $erro;?></font></td></tr>
	<tr>
		<td>
			</form>
		</td>
	</tr>
</table>
