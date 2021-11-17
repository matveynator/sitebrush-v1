<?php
/*
$Author is a user.
*/
if (isset($Author)) {
  $DefaultAvatarId = $Author->getAvatarId();
  if ((isset($_SESSION['preferences']['order'][$Author->getId()]['blog'])) and (($_SESSION['preferences']['order'][$Author->getId()]['blog'] == 'Date') or ($_SESSION['preferences']['order'][$Author->getId()]['blog'] == 'LastComment'))) {
    $OrderBy = $_SESSION['preferences']['order'][$Author->getId()]['blog'];
  } else {
    $OrderBy = $configuration['order']['blog'];
  }
  $smarty->Assign('OrderBy', $OrderBy);
  $smarty->Assign('AuthorNickName', $Author->getNickName());
  //set user design:
  SetUserDesign($Author->getId());
  if ((isset($url_path[2])) and ($url_path[2] != "")) {
    if ((ctype_digit($url_path[2])) and (CanIReadThis($url_path[2]))) {
      if ((isset($url_path[3])) and ($url_path[3] != "")) {
        if ($url_path[3] == 'edit') {
          BlogEdit($url_path[2], $Author);
        } elseif ($url_path[3] == 'delete') {
          BlogDelete($url_path[2], $Author);
        } elseif (ctype_digit($url_path[3])) {
          ShowBlogPost($url_path[2], $Author);
        }
      } else {
        ShowBlogPost($url_path[2], $Author);
      }
    } elseif (($url_path[2] == "page") and (isset($url_path[3])) and (ctype_digit($url_path[3]))) {
      //function ShowRequestedBlogPosts($Author, $Limit=10, $PageRequested, $DateRequested, $OrderBy)
      ShowRequestedBlogPosts($Author, "10", $url_path[3], $OrderBy);
    } elseif ($url_path[2] == "update") {
      BlogAdd();
    } elseif (strtolower($url_path[2]) == "order") {
      if (isset($url_path[3])) {
        if (strtolower($url_path[3]) == "comment") {
          $_SESSION['preferences']['order'][$Author->getId()]['blog'] = "LastComment";
          UpdateOrderPreferences($_SESSION['preferences']['order']);
        } else {
          $_SESSION['preferences']['order'][$Author->getId()]['blog'] = "Date";
          UpdateOrderPreferences($_SESSION['preferences']['order']);
        }
      }
      Jump("http://{$Author->getNickName()}.{$configuration['domain']}");
    } else {
      die('Permission denied. You can not read this post.');
    }
  } else {
    ShowLastBlogPosts($Author, $OrderBy);
  }
} else {
  if ((isset($url_path[2])) and (strtolower($url_path[2]) == "order")) {
    if (isset($url_path[3])) {
      if (strtolower($url_path[3]) == "comment") {
        $_SESSION['preferences']['order'][$configuration['domain']]['blog'] = "LastComment";
        UpdateOrderPreferences($_SESSION['preferences']['order']);
      } else {
        $_SESSION['preferences']['order'][$configuration['domain']]['blog'] = "Date";
        UpdateOrderPreferences($_SESSION['preferences']['order']);
      }
    }
    Jump("http://{$configuration['domain']}");
  } else {
    
    if ((isset($_SESSION['preferences']['order'][$configuration['domain']]['blog'])) and (($_SESSION['preferences']['order'][$configuration['domain']]['blog'] == 'Date') or ($_SESSION['preferences']['order'][$configuration['domain']]['blog'] == 'LastComment'))) {
      $OrderBy = $_SESSION['preferences']['order'][$configuration['domain']]['blog'];
    } else {
      $OrderBy = $configuration['order']['blog'];
    }
    $smarty->Assign('OrderBy', $OrderBy);
    
    if (isset($url_path[2]) and ($url_path[2] == "page") and (isset($url_path[3])) and (ctype_digit($url_path[3]))) {
      //function ShowRequestedBlogPosts($Author, $Limit=10, $PageRequested, $DateRequested, $OrderBy)
      ShowRequestedPosts("10", $url_path[3], $OrderBy);
    } else {
      ShowLastPosts($OrderBy);
      //    FirstPageBlog();
    }
  }
}

?>
