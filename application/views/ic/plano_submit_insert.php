<?php
if (!isset($dd10)) { $dd10 = ''; }
if (!isset($dd11)) { $dd11 = ''; }
if (!isset($dd12)) { $dd12 = ''; }
if (!isset($dd13)) { $dd13 = ''; }
if (!isset($dd20)) { $dd20 = ''; }

$check_dd12 = '';
if ($dd12 == '1') { $check_dd12 = 'checked'; }

$dsp = 'none';
$dsp_bt = '';

if ($dd20=='1')
	{
		$dsp_bt = 'none';
		$dsp = '';		
	}
?>
<table width="100%" class="tabela01 lt1" style="display: <?php echo $dsp;?>;" id="plano_novo">
	<tr><Td>Título do plano</Td></tr>	
	<tr><td><textarea name="dd10" style="width:100%; height: 80px;"><?php echo $dd10;?></textarea></td></tr>
	
	<tr><td>Código do aluno: <input type="text" name="dd11" value="<?php echo $dd11;?>">
		<br><font class="lt0">Informe o crachá do aluno, caso não tenha aluno para indicar, utilize '00000000' (oito zeros).</font>
	</td></tr>
	
	<tr><td><input type="checkbox" name="dd12" value="1" <?php echo $check_dd12;?>
		<br><font class="lt1">O aluno fez o Ensino Médio em <b>Escola Pública</b>.</font>
	</td></tr>	
</table>
<input type="hidden" name="dd20" value="1">
<a href="#" class="botao3d back_green_shadown back_green" id="botao" style="display: <?php echo $dsp_bt;?>;">Incluir novo Plano de Aluno >>></a>

<script>
	$("#botao").click(function() {
		$("#plano_novo").toggle();
		$("#botao").toggle();
	});
</script>