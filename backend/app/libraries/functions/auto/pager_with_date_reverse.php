<?php

function PWDRF($Author, $Date = FALSE, $PerPage = "10", $PostType="Blog",$OrderBy = "Date")
{
  global $configuration, $smarty;
  //текущее время:
  $CurrentTime = time();
  //если незадано время или задано заведомо большее чем сейчас:
  if (($Date == FALSE) or ($Date > $CurrentTime)) {
    $Date = $CurrentTime;
  }
  if ($OrderBy == "LastComment") {
    //покажем одну страницу назад:
    if ($Author!=FALSE) {
    $PostsToBrowseOlder = GetLastNAuthorPosts($Author, $Date, $PerPage, $PostType, $OrderBy);
    } else {
    $PostsToBrowseOlder = GetLastNPosts($Date, $PerPage, $PostType, $OrderBy);    
    }
    if (isset($PostsToBrowseOlder) and (count($PostsToBrowseOlder) >= $PerPage)) {
      foreach ($PostsToBrowseOlder as $PostToBrowseOlder) {
        $PostsDataOlder = array(
          "Date" => $PostToBrowseOlder->getLastComment(),
          "Title" => $PostToBrowseOlder->getTitle(),
//          "Uri" => "/users/{$Author->getNickName()}/page",
        );
      }
//      echo "<pre>";
//      print_r($PostsDataOlder);
      $smarty->assign('PostsDataOlder', $PostsDataOlder);
    }
    if ($Author!=FALSE) {
    $PostsToBrowseNewer = GetNextNAuthorPosts($Author, $Date, $PerPage, $PostType, $OrderBy);
    } else {
    $PostsToBrowseNewer = GetNextNPosts($Date, $PerPage, $PostType, $OrderBy);
    }
    if (isset($PostsToBrowseNewer) and (count($PostsToBrowseNewer) > 0)) {
      foreach ($PostsToBrowseNewer as $PostToBrowseNewer) {
        $PostsDataNewer = array(
          "Date" => $PostToBrowseNewer->getLastComment(),
          "Title" => $PostToBrowseNewer->getTitle(),
  //        "Uri" => "/users/{$Author->getNickName()}/page",
        );
      }
//      echo "<pre>";
//      print_r($PostsDataNewer);
      $smarty->assign('PostsDataNewer', $PostsDataNewer);
    }
  } else {
    //покажем одну страницу назад:
    if ($Author!=FALSE) {
    $PostsToBrowseOlder = GetLastNAuthorPosts($Author, $Date, $PerPage, "Blog", $OrderBy);
    } else {
    $PostsToBrowseOlder = GetLastNPosts($Date, $PerPage, "Blog", $OrderBy);
    }
    if (isset($PostsToBrowseOlder) and (count($PostsToBrowseOlder) >= $PerPage)) {
      foreach ($PostsToBrowseOlder as $PostToBrowseOlder) {
        $PostsDataOlder = array(
          "Date" => $PostToBrowseOlder->getDate(),
          "Title" => $PostToBrowseOlder->getTitle(),
//          "Uri" => "/users/{$Author->getNickName()}/page",
        );
      }
      //echo "<pre>";
      //print_r($PostsDataOlder);
      $smarty->assign('PostsDataOlder', $PostsDataOlder);
    }
   
    if ($Author!=FALSE) {
    $PostsToBrowseNewer = GetNextNAuthorPosts($Author, $Date, $PerPage, "Blog", $OrderBy);
    } else {
    $PostsToBrowseNewer = GetNextNPosts($Date, $PerPage, "Blog", $OrderBy);
    }
    if (isset($PostsToBrowseNewer) and (count($PostsToBrowseNewer) > 0)) {
      foreach ($PostsToBrowseNewer as $PostToBrowseNewer) {
        $PostsDataNewer = array(
          "Date" => $PostToBrowseNewer->getDate(),
          "Title" => $PostToBrowseNewer->getTitle(),
//          "Uri" => "/users/{$Author->getNickName()}/page",
        );
      }
      //echo "<pre>";
      //print_r($PostsDataNewer);
      $smarty->assign('PostsDataNewer', $PostsDataNewer);
    }
  }
}

