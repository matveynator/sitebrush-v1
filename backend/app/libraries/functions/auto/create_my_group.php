<?php

function CreateMyGroup($Title)
{
  //Create personal (user) group with human readable $Title.
  global $configuration;
  if (($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $SecureTitle = htmlspecialchars($Title);
    $Insecure = new Brain_Security();
    $Insecure->VerifyTitle($SecureTitle);
    $NewGroup = new Group();
    $NewGroup->setOwnerId($_SESSION['UserId']);
    $NewGroup->setTitle($SecureTitle);
    $NewGroup->setStatus('Active');
    $NewGroup->setDomain($configuration['domain']);
    $NewGroup->addUser(UserQuery::create()->findPK($_SESSION['UserId']));
    $NewGroup->Save();
  }
}
?>
