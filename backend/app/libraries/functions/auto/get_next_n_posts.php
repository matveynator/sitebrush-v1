<?php
function GetNextNPosts($StartTime, $Limit = 10, $PostType = "Blog", $OrderBy = "Date")
{
  global $configuration;
  
  if ((isset($_SESSION['UserId'])) and (isset($_SESSION['LoggedIn']) and ($_SESSION['LoggedIn'] == TRUE))) {
    $Me = UserQuery::create()->findPK($_SESSION['UserId']);
    $GroupsIAmIn = GroupQuery::create()->filterByUser($Me)->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    foreach ($GroupsIAmIn as $GroupIAmIn) {
      if (!isset($MyGroupIds)) {
        $MyGroupIds = "{$GroupIAmIn->getId()}";
      } else {
        $MyGroupIds = "$MyGroupIds, {$GroupIAmIn->getId()}";
      }
    }
    
    if ($OrderBy == "LastComment") {
      $order = "post.lastcomment";
    } else {
      $order = "post.date";
    }

      $con = Propel::getConnection(PostPeer::DATABASE_NAME);
      $sql = "select distinct * from post "
          . "join `group_post` on post.id=group_post.post_id "
          . "join `group` on group.id=group_post.group_id "
          . "join `user_post` on post.id=user_post.post_id "
          . "join `user` on user.id=user_post.user_id "
          . "where {$order} > \"{$StartTime}\" "
	 . "and post.showonfirst=\"1\" "
          . "and post.type=\"{$PostType}\" "
          . "and group_id in({$MyGroupIds}) "
          . "order by {$order} asc limit {$Limit}";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    $LastPosts = PostPeer::populateObjects($stmt);;
  } else {
    $EveryoneGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    
    if ($OrderBy == "LastComment") {
      $LastPosts = PostQuery::create()->filterByGroup($EveryoneGroup)->where('Post.LastComment > ?', $StartTime)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByLastComment('Asc')->limit($Limit)->find();
    } else {
      $LastPosts = PostQuery::create()->filterByGroup($EveryoneGroup)->where('Post.Date > ?', $StartTime)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Asc')->limit($Limit)->find();
    }
  }
  return $LastPosts;
}
?>
