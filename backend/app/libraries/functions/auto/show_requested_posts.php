<?php

function ShowRequestedPosts($Limit=10, $DateRequested, $OrderBy="Date")
{
 global $configuration, $smarty, $dic; 
//  $BlogPostsAmmount = CountAuthorPosts($Author, "Blog");
//  $TotalPages = ceil($BlogPostsAmmount / $configuration['PagerAmmountPerPage']);
  //check if some page requested:
//    $BlogPosts = PostQuery::create()->filterByUser($Author)->filterByType("Blog")->filterByStatus('Active')->filterByDomain($configuration['domain'])->orderByDate('Desc')->paginate($page = ($TotalPages - $url_path[4]), $maxPerPage = $configuration['PagerAmmountPerPage']);
    $BlogPosts = GetLastNPosts($DateRequested, $Limit, "Blog", $OrderBy);
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

    //$PostsToBrowseOlder=GetLastNAuthorPosts($Author, $DateRequested, "60", "Blog");
    //$PostsToBrowseNewer=GetNextNAuthorPosts($Author, $DateRequested, "10", "Blog");
    //$PostsTotal=$BlogPostsAmmount;
    //PagerWithDateReverse($PostsTotal, $PerPage=10, $MaxPages=5, $PostsToBrowse, $PagerUri, $PageRequested = FALSE)
//    PagerWithDateReverse($PostsTotal, 10, 5, $PostsToBrowseOlder, $PostsToBrowseNewer, "/users/{$AuthorNickName}/page",$PageRequested);
    PWDRF(FALSE,$DateRequested,10,"Blog",$OrderBy);
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
