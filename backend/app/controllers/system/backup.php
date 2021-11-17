<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	/*
	   Ok you are in superuser group:  
	 */
	$backup="{$configuration['path']['backup']}.tgz";
        $backup_name="{$configuration['domain']}.tgz";
	if (file_exists($backup)) {
		header("Content-Type: application/x-force-download");
		header("Content-Disposition: attachment; filename=\"{$backup_name}\"");
		header("X-Accel-Limit-Rate: 1048576");
		header("X-Accel-Redirect: /b/{$backup_name}");
		exit;
	} else {
		$_SESSION['system_message'] = "Резервная копия сайта пока не создана.";
		PrintSystemMessage('ok', '/');
	}
} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}

?>
