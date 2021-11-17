<?php

function FinalMediaDelete($MediaId)
{
  global $configuration;
  $Media = MediaQuery::create()->findPk($MediaId);
  if (isset($Media)) {
    $SameMediaFiles = MediaQuery::create()->filterByHash($Media->getHash())->filterByStatus('Active')->find();
    
    $Media->setStatus('Deleted');
    $Media->Save();
    
    if (count($SameMediaFiles) == 1) {
      if (is_file("{$configuration['path']['htdocs']}{$configuration['frontend']['static']['path']}/{$Media->getHash()}.{$Media->getFormat()}")) {
        unlink("{$configuration['path']['htdocs']}{$configuration['frontend']['static']['path']}/{$Media->getHash()}.{$Media->getFormat()}");
      }
    }
  }
}
?>
