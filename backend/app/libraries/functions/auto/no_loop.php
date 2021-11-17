<?php
function NoLoop()
{
  global $configuration, $url_path, $smarty;
  if (isset($configuration['user_name'])) {
    $domain = $configuration['user_name'] . "." . $configuration['domain'];
  } else {
    $domain = $configuration['domain'];
  }
  $PathUri = pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  $smarty->assign('PathUri', $PathUri);
  $configuration['PathUri']=$PathUri;
  /*
  Cleanup static file URL from $_SESSION['REQUEST_URL']: 
  */
  if ((!isset($PathUri['extension'])) or (!InArrayI($PathUri['extension'], $configuration['extensions']['static']))) {

    /*
    Cleanup hidden controller URL from $_SESSION['REQUEST_URL']: 
    */
    if (($PathUri['dirname'] != "/") or (!InArrayI($PathUri['basename'], $configuration['controllers']['hidden']))) {

      /*
      Trim ending slash in $_SESSION['REQUEST_URL']:
      */
      if ($PathUri['basename'] == "") {
        $_SESSION['REQUEST_URL'] = DecodeUrl("http://" . $domain . $PathUri['dirname']);
        $_SESSION['REQUEST_URI'] = DecodeUrl($PathUri['dirname']);
      } elseif ($PathUri['dirname'] != "/") {
        $_SESSION['REQUEST_URL'] = DecodeUrl("http://" . $domain . $PathUri['dirname'] . "/" . $PathUri['basename']);
        $_SESSION['REQUEST_URI'] = DecodeUrl($PathUri['dirname'] . "/" . $PathUri['basename']);
      } elseif ($PathUri['dirname'] == "/") {
        $_SESSION['REQUEST_URL'] = DecodeUrl("http://" . $domain . $PathUri['dirname'] . $PathUri['basename']);
	$_SESSION['REQUEST_URI'] = DecodeUrl($PathUri['dirname'] . $PathUri['basename']);
      } else {
	$_SESSION['REQUEST_URL'] = DecodeUrl("http://" . $domain . $_SERVER['REQUEST_URI']);
        $_SESSION['REQUEST_URI'] = DecodeUrl($_SERVER['REQUEST_URI']);
      }
    }
  }
  /*
  Returns referer which is not looping with the current request uri except / request;
  */
  if (isset($_SESSION['REQUEST_URL'])) {

    /*
    Add $_SESSION['REQUEST_URL'] to referrer array:
    */
    $_SESSION['REFERER_URL'][] = $_SESSION['REQUEST_URL'];

    /*
    Get the nearest not looping referer:
    */
    unset($_SESSION['REFERER_URL_NO_LOOP']);
    for ($i = 0; $i < (count($_SESSION['REFERER_URL'])); $i++) {
      if (($_SESSION['REQUEST_URL'] != $_SESSION['REFERER_URL'][$i])) {
        $_SESSION['REFERER_URL_NO_LOOP'] = $_SESSION['REFERER_URL'][$i];
        $TrimCount = $i;
      }
    }

    /*
    Set loop error uri:
    */
    if (!isset($_SESSION['REFERER_URL_NO_LOOP'])) {
      $_SESSION['REFERER_URL_NO_LOOP'] = "http://" . $domain . '/?loop';
    }

    /*
    Cleanup:
    */
    if (isset($TrimCount)) {
      $TrimArrayTo = ($TrimCount - 1);
    }
    if ((isset($TrimArrayTo)) and ($TrimArrayTo > 0)) {
      $Slice = array_slice($_SESSION['REFERER_URL'], $TrimArrayTo);
      $_SESSION['REFERER_URL'] = $Slice;
    }
  } else {
	$_SESSION['REQUEST_URI'] = DecodeUrl($_SERVER['REQUEST_URI']);
  }
}
?>
