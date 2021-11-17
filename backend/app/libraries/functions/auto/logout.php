<?php

function LogOut()
{
	global $configuration, $smarty;

	setcookie("dynamic", "yes", time()-(3600*24*365*30), "/", $configuration['domain']);

	/*
	   Save vital session data:
	 */
	if (isset($_SESSION['captcha'])) {
		$captcha = $_SESSION['captcha'];
	}
	if (isset($_SESSION['REFERER_URI_NO_LOOP'])) {
		$REFERER_URI_NO_LOOP = $_SESSION['REFERER_URI_NO_LOOP'];
	}
	if (isset($_SESSION['REQUEST_URI'])) {
		$REQUEST_URI = $_SESSION['REQUEST_URI'];
	}
	if (isset($_SESSION['REFERER_URI'])) {
		$REFERER_URI = $_SESSION['REFERER_URI'];
	}
	if (isset($_SESSION['JUMPED_FROM'])) {
		$JUMPED_FROM = $_SESSION['JUMPED_FROM'];
	}

	/*
	   Destroy session:
	 */
	session_unset();
	session_destroy();
	session_start();

	/*
	   Set new session data:
	 */
	if (isset($captcha)) {
		$_SESSION['captcha'] = $captcha;
	}
	if (isset($REFERER_URI_NO_LOOP)) {
		$_SESSION['REFERER_URI_NO_LOOP'] = $REFERER_URI_NO_LOOP;
	}
	if (isset($REQUEST_URI)) {
		$_SESSION['REQUEST_URI'] = $REQUEST_URI;
	}
	if (isset($REFERER_URI)) {
		$_SESSION['REFERER_URI'] = $REFERER_URI;
	}
	if (isset($JUMPED_FROM)) {
		$_SESSION['JUMPED_FROM'] = $JUMPED_FROM;
	}
	$_SESSION['LoggedIn'] = FALSE;
	$_SESSION['LoggedOff'] = TRUE;

	/*
	   Clear smarty:
	 */
	$smarty->assign("_SESSION", array());
	$smarty->assign('LoggedIn', FALSE);
	$smarty->assign('NickName', 'Anonymous');

}
?>
