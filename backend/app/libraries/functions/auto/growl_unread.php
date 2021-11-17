<?php
function GrowlUnread()
{
  global $configuration, $dic, $smarty;
  //Messenger (show unread messages);
  if (isset($_SESSION['UserId'])) {
    $UnreadMessages = MessageQuery::create()->filterByTo($_SESSION['UserId'])->filterByStatus("Active")->filterByType('Message')->filterByUnread('yes')->filterByDomain($configuration['domain'])->OrderBy("Date")->find();

    #print_r($Unread);
    if ((isset($UnreadMessages)) and (count($UnreadMessages) > 0)) {
      foreach ($UnreadMessages as $UnreadMessage) {
        $FromUser = UserQuery::create()->filterById($UnreadMessage->getFrom())->filterByStatus("Active")->findOne();
        $MessageAvatar = MediaQuery::create()->filterById($FromUser->getAvatarId())->filterByStatus("Active")->orderByDate()->findOne();
        if (isset($MessageAvatar)) {
          $AvatarHash = $MessageAvatar->getHash();
          $AvatarFormat = $MessageAvatar->getFormat();
        } else {
          $AvatarHash = 'noman';
          $AvatarFormat = 'jpg';
        }
        $Messages[] = array(
          'Id'           => $UnreadMessage->getId(),
          'AuthorId'     => $UnreadMessage->getFrom(),
          'NickName'     => $FromUser->getNickName(),
          'AvatarHash'   => $AvatarHash,
          'AvatarFormat' => $AvatarFormat,
          'Text'         => json_encode($UnreadMessage->getText()),
          'Domain'       => $FromUser->getDomain(),
        );
      }
      $Ammount = count($UnreadMessages);
      $smarty->assign('Ammount', $Ammount);
      $smarty->assign('Messages', $Messages);
      $smarty->display('Growl.tpl.html');
    }
  }
}
?>
