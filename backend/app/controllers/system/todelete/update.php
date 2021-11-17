<?php

if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
  SetUserDesign($_SESSION['UserId']);
  /*
  Blog entry version update request:
  */
  if ((isset($url_path[2])) and (is_numeric($url_path[2]))) {
    $Author = UserQuery::create()->findPk($_SESSION['UserId']);
    $BlogEntry = PostQuery::create()->filterById($url_path[2])->filterByUser($Author)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByVersion('desc')->findOne();
    if (isset($BlogEntry)) {
      if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {
        
        $Security = new Brain_Security();
        $Security->VerifyTitle($_POST['Title']);
        $Purifier    = new HTMLPurifier($configuration['HTMLPurifier_Config']);
        $SecureText  = $Purifier->purify($_POST['Text']);
        $SecureTitle = $Purifier->purify($_POST['Title']);

        /*
          Update old blog entry:
        */
        $BlogEntry->setTitle($SecureTitle);
        $BlogEntry->setText($SecureText);
        $BlogEntry->setShortText(CutTextAuto($SecureText));
        $BlogEntry->setVersion(($BlogEntry->getVersion() + 1));
        if (isset($_POST['UpdateTime']) and ($_POST['UpdateTime'] == TRUE)) {
          $BlogEntry->setDate(time());
        }
        $BlogEntry->Save();
        Jump('/users/' . $User->getNickName() . "/" . $BlogEntry->getId());
      } elseif ((isset($url_path[3]))and($url_path[3]=='delete')) {
	$BlogEntry->setStatus('Deleted');
	$BlogEntry->Save();
        $CommentsToDelete=$BlogEntry->getMessages();
	foreach ($CommentsToDelete as $CommentToDelete) {
		$CommentToDelete->setStatus("Deleted");
		$CommentToDelete->Save();
	}
        JumpBack();
      }
      $smarty->assign('Action', 'OldBlogUpdate');
      $smarty->assign('Title', $BlogEntry->getTitle());
      $smarty->assign('Text', $BlogEntry->getText());
      $smarty->display("Head.tpl.html");
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display("BlogUpdate.tpl.html");
      $smarty->display("BodyEnd.tpl.html");
    } else {
      echo "Does not exist or not yours.";
    }
  } else {

    /*
    Blog entry initial request:
    */
    if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {
      
      $Security = new Brain_Security();
      $Security->VerifyTitle($_POST['Title']);
      
      $Purifier    = new HTMLPurifier($configuration['HTMLPurifier_Config']);
      $SecureText  = $Purifier->purify($_POST['Text']);
      $SecureTitle = $Purifier->purify($_POST['Title']);

      /*
        Add new post:
      */
      $NewPage = new Post();
      $NewPage->setType('Blog');
      $NewPage->setTitle($SecureTitle);
      $NewPage->setText($SecureText);
      $NewPage->setShortText(CutTextAuto($SecureText));
      $NewPage->setDomain($configuration['domain']);
      $NewPage->setVersion('1');
      $NewPage->setStatus('Active');
      $NewPage->setDate(time());
      $NewPage->Save();
      $User = UserQuery::create()->findPk($_SESSION['UserId']);
      $AvatarID = $User->getAvatarId();
      if (isset($AvatarID) and ($AvatarID != '0')) {
        $Avatar = MediaQuery::create()->findPK($AvatarID);
        if (isset($Avatar)) {
          $NewPage->addMedia($Avatar);
          $NewPage->Save();
        }
      }
      $User->addPost($NewPage);
      $User->Save();
      Jump('/users/' . $User->getNickName() . "/" . $NewPage->getId());
    }
    
    $smarty->assign('Action', 'BlogUpdate');
    $smarty->display("Head.tpl.html");
    $smarty->display("BodyBegin.tpl.html");
    $smarty->display("BlogUpdate.tpl.html");
    $smarty->display("BodyEnd.tpl.html");
  }
} else {
  JumpBack();
}

?>
