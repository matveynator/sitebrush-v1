<?php
function AmIInGroup($GroupId = 0)
{
  global $configuration;
  if(isset($_SESSION['UserId'])) {
  $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  $TargetGroupUsers = $TargetGroup->getUsers();
  foreach ($TargetGroupUsers as $TargetGroupUser) {
    if ($TargetGroupUser->getId() == $_SESSION['UserId']) {
      return TRUE;
    }
  }
  return FALSE;
  } else {
  return FALSE;
  }
}
?>
