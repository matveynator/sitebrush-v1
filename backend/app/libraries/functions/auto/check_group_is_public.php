<?php

function CheckGroupIsPublic($GroupId)
{
  global $configuration;
  $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($TargetGroup)) {
    $GroupIs = 'Private';
    if ($TargetGroup->getOwnerId() == '0') {
      //the group is system (check if it is public);
      foreach ($configuration['groups']['public'] as $PublicGroup) {
        if ($TargetGroup->getName() == $PublicGroup) {
          $GroupIs = 'Public';
        }
      }
    }
    //return the result    
    if ($GroupIs == 'Public') {
      return TRUE;
    } else {
      return FALSE;
    }
  } else {
    //error
    die('No such group.');
  }
}
?>
