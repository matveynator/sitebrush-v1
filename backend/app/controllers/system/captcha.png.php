<?php
require_once("{$configuration['backend']['libraries']}/classes/manual/captcha.php");
//reset Human variable:
//$_SESSION['Human']=FALSE;
$captcha = new SimpleCaptcha();
$image = $captcha->CreateImage();
?>
