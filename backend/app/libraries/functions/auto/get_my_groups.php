<?php
function GetMyGroups()
{
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $Me          = UserQuery::create()->findPK($_SESSION['UserId']);
    $GroupsIAmIn = $Me->getGroups();
    $GroupsIOwn  = GroupQuery::create()->filterByOwnerId($_SESSION['UserId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    if (isset($GroupsIAmIn)) {
      foreach ($GroupsIAmIn as $GroupIAmIn) {
        if (isset($MyGroups)) {
          $MyGroups = "{$MyGroups}, {$GroupIAmIn->getId()}";
        } else {
          $MyGroups = "{$GroupIAmIn->getId()}";
        }
      }
    }

    if (isset($GroupsIOwn)) {
      foreach ($GroupsIOwn as $GroupIOwn) {
        if (isset($MyGroups)) {
          $MyGroups = "{$MyGroups}, {$GroupIOwn->getId()}";
        } else {
          $MyGroups = "{$GroupIOwn->getId()}";
        }
      }
    }

    $MyGroupsArray=array(1,2,3,4);
   return $MyGroupsArray;

  }
}
?>
