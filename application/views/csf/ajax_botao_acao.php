<?php
if (!isset($cancelar)) { $cancelar = 0;
}
if (!isset($homologar)) { $homologar = 0;
}
if (!isset($homologar_capes)) { $homologar_capes = 0;
}
if (!isset($homologar_parceiro)) { $homologar_parceiro = 0;
}
if (!isset($homologar_no)) { $homologar_no = 0;
}
if (!isset($homologar_capes_no)) { $homologar_capes_no = 0;
}
if (!isset($viagem)) { $viagem = 0;
}
if (!isset($desistente)) { $desistente = 0;
}

if (!isset($fim_viagem)) { $fim_viagem = 0;
}
if (!isset($troca_universidade)) { $troca_universidade = 0;
}
if (!isset($troca_pais)) { $troca_pais = 0;
}
if (!isset($desistente)) { $desistente = 0;
}
if (!isset($desistente)) { $desistente = 0;
}



if ($cancelar == 1) {
	echo '<input type="button" value="' . msg('csf_bt_cancelar') . '" class="botao-grande" onclick="bt_enviar(\'cancelar\');">';
}

/* Instituicao 
 * 
 * 
 * */
if ($homologar_no == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar_no') . '" class="botao-grande" onclick="bt_enviar(\'homologar_no\');">';
}
 
if ($homologar == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar') . '" class="botao-grande" onclick="bt_enviar(\'homologar\');">';
}

/* CAPES 
 * 
 * 
 * */
if ($homologar_capes_no == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar_capes_no') . '" class="botao-grande" onclick="bt_enviar(\'homologar_capes_no\');" >';
}
 
if ($homologar_capes == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar_capes') . '" class="botao-grande" onclick="bt_enviar(\'homologar_capes\');" >';
}


if ($homologar_parceiro == 1) {
	echo '<input type="button" value="' . msg('csf_bt_homologar_parceiro') . '" class="botao-grande" onclick="bt_enviar(\'homologar_parceiro\');" >';
}

if ($desistente == 1) {
	echo '<input type="button" value="' . msg('csf_bt_desistente') . '" class="botao-grande" onclick="bt_enviar(\'desistente\');" >';
}

if ($viagem == 1) {
	echo '<input type="button" value="' . msg('csf_bt_viagem') . '" class="botao-grande" onclick="bt_enviar(\'homologar_viagem\');" >';
}

if ($fim_viagem == 1) {
	echo '<input type="button" value="' . msg('csf_bt_fim_viagem') . '" class="botao-grande" onclick="bt_enviar(\'fim_viagem\');" >';
}

if ($troca_universidade == 1) {
	echo '<input type="button" value="' . msg('csf_bt_troca_universidade') . '" class="botao-grande" onclick="bt_enviar(\'troca_universidade\');" >';
}

if ($troca_pais == 1) {
	echo '<input type="button" value="' . msg('csf_bt_troca_pais') . '" class="botao-grande" onclick="bt_enviar(\'troca_pais\');" >';
}



echo '
<script>
	function bt_enviar($acao)
	{
		var $url = "' . base_url('index.php/csf/ajax_acao/') . '/' . $id . '/' . $ack . '/" + $acao;
		$.ajax({
			url : $url,
			type : "post",
			success : function(data) {
				$("#'.$ack.'").html(data);
			} 
		});
	}
</script>';
?>