<?php
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	/*
	   Ok you are in superuser group:  
	 */
	$backup="{$configuration['path']['backup']}.tgz";
	if (file_exists($backup)) {
		$smarty->assign('BackupExists', TRUE);
	}
}
?>
