<?php
//set TRUE/FALSE on maintenance time:
$configuration['maintenance'] 		       = FALSE;
//mysql database settings:	
$configuration['db']['name']                   = 'sitebrush';
$configuration['db']['host']                   = '127.0.0.1';
$configuration['db']['user']                   = 'sitebrush';
$configuration['db']['pass']                   = 'password';
$configuration['db']['port']                   = '3306';

//application related settings:
$configuration['path']['htdocs']	       = '/opt/sitebrush.com/public_html';
$configuration['path']['backend']              = '/opt/sitebrush.com/backend';
$configuration['path']['var']     	       = '/opt/sitebrush.com/var'; 
$configuration['path']['tmp']                  = '/tmp';

$configuration['ip']                           = '127.0.0.1';
$configuration['master_domain']                = 'localhost';

//memcache configuration (optional, but highly recommended)
//apt-get install php5-memcache memcached 
//pecl install memcache
$configuration['memcached']['host']            = 'localhost';
$configuration['memcached']['port']            = '11211';
//redis configuration (optional, but highly recommended)
//apt-get install redis
//pecl install redis
$configuration['redis']['host']                = 'localhost';
$configuration['redis']['port']                = '6379';

//app specific settings:
$configuration['upload_max_filesize']          = '512M';
$configuration['cookie_lifetime_sec']          = '864000'; //10days
$configuration['date.timezone']                = 'Europe/Moscow';
$configuration['public_html']['static_folder'] = 'p';
$configuration['static']['uri']    	       = '/f';

//defaults for uploaded images
$configuration['image']['width']['small']      = "900";
$configuration['image']['width']['big']        = "1280";

//error reporting section:
$configuration['debug']['display']             = TRUE;
$configuration['debug']['logfile']             = TRUE;
ini_set("max_execution_time", "600");
ini_set("display_errors", 1);
ini_set("log_errors", 1);
error_reporting('1');
?>
