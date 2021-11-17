<?php
function GetMyGroupData($GroupId = FALSE) {
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    if (($GroupId != FALSE) and (is_numeric($GroupId))) {
      $MyGroups = GroupQuery::create()->filterById($GroupId)->filterByOwnerId($_SESSION['UserId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    } else {
      $MyGroups = GroupQuery::create()->filterByOwnerId($_SESSION['UserId'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    }
    $i = 0;
    if (isset($MyGroups)) {
      foreach ($MyGroups as $MyGroup) {
        $ThisGroupUsersAmmount = UserQuery::create()->filterByGroup($MyGroup)->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
        $ThisGroupPostsAmmount = PostQuery::create()->filterByGroup($MyGroup)->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
        if ($ThisGroupUsersAmmount > 0) {
          $ThisGroupUsers = UserQuery::create()->filterByGroup($MyGroup)->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
          foreach ($ThisGroupUsers as $ThisGroupUser) {
            $MyGroupUsers[] = $ThisGroupUser->toArray($keyType = BasePeer::TYPE_COLNAME, $includeLazyLoadColumns = true, $includeForeignObjects = true);
          }
        } else {
          $MyGroupUsers = array();
        }
        
        if ($ThisGroupPostsAmmount > 0) {
          $ThisGroupPosts = PostQuery::create()->filterByGroup($MyGroup)->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
          foreach ($ThisGroupPosts as $ThisGroupPost) {
            $MyGroupPosts[] = $ThisGroupPost->toArray($keyType = BasePeer::TYPE_COLNAME, $includeLazyLoadColumns = true, $includeForeignObjects = true);
          }
        } else {
          $MyGroupPosts = array();
        }
        
        //$Groups[$i] = $MyGroup->toArray($keyType = BasePeer::TYPE_COLNAME, $includeLazyLoadColumns = true, $includeForeignObjects = true);
        $Groups[$i]['Users'] = array(
          "Ammount" => $ThisGroupUsersAmmount,
          "Contents" => $MyGroupUsers,
        );
        $Groups[$i]['Posts'] = array(
          "Ammount" => $ThisGroupPostsAmmount,
          "Contents" => $MyGroupPosts,
        );
        $i++;
        unset($MyGroupUsers);
        unset($MyGroupPosts);
      }
      return $Groups;
    } else {
      die('No such group or not your group');
    }
  }
}
?>
