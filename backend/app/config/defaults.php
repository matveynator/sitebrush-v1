<?php
/*
   NOTE! 
   1. All variable names are lowercase like $variable;
   2. All variable data is Capitalised like $variable="Something"
   3. All boolean variable data is UPPERCASE $variable = TRUE;
   4. dont move controller/captcha - if moved - edit helpers/get_no_loop_referer.php helper (it avoids /captcha route).
 */
$configuration['url'] = "http://{$configuration['domain']}";

/* 
   All paths are relative to httpd DocumentRoot folder 
 */
$configuration['backend']['bin']         = "{$configuration['backend']['path']}/bin";
$configuration['backend']['config']      = "{$configuration['backend']['path']}/config";
$configuration['backend']['controllers'] = "{$configuration['backend']['path']}/controllers";
$configuration['backend']['fonts']       = "{$configuration['backend']['path']}/fonts";
$configuration['backend']['helpers']     = "{$configuration['backend']['path']}/helpers";
$configuration['backend']['libraries']   = "{$configuration['backend']['path']}/libraries";
$configuration['backend']['models']      = "{$configuration['backend']['path']}/models";
$configuration['backend']['views']       = "{$configuration['backend']['path']}/views";
$configuration['backend']['dictionary']  = "{$configuration['backend']['path']}/dictionary";
$configuration['backend']['tests']       = "{$configuration['backend']['path']}/tests";

$configuration['extensions']['static'] = array(
		'css',
		'js',
		'swf',
		);

$configuration['extension']['image'] = array(
		'jpeg',
		'jpg',
		'gif',
		'png',
		'ico',
		'bmp',
		'tiff',
		);
$configuration['extension']['fonts'] = array(
                'eot',
                'woff',
                'ttf',
                'svg',
                'otf',
                );
$configuration['extension']['file'] = array(
		'pdf',
		'zip',
		'gzip',
		'doc',
		'xls',
		'ptt',
		'docx',
		'fla',
		'flv',
		'mp3',
		'mp4',
		'mov',
		'avi',
		'odf',
		'txt',
		'gz',
		'tb2',
		'psd',
		'ai',
		'jar',
		'rtf',
		'torrent',
		'exe',
		'iso',
		'dmg',
		'app',
		'aep',
		'm4v',
		'djvu',
		'conf',
		'cnf',
		'rar',
		'ps', 
		'psd',
		);

$configuration['extension']['grab'] = implode("|", array_merge($configuration['extension']['image'], $configuration['extension']['fonts'], $configuration['extensions']['static'])); 

$configuration['controllers']['hidden'] = array(
		'messenger',
		'message',
		'f',
		'login',
		'logout',
		'edit',
		'delete',
		'comment',
		'update',
		'upload',
		'image',
		'env',
		'captcha',
		//  'profile',
		);

//$configuration['order']['blog'] = 'LastComment';

/*
   Default groups:
 */
//group names and titles:
$configuration['groups']['names']['system']['Superuser']['Name']  = 'Superuser';
$configuration['groups']['names']['system']['Moderator']['Name']  = 'Moderator';
$configuration['groups']['names']['system']['Editor']['Name']     = 'Editor';
$configuration['groups']['names']['system']['Translator']['Name'] = 'Translator';
$configuration['groups']['names']['public']['Abuse']['Name']      = 'Abuse';
$configuration['groups']['names']['public']['Everyone']['Name']   = 'Everyone';
$configuration['groups']['names']['public']['User']['Name']       = 'User';
$configuration['groups']['names']['user']['Abuse']['Name']        = 'Abuse';
$configuration['groups']['names']['user']['Introduced']['Name']   = 'Introduced';
$configuration['groups']['names']['user']['Friend']['Name']       = 'Friend';
$configuration['groups']['names']['user']['Private']['Name']      = 'Private';

//this groups owned by 0 id:
$configuration['groups']['system'] = array(
		$configuration['groups']['names']['system']['Superuser']['Name'],
		$configuration['groups']['names']['system']['Moderator']['Name'],
		$configuration['groups']['names']['system']['Editor']['Name'],
		$configuration['groups']['names']['system']['Translator']['Name'],
		);

//this groups owned by 0 id:
$configuration['groups']['public'] = array(
		$configuration['groups']['names']['public']['Abuse']['Name'],
		$configuration['groups']['names']['public']['Everyone']['Name'],
		$configuration['groups']['names']['public']['User']['Name'],
		);
