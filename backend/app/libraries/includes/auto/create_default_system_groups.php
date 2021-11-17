<?php
/*
This helper will create default system groups if they do not exist yet.
*/

foreach ($configuration['groups']['system'] as $group) {
  $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($group)->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOneOrCreate();
  $Group->Save();
}

foreach ($configuration['groups']['public'] as $group) {
  $Group = GroupQuery::create()->filterByOwnerId('0')->filterByName($group)->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOneOrCreate();
  $Group->Save();
}

?>
