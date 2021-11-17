<?php
if ((isset($_SESSION['LoggedIn'])) and ($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {

	if (isset($_POST['grab'])) {
		if ((isset($_POST['auto_grab'])) and ($_POST['auto_grab'] == 'on')) {
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$User->setAutoGrab('1');
			$User->Save();
			$_SESSION['AutoGrab'] = '1';
			$smarty->assign('_SESSION.AutoGrab', '1');
		} else {
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$User->setAutoGrab('0');
			$User->Save();
			$_SESSION['AutoGrab'] = '0';
			$smarty->assign('_SESSION.AutoGrab', '0');
		}
		Jump('/?profile');
	}


	if (isset($_POST['change_email'])) {

		/*
		   Security checks:
		 */
		$Insecure = new Brain_Security();
		$Insecure->VerifyNewEmail($_POST['email']);
		$Insecure->VerifyOldPassword($_POST['password-old']);
		$User = UserQuery::create()->findPk($_SESSION['UserId']);
		$User->setEmail($_POST['email']);
		$User->Save();
		Jump("/?profile");
	}

	if (isset($_POST['change_password'])) {

		/*
		   Security checks:
		 */
		$Insecure = new Brain_Security();
		$Insecure->VerifyNewPassword($_POST['password']);
		$User = UserQuery::create()->findPk($_SESSION['UserId']);
		$User->setPassword(hash('md5', $_POST['password']['1']));
		$User->Save();
		Jump("/?profile");
	}
	header('HTTP/1.0 404 Not Found');
	$smarty->assign('Title', 'Настройки пользователя.');
	$smarty->display("SiteBrushHead.tpl.html");
	$smarty->display("Profile.tpl.html");
	$smarty->display('SiteBrushMenu.tpl.html');
} else {
	$_SESSION['system_message'] = "Вам необходимо <a href='?login'>авторизоваться</a>.";
	PrintSystemMessage('ok', '?login');
}
?>
