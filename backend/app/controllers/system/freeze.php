<?php
//freeze static version of website to current;
//the group is system;
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {
	//ok you are in superuser group:
	$Domain = DomainQuery::create()->filterByName($configuration['domain'])->filterByStatus('Active')->findOneOrCreate();
	$Domain->setFreezed(TRUE);
	$Domain->Save();
	$_SESSION['Freezed'] = TRUE;
	Jump($_SESSION['REQUEST_URI']);
} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}
?>
