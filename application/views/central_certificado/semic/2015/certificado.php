<?php
$ass_2_1 = utf8_encode('Profa. Dra. Cleybe Vieira');
$ass_2_2 = utf8_encode('Coordenadora da Iniciação Científica PUCPR');
$ass_2_3 = utf8_encode('');

$ass_1_1 = utf8_encode('Profa. Dra. Paula Cristina Trevilatto');
$ass_1_2 = utf8_encode('Pró-Reitora de Pesquisa e Pós-Graduação');
$ass_1_3 = utf8_encode('');

/* Background */
$img_file = 'img/certificado/semic-2015.jpg';

/* Construção do PDF */
tcpdf();

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);

/* Background */
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 16);
$pdf->SetTextColor(101,45,38);

/* Posição de impressão */
$pdf->SetXY(20,70);
$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 2, 0, true, 'J', true);


/* Assinatura 1 */
$pdf -> SetFont('helvetica', '', 13);
$pdf->writeHTMLCell(0, 0, 0, 165, '<b>'.$ass_1_1.'</b>', 0, 2, 0, true, 'C', true);

$pdf->SetXY(0,161);
$pdf -> SetFont('helvetica', '', 10);
$pdf->writeHTMLCell(0, 0, 0, 171, $ass_1_2, 0, 2, 0, true, 'C', true);

/* Assinatura 2 */
$pdf -> SetFont('helvetica', '', 13);
$pdf->writeHTMLCell(0, 0, 180, 165, '<b>'.$ass_2_1.'</b>', 0, 2, 0, true, 'C', true);

$pdf->SetXY(150,161);
$pdf -> SetFont('helvetica', '', 10);
$pdf->writeHTMLCell(0, 0, 180, 171, $ass_2_2, 0, 2, 0, true, 'C', true);

$pdf -> SetFont('helvetica', '', 6);
$pdf->writeHTMLCell(0, 0, 6, 205, 'CERTIFICADO EMITIDO DIGITALMENTE', 0, 2, 0, true, 'L', true);


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
$pdf->write2DBarcode('https://cip.pucpr.br/index.php/central_declaracao/validador/'.$id_dc.'/'.substr(checkpost_link($id_dc.'certificado'),4,6), 'QRCODE,L', 20, 140, 30, 30, $style, 'N');
$pdf -> SetFont('helvetica', '', 6);
$pdf->Text(20, 137, utf8_encode('LINK DE VALIDAÇÂO'));

/* Arquivo de saida */
$nome_asc = UpperCaseSql($nome);
$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('certificado-'.$nome_asc.'.pdf', 'I');
?>