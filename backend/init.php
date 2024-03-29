<?php
$phar_path=Phar::running()."/app";
if (is_dir($phar_path)) {
	$configuration['backend']['path']              = $phar_path;
} else {
	$configuration['backend']['path']              = "{$configuration['path']['backend']}/app";
}

if (PHP_SAPI === 'cli') {
	if ((isset($argv['1']))and($argv['1']!="")) {
		$configuration['domain']=$argv['1'];
	} else {
		$configuration['domain']=$configuration['master_domain'];
	}
	ini_set("memory_limit", $configuration['upload_max_filesize']);
} else {
	ini_set("memory_limit", $configuration['upload_max_filesize']);
	$configuration['domain'] = $_SERVER['HTTP_HOST'];
}


/*
   Maintenance? - print  "Updating site";
 */

if ((PHP_SAPI !== 'cli')and($configuration['domain']!==$configuration['master_domain'])) {
	if ((isset($configuration['maintenance']))and($configuration['maintenance']===TRUE)) {
		//clean session data to show static html next time;
		session_destroy();
		echo "
			<html>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
			<meta http-equiv='refresh' content='60'>
			<title>{$configuration['domain']}: Обновление</title>
			</head>
			<body>
			<h1>Мы дорабатываем программное обеспечение сайта {$configuration['domain']}</h1>
			Редактор SiteBrush заработает через некоторое время.<br>
			<a href=''>Обновите страницу вручную</a> или подождите немного и все наладится само собой.<br><br>
			</body>
			";
		exit();
	}
}

//echo "<pre>";
//print_r($configuration);
//directories for output (must be created)
$configuration['path']['sys_var']                = "{$configuration['path']['var']}/app";
$configuration['path']['sessions']               = "{$configuration['path']['sys_var']}/sessions";
$configuration['path']['log']      = "{$configuration['path']['sys_var']}/log";
$configuration['path']['cache']    = "{$configuration['path']['var']}/cache/{$configuration['domain']}";
$configuration['path']['cleanhtml']    = "{$configuration['path']['var']}/cleanhtml/{$configuration['domain']}";
$configuration['path']['backup']    = "{$configuration['path']['var']}/backup/{$configuration['domain']}";
$configuration['path']['static']   = "{$configuration['path']['var']}/storage/{$configuration['domain']}";
$configuration['path']['templates_c'] =  "{$configuration['path']['sys_var']}/templates_c";

$configuration['static']['url']    = "http://{$configuration['domain']}/f";

//session configuration
//we select memcache->redis->files as session handler
ini_set("session.save_path", $configuration['path']['sessions']);
ini_set("session.save_handler", "memcache");
if ((ini_get('session.save_handler'))==='memcache') {
	ini_set("session.save_path", "tcp://{$configuration['memcached']['host']}:{$configuration['memcached']['port']}?weight=1");
} else {
	ini_set("session.save_handler", "redis");
	if ((ini_get('session.save_handler'))==='redis') {
		ini_set("session.save_path", "tcp://{$configuration['redis']['host']}:{$configuration['redis']['port']}?weight=1");
	}
}
ini_set("session.name", "BONJOUR");
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
ini_set("session.cookie_httponly", 1);
ini_set("session.gc_maxlifetime", $configuration['cookie_lifetime_sec']);
ini_set("session.cookie_lifetime", $configuration['cookie_lifetime_sec']);
ini_set("session.cache_expire", $configuration['cookie_lifetime_sec']);
ini_set("error_log", "syslog");
ini_set("date.timezone", $configuration['date.timezone']);
ini_set("upload_max_filesize", $configuration['upload_max_filesize']);
ini_set("upload_tmp_dir", $configuration['path']['tmp']);


/*
   Load default configuration variables:
 */
require_once("{$configuration['backend']['path']}/config/defaults.php");


/*
   If variable directories does not exist - create them:
 */


foreach ($configuration['path'] as $name => $path) {

	if (!is_dir($path)) {
		mkdir($path, 0777, TRUE);
	}
}

/*
   Start session:
 */
if (PHP_SAPI !== 'cli') {
	session_start();
}


if (PHP_SAPI !== 'cli') {

	/*
	   Pre start operations go here:
	 */
	require_once("{$configuration['backend']['libraries']}/includes/manual/pre-start.php");
	/*
		Parse $_SERVER['REQUEST_URI'] string.
		and set http://domain.com/>>$url_path[1]<</>>$url_path[2]<</>>$url_path[3]<</ etc...
	 */

	if (PHP_SAPI !== 'cli') {
		$url = parse_url($_SERVER['REQUEST_URI']);
		$url_path = explode("/", "$url[path]");
	}

	foreach ($_GET as $controller_name => $controller_value) {
		if (file_exists("{$configuration['backend']['controllers']}/system/{$controller_name}.php")) {
			$system_controller_name = htmlspecialchars($controller_name);
			$system_controller_value = htmlspecialchars($controller_value);
		} else {
			$empty_system_controller = TRUE;
		}
	}

	/*
	   Select appropriate controller.
	 */
	if ((isset($system_controller_name)) and (file_exists("{$configuration['backend']['controllers']}/system/{$system_controller_name}.php"))) {
		$smarty->Assign('Controller', $system_controller_name);
		require_once("{$configuration['backend']['controllers']}/system/{$system_controller_name}.php");
	} elseif ((isset($empty_system_controller)) and ($empty_system_controller == TRUE)) {
		Jump($_SESSION['REQUEST_URI']);
	} else {
		if ((isset($url_path['1'])) and (file_exists("{$configuration['backend']['controllers']}/{$url_path['1']}.php"))) {
			$smarty->Assign('Controller', $url_path['1']);
			require_once("{$configuration['backend']['controllers']}/{$url_path['1']}.php");
		} else {
			$smarty->Assign('Controller', '404');
			require_once("{$configuration['backend']['controllers']}/404.php");
		}
	}
	exit();
}
?>
