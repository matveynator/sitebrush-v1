<?php
/*
Wiki controller:
*/
$configuration['wiki_uri'] = '/page';

if ((isset($_SESSION['LoggedIn'])) and ((CheckSystemGroup("Superusers")) or (CheckSystemGroup("Editors")))) {

  /*
  Rename: page, title or tags request:
  */
  if ((isset($_POST['RenameId'])) and (is_numeric($_POST['RenameId']))) {
    $Purifier = new HTMLPurifier($configuration['HTMLPurifier_Config']);
    $Security = new Brain_Security();
    $Security->VerifyTitle($_POST['Title']);
    $Security->VerifyTags($_POST['Tags']);
    $Security->VerifyPageName($_POST['Name']);
    $Page = PostQuery::create()->findPk($_POST['RenameId']);
    if ($Page) {
      if ((isset($_POST['Name'])) and ($_POST['Name'] != "")) {
        $OldUri = $Page->getRequestUri();
        $NewUri = dirname($OldUri) . "/" . $_POST['Name'];
        if (($OldUri != $NewUri) and ($OldUri != $configuration['wiki_uri'])) {

          /*
	  Check if new uri allready exist:
	  */
          if (PostQuery::create()->filterByType('Wiki')->filterByRequestUri($NewUri)->filterByDomain($configuration['domain'])->findOne()) {
            $_SESSION['system_message'] = "Target exists, please copy and paste manually.";
            $_SESSION['system_message_navigation'] = "back";
            PrintSystemMessage();
          }
          
          $Moved = TRUE;

          /*
	  Move all page revisions:
	  */
          $SubRevisions = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($OldUri)->filterByDomain($configuration['domain'])->find();
          foreach ($SubRevisions as $SubRevision) {
            $SubRevision->setRequestUri($NewUri);
            $SubRevision->Save();
          }

          /*
          Create redirect if needed:
          */
          $Redirect = UriQuery::create()->filterByOldUri($OldUri)->filterByNewUri($NewUri)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (!$Redirect) {
            $Uri = new Uri();
            $Uri->setOldUri($OldUri);
            $Uri->setNewUri($NewUri);
            $Uri->setDate(time());
            $Uri->setStatus('Active');
            $Uri->setDomain($configuration['domain']);
            $Uri->Save();
          }
          unset($Redirect);

          /*
	  Get all sub uri pages:
	  */
          $SubPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("{$OldUri}/%")->filterByDomain($configuration['domain'])->find();
          foreach ($SubPages as $SubPage) {

            /*
	    Get all sub request uris and update them with higher level uri that we changed.
	    */
            $FullOldUri = $SubPage->getRequestUri();
            $FullNewUri = $NewUri . substr($FullOldUri, strlen($OldUri));
            $SubPage->setRequestUri($NewUri . substr($SubPage->getRequestUri(), strlen($OldUri)));
            $SubPage->Save();

            /*
            Create redirect if needed:
            */
            $Redirect = UriQuery::create()->filterByOldUri($FullOldUri)->filterByNewUri($FullNewUri)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
            if (!$Redirect) {
              $Uri = new Uri();
              $Uri->setOldUri($FullOldUri);
              $Uri->setNewUri($FullNewUri);
              $Uri->setDate(time());
              $Uri->setStatus('Active');
              $Uri->setDomain($configuration['domain']);
              $Uri->Save();
            }
            unset($Redirect);
          }
        } else {
          $Moved = FALSE;
        }
      }

      /*
      Set the rest data:
      */
      $Page->setTitle(htmlspecialchars($Purifier->purify($_POST['Title'])));
      $Page->setTags(htmlspecialchars($Purifier->purify($_POST['Tags'])));
      $Page->Save();
     
      if ($Moved == TRUE) {
        Jump($NewUri);
      }
    }
    //$User = UserQuery::create()->findPk($_SESSION['UserId']);
  }

  /*
  Update wiki text request:
  */
  if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {
    $OldPage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->orderByVersion('desc')->findOne();
    $OldActivePage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByVersion('desc')->findOne();

    /*
    Check if we have a diff:
    */
    if (CheckSystemGroup("Superusers")) {
      $SecureText = $_POST['Text'];
    } else {
      $Purifier = new HTMLPurifier($configuration['HTMLPurifier_Config']);
      $SecureText = $Purifier->purify($_POST['Text']);
    }
    if (($OldPage) and ((hash('md5', $SecureText)) != (hash('md5', $OldPage->getText())))) {

      /*
	Add new page with incremented version:
      */
      $NewPage = new Post();
      $NewPage->setType('Wiki');
      $NewPage->setRequestUri($_SESSION['REQUEST_URI']);
      $NewPage->setText($SecureText);
      $NewPage->setTitle($OldActivePage->getTitle());
      $NewPage->setTags($OldActivePage->getTags());
      $NewPage->setDomain($configuration['domain']);
      $NewPage->setVersion($OldPage->getVersion() + 1);
      $NewPage->setStatus('Active');
      $NewPage->setDate(time());
      $NewPage->Save();
      $User = UserQuery::create()->findPk($_SESSION['UserId']);
      $User->addPost($NewPage);
      $User->Save();
      Jump($_SESSION['REQUEST_URI']);
    } elseif (!$OldPage) {

      /*
        Add new page:
      */
      $NewPage = new Post();
      $NewPage->setType('Wiki');
      $NewPage->setRequestUri($_SESSION['REQUEST_URI']);
      $NewPage->setText($SecureText);
      $NewPage->setDomain($configuration['domain']);
      $NewPage->setVersion('1');
      $NewPage->setStatus('Active');
      $NewPage->setDate(time());
      $NewPage->Save();
      $User = UserQuery::create()->findPk($_SESSION['UserId']);
      $User->addPost($NewPage);
      $User->Save();
      Jump($_SESSION['REQUEST_URI']);
    } else {

      /*
	Do not add page:
      */
      $_SESSION['system_message'] = "Not modified: {$_SESSION['REQUEST_URI']}";
      $_SESSION['system_message_navigation'] = "back";
      PrintSystemMessage();
    }
  }
  if ((isset($url_path[2]))) {
    /*
    Request to edit page: /page/$url_path[2]/?edit
    */
    if (isset($_GET['edit'])) {
      $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
      $smarty->assign('Action', 'WikiEdit');
      if ($Page) {
        $smarty->assign('Title', $Page->getTitle());
        $smarty->assign('Tags', $Page->getTags());
        $smarty->assign('PageText', $Page->getText());
      }
      $smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
      $smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
      $smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
      $smarty->display("WikiHead.tpl.html");
      $smarty->display("Wiki.tpl.html");
    }

    /*
    Request to view page revisions: /page/$url_path[2]/?revisions
    */
    elseif (isset($_GET['revisions'])) {
      $Pages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->orderByVersion('desc')->find();
      $CurrentPage = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
      $smarty->assign('Action', 'WikiRevisions');
      $smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
      $smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
      $smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
      if ($CurrentPage) {
        $smarty->assign('CurrentVersion', $CurrentPage->getVersion());
      }
      foreach ($Pages as $Page) {
        if ($Page->getTitle() == "") {
          $Title = 'Untitled';
        } else {
          $Title = $Page->getTitle();
        }
        $Authors = $Page->getUsers();
        unset($PageAuthors);
        foreach ($Authors as $Author) {
          $PageAuthors .= "{$Author->getNickName()} ";
        }

        /*
	If deleted - show name of user who deleted your page:
	*/
        if (($Page->getDeleterId() != "") and ($Page->getStatus() == "Deleted")) {
          $Terminator = UserQuery::create()->findPk($Page->getDeleterId());
          $Revisions[] = array(
            'Id'      => $Page->getId(),
            'Version' => $Page->getVersion(),
            'Date'    => date('d-m-Y H:i:s',
            $Page->getDate()),
            'Title'      => $Title,
            'Authors'    => $PageAuthors,
            'Status'     => $Page->getStatus(),
            'Terminator' => $Terminator->getNickName(),
            'RequestUri' => $Page->getRequestUri(),
          );
        } else {
          $Revisions[] = array(
            'Id'      => $Page->getId(),
            'Version' => $Page->getVersion(),
            'Date'    => date('d-m-Y H:i:s',
            $Page->getDate()),
            'Title'      => $Title,
            'Authors'    => $PageAuthors,
            'Status'     => $Page->getStatus(),
            'RequestUri' => $Page->getRequestUri(),
          );
        }
      }
      $smarty->assign('Revisions', $Revisions);
      $smarty->display("Head.tpl.html");
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display("WikiRevisions.tpl.html");
      $smarty->display("BodyEnd.tpl.html");
    }

    /*
    Request to change page name, tags and title: /page/$url_path[2]/?properties
    */
    elseif (isset($_GET['properties'])) {
      $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
      $smarty->assign('Action', 'WikiRename');
      if ($Page) {
        $smarty->assign('Title', $Page->getTitle());
        $smarty->assign('Tags', $Page->getTags());
        $smarty->assign('RenameId', $Page->getId());
      } else {
        JumpBack();
      }
      if ($url_path[1] == basename($_SESSION['REQUEST_URI'])) {
        $smarty->assign('FirstLevelPage', TRUE);
      } else {
        $smarty->assign('FirstLevelPage', FALSE);
      }
      $smarty->assign('PageName', basename($_SESSION['REQUEST_URI']));
      $smarty->assign('PrePageUri', $_SESSION['REQUEST_URI']);
      $smarty->assign('PrePrePageUri', dirname($_SESSION['REQUEST_URI']));
      $smarty->display("Head.tpl.html");
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display("WikiRename.tpl.html");
      $smarty->display("BodyEnd.tpl.html");
    }

    /*
    Request to delete page if it exists: /page/$url_path[2]/?delete
    */
    elseif (isset($_GET['delete'])) {
      $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
      if ($Page) {
        $User = UserQuery::create()->findPk($_SESSION['UserId']);
        $Page->setStatus('Deleted');
        $Page->setDeleterId($User->getId());
        $Page->Save();
        Jump($_SESSION['REQUEST_URI']);
      } else {
        Jump($_SESSION['REQUEST_URI']);
      }
    }

    /*
    Request to delete page if it exists: /page/$url_path[2]/?subpages
    */
    elseif (isset($_GET['subpages'])) {
      $Pages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'] . "/%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->find();
      if (count($Pages) > 0) {
        foreach ($Pages as $Page) {
          $RequestUri = $Page->getRequestUri();
          $UriList[$RequestUri] = $RequestUri;
        }
        $RequestedPage = $_SESSION['REQUEST_URI'];
        $UniqUriList = array_unique($UriList);
        $smarty->display("Head.tpl.html");
        $smarty->display("BodyBegin.tpl.html");
        echo "<blockquote>";
        echo "<h2><a href='{$RequestedPage}'>{$RequestedPage}</a></h2>";
        PlotTree(ExplodeTree($UniqUriList, "/", TRUE));
        $smarty->display("BodyEnd.tpl.html");
      } else {
        JumpBack();
      }
    }

    /*
    Request to view page: /page/$url_path[2]
    */
    else {
      $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
      $ThreadPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("{$_SESSION['REQUEST_URI']}/%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->find();
      
      if (count($ThreadPages) > 0) {
        foreach ($ThreadPages as $ThreadPage) {
          $RequestUri = $ThreadPage->getRequestUri();
          $UriList[$RequestUri] = $RequestUri;
        }
        $SubAmmount = count(array_unique($UriList));
      } else {
        $SubAmmount = 0;
      }
      
      $smarty->assign('Action', 'Wiki');
      $smarty->assign('RequestUri', $_SESSION['REQUEST_URI']);
      $smarty->assign('NewUniqSubUri', NewUniqSubUri());
      $smarty->assign('SubUriAmmount', $SubAmmount);
      if ($Page) {
        $smarty->assign('PageExists', TRUE);
        $smarty->assign('Title', $Page->getTitle());
        $smarty->assign('Tags', $Page->getTags());
        $smarty->assign('PageVersion', $Page->getVersion());
      } else {
        $Revisions = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->find();
        if ((count($Revisions)) > 0) {
          $smarty->assign('DeletedRevisions', count($Revisions));
        }
        $smarty->assign('PageExists', FALSE);
      }
      $smarty->assign('PrePageUri', dirname($_SESSION['REQUEST_URI']));
      $smarty->display("Head.tpl.html");
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display('WikiToolbar.tpl.html');
      if ($Page) {
        echo $Page->getText();
      } else {
        echo "<h1>No content yet.</h1>";
        $Uri = UriQuery::create()->filterByOldUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByDate('desc')->findOne();
        if ($Uri) {
          $NewUri = $Uri->getNewUri();
          echo "<h1>Old content moved  to <a href=\"{$NewUri}\">$NewUri</a></h1>";
        }
      }
      $smarty->display("BodyEnd.tpl.html");
    }
  }

  /*
  Request to view page: /page/$url_path[2]
  */
  else {
    $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
    $ThreadPages = PostQuery::create()->filterByType('Wiki')->filterByRequestUri("{$_SESSION['REQUEST_URI']}/%")->filterByDomain($configuration['domain'])->filterByStatus("Active")->find();
    
    if (count($ThreadPages) > 0) {
      foreach ($ThreadPages as $ThreadPage) {
        $RequestUri = $ThreadPage->getRequestUri();
        $UriList[$RequestUri] = $RequestUri;
      }
      $SubAmmount = count(array_unique($UriList));
    } else {
      $SubAmmount = 0;
    }
    
    $smarty->assign('Action', 'Wiki');
      $smarty->assign('RequestUri', $_SESSION['REQUEST_URI']);
    $smarty->assign('NewUniqSubUri', NewUniqSubUri());
    $smarty->assign('SubUriAmmount', $SubAmmount);
    if ($Page) {
      $smarty->assign('PageExists', TRUE);
      $smarty->assign('Title', $Page->getTitle());
      $smarty->assign('Tags', $Page->getTags());
      $smarty->assign('PageVersion', $Page->getVersion());
      $Authors = $Page->getUsers();
      unset($PageAuthors);
      foreach ($Authors as $Author) {
        $PageAuthors .= "{$Author->getNickName()}({$Author->getFirstName()} {$Author->getLastName()}), ";
      }
      $smarty->assign('Author', $PageAuthors);
    } else {
      $Revisions = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->find();
      if ((count($Revisions)) > 0) {
        $smarty->assign('DeletedRevisions', count($Revisions));
      }
      $smarty->assign('PageExists', FALSE);
    }
    $smarty->assign('PrePageUri', dirname($_SESSION['REQUEST_URI']));
    $smarty->display("Head.tpl.html");
    $smarty->display("BodyBegin.tpl.html");
    $smarty->display('WikiToolbar.tpl.html');
    if ($Page) {
      echo $Page->getText();
    } else {
      echo "<h1>No content yet.</h1>";
      $Uri = UriQuery::create()->filterByOldUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByDate('desc')->findOne();
      if ($Uri) {
        $NewUri = $Uri->getNewUri();
        echo "<h1>Old content moved to <a href=\"{$NewUri}\">$NewUri</a></h1>";
      }
    }
    $smarty->display("BodyEnd.tpl.html");
  }
} else {
  $Page = PostQuery::create()->filterByType('Wiki')->filterByRequestUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus("Active")->orderByVersion('desc')->findOne();
  $smarty->assign('Action', 'Wiki');
  if ($Page) {
    $smarty->assign('PageExists', TRUE);
    $smarty->assign('Title', $Page->getTitle());
    $smarty->assign('Tags', $Page->getTags());
    $smarty->assign('PageVersion', $Page->getVersion());
    $Authors = $Page->getUsers();
    unset($PageAuthors);
    foreach ($Authors as $Author) {
      $PageAuthors .= "{$Author->getNickName()}({$Author->getFirstName()} {$Author->getLastName()}), ";
    }
    $smarty->assign('Author', $PageAuthors);
  } else {
    $smarty->assign('PageExists', FALSE);
  }
  $smarty->assign('PrePageUri', dirname($_SESSION['REQUEST_URI']));
  if (!$Page) {

    /*
	If page was moved - redirect to new page:
    */
    $Uri = UriQuery::create()->filterByOldUri($_SESSION['REQUEST_URI'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->orderByDate('desc')->findOne();
    if ($Uri) {
      Jump($Uri->getNewUri());
    } else {
      $smarty->display("Head.tpl.html");
      $smarty->display("BodyBegin.tpl.html");
      echo "<h1>No content yet.</h1>";
    }
  } else {
    $smarty->display("Head.tpl.html");
    $smarty->display("BodyBegin.tpl.html");
    echo $Page->getText();
  }
  $smarty->display("BodyEnd.tpl.html");
}

?>
