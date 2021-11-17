<?php
/*
Jumps back and avoids loops if any except loops between / and / ;
*/
function JumpBack()
{
global $configuration;
/*
  if ((isset($_SESSION['JUMPED_FROM']))and ($_SESSION['JUMPED_FROM'] == $_SESSION['REFERER_URI_NO_LOOP'])) {
    if ($_SESSION['JUMPED_FROM'] == "/") {
      $_SESSION['REFERER_URI_NO_LOOP'] = "/loop";
    } elseif ($_SESSION['JUMPED_FROM'] != "/") {
      $_SESSION['REFERER_URI_NO_LOOP'] = "/";
    }
  }
  $_SESSION['JUMPED_FROM'] = $_SESSION['REQUEST_URI'];
*/
  NoLoop();
  if (isset($_SESSION['REFERER_URL_NO_LOOP'])) {
  header("Location: {$_SESSION['REFERER_URL_NO_LOOP']}");
  } else {
  header("Location: http://{$configuration['domain']}");
  }
  exit();
}
?>
