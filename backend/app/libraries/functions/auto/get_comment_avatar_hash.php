<?php
function GetCommentAvatarHash($CommentId)
{
  global $configuration;
  $Comment = MessageQuery::create()->filterById($CommentId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($Comment)) {
    $Avatar = MediaQuery::create()->filterByMessage($Comment)->filterByType("Avatar")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($Avatar)) {
      $CommentAvatarHash = $Avatar->getHash();
    } else {
      //get from user default avatar if exists:
      $Author = UserQuery::create()->filterByMessage($Comment)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      if (isset($Author)) {
        $CommentAvatarHash = GetUserAvatarHash($Author->getId());
      } else {
        $CommentAvatarHash = $configuration['default_avatar_hash'];
      }
    }
  } else {
    $CommentAvatarHash = $configuration['default_avatar_hash'];
  }
  return $CommentAvatarHash;
}
?>
