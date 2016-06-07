function muda_situacao_trabalho($proto) {
	$fld = "#dd" + $proto;
	$fldi = "#dd" + $proto.substring(0, 7) + "i";
	$chk = $($fld).is(":checked");

	var $url = "https://cip.pucpr.br/index.php/ajax/ic/ic_set_trabalha/" + $proto + "/" + $chk;
	var $url = "http://localhost/projeto/CentroIntegradoPesquisa/index.php/ajax/ic/ic_set_trabalha/" + $proto + "/" + $chk;
	$.ajax({
		url : $url,
		type : "post",
		success : function(data) {
			$($fldi).html(data);
			alert("alterado situação");
		}
	});
}

function muda_situacao_publico($proto) {
	$fld = "#dd" + $proto;
	$fldi = "#dd" + $proto.substring(0, 7) + "i";
	$chk = $($fld).is(":checked");

	var $url = "https://cip.pucpr.br/index.php/ajax/ic/ic_set_publico/" + $proto + "/" + $chk;
	var $url = "http://localhost/projeto/CentroIntegradoPesquisa/index.php/ajax/ic/ic_set_publico/" + $proto + "/" + $chk;
	$.ajax({
		url : $url,
		type : "post",
		success : function(data) {
			$($fldi).html(data);
			alert("alterado situação");
		}
	});
}

function mostra_div($proto)
	{
		$fldi = "#dd" + $proto.substring(0, 7) + "i";
		$($fldi).toggle();		
	}
