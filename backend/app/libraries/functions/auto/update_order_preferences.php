<?php
function UpdateOrderPreferences($DataArray = "")
{
  
  if ((isset($_SESSION['LoggedIn']))and($_SESSION['LoggedIn'] == TRUE) and (isset($_SESSION['UserId']))) {
    $User = UserQuery::create()->findPk($_SESSION['UserId']);
    $SerializedUserPreferences = $User->getProfile();
    if (isset($SerializedUserPreferences)) {
      $UserPreferences = unserialize($SerializedUserPreferences);
    }
    $UserPreferences['order'] = $DataArray;
    $User->setProfile(serialize($UserPreferences));
    $User->Save();
    $_SESSION['preferences'] = $UserPreferences;
  }
}
?>
