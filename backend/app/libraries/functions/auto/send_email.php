<?php

function SendEmail($To, $From, $Subject=FALSE, $Message=FALSE) {

global $configuration;
    /*
    Security checks:
    */
    $Insecure = new Brain_Security();
    $Insecure->VerifyEmail($To);
    $Insecure->VerifyEmail($From);

// To send HTML mail, the Content-type header must be set
$Headers  = 'MIME-Version: 1.0' . "\r\n";
$Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers
$Headers .= "To: {$To}" . "\r\n";
$Headers .= "From: {$From}" . "\r\n";

// Mail it
mail($To, $Subject, $Message, $Headers);
}
?>
