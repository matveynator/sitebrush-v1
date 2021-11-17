<?php
if (($_SESSION['LoggedIn']==TRUE)and(isset($_SESSION['UserId']))) {
 if ((isset($_GET['avatar'])) and (is_numeric($_GET['avatar']))) {
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    $Avatars = $User->getMedias(MediaQuery::create()->filterByType("Avatar"));
    if (count($Avatars) != "0") {
      foreach ($Avatars as $Avatar) {
        if ($Avatar->getId() == $_GET['avatar']) {
          $User->setAvatarId($Avatar->getId());
          $User->Save();
          Jump('/?profile');
        }
      }
      Jump('/?profile');
    } else {
      Jump('/?profile');
    }
  }
  /*
  Last action: if nothing to do - jump back!
  */
  Jump('/?profile');
} else {
  Jump('/?profile');
}

?>
