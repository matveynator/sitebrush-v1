<?php
/*  
Automatic cut function
*/
function CutTextAuto($Text, $Purify = TRUE)
{
  global $configuration;
  //init secure html parser
  $Purifier = new HTMLPurifier($configuration['HTMLPurifier_Config']);
  if (preg_match($configuration['cut_sign'], $Text)) {
    $RawText = explode($configuration['cut_sign'], $Text, 2);
    if (strlen($RawText[0]) < $configuration['max_first_page_text_length']) {
      if ($Purify == TRUE) {
        $FormatedText = $Purifier->purify($RawText[0] . "...");
      } else {
        $FormatedText = $RawText[0];
      }
    } else {
      if ($Purify == TRUE) {
        $FormatedText = $Purifier->purify(substr($Text, 0, $configuration['max_first_page_text_length']) . "...");
      } else {
        $FormatedText = substr($Text, 0, $configuration['max_first_page_text_length']);
      }
    }
  } else {
    if ($Purify == TRUE) {
      $FormatedText = $Purifier->purify(substr($Text, 0, $configuration['max_first_page_text_length']) . "...");
    } else {
      $FormatedText = substr($Text, 0, $configuration['max_first_page_text_length']);
    }
  }
  return $FormatedText;
}
?>
