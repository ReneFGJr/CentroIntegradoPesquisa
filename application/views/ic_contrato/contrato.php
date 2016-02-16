<?php
//echo "$contrato";
//exit;
/* Construção do PDF */
tcpdf();

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// PAGE 1 - BIG background image
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 0);

// Texto do certificado
$pdf -> SetFont('helvetica', '', 12);
$pdf->SetTextColor(0,0,0);


/* Posição de impressão */
$contrato = mst($contrato);
$contrato = utf8_encode($contrato);
$pdf->writeHTMLCell(0,   0, '', '', $contrato, 0, 2, 0, true, 'J', true);


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

/* Arquivo de saida */
//$nome_asc = troca($nome_asc,' ','_');
$pdf -> Output('teste.pdf', 'I');
?>
