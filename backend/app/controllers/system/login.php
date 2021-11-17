<?php

if ((!isset($_SESSION['LoggedIn'])) or ($_SESSION['LoggedIn'] == FALSE)) {
	if (isset($_POST['email'])) {

		/*
		   Security checks:
		 */
		$Insecure = new Brain_Security();
		$Insecure->VerifyOldPasswordByEmail($_POST['password'], $_POST['email']);
		$User = UserQuery::create()->filterByEmail($_POST['email'])->filterByStatus("Active")->filterByDomain($configuration['domain'])->findOne();
		if ($User) {
			$_SESSION['LoggedIn']     = TRUE;
			$_SESSION['JustLoggedIn'] = TRUE;
			$_SESSION['UserId']       = $User->getId();
			$_SESSION['NickName']     = $User->getNickName();
			$_SESSION['Email']        = $User->getEmail();
			$_SESSION['AvatarId']     = $User->getAvatarId();
			$_SESSION['Activated']    = $User->getActivated();
			setcookie("dynamic", "yes", time()+(24*3600*365*5), "/", $configuration['domain']);
		}
		if((isset($_SESSION['edit-login-edit']))and($_SESSION['edit-login-edit']==TRUE)) {
			unset($_SESSION['edit-login-edit']);
			Jump("?edit");
		} else {
			Jump($_SESSION['REQUEST_URI']);
		}
	} else {
		header('HTTP/1.0 404 Not Found');
		$smarty->assign('Title', $dic['Please_authorize_yourself_dd']);
		$smarty->display("SiteBrushHead.tpl.html");
		$smarty->display("Login.tpl.html");
		$smarty->display('SiteBrushMenu.tpl.html');
	}
} else {
	Jump($_SESSION['REQUEST_URI']);
}
?>
