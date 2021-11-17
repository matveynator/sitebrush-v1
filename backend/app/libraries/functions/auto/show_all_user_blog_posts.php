<?php

function ShowAllUserBlogPosts($Author)
{
 global $configuration, $smarty, $dic; 
  $BlogPostsAmmount = PostQuery::create()->filterByUser($Author)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
  $TotalPages = ceil($BlogPostsAmmount / $configuration['PagerAmmountPerPage']);
  //check if some page requested:
  if (isset($url_path[3]) and ($url_path[3] == "page") and (isset($url_path[4])) and (ctype_digit($url_path[4]))) {
    $BlogPosts = PostQuery::create()->filterByUser($Author)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->paginate($page = ($TotalPages - $url_path[4]), $maxPerPage = $configuration['PagerAmmountPerPage']);
    foreach ($BlogPosts as $BlogPost) {
      $Authors = $BlogPost->getUsers();
      if (isset($Authors[0])) {
        $AuthorId        = $Authors[0]->getId();
        $AuthorNickName  = $Authors[0]->getNickName();
        $DefaultAvatarId = $Authors[0]->getAvatarId();
      } else {
        $AuthorId = "0";
        $AuthorNickName = "Anonymous";
      }
      $Comments = $BlogPost->getMessages(MessageQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc'));
      if (isset($Comments[0])) {
        $LastCommentDate = $Comments[0]->getDate();
      } else {
        $LastCommentDate = ":)";
      }
      $Avatar = MediaQuery::create()->filterByPost($BlogPost)->filterByType('Avatar')->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      if (isset($Avatar)) {
        $AuthorAvatarHash = $Avatar->getHash();
        $AuthorAvatarFormat = $Avatar->getFormat();
      } elseif ((isset($DefaultAvatarId)) and ($DefaultAvatarId != "0")) {
        $DefaultAvatar = MediaQuery::create()->findPK($DefaultAvatarId);
        if (isset($DefaultAvatar)) {
          $AuthorAvatarHash = $DefaultAvatar->getHash();
          $AuthorAvatarFormat = $DefaultAvatar->getFormat();
        } else {
          $AuthorAvatarHash = $configuration['default_avatar_hash'];
          $AuthorAvatarFormat = $configuration['default_avatar_format'];
        }
      } else {
        $AuthorAvatarHash = $configuration['default_avatar_hash'];
        $AuthorAvatarFormat = $configuration['default_avatar_format'];
      }
      if (CanIReadThis($BlogPost->getId())) {
        $Posts[] = array(
          'Id' => $BlogPost->getId(),
          'Date' => date("F j, Y, G:i",
          $BlogPost->getDate()),
          'Title'              => $BlogPost->getTitle(),
          'Text'               => $BlogPost->getText(),
          'ShortText'          => $BlogPost->getShortText(),
          'AuthorId'           => $AuthorId,
          'AuthorNickName'     => $AuthorNickName,
          'AuthorAvatarHash'   => $AuthorAvatarHash,
          'AuthorAvatarFormat' => $AuthorAvatarFormat,
          'CommentsAmmount'    => count($Comments),
          'LastCommentDate'    => $LastCommentDate,
        );
      }
    }
    PaginateReverse($BlogPostsAmmount, "/users/{$AuthorNickName}/page", $url_path[4]);
  } else {
    $BlogPosts = PostQuery::create()->filterByUser($Author)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->limit($configuration['PagerAmmountPerPage'])->find();
    foreach ($BlogPosts as $BlogPost) {
      $Authors = $BlogPost->getUsers();
      if (isset($Authors[0])) {
        $AuthorId        = $Authors[0]->getId();
        $AuthorNickName  = $Authors[0]->getNickName();
        $DefaultAvatarId = $Authors[0]->getAvatarId();
      } else {
        $AuthorId = "0";
        $AuthorNickName = "Anonymous";
      }
      $Comments = $BlogPost->getMessages(MessageQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc'));
      if (isset($Comments[0])) {
        $LastCommentDate = $Comments[0]->getDate();
      } else {
        $LastCommentDate = "";
      }
      $Avatar = MediaQuery::create()->filterByPost($BlogPost)->filterByType('Avatar')->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
      if (isset($Avatar)) {
        $AuthorAvatarHash = $Avatar->getHash();
        $AuthorAvatarFormat = $Avatar->getFormat();
      } elseif ((isset($DefaultAvatarId)) and ($DefaultAvatarId != "0")) {
        $DefaultAvatar = MediaQuery::create()->findPK($DefaultAvatarId);
        if (isset($DefaultAvatar)) {
          $AuthorAvatarHash = $DefaultAvatar->getHash();
          $AuthorAvatarFormat = $DefaultAvatar->getFormat();
        } else {
          $AuthorAvatarHash = $configuration['default_avatar_hash'];
          $AuthorAvatarFormat = $configuration['default_avatar_format'];
        }
      } else {
        $AuthorAvatarHash = $configuration['default_avatar_hash'];
        $AuthorAvatarFormat = $configuration['default_avatar_format'];
      }
      if (CanIReadThis($BlogPost->getId())) {
        $Posts[] = array(
          'Id' => $BlogPost->getId(),
          'Date' => date("F j, Y, G:i",
          $BlogPost->getDate()),
          'Title'              => $BlogPost->getTitle(),
          'Text'               => $BlogPost->getText(),
          'ShortText'          => $BlogPost->getShortText(),
          'AuthorId'           => $AuthorId,
          'AuthorNickName'     => $AuthorNickName,
          'AuthorAvatarHash'   => $AuthorAvatarHash,
          'AuthorAvatarFormat' => $AuthorAvatarFormat,
          'CommentsAmmount'    => count($Comments),
          'LastCommentDate'    => $LastCommentDate,
        );
      }
    }
    PaginateReverse($BlogPostsAmmount, "/users/{$AuthorNickName}/page");
  }
  if (isset($Posts)) {
    $smarty->assign('BlogPosts', $Posts);
  }
  $smarty->display("Head.tpl.html");
  GrowlUnread();
  $smarty->display("BodyBegin.tpl.html");
  $smarty->display("UserBlog.tpl.html");
  $smarty->display("BodyEnd.tpl.html");
}

?>
