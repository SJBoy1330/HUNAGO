<?php
include APPPATH.'../vendor/tcpdf/tcpdf.php';

function report_pdf($title, $content){

    $header_logo = APPPATH."../assets/img/logo-gabrielle-2.png";
    $title = "TESTING";
    $author = "PT. DWI EKA SAKTI";
    //echo dirname(__FILE__).'/';


    /*** P ->  pdf page orientation
     * mm -> pdf unit
     * A4 -> pdf page format
     */
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('OITOC DEV');
    $pdf->SetTitle($title);
    $pdf->SetSubject('TCPDF');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    /***
     * path images./uploads/ isi logo dari database -> pdf_header_logo
     * default -> pdf_header_logo_width
     * judul sesuai dengan laporan -> pdf_header_title
     * author -> pdf_header_string
     */
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title , $author);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 20 , PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //$pdf->SetHeaderMargin(1);
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
    $pdf->SetFont('dejavusans', '', 10);

    // add a page
    $pdf->AddPage('L', 'A4');

    $html = '<style>
    th{font-weight:bold; border:1pt solid #c0c0c0; text-align:center; }
    .text-center { text-align:center; }
    .text-right { text-align:right; } 
    table { border:1pt solid #c0c0c0;}
    td{ border: 1pt solid #c0c0c0;}
</style>
<img src="'.$header_logo.'" height="70">
<br>';

    $html .= $content;

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    // reset pointer to the last page
    $pdf->lastPage();

    $pdf->Output($title.'.pdf', 'I');

}