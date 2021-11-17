<?php

function AddUserToGroup($GroupId, $UserId)
{
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($TargetGroup)) {
      if ($TargetGroup->getOwnerId() == '0') {
        //the group is system;
        $SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (AmIInGroup($SuperUserGroup->getId())) {
          //ok you are in superuser group - add user to group:
          $UserToAdd = UserQuery::create()->filterById($UserId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (isset($UserToAdd)) {
            $TargetGroup->addUser($UserToAdd);
            $TargetGroup->Save();
          } else {
            //error
            die('No such user.');
          }
        } else {
          //error
          die('You are not in superuser group.');
        }
      } elseif ($TargetGroup->getOwnerId() == $_SESSION['UserId']) {
        //the group is mine - add user to this group;
        $UserToAdd = UserQuery::create()->filterById($UserId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (isset($UserToAdd)) {
          $TargetGroup->addUser($UserToAdd);
          $TargetGroup->Save();
        } else {
          //error
          die('No such user.');
        }
      } else {
        //the group is not yours;
        die('The group is not yours.');
      }
    }
  }
}
?>
