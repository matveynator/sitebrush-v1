<?php
function GetUserAvatarFormat($UserId)
{
  global $configuration;
  $Author = UserQuery::create()->filterById($UserId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($Author)) {
    $Avatar = MediaQuery::create()->filterById($Author->getAvatarId())->filterByType("Avatar")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($Avatar)) {
      $AuthorAvatarFormat = $Avatar->getFormat();
    } else {
      $AuthorAvatarFormat = $configuration['default_avatar_format'];
    }
  } else {
    $AuthorAvatarFormat = $configuration['default_avatar_format'];
  }
  return $AuthorAvatarFormat;
}
?>
