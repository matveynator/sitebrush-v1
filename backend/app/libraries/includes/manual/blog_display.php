<?php
/*
Display blog of a user:
*/
$User = new User();
$Image = new Image();
$User->Get($BlogOwnerId);
if (CheckUserOnline($BlogOwnerId)) {
  $OwnerIsOnline = "true";
} else {
  $OwnerIsOnline = "false";
}
$smarty->assign('OwnerIsOnline', $OwnerIsOnline);
//Set online icon
$Image->Get($User->AvatarId);
$IconHash = $Image->Hash;
$IconFormat = $Image->Format;
$smarty->assign('IconHash', $IconHash);
$smarty->assign('IconFormat', $IconFormat);
//finish online icon
$Post        = new Post();
$Image       = new Image();
$BlogEntries = $User->GetPostList(array(array("Type", "=", "Blog"), array("Privacy", "=", "All"), array("Status", "!=", 'Deleted'), array("Domain", "=", $configuration['domain'])), "Date", false);
foreach ($BlogEntries as $BlogEntry) {
  $AvatarObjects = $BlogEntry->GetImageList(array(array("Type", "=", "Avatar"), array("Status", "!=", 'Deleted'), array("Domain", "=", $configuration['domain'])));
  //Set avatar if deleted.
  if ((count($AvatarObjects) > 0)) {
    foreach ($AvatarObjects as $AvatarObject) {
      if ($AvatarObject->imageId != "") {
        $AvatarHash = $AvatarObject->Hash;
        $AvatarFormat = $AvatarObject->Format;
      }
    }
  } else {
    if ($User->AvatarId != "") {
      $Avatar       = $Image->Get($User->AvatarId);
      $AvatarHash   = $Avatar->Hash;
      $AvatarFormat = $Avatar->Format;
    }
  }
  
  if ($User->AvatarId == "0") {
    $smarty->assign('AvatarType', "Default");
    $BlogPosts[] = array(
      'postId'         => $BlogEntry->postId,
      'Date'           => $BlogEntry->Date,
      'Title'          => htmlspecialchars($BlogEntry->Title),
      'Text'           => $BlogEntry->Text,
      'Tags'           => htmlspecialchars($BlogEntry->Tags),
      'Version'        => $BlogEntry->Version,
      'Privacy'        => $BlogEntry->Privacy,
      'PrivacyComment' => $BlogEntry->PrivacyComment,
    );
  } else {
    $BlogPosts[] = array(
      'postId'         => $BlogEntry->postId,
      'Date'           => $BlogEntry->Date,
      'Title'          => htmlspecialchars($BlogEntry->Title),
      'Text'           => $BlogEntry->Text,
      'Tags'           => htmlspecialchars($BlogEntry->Tags),
      'Version'        => $BlogEntry->Version,
      'Privacy'        => $BlogEntry->Privacy,
      'PrivacyComment' => $BlogEntry->PrivacyComment,
      'AvatarHash'     => $AvatarHash,
      'AvatarFormat'   => $AvatarFormat,
    );
  }
}
$smarty->assign('Nickname', $User->Nickname);
if (isset($BlogPosts)) {
  $smarty->assign('BlogPosts', $BlogPosts);
}
$smarty->display('BlogDisplay.tpl.html');
?>
