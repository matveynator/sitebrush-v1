<?php
function GetCommentAvatarFormat($CommentId)
{
  global $configuration;
  $Comment = MessageQuery::create()->filterById($CommentId)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
  if (isset($Comment)) {
    $Avatar = MediaQuery::create()->filterByMessage($Comment)->filterByType("Avatar")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if (isset($Avatar)) {
      $CommentAvatarFormat = $Avatar->getFormat();
    } else {
      //get from user default avatar if exists:
      $Author = UserQuery::create()->filterByMessage($Comment)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      if (isset($Author)) {
        $CommentAvatarFormat = GetUserAvatarFormat($Author->getId());
      } else {
        $CommentAvatarFormat = $configuration['default_avatar_format'];
      }
    }
  } else {
    $CommentAvatarFormat = $configuration['default_avatar_format'];
  }
  return $CommentAvatarFormat;
}
?>
