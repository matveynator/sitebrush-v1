<?php

function RemoveMyGroup($GroupId)
{
  //Remove personal (user) group and remove all group members associations (set Deleted).
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId'])) and (isset($GroupId)) and (ctype_digit($GroupId))) {
    $GroupToRemove = GroupQuery::create()->filterByOwnerId($_SESSION['UserId'])->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($GroupToRemove)) {
	$GroupToRemove->setStatus('Deleted');
	$GroupToRemove->Save();
    } else {
	die('The group is not yours.');
    }
  }
}
?>
