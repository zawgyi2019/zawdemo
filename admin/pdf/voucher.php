<?php
include("../connection.php");

    $recid = $_GET['id'];

	$orderdetail=mysql_query("select * from invoice where invo_no='$recid'");
	$arr=mysql_fetch_assoc($orderdetail);

	$ono = $arr['invo_no'];
	$show=$ono;
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('config/tcpdf_config.php');
require_once('tcpdf.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Zaw Gyi');
$pdf->SetTitle('Peacork Voucher '.$show);
$pdf->SetSubject('Peacork Voucher');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' '.$show, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$fontname = TCPDF_FONTS::addTTFfont('../font/mmrtext.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont($fontname, '', 14, true);
// $pdf->SetFont('times', '', 18);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(2, 1, 2, 1);

// set cell margins
$pdf->setCellMargins(1, 2, 1, 2);

// set color for background
$pdf->SetFillColor(247, 223, 232);
$pdf->SetTextColor(249, 11, 108);
$pdf->SetDrawColor(249, 11, 108);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example

// Multicell test
$pdf->MultiCell(0, 5, 'Invoice Number: '.$arr['invo_no'], 0, 'L', 0, 1, '', '', true);
$pdf->MultiCell(0, 5, 'Order Time:     '.$arr['order_time'], 0, 'L', 0, 1, '', '', true);
$pdf->MultiCell(0, 5, 'Received Time:  '.$arr['invo_time'], 0, 'L', 0, 1, '', '', true);
$pdf->MultiCell(0, 5, 'Customer Name:  '.$arr['cus_name'], 0, 'L', 0, 1, '', '', true);
$pdf->MultiCell(55, 5, 'Food Name', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['food_name'], 0, 'R', 1, 1, '', '', true);
$pdf->MultiCell(55, 5, 'Price', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['price'].' Ks', 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(55, 5, 'Amount', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['amount'], 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(55, 5, 'Total', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['total_cost'].' Ks', 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(55, 5, 'Payment Method', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['payment_method'], 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(55, 5, 'Phone No.', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['cus_ph'], 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(55, 5, 'Address', 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, $arr['cus_address'], 0, 'R', 1, 1, '' ,'', true);
$pdf->MultiCell(60, 5, 'Order Number: '.$arr['order_no'], 0, 'R', 0, 1, '132.5', '', true);
$pdf->MultiCell(60, 5, 'Purchased', 0, 'R', 0, 1, '132.5', '', true);
$pdf->MultiCell(0, 5, 'Thank You My Customer. See You Next Time.', 0, 'C', 0, 0, '', '', true);

$pdf->Ln(4);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Invoice-'.$show.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+