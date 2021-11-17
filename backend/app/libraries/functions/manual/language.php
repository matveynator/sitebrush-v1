<?php
/*
negotiate language
*/
if(!isset($_SESSION['LANG'])or$_SESSION['LANG']=="") {
  $LANG=(http_negotiate_language($langs,$result));
  $_SESSION['LANG']=$LANG;
  //apt-get install libcurl3-openssl-dev
  //pecl install pecl_http

}
else {
  $LANG=$_SESSION['LANG'];
}
//Languages other than English
if($LANG=='en') {
  require_once("{$configuration['backend']['dictionary']}/{$LANG}.php");
}
else {
  $LanguageData=LanguageQuery::create()->filterByCode($LANG)->filterByDomain($configuration['domain'])->orderByRevision('desc')->findOne();
  $dic=unserialize(base64_decode($LanguageData->getDictionary()));
  $dic_revision=$Language->getRevision();
  if(($dic=="")and(isset($LANG))) {
    if(file_exists("{$configuration['backend']['dictionary']}/{$LANG}.php")) {
      require_once("{$configuration['backend']['dictionary']}/{$LANG}.php");
    }
    else {
      require_once("{$configuration['backend']['dictionary']}/en.php");
    }
  }
}
//Lowercase language (eg: en)
$LOWLANG=strtolower($LANG);
//Uppercase language (eg: EN)
$UPLANG=strtoupper($LANG);
//set locale (sudo dpkg-reconfigure locales) and select ALL.
setlocale(LC_ALL, "{$LOWLANG}_{$UPLANG}.UTF8");
?>
