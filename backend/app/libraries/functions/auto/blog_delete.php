<?php
/*
Blog entry version update request:
*/
function BlogDelete($PostId)
{
  global $configuration, $smarty, $dic;
  $Me = UserQuery::create()->findPk($_SESSION['UserId']);
  $BlogEntry = PostQuery::create()->filterById($PostId)->filterByOwnerId($Me->getId())->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByVersion('desc')->findOne();
  if (isset($BlogEntry)) {
	$BlogEntry->setStatus('Deleted');
	$BlogEntry->Save();
	JumpBack();
  } else { 
    echo "Does not exist or not yours.";
  }
}

?>
