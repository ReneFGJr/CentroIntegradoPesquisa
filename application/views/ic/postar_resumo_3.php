<table width="100%">
	<tr valign="top">
		<td width="180"><?php echo $bar;?></td>
		<td><h3>Postagem do Resumo para o SEMIC</h3>
			<?php echo $tela;?>
		</td>
	</tr>
</table>
<style>
	.form_textarea {
		font-size: 14px;
		width: 800px;
	}</style>

<?php
$acao = $this->input->post("acao");
if (strlen($acao) == 0)
	{
		echo cr();
		echo '<script>'.cr();
		echo '$("#dd1").val("'.$line['sm_rem_01'].'");'.cr();
		echo '$("#dd2").val("'.$line['sm_rem_02'].'");'.cr();
		echo '$("#dd3").val("'.$line['sm_rem_03'].'");'.cr();
		echo '$("#dd4").val("'.$line['sm_rem_04'].'");'.cr();
		echo '$("#dd5").val("'.$line['sm_rem_05'].'");'.cr();
		echo '$("#dd6").val("'.$line['sm_rem_06'].'");'.cr();		
		echo '</script>'.cr();
	}
?>
