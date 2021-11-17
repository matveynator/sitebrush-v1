<?php

if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {

  /*
  Update old comment request:
  */
  if ((isset($url_path[2])) and (is_numeric($url_path[2]))) {
    
    $Author = UserQuery::create()->findPk($_SESSION['UserId']);
    $Comment = MessageQuery::create()->filterById($url_path[2])->filterByUser($Author)->filterByType("Comment")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($Comment)) {
      if ((isset($_POST['content']) and ($_POST['content'] != ""))) {
        //check if you can still edit this comment:
        if ((time() - $configuration['comment_timeout']) < $Comment->getDate()) {
          $Purifier = new HTMLPurifier($configuration['HTMLPurifier_Config']);
          $SecureText = $Purifier->purify($_POST['content']);
          $Comment->setText($SecureText);
          $Comment->Save();
        } else {
          die("Comment update time expired.");
        }
      } elseif ((isset($url_path[3])) and ($url_path[3] == 'delete')) {
        if ((time() - $configuration['comment_timeout']) < $Comment->getDate()) {
          $Comment->setStatus('Deleted');
          $Comment->Save();
          $Post = PostQuery::create()->filterByMessage($Comment)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (isset($Post)) {
            $PostAuthor = UserQuery::create()->findPk($Post->getOwnerId());
            Jump("http://{$PostAuthor->getNickName()}.{$configuration['domain']}/blog/{$Post->getId()}/{$Post->getLastComment()}#l");
          } else {
            JumpBack();
          }
        } else {
          die("Comment delete time expired.");
        }
      } else {
        die("Nothing to do (empty input).");
      }
    } else {
      die("Does not exist or not yours.");
    }
  } else {

    /*
    Comment initial request:
    */
    if (((isset($_POST['Id'])) and (is_numeric($_POST['Id']))) and ((isset($_POST['Comment'])) and ($_POST['Comment'] != ""))) {
      
      $Purifier    = new HTMLPurifier($configuration['HTMLPurifier_Config']);
      $SecureText  = $Purifier->purify($_POST['Comment']);
      $CurrentDate = time();

      /*
        Add new post:
      */
      $NewComment = new Message();
      $NewComment->setType('Comment');
      $NewComment->setText($SecureText);
      $NewComment->setDomain($configuration['domain']);
      $NewComment->setStatus('Active');
      $NewComment->setDate($CurrentDate);
      $NewComment->Save();
      //Add user to comment (comment author);
      $User = UserQuery::create()->findPk($_SESSION['UserId']);
      $User->addMessage($NewComment);
      $User->Save();
      
      //Add avatar to comment (avatar of user who commented):
      $Avatar = MediaQuery::create()->findPk($User->getAvatarId());
      if (isset($Avatar)) {
        $NewComment->addMedia($Avatar);
        $NewComment->Save();
      }
      
      //Attach comment to post (blog or something).
      $Post = PostQuery::create()->findPk($_POST['Id']);
      $Post->addMessage($NewComment);
      $Post->setLastComment($CurrentDate);
      $Post->Save();
      
      //Post Author:
      $PostAuthor = UserQuery::create()->findPk($Post->getOwnerId());
      Jump("http://{$PostAuthor->getNickName()}.{$configuration['domain']}/blog/{$Post->getId()}/{$Post->getLastComment()}#l");
    } else {
      JumpBack();
    }
  }
} else {
  JumpBack();
}


?>
