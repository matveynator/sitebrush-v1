<?php
function GetUserAvatarHash($UserId)
{
  global $configuration;
  $Author = UserQuery::create()->filterById($UserId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($Author)) {
    $Avatar = MediaQuery::create()->filterById($Author->getAvatarId())->filterByType("Avatar")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($Avatar)) {
      $AuthorAvatarHash = $Avatar->getHash();
    } else {
      $AuthorAvatarHash = $configuration['default_avatar_hash'];
    }
  } else {
    $AuthorAvatarHash = $configuration['default_avatar_hash'];
  }
  return $AuthorAvatarHash;
}
?>
