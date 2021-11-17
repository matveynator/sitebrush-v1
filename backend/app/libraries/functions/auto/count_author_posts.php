<?php
function CountAuthorPosts($Author, $PostType = 'Blog')
{
  global $configuration;
  if (isset($_SESSION['UserId'])) {
    $Me               = UserQuery::create()->findPK($_SESSION['UserId']);
    $GroupsIAmIn      = GroupQuery::create()->filterByUser($Me)->filterByStatus('Active')->filterByDomain($configuration['domain'])->find();
    $PostsAmmount = 0;
    foreach ($GroupsIAmIn as $GroupIAmIn) {
      $PostsAmmount = $PostsAmmount + (PostQuery::create()->filterByUser($Author)->filterByGroup($GroupIAmIn)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->count());
    }
  } else {
    $EveryoneGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    $PostsAmmount = PostQuery::create()->filterByUser($Author)->filterByGroup($EveryoneGroup)->filterByType($PostType)->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
  }
  return $PostsAmmount;
}
?>
