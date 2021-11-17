<?php
function GetLastNAuthorPosts($Author, $FinishTime, $Limit = 10, $PostType = "Blog", $OrderBy = "Date")
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
          . "where {$order} <= \"{$FinishTime}\" "
          . "and post.type=\"{$PostType}\" "
          . "and post.status=\"Active\" "
          . "and post.domain=\"{$configuration['domain']}\" "
          . "and user_id=\"{$Author->getId()}\" "
          . "and group_id in({$MyGroupIds}) "
          . "order by {$order} desc limit {$Limit}";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    $LastPosts = PostPeer::populateObjects($stmt);;
  } else {
    $EveryoneGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if ($OrderBy == "LastComment") {
      $LastPosts = PostQuery::create()->filterByUser($Author)->filterByGroup($EveryoneGroup)->where('Post.LastComment <= ?', $FinishTime)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByLastComment('Desc')->limit($Limit)->find();
    } else {
      $LastPosts = PostQuery::create()->filterByUser($Author)->filterByGroup($EveryoneGroup)->where('Post.Date <= ?', $FinishTime)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->limit($Limit)->find();
    }
  }
  return $LastPosts;
}
?>
