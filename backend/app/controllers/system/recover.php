<?php
if (isset($_POST['email'])) {

	/*
	   Security checks:
	 */
	$Insecure = new Brain_Security();
	if ((!isset($_SESSION['Human']))or($_SESSION['Human']!=TRUE)) {
		$Insecure->VerifyCaptcha($_POST['captcha']);
	}
	$Insecure->VerifyEmail($_POST['email']);
	$User = UserQuery::create()->filterByEmail($_POST['email'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
	$key = (sha1(mt_rand(5, 9999999999999)));
	if (isset($User)) {
		$User->setVerificationCode($key);
		$User->Save();
		$subject = "Password reminder for {$configuration['domain']}";
		$message = "
			<html>
			<head>
			<title>Password reminder for {$configuration['domain']}</title>
			<meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
			</head>
			<body>
			<p>
			<span style='font-size:28px;'><strong><span style='font-family:arial,helvetica,sans-serif;'>Cайт {$configuration['domain']} - восстановление пароля.&nbsp;</span></strong></span></p>
			<p>
			<span style='font-family:georgia,serif;'><span style='font-size:14px;'>Здраствуйте, вы просили поменять пароль для сайта {$configuration['domain']},<br />
			пожалуйста пройдите по ссылке и поменяйте забытый пароль&nbsp;на новый:&nbsp;</span></span></p>
			<p style='margin-left: 10px; '>
			<a href='http://{$configuration['domain']}/?recover={$key}'><span style='font-family:georgia,serif;'><span style='font-size:14px;'>http://{$configuration['domain']}/?recover={$key}</span></span></a></p>
			<p>
			<span style='font-size:10px;'><span style='font-family:georgia,serif;'><em><span class='Apple-style-span' style='-webkit-border-horizontal-spacing: 2px; -webkit-border-vertical-spacing: 2px;'><strong>Внимание!</strong><br />
			Если вы не запрашивали смену пароля на сайте {$configuration['domain']}, то возможно<br />
			кто-то пытается сменить ваш пароль с IP адреса: <strong>{$_SERVER['REMOTE_ADDR']}</strong><br />
			</span></em></span></span></p>
			</body>
			</html>
			";
		SendEmail($_POST['email'], $configuration['email']['noreply'], $subject, $message);
		$_SESSION['system_message'] = "Мы отправили вам email на адрес <strong>{$_POST['email']}</strong> с секретным кодом для смены пароля. Пожалуйста проверьте свою почту.";
		PrintSystemMessage('ok', '/');
	} else {
		$_SESSION['system_message']            = "Пользователя с email <strong>{$_POST['email']}</strong> не существует.";
		$_SESSION['error_count']               = ($_SESSION['error_count'] + 1);
		PrintSystemMessage();
	}
} elseif ((isset($_GET['recover'])) and ($_GET['recover'] != "")) {
	$User = UserQuery::create()->filterByVerificationCode($_GET['recover'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
	if (isset($User)) {
		if (isset($_POST['password'])) {
			/*
			   Security checks:
			 */
			$Insecure = new Brain_Security();
			$Insecure->VerifyPassword($_POST['password']);
			$key = (sha1(mt_rand(5, 9999999999999)));
			$User->setVerificationCode($key);
			$User->setPassword(hash('md5', $_POST['password']));
			$User->Save();
			$_SESSION['LoggedIn']     = TRUE;
			$_SESSION['JustLoggedIn'] = TRUE;
			$_SESSION['UserId']       = $User->getId();
			$_SESSION['Email']        = $User->getEmail();
			$_SESSION['NickName']     = $User->getNickName();
			Jump('/?profile');

		} else {
			$smarty->assign('Title', 'Восстановление пароля.');
			$smarty->display("SiteBrushHead.tpl.html");
			$smarty->display("ChangePassword.tpl.html");
			$smarty->display('SiteBrushMenu.tpl.html');

		}
	} else {
		$_SESSION['system_message']            = "Код смены пароля: <strong>{$_GET['recover']}</strong> неправильный или устарел.";
		$_SESSION['error_count']               = ($_SESSION['error_count'] + 1);
		PrintSystemMessage('запросить новый код', '/?recover');
	}
} else {
	$smarty->assign('Title', 'Восстановление пароля.');
	$smarty->display("SiteBrushHead.tpl.html");
	$smarty->display("RecoverPassword.tpl.html");
	$smarty->display('SiteBrushMenu.tpl.html');
}
?>

