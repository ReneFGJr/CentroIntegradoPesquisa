<?php
/* Background */
$image_file = 'img/headers/header_model_contrato_ic.JPG';

/* Construção do PDF */
tcpdf();

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);

// set image scale factor
 $pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
$pdf -> setxy(25,55);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 12);
$pdf->SetTextColor(38,38,101);

/* Posição de impressão */
$pdf->SetXY(20,60);
$nw_texto = mst($nw_texto);
$nw_texto = utf8_encode($nw_texto);
$pdf->writeHTMLCell(0, 0, '', '', $nw_texto, 0, 2, 0, true, 'J', true);



$pdf -> SetFont('helvetica', '', 6);
$pdf->writeHTMLCell(0, 0, 6, 290, 'DOCUMENTO EMITIDO DIGITALMENTE', 0, 2, 0, true, 'L', true);

$pdf -> SetFont('helvetica', '', 6);
$pdf->writeHTMLCell(0, 0, 6, 290, utf8_encode('Data de emissão '.date("d/m/y") ), 0, 2, 0, true, 'R', true);

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

// QRCODE,L : QR-CODE Low error correction
//$pdf->write2DBarcode('https://cip.pucpr.br/index.php/central_declaracao/validador/'.$id_dc.'/'.substr(checkpost_link($id_dc.'certificado'),4,6), 'QRCODE,L', 20, 140, 30, 30, $style, 'N');
//$pdf -> SetFont('helvetica', '', 6);
//$pdf->Text(20, 137, utf8_encode('LINK DE VALIDAÇÂO'));

/* Arquivo de saida */
$nome_asc = UpperCaseSql('xxx');
$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('certificado-'.$nome_asc.'.pdf', 'I');
?>