//this groups owned by UserId:
$configuration['groups']['user'] = array(
		$configuration['groups']['names']['user']['Abuse']['Name'],
		$configuration['groups']['names']['user']['Introduced']['Name'],
		$configuration['groups']['names']['user']['Friend']['Name'],
		$configuration['groups']['names']['user']['Private']['Name'],
		);


//default quota:
$configuration['quota']['originals'] = '5';
$configuration['quota']['bytes'] = '104857600';
$configuration['template']['marker']="SiteBrush-Template";

$configuration['smarty_path']          = "{$configuration['backend']['path']}/smarty/libs";
$configuration['smarty_template_path'] = $configuration['backend']['views'];
$configuration['smarty_compile_path']  = $configuration['path']['templates_c'];
$configuration['smarty_cache']         = $configuration['var']['cache'];

//DB class stuff
$configuration['db_dsn'] = array(
		'phptype'  => 'mysqli',
		'username' => $configuration['db']['user'],
		'password' => $configuration['db']['pass'],
		'hostspec' => $configuration['db']['host'],
		'database' => $configuration['db']['name'],
		);
$configuration['db_options'] = array(
		'debug' => '2',
		'portability' => 'DB_PORTABILITY_ALL',
		);
//require php classes
require_once("{$configuration['backend']['libraries']}/classes/manual/DB/DB.php");
require_once("{$configuration['backend']['libraries']}/classes/manual/mail/Mail.php");

/*
Propel:
 */
$propel_conf = array (
  'datasources' =>
  array (
    'brain' =>
    array (
      'adapter' => 'mysql',
      'connection' =>
      array (
        'dsn' => "mysql:host={$configuration['db']['host']};dbname={$configuration['db']['name']}",
        'user' => $configuration['db']['user'],
        'password' => $configuration['db']['pass'],
      ),
    ),
    'default' => 'brain',
  ),
  'generator_version' => '1.6.0-beta2',
);
$propel_conf['classmap'] = include("{$configuration['backend']['models']}/default/build/conf/classmap-default-conf.php");

require_once("{$configuration['backend']['libraries']}/classes/manual/propel/runtime/lib/Propel.php");
Propel::init($propel_conf);
set_include_path("{$configuration['backend']['models']}/default/build/classes" . PATH_SEPARATOR . get_include_path());

/*
   negotiate language
 */
setlocale(LC_ALL, 'ru_RU.UTF-8');
$langs = array(
		'Russian' => 'ru',
	      );
//require_once("{$configuration['backend']['libraries']}/functions/manual/language.php");
require_once("{$configuration['backend']['dictionary']}/ru.php");

//smarty:
require_once("{$configuration['smarty_path']}/Smarty.class.php");
$smarty = new Smarty();
//base smarty configuration:
$smarty->template_dir    = "{$configuration['smarty_template_path']}";
$smarty->compile_dir     = "{$configuration['smarty_compile_path']}";
$smarty->cache_dir       = "{$configuration['smarty_cache']}";
$smarty->left_delimiter  = '[[';
$smarty->right_delimiter = ']]';
//various smarty variables:
$smarty->assign('Domain', $configuration['domain']);
$smarty->assign('StaticFilesPath', $configuration['frontend']['static']['path']);
$smarty->assign('dic', $dic);
$smarty->assign('LANG', $LANG);
$smarty->assign('_SERVER', $_SERVER);
$smarty->assign('ImageUploadUrl', $configuration['frontend']['static']['path']);

//avatars
$configuration['default_avatar_url']       = "http://{$configuration['domain']}/f/noman.png";
$configuration['default_avatar_hash']      = 'noman';
$configuration['default_avatar_format']    = 'png';
$configuration['default_icon_online_url']  = "http://{$configuration['domain']}/f/online.gif";
$configuration['default_icon_offline_url'] = "http://{$configuration['domain']}/f/offline.gif";
$configuration['default_sms_online_url']   = "http://{$configuration['domain']}/f/sms-green.gif";
$configuration['default_sms_offline_url']  = "http://{$configuration['domain']}/f/sms-yellow.gif";
//avatars to smarty
$smarty->assign('default_avatar_url', $configuration['default_avatar_url']);
$smarty->assign('default_icon_online_url', $configuration['default_icon_online_url']);
$smarty->assign('default_icon_offline_url', $configuration['default_icon_offline_url']);
$smarty->assign('default_sms_online_url', $configuration['default_sms_online_url']);
$smarty->assign('default_sms_offline_url', $configuration['default_sms_offline_url']);

