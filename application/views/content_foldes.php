<?php

/* validacao do conteudo de apresentacao */
if (!isset($abas)) {
	echo 'Abas not set array("title","content")';
	$abas = array();
}

/* valores iniciais */
$bar = '' . cr();
$texto = '' . cr();
$pag = 0;
$js = ' var $pag='.$pag.';';

/* */
foreach ($abas as $key => $value) {
	$r = $key;	

	/* valida entrada de valores */
	if (isset($abas[$r])) {

		/* deixa em modo oculto */
		$see = ' style="display: none;" ';

		/* habilita visualização se padrao */
		if ($pag == $r) { $see = '';
		}

		/* set variaveis das abas */
		$title = $abas[$r]['title'];
		$content = $abas[$r]['content'];
		if ($pag == $r) {
			$bar .= '<td class="aba_item aba_active"  id="aba' . $r . '" width="5%"><nobr>' . $title . '</nobr></td>' . cr();
			$bar .= '<td class="bb" width="1%">&nbsp;</td>' . cr();
		} else {
			$bar .= '<td class="aba_item aba_no_active"  id="aba' . $r . '" width="5%"><nobr>' . $title . '</nobr></td>' . cr();
			$bar .= '<td class="bb" width="1%">&nbsp;</td>' . cr();
		}
		$texto .= '<td><div id="abav' . $r . '" class="aba"  ' . $see . '>' . $content . '</div></td>' . cr();
	}

	/* JavaScript */
	$js .= cr();
	$js .= '$("#aba' . $r . '").click(function() { ' . cr();
	
	/* Remove class ativa da pagina atual */
	$js .= '		$div = "#aba"+$pag; '.cr();
	$js .= '		$($div).removeClass("aba_active"); '.cr();
	$js .= '		$($div).addClass("aba_no_active"); '.cr();
	
	/* insere classe ativa na nova */
	$js .= '		$div = "#aba"+'.$r.'; '.cr();
	$js .= '		$($div).removeClass("aba_no_active"); '.cr();
	$js .= '		$($div).addClass("aba_active"); '.cr();

	$js .= '		$pag = '.$r.'; '.cr();
	for ($y = 0; $y < 10; $y++) {
		if ($y != $r) {
			$js .= '		$("#abav' . $y . '").hide(); ' . cr();
		} else {
			$js .= '		$("#abav' . $y . '").fadeIn("slow"); ' . cr();
		}
	}
	$js .= '});' . cr();
	/* Ajuster de espaços da barra de menu */
}
?>
<table cellpadding="0" cellspacing="0" width="100%" class="nopr" >
	<tr>
		<?php echo $bar;?>
		<td width="80%" class="bb">&nbsp;</td>
	</tr>
</table>
<table width="100%" class="aba_content" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<?php echo $texto;?>
	</tr>
</table>
<style>
	.bb {
		border-bottom: 1px solid #000000;
	}
	.aba_active {
		background-color: #ffffff;
	}

	.aba_no_active {
		background-color: #ececec;
		border-bottom: 1px solid #000000;
	}
		

	.aba_content {
		border-left: 1px solid #333;
		border-right: 1px solid #333;
		border-bottom: 1px solid #333;
		padding: 10px 10px 10px 10px;
	}
	.aba_item {
		border-top: 1px solid #333;
		border-left: 1px solid #333;
		border-right: 1px solid #333;
		border-radius: 20px 10px 0px 0px;
		padding: 10px;
		cursor: pointer;
	}
	.aba_no_active:hover {
		background-color: #c0c0c0;
	}
</style>
<script><?php echo $js;?></script>
