<?php
function AmIInSystemGroupNamed($SystemGroupName)
{
  global $configuration;
  $TargetGroup = GroupQuery::create()->filterByOwnerId('0')->filterByName($SystemGroupName)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  $TargetGroupUsers = $TargetGroup->getUsers();
  foreach ($TargetGroupUsers as $TargetGroupUser) {
    if ($TargetGroupUser->getId() == $_SESSION['UserId']) {
      return TRUE;
    }
  }
  return FALSE;
}
?>
