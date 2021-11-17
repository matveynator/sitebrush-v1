<?php
/*
This helper will create default user groups of the current user if they do not exist yet.
*/
if (isset($_SESSION['LoggedIn']) and ($_SESSION['LoggedIn'] == TRUE)) {
    foreach ($configuration['groups']['user'] as $group) {
      $Group = GroupQuery::create()->filterByOwnerId($_SESSION['UserId'])->filterByName($group)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOneOrCreate();
      $Group->addUser(UserQuery::create()->findPK($_SESSION['UserId']));
      $Group->Save();
  }
}
?>
