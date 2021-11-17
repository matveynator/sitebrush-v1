<?php

if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
  if (isset($url_path[2])) {
    if ($url_path[2] == 'log') {
      if (isset($url_path[3]) and (is_numeric($url_path[3])) and ($url_path[3] != $_SESSION['UserId'])) {
        $Opponent = UserQuery::create()->filterById($url_path[3])->filterByStatus("Active")->findOne();
        if (!isset($Opponent)) {
          $smarty->display("MessengerDestroy.tpl.html");
          exit();
        }
        $Outgoing = MessageQuery::create()->filterByTo($url_path[3])->filterByFrom($_SESSION['UserId'])->filterByStatus("Active")->filterByType('Message')->filterByDomain($configuration['domain'])->find();
        $Incoming = MessageQuery::create()->filterByTo($_SESSION['UserId'])->filterByFrom($url_path[3])->filterByStatus("Active")->filterByType('Message')->filterByDomain($configuration['domain'])->find();
        $Unread   = MessageQuery::create()->filterByTo($_SESSION['UserId'])->filterByFrom($url_path[3])->filterByStatus("Active")->filterByType('Message')->filterByUnread('yes')->filterByDomain($configuration['domain'])->find();
        if (count($Unread) > 0) {
		$smarty->assign('Unread', TRUE);
		foreach ($Unread as $Read) {
			$Read->setUnread(FALSE);
			$Read->Save();
		}
        }
        if (count($Outgoing) > 0) {
          foreach ($Outgoing as $Out) {
            $Messages[] = array(
              "Date"   => $Out->getDate(),
              "To"     => $Out->getTo(),
              "From"   => $_SESSION['NickName'],
              "Text"   => $Out->getText(),
              "Unread" => $Out->getUnread(),
              "Type"   => "Outgoing",
            );
          }
        }
        if (count($Incoming) > 0) {
          foreach ($Incoming as $In) {
            $Messages[] = array(
              "Date"   => $In->getDate(),
              "To"     => $_SESSION['NickName'],
              "From"   => $Opponent->getNickName(),
              "Text"   => $In->getText(),
              "Unread" => $In->getUnread(),
              "Type"   => "Incoming",
            );
          }
        }
        if ((isset($Messages)) and (count($Messages) > 0)) {
          sort($Messages);
          $smarty->assign('Messages', $Messages);
        }
        $smarty->assign('To', $url_path[3]);
        $smarty->assign('Room', min($_SESSION['UserId'], $url_path[3]) . '/' . max($_SESSION['UserId'], $url_path[3]));
        $smarty->display("MessengerLog.tpl.html");
      } else {
        $smarty->display("MessengerDestroy.tpl.html");
        exit();
      }
    } elseif ($url_path[2] == 'input') {
      if (isset($url_path[3]) and (is_numeric($url_path[3])) and ($url_path[3] != $_SESSION['UserId'])) {
        $smarty->assign('Nickname', $_SESSION['NickName']);
        $smarty->assign('To', $url_path[3]);
        $smarty->assign('From', $_SESSION['UserId']);
        $smarty->assign('Room', min($_SESSION['UserId'], $url_path[3]) . '/' . max($_SESSION['UserId'], $url_path[3]));
        $smarty->display("MessengerInput.tpl.html");
      } else {
        $smarty->display("MessengerDestroy.tpl.html");
        exit();
      }
    } elseif (is_numeric($url_path[2]) and ($url_path[2] != $_SESSION['UserId'])) {
      $smarty->assign('To', $url_path[2]);
      $Opponent = UserQuery::create()->filterById($url_path[2])->filterByStatus("Active")->findOne();
      if ($Opponent) {
        $smarty->assign('OpponentNickName', $Opponent->getNickName());
      }
      $smarty->display("Messenger.tpl.html");
    } else {
      $smarty->display("MessengerDestroy.tpl.html");
      exit();
    }
  }
} else {
  $smarty->display("MessengerDestroy.tpl.html");
  exit();
}

?>
