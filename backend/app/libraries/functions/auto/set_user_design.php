<?php
function SetUserDesign($UserId)
{
  global $configuration;
  global $smarty;
  $User = UserQuery::create()->findPk($UserId);
  if (isset($User)) {
    $Logo = MediaQuery::create()->filterByUser($User)->filterByType('Logo')->filterByStatus('Active')->findOne();
    if (isset($Logo)) {
      $CustomDesign['LogoHash'] = $Logo->getHash();
      $CustomDesign['LogoFormat'] = $Logo->getFormat();
    }
    $SerializedUserPreferences = $User->getPreferences();
    if (isset($SerializedUserPreferences) and ($SerializedUserPreferences != '')) {
      $UserPreferences = unserialize($SerializedUserPreferences);
    }
    if (isset($UserPreferences['Colors']['BackgroundColor'])) {
      $CustomDesign['BackgroundColor'] = $UserPreferences['Colors']['BackgroundColor'];
      if (GetBrightness($UserPreferences['Colors']['BackgroundColor']) < 50) {
        $CustomDesign['ckeditor_color'] = $configuration['ckeditor']['color'];
      } else {
        $CustomDesign['ckeditor_color'] = $UserPreferences['Colors']['BackgroundColor'];
      }
    } else {
      $CustomDesign['BackgroundColor'] = $configuration['BackgroundColor'];
      if (GetBrightness($configuration['BackgroundColor']) < 130) {
        $CustomDesign['ckeditor_color'] = $configuration['ckeditor']['color'];
      } else {
        $CustomDesign['ckeditor_color'] = $configuration['BackgroundColor'];
      }
    }
    if (isset($UserPreferences['Colors']['LinkColor'])) {
      $CustomDesign['LinkColor'] = $UserPreferences['Colors']['LinkColor'];
    } else {
      $CustomDesign['LinkColor'] = $configuration['LinkColor'];
    }
    if (isset($UserPreferences['Colors']['FontColor'])) {
      $CustomDesign['FontColor'] = $UserPreferences['Colors']['FontColor'];
    } else {
      $CustomDesign['FontColor'] = $configuration['FontColor'];
    }
    $smarty->assign('CustomDesign', $CustomDesign);
  }
}
?>
