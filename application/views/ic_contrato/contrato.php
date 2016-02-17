<?php
/* Construção do PDF */
tcpdf();
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/* img header */
$image_file = 'img/headers/header_model_contrato_ic.JPG';

// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
 $pdf->Image($image_file, 0, 0, '', '', 'JPG', '', '', true, 150, '', false, false, '', false, false, false);
$pdf -> setxy(25,55);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 12);
$pdf->SetTextColor(0,0,0);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

/* Posição de impressão [chama dados para pagina]*/
$contrato = mst($contrato);
$contrato = utf8_encode($contrato);
$pdf->writeHTMLCell(0, 0, '', '', $contrato, 0, 2, 0, true, 'J', true);

/* Arquivo de saida[nome] */
//$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('teste.pdf', 'I');
?>
