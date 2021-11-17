<?php
/*
Blog entry version update request:
*/
function BlogEdit($PostId)
{
  global $configuration, $smarty, $dic;
  $Me = UserQuery::create()->findPk($_SESSION['UserId']);
  $BlogEntry = PostQuery::create()->filterById($PostId)->filterByOwnerId($Me->getId())->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByVersion('desc')->findOne();
  if (isset($BlogEntry)) {
    if ((isset($_POST['Text']) and ($_POST['Text'] != ""))) {
      //echo "<pre>";
      //print_r($_POST);
      $Security = new Brain_Security();
      $Security->VerifyTitle($_POST['Title']);
      $Purifier    = new HTMLPurifier($configuration['HTMLPurifier_Config']);
      $SecureTitle = $Purifier->purify($_POST['Title']);
      $SecureText = $Purifier->purify($_POST['Text']);

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
      if (isset($_POST['ShowOnFirst'])) {
        $BlogEntry->setShowOnFirst(1);
      } else {
        $BlogEntry->setShowOnFirst(0);
      }
      $BlogEntry->Save();
      //remove post from all previous groups and add to new one:
      if ((isset($_POST['GroupId'])) and (ctype_digit($_POST['GroupId'])) and (AmIInGroup($_POST['GroupId']))) {
        AddPostToOneGroup($_POST['GroupId'], $PostId);
      }
      Jump('/blog/' . $BlogEntry->getId());
    }
    
    $Me = UserQuery::create()->findPK($_SESSION['UserId']);
    $MyGroups = GroupQuery::create()->filterByUser($Me)->filterByOwnerId(array($Me->getId(), 0))->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    if (isset($MyGroups)) {
      foreach ($MyGroups as $MyGroup) {
        if ($MyGroup->getName() != $configuration['groups']['names']['public']['Abuse']['Name']) {
          $Groups[] = array(
            'id' => $MyGroup->getId(),
            'value' => $MyGroup->getName(),
          );
        }
      }
      $smarty->assign('Groups', $Groups);
    }
    
    $PostGroup = GroupQuery::create()->filterByPost($BlogEntry)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    $smarty->assign('Action', 'OldBlogUpdate');
    $smarty->assign('Title', $BlogEntry->getTitle());
    $smarty->assign('Text', $BlogEntry->getText());
    $smarty->assign('PostGroupId', $PostGroup->getId());
    $smarty->assign('ShowOnFirst', $BlogEntry->getShowOnFirst());
    $smarty->display("Head.tpl.html");
    GrowlUnread();
    $smarty->display("BodyBegin.tpl.html");
    $smarty->display("BlogUpdate.tpl.html");
    $smarty->display("BodyEnd.tpl.html");
  } else {
    echo "Does not exist or not yours.";
  }
}

?>
