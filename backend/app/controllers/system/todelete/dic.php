<?php
/*
Dictionary (/dic) request from translators. 
*/
if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId'])) and (CheckUserIsInGroup("Translators")) || (CheckUserIsInGroup("Superusers"))) {
  require("{$configuration['backend']['libraries']}/includes/translation_interface.php");
} else {
  JumpBack();
}
?>
