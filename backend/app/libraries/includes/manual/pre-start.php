<?php
/*
   Autoload library/classes/auto:
 */
$path = "{$configuration['backend']['libraries']}/classes/auto";

if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if (preg_match("/\.php$/i", $file)) {
			require_once("{$path}/{$file}");
		}
	}
	closedir($handle);
}

/*
   Autoload library/functions/auto:
 */
$path = "{$configuration['backend']['libraries']}/functions/auto";

if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if (preg_match("/\.php$/i", $file)) {
			require_once("{$path}/{$file}");
		}
	}
	closedir($handle);
}

/*
   Autoload library/includes/auto:
 */
$path = "{$configuration['backend']['libraries']}/includes/auto";

if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if (preg_match("/\.php$/i", $file)) {
			require_once("{$path}/{$file}");
		}
	}
	closedir($handle);
}

/*
   Update referrer session variables:
 */
NoLoop();

/*
   Human error http://pzi.ru/path/to/file.html/some/other/file2.html will redirect to http://pzi.ru/path/to/file2.html
 */
if ((isset($_SESSION['REQUEST_URI'])) and (preg_match('/\./', dirname($_SESSION['REQUEST_URI'])))) {
	if (dirname(dirname($_SESSION['REQUEST_URI'])) == '/') {
		Jump("http://{$configuration['domain']}" . dirname(dirname($_SESSION['REQUEST_URI'])) . basename($_SESSION['REQUEST_URI']));
	} else {
		Jump("http://{$configuration['domain']}" . dirname(dirname($_SESSION['REQUEST_URI'])) . "/" . basename($_SESSION['REQUEST_URI']));
	}
}

$UsersAmmount = UserQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
if ((isset($UsersAmmount)) and ($UsersAmmount > 0)) {
	$configuration['AdminUserRegistered'] = TRUE;
} else {
	$configuration['AdminUserRegistered'] = FALSE;
}
$smarty->assign('AdminUserRegistered', $configuration['AdminUserRegistered']);
//echo "<pre>";
//print_r($_SESSION);

//$OneLevelUpPath=GetOneLevelUpUri($configuration['url']['path']);
//$smarty->assign('OneLevelUpPath', $OneLevelUpPath);
//$smarty->assign('RequestUriPath', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
