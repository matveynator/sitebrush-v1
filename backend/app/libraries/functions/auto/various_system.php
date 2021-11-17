<?php
function GrabAllCallback($matches)
{
	global $baseUrl;
	//function to grab remote files to local place
	if  ((parse_url($matches[2], PHP_URL_SCHEME) != '') || isset($baseUrl))  {
		//if this is remote url - grab all files and return local file path.
		//if this is css - go recursivelly until all includes parsed.
        	$local=GrabFile(rel2abs($matches[2]));
		return $matches[1].$local.$matches[4];
	} else {
		//if this is local file - do nothig
		return $matches[1].$matches[2].$matches[4];
	}

}


/*
Create wiki new uniq sub url:
*/
function NewUniqSubUri()
{
  global $configuration;
  $i = 0;
  $UNIQ=FALSE;
  while (($UNIQ != TRUE) and ($i < 10)) {
    $RandomUrl = substr(hash('md5', mt_rand()), 5, 7);
    if ($_SESSION['REQUEST_URI']=='/') {
    $SubUrl    = "{$_SESSION['REQUEST_URI']}$RandomUrl";
    } else {
    $SubUrl    = "{$_SESSION['REQUEST_URI']}/$RandomUrl";
    }
    $Post      = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($SubUrl)->filterByDomain($configuration['domain'])->filterByStatus("Active")->findOne();
    if (!$Post) {
      $UNIQ = TRUE;
    } else {
      $UNIQ = FALSE;
      $i++;
    }
  }
  if ($i == 10) {
    $RandomUrl = substr(hash(md5, mt_rand()), 7, 9);
    if ($_SESSION['REQUEST_URI']=='/') {
    $SubUrl    = "{$_SESSION['REQUEST_URI']}$RandomUrl";    
    } else {    
    $SubUrl    = "{$_SESSION['REQUEST_URI']}$RandomUrl";
    }
  }
  return $SubUrl;
}

/*    
Check if user belongs to system group:
*/
function CheckSystemGroup($GroupName)
{
  global $configuration;
  if (($_SESSION['LoggedIn']) and ($_SESSION['LoggedIn'] == TRUE)) {
    $User = UserQuery::create()->findPK($_SESSION['UserId']);
    $Group = $User->getGroups(GroupQuery::create()->filterByName($GroupName)->filterByType("SystemDomain")->filterByDomain($configuration['domain'])->filterByStatus("Active"));
    if (count($Group) == '1') {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}

/*
Jump to local domain (eg if requested domain was some sort of mirror).
*/
function JumpToLocalDomain()
{
  global $configuration, $LANG, $langs;
  //if something else than {$configuration['domain']} - redirect to {$configuration['domain']}.
  if (!preg_match("/{$configuration['domain']}/i", $_SERVER['SERVER_NAME'])) {
    header("Location: http://{$configuration['domain']}{$_SERVER['REQUEST_URI']}");
    exit();
  } elseif ($_SERVER['SERVER_NAME'] != "{$LANG}.{$configuration['domain']}") {
    $LangDomainRequested = explode("." . $configuration['domain'], $_SERVER['SERVER_NAME']);
    if (in_array($LangDomainRequested[0], $langs)) {
      $_SESSION['LANG'] = $LangDomainRequested[0];
      if (isset($_SESSION['LANG']) and $_SESSION['LANG'] != "") {
        header("Location: http://{$_SESSION['LANG']}.{$configuration['domain']}{$_SERVER['REQUEST_URI']}");
        exit();
      }
    }
  }
}

/*
Detect if browser is a spider
*/
function DetectSpider()
{
  // Add as many spiders you want in this array
  $spiders = array(
    'Googlebot',
    'Yammybot',
    'Openbot',
    'Yahoo',
    'Slurp',
    'msnbot',
    'ia_archiver',
    'Lycos',
    'Scooter',
    'AltaVista',
    'Teoma',
    'Gigabot',
    'Googlebot-Mobile',
    'Yandex',
    'Ask',
    'BaiDuSpider',
    'Alexa',
    'Rambler',
  );
  // Loop through each spider and check if it appears in
  // the User Agent
  foreach ($spiders as $spider) {
    if (preg_match("/{$spider}/", $_SERVER['HTTP_USER_AGENT'])) {
      return TRUE;
    }
  }
  return FALSE;
}

/*
Detect if we need this language to translate
*/
function DetectMissingLanguages()
{
  global $smarty;
  $languages = array(
    '',
    //default
    'ja',
    //japanese
    'ko',
    //korean
    'zh',
    //chinese
    'it',
    //italian
    'ar',
    //arabic
    'el',
    //greek
    'yi',
    //yiddish - jewish
    'fi',
    //Finnish
    'sv',
  );
  $hello = array(
    'ar' => 'ﻡﺮﺤﺑﺍ!',
    'ja' => 'やあ!',
    'ko' => '안녕!',
    'zh' => '嗨!',
    'it' => 'Salve!',
    'fi' => 'Hei!',
    'el' => 'Γεια σου!',
    'yi' => 'שלום־עליכם!',
    'sv' => 'Hej!',
  );
  $MissingLang = http_negotiate_language($languages, $result);
  if ($MissingLang != '') {
    $smarty->assign('MissingLang', $MissingLang);
    $smarty->assign('MissingHello', $hello["$MissingLang"]);
  }
}

/*
Detect fucking Microsoft Internet Explorer
*/
function DetectBrowser()
{
  global $smarty;
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) {
      $smarty->assign('Browser', "MSIE");
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false) {
      $smarty->assign('Browser', "Safari");
    }
  }
}

