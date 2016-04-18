<?php
/* Construção do PDF */
tcpdf();

//defino partable/landscape
if($cdm_posicao == 'L'){
	$posicao = 'L';
	$bg_w = '297';
	$bg_h = '210';
}
else{
	$posicao = 'P';
		$bg_w = '210';
	$bg_h = '297';
}
//$pdf = new TCPDF($posicao, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF($posicao, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/* img header */
$image_file = $cdm_background;


// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);

// set image scale factor
if(strlen($image_file) > 0){
	//$pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
$pdf->Image($image_file, 0, 0, $bg_w, $bg_h, '', '', '', false, 300, '', false, false, 0);
}
$pdf -> setxy(25,55);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 12);
$pdf->SetTextColor(0,0,0);

/* Posição de impressão [chama dados para pagina]*/
$certificado = mst($certificado);
$certificado = utf8_encode($certificado);
$pdf->writeHTMLCell(0, 0, '', '', $certificado, 0, 2, 0, true, 'J', true);

/* Arquivo de saida[nome] */
//$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('teste.pdf', 'I');
?>
