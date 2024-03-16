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
	$subdomain_name = implode(array_slice(explode('.', $_SERVER['HTTP_HOST']), - 3, 1, TRUE));

	//исключение домен вадима портнова
	if ($_SERVER['HTTP_HOST'] == "portnov.kmv.ru") {
		$configuration['domain'] = "portnov.kmv.ru";
		//echo "<br>0<pre>";
		//echo $configuration['domain'];
	} else {
		if (((count(explode('.', $_SERVER['HTTP_HOST'])))>2) and (isset($subdomain_name)) and ($subdomain_name != "") and ($subdomain_name != "www")) {
			$configuration['domain'] = implode('.', array_slice(explode('.', $_SERVER['HTTP_HOST']), - 0));
			//echo "<br>1<pre>";
			//echo $configuration['domain'];
		} else {
			$configuration['domain'] = implode('.', array_slice(explode('.', $_SERVER['HTTP_HOST']), - 0));
			//echo "2<br><pre>";
			//echo $configuration['domain'];
		}
	}
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
			Телефон для экстренной связи с разработчиком: <b>+7 (928) 819-50-14</b>
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
ini_set("session.use_only_cookies", 0);
ini_set("session.cookie_httponly", 0);
ini_set("session.gc_maxlifetime", $configuration['cookie_lifetime_sec']);
ini_set("session.cookie_lifetime", $configuration['cookie_lifetime_sec']);
ini_set("session.cache_expire", $configuration['cookie_lifetime_sec']);
ini_set("session.cookie_domain", "{$configuration['domain']}");
//ini_set("session.cookie_domain", "none");
ini_set("error_log", "{$configuration['path']['log']}/error.log");
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

/*
       session_set_cookie_params([
            'lifetime' => 3600,
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => 1,
            'httponly' => 1,
            'samesite' => 0
        ]);
*/
	session_start();
}

//echo "<pre>";
//print_r(ini_get_all());
//print_r($configuration);
//print_r($_SESSION)
//exit();


if (PHP_SAPI !== 'cli') {

	/*
	   Pre start operations go here:
	 */
	require_once("{$configuration['backend']['libraries']}/includes/manual/pre-start.php");
	/*
		Parse $_SERVER['REQUEST_URI'] string.
		and set http://domain.com/>>$url_path[1]<</>>$url_path[2]<</>>$url_path[3]<</ etc...
	 */

	//redirect any >2 level domain to 2 level domain except portnov.kmv.ru
	if (((count(explode('.', $_SERVER['HTTP_HOST'])))>2) and (isset($subdomain_name)) and ($subdomain_name != "") and ($subdomain_name != "www") and ($configuration['domain'] != "portnov.kmv.ru")) {
		$configuration['domain'] = implode('.', array_slice(explode('.', $_SERVER['HTTP_HOST']), - 0));
		if ($_SERVER['HTTP_SCHEME'] == 'https') {
			//Jump("https://${configuration['domain']}{$_SERVER['REQUEST_URI']}");
		} else {
			//Jump("http://${configuration['domain']}{$_SERVER['REQUEST_URI']}");
		}
	}

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
