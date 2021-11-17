<?php
/*
This is the controller to verify user is invited.
*/
if (!isset($_SESSION['invited']) or ($_SESSION['invited'] == FALSE)) {
  if ($_POST) {
    $Insecure = new Brain_Security();
    $Insecure->VerifyInvite($_POST['invite']);
    Jump('/welcome');
  } else {
    $smarty->Assign('Action', 'Invitation');
    $smarty->display('Head.tpl.html');
    $smarty->display("BodyBegin.tpl.html");
    $smarty->display('Invite.tpl.html');
    $smarty->display("BodyEnd.tpl.html");
  }
} else {
  Jump('/welcome');
}

?>
