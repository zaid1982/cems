<?php 
require_once '../pdf/d_form_analyzerCems.php';

$fn_pdf = new Class_pdf_form_analyzerCems();

$fn_pdf->save_pdf('2');
echo ('Done');
?>