/*
Check if user is online:
*/
function CheckUserOnline($UserId)
{
  $DeadTime = (time() - 120);
  //120 sec idle = means offline
  $User = UserQuery::create()->findPK($UserId);
  if ($User->getLastVisitTime() > $DeadTime) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/*
Language navigation function. (eg: en | ru | fr )
*/
function LanguageNavigation()
{
  global $LANG, $langs, $smarty, $configuration;
  $output = "";
  $iteration = 0;
  //empty output
  foreach ($langs as $name => $code) {
    $iteration = $iteration + 1;
    if ($code != $LANG) {
      $output .= "<a href=\"http://{$code}.{$configuration['domain']}{$_SERVER['REQUEST_URI']}\"><span  id=\"LanguageNavigation\">{$name}</span></a>";
      if (count($langs) != $iteration) {
        $output .= "<span id=\"LanguageNavigation\"> <b>&#183;</b> </span>";
      }
    } elseif ($code == $LANG) {
      $output .= "<span id=\"LanguageNavigationCurrent\">{$name}</span>";
      if (count($langs) != $iteration) {
        $output .= "<span id=\"LanguageNavigation\"> <b>&#183;</b> </span>";
      }
    }
  }
  $smarty->assign('LanguageNavigation', $output);
}

/*
Check if email is valid (parce, check MX and A in dns)
*/
function validEmail($email)
{
  $isValid = true;
  $atIndex = strrpos($email, "@");
  if (is_bool($atIndex) && !$atIndex) {
    $isValid = false;
  } else {
    $domain    = substr($email, $atIndex + 1);
    $local     = substr($email, 0, $atIndex);
    $localLen  = strlen($local);
    $domainLen = strlen($domain);
    if ($localLen < 1 || $localLen > 64) {
      // local part length exceeded
      $isValid = false;
    } elseif ($domainLen < 1 || $domainLen > 255) {
      // domain part length exceeded
      $isValid = false;
    } elseif ($local[0] == '.' || $local[$localLen - 1] == '.') {
      // local part starts or ends with '.'
      $isValid = false;
    } elseif (preg_match('/\\.\\./', $local)) {
      // local part has two consecutive dots
      $isValid = false;
    } elseif (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
      // character not valid in domain part
      $isValid = false;
    } elseif (preg_match('/\\.\\./', $domain)) {
      // domain part has two consecutive dots
      $isValid = false;
    } elseif (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
      // character not valid in local part unless
      // local part is quoted
      if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
        $isValid = false;
      }
    }
    if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
      // domain not found in DNS
      $isValid = false;
    }
  }
  return $isValid;
}
?>
