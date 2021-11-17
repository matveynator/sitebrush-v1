<?php
function BlogAdd()
{
  global $configuration, $dic, $smarty;

  /*
  Blog entry initial request:
  */
  if ((isset($_SESSION['LoggedIn'])) and ($_SESSION['LoggedIn'] == TRUE)) {
    if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {
      $Security = new Brain_Security();
      $Security->VerifyTitle($_POST['Title']);
      
      //AmIInGroup($GroupId); // DONE
      //AmITheGroupOwner($GroupId); //DONE
      $Me = UserQuery::create()->findPK($_SESSION['UserId']);
      $EditorGroup = GroupQuery::create()->filterByUser($Me)->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Editor']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      

      $Purifier    = new HTMLPurifier($configuration['HTMLPurifier_Config']);
      $SecureTitle = $Purifier->purify($_POST['Title']);
      $SecureText  = $Purifier->purify($_POST['Text']);
      
      $User = UserQuery::create()->findPk($_SESSION['UserId']);
      $CurrentDate = time();

      /*
        Add new post:
      */
      $NewPage = new Post();
      $NewPage->setOwnerId($User->getId());
      $NewPage->setType('Blog');
      $NewPage->setTitle($SecureTitle);
      $NewPage->setText($SecureText);
      $NewPage->setShortText(CutTextAuto($SecureText));
      $NewPage->setDomain($configuration['domain']);
      $NewPage->setVersion('1');
      $NewPage->setStatus('Active');
      $NewPage->setDate($CurrentDate);
      $NewPage->setLastComment($CurrentDate);
      
      if ((isset($_POST['ShowOnFirst'])) and ($_POST['ShowOnFirst'] == 1)) {
        $NewPage->setShowOnFirst('1');
      } else {
        $NewPage->setShowOnFirst('0');
      }
      
      $NewPage->Save();
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
      if ((isset($_POST['GroupId'])) and (AmIInGroup($_POST['GroupId']))) {
        
        $Group = GroupQuery::create()->findPk($_POST['GroupId']);
        $Group->addPost($NewPage);
        $Group->Save();
      }
      Jump('/blog/' . $NewPage->getId());
    }
    

    $Me = UserQuery::create()->findPK($_SESSION['UserId']);
    $MyGroups = GroupQuery::create()->filterByUser($Me)->filterByOwnerId(array($Me->getId(), 0))->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    if (isset($MyGroups)) {
      foreach ($MyGroups as $MyGroup) {

        /*
              if ($MyGroup->getName() == $configuration['groups']['names']['public']['Everyone']['Name']) {
                $Groups[] = array(
                  'id' => $MyGroup->getId(),
                  'value' => $dic['group_title_everyone'],
                );
              } elseif ($MyGroup->getName() == $configuration['groups']['names']['public']['User']['Name']) {
                $Groups[] = array(
                  'id' => $MyGroup->getId(),
                  'value' => $dic['group_title_user'],
                );
              } elseif ($MyGroup->getName() == $configuration['groups']['names']['user']['Introduced']['Name']) {
                $Groups[] = array(
                  'id' => $MyGroup->getId(),
                  'value' => $dic['group_title_introduced'],
                );
              } elseif ($MyGroup->getName() == $configuration['groups']['names']['user']['Friend']['Name']) {
                $Groups[] = array(
                  'id' => $MyGroup->getId(),
                  'value' => $dic['group_title_friend'],
                );
              } elseif ($MyGroup->getName() == $configuration['groups']['names']['user']['Private']['Name']) {
                $Groups[] = array(
                  'id' => $MyGroup->getId(),
                  'value' => $dic['group_title_private'],
                );
              } else
        */
        if ($MyGroup->getName() != $configuration['groups']['names']['public']['Abuse']['Name']) {
          $Groups[] = array(
            'id' => $MyGroup->getId(),
            'value' => $MyGroup->getName(),
          );
        }
      }
      $smarty->assign('Groups', $Groups);
    }
    


    $smarty->assign('Action', 'BlogUpdate');
    $smarty->display("Head.tpl.html");
    GrowlUnread();
    $smarty->display("BodyBegin.tpl.html");
    $smarty->display("BlogUpdate.tpl.html");
    $smarty->display("BodyEnd.tpl.html");
  } else {
    die('Login to add to blog');
  }
}
?>
