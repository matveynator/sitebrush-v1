<?php

function FirstPageBlog()
{
  global $configuration, $dic, $smarty;
  $BlogPostsAmmount = PostQuery::create()->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();
  $TotalPages = ceil($BlogPostsAmmount / $configuration['PagerAmmountPerPage']);
  //check if some page requested:
  if ((isset($url_path[2])) and (ctype_digit($url_path[2])) and (CanIReadThis($url_path[2]))) {
    $BlogPosts = PostQuery::Create()->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->paginate($page = ($TotalPages - $url_path[2]), $maxPerPage = $configuration['PagerAmmountPerPage']);
    foreach ($BlogPosts as $BlogPost) {
      $Author = UserQuery::Create()->filterByPost($BlogPost)->findOne();
      if (isset($Author)) {
        $AuthorId        = $Author->getId();
        $AuthorNickName  = $Author->getNickName();
        $DefaultAvatarId = $Author->getAvatarId();
      }
      $CommentsAmmount = MessageQuery::Create()->filterByPost($BlogPost)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->count();
      $LastComment = MessageQuery::Create()->filterByPost($BlogPost)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->findOne();
      if (isset($LastComment)) {
        $LastCommentDate = $LastComment->getDate();
      } else {
        $LastCommentDate = "";
      }
      $Avatar = MediaQuery::Create()->filterByPost($BlogPost)->filterByType('Avatar')->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
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
          'CommentsAmmount'    => $CommentsAmmount,
          'LastCommentDate'    => $LastCommentDate,
        );
      }
    }
    PaginateReverse($BlogPostsAmmount, "/home", $url_path[2]);
  } else {
    $BlogPosts = PostQuery::create()->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->limit($configuration['PagerAmmountPerPage'])->find();
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
      $CommentsAmmount = MessageQuery::Create()->filterByPost($BlogPost)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->count();
      $LastComment = MessageQuery::Create()->filterByPost($BlogPost)->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->findOne();
      
      if (isset($LastComment)) {
        $LastCommentDate = $LastComment->getDate();
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
          'CommentsAmmount'    => $CommentsAmmount,
          'LastCommentDate'    => $LastCommentDate,
        );
      }
    }
    PaginateReverse($BlogPostsAmmount, "/home");
  }
  if (isset($Posts)) {
    $smarty->assign('BlogPosts', $Posts);
    $smarty->assign('Domain', $configuration['domain']);
  }
  $smarty->display("Head.tpl.html");
  $smarty->display("BodyBegin.tpl.html");
  $smarty->display("FirstPage.tpl.html");
  $smarty->display("BodyEnd.tpl.html");
}
?>
