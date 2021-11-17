<?php
//freeze static version of website to current;
//the group is system;
$SuperUserGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
if ((isset($SuperUserGroup)) and (AmIInGroup($SuperUserGroup->getId()))) {
	//ok you are in superuser group:
	$Domain = DomainQuery::create()->filterByName($configuration['domain'])->filterByStatus('Active')->findOne();
	$Domain->setFreezed(FALSE);
	$Domain->Save();
	unset($_SESSION['Freezed']);

	//delete and recreate full website cache:
	if (is_dir($configuration['path']['cache'])) {
		recursive_rmdir($configuration['path']['cache']);
		mkdir($configuration['path']['cache'], 0777);
	}

        //delete and recreate full website clean html:
        if (is_dir($configuration['path']['cleanhtml'])) {
                recursive_rmdir($configuration['path']['cleanhtml']);
                mkdir($configuration['path']['cleanhtml'], 0777);
        }

	$mysqli = mysqli_connect($configuration['db']['host'], $configuration['db']['user'], $configuration['db']['pass'], $configuration['db']['name']);
	/* check connection */
	if (mysqli_connect_errno()) {
		if ($configuration['debug']['display']==TRUE) {
			printf("Connect failed: %s\n", mysqli_connect_error());
		}
		if ($configuration['debug']['logfile']==TRUE) {
			$ErrorLog=mysqli_connect_error();
			file_put_contents("{$configuration['path']['log']}/error.log", $ErrorLog, FILE_APPEND);
		}
		exit();
	}
	$SecureDomain=$mysqli->real_escape_string($configuration['domain']);
	$result = $mysqli->query("SELECT DISTINCT requesturi FROM post where domain='{$SecureDomain}' and status='Active'");

	while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
		if(!empty($row['requesturi'])) {
			UpdateCache($row['requesturi']);		
		}
	}
	Jump($_SESSION['REQUEST_URI']);

} else {
	$_SESSION['system_message'] = "Доступ запрещен.";
	PrintSystemMessage('ok', '/');
}
?>
