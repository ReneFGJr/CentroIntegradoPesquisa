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
	
$check_dd13A = '';
$check_dd13B = '';
$check_dd13C = '';

/****************************************************************/
if ($dd13=='PIBIC') { $check_dd13A = 'checked'; }
if ($dd13=='PIBITI') { $check_dd13B = 'checked'; }
if ($dd13=='PIBICEM') { $check_dd13C = 'checked'; }
echo '==========>'.$dd13;
?>
<table width="100%" class="tabela01 lt1" style="display: <?php echo $dsp;?>;" id="plano_novo">
	<tr><Td>T�tulo do plano</Td></tr>	
	<tr><td><textarea name="dd10" style="width:100%; height: 80px;"><?php echo $dd10;?></textarea></td></tr>
	
	<tr><td>
		<font class="lt3">Modalidade de Submiss�o</font><br>
		<input type="radio" name="dd13" value="PIBIC" <?php echo $check_dd13A;?>   ><font class="lt1">Inicia��o Cient�fica (PIBIC)</b>.<br>
		<input type="radio" name="dd13" value="PIBITI" <?php echo $check_dd13B;?>  ><font class="lt1">Inicia��o Tecnol�gica (PIBITI)</b>.<br>
		<input type="radio" name="dd13" value="PIBICEM" <?php echo $check_dd13C;?> ><font class="lt1">Inicia��o Cient�fica - Ensimo m�dio (PIBIC_EM) (J�nior)</b>.<br>
	</font>
	</td></tr>	
	
	<tr><td>
		<br>
		<font class="lt3">Informa��es do Aluno</font><br>
		C�digo do aluno: <input type="text" name="dd11" value="<?php echo $dd11;?>">
		<br><font class="lt0">Informe o crach� do aluno, caso n�o tenha aluno para indicar, utilize '00000000' (oito zeros).</font>
	</td></tr>
	
	<tr><td><input type="checkbox" name="dd12" value="1" <?php echo $check_dd12;?>
		<br><font class="lt1">O aluno fez o Ensino M�dio em <b>Escola P�blica</b>.</font>
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