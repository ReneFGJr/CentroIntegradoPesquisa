<?php
/* Construção do PDF */
tcpdf();

//defino partable/landscape
if ($cdm_posicao == 'L') {
	$posicao = 'L';
	$bg_w = '297';
	$bg_h = '210';
} else {
	$posicao = 'P';
	$bg_w = '210';
	$bg_h = '297';
}
//$pdf = new TCPDF($posicao, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF($posicao, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/* img header */
$image_file = $cdm_background;

// PAGE 1 - BIG background image
$pdf -> AddPage();
$pdf -> SetAutoPageBreak(false, 0);

// set image scale factor
if (strlen($image_file) > 0) {
	//$pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
	$pdf -> Image($image_file, 0, 0, $bg_w, $bg_h, '', '', '', false, 300, '', false, false, 0);
}
$pdf -> setxy(25, 55);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 12);
$pdf -> SetTextColor(0, 0, 0);

/* Posição de impressão [chama dados para pagina]*/
$certificado = mst($certificado);
$certificado = utf8_encode($certificado);
$pdf -> writeHTMLCell(0, 0, '', '', $certificado, 0, 2, 0, true, 'J', true);

/* Assinatura */
if (strlen($cdm_assinaturas) > 0) {
	$x = $cdm_assinaturas_y;
	$y = $cdm_assinaturas_x;
	$pdf -> setxy($x, $y);
	$pdf -> writeHTMLCell(0, 0, '', '', $cdm_assinaturas, 0, 2, 0, true, 'J', true);
}

// QRCODE,L : QR-CODE Low error correction

// set style for barcode
$style = array(
    'border' => true,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

if ($cdm_qrcode == '1')
{
	$pdf->write2DBarcode(base_url('index.php/central_declaracao/validador/'.$id_dc.'/'.substr(checkpost_link($id_dc.'certificado'),4,6)), 'QRCODE,L', 170, 250, 30, 30, $style, 'N');
	$pdf -> SetFont('helvetica', '', 6);
	$pdf->Text(174, 281, utf8_encode('LINK DE VALIDAÇÂO'));
}

$pdf -> SetFont('helvetica', '', 6);
$pdf->writeHTMLCell(0, 0, 6, 293, utf8_encode('DECLARAÇÃO EMITIDA DIGITALMENTE'), 0, 2, 0, true, 'L', true);

$pdf -> SetFont('helvetica', '', 6);
$pdf->writeHTMLCell(0, 0, 6, 293, utf8_encode('Data de emissão '.date("d/m/y") ), 0, 2, 0, true, 'R', true);

/* Arquivo de saida[nome] */
//$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('declaracao-certificado-'.date("Y-m-d-H:i:s").'.pdf', 'I');
?>
