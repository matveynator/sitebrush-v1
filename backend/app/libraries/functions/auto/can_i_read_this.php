<?php
//CanIReadThis($PostId); //Check that I am in the same group with post.
function CanIReadThis($PostId = 0)
{
  global $configuration;
  //initial value
  $CanRead = FALSE;
  if (is_numeric($PostId)) {
    $TargetPost = PostQuery::create()->filterById($PostId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($TargetPost)) {
      if ((isset($_SESSION['LoggedIn'])) and ($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
        if ($TargetPost->getOwnerId() == $_SESSION['UserId']) {
          //you are the owner - you can read of cause :)
          $CanRead = TRUE;
        } else {
          $TargetPostGroups = $TargetPost->getGroups();
          if (isset($TargetPostGroups)) {
            foreach ($TargetPostGroups as $TargetPostGroup) {
              if (AmIInGroup($TargetPostGroup->getId())) {
                $CanRead = TRUE;
              }
            }
          }
        }
      } else {
        //check post is in everyone group (anonymous)
        $TargetPostGroups = $TargetPost->getGroups();
        if (isset($TargetPostGroups)) {
          foreach ($TargetPostGroups as $TargetPostGroup) {
            if (($TargetPostGroup->getOwnerId() == 0) and ($TargetPostGroup->getName() == $configuration['groups']['names']['public']['Everyone']['Name']) and ($TargetPostGroup->getStatus() != 'Deleted') and ($TargetPostGroup->getDomain() == $configuration['domain'])) {
              $CanRead = TRUE;
            }
          }
        }
      }
    } else {
      //error
      die('No such post.');
    }
  } else {
    //error
    die('Non numeric value supplied.');
  }
	return $CanRead;
}
?>
