<?php
/*
   This is the controller to join and create account in the service.
 */
//if (!isset($_SESSION['invited']) or ($_SESSION['invited'] == FALSE)) {
//  Jump('/?invitation');
//}

if (!isset($_SESSION['LoggedIn']) or ($_SESSION['LoggedIn'] == FALSE)) {
	if ($configuration['AdminUserRegistered'] == FALSE) {
//		exec("dig +short +trace {$configuration['domain']} |grep -e 'A ' -e 'CNAME ' | grep -v 'NS' | awk '{print$2}' ", $TracedARecord, $TracedAReturnCode);
				if (isset($_POST['register'])) {

					/*
					   Security checks:
					 */
					$Insecure = new Brain_Security();
					if ((!isset($_SESSION['Human']))or($_SESSION['Human']!=TRUE)) {
						$Insecure->VerifyCaptcha($_POST['captcha']);
					}
					$Insecure->VerifyNewEmail($_POST['email']);
					$Insecure->VerifyPasswords($_POST['password']);

					/*
					   If this is the first user to register - make him superuser:
					 */
					$UsersAmmount = UserQuery::create()->filterByStatus('Active')->filterByDomain($configuration['domain'])->count();

					/*
					   If security passed ok - register user:
					 */
					$User = new User;
					$User->setEmail($_POST['email']);
					$User->setPassword(hash('md5', $_POST['password']['1']));
					$User->setDomain($configuration['domain']);
					$User->setStatus('Active');
					if ($User->Save()) {
						//create default user groups:
						foreach ($configuration['groups']['user'] as $group) {
							$Group = GroupQuery::create()->filterByOwnerId($User->getId())->filterByName($group)->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOneOrCreate();
							//leave abuse group empty
							if ($Group->getName() != $configuration['groups']['names']['user']['Abuse']['Name']) {

								$Group->addUser($User);
							}
							$Group->Save();
						}

						//add to user group:
						$PGroup = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['User']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
						$PGroup->addUser($User);
						$PGroup->Save();

						//add to user group:
						$PGroup = GroupQuery::create()->filterByOwnerId('0')->filterByName($configuration['groups']['names']['public']['Everyone']['Name'])->filterByDomain($configuration['domain'])->filterByStatus('Active')->findOne();
						$PGroup->addUser($User);
						$PGroup->Save();

						/*
						   add first user to superuser group:
						 */
						if ($UsersAmmount == 0) {
							$Domain = DomainQuery::create()->filterByName($configuration['domain'])->filterByStatus('Active')->findOneOrCreate();
							$Domain->Save();

							if (!is_dir($configuration['path']['static'])) {
								mkdir($configuration['path']['static'], 0777, TRUE);
							}
							if (!is_dir($configuration['path']['cache'])) {
								mkdir($configuration['path']['cache'], 0777, TRUE);
							}


							$PGroup = GroupQuery::create()->filterByOwnerId(0)->filterByName($configuration['groups']['names']['system']['Superuser']['Name'])->filterByStatus('Active')->filterByDomain($configuration['domain'])->findOne();
							$PGroup->addUser($User);
							$PGroup->Save();
						}
						
						setcookie("dynamic", "yes", time()+(24*3600*365*5), "/");
						$_SESSION['LoggedIn']     = TRUE;
						$_SESSION['JustLoggedIn'] = TRUE;
						$_SESSION['UserId']       = $User->getId();
						$_SESSION['Email']        = $User->getEmail();
						Jump('/');
					}
				} else {
					$smarty->Assign('Action', 'Join');
					header('HTTP/1.0 404 Not Found');
					$smarty->assign('Title', 'Регистрация администратора сайта.');
					$smarty->display("SiteBrushHead.tpl.html");
					$smarty->display("Join.tpl.html");

				}
	} else {
		$_SESSION['system_message'] = $dic['Error_Admin_allready_registered_d'];
		PrintSystemMessage();
	}
} else {
	Jump('/');
}

?>
