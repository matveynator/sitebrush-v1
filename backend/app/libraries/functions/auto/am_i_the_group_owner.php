<?php
function AmITheGroupOwner($GroupId)
{
  global $configuration;
  $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByOwnerId($_SESSION['UserId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($TargetGroup)) {
    return TRUE;
  }
  return FALSE;
}
?>