/*
   HTMLPurifier class:
 */
require_once("{$configuration['backend']['libraries']}/classes/manual/htmlpurifier/HTMLPurifier.includes.php");
//require_once("{$configuration['backend']['libraries']}/classes/htmlpurifier/HTMLPurifier.autoload.php");

class HTMLPurifier_Filter_SafeIframe extends HTMLPurifier_Filter
{

	public $name = 'MyIframe';

	public function preFilter($html, $config, $context)
	{
		//        return preg_replace("/iframe/", "img class=\"MyIframe\" ", $html);
		return preg_replace("/iframe/", "img class=\"MyIframe\" ", preg_replace("/<\/iframe>/", "", $html));
	}

	public function postFilter($html, $config, $context)
	{
		$post_regex = '#<img class="MyIframe" ([^>]+)>#';
		return preg_replace_callback($post_regex, array($this, 'postFilterCallback'), $html);
	}

	protected function postFilterCallback($matches)
	{
		return '<iframe ' . $matches[1] . '></iframe>';
	}
}



$configuration['HTMLPurifier_Config'] = HTMLPurifier_Config::createDefault();
$configuration['HTMLPurifier_Config']->set('Cache.SerializerPath', $configuration['var']['cache']);
$configuration['HTMLPurifier_Config']->set('Core.Encoding', $configuration['encoding']);
$configuration['HTMLPurifier_Config']->set('HTML.Doctype', $configuration['doctype']);
$configuration['HTMLPurifier_Config']->set('HTML.MaxImgLength', $configuration['max_image_width']);
$configuration['HTMLPurifier_Config']->set('CSS.MaxImgLength', "{$configuration['max_image_width']}px");
$configuration['HTMLPurifier_Config']->set('AutoFormat.Linkify', 'true');
$configuration['HTMLPurifier_Config']->set('HTML.Trusted', 'false');
$configuration['HTMLPurifier_Config']->set('Output.FlashCompat', 'true');
$configuration['HTMLPurifier_Config']->set('HTML.SafeObject', 'true');
$configuration['HTMLPurifier_Config']->set('Filter.Custom', array(new HTMLPurifier_Filter_SafeIframe()));
$configuration['HTMLPurifier_Config']->set('Attr.AllowedRel', array('lightbox', "lightbox-0", "lightbox-*"));

$configuration['HTMLPurifier_Messenger'] = HTMLPurifier_Config::createDefault();
$configuration['HTMLPurifier_Messenger']->set('Cache.SerializerPath', $configuration['var']['cache']);
$configuration['HTMLPurifier_Messenger']->set('Core.Encoding', $configuration['encoding']);
$configuration['HTMLPurifier_Messenger']->set('HTML.Doctype', $configuration['doctype']);
$configuration['HTMLPurifier_Messenger']->set('HTML.MaxImgLength', $configuration['max_image_width']);
$configuration['HTMLPurifier_Messenger']->set('CSS.MaxImgLength', "{$configuration['max_image_width']}px");
$configuration['HTMLPurifier_Messenger']->set('AutoFormat.Linkify', 'false');
$configuration['HTMLPurifier_Messenger']->set('HTML.Allowed', 'p,br,img[src]');


//autocut
$configuration['max_first_page_text_length'] = 2000;
$configuration['cut_sign'] = "[cut]";

//pager
$configuration['PagerAmmountPerPage'] = 10;
$configuration['PagerMaxLinks'] = 7;

//email
$configuration['email']['robot'] = "webmaster@{$configuration['domain']}";
$configuration['email']['noreply'] = "no-reply@{$configuration['domain']}";

//comments
$configuration['comment_timeout'] = 14400;
//two hours to edit comment
$configuration['html']['attr'] = array(
		'src',
		'href',
		'data',
		'background',
		'url',
		);


//colors
$configuration['FontColor']         = '#ffffff';
$configuration['LinkColor']         = '#fff799';
$configuration['BackgroundColor']   = '#000000';
$configuration['ckeditor']['color'] = 'grey';
$smarty->assign('FontColor', $configuration['FontColor']);
$smarty->assign('LinkColor', $configuration['LinkColor']);
$smarty->assign('BackgroundColor', $configuration['BackgroundColor']);
//static content path
$smarty->assign('StaticFolder', $configuration['public_html']['static_folder']);
?>
