<?php
function ShowBlogPost($BlogPostId, $Author)
{
  global $configuration, $dic, $smarty;
  if (isset($BlogPostId) and (is_numeric($BlogPostId))) {
    $BlogPost = PostQuery::create()->filterById($BlogPostId)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
    if ((isset($BlogPost)) and ($BlogPost->getOwnerId() == $Author->getId())) {
      //comments section
      $MessagesAmmount = MessageQuery::create()->filterByPost($BlogPost)->filterByType('Comment')->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
      $Messages = MessageQuery::create()->filterByPost($BlogPost)->filterByType('Comment')->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Asc')->find();
      if (isset($Messages)) {
        foreach ($Messages as $Message) {
          $Commenter = UserQuery::create()->filterByMessage($Message)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
          if (isset($Commenter)) {
            $CommenterId = $Commenter->getId();
            $CommenterNickName = $Commenter->getNickName();
          } else {
            $CommenterId = 0;
            $CommenterDefaultAvatarId = 0;
            if ($Message->getNickName() != "") {
              $CommenterNickName = $Message->getNickName();
            } else {
              $CommenterNickName = "Anonymous";
            }
          }
          //check if you can edit this comment:
          if (((time() - $configuration['comment_timeout']) < $Message->getDate()) and ((isset($_SESSION['UserId']))and($CommenterId == $_SESSION['UserId']))) {
            $CommentEditable = TRUE;
          } else {
            $CommentEditable = FALSE;
          }
          
          $Comments[] = array(
            'Id' => $Message->getId(),
            'Date' => date("F j, Y, G:i",
            $Message->getDate()),
            'Timestamp' => $Message->getDate(),
            'Editable'     => $CommentEditable,
            'Text'         => $Message->getText(),
            'CommenterId'  => $CommenterId,
            'NickName'     => $CommenterNickName,
            'AvatarHash'   => GetCommentAvatarHash($Message->getId()),
            'AvatarFormat' => GetCommentAvatarFormat($Message->getId()),
          );
          $LastCommentTime = $Message->getDate();
        }
      }
      $smarty->assign('Id', $BlogPost->getId());
      $smarty->assign('Date', date("F j, Y, G:i", $BlogPost->getDate()));
      $smarty->assign('Title', $BlogPost->getTitle());
      $smarty->assign('Text', $BlogPost->getText());
      if (isset($Comments)) {
        $smarty->assign('Comments', $Comments);
        $smarty->assign('CommentsAmmount', $MessagesAmmount);
        $smarty->assign('LastCommentTime', $LastCommentTime);
      } else {
        $smarty->assign('CommentsAmmount', 0);
      }
      $smarty->assign('AuthorNickName', $Author->getNickName());
      $smarty->assign('AuthorId', $Author->getId());
      $smarty->assign('AuthorAvatarHash', GetUserAvatarHash($Author->getId()));
      $smarty->assign('AuthorAvatarFormat', GetUserAvatarFormat($Author->getId()));
      $smarty->display("Head.tpl.html");
	GrowlUnread();
      $smarty->display("BodyBegin.tpl.html");
      $smarty->display("BlogEntry.tpl.html");
      $smarty->display("BodyEnd.tpl.html");
    } else {
      //error
      die('This user does not have this post.');
    }
  }
}
?>
