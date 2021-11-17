<?php
require_once("{$configuration['backend']['libraries']}/classes/manual/captcha.php");
$captcha = new SimpleCaptcha();
$image = $captcha->CreateImage();
?>
