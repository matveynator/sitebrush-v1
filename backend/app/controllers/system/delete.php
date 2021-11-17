<?php
/*
   The group is system;
 */
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {

	/*
	   Ok you are in superuser group:  
	 */
	/*
	   Delete specific revision request:
	 */
	if ((isset($_GET['delete'])) and (is_numeric($_GET['delete']))) {
		$Page = PostQuery::create()->findPk($_GET['delete']);
		if($Page) {
			$User = UserQuery::create()->findPk($_SESSION['UserId']);
			$Page->setStatus('Deleted');
			$Page->setDeleterId($User->getId());
			$Page->Save();
			UpdateCache();
			Jump($_SESSION['REQUEST_URI']);
		} else {
			$_SESSION['system_message'] = "Неправильный запрос.";
			PrintSystemMessage('ok', '/');
		}
	} else {
		$_SESSION['system_message'] = "Неправильный запрос.";
		PrintSystemMessage('ok', '/');
	}
} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}

?>
