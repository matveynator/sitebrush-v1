<?php
//AddPostToGroup($GroupId,5); //Check group is mine or add to public groups $configuration['groups']['public'].
function AddPostToGroup($GroupId, $PostId)
{
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $TargetGroup = GroupQuery::create()->filterById($GroupId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($TargetGroup)) {
      if ($TargetGroup->getOwnerId() == '0') {
        //the group is system (check if it is public);
        if (CheckGroupIsPublic($GroupId)) {
          //the group is public:
          $PostToAdd = PostQuery::create()->filterById($PostId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (isset($PostToAdd)) {
            $TargetGroup->addPost($PostToAdd);
            $TargetGroup->Save();
          } else {
            //error
            die('No such post.');
          }
        } else {
          //error
          die('The group is not public.');
        }
      } elseif ($TargetGroup->getOwnerId() == $_SESSION['UserId']) {
        //the group is mine - add user to this group;
        $PostToAdd = PostQuery::create()->filterById($PostId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
        if (isset($PostToAdd)) {
          $TargetGroup->addPost($PostToAdd);
          $TargetGroup->Save();
        } else {
          //error
          die('No such post.');
        }
      } else {
        //the group is not yours;
        die('The group is not yours and is not public.');
      }
    }
  }
}
?>
