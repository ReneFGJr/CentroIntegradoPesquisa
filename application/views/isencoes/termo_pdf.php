<?php
$ass_2_1 = utf8_encode('Profa. Dra. Cleybe Vieira');
$ass_2_2 = utf8_encode('Coordenadora da Iniciaзгo Cientнfica PUCPR');
$ass_2_3 = utf8_encode('');

$ass_1_1 = utf8_encode('Profa. Dra. Paula Cristina Trevilatto');
$ass_1_2 = utf8_encode('Prу-Reitora de Pesquisa e Pуs-Graduaзгo');
$ass_1_3 = utf8_encode('');

/* Background */
$image_file = 'img/headers/header_model_termo_cip.JPG';

/* Construзгo do PDF */
tcpdf();

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);

/* Background */
$pdf->Image($image_file, 0, 0, 220, 50, 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
$pdf -> setxy(25,55);
// Texto do certificado
$pdf -> SetFont('helvetica', '', 16);
//$pdf->SetTextColor(101,45,38);
$pdf->SetTextColor(15,15,15);
/* Posiзгo de impressгo */

$pdf->writeHTMLCell(0, 0, '', '', utf8_encode($txt), 0, 2, 0, true, 'J', true);

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
//$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output();
?>