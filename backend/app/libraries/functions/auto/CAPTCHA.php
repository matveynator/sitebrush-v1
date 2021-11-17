<?php

function CAPTCHA()
{
  global $smarty, $configuration, $dic;
  /*
  This is the function to verify user is Human.
  */
  if (!isset($_SESSION['Human']) or ($_SESSION['Human'] == FALSE)) {
    if (isset($_POST['captcha'])) {
      $Insecure = new Brain_Security();
      $Insecure->VerifyCaptcha($_POST['captcha']);
      Jump($_SESSION['REQUEST_URL']);
    } else {
      $smarty->Assign('Action', 'Captcha');
      $smarty->display('Head.tpl.html');
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display('Captcha.tpl.html');
      $smarty->display("BodyEnd.tpl.html");
      exit();
    }
  } else {
    JumpBack();
  }
}
